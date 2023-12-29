-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 10:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_banks`
--

CREATE TABLE `blood_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_banks`
--

INSERT INTO `blood_banks` (`id`, `b_name`, `location`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Akkaraipattu Blood Bank', 'Ampara', '067 2277213', NULL, NULL),
(2, 'Ampara Blood Bank', 'Ampara', '063 2222261', NULL, NULL),
(3, 'Dehiatthakandiya Blood Bank', 'Ampara', '027 2250344', NULL, NULL),
(4, 'Kalmunai AM(S) Blood Bank', 'Ampara', '067 2222261', NULL, NULL),
(5, 'Kalmunai Base(N) Blood Bank', 'Ampara', '067 2229261', NULL, NULL),
(6, 'Mahaoya Blood Bank', 'Ampara', '063 2244061', NULL, NULL),
(7, 'Sammanthurai Blood Bank', 'Ampara', '067 2260261', NULL, NULL),
(8, 'Anuradhapura Blood Bank', 'Anuradhapura', '025 2222261-63', NULL, NULL),
(9, 'Medirigiriya Blood Bank', 'Anuradhapura', '027 2248261', NULL, NULL),
(10, 'Padaviya Blood Bank', 'Anuradhapura', '025 2253261', NULL, NULL),
(11, 'Polonnaruwa Blood Bank', 'Anuradhapura', '027 2222261', NULL, NULL),
(12, 'Thambuttegama Blood Bank', 'Anuradhapura', '025 2276262', NULL, NULL),
(13, 'Badulla Blood Bank', 'Badulla', '055 2222261-62', NULL, NULL),
(14, 'Bibila Blood Bank', 'Badulla', '055 2265461', NULL, NULL),
(15, 'Diyatalawa Blood Bank', 'Badulla', '057 2229061', NULL, NULL),
(16, 'Mahiyanganaya Blood Bank', 'Badulla', '055 2257261', NULL, NULL),
(17, 'Monaragala Blood Bank', 'Badulla', '055 2276261', NULL, NULL),
(18, 'Welimada Blood Bank', 'Badulla', '057 2245161', NULL, NULL),
(19, 'Wellawaya Blood Bank', 'Badulla', '055 2274861', NULL, NULL),
(20, 'Batticaloa Blood Bank', 'Batticoloa', '065 2222261-62', NULL, NULL),
(21, 'Valachchenai Blood Bank', 'Batticoloa', '065 2257721', NULL, NULL),
(22, 'Avissawella Blood Bank', 'CIM', '036 2222261-62', NULL, NULL),
(23, 'CIM Blood Bank', 'CIM', '011 2850252-53', NULL, NULL),
(24, 'Homagama Blood Bank', 'CIM', '011 2855200', NULL, NULL),
(25, 'Karawenella Blood Bank', 'CIM', '036 2267374', NULL, NULL),
(26, 'Chilaw Blood Bank', 'CNTH', '032 2222261', NULL, NULL),
(27, 'CNTH Blood Bank', 'CNTH', '011 2959261-65', NULL, NULL),
(28, 'Gampaha Blood Bank', 'CNTH', '033 2222261-62', NULL, NULL),
(29, 'Kalpitiya* Blood Bank', 'CNTH', '032 2260261', NULL, NULL),
(30, 'Marawila Blood Bank', 'CNTH', '032 2254261', NULL, NULL),
(31, 'Negambo Blood Bank', 'CNTH', '033 2222261-62', NULL, NULL),
(32, 'Puttalam Blood Bank', 'CNTH', '032 2265261', NULL, NULL),
(33, 'Wathupitiwala Blood Bank', 'CNTH', '033 2280261-62', NULL, NULL),
(34, 'Welisara Blood Bank', 'CNTH', '011 2958271', NULL, NULL),
(35, 'Jaffna Blood Bank', 'Jaffna', '021 2222261', NULL, NULL),
(36, 'Killinochchi Blood Bank', 'Jaffna', '021 2285327', NULL, NULL),
(37, 'Mullaitivu Blood Bank', 'Jaffna', '024 3248436', NULL, NULL),
(38, 'Point Pedro Blood Bank', 'Jaffna', '021 226 3261', NULL, NULL),
(39, 'Thellippallai Blood Bank', 'Jaffna', '021 321 2614', NULL, NULL),
(40, 'Horana Blood Bank', 'Kalutara', '034 2261261', NULL, NULL),
(41, 'Kalutara Blood Bank', 'Kalutara', '034 2229129', NULL, NULL),
(42, 'Kethumathie Blood Bank', 'Kalutara', '038 2232361', NULL, NULL),
(43, 'Panadura Blood Bank', 'Kalutara', '038 2232261-62', NULL, NULL),
(44, 'Hambanthota Blood Bank', 'Kamburugamuwa', '047 2222016', NULL, NULL),
(45, 'Kamburugamuwa Blood Bank', 'Kamburugamuwa', '0412227232', NULL, NULL),
(46, 'Kamburupitiya Blood Bank', 'Kamburugamuwa', '041 2292261', NULL, NULL),
(47, 'Matara Blood Bank', 'Kamburugamuwa', '041 2222261-63', NULL, NULL),
(48, 'Tangalle Blood Bank', 'Kamburugamuwa', '047 2240261', NULL, NULL),
(49, 'Thissamaharama Blood Bank', 'Kamburugamuwa', '047 2237261', NULL, NULL),
(50, 'Dambulla Blood Bank', 'Kandy', '066 2284761', NULL, NULL),
(51, 'Dikkoya Blood Bank', 'Kandy', '051 2230261', NULL, NULL),
(52, 'Gampola Blood Bank', 'Kandy', '081 2352261', NULL, NULL),
(53, 'Kandy Blood Bank', 'Kandy', '081 2233337-42', NULL, NULL),
(54, 'Kegalle Blood Bank', 'Kandy', '035 2222261-63', NULL, NULL),
(55, 'Matale Blood Bank', 'Kandy', '066 2222261', NULL, NULL),
(56, 'Mawanella Blood Bank', 'Kandy', '035 2246278', NULL, NULL),
(57, 'Nawalapitiya Blood Bank', 'Kandy', '054 2222261', NULL, NULL),
(58, 'NuwaraEliya Blood Bank', 'Kandy', '052 2222261', NULL, NULL),
(59, 'Peradeniya Blood Bank', 'Kandy', '081 2388001-07', NULL, NULL),
(60, 'Rikillagaskada Blood Bank', 'Kandy', '081 2365261', NULL, NULL),
(61, 'Warakapola Blood Bank', 'Kandy', '035 2267261', NULL, NULL),
(62, 'Balapitiya Blood Bank', 'Karapitiya', '091 2258261', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blood_inventory`
--

CREATE TABLE `blood_inventory` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `blood_bank_id` bigint(20) UNSIGNED NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `is_tested` tinyint(1) NOT NULL DEFAULT 0,
  `tested_by` bigint(20) UNSIGNED DEFAULT NULL,
  `used_by` bigint(20) UNSIGNED DEFAULT NULL,
  `name_of_receiver` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `expiry_date` date NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `reason_for_rejection` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `d-schedule`
--

CREATE TABLE `d-schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `donor_id` bigint(20) UNSIGNED NOT NULL,
  `blood_bank_id` bigint(20) UNSIGNED NOT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `donated` tinyint(1) NOT NULL DEFAULT 0,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `name`, `location`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Asiri Surgical Hospital PLC', 'Colombo', '(011) 452 4400', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(5, '2010_12_22_174317_create_hospitals_table', 1),
(6, '2010_12_22_182902_create_blood_banks_table', 1),
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2023_12_23_193042_create_blood_inventory_table', 1),
(12, '2023_12_26_041347_create__d-shedule_table', 1),
(13, '2023_12_27_050916_cretate_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_type` varchar(255) NOT NULL,
  `emergency` tinyint(1) NOT NULL DEFAULT 0,
  `expiry_date` date DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `sender_id`, `receiver_type`, `emergency`, `expiry_date`, `title`, `body`, `created_at`, `updated_at`) VALUES
(1, 5, 'all', 0, '2023-12-29', 'this is test', 'this is message', '2023-12-28 12:30:32', '2023-12-28 12:30:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Fname` varchar(255) NOT NULL,
  `Lname` varchar(255) NOT NULL,
  `national_id` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `blood_type` varchar(255) DEFAULT NULL,
  `health_history` text DEFAULT NULL,
  `last_donation_date` date DEFAULT NULL,
  `eligibility_status` tinyint(1) NOT NULL DEFAULT 1,
  `address` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `blood_bank_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hospital_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('administrator','donor','hospital_staff','blood_bank_staff','lab_technician','recipient','volunteer_coordinator','dispatcher','auditor') NOT NULL DEFAULT 'donor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Fname`, `Lname`, `national_id`, `date_of_birth`, `phone_number`, `email`, `blood_type`, `health_history`, `last_donation_date`, `eligibility_status`, `address`, `location`, `blood_bank_id`, `hospital_id`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Adell', 'Hudson', '9294690479687', '2000-02-07', '+1-319-761-5741', 'wfeil@example.org', 'AB1', 'Vel non qui suscipit fugiat expedita.', '2023-05-18', 1, '430 Schowalter Park\nBrekkeville, SC 30572-8607', 'Tremblayberg', NULL, NULL, '$2y$12$rY.zYCd7iFSytBLffbx7Se/C5lNGnI6AswcBSs/Bgs.ppedArsAKy', 'blood_bank_staff', '2023-12-28 03:38:34', '2023-12-28 03:38:34'),
(2, 'Jeffery', 'Mertz', '3646860803662', '1989-02-12', '1-989-514-4485', 'christelle62@example.com', 'A4', 'Eos delectus aut voluptatibus error.', '2023-05-19', 1, '23139 Alicia Knoll\nSouth Gina, SD 56126-3231', 'Lake Vida', NULL, NULL, '$2y$12$vdedT7QvKFNYWTVVRWvHEu3qI1aXY0bjwEy2KJHADIfOQpp2oycLq', 'volunteer_coordinator', '2023-12-28 03:38:35', '2023-12-28 03:38:35'),
(3, 'Zita', 'Jaskolski', '2032514036209', '1997-02-14', '1-678-648-5541', 'pouros.bridie@example.net', 'A0', 'Expedita et sit culpa quo aspernatur.', '2023-12-27', 1, '85364 Benedict Valleys\nWest Mohammadport, WI 02422', 'East Tristinland', NULL, NULL, '$2y$12$dbIdcvzm9Cu/SvC39vflm.nwfXyPQDoxSFpxpwQCP/M8PK5ilsc1i', 'volunteer_coordinator', '2023-12-28 03:38:36', '2023-12-28 03:38:36'),
(4, 'Erich', 'Heidenreich', '9928975542145', '1990-09-11', '+13138660471', 'wiza.gustave@example.org', 'AB2', 'Quo est est fugit qui dolorem facilis.', '2023-07-29', 1, '107 Harley Trafficway Apt. 933\nElenorafurt, MO 82211-4091', 'Streichshire', NULL, NULL, '$2y$12$DA47rj8YcWvgu6L4jV6vvejNDlS4bZoR09fl3D79EDITjp1oy1aee', 'volunteer_coordinator', '2023-12-28 03:38:36', '2023-12-28 03:38:36'),
(5, 'Josephine', 'Nitzsche', '3979132637844', '1997-11-24', '458-905-1547', 'daija.kovacek@example.com', 'O2', 'Tenetur maxime veniam reprehenderit laboriosam eaque ut dolorem.', '2023-06-05', 1, '8532 Laurie Flats\nSouth Sylvanhaven, SD 23707-9432', 'Port Jackyland', NULL, NULL, '$2y$12$jebSq84c4BGqrMwqJNgSJeqPHV/XyGXjn65n1/R83DxDjJ5GfOshu', 'blood_bank_staff', '2023-12-28 03:38:37', '2023-12-28 03:38:37'),
(6, 'Kadin', 'Hessel', '6096900443159', '2005-06-12', '+1 (469) 869-5798', 'legros.evalyn@example.net', 'O4', 'Nemo ut excepturi molestiae.', '2023-01-24', 1, '70748 Eichmann Forge\nKirstenville, VA 32871-2809', 'Port Green', NULL, NULL, '$2y$12$LYtZNrzlOXFGQtzeCP82nuMjVVtq5o6R0lUELo5THLItb7Zah/PPy', 'auditor', '2023-12-28 03:38:37', '2023-12-28 03:38:37'),
(7, 'Haley', 'Hill', '0578625829487', '1991-08-26', '1-432-703-7330', 'pkuphal@example.org', 'O0', 'Est incidunt odio et nihil doloribus.', '2023-02-24', 1, '12842 Yost Vista Apt. 676\nKertzmannchester, AL 71168', 'Port Alta', NULL, NULL, '$2y$12$EBdeS4rgXiOcu9fJpKilfuUq8CZhaVzDY.yZDczI47.fXXS8QBz4O', 'volunteer_coordinator', '2023-12-28 03:38:38', '2023-12-28 03:38:38'),
(8, 'Laurine', 'Muller', '3411550297473', '2002-04-21', '(248) 876-3820', 'kihn.dayton@example.org', 'AB5', 'Et quos nesciunt consequatur amet quae dolore.', '2023-09-20', 1, '578 Price Rue Apt. 772\nSouth Cierra, LA 33550', 'Dominicchester', NULL, NULL, '$2y$12$onKNxJ3XSv5M8S6RiB7R5./j3zYmbXVzQN8gtcJ.CD0.YmaGKoBNC', 'hospital_staff', '2023-12-28 03:38:38', '2023-12-28 03:38:38'),
(9, 'Tyrique', 'Davis', '0101378503535', '1996-07-04', '+1-283-648-9349', 'sigmund.nitzsche@example.com', 'B3', 'Dolores et natus est sit.', '2023-11-26', 1, '6018 Brice Fork Suite 370\nPaucekfurt, KS 75462-7718', 'East Domenicaburgh', NULL, NULL, '$2y$12$IYs7rDSf2shYjMrq4LerNOXiSuMoLj/L/etM4gmcZ0WCLgrEy0ADq', 'hospital_staff', '2023-12-28 03:38:39', '2023-12-28 03:38:39'),
(10, 'Pedro', 'Kshlerin', '9320443830296', '1995-02-09', '651.321.3062', 'tschmeler@example.net', 'B8', 'Et et enim veniam aut.', '2023-07-17', 1, '32472 Boyle Haven Apt. 186\nRosannaberg, CA 88661-3045', 'Ianland', NULL, NULL, '$2y$12$PYe3M84Y74jjSQOsSD595.U1XDpNMlNW8KE8nJjLqc6XEJA5fmL9W', 'administrator', '2023-12-28 03:38:39', '2023-12-28 03:38:39'),
(11, 'prasad', 'madushan', '960200390V', '1996-01-20', '0783294947', 'prasad@email.com', '', NULL, NULL, 1, 'Harankahawa, Haldummulla', 'colombo', NULL, NULL, '$2y$12$mfBrKPwPmpGOB86N9bDOpuA41SKVfWj.IZvPjD1ct8RTVWiSiIJP2', 'donor', '2023-12-28 04:42:13', '2023-12-28 04:42:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_banks`
--
ALTER TABLE `blood_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blood_inventory_user_id_foreign` (`user_id`),
  ADD KEY `blood_inventory_blood_bank_id_foreign` (`blood_bank_id`),
  ADD KEY `blood_inventory_tested_by_foreign` (`tested_by`),
  ADD KEY `blood_inventory_used_by_foreign` (`used_by`);

--
-- Indexes for table `d-schedule`
--
ALTER TABLE `d-schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `d_schedule_donor_id_foreign` (`donor_id`),
  ADD KEY `d_schedule_blood_bank_id_foreign` (`blood_bank_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_sender_id_foreign` (`sender_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_national_id_unique` (`national_id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_blood_bank_id_foreign` (`blood_bank_id`),
  ADD KEY `users_hospital_id_foreign` (`hospital_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_banks`
--
ALTER TABLE `blood_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `d-schedule`
--
ALTER TABLE `d-schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blood_inventory`
--
ALTER TABLE `blood_inventory`
  ADD CONSTRAINT `blood_inventory_blood_bank_id_foreign` FOREIGN KEY (`blood_bank_id`) REFERENCES `blood_banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blood_inventory_tested_by_foreign` FOREIGN KEY (`tested_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blood_inventory_used_by_foreign` FOREIGN KEY (`used_by`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blood_inventory_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `d-schedule`
--
ALTER TABLE `d-schedule`
  ADD CONSTRAINT `d_schedule_blood_bank_id_foreign` FOREIGN KEY (`blood_bank_id`) REFERENCES `blood_banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `d_schedule_donor_id_foreign` FOREIGN KEY (`donor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_blood_bank_id_foreign` FOREIGN KEY (`blood_bank_id`) REFERENCES `blood_banks` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_hospital_id_foreign` FOREIGN KEY (`hospital_id`) REFERENCES `hospitals` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
