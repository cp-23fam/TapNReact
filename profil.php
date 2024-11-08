<!DOCTYPE html>
<html lang="en">
    <head>
    <?php require_once('components/head.php')?>
        <title>Profil</title>
    </head>
    <body>
        <?php require_once('components/header.php')?>

        <main>
            <div id="profil">
                <h3>Profil</h3><br>
                <label>Nom d'utilisateur</label><br>
                <input class="border-0 mt-1" type="text" name="username" placeholder="Nom d'utilisateur">
                <button type="button" class="border-0 text-center">Modifier</button>
                <br><br>

                <label>Date de naissance</label><br>
                <input class="border-0 mt-1" type="date" name="birthday">
                <button type="button" class="border-0 text-center">Modifier</button>
            </div>
            
        </main>
        

        <?php require_once('components/footer.php')?>
    </body>

    <?php require_once('components/script.php')?>
</html>