
<?php 

function connectionBD(){
	// on se connecte à MySQL 
$db = mysql_connect('localhost','user', 'mdp'); 

// on sélectionne la base 
mysql_select_db('projetcarto',$db); 
}

//*********************************************************************************************//

//Affichage des batiments dans liste de sélection:
function getBatiments()
{
	connectionBD();

	$sql = "SELECT id_batiment, nom_batiment FROM batiment;";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo "<SELECT name='batiment'>";
	while($data = mysql_fetch_assoc($req))
	{
		echo '<OPTION value="'.$data['id_batiment'].'">'.$data['nom_batiment'].'</OPTION>';
	}
	echo "</SELECT>";
}

function getBatimentsByID($id){

	connectionBD();

	$sql = "SELECT id_batiment, nom_batiment FROM batiment;";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo "<SELECT name='batiment'>";
	while($data = mysql_fetch_assoc($req))
	{
		if($id == $data['id_batiment'])
		{
		echo '<OPTION value="'.$data['id_batiment'].'" name="'.$data['nom_batiment'].'" selected="selected">'.$data['nom_batiment'].'</OPTION>';
		}
		else echo '<OPTION value="'.$data['id_batiment'].'" name="'.$data['nom_batiment'].'">'.$data['nom_batiment'].'</OPTION>';
	}
	echo "</SELECT>";
}
//*********************************************************************************************//

//Affichage des batiments dans liste de sélection:
function getCategories(){

	connectionBD();

	$sql = "SELECT DISTINCT id_categorie, nom_categorie  FROM categories;";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo '<SELECT name="categorie" onchange="formCat.submit()">';
	echo "<OPTION value='optionVide'>- Choisir -</option>";
	while($data = mysql_fetch_assoc($req))
	{
		echo '<OPTION value="'.$data['id_categorie'].'" name="'.$data['nom_categorie'].'">'.$data['nom_categorie'].'</OPTION>';
	}
	echo "</SELECT>";
}

function getCategorieByID($id){

	connectionBD();
	$sql = "SELECT DISTINCT id_categorie, nom_categorie  FROM categories;";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo '<SELECT name="categorie">';
	while($data = mysql_fetch_assoc($req))
	{
		if($id == $data['id_categorie'])
		{
		echo '<OPTION value="'.$data['id_categorie'].'" selected = selected>'.$data['nom_categorie'].'</OPTION>';
		}
		else echo '<OPTION value="'.$data['id_categorie'].'">'.$data['nom_categorie'].'</OPTION>';
	}
	echo "</SELECT>";
}


//*********************************************************************************************//
	//*Affichage de tous les Admin de Rubrique
	function listeAdminR()
	{
		connectionBD();

		// on crée la requête SQL 
		$sql = 'SELECT id_admin, login_admin FROM administrateur'; 

		// on envoie la requête 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

		// on fait une boucle qui va faire un tour pour chaque enregistrement
		echo "<SELECT name='adminR' onchange='formAdminR.submit()'>";
		echo "<OPTION value='optionVide'>- Choisir -</option>";

		while($data = mysql_fetch_assoc($req)) 
		{
			echo '<OPTION value='.$data['id_admin'].'>'.$data['login_admin'].'</OPTION>';
		}
		echo "</SELECT>";
	}

	//*Affichage de tous les Admin de Rubrique
	function listeAdminDispo(){
	connectionBD();
	$sql = "SELECT DISTINCT id_admin, login_admin  FROM administrateur WHERE id_admin NOT IN (SELECT id_admin FROM categories);";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo '<SELECT name="adminDispo">';
	while($data = mysql_fetch_assoc($req))
	{

		echo '<OPTION value="'.$data['id_admin'].'" >'.$data['login_admin'].'</OPTION>';
		
	}
	echo "</SELECT>";

	}

	//*Affichage des Admin Rubrique en fonction d'un id de catégorie du select
	function getAdminById($id){

	connectionBD();
	//Trie des AdminDispo
	$sql = "SELECT DISTINCT id_admin, login_admin  FROM administrateur WHERE id_admin NOT IN (SELECT id_admin FROM categories);";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
	//Recup admin correspondant à l'id
	$reqAdmin ="SELECT id_admin, login_admin FROM administrateur WHERE id_admin = $id";
	$queryAdmin = mysql_query($reqAdmin) or die('Erreur SQL !<br>'.$reqAdmin.'<br>'.mysql_error());
	$admin = mysql_fetch_assoc($queryAdmin);

	echo '<SELECT name="administrateur">';
	//affiche l'admin correspondant à l'id:
	echo '<OPTION value="'.$admin['id_admin'].'" selected = selected>'.$admin['login_admin'].'</OPTION>';
	//affiche tout les autres admin qui ne sont pas déjà utilisés:
	while($data = mysql_fetch_assoc($req))
	{
		echo '<OPTION value="'.$data['id_admin'].'">'.$data['login_admin'].'</OPTION>';
	}
	echo "</SELECT>";
	}


//*********************************************************************************************//
	//*Affichage des couleurs dispo
	function listecouleursDispo(){
	connectionBD();
	$sql = "SELECT DISTINCT id_couleur, nom_couleur  FROM couleur WHERE id_couleur NOT IN (SELECT id_couleur FROM categories);";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo '<SELECT name="couleur">';
	while($data = mysql_fetch_assoc($req))
	{

		echo '<OPTION value="'.$data['id_couleur'].'" >'.$data['nom_couleur'].'</OPTION>';
		
	}
	echo "</SELECT>";

	}

	//*Affichage des couleurs dispo + Affichage dans le select de la couleur de la categorie selectionnée
	function getCouleurById($id){
	connectionBD();
	$sql = "SELECT DISTINCT id_couleur, nom_couleur  FROM couleur WHERE id_couleur NOT IN (SELECT id_couleur FROM categories);";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo '<SELECT name="couleur">';
	while($data = mysql_fetch_assoc($req))
	{
		if($id == $data['id_couleur'])
		{
		echo '<OPTION value="'.$data['id_couleur'].'" selected = selected>'.$data['nom_couleur'].'</OPTION>';
		}
		else echo '<OPTION value="'.$data['id_couleur'].'">'.$data['nom_couleur'].'</OPTION>';
	}
	echo "</SELECT>";
}


//*********************************************************************************************//

//	*Affichage de la liste DES SERVICES
	function listeServices($idCat){
		connectionBD();

		$sql = "SELECT nom_service, id_service FROM services WHERE id_categorie = $idCat";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

		echo "<form method='POST' action='' name='formServices'>";
		echo "<SELECT name='listeServices' onchange='formServices.submit()'>";
	echo "<OPTION value='optionVide'>- Choisir -</option>";
		
		while($data = mysql_fetch_assoc($req)) 
		{
			echo '<OPTION value='.$data['id_service'].'>'.$data['nom_service'].'</OPTION>';
		}
		echo "</form>";
		echo "</SELECT>";

	}
// *Recuperation des données du service
	function donneesServices($idService)
	{
	connectionBD();

	$sql = "SELECT * FROM services WHERE id_service = $idService";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	while($data = mysql_fetch_assoc($req))
	{
		//Formulaire Modifier:
	echo "<fieldset><legend>Modifier le service: ".$data['nom_service']."</legend>";
	echo "<form name='changerService' method='POST' action='Traitements/traitementModifService.php'";
	echo '<label>Nom service :</label> <input type="text" name="modifNomService" value="'.$data['nom_service'].'"><br>';	
	echo "Modifier la catégorie du service: ";
	getCategorieByID($data['id_categorie']);
	echo "<br>";
	echo "Modifier le batiment du service: ";
	getBatimentsByID($data['id_batiment']);
	echo "<br>";

	echo "<input type='hidden' name='selectService' value='".$data['nom_service']."'>";
	echo "<input type='hidden' name='idService' value='".$data['id_service']."'>";
	echo "<input type='submit' name='ModifService' value='Modifier'></form></fieldset>";

		//Formulaire Supprimer:
	echo "<fieldset><legend>Supprimer ce service</legend>";
	echo "<form name='supprimerService' method='POST' action='Traitements/traitementSuppService.php'";
	echo "<label>Supprimer le service : ".$data['nom_service']." ?</label><br>";
	echo "<input type='hidden' name='nomService' value='".$data['nom_service']."'>";

		echo "<input type='submit' name='SupprService' value='Supprimer'></form></fieldset><br>" ;

	}
	}

//*********************************************************************************************//

//	*Affichage de l'indice de priorité en fonction de l'id de la catégorie
function getIndiceByID($id){

	connectionBD();
	$sql = "SELECT DISTINCT id_categorie, ordre_categorie  FROM categories;";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo '<SELECT name="IndicePrio">';
	while($data = mysql_fetch_assoc($req))
	{
		if($id == $data['id_categorie'])
		{
		echo '<OPTION value="'.$data['id_categorie'].'" selected = selected>'.$data['ordre_categorie'].'</OPTION>';
		}
		else echo '<OPTION value="'.$data['id_categorie'].'">'.$data['ordre_categorie'].'</OPTION>';
	}
	echo "</SELECT>";
}
?>