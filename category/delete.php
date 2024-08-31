<?php
    require_once "../db/dbConnection.php";
    $id= $_GET['id'];
    $sql= "delete from category where category_id=?";
    $res= $pdo->prepare($sql);
    $res-> execute([$id]);
    header("Location: list.php");