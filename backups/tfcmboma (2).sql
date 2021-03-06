-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Sam 08 Juin 2019 à 22:25
-- Version du serveur :  5.7.26-0ubuntu0.18.04.1
-- Version de PHP :  7.2.17-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tfcmboma`
--

-- --------------------------------------------------------

--
-- Structure de la table `controles_documents`
--

CREATE TABLE `controles_documents` (
  `idcontroles_documents` int(10) UNSIGNED NOT NULL,
  `idprofesseurs` int(10) UNSIGNED NOT NULL,
  `idconseillers` int(10) UNSIGNED NOT NULL,
  `remarques` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `controles_documents`
--

INSERT INTO `controles_documents` (`idcontroles_documents`, `idprofesseurs`, `idconseillers`, `remarques`, `created_at`, `updated_at`) VALUES
(5, 3, 1, 'ceci est test', '2019-06-08 15:50:31', '2019-06-08 15:50:31');

-- --------------------------------------------------------

--
-- Structure de la table `cotations_documents`
--

CREATE TABLE `cotations_documents` (
  `idcotations_documents` int(10) UNSIGNED NOT NULL,
  `idcontroles_documents` int(10) UNSIGNED NOT NULL,
  `idponderations_documents` int(10) UNSIGNED NOT NULL,
  `cote` int(11) NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `cotations_documents`
--

INSERT INTO `cotations_documents` (`idcotations_documents`, `idcontroles_documents`, `idponderations_documents`, `cote`, `updated_at`, `created_at`) VALUES
(39, 5, 1, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(40, 5, 2, 8, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(41, 5, 3, 4, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(42, 5, 4, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(43, 5, 5, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(44, 5, 6, 4, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(45, 5, 7, 3, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(46, 5, 8, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(47, 5, 9, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(48, 5, 10, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(49, 5, 11, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(50, 5, 12, 5, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(51, 5, 13, 4, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(52, 5, 14, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(53, 5, 15, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(54, 5, 16, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(55, 5, 17, 8, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(56, 5, 18, 4, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(57, 5, 19, 3, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(58, 5, 20, 2, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(59, 5, 21, 7, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(60, 5, 22, 5, '2019-06-08 17:50:31', '2019-06-08 17:50:31'),
(61, 5, 23, 4, '2019-06-08 17:50:31', '2019-06-08 17:50:31');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_06_05_001043_create_all_tables', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ponderations_documents`
--

CREATE TABLE `ponderations_documents` (
  `idponderations_documents` int(10) UNSIGNED NOT NULL,
  `lib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentaire` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `max` int(11) NOT NULL,
  `idtypes_documents` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `ponderations_documents`
--

INSERT INTO `ponderations_documents` (`idponderations_documents`, `lib`, `commentaire`, `max`, `idtypes_documents`, `slug`) VALUES
(1, 'Existence', NULL, 2, 1, 'journal-de-classe-existence'),
(2, 'Conformité', 'toutes les rubriques sont remplies avec précision:matière,sujet,réf,n°fiche', 10, 1, 'journal-de-classe-conformite'),
(3, 'Tâche', 'précision,qualité,date', 5, 1, 'journal-de-classe-tache'),
(4, 'Présentation & régularité + Soin', NULL, 3, 1, 'journal-de-classe-presentation-regularite-soin'),
(5, 'Existence', 'Fiche ou cahier de préparation', 2, 2, 'fiche-de-preparation-existence'),
(6, 'La fiche du jour : Conformité', 'étapes,méthode+procédure,etc', 6, 2, 'fiche-de-preparation-la-fiche-du-jour-conformite'),
(7, 'Régularité et actualisation', NULL, 3, 2, 'fiche-de-preparation-regularite-et-actualisation'),
(8, 'Niveau de préparation approfondie ou supeficielle', NULL, 5, 2, 'fiche-de-preparation-niveau-de-preparation-approfondie-ou-supeficielle'),
(9, 'Présentation + soin', NULL, 2, 2, 'fiche-de-preparation-presentation-soin'),
(10, 'Réf/Livre de base utilisé', NULL, 2, 2, 'fiche-de-preparation-reflivre-de-base-utilise'),
(11, 'Existence', 'Respect du programme national', 2, 3, 'prevision-des-matiere-existence'),
(12, 'Conformité', 'connaissance + respect du programme,des rubriques officielles + répartition etc', 6, 3, 'prevision-des-matiere-conformite'),
(13, 'Progression', 'à jour, en avance, en retard par rapport aux matières prévues,actualisation + rapports hebdomadaires etc.', 6, 3, 'prevision-des-matiere-progression'),
(14, 'Adaptation au milieu', NULL, 3, 3, 'prevision-des-matiere-adaptation-au-milieu'),
(15, 'Présentation + soin', NULL, 3, 3, 'prevision-des-matiere-presentation-soin'),
(16, 'Existence', NULL, 2, 4, 'cahier-des-questions-existence'),
(17, 'Conformité', 'Niveau ou classe,date numéro,questions et corrigés prévus,pondération, etc', 10, 4, 'cahier-des-questions-conformite'),
(18, 'Qualité + quantité des questions ', NULL, 5, 4, 'cahier-des-questions-qualite-quantite-des-questions'),
(19, 'Présentation + soin', NULL, 3, 4, 'cahier-des-questions-presentation-soin'),
(20, 'Existence', NULL, 2, 5, 'cahier-des-cotes-existence'),
(21, 'Indication', 'la classe, la date, la nature et l\'objet de l\'interro,maximum sont-ils indiqués', 8, 5, 'cahier-des-cotes-indication'),
(22, 'Fréquence des travaux et interro & devoir', NULL, 6, 5, 'cahier-des-cotes-frequence-des-travaux-et-interro-devoir'),
(23, 'Présentation', 'sans rature ni surcharges bic ou crayon', 4, 5, 'cahier-des-cotes-presentation');

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE `professeurs` (
  `idprofesseurs` int(10) UNSIGNED NOT NULL,
  `idsecope` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postnom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribution` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anciennete` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` enum('conseiller','professeur','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `professeurs`
--

INSERT INTO `professeurs` (`idprofesseurs`, `idsecope`, `nom`, `postnom`, `prenom`, `qualification`, `attribution`, `anciennete`, `pseudo`, `password`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '122222', 'Dialundama', 'Krisa', 'Peniel BIL', 'Prof', 'XXXX', 2, 'bilwifi', '$2y$10$FXHR6JC3.aJzTvGE8prLROZA1S5fmPjAVRH8t4BoA/jT0GA1BjWn6', 'admin', NULL, NULL, '2019-06-05 16:06:15'),
(3, '12222222', 'Prof1', 'Krisa', 'Peniel', 'Prof', 'aa', 2, 'prof', '$2y$10$FXHR6JC3.aJzTvGE8prLROZA1S5fmPjAVRH8t4BoA/jT0GA1BjWn6', 'professeur', NULL, NULL, '2019-06-08 18:40:44'),
(4, '200000', 'Nom Prof Test', 'PostNom Prof Test', 'PreNom Prof Test', 'Qualification Prof Test', 'Attribution Prof Test', 3, 'nom-prof-test', '$2y$10$1Bx3HiSYC7xZt1sBZzBWw.QzN6TCvyD/9HsZL8lzrraZikSqxZg9q', 'professeur', NULL, '2019-06-08 03:46:32', '2019-06-08 03:46:32');

-- --------------------------------------------------------

--
-- Structure de la table `types_documents`
--

CREATE TABLE `types_documents` (
  `idtypes_documents` int(10) UNSIGNED NOT NULL,
  `lib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Contenu de la table `types_documents`
--

INSERT INTO `types_documents` (`idtypes_documents`, `lib`) VALUES
(1, 'Journal de classe'),
(2, 'Fiche de préparation'),
(3, 'Prévision des Matière'),
(4, 'Cahier des questions'),
(5, 'Cahier des cotes');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `controles_documents`
--
ALTER TABLE `controles_documents`
  ADD PRIMARY KEY (`idcontroles_documents`),
  ADD KEY `controles_documents_idprofesseurs_foreign` (`idprofesseurs`),
  ADD KEY `controles_documents_idconseillers_foreign` (`idconseillers`);

--
-- Index pour la table `cotations_documents`
--
ALTER TABLE `cotations_documents`
  ADD PRIMARY KEY (`idcotations_documents`),
  ADD KEY `cotations_documents_idcontroles_documents_foreign` (`idcontroles_documents`),
  ADD KEY `cotations_documents_idponderations_documents_foreign` (`idponderations_documents`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ponderations_documents`
--
ALTER TABLE `ponderations_documents`
  ADD PRIMARY KEY (`idponderations_documents`),
  ADD KEY `ponderations_documents_idtypes_documents_foreign` (`idtypes_documents`);

--
-- Index pour la table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`idprofesseurs`),
  ADD UNIQUE KEY `professeurs_idscope_unique` (`idsecope`),
  ADD UNIQUE KEY `professeurs_pseudo_unique` (`pseudo`);

--
-- Index pour la table `types_documents`
--
ALTER TABLE `types_documents`
  ADD PRIMARY KEY (`idtypes_documents`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `controles_documents`
--
ALTER TABLE `controles_documents`
  MODIFY `idcontroles_documents` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `cotations_documents`
--
ALTER TABLE `cotations_documents`
  MODIFY `idcotations_documents` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `ponderations_documents`
--
ALTER TABLE `ponderations_documents`
  MODIFY `idponderations_documents` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `professeurs`
--
ALTER TABLE `professeurs`
  MODIFY `idprofesseurs` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `types_documents`
--
ALTER TABLE `types_documents`
  MODIFY `idtypes_documents` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `controles_documents`
--
ALTER TABLE `controles_documents`
  ADD CONSTRAINT `controles_documents_idconseillers_foreign` FOREIGN KEY (`idconseillers`) REFERENCES `professeurs` (`idprofesseurs`),
  ADD CONSTRAINT `controles_documents_idprofesseurs_foreign` FOREIGN KEY (`idprofesseurs`) REFERENCES `professeurs` (`idprofesseurs`);

--
-- Contraintes pour la table `cotations_documents`
--
ALTER TABLE `cotations_documents`
  ADD CONSTRAINT `cotations_documents_idcontroles_documents_foreign` FOREIGN KEY (`idcontroles_documents`) REFERENCES `controles_documents` (`idcontroles_documents`) ON DELETE CASCADE,
  ADD CONSTRAINT `cotations_documents_idponderations_documents_foreign` FOREIGN KEY (`idponderations_documents`) REFERENCES `ponderations_documents` (`idponderations_documents`) ON DELETE CASCADE;

--
-- Contraintes pour la table `ponderations_documents`
--
ALTER TABLE `ponderations_documents`
  ADD CONSTRAINT `ponderations_documents_idtypes_documents_foreign` FOREIGN KEY (`idtypes_documents`) REFERENCES `types_documents` (`idtypes_documents`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
