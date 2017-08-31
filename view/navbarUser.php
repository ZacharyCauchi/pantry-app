<div class="navBar">
    <h1 onClick='scrollFunction3()'>Pantry Helper</h1>
    <div class="navItemsRight">
        <div class="navItem" onClick='scrollFunction1()'>
            Recipes
        </div>
        <div class="navItem" onClick='scrollFunction2()'>
            About
        </div>
        <div class="navItem" onClick="showAccountUpdate(<?php echo $_SESSION['userID']; ?>)">
            Me
        </div>
        <div class="navItem">
            myRecipes
        </div>
        <a href="loginController.php?logout=true"><div class="navItem">
            Logout
        </div></a>
    </div>            
</div>