<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/materialize/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="view/css/style.css">
    <link rel="stylesheet" href="view/css/adminStyle.css">
    <link href="https://fonts.googleapis.com/css?family=Mada:200,400" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="view/materialize/js/materialize.min.js"></script>
    <script src='view/js/script.js'></script>
    <script src='view/js/validation.js'></script>
    <script src='view/js/adminScript.js'></script>
    <title>admin Panel</title>
</head>
    <body>
        <div id="adminSection">
            <h4>This is the About section</h4>
        </div>
        <div id="updateModal" class="modal">
            <div class="modal-content">
                <div id="updateDetailsHeading">
                    <img id="profileImageHeading" class="responsive-img circle"></img>
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
        <footer>
            <div class="footerText">This is the Footer</div>
            <?php if(isset($e)){echo $e;} ?>
        </footer>
    </body>
</html>
