-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 16 nov. 2026 à 13:47
-- Version du serveur : 10.11.16-MariaDB
-- Version de PHP : 8.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp7_crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `etudiane`
--

CREATE TABLE `etudiane` (
  `id` int(11) NOT NULL,
  `nom` varchar(150) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `Formations_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `etudiane`
--

INSERT INTO `etudiane` (`id`, `nom`, `prenom`, `Formations_id`) VALUES
(1, 'El Fassi', 'Salma', 1),
(2, 'Benali', 'Youssef', 1),
(3, 'Alaoui', 'Imane', 2),
(4, 'Tazi', 'Omar', 3),
(5, 'El Fassi', 'Salma', 1),
(6, 'Benali', 'Youssef', 1),
(7, 'Alaoui', 'Imane', 2),
(8, 'Tazi', 'Omar', 3);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `prix` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formations`
--

INSERT INTO `formations` (`id`, `titre`, `prix`) VALUES
(1, 'Développement Web', 5000.00),
(2, 'Design Graphique', 3500.00),
(3, 'Marketing Digital', 3000.00),
(4, 'Développement Web', 5000.00),
(5, 'Design Graphique', 3500.00),
(6, 'Marketing Digital', 3000.00),
(7, 'Développement Web', 5000.00),
(8, 'Design Graphique', 3500.00),
(9, 'Marketing Digital', 3000.00);

-- --------------------------------------------------------

--
-- Structure de la table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `nom_module` varchar(100) NOT NULL,
  `Formations_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `module`
--

INSERT INTO `module` (`id`, `nom_module`, `Formations_id`) VALUES
(1, 'HTML', 1),
(2, 'PHP', 2),
(3, 'ANALYSE', 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `etudiane`
--
ALTER TABLE `etudiane`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Formations_id` (`Formations_id`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Formations_id` (`Formations_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `etudiane`
--
ALTER TABLE `etudiane`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiane`
--
ALTER TABLE `etudiane`
  ADD CONSTRAINT `etudiane_ibfk_1` FOREIGN KEY (`Formations_id`) REFERENCES `formations` (`id`);

--
-- Contraintes pour la table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `module_ibfk_1` FOREIGN KEY (`Formations_id`) REFERENCES `formations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
