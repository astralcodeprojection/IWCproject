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
        
        <article class="left">

            <form method="POST" action="profileUpdateProcessing.php">
                <?php foreach($customers as $c) :?>
                    Username: <input type="text" name="username" required value="<?php echo $c["username"];?>">
                    <br><br>
                    Email: <input type="email" name="email" required value="<?php echo $c["email"];?>">
                    <br><br>
                    First Name: <input type="text" name="firstName" required value="<?php echo $c["firstName"];?>">
                    <br><br>
                    Last Name: <input type="text" name="lastName" required value="<?php echo $c["lastName"];?>">
                    <br><br>
                    Address: <input type="text" name="address" required value="<?php echo $c["address"];?>">
                    <br><br>
                    State: <input type="text" name="state" required value="<?php echo $c["state"];?>">
                    <br><br>
                    City: <input type="text" name="city" required value="<?php echo $c["city"];?>">
                    <br><br>
                    <input type="hidden" name="userId" value="<?php echo $c["userId"];?>">
                <?php endforeach;?>
                <input type="submit" value="Submit">
                
            </form>
        </article>
    </div>

    
    
    

</body>

    

</body>
<?php include("navfooter.php");?>

</html>