-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Čtv 16. kvě 2024, 11:47
-- Verze serveru: 5.7.17
-- Verze PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `tul_wa`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `authors` varchar(255) NOT NULL,
  `main_category` varchar(255) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `currency` varchar(3) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `pages` int(11) NOT NULL,
  `recommendation` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Vypisuji data pro tabulku `books`
--

INSERT INTO `books` (`book_id`, `title`, `authors`, `main_category`, `sub_category`, `price`, `currency`, `isbn`, `year`, `pages`, `recommendation`, `description`, `image_url`) VALUES
(1, 'Kniha', 'Autor', 'beletrie', 'detska', 100, 'CZK', '1234567890', 2023, 100, 'Doporučení', 'Popis', 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png'),
(7, 'Pán prstenů', 'Autor 1, Autor 2', 'beletrie', '', 100, 'CZK', '1234567890-6545', 2023, 100, 'Studenti, Profesionálové', 'nevim', 'https://fastly.picsum.photos/id/8/901/400.jpg?hmac=0ejkIRW231YVgxw02tfRQU8aKK4ohVtFJKC1YiXCsiI'),
(8, 'NEvim', 'Vladimír Doškář, Marek Pánek', 'odborna', 'Dětská pohádka', 1000, 'CZK', '1234567890-6545', 2023, 100, 'Studenti, Hobíci, Profesionálové', 'Strašně super kniha doporučuju', 'https://www.alescenek.cz/images/zbozi/2217/125295-125429.jpg');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `nickname` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_czech_ci DEFAULT NULL,
  `is_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci ROW_FORMAT=COMPACT;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `nickname`, `email`, `password`, `is_admin`) VALUES
(1, 'John', 'Doe', 'johndoex', 'vladimir.doskar@tul.cz', '19513fdc9da4fb72a4a05eb66917548d3c90ff94d5419e1f2363eea89dfee1dd', 0);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
