<?php

if (!isset($_GET['act'])){
    if (isset($_POST['ubahpassword'])){
        ubahpasswordadmin($_POST['usernamelama'], $_POST['usernamebaru'], $_POST['password'], $_POST['passwordbaru1'], $_POST['passwordbaru2']);
    }
    include 'page/admin/index.php';
}else{
    switch ($_GET['act']) {
        default:
            include 'page/error/error.php';
            break;
    }
}