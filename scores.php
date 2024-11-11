<!DOCTYPE html>
<html lang="en">
    <head>
    <?php require_once('components/head.php')?>
        <title>Profil</title>

        <style>
            .loader1 {
                height: 40px;
                width: 35px;
                aspect-ratio: .866;
                display: grid;
                background: conic-gradient(from -121deg at right, #0000, #5A7D9A 1deg 60deg, #0000 61deg);
                animation: l11-0 2s infinite;
                transform-origin: 33% 50%;
                position: fixed; /* Fixe la loader */
                top: 300px;   /* Positionnée à 20px du bas de la page */
                left: 80px;    /* Positionnée à 20px de la droite de la page */
            }
            
            .loader1:before,
            .loader1:after {
                content: "";
                grid-area: 1/1;
                background: conic-gradient(from -121deg at right, #0000, #000000 1deg 60deg, #0000 61deg);
                animation: inherit;
                animation-name: l11-1;
            }

            .loader1:after {
                --s: 30px;
                background: conic-gradient(from -121deg at right, #0000, #5A7D9A 1deg 60deg, #0000 61deg);
            }

            @keyframes l11-0 {
                0%   { transform: translate(-30px) rotate(0) translate(0) rotate(0); }
                25%  { transform: translate(30px) rotate(0) translate(0) rotate(0); }
                50%  { transform: translate(30px) rotate(180deg) translate(0) rotate(0); }
                75%  { transform: translate(30px) rotate(180deg) translate(60px) rotate(0); }
                100% { transform: translate(30px) rotate(180deg) translate(60px) rotate(180deg); }
            }

            @keyframes l11-1 {
                0%, 25%, 50%, 75%, 100% { transform: translate(0); }
                12.5%, 62.5% { transform: translate(var(--s, 15px)); }
            }
        </style>

        <style>
            .loader2 {
            width: fit-content;
            font-size: 40px;
            font-family: monospace;
            font-weight: bold;
            text-transform: uppercase;
            color: #0000;
            -webkit-text-stroke: 1px #000;
            --g:conic-gradient(#000 0 0) no-repeat text;
            background:var(--g) 0,var(--g) 1ch,var(--g) 2ch,var(--g) 3ch,var(--g) 4ch,var(--g) 5ch,var(--g) 6ch;
            background-position-y: 100%;
            animation: l19 1s linear infinite alternate;
            position: fixed; /* Fixe la loader */
            top: 288px;   /* Positionnée à 20px du bas de la page */
            left: 180px;    /* Positionnée à 20px de la droite de la page */
            }
            .loader2:before {
            content: "Loading";
            }
            @keyframes l19 {
            0%  {background-size: 1ch 0   ,1ch 0   ,1ch 0   ,1ch 0   ,1ch 0   ,1ch 0   ,1ch 0   }
            25% {background-size: 1ch 100%,1ch 50% ,1ch 0   ,1ch 0   ,1ch 0   ,1ch 50% ,1ch 100%}
            50% {background-size: 1ch 100%,1ch 100%,1ch 50% ,1ch 0   ,1ch 50% ,1ch 100%,1ch 100%}
            75% {background-size: 1ch 100%,1ch 100%,1ch 100%,1ch 50% ,1ch 100%,1ch 100%,1ch 100%}
            to  {background-size: 1ch 100%,1ch 100%,1ch 100%,1ch 100%,1ch 100%,1ch 100%,1ch 100%}
            }
        </style>

        <style>
            .loader3 {
            width: 65px;
            aspect-ratio: 1;
            position: fixed; /* Fixe la loader */
            top: 288px;   /* Positionnée à 20px du bas de la page */
            left: 370px;    /* Positionnée à 20px de la droite de la page */
            }
            .loader3:before,
            .loader3:after {
            content: "";
            position: absolute;
            border-radius: 50px;
            box-shadow: 0 0 0 3px inset #000;
            animation: l4 4s infinite;
            }
            .loader3:after {
            animation-delay: -2s;
            }
            @keyframes l4 {
            0% {
                inset: 0 35px 35px 0;
            }
            12.5% {
                inset: 0 35px 0 0;
            }
            25% {
                inset: 35px 35px 0 0;
            }
            37.5% {
                inset: 35px 0 0 0;
            }
            50% {
                inset: 35px 0 0 35px;
            }
            62.5% {
                inset: 0 0 0 35px;
            }
            75% {
                inset: 0 0 35px 35px;
            }
            87.5% {
                inset: 0 0 35px 0;
            }
            100% {
                inset: 0 35px 35px 0;
            }
            }
        </style>

    </head>
    <body>
        <?php require_once('components/header.php')?>

        <main>
            <div class="loader1"></div>
            <div class="loader2"></div>
            <div class="loader3"></div>
            <div class="loader4"></div>

        </main>

        <?php require_once('components/footer.php')?>
    </body>

    <?php require_once('components/script.php')?>
</html>