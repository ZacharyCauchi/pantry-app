<?php
function updateFunction(){
    include('model/dbconnection.php');
    $sql1 = "UPDATE userDetails SET ";
    if(isset($_POST['updateFirstName'])){
        if($_POST['updateFirstName'] != ''){
            $sql1 = $sql1 . "firstName = '" . $_POST['updateFirstName'] . "', ";
        }
    }
    if(isset($_POST['updateLastName'])){
        if($_POST['updateLastName'] != ''){
            $sql1 = $sql1 . "lastName = '" . $_POST['updateLastName'] . "', ";
        }
    }
    if(isset($_POST['updateEmail'])){
        if($_POST['updateEmail'] != ''){
            $sql1 = $sql1 . "email = '" . $_POST['updateEmail'] . "', ";
        }
    }
    if(isset($_POST['updateUsername'])){
        if($_POST['updateUsername'] != ''){
            $sql1 = $sql1 . "username = '" . $_POST['updateUsername'] . "', ";
        }
    }
    if(isset($_POST['updatePassword'])){
        if($_POST['updatePassword'] != ''){
            $passNew = password_hash($_POST['updatePassword'], PASSWORD_DEFAULT);
            $sql1 = $sql1 . "Password = '" . $passNew . "', ";
        }
    }
    $sql1 = rtrim($sql1, ", ");
    $sql1 = $sql1 . " WHERE userID = " . $_SESSION['userID'];
    $res = $db->prepare($sql1);
    $res->execute();
}
?>