<?php
function selectFunction($user, $conditions = array()){
    include('dbconnection.php');
    header('Content-Type: application/json');
    if(array_key_exists('state',$conditions)) {
        if($conditions['state'] == 'returnAll'){
            $sql = 'SELECT firstName, lastName, email, username FROM ';
            if($conditions['table'] == 'users'){
                $sql = $sql . "userdetails WHERE userID = " . $user;
                $res = $db->prepare($sql);
                $res->execute();
                $queryResults = $res->fetch(PDO::FETCH_ASSOC);
                echo json_encode($queryResults);
            }
        }
    }
}

?>