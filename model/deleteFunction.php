<?php
function deleteFunction($user, $conditions = array()){
    session_start();
    if($_SESSION['loggedIn'] == 'admin'){
        include('dbconnection.php');
        $sql = 'DELETE FROM ';
        if($conditions['table'] = 'userDetails'){
            $sql .= "userDetails WHERE userID = " . $user;
            $res = $db->prepare($sql);
            $res->execute();
        }
    } 
    else {
        die();
    }
}
?>