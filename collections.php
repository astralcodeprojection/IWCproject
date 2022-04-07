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
    <title>Collections - Sustain Jewelry Co.</title>
    <meta name="description" content="Sustain Jewelry's current collection of jewelry accessories.">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="assets/js/filter.js"></script>
</head>

<body class="">
    <?php include("nav.html");?>
    <div class="container">
        <br><br><h2>Check out our !</h2><br>
       <div class="row">
          
           <div class="col-md-1"></div>
           <div class="col-md-10"></div>
                <div class="cardComponent">
                    <?php
                    
                    $userId = $_SESSION["userId"];
                    
                    require_once("connect-db.php");
                    $error1 = "";

                    $sql = "select * from products";
                
                    $statement1 = $db->prepare($sql);
                    $statement1 -> bindValue(':userId' , $userId);
                    
                
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
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $c["name"];?></h5>
                                                <h5 class="card-title"> <?php echo $c["price"]." $";?></h5>
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