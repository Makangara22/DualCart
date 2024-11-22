    <?php 
        include '../components/connect.php';

        session_start();
        
        $admin_id = $_SESSION['admin_id'];

        if (!isset($admin_id)){
            header ('location:admin_login.php');
        }


        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $name = filter_var($name, FILTER_SANITIZE_STRING);
            $email = $_POST['email'];
            $email = filter_var($email, FILTER_SANITIZE_STRING);
            $pass = sha1($_POST['pass']);
            $pass = filter_var($pass, FILTER_SANITIZE_STRING);
            $cpass = sha1($_POST['cpass']);
            $cpass = filter_var($cpass, FILTER_SANITIZE_STRING);

            $image = $_FILES['image']['name'];
            $image = filter_var($image, FILTER_SANITIZE_STRING);
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_folder = '../uploaded_img/'.$image;

            $select_admin = $conn->prepare("SELECT * FROM `admin` WHERE name=?");
            $select_admin->execute([$name]);

            if ($select_admin->rowCount() > 0){
                $warning_msg[] = 'username already exist';
            }else{
                if ($pass != $cpass) {
                    $warning_msg[] = 'confirm password not matched';
                }else{
                    $insert_admin = $conn->prepare("INSERT INTO `admin`(name, email, password, profile) VALUES(?,?,?,?)");
                    $insert_admin->execute([$name, $email, $cpass, $image]);
                    move_uploaded_file($image_tmp_name, $image_folder);
                    $success_msg[] = "new admin registered successfully";
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
        <!-- SweetAlert from cdnjs -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

        <!-- box icon cdn link -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <title>Admin - registration page</title>
    </head>
    <body>
    <div class="main-container">
        <?php include '../components/admin_header.php'; ?>
        <section>
            <div class="form-container" id="admin_login">
                <form action="" method="post" enctype="multipart/form-data">
                    <h3>register now</h3>
                    <div class="input-field">
                        <label>username <sup>*</sup></label>
                        <input type="text" name="name" maxlength="20" required placeholder="Enter Username" oninput="this.value.replace(/\s/g,'')">
                    </div>
                    <div class="input-field">
                        <label>user email <sup>*</sup></label>
                        <input type="email" name="email" maxlength="25" required placeholder="Enter User email" oninput="this.value.replace(/\s/g,'')">
                    </div>
                    <div class="input-field">
                        <label>user password <sup>*</sup></label>
                        <input type="password" name="pass" maxlength="20" required placeholder="Enter your password" oninput="this.value.replace(/\s/g,'')">
                    </div>
                    <div class="input-field">
                        <label>confirm password <sup>*</sup></label>
                        <input type="password" name="cpass" maxlength="20" required placeholder="confirm your password" oninput="this.value.replace(/\s/g,'')">
                    </div>
                    <div class="input-field">
                        <label>upload profile <sup>*</sup></label>
                        <input type="file" name="image" accept="image/*">
                    </div>
                    <input type="submit" name="submit" value="register now" class="btn">
                    <p>already have account <a href="admin_login.php">login now</a></p>
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