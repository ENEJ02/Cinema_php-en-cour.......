<?php

// Vérifier si le formulaire a été soumis
if(isset($_POST['submit'])) {
    
    // Définir le dossier de destination pour l'image uploadée 
    $target_dir = "uploads/";
    
    // Récupérer le nom de fichier et le chemin temporaire du fichier uploadé
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $tmp_file = $_FILES["image"]["tmp_name"];
    
    // Vérifier si le fichier est une image valide
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png" && $imageFileType != "gif" ) {
        echo "Seuls les fichiers JPG, JPEG, PNG et GIF sont autorisés.";
        exit;
    }
    
    // Déplacer le fichier uploadé vers le dossier de destination
    if (move_uploaded_file($tmp_file, $target_file)) {
        echo "Le fichier ". htmlspecialchars( basename( $_FILES["image"]["name"])). " a été uploadé.";
    } else {
        echo "Désolé, une erreur s'est produite lors de l'upload du fichier.";
    }
}
?>

<!-- Formulaire HTML pour upload d'image -->
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>






?>