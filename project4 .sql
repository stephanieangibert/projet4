-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 11 nov. 2019 à 15:19
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project4`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` text NOT NULL,
  `comment` text NOT NULL,
  `comment_date` date NOT NULL,
  `reporting` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `comment_date`, `reporting`) VALUES
(28, 11, 'Stéphanie', 'ca marche', '2019-11-10', 1),
(31, 11, 'Stéphanie', 'J\'aime ce chapitre', '2019-11-11', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `creation_date`) VALUES
(11, 'Mon 2ème chapitre', '<p style=\"text-align: center;\"><span style=\"color: #333333; font-family: Arial, Helvetica, sans-serif;\">J\'ai ainsi v&eacute;cu seul, sans personne avec qui parler \'v&eacute;ritablement, jusqu\'&agrave; une panne dans le d&eacute;sert du Sahara, il y a six ans. Quelque chose s\'&eacute;tait cass&eacute;e dans mon moteur. Et comme je n\'avais avec moi ni m&eacute;canicien, ni passagers, je me pr&eacute;parai &agrave; essayer de r&eacute;ussir, tout seul, une r&eacute;paration difficile. C\'&eacute;tait pour moi une question de vie ou de mort. J\'avais &agrave; peine de l\'eau &agrave; boire pour huit jours,Le premier soir je me suis donc endormi sur le sable &agrave; mille milles de toute terre habit&eacute;e. J\'&eacute;tais bien plus isol&eacute; qu\'un naufrag&eacute; sur un radeau au milieu de l\'Oc&eacute;an. Alors vous imaginez ma surprise, au lever du jour, quand une dr&ocirc;le de petite voix m\'a r&eacute;veill&eacute;. Elle disait :- S\'il vous pla&icirc;t... dessine-moi un mouton !- Dessine-moi un mouton...J\'ai saut&eacute; sur mes pieds comme si j\'avais &eacute;t&eacute; frapp&eacute; par la foudre. J\'ai bien frott&eacute; mes yeux. J\'ai bien regard&eacute;. Et j\'ai vu un petit bonhomme tout &agrave; fait extraordinaire qui me consid&eacute;rait gravement. Voil&agrave; le meilleur portrait que, plus tard, j\'ai r&eacute;ussi &agrave; faire de lui. Mais mon dessin, bien s&ucirc;r, est beaucoup moins ravissant que le mod&egrave;le. Ce n\'est pas ma faute. J\'avais &eacute;t&eacute; d&eacute;courag&eacute; dans ma carri&egrave;re de peintre par les grandes personnes, &agrave; l\'&acirc;ge de six ans, et je n\'avais rien appris &agrave; dessiner, sauf les boas ferm&eacute;s et les boas ouverts.je regardai donc cette apparition avec des yeux tout ronds d\'&eacute;tonnement. N\'oubliez pas que je me trouvais &agrave; mille milles de toute r&eacute;gion habit&eacute;e. Or mon petit bonhomme ne me semblait ni &eacute;gar&eacute;, ni mort de fatigue, ni mort de faim, ni mort de soif, ni mort de peur. Il n\'avait en rien l\'apparence d\'un enfant perdu au milieu du d&eacute;sert, &agrave; mille milles de toute r&eacute;gion habit&eacute;e. Quand je r&eacute;ussis enfin &agrave; parler, je lui dis :- Mais... qu\'est-ce que tu fais l&agrave; ?Et il me r&eacute;p&eacute;ta alors, tout doucement, comme une chose tr&egrave;s s&eacute;rieuse :- S\'il vous pla&icirc;t... dessine-moi un mouton...</span></p>', '2019-11-09 00:00:00'),
(18, 'Un autre chapitre', '<p><span style=\"color: #202020; font-family: \'Helvetica Neue\', Helvetica, Arial, sans-serif; font-size: 13px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: justify; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #ffffff; text-decoration-style: initial; text-decoration-color: initial; display: inline !important; float: none;\">Elle gratte, elle creuse, elle racle cette terre s&egrave;che et dure qui la prot&eacute;geait, faisant d\'incroyables efforts pour grimper plus haut, toujours plus haut. Son unique obsession est de quitter ces tunnels sombres qu&rsquo;elle parcoure depuis trois longues ann&eacute;es &agrave; la recherche de quelques racines &agrave; sucer. C&rsquo;est maintenant le temps de se rapprocher de la surface pour sentir si la chaleur est au rendez-vous. Elle sait qu\'elle est&nbsp; le symbole du soleil et des collines, mais elle sait aussi qu&rsquo;il ne lui reste qu&rsquo;une saison de vie. Alors il faut qu&rsquo;elle se bouge notre amie la cigale. Qu&rsquo;elle d&eacute;couvre enfin cette clart&eacute; qu&rsquo;elle esp&egrave;re depuis tant de mois. Etourdie par la lumi&egrave;re &eacute;blouissante de l&rsquo;astre de jour, elle grimpe maintenant sur l&rsquo;&eacute;corce &agrave; l&rsquo;odeur enivrante d&rsquo;un pin, mais pas trop haut, elle doit garder des forces s&rsquo;extirper de sa coquille. Encore un dernier effort et la voil&agrave; enfin lib&eacute;r&eacute;e de son carcan. Abandonnant son exuvie &eacute;ventr&eacute;e comme une derni&egrave;re relique de sa vie pass&eacute;e, la voil&agrave; enfin libre. En s&rsquo;envolant, elle passe si pr&egrave;s de ma joue que je suis oblig&eacute; de l&rsquo;&eacute;carter d&rsquo;un geste de la main.</span></p>', '2019-11-11 11:21:30'),
(19, 'un autre', '<p>Le petit prince arracha aussi, avec un peu de m&eacute;lancolie, les derni&egrave;res pousses de baobabs. Il croyait ne jamais devoir revenir. Mais tous ces travaux familiers lui parurent, ce matin-l&agrave;, extr&ecirc;mement doux. Et, quand il arrosa une derni&egrave;re fois la fleur, et se pr&eacute;para &agrave; la mettre &agrave; l&rsquo;abri sous son globe, il se d&eacute;couvrit l&rsquo;envie de pleurer.&ndash; Adieu, dit-il &agrave; la fleur.Mais elle ne lui r&eacute;pondit pas.&ndash; Adieu, r&eacute;p&eacute;tat-t-il.La fleur toussa. Mais ce n&rsquo;&eacute;tait pas &agrave; cause de son rhume.&ndash; J&rsquo;ai &eacute;t&eacute; sotte, lui dit-elle enfin. Je te demande pardon. T&acirc;che d&rsquo;&ecirc;tre heureux.Il fut surpris par l&rsquo;absence de reproches. Il restait l&agrave; tout d&eacute;concert&eacute;, le globe en l&rsquo;air. Il ne comprenait pas cette douceur calme.&ndash; Mais oui, je t&rsquo;aime, lui dit la fleur. Tu n&rsquo;en as rien su, par ma faute. Cela n&rsquo;a aucune importance. Mais tu as &eacute;t&eacute; aussi sot que moi. T&acirc;che d&rsquo;&ecirc;tre heureux&hellip; Laisse ce globe tranquille. Je n&rsquo;en veux plus.&ndash; Mais le vent&hellip;&ndash; Je ne suis pas si enrhum&eacute;e que &ccedil;a&hellip; L&rsquo;air frais de la nuit me fera du bien. Je suis une fleur.&ndash; Mais les b&ecirc;tes&hellip;&ndash; Il faut bien que je supporte deux ou trois chenilles si je veux conna&icirc;tre les papillons. Il para&icirc;t que c&rsquo;est tellement beau. Sinon qui me rendra visite ? Tu seras loin, toi. Quand aux grosses b&ecirc;tes, je ne crains rien. J&rsquo;ai mes griffes.</p>', '2019-11-11 11:22:14'),
(14, 'Le 3ème chapitre', '<p>Le petit prince arracha aussi, avec un peu de m&eacute;lancolie, les derni&egrave;res pousses de baobabs. Il croyait ne jamais devoir revenir. Mais tous ces travaux familiers lui parurent, ce matin-l&agrave;, extr&ecirc;mement doux. Et, quand il arrosa une derni&egrave;re fois la fleur, et se pr&eacute;para &agrave; la mettre &agrave; l&rsquo;abri sous son globe, il se d&eacute;couvrit l&rsquo;envie de pleurer.&ndash; Adieu, dit-il &agrave; la fleur.Mais elle ne lui r&eacute;pondit pas.&ndash; Adieu, r&eacute;p&eacute;tat-t-il.La fleur toussa. Mais ce n&rsquo;&eacute;tait pas &agrave; cause de son rhume.&ndash; J&rsquo;ai &eacute;t&eacute; sotte, lui dit-elle enfin. Je te demande pardon. T&acirc;che d&rsquo;&ecirc;tre heureux.Il fut surpris par l&rsquo;absence de reproches. Il restait l&agrave; tout d&eacute;concert&eacute;, le globe en l&rsquo;air. Il ne comprenait pas cette douceur calme.&ndash; Mais oui, je t&rsquo;aime, lui dit la fleur. Tu n&rsquo;en as rien su, par ma faute. Cela n&rsquo;a aucune importance. Mais tu as &eacute;t&eacute; aussi sot que moi. T&acirc;che d&rsquo;&ecirc;tre heureux&hellip; Laisse ce globe tranquille. Je n&rsquo;en veux plus.&ndash; Mais le vent&hellip;&ndash; Je ne suis pas si enrhum&eacute;e que &ccedil;a&hellip; L&rsquo;air frais de la nuit me fera du bien. Je suis une fleur.&ndash; Mais les b&ecirc;tes&hellip;&ndash; Il faut bien que je supporte deux ou trois chenilles si je veux conna&icirc;tre les papillons. Il para&icirc;t que c&rsquo;est tellement beau. Sinon qui me rendra visite ? Tu seras loin, toi. Quand aux grosses b&ecirc;tes, je ne crains rien. J&rsquo;ai mes griffes.</p>', '2019-11-10 14:36:06');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `email`, `pseudo`, `pass`, `admin`) VALUES
(9, 'stephanieangibert@orange.fr', 'Stéphanie', '$2y$10$pDXBwVL2WXfVVe7PpbrLde0OjTLJytAJAnXpxqaycc9UTwKP1TqxK', 0),
(12, 'jeanforteroche@orange.fr', 'jean', '$2y$10$gRkBV5vvQyiPBunsgzH01O23q6mh44qtpZTfD4scrShffkKgT3tfK', 0),
(13, 'noisette@free.fr', 'noisette', '$2y$10$KeD2VVeP3yL205tbUn/KCeSKQXFEYnS40vZmkrm7TMTBa4c8uK78.', 0),
(4, 'romaneangibert@orange.fr', 'Romane', '$2y$10$n6LXDe8aAc235eyrI63Ms.TlN55WNN34FtUoD7dBUVsBP/H19CvOy', 0),
(5, 'delphineferre@orange.fr', 'delphine', '$2y$10$NjNsKr0EffIoGg/7qXBCrOYUntuSkfWhYEaZyEwcyNICBqPAdw2aq', 1),
(14, 'cecile@free.fr', 'cécile', '$2y$10$h.2azn1dBG5NxkVjCqXj4eXxCIHyjO3L.H4vhu01hJftnhx/U0.TS', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
