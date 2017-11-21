<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="view/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Mada:200,400" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script src='view/js/script.js'></script>
    <script src='view/js/validation.js'></script>
    <title>Pantry Pal</title>
</head>
<body>

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <h4>Login</h4>
            <form action="index.php?state=login" method="POST">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="username1" type="text" name="username" class="loginInput validate" pattern="^[A-Za-z0-9_]{3,20}$"></input>
                        <label for="username1" data-error="Username must be alphanumeric and have between 3 and 20 characters">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="password" type="password" name="password" class="loginInput validate" pattern=".{8,}"></input>
                        <label for="Password" data-error="Password must have at least 8 characters">Password</label>
                    </div>
                </div>
                <div class="row">
                    <button disabled id="loginSubmit" class="btn waves-effect waves-light" type="submit" name="action">Submit
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
            <form action="index.php?state=registration" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="firstName" type="text" name="firstName" class="registerInput validate" pattern="[a-zA-Z0-9]+"></input>
                        <label for="firstName" data-error="your last name must be alphanumeric">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="lastName" type="text" name="lastName" class="registerInput validate"  pattern="[a-zA-Z0-9]+"></input>
                        <label for="lastName" data-error="your last name must be alphanumeric">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="email" type="email" name="email" class="registerInput validate"></input>
                        <label for="email" data-error="Please eneter a valid email address">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="username2" type="text" name="username" class="registerInput validate" pattern="^[A-Za-z0-9_]{3,20}$"></input>
                        <label for="username2" data-error="Username must be alphanumeric and have between 3 and 20 characters">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Image</span>
                            <input type="file" name="fileToUpload" accept="image/*">
                        </div>
                        <div class="file-path-wrapper">
                            <input class="file-path validate" type="text" placeholder="Upload a Profile Picture" accept="image/*">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="registerPassword" type="password" name="password" class="registerInput validate" pattern=".{8,}"></input>
                        <label for="registerPassword" data-error="Password must have at least 8 characters">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="repeatPassword" type="password" name="password" class="registerInput validate" pattern=".{8,}"></input>
                        <label for="repeatPassword" data-error="Please repeat your password">Repeat Password</label>
                    </div>
                </div>
                <div class="row">
                    <button disabled id="registerSubmit" class="btn waves-effect waves-light" type="submit" name="action">Submit
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
            <div id="updateDetailsHeading">
                <img alt="profile Picture" id="profileImageHeading" class="responsive-img circle"></img>
                <h4 id="updateHeading"> Update your details</h4>
            </div>
            <form action="index.php?state=updateDetails" method="POST">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="updateFirstName" type="text" name="updateFirstName" class="updateInput validate" pattern="[a-zA-Z0-9]+"></input>
                        <label for="updateFirstName" data-error="your first name must be alphanumeric">First Name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="updateLastName" type="text" name="updateLastName" class="updateInput validate" pattern="[a-zA-Z0-9]+"></input>
                        <label for="updateLastName" data-error="your last name must be alphanumeric">Last Name</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="updateEmail" type="email" name="updateEmail" class="updateInput validate"></input>
                        <label for="updateEmail" data-error="Please eneter a valid email address">Email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="updateUsername" type="text" name="updateUsername" class="updateInput validate" pattern="^[A-Za-z0-9_]{3,20}$"></input>
                        <label for="updateUsername" data-error="Username must be alphanumeric and have between 3 and 20 characters">Username</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="updatePassword" type="password" name="updatePassword" class="updateInput validate" pattern=".{8,}"></input>
                        <label for="updatePassword" data-error="Password must have at least 8 characters">Password</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input id="updateRepeatPassword" type="password" name="password" class="updateInput validate" pattern=".{8,}"></input>
                        <label for="updateRepeatPassword" data-error="Please repeat your password">Repeat Password</label>
                    </div>
                </div>
                <div class="row">
                    <button disabled id="updateSubmit" class="btn waves-effect waves-light" type="submit" name="action">Submit
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
        <a class="footerItem" href="https://twitter.com/ZacharyCauchi"><img src="view/images/twitter.svg"></img></a>
        <a class="footerItem" href="https://github.com/ZacharyCauchi/pantry-app"><img src="view/images/github.svg"></img></a>
        <a class="footerItem" href="https://www.linkedin.com/in/zachary-cauchi-81458b150/"><img src="view/images/linkedin.svg"></img></a>
    </footer>

</body>
</html>