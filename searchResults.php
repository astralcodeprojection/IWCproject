<?php
session_start();
?>
<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $query = $_POST['query'];
        
        
        require_once("connect-db.php");
        $sql = "SELECT * FROM products WHERE (`name` LIKE '%".$query."%')";
            
        $statement1 = $db->prepare($sql);
        $statement1 -> bindValue(':query', $query);
        
        
        if($statement1->execute()){
            $products = $statement1->fetchAll();
            $statement1->closeCursor();
        }else{
            $error = "Error finding search";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
     <link rel="icon" type="image/x-icon" href="img/favicon_io/favicon-32x32.png">
    <title>Search Results - Sustain Jewelry Co.</title>
    <meta name="description" content="Search Results for Sustain Jewelry Company. Shop our sustainable gemstones, moonstones, and birthstones">
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
        <br><br><h2>Results</h2><br>
       <div class="row">
          
           <div class="col-md-1"></div>
           <div class="col-md-10"></div>
                <div class="cardComponent">
                    <?php
                            foreach($products as $c){?>
                                    <div class="" >
                                        <div class="card" style="width: 18rem;">
                                            <img src="<?php echo $c["img"];?>" class="card-img-top" alt="...">
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $c["name"];?></h5>
                                                <h5 class="card-title"> <?php echo "$".$c["price"];?></h5>
                                                <p class="card-text"><?php echo $c["description"];?></p>
                                                <form action="productDetails.php" method="post">
                                                    <input type="hidden" name="productId" value="<?php echo $c["productId"];?>">
                                                    <button class="btn btn-primary" type="submit">Details</button>
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