<?php
//category list
    $sql= "select * from category";
    $res= $pdo-> prepare($sql);
    $res-> execute();
    $data= $res-> fetchAll(PDO::FETCH_ASSOC);