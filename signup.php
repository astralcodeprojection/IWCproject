<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sign Up - Sustain Jewelry Co.</title>
    <meta name="description" content="Sign up, become a part of Sustain Jewelry Company. Sustain Jewelry Company provides sustainable jewelry made to outlast fast fashion pieces using fine minerals and our sustainably sourced gemstones and pearls.">
    <link rel="stylesheet" href="assets/css/style.css">
        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-FT1YS7DNDD"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-FT1YS7DNDD');
    </script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="">
    <?php include("warningBanner.php");?>
    <?php include("nav.html");?>
    <div class="container">
        <div class="row text-center">
            <h2 class="display-3 fw-bold">Create a Profile</h2>
            <div class="heading-line mb-1"></div>
        </div>
        
            
            
        </div>
    </div>
     <article class="container">
    
     <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row">
                <div class="col">
                    
                </div>
                <div class="col bg-info rounded-3">
                    <br>
                    <input name="email" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address"><br>
                    <input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username"><br>
                    <input name="password" type="password" class="form-control" placeholder="Password" aria-label="First name"><br>
                    <input name="firstName" type="text" class="form-control" placeholder="First Name" aria-label="Card Name"><br>
                    <input name="lastName" type="text" class="form-control" placeholder="Last Name" aria-label="First name"><br>
                    <input name="address" type="text" class="form-control" placeholder="Address" aria-label="Card Name"><br>
                    <input name="state" type="text" class="form-control" placeholder="State" aria-label="First name"><br>
                    <input name="city" type="text" class="form-control" placeholder="City" aria-label="CVV"><br>
                </div>
                <div class="col">
                    
                </div>
            </div>
            <div style="text-align: center; margin: 2%;">
                <button style="padding: 1%; background-color: rgb(59, 110, 85); color: #FFFFFF; border: 0px; border-radius: 15px; font-size: 1.1rem;" type="submit">Finalize</button>
            </div>
                
            </form>
        </article>
        <article>
            <?php

            require_once("connect-db.php");
            $error = $success = $email = $username = $password = $firstName = $lastName = $address = $state = $city = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $email = $_POST["email"];
                $username = $_POST["username"];
                $password = $_POST["password"];
                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $address = $_POST["address"];
                $state = $_POST["state"];
                $city = $_POST["city"];
                
                
             $sql="insert into users (email, username, password, firstName, lastName, address, state, city) VALUES (:email, :username, :password, :firstName, :lastName, :address, :state, :city)";
                
                $statement1 = $db->prepare($sql);
                
                $statement1->bindValue(':email', $email);
                $statement1->bindValue(':username', $username);
                $statement1->bindValue(':password', $password);
                $statement1->bindValue(':firstName', $firstName);
                $statement1->bindValue(':lastName', $lastName);
                $statement1->bindValue(':address', $address);
                $statement1->bindValue(':state', $state);
                $statement1->bindValue(':city', $city);
                
                if($statement1->execute()){
                    $statement1->closeCursor();
                    $success = "User successfully added.";
                 }else{
                    $error="Error entering user.";
                };

        
        ?>
            <?php
                if($error !=""){
                    echo "<h3>$error</h3>";
                }else{
                    echo "<h3>$success</h3>";
                    
                }
                
        }//end of post
                ?>
          
        </article>
    
    
    

</body>
<?php include("navfooter.php");?>

</html>