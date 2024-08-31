<?php
    require_once "./layout/header.php";
    require_once "../db/dbConnection.php";

    $id= $_GET['id'];
    $sql= "select * from category where category_id= ?";
    $res= $pdo-> prepare($sql);
    $res-> execute([$id]);
    $data= $res-> fetch(PDO::FETCH_ASSOC);

?>
<div class="container my-5">
    <div class="row">
        <div class="col-6 offset-3">
        <a href="list.php" class="text-primary fw-bold fs-5 text-decoration-none ">
            <i class="fa-solid fa-arrow-left mb-3"></i><span class=""> Back</span>
        </a>
            <form action="update.php?id=<?= $id ?>" method="post">
                <input type="text" class="form-control mb-3 text-muted" name="category_name" value="<?= $data['category_name'] ?>">
                <input type="submit" class="btn btn-primary" value="Update">
            </form>
        </div>
    </div>
</div>

<?php require_once "./layout/footer.php"; ?>