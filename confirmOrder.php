<?php
// start the session
session_start();


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Cart - Sustain Jewelry Co.</title>
    <meta name="description" content="View your cart, and checkout the items you've selected from Sustain Jewelry.">
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
            
        <h2 class="display-3 fw-bold">Confirm Order</h2>
        <div class="heading-line mb-1"></div>
        </div>
            <br><br>

    <!-- START THE DESCRIPTION CONTENT  -->
    
                

        <?php
            
            require_once("connect-db.php");

            /* grab all cart items */
            if($_SESSION["logged_in"] != "true"){
                    $error1 = "";

                    

                    $sql = "select * from cart join products on products.productId = cart.productId WHERE userId = '999999%'";
                
                    $statement1 = $db->prepare($sql);
                
                    if($statement1->execute()){
                        $items = $statement1->fetchAll();
                        $statement1->closeCursor();
                    }else{
                        $error1= "Error finding cart.";
                    }
            }else {

                $userId = $_SESSION["userId"];
            
            
                $error1 = "";

                $sql = "select * from cart join products on products.productId = cart.productId WHERE userId = :userId";
            
                $statement1 = $db->prepare($sql);
                $statement1 -> bindValue(':userId', $userId);
                
            
                if($statement1->execute()){
                    $items = $statement1->fetchAll();
                    $statement1->closeCursor();
                }else{
                    $error1= "Error finding cart.";
                }
            }
                    
                
        ?>
            <h3>Cart Contents</h3>
                
                
            <?php
            if(count($items) == 0){
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <p>You do not have any items in your cart. <a href="collections.php" style="color: blue">Browse our inventory</a></p>
                    </div>
                </div>
                <?php
            }
                foreach($items as $item){?>
            
                
            <div class="row">
                
                <div class="card w-100">
                    <div class="row g-0">
                        <div class="col-md-4 text-center">
                            <img src="<?php echo $item["img"]?>" class="img-fluid rounded-start" style="max-height: 15rem" alt="...">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item["name"]?></h5>
                                <p class="card-text"><?php echo $item["description"]?></p>
                                <p class="card-text"><medium class="text-muted">Price: $<?php echo $item["price"]?></medium></p>
                                <p class="card-text"><medium class="text-muted">Quantity: <?php echo $item["qty"]?></medium></p>
                            </div>
                        </div> 
                    </div>
                </div>  
            </div>
            <a href="cart.php" style="color: blue; text-align: center"><p>Change items</p></a>
            <br>
            <?php } ?>        
                   
            <?php
                $total = 0.00;
                foreach($items as $item){
                    $total += ($item["qty"] * $item["price"]);
                }
                $highestOrderSQL = "select MAX(siteOrderId) from orders"; //move this to when they actually place the order
                $highestOrderStatement = $db->prepare($highestOrderSQL);
                
                if($highestOrderStatement->execute()){
                    $highestOrders = $highestOrderStatement->fetchAll();
                    $highestOrderStatement->closeCursor();
                }
                $newOrderId = 0;
                foreach($highestOrders as $order){
                    foreach($order as $max){
                        $newOrderId = $max;
                    } 
                }
                $newOrderId += 1;
            ?>

            <article>
                <form action="shipping.php" method="post">
                    <input type="hidden" name="userId" value="<?php echo $item["userId"]?>">
                    <input type="hidden" name="items[]" value="<?php echo $total?>">
                    <input type="hidden" name="total" value="<?php echo $total?>">
                    <input type="hidden" name="qty" value="<?php echo $qty?>">
                    <p style="text-align: center; font-size: 1.1rem; font-weight: bold;">Total: $<?php echo $total?></p>
                    <div style="text-align: center; margin: 2%;">
                        <button style="padding: 1%; background-color: rgb(59, 110, 85); color: #FFFFFF; border: 0px; border-radius: 15px; font-size: 1.1rem;" type="submit">Proceed to Shipping</button>
                    </div>
                </form>
                
                </div>
            </article>
            </div>
        </div>
    </div>
</body>
<?php include("navfooter.php");?>

</html>