<?php
# public/index.php

/*
 * Contrôleur frontal
 */

# chargement des constantes de connexion en mode prod
require_once "../config.php";
# chargement du modèle (fonctions)
try {
    $db = new PDO(
        DB_CONNECT_TYPE.":host=".
        DB_CONNECT_HOST.";dbname=".
        DB_CONNECT_NAME.";charset=".
        DB_CONNECT_CHARSET,
        DB_CONNECT_USER,
        DB_CONNECT_PWD,
    );
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    // arrêt du script et affichage de l'erreur de connexion
    die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
}

# connexion à PDO


# ici notre code de traitement de la page

// si on a envoyé le formulaire avec les bons champs


// on veut récupérer tous les messages de la table `article` par date DESC






# chargement de la vue
require_once "../view/homepage.view.php";

# bonne pratique
# fermeture de connexion
