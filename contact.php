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

    <br><br>
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-9">
            <h2>Contact Us</h2><br><br>

        </div>
        
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-9">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <h4>Send Us A Message!</h4>
                <textarea name="msgtxt" id="comments" class="col-md-9" >

                </textarea>
                <br><br>
                <button type="submit" value="Submit">Submit</button>
            </form>
            
            <?php

            require_once("connect-db.php");
            $error = $success = $msgtxt = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $msgtxt = $_POST["msgtxt"];
                
                
             $sql="insert into contact (msgtxt) VALUES (:msgtxt)";
                
                $statement1 = $db->prepare($sql);
                
                $statement1->bindValue(':msgtxt', $msgtxt);
                
                if($statement1->execute()){
                    $statement1->closeCursor();
                    $success = "Thank You!";
                 }else{
                    $error="Error sending message";
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
          
    
    
        </div>
    </div>
   
        <br><br>
            

    

</body>
<?php include("navfooter.php");?>

</html>