<?php
$dsn="mysql:host=localhost;dbname=sustain";
$username="root";
$password="";
try{
    $db=new PDO($dsn, $username, $password);
}catch(Exception $e){
    $error = $e->getMessage();
    echo $error;
    exit();    
}
?>
