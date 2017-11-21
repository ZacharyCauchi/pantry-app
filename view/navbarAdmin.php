<nav>
<div class="navBar nav-wrapper">
    <h1>Admin</h1>
    <a href="#" data-activates="sideNav" class="button-collapse"><i class="material-icons">menu</i></a>
    <ul class="right hide-on-med-and-down">
        <li onClick="showAccountUpdate(<?php echo $_SESSION['userID']; ?>)"><a><div class="navItem">Me</div></a></li>
        <li><a href="index.php?logout=true"><div class="navItem">Logout</div></a></li>
    </ul>               
</div>
    <ul class="side-nav" id="sideNav">
        <li onClick="showAccountUpdate(<?php echo $_SESSION['userID']; ?>)"><a><div class="navItem">Me</div></a></li>
        <li><a href="index.php?logout=true"><div class="navItem">Logout</div></a></li>
    </ul>
</nav>