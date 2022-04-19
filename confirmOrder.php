<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Order Confirmation - Sustain Jewelry Co.</title>
    <meta name="description" content="Order Confirmation">
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

    <?php 
    require_once("connect-db.php");
    $error = $success = $productId = $name = $email = $userId = $firstName = $lastName = $address = $state = $city = $qty = $total = $newsletter = $shipping = $payMethod = "";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $productId = $_POST["productId"];
        $userId = $_POST["userId"];
        $qty = $_POST["qty"];

        $sql="insert into orders (userId, productId, name, email, firstName, lastName, address, state, city, qty, total, newsletter, shipping, payMethod) VALUES (:userId, :productId, :name, :email, :firstName, :lastName, :address, :state, :city, :qty, :total, :newsletter, :shipping, :payMethod)";

        $statement1 = $db->prepare($sql);


        $statement1->bindValue(':userId', $userId);
        $statement1->bindValue(':productId', $productId);
        $statement1->bindValue(':name', $name);
        $statement1->bindValue(':email', $email);
        $statement1->bindValue(':firstName', $firstName);
        $statement1->bindValue(':lastName', $lastName);
        $statement1->bindValue(':address', $address);
        $statement1->bindValue(':state', $state);
        $statement1->bindValue(':city', $city);
        $statement1->bindValue(':qty', $qty);
        $statement1->bindValue(':total', $total);
        $statement1->bindValue(':newsletter', $newsletter);
        $statement1->bindValue(':shipping', $shipping);
        $statement1->bindValue(':payMethod', $payMethod);

        if($statement1->execute()){
            $statement1->closeCursor();
            $success = "Order Successful.";
         }else{
            $error="Error entering order.";
        };
    
    
    
                if($error !=""){
                    echo "<h3>$error</h3>";
                }else{
                    echo "<h3>$success</h3>";
                    
                }
                
        }//end of post
        ?>
                
    

</body>
<?php include("navfooter.php");?>

</html>