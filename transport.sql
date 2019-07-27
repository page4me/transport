-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Lip 2019, 20:29
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
(1, 1, '1', 'Konikowo 50', '76-024', 'Świeszyno', 'Świeszyno', 'Nie', 'Na czas określony', '2020-01-01', NULL, '2019-07-19 14:12:56', '2019-07-19 14:12:56'),
(2, 2, '1', 'Kretomino 2', '75-900', 'Kretomino', 'Manowo', 'Tak', NULL, NULL, NULL, '2019-07-24 20:59:53', '2019-07-24 20:59:53');

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
(1, 1, 'rzeczy', 'dsaf', NULL, 'asdf', 'asdf', 'asdf', '2019-07-04', '2019-07-02', 'asdf', 'asdf', '2019-07-01', NULL, '2019-07-19 15:33:18', '2019-07-19 15:33:18'),
(2, 2, 'osoby', 'sdfgsdfg', NULL, 'sfdgsdfg', 'sdfg', 'sdfg', '2019-07-23', '2019-07-25', 'TAK', NULL, NULL, NULL, '2019-07-24 21:00:27', '2019-07-24 21:00:27');

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

INSERT INTO `dok_przed` (`id`, `id_przed`, `nazwa`, `rodz_dok`, `nr_dok`, `nr_druku`, `nr_sprawy`, `data_wn`, `data_wyd`, `data_waz`, `uwagi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Zezwolenie', 'rzeczy', '0157456', 'WR 15645665', 'KD.,7250.15.2019.EZ', '2019-07-19', '2019-07-22', '2059-07-22', NULL, '2019-07-19 14:11:09', '2019-07-19 14:11:09'),
(2, 2, '2', 'osoby', '1006524', 'LA 7987987987', 'KD.7520.80.2019.EZ', '2019-07-08', '2019-07-24', '2039-07-24', NULL, '2019-07-24 20:59:02', '2019-07-24 20:59:02');

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
  `uwagi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Zrzut danych tabeli `dok_przed_wyp`
--

INSERT INTO `dok_przed_wyp` (`id`, `id_dok_przed`, `id_przed`, `nazwa`, `rodzaj_wyp`, `nr_wyp`, `nr_druku`, `nr_sprawy`, `data_wn`, `data_wyd`, `uwagi`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'Zezwolenie', 'rzeczy', '01/2019', 'WD 12346', 'asdfasdf', '2019-07-01', '2019-07-05', NULL, '2019-07-20 17:11:05', '2019-07-20 17:11:05');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `hist_zmian_przed`
--

CREATE TABLE `hist_zmian_przed` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `dat_kol_kont` date DEFAULT NULL,
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'TransCar Janusz Kowalski', 1, 'Janusz', 'Kowalski', 'ul. Południowa 43', 'Kretomino', '75-900', NULL, 6698787562, 330256456, 789987778, NULL, 0, NULL, '2019-07-19 14:09:38', '2019-07-19 14:09:38'),
(2, 'JarPol Maciek Bora', 1, 'Maciek', 'Bora', 'ul. Czewona 2', 'Bobolice', '76-020', NULL, 66956656565, 330555656, 8888888888, NULL, 0, NULL, '2019-07-24 20:58:06', '2019-07-24 20:58:06');

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
(4, 1, 1, 'samochód ciężarowy', 'SCANIA R343', 'ZKO W234', NULL, 'XSAFDDF0987098709', '40 000', 'tak', '2019-07-01', NULL, 1, '0000-00-00', NULL, NULL, NULL),
(5, 1, 1, 'samochód ciężarowy', 'MAN 353', 'ZKO 3DS3', NULL, 'XSAFDDF0987098709', '40 000', 'tak', '2019-07-01', NULL, 2, '0000-00-00', NULL, NULL, NULL),
(6, 1, 1, 'ciągnik samochodowy', 'DAF 998', 'ZKO 34AS', NULL, 'WFSAF987979879879', '40 000', 'własność', '2019-07-23', NULL, 1, NULL, NULL, '2019-07-23 18:22:58', '2019-07-23 18:22:58'),
(16, 1, 1, 'samochód ciężarowy', 'SCANIA R410', 'ZKO 8H88', NULL, 'WMASD807987098098', '28 999', 'własność', '2019-07-24', NULL, 1, '1', NULL, '2019-07-24 17:25:38', '2019-07-24 17:25:38'),
(25, 1, 1, 'samochód ciężarowy', 'MAN 33.44', 'ZK 32444', NULL, 'MWAS3456345634563', '18 000', 'leasing', '2019-07-25', NULL, 1, '1', NULL, '2019-07-24 17:32:35', '2019-07-24 17:32:35'),
(26, 2, 2, 'samochód ciężarowy', 'MAN 324', 'ZKO 2CH5', NULL, 'WEEEW43543354', '13 000', 'leasing', '2019-07-23', NULL, 1, '1', NULL, '2019-07-24 21:07:49', '2019-07-24 21:07:49');

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
(1, 1, 'OPZ PANONI', NULL, '2019-07-19', '2019-08-31', 5, '14 000', 1, NULL, '2019-07-19 15:35:33', '2019-07-19 15:35:33'),
(2, 2, 'fddsfgsdfgs', NULL, '2019-07-22', '2019-07-31', 3, '19 000', 1, NULL, '2019-07-24 21:00:56', '2019-07-24 21:00:56');

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
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `cert_komp`
--
ALTER TABLE `cert_komp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `decyzje`
--
ALTER TABLE `decyzje`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `dok_przed`
--
ALTER TABLE `dok_przed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `dok_przed_wyp`
--
ALTER TABLE `dok_przed_wyp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `hist_zmian_przed`
--
ALTER TABLE `hist_zmian_przed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `kontrole`
--
ALTER TABLE `kontrole`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `pisma`
--
ALTER TABLE `pisma`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `przedsiebiorca`
--
ALTER TABLE `przedsiebiorca`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `rodzaj_przed`
--
ALTER TABLE `rodzaj_przed`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `wykaz_poj`
--
ALTER TABLE `wykaz_poj`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT dla tabeli `zdol_finans`
--
ALTER TABLE `zdol_finans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
