
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

	$sql = "SELECT nom_batiment FROM batiment;";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo "<SELECT name='batiment'>";
	while($data = mysql_fetch_assoc($req))
	{
		echo '<OPTION name="'.$data['nom_batiment'].'">'.$data['nom_batiment'].'</OPTION>';
	}
	echo "</SELECT>";
}

//*********************************************************************************************//

//Affichage des batiments dans liste de sélection:
function getCategories(){

	connectionBD();

	$sql = "SELECT DISTINCT nom_categorie FROM categories;";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo '<SELECT name="categorie">';
	while($data = mysql_fetch_assoc($req))
	{
		echo '<OPTION name='.$data['nom_categorie'].'>'.$data['nom_categorie'].'</OPTION>';
	}
	echo "</SELECT>";
}

//*********************************************************************************************//

//Affichage Services
function services(){

connectionBD();

// on crée la requête SQL 
$sql = 'SELECT nom_service FROM services'; 

// on envoie la requête 
$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

// on fait une boucle qui va faire un tour pour chaque enregistrement 
while($data = mysql_fetch_assoc($req)) 
    { 
    // on affiche les informations de l'enregistrement en cours 
    echo '<b>'.$data['nom_service'].'</b> ';
    } 

}

//*********************************************************************************************//
	//Affichage des Admin Rubrique
	function listeAdminR()
	{
		connectionBD();

		// on crée la requête SQL 
		$sql = 'SELECT login_admin FROM administrateur'; 

		// on envoie la requête 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

		// on fait une boucle qui va faire un tour pour chaque enregistrement
		echo "<SELECT name='adminR' onchange='formAdminR.submit()'>";
		while($data = mysql_fetch_assoc($req)) 
		{
			echo '<OPTION name='.$data['login_admin'].'>'.$data['login_admin'].'</OPTION>';
		}
		echo "</SELECT>";
	}

//*********************************************************************************************//
	//Affichage des couleurs disponibles
	function listecouleursDispo()
	{
		connectionBD();

		// Selection des couleurs qui n'appartiennent pas déjà à un marqueur:
		$sql = 'SELECT * FROM couleur WHERE id_couleur NOT IN (SELECT id_couleur FROM categories)'; 
		
		// on envoie la requête 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

		// on fait une boucle qui va faire un tour pour chaque enregistrement
		echo "<SELECT name='couleurDispo'>";
		while($data = mysql_fetch_assoc($req)) 
		{
			echo '<OPTION name='.$data['nom_couleur'].'>'.$data['nom_couleur'].'</OPTION>';
		}
		echo "</SELECT>";
	}

//*********************************************************************************************//
	function idAdmin($nomAdmin)
	{
		connectionBD();

		// Selection des couleurs qui n'appartiennent pas déjà à un marqueur:
		$sql = 'SELECT id_Admin FROM administrateur WHERE login_admin ="$nomAdmin"'; 
		
		// on envoie la requête 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
		return $req;
	}

//*********************************************************************************************//
	
	function idBatiment($batiment)
	{
		connectionBD();

		// Selection des couleurs qui n'appartiennent pas déjà à un marqueur:
		$sql = 'SELECT id_batiment FROM batiment WHERE nom_batiment ="'.$batiment.'"'; 
		
		// on envoie la requête 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
		return $req;
	}

//*********************************************************************************************//

	function idCouleur($nomCouleur)
	{
		connectionBD();

		// Selection des couleurs qui n'appartiennent pas déjà à un marqueur:
		$sql = 'SELECT id_couleur FROM couleur WHERE nom_couleur ="'.$nomCouleur.'"'; 
		
		// on envoie la requête 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 
		return $req;
	}
?>