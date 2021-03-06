<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
     <link rel="icon" type="image/x-icon" href="img/favicon_io/favicon-32x32.png">
    <title>Login - Sustain Jewelry Co.</title>
    <meta name="description" content="Log in to your account for Sustain Jewelry Company">
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
    <br><br> <br>
      <div class="row bg-info rounded-3">
        <div class="col-md-6 left">
            <div class="bg-info p-4 text-start">
            <h2 class="bg-info">
                Welcome to our profile page! <br><br></h2>
                <p>If you do not have a profile at this time, please click below <br>to sign up to access this feature and get our newsletter!</p>
                <button class="btn btn-secondary" onclick="window.location.href='signup.php'">
                    Sign Up
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <article class="right">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <br>
                Username: <input type="text" name="username">
                <br><br>
                Password: <input type="password" name="password">
                <br><br>
                
                <button class="btn btn-secondary" type="submit" value="Submit">Submit</button>
            </form>
            <br>
            <button class="btn btn-secondary" onclick="window.location.href='resetPassword.php'">
                Forgot Password?
            </button>

        </article>
        <?php
            require_once("connect-db.php");
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = $_POST["username"];
                $password = $_POST["password"];
                
                if($username == 'sustainEmployment' && $password == 'sustainable'){
                        $userId = $_SESSION["userId"];
                        $_SESSION["admin_login"] = "true";
                        $_SESSION["logged_in"] = "true";
                    ?>
                <script type="text/javascript">
                    window.location = "admin.php";
                </script>
        <?php
                }
                if($username != 'sustainEmployment'){
                $sql = "select * from users where username = :username and password = :password";
                    
                $statement1=$db->prepare($sql);
                
                $statement1->bindValue(':username', $username);
                $statement1->bindValue(':password', $password);
                 

                if ($statement1->execute()){
                    
                    $log = $statement1->fetchAll();
                    $statement1->closeCursor();
                        foreach($log as $u => $value){
                                foreach($value as $x => $v){
                                    if(is_string($v)) {
                                    
                                    $_SESSION[$x] = $v;
                                    
                                }
                                
                                if($v == $username && $v == $password){
                                    $_SESSION["logged_in"] = "true";
                                }
                        
                    }
                        
        		?>
                <script type="text/javascript">
                    window.location = "profile.php";
                </script>
                <?php
                    }
                
                }
                }else{
                    $error = "Invalid username or password.";
                }
            }
            ?>
            <?php
                if($error !=""){
                    echo "<h3>$error</h3>";
                }
            ?>
        </div>
       
      </div>
  </div>
    
    
<br><br>
</body>
<?php include("navfooter.php");?>

</html>