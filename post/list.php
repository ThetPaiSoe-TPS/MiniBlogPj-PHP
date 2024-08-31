<?php
    include_once "../category/layout/header.php";
    require_once "../db/dbConnection.php";
    require_once "./helper/categoryList.php";
    require_once "./helper/postList.php";

    if(isset($_POST['btn_create'])){
        require_once "create.php";
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="p-5">
                        <img src="" alt="" id="output" class="w-50">
                    </div>
                    <div class="mt-3">
                        <input type="file" class="form-control" onchange="loadFile(event)" name="image">
                        <?php
                            if(isset($_POST['btn_create'])){
                                if($form_vali['image_requird']== false){
                                    echo "<p class='text-danger'>Image field is required</p>";
                                }
                            }
                        ?> 
                    </div>
                    <div class="mt-3">
                        <input type="text" name="title" placeholder="Enter title..." class="form-control" value="<?= $_POST['title']?? "" ?>">
                        <?php
                            if(isset($_POST['btn_create'])){
                                if($form_vali['title_requird']== false){
                                    echo "<p class='text-danger'>Title field is required</p>";
                                }
                            }
                        ?>
                    </div>
                    <div class="mt-3" >
                        <textarea name="desc" id="" cols="30" rows="10" placeholder="Enter description" class="form-control"><?= $_POST['desc'] ?? "" ?></textarea>
                        <?php
                            if(isset($_POST['btn_create'])){
                                if($form_vali['desc_requird']== false){
                                    echo "<p class='text-danger'>Description field is required</p>";
                                }
                            }
                        ?>
                    </div>
                    <div class="mt-3">
                        <select name="category" class="form-control" id="">
                            <option value="" class="fw-bold">Choose Development Course...</option>
                            <?php
                                foreach($data as $item){
                                    $name= $item['category_name'];
                                    $id= $item['category_id'];
                                echo "<option value=' $id '";
                                        if(isset($_POST['btn_create'])){
                                            if($_POST['category']== $id){
                                                echo "selected";
                                            }
                                        }  
                                echo "> $name </option>";    
                                }
                            ?>
                        </select>
                        <?php
                            if(isset($_POST['btn_create'])){
                                if($form_vali['category_requird']== false){
                                    echo "<p class='text-danger'>Category field is required</p>";
                                }
                            }
                        ?>
                    </div>
                    <div class="mt-3">
                        <input type="submit" name="btn_create" value="Create" class="btn btn-primary">
                    </div>
                </form>
            </div>
            

            <div class="col m-5">
                <div class="col mb-5">
                    <button class="btn btn-outline-primary btn-sm"><a href="list.php">All</a></button>
                    <?php
                        foreach($data as $cat_data){
                            $cat_name= $cat_data['category_name'];
                            $cat_id= $cat_data['category_id'];
                            echo " <button class='btn btn-outline-primary m-1 btn-sm'><a href='list.php?cat_id=$cat_id' class='navbar-brand'>$cat_name</a></button>";
                        }
                    ?>
                </div>
                <div class="row">
                    
                    <?php 
                        foreach($blogs as $blog){
                    ?>
                        <div class=" col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header text-center fw-bold"><?= $blog['blog_title'] ?></div>
                                <div class="card-body">
                                    <img src="../image/<?= $blog['blog_img'] ?>" alt="" width="100%" height="150px" >
                                    <div class="card-text my-3"><?= mb_strimwidth($blog['blog_desc'], 0, 30, "..." ) ?></div>
                                    <a href="" class="btn btn-primary">Submit</a>
                                    <div class="row">
                                    <b class="text-secondary"><?= $blog['category_name'] ?></b>
                                        <div class="col-7"></div>
                                        <div class="col ">
                                            <a href="detailPage.php?id=<?= $blog['blog_id'] ?>"><i class="fa-solid fa-circle-info text-warning me-1"></i></a>
                                            <a href="editPage.php?id=<?= $blog['blog_id'] ?>"><i class="fa-solid fa-pen-to-square text-primary me-1"></i></a>
                                            <a href="delete.php?id=<?= $blog['blog_id'] ?>"><i class="fa-solid fa-trash text-danger me-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer small text-center"><span class="fw-light">Post at </span><?= $blog['cat_ctime'] ?> </div>
                            </div>
                        </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php
    include_once "../category/layout/footer.php";
?>