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
    <title>Super Gallery</title>
</head>

<body> <?php require_once('../common/php/token-manager.php'); require_once('../common/modules/header.php'); ?>
    <main>
        <section style="margin-top: 200px;">
            <div class="section-title">
                <?php
                if($_GET['code'] == 420) {
                    ?>
                    <h3 style="text-align: center">LA TUA RICHESTA DI REGISTRAZIONE E' STATA INVIATA AL COMMITENTE</h3>
                    <?php
                } else {
                    ?>
                    <h3 style="text-align: center">SEI AUTENTIFICATO</h3>
                    <?php
                }
                ?>
            </div>
        </section>
    </main>
    <footer> </footer>
</body>

</html>