<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sustain Jewelry Co. - Shop fashion using fine minerals including july birthstones.</title>
    <meta name="description" content="Sustain Jewelry Company provides sustainable jewelry made to outlast fast fashion pieces using fine minerals and our sustainably sourced gemstones and pearls.">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="">
    <?php include("nav.html");?>

    <div class="container">
    <br><br> <br><br>
      <div class="row">
        <div class="col-md-6 left">
            <div class="bg-white p-4 text-start">
            <h2 class="fw-light">
                Welcome to our profile page! <br><br></h2>
                <p>If you do not have a profile at this time, please click below <br>to sign up to access this feature and get our newsletter!</p>
            </div>
        </div>
        <div class="col-md-6">
            <article class="right">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                Username: <input type="text" name="username">
                <br><br>
                Password: <input type="password" name="password">
                <br><br>
                
                <button type="submit" value="Submit">Submit</button>
            </form>
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
          
               window.location.replace("account.php");
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