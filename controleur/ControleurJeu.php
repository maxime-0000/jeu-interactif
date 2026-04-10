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
        // Sécurise le démarrage de session
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Connexion BDD + modèles
        $pdo = ConnexionBDD::getInstance();
        $this->modelePage  = new Page($pdo);
        $this->modeleChoix = new Choix($pdo);
    }

    public function gererRequete(): void
    {
        // Page d'accueil si aucun run
        if (!isset($_GET['run'])) {
            $this->afficherAccueil();
            return;
        }

        // Récupération de l'id demandé
        $id_page = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT, [
            'options' => [
                'default' => 0,
                'min_range' => 0
            ]
        ]);

        // Page précédente (anti-cheat)
        $ancien_id = $_SESSION['current_id'] ?? null;

        // Si on a déjà une page précédente
        if ($ancien_id !== null) {

            // Récupère les choix autorisés
            $choix_autorises = $this->modeleChoix->getChoix($ancien_id);
            $ids_autorises = array_column($choix_autorises, 'id_page_destination');

            // Si déplacement interdit → on bloque
            if (!in_array($id_page, $ids_autorises)) {

                $page = $this->modelePage->getPage($ancien_id);
                $choix_page = $this->modeleChoix->getChoix($ancien_id);

                $this->afficherJeu($page, $choix_page);
                return;
            }
        }

        // Mise à jour de la page actuelle
        $_SESSION['current_id'] = $id_page;

        // Chargement de la page
        $page = $this->modelePage->getPage($id_page);
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