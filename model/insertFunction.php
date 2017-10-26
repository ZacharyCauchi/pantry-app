<?php
function insertFunction($values = array(), $conditions = array()){
    session_start();
    include('dbconnection.php');
    $sql = 'INSERT INTO ';
    if(array_key_exists('state', $conditions)) {
       if($conditions['state'] == 'likeRecipe'){
            $sql = $sql . 'savedRecipes (savedRecipeId, userId) VALUES(' . $values . ', ' . $_SESSION['userID'] . ')';
            $res = $db->prepare($sql);
            $res->execute();
            echo "success";
        }
    }   
}
?>