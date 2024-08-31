<?php
    require_once "../db/dbConnection.php";
    echo $id= $_GET['id']; 
    echo $name= $_POST['category_name'];
    $sql= "update category set category_name= ? where category_id= ?";
    $res= $pdo-> prepare($sql);
    $res-> execute([$name,  $id]);
    header("Location: list.php");
