<?php

//create category
if(isset($_POST['create_btn'])){
    $categoryName= $_POST['categoryName'];
    if($categoryName!= ""){
        $sql= "insert into category (category_name) values (?)";
        $res= $pdo->prepare($sql);
        $res->execute([$categoryName]);
        $categoryRequireStatus= false;
        header("Location: list.php");
    }
    else{
        $categoryRequireStatus= true;
    }
}