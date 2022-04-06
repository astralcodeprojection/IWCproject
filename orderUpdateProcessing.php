<?php
            require_once("connect-db.php");
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $email = $_POST["email"];
                $address = $_POST["address"];
                $state = $_POST["state"];
                $city = $_POST["city"];
                $total = $_POST["total"];
                $orderId = $_POST["orderId"];
                
                $sql = "update orders set firstName = :firstName, lastName = :lastName, email = :email, address = :address, state = :state, city = :city, total = :total where orderId = :orderId";
                    
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':firstName' , $firstName);
                $statement1->bindValue(':lastName' , $lastName);
                $statement1->bindValue(':email' , $email);
                $statement1->bindValue(':address' , $address);
                $statement1->bindValue(':state' , $state);
                $statement1->bindValue(':city' , $city);
                $statement1->bindValue(':total' , $total);
                $statement1->bindValue(':orderId' , $orderId);

                
                if($statement1->execute()){
                    $statement1->closeCursor();
                }
                
                ?>
                
             <script>window.location = "admin.php";</script>
        <?php
            }             
        ?>
            
            
           