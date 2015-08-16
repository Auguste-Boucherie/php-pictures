<ol class="photos">
    <?php
        $dossier = 'photos/miniatures/'; //on indique le dossier des miniatures
        $reponse = $connexion->query("SELECT * FROM `photos`"); // Recherche des cpsules de l'utilisateur
        
        while ($donnees = $reponse->fetch()){
                
            $ip = $donnees['ip'];
            $name = $donnees['name'];
            $date = $donnees['last_co'];
                
            //on affiche les li avec nos photos    
            echo '<li>
                    <a href="photos/'.$name.'" target="_blank">
                        <img src="'.$dossier.$name.'">
                        <div class="link"></div>
                    </a>
                </li>';
            }
        ?>
</ol>