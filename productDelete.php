<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sustain Jewelry Co. - Sustainable Fashion</title>
    <meta name="description" content="Sustain Jewelry Company provides sustainable jewelry using fine minerals and our sustainably sourced gemstones and pearls.">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="">
    <?php include("nav.html");?>
    <div class="col-md-12">
        
        <article class="left">
            <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $orderId=$_POST["orderId"];
                    
                    require_once("connect-db.php");
                    $sql = "delete from products where productId = $productId";
                    
                    $statement1=$db->prepare($sql);
                    
                    if($statement1->execute()){
                        $statement1->closeCursor();
                        $success = "Successfully deleted product.";
                    }else{
                        $error = "Error deleting product";
                    }
                }
            ?>
            <?php
                if($error != ""){
                    echo $error;
                }else{
                    echo $success;
                }
            ?>    
        </article>
    </div>

    
    
    

</body>
<?php include("navfooter.php");?>

</html>