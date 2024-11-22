<?php
    include 'connect.php';

    session_start();
    session_unset();
    session_destroy();
    header('location:../admin_panel/admin_login.php');
?>