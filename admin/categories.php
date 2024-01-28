<?php
session_start();
    require_once("partials/header.php");
    require_once("partials/sidebar.php");
    require_once("classes/Category.php");

   $cates= $cat->get_category();
    
?>
            <div class="col-md-10 cat">
                <h2>All Categories</h2>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item"><a href="add_category.php" style="text-decoration: none">Add Category</a></li>
                    <li class="breadcrumb-item active">All Categories</li>
                 </ol>
                <table  class="table table-striped">
                <?php
                if(isset($_SESSION["success_msg"])){
                    echo "<div class='alert alert-success'>" . $_SESSION["success_msg"] . "</div>";
                    unset($_SESSION["success_msg"]);
                }
            ?>
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Category Name</th>
                            <th>Action</th>        
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($cates as $cats){
                        ?>
                            <tr>
                                <td><?php echo $cats["cat_id"]?></td>
                                <td><?php echo $cats["cat_name"]?></td>
                                <td><a href="edit_cat.php?edit=<?php echo $cats['cat_id']?>"><button class="btn btn-warning mx-2 btn-sm">Edit</button></a>
                                 <a href="del_cat.php?delete=<?php echo $cats['cat_id']?>"><button class="btn btn-danger btn-sm delete" onclick="return confirm('Are you sure you want to delete this category?');">Delete</button></a></td>
                            </tr>  
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <footer>
            <div class="row">
                <div class="col-md-2 bg-beige">
                  <p>Admin Login</p>
                </div>
                <div class="col-md-10">
                    <hr style="border: 2px dotted;">
                    <span class="mt-3">Copyright &copy; Tfarms. All Rights Reserved.</span>
                    <span class="text-end"><?php  echo date("Y")?></span>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script/jquery.min.js"></script>    
</body>
</html>