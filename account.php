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
    <?php include("nav.html");?>
    <div class="container">
        <br><br>
        <br><br><br>
        <div class="row">
            <div class="col-md-4">
                <br>
                <h3>Profile Info</h3><br>
                <h4>Username: <?php echo $_SESSION["username"];?></h4>
                <h4>Email: <?php echo $_SESSION["email"];?></h4>
                <h4>Name: <?php echo $_SESSION["firstName"];?> <?php echo $_SESSION["lastName"];?></h4>
                
            </div>
            <div class="col-md-4">
                <br><br><br><br><br><br><br>
                <h4>Address: <?php echo $_SESSION["address"];?></h4>
                <h4>State: <?php echo $_SESSION["state"];?></h4>
                <h4>City: <?php echo $_SESSION["city"];?></h4>
                <br>
                
            </div>
            <div class="col-md-4">
                <br><br><br><br><br><br><br>
                <br>
                <a class="" href="profileInfoUpdate.php">
                    <button type="button"  class="btn btn-secondary">Update Info</button>
                </a>
            </div>
        </div>
    </div>
    
    
    
 
</body>
<?php include("navfooter.php");?>

</html>