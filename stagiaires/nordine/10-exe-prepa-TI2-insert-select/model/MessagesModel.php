<?php
function getTeLastArticles(PDO $myDb): array|string
{
try {
    $result = $myDb->query(query:'
        SELECT title , titlte_slug, 'text', article_date_create
        FROM article
        ORDER BY article_date_create ASC
        LIMIT 4
        ');
        // pas de resultat
        if($result->rowCont() === 0) return "Pas encore d'articles"; // (string)
        // on retoune 
}catch (Exeption $e){
    return $e-> getMessage();
}

}
# fonctions en lien avec la table article

# chargement des articles classés par `create_date` DESC

# insertion d'un article après vérification