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
	$selectAdmin = $_POST['selectAdmin'];
	$login = $_POST['changerLogin'];
	$mdp = $_POST['changerMdp'];
	$confirmerMdp = $_POST['confirmerMdp'];
	$role = $_POST['changerRole'];

	if($mdp == $confirmerMdp)
	{
	// on affiche le résultat pour le visiteur 
    echo '<h1>Le super administrateur '.$selectAdmin.' a été modifié la Base de Données ! :)</h1>'; 
	echo "Données :<br>".$login.";<br>".$mdp.";<br>".$role;

	connectionBD(); 
    $sql = "UPDATE administrateur SET login_admin ='".$login."', password_admin = '".$mdp."', role_admin = '".$role."' WHERE login_admin ='".$selectAdmin."'"; 
     
    // on modifie les informations dans la table 
    mysql_query($sql) or die('Erreur SQL !'.$sql.'<br>'.mysql_error()); 
    }
    else
    {
		echo "<h1>Attention !</h1><h2>Veuillez saisir deux mdp identiques </h2><br>";
		echo "<a href='../MSAdminR.php'>Retour à la saisie des informations </a><br>";
	}
?>

<div class="footer">
<a href="../MSAdminR.php">Modifier un autre Administrateur</a><br>
<a href="../../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
