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
	$nom = $_POST['nomRubrique'];
	$adminR = $_POST['adminR'];
	$couleur = $_POST['couleurDispo'];
	$indicePrio = $_POST['indicePrio'];

	// on affiche le résultat pour le visiteur 
    echo '<h1>La rubrique '.$nom.' a été créé dans la Base de Données ! :)</h1>'; 
	echo 'Données :<br>'.$nom.';<br>Admin:'.$adminR.';<br>Couleur:'.$couleur.';<br>Indice:'.$indicePrio.';';

	// on affiche le résultat pour le visiteur 
    echo '<h1>La rubrique '.$nom.' a été créée dans la Base de Données ! :)</h1>'; 
	echo "Données :<br>Admin: ".$adminR.";<br>Batiment: ".$batiment.";<br>Couleur: ".$couleur.";<br>Indice: ".$indicePrio.";";

	connectionBD(); 
    $sql = "INSERT INTO categories(id_categorie, id_couleur, nom_categorie, ordre_categorie, id_admin) VALUES('','$couleur', '$nom', '$indicePrio', '$adminR')"; 
	     
    // on modifie les informations dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
?>

<div class="footer">
<a href="../../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
