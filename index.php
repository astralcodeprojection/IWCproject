<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sustain Jewelry Co. - Sustainable Fashion</title>
    <meta name="description" content="Sustain Jewelry Company provides sustainable jewelry made to outlast fast fashion pieces using fine minerals and our sustainably sourced gemstones and pearls.">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="">
    <?php include("nav.html");?>
    <div class="col-md-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="img/Jewelry_Wood_planks_542588_1920x1080.jpg" class="d-block w-100" alt="wood jewelry">
                            </div>
                            <div class="carousel-item">
                                <img src="img/two.jpg" class="d-block w-100" alt="filler">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
    <section id="home" class="homepage">
        
        <div class="container">
            

           
            <div class="row">
                
            </div>
            <br><br> 
            <h2 class="display-4 fw-bold">Current Collections</h2>
             <br><br>
            <div class="row">
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="img/Jewelry_Wood_planks_542588_1920x1080.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Bracelets</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="img/Jewelry_Wood_planks_542588_1920x1080.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Rings</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="img/Jewelry_Wood_planks_542588_1920x1080.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Necklaces</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;">
                        <img src="img/Jewelry_Wood_planks_542588_1920x1080.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Earrings</p>
                        </div>
                    </div>
                </div>
            </div>
            <br><br>
            
        </div>
        <br><br><br><br><br><br>
    </section>
    <br><br><br>
    <div class="row">
                <!-- needs work - ref this https://stackoverflow.com/questions/24705683/images-not-resized-based-on-bootstrap-column-size apply style
                with SASS-->
                <div class="col-md-6">
                        <img src="img/Jewelry_Wood_planks_542588_1920x1080.jpg" class="" alt="...">
                        
                </div>
                <div class="col-md-6">
                    <div >
                        <img src="img/Jewelry_Wood_planks_542588_1920x1080.jpg" class="" alt="...">
                    
                    </div>
                </div>
            </div>
    
    

</body>
<?php include("navfooter.php");?>

</html>