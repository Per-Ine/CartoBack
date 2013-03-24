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
<h2>Vous souhaitez créer une rubrique</h2>
</div>

<div class="formulaire">
	<div class="infos">
		<form method="POST" name="formRubrique" action="Traitements\traitementCreerRubriqueTEST.php">
		<p><label>Nom de la rubrique</label><input type="text" name="nomRubrique" required></p>

		<p><label>Sélectionner un administrateur:</label>
			<?php
				listeAdminR();
			?>
		</p>

		<p><label>Sélectionner un bâtiment:</label>
			<?php
				getBatiments();
			?>
		</p>

		<p><label>Sélectionner une couleur de catégorie:</label>
			<?php
			listecouleursDispo();
			?>
		</p>

		<p><label>Sélectionner un indice de priorité d'affichage:</label>
			<select name="indicePrio">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</p>
		<br>
		<input type="submit" value="Confirmer"><br>
	</div>
	</form>	
</div>
<div class="footer">
<a href="../accueilSAdmin.html">Retour Accueil</a>
</div>

</body>
