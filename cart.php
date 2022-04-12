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
    <?php include("nav.html");?>
    <div class="container">
        <div class="row text-center">
            
        <h1 class="display-3 fw-bold">Cart</h1>
        <div class="heading-line mb-1"></div>
        </div>
            <br><br>

    <!-- START THE DESCRIPTION CONTENT  -->
    
        <div class="row">
            <div class="col-md-12">
                <article class="left">

                <?php
                    
                    require_once("connect-db.php");
                    if($_SESSION["logged_in"] != "true"){
                    
                    
                        $error1 = "";

                        $sql = "select * from cart WHERE userId = '999999%'";
                    
                        $statement1 = $db->prepare($sql);
                        
                    
                        if($statement1->execute()){
                            $customers = $statement1->fetchAll();
                            $statement1->closeCursor();
                        }else{
                            $error1= "Error finding cart.";
                        }
                    } else {

                        $userId = $_SESSION["userId"];
                    
                    
                        $error1 = "";

                        $sql = "select * from cart WHERE userId = :userId";
                    
                        $statement1 = $db->prepare($sql);
                        $statement1 -> bindValue(':userId' , $userId);
                        
                    
                        if($statement1->execute()){
                            $customers = $statement1->fetchAll();
                            $statement1->closeCursor();
                        }else{
                            $error1= "Error finding cart.";
                        }
                    }
                    
                
                
                ?>
            <h3>Cart Contents</h3>
                <table>
                    <tr>
                    
                        <th>Menu Item</th>
                        <th>Price</th>
                        <th>qty</th>
                        <th>user Id</th>
                        
                    
                    </tr>
                
                    <?php
                        foreach($customers as $c){?>
                    <tr>
                        <td><?php echo $c["n"];?></td>
                        <td><?php echo $c["price"]." $";?></td>
                        
                        <td><?php echo $c["qty"];?></td>
                        <td><?php echo $c["userId"];?></td>
                        
                        <td>
                            <form action="xxxx.php" method="post">
                                <input type="hidden" name="preId" value="<?php echo $c["preId"];?>">
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                        
                    </tr>
                    <?php } ?>
                </table>                 
                <br><br><br>
            <article>
            
            <div>
                            <form action="confirmpurchase.php" method="post">
                            
                            <button type="submit">Checkout</button>
                            </form>
                </div>
            </article>
            </article>
            </div>
            <div class="col-md-6">
                <div class="bg-white p-4 text-start">
                <p class="fw-light">
                    a 6 column text post a 6 column text post a 6 column text post a 6 column text post a 6 column text post a 6 column text post a 6 column text post a 6 column text post 
                </p>
                </div>
            </div>
        </div>
    </div>
    
    
    

</body>
<?php include("navfooter.php");?>

</html>