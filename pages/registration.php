<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_registration.css">
    <link rel="stylesheet" href="../css/common.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.1.1/md5.js"></script>
    <title>Registration</title>
</head>

<body>
    <main>
        <form action="../php/auth/registration.php" onsubmit="return validation(this);" name="form_registration" method="post">
            <input type="text" 		name="_login" 		id="_login" 	placeholder="LOGIN">
            <input type="password" 	name="_psw" 		id="_psw" 		placeholder="PASSWORD" value="">
            <input type="password" 	name="_psw_conf" 	id="_psw_conf" 	placeholder="PASSWORD" value="">
            
            <input type="hidden" 	name="md5_psw_conf"	value="">
            <input type="hidden" 	name="md5_psw" 		value="">
            <button type="submit">
                <h4>
                    SIGN UP
                </h4>
            </button>
            <h5 id="registration_link">
                OR <a href="login.php">LOGIN</a> 
            </h5>
        </form>
    </main>
</body>
<script src="../js/validation_registration.js"></script>
<script src="../js/pipe_generator.js"></script>

<script>
	let form = document.getElementsByTagName('form')[0];
	
	<?php
	   	if(isset($_GET['err'])) {
		?>
			setErrColor(form);
		<?php
	   	}
    ?>

	setInputListener(form);
    createBlock(document.getElementsByTagName('main')[0], 1000, 700, 20);
</script>
</html>