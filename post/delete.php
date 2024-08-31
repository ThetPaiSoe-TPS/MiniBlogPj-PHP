<?php
    require_once "../db/dbConnection.php";
    $blog_id= $_GET['id'];
    //delete image url
    $img_sql= "select blog_img from blogs where blog_id= ?";
    $img_res= $pdo-> prepare($img_sql);
    $img_res-> execute([$blog_id]);
    $img_data= $img_res->fetch(PDO::FETCH_ASSOC);
    $img_path= $img_data['blog_img'];
    // delete blog 
    $sql= "delete from blogs where blog_id= ?";
    $res= $pdo-> prepare($sql);
    $res-> execute([$blog_id]);

    unlink("../image/$img_path");

    header("Location: list.php");
    