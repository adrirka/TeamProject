<?php

require_once('inc/init.inc.php');

$inscription = false;

if(!empty($_POST)) { // si le formulaire est posté

    // validation du formulaire :

    if(strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo'])> 20) {
        $contenu .='<div>Le pseudo doit contenir au moins 4 caractères </div>';
    }

    if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp'])> 20) {
        $contenu .='<div>Le mot de passe doit contenir au moins 2 caractères </div>';
    }

    if(strlen($_POST['nom']) < 2 || strlen($_POST['nom'])> 20) {
        $contenu .='<div>Le nom doit contenir au moins 2 caractères </div>';
    }

    if(strlen($_POST['prenom']) < 2 || strlen($_POST['prenom'])> 20) {
        $contenu .='<div>Le prénom doit contenir au moins 2 caractères </div>';
    }

    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $contenu .= '<div>L\'email est invalide</div>';
    }

    if($_POST['civilite'] != 'h' && $_POST['civilite'] !='f') {
        $contenu .= '<div>La civilité est incorrecte</div>';
    }


}
require_once('inc/haut.inc.php');
echo $contenu;  // affiche les messages du site

if (!$inscription) : // si personne non-inscrite, le formulaire s'affiche

?>
     
        <form method="post"action="">
            
            <label for="pseudo">Pseudo</label><br>
            <input type="text" name="pseudo" id="pseudo"><br><br>

            <label for="mdp">Mot de passe</label><br>
            <input type="text" name="mdp" id="mdp"><br><br>

            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom"><br><br>

            <label for="prenom">Prenom</label><br>
            <input type="text" name="prenom" id="prenom"><br><br>

            <label for="email">Email</label><br>
            <input type="email" name="email" id="email"><br><br>

            <label for="civilite">Civilité</label><br>
            <select name="civilite" id="civilite">
                <option value="null"> -Selectionner- </option>
                <option value="h">Homme</option>
                <option value="f">Femme</option>
            </select><br><br>

            <input type="submit" value="Inscription">
        
        </form>
        
<?php 
endif;

require_once('inc/bas.inc.php');