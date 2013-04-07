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
	$nomselect = $_POST['selectService'];
	$idService = $_POST['idService'];
	$nom = $_POST['modifNomService'];
	$categorie = $_POST['categorie'];
	$batiment = $_POST['batiment'];

	// on affiche le résultat pour le visiteur 
    echo '<h1>Le service '.$nomselect.' a été modifié la Base de Données ! :)</h1>'; 
	echo "Données :<br>".$nom.";<br>".$categorie.";<br>".$batiment;

	connectionBD(); 
    $sql = "UPDATE services SET id_categorie = $categorie, nom_service = '$nom', id_batiment = $batiment WHERE id_service = $idService "; 
    echo $sql;
    // on modifie les informations dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
    

?>

<div class="footer">
<a href="../../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
