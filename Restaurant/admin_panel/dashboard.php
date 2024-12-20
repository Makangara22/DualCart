<?php
    include '../components/connect.php';
    session_start();

    $admin_id = $_SESSION['admin_id'];

    if (!isset($admin_id)) {
        header('location:admin_login.php');
    }
?>
<style>
    <?php include 'admin_style.css'; ?>
</style>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- SweetAlert from cdnjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    
    <!-- Box icon cdn link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Admin - Dashboard</title>
</head>
<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="dashboard">
            <h1 class="heading">dashboard</h1>
            <div class="box-container">
                <div class="box">
                    <h3>welcome</h3>
                    <p><?= $fetch_profile['name'];?></p>
                    <a href="update_profile.php" class="btn">Update Profile</a>
                </div>
                <div class="box">
                    <?php
                    $select_message = $conn->prepare("SELECT * FROM `message`");
                    $select_message->execute();
                    $number_of_msg = $select_message->rowCount();
                    ?>
                    <h3><?= $number_of_msg; ?></h3>
                    <p>unread messages</p>
                    <a href="admin_message.php" class="btn">see messages</a>
                </div>
                <div class="box">
                    <?php
                    $select_post = $conn->prepare("SELECT * FROM `products`");
                    $select_post->execute();
                    $number_of_post = $select_post->rowCount();
                    ?>
                    <h3><?= $number_of_post; ?></h3>
                    <p>product added</p>
                    <a href="add_posts.php" class="btn">add new products</a>
                </div>
                <div class="box">
                    <?php
                    $select_active_post = $conn->prepare("SELECT * FROM `products` WHERE status=?");
                    $select_active_post->execute(['active']);
                    $number_of_active_post = $select_active_post->rowCount();
                    ?>
                    <h3><?= $number_of_active_post; ?></h3>
                    <p>total active products</p>
                    <a href="add_posts.php" class="btn">see products</a>
                </div>
                <div class="box">
                    <?php
                    $select_deactive_post = $conn->prepare("SELECT * FROM `products` WHERE status=?");
                    $select_deactive_post->execute(['active']);
                    $number_of_deactive_post = $select_deactive_post->rowCount();
                    ?>
                    <h3><?= $number_of_deactive_post; ?></h3>
                    <p>total deactive products</p>
                    <a href="add_post.php" class="btn">see products</a>
                </div>
                <div class="box">
                    <?php
                    $select_users = $conn->prepare("SELECT * FROM `users`");
                    $select_users->execute();
                    $number_of_users = $select_users->rowCount();
                    ?>
                    <h3><?= $number_of_users; ?></h3>
                    <p>user accounts</p>
                    <a href="user_accounts.php" class="btn">see users</a>
                </div>
                <div class="box">
                    <?php
                    $select_admin = $conn->prepare("SELECT * FROM `admin`");
                    $select_admin->execute();
                    $number_of_admin = $select_admin->rowCount();
                    ?>
                    <h3><?= $number_of_admin; ?></h3>
                    <p>admin_account</p>
                    <a href="user_accounts.php" class="btn">see admin</a>
                </div>
                <div class="box">
                    <?php
                    $select_reservation = $conn->prepare("SELECT * FROM `reservation`");
                    $select_reservation->execute();
                    $num_of_reservation = $select_reservation->rowCount();
                    ?>
                    <h3><?= $num_of_reservation; ?></h3>
                    <p>total reservatiom</p>
                    <a href="admin_reservation.php" class="btn">total reservations</a>
                </div>
                <div class="box">
                    <?php
                    $select_canceled_order = $conn->prepare("SELECT * FROM `orders` WHERE status=?");
                    $select_canceled_order->execute(['canceled']);
                    $total_canceled_order = $select_canceled_order->rowCount();
                    ?>
                    <h3><?= $total_canceled_order; ?></h3>
                    <p>total canceled order</p>
                    <a href="admin_order.php" class="btn">canceled order</a>
                </div>
                <div class="box">
                    <?php
                    $select_confirm_order = $conn->prepare("SELECT * FROM `orders` WHERE status=?");
                    $select_confirm_order->execute(['in progress']);
                    $total_confirm_order = $select_confirm_order->rowCount();
                    ?>
                    <h3><?= $total_confirm_order; ?></h3>
                    <p>total confirm order</p>
                    <a href="admin_order.php" class="btn">confirm order</a>
                </div>
                <div class="box">
                    <?php
                    $select_total_order = $conn->prepare("SELECT * FROM `orders`");
                    $select_total_order->execute();
                    $total_total_order = $select_total_order->rowCount();
                    ?>
                    <h3><?= $total_total_order; ?></h3>
                    <p>total order</p>
                    <a href="admin_order.php" class="btn">all orders</a>
                </div>
                <div class="box">
                    <?php
                    $select_reviews = $conn->prepare("SELECT * FROM `reviews`");
                    $select_reviews->execute();
                    $num_of_reviews = $select_reviews->rowCount();
                    ?>
                    <h3><?= $num_of_reviews; ?></h3>
                    <p>total reviews</p>
                    <a href="comments.php" class="btn">see reviews</a>
                </div>
            </div>
        </section>
    </div>

    <?php include '../components/dark.php'; ?>
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
