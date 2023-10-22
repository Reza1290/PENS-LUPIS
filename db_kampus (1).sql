-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 12:44 PM
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
-- Database: `db_kampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `NIP` varchar(32) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_photo` varchar(100) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `NIP`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`, `admin_photo`, `role`) VALUES
(1, '3122500024', 'Budi GangS23', 'admin', 'admin', '085649915', 'email@email.com', 'Jalan Jalan', '6455dfac45803.jpg', 1),
(3, '', '', 'ali', 'ali', '', '', '', '', 0),
(4, '3122500024', 'M Reza Muktasib', 'reza1290', '1234', '085649915406', 'reza.muk@gmail.com', 'Asiapgaming', '6469de51ed4c7.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `ID` int(11) NOT NULL,
  `NRP` varchar(20) NOT NULL,
  `NAMA` varchar(30) NOT NULL,
  `GENDER` tinyint(1) NOT NULL,
  `JURUSAN` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `ALAMAT` text NOT NULL,
  `HP` varchar(15) NOT NULL,
  `SMA` varchar(30) NOT NULL,
  `F_MATKUL` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`ID`, `NRP`, `NAMA`, `GENDER`, `JURUSAN`, `EMAIL`, `ALAMAT`, `HP`, `SMA`, `F_MATKUL`) VALUES
(26, '3122500024', 'Muhamad Reza Muktasib', 1, 'INFORMATIKA', 'reza.muktasib@gmail.com', 'JL TG PINANG NO 6 ', '085649929190', 'SMAN 8 SURABAYA', 'ILMU TAARUF'),
(27, '3122500034', 'Budi Raharjo', 1, 'INFORMATIKA', 'reza.muktasib@gmail.com', 'JL TG PINANG NO 6 SBY', '085649929190', 'SMAN 8 SURABAYA', 'PROGRAM'),
(28, '3122500029', 'Ilham Budiman', 1, 'INFORMATIKA', 'reza.muktasib@gmail.com', 'JL TG PINANG NO 6 SBY', '085649929190', 'SMAN 8 SURABAYA', 'PROGRAM'),
(31, '3122500027', 'gg', 1, 'TEKNIK INDUSTRI', 'gg@gmail.com', 'gg', '0851231313131', 'SMAN 8 SURABAYA', 'GAMBAR TEKNIK');

-- --------------------------------------------------------

--
-- Table structure for table `tb_matkul`
--

CREATE TABLE `tb_matkul` (
  `matkul_id` int(11) NOT NULL,
  `matkul_name` varchar(120) NOT NULL,
  `dosen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_matkul`
--

INSERT INTO `tb_matkul` (`matkul_id`, `matkul_name`, `dosen_id`) VALUES
(1, 'None', 1),
(2, 'Pemrograman Komputer', 1),
(3, 'Matematika', 1),
(4, 'PKN', 1),
(5, 'Agama', 1),
(13, 'AI', 1),
(15, 'Banzai', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_submit`
--

CREATE TABLE `tb_submit` (
  `submit_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `mahasiswa_id` int(11) NOT NULL,
  `submit_desc` text NOT NULL,
  `submit_date` date NOT NULL,
  `file_path` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_submit`
--

INSERT INTO `tb_submit` (`submit_id`, `tugas_id`, `mahasiswa_id`, `submit_desc`, `submit_date`, `file_path`) VALUES
(5, 4, 4, 'xd', '0000-00-00', '2x'),
(14, 2, 4, 'Lontar', '0000-00-00', '646b27033eaa9.jpg'),
(15, 2, 4, 'Lontar', '0000-00-00', '646b273e7dc2b.jpg'),
(16, 2, 4, 'Lontars', '0000-00-00', '646b277d5a15a.jpg'),
(17, 2, 4, 'Lontar', '0000-00-00', '646b27a5aead4.jpg'),
(18, 2, 4, 'Lontar', '0000-00-00', '646b27b0184e5.jpg'),
(19, 4, 4, 'xd', '2023-05-22', '646b27ce24665.jpg'),
(20, 4, 4, 'xd', '2023-05-22', '646b3b2163f7c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tugas`
--

CREATE TABLE `tb_tugas` (
  `tugas_id` int(11) NOT NULL,
  `tugas_name` varchar(100) NOT NULL,
  `matkul_id` int(11) NOT NULL,
  `tugas_deadline` date NOT NULL,
  `tugas_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_tugas`
--

INSERT INTO `tb_tugas` (`tugas_id`, `tugas_name`, `matkul_id`, `tugas_deadline`, `tugas_description`) VALUES
(1, 'DASAR PEMROGRAMAN', 2, '0000-00-00', 'BAHASA C'),
(2, 'KONDISI', 2, '2023-05-24', 'BAHASA C'),
(3, 'KONDISI', 5, '2023-05-24', 'BAHASA C'),
(4, 'DASAR PEMROGRAMAN', 2, '2023-05-19', 'BAHASA C'),
(5, 'AGAMA', 5, '2023-05-24', 'MUSLIM'),
(6, 'AGAMA 2', 5, '2023-05-24', 'MUSLIM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD PRIMARY KEY (`matkul_id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `dosen_id_2` (`dosen_id`);

--
-- Indexes for table `tb_submit`
--
ALTER TABLE `tb_submit`
  ADD PRIMARY KEY (`submit_id`),
  ADD KEY `tugas_id` (`tugas_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`);

--
-- Indexes for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD PRIMARY KEY (`tugas_id`),
  ADD KEY `matkul_id` (`matkul_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  MODIFY `matkul_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_submit`
--
ALTER TABLE `tb_submit`
  MODIFY `submit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  MODIFY `tugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_matkul`
--
ALTER TABLE `tb_matkul`
  ADD CONSTRAINT `tb_matkul_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `tb_admin` (`admin_id`);

--
-- Constraints for table `tb_submit`
--
ALTER TABLE `tb_submit`
  ADD CONSTRAINT `tb_submit_ibfk_1` FOREIGN KEY (`tugas_id`) REFERENCES `tb_tugas` (`tugas_id`),
  ADD CONSTRAINT `tb_submit_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `tb_admin` (`admin_id`);

--
-- Constraints for table `tb_tugas`
--
ALTER TABLE `tb_tugas`
  ADD CONSTRAINT `tb_tugas_ibfk_1` FOREIGN KEY (`matkul_id`) REFERENCES `tb_matkul` (`matkul_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
