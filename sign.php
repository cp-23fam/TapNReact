<!DOCTYPE html>
<html lang="en">
    <head>
    <?php require_once('components/head.php')?>
        <title>Sign Up</title>
    </head>
    <body>
        <?php require_once('components/header.php')?>

        <main>
            <div class="container">
                <div class="row">
                    <div class="col text-center" id="sign">
                        <input class="border-0 text-center" type="text" name="username" placeholder="Nom d'utilisateur">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center" id="sign">
                        <input class="border-0 text-center" type="password" name="password" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center" id="sign">
                        <input class="border-0 text-center" type="date" name="birthday">
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center" id="sign">
                        <button type="submit" class="border-0 text-center">Confirmer</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col text-center" id="log">
                        <a class="border-0 text-center" href="login.php">Déjà un compte ?</a>
                    </div>
                </div>
            </div>
        </main>
        

        <?php require_once('components/footer.php')?>
    </body>

    <?php require_once('components/script.php')?>
</html>