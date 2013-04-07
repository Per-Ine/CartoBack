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
	$selectCat = $_POST['selectCat'];


	// on affiche le résultat pour le visiteur 
    echo "<h1>La catégorie '".$selectCat."' a été supprimée la Base de Données ! :)</h1>"; 

	connectionBD(); 
    $sql = "DELETE FROM categories WHERE nom_categorie ='".$selectCat."'"; 
     
    // on supprime les informations dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
?>

<div class="footer">
	<a href="../MSRubrique.php">Modifier une catégorie</a><br>
	<a href="../../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
