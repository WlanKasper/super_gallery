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
    <link rel="stylesheet" href="./css/style-private.css">
    <title>Super Gallery</title>
</head>

<body> <?php require_once('../common/php/token-manager.php'); require_once('../common/modules/header.php'); ?>
    <main>
        <section style="margin-top: 100px;">
            <div class="section-title">
                <h2>MY PRIVATE COLLECTION</h2>
            </div>
            <div class="section-title" id="painting-section-title">
            </div>
            <div id="wrapper-paintings">

            </div>
        </section>
    </main>
    <footer> </footer>
</body>
<script src="./js/view-private.js" type="module"> </script>

</html>