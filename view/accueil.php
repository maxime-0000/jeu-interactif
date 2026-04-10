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
        <span class="age-badge">Bienvenue</span>
        <h1>Commence ton histoire</h1>
        <p>Chaque choix va façonner ta vie. Seras-tu heureux, riche, ou seul ?</p>

        <form method="POST" action="index.php" style="margin-top: 1.5rem;">
            <input
                type="text"
                name="pseudo"
                placeholder="Entre ton pseudo..."
                maxlength="30"
                required
                style="width:100%; margin-bottom:12px;"
            >
            <button type="submit" id="btnStart">Lancer le jeu</button>
        </form>
    </div>

    <?php if (!empty($meilleurs)): ?>
    <div class="choices-title" style="margin-top:1.5rem;">Meilleurs joueurs</div>
    <div class="game-card">
        <?php foreach ($meilleurs as $i => $m): ?>
        <div class="leaderboard-row">
            <span class="rank">#<?php echo $i + 1; ?></span>
            <span class="pseudo"><?php echo htmlspecialchars($m['pseudo']); ?></span>
            <span class="score"><?php echo $m['amis']; ?> amis</span>
            <span class="detail"><?php echo $m['nb_choix']; ?> choix</span>
        </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
</div>
</body>
</html>