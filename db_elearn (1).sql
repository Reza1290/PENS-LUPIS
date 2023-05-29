-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 06:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_elearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_biodata`
--

CREATE TABLE `tb_biodata` (
  `data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `data_nip` varchar(110) NOT NULL,
  `data_gen` int(11) NOT NULL,
  `data_photo` varchar(110) NOT NULL,
  `data_telp` varchar(110) NOT NULL,
  `data_email` varchar(110) NOT NULL,
  `data_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_biodata`
--

INSERT INTO `tb_biodata` (`data_id`, `user_id`, `data_nip`, `data_gen`, `data_photo`, `data_telp`, `data_email`, `data_address`) VALUES
(14, 5, '123', 1, '6455dd874e3e3.jpg', '13', 'reza.muktas', '13213');

-- --------------------------------------------------------

--
-- Table structure for table `tb_class`
--

CREATE TABLE `tb_class` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_class`
--

INSERT INTO `tb_class` (`class_id`, `class_name`) VALUES
(1, 'D3 IT A'),
(2, 'D3 IT B'),
(3, 'D4 IT B'),
(4, 'D4 IT A');

-- --------------------------------------------------------

--
-- Table structure for table `tb_enroll`
--

CREATE TABLE `tb_enroll` (
  `enroll_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `dosen_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_enroll`
--

INSERT INTO `tb_enroll` (`enroll_id`, `matkul_id`, `dosen_id`, `class_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(5, 1, 1, 4),
(6, 2, 3, 2),
(15, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_enroll_class`
--

CREATE TABLE `tb_enroll_class` (
  `enroll_class_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_enroll_class`
--

INSERT INTO `tb_enroll_class` (`enroll_class_id`, `matkul_id`, `class_id`, `mahasiswa_id`) VALUES
(1, 1, 1, 4),
(2, 2, 1, 5),
(3, 1, 2, 6),
(4, 2, 2, 6),
(5, 1, 1, 5),
(9, 4, 1, 5),
(10, 3, 1, 5),
(11, 1, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `matkul_id` int(11) NOT NULL,
  `matkul_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`matkul_id`, `matkul_name`) VALUES
(1, 'DASAR PEMROGRAMAN'),
(2, 'ALGORITMA STRUKTUR DATA'),
(3, 'MATEMATIKA'),
(4, 'BAHASA INGGRIS'),
(5, 'PEMROGRAMAN WEBSITE');

-- --------------------------------------------------------

--
-- Table structure for table `tb_role`
--

CREATE TABLE `tb_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_role`
--

INSERT INTO `tb_role` (`role_id`, `role_name`) VALUES
(1, 'mahasiswa'),
(2, 'dosen'),
(99, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_submit`
--

CREATE TABLE `tb_submit` (
  `submit_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `submit_file` varchar(100) NOT NULL,
  `submit_desc` varchar(100) NOT NULL,
  `submit_grade` int(11) NOT NULL,
  `submit_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_submit`
--

INSERT INTO `tb_submit` (`submit_id`, `matkul_id`, `user_id`, `task_id`, `submit_file`, `submit_desc`, `submit_grade`, `submit_date`) VALUES
(0, 1, 6, 1, '6473658590203.jpg', 'Asiap santuy\r\n', 12, '2023-05-28'),
(13, 1, 5, 6, '64736610b164d.jpg', 'Ayam Goreng', 2, '2023-05-28'),
(14, 1, 4, 6, '6473665357098.jpg', 'saya Rudi bukan budi', 100, '2023-05-28'),
(16, 1, 5, 7, '647382934b728.jpg', 'Ini pak', 100, '2023-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_task`
--

CREATE TABLE `tb_task` (
  `task_id` int(11) NOT NULL,
  `task_name` varchar(100) NOT NULL,
  `task_desc` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_date` date NOT NULL,
  `class_id` int(11) NOT NULL,
  `matkul_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_task`
--

INSERT INTO `tb_task` (`task_id`, `task_name`, `task_desc`, `user_id`, `task_date`, `class_id`, `matkul_id`) VALUES
(1, 'PEMROGRAMAN DASAR C', 'KERJAKAN LATIHAN 1.1', 1, '2023-05-28', 2, 1),
(6, 'KONDISI IF ELSE', 'KERJAKAN PRAKTIKUM 2.2', 1, '2023-05-28', 1, 1),
(7, 'PERULANGAN FOR LOOP', 'KERJAKAN PRAKTIKUM 2.4', 1, '2023-05-28', 1, 1),
(9, 'PERULANGAN WHILE', 'KERJAKAN PRAKTIKUM 2.4', 1, '2023-05-28', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `nama`, `role_id`) VALUES
(1, 'admin', 'admin', 'M Reza M', 2),
(3, 'budi', 'budi', 'BUDI HARIS', 2),
(4, 'Rudi Harianto', '1234', 'RUDI HARIANTO', 1),
(5, 'adi', 'adi', 'Aldianto', 1),
(6, 'aldo', 'aldo', 'aldoano', 1),
(7, 'sadmin', 'sadmin', 'MRM', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_biodata`
--
ALTER TABLE `tb_biodata`
  ADD PRIMARY KEY (`data_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tb_class`
--
ALTER TABLE `tb_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `tb_enroll`
--
ALTER TABLE `tb_enroll`
  ADD PRIMARY KEY (`enroll_id`),
  ADD KEY `matkul_id` (`matkul_id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `tb_enroll_class`
--
ALTER TABLE `tb_enroll_class`
  ADD PRIMARY KEY (`enroll_class_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `matkul_id` (`matkul_id`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`matkul_id`);

--
-- Indexes for table `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `tb_submit`
--
ALTER TABLE `tb_submit`
  ADD PRIMARY KEY (`submit_id`),
  ADD KEY `matkul_id` (`matkul_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tb_submit_ibfk_3` (`task_id`);

--
-- Indexes for table `tb_task`
--
ALTER TABLE `tb_task`
  ADD PRIMARY KEY (`task_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `matkul_id` (`matkul_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_biodata`
--
ALTER TABLE `tb_biodata`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_class`
--
ALTER TABLE `tb_class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_enroll`
--
ALTER TABLE `tb_enroll`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_enroll_class`
--
ALTER TABLE `tb_enroll_class`
  MODIFY `enroll_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `matkul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tb_submit`
--
ALTER TABLE `tb_submit`
  MODIFY `submit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_task`
--
ALTER TABLE `tb_task`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_biodata`
--
ALTER TABLE `tb_biodata`
  ADD CONSTRAINT `tb_biodata_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`);

--
-- Constraints for table `tb_enroll`
--
ALTER TABLE `tb_enroll`
  ADD CONSTRAINT `tb_enroll_ibfk_2` FOREIGN KEY (`dosen_id`) REFERENCES `tb_user` (`user_id`),
  ADD CONSTRAINT `tb_enroll_ibfk_3` FOREIGN KEY (`matkul_id`) REFERENCES `tb_matkul` (`matkul_id`),
  ADD CONSTRAINT `tb_enroll_ibfk_4` FOREIGN KEY (`class_id`) REFERENCES `tb_class` (`class_id`);

--
-- Constraints for table `tb_enroll_class`
--
ALTER TABLE `tb_enroll_class`
  ADD CONSTRAINT `tb_enroll_class_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `tb_class` (`class_id`),
  ADD CONSTRAINT `tb_enroll_class_ibfk_3` FOREIGN KEY (`mahasiswa_id`) REFERENCES `tb_user` (`user_id`),
  ADD CONSTRAINT `tb_enroll_class_ibfk_4` FOREIGN KEY (`matkul_id`) REFERENCES `tb_matkul` (`matkul_id`);

--
-- Constraints for table `tb_submit`
--
ALTER TABLE `tb_submit`
  ADD CONSTRAINT `tb_submit_ibfk_1` FOREIGN KEY (`matkul_id`) REFERENCES `tb_matkul` (`matkul_id`),
  ADD CONSTRAINT `tb_submit_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`),
  ADD CONSTRAINT `tb_submit_ibfk_3` FOREIGN KEY (`task_id`) REFERENCES `tb_task` (`task_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_task`
--
ALTER TABLE `tb_task`
  ADD CONSTRAINT `tb_task_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`),
  ADD CONSTRAINT `tb_task_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `tb_class` (`class_id`),
  ADD CONSTRAINT `tb_task_ibfk_3` FOREIGN KEY (`matkul_id`) REFERENCES `tb_matkul` (`matkul_id`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `tb_role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
