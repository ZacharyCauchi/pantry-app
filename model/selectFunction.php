<?php
function selectFunction($user, $conditions = array()){
    include('dbconnection.php');
    header('Content-Type: application/json');
    if(array_key_exists('state',$conditions)) {
        if($conditions['state'] == 'returnAll'){
            if($conditions['table'] == 'savedRecipes'){
                $sql = 'SELECT savedRecipeID FROM ';
                $sql = $sql . "savedrecipes WHERE userID = " . $user;
                $res = $db->prepare($sql);
                $res->execute();
                $queryResults = $res->fetchAll(PDO::FETCH_ASSOC);
            }
        }
        else if($conditions['table'] == 'users'){
            $sql = 'SELECT firstName, lastName, email, username, profileImage FROM ';
            $sql = $sql . "userdetails WHERE userID = " . $user;
            $res = $db->prepare($sql);
            $res->execute();
            $queryResults = $res->fetch(PDO::FETCH_ASSOC);
        } 
            echo json_encode($queryResults);
        
    }
}

?>