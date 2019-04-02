-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 02 Nis 2019, 17:10:53
-- Sunucu sürümü: 10.1.31-MariaDB
-- PHP Sürümü: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `bdnfilm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_etiketler`
--

CREATE TABLE `brkdndr_etiketler` (
  `id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `etiket` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `etiket_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_filmler`
--

CREATE TABLE `brkdndr_filmler` (
  `id` int(11) NOT NULL,
  `tmdb_id` text COLLATE utf8_turkish_ci NOT NULL,
  `film_baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `film_url` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `film_icerik` longtext COLLATE utf8_turkish_ci,
  `film_resim` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `film_durum` int(1) DEFAULT NULL,
  `film_goruntulenme` int(11) DEFAULT NULL,
  `kategori_id` int(11) DEFAULT NULL,
  `yazar_id` int(11) DEFAULT NULL,
  `film_yil` int(11) NOT NULL,
  `film_dk` int(11) NOT NULL,
  `film_tmdb` varchar(11) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;


-- Tablo için tablo yapısı `brkdndr_film_begeniler`
--

CREATE TABLE `brkdndr_film_begeniler` (
  `id` int(11) NOT NULL,
  `begeni_film_id` int(11) NOT NULL,
  `ip_adresi` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo için tablo yapısı `brkdndr_film_kaynak`
--

CREATE TABLE `brkdndr_film_kaynak` (
  `kaynak_id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `kaynak_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `kaynak_icerik` text COLLATE utf8_turkish_ci NOT NULL,
  `kaynak_durum` int(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
--
-- Tablo için tablo yapısı `brkdndr_film_yorumlar`
--

CREATE TABLE `brkdndr_film_yorumlar` (
  `id` int(11) NOT NULL,
  `film_id` int(11) NOT NULL,
  `yorum_ad_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yorum_icerik` longtext COLLATE utf8_turkish_ci NOT NULL,
  `yorum_durum` int(1) NOT NULL,
  `yorum_spoiler` int(1) NOT NULL DEFAULT '0',
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo için tablo yapısı `brkdndr_genel_ayarlar`
--

CREATE TABLE `brkdndr_genel_ayarlar` (
  `id` int(11) NOT NULL,
  `site_title` text COLLATE utf8_turkish_ci NOT NULL,
  `site_description` text COLLATE utf8_turkish_ci NOT NULL,
  `site_keywords` text COLLATE utf8_turkish_ci NOT NULL,
  `site_logo` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_facebook` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_twitter` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_instagram` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_youtube` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_google_plus` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `site_tmdb_api` text COLLATE utf8_turkish_ci NOT NULL,
  `anasayfa_film_sayisi` int(11) NOT NULL,
  `anasayfa_etiket_sayisi` int(11) NOT NULL,
  `arama_film_sayisi` int(11) NOT NULL,
  `enckizlenen_film_sayisi` int(11) NOT NULL,
  `anasayfa_kategori_sayisi` int(11) NOT NULL,
  `updatedAt` datetime NOT NULL,
  `guncelleyen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_genel_ayarlar`
--

INSERT INTO `brkdndr_genel_ayarlar` (`id`, `site_title`, `site_description`, `site_keywords`, `site_logo`, `site_facebook`, `site_twitter`, `site_instagram`, `site_youtube`, `site_google_plus`, `site_tmdb_api`, `anasayfa_film_sayisi`, `anasayfa_etiket_sayisi`, `arama_film_sayisi`, `enckizlenen_film_sayisi`, `anasayfa_kategori_sayisi`, `updatedAt`, `guncelleyen_id`) VALUES
(1, 'BDNFilm', 'Full HD Film İzle', 'film izle, full hd film izle, türkçe dublaj, türkçe altyazı, seyret, sinema izle', '', 'https://www.facebook.com/#', 'https://www.twitter.com/#', 'https://www.instagram.com/#', 'https://www.youtube.com/#', 'https://plus.google.com/#', '', 12, 12, 12, 4, 12, '2019-04-02 16:25:35', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_iletisim`
--

CREATE TABLE `brkdndr_iletisim` (
  `id` int(11) NOT NULL,
  `gonderen_ad_soyad` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `gonderen_email` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `konu` text COLLATE utf8_turkish_ci NOT NULL,
  `mesaj` text COLLATE utf8_turkish_ci NOT NULL,
  `iletisim_durum` int(1) NOT NULL,
  `createdAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
--
-- Tablo için tablo yapısı `brkdndr_kategoriler`
--

CREATE TABLE `brkdndr_kategoriler` (
  `id` int(11) NOT NULL,
  `kategori_adi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `kategori_durum` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
--
-- Tablo için tablo yapısı `brkdndr_reklamlar`
--

CREATE TABLE `brkdndr_reklamlar` (
  `reklam_tipi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `reklam_kodu` longtext COLLATE utf8_turkish_ci NOT NULL,
  `reklam_durum` int(1) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_reklamlar`
--

INSERT INTO `brkdndr_reklamlar` (`reklam_tipi`, `reklam_kodu`, `reklam_durum`, `createdAt`, `updatedAt`) VALUES
('alt_sabit_728_90', '', 0, '2019-03-03 18:20:56', '0000-00-00 00:00:00'),
('sag_blok_423_250', '', 1, '2019-03-03 16:13:06', '0000-00-00 00:00:00'),
('video_alt', '', 0, '2019-03-03 14:22:51', '0000-00-00 00:00:00'),
('video_onu', '', 0, '2019-03-03 14:17:34', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `brkdndr_sayfalar`
--

CREATE TABLE `brkdndr_sayfalar` (
  `id` int(11) NOT NULL,
  `sayfa_baslik` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_url` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_icerik` longtext COLLATE utf8_turkish_ci NOT NULL,
  `sayfa_durum` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `goruntulenme_sayisi` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
--
-- Tablo için tablo yapısı `brkdndr_uyeler`
--

CREATE TABLE `brkdndr_uyeler` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_turkish_ci NOT NULL,
  `cinsiyet` int(1) NOT NULL,
  `sifre` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `isActive` int(1) NOT NULL,
  `user_role` int(1) NOT NULL,
  `ekleyen_id` int(11) NOT NULL,
  `createdAt` datetime NOT NULL,
  `updatedat` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `brkdndr_uyeler`
--

INSERT INTO `brkdndr_uyeler` (`id`, `ad_soyad`, `email`, `telefon`, `cinsiyet`, `sifre`, `isActive`, `user_role`, `ekleyen_id`, `createdAt`, `updatedat`) VALUES
(1, 'Admin', 'admin@admin.com', '05555555555', 1, '25f9e794323b453885f5181f1b624d0b', 1, 4, 1, '2018-07-28 07:50:11', '0000-00-00 00:00:00');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `brkdndr_etiketler`
--
ALTER TABLE `brkdndr_etiketler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_filmler`
--
ALTER TABLE `brkdndr_filmler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_film_begeniler`
--
ALTER TABLE `brkdndr_film_begeniler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_film_kaynak`
--
ALTER TABLE `brkdndr_film_kaynak`
  ADD PRIMARY KEY (`kaynak_id`);

--
-- Tablo için indeksler `brkdndr_film_yorumlar`
--
ALTER TABLE `brkdndr_film_yorumlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_genel_ayarlar`
--
ALTER TABLE `brkdndr_genel_ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_iletisim`
--
ALTER TABLE `brkdndr_iletisim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_kategoriler`
--
ALTER TABLE `brkdndr_kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_reklamlar`
--
ALTER TABLE `brkdndr_reklamlar`
  ADD PRIMARY KEY (`reklam_tipi`);

--
-- Tablo için indeksler `brkdndr_sayfalar`
--
ALTER TABLE `brkdndr_sayfalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `brkdndr_uyeler`
--
ALTER TABLE `brkdndr_uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_etiketler`
--
ALTER TABLE `brkdndr_etiketler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=344;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_filmler`
--
ALTER TABLE `brkdndr_filmler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_film_begeniler`
--
ALTER TABLE `brkdndr_film_begeniler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_film_kaynak`
--
ALTER TABLE `brkdndr_film_kaynak`
  MODIFY `kaynak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_film_yorumlar`
--
ALTER TABLE `brkdndr_film_yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_genel_ayarlar`
--
ALTER TABLE `brkdndr_genel_ayarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_iletisim`
--
ALTER TABLE `brkdndr_iletisim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_kategoriler`
--
ALTER TABLE `brkdndr_kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_sayfalar`
--
ALTER TABLE `brkdndr_sayfalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `brkdndr_uyeler`
--
ALTER TABLE `brkdndr_uyeler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
