<?php
include('../controller/loginFunction.php');
include('../controller/registerFunction.php');
include('../controller/inputFilter.php');
include('../model/updateFunction.php');

session_start();
if(!isset($_SESSION['failCount'])){
    $_SESSION['failCount'] = 0;
}
if(isset($_GET['logout'])) {
    session_destroy();
    session_start();
    $_SESSION['failCount'] = 0;
}
if(isset($_GET['state'])){
    if($_GET['state'] == 'login'){
        $user = filter_var(inputCheck($_POST['username']), FILTER_SANITIZE_STRING);
        $pass = filter_var(inputCheck($_POST['password']), FILTER_SANITIZE_STRING);
        loginFunction($user, $pass);

    } elseif($_GET['state'] == 'registration'){
        $firstName = filter_var(inputCheck($_POST['firstName']), FILTER_SANITIZE_STRING);
        $lastName = filter_var(inputCheck($_POST['lastName']), FILTER_SANITIZE_STRING);
        $email = filter_var(inputCheck($_POST['email']), FILTER_SANITIZE_STRING);
        $user = filter_var(inputCheck($_POST['username']), FILTER_SANITIZE_STRING);
        $pass = filter_var(inputCheck($_POST['password']), FILTER_SANITIZE_STRING);
        registerFunction($firstName, $lastName, $email, $user, $pass);
        
    } elseif($_GET['state'] == 'updateDetails'){
        updateFunction();
    }
}

if(isset($_SESSION['loggedIn'])){
    if($_SESSION['loggedIn'] == 'user'){
        include '../view/navbarUser.php';
        include '../view/pages/homePage.php';
    } else if($_SESSION['loggedIn'] == 'admin') {
        include '../view/navbarAdmin.php';
        include '../view/pages/adminPage.php';
    }
} else {
    if ($_SESSION['failCount'] > 50){
        echo 'Too many failed attempts, try again soon';
    } else {
    include '../view/navbarAnonymous.php';
    include '../view/pages/homePage.php';
    }    
}
?>
