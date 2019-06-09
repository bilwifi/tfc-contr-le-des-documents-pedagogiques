---NOTICE

---APRES LA CREATION DE VOTRE BASE DE DONNEES ET LACONFIGURATION DE VOTRE FICHIER .ENV SELON
---VOS VARIABLES D'ENVIRONNEMENTS; VEILLEZ SUIVRE LES ÉTAPES SUIVANTES :

---1. Executer dans votre console PHP : php artisan migrate
---2. COPIER LES CODES SQL CI-DESSOUS DANS VOTRE CONSOLE DE LA BASE DE DONNÉES
---3. SE CONNECTER À L'INTERFACE D'ADMNISTRATION AVEC pseudo = 'admin' et mot de passe = 'azerty'

-------------------------------------------------------------------------------------------------------
---
--- NE MODIFIER QUE LE NomAdmin,PostnomAdmin, PrenomAdmin
--- POUR PERSONNALISÉ L'IDENTITE DE L'ADMINISTATEUR 
--- COPIER A PARTIR D'ICI
---

INSERT INTO `professeurs` (`idprofesseurs`, `idsecope`, `nom`, `postnom`, `prenom`, `qualification`, `attribution`, `anciennete`, `pseudo`, `password`, `user_role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '000000', 'NomAdmin', 'PostnomAdmin', 'PrenomAdmin ', 'Conseiller', 'Conseiller', 0, 'admin', '$2y$10$FXHR6JC3.aJzTvGE8prLROZA1S5fmPjAVRH8t4BoA/jT0GA1BjWn6', 'admin', NULL, NULL, NOW());


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




-----------------------------------------------------------------------------------------------------------------
---------------------------------------------- FIN --------------------------------------------------------------
---
--- CONTROLE DES DOCUMENTS DES PROFESSEURS
---	BY BIL WiFi 
--- JUIN 2019
---
----
------------------------