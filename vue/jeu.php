<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page['titre']); ?></title>
    <link rel="stylesheet" href="vue/style.css">
</head>
<body>
    <div class="game-wrap">

        <div class="game-header">
            <div class="game-logo">Jeu de la vie</div>
        </div>

        <div class="game-card">
            <span class="age-badge"><?php echo htmlspecialchars($page['titre']); ?></span>
            <p><?php echo htmlspecialchars($page['texte']); ?></p>
        </div>

        <?php if (!empty($choix_page)): ?>
            <div class="choices-title">Que choisis-tu ?</div>
            <?php foreach ($choix_page as $c): ?>
                <a class="btn-choix" href="?run=1&id=<?php echo (int)$c['id_page_destination']; ?>">
                    <?php echo htmlspecialchars($c['texte_choix']); ?> →
                </a>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="fin">
                <h1>Fin</h1>
                <p><?php echo htmlspecialchars($page['texte']); ?></p>
                <a href="?logout=1" class="btn-restart">Recommencer</a>
            </div>
        <?php endif; ?>

        <a class="btn-accueil" href="?logout=1">⬅ Retour à l'accueil</a>

    </div>
</body>
</html>