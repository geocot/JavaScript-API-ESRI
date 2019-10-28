<?php

// Entête pour une sortie en fichier CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// Connexion
$output = fopen('php://output', 'w');

// Entête du fichier
fputcsv($output, array('id','lat','long','Nom' ));

// Recherche des données
$link = mysqli_connect('localhost', 'root', 'root', 'coordonnees');

$query = "SELECT * FROM positions";

if ($result = mysqli_query($link, $query)) {

    /* Récupère un tableau associatif */
    while ($row = mysqli_fetch_assoc($result)) {
        fputcsv($output, $row);

    }

    /* Libération des résultats */
    mysqli_free_result($result);
}

//Fermeture de la connexion
mysqli_close($link);

?>