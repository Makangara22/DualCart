<?php
    include 'components/connect.php';
    session_start();

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    }else{
        $user_id = '';
    }

    $get_id = $_GET['get_id'];

    include 'components/add_wishlist.php';
    include 'components/add_cart.php';



 
?>
<style>
    <?php include 'style.css'; ?>
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
    <title>Restaurant  - view products page</title>
</head>
<body>
    <?php include 'components/user_header.php'; ?>

    <div class="banner">
        <div class="detail">
            <h1>view products</h1>
            <a href="home.php">home</a><span><i class="bx bx-right-arrow-alt"></i>view products</span>
        </div>
    </div>
    <section class="view_page">
        <?php
            if (isset($_GET['pid'])) {
                $pid = $_GET['pid'];
                $select_products = $conn->prepare("SELECT * FROM `products` WHERE id = '$pid'");
                $select_products->execute();
                if ($select_products->rowCount() > 0) {
                    while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){

        ?>   
        <form action="" method="post" class="box">
            <img src="uploaded_img/<?= $fetch_products['image']; ?>" >
            <div class="detail">
                <p class="price">$ <?= $fetch_products['price']; ?>/-</p>
                <div class="name"><?= $fetch_products['name']; ?></div>
                <p class="product-detail"><?= $fetch_products['product_detail']; ?></p>
                <input type="hidden" name="product_id" value="<?= $fetch_products['id']; ?>">
                <div class="button">
                    <button type="submit" name="add_to_wishlist" class="btn" >add to wishlist <i class="bx bx-heart"></i></button>
                    <input type="hidden" name="qty" value="1" min="0" class="quantity">
                    <button type="submit" name="add_to_cart" class="btn">add to cart <i class="bx bx-cart"></i></button>
                </div>
        </form>             

        <?php                
                    }
                }
            }
        ?>

    </section>
    <section class="products">
        <div class="title">
            <h1>similar products</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, exercitationem consequuntur repudiandae maxime cum sed, architecto asperiores similique ad, alias voluptatum! Esse illo est amet veritatis impedit ipsam iste earum? lore</p>
        </div>
        <?php include 'components/shop.php'; ?>
    </section>

    <?php include 'components/footer.php'; ?>

    <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js link -->
<script type="text/javascript" src="script.js"></script>

<?php include 'components/dark.php'; ?>
<?php include 'components/alert.php' ?>
</body>
</html>
