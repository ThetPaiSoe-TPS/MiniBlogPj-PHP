<?php
    include_once "./layout/header.php";
    include_once "../db/dbConnection.php";

    $categoryRequireStatus= false;
    //show category list using select from db
    require_once "../category/helper/categoryList.php";

    //create category 
    require_once "../category/helper/createCategory.php";
?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" name="categoryName" class="form-control" placeholder="Enter Category Name">
                        <?php
                            if(isset($_POST['create_btn'])){
                                if($categoryRequireStatus){
                                    echo "<small class='text-danger'>Category name is required</small>";
                                }
                            }
                        ?>
                    </div>
                    
                    <div class="mb-3">
                        <input type="submit" name="create_btn" class="btn btn-primary" value="Create">
                    </div>
                </form>
            </div>
            <div class="col-sm-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Create Time</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($data as $item){                        
                                $name= $item['category_name'];
                                $id= $item['category_id'];
                                $ct= $item['category_ct'];
                        ?>
                            <tr>
                                <td><?= $id ?></td>
                                <td><?= $name ?></td>
                                <td><?= $ct ?></td>
                                <td><a href="updatePage.php?id=<?= $id ?>" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><a href="delete.php?id=<?= $id ?>" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                                
                            </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
<?php
    include_once "./layout/footer.php";
   
?>