<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fin — Jeu de la vie</title>
    <link rel="stylesheet" href="vue/style.css">
</head>
<body>
<div class="game-wrap">
    <div class="game-header">
        <div class="game-logo">Jeu de la vie</div>
    </div>

    <div class="fin">
        <h1>Fin de partie</h1>
        <p><?php echo htmlspecialchars($page['texte']); ?></p>

        <div class="stats-bar" style="justify-content:center; margin-top:1.5rem;">
            <div class="stat"><div class="stat-label">Joueur</div><div class="stat-value"><?php echo htmlspecialchars($pseudo); ?></div></div>
            <div class="stat"><div class="stat-label">Amis</div><div class="stat-value"><?php echo $amis; ?></div></div>
            <div class="stat"><div class="stat-label">Choix</div><div class="stat-value"><?php echo $nb_choix; ?></div></div>
        </div>
    </div>

    <?php if (!empty($meilleurs)): ?>
    <div class="choices-title" style="margin-top:1.5rem;">Classement</div>
    <div class="game-card">
        <?php foreach ($meilleurs as $i => $m): ?>
        <div class="leaderboard-row">
            <span class="rank">#<?php echo $i + 1; ?></span>
            <span class="pseudo"><?php echo htmlspecialchars($m['pseudo']); ?></span>
            <span class="score"><?php echo $m['amis']; ?> amis</span>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <a href="index.php?logout=1" class="btn-restart" style="display:block;text-align:center;margin-top:1rem;">Rejouer</a>
</div>
</body>
</html>