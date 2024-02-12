<?php

function truncateText($text, $length, $ellipsis = '...') {
    // Vérifie si la longueur du texte est inférieure ou égale à la longueur spécifiée
    if (mb_strlen($text) <= $length) {
        return $text; // Retourne le texte tel quel s'il est déjà plus court que la longueur spécifiée
    } else {
        $truncatedText = mb_substr($text, 0, $length); // Tronque le texte à la longueur spécifiée
        $lastSpacePos = mb_strrpos($truncatedText, ' '); // Trouve la dernière occurrence d'un espace

        if ($lastSpacePos !== false) {
            $truncatedText = mb_substr($truncatedText, 0, $lastSpacePos); // Coupe le texte au dernier espace trouvé
        }

        $truncatedText .= $ellipsis; // Ajoute l'ellipse à la fin du texte tronqué
        return $truncatedText;
    }
}
?>