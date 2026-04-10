<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jeu de la vie</title>
    <link rel="stylesheet" href="vue/style.css">
</head>
<body>
    <div class="game-wrap">
        <div class="game-header">
            <div class="game-logo">Jeu de la vie</div>
        </div>
        <div class="game-card">
            <span class="age-badge">Début</span>
            <h1>Bienvenue</h1>
            <p>
                Tu entres dans le jeu de ta vie.<br>
                Chaque choix va façonner ton avenir : heureux, riche, ou seul.<br>
                C'est à toi de jouer.
            </p>
        </div>
        <button id="btnStart">Lancer le jeu</button>
    </div>
    <script>
        document.getElementById("btnStart").addEventListener("click", function () {
            window.location.href = "?run=1&id=0";
        });
        
    </script>
</body>
</html>