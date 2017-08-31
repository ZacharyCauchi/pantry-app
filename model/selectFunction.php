<?php
include('dbconnection.php');

header('Content-Type: application/json');
if(isset($_GET['state'])) {
    if($_GET['state'] == 'returnAll')
        $sql = 'SELECT firstName, lastName, email, username FROM ';
        if($_GET['table'] == 'users'){
            $sql = $sql . "userdetails WHERE userID = " . $_POST['user'];
            $res = $db->prepare($sql);
            $res->execute();
            $queryResults = $res->fetch(PDO::FETCH_ASSOC);
            echo json_encode($queryResults);
        }
}

?>