<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('../components/head.php')?>
        <title>Missing Color</title>
        <script src="/script/missing-color.js"></script>
    </head>
    <body onload="init();">
        <?php require_once('../components/header.php')?>

        <main style="background-color: #F7F7F7;">
                <!-- <div class="w-100"> -->
                    <div class="d-flex flex-column flex-md-row w-100">
                        <canvas class="template w-md-75 w-100" id="game"></canvas>
                        <div>
                            <div class="scores text-start">
                                <button class="border-0 w-75 mb-1">Retour à l'accueil</button>
                            </div>
                            <div class="scores text-start">
                                <button class="border-0 mb-4 w-75">Règles du jeu</button>
                            </div>
                            <div class="scores text-start">
                                <h3>Score :</h3>
                            </div>
                            <div class="scores text-start">
                                <h4>243</h4>
                            </div>
                            <div class="scores text-start">
                                <h3>Meilleur score :</h3>
                            </div>
                            <div class="scores text-start">
                                <h4>Beaucoup</h4>
                            </div>
                        </div>
                    </div>
                <!-- </div> -->
            </div>
        </main>

        <?php require_once('../components/footer.php')?>
    </body>

    <?php require_once('../components/script.php')?>
</html>