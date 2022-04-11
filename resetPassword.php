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
    <?php include("nav.html");?>
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-9"></div>
            <br>
                <h2>Reset User Password</h2>
                <form method="post" action="resetProcessing.php">
                    <br><br>
                    Username: <input type="text" name="username" required>
                    <br><br>
                    <h4>Security Question</h4>
                    <br>
                    What city do you live in: <input type="text" name="city" required>
                    <br><br>

                    
                    <button type="submit" value="Submit">Submit</button>
                </form>
            </div>
            <div class="col-md-2"></div>
            
        </div>
        <br><br><br>
    </div>
    
    
    

</body>
<?php include("navfooter.php");?>

</html>