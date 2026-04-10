<?php
class Utilisateur
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function sauvegarder(string $pseudo, int $id_page, int $amis, int $nb_choix): void
    {
        $stmt = $this->pdo->prepare(
            "INSERT INTO progression (pseudo, id_page, amis, nb_choix) VALUES (?, ?, ?, ?)
             ON DUPLICATE KEY UPDATE id_page = ?, amis = ?, nb_choix = ?"
        );
        $stmt->execute([$pseudo, $id_page, $amis, $nb_choix, $id_page, $amis, $nb_choix]);
    }

    public function meilleurs(): array
    {
        $stmt = $this->pdo->query(
            "SELECT pseudo, amis, nb_choix, created_at FROM progression ORDER BY amis DESC LIMIT 5"
        );
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}