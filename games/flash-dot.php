<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../components/head.php') ?>
    <title>Missing Dot</title>
    <script src="../script/flash-dot.js"></script>
</head>

<body onload="init();">
    <?php require_once('../components/header.php') ?>

    <main style="background-color: #F7F7F7;" id="missing-center">
        <div id="missing-dot" class="text-center">
            <canvas style="background-color: #F7F7F7; width: 900px; height: 500px;" id="game" class="game"></canvas><br>
            <?php require_once('../components/sidebar.php') ?>
        </div>

    </main>

    <?php require_once('../components/footer.php') ?>
</body>

<?php require_once('../components/script.php') ?>

</html>