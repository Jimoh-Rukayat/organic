<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link href="assets/fa/css/all.min.css" rel='stylesheet'>
    <title>Admin</title>
    <style>
        .navbar{
            background-color:rgba(0, 128, 0, 0.5);
        }
        .logo{
             text-shadow: 2px 2px orangered;
             font-size: 30px;
        }
    </style>
   
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <nav class="sb-topnav navbar navbar-expand navbar-dark">
                 
                    <a class="navbar-brand ps-3 logo" href="index.php">Tfarms</a>
                  
                    
                
                    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn btn-success" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                  
                    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw fs-5 text-success"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="login.php">Login</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>