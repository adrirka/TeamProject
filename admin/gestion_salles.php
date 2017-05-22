<?php 
require_once('../inc/init.inc.php');

// ***** TRAITEMENT ***** //

// Redirection du membre si il n'est pas admin
if(!connectedAdmin()){
    header('location:../connexion.php');
    exit();
}

// Vérification du formulaire
if(!empty($_POST)){ // si le formulaire est posté

    // Validation du formulaire : 
    if(strlen($_POST['titre']) < 2 || strlen($_POST['titre']) > 2){
        $contenu .= '<div>Le titre doit contenir au moins 2 caractères</div>';
    }

    if(strlen($_POST['description']) < 10){
        $contenu .= '<div>La description doit contenir au moins 10 caractères</div>';
    }

    if(strlen($_POST['pays']) < 2){
        $contenu .= '<div>Le pays doit contenir au moins 2 caractères</div>';
    }

    if(strlen($_POST['ville']) < 2){
        $contenu .= '<div>Le pays doit contenir au moins 2 caractères</div>';
    }

    if(strlen($_POST['adresse']) < 10){
        $contenu .= '<div>L\'adresse doit contenir au moins 10 caractères</div>';
    }

    // Utiliser une expression ordinaire pour le code postal
    // if(strlen($_POST['cp']) < 10){
    //     $contenu .= '<div>L\'adresse doit contenir au moins 10 caractères</div>';
    // }
}


require_once('../inc/haut.inc.php');
echo $contenu;
?>

<h2>Gestion des salles</h2>

<form method="post" action="" enctype="multipart/form-data">
    <label for="titre">Titre</label>
    <input type="titre" id="titre" name="titre">

    <label for="description">Description</label>
    <input type="text" id="description" name="description">

    <label for="photo">Photo</label>
    <input type="file" id="photo" name="photo">

    <label for="pays">Pays</label>
    <input type="text" id="pays" name="pays">

    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville">

    <label for="adresse">Adresse</label>
    <input type="text" id="adresse" name="adresse">

    <label for="cp">Code Postal</label>
    <input type="text" id="cp" name="cp">

    <label for="capacite">Capacité</label>
    <input type="number" id="capacite" name="capacite">

    <label for="categorie">Catégorie</label>
    <select name="categorie" id="categorie">
        <option name="categorie" value="reunion">Réunion</option>
        <option name="categorie" value="bureau">Bureau</option>
        <option name="categorie" value="formation">Formation</option>
    </select>

    <input type="submit" value="Enregistrer">
</form>

<?php 
require_once('../inc/bas.inc.php');



