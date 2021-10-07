-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2021 at 10:10 AM
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
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nm_admin` varchar(256) NOT NULL
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
  `spesialis` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`kd_dokter`, `nm_dokter`, `jns_kelamin`, `tgl_lahir`, `no_telepon`, `alamat`, `sip`, `spesialis`) VALUES
(1, 'Hansky M', 'Laki-laki', '10/07/2000', '081222441212', 'Jln. Pusat Kota no 12, Padang', 'DOKTER-2000', 'Penyakit Umum'),
(2, 'Putri Melia', 'Perempuan', '31/07/2000', '081200009999', 'Jln. Dekat Jalan No 11, Padang', 'DOKTER-2021', 'Jantung'),
(3, 'Hanna Ardhani', 'Perempuan', '12/06/2000', '081261112311', 'Jln. Khatib Sulaiman no 6', 'DOKTER-2000', 'Hati');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `kd_item` int(11) NOT NULL,
  `kd_transaksi` int(11) NOT NULL,
  `nm_item` varchar(256) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`kd_item`, `kd_transaksi`, `nm_item`, `harga`, `jumlah`) VALUES
(1, 1, 'Combantrin Jeruk Sirup 10ML', 20000, 2),
(2, 1, 'Konsultasi', 75000, 1),
(3, 2, 'Suntik Vaksin Covid-19', 150000, 1);

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
-- Table structure for table `layanan`
--

CREATE TABLE `layanan` (
  `kd_layanan` int(11) NOT NULL,
  `nm_layanan` varchar(256) NOT NULL,
  `biaya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layanan`
--

INSERT INTO `layanan` (`kd_layanan`, `nm_layanan`, `biaya`) VALUES
(1, 'Konsultasi', 75000),
(2, 'Rawat Inap', 200000),
(3, 'Rawat Jalan', 175000),
(4, 'Suntik Vaksin Covid-19', 150000),
(5, 'Rapid Test Antibodi COVID-19', 100000);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kd_obat` int(11) NOT NULL,
  `nm_obat` varchar(256) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kd_obat`, `nm_obat`, `deskripsi`, `stok`, `harga_modal`, `harga_jual`) VALUES
(1, 'Paracetamol 500MG', 'Mengatasi demam, nyeri, sakit kepala, dan ngilu-ngilu.', 25, 30000, 32000),
(2, 'Promag Tablet', 'Promag 1box isi 3 lembar@10 tablet untuk meringankan gejala sakit maag akibat kelebihan asam lambung.', 30, 20000, 22000),
(3, 'Freshcare 10ML', 'KANDUNGAN/KOMPOSISI\r\nMenthol 20%, Camphor 4%, Olive Virgin Oil 19%, Essensial oil 6% hingga 100%.', 50, 15000, 16000),
(4, 'Combantrin Jeruk Sirup 10ML', 'Combantrin Jeruk Sirup merupakan obat cacing yang bekerja untuk mengatasi cacing kremi, cacing gelang, cacing tambang, Cacing tambang, cacing Trichostrongyfus colubriformis dan Trichostrongylus orientalls.', 30, 18500, 20000);

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
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `no_pendaftaran` int(11) NOT NULL,
  `kd_pasien` int(11) NOT NULL,
  `tgl_daftar` varchar(10) NOT NULL,
  `tgl_kunjungan` varchar(10) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `status` enum('Menunggu','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`no_pendaftaran`, `kd_pasien`, `tgl_daftar`, `tgl_kunjungan`, `jam`, `status`) VALUES
(1, 1, '15/09/2021', '18/09/2021', '10:00', 'Selesai'),
(2, 3, '16/09/2021', '20/09/2021', '09:30', 'Selesai'),
(3, 2, '16/09/2021', '01/10/2021', '08:30', 'Menunggu'),
(4, 4, '21/09/2021', '25/09/2021', '08:00', 'Menunggu');

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

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `kd_periksa` int(11) NOT NULL,
  `kd_dokter` int(11) NOT NULL,
  `kd_pasien` int(11) NOT NULL,
  `kd_penyakit` int(11) DEFAULT NULL,
  `kd_layanan` int(11) DEFAULT NULL,
  `tgl_periksa` varchar(10) NOT NULL,
  `keluhan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`kd_periksa`, `kd_dokter`, `kd_pasien`, `kd_penyakit`, `kd_layanan`, `tgl_periksa`, `keluhan`) VALUES
(1, 1, 1, 1, 2, '01/10/2021', 'Kepala pusing, badan terasa panas dan pegal-pegal, terasa nyeri dileher'),
(2, 2, 2, NULL, NULL, '22/09/2021', 'Perut terasa mual'),
(3, 1, 3, 1, 1, '26/09/2021', 'Badan panas'),
(4, 1, 3, 3, 4, '27/09/2021', 'Vaksin Covid-19');

-- --------------------------------------------------------

--
-- Table structure for table `resep`
--

CREATE TABLE `resep` (
  `kd_resep` int(11) NOT NULL,
  `kd_periksa` int(11) NOT NULL,
  `kd_obat` int(11) NOT NULL,
  `pemakaian` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resep`
--

INSERT INTO `resep` (`kd_resep`, `kd_periksa`, `kd_obat`, `pemakaian`) VALUES
(1, 3, 1, '2x sehari'),
(2, 1, 4, '3x sehari sesudah makan'),
(3, 3, 4, '3x sehari sesudah makan');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` int(11) NOT NULL,
  `tgl_transaksi` varchar(100) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `kasir` varchar(256) NOT NULL,
  `status` enum('Proses','Selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`kd_transaksi`, `tgl_transaksi`, `total`, `bayar`, `kembalian`, `kasir`, `status`) VALUES
(1, '6 October 2021, 16:32', 115000, 120000, 5000, '', 'Selesai'),
(2, '7 October 2021, 15:03', 150000, 150000, 0, '', 'Selesai');

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
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`kd_item`),
  ADD KEY `item_transaksi` (`kd_transaksi`);

--
-- Indexes for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD PRIMARY KEY (`kd_keluarga`),
  ADD KEY `keluarga_pasien` (`kd_pasien`);

--
-- Indexes for table `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`kd_layanan`);

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
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`no_pendaftaran`),
  ADD KEY `pendaftaran_pasien` (`kd_pasien`) USING BTREE;

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`kd_penyakit`);

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`kd_periksa`),
  ADD KEY `periksa_dokter` (`kd_dokter`),
  ADD KEY `periksa_pasien` (`kd_pasien`),
  ADD KEY `periksa_penyakit` (`kd_penyakit`),
  ADD KEY `periksa_layanan` (`kd_layanan`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`kd_resep`),
  ADD KEY `resep_periksa` (`kd_periksa`),
  ADD KEY `resep_obat` (`kd_obat`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

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
-- AUTO_INCREMENT for table `layanan`
--
ALTER TABLE `layanan`
  MODIFY `kd_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `no_pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `kd_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `periksa`
--
ALTER TABLE `periksa`
  MODIFY `kd_periksa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `kd_resep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_transaksi` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`);

--
-- Constraints for table `keluarga`
--
ALTER TABLE `keluarga`
  ADD CONSTRAINT `keluarga_pasien` FOREIGN KEY (`kd_pasien`) REFERENCES `pasien` (`kd_pasien`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_pasien` FOREIGN KEY (`kd_pasien`) REFERENCES `pasien` (`kd_pasien`);

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `periksa_dokter` FOREIGN KEY (`kd_dokter`) REFERENCES `dokter` (`kd_dokter`),
  ADD CONSTRAINT `periksa_layanan` FOREIGN KEY (`kd_layanan`) REFERENCES `layanan` (`kd_layanan`),
  ADD CONSTRAINT `periksa_pasien` FOREIGN KEY (`kd_pasien`) REFERENCES `pasien` (`kd_pasien`),
  ADD CONSTRAINT `periksa_penyakit` FOREIGN KEY (`kd_penyakit`) REFERENCES `penyakit` (`kd_penyakit`);

--
-- Constraints for table `resep`
--
ALTER TABLE `resep`
  ADD CONSTRAINT `resep_obat` FOREIGN KEY (`kd_obat`) REFERENCES `obat` (`kd_obat`),
  ADD CONSTRAINT `resep_periksa` FOREIGN KEY (`kd_periksa`) REFERENCES `periksa` (`kd_periksa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
