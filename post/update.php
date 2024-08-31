<?php
        $update_vali= [
            'title_vali'=> true,
            'desc_vali'=> true
        ];
        $update_vali['title_vali']= $_POST['blog_title']? true: false;
        $update_vali['desc_vali']= $_POST['blog_desc']? true: false;
        if($update_vali['title_vali'] && $update_vali['desc_vali']){
            if($_FILES["image"]["name"]== ""){
                $update_sql= "update blogs set blog_title= ?, blog_desc= ?, cat_id= ? where blog_id= ?";
                $update_res= $pdo-> prepare($update_sql);
                $update_res-> execute([$_POST['blog_title'], $_POST['blog_desc'], $_POST['category_id'], $_POST['blog_id']]);
            }
            else{
                // delete old img and update new img
                $old_img= $_POST["old_img"];
                unlink("../image/$old_img");
                $img= uniqid(). $_FILES["image"]["name"];
                $img_tmp= $_FILES["image"]["tmp_name"];
                move_uploaded_file($img_tmp, "../image/$img");

                $update_sql= "update blogs set blog_title= ?, blog_desc= ?, blog_img= ?, cat_id= ? where blog_id= ?";
                $update_res= $pdo-> prepare($update_sql);
                $update_res-> execute([$_POST['blog_title'], $_POST['blog_desc'], $img, $_POST['category_id'], $_POST['blog_id']]);
                
            }
            header("Location: list.php");
            
        }
       
       
        
        
