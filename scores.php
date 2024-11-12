<!DOCTYPE html>
<html lang="en">
    <head>
    <?php require_once('components/head.php')?>
        <title>Profil</title>

    </head>
    <body>
        <?php require_once('components/header.php')?>

        <main>
            <div class="scores">
                <button class="border-0 me-5">Classement général</button>

                <label for="game-filter" class="visually-hidden">Classement par jeu</label>
                <select id="game-filter" class="border-0 p-2" aria-label="Classement par jeu">
                    <option value="all" class="border-rounded-4">Classement par jeu</option>
                    <option value="game1">Missing dot</option>
                    <option value="game2">Same color</option>
                    <option value="game3">Missing color</option>
                </select>
                <div>
                    <h2 class="mt-5 mb-3">Général</h2>
                </div>
                <div class="player mb-2">
                    <h3><span style="color: #D9A74E;">🜲</span> Gertrude</h3>
                    <h3>1246 points</h3>
                </div>
                <div class="player mb-2">
                    <h3><span style="color: #5A7D9A;">🜲</span> Gertrude</h3>
                    <h3>1246 points</h3>
                </div>
                <div class="player mb-2">
                    <h3><span style="color: #D98857;">🜲</span> Gertrude</h3>
                    <h3>1246 points</h3>
                </div>
            </div>
            
        </main>

        <?php require_once('components/footer.php')?>
    </body>

    <?php require_once('components/script.php')?>
</html>