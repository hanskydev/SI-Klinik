-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 09:08 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si-klinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nm_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nm_admin`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(2, 'farhan', 'd1bbb2af69fd350b6d6bd88655757b47', 'Farhan');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `kd_dokter` int(11) NOT NULL,
  `nm_dokter` varchar(256) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `sip` varchar(100) NOT NULL,
  `spesialisasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kd_dokter`, `nm_dokter`, `jns_kelamin`, `tgl_lahir`, `no_telepon`, `alamat`, `sip`, `spesialisasi`) VALUES
(1, 'Hans Mulya', 'Laki-laki', '10/07/2000', '081222441212', 'Jln. Pusat Kota no 12, Padang', 'DOKTER-2000', 'Mata'),
(2, 'Putri', 'Perempuan', '31/07/2000', '081200009999', 'Jln. Dekat Jalan No 11, Padang', 'DOKTER-2021', 'Jantung'),
(3, 'Hanna', 'Perempuan', '12/06/2000', '081261112311', 'Jln. Khatib Sulaiman no 6', 'DOKTER-2000', 'Hati');

-- --------------------------------------------------------

--
-- Table structure for table `keluarga`
--

CREATE TABLE `keluarga` (
  `kd_keluarga` int(11) NOT NULL,
  `kd_pasien` int(11) NOT NULL,
  `nm_keluarga` varchar(256) NOT NULL,
  `status_keluarga` enum('Ayah','Ibu','Anak','Saudara') NOT NULL,
  `no_kontak` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keluarga`
--

INSERT INTO `keluarga` (`kd_keluarga`, `kd_pasien`, `nm_keluarga`, `status_keluarga`, `no_kontak`) VALUES
(1, 1, 'Hamdo', 'Saudara', '0813676754541'),
(2, 2, 'Nisa Rahmawati', 'Ibu', '0812987612126'),
(3, 3, 'Brando', 'Ayah', '0812747417741'),
(4, 3, 'Brenny', 'Ibu', '081278781212');

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE `kunjungan` (
  `no_pendaftaran` int(11) NOT NULL,
  `kd_pasien` int(11) NOT NULL,
  `tgl_daftar` varchar(10) NOT NULL,
  `tgl_kunjungan` varchar(10) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `status` enum('Menunggu','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`no_pendaftaran`, `kd_pasien`, `tgl_daftar`, `tgl_kunjungan`, `jam`, `status`) VALUES
(1, 1, '15/09/2021', '18/09/2021', '10:00', 'Selesai'),
(2, 3, '16/09/2021', '20/09/2021', '09:30', 'Menunggu'),
(3, 2, '16/09/2021', '01/10/2021', '08:30', 'Menunggu'),
(4, 4, '25/10/2021', '02/10/2021', '09:00', 'Menunggu');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_obat` int(11) NOT NULL,
  `nm_obat` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_modal` varchar(20) NOT NULL,
  `harga_jual` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `deskripsi`, `stok`, `harga_modal`, `harga_jual`) VALUES
(1, 'Paracetamol 500MG', 'Mengatasi demam, nyeri, sakit kepala, dan ngilu-ngilu.', 25, '30000', '32000'),
(2, 'Promag Tablet', 'Promag 1box isi 3 lembar@10 tablet untuk meringankan gejala sakit maag akibat kelebihan asam lambung.', 30, '20000', '22000'),
(3, 'Freshcare 10ML', 'KANDUNGAN/KOMPOSISI\r\nMenthol 20%, Camphor 4%, Olive Virgin Oil 19%, Essensial oil 6% hingga 100%.', 50, '15000', '16000'),
(4, 'Combantrin Jeruk Sirup 10ML', 'Combantrin Jeruk Sirup merupakan obat cacing yang bekerja untuk mengatasi cacing kremi (Enterobius vermicularis), cacing gelang (Ascaris lumbricoides), cacing tambang (Ancylostoma duodenale), Cacing tambang (Necator americanus), cacing Trichostrongyfus colubriformis dan Trichostrongylus orientalls.', 30, '18500', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `kd_pasien` int(11) NOT NULL,
  `nm_pasien` varchar(256) NOT NULL,
  `no_pasien` varchar(50) NOT NULL,
  `no_identitas` varchar(20) NOT NULL,
  `jns_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` varchar(10) NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `gol_darah` enum('A','B','AB','O') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`kd_pasien`, `nm_pasien`, `no_pasien`, `no_identitas`, `jns_kelamin`, `tgl_lahir`, `no_telepon`, `gol_darah`, `alamat`) VALUES
(1, 'Nauval Zaloni', 'PASIEN-1', '3315143107821342', 'Laki-laki', '02/02/2000', '081200008888', 'A', 'Jln. Lintas Sumatera no 11, Padang'),
(2, 'Mawar Kartika', 'PASIEN-2', '191293189831298300', 'Perempuan', '07/09/2000', '081233332222', 'AB', 'Jln. Simpang laut no 9, Padang'),
(3, 'Huddatul Hidayat', 'PASIEN-3', '048127412741928749', 'Laki-laki', '04/12/2000', '0812741741874', 'A', 'Jln. Sudut Kota no 22, Padang'),
(4, 'Hani Leziana', 'PASIEN-4', '214464465442138468', 'Perempuan', '08/08/2001', '0821989861233', 'B', 'Jln. Belanti Indah no 11, Padang');

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `kd_penyakit` int(11) NOT NULL,
  `nm_penyakit` varchar(256) NOT NULL,
  `kd_icd` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`kd_penyakit`, `nm_penyakit`, `kd_icd`) VALUES
(1, 'Demam', 'A01.1'),
(2, 'Sakit Kepala', 'R51'),
(3, 'Infeksi Virus Corona', 'B34.2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`kd_dokter`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`kd_keluarga`),
  ADD KEY `kontak` (`kd_pasien`);

--
-- Indexes for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD KEY `kunjungan` (`kd_pasien`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kd_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`kd_pasien`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `kd_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `keluarga`
--
ALTER TABLE `keluarga`
  MODIFY `kd_keluarga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kunjungan`
--
ALTER TABLE `kunjungan`
  MODIFY `no_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `kd_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `kd_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `kd_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `kontak` FOREIGN KEY (`kd_pasien`) REFERENCES `pasien` (`kd_pasien`);

--
-- Constraints for table `kunjungan`
--
ALTER TABLE `kunjungan`
  ADD CONSTRAINT `kunjungan` FOREIGN KEY (`kd_pasien`) REFERENCES `pasien` (`kd_pasien`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
