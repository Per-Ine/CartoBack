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
<h2>Vous souhaitez créer un service</h2>
</div>

<div class="formulaire">
	<form method="POST" action="Traitements\traitementCreerService.php">

	<label>Nom du service : </label><input type="text" name="nomService"><br>

	<p>Sélectionner une catégorie:
	<?php
	getCategories();
	?>
	</p>
	
	<p><label>Sélectionner un bâtiment:</label>
		<?php
			getBatiments();
		?>
		</p>
	<input type="submit" name="Envoi" value="Confirmer">

	</form>
</div>

<div class="footer">
<a href="../accueilSAdmin.html">Retour Accueil</a>
</div>

</body>
