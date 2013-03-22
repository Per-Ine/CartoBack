<?php

	require_once("../Fonctions.php");
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
	<LINK rel="stylesheet" type="text/css" href="../style.css">
</head>
<body>

<div class="titre"> 
<h1>Super Administrateur</h1>
<h2>Vous souhaitez créer un Administrateur de rubrique</h2>
</div>

<div class="formulaire">
<form method="POST" action="Traitements\traitementCreerAdminR.php">
	<div class="infos"> 

	<label>Identifiant: </label><input type="text" name="identifiant" required><br>
	<label>Mot de passe: </label><input type="password" name="mdp" required><br>
	<label>Confirmer le mot de passe: </label><input type="password" name="ConfirmerMdp" required><br>
	<br>

	<label>Rôle: </label><input type="text" name="role"><br>

	</div>

	<p>Sélectionner un ou plusieurs bâtiments:<br>
	<?php
	getBatiments();
	?>
	</p>
	
	<p>Choisir une catégorie: 
	<?php
	getCategories();
	?>
	</p>

	<input type="submit" name="Envoi" value="Confirmer">

</form>
</div>

<div class="footer">
<a href="../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
