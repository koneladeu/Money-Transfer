-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 20 avr. 2023 à 13:02
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `moneytransfer`
--

-- --------------------------------------------------------

--
-- Structure de la table `transaction`
--

CREATE TABLE `transaction` (
  `trans_id` int(11) NOT NULL,
  `trans_number` varchar(255) DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `receiver` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `trans_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `trans_number`, `sender`, `receiver`, `amount`, `trans_date`) VALUES
(1, '0752548555', 7, 8, 20000, NULL),
(2, '0745855289', 7, 9, 50000, '2023-03-27 11:57:14'),
(3, '64234829518ae', 7, 8, 100, '2023-03-28 20:03:53'),
(4, '6423484057c09', 7, 8, 1000, '2023-03-28 20:04:16'),
(5, '642477e350c20', 7, 10, 100000, '2023-03-29 17:39:47'),
(6, '64256296beffc', 10, 7, 5000, '2023-03-30 10:21:10'),
(7, '642565e3acf76', 10, 7, 10000, '2023-03-30 10:35:15'),
(8, '64259dce85e8c', 7, 10, 100000, '2023-03-30 14:33:50'),
(9, '64259e149d5a6', 7, 8, 2000, '2023-03-30 14:35:00'),
(10, '64259f16db8f8', 7, 10, 500000, '2023-03-30 14:39:18'),
(11, '64259f3539334', 7, 10, 500000, '2023-03-30 14:39:49'),
(12, '6425a26a78fd3', 7, 8, 2000, '2023-03-30 14:53:30'),
(13, '6425a27fcdef9', 7, 8, 2000, '2023-03-30 14:53:51'),
(14, '6425a3ff19cc0', 7, 10, 5000, '2023-03-30 15:00:15'),
(15, '6425a4c669aba', 7, 8, 4000, '2023-03-30 15:03:34'),
(16, '6425a5ee44c9b', 7, 8, 4000, '2023-03-30 15:08:30'),
(17, '642853f3b9db5', 7, 10, 100000, '2023-04-01 15:55:31'),
(18, '642854f2ede1c', 7, 10, 10000000, '2023-04-01 15:59:46'),
(19, '64285ededf185', 7, 10, 10000, '2023-04-01 16:42:06'),
(20, '6428629443804', 7, 10, 50000, '2023-04-01 16:57:56'),
(21, '6428a477a85d1', 7, 12, 100000, '2023-04-01 21:39:03'),
(22, '6428a6963437c', 12, 7, 100000, '2023-04-01 21:48:06'),
(23, '642c037314865', 7, 10, 100000, '2023-04-04 11:01:07'),
(24, '642ea9acd9169', 7, 15, 1000000, '2023-04-06 11:14:52'),
(25, '642ea9e68e8a1', 15, 7, 1000, '2023-04-06 11:15:50'),
(26, '642ea9f43b37a', 15, 7, 10000, '2023-04-06 11:16:04'),
(27, '642eaa00be9f9', 15, 7, 200000, '2023-04-06 11:16:16');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(11) NOT NULL,
  `balance` int(11) DEFAULT NULL,
  `acc_create_date` datetime DEFAULT NULL,
  `code` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `temp_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`uid`, `name`, `phone`, `balance`, `acc_create_date`, `code`, `email`, `temp_code`) VALUES
(1, 'chisrtopher zoungrana', '140481286', NULL, NULL, 0, 'chris@gmail.com', 0),
(2, 'meitte aboubacar', '740481286', NULL, NULL, 12345678, 'meitte@gmail.com', 0),
(4, 'brama', '140481287', NULL, NULL, 12345678, 'brama@gmail.com', 0),
(5, 'jean', '140481288', NULL, NULL, 12345678, 'jean@gmail.com', 0),
(6, 'axel', '0140481289', NULL, NULL, 12345678, 'axrl@gmail.com', 0),
(7, 'christopher zoungrana', '0140481290', 2135000647, NULL, 1234, 'christopherzoungrana@gmail.com', 0),
(8, 'Leila Kone', '0752548555', 15100, NULL, 1234, 'leila@gmail.com', NULL),
(9, 'again', '0745855289', NULL, '2023-03-26 15:57:28', 5144, 'again@gmail.com', NULL),
(10, 'Leila Konate', '0779301995', 11450000, '2023-03-29 17:37:19', 1234, 'Leilak@gmail.com', NULL),
(12, 'jean', '0140481291', 0, '2023-04-01 21:37:12', 1234, 'jean1@gmail.com', NULL),
(13, 'bryan', '0140481292', NULL, '2023-04-01 21:49:13', 1366, 'bryan@gmail.com', NULL),
(14, 'franck', '0140481296', NULL, '2023-04-06 10:27:10', 1234, 'franck@gmail.com', NULL),
(15, 'Franck ', '0140481278', 789000, '2023-04-06 11:06:45', 6953, 'boidyf1@student.iugb.edu.ci', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`trans_id`),
  ADD KEY `sender` (`sender`),
  ADD KEY `receiver` (`receiver`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `trans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `user` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
