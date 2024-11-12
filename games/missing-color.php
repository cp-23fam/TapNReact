<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once('../components/head.php') ?>
    <title>Missing Color</title>
    <script src="/script/missing-color.js"></script>
</head>

<body onload="init();">
    <?php require_once('../components/header.php') ?>

    <main style="background-color: #F7F7F7;">
        <!-- <div class="w-100"> -->
        <div class="d-flex flex-column flex-md-row w-100">
            <canvas class="template w-md-75 w-100" id="game"></canvas>

            <?php require_once('../components/sidebar.php') ?>
        </div>
        </div>
    </main>

    <?php require_once('../components/footer.php') ?>
</body>

<?php require_once('../components/script.php') ?>

</html>