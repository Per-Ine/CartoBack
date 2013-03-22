
<?php 

function connectionBD(){
	// on se connecte à MySQL 
$db = mysql_connect('localhost','user', 'mdp'); 

// on sélectionne la base 
mysql_select_db('projetcarto',$db); 
}

//Affichage des batiments dans liste de sélection:
function getBatiments(){

	connectionBD();

	$sql = "SELECT nom_batiment FROM batiment;";
	$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error()); 

	echo '<SELECT>';
	while($data = mysql_fetch_assoc($req))
	{
		echo '<OPTION>'.$data['nom_batiment'].'</OPTION>';
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

	//Affichage des données de l'admin de rubrique à modifier
	function MSAdminR()
	{
		$selectAdmin = $_POST['adminR'];
		connectionBD();

		// on crée la requête SQL 
		$sql = 'SELECT login_admin, password_admin, role_admin  FROM administrateur'; 

		// on envoie la requête 
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
		
		$data = mysql_fetch_assoc($req);
		if($selectAdmin == $data['login_admin'])
		{
			echo "Login actuel:".$data['login_admin']."<br> <input type='text' name='changerLogin'> <br>";
		}
		else {echo "Erreur de correspondance ?";}
	}
?>