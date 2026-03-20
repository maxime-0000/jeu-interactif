<?php
define('DB_HOST', '192.168.56.10');
define('DB_NAME', 'Vie');
define('DB_USER', 'etudiant');
define('DB_PASS', 'etudiant');

try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log($e->getMessage());
    die("Une erreur est survenue. Veuillez réessayer plus tard.");
}

function getPage(PDO $pdo, int $id): array|false
{
    $stmt = $pdo->prepare("SELECT * FROM page WHERE id_page = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getChoix(PDO $pdo, int $id): array
{
    $stmt = $pdo->prepare("SELECT * FROM choix WHERE id_page_source = ?");
    $stmt->execute([$id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$id_page = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
    'options' => ['default' => 0, 'min_range' => 0]
]);

$page      = getPage($pdo, $id_page);
$choix_page = getChoix($pdo, $id_page);

if (!$page) {
    die("Page introuvable.");
}
