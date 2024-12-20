<div class="head">
    <header>
        <div class="logo">
            <img src="image/logo.png">
        </div>
        <div class="logo1">
            <div class="bx bx-user" id="user-btn"></div>
            <div class="bx bx-menu" id="menu-btn"></div>
            <?php
            $count_wishlist_item = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_item->execute([$user_id]);
            $total_wishlist_items = $count_wishlist_item->rowCount();
            ?>
            <a href="wishlist.php" class="cart-btn"><i class="bx bx-heart"></i><sup><?= $total_wishlist_items; ?></sup></a>
            <?php
            $count_cart_item = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_item->execute([$user_id]);
            $total_cart_items = $count_cart_item->rowCount();
            ?>
            <a href="cart.php" class="cart-btn"><i class="bx bx-cart"></i><sup><?= $total_cart_items; ?></sup></a>
        </div>
        <!-- profile detail -->
         <div class="profile-detail">
            <?php
                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id=?");
                $select_profile->execute([$user_id]);
                if ($select_profile->rowCount() > 0) {
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

            ?>
            <div class="profile">
                <img src="uploaded_img/<?= $fetch_profile['profile']; ?>" class="logo-image">
                <p><?= $fetch_profile['name']; ?></p>
            </div>
            <div class="flex-btn">
                <a href="update_profile.php" class="btn" style="width: 200px;">update profile</a>
                <a href="components/user_logout.php" onclick="return confirm('Logout from this website?')" class="btn">Logout</a>
            </div>
            <?php }else{ ?>
                <p class="name">please login or register first!</p>
                <div class="flex-btn">
                    <a href="login.php" class="btn">login</a>
                    <a href="register.php" class="btn">register</a>
                </div>
            <?php } ?>
         </div>
         
         <!-- side bar -->
         <div class="sidebar" id="sidebar">
          <?php
                $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id=?");
                $select_profile->execute([$user_id]);
                if ($select_profile->rowCount() > 0) {
                    $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);

            ?>
            <div class="profile">
                <img src="uploaded_img/<?= $fetch_profile['profile']; ?>" class="logo-image">
                <p><?= $fetch_profile['name']; ?></p>
            </div>
            <?php }else{ ?>
                <div class="profile">
                <img src="image/user.jpg" class="logo-image">
                <p>user</p>
                </div>               
            <?php } ?>
            <h5>menu</h5>
            <ul>
                <li><a href="home.php"><i class="bx bxs-home-smile"></i>home</a></li>
                <li><a href="about.php"><i class="bx bxs-shopping-bags"></i>about</a></li>
                <li><a href="menu.php"><i class="bx bxs-food-menu"></i>menu</a></li>
                <li><a href="contact.php"><i class="bx bxs-user-detail"></i>contact</a></li>
                <li><a href="order.php"><i class="bx bxs-user-detail"></i>my order</a></li>
                <li><a href="register.php"><i class="bx bxs-user-detail"></i>register</a></li>
                <li><a href="home.php" onclick="return confirm('logout from this website');"><i class="bx bx-log-out"></i>home</a></li>
            </ul>
            <h5>Find Us</h5>
            <div class="social-links">
                <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"><i class="bx bxl-instagram-alt"></i></a>
                <a href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer"><i class="bx bxl-linkedin"></i></a>
                <a href="https://twitter.com" target="_blank" rel="noopener noreferrer"><i class="bx bxl-twitter"></i></a>
                <a href="https://www.pinterest.com" target="_blank" rel="noopener noreferrer"><i class="bx bxl-pinterest-alt"></i></a>
            </div>
          </div>
    </header>
</div>