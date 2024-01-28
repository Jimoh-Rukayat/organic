<?php
                                if(isset($_SESSION["useronline"])){

                            ?>
                                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                                    <ul class="member nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                                       <li><a href="dashboard.php" class="nav-link px-2 link-dark">My Dashboard</a></li>
                                       <li><a href="transaction.php" class="nav-link px-2 link-dark">Transaction History</a></li>
                                        <a href="cart.php">
                                           <i class="fa fa-shopping-cart text-success fs-4"></i><sup  class="badge bg-danger" id="cart_num">0</sup>
                                        </a>
                                    </ul>
                                </div>
                            <?php
                                }
                            ?>