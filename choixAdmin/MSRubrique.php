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
<h2>Vous souhaitez modifier ou supprimer une rubrique</h2>

<div class="infos">
	
	<form name="formCat" method="POST" action="">
	<p>Sélectionner la catégorie à modifier:<br>
		<?php 
			getCategories();
		?>
	</p>
	</form>
	</div>

<?php
	
	if(isset($_POST['categorie']))
	{ 
	//si la liste a été "postée", c'est à dire choix fait 

	$selectCat = $_POST['categorie'];

		connectionBD();
		$sql = 'SELECT id_categorie, nom_categorie, ordre_categorie, id_admin FROM categories WHERE id_categorie = "'. $selectCat.'"'; 

		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		
		$data = mysql_fetch_assoc($req);

		//Formulaire Modifier Catégorie:
		echo "<fieldset><legend>Modifier cette catégorie</legend>";
		echo "<form name='modifCat' method='POST' action='Traitements/traitementModifRubrique.php'";

		echo "<label>Modifier le nom:</label> <input type='text' name='modifNom' value='".$data['nom_categorie']."'> <br>";

		echo "<label>Changer d'administrateur: </label> "; getAdminById($data['id_admin']); echo "<br>";

		echo "<label>Changer la couleur: </label> "; getCouleurById($data['id_categorie']); echo "<br>";

		echo "<label>Changer l'indice de priorité d'affichage: </label> "; getIndiceByID($data['ordre_categorie']); echo "<br>";

		echo "<input type='hidden' name='selectCat' value='".$selectCat."'>";
		echo "<input type='submit' name='modifCat' value='Modifier'></form></fieldset>" ;

		//Formulaire Supprimer Catégorie;
		echo "<fieldset><legend>Supprimer cette Catégorie</legend>";
		echo "<form name='supprimerCat' method='POST' action='Traitements/traitementSuppRubrique.php'";
		echo "<label>Supprimer la catégorie : ".$data['nom_categorie']." ?</label><br>";
		echo "<input type='hidden' name='selectCat' value='".$data['nom_categorie']."'>";

		echo "<input type='submit' name='SupprCat' value='Supprimer'></form></fieldset><br>" ;
	}else{ 
	echo 'Choix NON effectué !!';
	} 
?>

<div class="footer">
<a href="../accueilSAdmin.html">Retour Accueil</a><br>
</div>

</body>
