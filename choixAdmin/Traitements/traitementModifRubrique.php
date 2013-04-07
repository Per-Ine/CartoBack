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
	$nom = $_POST['modifNom'];
	$admin = $_POST['adminR'];
	$indice = $_POST['ordreAff'];


	// on affiche le résultat pour le visiteur 
    echo '<h1>La catégorie '.$selectCat.' a été modifié dans la Base de Données ! :)</h1>'; 
	echo "Données :<br>Nom: ".$nom.";<br>Admin :".$admin.";<br>Indice:".$indice;

	connectionBD(); 
    $sql = "UPDATE categories SET nom_categorie = '".$nom."', ordre_categorie = '".$indice."', id_admin = '".$admin."' WHERE nom_categorie ='".$nom."'"; 
     
    // on modifie les informations dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
?>

<div class="footer">
<a href="../MSRubrique.php">Modifier une rubrique</a><br>
<a href="../../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
