<?php 
    session_start();

    // if($_SESSION['account'] == "") {
    //     header('Location: login.php');
    //     exit();
    // }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <?php require_once('components/head.php')?>
        <title>Main</title>
    </head>
    <body>
        <?php require_once('components/header.php')?>

        <main>

        </main>

        <?php require_once('components/footer.php')?>
    </body>

    <?php require_once('components/script.php')?>
</html>