-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 23 avr. 2024 à 23:29
-- Version du serveur : 5.7.24
-- Version de PHP : 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `netflix`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`categoryID`, `name`) VALUES
(1, 'action'),
(3, 'comedy'),
(2, 'drama'),
(6, 'horror'),
(5, 'science fiction'),
(4, 'thriller');

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `movieID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `categoryID` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`movieID`, `title`, `description`, `categoryID`, `cover_image`, `video_link`) VALUES
(1, 'The Avengers', 'Earth\'s mightiest heroes must come together and learn to fight as a team if they are going to stop the mischievous Loki and his alien army from enslaving humanity.', 1, 'avengers.jpg', 'https://www.example.com/avengers_video_link'),
(2, 'Mad Max: Fury Road', 'In a post-apocalyptic wasteland, a woman rebels against a tyrannical ruler in search for her homeland with the aid of a group of female prisoners, a psychotic worshiper, and a drifter named Max.', 1, 'mad_max_fury_road.jpg', 'https://www.example.com/mad_max_fury_road_video_link'),
(3, 'The Hangover', 'Three buddies wake', 2, 'the_hangover.jpg', 'https://www.example.com/the_hangover_video_link'),
(4, 'Superbad', 'Two co-dependent high school seniors are forced to deal with separation anxiety after their plan to stage a booze-soaked party goes awry.', 2, 'superbad.jpg', 'https://www.example.com/superbad_video_link'),
(5, 'The Shawshank Redemption', 'Two imprisoned men bond over a number of years, finding solace and eventual redemption through acts of common decency.', 3, 'shawshank_redemption.jpg', 'https://www.example.com/shawshank_redemption_video_link'),
(6, 'Forrest Gump', 'The presidencies of Kennedy and Johnson, the Vietnam War, the Watergate scandal and other historical events unfold from the perspective of an Alabama man with an IQ of 75, whose only desire is to be reunited with his childhood sweetheart.', 3, 'forrest_gump.jpg', 'https://www.example.com/forrest_gump_video_link'),
(7, 'The Conjuring', 'Paranormal investigators Ed and Lorraine Warren work to help a family terrorized by a dark presence in their farmhouse.', 4, 'conjuring.jpg', 'https://www.example.com/conjuring_video_link'),
(8, 'A Nightmare on Elm Street', 'The monstrous spirit of a slain child murderer seeks revenge by invading the dreams of teenagers whose parents were responsible for his untimely death.', 4, 'nightmare_on_elm_street.jpg', 'https://www.example.com/nightmare_on_elm_street_video_link'),
(9, 'Inception', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', 5, 'inception.jpg', 'https://www.example.com/inception_video_link'),
(10, 'The Matrix', 'A computer hacker learns from mysterious rebels about the true nature of his reality and his role in the war against its controllers.', 5, 'matrix.jpg', 'https://www.example.com/matrix_video_link'),
(11, 'Se7en', 'Two detectives, a rookie and a veteran, hunt a serial killer who uses the seven deadly sins as his motives.', 6, 'se7en.jpg', 'https://www.example.com/se7en_video_link'),
(12, 'The Silence of the Lambs', 'A young F.B.I. cadet must receive the help of an incarcerated and manipulative cannibal killer to help catch another serial killer, a madman who skins his victims.', 6, 'silence_of_the_lambs.jpg', 'https://www.example.com/silence_of_the_lambs_video_link');

-- --------------------------------------------------------

--
-- Structure de la table `movie_ratings`
--

CREATE TABLE `movie_ratings` (
  `ratingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `movieID` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `series`
--

CREATE TABLE `series` (
  `seriesID` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text,
  `categoryID` int(11) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `series`
--

INSERT INTO `series` (`seriesID`, `title`, `description`, `categoryID`, `cover_image`, `video_link`) VALUES
(1, 'Breaking Bad', 'A high school chemistry teacher turned methamphetamine manufacturer partners with a former student to create and sell the purest methamphetamine on the market.', 1, 'https://i.ibb.co/wp28QfJ/trees-8458467-1280.jpg', 'https://www.example.com/breaking_bad_video_link'),
(2, 'Stranger Things', 'When a young boy disappears, his mother, a police chief, and his friends must confront terrifying supernatural forces in order to get him back.', 4, 'stranger_things.jpg', 'https://www.example.com/stranger_things_video_link'),
(3, 'Friends', 'Follows the personal and professional lives of six twenty to thirty-something-year-old friends living in Manhattan.', 2, 'friends.jpg', 'https://www.example.com/friends_video_link'),
(4, 'Game of Thrones', 'Nine noble families fight for control over the lands of Westeros, while an ancient enemy returns after being dormant for millennia.', 3, 'game_of_thrones.jpg', 'https://www.example.com/game_of_thrones_video_link'),
(5, 'The Walking Dead', 'Sheriff Deputy Rick Grimes wakes up from a coma to learn the world is in ruins and must lead a group of survivors to stay alive.', 4, 'walking_dead.jpg', 'https://www.example.com/walking_dead_video_link'),
(6, 'Black Mirror', 'An anthology series exploring a twisted, high-tech multiverse where humanity\'s greatest innovations and darkest instincts collide.', 5, 'black_mirror.jpg', 'https://www.example.com/black_mirror_video_link');

-- --------------------------------------------------------

--
-- Structure de la table `series_ratings`
--

CREATE TABLE `series_ratings` (
  `ratingID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `seriesID` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `series_ratings`
--

INSERT INTO `series_ratings` (`ratingID`, `userID`, `seriesID`, `rating`) VALUES
(1, 62, 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscriptionID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `subscriptions`
--

INSERT INTO `subscriptions` (`subscriptionID`, `name`, `duration`) VALUES
(4, '2 Jours', 2),
(5, '3 Jours', 3),
(6, '5 Jours', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `subscriptionID` int(11) DEFAULT NULL,
  `subscription_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userID`, `username`, `email`, `password`, `subscriptionID`, `subscription_date`) VALUES
(2, 'sdsd', 'faresadmiin@gmail.com', 'faressds', NULL, NULL),
(3, 'fares', 'faressssssadmiin@gmail.com', 'f29fda580bc914dca191b2098300d2dd', NULL, NULL),
(23, 'faress', 'test@gmail.com', 'fares', NULL, NULL),
(60, 'qsdqsd', 'faresadmiihhhhn@gmail.com', 'a', NULL, NULL),
(61, 'test1', 'test1@gmail.com', 'fares', 4, '2024-04-17'),
(62, 'test2', 'test2@gmail.com', '$2y$10$8ombH8CCp6RTE4AkFQ.2AeUqch4y0vSuQ6/JskFrCT9iGozcYqaBu', 4, '2024-04-23');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Index pour la table `movie_ratings`
--
ALTER TABLE `movie_ratings`
  ADD PRIMARY KEY (`ratingID`),
  ADD UNIQUE KEY `unique_movie_rating` (`userID`,`movieID`),
  ADD KEY `fk_movie_rating_movie` (`movieID`);

--
-- Index pour la table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`seriesID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Index pour la table `series_ratings`
--
ALTER TABLE `series_ratings`
  ADD PRIMARY KEY (`ratingID`),
  ADD UNIQUE KEY `unique_series_rating` (`userID`,`seriesID`),
  ADD KEY `fk_series_rating_series` (`seriesID`);

--
-- Index pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscriptionID`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_ibfk_2` (`subscriptionID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `movie_ratings`
--
ALTER TABLE `movie_ratings`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `series`
--
ALTER TABLE `series`
  MODIFY `seriesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `series_ratings`
--
ALTER TABLE `series_ratings`
  MODIFY `ratingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscriptionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `movies`
--
ALTER TABLE `movies`
  ADD CONSTRAINT `movies_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);

--
-- Contraintes pour la table `movie_ratings`
--
ALTER TABLE `movie_ratings`
  ADD CONSTRAINT `fk_movie_rating_movie` FOREIGN KEY (`movieID`) REFERENCES `movies` (`movieID`),
  ADD CONSTRAINT `fk_movie_rating_user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `series`
--
ALTER TABLE `series`
  ADD CONSTRAINT `series_ibfk_1` FOREIGN KEY (`categoryID`) REFERENCES `categories` (`categoryID`);

--
-- Contraintes pour la table `series_ratings`
--
ALTER TABLE `series_ratings`
  ADD CONSTRAINT `fk_series_rating_series` FOREIGN KEY (`seriesID`) REFERENCES `series` (`seriesID`),
  ADD CONSTRAINT `fk_series_rating_user` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);

--
-- Contraintes pour la table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`subscriptionID`) REFERENCES `subscriptions` (`subscriptionID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
