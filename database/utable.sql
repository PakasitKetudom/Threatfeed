-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 11, 2018 at 01:58 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `utable`
--

CREATE TABLE `utable` (
  `vendor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `edition` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utable`
--

INSERT INTO `utable` (`vendor`, `title`, `version`, `edition`) VALUES
('microsoft', 'jscript', '5.7', ''),
('debian', 'fuse', '2.9.3-14', ''),
('kelvintoken_project', 'kelvintoken', '-', ''),
('alienvault', 'unified_security_management', '5.4.2', ''),
('7-zip', '7-zip', '15.14', ''),
('mariadb', 'mariadb', '2.1', ''),
('_wp_favorite_posts_project', '_wp_favorite_posts', '1.6.2', ''),
('_wp_favorite_posts_project', '_wp_favorite_posts', '1.6.2', ''),
('_wp_favorite_posts_project', '_wp_favorite_posts', '1.6.2', ':~~~wordpress~~'),
('microsoft', 'windows_10', '1511', ':~~~~x64~'),
('tracker-software', 'pdf-xchange_viewer', '2.5', ''),
('microsoft', 'windows_10', '3.0', 'sp2'),
('appsec-labs', 'appsec_labs', '4.0', 'sp1'),
('68k', 'audio_file_library', '0.3.6', ''),
('balbooa', 'gridbox', '2.4.0', 'rc2'),
('360totalsecurity', '360_total_security', '9.0.0.1202', ''),
('microsoft', 'windows_7', '3.0', 'sp1');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
