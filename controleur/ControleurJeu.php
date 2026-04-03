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
        session_start(); // Démarrage de la session
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

        // Récupération de l'id de la page demandé
        $id_page = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
            'options' => ['default' => 0, 'min_range' => 0]
        ]);

        // 🔒 Anti-cheat : vérification de la transition
        $ancien_id = $_SESSION['current_id'] ?? null;

        if ($ancien_id !== null) {
            // Récupère les pages accessibles depuis l'ancienne page
            $choix_autorises = $this->modeleChoix->getChoix($ancien_id);
            $ids_autorises = array_column($choix_autorises, 'id_page_destination');

            if (!in_array($id_page, $ids_autorises)) {
                $page = $this->modelePage->getPage($ancien_id);
                $choix_page = $this->modeleChoix->getChoix($ancien_id);
                $this->afficherJeu($page, $choix_page);
                
            }
            else {
                // 🔒 Sauvegarde de l'id courant dans la session
                $_SESSION['current_id'] = $id_page;

                // Récupération des données de la page et des choix
                $page = $this->modelePage->getPage($id_page);
                $choix_page = $this->modeleChoix->getChoix($id_page);

                if (!$page) {
                    die("Page introuvable.");
                }

                $this->afficherJeu($page, $choix_page);
            }
        }


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