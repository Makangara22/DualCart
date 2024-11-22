<?php
include '../components/connect.php';
session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:admin_login.php');
}

if (isset($_POST['save'])) {
    $post_id = $_POST['post_id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
    $content = filter_var($_POST['content'], FILTER_SANITIZE_STRING);
    $category = filter_var($_POST['category'], FILTER_SANITIZE_STRING);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

    $update_post = $conn->prepare("UPDATE `products` SET name = ?, price = ?, product_detail = ?, category = ?, status = ? WHERE id=?");
    $update_post->execute([$title, $price, $content, $category, $status, $post_id]);
    $success_msg[] = 'Product updated!';

    // Image upload and update logic
    $old_image = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = '../uploaded_img/' . $image;

    if (!empty($image)) {
        if ($image_size > 2000000) {
            $warning_msg[] = 'Image size is too large';
        } else {
            $select_image = $conn->prepare("SELECT * FROM `products` WHERE image = ?");
            $select_image->execute([$image]);

            if ($select_image->rowCount() > 0) {
                $warning_msg[] = 'Please rename your image';
            } else {
                $update_image = $conn->prepare("UPDATE `products` SET image = ? WHERE id=?");
                $update_image->execute([$image, $post_id]);
                move_uploaded_file($image_tmp_name, $image_folder);

                if ($old_image != $image && !empty($old_image)) {
                    unlink('../uploaded_img/' . $old_image);
                }
                $success_msg[] = 'Image updated!';
            }
        }
    }
}

// Delete Product
if (isset($_POST['delete_post'])) {
    $post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_STRING);
    $delet_image = $conn->prepare("SELECT * FROM `products` WHERE id=?");
    $delet_image->execute([$post_id]);
    $fetch_delete_image = $delet_image->fetch(PDO::FETCH_ASSOC);

    if (!empty($fetch_delete_image['image'])) {
        unlink('../uploaded_img/' . $fetch_delete_image['image']);
    }

    $delete_post = $conn->prepare("DELETE FROM `products` WHERE id=?");
    $delete_post->execute([$post_id]);
    $success_msg[] = 'Product deleted successfully!';
}

// Delete Image
if (isset($_POST['delete_image'])) {
    $post_id = filter_var($_POST['post_id'], FILTER_SANITIZE_STRING);
    $delet_image = $conn->prepare("SELECT * FROM `products` WHERE id=?");
    $delet_image->execute([$post_id]);
    $fetch_delete_image = $delet_image->fetch(PDO::FETCH_ASSOC);

    if (!empty($fetch_delete_image['image'])) {
        unlink('../uploaded_img/' . $fetch_delete_image['image']);
    }

    $unset_image = $conn->prepare("UPDATE `products` SET image='' WHERE id=?");
    $unset_image->execute([$post_id]);
    $success_msg[] = 'Image deleted successfully!';
}
?>

    
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
    <title>Admin - edit product page</title>
</head>
<body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section class="post-editor">
            <h1 class="heading">edit product</h1>
            <div class="box-container">
                <?php
                $post_id = $_GET['id'];
                $select_post = $conn->prepare("SELECT * FROM `products` WHERE id=?");
                $select_post->execute([$post_id]);
                if ($select_post->rowCount() > 0) {
                    while($fetch_post = $select_post->fetch(PDO::FETCH_ASSOC)){

            ?>
            <div class="form-container">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="old_image" value="<?= $fetch_post['image']; ?>">
                    <input type="hidden" name="post_id" value="<?= $fetch_post['id']; ?>">
                    <div class="input-field">
                        <label>post status <sup>*</sup></label>
                        <select name="status">
                            <option value="<?= $fetch_post['status']; ?>" selected><?= $fetch_post['status']; ?></option>
                            <option value="active">active</option>
                            <option value="deactive">deactive</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>product name <sup>*</sup></label>
                        <input type="text" name="title" value="<?= $fetch_post['name']; ?>">
                    </div>
                    <div class="input-field">
                        <label>product price <sup>*</sup></label>
                        <input type="price" name="price" value="<?= $fetch_post['price']; ?>">
                    </div>
                    <div class="input-field">
                        <label>product detail <sup>*</sup></label>
                        <textarea name="content"><?= $fetch_post['product_detail']; ?></textarea>
                    </div>
                    <div class="input-field">
                        <label>product category <sup>*</sup></label>
                        <select name="category" required>
                            <option selected><?= $fetch_post['category']; ?></option>
                            <option value="what's hot">what's hot</option>
                            <option value="burgers">burgers</option>
                            <option value="chicken and salads">chicken and salads</option>
                            <option value="tacos, fries  and sides">tacos, fries  and sides</option>
                            <option value="breakfast">breakfast</option>
                            <option value="family dinner">family dinner</option>
                            <option value="shakes and desserts">shakes and desserts</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Product Image <sup>*</sup></label>
                        <input type="file" name="image" accept="image/*">
                        <?php if ($fetch_post['image'] != '') { ?>
                            <!-- Display the current image if it exists -->
                             <img src="../uploaded_img/<?= $fetch_post['image']; ?>" class="image" id="productImage">
                             <!-- Separate form for deleting the image -->
                            <form action="" method="post" style="display: inline;">
                                <input type="hidden" name="post_id" value="<?= $fetch_post['id']; ?>">
                                <button type="submit" name="delete_image" class="btn" onclick="return confirm('Delete this image?');">Delete Image</button>
                            </form>
                        <?php } ?>

                        <!-- Other buttons: save, delete post, etc. -->
                    <div class="flex-btn" style="margin-top: 1rem;">
                        <input type="submit" name="save" value="Save Post" class="btn">
                        <input type="submit" name="delete_post" value="Delete Post" class="btn">
                        <a href="view_post.php" class="btn" style="width: 49%; text-align: center; height: 3rem; margin-top: .7rem;">go back</a>
                    </div>
            </div>

                        <?php
                    }
                }else{
                    echo '
                    <div class="empty">
                         <p>no product added yet <br> <a href="add_post.php" class="btn" style="margin-top: 1.5rem;">add product</a></p>
                    </div>                    
                    ';
                ?>

                <div class="flex-btn">
                    <a href="view_post.php" class="btn">view post</a>
                    <a href="add_post.php" class="btn">add product</a>
                </div>
            <?php } ?> 
            </div>
            
        </section>
    </div>

    <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js link -->
<script type="text/javascript" src="script.js"></script>

<?php include '../components/dark.php'; ?>
<?php include '../components/alert.php' ?>
</body>
</html>
