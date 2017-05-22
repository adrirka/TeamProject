<?php

require_once('../inc/init.inc.php');

if(!connectedAdmin()) {
    header('location:../connexion.php'); // si membre pas admin, alors on le redirigie vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
    exit();
}


require_once('../inc/haut.inc.php');

    ?>



<h2>Gestion des membres</h2>

        <form method="post"action="">
            
            <label for="pseudo">Pseudo</label><br>
            <input type="text" name="pseudo" id="pseudo"><br><br>

            <label for="mdp">Mot de passe</label><br>
            <input type="password" name="mdp" id="mdp"><br><br>

            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom"><br><br>

            <label for="prenom">Prenom</label><br>
            <input type="text" name="prenom" id="prenom"><br><br>

            <label for="email">Email</label><br>
            <input type="email" name="email" id="email"><br><br>

            <label for="civilite">Civilité</label><br>
            <select name="civilite" id="civilite">
                <option value="h">Homme</option>
                <option value="f">Femme</option>
            </select><br><br>

            <label for="statut">Statut</label><br>
             <select name="statut" id="statut">            
                <option value="1">Admin</option>
                <option value="0">Membre</option>
            </select><br><br>

    
            <input type="submit" value="Enregistrer">
        
        </form>





</form>

<?php



require_once('../inc/bas.inc.php');
