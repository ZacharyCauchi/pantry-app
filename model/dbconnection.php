<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=pantryapp;charset=utf8","root","");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException  $e ) {
    $_SESSION['error'] = $e;
    return false;
}

 ?>