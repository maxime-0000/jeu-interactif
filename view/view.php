<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page['titre']); ?></title>
    <link rel="stylesheet" href="vue/style.css">
</head>
<body>
    <h1><?php echo htmlspecialchars($page['titre']); ?></h1>
    <p><?php echo htmlspecialchars($page['texte']); ?></p>

    <nav>
        <?php foreach ($choix_page as $c): ?>
            <a class="btn-choix" href="?run=1&id=<?php echo (int)$c['id_page_destination']; ?>">
                <?php echo htmlspecialchars($c['texte_choix']); ?>
            </a><br>
        <?php endforeach; ?>

        <?php if (empty($choix_page)): ?>
            <p>— Fin de l'aventure —</p>
        <?php endif; ?>
        
    </nav>
        <a style="display:inline-block; margin-top:20px; padding:8px 16px; background:#555; color:white; text-decoration:none; border-radius:5px;" href="index.php">⬅ Retour à l'accueil</a>
            
    </body>
</html>
