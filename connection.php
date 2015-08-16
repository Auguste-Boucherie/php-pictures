<?php 
	
	if (count($_POST['connect']) > 0) {
		//on récupère les données du formulaire
		$username = trim(strip_tags($_POST["username"]));
	    $mdp = trim(strip_tags($_POST["mdp"]));
		$last_co = date('Y-m-d H:i:s');

		$query = "SELECT username, mdp
					FROM photos
					WHERE username = :username && mdp = :mdp";
		$preparedStatement = $connexion->prepare($query);
		$preparedStatement->execute(array(':username' => $username,':mdp' => $mdp));
		$result = $preparedStatement->fetch();

			//si l'array est correctement rempli on log l'utilisateur
			if (!empty($result)) {
				$_SESSION["logged"] = "ok";
				$_SESSION['user'] = $username;
			 	header("location: index.php");

			 	echo 'Bonjour Admin';
				
			}
			
			else {
				echo "<p class='error'>Mot de passe ou nom de compte incorrect</p>";
			}

	} 
?>


