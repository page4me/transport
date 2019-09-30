-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Wrz 2019, 20:56
-- Wersja serwera: 10.2.2-MariaDB
-- Wersja PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `tos`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `baza_eksp`
--

CREATE TABLE `baza_eksp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `rodzaj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kod_p` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `miasto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmina` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wlasnosc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umowa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dat_umowy` date DEFAULT NULL,
  `uwagi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `baza_eksp`
--

INSERT INTO `baza_eksp` (`id`, `id_przed`, `rodzaj`, `adres`, `kod_p`, `miasto`, `gmina`, `wlasnosc`, `umowa`, `dat_umowy`, `uwagi`, `created_at`, `updated_at`) VALUES
(1, 1, '3', 'Chałupy 23', '76-024', 'Świeszyno', 'Świeszyno', 'Nie', 'Na czas określony', '2020-01-01', NULL, '2019-07-19 14:12:56', '2019-09-11 08:10:24'),
(2, 2, '1', 'Kretomino 2', '75-900', 'Kretomino', 'Manowo', 'Tak', NULL, '2019-09-01', NULL, '2019-07-24 20:59:53', '2019-07-24 20:59:53'),
(3, 3, '1', 'Koszalińska 65', '76-031', 'Mścice', 'Będzino', 'Tak', NULL, NULL, NULL, '2019-07-30 15:34:01', '2019-07-30 15:34:01'),
(4, 4, '1', 'Strzelecka 11/1', '76-004', 'Sianów', 'Sianów', 'tak', NULL, NULL, NULL, '2019-08-16 11:59:35', '2019-08-16 11:59:35'),
(5, 6, '1', 'brak', '75-039', 'brak', 'brak', 'brak', 'brak', NULL, NULL, '2019-08-21 15:06:16', '2019-08-21 15:06:16'),
(6, 7, '1', 'ul. Lechicka 72', '75-900', 'Koszalin', 'Koszalin', 'Nie', 'Najem', '2019-09-04', NULL, '2019-08-21 15:38:10', '2019-09-12 16:46:29'),
(7, 8, '1', 'b/d', '00-000', 'b/d', 'b/d', 'b/d', NULL, NULL, NULL, '2019-08-22 15:30:06', '2019-08-22 15:30:06');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cert_komp`
--

CREATE TABLE `cert_komp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `rodzaj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr_cert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imie_os_z` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nazwisko_os_z` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `miasto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dat_ur` date DEFAULT NULL,
  `dat_wyd` date DEFAULT NULL,
  `os_zarz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `umowa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dat_umowy` date DEFAULT NULL,
  `uwagi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `cert_komp`
--

INSERT INTO `cert_komp` (`id`, `id_przed`, `rodzaj`, `nr_cert`, `imie_os_z`, `nazwisko_os_z`, `adres`, `miasto`, `dat_ur`, `dat_wyd`, `os_zarz`, `umowa`, `dat_umowy`, `uwagi`, `created_at`, `updated_at`) VALUES
(1, 1, 'rzeczy', 'dsaf', 'Karol', 'Majewski', 'asdf', 'asdf', '2019-07-04', '2019-07-02', 'asdf', 'Na czas określony', '2019-07-01', '<p>drugi <strong>test</strong></p>', '2019-07-19 15:33:18', '2019-09-30 14:39:25'),
(2, 2, 'osoby', 'sdfgsdfg', 'Marta', 'Kowalska', 'sdfg', 'sdfg', '2019-07-23', '2019-07-25', 'TAK', NULL, NULL, NULL, '2019-07-24 21:00:27', '2019-08-25 15:05:15'),
(3, 3, 'osoby', '15426/F2/02', '', 'Kowalska', 'Burzowa 43', 'Koszalin', '1986-01-01', '2018-01-01', 'Nie', 'Na czas określony', '2020-07-30', NULL, '2019-07-30 15:35:12', '2019-07-30 15:35:12'),
(4, 4, 'osoby', '00156/TR/03', '', 'Chotkowski', 'Strzelecka 11/1', 'Manowo', '1969-01-01', '2003-08-01', 'tak', NULL, NULL, NULL, '2019-08-16 12:00:33', '2019-08-21 14:18:08'),
(5, 6, 'rzeczy', '21545/TR/05', '', 'Falkiewicz', 'Białowieska 43', 'Koszalin', '1968-01-01', '2005-01-01', 'Nie', 'na czas nieokreślony', '9999-01-01', NULL, '2019-08-21 15:07:44', '2019-08-25 15:00:18'),
(6, 7, 'rzeczy', '18445/F2/15', '', 'Gawrońska', 'Giezkowo 13', 'Giezkowo', '1979-01-01', '2015-01-01', 'nie', 'Zlecenie', '2022-01-01', NULL, '2019-08-21 15:39:26', '2019-08-25 15:04:01'),
(7, 8, 'osoby', '12545/F4/16', '', 'Rogaś', 'Rosnowo 25/27', 'Rosnowo', '1959-01-01', '2016-01-01', 'Tak', NULL, NULL, NULL, '2019-08-22 15:31:13', '2019-08-25 15:04:13');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `decyzje`
--

CREATE TABLE `decyzje` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dok_przed`
--

CREATE TABLE `dok_przed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rodz_dok` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nr_dok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_nr_dok` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr_druku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr_sprawy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_wn` date DEFAULT NULL,
  `data_wyd` date DEFAULT NULL,
  `data_waz` date NOT NULL,
  `uwagi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `dok_przed`
--

INSERT INTO `dok_przed` (`id`, `id_przed`, `nazwa`, `rodz_dok`, `nr_dok`, `p_nr_dok`, `nr_druku`, `nr_sprawy`, `data_wn`, `data_wyd`, `data_waz`, `uwagi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Licencja', 'rzeczy', '0157456', NULL, 'WR 15645665', 'KD.7250.15.2019.EZ', '2019-07-19', '2019-07-22', '2059-07-22', NULL, '2019-07-19 14:11:09', '2019-08-19 23:01:35'),
(2, 2, 'Licencja', 'osoby', '10065876', NULL, 'LG 798798', 'KD.7520.80.2019.AB', '2019-07-08', '2019-07-24', '2039-07-24', NULL, '2019-07-24 20:59:02', '2019-07-30 16:36:56'),
(3, 3, 'Zezwolenie', 'osoby', '0046', NULL, 'WR 443332', 'KD.7250.45.2019.EZ', '2019-07-08', '2019-07-22', '2059-07-22', NULL, '2019-07-30 15:31:07', '2019-07-30 16:37:21'),
(4, 4, 'Licencja', 'osoby', '0007280', NULL, 'WR 0000001', 'KD 5531-1/9/03', '2003-08-01', '2003-08-02', '2069-08-02', NULL, '2019-08-16 11:58:57', '2019-08-16 11:58:57'),
(5, 6, 'Licencja Pośrednictwo', 'rzeczy', '0001', NULL, 'LS0000081', 'KD.7250.79.2014.HD', '2014-01-01', '2014-01-02', '2064-01-01', NULL, '2019-08-21 15:05:16', '2019-09-11 07:39:31'),
(6, 7, 'Licencja', 'rzeczy', '0114500', NULL, 'WD 65465', 'KD 5531-2/7/09', '2009-08-13', '2009-08-22', '2033-07-10', NULL, '2019-08-21 15:36:56', '2019-08-21 15:36:56'),
(7, 8, 'Licencja 7-9', 'osoby', '0003', NULL, 'LB0000093', 'KD.7250.53.2015.HD', '2015-01-01', '2015-01-01', '2045-01-01', NULL, '2019-08-22 15:29:26', '2019-08-22 15:29:26'),
(8, 9, 'Zaswiadczenie', 'rzeczy', '371667', NULL, 'BW987987', 'KD.7251.15.2017.HD', '2017-08-08', '2017-08-09', '9999-01-01', NULL, '2019-08-22 15:43:03', '2019-08-22 15:43:03');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dok_przed_wyp`
--

CREATE TABLE `dok_przed_wyp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dok_przed` bigint(20) DEFAULT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rodzaj_wyp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr_wyp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr_druku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr_sprawy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_wn` date DEFAULT NULL,
  `data_wyd` date DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `dat_dep_wp` date DEFAULT NULL,
  `dat_dep_wyd` date DEFAULT NULL,
  `uwagi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `dok_przed_wyp`
--

INSERT INTO `dok_przed_wyp` (`id`, `id_dok_przed`, `id_przed`, `nazwa`, `rodzaj_wyp`, `nr_wyp`, `nr_druku`, `nr_sprawy`, `data_wn`, `data_wyd`, `status`, `dat_dep_wp`, `dat_dep_wyd`, `uwagi`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Licencja', 'rzeczy', '01/2019', 'WD 123462342', 'asdfasdf', '2019-07-01', '2019-07-05', 1, NULL, NULL, NULL, '2019-07-20 17:11:05', '2019-07-20 17:11:05'),
(6, 3, 3, 'Zezwolenie', 'osoby', '1/2019', 'WD 0000567', 'KD.7250.45.2019.EZ', '2019-08-01', '2019-08-04', 1, NULL, NULL, NULL, '2019-08-06 16:22:44', '2019-08-06 16:22:44'),
(7, 3, 3, 'Zezwolenie', 'osoby', '2/2019', 'WD 0000568', 'KD.7250.45.2019.EZ', '2019-08-01', '2019-08-05', 1, NULL, '2019-09-10', NULL, '2019-08-06 16:44:18', '2019-09-10 17:59:31'),
(8, 1, 1, 'Licencja', 'rzeczy', '02/2019', 'WR 0000589', 'KD.7250.15.2019.EZ', '2019-08-05', '2019-08-12', 1, NULL, '2019-09-13', NULL, '2019-08-14 14:38:07', '2019-09-13 21:28:03'),
(9, 4, 4, 'Licencja', 'osoby', '1/2011', 'WR 0000100', 'KD 5531-1/9/03', '2011-08-01', '2011-08-01', 1, NULL, NULL, NULL, '2019-08-16 12:38:47', '2019-08-16 12:38:47'),
(10, 4, 4, 'Licencja', 'osoby', '2/2013', 'WR 0000101', 'KD 5531-1/9/03', '2013-08-01', '2013-08-01', 2, '2019-09-11', '2019-09-04', NULL, '2019-08-16 12:39:20', '2019-09-11 07:02:15'),
(11, 4, 4, 'Licencja', 'osoby', '3/2016', 'WR 0000102', 'KD 5531-1/9/03', '2016-08-16', '2016-08-16', 1, NULL, NULL, NULL, '2019-08-16 12:39:52', '2019-08-16 12:39:52'),
(12, 4, 4, 'Licencja', 'osoby', '4/2017', 'WR 0000103', 'KD 5531-1/9/03', '2017-08-16', '2017-08-14', 1, NULL, '2019-09-11', NULL, '2019-08-16 12:40:26', '2019-09-11 07:01:20'),
(13, 4, 4, 'Licencja', 'osoby', '5/2018', 'WR 0000104', 'KD.7250.15.2019.EZ', '2018-08-07', '2019-08-19', 1, NULL, '2019-09-03', NULL, '2019-08-16 12:41:16', '2019-09-07 17:57:29'),
(14, 1, 1, 'Licencja', 'rzeczy', '03/2019', 'WR 0000590', 'KD.7250.79.2019.EZ', '2019-08-12', '2019-08-14', 2, '2019-09-17', '2019-09-09', NULL, '2019-08-21 15:21:40', '2019-09-13 21:28:30'),
(15, 7, 8, 'Licencja 7-9', 'osoby', '1/2016', 'WO 0004566', 'KD.7250.53.2015.HD', '2016-01-01', '2016-01-01', 1, NULL, NULL, NULL, '2019-08-22 15:35:04', '2019-08-22 15:35:04'),
(16, 2, 2, 'Licencja', 'osoby', '1/2019', 'WR 000545', 'KD.7250.15.2019.EZ', '2019-09-02', '2019-09-03', 1, NULL, NULL, NULL, '2019-09-10 16:44:56', '2019-09-10 16:44:56');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hist_zmian_przed`
--

CREATE TABLE `hist_zmian_przed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(11) DEFAULT NULL,
  `id_dok_przed` bigint(11) DEFAULT NULL,
  `nazwa_zm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_zm` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `hist_zmian_przed`
--

INSERT INTO `hist_zmian_przed` (`id`, `id_przed`, `id_dok_przed`, `nazwa_zm`, `data_zm`, `created_at`, `updated_at`) VALUES
(2, 2, 2, 'Zgłoszenie nowego pojazdu o numerze rejestracyjnymZKO 34WE', '2019-09-03', '2019-09-10 16:42:21', '2019-09-10 16:42:21'),
(3, 2, 2, 'Zgłoszenie nowego wypisu o numerze - 1/2019', '2019-09-02', '2019-09-10 16:44:57', '2019-09-10 16:44:57'),
(5, 1, NULL, 'Zmiana nazwy firmy z TransCar Janusz Kowalski na TransCar JAKO Janusz Kowalski', '2019-09-10', '2019-09-10 17:55:07', '2019-09-10 17:55:07'),
(6, 1, NULL, 'Zmiana nazwy firmy z TransCar JAKO Janusz Kowalski na TransCar CARGO Janusz Kowalski', '2019-09-10', '2019-09-10 17:55:35', '2019-09-10 17:55:35'),
(7, 3, NULL, 'Zmiana nazwy firmy z MarCos Trans Sp. z o.o. na MarCar Trans Sp. z o.o.', '2019-09-10', '2019-09-10 17:58:27', '2019-09-10 17:58:27'),
(8, 3, 3, 'Zgłoszenie nowego pojazdu o numerze rejestracyjnym - ZKO P433', '2019-09-03', '2019-09-10 17:59:04', '2019-09-10 17:59:04'),
(10, 1, NULL, 'Wydanie z depozytu wypisu o numerze - 03/2019', '2019-09-09', '2019-09-10 18:48:00', '2019-09-10 18:48:00'),
(11, 1, NULL, 'Zgłoszenie do depozytu wypisu o numerze - 03/2019', '2019-09-03', '2019-09-10 18:48:19', '2019-09-10 18:48:19'),
(12, 1, NULL, 'Zmiana adresu firmy z Południowa 43 na Koszalińska 23/6', '2019-09-11', '2019-09-11 05:23:58', '2019-09-11 05:23:58'),
(13, 1, NULL, 'Zmiana adresu bazy eksploatacyjnej z Konikowo 50 na Chałupy 23', '2019-09-11', '2019-09-11 05:37:12', '2019-09-11 05:37:12'),
(15, 4, NULL, 'Wydanie z depozytu wypisu o numerze - 4/2017', '2019-09-11', '2019-09-11 07:01:20', '2019-09-11 07:01:20'),
(16, 4, NULL, 'Zgłoszenie do depozytu wypisu o numerze - 2/2013', '2019-09-11', '2019-09-11 07:02:15', '2019-09-11 07:02:15'),
(17, 1, NULL, 'Zmiana adresu bazy eksploatacyjnej z Chałupy 23 na Chałupy 23', '2019-09-11', '2019-09-11 08:09:46', '2019-09-11 08:09:46'),
(18, 1, NULL, 'Zmiana adresu bazy eksploatacyjnej z Chałupy 23 na Chałupy 23', '2019-09-11', '2019-09-11 08:10:24', '2019-09-11 08:10:24'),
(19, 6, NULL, 'Zmiana adresu bazy eksploatacyjnej z ul. Lechicka 72 na ul. Lechicka 72', '2019-09-12', '2019-09-12 16:46:29', '2019-09-12 16:46:29'),
(20, 1, NULL, 'Wydanie z depozytu wypisu o numerze - 02/2019', '2019-09-13', '2019-09-13 21:28:03', '2019-09-13 21:28:03'),
(21, 1, NULL, 'Zgłoszenie do depozytu wypisu o numerze - 03/2019', '2019-09-17', '2019-09-13 21:28:30', '2019-09-13 21:28:30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontrole`
--

CREATE TABLE `kontrole` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dat_zawiad` date DEFAULT NULL,
  `dat_roz` date DEFAULT NULL,
  `dat_zak` date DEFAULT NULL,
  `nr_upo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wynik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zalecenia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dat_zal` date DEFAULT NULL,
  `wyn_pokont` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dat_ost_kont` date DEFAULT NULL,
  `uwagi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_24_170925_create_przedsiebiorca_table', 1),
(4, '2019_06_24_171016_create_rodzaj_przed_table', 1),
(5, '2019_06_24_171225_create_hist_zmian_przed_table', 1),
(6, '2019_06_24_171400_create_baza_eksp_table', 1),
(7, '2019_06_24_171617_create_zdol_finans_table', 1),
(8, '2019_06_24_171814_create_cert_komp_table', 1),
(9, '2019_06_24_172840_create_dok_przed_table', 1),
(10, '2019_06_24_175607_create_wykaz_poj_table', 1),
(11, '2019_06_24_175812_create_kontrole_table', 1),
(12, '2019_06_24_175915_create_pisma_table', 1),
(13, '2019_06_24_175926_create_decyzje_table', 1),
(14, '2019_06_24_181418_create_dok_przed_wyp_table', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pisma`
--

CREATE TABLE `pisma` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tresc` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr_sprawy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_p` date DEFAULT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `pisma`
--

INSERT INTO `pisma` (`id`, `nazwa`, `tresc`, `nr_sprawy`, `data_p`, `id_przed`, `created_at`, `updated_at`) VALUES
(32, NULL, '<div style=\"float: right;\">Koszalin dn. 2019-09-16 r.</div>\r\n<div style=\"text-align: left; margin-top: 30px; clear: both;\">KD.7250.44.2019.EZ</div>\r\n<div class=\"row col-4\" style=\"float: right; margin-top: 40px; margin-right: 80px;\"><strong>TransCar CARGO Janusz Kowalski<br />Koszalińska 23/6<br />75-900 Kretomino</strong></div>\r\n<div style=\"clear: both;\"><br /><br />\r\n<p style=\"text-align: justify;\"><span style=\"padding-left: 50px;\">&nbsp;</span>Starosta Koszaliński na podstawie art. 83 ust. 1 ustawy z dnia 6 września 2001 r. o transporcie drogowym (Dz. U. z 2019 r., poz. 58 z p&oacute;źn. zm.) oraz &sect; 2 ust. 3 rozporządzenia Ministra Infrastruktury i Rozwoju z dnia 8 września 2014 roku w sprawie danych i informacji, kt&oacute;re przewoźnik drogowy jest obowiązany przekazywać do organu w związku z prowadzoną działalnością w zakresie przewozu drogowego (Dz.U. z 2014 r., poz.1217) nakłada na Pana obowiązek <strong> przedłożenia w terminie 21 dni od dnia otrzymania tego pisma</strong>, dokument&oacute;w potwierdzających spełnienie wymagań ustawowych do otrzymanego &bdquo;zezwolenia na wykonywanie zawodu przewoźnika drogowego&rdquo; wyrażonego licencją:</p>\r\n</div>\r\n<div><strong>nr 0157456</strong> udzieloną dnia <strong>2019-07-22</strong> roku na wykonywanie krajowego transportu drogowego rzeczy. tj.:</div>\r\n<div><br />\r\n<ul style=\"list-style: none;\">\r\n<li>\r\n<p style=\"text-align: justify;\"><strong>1)</strong> dokumenty potwierdzające spełnienie warunk&oacute;w, o kt&oacute;rych mowa w art. 7 rozporządzenia (WE) nr 1071/2009 związane z wymogiem zdolności finansowej. Przedsiębiorca musi być w stanie w każdym momencie roku finansowego spełnić swoje zobowiązania finansowe. W tym celu przedsiębiorca wykazuje na podstawie poświadczonych przez audytora lub odpowiednio upoważnioną osobę rocznych sprawozdań finansowych, że co roku dysponuje kapitałem i rezerwami o wartości co najmniej r&oacute;wnej 9 000 EUR w przypadku wykorzystywania tylko jednego pojazdu i 5 000 EUR na każdy dodatkowy wykorzystywany pojazd.</p>\r\n</li>\r\n<li>\r\n<p style=\"text-align: justify;\"><strong>2)</strong> wykaz pojazd&oacute;w zawierający następujące informacje: 5) markę, typ; 2) rodzaj/przeznaczenie; 3) numer rejestracyjny; 4) numer VIN; wskazanie rodzaju tytułu prawnego do dysponowania pojazdem wraz z kserokopiami dowod&oacute;w rejestracyjnych, z aktualnymi badaniami technicznymi;</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<p style=\"text-align: justify;\"><strong>W drodze odstępstwa</strong> właściwy organ może zgodzić się lub wymagać, aby przedsiębiorca wykazał swoją zdolność finansową za pomocą zabezpieczenia, takiego jak gwarancja bankowa lub ubezpieczenie, w tym<strong> ubezpieczenie odpowiedzialności zawodowej</strong> z jednego lub kilku bank&oacute;w lub innych instytucji finansowych, w tym <strong>przedsiębiorstw ubezpieczeniowych</strong>, składających solidarną gwarancję za przedsiębiorstwo na kwoty określone przy posiadaniu pojazd&oacute;w samochodowych przeznaczonych do transportu drogowego.</p>\r\n</div>\r\n<div style=\"margin: 0 auto; text-align: center;\"><strong>Pouczenie</strong></div>\r\n<div>\r\n<p style=\"text-align: justify;\">Jednocześnie informuję, że jeśli organ udzielający &bdquo;zezwolenia na wykonywanie zawodu przewoźnika drogowego&rdquo; wyrażonego licencją na wykonywanie krajowego transportu drogowego rzeczy, stwierdzi niespełnienie przez przedsiębiorcę wymog&oacute;w będących podstawą do wydania tego dokumentu, organ ten zawiesza lub cofa zezwolenie (licencję) na wykonywanie zawodu przewoźnika drogowego.</p>\r\n</div>\r\n<div style=\"padding-top: .5in;\"><strong>Otrzymuje:</strong></div>\r\n<div>\r\n<ul style=\"list-style: none;\">\r\n<li>1. Adresat</li>\r\n<li>2. a/a</li>\r\n</ul>\r\n</div>\r\n<div style=\"padding-top: 2.5in;\"><strong>UWAGA: wszelkie informacje można uzyskać pod nr telefonu 94 71 40 116 lub w pokoju nr 116 w Wydziale Komunikacji i Dr&oacute;g Starostwa Powiatowego w Koszalinie</strong></div>', 'KD.7250.44.2019.EZ', '2019-09-16', 1, '2019-09-17 15:25:31', '2019-09-17 15:25:31'),
(33, NULL, '<div style=\"float: right;\">Koszalin dn. 2019-09-23 r.</div>\r\n<div style=\"text-align: left; margin-top: 30px; clear: both;\">KD.7250.154.2019.EZ</div>\r\n<div class=\"row col-4\" style=\"float: right; margin-top: 40px; margin-right: 80px;\"><strong>POLTRANS Marzena Kujawa<br />Biała 123<br />76-0 Mścice</strong></div>\r\n<div style=\"clear: both;\"><br /><br />\r\n<p style=\"text-align: justify;\"><span style=\"padding-left: 50px;\">&nbsp;</span>Starosta Koszaliński na podstawie art. 83 ust. 1 ustawy z dnia 6 września 2001 r. o transporcie drogowym (Dz. U. z 2019 r., poz. 58 z p&oacute;źn. zm.) oraz &sect; 2 ust. 3 rozporządzenia Ministra Infrastruktury i Rozwoju z dnia 8 września 2014 roku w sprawie danych i informacji, kt&oacute;re przewoźnik drogowy jest obowiązany przekazywać do organu w związku z prowadzoną działalnością w zakresie przewozu drogowego (Dz.U. z 2014 r., poz.1217) nakłada na Pana obowiązek <strong> przedłożenia w terminie 21 dni od dnia otrzymania tego pisma</strong>, dokument&oacute;w potwierdzających spełnienie wymagań ustawowych do otrzymanego &bdquo;zezwolenia na wykonywanie zawodu przewoźnika drogowego&rdquo; wyrażonego licencją:</p>\r\n</div>\r\n<div><strong>nr 10065876</strong> udzieloną dnia 2019-07-24 roku na wykonywanie krajowego transportu drogowego osoby. tj.:</div>\r\n<div><br />\r\n<ul style=\"list-style: none;\">\r\n<li>\r\n<p style=\"text-align: justify;\"><strong>1)</strong> dokumenty potwierdzające spełnienie warunk&oacute;w, o kt&oacute;rych mowa w art. 7 rozporządzenia (WE) nr 1071/2009 związane z wymogiem zdolności finansowej. Przedsiębiorca musi być w stanie w każdym momencie roku finansowego spełnić swoje zobowiązania finansowe. W tym celu przedsiębiorca wykazuje na podstawie poświadczonych przez audytora lub odpowiednio upoważnioną osobę rocznych sprawozdań finansowych, że co roku dysponuje kapitałem i rezerwami o wartości co najmniej r&oacute;wnej 9 000 EUR w przypadku wykorzystywania tylko jednego pojazdu i 5 000 EUR na każdy dodatkowy wykorzystywany pojazd.</p>\r\n</li>\r\n<li>\r\n<p style=\"text-align: justify;\"><strong>2)</strong> wykaz pojazd&oacute;w zawierający następujące informacje: 5) markę, typ; 2) rodzaj/przeznaczenie; 3) numer rejestracyjny; 4) numer VIN; wskazanie rodzaju tytułu prawnego do dysponowania pojazdem wraz z kserokopiami dowod&oacute;w rejestracyjnych, z aktualnymi badaniami technicznymi;</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div>\r\n<p style=\"text-align: justify;\"><strong>W drodze odstępstwa</strong> właściwy organ może zgodzić się lub wymagać, aby przedsiębiorca wykazał swoją zdolność finansową za pomocą zabezpieczenia, takiego jak gwarancja bankowa lub ubezpieczenie, w tym<strong> ubezpieczenie odpowiedzialności zawodowej</strong> z jednego lub kilku bank&oacute;w lub innych instytucji finansowych, w tym <strong>przedsiębiorstw ubezpieczeniowych</strong>, składających solidarną gwarancję za przedsiębiorstwo na kwoty określone przy posiadaniu pojazd&oacute;w samochodowych przeznaczonych do transportu drogowego.</p>\r\n</div>\r\n<div style=\"margin: 0 auto; text-align: center;\"><strong>Pouczenie</strong></div>\r\n<div>\r\n<p style=\"text-align: justify;\">Jednocześnie informuję, że jeśli organ udzielający &bdquo;zezwolenia na wykonywanie zawodu przewoźnika drogowego&rdquo; wyrażonego licencją na wykonywanie krajowego transportu drogowego rzeczy, stwierdzi niespełnienie przez przedsiębiorcę wymog&oacute;w będących podstawą do wydania tego dokumentu, organ ten zawiesza lub cofa zezwolenie (licencję) na wykonywanie zawodu przewoźnika drogowego.</p>\r\n</div>\r\n<div style=\"padding-top: .5in;\"><strong>Otrzymuje:</strong></div>\r\n<div>\r\n<ul style=\"list-style: none;\">\r\n<li>1. Adresat</li>\r\n<li>2. a/a</li>\r\n</ul>\r\n</div>\r\n<div style=\"padding-top: 2.5in;\"><strong>UWAGA: wszelkie informacje można uzyskać pod nr telefonu 94 71 40 116 lub w pokoju nr 116 w Wydziale Komunikacji i Dr&oacute;g Starostwa Powiatowego w Koszalinie</strong></div>', 'dsfgsdfg', '2019-09-23', 2, '2019-09-23 14:03:32', '2019-09-23 14:03:32');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedsiebiorca`
--

CREATE TABLE `przedsiebiorca` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nazwa_firmy` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_osf` int(2) NOT NULL,
  `imie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `miejscowosc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kod_p` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gmina` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` bigint(11) NOT NULL DEFAULT 0,
  `regon` bigint(11) NOT NULL DEFAULT 0,
  `telefon` bigint(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `uwagi` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `przedsiebiorca`
--

INSERT INTO `przedsiebiorca` (`id`, `nazwa_firmy`, `id_osf`, `imie`, `nazwisko`, `adres`, `miejscowosc`, `kod_p`, `gmina`, `nip`, `regon`, `telefon`, `email`, `status`, `uwagi`, `created_at`, `updated_at`) VALUES
(1, 'TransCar CARGO Janusz Kowalski', 1, 'Janusz', 'Kowalski', 'Koszalińska 23/6', 'Kretomino', '75-900', NULL, 6698787562, 330256456, 555444666, NULL, 0, NULL, '2019-07-19 14:09:38', '2019-09-23 17:43:19'),
(2, 'POLTRANS Marzena Kujawa', 2, 'Marzena', 'Kujawa', 'Biała 123', 'Mścice', '76-0', NULL, 66954566656, 330215447, 554666555, NULL, 0, NULL, '2019-07-30 15:29:54', '2019-07-30 15:51:20'),
(3, 'MarCar Trans Sp. z o.o.', 1, 'Karol', 'Bast', 'Kołobrzeska 32', 'Mścice', '76-031', NULL, 66954566656, 330215447, 554666555, NULL, 0, NULL, '2019-07-30 15:29:54', '2019-09-10 17:58:27'),
(4, 'USŁUGI PRZEWOZOWE Zbigniew Chotkowski', 1, 'Zbiegniew', 'Chotkowski', 'Strzelecka 11/1', 'Sianów', '76-004', NULL, 123456789, 123456789, 987654321, NULL, 0, NULL, '2019-08-16 11:56:53', '2019-08-16 11:56:53'),
(6, 'KTM SPEDYCJA Spólka z o.o.', 2, 'b/d', 'b/d', 'Biesiekierz 63C -5', 'Biesiekierz', '76-039', NULL, 66932222222, 330311122, 666555666, NULL, 0, NULL, '2019-08-21 15:03:41', '2019-08-21 15:03:41'),
(7, 'DZIAŁALNOŚĆ ROZRYWKOWO-USŁUGOWO – TRANSPORTOWA „ GAWRON „ SKLEP SPOŻYWCZO – PRZEMYSŁOWY Teresa Gawrońska', 1, 'Teresa', 'Gawrońska', 'Giezkowo 13', 'Świeszyno', '76-024', NULL, 69965465465, 332445646, 947140111, NULL, 0, NULL, '2019-08-21 15:34:39', '2019-08-22 15:36:42'),
(8, 'Przewozy Osobowo - Towarowe \"RUMCAJS\" Krzysztof Rogaś', 1, 'Krzysztof', 'Rogaś', 'Rosnowo 25/27', 'Rosnowo', '76-046', NULL, 44965465465, 333654646, 321654987, NULL, 0, NULL, '2019-08-22 15:28:06', '2019-08-22 15:28:06'),
(9, 'Auto Naprawa – Wywóz Nieczystości Płynnych Henryk Marut', 1, 'Henryk', 'Marut', 'Kościernica 3/2', 'Polanów', '76-010', NULL, 66965465465, 322564646, 456654456, NULL, 0, NULL, '2019-08-22 15:39:21', '2019-08-22 15:39:21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaj_przed`
--

CREATE TABLE `rodzaj_przed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rodzaj` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `typ` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uwagi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `rodzaj_przed`
--

INSERT INTO `rodzaj_przed` (`id`, `rodzaj`, `typ`, `uwagi`, `created_at`, `updated_at`) VALUES
(1, 'Osoba fizyczna', 'Osoba fizyczna', NULL, NULL, NULL),
(2, 'Sp. z o.o.', NULL, NULL, NULL, NULL),
(3, 'Sp. z o.o. Sp. K.', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wykaz_poj`
--

CREATE TABLE `wykaz_poj` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) UNSIGNED DEFAULT NULL,
  `id_dok_przed` bigint(20) DEFAULT NULL,
  `rodzaj_poj` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marka` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr_rej` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_nr_rej` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr_vin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dmc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wlasnosc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_wpr` date DEFAULT NULL,
  `data_wyc` date DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `stan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '1',
  `uwagi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `wykaz_poj`
--

INSERT INTO `wykaz_poj` (`id`, `id_przed`, `id_dok_przed`, `rodzaj_poj`, `marka`, `nr_rej`, `p_nr_rej`, `nr_vin`, `dmc`, `wlasnosc`, `data_wpr`, `data_wyc`, `status`, `stan`, `uwagi`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'samochód ciężarowy', 'VOLVO S2000', 'ZKO W213', NULL, 'VVWER983479583454', '24 000', 'własność', '2019-07-01', NULL, 1, '0000-00-00', NULL, NULL, '2019-07-28 16:25:13'),
(5, 1, 1, 'samochód ciężarowy', 'MAN 353', 'ZKO 3DS3', NULL, 'XSAFDDF0987098709', '40 000', 'tak', '2019-07-01', '2019-07-03', 2, '2019-07-03', NULL, NULL, NULL),
(6, 1, 1, 'ciągnik samochodowy', 'SCANIA 444', 'ZKO 34AC', NULL, 'SDF34523452345324', '18 000', 'leasing', '2019-07-22', '2019-07-25', 2, '2019-07-25', NULL, '2019-07-23 16:22:58', '2019-07-30 12:49:01'),
(16, 1, 1, 'samochód ciężarowy', 'MAN 33.42', 'ZKO 5CH5', NULL, 'MWAS3456345634563', '18 000', 'własność', '2019-07-23', NULL, 1, '2019-07-23', NULL, '2019-07-24 15:25:38', '2019-08-27 21:12:09'),
(25, 1, 1, 'samochód specjalny', 'DAF R230', 'ZKO 7XY2', 'ZK 32444', 'DDWER342532452345', '38 000', 'własność', '2019-07-24', NULL, 1, '0000-00-00', NULL, '2019-07-24 15:32:35', '2019-07-30 12:42:19'),
(26, 2, 2, 'samochod ciężarowy', 'MAN 23.444', 'ZKO T450', NULL, 'WERTTREEEEE542345', '34 000', 'własność', '2019-07-22', NULL, 1, '2019-07-22', NULL, '2019-07-24 19:07:49', '2019-07-30 15:22:52'),
(27, 2, 2, 'ciągnik samochodowy', 'VOLVO 2345', 'ZK 23877', NULL, 'EERT234523542345', '34 000', 'własność', '2019-07-22', NULL, 1, '2019-07-22', NULL, '2019-07-27 18:12:51', '2019-07-27 18:12:51'),
(28, 3, 3, 'ciągnik samochodowy', 'ICARUS W32', 'ZKO E639', NULL, 'OOUUO324', '30 000', 'własność', '2019-07-31', NULL, 1, '0000-00-00', NULL, '2019-07-31 13:12:38', '2019-09-23 16:31:46'),
(29, 3, 3, 'samochód ciężarowy', 'IVECO DAILY', 'ZKO 45H3', NULL, 'DFEW4234234KJH873', '26 000', 'własność', '2019-08-02', '2019-08-27', 2, '0000-00-00', NULL, '2019-08-04 14:41:11', '2019-08-27 07:47:09'),
(30, 4, 4, 'autobus', 'SCANIA IRIZAR', 'ZKO 32VU', NULL, 'YS4KT6X2B01828041', '51/3', 'tak', '2011-04-11', NULL, 1, '0000-00-00', NULL, '2019-08-16 10:25:49', '2019-08-16 10:25:49'),
(31, 4, 4, 'autobus', 'PEGASO TDA 59.129', 'ZKO 5H17', NULL, 'ZCFC5980002184263', '26', 'tak', '2013-09-20', NULL, 1, '0000-00-00', NULL, '2019-08-16 10:26:30', '2019-08-16 10:26:30'),
(32, 4, 4, 'autobus', 'IVECO A40 45E', 'ZKO 61A8', NULL, 'ZCF04580105116591', '21', 'tak', '2016-02-24', '2019-09-13', 2, '0000-00-00', NULL, '2019-08-16 10:27:15', '2019-09-13 21:29:43'),
(33, 4, 4, 'autobus', 'SCANIA K 124', 'ZKO 17K3', NULL, 'YS4KX20001836476', '53', 'tak', '2017-01-26', NULL, 1, '0000-00-00', NULL, '2019-08-16 10:28:01', '2019-08-16 10:28:01'),
(34, 4, 4, 'autobus', 'MERCEDES-BENZ / CUBY', 'ZKO 54S2', NULL, 'WDB9066571S390811', '21', 'tak', '2018-01-25', NULL, 1, '0000-00-00', NULL, '2019-08-16 10:28:40', '2019-08-16 10:37:01'),
(35, 4, 4, 'autobus', 'JELCZ PR 110D', 'ZKO G219', NULL, '2394', '49', 'tak', '2003-06-30', '2007-05-08', 2, '0000-00-00', NULL, '2019-08-16 10:29:21', '2019-08-16 10:29:35'),
(36, 4, 4, 'autobus', 'SCANIA K 112', 'ZKO 04EU', NULL, 'YS4KC4X2B01807663', '54', 'tak', '2006-06-30', '2011-04-11', 2, '0000-00-00', NULL, '2019-08-16 10:30:15', '2019-08-16 10:30:25'),
(37, 4, 4, 'autobus', 'MERCEDES 1634', 'ZKO 89JM', NULL, 'WDB39648316902259', '56', 'tak', '2007-05-08', '2012-11-05', 2, '0000-00-00', NULL, '2019-08-16 10:31:18', '2019-08-16 10:31:34'),
(38, 4, 4, 'autobus', 'SCANIA K-113CLC', 'ZKO 89PN', NULL, 'YS4KC4X2B01819984', '54', 'tak', '2009-03-24', '2012-11-05', 2, '0000-00-00', NULL, '2019-08-16 10:33:03', '2019-08-16 10:33:14'),
(39, 4, 4, 'autobus', 'BOVA FHD 12340', 'ZKO 3C15', NULL, 'XL9AA18CG76003496', '51', 'tak', '2006-08-01', '2018-10-24', 2, '2018-10-24', NULL, '2019-08-16 10:34:18', '2019-08-16 10:34:36'),
(40, 8, 7, 'autobus', 'DAF F340', 'ZKO R300', NULL, 'DAF09LKUlOKUHOL86', '45', 'tak', '2016-08-21', NULL, 1, '0000-00-00', NULL, '2019-08-22 13:33:16', '2019-08-22 13:33:16'),
(41, 2, 2, 'samochód ciężarowy', 'DAF R32.23', 'ZKO E400', NULL, 'DAF23452345DSF', '35 000', 'własność', '2019-07-27', '2019-08-26', 2, '2019-08-27', NULL, '2019-08-27 08:50:07', '2019-08-27 08:50:26'),
(44, 2, 2, 'samochód ciężarowy', 'DAF 456', 'ZKO 34WE', NULL, '90870970987070870', '25 000', 'wlasność', '2019-09-03', NULL, 1, '1', NULL, '2019-09-10 16:42:21', '2019-09-10 16:42:21'),
(45, 3, 3, 'ciągnik samochodowy', 'MAN', 'ZKO P433', NULL, 'iutyfiuy', '098', 'leasing', '2019-09-03', NULL, 1, '1', NULL, '2019-09-10 17:59:04', '2019-09-23 16:32:23');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdol_finans`
--

CREATE TABLE `zdol_finans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `nazwa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numer` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_od` date DEFAULT NULL,
  `data_do` date DEFAULT NULL,
  `ile_poj` int(11) DEFAULT NULL,
  `suma_zab` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `uwagi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `zdol_finans`
--

INSERT INTO `zdol_finans` (`id`, `id_przed`, `nazwa`, `numer`, `data_od`, `data_do`, `ile_poj`, `suma_zab`, `status`, `uwagi`, `created_at`, `updated_at`) VALUES
(1, 1, 'OPZ PANONI', 'PWB1234234', '2019-07-19', '2019-08-31', 5, '14 000', 1, '<p><strong>test</strong></p>', '2019-07-19 15:35:33', '2019-09-07 08:09:28'),
(2, 2, 'fddsfgsdfgs', NULL, '2019-07-22', '2019-07-31', 3, '19 000', 1, NULL, '2019-07-24 21:00:56', '2019-07-24 21:00:56'),
(3, 3, 'Geother T.U.S.A', NULL, '2019-01-01', '2020-01-01', 5, '29 000', 1, NULL, '2019-07-30 15:36:24', '2019-07-30 15:36:24'),
(4, 4, 'Pannoni', NULL, '2018-11-27', '2019-11-27', 6, '29 000', 1, NULL, '2019-08-16 12:01:37', '2019-08-25 17:33:09'),
(5, 6, 'Środki na koncie', 'asdfasdfasdf', '2018-02-20', '2020-02-20', 0, '50 000', 1, NULL, '2019-08-21 15:08:18', '2019-08-27 19:09:07'),
(6, 7, 'GENERALI S.A.', NULL, '2018-07-28', '2019-07-28', 5, '29 0000', 1, NULL, '2019-08-21 15:40:08', '2019-08-25 17:38:11'),
(7, 8, 'Nieruchomość i polisa', NULL, '2019-01-01', '2020-01-01', 1, '9 000', 1, NULL, '2019-08-22 15:31:52', '2019-08-22 15:31:52');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `baza_eksp`
--
ALTER TABLE `baza_eksp`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `cert_komp`
--
ALTER TABLE `cert_komp`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `decyzje`
--
ALTER TABLE `decyzje`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `dok_przed`
--
ALTER TABLE `dok_przed`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `dok_przed_wyp`
--
ALTER TABLE `dok_przed_wyp`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `hist_zmian_przed`
--
ALTER TABLE `hist_zmian_przed`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kontrole`
--
ALTER TABLE `kontrole`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indeksy dla tabeli `pisma`
--
ALTER TABLE `pisma`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `przedsiebiorca`
--
ALTER TABLE `przedsiebiorca`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `rodzaj_przed`
--
ALTER TABLE `rodzaj_przed`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `wykaz_poj`
--
ALTER TABLE `wykaz_poj`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zdol_finans`
--
ALTER TABLE `zdol_finans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `baza_eksp`
--
ALTER TABLE `baza_eksp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `cert_komp`
--
ALTER TABLE `cert_komp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `decyzje`
--
ALTER TABLE `decyzje`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `dok_przed`
--
ALTER TABLE `dok_przed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `dok_przed_wyp`
--
ALTER TABLE `dok_przed_wyp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `hist_zmian_przed`
--
ALTER TABLE `hist_zmian_przed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `pisma`
--
ALTER TABLE `pisma`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT dla tabeli `przedsiebiorca`
--
ALTER TABLE `przedsiebiorca`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `wykaz_poj`
--
ALTER TABLE `wykaz_poj`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT dla tabeli `zdol_finans`
--
ALTER TABLE `zdol_finans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
