<?php
include('../controller/loginFunction.php');
include('../controller/registerFunction.php');
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

if(isset($_SESSION['loggedIn'])){
    if($_SESSION['loggedIn'] == 'user'){
        include '../view/navbarUser.php';
        include '../view/pages/homePage.php';
    } else if($_SESSION['loggedIn'] == 'admin') {
        include '../view/navbarAdmin.php';
        include '../view/pages/adminPage.php';
    }
} 
if(isset($_GET['state'])){
    if($_GET['state'] == 'login'){
        $user = $_POST["username"];
        $pass = $_POST["password"];
        loginFunction($user, $pass);

    } elseif($_GET['state'] == 'registration'){
        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        $user = $_POST["username"];
        $pass = $_POST["password"];
        registerFunction($firstName, $lastName, $email, $user, $pass);
        
    } elseif($_GET['state'] == 'updateDetails'){
        updateFunction();
    }
} 
else {
    if ($_SESSION['failCount'] > 50){
        echo 'Too many failed attempts, try again soon';
    } else {
    include '../view/navbarAnonymous.php';
    include '../view/pages/homePage.php';
    }    
}
?>
