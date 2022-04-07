<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Contact Us - Sustain Jewelry Co.</title>
    <meta name="description" content="Contact information for Sustain Jewelry Company.">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>
<body>

<article>
            <?php
            
            require_once("connect-db.php");
            
            $error = $success = $productId = $userId = $name = $price = $qty = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $productId = $_POST["itemId"];
                $userId = $_POST["userId"];
                $name = $_POST["name"];
                $price = $_POST["price"];
                $qty = $_POST["qty"];
                
             $sql = "insert into cart (userId, name, price, qty) VALUES (:userId, :name, :price, :qty)";
                
                $statement1 = $db->prepare($sql);
                
                $statement1->bindValue(':userId', $userId);
                $statement1->bindValue(':name', $name);
                $statement1->bindValue(':price', $price);
                $statement1->bindValue(':qty', $qty);
               
                function test_input($data) {
                       $data = trim($data);
                       $data = stripslashes($data);
                       $data = htmlspecialchars($data);
                       return $data;
                     }
                
                if($statement1->execute()){
                    $statement1->closeCursor();
                    $success = "Items added to Cart!";
                 }else{
                    $error="Error entering request.";
                };

        
        ?>
            <?php
                if($error !=""){
                    echo "<h3>$error</h3>";
                }else{
                    echo "<h3>$success</h3>";
                }
                
        }//end of post
                ?>

        </article>


</body>
<?php include("navfooter.php");?>

</html>