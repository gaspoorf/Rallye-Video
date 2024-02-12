<?php

require_once('app/Models/ConnectionDb.php');

//Requete et traitement pour récupérer les informations de l'équipe
// pas * sinon confusion entre les ID des 2 tables
$query = "SELECT Team.*, Video.VideoTitle, Video.Description, Video.VideoFileName, Video.UploadDate FROM Team LEFT JOIN Video ON Team.TeamID = Video.TeamID";




$statement = $dbConnection->prepare($query);
$statement->execute();
$teamsData = $statement->fetchAll(PDO::FETCH_ASSOC);
return $teamsData;

?>
