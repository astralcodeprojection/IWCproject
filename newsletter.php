<?php
session_start();
?>

<body class="">


    <?php
        if(isset($_POST["items"])){
            //items here
            $items = $_POST["items"];
            $allItems = implode(',', $items);
            $orderId = $_POST["orderId"];
            $userId = $_POST["userId"];
            $productId = $_POST["productId"];
            $total = $_POST["total"];
            $firstName = $_POST["firstName"];
            $lastName = $_POST["lastName"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $card = $_POST["card"];
            $cvc = $_POST["cvc"];
            $cardName = $_POST["cardName"];
            $zip = $_POST["zip"];
            
        } else{
            //redirect cart
            header('Location:cart.php');
        }

        if($_SESSION["logged_in"] != "true"){
            //no data for customer to grab
        }else {
            $customerSQL = "select * from users WHERE userId = :userId";
        
            $customerStatement = $db->prepare($customerSQL);
            $customerStatement -> bindValue(':items', $items);
            $customerStatement -> bindValue(':userId', $userId);
            $customerStatement -> bindValue(':total', $totalPrice);

            
            
        
            if($customerStatement->execute()){
                $customers = $customerStatement->fetchAll();
                $customerStatement->closeCursor();
            }else{
                $error1= "Error finding customer.";
            }
            $thisCustomer;
            foreach($customers as $customer){
                $thisCustomer = $customer;
            }
        }
     ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Newsletter - Sustain Jewelry Co.</title>
    <meta name="description" content="Payment for Sustain Jewelry Company">
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
            <h2 class="display-3 fw-bold">Thank You!</h2>
            <div class="heading-line mb-1"></div>
        </div>
        <form action="finalizePayment.php" method="POST">
            <h4>Would you like a copy of our newsletter monthly?</h4>
            <div class="row">
                <div class="col">
                <div class="form-check">
                    <input class="form-check-input bg-warning" type="radio" name="newsletter" id="exampleRadios1" value="yes" checked>
                    <label class="form-check-label" for="exampleRadios1">
                        Subscribe
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input bg-warning" type="radio" name="newsletter" id="exampleRadios2" value="no">
                    <label class="form-check-label" for="exampleRadios2">
                        No thanks
                    </label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="items" value="<?php echo $allItems?>">
            <input type="hidden" name="userId" value="<?php echo $userId?>">
            <input type="hidden" name="total" value="<?php echo $total?>">
            <input type="hidden" name="firstName" value="<?php echo $firstName?>">
            <input type="hidden" name="lastName" value="<?php echo $lastName?>">
            <input type="hidden" name="address" value="<?php echo $address?>">
            <input type="hidden" name="city" value="<?php echo $city?>">
            <input type="hidden" name="state" value="<?php echo $state?>">
            <input type="hidden" name="items" value="<?php echo $items?>">
            <input type="hidden" name="total" value="<?php echo $total?>">
            <input type="hidden" name="card" value="<?php echo $card?>">
            <input type="hidden" name="cvc" value="<?php echo $cvc?>">
            <input type="hidden" name="cardName" value="<?php echo $cardName?>">
            <input type="hidden" name="zip" value="<?php echo $zip?>">


            <p style="text-align: center; font-size: 1.1rem; font-weight: bold;">Total: $<?php echo $total?></p>
            <div style="text-align: center; margin: 2%;">
                <button style="padding: 1%; background-color: rgb(59, 110, 85); color: #FFFFFF; border: 0px; border-radius: 15px; font-size: 1.1rem;" type="submit">Finalize</button>
            </div>
        </form>
            
            
        </div>
    </div>
    
    

</body>
<?php include("navfooter.php");?>

</html>