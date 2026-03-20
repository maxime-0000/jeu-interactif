<?php
require_once __DIR__ . '/../modele/ConnexionBDD.php';
require_once __DIR__ . '/../modele/Page.php';
require_once __DIR__ . '/../modele/Choix.php';

class ControleurJeu
{
    private Page $modelePage;
    private Choix $modeleChoix;

    public function __construct()
    {
        session_start();
        $pdo = ConnexionBDD::getInstance();
        $this->modelePage  = new Page($pdo);
        $this->modeleChoix = new Choix($pdo);
    }

    public function gererRequete(): void
    {
        if (!isset($_GET['run'])) {
            $this->afficherAccueil();
            return;
        }

        $id_page    = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
            'options' => ['default' => 0, 'min_range' => 0]
        ]);
        $page       = $this->modelePage->getPage($id_page);
        $choix_page = $this->modeleChoix->getChoix($id_page);

        if (!$page) {
            die("Page introuvable.");
        }

        $this->afficherJeu($page, $choix_page);
    }

    private function afficherAccueil(): void
    {
        require __DIR__ . '/../vue/accueil.php';
    }

    private function afficherJeu(array $page, array $choix_page): void
    {
        require __DIR__ . '/../vue/jeu.php';
    }
}
