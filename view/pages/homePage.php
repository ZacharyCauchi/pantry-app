<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/materialize/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="view/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Mada:200,400" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="view/materialize/js/materialize.min.js"></script>
    <script src='view/js/script.js'></script>
    <title>Pantry Pal</title>
</head>
<body id="body">

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <h4>Login</h4>
            <form action="index.php?state=login" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="username" type="text" name="username"></input>
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" name="password"></input>
                        <label for="Password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">done</i>
                    </button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <div class="waves-effect waves-green btn-flat" onClick="switchToRegister()">Click here to register</div>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>

    <div id="registerModal" class="modal">
        <div class="modal-content">
            <h4>Register</h4>
            <form action="index.php?state=registration" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="firstName" type="text" name="firstName"></input>
                        <label for="firstName">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="lastName" type="text" name="lastName"></input>
                        <label for="lastName">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="text" name="email"></input>
                        <label for="email">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="username" type="text" name="username"></input>
                        <label for="username">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" name="password"></input>
                        <label for="Password">Password</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">done</i>
                    </button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <div class="waves-effect waves-green btn-flat" onClick="switchToLogin()">Click here to login</div>
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>

    <div id="updateModal" class="modal">
        <div class="modal-content">
            <h4>Update your details</h4>
            <form action="index.php?state=updateDetails" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="updateFirstName" type="text" name="updateFirstName"></input>
                        <label for="updateFirstName">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="updateLastName" type="text" name="updateLastName"></input>
                        <label for="updateLastName">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="updateEmail" type="text" name="updateEmail"></input>
                        <label for="updateEmail">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="updateUsername" type="text" name="updateUsername"></input>
                        <label for="updateUsername">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="updatePassword" type="password" name="updatePassword"></input>
                        <label for="updatePassword">Password</label>
                    </div>
                </div>
                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                        <i class="material-icons right">done</i>
                    </button>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>

    <div id="myRecipesModal" class="modal">
        <div class="modal-content" id="myRecipesContent">
            <div class="row">
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
        </div>
    </div>

    <div id="recipeModalContainer" class="modal">
        <div class="modal-content" id="recipeModal">
            <div class="row">
            </div>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
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
        <div id="searchContainer">
        <input type="text" id="ingredientSearch" placeholder="What ingredients do you have on hand?"></input>
            <button class="btn-floating btn-large waves-effect waves-light blue lighten-2" id="searchBut" type="submit" name="action" onClick="ingredientPreview()">
                <i class="large material-icons">search</i>
            </button>
        </div>
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