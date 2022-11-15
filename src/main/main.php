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

<body> <?php require_once('../common/php/token-manager.php'); require_once('../common/modules/header.php'); ?> <main>
        <section>
            <div class="section-title">
                <h2> THE BEST OF THE BEST </h2>
            </div>
            <div class="wrapper-heading-painting">
                <div class="wrapper-heading-info">
                    <div>
                        <h3 class="heading-author"> </h3>
                        <h4 class="heading-name"> </h4>
                    </div>
                    <div class="wrapper-heading-desc">
                        <h5 class="heading-desc"> </h5>

                    </div>
                </div> <img class="heading-painting" src="">
            </div>
        </section>
        <section style="margin-top: 200px;">
            <div class="section-title">
                <h2>MY PUBLIC COLLECTION</h2>
            </div>
            <div class="section-title" id="painting-section-title">
            </div>
            <div id="wrapper-paintings">

            </div>
        </section>
    </main>
    <footer> </footer>
</body>
<script src="./js/view-main.js" type="module"> </script>

</html>