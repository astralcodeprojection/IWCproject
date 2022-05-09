<?php
session_start();


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Review Item - Sustain Jewelry Co.</title>
    <meta name="description" content="Successful Order">
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
    <div class="row text-center">
        
      <h2 class="display-3 fw-bold">Review Item</h2>
      <div class="heading-line mb-1"></div>
    </div>
        <br><br>

    
      <div class="row">
        <div class="col-md-12">
            <div class="bg-white p-4 text-start">
            <article>
           <h2>Item Details</h2>
           
            <form method="POST" action="addToCart.php">
           
               
                <?php
                require_once("connect-db.php");
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $productId = $_POST["productId"];

                    
                    $error = "";
                    
                    $sql = "select * from products where productId = :productId";

                    $statement1 = $db->prepare($sql);
                    $statement1 -> bindValue(':productId', $productId);
                    
                    function test_input($data) {
                      $data = trim($data);
                      $data = stripslashes($data);
                      $data = htmlspecialchars($data);
                      return $data;
                    }

                    if($statement1->execute()){
                        $customers = $statement1->fetchAll();
                        $statement1->closeCursor();
                    }else{
                        $error = "Error finding item";
                    };
                 }
                ?>
                
                
                <?php    
                    foreach($customers as $c){?>
                        
                        <input type="hidden" name="productId" value="<?php echo $c["productId"];?>">
                        <input type="hidden" name="userId" value="<?php 
                            if($_SESSION["logged_in"] != "true"){
                                echo "999999";
                            } else {

                                echo $_SESSION["userId"];
                            }
                        ?>">
                        <br><br>
                        <div class="card w-100">
                            <div class="row g-0">
                                <div class="col-md-4 text-center">
                                    <img src="<?php echo $c["img"]?>" class="img-fluid rounded-start" style="max-height: 15rem" alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title" name="name"><?php echo $c["name"]?></h5>
                                        <p class="card-text" name="description"><?php echo $c["description"]?></p>
                                        <p class="card-text" name="price"><medium class="text-muted">Price: $<?php echo $c["price"]?></medium></p>
                                        Quantity: <input class="card-text" type="number" name="qty" required><br>
                                         <input type="submit" value="Add To Bag">
                                        
                                    </div>
                                </div> 
                                <div class="col-md-2 card-body">
                                    <div>
                                       
                                        
                                    </div>
                                </div>
                            </div>
                        </div> 
                       
                        
                        
                      <?php } ?>

                       

                      </form>
           
        </article>
            </div>
        </div>
        <!-- <div class="col-md-6">
            
        </div> -->
      </div>
  </div>

</body>
<?php include("navfooter.php");?>

</html>