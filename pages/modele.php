<?php 

//Envoie les données faire les requete sql ici
//debut du jeux

$host = "192.168.56.10";
$dbname = "Vie";
$user = "etudiant";
$pass = "etudiant"; 
try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $message = "Connexion réussie";
} catch (PDOException $e) {
    $message = "Erreur de connexion : " . $e->getMessage();
}

?>

