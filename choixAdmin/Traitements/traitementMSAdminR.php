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
	$login = $_POST['changerLogin'];
	$mdp = $_POST['changerMdp'];
	$role = $_POST['changerRole'];


	// on affiche le résultat pour le visiteur 
    echo '<h1>Le super administrateur '.$login.' a été supprimé la Base de Données ! :)</h1>'; 
	echo "Données :<br>".$login.";<br>".$mdp.";<br>".$role;

	connectionBD();

 // on écrit la requête sql 
    $sql = "UPDATE administrateur SET login_admin ='".$login."', password_admin = '".$mdp."', role_admin = '".$role."' WHERE login_admin ='".$login."'"; 
     
    // on supprime les informations dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 

	echo "<a href='../../accueilSAdmin.HTML'>Retour à l'accueil </a>";
?>

<div class="footer">
<a href="../../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
