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
<h2>Vous souhaitez modifier ou supprimer un service</h2>

<div class="formulaire">
	<div class="infos">
	<form method="POST" name="formCat" action="">

	<p>Sélectionner la rubrique du service à modifier:
		<?php
		getCategories();
		?>
	</p>
	</form>
	<?php
	
	if(isset($_POST['categorie']))
	{ 
		listeServices($_POST['categorie']);
	}
	if(isset($_POST['listeServices']))
	{
		$id = donneesServices($_POST['listeServices']);
	}
	?>
	</div>
	
</div>

<div class="footer">
<a href="../accueilSAdmin.html">Retour Accueil</a>
</div>
</body>
