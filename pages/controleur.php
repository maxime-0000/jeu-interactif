<?php
session_start();
require 'pages/modele.php';

if (!isset($_GET['run'])) {
    require 'view/accueil.php';
    exit;
}

require 'view/view.php';
