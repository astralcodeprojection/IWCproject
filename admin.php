<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin - Sustain Jewelry Co.</title>
    <meta name="description" content="The Administrator Page for Sustain Jewelry">
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
    
   
    <div class="row">
        <div class="col-md-1">

        </div>
        <div class="col-md-10">
            <div id="wrapper">
                <! specify the encoding type of the form using the 
                        enctype attribute >
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    Select image to upload:
                    <input type="file" name="fileToUpload" id="fileToUpload">
                    <input type="submit" value="Upload Image" name="submit"> 
                </form>

            </div>
            <br><br>
            <article class="">

            <?php
                require_once("connect-db.php");
                $sql = "select * from orders";
                $statement1 = $db->prepare($sql);
                
                if($statement1->execute()){
                    $customers=$statement1->fetchAll();
                    $statement1->closeCursor();
                }else{
                    $error="Error finding orders.";
                }
            
            ?>
            <h3>Order List</h3>
            <table>
                <tr>
                    <th>User Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Total</th>
                </tr>
                <?php
                    foreach($customers as $c){?>
                <tr>
                    <td><?php echo $c["userId"];?></td>
                    <td><?php echo $c["firstName"];?></td>
                    <td><?php echo $c["lastName"];?></td>
                    <td><?php echo $c["email"];?></td>
                    <td><?php echo $c["address"];?></td>
                    <td><?php echo $c["state"];?></td>
                    <td><?php echo $c["city"];?></td>
                    <td><?php echo $c["total"];?></td>

                    <td><form action="customerUpdate.php" method="post">
                            <input type="hidden" name="orderId" value="<?php echo $c["orderId"];?>">
                        <button type="submit">Update</button>
                        </form>
                    </td>
                    <td><form action="customerDelete.php" method="post">
                            <input type="hidden" name="orderId" value="<?php echo $c["orderId"];?>">
                        <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>      
                   <?php } ?>            
            </table>
        </article>
        <article class="">

            <?php
                require_once("connect-db.php");
                $sql2 = "select * from products";
                $statement2 = $db->prepare($sql2);
                
                if($statement2->execute()){
                    $products=$statement2->fetchAll();
                    $statement2->closeCursor();
                }else{
                    $error="Error finding orders.";
                }
            
            ?>
            <h3>Product List</h3>
            <table>
                <tr>
                    <th>Product Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Server Image</th>
                    <th>Keywords</th>
                </tr>
                <?php
                    foreach($products as $c){?>
                <tr>
                    <td><?php echo $c["productId"];?></td>
                    <td><?php echo $c["name"];?></td>
                    <td><?php echo $c["price"];?></td>
                    <td><?php echo $c["category"];?></td>
                    <td><?php echo $c["description"];?></td>
                    <td><?php echo $c["img"];?></td>
                    <td><?php echo $c["keywords"];?></td>

                    <td><form action="productUpdate.php" method="post">
                            <input type="hidden" name="productId" value="<?php echo $c["productId"];?>">
                        <button type="submit">Update</button>
                        </form>
                    </td>
                    <td><form action="productDelete.php" method="post">
                            <input type="hidden" name="productId" value="<?php echo $c["productId"];?>">
                        <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>      
                   <?php } ?>            
            </table>
        </article>

        </div>
        <div class="col-md-1">
            
        </div>
    </div>
            

</body>
<?php include("navfooter.php");?>

</html>