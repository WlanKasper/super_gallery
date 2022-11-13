<?php
if (!isset($_COOKIE['access_token'])) {
    header("Location: ./login.php");
}
require_once('../php/db/connection.php');

$id_painting = $_POST['id_painting'];
$tag_painting = $_POST['tag_painting'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/painting.css">
    <title>Super Gallery</title>
</head>

<body>
    <header>
        <div id="wrapper_menu">
            <div id="wrapper_menu_burger">
                <div class="burger_line"></div>
                <div class="burger_line"></div>
                <div class="burger_line"></div>
            </div>
            <div id="wrapper_menu_std">
                <h4><a href="./main.php" class="selected">HOME</a></h4>
                <h4><a href="./private_collection.php">MY COLLECTION</a> </h4>
            </div>
        </div>
        <div id="wrapper_login_register">
            <div id="wrapper_menu_std">
                <h4><a href="../php/auth/logout.php">LOGOUT</a></h4>
                <h4><a href="./settings_account.php">ACCOUNT</a></h4>
            </div>
            <div id="wrapper_account_burger">
                <div class="burger_line_acc"></div>
                <div class="burger_line_acc"></div>
                <div class="burger_line_acc"></div>
            </div>
        </div>
    </header>
    <main>
        <section>
            <div class="wrapper_painting_to_buy">
                <div class="painting_to_buy">
                    <img src="../img/img_top.jpg" alt="утро в лесу">
                </div>
                <div class="wrapper_info">
                    <div class="wrapper_info_main">
                        <h3>
                            SHISHKIN
                        </h3>
                        <h4>
                            MORNING...
                        </h4>
                    </div>
                    <div class="wrapper_info_btn">
                        <h5>
                            CONCERNS GREATEST MARGARET HIM ABSOLUTE ENTRANCE NAY. DOOR NEAT WEEK DO FIND PAST HE. BE NO
                            SURPRISE HE HONOURED INDULGED. UNPACKED ENDEAVOR SIX STEEPEST HAD HUSBANDS HER. PAINTED NO
                            OR AFFIXED IT SO CIVILLY. EXPOSED NEITHER PRESSED SO COTTAGE AS PROCEED AT OFFICES. NAY THEY
                            GONE SIR GAME FOUR. FAVOURABLE PIANOFORTE OH MOTIONLESS EXCELLENCE OF ASTONISHED WE.
                            <?=$id_painting;?>
                            <?=$tag_painting;?>
                        </h5>
                        <button formaction="../php/check_authentiication.php">
                            <h4>
                                BUY
                            </h4>
                        </button>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
<script src="../js/pipe_generator.js"></script>
<script src="../js/picture_generation.js"></script>

<script>
    createBlock(document.getElementsByClassName('wrapper_pipe')[0], 1200, 700, 20);
</script>

</html>