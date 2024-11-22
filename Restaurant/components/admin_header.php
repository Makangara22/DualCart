<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<header>
    <div class="logo">
        <img src="../image/logo.png" width="200" alt="Logo">
    </div>
    <div class="right">
        <div class="bx bxs-user" id="user-btn"></div>
        <div class="toggle-btn"><i class="bx bx-menu"></i></div>
    </div>
    <div class="profile-detail">
        <?php
            // Fetch the profile only once
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id=?");
            $select_profile->execute([$admin_id]);
            if ($select_profile->rowCount() > 0){
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
          
        ?>
        <div class="profile">
            <img src="../uploaded_img/<?= $fetch_profile['profile']; ?>" class="logo-img" width="100">
            <p><?= $fetch_profile['name']; ?></p>
        </div>
        <div class="flex-btn">
            <a href="update_profile.php" class="btn">Update Profile</a>
            <a href="../components/admin_logout.php" onclick="return confirm('Logout from this website?')" class="btn">Logout</a>
        </div>
        <?php } ?>
    </div>
</header>
   <!-- SweetAlert from cdnjs -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<div class="side-container">
    <div class="sidebar">
       <?php
            // Fetch the profile only once
            $select_profile = $conn->prepare("SELECT * FROM `admin` WHERE id=?");
            $select_profile->execute([$admin_id]);
            if ($select_profile->rowCount() > 0){
                $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
          
        ?>
        <div class="profile">
            <img src="../uploaded_img/<?= $fetch_profile['profile']; ?>" class="logo-img" width="100" >
            <p><?= $fetch_profile['name']; ?></p>
        </div>
        <?php } ?>

        <h5>Menu</h5>
        <div class="navbar">
            <ul>
                <li><a href="dashboard.php"><i class="bx bxs-home-smile"></i>Dashboard</a></li>
                <li><a href="add_post.php"><i class="bx bxs-shopping-bags"></i>Add Products</a></li>
                <li><a href="view_post.php"><i class="bx bxs-food-menu"></i>View Products</a></li>
                <li><a href="user_account.php"><i class="bx bxs-user-detail"></i>User Accounts</a></li>
                <li><a href="../components/admin_logout.php" onclick="return confirm('Logout from this website?')"><i class="bx bx-log-out"></i>Logout</a></li>
            </ul>
        </div>

       
    </div>
</div>