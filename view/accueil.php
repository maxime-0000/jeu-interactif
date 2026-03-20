<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu de la vie</title>
    <link rel="stylesheet" href="pages/style.css">
</head>
<body>
    <div id="accueil">
        <h1 class="debutjeux">Jeu de la vie &mdash; règles du jeu</h1>
        <p>
            Vous entrez dans le jeu de votre vie.<br>
            Vous allez faire des choix qui vont décider de comment vous allez finir :
            heureux, en dépression, ultra riche.<br>
            C'est à vous de jouer.
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
