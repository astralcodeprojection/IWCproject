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
    <?php include("warningBanner.php");?>
    <?php include("nav.html");?>
    <div class="row">
      <div class="col-md-0"></div>
      <div class="col-md-11">
            
            <div class="storyContent">
              <div class="row">
                <div class="col-md-6">
                    <img class="col-md-12" src="img/image29-103.png">
                </div>
                <div class="col-md-6">
                    <br><br>
                    <h2>Sustain's Story</h2><br>
                    <h3>Our goal is to create a safe, healthy and sustainable line<br>of products for our people and communities.</h3><br>
                    <p> Sustain jewelry company started from noticing many brands that were selling hazardous
                        jewelry and wanting to make changes in the industry by creating a brand that
                        will reduce the carbon footprint and make the world a cleaner place. <br><br>We will
                        make sure the metals we use to handcraft into our jewelry will have a small
                        impact on earth. To make sure of this, 90% of our base metals will be recycled.</p>
                </div>
              </div>
              
              
            </div>
          </div>
      </div>
      <div class="col-md-1"></div>
      
    </div>
    <div class="aboutSection bg-warning">
        <div class="row bg-warning">
                <div class="col-md-3"></div>
                <div class="col-md-7">
                    <br><br>
                    <h2>How Sustain stays sustainable</h2>
                    <br><br>

                </div>
                <div class="col-md-2"></div>

        </div>
        <div class="row bg-warning">
                <div class="col-md-1">
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                        </div>  
                        <div class="col-md-9">
                            <br>
                            <img class="col-md-7" src="img/white recycling.png">
                        </div>
                    </div>      
                    <br>
                    <div class="row">  
                        <div class="col-md-12">
                            <h3 class="text-center">100% Recycled Materials</h3>
                            <p class="text-center">lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    </p>
                        </div>
                        <div class="col-md-0">
                        </div>  
                    </div> 
                    
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-3">
                        </div>  
                        <div class="col-md-9">
                            <br>
                            <img class="col-md-7" src="img/Earth Eco.png">
                        </div>
                    </div>      
                    <br>
                    <h3 class="text-center">Carbon Neutral Manufacturing</h3>
                    <p class="text-center">lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                        lorem ipsum lorem ipsum lorem ipsum lorem ipsum
                    </p>
                </div>
                <div class="col-md-1">
            </div>
        </div>
       
    </div>
    <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                
                <br><br>
                <img src="img/aboutUs.png" class="col-md-12">
                <h2><br>About Us<br></h2>
                <a class="" href="aboutUs.php">
                    <button type="button"  class="btn btn-secondary">About Our Practices</button>
                </a>
                
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-4">
                
                <img src="img/Copper-Ore-Direct-From-Mine.jpg" class="col-md-9">
                <h2>View our <br>materials<br>information</h2>
                
                <a class="" href="materials.php">
                    
                    <button type="button"  class="btn btn-secondary">Our Materials</button>
                </a>
            </div>

        </div>
        <br><br>
    
    

</body>
<?php include("navfooter.php");?>

</html>