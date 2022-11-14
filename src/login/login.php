<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../common/css/style-common.css">
    <link rel="stylesheet" href="../common/css/style-font.css">
    <link rel="stylesheet" href="../common/css/style-form.css">
    <link rel="stylesheet" href="../common/css/style-pipe.css">
    <link rel="stylesheet" href="../common/css/style-login-registration.css">
    <title>Login</title>
</head>

<body>
    <?php
    require_once('../common/php/token-manager.php');
    require_once('../common/modules/header.php');
    ?>
    <main>
        <form>
            <input type="email" name="user-email" placeholder="EMAIL" maxlength="20" autocomplete="username">
            <input type="password" name="user-password" placeholder="PASSWORD" maxlength="10"
                autocomplete="current-password">
            <input type="hidden" name="user-password-hidden" value="">
            <button type="submit">
                <h4>
                    LOG IN
                </h4>
            </button>
            <h5 id="registration_link">
                OR <a href="../registration/registration.php">REGISTRATION</a>
            </h5>
        </form>
    </main>
</body>
<script src="./js/view-login.js" type="module"></script>

</html>