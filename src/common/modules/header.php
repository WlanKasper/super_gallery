<header>
    <div id="wrapper_menu">
        <div id="wrapper_menu_burger">
            <div class="burger_line"></div>
            <div class="burger_line"></div>
            <div class="burger_line"></div>
        </div>
        <div id="wrapper_menu_std">
            <h4><a href="" class="selected">HOME</a></h4>
            <h4><a href="">MY COLLECTION</a> </h4>
        </div>
    </div>
    <div id="wrapper_login_register">
        <?php
        if (TokenManager::isAuthenticated()) {
        ?>
        <div id="wrapper_menu_std">
            <h4><a href="../php/auth/logout.php">LOGOUT</a></h4>
            <h4><a href="./settings_account.php">ACCOUNT</a></h4>
        </div>
        <div id="wrapper_account_burger">
            <div class="burger_line_acc"></div>
            <div class="burger_line_acc"></div>
            <div class="burger_line_acc"></div>
        </div>
        <?php
        } else {
        ?>
        <h4>
            <a href="../login/login.php">LOGIN</a> / <a href="../registration/registration.php">REGISTER</a>
        </h4>
        <?php
        }
        ?>
    </div>
</header>