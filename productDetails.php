<?php
session_start();
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Successful Order - Sustain Jewelry Co.</title>
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
    <?php include("nav.html");?>
<div class="container">
    <div class="row text-center">
        
      <h1 class="display-3 fw-bold">Review Item</h1>
      <div class="heading-line mb-1"></div>
    </div>
        <br><br>

    
      <div class="row">
        <div class="col-md-6">
            <div class="bg-white p-4 text-start">
            <article>
           <h3>Item Details</h3>
            <form method="POST" action="addToCart.php">
           
               
                <?php
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $productId = $_POST["productId"];

                    if($_SESSION["logged_in"] = "true"){
                        
                    }

                    require_once("connect-db.php");
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
                        
                        SKU (Item Id)
                        <input type="text" name="productId" value="<?php echo $c["productId"];?>">
                        <br><br>
                        user Id)
                        <?php 
                            if($_SESSION["logged_in"] != "true"){
    
                                echo "999999";
                            }
                            if($_SESSION["logged_in"] = "true"){

                                echo $_SESSION["userId"];
                            }
                        
                        ?>
                        <input type="hidden" name="userId" value="<?php 
                            if($_SESSION["logged_in"] != "true"){
    
                                echo "999999";
                            }
                            if($_SESSION["logged_in"] = "true"){

                                echo $_SESSION["userId"];
                            }
                        ?>">
                        <br><br>
                        Item Name:
                        <input type="text" name="name" value="<?php echo $c["name"];?>" readonly>
                        <br><br>
                        Price:
                        <input type="text" name="price" value="<?php echo $c["price"];?>" readonly>
                        <br><br>
                        Quantity:
                        <input type="text" name="qty" required>
                        <br><br>
                        Description:
                        <input type="text" name="description" value="<?php echo $c["description"]?>" readonly>
                        <br><br>
                        Category:
                        <input type="text" name="category" value="<?php echo $c["category"];?>" readonly>
                        <br><br>
                        
                        
                      <?php } ?>

                        <input type="submit" value="Submit">

                      </form>
           
        </article>
            </div>
        </div>
        <div class="col-md-6">
            
        </div>
      </div>
  </div>

</body>
<?php include("navfooter.php");?>

</html>