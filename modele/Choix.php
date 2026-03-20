<?php
class Choix
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getChoix(int $id): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM choix WHERE id_page_source = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
