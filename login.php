<!DOCTYPE html>
<html lang="en">
    <head>
    <?php require_once('components/head.php')?>
        <title>Login</title>
    </head>
    <body>
        <?php require_once('components/header.php')?>

        <main>
            <div style="margin-top: 200px;"></div>
            <div class="container">
                <div class="row">
                    <div class="col text-center" id="log">
                        <input class="border-0 text-center" type="text" name="username" placeholder="Nom d'utilisateur">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center" id="log">
                        <input class="border-0 text-center" type="password" name="password" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center" id="log">
                        <button type="submit" class="border-0 text-center">Confirmer</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center" id="log">
                        <a class="border-0 text-center" href="sign.php">Créer un compte ?</a>
                    </div>
                </div>
            </div>
        </main>
        

        <?php require_once('components/footer.php')?>
    </body>

    <?php require_once('components/script.php')?>
</html>