<?php
session_start();
?>
<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $productId = $_POST["productId"];
        
        
        require_once("connect-db.php");
        $sql = "select * from products where productId = :productId";
            
        $statement1 = $db->prepare($sql);
        $statement1 -> bindValue(':productId',$productId);
        
        
        if($statement1->execute()){
            $customers = $statement1->fetchAll();
            $statement1->closeCursor();
        }else{
            $error = "Error finding product";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sustain Jewelry Co. - Sustainable Fashion</title>
    <meta name="description" content="Sustain Jewelry Company provides sustainable jewelry using fine minerals and our sustainably sourced gemstones and pearls.">
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
    <div class="col-md-12">
        
        <article class="left">

            <form method="POST" action="productUpdateProcessing.php">
                <?php foreach($customers as $c) :?>
                    Name: <input type="text" name="name" required value="<?php echo $c["name"];?>">
                    <br><br>
                    Price: <input type="float" name="price" required value="<?php echo $c["price"];?>">
                    <br><br>
                    Category: <input type="text" name="category" required value="<?php echo $c["category"];?>">
                    <br><br>
                    Description: <input type="text" name="description" required value="<?php echo $c["description"];?>">
                    <br><br>
                    Server Image: <input type="text" name="img" required value="<?php echo $c["img"];?>">
                    <br><br>
                    Keywords: <input type="text" name="keywords" required value="<?php echo $c["keywords"];?>">
                    <br><br>
                    <input type="hidden" name="productId" value="<?php echo $c["productId"];?>">
                <?php endforeach;?>
                <input type="submit" value="Submit">
                
            </form>
        </article>
    </div>

    
    
    

</body>
<?php include("navfooter.php");?>

</html>