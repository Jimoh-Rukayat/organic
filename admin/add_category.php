<?php
     require_once("partials/header.php");
     require_once("partials/sidebar.php");
?>

            <div class="col-md-10">
                <h2>Add Category</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item">Add Category</li>
                    <li class="breadcrumb-item active"><a href="categories.php">View Category</a></li>  
                </ol>
        <form action="process/addcat_process.php" method="post">
             <div class="mb-3">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
                <div class="mb-3">
                   <button type="submit" name="btn_add" class="btn btn-success">Add</button>
                </div>
        </form>
    </div>

    <?php
     require_once("partials/footer.php");
?>