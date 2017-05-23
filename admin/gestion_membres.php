<?php

require_once('../inc/init.inc.php');


$content = '';
$contenu ='';

$pdo = new PDO('mysql:host=localhost;dbname=salles', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));


$query = $pdo->prepare('SELECT * FROM membre');
$query->execute();
$content .= '<h3>Liste des membres</h3>
			 <table border=".2rem solid grey">';
		$content .= '<tr>
                        <th>Id_membre</th>
						<th>Pseudo</th>
						<th>Nom</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Civilité</th>
                        <th>Statut</th>
                        <th>Date d\'enregistrement</th>
						<th>Actions</th>
					</tr>';

while ($membres = $query->fetch(PDO::FETCH_ASSOC)){
		$content .= '<tr>
						<td>'. $membres['id_membre'] .'</td>
						<td>'. $membres['pseudo'] .'</td>
						<td>'. $membres['nom'] .'</td>
						<td>'. $membres['prenom'] .'</td>
						<td>'. $membres['email'] .'</td>
						<td>'. $membres['civilite'] .'</td>
						<td>'. $membres['statut'] .'</td>
						<td>'. $membres['date_enregistrement'] .'</td>
						
						<td>
							<a href="?id_membre='. $membres['id_membre'] .'"><i class="fa fa-search" aria-hidden="true"></i><i class="fa fa-pencil-square-o" aria-hidden="true"></i><i class="fa fa-trash" aria-hidden="true"></i></a>
						</td>
					</tr>';
	}			
			
$content .= '</table>';



if(!connectedAdmin()) {
    header('location:../connexion.php'); // si membre pas admin, alors on le redirigie vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
    exit();
}

if(!empty($_POST)) { // si le formulaire est posté

    // validation du formulaire :

    if(strlen($_POST['pseudo']) < 2 || strlen($_POST['pseudo'])> 20) {
        $contenu .='<div>Le pseudo doit contenir au moins 2 caractères </div>';
    }

    if(strlen($_POST['mdp']) < 4 || strlen($_POST['mdp'])> 20) {
        $contenu .='<div>Le mot de passe doit contenir au moins 4 caractères </div>';
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

     if($_POST['statut'] != '0' && $_POST['statut'] !='1') {
        $contenu .= '<div>Le statut est incorrect</div>';
    }

}


require_once('../inc/haut.inc.php');

    ?>



<h2>Gestion des membres</h2>

        <form method="post"action="">

        <?php 
        echo $content; 
        echo $contenu; 
        ?>
            
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




<?php



require_once('../inc/bas.inc.php');
