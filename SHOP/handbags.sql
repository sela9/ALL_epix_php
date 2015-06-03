-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 03 2015 г., 21:11
-- Версия сервера: 5.6.21
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `handbags`
--

-- --------------------------------------------------------

--
-- Структура таблицы `adm`
--

CREATE TABLE IF NOT EXISTS `adm` (
`id` int(10) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `adm`
--

INSERT INTO `adm` (`id`, `login`, `password`) VALUES
(1, 'Root1', '$2y$10$Nl7BLpRJ4efoMZMRAD9dLufBs0Sqvp3P.ZAr4uTvbGpD.PVW17oBy');

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`id` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `link` varchar(250) NOT NULL,
  `color` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=305 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `id_product`, `link`, `color`) VALUES
(5, 1, '17998_b4a3v_a0.jpg', 'green'),
(6, 1, '17998_b4bk_a0.jpg', 'black'),
(7, 1, '17998_b4ma_a0.jpg', 'brown'),
(8, 1, '17998_b4nv_a0.jpg', 'blue'),
(9, 1, '17998_b4tn_a0.jpg', 'brown'),
(10, 1, '17998_b4vr_a0.jpg', 'red'),
(11, 2, '26353_svbk_a0.jpg', 'black'),
(12, 3, '32281_arbk_a0.jpg', 'black'),
(13, 4, '33521_liblk_a0.jpg', 'black'),
(14, 4, '33521_linav_a0.jpg', 'blue'),
(15, 4, '33521_linud_a0.jpg', 'beige'),
(16, 4, '33521_lipbu_a0.jpg', 'blue'),
(17, 4, '33521_lired_a0.jpg', 'red'),
(18, 5, '33524_svdk6_a0.jpg', 'gray'),
(19, 6, '33533_liblk_a0.jpg', 'black'),
(20, 7, '33545_liblk_a0.jpg', 'black'),
(21, 8, '33547_liblk_a0.jpg', 'black'),
(22, 8, '33547_licrd_a0.jpg', 'red'),
(23, 8, '33547_liden_a0.jpg', 'blue'),
(24, 8, '33547_linav_a0.jpg', 'blue'),
(25, 8, '33547_linud_a0.jpg', 'beige'),
(26, 8, '33547_svpk_a0.jpg', 'pink'),
(27, 9, '33549_liblk_a0.jpg', 'black'),
(28, 9, '33549_linud_a0.jpg', 'beige'),
(29, 10, '33577_liblk_a0.jpg', 'black'),
(30, 10, '33577_svsd_a0.jpg', 'brown'),
(31, 11, '33684_akgun_a0.jpg', 'gray'),
(32, 12, '33689_lichk_a0.jpg', 'white'),
(33, 12, '33689_linud_a0.jpg', 'beige'),
(34, 12, '33689_qbbk_a0.jpg', 'black'),
(35, 13, '33690_liapr_a0.jpg', 'beige'),
(36, 13, '33690_lipbu_a0.jpg', 'blue'),
(37, 13, '33690_qbbk_a0.jpg', 'black'),
(38, 14, '33727_liblk_a0.jpg', 'black'),
(39, 14, '33727_lisad_a0.jpg', 'brown'),
(40, 15, '33728_liapr_a0.jpg', 'pink'),
(41, 15, '33728_lipbu_a0.jpg', 'blue'),
(42, 16, '33737_liaa8_a0.jpg', 'brown'),
(43, 16, '33737_svdk6_a0.jpg', 'gray'),
(44, 17, '33861_svte_a0.jpg', 'blue'),
(45, 18, '33915_liblk_a0.jpg', 'black'),
(46, 18, '33915_linav_a0.jpg', 'blue'),
(47, 18, '33915_linud_a0.jpg', 'beige'),
(48, 18, '33915_lipwe_a0.jpg', 'yellow'),
(49, 19, '33995_liblk_a0.jpg', 'black'),
(50, 19, '33995_lichk_a0.jpg', 'white'),
(51, 19, '33995_linud_a0.jpg', 'beige'),
(52, 19, '33995_lipbu_a0.jpg', 'blue'),
(56, 19, '33995_svpk_a0.jpg', 'pink'),
(57, 20, '33996_liblk_a0.jpg', 'black'),
(58, 20, '33996_linud_a0.jpg', 'beige'),
(59, 20, '33996_lipbu_a0.jpg', 'blue'),
(60, 20, '33996_m1.jpg', ' '),
(61, 20, '33996_m2.jpg', ' '),
(62, 20, '33996_svpk_a0.jpg', 'pink'),
(63, 21, '34311_liapr_a0.jpg', 'pink'),
(64, 21, '34311_liblk_a0.jpg', 'black'),
(65, 21, '34311_lichk_a0.jpg', 'white'),
(66, 22, '34312_liblk_a0.jpg', 'black'),
(67, 22, '34312_linav_a0.jpg', 'blue'),
(68, 22, '34312_linud_a0.jpg', 'beige'),
(69, 22, '34312_lipbu_a0.jpg', 'blue'),
(70, 22, '34312_lipwe_a0.jpg', 'yellow'),
(71, 23, '34334_liapr_a0.jpg', 'beige'),
(72, 23, '34334_lipbu_a0.jpg', 'blue'),
(73, 24, '34335_liblk_a0.jpg', 'black'),
(74, 24, '34335_lichk_a0.jpg', 'white'),
(75, 25, '34335_m1.jpg', ' '),
(76, 26, '34339_liapr_a0.jpg', 'pink'),
(77, 26, '34339_liblk_a0.jpg', 'black'),
(78, 27, '34340_liblk_a0.jpg', 'black'),
(79, 27, '34340_lichk_a0.jpg', 'white'),
(80, 27, '34340_liden_a0.jpg', 'blue'),
(81, 27, '34340_linud_a0.jpg', 'beige'),
(82, 27, '34340_lired_a0.jpg', 'red'),
(83, 27, '34340_m1.jpg', ' '),
(84, 27, '34340_m2.jpg', ' '),
(85, 27, '34340_svpk_a0.jpg', 'pink'),
(86, 28, '34351_lidti_a0.jpg', 'beige'),
(87, 29, '34355_lidti_a0.jpg', 'beige'),
(88, 30, '34361_licmb_a0.jpg', 'blue'),
(89, 31, '34362_liblk_a0.jpg', 'black'),
(90, 31, '34362_linav_a0.jpg', 'blue'),
(91, 31, '34362_linud_a0.jpg', 'beige'),
(92, 31, '34362_lired_a0.jpg', 'red'),
(93, 31, '34362_m1.jpg', ' '),
(94, 31, '34362_m2.jpg', ' '),
(95, 32, '34370_liapr_a0.jpg', 'pink'),
(96, 32, '34370_liblk_a0.jpg', 'black'),
(97, 32, '34370_linud_a0.jpg', 'beige'),
(98, 32, '34370_svpk_a0.jpg', 'pink'),
(99, 33, '34388_liblk_a0.jpg', 'black'),
(100, 33, '34388_lichk_a0.jpg', 'white'),
(101, 33, '34388_linav_a0.jpg', 'blue'),
(102, 33, '34388_linud_a0.jpg', 'beige'),
(103, 33, '34388_lired_a0.jpg', 'red'),
(104, 34, '34396_lichk_a0.jpg', 'white'),
(105, 35, '34397_liapr_a0.jpg', 'pink'),
(106, 35, '34397_liblk_a0.jpg', 'black'),
(107, 36, '34398_liblk_a0.jpg', 'black'),
(108, 36, '34398_lichk_a0.jpg', 'white'),
(109, 36, '34398_qbnud_a0.jpg', 'beige'),
(110, 37, '34404_svdrk_a0.jpg', 'red'),
(111, 37, '34404_svdst_a0.jpg', 'black'),
(112, 38, '34408_m1.jpg', ' '),
(113, 38, '34408_m2.jpg', ' '),
(114, 38, '34408_mwbk_a0.jpg', 'black'),
(115, 39, '34409_licah_a0.jpg', 'white'),
(116, 40, '34417_licah_a0.jpg', 'white'),
(117, 40, '34417_lidtd_a0.jpg', 'pink'),
(118, 40, '34417_m1.jpg', ' '),
(119, 40, '34417_m2.jpg', ' '),
(120, 41, '34420_lia4x_a0.jpg', 'beige'),
(121, 41, '34420_qbdow_a0.jpg', 'brown'),
(122, 42, '34426_liblk_a0.jpg', 'black'),
(123, 42, '34426_lichk_a0.jpg', 'white'),
(124, 42, '34426_liden_a0.jpg', 'blue'),
(125, 43, '34429_lichk_a0.jpg', 'white'),
(126, 44, '34440_liden_a0.jpg', 'blue'),
(127, 45, '34445_litn2_a0.jpg', 'beige'),
(128, 46, '34448_liblk_a0.jpg', 'black'),
(129, 47, '34454_svdst_a0.jpg', 'black'),
(130, 48, '34456_liwah_a0.jpg', 'blue'),
(131, 49, '34471_svdrk_a0.jpg', 'red'),
(132, 49, '34471_svdss_a0.jpg', 'blue'),
(133, 50, '34474_liblk_a0.jpg', 'black'),
(134, 50, '34474_licrd_a0.jpg', 'red'),
(135, 50, '34474_lisad_a0.jpg', 'brown'),
(136, 50, '34474_svde_a0.jpg', 'blue'),
(137, 51, '34481_svdst_a0.jpg', 'black'),
(138, 52, '34501_qbden_a0.jpg', 'blue'),
(139, 53, '34504_litn2_a0.jpg', 'beige'),
(140, 54, '34505_licrd_a0.jpg', 'red'),
(141, 54, '34505_svde_a0.jpg', 'blue'),
(142, 55, '34506_liblk_a0.jpg', 'black'),
(143, 55, '34506_liden_a0.jpg', 'blue'),
(144, 56, '34516_qbdod_a0.jpg', 'blue'),
(145, 57, '34522_licmb_a0.jpg', 'blue'),
(146, 57, '34522_svbk_a0.jpg', 'black'),
(147, 57, '34522_svpk_a0.jpg', 'pink'),
(148, 58, '34533_liblk_a0.jpg', 'black'),
(149, 58, '34533_m1.jpg', ' '),
(150, 58, '34533_m2.jpg', ' '),
(151, 59, '34540_litn2_a0.jpg', 'beige'),
(152, 60, '34542_licmh_a0.jpg', 'red'),
(153, 60, '34542_m1.jpg', ' '),
(154, 60, '34542_m2.jpg', ' '),
(155, 61, '34546_licpv_a0.jpg', 'brown'),
(156, 61, '34546_lidrx_a0.jpg', 'brown'),
(157, 62, '34547_lib7m_a0.jpg', 'beige'),
(158, 63, '34558_m1.jpg', ' '),
(159, 63, '34558_m2.jpg', ' '),
(160, 63, '34558_svdpz_a0.jpg', 'blue'),
(161, 64, '34563_liblk_a0.jpg', 'black'),
(162, 64, '34563_linav_a0.jpg', 'blue'),
(163, 64, '34563_linud_a0.jpg', 'beige'),
(164, 64, '34563_lired_a0.jpg', 'red'),
(165, 65, '34595_licpv_a0.jpg', 'brown'),
(166, 65, '34595_lidrx_a0.jpg', 'brown'),
(167, 66, '34748_liblk_a0.jpg', 'black'),
(168, 67, '34749_qbdod_a0.jpg', 'blue'),
(169, 68, '34751_lichk_a0.jpg', 'white'),
(170, 69, '34756_lichk_a0.jpg', 'white'),
(171, 70, '34758_lichk_a0.jpg', 'white'),
(172, 71, '34771_liapr_a0.jpg', 'pink'),
(173, 72, '34774_m1.jpg', ' '),
(174, 72, '34774_m2.jpg', ' '),
(175, 72, '34774_svdrl_a0.jpg', 'white'),
(176, 72, '34774_svdss_a0.jpg', 'blue'),
(177, 72, '34774_svdst_a0.jpg', 'black'),
(178, 73, '34775_m1.jpg', ' '),
(179, 73, '34775_m2.jpg', ' '),
(180, 73, '34775_m3.jpg', ' '),
(181, 73, '34775_svdst_a0.jpg', 'black'),
(182, 74, '34812_liden_a0.jpg', 'blue'),
(183, 74, '34812_lired_a0.jpg', 'red'),
(184, 75, '34817_liblk_a0.jpg', 'black'),
(185, 75, '34817_linud_a0.jpg', 'beige'),
(186, 75, '34817_lired_a0.jpg', 'red'),
(187, 76, '35092_licpv_a0.jpg', 'brown'),
(188, 76, '35092_lidrx_a0.jpg', 'brown'),
(189, 76, '35092_lidry_a0.jpg', 'brown'),
(190, 77, '35750_wrcrm_a0.jpg', 'white'),
(191, 77, '35750_wre1b_a0.jpg', 'yellow'),
(192, 77, '35750_wre60_a0.jpg', 'brown'),
(193, 78, '35751_wre0o_a0.jpg', 'pink'),
(194, 79, '35753_wre5z_a0.jpg', 'brown'),
(195, 79, '35753_wrprw_a0.jpg', 'blue'),
(196, 80, '35754_wrcrm_a0.jpg', 'white'),
(197, 80, '35764_wrcrm_a0.jpg', 'white'),
(198, 81, '35767_wre1b_a0.jpg', 'yellow'),
(199, 81, '35767_wrprw_a0.jpg', 'blue'),
(200, 82, '35768_wre0o_a0.jpg', 'pink'),
(201, 83, '35771_wrpin_a0.jpg', 'pink'),
(202, 84, '35792_m1.jpg', ' '),
(203, 84, '35792_m2.jpg', ' '),
(204, 84, '35792_wrcrm_a0.jpg', 'white'),
(205, 85, '35796_wre0o_a0.jpg', 'pink'),
(206, 85, '35796_wrprw_a0.jpg', 'blue'),
(207, 86, '35798_wrcrm_a0.jpg', 'white'),
(208, 86, '35798_wre0o_a0.jpg', 'pink'),
(209, 86, '35798_wre0q_a0.jpg', 'yellow'),
(210, 86, '35798_wre5h_a0.jpg', 'green'),
(211, 86, '35798_wrmnt_a0.jpg', 'green'),
(212, 86, '35798_wrpch_a0.jpg', 'pink'),
(213, 86, '35798_wrprw_a0.jpg', 'blue'),
(214, 86, '35798_wrtng_a0.jpg', 'red'),
(215, 87, '35799_wre6a_a0.jpg', 'blue'),
(216, 87, '35799_wre6b_a0.jpg', 'brown'),
(217, 87, '35799_wre6c_a0.jpg', 'green'),
(218, 88, '35800_wrnat_a0.jpg', 'beige'),
(219, 89, '35827_wrcrm_a0.jpg', 'white'),
(220, 90, '35851_wrprw_a0.jpg', 'blue'),
(221, 91, '35853_wrsad_a0.jpg', 'brown'),
(222, 92, '52348_liapr_a0.jpg', 'beige'),
(223, 92, '52348_liblk_a0.jpg', 'black'),
(224, 92, '52348_liden_a0.jpg', 'blue'),
(225, 92, '52348_linav_a0.jpg', 'blue'),
(226, 92, '52348_linud_a0.jpg', 'beige'),
(227, 92, '52348_lipwe_a0.jpg', 'yellow'),
(228, 98, '52377_liblk_a0.jpg', 'black'),
(229, 98, '52377_svsd_a0.jpg', 'brown'),
(230, 99, '52385_liapr_a0.jpg', 'beige'),
(231, 99, '52385_liblk_a0.jpg', 'black'),
(232, 100, '52576_lic7c_a0.jpg', 'brown'),
(233, 100, '52576_svdk6_a0.jpg', 'black'),
(234, 101, '52778_liapr_a0.jpg', 'pink'),
(235, 102, '52834_svdrl_a0.jpg', 'white'),
(236, 102, '52834_svdst_a0.jpg', 'black'),
(237, 103, '52883_svdtc_a0.jpg', 'blue'),
(238, 104, '52895_liblk_a0.jpg', 'black'),
(239, 104, '52895_lired_a0.jpg', 'red'),
(240, 105, '52896_liblk_a0.jpg', 'black'),
(241, 105, '52896_liden_a0.jpg', 'blue'),
(242, 105, '52896_linud_a0.jpg', 'beige'),
(243, 105, '52896_lipbu_a0.jpg', 'blue'),
(244, 105, '52896_lired_a0.jpg', 'red'),
(245, 105, '52896_svpk_a0.jpg', 'pink'),
(246, 106, '52901_liapr_a0.jpg', 'pink'),
(247, 106, '52901_liblk_a0.jpg', 'black'),
(248, 106, '52901_lichk_a0.jpg', 'white'),
(249, 106, '52901_liden_a0.jpg', 'blue'),
(250, 106, '52901_linud_a0.jpg', 'beige'),
(251, 106, '52901_lired_a0.jpg', 'red'),
(252, 106, '52901_svpk_a0.jpg', 'pink'),
(253, 107, '52906_lichk_a0.jpg', 'white'),
(254, 107, '52906_linud_a0.jpg', 'beige'),
(255, 107, '52906_lired_a0.jpg', 'red'),
(256, 108, '52909_lipbu_a0.jpg', 'blue'),
(257, 108, '52909_litn2_a0.jpg', 'beige'),
(258, 109, '52943_liblk_a0.jpg', 'black'),
(259, 109, '52943_liden_a0.jpg', 'blue'),
(260, 109, '52943_lired_a0.jpg', 'red'),
(261, 110, '52948_liapr_a0.jpg', 'pink'),
(262, 110, '52948_liblk_a0.jpg', 'black'),
(263, 110, '52948_lichk_a0.jpg', 'white'),
(264, 110, '52948_lired_a0.jpg', 'red'),
(265, 111, '53005_litn2_a0.jpg', 'beige'),
(266, 112, '53006_lidrx_a0.jpg', 'brown'),
(267, 112, '53006_svcq_a0.jpg', 'black'),
(268, 113, '53007_litn2_a0.jpg', 'beige'),
(269, 114, '53032_mwbk_a0.jpg', 'black'),
(270, 115, '53107_licah_a0.jpg', 'white'),
(271, 115, '53107_lidtd_a0.jpg', 'pink'),
(272, 116, '53108_liblk_a0.jpg', 'black'),
(273, 117, '71622_qbash_a0.jpg', 'gray'),
(274, 117, '71622_qbbk_a0.jpg', 'black'),
(275, 117, '71622_qbdbr_a0.jpg', 'brown'),
(276, 117, '71622_qbden_a0.jpg', 'blue'),
(277, 117, '71622_qbmq_a0.jpg', 'blue'),
(278, 117, '71622_qbred_a0.jpg', 'red'),
(279, 118, '9061_blk_a0.jpg', 'black'),
(280, 118, '9061_tan_a0.jpg', 'brown'),
(281, 119, '9525_blk_a0.jpg', 'black'),
(282, 119, '9525_tan_a0.jpg', 'brown'),
(283, 120, '9790_blk_a0.jpg', 'black'),
(284, 120, '9790_mah_a0.jpg', 'brown'),
(285, 120, '9790_tan_a0.jpg', 'brown'),
(286, 121, '9870_mah_a0.jpg', 'brown'),
(287, 121, '9870_tan_a0.jpg', 'brown'),
(288, 122, '9927_blk_a0.jpg', 'black'),
(289, 122, '9927_mah_a0.jpg', 'brown'),
(290, 122, '9927_svbk_a0.jpg', 'black'),
(291, 122, '9927_tan_a0.jpg', 'brown'),
(292, 123, '9951_blk_a0.jpg', 'black'),
(293, 123, '9951_svbk_a0.jpg', 'black'),
(294, 123, '9951_tan_a0.jpg', 'brown'),
(295, 124, '9966_blk_a0.jpg', 'black'),
(296, 124, '9966_svbk_a0.jpg', 'black'),
(297, 124, '9966_tan_a0.jpg', 'brown'),
(303, 128, '35011_sve2m_a0.jpg', 'red'),
(304, 128, '35011_m1.jpg', '');

-- --------------------------------------------------------

--
-- Структура таблицы `material`
--

CREATE TABLE IF NOT EXISTS `material` (
`id` int(10) NOT NULL,
  `material_name` varchar(30) NOT NULL,
  `name_full` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `material`
--

INSERT INTO `material` (`id`, `material_name`, `name_full`) VALUES
(1, 'leather', 'Натуральная кожа'),
(2, 'not_leather', 'Искусственная кожа'),
(3, 'cloth', 'Ткань');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(10) NOT NULL,
  `contacts` varchar(250) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `order_summ` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Заказан',
  `OrderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `contacts`, `user_name`, `order_summ`, `status`, `OrderDate`) VALUES
(3, 'fg', 'sd', '33900', 'Завершен', '2015-05-27 21:47:48'),
(4, 'fg', 'sd', '33900', 'Завершен', '2015-05-27 21:47:48'),
(5, 'ed', 'rtvx', '50000', 'Завершен', '2015-05-27 21:47:48'),
(6, 'nikitos@nikitos.ru', 'Никитос', '100999', 'Отменен', '2015-05-27 21:47:48'),
(7, '+7-950-2202020', 'Олег', '89990', 'Подтвержден', '2015-05-27 21:47:48'),
(8, '385-7985', 'Анечка', '66000', 'Подтвержден', '2015-05-27 21:47:48'),
(9, '336-9874', 'Елена', '100000', 'Завершен', '2015-05-27 21:47:48'),
(10, '337-8521', 'Нина', '123450', 'Оплачен', '2015-05-27 21:47:48'),
(11, 'miha', 'Михалыч', '10500', 'Заказан', '2015-06-02 19:22:15'),
(12, '335-2187 спб', 'Димон', '19000', 'Заказан', '2015-06-03 18:46:20');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
`id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(250) NOT NULL,
  `price` float NOT NULL,
  `price_sale` float NOT NULL,
  `material` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `price_sale`, `material`) VALUES
(1, 'Dolce&Gabbana', 'Прекрасная сумка для деволой встречи', 1500, 0, 1),
(2, 'Gucci', 'Сумка украсит ваш поход в театр', 3000, 0, 1),
(3, 'Prada', 'Великолепный выбор для повседневного использования', 8000, 7000, 1),
(4, 'Valentino', 'Подходит к вечернему платью', 9000, 8000, 1),
(5, 'Fendi', 'Прекрасная сумка для деволой встречи', 5000, 0, 1),
(6, 'Mochino', 'Сумка украсит ваш поход в театр', 4000, 0, 1),
(7, 'Arcadia', 'Великолепный выбор для повседневного использования', 2000, 1995, 2),
(8, 'Bottega Veneta', 'Подходит к вечернему платью', 5600, 0, 1),
(9, 'Marino Orlandi', 'Прекрасная сумка для деволой встречи', 9800, 0, 1),
(10, 'Louis Vuitton', 'Сумка украсит ваш поход в театр', 12000, 9000, 1),
(11, 'Dolce&Gabbana', 'Великолепный выбор для повседневного использования', 15000, 6000, 1),
(12, 'Gucci', 'Подходит к вечернему платью', 3000, 0, 1),
(13, 'Prada', 'Прекрасная сумка для деволой встречи', 8000, 0, 1),
(14, 'Valentino', 'Сумка украсит ваш поход в театр', 7500, 0, 2),
(15, 'Fendi', 'Великолепный выбор для повседневного использования', 6000, 3000, 1),
(16, 'Mochino', 'Подходит к вечернему платью', 6000, 0, 1),
(17, 'Arcadia', 'Прекрасная сумка для деволой встречи', 7200, 0, 1),
(18, 'Bottega Veneta', 'Сумка украсит ваш поход в театр', 5000, 0, 1),
(19, 'Marino Orlandi', 'Великолепный выбор для повседневного использования', 2000, 0, 3),
(20, 'Louis Vuitton', 'Подходит к вечернему платью', 1500, 0, 1),
(21, 'Dolce&Gabbana', 'Прекрасная сумка для деволой встречи', 3000, 1500, 1),
(22, 'Gucci', 'Сумка украсит ваш поход в театр', 8000, 0, 1),
(23, 'Prada', 'Великолепный выбор для повседневного использования', 9000, 0, 2),
(24, 'Valentino', 'Подходит к вечернему платью', 5000, 0, 2),
(25, 'Fendi', 'Прекрасная сумка для деволой встречи', 4000, 2000, 2),
(26, 'Mochino', 'Сумка украсит ваш поход в театр', 2000, 0, 2),
(27, 'Arcadia', 'Великолепный выбор для повседневного использования', 5600, 0, 1),
(28, 'Bottega Veneta', 'Подходит к вечернему платью', 9800, 0, 1),
(29, 'Marino Orlandi', 'Прекрасная сумка для деволой встречи', 12000, 0, 1),
(30, 'Louis Vuitton', 'Сумка украсит ваш поход в театр', 15000, 5000, 2),
(31, 'Dolce&Gabbana', 'Великолепный выбор для повседневного использования', 3000, 0, 2),
(32, 'Gucci', 'Подходит к вечернему платью', 8000, 3000, 1),
(33, 'Prada', 'Прекрасная сумка для деволой встречи', 7500, 0, 1),
(34, 'Valentino', 'Сумка украсит ваш поход в театр', 6000, 0, 1),
(35, 'Fendi', 'Великолепный выбор для повседневного использования', 6000, 0, 1),
(36, 'Mochino', 'Подходит к вечернему платью', 7200, 0, 3),
(37, 'Arcadia', 'Прекрасная сумка для деволой встречи', 5000, 0, 3),
(38, 'Bottega Veneta', 'Сумка украсит ваш поход в театр', 2000, 0, 3),
(39, 'Marino Orlandi', 'Великолепный выбор для повседневного использования', 1500, 0, 1),
(40, 'Louis Vuitton', 'Подходит к вечернему платью', 3000, 2800, 1),
(41, 'Dolce&Gabbana', 'Прекрасная сумка для деволой встречи', 8000, 0, 1),
(42, 'Gucci', 'Сумка украсит ваш поход в театр', 9000, 0, 1),
(43, 'Prada', 'Великолепный выбор для повседневного использования', 5000, 0, 1),
(44, 'Valentino', 'Подходит к вечернему платью', 4000, 0, 2),
(45, 'Fendi', 'Прекрасная сумка для деволой встречи', 2000, 0, 2),
(46, 'Mochino', 'Сумка украсит ваш поход в театр', 5600, 5300, 3),
(47, 'Arcadia', 'Великолепный выбор для повседневного использования', 9800, 0, 3),
(48, 'Bottega Veneta', 'Подходит к вечернему платью', 12000, 10999, 1),
(49, 'Marino Orlandi', 'Прекрасная сумка для деволой встречи', 15000, 12000, 1),
(50, 'Louis Vuitton', 'Сумка украсит ваш поход в театр', 3000, 0, 1),
(51, 'Dolce&Gabbana', 'Великолепный выбор для повседневного использования', 8000, 0, 1),
(52, 'Gucci', 'Подходит к вечернему платью', 7500, 0, 1),
(53, 'Prada', 'Прекрасная сумка для деволой встречи', 6000, 0, 1),
(54, 'Valentino', 'Сумка украсит ваш поход в театр', 6000, 5000, 1),
(55, 'Fendi', 'Великолепный выбор для повседневного использования', 7200, 0, 2),
(56, 'Mochino', 'Подходит к вечернему платью', 5000, 0, 2),
(57, 'Arcadia', 'Прекрасная сумка для деволой встречи', 2000, 0, 2),
(58, 'Bottega Veneta', 'Сумка украсит ваш поход в театр', 1500, 0, 2),
(59, 'Marino Orlandi', 'Великолепный выбор для повседневного использования', 3000, 0, 2),
(60, 'Louis Vuitton', 'Подходит к вечернему платью', 8000, 7000, 2),
(61, 'Dolce&Gabbana', 'Прекрасная сумка для деволой встречи', 9000, 0, 2),
(62, 'Gucci', 'Сумка украсит ваш поход в театр', 5000, 0, 2),
(63, 'Prada', 'Великолепный выбор для повседневного использования', 4000, 2000, 2),
(64, 'Valentino', 'Подходит к вечернему платью', 2000, 0, 3),
(65, 'Fendi', 'Прекрасная сумка для деволой встречи', 5600, 0, 3),
(66, 'Mochino', 'Сумка украсит ваш поход в театр', 9800, 0, 3),
(67, 'Arcadia', 'Великолепный выбор для повседневного использования', 12000, 9000, 3),
(68, 'Bottega Veneta', 'Подходит к вечернему платью', 15000, 0, 3),
(69, 'Marino Orlandi', 'Прекрасная сумка для деволой встречи', 3000, 0, 3),
(70, 'Louis Vuitton', 'Сумка украсит ваш поход в театр', 8000, 0, 3),
(71, 'Dolce&Gabbana', 'Великолепный выбор для повседневного использования', 7500, 6000, 3),
(72, 'Gucci', 'Подходит к вечернему платью', 6000, 0, 1),
(73, 'Prada', 'Прекрасная сумка для деволой встречи', 6000, 5000, 1),
(74, 'Valentino', 'Сумка украсит ваш поход в театр', 7200, 0, 1),
(75, 'Fendi', 'Великолепный выбор для повседневного использования', 5000, 0, 1),
(76, 'Mochino', 'Подходит к вечернему платью', 2000, 0, 1),
(77, 'Arcadia', 'Прекрасная сумка для деволой встречи', 1500, 0, 1),
(78, 'Bottega Veneta', 'Сумка украсит ваш поход в театр', 3000, 0, 1),
(79, 'Marino Orlandi', 'Великолепный выбор для повседневного использования', 8000, 0, 1),
(80, 'Louis Vuitton', 'Подходит к вечернему платью', 9000, 0, 2),
(81, 'Dolce&Gabbana', 'Прекрасная сумка для деволой встречи', 5000, 0, 2),
(82, 'Gucci', 'Сумка украсит ваш поход в театр', 4000, 0, 2),
(83, 'Prada', 'Великолепный выбор для повседневного использования', 2000, 0, 2),
(84, 'Valentino', 'Подходит к вечернему платью', 5600, 0, 2),
(85, 'Fendi', 'Прекрасная сумка для деволой встречи', 9800, 7200, 2),
(86, 'Mochino', 'Сумка украсит ваш поход в театр', 12000, 0, 2),
(87, 'Arcadia', 'Великолепный выбор для повседневного использования', 15000, 0, 1),
(88, 'Bottega Veneta', 'Подходит к вечернему платью', 3000, 0, 1),
(89, 'Marino Orlandi', 'Прекрасная сумка для деволой встречи', 8000, 0, 3),
(90, 'Louis Vuitton', 'Сумка украсит ваш поход в театр', 7500, 0, 3),
(91, 'Dolce&Gabbana', 'Великолепный выбор для повседневного использования', 6000, 0, 3),
(92, 'Gucci', 'Подходит к вечернему платью', 6000, 3000, 1),
(93, 'Prada', 'Прекрасная сумка для деволой встречи', 7200, 0, 1),
(94, 'Valentino', 'Сумка украсит ваш поход в театр', 5000, 0, 1),
(95, 'Fendi', 'Великолепный выбор для повседневного использования', 2000, 0, 1),
(96, 'Mochino', 'Подходит к вечернему платью', 1500, 0, 1),
(97, 'Arcadia', 'Прекрасная сумка для деволой встречи', 3000, 0, 1),
(98, 'Bottega Veneta', 'Сумка украсит ваш поход в театр', 8000, 0, 2),
(99, 'Marino Orlandi', 'Великолепный выбор для повседневного использования', 9000, 0, 2),
(100, 'Louis Vuitton', 'Подходит к вечернему платью', 5000, 4200, 2),
(101, 'Dolce&Gabbana', 'Прекрасная сумка для деволой встречи', 4000, 0, 2),
(102, 'Gucci', 'Сумка украсит ваш поход в театр', 2000, 0, 2),
(103, 'Prada', 'Великолепный выбор для повседневного использования', 5600, 0, 2),
(104, 'Valentino', 'Подходит к вечернему платью', 9800, 7800, 1),
(105, 'Fendi', 'Прекрасная сумка для деволой встречи', 12000, 0, 3),
(106, 'Mochino', 'Сумка украсит ваш поход в театр', 15000, 0, 1),
(107, 'Arcadia', 'Великолепный выбор для повседневного использования', 3000, 0, 3),
(108, 'Bottega Veneta', 'Подходит к вечернему платью', 8000, 7500, 1),
(109, 'Marino Orlandi', 'Прекрасная сумка для деволой встречи', 7500, 0, 3),
(110, 'Louis Vuitton', 'Сумка украсит ваш поход в театр', 6000, 0, 1),
(111, 'Dolce&Gabbana', 'Великолепный выбор для повседневного использования', 6000, 0, 2),
(112, 'Gucci', 'Подходит к вечернему платью', 7200, 6000, 1),
(113, 'Prada', 'Прекрасная сумка для деволой встречи', 5000, 0, 2),
(114, 'Valentino', 'Сумка украсит ваш поход в театр', 2000, 0, 1),
(115, 'Fendi', 'Великолепный выбор для повседневного использования', 1500, 0, 1),
(116, 'Mochino', 'Подходит к вечернему платью', 3000, 0, 1),
(117, 'Arcadia', 'Прекрасная сумка для деволой встречи', 8000, 0, 1),
(118, 'Bottega Veneta', 'Сумка украсит ваш поход в театр', 9000, 0, 1),
(119, 'Marino Orlandi', 'Великолепный выбор для повседневного использования', 5000, 0, 1),
(120, 'Louis Vuitton', 'Подходит к вечернему платью', 4000, 3500, 2),
(121, 'Dolce&Gabbana', 'Прекрасная сумка для деволой встречи', 2000, 0, 2),
(122, 'Gucci', 'Сумка украсит ваш поход в театр', 5600, 0, 3),
(123, 'Prada', 'Великолепный выбор для повседневного использования', 9800, 0, 3),
(124, 'Valentino', 'Подходит к вечернему платью', 12000, 4000, 3),
(128, 'Taxi tote', 'A traditional Southwestern motif is rendered in woven leather and vibrant color on this seasonal tote, adding bold texture and dimension to its simple, flared shape. Removable leather feather charms lend an artisanal touch to its spacious, hand-finis', 15000, 0, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `prod_ordr`
--

CREATE TABLE IF NOT EXISTS `prod_ordr` (
  `id_prdct` int(10) NOT NULL,
  `id_ordr` int(10) NOT NULL,
  `qtt` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `prod_ordr`
--

INSERT INTO `prod_ordr` (`id_prdct`, `id_ordr`, `qtt`) VALUES
(168, 3, 2),
(128, 3, 3),
(168, 4, 2),
(128, 4, 3),
(65, 4, 3),
(168, 5, 7),
(128, 5, 3),
(65, 5, 0),
(168, 6, 1),
(128, 6, 4),
(65, 6, 3),
(128, 7, 3),
(65, 7, 3),
(128, 8, 3),
(65, 8, 3),
(200, 9, 2),
(271, 9, 2),
(193, 9, 1),
(56, 10, 10),
(5, 11, 7),
(255, 12, 4),
(110, 12, 1),
(164, 12, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `adm`
--
ALTER TABLE `adm`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`id`), ADD KEY `id_product` (`id_product`);

--
-- Индексы таблицы `material`
--
ALTER TABLE `material`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `adm`
--
ALTER TABLE `adm`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=305;
--
-- AUTO_INCREMENT для таблицы `material`
--
ALTER TABLE `material`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=129;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
