<?php
    require_once("partials/header.php");
    require_once("partials/sidebar.php");
    //require_once("admin_guard.php");

?>
            <div class="col-md-9">
            <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Admin Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl col-md-6">
                                <div class="card  text-white mb-4">
                                    <div class="card-body fs-3 text-primary">Add</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-primary">
                                        <a class=" text-white stretched-link" href="addproduct.php">add product</a> / <a class=" text-white stretched-link" href="add_category.php">add category</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl col-md-6">
                                <div class="card text-white mb-4">
                                    <div class="card-body fs-3 text-warning">View</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-warning">
                                    <a class=" text-white stretched-link" href="allproduct.php">view product</a> / <a class=" text-white stretched-link" href="categories.php">view category</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl col-md-6">
                                <div class="card text-white mb-4">
                                    <div class="card-body fs-3 text-success">Update</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-success">
                                        <a class="text-white stretched-link" href="edit_prod.php">edit product</a> /  <a class="text-white stretched-link" href="edit_cat.php">edit category</a>
                                        <div class="text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl col-md-6">
                                <div class="card  text-white mb-4">
                                    <div class="card-body fs-3 text-danger">Delete</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between bg-danger">
                                        <a class="text-danger stretched-link " href="#">product</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        
        <footer>
            <div class="row float-bottom">
                <div  class="col-md-2 bg-light d-lg-flex flex-lg-column justify-content-around d-sm-none ">
                  <p>Admin Login</p>
                </div>
                <div class="col-md-10 bg-light">
                    <hr style="border: 2px dotted;">
                    <span class="mt-3">Copyright &copy; Tfarms. All Rights Reserved.</span>
                    <span class="text-end"><?php  echo date("Y")?></span>
                </div>
            </div>
        </footer>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/script/jquery.min.js"></script>
    <script></script>
</body>
</html>