-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 19. kvě 2017, 12:57
-- Verze serveru: 10.1.13-MariaDB
-- Verze PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Databáze: `notes`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(127) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Vypisuji data pro tabulku `notes`
--

INSERT INTO `notes` (`id`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, 'First note', 'orem ipsum dolor sit amet, consectetur adipiscing elit. Cras eget ipsum viverra, blandit velit sed, sodales dui. Curabitur porttitor lectus sed ligula gravida, vitae mollis neque pellentesque. Fusce venenatis nibh vel nisl finibus, et faucibus dolor convallis. Vivamus eu magna arcu. Suspendisse ex nulla, convallis in magna vel, vulputate congue ex. Ut nunc lacus, bibendum et faucibus ut, mollis placerat sapien. Phasellus placerat rutrum diam, eu feugiat nisl imperdiet sit amet. Aliquam scelerisque massa id placerat semper. Curabitur elit metus, dictum posuere enim in, ornare interdum ante. Pellentesque id fringilla lorem. Praesent dignissim bibendum justo sit amet bibendum.', '2017-05-19 11:36:37', '2017-05-19 11:36:37'),
(2, 'Second note', 'Etiam mollis leo id metus placerat rutrum. Duis sit amet accumsan augue. Vivamus euismod sed arcu a sagittis. Aliquam in metus pellentesque quam dictum volutpat ut id enim. Nunc vitae justo sit amet sapien ultricies elementum at nec turpis. Nunc eget ornare sem. Suspendisse eu cursus quam. Duis placerat arcu nisi, sit amet faucibus lorem accumsan in. Donec ornare consequat tempus. Vivamus scelerisque lacus ac ligula malesuada posuere. Duis tincidunt pretium ligula, non gravida lacus lobortis nec. Quisque non feugiat ante. Nulla elementum finibus mi id pellentesque. Sed posuere auctor ligula, vel mattis erat porta non. Integer tempor purus mi, id cursus sem convallis sit amet.', '2017-05-19 11:36:37', '2017-05-19 11:36:37'),
(3, 'Third note', 'Donec sit amet euismod felis. Aenean dignissim quam pellentesque libero scelerisque, eu convallis ante rutrum. Donec vulputate luctus neque in commodo. Fusce ullamcorper consectetur pretium. Aliquam in sapien non odio convallis iaculis. Donec vel magna ante. Phasellus mattis efficitur nisl, in sodales diam rutrum quis. Pellentesque commodo vehicula orci, in facilisis felis efficitur vel. Morbi lobortis dignissim fringilla. Suspendisse vulputate eleifend neque id pharetra. Pellentesque imperdiet, diam id pharetra convallis, nisi ipsum viverra turpis, at tincidunt libero dolor vel mauris. Vestibulum magna odio, aliquam nec fringilla vel, egestas eu dolor. Vivamus consequat dictum euismod. Nullam vehicula elementum diam, ut dapibus leo.', '2017-05-19 11:36:59', '2017-05-19 11:36:59');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;