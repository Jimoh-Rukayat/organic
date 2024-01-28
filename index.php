<?php
   // session_start();
    error_reporting(E_ALL);
   // require_once("user_guard.php");
    require_once("partials/header.php");
    require_once("classes/Product.php");
   // require_once("classes/User.php");

    // if(isset($_SESSION['useronline'])){
    //     $a = $_SESSION["useronline"];

    //     $users = $user->get_user($a);
    //     print_r($users);
    // }
    // $data = $user->get_user($_SESSION["useronline"]);
    
    // echo "<pre>";
    //  print_r($data);
    // echo "</pre>";

    // if(isset($_SESSION['user_active'])){
    //     $id = $_SESSION["user_active"];
    //      $user_active = $user->get_user($id);
    //      echo $user_active;
    //   }
   
    $products = $product->get_product();

 
?>
                <div class="background">
                    <div class="background-text">
                        <h1>Vegetables and Fruits Good For Health</h1>
                        <p class="d-none d-lg-block">Organic vegetables grown without the use of synthetic pesticides, herbicides, or fertilizers.</p>
                        <a href="about.php"><button class="btn btn-success p-2 col-md-3">What we do</button></a>
                        <a href="services.php"><button  class="btn btn-light text-success p-2 col-md-3">Visit our Farm</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="content">
                    <p class="text-success">CULTIVATION AREA</p>
                    <h2>We are triple areas of farm</h2>
                    <p>We grow vegetables, fruits and sell farm inputs</p>
                    <div class="content-images d-lg-flex flex-lg-row">
                        <div class="one m-4  col-md-3">
                            <div>
                                <p class="text-success">FRESH VEGETABLE</p>
                                <h4>Vegetables</h4>
                                <a href="product.php"><button  class="btn btn-outline-success">Visit Section</button></a>
                            </div>
                            <div>
                                <img src="assets/images/tatashe.jpg" alt="pepper" class="img-fluid" width="200" height="400">
                            </div> 
                        </div>
                        <div class="two m-4 col-md-3">
                            <div class="m-4">
                                <p class="text-success">FRUITS</p>
                                <h4>Fresh Fruits</h4>
                                <a href="product.php#fruits"><button  class="btn btn-outline-success">Visit Section</button></a>
                            </div>
                            <div>
                                <img src="assets/images/waterm.jpg" alt="" class="img-fluid" width="200" height="300">
                            </div>
                        </div>
                        <div class="three m-4  col-md-3">
                            <div>
                                <p class="text-success">FARM INPUTS</p>
                                <h4>Viable Seeds</h4>
                                <a href="product.php#inputs"><button  class="btn btn-outline-success">Visit Section</button></a>
                            </div>
                            <div>
                                <img src="assets/images/input3.jpg" alt="" class="img-fluid" width="200" height="300">
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="about d-lg-flex flex-lg-row">
                    <div class="right-about col-md-4 mt-3">
                        <p class="text-success">KNOW ABOUT US</p>
                        <h4>Where organic means everything!</h4>
                    </div>
                    <div class="left-about col-md-4 mt-3">
                        <p>Tfarms isn't just a farm, it's a legacy. It all began with a simple belief:that food must be pure, wholesome, and grown
                             in hramony with nature.</p><a href="about.php"><button class="btn btn-outline-success">Read More</button></a>
                    </div>
                </div>
                <div class="sub-about mt-5 d-lg-flex flex-lg-row">
                    <div class="col-4 py-5">
                        <img src="assets/images/girl.JPG" alt="girl" width="600" height="600" class="d-none d-lg-block">
                    </div>
                    <div class="about-services col-6 p-5">
                        <div class="more-about  d-lg-flex flex-lg-row">
                            <div class="col-4">
                                <img src="assets/images/orange.jpg" alt="veges" width="300" height="300">
                                <ul>
                                    <li class="text-success"><p class="col">Pure agro services</p></li>
                                    <p class="d-none d-lg-block">Rich in nutrients</p>
                                </ul>
                            </div>
                            <div class="col-4">
                                <img src="assets/images/hell.jpg" alt="pepper" width="300" height="300">
                                <ul>
                                    <li class="text-success"><p class="col">Healthy Journey</p></li>
                                    <p class="d-none d-lg-block">Clean and fresh agro-services with low-cost</p>
                                </ul>
                            </div>
                        </div>
                        <div class="sub d-none d-lg-block">
                            <h2 class="px-5">Life is not like a specie do you know?</h2>
                            <div class="icons">
                                <div>
                                    <div class="mt-3"><i class="fa fa-check text-success"></i><span>  Get back to Healthy Life</span></div>
                                    <div class="mt-3"><i class="fa fa-check text-success"></i><span>  Set a Healthier Life</span></div>
                                </div>
                                <div>
                                    <div class="mt-3"><i class="fa fa-check text-success"></i><span>  Wake up refreshed</span></div>
                                    <div class="mt-3"><i class="fa fa-check text-success"></i><span>  Boost Energy and Metabolism</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container">
                <div class="shadow mt-5 d-lg-flex">
                        <div>
                            <span style="font-size: 30px;">100<i class="fa fa-plus"></i></span>
                            <p style="font-size: 20px;">Home Supplier</p>
                        </div>
                        <div class="lines"></div>
                        <div>
                            <span style="font-size: 30px;">100<i class="fa fa-plus"></i></span>
                            <p style="font-size: 20px;">Seasonal Vegetables</p>
                        </div>
                        <div class="lines"></div>
                        <div>
                            <span  style="font-size: 30px;">100<i class="fa fa-plus"></i></span>
                            <p style="font-size: 20px;">Home Supplier</p>
                        </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col m-5 products">
                <p class="text-success p-5">VISIT OUR SHOP</p>
                <h4>Buy Our Products</h4>
                <div class="product-image mt-5  d-lg-flex flex-lg-row">
                    <?php
                        foreach($products as $prod){
                    ?>
                        <div class="col-md-3 produce">
                            <img src="uploads/<?php echo $prod["prod_image"]?>" alt="frm produce" class="img-fluid bk rounded py-3" style="height:200px; width:200px">
                            <p class="mt-3 fs-5 text-coral"><?php echo $prod["prod_name"]?></p>
                            <p>&#8358;<?php echo number_format($prod["prod_amount"], 2)?>/kg</p>
                            <a href="single_product.php?id=<?php echo $prod['prod_id']?>"><button class="btn btn-outline-success">More Details</button></a>
                        </div>
                    <?php     
                        }
                    ?>
                </div>
                <a href="shop.php"><button class="btn btn-success mt-5 col-md-4 p-2">All Products</button></a>
            </div>
        </div>
    <?php
        require_once("partials/footer.php");
    ?>