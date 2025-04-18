<?php
# MODEL
# modèle qui gère les articles

// Déclaration d'une fonction pour récupérer les 10 derniers articles
function getTeLastArticles(PDO $myDb): array|string
{

    try {

        // Exécution d'une requête SQL pour récupérer les articles
        $result = $myDb->query(query:'
            SELECT title , titlte_slug, text , article_date_create
            FROM article
            ORDER BY article_date_create DESC
            LIMIT 10
        ');

        // Vérifie si aucun résultat n'est retourné
        if ($result->rowCount() === 0) 
        return "Pas encore d'articles";
    } 
        return $result->fetchAll(PDO::FETCH_ASSOC); // Retourne un message si aucun article n'est trouvé
        // Si des résultats existent, on devrait les retourner ici (manque dans le code)
    }   catch (Exeption $e) {
        // En cas d'erreur, retourne le message d'erreur
        return $e->getMessage();
    }

