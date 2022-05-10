<?php
session_start();
if($_SESSION["logged_in"] != "true"){
    
$userId = 99999;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
     <link rel="icon" type="image/x-icon" href="img/favicon_io/favicon-32x32.png">
    <title>Shop Bracelets - Sustain Jewelry Co.</title>
    <meta name="description" content="Shop our beautiful, ethically sourced bracelets. Sustain Jewelry provides a large collection of the most affordable, fine mineral, natural jewelry.">
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
        <br><br><h2>Bracelets</h2><br>
       <div class="row">
          
           <div class="col-md-1"></div>
           <div class="col-md-10"></div>
                <div class="cardComponent">
                    <?php
                    
                    $userId = $_SESSION["userId"];
                    
                    require_once("connect-db.php");
                    $error1 = "";

                    $sql = "select * from products WHERE category LIKE 'Bracelets%'";
                
                    $statement1 = $db->prepare($sql);
                    
                
                    if($statement1->execute()){
                        $products = $statement1->fetchAll();
                        $statement1->closeCursor();
                    }else{
                        $error1= "Error finding items.";
                    }
                
                
                ?>
                    <?php
                            foreach($products as $c){?>
                                    <div class="" >
                                        <div class="card" style="width: 18rem;">
                                            <img src="<?php echo $c["img"];?>" class="card-img-top" alt="...">
                                            <div class="card-body d-flex flex-column">
                                                <h5 class="card-title"><?php echo $c["name"];?></h5>
                                                <h5 class="card-title"> <?php echo "$".$c["price"];?></h5>
                                                <p class="card-text"><?php echo $c["description"];?></p>
                                                <form action="productDetails.php" method="post" class="mt-auto">
                                                    <input type="hidden" name="productId" value="<?php echo $c["productId"];?>">
                                                    <button class="btn btn-secondary" type="submit">Details</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                
                                
                        <?php } ?>
                    </div>
           </div>
           <div class="col-md-1"></div>

       </div>  
      
    
    

</body>
<?php include("navfooter.php");?>

</html>