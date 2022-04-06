<?php
session_start();
?>
<?php
    if($_SERVER["REQUEST_METHOD"]== "POST"){
        $orderId = $_POST["orderId"];
        
        
        require_once("connect-db.php");
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
    <title>Sustain Jewelry Co. - Sustainable Fashion</title>
    <meta name="description" content="Sustain Jewelry Company provides sustainable jewelry using fine minerals and our sustainably sourced gemstones and pearls.">
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body class="">
    <?php include("nav.html");?>
    <div class="col-md-12">
        
        <article class="left">

            <form method="POST" action="lp4-process-update.php">
                <?php foreach($customers as $c) :?>
                Name: <input type="text" name="name" required value="<?php echo $c["name"];?>">
                <br><br>
                Phone: <input type="tel" name="phone" required value="<?php echo $c["phone"];?>">
                <br><br>
                Address w/ City &amp; State: <input type="text" name="addr" required value="<?php echo $c["addr"];?>">
                <br><br>
                Email: <input type="email" name="email" required value="<?php echo $c["email"];?>">
                <br><br>
                <input type="hidden" name="customer_id" value="<?php echo $c["customer_id"];?>">
                <?php endforeach;?>
                <input type="submit" value="Submit">
                
            </form>
        </article>
    </div>

    
    
    

</body>
<?php include("navfooter.php");?>

</html>