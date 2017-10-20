<nav>
    <div class="navBar nav-wrapper">
        <h1 onClick='scrollFunction3()'>Pantry Pal</h1>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li class="navItem" onClick='scrollFunction1()'>Recipes</li>
            <li class="navItem" onClick='scrollFunction2()'>About</li>
            <li class="navItem" onClick="showAccountUpdate(<?php echo $_SESSION['userID']; ?>)">Me</li>
            <li><a href="loginController.php?logout=true"><div class="navItem">Logout</div></a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li class="navItem" onClick='scrollFunction1()'>Recipes</li>
            <li class="navItem" onClick='scrollFunction2()'>About</li>
            <li class="navItem" onClick="showAccountUpdate(<?php echo $_SESSION['userID']; ?>)">Me</li>
            <li><a href="loginController.php?logout=true"><div class="navItem">Logout</div></a></li>
        </ul>               
    </div>
</nav>