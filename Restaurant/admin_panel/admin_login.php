<?php 
    include '../components/connect.php';

    session_start();
    


    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $name = filter_var($name, FILTER_SANITIZE_STRING);

        $pass = sha1($_POST['pass']);
        $pass = filter_var($pass, FILTER_SANITIZE_STRING);
       
        $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name=? AND password=?");
        $select_admin->execute([$name, $pass]);

        if ($select_admin->rowCount() > 0){
            $fetch_admin_id = $select_admin->fetch(PDO::FETCH_ASSOC);
            $_SESSION['admin_id'] = $fetch_admin_id['id'];
            header('location:dashboard.php');
        }else{
            $warning_msg[] = 'incorrect username or password';
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
    <!-- SweetAlert from cdnjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <!-- box icon cdn link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin - registration page</title>
</head>
<body>
<div class="main-container">
    <?php include '../components/admin_header.php'; ?>
    <section class="form-container" id="admin_login">
            <form action="" method="post" enctype="multipart/form-data">
                <h3>login now</h3>
                <div class="input-field">
                    <label>username <sup>*</sup></label>
                    <input type="text" name="name" maxlength="20" required placeholder="Enter Username" oninput="this.value.replace(/\s/g,'')">
                </div>
                <div class="input-field">
                    <label>user password <sup>*</sup></label>
                    <input type="password" name="pass" maxlength="20" required placeholder="Enter your password" oninput="this.value.replace(/\s/g,'')">
                </div>
                <input type="submit" name="submit" value="login now" class="btn">

            </form>
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