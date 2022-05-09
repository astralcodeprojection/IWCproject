<?php
// start the session
session_start();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Reset Password - Sustain Jewelry Co.</title>
    <meta name="description" content="Create and manage your account for Sustain Jewelry, ethical and sustainable fashion">
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
        <br><br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9"></div>
            <br>
            <?php
                require_once("connect-db.php");
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $username = $_POST["username"];
                    $city = $_POST["city"];
                    
                    
                    $error1 = "";
                    $sql = "select * from users where username = :username and city = :city";
                
                    $statement1 = $db->prepare($sql);
                    $statement1->bindValue(':username' , $username);
                    $statement1->bindValue(':city' , $city);
                    
                
                    if($statement1->execute()){
                        $customers = $statement1->fetchAll();
                        $statement1->closeCursor();
                    }else{
                        $error1= "Error loading";
                    }
                }
            ?>
            <form method="POST" action="passwordResetResults.php">
                <?php foreach($customers as $c) :?>
                <h2>Password Reset</h2><br>
                New Password: <input type="password" name="password" required value="<?php echo $c["password"];?>">
                <br><br>
                 <input type="hidden" name="userId" value="<?php echo $c["userId"];?>">
                <?php endforeach;?>
                <input type="submit" value="Submit">
            </form>
            
            </div>
            <div class="col-md-2"></div>
            
        </div>
        <br><br><br>
    </div>
    
    
    

</body>
<?php include("navfooter.php");?>

</html>