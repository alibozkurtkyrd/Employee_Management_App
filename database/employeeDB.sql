-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 15 Eki 2022, 00:54:55
-- Sunucu sürümü: 10.9.3-MariaDB
-- PHP Sürümü: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `formDB_Copy`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Admins`
--

CREATE TABLE `Admins` (
  `id` int(11) NOT NULL,
  `username` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rolename` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detailed_rolename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `Admins`
--

INSERT INTO `Admins` (`id`, `username`, `email`, `phone`, `rolename`, `detailed_rolename`, `password`, `created_date`) VALUES
(5, 'baris', 'baris@manco.com', '312234', 'Admin', 'Coordinator', 'baris', '2022-08-26 10:20:12');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Applicants`
--

CREATE TABLE `Applicants` (
  `id` int(6) NOT NULL,
  `fullname` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `program_lang` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modal_helper` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basvuru_tarihi` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `applicant_admin`
--

CREATE TABLE `applicant_admin` (
  `id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `vote` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `LeaveRequest`
--

CREATE TABLE `LeaveRequest` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `oneOrMulti` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `hour` int(11) DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `explanation` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approver_id` int(11) DEFAULT NULL,
  `approver_description` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `edited_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `LeavesLog`
--

CREATE TABLE `LeavesLog` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) DEFAULT NULL,
  `auth_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Tablo için indeksler `Applicants`
--
ALTER TABLE `Applicants`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `applicant_admin`
--
ALTER TABLE `applicant_admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Tablo için indeksler `LeaveRequest`
--
ALTER TABLE `LeaveRequest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin-id` (`admin_id`),
  ADD KEY `approver_id-rel` (`approver_id`);

--
-- Tablo için indeksler `LeavesLog`
--
ALTER TABLE `LeavesLog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_personal-id` (`personal_id`),
  ADD KEY `fk_auth-id` (`auth_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `Admins`
--
ALTER TABLE `Admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Tablo için AUTO_INCREMENT değeri `Applicants`
--
ALTER TABLE `Applicants`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `applicant_admin`
--
ALTER TABLE `applicant_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `LeaveRequest`
--
ALTER TABLE `LeaveRequest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `LeavesLog`
--
ALTER TABLE `LeavesLog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `applicant_admin`
--
ALTER TABLE `applicant_admin`
  ADD CONSTRAINT `applicant_admin_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `Admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `applicant_admin_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `Applicants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `LeaveRequest`
--
ALTER TABLE `LeaveRequest`
  ADD CONSTRAINT `admin_id-foreignKey` FOREIGN KEY (`admin_id`) REFERENCES `Admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk-approval-id` FOREIGN KEY (`approver_id`) REFERENCES `Admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `LeavesLog`
--
ALTER TABLE `LeavesLog`
  ADD CONSTRAINT `fk_auth_id` FOREIGN KEY (`auth_id`) REFERENCES `Admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_personal-id` FOREIGN KEY (`personal_id`) REFERENCES `Admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
