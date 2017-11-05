<?php
function loginFunction($user, $pass){
    include('model/dbconnection.php');
    $sql = "SELECT * FROM userdetails WHERE username = '" . $user . "'";
    $res = $db->prepare($sql);
    $res->execute();
    $dbPassword = $res->fetch(PDO::FETCH_ASSOC);
    if(password_verify($pass, $dbPassword['password'])){
        if($dbPassword['role'] == 'admin'){
            $_SESSION['loggedIn'] = $dbPassword['role'];
            $_SESSION['userID'] = $dbPassword['userID'];
            header('Location:index.php');
        } else {
            $_SESSION['loggedIn'] = 'user';
            $_SESSION['userID'] = $dbPassword['userID'];
            header("Location:index.php");
        }
    } else {
        $_SESSION['failCount'] = $_SESSION['failCount'] + 1;
        header('Location:index.php');
    }
}
?>