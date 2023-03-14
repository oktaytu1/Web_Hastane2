-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Mar 2023, 16:02:52
-- Sunucu sürümü: 10.4.25-MariaDB
-- PHP Sürümü: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `hstn`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `doktor`
--

CREATE TABLE `doktor` (
  `id` int(11) NOT NULL,
  `ilac` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `doktor`
--

INSERT INTO `doktor` (`id`, `ilac`) VALUES
(1, 'asd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `eczaci`
--

CREATE TABLE `eczaci` (
  `id` int(11) NOT NULL,
  `ilac` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `eczaci`
--

INSERT INTO `eczaci` (`id`, `ilac`) VALUES
(1, 'eczasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hemsire`
--

CREATE TABLE `hemsire` (
  `id` int(11) NOT NULL,
  `ilac` varchar(32) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `hemsire`
--

INSERT INTO `hemsire` (`id`, `ilac`) VALUES
(1, 'hemsads');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `unvan` varchar(16) COLLATE utf8mb4_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `unvan`) VALUES
(1, 'doktor'),
(3, 'eczaci'),
(4, 'hemsire');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `doktor`
--
ALTER TABLE `doktor`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `eczaci`
--
ALTER TABLE `eczaci`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `hemsire`
--
ALTER TABLE `hemsire`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `doktor`
--
ALTER TABLE `doktor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `eczaci`
--
ALTER TABLE `eczaci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `hemsire`
--
ALTER TABLE `hemsire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
