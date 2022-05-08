<?php
             require_once("connect-db.php");
             if($_SERVER["REQUEST_METHOD"] == "POST"){
                 $orderId = $_POST["orderId"];
                 $userId = $_POST["userId"];
                 $productId = $_POST["productId"];
                 $items = $_POST["items"];
                 $allItems = implode(',', $items);
                 $email = $_POST["email"];
                 $firstName = $_POST["firstName"];
                 $lastName = $_POST["lastName"];
                 $address = $_POST["address"];
                 $state = $_POST["state"];
                 $city = $_POST["city"];
                 $zip = $_POST["zip"];
                 $qty = $_POST["qty"];
                 $total = $_POST["total"];
                 $newsletter = $_POST["newsletter"];
                 $shipping = $_POST["shipping"];
                 $card = $_POST["card"];
                 $cvc = $_POST["cvc"];
                 $cardName = $_POST["cardName"];
          
                 $sql = "insert into orders set orderId = :orderId, userId = :userId, productId = :productId, items = :allItems, email = :email, firstName = :firstName, lastName = :lastName, address = :address, state = :state, city = :city, zip = :zip, qty = :qty, total = :total, newsletter = :newsletter, shipping = :shipping, card = :card, cvc = :cvc, cardName = :cardName";
    
                 $statement1 = $db->prepare($sql);
                 $statement1->bindValue(':orderId', $orderId);
                 $statement1->bindValue(':userId', $userId);
                 $statement1->bindValue(':productId', $productId);
                 $statement1->bindValue(':allItems', $allItems);
                 $statement1->bindValue(':email', $email);
                 $statement1->bindValue(':firstName', $firstName);
                 $statement1->bindValue(':lastName', $lastName);
                 $statement1->bindValue(':address', $address);
                 $statement1->bindValue(':state', $state);
                 $statement1->bindValue(':city', $city);
                 $statement1->bindValue(':zip', $zip);
                 $statement1->bindValue(':qty', $qty);
                 $statement1->bindValue(':total', $total);
                 $statement1->bindValue(':city', $city);
                 $statement1->bindValue(':total', $total);
                 $statement1->bindValue(':newsletter', $newsletter);
                 $statement1->bindValue(':shipping', $shipping);
                 $statement1->bindValue(':card', $card);
            
                $statement1->bindValue(':cvc', $cvc);
            
                $statement1->bindValue(':cardName', $cardName);

           
            
                if($statement1->execute()){
            
                        $statement1->closeCursor();
            
                }
            
           
            
            ?>
            
            
             <script>window.location = "index.php";</script>
        <?php
            }             
        ?>
            