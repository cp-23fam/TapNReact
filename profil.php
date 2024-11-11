<!DOCTYPE html>
<html lang="en">
    <head>
    <?php require_once('components/head.php')?>
        <title>Profil</title>
    </head>
    <body>
        <?php require_once('components/header.php')?>

        <main class="d-flex justify-content-center justify-content-md-start align-items-center align-items-md-start py-4">
            <div class="container">
                <div class="row w-100">
                    <h3 class="col-12 mb-4 text-md-start text-center">Profil</h3>

                    <!-- Première section : Nom d'utilisateur -->
                    <div class="col-12 col-md-6 col-xxl-3 mb-4 text-md-start text-center" id="profil">
                        <label for="username" class="form-label">Nom d'utilisateur</label>
                        <input id="username" class="form-control" style="max-width: 300px;" type="text" name="username" placeholder="Nom d'utilisateur">
                        <button type="button" class="btn btn-secondary mt-2">Modifier</button>
                    </div>

                    <!-- Deuxième section : Date de naissance -->
                    <div class="col-12 col-md-6 col-xxl-3 mb-4 text-md-start text-center" id="profil">
                        <label for="birthday" class="form-label">Date de naissance</label>
                        <input id="birthday" class="form-control" style="max-width: 300px;" type="date" name="birthday">
                        <button type="button" class="btn btn-secondary mt-2">Modifier</button>
                    </div>
                </div>
            </div>
        </main>



        <?php require_once('components/footer.php')?>
    </body>

    <?php require_once('components/script.php')?>
</html>