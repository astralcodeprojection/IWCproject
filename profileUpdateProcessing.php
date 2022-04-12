<?php
            require_once("connect-db.php");
            $username = $email = $firstName = $lastName = $address = $state = $city = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $username = $_POST["username"];
                $email = $_POST["email"];
                $firstName = $_POST["firstName"];
                $lastName = $_POST["lastName"];
                $address = $_POST["address"];
                $state = $_POST["state"];
                $city = $_POST["city"];
                $userId = $_POST["userId"];

                $sql = "update users set username = :username, email = :email, firstName = :firstName, lastName = :lastName, address = :address, state = :state, city = :city where userId = :userId";
                    
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':username', $username);
                $statement1->bindValue(':email', $email);
                $statement1->bindValue(':firstName', $firstName);
                $statement1->bindValue(':lastName', $lastName);
                $statement1->bindValue(':address', $address);
                $statement1->bindValue(':state', $state);
                $statement1->bindValue(':city', $city);
                $statement1->bindValue(':userId', $userId);

                
                if($statement1->execute()){
                    $statement1->closeCursor();
                }
                
                ?>
                
             <script>window.location = "profile.php";</script>
        <?php
            }             
        ?>
            
            
           
           