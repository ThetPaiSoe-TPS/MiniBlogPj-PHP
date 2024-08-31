<?php
    include_once "../category/layout/header.php";
    require_once "../db/dbConnection.php";
    require_once "./helper/categoryList.php";

    $blog_id= $_GET['id'];
    $blog_sql= "select * from blogs where blog_id= ?";
    $blog_res= $pdo-> prepare($blog_sql);
    $blog_res-> execute([$blog_id]);
    $blog_data= $blog_res-> fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['update'])){
        require_once "./update.php";
    }
                
                    
?>
    <div class="container">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row mt-5">
            <div class="col-lg-6 col-sm-12">
                <img src="../image/<?= $blog_data["blog_img"] ?>" id="output" alt="" class="img-thumbnail w-100">
                <div class="my-3">
                    <input type="file" class="form-control" onchange="loadFile(event)" name="image">
                    <input type="hidden" class="from-control" name="old_img" value="../image/<?= $blog_data['blog_img']; ?>">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 mb-3">
                <input type="hidden" name="blog_id" value="<?= $blog_data['blog_id'] ?>">
                <input type="text" class="form-control mb-3 text-muted" name="blog_title" value="<?= $_POST['blog_title']?? $blog_data["blog_title"] ?>" >
                <?php
                    if(isset($_POST['update'])){
                        if($update_vali['title_vali']== ""){
                            echo "<p class='text-danger'>Title field is required</p>";
                        } 
                    }
                ?>
                
                <textarea name="blog_desc" class="from-control text-muted" cols="30" rows="10" id=""><?= $_POST["blog_desc"]?? $blog_data['blog_desc'] ?></textarea>
                <?php
                    if(isset($_POST['update'])){
                        if($update_vali['desc_vali']== ""){
                            echo "<p class='text-danger'>Description field is required</p>";
                        }
                    }
                ?>
                <select  id="" class="form-control mt-3" name="category_id">
                    <?php
                        foreach($data as $cat_item){
                            $cat_name= $cat_item["category_name"];
                            $cat_id= $cat_item["category_id"];
                            $bcat_id= $blog_data["cat_id"];
                            if($cat_id== $bcat_id){
                                echo "<option value='$cat_id' selected>$cat_name</option>";
                            
                            }
                            else{
                                echo "<option value='$cat_id'>$cat_name</option>";
                                
                            }                                        
                        }
                    ?>
    
                </select>
                <input type="submit" value="Update" name="update" class="mt-3 btn btn-primary" ></input>
            </div>
        </div>
    </form>
    </div>
<?php
    include_once "../category/layout/footer.php";
?>