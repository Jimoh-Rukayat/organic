<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/animate.min.css">
    <link rel='stylesheet' href="assets/fa/css/all.min.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <title>Tfarms</title>
</head>
<body class="bg-light">
    <div class="container-fluid" >
        <div class="row">
            <div class="col">
                <nav class=" my-nav navbar navbar-expand-lg">
                    <div class="container-fluid  navigation">
                        <a class="navbar-brand home-link " href="index.php">
                            <h2 class="logo">Tfarms</h2>
                        </a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0 navigation-link m-auto">
                                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                                <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                                <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                                <li class="nav-item"><a class="nav-link" href="shop.php">Shop</a></li>
                                <li class="nav-item"><a href="dashboard.php" class="nav-link">Dashboard</a></li>
                            </ul> 
                                <form method="" action="" class="d-flex col-2" role="search">
                                    <div class="input-group">
                                        <input class="form-control" name="" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                        <button class="btn btn-success" id="btnNavbarSearch" name=''><i class="fas fa-search"></i></button>
                                    </div>
                               </form>
                                    <a href="cart.php">
                                        <i class="fa fa-shopping-cart text-success fs-4"></i><span  class="badge bg-danger" id="cart_num"></span>
                                    </a>
                                <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw text-success fs-5"></i></a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="login.php">Login</a></li>
                                            <li><hr class="dropdown-divider" /></li>
                                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                            <li><hr class="dropdown-divider" /></li>
                                            <li><a class="dropdown-item" href="admin/login.php">Admin</a></li>
                                        </ul>
                                    </li>
                                </ul>                       
                        </div>
                    </div>
                </nav>
