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
    <title>Registration</title>
</head>

<body>
    <?php
    require_once('../common/php/token-manager.php');
    require_once('../common/modules/header.php');
    ?>
    <main>
        <form>
            <input type="email" name="user-email" maxlength="20" placeholder="EMAIL">
            <input type="password" name="user-password" maxlength="10" placeholder="PASSWORD">
            <input type="password" name="user-password-conf" maxlength="10" placeholder="PASSWORD">
            <input type="hidden" name="user-password-hidden" value="">
            <button type="submit">
                <h4>
                    SIGN UP
                </h4>
            </button>
            <h5 id="registration_link">
                OR <a href="../login/login.php">LOGIN</a>
            </h5>
        </form>
    </main>
</body>
<script src="./js/view-registration.js" type="module"></script>

</html>