<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../view/materialize/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../view/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Mada:200,400" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../view/materialize/js/materialize.min.js"></script>
    <script src='../view/js/script.js'></script>
    <title>Pantry Pal</title>
</head>
<body id="body">
<div id="modalBackground">
    <div class="loginBox" id="registrationBox">
        <img src="../view/images/close.png" class="closeButton" onClick="closeModal()"></img>
        <form action="../controller/loginController.php?state=registration" method="POST">
            Register <br />
            <div class="loginText">First Name:</div><input type="text" name="firstName" class="formInput"></input> <br />
            <div class="loginText">Last Name:</div><input type="text" name="lastName" class="formInput"></input> <br />
            <div class="loginText">Email:</div><input type="text" name="email" class="formInput"></input> <br />
            <div class="loginText">Username:</div><input type="text" name="username" class="formInput"></input> <br />
            <div class="loginText">Password:</div><input type="text" name="password" class="formInput"></input> <br />
            <input type="submit" value="Submit" id="registrationSubmit">
            <input type="button" value="Already a member? click here to login" onClick="switchToLogin()"></input>
        </form>
    </div>
    <div class="loginBox" id="loginBox">
        <img src="../view/images/close.png" class="closeButton" onClick="closeModal()"></img>
        <form action="../controller/loginController.php?state=login" method="POST">
            Login <br />
            <div class="loginText">Username:</div><input type="text" name="username" class="formInput"></input>
            <div class="loginText">Password:</div><input type="text" name="password" class="formInput"></input>
            <input type="submit" value="Submit" id="loginSubmit" class="loginButton">
            <input type="button" value="Not a member? Click here to register" onClick="switchToRegister()"></input>
        </form>
    </div>
    <div class="loginBox" id="updateDetailsBox">
        <img src="../view/images/close.png" class="closeButton" onClick="closeModal()"></img>
        <form action="loginController.php?state=updateDetails" method="POST">
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
    <div class="header">
        <div class="headerSpacer">
        </div>
        <div class="headerText">
            <h2>it's as simple as 1 - 2 - 3!</h2>
            <h3>
                <ol>
                    <li>Add ingredients you have at home</li>
                    <li>Find a recipe you love</li>
                    <li>Make great food!</li>
                </ol>
            </h3>

        </div>
        <input type="text" id="ingredientSearch" placeholder="What ingredients do you have on hand?" onChange="ingredientPreview(this.value)"></input>
        <div id="ingredientSearchList">
        </div>
    </div>
    <div class="resultSection" id="resultID">
        <div id="recipeSection">
        </div>
        <div id="ingredientSection">
        </div>
    </div>
    <div class="aboutSection" id="aboutID">
        <h4>This is the About section</h4>
    </div>
    <footer>
        <div class="footerText">This is the Footer</div>
        <?php if(isset($e)){echo $e;} ?>
    </footer>
</body>
</html>