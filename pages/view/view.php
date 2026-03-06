<link rel="stylesheet" href ="pages\style.css">

<?php 




//mise en page
echo"<body>";


function test($message){
    echo $message;
}
session_start();

$id_page = $_GET['id'] ?? 0;

echo $id_page;

$sql = "SELECT * FROM page WHERE id_page = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id_page]);

$page = $stmt->fetch();

echo $page ['titre'];
echo $page['texte'];

$choix = $stmt->fetchAll();



foreach ($choix as $c) {
    echo '<a class="btn-choix" href="jeu.php?id='.$c['id_page_destination'].'">'.$c['texte_choix'].'</a>';
}

$id_page = $_GET['id'] ?? 1;

echo '<a href="jeu.php?run=1" class="btn-choix">'.$choix ['id_page_destination'].'</a>';
?>
