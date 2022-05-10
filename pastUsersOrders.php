<?php
// start the session
session_start();
if($_SERVER["REQUEST_METHOD"]== "POST"){
        $userId = $_SESSION["userId"];
        
        
        require_once("connect-db.php");
        $sql = "select * from users where userId = :userId";
            
        $statement1 = $db->prepare($sql);
        $statement1 -> bindValue(':userId',$userId);
        
        
        if($statement1->execute()){
            $customers = $statement1->fetchAll();
            $statement1->closeCursor();
        }else{
            $error = "Error finding user";
        }
    }
if($_SESSION["logged_in"] != "true"){   
?>
<script>
    window.location.replace("login.php");
</script>
<?php
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
     <link rel="icon" type="image/x-icon" href="img/favicon_io/favicon-32x32.png">
    <title>Account - Sustain Jewelry Co.</title>
    <meta name="description" content="Create and manage your account for Sustain Jewelry, ethical and sustainable fashion">
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
        <br>
        <div class="row">
            <div class="col-md-8">
                <?php
                require_once("connect-db.php");
                $userId = $_SESSION["userId"];

                $sql = "select * from orders where userId = :userId";

                $statement1 = $db->prepare($sql);
                $statement1 -> bindValue(':userId',$userId);
                
                if($statement1->execute()){
                    $customers=$statement1->fetchAll();
                    $statement1->closeCursor();
                }else{
                    $error="Error finding orders.";
                }
                
                ?>
                <br><br><br><br><h2>Past Orders</h2>
                <table width="800px">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Shipping Address</th>
                        <th>Total</th>
                    </tr>
                    <?php
                        foreach($customers as $c){?>
                    <tr>
                        <td><?php echo $c["firstName"];?> <?php echo $c["lastName"];?></td>
                        <td><?php echo $c["email"];?></td>
                        <td><?php echo $c["address"];?> - <?php echo $c["city"];?>, <?php echo $c["state"];?></td>
                        <td><?php echo $c["total"];?></td>
                    </tr>      
                    <?php } ?>            
                </table>
                </div>
            </div>
            <div class="col-md-4"></div>
            
        </div>
    </div>
    <br><br>
    
    
    

</body>
<?php include("navfooter.php");?>

</html>