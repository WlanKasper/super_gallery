<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_registration.css">
    <link rel="stylesheet" href="../css/common.css">
    <title>Registration</title>
</head>

<body>
    <main>
        <form action="./php/registration.php" onsubmit="return validation()" name="form_registration" method="post">
            <input type="text" name="_login" id="_login" placeholder="LOGIN">
            <input type="text" name="_psw" id="_psw" placeholder="PASSWORD">
            <input type="text" name="_psw_conf" id="_psw_conf" placeholder="PASSWORD">
            <button type="submit">
                <h4>
                    SIGN UP
                </h4>
            </button>
            <h5 id="registration_link">
                OR <a href="../pages/login.html">LOGIN</a> 
            </h5>
        </form>
    </main>
</body>
<script src="../js/validation_registration.js"></script>
<script src="../js/pipe_generator.js"></script>

<script>
    createBlock(document.getElementsByTagName('main')[0], 1000, 700, 20);
</script>
</html>