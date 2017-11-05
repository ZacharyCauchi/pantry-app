<?php
include('../model/selectFunction.php');
include('../model/insertFunction.php');
include('../model/deleteFunction.php');
include('../model/spoontacularFunction.php');
include('../controller/inputFilter.php');

if ($_GET['state'] == 'showUserDetails'){
    $user = inputCheck($_POST['user']);
    selectFunction($user, array('state' => 'returnOne', 'table' => 'users'));
}
else if($_GET['state'] == 'showUserDetailsAdmin'){
    $user = '';
    selectFunction($user, array('state' => 'returnAll', 'table' => 'users'));
}
else if($_GET['state'] == 'ingredientSearch'){
    $startsWith = inputCheck($_POST['startsWith']);
    spoontacularFunction($startsWith, array('state' => 'ingredientSearch'));
}
else if($_GET['state'] == 'recipeSearch'){
    $ingArr = inputCheck($_POST['ingArr']);
    spoontacularFunction($ingArr, array('state' => 'recipeSearch'));
}
else if($_GET['state'] == 'getRecipe'){
    $recipeId = inputCheck($_POST['recipeId']);
    spoontacularFunction($recipeId, array('state' => 'getRecipe'));
}
else if($_GET['state'] == 'likeRecipe'){
    $recipeId = inputCheck($_POST['recipeId']);
    insertFunction($recipeId, array('state' => 'likeRecipe'));
}
else if ($_GET['state'] == 'showSavedRecipes'){
    $user = inputCheck($_POST['user']);
    selectFunction($user, array('state' => 'returnAll', 'table' => 'savedRecipes'));
}
else if ($_GET['state'] == 'deleteUser'){
    $user = inputCheck($_POST['user']);
    deleteFunction($user, array('table' => 'userdetails'));
}
?>