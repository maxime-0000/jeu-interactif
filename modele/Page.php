<?php
class Page
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getPage(int $id): array|false
    {
        $stmt = $this->pdo->prepare("SELECT * FROM page WHERE id_page = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
