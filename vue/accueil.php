<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu de la vie</title>
    <link rel="stylesheet" href="vue/style.css">
</head>
<body>
    <div id="accueil">
        <h1>Jeu de la vie &mdash; règles du jeu</h1>
        <p>
            Vous entrez dans le jeu de votre vie.<br>
            Faites des choix qui decideront de votre avenir :
            heureux, en depression, ultra riche.<br>
            C'est a vous de jouer.
        </p>
        <button id="btnStart">Lancer le jeu</button>
    </div>
    <script>
        document.getElementById("btnStart").addEventListener("click", function () {
            window.location.href = "?run=1&id=0";
        });
    </script>
</body>
</html>
