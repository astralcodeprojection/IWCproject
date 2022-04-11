<?php
            require_once("connect-db.php");
            $name = $price = $category = $description = $img = $keywords = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $name = $_POST["name"];
                $price = $_POST["price"];
                $category = $_POST["category"];
                $description = $_POST["description"];
                $img = $_POST["img"];
                $keywords = $_POST["keywords"];
                $productId = $_POST["productId"];

                $sql = "update products set name = :name, price = :price, category = :category, description = :description, img = :img, keywords = :keywords where productId = :productId";
                    
                $statement1 = $db->prepare($sql);
                $statement1->bindValue(':name' , $name);
                $statement1->bindValue(':price' , $price);
                $statement1->bindValue(':category' , $category);
                $statement1->bindValue(':description' , $description);
                $statement1->bindValue(':img' , $img);
                $statement1->bindValue(':keywords' , $keywords);
                $statement1->bindValue(':productId' , $productId);

                
                if($statement1->execute()){
                    $statement1->closeCursor();
                }
                
                ?>
                
             <script>window.location = "admin.php";</script>
        <?php
            }             
        ?>
            
            
           
           