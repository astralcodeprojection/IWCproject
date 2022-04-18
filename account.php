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
    <title>Account - Sustain Jewelry Co.</title>
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
        <br><br><br>
        <div class="row">
            <div class="col-md-4">
                <br>
                <h3>Profile Info</h3><br>
                <article class="left">

                            <?php foreach($customers as $c) :?>
                                First Name: <?php echo $c["username"];?>
                                <br><br>
                                Last Name: <?php echo $c["firstName"];?> <?php echo $c["lastName"];?>
                                <br><br>
                                Email: <?php echo $c["email"];?>
                                <br><br>
                                
                                <br><br>
                            <?php endforeach;?>
                            
                        </form>
                    </article>
                
            </div>
            <div class="col-md-4">
                <br><br><br><br>
                <?php foreach($customers as $c) :?>
                                
                                Address: <?php echo $c["address"];?>
                                <br><br>
                                State: <?php echo $c["state"];?>
                                <br><br>
                                City: <?php echo $c["city"];?>
                                <br><br>
                            <?php endforeach;?>
                <br>
                
            </div>
            <div class="col-md-4">
                <br><br><br><br><br><br><br>
                <br>
                <form method="post" action="profileInfoUpdate.php">
                    
                    <button type="submit" value="Submit" class="btn btn-secondary">Update Info</button>
                </form>
            </div>
        </div>
    </div>
    
    
    
 
</body>
<?php include("navfooter.php");?>

</html>