<!DOCTYPE html>
<html lang="en">
    <head>
        <?php require_once('../components/head.php')?>
        <title>Missing Dot</title>
        <script src="../script/missing-dot.js"></script>
    </head>
    <body onload="init();">
        <?php require_once('../components/header.php')?>

        <main style="background-color: #F7F7F7;" id="missing-center">
            <div  id="missing-dot" class="text-center">
                <canvas style="background-color: #F7F7F7; width: 900px; height: 500px;" id="game"></canvas><br>
                <input type="text" name="rep" class="border-1" id="missing-input" placeholder="a-h & 1-3" pattern="^[a-h][1-3]$" required>
                <button id="missing-button" type="submit" class="btn btn-secondary">Confirmer</button>
            </div>
            
        </main>

        <?php require_once('../components/footer.php')?>
    </body>

    <?php require_once('../components/script.php')?>
</html>