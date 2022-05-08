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
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Profile - Sustain Jewelry Co.</title>
    <meta name="description" content="Profile Page for Sustain Jewelry Company">
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
        <br>
        <div class="row">
            
            <div class="col-md-6 justify-content-sm-center">
                <br><br><br><br>
                <img src="img/image61-95.png" class="col-md-6">
                <h2>View My Profile<br>Information</h2>
                <form class="" action="account.php" method="POST">
                    <input type="hidden" name="userId" value="<?php echo $_SESSION["userId"];?>">
                    <button class="btn btn-secondary" type="submit">Profile</button>
                </form>
                
            </div>
            <div class="col-md-6 justify-content-sm-center">
                <br><br><br><br>
                <img src="img/image27-99.png" class="col-md-6">
                <h2>View My Past<br>Orders</h2>
                
                <a class="" href="pastUsersOrders.php">
                    
                    <button type="button"  class="btn btn-secondary">Past Orders</button>
                </a>
            </div>
        </div>
    </div>
    <br><br>
    
    

</body>
<?php include("navfooter.php");?>

</html>