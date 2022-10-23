<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/common.css">
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
                <h4><a href="" class="selected">HOME</a></h4>
                <h4><a href="">MY COLLECTION</a> </h4>
            </div>
        </div>
        <div id="wrapper_login_register">
            <h4>
                <a href="pages/login.php">LOGIN</a> / <a href="pages/registration.php">REGISTER</a>
            </h4>
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
                        <button formaction="./php/check_authentiication.php">
                            <h4>
                                BUY
                            </h4>
                        </button>
                    </div>
                </div>
                <div class="wrapper_picture">
                    <img src="./img/img_top.jpg" alt="утро в лесу" srcset="" id="img_best_picture">

                </div>
            </div>
        </section>
        <section class="section_picture">
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

        <section id="third_sec">
            <div id="wrapper_bott">
                <h3>YOU HAVE TO BE <a href="pages/login.php">LOGINED</a>/<a href="pages/registration.php">REGISTERED</a> TO SEE MORE</h3>
            </div>
        </section>
    </main>
</body>
<script src="js/pipe_generator.js"></script>
<script src="../js/picture_generation.js"></script>

<script>
    let arr_pic = Array();
    arr_pic.push(initWrapper('wrapper_pictures_section_1', 'VRUBEL', 'ROSES_IN_SKY', '1957', '360', '../img/favorite_1.jpg'));
    arr_pic.push(initWrapper('wrapper_pictures_section_1', 'VRUBEL', 'ROSES_IN_SKY', '1957', '300', '../img/favorite_2.jpg'));
    arr_pic.push(initWrapper('wrapper_pictures_section_1', 'VRUBEL', 'ROSES_IN_SKY', '1957', '600', '../img/favorite_3.jpg'));
    arr_pic.push(initWrapper('wrapper_pictures_section_1', 'VRUBEL', 'ROSES_IN_SKY', '1957', '370', '../img/favorite_4.jpg'));

    arr_pic.forEach(element => initShadow(element, detectQuadrant(document.getElementById('wrapper_pictures_section_1'), element)));

    createBlock(document.getElementsByClassName('wrapper_pipe')[0], 1200, 1000, 20);
</script>

</html>