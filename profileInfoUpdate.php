<?php
// start the session
session_start();
if($_SESSION["logged_in"] != "true"){
    
?>
<script>
    window.location.replace("login.php");
</script>
<?php
}

?>
<?php
    require_once("connect-db.php");
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $userId = $_SESSION["userId"];
        
        $sql = "select * from users where userId = :userId";
            
        $statement1 = $db->prepare($sql);
        $statement1 -> bindValue(':userId', $userId);
        
        
        if($statement1->execute()){
            $customers = $statement1->fetchAll();
            $statement1->closeCursor();
        }else{
            $error = "Error finding user";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
     <link rel="icon" type="image/x-icon" href="img/favicon_io/favicon-32x32.png">
    <title>Profile Info - Sustain Jewelry Co.</title>
    <meta name="description" content="Profile Information for Sustain Jewelry Company">
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
    <div class="col-md-12">
       
        <article class="container">
            <form method="POST" action="profileUpdateProcessing.php">
                <?php foreach($customers as $c) :?>
            <div class="row">
                <div class="col">
                    
                </div>
                <div class="col">
                    <br><h2>Update information</h2><br>
                    <input name="email" type="email" class="form-control" placeholder="Email Address" aria-label="Email Address" required value="<?php echo $c["email"];?>"><br>
                    <input name="username" type="text" class="form-control" placeholder="Username" aria-label="Username" required value="<?php echo $c["username"];?>"><br>
                    <input name="password" type="password" class="form-control" placeholder="Password" aria-label="Password" required value="<?php echo $c["password"];?>" ><br>
                    <input name="firstName" type="text" class="form-control" placeholder="First Name" aria-label="First Name" required value="<?php echo $c["firstName"];?>"><br>
                    <input name="lastName" type="text" class="form-control" placeholder="Last Name" aria-label="Last name" required value="<?php echo $c["lastName"];?>"><br>
                    <input name="address" type="text" class="form-control" placeholder="Address" aria-label="Address" required value="<?php echo $c["address"];?>"><br>
                    <input name="state" type="text" class="form-control" placeholder="State" aria-label="State" required value="<?php echo $c["state"];?>"><br>
                    <input name="city" type="text" class="form-control" placeholder="City" aria-label="City" required value="<?php echo $c["city"];?>">
                    <input type="hidden" name="userId" value="<?php echo $c["userId"];?>">
                </div>
                <div class="col">
                    
                </div>
            </div>
             <?php endforeach;?>
            <div style="text-align: center; margin: 2%;">
                <button style="padding: 1%; background-color: rgb(59, 110, 85); color: #FFFFFF; border: 0px; border-radius: 15px; font-size: 1.1rem;" type="submit">Update</button>
            </div>
                
            </form>
        </article>
    </div>

    
    
    

</body>

    

</body>
<?php include("navfooter.php");?>

</html>