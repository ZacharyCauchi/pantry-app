<?php
include('../model/selectFunction.php');
include('../model/spoontacularFunction.php');
include('../controller/inputFilter.php');

if ($_GET['state'] == 'showUserDetails'){
    $user = filter_var(inputCheck($_POST['username']), FILTER_SANITIZE_STRING);
    selectFunction($user, array('state' => 'returnAll', 'table' => 'users'));
}
else if($_GET['state'] == 'ingredientSearch'){
    $startsWith = filter_var(inputCheck($_POST['startsWith']), FILTER_SANITIZE_STRING);
    spoontacularFunction($startsWith, array('state' => 'ingredientSearch'));
}
else if($_GET['state'] == 'recipeSearch'){
    $ingArr = inputCheck($_POST['ingArr']);
    spoontacularFunction($ingArr, array('state' => 'recipeSearch'));
}
else if($_GET['state'] == 'getRecipe'){
    $recipeId = filter_var(inputCheck($_POST['recipeId']), FILTER_SANITIZE_STRING);
    spoontacularFunction($recipeId, array('state' => 'getRecipe'));
}
?>