<?php

	require_once("../../Fonctions.php");
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<LINK rel="stylesheet" type="text/css" href="../../style.css">
</head>

<body>
<?php
	//Récupération des données:
	$nomService = $_POST['nomService'];


	// on affiche le résultat pour le visiteur 
    echo "<h1>Le service '".$nomService."' a été supprimé la Base de Données ! :)</h1>"; 

	connectionBD(); 
    $sql = "DELETE FROM services WHERE nom_service = '$nomService'"; 
     
    // on supprime les informations dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
?>

<div class="footer">
	<a href="../MSService.php">Modifier un service</a><br>
	<a href="../../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
