<?php
function loginFunction($user, $pass){
    include('../model/dbconnection.php');
    $sql = "SELECT * FROM userDetails WHERE username = '" . $user . "'";
    $res = $db->prepare($sql);
    $res->execute();
    $dbPassword = $res->fetch(PDO::FETCH_ASSOC);
    if(password_verify($pass, $dbPassword['password'])){
        $_SESSION['loggedIn'] = true;
        $_SESSION['userID'] = $dbPassword['userID'];
        header('Location:loginController.php');
    } else {
        $_SESSION['failCount'] = $_SESSION['failCount'] + 1;
        header('Location:loginController.php');
    }
}
?>