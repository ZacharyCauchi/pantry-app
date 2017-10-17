<?php
include('../model/selectFunction.php');
include('../model/spoontacularFunction.php');

if ($_GET['state'] == 'showUserDetails'){
    selectFunction($_POST['user'], array('state' => 'returnAll', 'table' => 'users'));
}
else if($_GET['state'] == 'ingredientSearch'){
    spoontacularFunction($_POST['startsWith'], array('state' => 'ingredientSearch'));
}
else if($_GET['state'] == 'recipeSearch'){
    spoontacularFunction($_POST['ingArr'], array('state' => 'recipeSearch'));
}
?>