<?php
    $form_vali= [
        'image_requird'=> true,
        'title_requird'=> true,
        'desc_requird'=> true,
        'category_requird'=> true,
    ];
    $form_vali['image_requird']= $_FILES["image"]["name"]== ""? false: true;
    $form_vali['title_requird']= $_POST['title']== ""? false: true;
    $form_vali['desc_requird']= $_POST['desc']== ""? false: true;
    $form_vali['category_requird']= $_POST['category']== ""? false: true;
    if($form_vali['image_requird'] &&  $form_vali['title_requird'] && $form_vali['desc_requird'] &&  $form_vali['category_requird']){
        
    }
    $img= uniqid(). $_FILES["image"]["name"];
    $img_tmp= $_FILES["image"]["tmp_name"];
    move_uploaded_file($img_tmp, "../image/$img");
    $sql= "insert into blogs (blog_title, blog_desc, blog_img, cat_id) values (?, ?, ?, ?)";
    $res= $pdo-> prepare($sql);
    $res-> execute([$_POST['title'], $_POST['desc'], $img, $_POST['category']]);

    header("Location: list.php");
    
    