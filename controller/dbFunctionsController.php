<?php
include('../model/selectFunction.php');

if ($_GET['state'] == 'showUserDetails'){
        selectFunction($_POST['user'], array('state' => 'returnAll', 'table' => 'users'));
    }
?>