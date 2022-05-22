<header id="header">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h3 class="px-5">
                <i class="fas fa-shopping-basket"></i> eMagBB
            </h3>
        </a>

        <a href ="index.php" class = "products">
            <h3 class="px-5">
                Products
            </h3>
        </div>
        </a>

            <!-- href to all orders -->
        <a href="allOrders.php" class = "orders">
                <h3 class="px-5">
                    Order History
                </h3>
            </div>
        </a>

        <button class="navbar-toggler"
            type="button"
                data-toggle="collapse"
                data-target = "#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup"
                aria-expanded="false"
                aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>

         <!-- site reviews -->
       <a href ="reviews.php" class = "reviews">
            <h3 class="px-5">
                Reviews
            </h3>
        </div>
        </a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> Cart
                        <?php
                        if (isset($_SESSION['cart'])){
                            $count = count($_SESSION['cart']);
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">$count</span>";
                        }else{
                            echo "<span id=\"cart_count\" class=\"text-warning bg-light\">0</span>";
                        }

                        ?>
                    </h5>
                </a>
            </div>
        </div>

         <div class="navbar-nav">
            <a href="afterCheckout.php" class="nav-item nav-link active">
                <h5 class="px-5 cart">
                    <i class="fas fa-shopping-basket"></i> Last Order
                </h5>
            </a></div>

    </nav>
</header>