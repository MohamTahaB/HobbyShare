-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : jeu. 24 fév. 2022 à 22:38
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `HobbyShare`
--

-- --------------------------------------------------------

--
-- Structure de la table `Amis`
--

CREATE TABLE `Amis` (
  `id_1` int(11) NOT NULL,
  `id_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Amis`
--

INSERT INTO `Amis` (`id_1`, `id_2`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ChatsGroupes`
--

CREATE TABLE `ChatsGroupes` (
  `id_groupe` int(11) NOT NULL,
  `id_message` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `envoyele` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ChatsGroupes`
--

INSERT INTO `ChatsGroupes` (`id_groupe`, `id_message`, `id_user`, `message`, `envoyele`) VALUES
(1, 1, 1, 'J\'aime les oranges', '2022-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `ChatsUtilisateurs`
--

CREATE TABLE `ChatsUtilisateurs` (
  `id_expediteur` int(11) NOT NULL,
  `message` text NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `envoyele` text NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ChatsUtilisateurs`
--

INSERT INTO `ChatsUtilisateurs` (`id_expediteur`, `message`, `id_destinataire`, `envoyele`, `id_message`) VALUES
(1, 'Yop', 2, '2022-01-01 00:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `FilActualiteAmis`
--

CREATE TABLE `FilActualiteAmis` (
  `id_publication` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `envoyele` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `FilActualiteAmis`
--

INSERT INTO `FilActualiteAmis` (`id_publication`, `id_user`, `message`, `envoyele`) VALUES
(1, 1, 'Bienvenue chez les chtis', '2022-01-01 00:00:00'),
(2, 2, 'Bienvenue chez les chtis', '2022-01-05 00:00:00'),
(3, 3, 'Bienvenue chez les chtis', '2022-01-02 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `FilActualiteGroupes`
--

CREATE TABLE `FilActualiteGroupes` (
  `id_groupe` int(11) NOT NULL,
  `id_publication` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text NOT NULL,
  `envoyele` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `FilActualiteGroupes`
--

INSERT INTO `FilActualiteGroupes` (`id_groupe`, `id_publication`, `id_user`, `message`, `envoyele`) VALUES
(1, 1, 1, 'Yo la team, j\'espère que vous allez bien, c\'est DiabloX9, on se retrouve pour une nouvelle vidéo !', '2022-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `Groupes`
--

CREATE TABLE `Groupes` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` text NOT NULL,
  `date_creation` text NOT NULL,
  `localisation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Groupes`
--

INSERT INTO `Groupes` (`id`, `nom`, `description`, `photo`, `date_creation`, `localisation`) VALUES
(1, 'Tennis', 'Si t\'aimes le tennis, viens tenniser avec nous.', 'https://www.lequipe.fr/_medias/img-photo-jpg/pierre-hugues-herbert-ce-mardi-a-l-open-13-de-marseille-f-porcu-l-equipe/1500000001607962/406:0,1738:1332-828-828-75/04a52', '2022-01-01', '48.7125006,2.200288'),
(2, 'Piscine', 'Si t\'aimes la piscine, viens pisciner avec nous', 'https://www.propiscines.fr/sites/default/files/trophees_2020/cat_particulier_or_aquilus_piscines_et_spas_valence_aquilus_groupe_0.jpg', '2022-01-01', '48.7125006,2.200288'),
(5, 'M', 'l', 'https://gge.fr/', '2022-02-24', '48.7125006,2.200288');

-- --------------------------------------------------------

--
-- Structure de la table `GroupesMutes`
--

CREATE TABLE `GroupesMutes` (
  `id_user` int(11) NOT NULL,
  `id_groupe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `GroupesUtilisateurs`
--

CREATE TABLE `GroupesUtilisateurs` (
  `id_groupe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `GroupesUtilisateurs`
--

INSERT INTO `GroupesUtilisateurs` (`id_groupe`, `id_user`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `InvitationsAmis`
--

CREATE TABLE `InvitationsAmis` (
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `InvitationsGroupes`
--

CREATE TABLE `InvitationsGroupes` (
  `id_groupe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `InvitationsGroupes`
--

INSERT INTO `InvitationsGroupes` (`id_groupe`, `id_user`) VALUES
(1, 2);

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
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `ModerateursParGroupe`
--

CREATE TABLE `ModerateursParGroupe` (
  `id_groupe` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ModerateursParGroupe`
--

INSERT INTO `ModerateursParGroupe` (`id_groupe`, `id_user`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateurs`
--

CREATE TABLE `Utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `photo` text NOT NULL,
  `description` text NOT NULL,
  `datedenaissance` text NOT NULL,
  `localisation` text NOT NULL,
  `derniereconnexion` text NOT NULL,
  `status` text NOT NULL,
  `mail` text NOT NULL,
  `password` text NOT NULL,
  `token` text NOT NULL,
  `date_inscription` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Utilisateurs`
--

INSERT INTO `Utilisateurs` (`id`, `nom`, `prenom`, `photo`, `description`, `datedenaissance`, `localisation`, `derniereconnexion`, `status`, `mail`, `password`, `token`, `date_inscription`) VALUES
(1, 'Marie', 'Macron', 'https://mobile-img.lpcdn.ca/lpca/924x/r3996/c4bd281d-0e6c-11eb-b8ad-02fe89184577.jpg', 'J\'aime bien les roses,\r\nLes âmes qui osent,\r\nJe suis une poète,\r\nJe réduis tout en miettes,\r\nDe mots.', '2000-01-01', '48.7125006,2.200288', '2022-01-01', 'En ligne', 'test@test.fr', 'azaz1212', 'eyJ0eXAiOiJKV1QiLCJhbGciOi', '2022-01-01'),
(2, 'Paul', 'Macron', 'https://fr.web.img4.acsta.net/r_1920_1080/newsv7/16/02/19/15/45/1575830.jpg', 'La vie est belle', '2000-01-01', '48.7125006,2.200288', '2022-01-01', 'En ligne', 'test@test.fr', 'azaz1212', 'eyJ0eXAiOiJKV1Q23DAqJhbGciOi', '2022-01-01'),
(3, 'Michel', 'Jan', 'https://googe.fr/', 'lo', '23/01/2012', '48.7125006,2.200288', '2022-02-24', '1', 'test@test.com', '$2y$10$Fn2awYt4583Hra8FZRsxBetw22.3RMyw3oFh2p6zfVU4WdVq65Asy', '1O7dYPQFdvZYLzFc5F6hzLebs8KuuyNN', '2022-02-24');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ChatsGroupes`
--
ALTER TABLE `ChatsGroupes`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `ChatsUtilisateurs`
--
ALTER TABLE `ChatsUtilisateurs`
  ADD PRIMARY KEY (`id_message`);

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `FilActualiteAmis`
--
ALTER TABLE `FilActualiteAmis`
  ADD PRIMARY KEY (`id_publication`);

--
-- Index pour la table `FilActualiteGroupes`
--
ALTER TABLE `FilActualiteGroupes`
  ADD PRIMARY KEY (`id_publication`);

--
-- Index pour la table `Groupes`
--
ALTER TABLE `Groupes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Index pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ChatsGroupes`
--
ALTER TABLE `ChatsGroupes`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `ChatsUtilisateurs`
--
ALTER TABLE `ChatsUtilisateurs`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `FilActualiteAmis`
--
ALTER TABLE `FilActualiteAmis`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `FilActualiteGroupes`
--
ALTER TABLE `FilActualiteGroupes`
  MODIFY `id_publication` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `Groupes`
--
ALTER TABLE `Groupes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Utilisateurs`
--
ALTER TABLE `Utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
