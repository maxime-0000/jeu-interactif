<title>Jeu de la vie</title>
<link rel="stylesheet" href="style.css">

<?php
echo "<body>";

/* ecran d'accueil avant le jeu */
if (!isset($_GET["run"])): ?>
    <div id="accueil">
        <h1 class="debutjeux">Jeu de la vie, règles du jeu</h1>
        <ul>
            Vous entrez dans le jeu de votre vie. <br>
            Vous allez faire des choix qui vont décider de comment vous allez finir, heureux, en dépréssion, ultra riche.<br>
            C'est a vous de faire vos choix pour définir comment vous allez vivre.<br>
        </ul>
        <button id="btnStart">Lancer le jeu</button>
    </div>

    <script>
        document.getElementById("btnStart").addEventListener("click", function () {
            window.location.href = "?run=1";
        });
    </script>
<?php
    exit;
endif;

//debut du jeux

session_start();
$db = new SQLite3("vie.db");