-- phpMyAdmin SQL Dump
-- version 5.0.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 28 Lut 2020, 20:14
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
  `id_dok_przed` bigint(99) DEFAULT NULL,
  `rodzaj` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kod_p` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `miasto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmina` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wlasnosc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `umowa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_umowy` date DEFAULT NULL,
  `uwagi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cert_komp`
--

CREATE TABLE `cert_komp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `id_dok_przed` bigint(99) DEFAULT NULL,
  `rodzaj` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_cert` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imie_os_z` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nazwisko_os_z` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `miasto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_ur` date DEFAULT NULL,
  `dat_wyd` date DEFAULT NULL,
  `os_zarz` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `umowa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_umowy` date DEFAULT NULL,
  `uwagi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `decyzje`
--

CREATE TABLE `decyzje` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dok_przed`
--

CREATE TABLE `dok_przed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `nazwa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rodz_dok` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nr_dok` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_nr_dok` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_druku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_sprawy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_wn` date DEFAULT NULL,
  `data_wyd` date DEFAULT NULL,
  `data_waz` date NOT NULL,
  `powod` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_zaw` date DEFAULT NULL,
  `dat_zaw_do` date DEFAULT NULL,
  `dat_odw` date DEFAULT NULL,
  `dat_rez` date DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `uwagi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dok_przed_wyp`
--

CREATE TABLE `dok_przed_wyp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dok_przed` bigint(20) DEFAULT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `nazwa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rodzaj_wyp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_wyp` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_druku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_sprawy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_wn` date DEFAULT NULL,
  `data_wyd` date DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `dat_dep_wp` date DEFAULT NULL,
  `dat_dep_wyd` date DEFAULT NULL,
  `uwagi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hist_zmian_przed`
--

CREATE TABLE `hist_zmian_przed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(11) DEFAULT NULL,
  `id_dok_przed` bigint(11) DEFAULT NULL,
  `nazwa_zm` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_zm` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontrole`
--

CREATE TABLE `kontrole` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `id_dok_przed` bigint(99) DEFAULT NULL,
  `nazwa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_sprawy` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_zawiad` date DEFAULT NULL,
  `dat_roz` date DEFAULT NULL,
  `dat_zak` date DEFAULT NULL,
  `nr_upo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wynik` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zalecenia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_zal` date DEFAULT NULL,
  `wyn_pokont` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_ost_kont` date DEFAULT NULL,
  `uwagi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osk`
--

CREATE TABLE `osk` (
  `id` bigint(10) NOT NULL,
  `nr_zezw` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_nr_zezw` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_w_od` date DEFAULT NULL,
  `kat` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nazwa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adres_s` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adres_b` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adres_sw` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adres_pl_1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adres_pl_2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmina` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT 1,
  `uwagi` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osk_badania`
--

CREATE TABLE `osk_badania` (
  `id` bigint(10) NOT NULL,
  `id_inst` bigint(10) DEFAULT NULL,
  `orz_lek` date DEFAULT NULL,
  `orz_psy` date DEFAULT NULL,
  `dat_leg` date DEFAULT NULL,
  `dat_skr` date DEFAULT NULL,
  `powod` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT 1,
  `uwagi` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osk_instruktorzy`
--

CREATE TABLE `osk_instruktorzy` (
  `id` bigint(10) NOT NULL,
  `id_osk` bigint(10) DEFAULT NULL,
  `nr_upr` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_nr_upr` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_w` date DEFAULT NULL,
  `nr_leg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_nr_leg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imie` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nazwisko` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `adres` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gmina` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pesel` int(11) DEFAULT NULL,
  `dat_w_leg` date DEFAULT NULL,
  `dat_skr` date DEFAULT NULL,
  `powod` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `warsztaty` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tel` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `uwagi` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `osk_kat_inst`
--

CREATE TABLE `osk_kat_inst` (
  `id` bigint(10) NOT NULL,
  `id_inst` bigint(10) DEFAULT NULL,
  `nr_upr` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kat_a` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_a` date DEFAULT NULL,
  `kat_am` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_am` date DEFAULT NULL,
  `kat_a1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_a1` date DEFAULT NULL,
  `kat_a2` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_a2` date DEFAULT NULL,
  `kat_b` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_b` date DEFAULT NULL,
  `kat_b1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_b1` date DEFAULT NULL,
  `kat_be` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_be` date DEFAULT NULL,
  `kat_c` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_c` date DEFAULT NULL,
  `kat_c1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_c1` date DEFAULT NULL,
  `kat_c1e` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_c1e` date DEFAULT NULL,
  `kat_ce` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_ce` date DEFAULT NULL,
  `kat_d` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_d` date DEFAULT NULL,
  `kat_d1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_d1` date DEFAULT NULL,
  `kat_de` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_de` date DEFAULT NULL,
  `kat_d1e` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_d1e` date DEFAULT NULL,
  `kat_t` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_t` date DEFAULT NULL,
  `kat_t1` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dat_t1` date DEFAULT NULL,
  `uwagi` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pisma`
--

CREATE TABLE `pisma` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nazwa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tresc` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_sprawy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_p` date DEFAULT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedsiebiorca`
--

CREATE TABLE `przedsiebiorca` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nazwa_firmy` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_osf` int(2) NOT NULL,
  `imie` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `miejscowosc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kod_p` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gmina` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nip` bigint(11) NOT NULL DEFAULT 0,
  `regon` bigint(11) NOT NULL DEFAULT 0,
  `telefon` bigint(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `uwagi` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `rodzaj_przed`
--

CREATE TABLE `rodzaj_przed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rodzaj` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typ` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uwagi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Zrzut danych tabeli `rodzaj_przed`
--

INSERT INTO `rodzaj_przed` (`id`, `rodzaj`, `typ`, `uwagi`, `created_at`, `updated_at`) VALUES
(1, 'osoba fizyczna', 'działalność gospodarcza', NULL, NULL, NULL),
(2, 'spółka z o.o.', NULL, NULL, NULL, NULL),
(3, 'spółka cywilna', NULL, NULL, NULL, NULL),
(4, 'spółka z o.o. sp. k.', NULL, NULL, NULL, NULL),
(5, 'spółka jawna', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wykaz_poj`
--

CREATE TABLE `wykaz_poj` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) UNSIGNED DEFAULT NULL,
  `id_dok_przed` bigint(20) DEFAULT NULL,
  `rodzaj_poj` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `marka` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_rej` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_nr_rej` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nr_vin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dmc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wlasnosc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_wpr` date DEFAULT NULL,
  `data_wyc` date DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `stan` varchar(255) COLLATE utf8_unicode_ci DEFAULT '1',
  `uwagi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdol_finans`
--

CREATE TABLE `zdol_finans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_przed` bigint(20) DEFAULT NULL,
  `id_dok_przed` bigint(99) DEFAULT NULL,
  `nazwa` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_od` date DEFAULT NULL,
  `data_do` date DEFAULT NULL,
  `ile_poj` int(11) DEFAULT NULL,
  `suma_zab` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `uwagi` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Indeksy dla tabeli `osk`
--
ALTER TABLE `osk`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `osk_badania`
--
ALTER TABLE `osk_badania`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `osk_instruktorzy`
--
ALTER TABLE `osk_instruktorzy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `osk_kat_inst`
--
ALTER TABLE `osk_kat_inst`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT dla tabeli `cert_komp`
--
ALTER TABLE `cert_komp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `decyzje`
--
ALTER TABLE `decyzje`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `dok_przed`
--
ALTER TABLE `dok_przed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `dok_przed_wyp`
--
ALTER TABLE `dok_przed_wyp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT dla tabeli `hist_zmian_przed`
--
ALTER TABLE `hist_zmian_przed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT dla tabeli `kontrole`
--
ALTER TABLE `kontrole`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `osk`
--
ALTER TABLE `osk`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `osk_badania`
--
ALTER TABLE `osk_badania`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `osk_instruktorzy`
--
ALTER TABLE `osk_instruktorzy`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `osk_kat_inst`
--
ALTER TABLE `osk_kat_inst`
  MODIFY `id` bigint(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `pisma`
--
ALTER TABLE `pisma`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `przedsiebiorca`
--
ALTER TABLE `przedsiebiorca`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `rodzaj_przed`
--
ALTER TABLE `rodzaj_przed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `wykaz_poj`
--
ALTER TABLE `wykaz_poj`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `zdol_finans`
--
ALTER TABLE `zdol_finans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

