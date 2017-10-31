<?php
function registerFunction($firstName, $lastName, $email, $user, $pass){
    include('model/dbconnection.php');
    $passNew = password_hash($pass, PASSWORD_DEFAULT);
    $sql = "INSERT INTO userdetails (firstName, lastName, password, email, username) VALUES('" . $firstName . "', '" . $lastName . "', '" . $passNew . "', '" . $email . "', '" . $user ."');";
    $res = $db->prepare($sql);
    $res->execute();
    header('Location:index.php');
}
?>