<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Our Story - Sustain Jewelry Co.</title>
    <meta name="description" content="Our Story, how Sustain Jewelry Company began. Sustain Jewelry Company is the most sustainable jewelry made using fine minerals and our sustainably sourced gemstones and pearls.">
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

    <br><br>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-9">
            <h2>Sustain Jewelry<br>
            Company's Story</h2><br><br>

        </div>
        
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <h3>Our goal is to create a safe, healthy and sustainable line<br>of products for our people and communities.</h3><br>
            <p> Sustain jewelry company started from noticing many brands that were selling hazardous<br>
                 jewelry and wanting to make changes in the industry by creating a brand that<br>
                 will reduce the carbon footprint and make the world a cleaner place. <br><br>We will
                 make sure the metals we use to handcraft into our jewelry will have a small<br>
                 impact on earth. To make sure of this, 90% of our base metals will be recycled.<br>
                 Our goal is to create a safe, healthy and sustainable world for our people and<br>
                 communities.</p><br><br>
            
        </div>
    </div>
    <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4">
                
                <br><br>
                <img src="img/worker.jpg" class="col-md-8">
                <h2>About our<br>Practices</h2>
                <a class="" href="aboutUs.php">
                    
                    <button type="button"  class="btn btn-secondary">About Our Practices</button>
                </a>
                
            </div>
            <div class="col-md-4">
                
                <img src="img/Copper-Ore-Direct-From-Mine.jpg" class="col-md-7">
                <h2>View our <br>materials<br>information</h2>
                
                <a class="" href="materials.php">
                    
                    <button type="button"  class="btn btn-secondary">Our Materials</button>
                </a>
            </div>
            <div class="col-md-1"></div>

        </div>
        <br><br>
    

</body>
<?php include("navfooter.php");?>

</html>