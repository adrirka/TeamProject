-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 24 Mai 2017 à 11:35
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `salles`
--

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

CREATE TABLE `salle` (
  `id_salle` int(3) NOT NULL,
  `titre` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(200) NOT NULL,
  `pays` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `cp` int(5) NOT NULL,
  `capacite` int(3) NOT NULL,
  `categories` enum('réunion','bureau','formation') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `titre`, `description`, `photo`, `pays`, `ville`, `adresse`, `cp`, `capacite`, `categories`) VALUES
(1, 'Salle Cézanne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed eleifend velit, eu scelerisque tellus. Praesent eget dui id leo pulvinar elementum. Nunc consectetur pulvinar laoreet. Proin consequat nibh ut dignissim iaculis. Donec luctus ultrices elit in blandit. Praesent et enim euismod, bibendum mi eu, feugiat nisl. Sed aliquam mi in imperdiet posuere. Mauris at enim non dolor blandit hendrerit vel quis ex. Phasellus at mattis eros. Sed aliquam aliquet pulvinar. Phasellus venenatis sed diam a cursus.', '/TeamProject/photos/Salle Cézanne_cezanne.JPG', 'france', 'paris', '10 rue des boloss', 75000, 200, 'formation'),
(2, 'Salle Mozart', 'Morbi gravida odio vel feugiat sagittis. In id porta turpis, in vulputate felis. Morbi auctor lacus justo, quis lobortis elit imperdiet in. Phasellus sollicitudin mi at rutrum cursus. Etiam commodo aliquam blandit. Curabitur sem ligula, pretium vitae lacus ac, sollicitudin vestibulum nunc. Nullam porttitor eget orci eget molestie. Cras fringilla maximus justo vel sollicitudin. Aliquam sed feugiat massa. Nullam volutpat risus vel libero dictum, pretium congue mauris ultricies. Etiam convallis nunc dolor, eu efficitur turpis bibendum ac. Suspendisse quis tempor velit. Etiam blandit venenatis lacus, nec tincidunt diam sodales nec. Morbi molestie, dolor nec semper aliquet, sem libero tempus urna, at imperdiet ligula lacus quis orci.', '/TeamProject/photos/Salle Mozart_mozart.jpg', 'france', 'nantes', '8 squares des boulets', 44000, 500, 'formation'),
(3, 'Salle Picasso', 'Aenean fringilla sapien nisl, bibendum semper elit dapibus eget. Suspendisse malesuada in diam id pellentesque. In hac habitasse platea dictumst. Morbi eleifend non libero sed vulputate. Morbi non lorem eleifend, luctus justo eu, ultrices risus. Etiam tincidunt auctor arcu, at condimentum justo consequat a. Pellentesque vel arcu sit amet dolor vestibulum pretium et in nisi.', '/TeamProject/photos/Salle Picasso_picasso.jpg', 'france', 'lyon', '24 avenue de la cheumitude', 69000, 80, 'bureau'),
(4, 'Salle Monet', 'Phasellus et libero ex. Pellentesque libero eros, bibendum sit amet tristique sagittis, dignissim eget nibh. Mauris elit nisl, laoreet ac semper vitae, viverra at lectus. Nullam pretium tortor enim, et egestas quam aliquet nec. In vitae massa eget diam eleifend consequat. Phasellus tempor at justo at porta. Pellentesque hendrerit urna eget velit tristique, quis accumsan mi eleifend. Integer tempor, magna sit amet elementum sagittis, justo dolor laoreet orci, ac porta libero augue nec dui. Etiam sed sagittis sapien. Sed ornare lectus augue.', '/TeamProject/photos/Salle Monet_monet.jpg', 'france', 'marseille', '7 rue bis de la petite caille', 13000, 35, 'réunion'),
(6, 'Salle Renoir', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed eleifend velit, eu scelerisque tellus. Praesent eget dui id leo pulvinar elementum. Nunc consectetur pulvinar laoreet. Proin consequat nibh ut dignissim iaculis. Donec luctus ultrices elit in blandit. Praesent et enim euismod, bibendum mi eu, feugiat nisl. Sed aliquam mi in imperdiet posuere. Mauris at enim non dolor blandit hendrerit vel quis ex. Phasellus at mattis eros. ', '/TeamProject/photos/Salle Renoir_renoir.jpg', 'France', 'Paris', '10 rue des boloss', 75000, 200, 'formation');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `salle`
--
ALTER TABLE `salle`
  ADD PRIMARY KEY (`id_salle`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `salle`
--
ALTER TABLE `salle`
  MODIFY `id_salle` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
