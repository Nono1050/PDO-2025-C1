<?php
# MODEL
# modèle qui gère les articles


function getTeLastArticles(PDO $myDb): array|string
{
try {
    $result = $myDb->query(query:'
        SELECT title , titlte_slug, 'text', article_date_create
        FROM article
        ORDER BY article_date_create DESC
        LIMIT 10
        ');
        // pas de resultat
        if($result->rowCont() === 0) return "Pas encore d'articles"; // (string)
        // on retoune 
}catch (Exeption $e){
    return $e-> getMessage();
}

}
}