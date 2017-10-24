<?php
function inputCheck($userInput){
    if(is_array($userInput) == true) {
        for ($i = 0; $i < count($userInput); $i++) {
            $userInput[$i] = trim($userInput[$i]);
            $userInput[$i] = stripslashes($userInput[$i]);
            $userInput[$i] = htmlspecialchars($userInput[$i]);
        }
    }
    else {
        $userInput = trim($userInput);
        $userInput = stripslashes($userInput);
        $userInput = htmlspecialchars($userInput);
    }
    return $userInput;
}
?>