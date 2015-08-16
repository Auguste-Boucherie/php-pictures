<section class="contentlogin2">
    <form id="postadmin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <label for="photoUploade">Importe en couleur</label><br>
        <input type="file" id="photoUploade" multiple="multiple" name="photoUploade[]" /><br>
        <input type="texte" name="texto" class="texteimage" placeholder="Ton mots"/>
        <input type="submit" value="upload" id="submit">
    </form>
</section>

            
