<?php
    if(isset($_GET['cat_id'])){
        $cat_id= $_GET['cat_id'];
        $query= "select blogs.*, category.* from blogs left join category on blogs.cat_id= category.category_id where blogs.cat_id= ? order by blogs.blog_id desc";
        $blog_res= $pdo-> prepare($query);
        $blog_res-> execute([$cat_id]);
        $blogs= $blog_res-> fetchAll(PDO::FETCH_ASSOC);
    }
    else{
        $query= "select blogs.*, category.* from blogs left join category on blogs.cat_id= category.category_id order by blogs.blog_id desc";
        $blog_res= $pdo-> prepare($query);
        $blog_res-> execute();
        $blogs= $blog_res-> fetchAll(PDO::FETCH_ASSOC);
    }
    

