<?php
session_start();
?>
<?php
    require_once("connect-db.php");
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $orderId = $_POST["orderId"];
        
        
        
        $sql = "select * from orders where orderId = :orderId";
            
        $statement1 = $db->prepare($sql);
        $statement1 -> bindValue(':orderId',$orderId);
        
        
        if($statement1->execute()){
            $customers = $statement1->fetchAll();
            $statement1->closeCursor();
        }else{
            $error = "Error finding order";
        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
     <link rel="icon" type="image/x-icon" href="img/favicon_io/favicon-32x32.png">
    <title>Sustain Jewelry Co. - Sustainable Fashion</title>
    <meta name="description" content="Sustain Jewelry Company provides sustainable jewelry using fine minerals and our sustainably sourced gemstones and pearls.">
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
    <div class="col-md-12">
        
        <article class="left">

            <form method="POST" action="orderUpdateProcessing.php">
                <?php foreach($customers as $c) :?>
                    First Name: <input type="text" name="firstName" required value="<?php echo $c["firstName"];?>">
                    <br><br>
                    Last Name: <input type="text" name="lastName" required value="<?php echo $c["lastName"];?>">
                    <br><br>
                    Email: <input type="email" name="email" required value="<?php echo $c["email"];?>">
                    <br><br>
                    Address: <input type="text" name="address" required value="<?php echo $c["address"];?>">
                    <br><br>
                    State: <input type="text" name="state" required value="<?php echo $c["state"];?>">
                    <br><br>
                    City: <input type="text" name="city" required value="<?php echo $c["city"];?>">
                    <br><br>
                    Total: <input type="text" name="total" required value="<?php echo $c["total"];?>">
                    <br><br>
                    <input type="hidden" name="orderId" value="<?php echo $c["orderId"];?>">
                <?php endforeach;?>
                <input type="submit" value="Submit">
                
            </form>
        </article>
    </div>

    
    
    

</body>
<?php include("navfooter.php");?>

</html>