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
	$idCat = $_POST['categorie'];
	$idBat = $_POST['batiment'];



		    // on affiche le résultat pour le visiteur 
    echo '<h1>Le service'.$nomService.' a été créé dans la Base de Données ! :)</h1>'; 
	echo "Données :<br>".$nomService.";<br>".$idCat.";<br>".$idBat.";<br>";

	connectionBD();

 // on écrit la requête sql 
    $sql = "INSERT INTO services(id_service, id_categorie, nom_service, id_batiment) VALUES('','$idCat', '$nomService', '$idBat')"; 
     
    // on insère les informations du formulaire dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
	
?>

<div class="footer">
<a href="../../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
