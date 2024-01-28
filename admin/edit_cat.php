<?php
        session_start();
        error_reporting(E_ALL);
        require_once "partials/header.php";
        require_once "partials/sidebar.php";
        require_once "classes/Category.php";

?>

<div class="col-md-10">
    <h2>Edit Category</h2>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Edit Category</li>
        <li class="breadcrumb-item active"><a href="categories.php">View Category</a></li>  
    </ol>
    <?php
        if(isset($_SESSION["errormessage"])){
            echo $_SESSION["errormessage"] = "<div class= 'alert alert-danger'>" . $_SESSION["errormessage"] . "</div>";
            unset($_SESSION["errormessage"]);
        }

     ?>
    <form action="process/edit_cat_process.php" method="post">
        <?php
        if (isset($_GET["edit"])) {
            $cat_id = $_GET["edit"];
            $category =  $cat->get_category_byId($cat_id);

            if (!empty($category) && is_array($category)) {
        ?>
                <div class="mb-3">
                    <input type="hidden" name="cat_id" value="<?php echo $category['cat_id'] ?>">
                </div> 
                <div class="mb-3">
                    <label for="name" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="name" name="cat_name" value="<?php echo $category['cat_name'] ?>">
                </div>
                <div class="mb-3">
                    <button type="submit" name="btn_edit" class="btn btn-warning" onclick="return confirm('Are you sure you want to update this category?');">Edit</button>
                </div>
        <?php
            } else {
                $_SESSION["errormessage"] = "Category not found";
                header("location:categories.php");
                exit();
            }
        } else {
            $_SESSION["errormessage"] = "Invalid request";
            header("location:categories.php");
            exit();
        }
        ?>
    </form>
</div>

<?php
require_once("partials/footer.php");
?>
