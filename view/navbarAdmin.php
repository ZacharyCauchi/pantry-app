<div class="navBar">
    <h1 onClick='scrollFunction3()'>Admin</h1>
    <div class="navItemsRight">
        <div class="navItem" onClick="showAccountUpdateAdmin(<?php echo $_SESSION['userID']; ?>)">
            Me
        </div>
        <a href="index.php?logout=true"><div class="navItem">
            Logout
        </div></a>
    </div>            
</div>