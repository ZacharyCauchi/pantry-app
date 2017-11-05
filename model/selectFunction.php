<?php
function selectFunction($user, $conditions = array()){
    include('dbconnection.php');
    header('Content-Type: application/json');
    if(array_key_exists('state',$conditions)) {
            if($conditions['table'] == 'savedRecipes'){
                $sql = 'SELECT savedRecipeID FROM ';
                $sql = $sql . "savedrecipes WHERE userID = " . $user;
                $res = $db->prepare($sql);
                $res->execute();
                $queryResults = $res->fetchAll(PDO::FETCH_ASSOC);
            }else if($conditions['table'] == 'users'){
                $sql = 'SELECT userID, firstName, lastName, email, username, profileImage FROM userdetails';
                if($conditions['state'] == 'returnOne'){
                    $sql = $sql . " WHERE userID = " . $user;
                }
                $res = $db->prepare($sql);
                $res->execute();
                if($conditions['state'] == 'returnOne'){
                    $queryResults = $res->fetch(PDO::FETCH_ASSOC);
                }
                else if($conditions['state'] == 'returnAll'){
                    $queryResults = $res->fetchAll(PDO::FETCH_ASSOC);
                }
            } 
        echo json_encode($queryResults); 
    }
}

?>