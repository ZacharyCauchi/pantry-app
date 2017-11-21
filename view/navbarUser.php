<nav>
    <div class="navBar nav-wrapper">
        <h1 onClick='scrollFunction3()'>Pantry Pal</h1>
        <a href="#" data-activates="sideNav" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li onClick='scrollFunction1()'><a><div class="navItem">Recipes</div></a></li>
            <li onClick='scrollFunction2()'><a><div class="navItem">About</div></a></li>
            <li onClick="showAccountUpdate(<?php echo $_SESSION['userID']; ?>)"><a><div class="navItem">Me</div></a></li>
            <li onClick="showSavedRecipes(<?php echo $_SESSION['userID']; ?>)"><a><div class="navItem">Recipe Book</div></a></li>
            <li><a href="index.php?logout=true"><div class="navItem">Logout</div></a></li>
        </ul>    
    </div>
    <ul class="side-nav" id="sideNav">
        <li onClick='scrollFunction1()'><a><div class="navItem">Recipes</div></a></li>
        <li onClick='scrollFunction2()'><a><div class="navItem">About</div></a></li>
        <li onClick="showAccountUpdate(<?php echo $_SESSION['userID']; ?>)"><a><div class="navItem">Me</div></a></li>
        <li onClick="showSavedRecipes(<?php echo $_SESSION['userID']; ?>)"><a><div class="navItem">Recipe Book</div></a></li>
        <li><a href="index.php?logout=true"><div class="navItem">Logout</div></a></li>
    </ul>           
</nav>