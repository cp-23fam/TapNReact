<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <title>Missing Dot</title>
        <script src="../script/missing-dot.js"></script>
        <link rel="stylesheet" href="../style.css">
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