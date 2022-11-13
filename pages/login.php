<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_registration.css">
    <link rel="stylesheet" href="../css/common.css">
    <title>Login</title>
</head>

<body>
    <main>
        <form action="../php/auth/authentication.php" onsubmit="return validation(this);" method="post">
            <input type="text" name="_login" id="_login" placeholder="LOGIN" maxlength="20" autocomplete="username">
            <input type="password" name="_psw" id="_psw" placeholder="PASSWORD" maxlength="10"
                autocomplete="current-password" value="">
            <button type="submit">
                <h4>
                    LOG IN
                </h4>
            </button>
            <h5 id="registration_link">
                OR <a href="registration.php">REGISTRATION</a>
            </h5>
        </form>
    </main>
</body>
<script src="../js/validation_login.js"></script>
<script src="../js/pipe_generator.js"></script>

<script type="text/javascript">
    let form = document.getElementsByTagName('form')[0];
	
	<?php
    if (isset($_GET[' err '])) {
    ?>
            setErrColor(form);
		<?php
    }
        ?>

        setInputListener(form);
    createBlock(document.getElementsByTagName('main')[0], 1000, 700, 20);
</script>

</html>