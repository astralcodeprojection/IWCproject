<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Shop Rings - Sustain Jewelry Co.</title>
    <meta name="description" content="Shop our beautiful, ethically sourced rings. Sustain Jewelry provides a large collection of the most affordable, fine mineral, natural jewelry.">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/js/filter.js"></script>
</head>

<body class="">
    <?php include("nav.html");?>
    <div class="container">
        <br><br><h2>Check out our collections by<br>category here!</h2><br>
        <div class="row">
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="img/Jewelry_Wood_planks_542588_1920x1080.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Bracelets</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="img/Jewelry_Wood_planks_542588_1920x1080.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Rings</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="img/Jewelry_Wood_planks_542588_1920x1080.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">Necklaces</p>
                        </div>
                    </div>
                </div>
            </div>
            
       </div>
       <div class="row">
          
           <div class="col-md-1"></div>
           <div class="col-md-10">
                <h2>Shop<h2>
                 <div id="myBtnContainer">
                    <button class="btn active" onclick="filterSelection('all')"> Show all</button>
                    <button class="btn" onclick="filterSelection('nature')"> Nature</button>
                    <button class="btn" onclick="filterSelection('cars')"> Cars</button>
                    <button class="btn" onclick="filterSelection('people')"> People</button>
                </div>
                <div class="row">
                    <div class="column nature">
                        <div class="content">
                        <img src="img/51QoNEAsyjL.jpg" alt="Mountains" style="width:20%">
                        <h4>Mountains</h4>
                        <p>Lorem ipsum dolor..</p>
                        </div>
                    </div>
                    <div class="column nature">
                        <div class="content">
                        <img src="img/51QoNEAsyjL.jpg" alt="Lights" style="width:20%">
                        <h4>Lights</h4>
                        <p>Lorem ipsum dolor..</p>
                        </div>
                    </div>
                    <div class="column nature">
                        <div class="content">
                        <img src="img/51QoNEAsyjL.jpg" alt="Nature" style="width:20%">
                        <h4>Forest</h4>
                        <p>Lorem ipsum dolor..</p>
                        </div>
                    </div>
                    
                    <div class="column cars">
                        <div class="content">
                        <img src="img/51QoNEAsyjL.jpg" alt="Car" style="width:20%">
                        <h4>Retro</h4>
                        <p>Lorem ipsum dolor..</p>
                        </div>
                    </div>
                    <div class="column cars">
                        <div class="content">
                        <img src="img/51QoNEAsyjL.jpg" alt="Car" style="width:20%">
                        <h4>Fast</h4>
                        <p>Lorem ipsum dolor..</p>
                        </div>
                    </div>
                    <div class="column cars">
                        <div class="content">
                        <img src="img/51QoNEAsyjL.jpg" alt="Car" style="width:20%">
                        <h4>Classic</h4>
                        <p>Lorem ipsum dolor..</p>
                        </div>
                    </div>

                    <div class="column people">
                        <div class="content">
                        <img src="img/51QoNEAsyjL.jpg" alt="Car" style="width:20%">
                        <h4>Girl</h4>
                        <p>Lorem ipsum dolor..</p>
                        </div>
                    </div>
                    <div class="column people">
                        <div class="content">
                        <img src="img/51QoNEAsyjL.jpg" alt="Car" style="width:20%">
                        <h4>Man</h4>
                        <p>Lorem ipsum dolor..</p>
                        </div>
                    </div>
                    <div class="column people">
                        <div class="content">
                        <img src="img/51QoNEAsyjL.jpg" alt="Car" style="width:20%">
                        <h4>Woman</h4>
                        <p>Lorem ipsum dolor..</p>
                        </div>
                    </div>
                <!-- END GRID -->
                </div>
           </div>
           <div class="col-md-1"></div>

       </div>  
      
    
    

</body>
<?php include("navfooter.php");?>

</html>