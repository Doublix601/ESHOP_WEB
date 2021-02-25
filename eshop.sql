-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 22 fév. 2021 à 09:01
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `eshop`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(13, 'T-shirt'),
(14, 'Sweat'),
(15, 'Polo'),
(16, 'Pantalon');

-- --------------------------------------------------------

--
-- Structure de la table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `siren` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_tva` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` int(11) NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `delivery_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `delivery`
--

INSERT INTO `delivery` (`id`, `type`, `price`, `delivery_time`) VALUES
(10, 'Standard', 5, 4),
(11, 'Rapide', 9.99, 2),
(12, 'Livraison en 1 jour', 15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `date` date NOT NULL,
  `client` int(11) NOT NULL,
  `products` int(11) NOT NULL,
  `ht` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `ecotax` int(11) NOT NULL,
  `delivery_price` int(11) NOT NULL,
  `ttc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `date` date NOT NULL,
  `client` int(11) NOT NULL,
  `products` int(11) NOT NULL,
  `ht` int(11) NOT NULL,
  `tva` int(11) NOT NULL,
  `ecotax` int(11) NOT NULL,
  `delivery_price` int(11) NOT NULL,
  `ttc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `nb_ventes` int(11) NOT NULL,
  `label` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ht_price` double NOT NULL,
  `description` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tva` int(11) NOT NULL,
  `ecotax` double NOT NULL,
  `delivery_option` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ttc_price` double NOT NULL,
  `description_courte` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `category_id`, `nb_ventes`, `label`, `brand`, `ht_price`, `description`, `tva`, `ecotax`, `delivery_option`, `delivery_price`, `discount`, `stock`, `img`, `ttc_price`, `description_courte`) VALUES
(1, NULL, 55, 'product 0', 'Marque de test', 60, 'Ceci est la description du produit n°0. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 11, 'assets/img/site/404_products.png', 68, 'Ceci est la description courte du produit n°0'),
(2, NULL, 30, 'product 1', 'Marque de test', 29, 'Ceci est la description du produit n°1. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 1, 'assets/img/site/404_products.png', 64, 'Ceci est la description courte du produit n°1'),
(3, NULL, 41, 'product 2', 'Marque de test', 32, 'Ceci est la description du produit n°2. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 8, 'assets/img/site/404_products.png', 78, 'Ceci est la description courte du produit n°2'),
(4, NULL, 62, 'product 3', 'Marque de test', 15, 'Ceci est la description du produit n°3. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 7, 'assets/img/site/404_products.png', 93, 'Ceci est la description courte du produit n°3'),
(5, NULL, 76, 'product 4', 'Marque de test', 78, 'Ceci est la description du produit n°4. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 16, 'assets/img/site/404_products.png', 61, 'Ceci est la description courte du produit n°4'),
(6, NULL, 55, 'product 5', 'Marque de test', 41, 'Ceci est la description du produit n°5. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 12, 'assets/img/site/404_products.png', 27, 'Ceci est la description courte du produit n°5'),
(7, NULL, 21, 'product 6', 'Marque de test', 85, 'Ceci est la description du produit n°6. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 7, 'assets/img/site/404_products.png', 94, 'Ceci est la description courte du produit n°6'),
(8, NULL, 97, 'product 7', 'Marque de test', 97, 'Ceci est la description du produit n°7. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 1, 'assets/img/site/404_products.png', 74, 'Ceci est la description courte du produit n°7'),
(9, NULL, 47, 'product 8', 'Marque de test', 72, 'Ceci est la description du produit n°8. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 13, 'assets/img/site/404_products.png', 81, 'Ceci est la description courte du produit n°8'),
(10, NULL, 46, 'product 9', 'Marque de test', 95, 'Ceci est la description du produit n°9. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 3, 'assets/img/site/404_products.png', 90, 'Ceci est la description courte du produit n°9'),
(11, NULL, 40, 'product 10', 'Marque de test', 18, 'Ceci est la description du produit n°10. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 11, 'assets/img/site/404_products.png', 43, 'Ceci est la description courte du produit n°10'),
(12, NULL, 95, 'product 11', 'Marque de test', 17, 'Ceci est la description du produit n°11. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 18, 'assets/img/site/404_products.png', 96, 'Ceci est la description courte du produit n°11'),
(13, NULL, 70, 'product 12', 'Marque de test', 27, 'Ceci est la description du produit n°12. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 1, 'assets/img/site/404_products.png', 22, 'Ceci est la description courte du produit n°12'),
(14, NULL, 73, 'product 13', 'Marque de test', 74, 'Ceci est la description du produit n°13. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 16, 'assets/img/site/404_products.png', 44, 'Ceci est la description courte du produit n°13'),
(15, NULL, 21, 'product 14', 'Marque de test', 82, 'Ceci est la description du produit n°14. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 5, 'assets/img/site/404_products.png', 61, 'Ceci est la description courte du produit n°14'),
(16, NULL, 48, 'product 15', 'Marque de test', 25, 'Ceci est la description du produit n°15. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 11, 'assets/img/site/404_products.png', 24, 'Ceci est la description courte du produit n°15'),
(17, NULL, 50, 'product 16', 'Marque de test', 82, 'Ceci est la description du produit n°16. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 13, 'assets/img/site/404_products.png', 57, 'Ceci est la description courte du produit n°16'),
(18, NULL, 76, 'product 17', 'Marque de test', 83, 'Ceci est la description du produit n°17. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 18, 'assets/img/site/404_products.png', 52, 'Ceci est la description courte du produit n°17'),
(19, NULL, 76, 'product 18', 'Marque de test', 38, 'Ceci est la description du produit n°18. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 14, 'assets/img/site/404_products.png', 50, 'Ceci est la description courte du produit n°18'),
(20, NULL, 61, 'product 19', 'Marque de test', 94, 'Ceci est la description du produit n°19. Plus tard il y aura une description réelle du produit vendu dans le shop.', 20, 0, 'Standard', 5, 0, 13, 'assets/img/site/404_products.png', 69, 'Ceci est la description courte du produit n°19');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cp` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `mail_confirmation` varchar(180) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pass_confirmation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `adress`, `cp`, `city`, `country`, `first_name`, `last_name`, `active`, `mail_confirmation`, `pass_confirmation`) VALUES
(83, 'Renee.Bednar@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$OXJSVG40RlJ4U2E1Mk5LWQ$JfvTbThOSyp1YZ/+ygIdSC7XCv/bcgprbdXr/NvfQEA', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Renee', 'Bednar', 1, NULL, NULL),
(84, 'Isabel.Walker@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$RGZWYWVwcGVDNGRUUm1aRg$QlUfPaz2OYHBietbIYKVoXleJ5oSG8pJEl0MQ0It/ZY', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Isabel', 'Walker', 1, NULL, NULL),
(85, 'Imogene.Tremblay@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$L0FxS080LnJMYmhrM1hldA$zU1ptDgErkmC/TrLHXMY4S5aMK4L2gxuwgTWY17CSUo', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Imogene', 'Tremblay', 1, NULL, NULL),
(86, 'Frances.Abbott@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$VDBza055SGtDMUZkVTNqeQ$+q5SCg6C5OkFXi18RlpcM7E1X04pQdgS+Yg8CFL6xKA', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Frances', 'Abbott', 1, NULL, NULL),
(87, 'Ricardo.Batz@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$ZWcyRTIuanVyZlFEQ3FsZw$1ZFZLTSlw+cAeQ/A0KCZ3kCrvY3ahaK/Q6y8wXvZeDs', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Ricardo', 'Batz', 1, NULL, NULL),
(88, 'Cary.Stokes@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$TkdvcXcyaWIxb3VsdmlvaA$SVx7qQ09S24ZtyzmPcJ1k+btjbkxxilJSaGm4Rm0NPg', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Cary', 'Stokes', 1, NULL, NULL),
(89, 'Minerva.Kohler@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$V3JZTEI0Q1kvRjh6YlhIWA$rruYYF09GrSKS6VECXjbYqe7yq5TYyyWwx3RzUGo2YU', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Minerva', 'Kohler', 1, NULL, NULL),
(90, 'Simeon.Kreiger@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$dlppZzU1TlVJYTFvcmJUUg$YkO9rBw1k3W/3RAKcK3nYX+BxQ8m8pPtSEDpHl0R/wE', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Simeon', 'Kreiger', 1, NULL, NULL),
(91, 'Rashawn.Schumm@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$MmhGYW9mZXZ0cnJrUFNxeg$pbhgrOrnRXK6FdbU2yUSxg662lzZCTroJQIJDVztCpQ', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Rashawn', 'Schumm', 1, NULL, NULL),
(92, 'Macie.Berge@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$dUtLeXhhVy9Fak5QRERlcw$SvQFUam64MUUJxi3hl09PVt7QeoCVwPyZNFBtpdU5qs', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Macie', 'Berge', 1, NULL, NULL),
(93, 'Anissa.Daniel@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$RUxiSS5Lb3hXTllteW1vaQ$Hp+6Q6d0b8LzuBwVxEMtHIcvOBALojVhGgXtpd2z1e4', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Anissa', 'Daniel', 1, NULL, NULL),
(94, 'Demond.O\'Connell@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$Yk5VTERCM3V0eXFaV1dyMQ$btZyM/i78Zkxg9RsVNcHJ2dN6cXu9x17zJ1tbW9tqZw', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Demond', 'O\'Connell', 1, NULL, NULL),
(95, 'Tamara.Pagac@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$SllzVFBjdlkyZERyN3p0ZA$NJPukZCZ+wu5uaCQOSD9Ir2GrqA0e7V1aA36awVN914', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Tamara', 'Pagac', 1, NULL, NULL),
(96, 'Trey.Legros@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$OHVoTFpqS2p2UHc4Q1MyVw$JvPnbF0c/swS49zmoRvm2VlA1L/bhn5EwK5EyY0Dh4s', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Trey', 'Legros', 1, NULL, NULL),
(97, 'Jaren.Dietrich@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$VzZhOFFTUlUuUTdyY2JGTg$1DaTBwDdgqGYPSeZNsg6vvVWh9wwB4OCbDtkM0ILF6E', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Jaren', 'Dietrich', 1, NULL, NULL),
(98, 'Adolfo.Goyette@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$anlMY096UUVmc096OEtJbQ$THcyVbtJm2YS9imnbrZIbtXdg6byC99rnCBJUABleQw', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Adolfo', 'Goyette', 1, NULL, NULL),
(99, 'Audra.Mills@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$TFhBd2Z2M0pjd21HNWwucg$B59b+KX8z8kAw0KvUSUa28UewVcVGbQtQgQCFuMf8v8', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Audra', 'Mills', 1, NULL, NULL),
(100, 'Cara.Gerlach@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$SC42M05RRGZNVEhJOWx5bg$SP6itJZVtWcyEOdlrmIklOhPWb1+SqKN4Cp5dLzWOP0', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Cara', 'Gerlach', 1, NULL, NULL),
(101, 'Thaddeus.Jerde@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$cHZkaGM2M1ZFdmNSMC5kLg$5PivI2l8CrzYK6FtqDLH596kTI20jqwfDin9b9WFipQ', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Thaddeus', 'Jerde', 1, NULL, NULL),
(102, 'Lambert.Metz@gmail.com', '[\"ROLE_USER\"]', '$argon2id$v=19$m=65536,t=4,p=1$QXVlZldLOHlhTWkxMC9ENQ$Xu9EYCB6q4H7/JToKdGHKUpFh9tV3kC7vfuOy51CmqY', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Lambert', 'Metz', 1, NULL, NULL),
(103, 'arnaud.doublix@gmail.com', '[\"ROLE_ADMIN\"]', '$argon2id$v=19$m=65536,t=4,p=1$dGJtS3FZTmFGTktpb3FJWA$NVgt8jDR4NDDfvt2G4+wjUZJy8ZvWMmgnwSWXGkaGUA', '39 rue de la fontaine Saint Martin', '60350', 'Attichy', 'France', 'Arnaud', 'THERET', 1, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D34A04AD12469DE2` (`category_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_D34A04AD12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
