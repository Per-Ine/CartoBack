<?php

	require_once("../Fonctions.php");

?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
    <LINK rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<h1>Super Administrateur</h1>
<h2>Vous souhaitez modifier ou supprimer un Administrateur de rubrique</h2>

	<div class="infos">
	
	<form name="formAdminR" method="POST" action="">
	<p>Sélectionner la rubrique du service à modifier:<br>
		<?php 
			listeAdminR();
		?>
	</p>
	</form>
	</div>

<?php
	
	if(isset($_POST['adminR']))
	{ 
	//si la liste a été "postée" c'est à dire choix fait 

	$selectAdmin = $_POST['adminR'];

		connectionBD();
		$sql = 'SELECT login_admin, password_admin, role_admin  FROM administrateur WHERE login_admin = "'. $selectAdmin.'"'; 

		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		
		$data = mysql_fetch_assoc($req);

		echo "<fieldset><legend>Modifier cet Administrateur</legend>";
		echo "<form name='changerAdmin' method='POST' action='Traitements/traitementMSAdminR.php'";

		echo "<label>Modifier le login: </label> <input type='text' name='changerLogin' value='".$data['login_admin']."'> <br>";

		echo "<label>Modifier le mot de passe: </label> <input type='text' name='changerMdp' value='".$data['password_admin']."'> <br>";

		echo "<label>Modifier le role: </label> <input type='text' name='changerRole' value='".$data['role_admin']."'> </p>";		

		echo "<input type='submit' name='modifAdminR' value='Modifier'></fieldset>" ;


	}else{ 
	echo 'Choix NON effectué !!';
	} 
?>

<div class="footer">
<a href="../accueilSAdmin.html">Retour Accueil</a><br>
</div>

</body>
