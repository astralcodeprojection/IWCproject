<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
     <link rel="icon" type="image/x-icon" href="img/favicon_io/favicon-32x32.png">
    <title>Shipping - Sustain Jewelry Co.</title>
    <meta name="description" content="Shipping info for Sustain Jewelry Company">
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
        if(isset($_POST["items"])){
            //items here
            $items = $_POST["items"];
            $allItems = implode(',', $items);
            $orderId = $_POST["orderId"];
            $userId = $_POST["userId"];
            $productId = $_POST["productId"];
            $total = $_POST["total"];
            $qty = $_POST["qty"];
        } else{
            //redirect cart
            header('Location:cart.php');
        }

        if($_SESSION["logged_in"] != "true"){
            //no data for customer to grab
        }else {
            $customerSQL = "select * from users WHERE userId = :userId";
        
            $customerStatement = $db->prepare($customerSQL);
            $customerStatement -> bindValue(':userId', $userId);
            $customerStatement -> bindValue(':firstName', $firstName);
            $customerStatement -> bindValue(':lastName', $lastName);
            
        
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
    
    
    <div class="container">
        <div class="row text-center">
            <h2 class="display-3 fw-bold">Shipping Method</h2>
            <div class="heading-line mb-1"></div>
        </div>
        <form action="payment.php" method="POST">
            <div class="row">
                <div class="col">
                    <input name="firstName" type="text" class="form-control" placeholder="First name" aria-label="First name" value="<?php echo $thisCustomer["firstName"]?>">
                </div>
                <div class="col">
                    <input name="lastName" type="text" class="form-control" placeholder="Last name" aria-label="Last name" value="<?php echo $thisCustomer["lastName"]?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input name="address" type="text" class="form-control" placeholder="555 Cherry St." aria-label="Address" value="<?php echo $thisCustomer["address"]?>">
                </div>
                <div class="col">
                    <input name="city" type="text" class="form-control" placeholder="City" aria-label="City" value="<?php echo $thisCustomer["city"]?>">
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input name="zip" type="number" class="form-control" placeholder="XXXXX" aria-label="Zip Code" value="<?php echo $thisCustomer["zip"]?>">
                </div>
                <div class="col">
                    <select name="state" type="text" class="form-select" placeholder="State" aria-label="State" value="<?php echo $thisCustomer["state"]?>">
                        <option value="AL">Alabama</option>
                        <option value="AK">Alaska</option>
                        <option value="AZ">Arizona</option>
                        <option value="AR">Arkansas</option>
                        <option value="CA">California</option>
                        <option value="CO">Colorado</option>
                        <option value="CT">Connecticut</option>
                        <option value="DE">Delaware</option>
                        <option value="FL">Florida</option>
                        <option value="GA">Georgia</option>
                        <option value="HI">Hawaii</option>
                        <option value="ID">Idaho</option>
                        <option value="IL">Illinois</option>
                        <option value="IN">Indiana</option>
                        <option value="IA">Iowa</option>
                        <option value="KS">Kansas</option>
                        <option value="KY">Kentucky</option>
                        <option value="LA">Louisiana</option>
                        <option value="ME">Maine</option>
                        <option value="MD">Maryland</option>
                        <option value="MA">Massachusetts</option>
                        <option value="MI">Michigan</option>
                        <option value="MN">Minnesota</option>
                        <option value="MS">Mississippi</option>
                        <option value="MO">Missouri</option>
                        <option value="MT">Montana</option>
                        <option value="NE">Nebraska</option>
                        <option value="NV">Nevada</option>
                        <option value="NH">New Hampshire</option>
                        <option value="NJ">New Jersey</option>
                        <option value="NM">New Mexico</option>
                        <option value="NY">New York</option>
                        <option value="NC">North Carolina</option>
                        <option value="ND">North Dakota</option>
                        <option value="OH">Ohio</option>
                        <option value="OK">Oklahoma</option>
                        <option value="OR">Oregon</option>
                        <option value="PA">Pennsylvania</option>
                        <option value="RI">Rhode Island</option>
                        <option value="SC">South Carolina</option>
                        <option value="SD">South Dakota</option>
                        <option value="TN">Tennessee</option>
                        <option value="TX">Texas</option>
                        <option value="UT">Utah</option>
                        <option value="VT">Vermont</option>
                        <option value="VA">Virginia</option>
                        <option value="WA">Washington</option>
                        <option value="WV">West Virginia</option>
                        <option value="WI">Wisconsin</option>
                        <option value="WY">Wyoming</option>
                    </select>

                    
                </div>
            </div>
            <div class="shippingSelection">
                <div class="row">
                    <div class="col">
                    <div class="form-check">
                        <input class="form-check-input bg-warning" type="radio" name="shipping" id="exampleRadios1" value="standard" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Standard Shipping (Free)
                            <?php $totalWShipping= $total;?>
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input bg-warning" type="radio" name="shipping" id="exampleRadios2" value="express">
                        <label class="form-check-label" for="exampleRadios2">
                            Express Shipping (7.99)
                            <?php $totalWShipping= $total+7.99;?>
                        </label>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="userId" value="<?php echo $userId?>">
            <input type="hidden" name="items" value="<?php echo $allItems?>">
            <input type="hidden" name="total" value="<?php echo $totalWShipping?>">
            <input type="hidden" name="qty" value="<?php echo $qty?>">
            
         

            <div style="text-align: center; margin: 2%;">
                <button style="padding: 1%; background-color: rgb(59, 110, 85); color: #FFFFFF; border: 0px; border-radius: 15px; font-size: 1.1rem;" type="submit">Proceed to Payment</button>
            </div>
        </form>
            
            
        </div>
    </div>
    

</body>
<?php include("navfooter.php");?>

</html>