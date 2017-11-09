<?php
function registerFunction($firstName, $lastName, $email, $user, $pass){
    include('model/dbconnection.php');

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    if(isset($_POST["action"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
            $destination=$_SERVER['DOCUMENT_ROOT'].'/uploads/';
            $temp = explode(".", $_FILES["fileToUpload"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);
            echo end($temp);
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $destination . $newfilename);
            $passNew = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO userdetails (firstName, lastName, password, email, username, profileImage) VALUES('" . $firstName . "', '" . $lastName . "', '" . $passNew . "', '" . $email . "', '" . $user . "', '" . $newfilename . "');";
            $res = $db->prepare($sql);
            $res->execute();
            header('Location:index.php');
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
            $passNew = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO userdetails (firstName, lastName, password, email, username) VALUES('" . $firstName . "', '" . $lastName . "', '" . $passNew . "', '" . $email . "', '" . $user . "');";
            $res = $db->prepare($sql);
            $res->execute();
        }
    }
}
?>