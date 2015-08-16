<section class="contentlogin">
    <form id="postadmin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
        <label for="photoUpload">Importe en noir et blanc</label><br>
        <input type="file" id="photoUpload" multiple="multiple" name="photoUpload[]" /><br>
        <input type="texte" name="texto" class="texteimage" placeholder="Ton mots"/>
        <input type="submit" value="upload" id="submit">
    </form>
</section>

