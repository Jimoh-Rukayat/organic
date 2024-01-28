<?php
    error_reporting(E_ALL);
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fa/css/all.min.css">
    <title>Sign Up</title>
    <style>
        .signin{
            display: flex;
            justify-content: space-around;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col text-center mt-5">
                <h2>Sign Up</h2>
            </div>
        </div>
       <div class="col m-auto">
        <div class="row m-auto">
        
            <div class="col d-flex justify-content-center align-items-center">
               
               
                <form action="process/signup_process.php" method="post" class="col-6 signin-form mt-5">
                <?php
                    if(isset($_SESSION["errormessage"])){
                        echo $_SESSION["errormessage"] = "<div class= 'alert alert-danger'>" . $_SESSION["errormessage"] . "</div>";
                         unset($_SESSION["errormessage"]);
                     }
                ?>
               
                    <div class="label col">
                        <div class="form-floating mt-3">
                            <input type="text" name="username" id="username" class="form-control form-control-lg col-6" placeholder="Last Name">
                            <label for="name" >Username</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="email" name="email" id="email" class="form-control form-control-lg col-6" placeholder="Email Address">
                            <label for="email" >Email Address</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Password">
                            <label for="password" >Password</label>
                        </div>
                        <div class="form-floating mt-3">
                            <input type="password" name="conf_password" id="password" class="form-control form-control-lg" placeholder="Confirm Password">
                            <label for="password" >Confirm password</label>
                        </div>
                        <button class="btn btn-success mt-5 col-12" type="submit" name="btn_sign">Create Account & Continue</button>
                        <div class="para mt-3">
                            <p>Already have an account? Login <a href="login.php">here</a></p>
                        </div>
                  </div>
                </form>
                
            </div>
        </div>
       </div>
    </div>
    </div>
</body>
</html>