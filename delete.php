<?php

	$item = $_POST['suprPhoto'];

	if(isset($_POST['suprPhoto'])){

	$fileAdress = str_replace('Supprimer ', 'photos/miniatures/', $item);
	$fileName = str_replace('Supprimer ', '', $item);
  
    if (file_exists($fileAdress)){

        unlink($fileAdress);
        $delete = $connexion->prepare("DELETE FROM photos WHERE name='" . $fileName . "'");
        $delete->execute();

        echo '<p id="alert">Le fichier '. $fileAdress . ' a bien était supprimé.</p>';
    }
    
    else {echo '<p id="alert"> Erreur de suppression </p>';}
    }

?>