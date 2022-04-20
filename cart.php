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
            
        <h2 class="display-3 fw-bold">Cart</h2>
        <div class="heading-line mb-1"></div>
        </div>
            <br><br>

    <!-- START THE DESCRIPTION CONTENT  -->
    
                

        <?php
            
            require_once("connect-db.php");
            
            /* delete/update if post is set for it */
            if(isset($_POST['delete'])){
                
                $productId = $_POST["productId"];
                $delQty = $_POST["qty"];
                $userId = $_POST["userId"];
                $delete_sql = "delete from cart WHERE productId = :productId AND userId = :userId";
                $delete = $db->prepare($delete_sql);
                $delete->bindValue(":productId", $productId);
                $delete->bindValue(":userId", $userId);
            
                if($delete->execute()){
                    $delete->closeCursor();
                    $success2 = "Success deleting product.";
                } else {
                    $error2 = "Error deleting product.";
                }
            }elseif(isset($_POST['add'])){
                $productId = $_POST["productId"];
                $curAmt = $_POST["qty"];
                $userId = $_POST["userId"];

                $curAmt += 1;
                $addSql = "update cart set qty = :curAmt where productId = :productId AND userId = :userId";
                $add = $db->prepare($addSql);
                $add->bindValue(":curAmt", $curAmt);
                $add->bindValue(":productId", $productId);
                $add->bindValue(":userId", $userId);
                

                if($add->execute()){
                    $add->closeCursor();
                    $success3 = "Success adding one product.";
                } else{
                    $error3 = "Error addign one product.";
                }
            }elseif(isset($_POST['removeone'])){
                $productId = $_POST["productId"];
                $delQty = $_POST["qty"];
                $userId = $_POST["userId"];
                if($delQty > 1){
                    $delQty = $delQty - 1;
                    
                    $reduce_sql = "update cart set qty = :delQty WHERE productId = :productId AND userId = :userId";
                    $reduce = $db->prepare($reduce_sql);
                    $reduce->bindValue(":delQty", $delQty);
                    $reduce->bindValue(":productId", $productId);
                    $reduce->bindValue(":userId", $userId);
                    if($reduce->execute()){
                        $reduce->closeCursor();
                    }
                } else if($delQty == 1){
                    $delete_sql = "delete from cart WHERE productId = :productId AND userId = :userId";
                    $delete = $db->prepare($delete_sql);
                    $delete->bindValue(":productId", $productId);
                    $delete->bindValue(":userId", $userId);
                
                    if($delete->execute()){
                        $delete->closeCursor();
                        $success2 = "Success deleting product.";
                    } else {
                        $error2 = "Error deleting product.";
                    } 
                }
            }
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
                $statement1 -> bindValue(':userId' , $userId);
                
            
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
                                <form style="" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                    <input type="hidden" name="productId" value="<?php echo $item["productId"]?>">
                                    <input type="hidden" name="userId" value="<?php echo $item["userId"]?>">
                                    <input type="hidden" name="qty" value="<?php echo $item["qty"]?>">

                                    <button type="submit" style="padding: 1%; background-color: rgb(59, 110, 85); color: #FFFFFF; border: 0px; border-radius: 25%; font-size: 0.9em;"name="add" class="redirect_button">+</button>
                                    <button type="submit" style="padding: 1%; background-color: rgb(203, 68, 75); color: #FFFFFF; border: 0px; border-radius: 25%; font-size: 0.9rem;"name="removeone" class="redirect_button">-</button>

                                </form>
                            </div>
                        </div> 
                        <div class="col-md-2 card-body">
                            <div>
                                <form style="margin: 25%; width: 100%;" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                                    <input type="hidden" name="productId" value="<?php echo $item["productId"]?>">
                                    <input type="hidden" name="userId" value="<?php echo $item["userId"]?>">
                                    <input type="hidden" name="qty" value="<?php echo $item["qty"]?>">
                                    
                                    <button type="submit" style="padding: 2%; background-color: rgb(59, 110, 85); color: #FFFFFF; border: 0px; border-radius: 15px; font-size: 1.1rem;"name="delete" class="redirect_button">Remove From Cart</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
            
            <br>
            <?php } ?>        
                   
            <br><br><br>

            <article>
                <form action="confirmOrder.php" method="post">
                    <input type="hidden" name="productId" value="<?php echo $item["productId"]?>">
                    <input type="hidden" name="userId" value="<?php echo $item["userId"]?>">
                    <input type="hidden" name="qty" value="<?php echo $item["qty"]?>">
                <button type="submit">Checkout</button>
                </form>
                </div>
            </article>
            </div>
        </div>
    </div>
    
    
    

</body>
<?php include("navfooter.php");?>

</html>