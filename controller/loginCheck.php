<?php
session_start();
if(isset($_SESSION['loggedIn'])){
    echo "yes";
} else {
    echo "no";
}
?>