-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jun 2022 pada 10.47
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_portfolio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(100) NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `nama_project` varchar(100) NOT NULL,
  `desc_project` text NOT NULL,
  `img_project` varchar(100) NOT NULL,
  `featured_project` tinyint(1) NOT NULL,
  `link_github` varchar(255) NOT NULL,
  `link_url` varchar(255) NOT NULL,
  `tech_used` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `project`
--

INSERT INTO `project` (`id`, `nama_project`, `desc_project`, `img_project`, `featured_project`, `link_github`, `link_url`, `tech_used`) VALUES
(1, 'YumYum Web App', 'Aplikasi website untuk pesan-antar di restorant YumYum. Disini saya menggunakan laravel untuk membuat API dan ReactJs untuk bagian front-endnya', '197571656311750.png', 1, 'simalakamala', 'goks samadkna', '[\"ReactJs\",\"Laravel\",\"Firebase\",\"Cloudinary\"]'),
(3, 'Absensi App', 'Sebuah aplikasi absensi yang dibuat dengan menggunakan Android Studio dan Realm.io sebagai database lokalnya.', '661531656566050.png', 0, 'https://github.com/doniahmad/AbsensiApp.git', '', '[\"Android Studio\",\"Realm.io\"]'),
(17, 'test1', 'test1', '', 0, '', 'test', '[\"test\"]'),
(18, 'test', 'test3', '', 0, 'test21', '', '[\"test\",\"test\",\"test\"]'),
(19, 'test', 'test', '237161656577287.png', 1, 'test', 'test', '[\"test\"]');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `nama_panjang` varchar(255) NOT NULL,
  `hero_desc` text NOT NULL,
  `about_desc` text NOT NULL,
  `about_img` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `resume_link` varchar(255) NOT NULL,
  `link_github` varchar(255) NOT NULL,
  `link_linkedin` varchar(255) NOT NULL,
  `link_facebook` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`nama_panjang`, `hero_desc`, `about_desc`, `about_img`, `email`, `resume_link`, `link_github`, `link_linkedin`, `link_facebook`) VALUES
('Doni Ahmad Darmawan', 'Aku seorang pelajar di jurusan RPL yang suka dengan pengembangan website. Saat ini, aku lebih fokus dibidang front-end developer.', 'Halo, namaku adalah Doni Ahmad Darmawan. Aku tinggal dan lahir di kota Kudus. Aku sangat tertarik dengan pemrograman website, apalagi dibidang pengembangan front-end. Aku selalu berusaha agar dapat menjadi seorang yang berpengalaman dibidang tersebut.', '291651656578568.jpg', 'doniahmaddarmawan@gmail.com', 'https://resume//', 'https://github.com/', 'https://linkedin.com/', 'https://facebook.com/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `nama_skill` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skill`
--

INSERT INTO `skill` (`id`, `nama_skill`) VALUES
(1, 'HTML'),
(2, 'CSS'),
(3, 'JavaScript'),
(4, 'ReactJs'),
(5, 'PHP'),
(6, 'Laravel');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
