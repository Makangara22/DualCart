<?php 
        include 'components/connect.php';
        session_start();
    
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
        }else{
            $user_id = '';
        }

        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_STRING);
            $pass = sha1($_POST['pass']);
            $pass = filter_var($pass, FILTER_SANITIZE_STRING);

            $select_user = $conn->prepare("SELECT * FROM `users` WHERE email = ? AND password = ?");
            $select_user->execute([$email, $pass]);
            $row = $select_user->fetch(PDO::FETCH_ASSOC);
            
            if ($select_user->rowCount() > 0) {

                $_SESSION['user_id'] = $row['id'];
                header('location:home.php');
            }else{
                $warning_msg[] = 'incorrect password or username';
            }
        }
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

        <!-- box icon cdn link -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>Admin - registration page</title>
    </head>
    <body>
        <section>
            <div class="form-container" id="admin_login">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>login now</h3>
                    <div class="input-field">
                        <label>user email <sup>*</sup></label>
                        <input type="email" name="email" maxlength="25" required placeholder="Enter User email" oninput="this.value.replace(/\s/g,'')">
                    </div>
                    <div class="input-field">
                        <label>user password <sup>*</sup></label>
                        <input type="password" name="pass" maxlength="20" required placeholder="Enter your password" oninput="this.value.replace(/\s/g,'')">
                    </div>
                    <input type="submit" name="submit" value="login now" class="btn">
                    <p>do not have account <a href="register.php">register now</a></p>
                </form>
            </div>
        </section>

        <!-- sweetalert cdn link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <!-- custom js link -->
        <script type="text/javascript" src="script.js"></script>

        <?php include 'components/dark.php'; ?>
        <?php include 'components/alert.php' ?>
    </body>
    </html>