<?php 

// Connexion à la BDD
$pdo = new PDO('mysql:host=localhost;dbname=salles', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// Initialiser le début de session
session_start();

// Chemin du site
define('RACINE_SITE', '/TeamProject/'); // dossier localisant la racine du site

// déclarations de variables 
$contenu = '';
$contenu_gauche = '';
$contenu_droit = '';

/// autres inclusions
require_once('fonction.inc.php');
