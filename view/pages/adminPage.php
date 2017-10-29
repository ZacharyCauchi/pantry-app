<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Mada:200,400" rel="stylesheet">
    <script src='view/js/script.js'></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <title>admin Panel</title>
</head>
    <body>
        <div id="adminBox">
        </div>
        <div id="modalBackground">
            <div class="loginBox" id="updateDetailsBox">
            <img src="view/images/close.png" class="closeButton" onClick="closeModal()"></img>
                <form action="index.php?state=updateDetails" method="POST">
                    Update your details Below <br />
                    <div class="loginText">First Name:</div><input type="text" name="updateFirstName" class="formInput" id="updateFirstName"></input> <br />
                    <div class="loginText">Last Name:</div><input type="text" name="updateLastName" class="formInput" id="updateLastName"></input> <br />
                    <div class="loginText">Email:</div><input type="text" name="updateEmail" class="formInput" id="updateEmail"></input> <br />
                    <div class="loginText">Username:</div><input type="text" name="updateUsername" class="formInput" id="updateUsername"></input> <br />
                    <div class="loginText">Password:</div><input type="text" name="updatePassword" class="formInput" id="updatePassword"></input> <br />
                    <input type="submit" value="Submit" id="updateDetailsSubmit">
                </form>
            </div>
        </div>
    <footer>
    <div class="footerText">This is the Footer</div>
    <?php echo $e; ?>
    </footer>
    </body>
</html>
