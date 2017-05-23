<?php

require_once('inc/init.inc.php');

// Affichage des catégories :
$categories = executeRequete("SELECT DISTINCT categories FROM salle");

$contenu_gauche .= '<form>';
$contenu_gauche .= '<label>Catégorie</label>';
    while($cat = $categories->fetch(PDO::FETCH_ASSOC)){
        $contenu_gauche .= '<div class="abra"><a href="?categories='. $cat['categories'] .' " onclick="ajax()"> '. $cat['categories'] .' </a></div class="abra">';
    }


// Affichage des villes : 
$villes = executeRequete("SELECT DISTINCT ville FROM salle");

$contenu_gauche .= '<label>Ville</label>';
    while($ville = $villes->fetch(PDO::FETCH_ASSOC)){
        $contenu_gauche .= '<div class="abra"><a href="?ville='. $ville['ville'] .' " onclick="ajax()"> '. $ville['ville'] .' </a></div>';
    }


// Capacité : 
$capacite = executeRequete("SELECT DISTINCT capacite FROM salle ORDER BY capacite");

$contenu_gauche .= '<label>Capacité</label>';
$contenu_gauche .= '<select name="capacite" onchange="ajax()">';
    while($nombre = $capacite->fetch(PDO::FETCH_ASSOC)){
        $contenu_gauche .= '<option value="'.$nombre['capacite'].'">'.  $nombre['capacite'].' personnes</option>';
    }
$contenu_gauche .= '</select>';


// Prix : 
$prix = executeRequete("SELECT DISTINCT prix FROM produit ORDER BY prix");

$contenu_gauche .= '<label>Prix</label>';
$contenu_gauche .= '<select name="prix" onchange="ajax()">';
    while($montant = $prix->fetch(PDO::FETCH_ASSOC)){
        $contenu_gauche .= '<option value="'.$montant['prix'].'">'.  $montant
        ['prix'].'€</option>';
    }
$contenu_gauche .= '</form>';
$contenu_gauche .= '</select>';

// Période
$contenu_gauche .= '<label for="date_arrivee">Date d\'arrivée</label>';
$contenu_gauche .= '<input type="date" name="date_arrivee">';

$contenu_gauche .= '<label for="date_depart">Date de départ</label>';
$contenu_gauche .= '<input type="date" name="date_depart">';



// Affichage des produits :

require_once('inc/haut.inc.php');

?>
<style>
#gauche{
    width: 25%;
}

#droit{
    width: 75%;
}

.abra{
    border: 0.1rem solid black;
    padding: 1rem;
}

.abra a{
    text-decoration : none;
    color: grey;
}

input, select, label{
    width: 100%;
    display: block;
}

label{
    margin: 2rem 0 1rem 0;
}

</style>
    <section id="gauche">
        <?php echo $contenu_gauche; ?>
    </section>

    <section id="droite">
        <?php echo $contenu_droit; ?>
    </section>

<?php 
// Affichage HTML



















require_once('inc/bas.inc.php');
