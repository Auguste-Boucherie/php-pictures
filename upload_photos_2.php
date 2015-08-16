<?php 

    $fileUpload = $_FILES["photoUploade"];
    $files = array();
    $last_co = date('Y-m-d H:i:s');
    
    //on crée une boucle pour rentrer tous les résultats dans un tableau
    if (is_array($fileUpload)) {
        foreach ($fileUpload as $key => $fichier) {
           foreach ($fichier as $keyF => $vFichier) {
                if (!array_key_exists($keyF, $files))
                    $files[$keyF] = array();
                    $files[$keyF][$key] = $vFichier;
            }
        }    
    }
    
    //on prépare un tableau d'extensions valide
	$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png', 'JPG' );
    
    foreach ($files as $file) {
        $document = new Upload($file);
        $extension_fichier = get_ext($file);; //extension du fichier 

        if (in_array($extension_fichier, $extensions_valides)) { //on compare l'extension du fichier avec les extensions autorisées

            $miniature = $document;
            $favoris = $document;
            
            if ($document->uploaded) {
                
                //on crée la miniature avec le texte qui sera affiché dans la gallerie
                $miniature->image_resize    = true;
                $miniature->image_ratio_crop = true;
                $miniature->image_y         = 300;
                $miniature->image_ratio_x        = true;
                $miniature->image_ratio_y        = true;
                $miniature->image_text            = $_POST['texto'];
                $miniature->image_text_font       = "font/test4.gdf";
                $miniature->image_text_color      = '#FFFFFF';
                $miniature->image_text_opacity    = 100;
                $miniature->image_text_background_opacity = 70;
                $miniature->image_text_padding    = 20;
                $miniature->Process('photos/miniatures'); 

                //on place l'image dans le bon dossier
                $document->file_overwrite = true;
                $document->Process('photos/');
                $name = $document->file_dst_name;
                
                //on récupére l'adresse ip de l'utilisateur
                if (!empty($_SERVER['HTTP_CLIENT_IP']))
                    { $ip=$_SERVER['HTTP_CLIENT_IP']; } 
                elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                    { $ip=$_SERVER['HTTP_X_FORWARDED_FOR']; } 
                else { $ip=$_SERVER['REMOTE_ADDR']; }
            
                if ($document->processed) {

                    $query = "INSERT 
                        INTO photos (name, last_co, ip) 
                        VALUE (:name, :last_co, :ip)";
                    $params = array(":name" => $name, ":last_co" => $last_co, ":ip" => $ip);
                    $preparedStatement = $connexion->prepare($query);
                    $preparedStatement->execute($params);
                    
                    echo "<p class='messagebon'>Votre image a été uploadée</p>";
                    $document->clean();
                }
                else {
                    echo "<p class='message'>Une erreur est survenue</p>";
                }
            }
        }
        else if ($extension_fichier == "") {
            echo "<p class='message'>Aucun fichier sélectionné</p>";
        }
        else {
            echo "<p class='message'>Mauvais format de fichier</p>";
        }
        unset($document);
    } 

?>