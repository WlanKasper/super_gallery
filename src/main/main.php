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
    <link rel="stylesheet" href="./css/style-main.css">
    <title>Super Gallery</title>
</head>

<body>
    <?php
    $page = 'null';
    $active = 'class="active-menu"';
    require_once('../common/modules/header.php');
    ?>
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
                        <form method="post">
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
<script src="./js/view-main.js" type="module"> </script>
</html>