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
    <?php include("nav.html");?>
    <div class="container">
        <br><br>
        <br><br><br>
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-justify-center">Welcome <?php echo $_SESSION["firstName"];?>!</h2><br>
            </div>
        </div>
        <div class="row">
            
            <div class="col-md-6">
                <br><br><br><br><br><br><br>
                <br>
                <h2>View My Profile<br>Information</h2>
                <a class="" href="account.php">
                    
                    <button type="button"  class="btn btn-secondary">Account</button>
                </a>
                
            </div>
            <div class="col-md-6">
                <br><br><br><br><br><br><br>
                <br>
                <h2>View My Past<br>Orders</h2>
                <a class="" href="pastUsersOrders.php">
                    
                    <button type="button"  class="btn btn-secondary">Past Orders</button>
                </a>
            </div>
        </div>
    </div>
    
    
    

</body>
<?php include("navfooter.php");?>

</html>