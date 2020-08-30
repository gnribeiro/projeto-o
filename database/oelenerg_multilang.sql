-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2020 at 12:48 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oelenerg_multilang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` char(50) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'gnribeiro', 'a56a33324dbd9df20251774ea4db21c4');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `permalink` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `position` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '0',
  `type_content` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'content',
  `module` int(11) NOT NULL DEFAULT '0',
  `user_edit` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `metatags_description` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `metatags_keywords` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `have_childs` int(11) DEFAULT NULL,
  `parent_path` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `title` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `permalink`, `position`, `active`, `type_content`, `module`, `user_edit`, `metatags_description`, `metatags_keywords`, `have_childs`, `parent_path`, `level`, `title`) VALUES
(1, 0, 'site', 'site', 1, 1, 'content', 0, '', '', '', 0, NULL, NULL, NULL),
(2, 1, 'Home', 'home', 1, 1, 'content', 0, '', '', '', 0, NULL, NULL, 'Home'),
(3, 1, 'Organograma', 'organograma', 2, 1, 'content', 0, '', '', '', 0, NULL, NULL, NULL),
(4, 1, 'Mercados', 'mercados', 3, 1, 'content', 0, '', '', '', 0, NULL, NULL, NULL),
(5, 1, 'Competências', 'competencias', 4, 1, 'content', 0, '', '', '', 1, NULL, NULL, NULL),
(6, 1, 'Qualidade', 'qualidade', 5, 1, 'content', 0, '', '', '', 0, NULL, NULL, NULL),
(7, 1, 'Obras', 'obras', 6, 1, 'obras', 0, '', '', '', 1, NULL, NULL, NULL),
(8, 1, 'Contactos', 'contactos', 7, 1, 'content', 0, '', '', '', 0, NULL, NULL, NULL),
(9, 5, 'Engenharia e Instalações', 'Engenharia-e-Instalacoes', 2, 1, 'content', 0, '', '<p><span>Engenharia e Instala&ccedil;&otilde;es</span></p>', '<p><span>Engenharia e Instala&ccedil;&otilde;es</span></p>', 0, NULL, NULL, 'Engenharia e Instalações'),
(10, 5, 'Manutenção Multitécnica', 'Manutencao-Multitecnica', 4, 1, 'content', 0, '', '<p><span>Manuten&ccedil;&atilde;o Multit&eacute;cnica</span></p>', '<p><span>Manuten&ccedil;&atilde;o Multit&eacute;cnica</span></p>', 0, NULL, NULL, 'Manutenção Multitécnica'),
(11, 5, 'Novas Tecnologias de Informação e Comunicação', 'Novas-Tecnologias-de-Informacao-e-Comunicacao', 3, 1, 'content', 0, '', '<p><span>Novas Tecnologias de Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o</span></p>', '<p><span>Novas Tecnologias de Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o</span></p>', 0, NULL, NULL, 'Novas Tecnologias de Informação e Comunicação'),
(12, 7, 'Concluidas', 'Concluidas', 1, 1, 'obras', 0, '', '<p><span>Concluidas</span></p>', '<p><span>Concluidas</span></p>', 0, NULL, NULL, 'Concluidas'),
(13, 7, 'Em Execução', 'Em-Execucao', 2, 1, 'obras', 0, '', '<p><span>Em Execu&ccedil;&atilde;o</span></p>', '<p><span>Em Execu&ccedil;&atilde;o</span></p>', 0, NULL, NULL, 'Em Execução'),
(14, 7, 'Em Negociação', 'Em-Negociacao', 3, 0, 'obras', 0, '', '<p><span>Em Negocia&ccedil;&atilde;o</span></p>', '<p><span>Em Negocia&ccedil;&atilde;o</span></p>', 0, NULL, NULL, 'Em Negociação'),
(15, 5, 'Serviços', 'Servicos', 1, 1, 'content', 0, '', '<p><span>Organigrama</span></p>', '<p><span>Organigrama</span></p>', 0, NULL, NULL, 'Serviços');

-- --------------------------------------------------------

--
-- Table structure for table `category_translation`
--

CREATE TABLE `category_translation` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_translation`
--

INSERT INTO `category_translation` (`id`, `category_id`, `language_id`, `title`) VALUES
(1, 2, 1, 'Home'),
(2, 2, 4, 'Home'),
(3, 3, 1, 'Organograma'),
(4, 3, 4, 'Organisational'),
(5, 4, 1, 'Mercados'),
(6, 4, 4, 'Markets'),
(7, 5, 4, 'Skills'),
(8, 5, 1, 'Compet&ecirc;ncias'),
(9, 6, 1, 'Qualidade'),
(10, 6, 4, 'Quality'),
(11, 7, 1, 'Obras'),
(12, 7, 4, 'Works'),
(13, 8, 1, 'Contactos'),
(14, 8, 4, 'Contacts'),
(15, 9, 1, 'Engenharia e Instala&ccedil;&otilde;es'),
(16, 9, 4, 'Engineering and Facilities'),
(17, 10, 1, 'Manuten&ccedil;&atilde;o Multit&eacute;cnica'),
(18, 10, 4, 'Multitechnical Maintenance'),
(19, 11, 1, 'Novas Tecnologias de Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o '),
(20, 11, 4, 'New Technologies of Information and Communication'),
(21, 15, 1, 'Servi&ccedil;os'),
(22, 15, 4, 'Services'),
(23, 12, 1, 'Concluidas'),
(24, 12, 4, 'Completed'),
(25, 13, 1, 'Em  Execu&ccedil;&atilde;o'),
(26, 13, 4, 'IN Execution'),
(27, 14, 1, 'Em Negocia&ccedil;&atilde;o'),
(28, 14, 4, 'In Negotiation');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sumary` text NOT NULL,
  `description` text NOT NULL,
  `active` int(255) NOT NULL DEFAULT '0',
  `pos` int(255) NOT NULL,
  `highligt` int(255) NOT NULL DEFAULT '0',
  `checkhout_date` date NOT NULL,
  `user_edit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `category_id`, `title`, `sumary`, `description`, `active`, `pos`, `highligt`, `checkhout_date`, `user_edit`) VALUES
(6, 2, 'parceiro google', '<p>aaa</p>', '<p>aaa</p>', 1, 1, 0, '2012-11-02', ''),
(7, 4, '', '', '', 1, 1, 0, '2012-11-03', ''),
(8, 4, '', '', '', 1, 2, 0, '2012-11-21', ''),
(9, 4, '', '', '', 1, 3, 0, '2012-11-10', ''),
(10, 6, '', '', '', 0, 1, 0, '2012-11-14', ''),
(11, 6, '', '', '', 1, 2, 0, '2012-11-14', ''),
(12, 8, '', '', '', 1, 1, 0, '2012-11-13', ''),
(13, 15, '', '', '', 1, 1, 0, '2012-11-14', ''),
(14, 9, '', '', '', 1, 1, 0, '2012-11-20', ''),
(15, 11, '', '', '', 1, 1, 0, '2012-11-20', ''),
(16, 10, '', '', '', 1, 1, 0, '2012-11-27', ''),
(17, 3, '', '', '', 1, 1, 0, '2012-11-14', ''),
(18, 4, '', '', '', 1, 4, 0, '2012-11-01', '');

-- --------------------------------------------------------

--
-- Table structure for table `contents_translation`
--

CREATE TABLE `contents_translation` (
  `id` int(11) NOT NULL,
  `contents_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sumary` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents_translation`
--

INSERT INTO `contents_translation` (`id`, `contents_id`, `language_id`, `title`, `sumary`, `description`) VALUES
(4, 6, 1, 'Home', '<p>aaa</p>', '<h2>A Nossa Hist&oacute;ria&nbsp;</h2>\n<p class=\"full\">Ap&oacute;s uma parceria t&eacute;cnica de sucesso com a OELE - Instala&ccedil;&otilde;es El&eacute;ctricas e Mec&acirc;nicas, S.A., Empresa de direito portugu&ecirc;s, e por considerarmos desnecess&aacute;ria a continua&ccedil;&atilde;o daquela parceria, constitui-se em 2008 a&nbsp;<span class=\"bold\">OEL</span>, <span class=\"bold\">ENERGIA E AMBIENTE, S.A</span>., Empresa de direito angolano.</p>\n<p class=\"full\">Assim, surgiu a nova marca OEL e com ela o desenvolvimento das suas actividades em ANGOLA. <br /><br /></p>\n<h2>Miss&atilde;o e Valores</h2>\n<p class=\"full\">A <span class=\"bold\">OEL </span>sendo uma refer&ecirc;ncia na oferta de solu&ccedil;&otilde;es de engenharia na &aacute;rea das instala&ccedil;&otilde;es especiais, aposta numa estrat&eacute;gia de desenvolvimento. Assumimos assim, os desafios de uma lideran&ccedil;a assente na inova&ccedil;&atilde;o, seguran&ccedil;a, respeito pelo meio ambiente, colocando no centro de toda a actividade, as pessoas.<br />A qualifica&ccedil;&atilde;o e especializa&ccedil;&atilde;o das nossas equipas t&eacute;cnicas, permitem o desenvolvimento e implementa&ccedil;&atilde;o de m&eacute;todos e equipamentos inovadores, capazes de responder &agrave;s mais exigentes necessidades de cada Cliente.</p>\n<p class=\"full\">Na&nbsp;<span class=\"bold\">OEL&nbsp;</span>valorizamos a flexibilidade das nossas equipas pluridisciplinares e a capacidade de escutar o Cliente, com o objectivo de encontrarmos as solu&ccedil;&otilde;es mais adaptadas &agrave;s suas necessidades, com efic&aacute;cia e compet&ecirc;ncia. &nbsp;</p>'),
(5, 6, 4, 'Home', '<p>ing</p>', '<h2>Our Story</h2>\n<p>After a successful technical partnership with OELE &ndash; Instala&ccedil;&otilde;es El&eacute;ctricas e Mec&acirc;nicas, SA,  a company under Portuguese law, and after deliberating the unnecessary continuation of that  partnership, it is constituted in 2008<strong> OEL, ENERGIA E AMBIENTE, SA</strong>, a company under  Angolan law.</p>\n<p>Thus emerged the new brand OEL and with it the development of its activities in ANGOLA.  <br /><br /></p>\n<h2>Mission and Values</h2>\n<p><strong>OEL</strong> being a reference in the provision of engineering solutions in the area of special facilities,  bets on a development strategy. We assume then, the challenges of leadership based on innovation,  safety, respect for the environment, placing in the center of all activity, the people.</p>\n<p>The skills and expertise of our technical teams, allows the development and implementation of  innovative methods and equipment, capable of satisfying the most demanding needs of each client.</p>\n<p>At <strong>OEL</strong> we value the flexibility of our multidisciplinary teams and the ability to listen to  the client, with the aim of finding the best solutions adapted to your needs with efficiency and  competence.</p>'),
(6, 7, 1, 'Terciário', '<p><span>pt-PT<span>pt-PT</span></span></p>', '<p class=\"full\">Dotada de uma experi&ecirc;ncia assente na execu&ccedil;&atilde;o de in&uacute;meras infra-estruturas de terci&aacute;rio, a <span class=\"bold\">OEL</span> disp&otilde;e hoje de capacidade t&eacute;cnica que cobre todas as fases de desenvolvimento de um projecto, desde a concep&ccedil;&atilde;o, &agrave; instala&ccedil;&atilde;o e &agrave; manuten&ccedil;&atilde;o, oferecemos solu&ccedil;&otilde;es globais, integradas e inovadoras, profissionais e de qualidade.</p>'),
(7, 7, 4, 'Service Sector', '<p><span>en-GB</span></p>', '<p>With an experience gathered on the execution of numerous infrastructure in the tertiary sector, <strong>OEL</strong> now has the technical ability which covers all stages of project development, from design to<br />installation and maintenance. We offer integrated and innovative global solutions, professionally and with quality.</p>'),
(8, 8, 1, 'Indústria', '<p>assa</p>', '<p class=\"full\">Qualidade, seguran&ccedil;a, inova&ccedil;&atilde;o, capacidade t&eacute;cnica de engenharia e  de realiza&ccedil;&atilde;o bem como a credibilidade e confian&ccedil;a por parte dos clientes, t&ecirc;m  sido os valores fundamentais que nos permitem o posicionamento de Parceiro de  refer&ecirc;ncia.</p>\n<p class=\"full\">Dotada de equipas com reconhecida experi&ecirc;ncia profissional, a <strong>OEL</strong> cria e desenvolve Instala&ccedil;&otilde;es Mec&acirc;nicas ao n&iacute;vel de Montagens, Pipping e  Manuten&ccedil;&atilde;o.</p>'),
(9, 8, 4, 'Industry', '', '<p>Quality, safety, innovation, engineering expertise and achievement as well as the credibility and trust from customers, have been the core values ​that allow us to be positioned as a reference partner.</p>\n<p>Endowed with teams of recognized professional experience, <strong>OEL</strong> creates and develops the Mechanical Installations at the Assembly, Piping and Maintenance level.</p>'),
(10, 9, 1, 'Transportes', '<p>sasdd</p>', '<p class=\"full\">A credibilidade da OEL neste segmento de mercado adv&eacute;m da sua experi&ecirc;ncia na execu&ccedil;&atilde;o de instala&ccedil;&otilde;es e manuten&ccedil;&atilde;o t&eacute;cnicas em aeroportos, caminhos de ferro.</p>\n<p class=\"full\">A sua capacidade de promover parcerias leva-nos a podermos estar presentes no transporte de energia em redes a&eacute;reas ou subterr&acirc;neas desde a B.T. &aacute; MUITO ALTA TENS&Atilde;O (400 KV).</p>'),
(11, 9, 4, 'Transportation', '', '<p>Our credibility in this market segment comes from our experience in implementation and&nbsp;maintenance of technical installations in airports, railways.</p>\n<p>Our ability to foster partnerships leads us to being able to be present in the transport of energy in&nbsp;overhead or underground networks from LT (low tension) to VERY HIGH TENSION (400 KV).</p>'),
(12, 11, 1, 'qualidade', '<p>qualidade</p>', '<p class=\"full\">Os m&eacute;todos de gest&atilde;o da <span class=\"bold\">OEL </span>asseguram processos operacionais, servi&ccedil;os funcionais, gest&atilde;o e controlo global do projecto.</p>\n<p class=\"full\">Sa&uacute;de Higiene e Seguran&ccedil;a no trabalho s&atilde;o valores fundamentais da actividade da <span class=\"bold\">OEL</span>, raz&atilde;o pela qual todos os colaboradores, aos mais diversos n&iacute;veis est&atilde;o comprometidos, numa politica de melhoria cont&iacute;nua com um &uacute;nico objectivo &ldquo;zero acidentes&rdquo;. Gra&ccedil;as &agrave;s rela&ccedil;&otilde;es estreitas que mantemos com os clientes e fornecedores, permite-nos o cumprimento rigoroso das normas de higiene e seguran&ccedil;a, bem como total respeito pelos valores de protec&ccedil;&atilde;o ambiental.</p>\n<p class=\"full\"><span>A <span class=\"bold\">OEL</span> est&aacute; em continuo aperfei&ccedil;oamento do Sistema de Gest&atilde;o de Qualidade, Higiene,  Ambiente e Seguran&ccedil;a com o objectivo de aperfei&ccedil;oar procedimentos e metodologias  de trabalho que lhe permitam, por um lado, maximizar a qualidade, e por outro,  fazer deste, um instrumento de optimiza&ccedil;&atilde;o da rela&ccedil;&atilde;o comercial com os seus  clientes.</span></p>'),
(13, 11, 4, 'QUALITY, ENVIRONMENT AND SAFETY', '<p>qualidade ing</p>', '<p><strong>OEL&rsquo;s</strong> management methods ensure operational processes, functional services, management and&nbsp;overall control of the project.</p>\n<p>Health, Hygiene and Safety at work are fundamental values ​of <strong>OEL&rsquo;s</strong> activity, which is why all&nbsp;employees at all levels are engaged in a policy of continuous improvement with the sole purpose&nbsp;of \"zero accidents\". Thanks to the close relationships we have with our customers and suppliers, it&nbsp;allows us strict compliance with the hygiene and safety regulations as well as full respect for the&nbsp;values ​of environmental protection.</p>\n<p><strong>OEL</strong> is in continuous improvement of the Quality Management System, Health, Environment&nbsp;and Safety in order to improve work methods and procedures that allow, on one hand, maximize&nbsp;quality, and secondly, make this an instrument of optimization of the business relationship with our&nbsp;customers.</p>'),
(14, 12, 1, 'contactos', '<p>contactos</p>', '<p><img style=\"float: right;\" title=\"oel\" src=\"http://oelenergia.com/uploads/images/wysiwyg/logo_oel.jpg\" border=\"0\" alt=\"oel\" width=\"43\" height=\"42\" /></p>\n<p><strong>SEDE</strong></p>\n<p><strong><br /></strong></p>\n<p><strong>OEL - Energia e Ambiente, S.A.</strong></p>\n<p>Rua dos Eucaliptos, Km 14</p>\n<p>Bairro Incutal</p>\n<p>Viana - Angola</p>\n<p>Tel.: +244 921 208 508</p>\n<p>Email : geral@oelenergia.com</p>\n<p>Website:www.oelenergia.com</p>'),
(15, 12, 4, 'Contacts', '<p>Contacs ing</p>', '<p><img style=\"float: right;\" title=\"oel\" src=\"http://oelenergia.com/uploads/images/wysiwyg/logo_oel.jpg\" border=\"0\" alt=\"oel\" width=\"43\" height=\"42\" /></p>\n<p><strong>HEADQUARTERS:</strong></p>\n<p><strong><br /></strong></p>\n<p><strong>OEL - Energia e Ambiente, S.A.</strong></p>\n<p>Rua dos Eucaliptos, Km 14</p>\n<p>Bairro Incutal</p>\n<p>Viana - Angola</p>\n<p>Tel.: +244 921 208 508</p>\n<p>Email : geral@oelenergia.com</p>\n<p>Website:www.oelenergia.com</p>'),
(16, 13, 1, 'Serviços', '<h2 class=\"service\">Servi&ccedil;os</h2>\n<div class=\"cf\">\n<h3 class=\"service\">Engenharia e Ambiente</h3>\n<h3 class=\"service\">Manuten&ccedil;&atilde;o Multitecnica e Industrial</h3>\n</div>\n<div class=\"cf\">\n<div class=\"service cf\">\n<ul class=\"service\">\n<li>\n<h4>Instala&ccedil;&otilde;es El&eacute;cticas AT/MT/BT</h4>\n</li>\n<li>\n<h4>AVAC</h4>\n<p>Ar Condicionado</p>\n<p>Ventila&ccedil;&atilde;o</p>\n<p>Aquecimento</p>\n</li>\n<li>\n<h4>Sistemas de Seguran&ccedil;a contra Inc&ecirc;ndios</h4>\n<p>Instalac&otilde;es mec&acirc;nicas de fluidos</p>\n<p>Redes de &aacute;guas</p>\n<p>Redes de esgotos</p>\n<p>Redes de ar comprimido</p>\n<p>Redes de gazes medicionais</p>\n<p>Redes de ar comprimido</p>\n<p>Redes de vapor</p>\n<p>Redes de g&aacute;s</p>\n</li>\n</ul>\n<ul class=\"service\">\n<li>\n<h4>Novas Tecnologias de Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o</h4>\n<p>Redes estruturadas</p>\n<p>Redes Wireless</p>\n<p>Equipamento activos de rede</p>\n<p>Sistemas de seguran&ccedil;a inform&aacute;tica</p>\n</li>\n<li>\n<h4>Netbuilding</h4>\n<p>CCTV</p>\n<p>Controlo de acessos</p>\n<p>Inturs&atilde;o</p>\n<p>Detec&ccedil;&atilde;o de inc&ecirc;&ntilde;dios</p>\n<p>GTC</p>\n</li>\n</ul>\n<ul class=\"service grid-3\">\n<li>\n<h4>Cogera&ccedil;&atilde;o</h4>\n</li>\n<li>\n<h4>Energias Renov&aacute;veis</h4>\n<p>Fotovoltaica</p>\n<p>E&oacute;lica</p>\n</li>\n<li>\n<h4>Subesta&ccedil;&otilde;es</h4>\n</li>\n<li>\n<h4>Transporte de energia</h4>\n</li>\n<li>\n<h4>Aeroportos</h4>\n</li>\n<li>\n<h4>Centrais diesel</h4>\n</li>\n<li>\n<h4>Centrais mini h&iacute;dricas</h4>\n</li>\n<li>\n<h4>Telegest&atilde;o</h4>\n</li>\n<li>\n<h4>Ambiente</h4>\n<p>ETA</p>\n<p>ETAR</p>\n</li>\n</ul>\n</div>\n<div class=\"service cf\">\n<ul class=\"service\">\n<li>\n<h4>Manuten&ccedil;&atilde;o Multit&eacute;cnica</h4>\n</li>\n<li>\n<p>Gest&atilde;o e Explora&ccedil;&atilde;o de Instala&ccedil;&otilde;es T&eacute;cnicas Especiais</p>\n</li>\n</ul>\n</div>\n</div>', '<h2 class=\"service\">Servi&ccedil;os</h2>\n<div class=\"cf\">\n<h3 class=\"service\">Engenharia e Ambiente</h3>\n<h3 class=\"service\">Manuten&ccedil;&atilde;o Multitecnica e Industrial</h3>\n</div>\n<div class=\"cf\">\n<div class=\"service cf\">\n<ul class=\"service\">\n<li>\n<h4>Instala&ccedil;&otilde;es El&eacute;cticas AT/MT/BT</h4>\n</li>\n<li>\n<h4>AVAC</h4>\n<p>Ar Condicionado</p>\n<p>Ventila&ccedil;&atilde;o</p>\n<p>Aquecimento</p>\n</li>\n<li>\n<h4>Sistemas de Seguran&ccedil;a contra Inc&ecirc;ndios</h4>\n<p>Instalac&otilde;es mec&acirc;nicas de fluidos</p>\n<p>Redes de &aacute;guas</p>\n<p>Redes de esgotos</p>\n<p>Redes de ar comprimido</p>\n<p>Redes de gazes medicionais</p>\n<p>Redes de ar comprimido</p>\n<p>Redes de vapor</p>\n<p>Redes de g&aacute;s</p>\n</li>\n</ul>\n<ul class=\"service\">\n<li>\n<h4>Novas Tecnologias de Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o</h4>\n<p>Redes estruturadas</p>\n<p>Redes Wireless</p>\n<p>Equipamento activos de rede</p>\n<p>Sistemas de seguran&ccedil;a inform&aacute;tica</p>\n</li>\n<li>\n<h4>Netbuilding</h4>\n<p>CCTV</p>\n<p>Controlo de acessos</p>\n<p>Inturs&atilde;o</p>\n<p>Detec&ccedil;&atilde;o de inc&ecirc;&ntilde;dios</p>\n<p>GTC</p>\n</li>\n</ul>\n<ul class=\"service grid-3\">\n<li>\n<h4>Cogera&ccedil;&atilde;o</h4>\n</li>\n<li>\n<h4>Energias Renov&aacute;veis</h4>\n<p>Fotovoltaica</p>\n<p>E&oacute;lica</p>\n</li>\n<li>\n<h4>Subesta&ccedil;&otilde;es</h4>\n</li>\n<li>\n<h4>Transporte de energia</h4>\n</li>\n<li>\n<h4>Aeroportos</h4>\n</li>\n<li>\n<h4>Centrais diesel</h4>\n</li>\n<li>\n<h4>Centrais mini h&iacute;dricas</h4>\n</li>\n<li>\n<h4>Telegest&atilde;o</h4>\n</li>\n<li>\n<h4>Ambiente</h4>\n<p>ETA</p>\n<p>ETAR</p>\n</li>\n</ul>\n</div>\n<div class=\"service cf\">\n<ul class=\"service\">\n<li>\n<h4>Manuten&ccedil;&atilde;o Multit&eacute;cnica</h4>\n</li>\n<li>\n<p>Gest&atilde;o e Explora&ccedil;&atilde;o de Instala&ccedil;&otilde;es T&eacute;cnicas Especiais</p>\n</li>\n</ul>\n</div>\n</div>'),
(17, 13, 4, 'Services', '', '<h2 class=\"service\">SERVICES</h2>\n<div class=\"cf\">\n<h3 class=\"service\">Energy and Environment</h3>\n<h3 class=\"service\">Maintenance and Services</h3>\n</div>\n<div class=\"cf\">\n<div class=\"service cf\">\n<ul class=\"service\">\n<li>\n<h4>Electrical High Voltage  Low Voltage</h4>\n</li>\n<li>\n<h4>HVAC</h4>\n<p>Air Conditioning</p>\n<p>Ventilation</p>\n<p>Heating</p>\n</li>\n<li>\n<h4>Fire Fighting Security Systems</h4>\n<p>Mechanical</p>\n<p>Hydraulic Systems</p>\n<p>Pneumatic Systems</p>\n<p>Medical Gas</p>\n<p>Steam</p>\n<p>Gas</p>\n</li>\n</ul>\n<ul class=\"service\">\n<li>\n<h4>Communication Systems</h4>\n<p>Cabling Systems</p>\n<p>Wireless Systems</p>\n<p>Data Centers</p>\n<p>Equipment Implementation</p>\n</li>\n<li>\n<h4>Net building</h4>\n<p>Video Surveillance</p>\n<p>Access Control</p>\n<p>Intrusion Detection</p>\n<p>Fire Protection</p>\n<p>Integration</p>\n</li>\n</ul>\n<ul class=\"service grid-3\">\n<li>\n<h4>Cogeneration</h4>\n</li>\n<li>\n<h4>Renewable Energies</h4>\n<p>Photovoltaic Power</p>\n<p>Wind Power</p>\n<p>Hydroelectric Power</p>\n</li>\n<li>\n<h4>Transformer Sub-Stations</h4>\n</li>\n<li>\n<h4>Energy Transportation</h4>\n</li>\n<li>\n<h4>Airports</h4>\n</li>\n<li>\n<h4>Diesel Generator</h4>\n</li>\n<li>\n<h4>Industrial Maintenance</h4>\n</li>\n<li>\n<h4>Facilities Management</h4>\n</li>\n<li>\n<h4>Environment</h4>\n<p>Water Treatment System</p>\n</li>\n</ul>\n</div>\n<div class=\"service cf\">\n<ul class=\"service\">\n<li>\n<h4>Buildings Maintenance</h4>\n</li>\n<li>\n<p>Electrical, HVAC, Mechanical, Communications, Security</p>\n</li>\n</ul>\n</div>\n</div>'),
(18, 14, 1, 'Engenharia e Instalações', '', '<p class=\"full\">A <span class=\"bold\">OEL </span>est&aacute; apta a realizar todos os trabalhos nas &aacute;reas das instala&ccedil;&otilde;es t&eacute;cnicas especiais multidisciplinares com Solu&ccedil;&otilde;es Integradas nos dom&iacute;nios das Instala&ccedil;&otilde;es El&eacute;ctricas, Mec&acirc;nicas e Redes de Fluidos, da Ventila&ccedil;&atilde;o e Ar Condicionado, nos sectores das Infra-Estruturas de Terci&aacute;rio, Ind&uacute;stria, Transportes e Energia.</p>'),
(19, 14, 4, 'ENGINEERING AND FACILITIES', '', '<p>The <strong>OEL</strong> is able to perform all works in the areas of special technical facilities with&nbsp;multidisciplinary Integrated Solutions in the areas of Electrical Installations, Mechanics and Fluid&nbsp;Networks, Ventilation and Air Conditioning and also in the sectors of Infrastructure of Tertiary&nbsp;Industry (Service sector), Transport and Energy.</p>'),
(20, 15, 1, 'Novas Tecnologias de Informação e Comunicação ', '<h3 class=\"box-bar\"><a class=\"select\">Novas Tecnologias de Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o</a></h3>', '<p class=\"full\">Ao n&iacute;vel das Novas Tecnologias de Informa&ccedil;&atilde;o e Comunica&ccedil;&atilde;o, a <strong>OEL</strong>, desenvolve projectos integrados de solu&ccedil;&otilde;es globais, que v&atilde;o desde o estudo e implementa&ccedil;&atilde;o de Solu&ccedil;&otilde;es de Infra-estruturas para Tecnologias de Informa&ccedil;&atilde;o (TI), Tecnologias de Comunica&ccedil;&atilde;o (TC), Sistemas de Seguran&ccedil;a Electr&oacute;nica, CCTV, Controlo de Acessos, Sistemas Anti-Intrus&atilde;o e Detec&ccedil;&atilde;o de Inc&ecirc;ndios.</p>'),
(21, 15, 4, 'NEW TECHNOLOGIES OF INFORMATION AND COMMUNICATIONS', '', '<p>Under New Technologies of Information and Communication, <strong>OEL</strong> develops integrated projects&nbsp;for global solutions, ranging from the study and implementation of Infrastructure Solutions to&nbsp;Information Technology (IT), Communication Technologies (CT) Electronic Security Systems,&nbsp;CCTV, Access Control Systems, Anti-Intrusion and Fire Detection.</p>'),
(22, 16, 1, 'Manutenção Multitécnica ', '', '<p class=\"full\">A <span class=\"bold\">OEL </span>estuda solu&ccedil;&otilde;es integradas, capazes de oferecer parcerias respons&aacute;veis e duradouras para a gest&atilde;o e explora&ccedil;&atilde;o de unidades industriais ou de terci&aacute;rio, nas &aacute;reas da Electricidade, Mec&acirc;nica, Instrumenta&ccedil;&atilde;o e AVAC, quer atrav&eacute;s de Contratos Globais de Manuten&ccedil;&atilde;o ou por Especialidade</p>'),
(23, 16, 4, 'MULTITECHNICAL MAINTENANCE', '', '<p>The <strong>OEL</strong> studies integrated solutions capable of providing lasting partnerships and responsible&nbsp;for the management and operation of industrial units or service sector in the areas of Electrical,&nbsp;Mechanical, Instrumentation and HVAC either through Global Maintenance Agreements or by&nbsp;Speciality.</p>'),
(24, 17, 1, 'Organograma', '', '<p><img title=\"orgranigrama\" src=\"http://oelenergia.com/uploads/images/wysiwyg/orgranograma_oel_1.jpg\" alt=\"orgranigrama\" width=\"849\" height=\"475\" /></p>'),
(25, 17, 4, 'Organisational', '', '<p><img title=\"organagram\" src=\"http://oelenergia.com/uploads/images/wysiwyg/orgranograma_oel_eng.jpg\" alt=\"organagram\" width=\"849\" height=\"475\" /></p>'),
(26, 18, 1, 'Energia', '', '<p class=\"full\">A capacidade de parcerias com fabricantes / fornecedores de equipamentos, aliada &agrave; sua capacidade t&eacute;cnica, permite &aacute; <strong>OEL</strong> apresentar solu&ccedil;&otilde;es nas &aacute;reas das centrais t&eacute;rmicas, mini-hidricas e coogera&ccedil;&atilde;o.</p>'),
(27, 18, 4, 'Energy', '', '<p>The ability to partner with manufacturers/suppliers of equipment, combined with its technical&nbsp;capacity, allows <strong>OEL</strong> to present solutions in the area of thermal, mini-hydro and cogeneration&nbsp;powerplants.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(255) NOT NULL,
  `content_id` int(255) NOT NULL,
  `url` text CHARACTER SET latin1 NOT NULL,
  `thumb` varchar(250) NOT NULL,
  `pos` int(255) NOT NULL,
  `active` int(255) NOT NULL DEFAULT '0',
  `highligt` int(255) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `content_id`, `url`, `thumb`, `pos`, `active`, `highligt`, `language_id`) VALUES
(11, 6, '/uploads/images/home/videos2.png', '/uploads/images/home/thumbs/videos2.png', 1, 0, 0, 0),
(12, 6, '/uploads/images/home/black_arrow.png', '/uploads/images/home/thumbs/black_arrow.png', 2, 0, 0, 0),
(15, 7, '/uploads/images/home/terceario.png', '/uploads/images/home/thumbs/terceario.png', 1, 1, 1, 0),
(16, 8, '/uploads/images/home/industria.png', '/uploads/images/home/thumbs/industria.png', 1, 1, 1, 0),
(17, 9, '/uploads/images/home/4cea5b2c1ee08transportes.png', '/uploads/images/home/thumbs/4cea5b2c1ee08transportes.png', 1, 1, 1, 0),
(18, 11, '/uploads/images/home/seguranca.jpg', '/uploads/images/home/thumbs/seguranca.jpg', 1, 1, 1, 0),
(19, 12, '/uploads/images/home/mapa_angola.jpg', '/uploads/images/home/thumbs/mapa_angola.jpg', 1, 1, 1, 0),
(20, 6, '/uploads/images/home/White_Vista_by_nerval.jpg', '/uploads/images/home/thumbs/White_Vista_by_nerval.jpg', 3, 0, 0, 0),
(21, 14, '/uploads/images/home/4d7f258f8d58aEng_e_instalaoes.jpg', '/uploads/images/home/thumbs/4d7f258f8d58aEng_e_instalaoes.jpg', 1, 1, 1, 0),
(22, 15, '/uploads/images/home/4d7f2658aee78Novas_tecnologias.jpg', '/uploads/images/home/thumbs/4d7f2658aee78Novas_tecnologias.jpg', 1, 1, 1, 0),
(23, 16, '/uploads/images/home/4d7f277469acbMANUTENCAO-MULTITECNICA.jpg', '/uploads/images/home/thumbs/4d7f277469acbMANUTENCAO-MULTITECNICA.jpg', 1, 1, 1, 0),
(24, 18, '/uploads/images/home/4cea5b777384benergia.jpg', '/uploads/images/home/thumbs/4cea5b777384benergia.jpg', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `i18n` varchar(250) NOT NULL,
  `default` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `i18n`, `default`) VALUES
(1, 'Português', 'pt-PT', 1),
(4, 'Inglês', 'en-GB', 0);

-- --------------------------------------------------------

--
-- Table structure for table `obras`
--

CREATE TABLE `obras` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `pos` int(10) NOT NULL,
  `active` int(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obras`
--

INSERT INTO `obras` (`id`, `category_id`, `pos`, `active`) VALUES
(3, 12, 14, 1),
(4, 12, 11, 1),
(5, 12, 20, 1),
(6, 13, 24, 0),
(7, 13, 25, 1),
(8, 12, 15, 1),
(10, 12, 17, 1),
(11, 12, 19, 1),
(12, 12, 8, 1),
(13, 12, 21, 1),
(14, 12, 22, 1),
(15, 12, 46, 1),
(16, 12, 45, 1),
(17, 12, 47, 1),
(18, 12, 51, 1),
(19, 12, 60, 1),
(20, 12, 61, 1),
(21, 12, 62, 1),
(22, 12, 63, 1),
(23, 12, 64, 1),
(24, 12, 65, 1),
(25, 12, 66, 1),
(26, 13, 26, 1),
(27, 13, 27, 1),
(28, 13, 28, 1),
(29, 13, 29, 0),
(30, 13, 30, 1),
(31, 13, 31, 1),
(32, 13, 32, 1),
(33, 13, 33, 0),
(34, 13, 34, 0),
(35, 13, 67, 0),
(36, 13, 68, 1),
(37, 12, 9, 1),
(38, 12, 10, 1),
(39, 12, 12, 1),
(40, 12, 13, 1),
(41, 12, 16, 1),
(42, 12, 18, 1),
(43, 12, 23, 1),
(44, 12, 35, 1),
(45, 12, 36, 1),
(46, 12, 37, 1),
(47, 12, 38, 1),
(48, 12, 39, 1),
(49, 12, 40, 1),
(50, 12, 41, 1),
(51, 12, 42, 1),
(52, 12, 44, 1),
(53, 12, 43, 1),
(54, 12, 48, 1),
(55, 12, 49, 1),
(56, 12, 50, 1),
(57, 12, 52, 1),
(58, 12, 56, 1),
(59, 12, 57, 1),
(60, 12, 55, 1),
(61, 12, 59, 1),
(62, 12, 58, 1),
(63, 12, 54, 1),
(64, 12, 53, 1),
(65, 12, 6, 1),
(66, 12, 3, 1),
(67, 12, 1, 1),
(68, 12, 2, 1),
(69, 13, 1, 1),
(70, 13, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `obras_translation`
--

CREATE TABLE `obras_translation` (
  `id` int(10) NOT NULL,
  `obras_id` int(10) NOT NULL,
  `descricao` text NOT NULL,
  `cliente` varchar(250) NOT NULL,
  `ano` varchar(250) NOT NULL,
  `local` varchar(250) NOT NULL,
  `duracao` varchar(250) NOT NULL,
  `valor` int(10) NOT NULL,
  `language_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `obras_translation`
--

INSERT INTO `obras_translation` (`id`, `obras_id`, `descricao`, `cliente`, `ano`, `local`, `duracao`, `valor`, `language_id`) VALUES
(1, 3, '<p>F&aacute;brica detergentes - Rede de Terras</p>', 'REFRIANGO', '2011', 'Viana Imovias', '', 0, 1),
(2, 3, '<p>Detergent Factory &ndash; Lands Network</p>', 'REFRIANGO', '2011', 'Viana ', '', 0, 4),
(3, 4, '<p><span>Infra - Estruturas el&eacute;ctricas do centro de lazer da Chevron</span></p>\n<p><span> Parque Tazer&nbsp;</span></p>', 'IMOVIAS', '2011', 'Cabinda', '', 0, 1),
(4, 4, '<p>Infra Structures of Electric leisure Chevron</p>\n<p>Parque Tazer &ndash; Electrical Installation</p>', 'IMOVIAS', '2011', 'Cabinda', '', 0, 4),
(5, 5, '<p>Terminal de 2&ordf; linha do Panguila</p>\n<p><span>Parque contentores</span></p>', 'SOGESTER', '2009', 'Luanda', '', 0, 1),
(6, 5, '<p>Terminal 2nd line Panguila</p>\n<p>Containers Park</p>', 'SOGESTER', '2009', 'Luanda', '', 0, 4),
(7, 6, '<p>F&aacute;brica de electrodom&eacute;sticos Inovia</p>', 'MSF', '2012 / 2013', 'Viana', '10 meses', 0, 1),
(8, 6, '<p>Appliances Factory Inovia</p>', 'MSF', '2012 / 2013', 'Viana ', '10 months', 0, 4),
(9, 7, '<p><span>Data Center e Call Center Movicel</span></p>', 'SOARES DA COSTA', '2013 / 2014', 'Talatona / Luanda', '10 meses', 0, 1),
(10, 7, '<p>Data Center and Call Center Movicel</p>', 'SOARES DA COSTA', '2013 / 2014', 'Viana Imovias ING3', '10 months', 0, 4),
(11, 8, '<p>Equipamento de AVAC da sala de recontagem do BNA</p>', 'FDO / ABB', '2010', 'Luanda', '', 0, 1),
(12, 8, '<p>HVAC equipment room recounting the BNA</p>', 'FDO / ABB', '2010', 'Luanda', '', 0, 4),
(15, 10, '<p>Quadros de baixa tens&atilde;o dos PT1 e PT2</p>\n<p><span>Fornec. e montagem Q.E.</span></p>', 'REFRIANGO', '2010', 'Viana', '', 0, 1),
(16, 10, '<p>Supplier and Assembly <strong>Q.E</strong>.</p>', 'REFRIANGO', '2010', 'Viana', '', 0, 4),
(17, 11, '<p><span>Armaz&eacute;m Morro Bento</span></p>', 'BFA', '2009', 'Luanda', '', 0, 1),
(18, 11, '<p>Morro Bento Warehouse</p>', 'BFA', '2009', 'Luanda', '', 0, 4),
(19, 12, '<p>IURD - Igreja Universal em Viana</p>\n<p>AVAC</p>', 'FDO / ABB', '2011', 'Viana', '', 0, 1),
(20, 12, '<p>IURD Church</p>\n<p>AVAC</p>', 'FDO / ABB', '2011', 'Viana', '', 0, 4),
(21, 13, '<p><span>Edificio sede do SME - Instala&ccedil;&otilde;es el&eacute;ctricas e mec&acirc;nicas</span></p>', 'MOTA - ENGIL SA', '2007/2008', 'Luanda', '', 0, 1),
(22, 13, '<p>Headquarters building - electrical installations and mechanical</p>', 'MOTA - ENGIL SA', '2007/2008', 'Luanda', '', 0, 4),
(23, 14, '<p><span>Estaleiro DIMA - Instala&ccedil;&otilde;es el&eacute;ctricas</span></p>', 'MOTA - ENGIL SA', '2007/2008', 'Luanda', '', 0, 1),
(24, 14, '<p>DIMA Shipyard &ndash; Electrical Installation</p>', 'MOTA - ENGIL SA', '2007/2008', 'Luanda', '', 0, 4),
(25, 15, '<p><span>Escrit&oacute;rio do 7&ordm; piso do edif&iacute;cio do BPC - Remodela&ccedil;&atilde;o das instala&ccedil;&otilde;es de climatiza&ccedil;&atilde;o</span></p>', 'BFA', '2006', 'Luanda', '', 0, 1),
(26, 15, '<p>Office on the 7th story of BPC &ndash; Refurbishment of air conditioning systems</p>', 'BFA', '2006', 'Luanda', '', 0, 4),
(27, 16, '<p><span>Manuten&ccedil;&atilde;o dos equipamentos de climatiza&ccedil;&atilde;o</span></p>', 'AMEC SPIE OGS', '2006', 'Luanda', '', 0, 1),
(28, 16, '<p>Maintenance of HVAC equipment</p>', 'AMEC SPIE OGS', '2006', 'Luanda', '', 0, 4),
(29, 17, '<p><span>Ilumina&ccedil;&atilde;o p&uacute;blica da estrada Gamek/Gepa - Instala&ccedil;&otilde;es el&eacute;ctricas</span></p>', 'MOTA - ENGIL SA', '2005 / 2006', 'Luanda', '', 0, 1),
(30, 17, '<p>Lighting of public road Gamek/Gepa &ndash; Electrical Installation</p>', 'MOTA - ENGIL SA', '2005 / 2006', 'Luanda', '', 0, 4),
(31, 18, '<p><span>Projecto D&aacute;lia - HVAC - Staff Traning Equipment</span></p>', 'AMEC SPIE OGS', '2006', 'Luanda', '', 0, 1),
(32, 18, '<p>D&aacute;lia Project - HVAC - Staff Traning Equipment</p>', 'AMEC SPIE OGS', '2006', 'Luanda', '', 0, 4),
(33, 19, '<p><span>Instala&ccedil;&otilde;es El&eacute;ctricas</span></p>', 'CONVENTO DOS PADRES CAPUCHINHOS', '1991 / 1992', 'Luanda', '', 0, 1),
(34, 19, '<p>Electrical Installation</p>', 'CONVENTO DOS PADRES CAPUCHINHOS', '1991 / 1992', 'Luanda', '', 0, 4),
(35, 20, '<p><span>Instala&ccedil;&otilde;es El&eacute;ctricas</span></p>', 'CONVENTO DAS IRMÃS TERESINHAS', '1991/1992', 'Luanda', '', 0, 1),
(36, 20, '<p>Electrical Installation</p>', 'CONVENTO DAS IRMÃS TERESINHAS', '1991/1992', 'Luanda', '', 0, 4),
(37, 21, '<p><span>Instala&ccedil;&otilde;es El&eacute;ctricas</span></p>', 'SOGEC', '1991/1992', 'Angola', '', 0, 1),
(38, 21, '<p>Electrical Installation</p>', 'SOGEC', '1991/1992', 'Angola', '', 0, 4),
(39, 22, '<p><span>Instala&ccedil;&otilde;es El&eacute;ctricas de Ilumina&ccedil;&atilde;o Torres</span></p>', 'FILDA', '1991', 'Luanda', '', 0, 1),
(40, 22, '<p>Electrical Installation of Lighting Towers</p>', 'FILDA', '1991', 'Luanda', '', 0, 4),
(41, 23, '<p><span>Instala&ccedil;&otilde;es El&eacute;ctricas</span></p>', 'Reitoria da Universidade de Luanda', '1989/1990', 'Luanda', '', 0, 1),
(42, 23, '<p>Electrical Installation</p>', 'Reitoria da Universidade de Luanda', '1989/1990', 'Luanda', '', 0, 4),
(43, 24, '<p><span>Instala&ccedil;&otilde;es El&eacute;ctricas</span></p>', 'Instituto Carl Marx', '1988/1999', 'Luanda', '', 0, 1),
(44, 24, '<p>Electrical Installation</p>', 'Instituto Carl Marx', '1988/1999', 'Luanda', '', 0, 4),
(45, 25, '<p>Instala&ccedil;&otilde;es El&eacute;ctricas</p>', 'Hotel D. João II', '1987/1988', 'Angola', '', 0, 1),
(46, 25, '<p>Electrical Installation</p>', 'Hotel D. João II', '1987/1988', 'Angola', '', 0, 4),
(47, 26, '<p>Centro Log&iacute;stico Hoteleiro Viana</p>\n<p>Centro Log&iacute;stico Hoteleiro Catumbela</p>\n<p>Centro Log&iacute;stico Hoteleiro Namibe</p>\n<p>Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'AAA ACTIVOS LDA', '2013/2014', 'Viana/Catumbela/Namibe', '12 meses', 0, 1),
(48, 26, '<p>Hotel Logistic Center Viana</p>\n<p>Hotel Logistic Center Catumbela</p>\n<p>Hotel Logistic Center Namibe</p>\n<p>Electrical Installation</p>', 'AAA ACTIVOS LDA', '2013/2014', 'Viana/Catumbela/Namibe', '12 months', 0, 4),
(49, 27, '<p><span>Hotel Terminus - Electricidade / AVAC</span></p>', 'IMOGESTIN', '2012/2014', 'Lobito', '18 meses', 0, 1),
(50, 27, '<p>Hotel Terminus - Electricity/HVAC</p>', 'IMOGESTIN', '2012/2014', 'Lobito', '10 months', 0, 4),
(51, 28, '<p><span>Porto Luanda - Ilumina&ccedil;&atilde;o e Redes</span></p>', 'ZAGOPE', '2012 / 2013', 'Luanda', '9 meses', 0, 1),
(52, 28, '<p>Luanda Harbour &ndash; Lighting and Networks</p>', 'ZAGOPE', '2012 / 2013', 'Luanda', '9 months', 0, 4),
(53, 29, '<p>TOFA - Armaz&eacute;m de embalagem</p>\n<p>Instala&ccedil;&otilde;es el&eacute;ctricas, hidraulicas e AVAC</p>', 'SOARES DA COSTA', '2012 / 2013', 'Cacuaco ', '8 meses', 0, 1),
(54, 29, '<p>TOFA &ndash; Warehouse Packaging</p>\n<p>Electric installation, hydraulic and HVAC</p>', 'SOARES DA COSTA', '2012 / 2013', 'Cacuaco', '8 months', 0, 4),
(55, 30, '<p><span>Universidade Agostinho Neto - Infraestruturas el&eacute;ctricas</span></p>', 'SOMAGUE', '2012/2014', 'Kilamba Kiaxi', '14 meses', 0, 1),
(56, 30, '<p>Universidade Agostinho Neto - Electrical Infrastructures</p>', 'SOMAGUE', '2012/2014', 'Kilamba Kiaxi', '14 months', 0, 4),
(57, 31, '<p><span>Manuten&ccedil;&atilde;o Edif&iacute;cio Sede&nbsp;</span></p>', 'SME', '2013 / 2014', 'Luanda', '12 meses', 0, 1),
(58, 31, '<p>Maintenance Headquarters</p>', 'SME', '2013 / 2014', 'Luanda', '12 months', 0, 4),
(59, 32, '<p>Urbaniza&ccedil;&atilde;o da Cabaia</p>\n<p>Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'AAA ACTIVOS LDA', '2013 / 2014', 'Lobito', '12 meses', 0, 1),
(60, 32, '<p>Urbaniza&ccedil;&atilde;o da Cabaia</p>\n<p>Electrical Installation</p>', 'AAA ACTIVOS LDA', '2013 / 2014', 'Lobito', '12 months', 0, 4),
(61, 33, '<p><span>Armaz&eacute;m / Telheiros</span></p>', 'REFRIANGO', '2012 ', 'Viana ', '4 meses', 0, 1),
(62, 33, '<p>Warehouse/Roofing</p>', 'REFRIANGO', '2012', 'Viana', '4 months', 0, 4),
(63, 34, '<p><span>Manuten&ccedil;&atilde;o Edif&iacute;cio Sede</span></p>', 'SME', '2012 / 2013', 'Luanda', '12 meses', 0, 1),
(64, 34, '<p>Maintenance of HQ</p>', 'SME', '2012 / 2013', 'Luanda', '12 months', 0, 4),
(65, 35, '<p>Instituto Nacional de Estat&iacute;stica</p>', 'SOARES DA COSTA', '2012/2013', 'Luanda', '14 meses', 0, 1),
(66, 35, '<p>National Statistical Institute</p>', 'SOARES DA COSTA', '2012/2013', 'Luanda', '14 months', 0, 4),
(67, 36, '<p>Condominio Atl&acirc;ntico</p>', 'IMOGESTIN', '2012/2013', 'Lobito', '12 meses', 0, 1),
(68, 36, '<p>Condominium Atlantic</p>', '', '2012/2013', 'Lobito', '12 months', 0, 4),
(69, 37, '<p>Restaurante Maianga</p>', 'SOARES DA COSTA', '2011', 'Luanda', '', 0, 1),
(70, 37, '<p>Maianga restaurant</p>', 'SOARES DA COSTA', '4 months', 'Luanda', '', 0, 4),
(71, 38, '<p>Edificio Kaluanda</p>', 'OPWAY', '2011', 'Luanda', '', 0, 1),
(72, 38, '<p>Kaluanda Building</p>', 'OPWAY', '2011', 'Luanda', '', 0, 4),
(73, 39, '<p>Ilumina&ccedil;&atilde;o exterior da refinaria de Luanda</p>', 'MONTE ADRIANO', '2011', 'Luanda', '', 0, 1),
(74, 39, '<p>Outdoor Lighting of the Luanda refinery</p>', 'MONTE ADRIANO', '2011', 'Luanda', '', 0, 4),
(75, 40, '<p>Instala&ccedil;&atilde;o el&eacute;ctrica de m&aacute;quinas de processo da f&aacute;brica 2</p>', 'REFRIANGO', '2011', 'Viana', '', 0, 1),
(76, 40, '<p>Electrical installation of process machinery factory 2</p>', 'REFRIANGO', '2011', 'Viana', '', 0, 4),
(77, 41, '<p>Infra Estruturas el&eacute;ctricas do condomin&iacute;o Cajueiro</p>', 'ALBASE', '2012', 'Cabinda', '', 0, 1),
(78, 41, '<p>Infrastructures of electrical condominium Cajueiro</p>', 'ALBASE', '2012', 'Cabinda', '', 0, 4),
(79, 42, '<p>Armaz&eacute;ns da Score na Boavista</p>', 'MSF', '2010', 'Luanda', '', 0, 1),
(80, 42, '<p>Score warehouses in Boavista</p>', 'MSF', '2010', 'Luanda', '', 0, 4),
(81, 43, '<p>Ag&ecirc;ncia do BFA do Dundo - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2008', 'Luanda', '', 0, 1),
(82, 43, '<p>Agency BFA Dundo - Electrical Installations</p>', 'MOTA - ENGIL SA', '2008', 'Luanda', '', 0, 4),
(83, 44, '<p>Ag&ecirc;ncia do BFA de Lucapa - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2008', 'Luanda', '', 0, 1),
(84, 44, '<p>Agency BFA Lucapa - Electrical Installations</p>', 'MOTA - ENGIL SA', '2008', 'Luanda', '', 0, 4),
(85, 45, '<p>Ag&ecirc;ncia do BFA da C&aacute;ala - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2008', 'Luanda', '', 0, 1),
(86, 45, '<p>Agency BFA Ca&aacute;la - Electrical Installations</p>', 'MOTA - ENGIL SA', '2008', 'Luanda', '', 0, 4),
(87, 46, '<p>Ag&ecirc;ncia do BFA do Huambo 3 - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2008', 'Luanda', '', 0, 1),
(88, 46, '<p>Agency BFA Huambo 3 - Electrical Installations</p>', 'MOTA - ENGIL SA', '2008', 'Luanda', '', 0, 4),
(89, 47, '<p>Ag&ecirc;ncia do BFA do Lubango CFM - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2008', 'Luanda', '', 0, 1),
(90, 47, '<p>Agency BFA Lubango CFM - Electrical Installations</p>', 'MOTA - ENGIL SA', '2008', 'Luanda', '', 0, 4),
(91, 48, '<p>Ag&ecirc;ncia do BFA Viana 2 - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2007', 'Luanda', '', 0, 1),
(92, 48, '<p>Agency BFA Viana 2 - Electrical installations</p>', 'MOTA - ENGIL SA', '2007', 'Luanda', '', 0, 4),
(93, 49, '<p>Ag&ecirc;ncia do BFA da Cuca Cazenga - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2007 ', 'Luanda', '', 0, 1),
(94, 49, '<p>Agency BFA Cuca Cazenga - Electrical Installations</p>', 'MOTA - ENGIL SA', '2007 ', 'Luanda', '', 0, 4),
(95, 50, '<p>Ag&ecirc;ncia do Huambo 2 - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2006/2007', 'Luanda', '', 0, 1),
(96, 50, '<p>Agency Huambo 2 - Electrical installations</p>', 'MOTA - ENGIL SA', '2006/2007', 'Luanda', '', 0, 4),
(97, 51, '<p>Ag&ecirc;ncia do BFA da Encisa - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2006', 'Luanda', '', 0, 1),
(98, 51, '<p>Agency of the BFA Encisa - Electrical Installations</p>', 'MOTA - ENGIL SA', '2006', 'Luanda', '', 0, 4),
(99, 52, '<p>Ag&ecirc;ncia do BFA do Cazenga - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2006', 'Luanda', '', 0, 1),
(100, 52, '<p>Agency BFA Cazenga - Electrical Installations</p>', 'MOTA - ENGIL SA', '2006', 'Luanda', '', 0, 4),
(101, 53, '<p>Ag&ecirc;ncia do BFA do Hotel Presidente - Instala&ccedil;&otilde;es el&eacute;tricas</p>', 'MOTA - ENGIL SA', '2006 ', 'Luanda', '', 0, 1),
(102, 53, '<p>Agency BFA Hotel President - Electrical installations</p>', 'MOTA - ENGIL SA', '2006 ', 'Luanda', '', 0, 4),
(103, 54, '<p>Ag&ecirc;ncia do BFA de Mulemba 3 - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2006 ', 'Luanda ', '', 0, 1),
(104, 54, '<p>Agency BFA\'s Mulemba 3 - Electrical Installations</p>', 'MOTA - ENGIL SA', '2006 ', 'Luanda', '', 0, 4),
(105, 55, '<p>Instala&ccedil;&otilde;es el&eacute;ctricas e de AVAC no novo CPD - Edificio sede</p>', 'BFA', '2006 ', 'Luanda ', '', 0, 1),
(106, 55, '<p>Electrical installations in the new CPD - Edificio seat</p>', 'BFA', '2006 ', 'Luanda', '', 0, 4),
(107, 56, '<p>Manuten&ccedil;&atilde;o dos equipamentos de climatiza&ccedil;&atilde;o do condominio de Luanda sul</p>', 'MOTA - ENGIL SA', '2006/07/08', 'Luanda ', '', 0, 1),
(108, 56, '<p>Maintenance of equipment condominium south of Luanda</p>', 'MOTA - ENGIL SA', '2006/07/08', 'Luanda', '', 0, 4),
(109, 57, '<p>Ag&ecirc;ncia BFA Rei Katayavala - Instala&ccedil;&otilde;es el&eacute;ctricas e mec&acirc;nicas</p>', 'OPCA', '2006 ', 'Luanda ', '', 0, 1),
(110, 57, '<p>Agency BFA King Katayavala - Electrical installations and mechanical</p>', 'OPCA', '2006 ', 'Luanda ', '', 0, 4),
(111, 58, '<p>Ag&ecirc;ncia do BFA de Cabinda - Instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'MOTA - ENGIL SA', '2006 ', 'Luanda ', '', 0, 1),
(112, 58, '<p>Agency BFA Cabinda - Electrical Installations</p>', 'MOTA - ENGIL SA', '2006 ', 'Luanda', '', 0, 4),
(113, 59, '<p>Sistemas de climatiza&ccedil;&atilde;o da ag&ecirc;ncia do Waco - Kungo</p>', 'BFA', '2006 ', 'Waco - Kungo', '', 0, 1),
(114, 59, '<p>HVAC systems agency of Waco - Kungo</p>', 'BFA', '2006 ', 'Waco - Kungo', '', 0, 4),
(115, 60, '<p>Manuten&ccedil;&atilde;o dos equipamentos de climatiza&ccedil;&atilde;o</p>', 'AMEC SPIE OGS', '2006 ', 'Luanda ', '', 0, 1),
(116, 60, '<p>Maintenance of HVAC equipment</p>', 'AMEC SPIE OGS', '2006 ', 'Luanda', '', 0, 4),
(117, 61, '<p>Staff - House - Remodela&ccedil;&atilde;o das instala&ccedil;&otilde;es el&eacute;ctricas, invers&atilde;o rede / grupo e ar condicionado.</p>', 'AMEC PARAGON', '2006 ', 'Luanda', '', 0, 1),
(118, 61, '<p>Staff - House - Refurbishment of electrical installations, inversion network / group and air conditioning.</p>', 'AMEC PARAGON', '2006 ', 'Luanda ', '', 0, 4),
(119, 62, '<p>Escrit&oacute;rio do 7&ordm; piso do edificio do BPC - Remodela&ccedil;&atilde;o das instala&ccedil;&otilde;es de climatiza&ccedil;&atilde;o</p>', 'BFA', '2006 ', 'Luanda', '', 0, 1),
(120, 62, '<p>Office of the 7th floor of the building BPC - Refurbishment of air conditioning installations</p>', 'BFA', '2006 ', 'Luanda ', '', 0, 4),
(121, 63, '<p>Escrit&oacute;rio do 7&ordm; piso do edificio do BPC - Remodela&ccedil;&atilde;o das instala&ccedil;&otilde;es el&eacute;ctricas</p>', 'BFA', '2006 ', 'Luanda', '', 0, 1),
(122, 63, '<p>Office of the 7th floor of the building BPC - Refurbishment of electrical installations</p>', 'BFA', '2006 ', 'Luanda ', '', 0, 4),
(123, 64, '<p>Ag&ecirc;ncia de Miss&atilde;o - Remodela&ccedil;&atilde;o da instala&ccedil;&atilde;o el&eacute;ctrica e automatiza&ccedil;&atilde;o do sistema de invers&atilde;o rede / grupo</p>', 'BFA', '2005 ', 'Luanda ', '', 0, 1),
(124, 64, '<p>Agency Mission - Refurbishment of electrical installation and automation system inversion network / group</p>', 'BFA', '2005 ', 'Luanda', '', 0, 4),
(125, 65, '<p>Armaz&eacute;m / Telheiros</p>', 'REFRIANGO', '2012', 'Viana', '', 0, 1),
(126, 65, '<p>Armazem / Telheiros</p>', 'REFRIANGO', '2012', 'Viana', '', 0, 4),
(127, 66, '<p><span>TOFA - Armaz&eacute;m de embalagem</span></p>\n<p><span>Instala&ccedil;&otilde;es el&eacute;ctricas, hidraulicas e AVAC</span></p>', 'SOARES DA COSTA', '2012/2013', 'Cacuaco ', '', 0, 1),
(128, 66, '<p><span lang=\"EN-US\">TOFA &ndash; Warehouse Packaging</span></p>\n<p><span lang=\"EN-US\">Electric installation, hydraulic and HVAC</span></p>', 'SOARES DA COSTA', '2012 / 2013', 'Cacuaco', '', 0, 4),
(129, 67, '<p>F&aacute;brica de Electrodom&eacute;sticos Inovia</p>', 'MSF', '2012 / 2013', 'Viana', '', 0, 1),
(130, 67, '<p>Factory appliances Inovia</p>', 'MSF', '2012 / 2013', 'Viana', '', 0, 4),
(131, 68, '<p>Instituto Nacional de Estat&iacute;stica</p>', 'SOARES DA COSTA', '2012/2013', 'Luanda', '', 0, 1),
(132, 68, '<p>National Statistics Institute</p>', 'SOARES DA COSTA', '2012 / 2013', 'Luanda', '', 0, 4),
(133, 69, '<p>Embarcadouro Kapossoca</p>', 'ZAGOPE', '2014', 'Luanda', '3 Meses', 0, 1),
(134, 69, '<p>Kapossoca Docking</p>', 'ZAGOPE', '2014', 'Luanda', '3 Months', 0, 4),
(135, 70, '<p>Gr&aacute;fica Oxigen</p>', 'GRÁFICA OXIGEN', '2014', 'Luanda', '3 Meses', 0, 1),
(136, 70, '<p>Oxigen Graphical</p>', 'OXIGEN GRAPHICAL', '2014', 'Luanda', '3 Months', 0, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`);

--
-- Indexes for table `category_translation`
--
ALTER TABLE `category_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `contents_translation`
--
ALTER TABLE `contents_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_id` (`contents_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_id` (`content_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obras_translation`
--
ALTER TABLE `obras_translation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obras_id` (`obras_id`),
  ADD KEY `index_language_id` (`language_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category_translation`
--
ALTER TABLE `category_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contents_translation`
--
ALTER TABLE `contents_translation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obras`
--
ALTER TABLE `obras`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `obras_translation`
--
ALTER TABLE `obras_translation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contents_translation`
--
ALTER TABLE `contents_translation`
  ADD CONSTRAINT `contents_translation_ibfk_3` FOREIGN KEY (`contents_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_translation_ibfk_4` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `obras_translation`
--
ALTER TABLE `obras_translation`
  ADD CONSTRAINT `FK_id_language_id` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `obras_translation_ibfk_1` FOREIGN KEY (`obras_id`) REFERENCES `obras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
