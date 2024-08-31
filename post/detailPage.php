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
    <div class="container my-5">
        <a href="./list.php" class="text-primary fw-bold fs-5 text-decoration-none ">
            <i class="fa-solid fa-arrow-left mb-3"></i><span class=""> Back</span>
        </a>
        <div class="card text-center">
            <div class="card-header fw-bold"><?= $blog_data["blog_title"] ?></div>
            <div class="card-body">
                <img class="w-50" src="../image/<?= $blog_data["blog_img"] ?>" alt="">
                <div class="card-text mt-3 text-start"><p><?= $blog_data["blog_desc"] ?></p></div>
            </div>
            <div class="card-footer">Post at: <span class="small"><?= $blog_data["cat_ctime"] ?></span></div>
        </div>
    </div>
<?php
    include_once "../category/layout/footer.php";
?>