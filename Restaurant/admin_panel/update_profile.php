<?php 
    include '../components/connect.php';

    session_start();
    
    $admin_id = $_SESSION['admin_id'];

    if (!isset($admin_id)) {
        header('location:admin_login.php');
    }

    if (isset($_POST['submit'])) {
        // Update name
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        
        if (!empty($name)) {
            $select_name = $conn->prepare("SELECT * FROM `admin` WHERE name=?");
            $select_name->execute([$name]); 
            
            if ($select_name->rowCount() > 0) {
                $warning_msg[] = 'Username already exists';
            } else {
                $update_name = $conn->prepare("UPDATE `admin` SET name=? WHERE id=?");
                $update_name->execute([$name, $admin_id]);
                $success_msg[] = 'Name updated successfully';
            }
        }
    
        // Update email
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
        if (!empty($email)) {
            $select_email = $conn->prepare("SELECT * FROM `admin` WHERE email=?");
            $select_email->execute([$email]); 
            
            if ($select_email->rowCount() > 0) {
                $warning_msg[] = 'Email already exists';
            } else {
                $update_email = $conn->prepare("UPDATE `admin` SET email=? WHERE id=?");
                $update_email->execute([$email, $admin_id]);
                $success_msg[] = 'Email updated successfully';
            }
        }

        // Update image
        $old_image = $_POST['old_image'];
        $image = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        
        if (!empty($image)) {
            $image = uniqid() . '_' . filter_var($image, FILTER_SANITIZE_STRING);
            $image_folder = '../uploaded_img/' . $image;

            $update_image = $conn->prepare("UPDATE `admin` SET profile=? WHERE id=?");
            $update_image->execute([$image, $admin_id]);

            if (move_uploaded_file($image_tmp_name, $image_folder)) {
                if (!empty($old_image) && $old_image != $image && file_exists("../uploaded_img/$old_image")) {
                    unlink("../uploaded_img/$old_image");
                }
                $success_msg[] = 'Image updated successfully';
            } else {
                $warning_msg[] = 'Image upload failed';
            }
        }
        
        // Update password
        $empty_pass = sha1('');
        $select_old_pass = $conn->prepare("SELECT password FROM `admin` WHERE id=?");
        $select_old_pass->execute([$admin_id]);
        $fetch_prev_pass = $select_old_pass->fetch(PDO::FETCH_ASSOC);
        $prev_pass = $fetch_prev_pass['password'];

        $old_pass = sha1($_POST['old_pass']);
        $new_pass = sha1($_POST['new_pass']);
        $cpass = sha1($_POST['cpass']);

        if (!empty($old_pass) && $old_pass != $empty_pass) {
            if ($old_pass != $prev_pass) {
                $warning_msg[] = 'Old password not matched';
            } elseif ($new_pass != $cpass) {
                $warning_msg[] = 'Confirm password not matched';
            } elseif ($new_pass == $empty_pass) {
                $warning_msg[] = 'Please enter a new password';
            } else {
                $update_pass = $conn->prepare("UPDATE `admin` SET password=? WHERE id=?");
                $update_pass->execute([$new_pass, $admin_id]);
                $success_msg[] = 'Password updated successfully';
            }
        }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin - Update Profile</title>
</head>
<body>
<div class="main-container">
    <?php include '../components/admin_header.php'; ?>
    <section>
        <div class="form-container" id="admin_login">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="profile">
                    <img src="../uploaded_img/<?php echo $fetch_profile['profile']; ?>" class="logo-img" width="300" >
                </div>
                <h3>Update Profile</h3>
                <input type="hidden" name="old_image" value="<?= $fetch_profile['profile']; ?>">
                <div class="input-field">
                    <label>Username <sup>*</sup></label>
                    <input type="text" name="name" maxlength="20" placeholder="Enter Username" oninput="this.value.replace(/\s/g,'')" value="<?= $fetch_profile['name']; ?>">
                </div>
                <div class="input-field">
                    <label>User Email <sup>*</sup></label>
                    <input type="email" name="email" maxlength="25" placeholder="Enter User email" oninput="this.value.replace(/\s/g,'')" value="<?= $fetch_profile['email']; ?>">
                </div>
                <div class="input-field">
                    <label>Old Password <sup>*</sup></label>
                    <input type="password" name="old_pass" maxlength="20" placeholder="Enter your old password" oninput="this.value.replace(/\s/g,'')">
                </div>
                <div class="input-field">
                    <label>New Password <sup>*</sup></label>
                    <input type="password" name="new_pass" maxlength="20" placeholder="Enter your password" oninput="this.value.replace(/\s/g,'')">
                </div>
                <div class="input-field">
                    <label>Confirm Password <sup>*</sup></label>
                    <input type="password" name="cpass" maxlength="20" placeholder="Confirm your password" oninput="this.value.replace(/\s/g,'')">
                </div>
                <div class="input-field">
                    <label>Upload Profile <sup>*</sup></label>
                    <input type="file" name="image" accept="image/*">
                </div>
                <input type="submit" name="submit" value="Update Profile" class="btn">
            </form>
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