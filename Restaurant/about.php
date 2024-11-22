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
    <title>Restaurant  - about us page</title>
</head>
<body>
    <?php include 'components/user_header.php'; ?>

    <div class="banner">
        <div class="detail">
            <h1>about us</h1>
            <a href="home.php">home</a><span><i class="bx bx-right-arrow-alt"></i>about us</span>
        </div>
    </div>
    <div class="about-us">
        <div class="box-container">
            <div class="box">
                <span>our short story</span>
                <h1>Dedicated to delight you</h1>
                <p>we brong you the unforgettable moment with our delicious dishes. all of our heart are made from 
                    Scatch using Family
                    Reciped qith only the highest quality ingredients. we sell fresh food daily to ensure
                    only the best
                    product are sold to
                    our customer.</p>
                <span>our services</span>
                <div class="services">
                    <div class="img-box">
                        <div class="img">
                            <img src="image/icon-13.png">
                        </div>
                        <p>reservation</p>
                    </div>
                    <div class="img-box">
                        <div class="img">
                            <img src="image/icon-14.png">
                        </div>
                        <p>private event</p>
                    </div>
                    <div class="img-box">
                        <div class="img">
                            <img src="image/icon-15.png">
                        </div>
                        <p>online order</p>
                    </div>
                </div>
            </div>
            <div class="box">
                <img src="image/about.png">
            </div>
        </div>
    </div>

    <div class="process">
        <div class="box-container">
            <div class="box">
                <img src="image/process.png">
            </div>
            <div class="box">
                <span>Experience The Best food</span>
                <h1>How To Order?</h1>
                <p>Follow The Step</p>
                <div class="steps">
                    <div class="img-box">
                        <div style="display: flex; align-items: center;">
                            <div class="img">
                                <img src="image/icon-16.png">
                            </div>
                            <div><img src="image/icon-19.png" alt=""></div>
                        </div>
                        <span>1</span>
                        <p>make your order</p>
                    </div>
                    <div class="img-box">
                        <div style="display: flex; align-items: center;">
                            <div class="img">
                                <img src="image/icon-17.png">
                            </div>
                            <div><img src="image/icon-19.png" alt=""></div>
                        </div>
                        <span>2</span>
                        <p>food is on the way </p>
                    </div>
                    <div class="img-box">
                        <div style="display: flex; align-items: center;">
                            <div class="img">
                                <img src="image/icon-18.png">
                            </div>
                            
                        </div>
                        <span>3</span>
                        <p>eat & enjoy !</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="team">
        <div class="title">
            <span>We Make Special</span>
            <h1>Meet Our Chef</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure illum id ad eum quos esse tenetur laborum deserunt maiores saepe exercitationem iusto, delectus eaque. Expedita praesentium dolorem facere quasi at.</p>
        </div>
        <div class="box-container">
            <div class="box">
                <div class="img-box">
                    <img src="image/team-1.png">
                </div>
                <div class="detail">
                    <h1>Brighton Maziku</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="image/team-2.png">
                </div>
                <div class="detail">
                    <h1>Alexa Bliss</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="image/team-3.png">
                </div>
                <div class="detail">
                    <h1>Brian Mwabange</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="image/team-4.png">
                </div>
                <div class="detail">
                    <h1>Doris Domelu</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="image/team-5.png">
                </div>
                <div class="detail">
                    <h1>Gianna lauraine</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="image/team-6.png">
                </div>
                <div class="detail">
                    <h1>Gregory Schmichel</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="image/team-7.png">
                </div>
                <div class="detail">
                    <h1>Randy Rollins</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="img-box">
                    <img src="image/team-8.png">
                </div>
                <div class="detail">
                    <h1>Natasha Banks</h1>
                    <div class="social-links">
                        <i class="bx bxl-facebook"></i>
                        <i class="bx bxl-twitter"></i>
                        <i class="bx bxl-instagram-alt"></i>
                        <i class="bx bxl-linkedin"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="reviews">
        <div class="title">
            <h1>The Best Food In Town</h1>
        </div>
        <div class="box-container">
            <div class="img-box">
                <img src="image/client.png" alt="">
            </div>
            <div class="reviews-container">
                <?php
                    $select_reviews = $conn->prepare("SELECT * FROM `reviews` LIMIT 2");
                    $select_reviews->execute($get_id);


                    if ($select_reviews->rowCount() > 0) {
                        while($fetch_reviews = $select_reviews->fetch(PDO::FETCH_ASSOC)){

                ?>
                    <div class="box" <?php if($fetch_reviews['user_id']==$user_id){echo 'style="order:-1"';} ?>>
                        <?php
                        $select_user = $conn->prepare("SELECT * FROM `users` WHERE ID=?");
                        $select_user->execute([$fetch_reviews['user_id']]);

                        while($fetch_user = $select_user->fetch(PDO::FETCH_ASSOC)){ 


                        ?>
                        <div class="user">
                            <?php if ($fetch_user['profile'] != ''){ ?>
                                <img src="uploaded_img/<?= $fetch_user['profile']; ?>">
                            <?php }else{ ?>
                                <h3><?= substr($fetch_user['name'], 0,1); ?></h3>
                            <?php } ?>
                            <div>
                                <p><?= $fetch_user['name']; ?></p>
                                <span><?= $fetch_reviews['date']; ?></span>
                            </div>
                        </div>
                        <?php } ?>
                            <div class="ratings">
                                <?php if($fetch_reviews['rating'] == 1){ ?>
                                    <p><i class="bx bxs-star"></i><span><?= $fetch_reviews['rating']; ?></span></p>
                                <?php } ?>
                                <?php if($fetch_reviews['rating'] == 2){ ?>
                                    <p><i class="bx bxs-star"></i><span><?= $fetch_reviews['rating']; ?></span></p>
                                <?php } ?>
                                <?php if($fetch_reviews['rating'] == 3){ ?>
                                    <p><i class="bx bxs-star"></i><span><?= $fetch_reviews['rating']; ?></span></p>
                                <?php } ?>
                                <?php if($fetch_reviews['rating'] == 4){ ?>
                                    <p><i class="bx bxs-star"></i><span><?= $fetch_reviews['rating']; ?></span></p>
                                <?php } ?>
                                <?php if($fetch_reviews['rating'] == 5){ ?>
                                    <p><i class="bx bxs-star"></i><span><?= $fetch_reviews['rating']; ?></span></p>
                                <?php } ?>
                            </div>
                            <h3 class="title"><?= $fetch_reviews['title'];?></h3>
                            <?php if($fetch_reviews['description'] != ''){ ?>
                                <p class="description"><?= $fetch_reviews['description']; ?></p>
                            <?php } ?>
                    </div>
                    <?php        
                        }
                    }else{
                        echo '
                        <div class="empty">
                            <p>no review added yet!</p>
                        </div>
                        ';

                    }
                ?>
            </div>
        </div>
    </div>

    <?php include 'components/footer.php'; ?>

    <!-- sweetalert cdn link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<!-- custom js link -->
<script type="text/javascript" src="script.js"></script>

<?php include 'components/dark.php'; ?>
<?php include 'components/alert.php' ?>
</body>
</html>
