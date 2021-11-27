-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 27-Nov-2021 às 01:32
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `my_musics`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `song_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `playlist`
--

INSERT INTO `playlist` (`id`, `user_id`, `song_id`) VALUES
(1, '1', '1,2,5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `song` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `songs`
--

INSERT INTO `songs` (`id`, `user_id`, `name`, `description`, `image`, `video`, `song`, `category`, `type`, `views`, `created_at`) VALUES
(1, '1', 'Song Multiple Advanced', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec fringilla velit a elementum gravida.', 'song-one.jpg', 'song-one.mp4', 'music.mp3', 'Pop', 'music', 39, '2021-11-23 23:31:19'),
(2, '2', 'Music Max Song', 'Lorem ipsum amet dolor...', 'song-two.png', 'song-one.mp4', 'music.mp3', 'Rock', 'music', 37, NULL),
(5, '1', 'My Flag Blue And Rad', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vulputate sapien.', 'song-three.png', 'song-three.mp4', 'music.mp3', 'Rock', 'podcast', 46, '2021-11-26 14:37:31'),
(6, '1', 'My Flag Yellow and Green', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum vulputate sapien.', 'song-four.jpg', 'song-two.mp4', 'The-Noisy-Freaks.mp3', 'Rock', 'music', 41, '2021-11-26 16:16:43'),
(7, '1', 'I love Codes', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu libero vitae lectus pellentesque suscipit. Vestibulum ante ipsum primis in faucibus orci luctus.', 'song-six.png', 'song-three.mp4', 'The-Noisy-Freaks.mp3', 'Funk', 'music', 0, '2021-11-26 23:30:56'),
(8, '1', 'My Color Keyboard', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eu libero vitae lectus pellentesque suscipit. Vestibulum ante ipsum primis in faucibus orci luctus.', 'song-five.jpg', 'song-one.mp4', 'music.mp3', 'Rock', 'podcast', 1, '2021-11-26 23:32:57');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
('1', 'RaissaDev', 'raissa.fullstack@gmail.com', '12345678', 'myImg.png', '2021-11-23 21:53:55', '2021-11-23 21:53:55'),
('2', 'Jhon Doe', 'jhon@doe.com', '12345678', 'user-one.png', '2021-11-23 22:56:13', '2021-11-23 22:56:13'),
('3', 'Amanda Doe', 'amanda@doe.com', '12345678', 'user-three.jpg', '2021-11-26 16:42:37', '2021-11-26 16:42:37'),
('4', 'Harry Potter', 'harry@potter.com', '12345678', 'user-four.png', '2021-11-26 16:47:29', '2021-11-26 16:47:29'),
('5', 'Ana Doe', 'ana@doe.com', '12345678', 'user-five.png', '2021-11-26 16:52:38', '2021-11-26 16:52:38'),
('61a17458e6486', 'Fernando Doe', 'fernando@doe.com', '123123', 'song-one.jpg', '2021-11-26 23:57:12', '2021-11-26 23:57:12');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `playlist`
--
ALTER TABLE `playlist`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
