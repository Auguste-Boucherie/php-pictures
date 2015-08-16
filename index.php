<?php
    include 'database.php'; //on include nos différentes pages php
    include 'extension.php'; 
    include 'class.upload.php'; 
    include 'delete.php'; 
    include 'connection.php';
    include 'upload_photos.php';
    include 'upload_photos_2.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head> 
    <meta charset="UTF-8">
    <title>Pictures | La galerie ouverte a tous</title>
    <link type="text/css" rel="stylesheet" href="inc/css/reset.css">
    <link type="text/css" rel="stylesheet" href="inc/css/style.css">
    <script type="text/javascript" src="inc/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="inc/js/main.js"></script>
    <link rel="icon" type="image/png" href="image/favicon.png" size="16x16"/>
</head>
<body>
        
        <div id="topline"></div>
        <div id="bottomline"></div>
        <div id="menu">

            <h1>Bienvenu sur pictures</h1>
            <h2>Partage tes photos et ajoutes-y un petit mot</h2>

            <div class="click1">En noir et blanc</div>
            <div class="click2">En couleur</div>
            <div class="click3">Espace Admin</div>

            <?php
                include 'form_noiretblanc.php'; //on include les formulaires
                include 'form_couleur.php'; //on include les formulaires
                include 'form_admin.php'; //on include les formulaires
            ?>
            
            <?php 
                if ($_SESSION['logged'] != 'ok') {
            }
                else {
                    include 'logout.view.php';
            }
            ?>
            
            <footer>
                <p>Pictures | Auguste Boucherie | 2015</p>
            </footer>
    
        </div>

    <div id="photo">
        
        <?php 
        
            if ($_SESSION['logged'] != 'ok') {
                include 'photos.view2.php';
            }
            else {
                include 'photos.view.php';
            }
            
        ?>
   
   </div>
</body>
</html>
