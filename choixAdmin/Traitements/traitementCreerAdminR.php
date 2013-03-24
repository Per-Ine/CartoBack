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
	$login = $_POST['identifiant'];
	$mdp = $_POST['mdp'];
	$confirmerMdp = $_POST['ConfirmerMdp'];
	$role = $_POST['role'];


	if($mdp == $confirmerMdp)
	{
		    // on affiche le résultat pour le visiteur 
    echo '<h1>Le super administrateur '.$login.' a été créé dans la Base de Données ! :)</h1>'; 
	echo "Données :<br>".$login.";<br>".$mdp.";<br>".$confirmerMdp.";<br>".$role;

	connectionBD();

 // on écrit la requête sql 
    $sql = "INSERT INTO administrateur(id_admin, login_admin, password_admin, role_admin) VALUES('','$login', '$mdp', '$role')"; 
     
    // on insère les informations du formulaire dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
	}

	else 
	{
		echo "Veuillez saisir deux mdp identiques <br>";
		echo "<a href='../creerAdminR.php'>Retour à la saisie des informations </a><br>";
	}
?>

<div class="footer">
<a href="../../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
