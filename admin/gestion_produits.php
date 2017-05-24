<?php
require_once('../inc/init.inc.php');




// ------------------------------ TRAITEMENT ----------------------------------

//  verification ADMIN
if(!connectedAdmin()){
    header('location:../connexion.php'); // si membre pas ADMIN, alors on le redirige vers la page de connexion qui est à la racine du site (en dehors du dossier admin)
    exit();

}

// suppression d'un produit
if (isset($_GET['action']) && $_GET['action'] == 'suppression' && isset($_GET['id_salle'])){


    $resultat = executeRequete("SELECT * FROM salle s INNER JOIN produit p ON s.id_salle = p.id_salle WHERE id_salle = :id_salle", array(':id_salle' => $_GET['id_salle']));
    
    $produit_a_supprimer = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car qu'un seul produit 

    $chemin_photo_a_supprimer = $_SERVER['DOCUMENT_ROOT'] . $produit_a_supprimer['photo']; // chemin du fichier à supprimer

    if(!empty($produit_a_supprimer['photo']) && file_exists($chemin_photo_a_supprimer)){
        //si il y a un chemin de photo en base ET que le fichier existe, on peut le supprimer:
        unlink($chemin_photo_a_supprimer); // supprimer le fichier spécifié
    
    }

    // puis suppression du produit en BDD:
    executeRequete("DELETE FROM produit WHERE id_salle = :id_salle", array(':id_salle' => $_GET['id_salle']));

    $contenu .= '<div class="suppression">Le produit a été supprimé !</div>';
    $_GET['action'] = 'affichage'; // pour lancer l'affichage des produits dans le tableau HTML

}else{

    $resultat = executeRequete("SELECT * FROM produit");
    
}

$contenu .= '<h3>Liste des produits</h3>
                <table border=".2rem solid grey">';
  
        // La ligne des entêtes
        
        $contenu .= '<tr>';

            for($i = 0; $i < $resultat->columnCount(); $i++){
                $colonne = $resultat->getColumnMeta($i);
            
                 $contenu .= '<th>' . $colonne['name'] . '</th>'; //getColumnMeta() retourne un array contenant notamment l'indice name contenant le nom de la colonne
            }
            
            $contenu .='<th>Action</th>'; // on ajoute une colonne "action"

        $contenu .= '</tr>';
        
        // Affichages des lignes

        $contenu .= '<tr>';

        while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
            $contenu .= '<tr>';
                // echo '<pre>'; print_r($ligne), echo '<pre>';
                foreach($ligne as $index => $data){
                    if($index == 'photo'){
                        $contenu .= '<td><img src="'. $data .'" width="70" height="70"></td>';
                    }else{
                        $contenu .= '<td>' . $data . '</td>';
                    }

                }

                $contenu .= '<td>
                                <a href="?action=modification&id_produit='. $ligne['id_produit'] .'">Modifier</a> /
                                <a href="?action=suppression&id_produit=' . $ligne['id_produit'] . '"
                                onclick="return(confirm(\'Etes-vous cetain de vouloir supprimer ce produit ? \'));">Supprimer</a>
                            </td>';
        
            $contenu .= '</tr>';
        }

        
    
    $contenu .= '</table>';




// ------------------------------ AFFICHAGE -----------------------------------

require_once('../inc/haut.inc.php');
echo "<a href='?action=affichage'>Afficher les produits</a>";
echo "<a href='?action=ajout'>Ajouter les produits</a>";
echo $contenu;

// 3- Formulaire HTML
if(isset($_GET['action']) && ($_GET['action'] == 'ajout' || $_GET['action'] == 'modification')) :
// Si on a demandé l'ajout d'un produit ou sa modification , on affiche le formulaire : 

    // 8 - formulaire de modification avec présaisie des infos dans le formulaire : 
    if(isset($_GET['id_produit'])){
        //Pour pré remplir le formulaire on requête en BDD les infos du produit passé dans l'url : 
        $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit", array(':id_produit' => $_GET['id_produit']));

        $produit_actuel = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car un seul produit 
    
    }

?>


<h3>Formulaire d'ajout ou de modification d'un produit</h3>
<form method="post" enctype="multipart/form-data" action=""><!-- "multipart/form-data" permet de cacher un fichier et de fénérer une superglobale $_FILES -->


    <!-- Modification de la photo -->
    <?php 
    
        if(isset($produit_actuel['photo'])){
            echo'<i>Vous pouvez uploader une nouvelle photo</i><br>';
            // Afficher la photo actuelle : 
            echo '<img src="'. $produit_actuel['photo'] . '" width="90" height="90"><br>';
            // Mettre le chemin de la photo dans un champs caché pour l'enregistrer en base
            echo '<input type="hidden" name="photo_actuelle" value="' . $produit_actuel['photo'] .'">';
            // ce champs renseigne le $_POST['photo_actuelle'] qui va en base quand on soumet le formulaire de modification. Si on ne remplit pas le formulaire ici , le champs photo de la base est remplacé par un vide, ce qui efface le chemin de la photo
        }
    ?>

    <label for="date_arrivee">Date d'arrivee</label>
    <input type="date" id="date_arrivee" name="date_arrivee" value="<?php echo $produit_actuel['date_arrivee'] ?? ''; ?>"><br><br>

    <label for="date_depart">Date de depart</label>
    <input type="date" id="date_depart" name="date_depart" value="<?php echo $produit_actuel['date_depart'] ?? ''; ?>"><br><br>

    <label for="tarif">Tarif</label>
    <input type="text" id="tarif" name="tarif" value="<?php echo $produit_actuel['tarif'] ?? ''; ?>"><br><br>

    <label for="salle">Salle</label>
    
    <select>
    <?php
    $liste = query("SELECT * FROM salle");
    
    $liste_resultat = $liste->fetch(PDO::FETCH_ASSOC);
 
    foreach($liste_resultat as $indice => $valeur){
     
     echo '<option>' . $valeur['id_salle'] .  $valeur['titre'] . '</option>';
    }

    ?>
    </select>

    <input type="submit" value="valider" class="btn">

    </form>

<?php

endif;

require_once('../inc/bas.inc.php');


