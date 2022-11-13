<?php
if (!isset($_COOKIE['access_token'])) {
    header("Location: ../../index.php");
}
require_once('../php/db/connection.php');
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
        <section id="first_sec">
            <div class="wrapper_title">
                <h2>
                    THE BEST OF THE BEST
                </h2>
            </div>
            <div id="wrapper_best_picture">
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
                        </h5>
                        <form  method="post">
                            <button formaction="./painting.php">
                                <h4>
                                    BUY
                                </h4>
                            </button>
                            <input type="hidden" name="id_painting" value="23">
                            <input type="hidden" name="tag_painting" value="the_best">
                        </form>
                    </div>
                </div>
                <div class="wrapper_picture">
                    <img src="../img/img_top.jpg" alt="утро в лесу" srcset="" id="img_best_picture">

                </div>
            </div>
        </section>
        <section class="section_picture" id="second_sec">
            <div class="wrapper_title">
                <h2>
                    MY FAVORITE
                </h2>
            </div>
            <div class="wrapper_pictures" id="wrapper_pictures_section_1">

                <div class="wrapper_pipe" style="position: absolute;">

                </div>
            </div>
        </section>

        <!-- <section class="section_picture">
            <div class="wrapper_title">
                <h2>

                </h2>
            </div>
        </section> -->
    </main>
</body>
<script src="../js/pipe_generator.js"></script>
<script src="../js/picture_generation.js"></script>

<script>
    let arr_pic = Array();

    <?php
    require('../php/db/paintings/painting_manager.php');

    $publicPaintings = getPublicPaintings();

    foreach ($publicPaintings as $painting) {
        ?>
        arr_pic.push(
            initWrapper(
                'wrapper_pictures_section_1',
                `<?= strtoupper($painting['name_painter'])?>`,
                `<?= strtoupper($painting['name_painting'])?>`,
                `<?= $painting['year_painting']?>`,
                '360',
                '../img/' + `<?= $painting['year_painting']?> + '.jpg'`)
            );
        <?php
    }
    ?>

    
   
    arr_pic.push(initWrapper('wrapper_pictures_section_1', 'VRUBEL', 'ROSES_IN_SKY', '1957', '300', '../img/favorite_2.jpg'));
    arr_pic.push(initWrapper('wrapper_pictures_section_1', 'VRUBEL', 'ROSES_IN_SKY', '1957', '600', '../img/favorite_3.jpg'));
    arr_pic.push(initWrapper('wrapper_pictures_section_1', 'VRUBEL', 'ROSES_IN_SKY', '1957', '370', '../img/favorite_4.jpg'));

    arr_pic.forEach(element => initShadow(element, detectQuadrant(document.getElementById('wrapper_pictures_section_1'), element)));

    createBlock(document.getElementsByClassName('wrapper_pipe')[0], 1200, 700, 20);
</script>

</html>