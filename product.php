<?php
        require_once("partials/header.php");
        require_once("classes/Product.php");

?>
        <div class="row">
            <div class="col text-center mt-5">
                <p class="text-success">VISIT OUR SHOP</p>
                <h4>Buy Our Products</h4>
            </div>
            <div class="">
                <div class="prod-category text-center mt-5 text-dark">
                    <a href="#vegetables">Fresh Vegetables</a>
                    <div class="line"></div>
                    <a href="#fruits">Fresh Fruits</a>
                    <div class="line"></div>
                    <a href="#inputs">Farm Inputs</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col mt-5">
                <h3 id="vegetables">Vegetables</h3>
                <table class="table table-stripped mt-5" width="100%">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                             $products = $product->get_products("1");
                            foreach($products as $prod){
                        ?>
                            <tr>
                                <td><img src="uploads/<?php echo $prod["prod_image"]?>" alt="amaranthus" width="100"></td>
                                <td><?php echo $prod["prod_name"]?></td>
                                <td><p><?php echo $prod["prod_description"]?></p>
                                </td>
                                <td>&#8358;<?php echo $prod["prod_amount"]?></td>
                                <td><button class="btn btn-dark btn-sm">Edit</button></td>
                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                        <?php       
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <h3 id="fruits">Fruits</h3>
                    <table class="table table-stripped mt-5" width="100%">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                             $products = $product->get_products("2");
                            foreach($products as $prod){
                        ?>
                            <tr>
                                <td><img src="uploads/<?php echo $prod["prod_image"]?>" alt="amaranthus" width="100"></td>
                                <td><?php echo $prod["prod_name"]?></td>
                                <td><p><?php echo $prod["prod_description"]?></p>
                                </td>
                                <td>&#8358;<?php echo $prod["prod_amount"]?></td>
                                <td><button class="btn btn-dark btn-sm">Edit</button></td>
                                <td><button class="btn btn-danger btn-sm">Delete</button></td>
                            </tr>
                        <?php       
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <div class="col mt-5">
            <h3 id="inputs">Farm Inputs</h3>
            <table class="table table-stripped mt-5" width="100%">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                      $products = $product->get_products("3");
                      foreach($products as $prod){
                    ?>
                       <tr>
                          <td><img src="uploads/<?php echo $prod["prod_image"]?>" alt="amaranthus" width="100"></td>
                          <td><?php echo $prod["prod_name"]?></td>
                          <td><p><?php echo $prod["prod_description"]?></p>
                          </td>
                          <td>&#8358;<?php echo $prod["prod_amount"]?></td>
                          <td><a href=""><button class="btn btn-dark btn-sm">Edit</button></td></a>
                          <td><a href="delete.php"><button class="btn btn-danger btn-sm">Delete</button></a></td>
                        </tr>
                     <?php       
                         }
                    ?>
                </tbody>
            </table>
        </div>
  <?php
        require_once("partials/footer.php");
  ?>