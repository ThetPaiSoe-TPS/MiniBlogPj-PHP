<?php
    $server= "localhost";
    $dbname= "blog_project";
    $userName= "root";
    $password= "";
    try{
        $pdo= new PDO("mysql:host=$server;dbname=$dbname", $userName, $password);
    } 
    catch(PDOException $error){
        echo "Database connection fail". $error;
    }
    

    
?>