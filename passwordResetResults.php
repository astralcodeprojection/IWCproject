<?php
            require_once("connect-db.php");
            $password = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $password = $_POST["password"];
                $userId = $_POST["userId"];

                $sql = "update users set password = :password where userId = :userId";
                    
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':password', $password);
                $statement1->bindValue(':userId', $userId);

                
                if($statement1->execute()){
                    $statement1->closeCursor();
                }
                
                ?>
                
             <script>window.location = "login.php";</script>
        <?php
            }             
        ?>
            
            
           