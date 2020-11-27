-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : lun. 23 nov. 2020 à 22:28
-- Version du serveur :  8.0.22-0ubuntu0.20.04.2
-- Version de PHP : 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetrss`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$/tJIvwbnI8ipoidjLv96Wuh0tjRsBPytUi42ceqEbqVWlTfjxaOZm');

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `datepubli` datetime NOT NULL,
  `site` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `titre` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idSource` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `datepubli`, `site`, `titre`, `description`, `idSource`) VALUES
(46, '2020-11-23 12:51:34', 'https://www.lemonde.fr/planete/article/2020/11/23/la-on-se-dit-qu-on-est-vraiment-touches-la-lozere-s-interroge-sur-une-deuxieme-vague-tres-virulente-de-covid-19_6060802_3244.html', '« Là, on se dit qu’on est vraiment touchés » : la Lozère s’interroge sur une deuxième vague très virulente de Covid-19', 'Epargné par la première vague de Covid-19, le département le moins peuplé de France affiche désormais une incidence élevée.', 1),
(44, '2020-11-23 18:21:44', 'https://www.lemonde.fr/pixels/article/2020/11/23/un-nouveau-rapport-pointe-la-persistance-des-groupes-neonazis-sur-facebook-et-instagram_6060836_4408996.html', 'Un nouveau rapport pointe la persistance des groupes néonazis sur Facebook et Instagram', 'Sur ces réseaux sociaux, des boutiques ayant parfois des liens avec des groupuscules violents ou paramilitaires font la promotion de vêtements et d’accessoires qui reprennent l’imagerie néonazie.', 1),
(45, '2020-11-23 03:25:06', 'https://www.lemonde.fr/politique/article/2020/11/23/covid-19-emmanuel-macron-va-annoncer-un-allegement-des-contraintes-du-confinement_6060747_823448.html', 'Covid-19 : Emmanuel Macron devrait annoncer un « allégement des contraintes » dues au confinement', 'Lors de son allocution, mardi soir, le président de la République présentera la stratégie sanitaire de la France pour les mois à venir.', 1),
(42, '2020-11-23 17:34:39', 'https://www.lemonde.fr/international/article/2020/11/23/les-memoires-de-barack-obama-ou-le-v-u-d-une-autre-amerique_6060828_3210.html', '« Une terre promise »: les mémoires de Barack Obama ou le vœu d’une autre Amérique', 'Dans ses mémoires (publiés chez Fayard), l’ancien président américain revient sur ses débuts en politique à la fin des années 1990, et sur ses premières années à la Maison Blanche, entre souvenirs familiaux et complexité de l’exercice du pouvoir.', 1),
(43, '2020-11-23 14:02:03', 'https://www.lemonde.fr/international/article/2020/11/23/visite-secrete-de-netanyahou-en-arabie-saoudite_6060809_3210.html', 'Benyamin Nétanyahou en Arabie saoudite : le flou règne sur la visite secrète du premier ministre israélien', 'Selon des médias israéliens, le premier ministre se serait rendu en Arabie saoudite dimanche, où il aurait rencontré le prince héritier, Mohammed Ben Salman. Riyad dément.', 1),
(41, '2020-11-23 12:37:01', 'https://www.lemonde.fr/idees/article/2020/11/23/combattre-le-tabou-de-l-inceste_6060801_3232.html', 'Combattre le tabou de l’inceste', 'Editorial. Si, en matière de violences sexuelles, la société évolue, grâce notamment à la mobilisation des mouvements féministes, s’agissant de l’inceste, un puissant frein demeure : le secret familial.', 1),
(40, '2020-11-23 02:44:18', 'https://www.lemonde.fr/idees/article/2020/11/23/fabien-truong-le-drame-de-conflans-sainte-honorine-nous-rappelle-qu-une-salle-de-classe-n-est-pas-une-arene-politique-publique_6060745_3232.html', 'Fabien Truong : « Le drame de Conflans-Sainte-Honorine nous rappelle qu’une salle de classe n’est pas une arène politique publique »', 'Dans un entretien au « Monde », le sociologue Fabien Truong, auteur d’enquêtes ethnographiques sur la jeunesse des quartiers populaires, explique les ressorts du passage de la délinquance à l’attentat terroriste.', 1),
(39, '2020-11-23 18:00:10', 'https://www.lemonde.fr/international/article/2020/11/23/haut-karabakh-les-azerbaidjanais-s-inquietent-du-retour-des-russes_6060830_3210.html', 'Haut-Karabakh : les Azerbaïdjanais s’inquiètent du retour des Russes', 'Le déploiement de 2 000 soldats russes le 10 novembre a stoppé la reconquête militaire de l’enclave disputée, gelant le conflit.', 1),
(37, '2020-11-23 04:54:51', 'https://www.lemonde.fr/planete/article/2020/11/23/coronavirus-dans-le-monde-toronto-confinee-pour-au-mois-vingt-huit-jours_6060749_3244.html', 'Vaccin AstraZeneca, déconfinement au Royaume-Uni : le point sur l’épidémie de Covid-19 dans le monde', 'Les espoirs de campagnes de vaccination massives contre le Covid-19 ont été confortés par l’annonce du laboratoire britannique, tandis que le premier ministre, Boris Johnson, annonçait son plan de déconfinement.', 1),
(38, '2020-11-23 19:43:37', 'https://www.lemonde.fr/societe/article/2020/11/23/comme-un-animal-qui-cherche-a-fuir-son-predateur-l-attentat-du-thalys-raconte-par-les-passagers_6060844_3224.html', '« Comme un animal qui cherche à fuir son prédateur » : l’attentat du Thalys raconté par les passagers', 'Au sixième jour du procès, la cour a procédé, lundi, aux dernières auditions des passagers qui se sont portées parties civiles. Du comédien Jean-Hugues Anglade au soldat américain Aleksander Skarlatos, chacun a livré sa part du récit de l’attaque.', 1),
(47, '2020-11-23 20:26:54', 'https://www.lemonde.fr/international/article/2020/11/23/boris-johnson-presente-son-plan-de-sortie-du-confinement-nous-voyons-la-lumiere-au-bout-du-tunnel_6060847_3210.html', 'Boris Johnson présente son plan de sortie du confinement : « Nous voyons la lumière au bout du tunnel »', 'Devant les députés, le premier ministre britannique a détaillé son « plan d’hiver » pour sortir du confinement à partir du 2 décembre, et revenir à un système de semi-confinements régionaux.', 1),
(48, '2020-11-23 17:12:47', 'https://www.lemonde.fr/police-justice/article/2020/11/23/faux-depart-au-proces-pour-corruption-de-nicolas-sarkozy_6060822_1653578.html', 'Nicolas Sarkozy jugé dans l’affaire des écoutes : le procès renvoyé au jeudi 26 novembre', 'L’audience a été suspendue jusqu’à jeudi. L’avocat de l’ancien magistrat Gilbert Azibert, qui figure parmi les co-accusés avec l’avocat Thierry Herzog, a demandé le renvoi du procès en raison de l’état de santé de son client.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE `parametre` (
  `id` int NOT NULL,
  `nom` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `valeur` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `parametre`
--

INSERT INTO `parametre` (`id`, `nom`, `valeur`) VALUES
(1, 'nbelem', 12);

-- --------------------------------------------------------

--
-- Structure de la table `source`
--

CREATE TABLE `source` (
  `id` int NOT NULL,
  `nom` varchar(30) NOT NULL,
  `lien` varchar(255) NOT NULL
);

--
-- Déchargement des données de la table `source`
--

INSERT INTO `source` (`id`, `nom`, `lien`) VALUES
(0, 'Inconnu', 'Unknown'),
(1, 'LeMonde Une', 'https://www.lemonde.fr/rss/une.xml'),
(2, 'LeMonde Mondiale', 'https://www.lemonde.fr/international/rss_full.xml'),
(3, 'LeMonde JeuVideo', 'https://www.lemonde.fr/jeux-video/rss_full.xml'),
(4, 'LeMonde Musique', 'https://www.lemonde.fr/musiques/rss_full.xml');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `parametre`
--
ALTER TABLE `parametre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `parametre`
--
ALTER TABLE `parametre`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `source`
--
ALTER TABLE `source`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
