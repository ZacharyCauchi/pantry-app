<nav>
    <div class="navBar nav-wrapper">
        <h1 onClick='scrollFunction3()'>Pantry Pal</h1>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li class="navItem" onClick='scrollFunction1()'>Recipes</li>
            <li class="navItem" onClick='scrollFunction2()'>About</li>
            <li><a href="#loginModal" class="modal-trigger"><div class="navItem">Login</div></a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li class="navItem" onClick='scrollFunction1()'>Recipes</li>
            <li class="navItem" onClick='scrollFunction2()'>About</li>
            <li class="navItem" onClick="loginModalOpen()">Login</li>
        </ul>               
    </div>
</nav>