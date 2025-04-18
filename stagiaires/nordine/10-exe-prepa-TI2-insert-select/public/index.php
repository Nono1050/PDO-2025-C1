<?php
# public/index.php

/*
 * Contrôleur frontal
 */

# chargement des constantes de connexion en mode prod
require_once "../config.php";
# chargement du modèle (fonctions)
require_once "../model/ArticlesModel.php";

# connexion à PDO
try{
    // instanciation avec PDO
    $db = new PDO(
        dsn:DB_CONNECT_TYPE.":host=".DB_CONNECT_HOST.";dbname=".DB_CONNECT_NAME.";port=".DB_CONNECT_PORT.";charset=".DB_CONNECT_CHARSET,
        username:DB_CONNECT_USER,
        password:DB_CONNECT_PWD,
    );

// si erreur, instanciation de Exception avec $e comme pointeur    
}catch(Exception $e){
    // arrêt du script avec die(), et affichage de la méthode se trouvant dans l'instance de Exception via $e
    die("Code erreur : {$e->getCode()} | Message : {$e->getMessage()}");
}


# ici notre code de traitement de la page

// si on a envoyé le formulaire
if(isset($_POST['surname'],$_POST['email'],$_POST['message'])){

    // tentative d'insertion
    $insert = addNewMessages($db, $_POST['surname'],$_POST['email'],$_POST['message']);
    // ça a fonctionné
    if($insert===true){
        header("Location: ./");
        exit();
    }else{
        $error2 = $insert;
    }
}


// on veut récupérer tous les messages de la table `article` par date DESC
$articles = getAllArticleByDateDesc($db);





# chargement de la vue
require_once "../view/homepage.view.php";

# bonne pratique
# fermeture de connexion
$db=null;