-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2019 at 05:10 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bkol`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msagama`
--

CREATE TABLE `msagama` (
  `IDAgama` char(6) NOT NULL,
  `NamaAgama` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msagama`
--

INSERT INTO `msagama` (`IDAgama`, `NamaAgama`) VALUES
('000001', 'Islam'),
('000002', 'Katholik'),
('000003', 'Protestan'),
('000004', 'Hindu'),
('000005', 'Budha');

-- --------------------------------------------------------

--
-- Table structure for table `msaktivasi`
--

CREATE TABLE `msaktivasi` (
  `IDAktivasi` char(6) NOT NULL,
  `IDPencaker` char(6) NOT NULL,
  `RegisterDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msbahasa`
--

CREATE TABLE `msbahasa` (
  `IDBahasa` char(6) NOT NULL,
  `IDPencaker` char(6) NOT NULL,
  `NamaBahasa` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msberita`
--

CREATE TABLE `msberita` (
  `IDBerita` char(6) NOT NULL,
  `TglBerita` date NOT NULL,
  `JudulBerita` varchar(50) NOT NULL,
  `IsiBerita` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msbidangperusahaan`
--

CREATE TABLE `msbidangperusahaan` (
  `IDBidangPerusahaan` char(6) NOT NULL,
  `NamaBidangPerusahaan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msbidangperusahaan`
--

INSERT INTO `msbidangperusahaan` (`IDBidangPerusahaan`, `NamaBidangPerusahaan`) VALUES
('000001', 'OTOMOTIF'),
('000002', 'FUNITURE'),
('000003', 'TEXTILE'),
('000005', 'RENTAL MOBIL'),
('000006', 'RENTAL PULSA'),
('000007', 'PANEL LISTRIK'),
('000009', 'INDUSTRI PENGOLAHAN'),
('000011', 'JASA PENGIRIMAN'),
('000012', 'PERDAGANGAN'),
('000015', 'PERBANKAN'),
('000016', 'GARMENT'),
('000017', 'SOSIAL KEMASYARAKATAN'),
('000018', 'ELEKTRONomorIndukPencaker'),
('000021', 'PROPERTI'),
('000022', 'JASA PENGENDALIAN HAMA'),
('000023', 'OLEO CHEMICAL'),
('000024', 'PEMBIAYAAN'),
('000025', 'PELAYANAN PERPARKIRAN'),
('000026', 'SUPERVISOR'),
('000027', 'PENDIDIKAN'),
('000028', 'PENGOLAHAN MAKANAN DAN MINUMAN'),
('000031', 'MANUFACTURING'),
('000032', 'JASA CATHERING'),
('000033', 'PERTAMBANGAN'),
('000034', 'PEMERINTAHAN'),
('000035', 'KESEHATAN'),
('000036', 'ASURANSI'),
('000037', 'JASA KEUANGAN'),
('000038', 'RETAIL'),
('000039', 'EKSPEDISI'),
('000040', 'PJTKI'),
('000041', 'PENGOLAHAN KIMIA'),
('000042', 'MASANGGER'),
('000043', 'SPBU'),
('000044', 'PEMBUATAN SEPATU'),
('000045', 'INDUSTRI');

-- --------------------------------------------------------

--
-- Table structure for table `mschat`
--

CREATE TABLE `mschat` (
  `id` int(11) NOT NULL,
  `pengirim` varchar(11) DEFAULT NULL,
  `penerima` varchar(11) DEFAULT NULL,
  `pesan` text,
  `date` datetime DEFAULT NULL,
  `status` enum('R','D') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msevent`
--

CREATE TABLE `msevent` (
  `IDEvent` char(6) NOT NULL,
  `TglEvent` date NOT NULL,
  `JudulEvent` varchar(50) NOT NULL,
  `IsiEvent` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msjenislowongan`
--

CREATE TABLE `msjenislowongan` (
  `IDJenisLowongan` char(6) NOT NULL,
  `NamaJenisLowongan` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msjenislowongan`
--

INSERT INTO `msjenislowongan` (`IDJenisLowongan`, `NamaJenisLowongan`) VALUES
('000001', 'Computer / IT'),
('000002', 'Accounting / Finance'),
('000003', 'Sales / Marketing'),
('000004', 'Admin / HR'),
('000005', 'Engineering'),
('000006', 'Manufacturing'),
('000007', 'Building / Construction'),
('000008', 'Hotel / Restaurant'),
('000009', 'Education / Trainer'),
('000010', 'Arts / Media / Comm'),
('000011', 'Services'),
('000012', 'Sciences'),
('000013', 'Caddy'),
('000014', 'Management Trainee'),
('000015', 'Driver'),
('000016', 'MARKETING EXPORT'),
('000017', 'SUPERVISOR'),
('000018', 'STAFF PENGAJAR'),
('000019', 'Produksi'),
('000020', 'Manajer'),
('000021', 'PERTAMBANGAN'),
('000022', 'TEKNISI'),
('000023', 'Kepala Unit Produksi'),
('000024', 'Security'),
('000025', 'STAFF ADMINISTRASI'),
('000026', 'STAFF PEMASARAN'),
('000027', 'STAFF ACCOUNTING'),
('000028', 'STAFF IT'),
('000029', 'Programer'),
('000030', 'Koordinator'),
('000032', 'KESEHATAN'),
('000033', 'Purchasing'),
('000034', 'Safety'),
('000035', 'Project'),
('000036', 'Staf Gudang'),
('000037', 'Waitress'),
('999999', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `msjenispengupahan`
--

CREATE TABLE `msjenispengupahan` (
  `IDJenisPengupahan` char(6) NOT NULL,
  `NamaJenisPengupahan` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msjenispengupahan`
--

INSERT INTO `msjenispengupahan` (`IDJenisPengupahan`, `NamaJenisPengupahan`) VALUES
('000001', 'Borongan'),
('000002', 'Harian'),
('000003', 'Mingguan'),
('000004', 'Bulanan');

-- --------------------------------------------------------

--
-- Table structure for table `msjenisuser`
--

CREATE TABLE `msjenisuser` (
  `IDJenisUser` char(6) NOT NULL,
  `NamaJenisUser` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msjenisuser`
--

INSERT INTO `msjenisuser` (`IDJenisUser`, `NamaJenisUser`) VALUES
('000000', 'Admin'),
('000001', 'Perusahaan'),
('000002', 'Pencari Kerja');

-- --------------------------------------------------------

--
-- Table structure for table `msjurusan`
--

CREATE TABLE `msjurusan` (
  `IDjurusan` char(6) NOT NULL,
  `IDStatusPendidikan` char(6) NOT NULL,
  `Jurusan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `mskabupaten`
--

CREATE TABLE `mskabupaten` (
  `IDKabupaten` char(6) NOT NULL,
  `NamaKabupaten` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mskabupaten`
--

INSERT INTO `mskabupaten` (`IDKabupaten`, `NamaKabupaten`) VALUES
('000003', 'Depok');

-- --------------------------------------------------------

--
-- Table structure for table `mskeahlian`
--

CREATE TABLE `mskeahlian` (
  `IDKeahlian` char(6) NOT NULL,
  `IDJenisLowongan` char(6) NOT NULL,
  `NamaKeahlian` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mskeahlian`
--

INSERT INTO `mskeahlian` (`IDKeahlian`, `IDJenisLowongan`, `NamaKeahlian`) VALUES
('000001', '000001', 'ANALISIS DATA'),
('000002', '000001', 'Database Administrator'),
('000003', '000001', 'Helpdesk'),
('000004', '000001', 'IT Dekstop Programmer ( IDP )'),
('000005', '000001', 'IT Programmer'),
('000006', '000001', 'IT Technical Support'),
('000007', '000001', 'Programmer PHP'),
('000008', '000001', 'Senior IT'),
('000009', '000001', 'Staff IT'),
('000010', '000001', 'System Analist'),
('000011', '000001', 'Web Designer'),
('000012', '000001', 'Yunior IT'),
('000013', '000002', 'Auditor'),
('000014', '000002', 'Cashier'),
('000015', '000002', 'Funding Officer'),
('000016', '000002', 'INTERNAL AUDIT'),
('000017', '000002', 'Internal Audit'),
('000018', '000002', 'JUNIOR ACCOUNTING STAFF'),
('000019', '000002', 'PROSHOP'),
('000020', '000002', 'SENIOR ACCOUNTING'),
('000021', '000002', 'STAFF ACCOUNT RECEIVEABLE'),
('000022', '000002', 'Staff Accounting'),
('000023', '000002', 'STAFF DATA ANALYST'),
('000024', '000002', 'Staff Finance'),
('000025', '000002', 'STAFF FRONT END AUDIT'),
('000026', '000002', 'Tax Staff'),
('000027', '000002', 'Teller'),
('000028', '000036', 'Distribusi Center'),
('999999', '999999', 'Lainnya'),
('100000', '000004', 'Administrasi HR'),
('100001', '000001', 'Android Developer'),
('100002', '000003', 'Sales dan Marketing'),
('100003', '000032', 'Apoteker'),
('100004', '000032', 'Rehab Medik'),
('100005', '000032', 'Perawat');

-- --------------------------------------------------------

--
-- Table structure for table `mskecamatan`
--

CREATE TABLE `mskecamatan` (
  `IDKecamatan` char(6) NOT NULL,
  `IDKabupaten` char(6) NOT NULL,
  `NamaKecamatan` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mskecamatan`
--

INSERT INTO `mskecamatan` (`IDKecamatan`, `IDKabupaten`, `NamaKecamatan`) VALUES
('000011', '', 'TAPOS'),
('000006', '', 'SUKMAJAYA'),
('000004', '', 'SAWANGAN'),
('000002', '', 'PANCORAN MAS'),
('000001', '', 'LUAR KOTA'),
('000005', '', 'LIMO'),
('000008', '', 'CIPAYUNG'),
('000010', '', 'CINERE'),
('000003', '', 'CIMANGGIS'),
('000009', '', 'CILODONG'),
('000012', '', 'BOJONGSARI'),
('000007', '', 'BEJI');

-- --------------------------------------------------------

--
-- Table structure for table `mskelurahan`
--

CREATE TABLE `mskelurahan` (
  `IDKelurahan` char(6) NOT NULL,
  `IDKecamatan` char(6) NOT NULL,
  `NamaKelurahan` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mskelurahan`
--

INSERT INTO `mskelurahan` (`IDKelurahan`, `IDKecamatan`, `NamaKelurahan`) VALUES
('000064', '000012', 'DUREN SERIBU'),
('000063', '000012', 'DUREN MEKAR'),
('000062', '000012', 'CURUG'),
('000061', '000012', 'PONDOK PETIR'),
('000060', '000012', 'SERUA'),
('000059', '000012', 'BOJONG SARI BARU'),
('000058', '000012', 'BOJONG SARI'),
('000057', '000011', 'CIMPAEUN'),
('000056', '000011', 'CILANGKAP'),
('000055', '000011', 'JATIJAJAR'),
('000054', '000011', 'SUKAMAJU BARU'),
('000053', '000011', 'SUKATANI'),
('000052', '000011', 'LEUWINANGGUNG'),
('000051', '000011', 'TAPOS'),
('000050', '000010', 'PANGKALAN JATI BARU'),
('000049', '000010', 'PANGKALAN JATI'),
('000048', '000010', 'GANDUL'),
('000047', '000010', 'CINERE'),
('000046', '000009', 'JATIMULYA'),
('000045', '000009', 'KALIMULYA'),
('000044', '000009', 'KALIBARU'),
('000043', '000009', 'CILODONG'),
('000042', '000009', 'SUKAMAJU'),
('000041', '000008', 'PONDOK JAYA'),
('000040', '000008', 'BOJONG PONDOK TERONG'),
('000039', '000008', 'RATU JAYA'),
('000038', '000008', 'CIPAYUNG JAYA'),
('000037', '000008', 'CIPAYUNG'),
('000036', '000007', 'BEJI TIMUR'),
('000035', '000007', 'PONDOK CINA'),
('000034', '000007', 'KEMIRI MUKA'),
('000033', '000007', 'TANAH BARU'),
('000032', '000007', 'KUKUSAN'),
('000031', '000007', 'BEJI'),
('000030', '000006', 'TIRTA JAYA'),
('000029', '000006', 'CISALAK'),
('000028', '000006', 'BAKTIJAYA'),
('000027', '000006', 'MEKARJAYA'),
('000026', '000006', 'ABADIJAYA'),
('000025', '000006', 'SUKMAJAYA'),
('000024', '000005', 'LIMO'),
('000023', '000005', 'KRUKUT'),
('000022', '000005', 'GROGOL'),
('000021', '000005', 'MERUYUNG'),
('000020', '000004', 'KEDAUNG'),
('000019', '000004', 'SAWANGAN BARU'),
('000018', '000004', 'SAWANGAN'),
('000017', '000004', 'CINANGKA'),
('000016', '000004', 'PENGASINAN'),
('000015', '000004', 'BEDAHAN'),
('000014', '000004', 'PASIR PUTIH'),
('000013', '000003', 'CISALAK PASAR'),
('000012', '000003', 'PASIR GUNUNG SELATAN'),
('000011', '000003', 'MEKARSARI'),
('000010', '000003', 'TUGU'),
('000009', '000003', 'CURUG'),
('000008', '000003', 'HARJA MUKTI'),
('000007', '000002', 'RANGKAPAN JAYA'),
('000006', '000002', 'RANGKAPAN JAYA BARU'),
('000005', '000002', 'MAMPANG'),
('000004', '000002', 'PANCORAN MAS'),
('000003', '000002', 'DEPOK JAYA'),
('000002', '000002', 'DEPOK'),
('000001', '000001', 'LUAR KOTA');

-- --------------------------------------------------------

--
-- Table structure for table `mslowongan`
--

CREATE TABLE `mslowongan` (
  `IDLowongan` char(6) NOT NULL,
  `IDPerusahaan` char(6) NOT NULL,
  `IDPosisiJabatan` char(6) NOT NULL,
  `IDKeahlian` char(6) NOT NULL,
  `IDStatusPendidikan` char(6) NOT NULL,
  `IDJenisPengupahan` char(6) NOT NULL,
  `IDStatusHubunganKerja` char(6) NOT NULL,
  `TglBerlaku` date NOT NULL,
  `TglBerakhir` date NOT NULL,
  `NamaLowongan` varchar(45) NOT NULL,
  `UraianPekerjaan` varchar(45) NOT NULL,
  `UraianTugas` varchar(45) NOT NULL,
  `Penempatan` varchar(45) NOT NULL,
  `BatasUmur` tinyint(4) NOT NULL,
  `JmlPria` decimal(18,0) NOT NULL,
  `JmlWanita` decimal(18,0) NOT NULL,
  `Jurusan` varchar(45) NOT NULL,
  `Pengalaman` text NOT NULL,
  `SyaratKhusus` text NOT NULL,
  `GajiPerbulan` decimal(18,0) NOT NULL,
  `JamKerjaSeminggu` decimal(18,0) NOT NULL,
  `RegisterDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mspencaker`
--

CREATE TABLE `mspencaker` (
  `IDPencaker` char(6) NOT NULL,
  `IDUser` char(6) NOT NULL,
  `IDKelurahan` char(6) NOT NULL,
  `IDAgama` char(6) NOT NULL,
  `IDStatusPernikahan` char(6) NOT NULL,
  `IDStatusPendidikan` char(6) NOT NULL,
  `IDPosisiJabatan` char(6) NOT NULL,
  `NomorIndukPencaker` varchar(50) NOT NULL,
  `NamaPencaker` varchar(50) NOT NULL,
  `TempatLahir` varchar(50) NOT NULL,
  `TglLahir` date NOT NULL,
  `JenisKelamin` tinyint(1) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telepon` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `KodePos` varchar(50) NOT NULL,
  `Kewarganegaraan` tinyint(1) NOT NULL,
  `Jurusan` varchar(50) NOT NULL,
  `Keterampilan` varchar(50) NOT NULL,
  `NEMIPK` tinyint(1) NOT NULL,
  `Nilai` varchar(50) NOT NULL,
  `TahunLulus` varchar(4) NOT NULL,
  `TinggiBadan` varchar(50) NOT NULL,
  `BeratBadan` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL,
  `Lokasi` tinyint(1) NOT NULL,
  `UpahYangDicari` varchar(50) NOT NULL,
  `ExpiredDate` date NOT NULL,
  `RegisterDate` datetime NOT NULL,
  `NomerPenduduk` varchar(50) NOT NULL,
  `Foto` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mspencakertemp`
--

CREATE TABLE `mspencakertemp` (
  `IDPencakerTemp` char(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `IDKelurahan` char(6) NOT NULL,
  `IDAgama` char(6) NOT NULL,
  `IDStatusPernikahan` char(6) NOT NULL,
  `IDStatusPendidikan` char(6) NOT NULL,
  `IDPosisiJabatan` char(6) NOT NULL,
  `NomorIndukPencaker` varchar(50) NOT NULL,
  `NamaPencaker` varchar(50) NOT NULL,
  `TempatLahir` varchar(50) NOT NULL,
  `TglLahir` date NOT NULL,
  `JenisKelamin` tinyint(1) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telepon` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `KodePos` varchar(50) NOT NULL,
  `Kewarganegaraan` tinyint(1) NOT NULL,
  `Jurusan` varchar(50) NOT NULL,
  `Keterampilan` varchar(50) NOT NULL,
  `NEMIPK` tinyint(1) NOT NULL,
  `Nilai` varchar(50) NOT NULL,
  `TahunLulus` varchar(4) NOT NULL,
  `TinggiBadan` varchar(50) NOT NULL,
  `BeratBadan` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL,
  `Lokasi` tinyint(1) NOT NULL,
  `UpahYangDicari` varchar(50) NOT NULL,
  `RegisterDate` datetime NOT NULL,
  `NomerPenduduk` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mspengalaman`
--

CREATE TABLE `mspengalaman` (
  `IDPengalaman` char(6) NOT NULL,
  `IDPencaker` char(45) DEFAULT NULL,
  `Jabatan` varchar(45) NOT NULL,
  `UraianKerja` longtext NOT NULL,
  `NamaPerusahaan` varchar(45) NOT NULL,
  `TglMasuk` date NOT NULL,
  `TglBerhenti` date NOT NULL,
  `IDPencakerTemp` varchar(45) DEFAULT NULL,
  `StatusPekerjaan` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msperusahaan`
--

CREATE TABLE `msperusahaan` (
  `IDPerusahaan` char(6) NOT NULL,
  `IDUser` char(6) NOT NULL,
  `IDBidangPerusahaan` char(6) NOT NULL,
  `IDKelurahan` char(6) NOT NULL,
  `NamaPerusahaan` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telepon` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `KodePos` varchar(50) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `Propinsi` varchar(50) NOT NULL,
  `NamaPemberiKerja` varchar(50) NOT NULL,
  `JabatanPemberiKerja` varchar(50) NOT NULL,
  `TeleponPemberiKerja` varchar(50) NOT NULL,
  `EmailPemberiKerja` varchar(50) NOT NULL,
  `RegisterDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msperusahaantemp`
--

CREATE TABLE `msperusahaantemp` (
  `IDPerusahaanTemp` char(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `IDBidangPerusahaan` char(6) NOT NULL,
  `IDKelurahan` char(6) NOT NULL,
  `NamaPerusahaan` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telepon` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `KodePos` varchar(50) NOT NULL,
  `Kota` varchar(50) NOT NULL,
  `Propinsi` varchar(50) NOT NULL,
  `NamaPemberiKerja` varchar(50) NOT NULL,
  `JabatanPemberiKerja` varchar(50) NOT NULL,
  `TeleponPemberiKerja` varchar(50) NOT NULL,
  `EmailPemberiKerja` varchar(50) NOT NULL,
  `RegisterDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msposisijabatan`
--

CREATE TABLE `msposisijabatan` (
  `IDPosisiJabatan` char(6) NOT NULL,
  `NamaPosisiJabatan` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msposisijabatan`
--

INSERT INTO `msposisijabatan` (`IDPosisiJabatan`, `NamaPosisiJabatan`) VALUES
('000021', 'Distribution'),
('000020', 'Transportation'),
('000019', 'Warehousing'),
('000018', 'I T'),
('000017', 'EXIM'),
('000016', 'SECURITY'),
('000015', 'PPIC'),
('000014', 'KASIR'),
('000013', 'MAINTENANCE'),
('000012', 'ENGINERING'),
('000011', 'WAITRESS'),
('000010', 'DEBT COLLECTOR'),
('000009', 'DRIVER'),
('000008', 'Q A'),
('000007', 'Quality Control'),
('000006', 'Operator Produksi'),
('000005', 'Staff'),
('000004', 'Manajer'),
('000003', 'Sekertaris'),
('999999', 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `msresetpassword`
--

CREATE TABLE `msresetpassword` (
  `IDUser` char(6) NOT NULL,
  `ActivationCode` char(32) NOT NULL,
  `RegisterDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `msstatushubungankerja`
--

CREATE TABLE `msstatushubungankerja` (
  `IDStatusHubunganKerja` char(6) NOT NULL,
  `NamaStatusHubunganKerja` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msstatushubungankerja`
--

INSERT INTO `msstatushubungankerja` (`IDStatusHubunganKerja`, `NamaStatusHubunganKerja`) VALUES
('000001', 'Waktu tertentu'),
('000002', 'Waktu tidak tertentu');

-- --------------------------------------------------------

--
-- Table structure for table `msstatuspendidikan`
--

CREATE TABLE `msstatuspendidikan` (
  `IDStatusPendidikan` char(6) NOT NULL,
  `NamaStatusPendidikan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msstatuspendidikan`
--

INSERT INTO `msstatuspendidikan` (`IDStatusPendidikan`, `NamaStatusPendidikan`) VALUES
('000001', 'Tidak Tamat SD'),
('000002', 'SD'),
('000003', 'SMP / MTS'),
('000004', 'SMK / MAK'),
('000005', 'SMA / MA'),
('000006', 'D1'),
('000007', 'D2'),
('000008', 'D3'),
('000009', 'S1 / D4'),
('000010', 'S2'),
('000011', 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `msstatuspernikahan`
--

CREATE TABLE `msstatuspernikahan` (
  `IDStatusPernikahan` char(6) NOT NULL,
  `NamaStatusPernikahan` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msstatuspernikahan`
--

INSERT INTO `msstatuspernikahan` (`IDStatusPernikahan`, `NamaStatusPernikahan`) VALUES
('000001', 'Belum Menikah'),
('000002', 'Menikah'),
('000003', 'Duda'),
('000004', 'Janda');

-- --------------------------------------------------------

--
-- Table structure for table `mstingkatpendidikan`
--

CREATE TABLE `mstingkatpendidikan` (
  `IDTingkatPendidikan` char(6) CHARACTER SET latin1 NOT NULL,
  `NamaTingkatPendidikan` varchar(50) CHARACTER SET latin1 NOT NULL,
  `LevelTingkatPendidikan` tinyint(1) NOT NULL DEFAULT '0',
  `JenisTingkatPendidikan` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mstingkatpendidikan`
--

INSERT INTO `mstingkatpendidikan` (`IDTingkatPendidikan`, `NamaTingkatPendidikan`, `LevelTingkatPendidikan`, `JenisTingkatPendidikan`) VALUES
('000001', 'PGSMTP', 0, 0),
('000002', 'SD', 1, 1),
('000003', 'SLTP', 2, 1),
('000004', 'SLTA', 3, 1),
('000005', 'DI/AKTA I', 4, 1),
('000006', 'DII/AKTA II', 4, 1),
('000007', 'DIII/AKADEMI/AKTA III', 4, 1),
('000008', 'SI', 5, 1),
('000009', 'SII', 6, 1),
('000010', 'AKTA IV', 7, 0),
('000011', 'PROFESI', 7, 0),
('000012', 'DIV', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `msuser`
--

CREATE TABLE `msuser` (
  `IDUser` char(6) NOT NULL,
  `IDJenisUser` char(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `RegisterDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msuser`
--

INSERT INTO `msuser` (`IDUser`, `IDJenisUser`, `Username`, `Password`, `session_id`, `RegisterDate`) VALUES
('000000', '000000', 'admin', 'tobat', '29fa7cb2ed04b83a67702228129c6b52', '2018-08-20 14:10:06'),
('000052', '000002', 'Fahruroji', 'akupadamu72', '0', '2018-09-14 21:06:39'),
('000044', '000001', 'rsmedika', '123456', '0', '2018-08-20 15:15:24'),
('000049', '000002', 'pencaker', '222111', 'c7e437c2bd7f2114e91fcc4cd717d934', '2018-09-10 14:50:58'),
('000050', '000002', 'abdullah', '12345', '0', '2018-09-13 13:05:54'),
('000046', '000002', 'Fara Mustika', 'fara0103', '0', '2018-09-07 12:01:46'),
('000055', '000002', 'Ari Wahyono', 'misterius', '0', '2018-09-19 23:02:03'),
('000048', '000002', 'Nurinfelicita@gmal.c', 'nurin1991', '0', '2018-09-07 12:55:11'),
('000054', '000001', 'emeralda', '123456', 'a982f7ca1237d956c2895ade20583625', '2018-09-19 20:54:59'),
('000053', '000001', 'tokaidharma', '123456', '0', '2018-09-19 20:33:23'),
('000051', '000002', 'dwikurniawan', 'Bangsat1709', '047de353d8f6fea9b28eed9976a6828d', '2018-09-14 13:46:02'),
('000056', '000001', 'rspuricinere', '123456', '0', '2018-09-19 23:14:39'),
('000059', '000001', 'Pustaka', 'rekrut1000sales', '0', '0000-00-00 00:00:00'),
('000058', '000001', 'disnakerdepok', '123456', '0', '2018-09-23 19:52:46'),
('000061', '000002', 'Anggita', 'sudjana', 'a4b6b270b2ba3a06a30a992109f5264b', '2018-09-27 12:27:45'),
('000062', '000002', 'AyuDianCN', '26111995', '0', '2018-09-28 09:14:34'),
('000063', '000002', 'Muhamad oky maulana', 'fpitapos92', '0', '2018-09-28 09:32:07'),
('000064', '000002', 'restigita', 'restigita', '0', '2018-09-28 15:11:16'),
('000065', '000002', 'NovrisaYerisaSaputri', 'picha2611', '0', '2018-09-28 15:14:13'),
('000066', '000002', 'ANDRIANA', 'anisa92', '0', '2018-09-28 15:17:09'),
('000067', '000002', 'yogayudistira', 'kepoloe123', '0', '2018-09-28 15:27:13'),
('000068', '000002', 'hary ', 'mustafa', '0', '2018-10-01 09:31:47'),
('000069', '000002', 'SELLYLESTARI', 'LESTARI21', '0', '2018-10-01 09:50:10'),
('000070', '000002', 'resturamadhan', 'RAMA234dhan', '0', '2018-10-01 10:01:21'),
('000079', '000002', 'NURLAILI', 'LAILI', '0', '2018-10-01 10:15:51'),
('000080', '000002', 'RAYNALDYWIGUNA', 'RENDHIEY', '0', '2018-10-01 10:48:14'),
('000081', '000002', 'DINANURRIZKIRACHMA', 'DINANURRIZKI25', '0', '2018-10-01 10:51:10'),
('000082', '000002', 'YaraHudaPutri', 'excited22', '0', '2018-10-01 11:01:48'),
('000091', '000002', 'RIFARACHMAWATI', 'JINTUL', '0', '2018-10-01 11:18:08'),
('000092', '000002', 'Putrikomaladesi', 'duapuluhsatu', '0', '2018-10-01 11:18:33'),
('000093', '000002', 'RAHMIGARNASIH', 'FATIH123', '0', '2018-10-01 11:19:23'),
('000096', '000002', 'Dewituanani', 'wi5juni1974', '0', '2018-10-01 11:32:49'),
('000097', '000002', 'FENTIPANGESTUTI', '180395', '0', '2018-10-01 11:40:44'),
('000098', '000002', 'YUNIINDRIANI', 'FIRMANSYAH26', '0', '2018-10-01 11:42:46'),
('000099', '000002', 'NOVTENKISNALDHELVINA', 'Simamora17', '0', '2018-10-01 11:49:23'),
('000100', '000002', 'MUHAMMADDAWUD', 'DAWUD99', '0', '2018-10-01 11:59:00'),
('000104', '000002', 'Ari Wijaya', 'dhabit025', '0', '2018-10-01 12:03:49'),
('000105', '000002', 'ajengeuispermatasari', 'oktoberku', '0', '2018-10-01 12:19:49'),
('000106', '000002', 'andikajuniar', 'andika123', '0', '2018-10-01 12:22:03'),
('000525', '000002', 'galuhwibisono', 'galuhwibisono', '0', '2018-10-23 14:33:58'),
('000111', '000002', 'Susi lailatull', 'shakilla02', '0', '2018-10-01 12:26:03'),
('000113', '000002', 'Sheva', '1516', '0', '2018-10-01 12:26:41'),
('000121', '000002', 'RISMANPUTRADALIMA', 'RISMAN123', '0', '2018-10-01 12:33:03'),
('000122', '000002', 'silfiatudurroh', '12345', '0', '2018-10-01 12:37:29'),
('000123', '000002', 'deanalaniza', 'BOGORPADANG', '0', '2018-10-01 13:54:50'),
('000124', '000002', 'bramanjp', '10111995bjp', '0', '2018-10-01 14:00:08'),
('000125', '000002', 'Reza permana', 'reza280192', '0', '2018-10-01 14:03:27'),
('000126', '000002', 'gebhybamba', 'Alexandria13', '0', '2018-10-01 14:10:19'),
('000127', '000002', 'Erichson', 'Insideroom12', '0', '2018-10-01 14:15:09'),
('000128', '000002', 'Arantikael', 'Ti9ersss', '0', '2018-10-01 14:20:12'),
('000129', '000002', 'dheasyilviafajriah', '28081998', '0', '2018-10-01 14:23:39'),
('000130', '000002', 'rikyrizkianharahap', 'riky', '0', '2018-10-01 14:32:17'),
('000131', '000002', 'karinaputri', '12345', '0', '2018-10-01 14:48:50'),
('000132', '000002', 'alikaqurota', 'matahari123', '0', '2018-10-01 14:53:17'),
('000133', '000002', 'MayaAmeliani', '30des1995', '0', '2018-10-01 15:06:07'),
('000134', '000002', 'hermawhy@gmail.com', 'hermawati', '0', '2018-10-01 15:09:41'),
('000135', '000002', 'banyupratama', 'karyapurnama', '0', '2018-10-01 15:30:44'),
('000136', '000002', 'sonydarmadani', 'sony12345', '0', '2018-10-01 15:33:52'),
('000544', '000002', 'mathin', '123456', '2803a05dad11b55529e6269f208d685a', '2018-10-27 01:26:30'),
('000138', '000002', 'IndrianiKusumawati', 'INDRIANI12345', '0', '2018-10-02 08:43:57'),
('000139', '000002', 'RhaniShintiaUtama', 'Khalilazka', '0', '2018-10-02 09:08:32'),
('000140', '000002', 'MeinyEky', '212223', '0', '2018-10-02 09:28:03'),
('000141', '000002', 'DistaAnjelin', '170362', '0', '2018-10-02 09:54:25'),
('000142', '000002', 'sriorinta', '12345678', '0', '2018-10-02 10:06:42'),
('000143', '000002', 'nadianoviyaniputri', '623420np', '0', '2018-10-02 10:11:30'),
('000144', '000002', 'rafiqabdullah', 'rafiq tkj', '0', '2018-10-02 10:22:57'),
('000145', '000002', 'ISTIQOMAH', '06121989', '0', '2018-10-02 10:32:28'),
('000146', '000002', 'dinarahmawati', 'dinarahma', '3bf54a0013c463c2ce973df853637dd4', '2018-10-02 10:32:50'),
('000147', '000002', 'Fahmiistianih', 'janganlupa', '0', '2018-10-02 10:38:17'),
('000148', '000002', 'Kaniya Parama Artini', 'galaxykaniya', '0', '2018-10-02 10:50:21'),
('000149', '000002', 'RIMAPRIDAYANI', '080396', '0', '2018-10-02 10:53:04'),
('000150', '000002', 'Litalesthia', 'LITALESTIA', '0', '2018-10-02 10:55:59'),
('000151', '000002', 'NITAROSMANITA', '291187', '0', '2018-10-02 11:03:10'),
('000152', '000002', 'srisumarsih', '523470', '0', '2018-10-02 11:08:03'),
('000153', '000002', 'SONIANURADHANI', 'SEBELASJUNI', '0', '2018-10-02 11:13:05'),
('000154', '000002', 'SYAHLADHIYACUTTIARA', '20072003', '0', '2018-10-02 11:21:39'),
('000155', '000002', 'ANASTALBIAH', 'akuntansi05', '0', '2018-10-02 11:27:29'),
('000156', '000002', 'SILVIAULIAPEBRIYANTI', 'CISALAK123', '0', '2018-10-02 11:31:35'),
('000157', '000002', 'SENJANUANSARI', 'SENJA11', '0', '2018-10-02 11:37:45'),
('000158', '000002', 'miqbalm', 'senja11', '0', '2018-10-02 11:42:55'),
('000159', '000002', 'SITIJULAEHA', 'ikanpaus805', '0', '2018-10-02 11:47:16'),
('000160', '000002', 'widayanti', 'yanti123', '0', '2018-10-02 11:50:15'),
('000161', '000002', 'SeptianYudisPutra', 'septian123', '0', '2018-10-02 11:52:15'),
('000162', '000002', 'destianaherwaniutami', 'destiana24', '0', '2018-10-02 11:57:44'),
('000163', '000002', 'boyengurning', 'gurning', '0', '2018-10-02 12:06:14'),
('000164', '000002', 'Hasnahafidhayanti', 'hhy090993', '0', '2018-10-02 12:10:07'),
('000165', '000002', 'DESIPRIHATINI', 'desifauzan', '0', '2018-10-02 13:00:56'),
('000166', '000002', 'ALDIPRIYANTO', 'ALDI1234', '0', '2018-10-02 13:01:22'),
('000167', '000002', 'IDewaAyuDianP', 'dewaa#yu86@', '0', '2018-10-02 13:01:39'),
('000168', '000002', 'YAYIHAFIFAH', 'YAYI2008', '0', '2018-10-02 13:02:19'),
('000169', '000002', 'YATIMARYATI', 'YATI0611', '0', '2018-10-02 13:02:37'),
('000170', '000002', 'EUISKURNIASIH', 'euis0506', '0', '2018-10-02 13:02:53'),
('000171', '000002', 'HAYATI', '07072007', '0', '2018-10-02 13:12:49'),
('000172', '000002', 'ERICHA', 'NANDI33', '0', '2018-10-02 13:24:42'),
('000173', '000002', 'GLOURYASTIKA', '301030', '0', '2018-10-02 13:28:15'),
('000174', '000002', 'RYANTRIWARDANA', '18061999', '0', '2018-10-02 13:35:38'),
('000175', '000002', 'CANDRAGUNAWAN', 'ASDASD123', '0', '2018-10-02 14:03:08'),
('000176', '000002', 'Hillman565', 'Halo061296', '0', '2018-10-02 14:22:24'),
('000177', '000002', 'rauliadita', 'carisendiri', '0', '2018-10-02 14:24:49'),
('000178', '000002', 'AANMIDADARRIZZA', 'IKHWAN01', '0', '2018-10-02 14:32:29'),
('000179', '000002', 'EvasarahSolihatin', 'oktober', '0', '2018-10-02 15:41:51'),
('000180', '000002', 'yusufkurniawan', 'yusufkurniawan', '0', '2018-10-03 08:44:42'),
('000181', '000002', 'keny', 'jakarta87', '0', '2018-10-03 09:05:04'),
('000182', '000002', 'DiniAnjani', 'darrell', '0', '2018-10-03 09:09:05'),
('000183', '000002', 'mujtahid', 'tata7474', '0', '2018-10-03 09:16:35'),
('000184', '000002', 'NikyWahyuningGusti', 'niky7474', '0', '2018-10-03 09:21:57'),
('000185', '000002', 'KikiIndahRizky', 'didikcahyo', '0', '2018-10-03 09:39:24'),
('000186', '000002', 'ZULKAHFI', 'ZOELAY89', '0', '2018-10-03 09:51:22'),
('000187', '000002', 'LindaMariaFreitas', '302901', '0', '2018-10-03 10:00:48'),
('000188', '000002', 'YUSUFFIRMANSYAH', 'FIRMANSYAH25', '0', '2018-10-03 10:04:01'),
('000189', '000002', 'yoelpriatama', 'yopr040995', '0', '2018-10-03 10:10:33'),
('000190', '000002', 'DEWIBUDIAPRIANI', '18061999', '0', '2018-10-03 10:16:04'),
('000191', '000002', 'endiwirawan', '1994London', '0', '2018-10-03 10:18:52'),
('000192', '000002', 'MUTIARASHALEHAH', 'LALAMUTIARA', '0', '2018-10-03 10:26:12'),
('000193', '000002', 'BinsarYerico', 'NicoRobin33', '0', '2018-10-03 10:28:46'),
('000194', '000002', 'ayuarn', 'Papah1965', '0', '2018-10-03 10:34:10'),
('000195', '000002', 'YULIYANIPRATWI', 'SAMBELTERASI', '0', '2018-10-03 10:41:55'),
('000196', '000002', 'NurFitri', 'handayani11', '0', '2018-10-03 10:59:04'),
('000197', '000002', 'YAYANSAPUTRA', 'yayan saputra', '0', '2018-10-03 11:15:20'),
('000198', '000002', 'agung', 'della123', '0', '2018-10-03 11:17:19'),
('000201', '000002', 'arysetiawan', 'Arys1991', '0', '2018-10-03 11:40:04'),
('000200', '000002', 'OCTAVINA', '041093vina', '0', '2018-10-03 11:21:00'),
('000202', '000002', 'AROEL', 'MASRUR123', '0', '2018-10-03 11:46:18'),
('000203', '000002', 'FitriAndriyani', 'fitri123', '0', '2018-10-03 12:10:42'),
('000204', '000002', 'DevianaClariskaAfifa', 'Andini12', '0', '2018-10-03 13:14:43'),
('000205', '000002', 'adhelamawarsafitri', 'adhela123', '0', '2018-10-03 13:15:04'),
('000206', '000002', 'Rudi yanto w', 'tid@ktahu', '0', '2018-10-03 13:26:09'),
('000207', '000002', 'amicahyashefria', 'September1992', '0', '2018-10-03 13:26:25'),
('000208', '000002', 'nuraisyah', '83283217', '0', '2018-10-03 13:29:26'),
('000209', '000002', 'Jodi Imansyah', 'zaturaaa', '0', '2018-10-03 13:30:01'),
('000210', '000002', 'NURDIANSYAH', 'NURDIANSYAH01', '0', '2018-10-03 13:33:22'),
('000211', '000002', 'Ayuhardini', '090996', '0', '2018-10-03 13:42:06'),
('000212', '000002', 'RIZKYANDINI', '220896', '0', '2018-10-03 14:00:15'),
('000213', '000002', 'nabilahjulianaputri', 'nabilahjuliana', '0', '2018-10-03 14:02:07'),
('000214', '000002', 'NURKHADIJAHSURYANI', '220387', '0', '2018-10-03 14:14:19'),
('000215', '000002', 'NaomiHutabarat', 'Naomi20081995', '0', '2018-10-03 14:31:31'),
('000216', '000002', 'MUHAMMADALVIASYRI', 'ALVI', '0', '2018-10-03 14:45:11'),
('000217', '000002', 'RickyDarmawan', 'darmawan', '0', '2018-10-03 14:45:28'),
('000218', '000002', 'septian', 'persija1928', '0', '2018-10-03 14:55:08'),
('000219', '000002', 'muhammadrahmatsulaks', 'B1smillah', '0', '2018-10-03 15:08:27'),
('000220', '000002', 'INDAHPUSPITASARI', 'SANDIBARU', '0', '2018-10-03 15:09:48'),
('000221', '000002', 'AYUWULANSARI', 'AYUWULANSARI', '0', '2018-10-03 15:20:50'),
('000222', '000002', 'ADITYANUGRAHA', '123456789', '0', '2018-10-03 15:24:24'),
('000223', '000002', 'Ayu Budihartini', '13definded96', '0', '2018-10-03 15:27:48'),
('000224', '000002', 'apriliyanti', '123456789', '0', '2018-10-03 15:31:08'),
('000225', '000002', 'CAHYORACHMARDAN', 'cp111106', '0', '2018-10-03 15:33:17'),
('000226', '000002', 'LindaDindaGustiana', 'lindadinda', '0', '2018-10-04 09:07:00'),
('000227', '000002', 'Nabilapudjiartha', 'nabila123456', '0', '2018-10-04 09:07:33'),
('000228', '000002', 'AuliaRahmawati', '12345', '0', '2018-10-04 09:13:17'),
('000229', '000002', 'Fakhi Ahmad Fadel', '12345678910', 'e96a2f514af8c67eb296ab5ee770792c', '2018-10-04 09:13:30'),
('000230', '000002', 'SHELLYNOFLISA', 'NOVEMBER311', '0', '2018-10-04 09:38:20'),
('000231', '000002', 'Latifaagustin', '246812', '0', '2018-10-04 09:40:56'),
('000232', '000002', 'ANGGIPRAMONO', 'buatapaan', '0', '2018-10-04 09:43:29'),
('000235', '000002', 'RickySaputra', 'kartukuning', '67e58fc956c95003d9405f0c175330fe', '2018-10-04 10:18:02'),
('000234', '000002', 'ICHANURAISYAH', 'ichotpapoy', '0', '2018-10-04 10:05:52'),
('000236', '000002', 'SITISARAH', '200792', '0', '2018-10-04 10:22:30'),
('000237', '000002', 'MULYATIBAHRI', 'B4HAGIAITUINDAH', '0', '2018-10-04 10:37:34'),
('000238', '000002', 'KARTONO', 'SATUAJA', '0', '2018-10-04 10:47:29'),
('000239', '000002', 'AMALDAELZANORA', '040799', '0', '2018-10-04 10:49:08'),
('000240', '000002', 'Rista Oktaviani', 'ristaoktaviani', '0', '2018-10-04 10:50:52'),
('000244', '000002', 'Lincasihombing', 'Linca86', '0', '2018-10-04 11:34:54'),
('000242', '000002', 'TIASTANTORAHARJO', '123456789', '0', '2018-10-04 11:12:08'),
('000243', '000002', 'yuzakkif', 'h@1yuz4', '0', '2018-10-04 11:27:06'),
('000248', '000002', 'EndahAmbarsari', '09Oktober15', '0', '2018-10-04 12:01:21'),
('000246', '000002', 'SHAFIRAADELIA', 'adeladelaide20', '0', '2018-10-04 11:53:16'),
('000250', '000002', 'Ismayanti setiawan', 'ismayanti31', '0', '2018-10-04 13:03:30'),
('000247', '000002', 'SEPTIASARI', 'SEPTEMBER96', '0', '2018-10-04 11:57:14'),
('000249', '000002', 'BEKTISETIYOWATI', '123456789', '0', '2018-10-04 12:07:07'),
('000251', '000002', 'Isti\'ana Tsania', 'titinsumarni', '0', '2018-10-04 13:07:00'),
('000252', '000002', 'ERAMIASUMARNI', '31037899', '0', '2018-10-04 13:10:56'),
('000323', '000002', 'tritaufandika', 'masdikdik20', '711daff2b96662a948c29315bd23f8e2', '2018-10-09 08:43:20'),
('000253', '000002', 'DesintaSeptianaPutri', 'desinta90', '0', '2018-10-04 13:13:33'),
('000254', '000002', 'IRWANSETIAWAN', '2903190218', '0', '2018-10-04 13:15:21'),
('000255', '000002', 'FutriTriyanti', '23012000', '0', '2018-10-04 13:23:34'),
('000256', '000002', 'JUITASIMBOLON', 'SIMBOLON', '0', '2018-10-04 13:29:14'),
('000257', '000002', 'Aldanursafitri080599', 'november28', '0', '2018-10-04 13:32:28'),
('000258', '000002', 'vivaldyismail', '123456', '0', '2018-10-04 13:46:20'),
('000259', '000002', 'AdhiTriyanto', '12345678', '0', '2018-10-04 13:50:31'),
('000260', '000002', 'TRIONO BASUKI', '12345678', '0', '2018-10-04 14:06:38'),
('000261', '000002', 'HanaAjeng', 'ajeng0506', '0', '2018-10-04 14:06:46'),
('000262', '000002', 'Dinaetika', 'dinacans', '0', '2018-10-04 14:10:44'),
('000263', '000002', 'Maulida', 'BISMILLAH1', '0', '2018-10-04 14:58:48'),
('000264', '000002', 'masnaasilaban', 'masna198', '0', '2018-10-04 15:01:05'),
('000265', '000002', 'ENDAHRAHAYU', '123456', '0', '2018-10-04 15:06:58'),
('000266', '000002', 'NANANG', '123456', '0', '2018-10-04 15:13:55'),
('000267', '000002', 'ALDIMUHAMMADSALIM', '123456', '0', '2018-10-04 15:23:45'),
('000268', '000002', 'fikhifardian', 'gwlupa1234', '0', '2018-10-05 08:21:39'),
('000269', '000002', 'NURHALIMAHPOHAN', 'aqucintakamu', '0', '2018-10-05 08:24:26'),
('000270', '000002', 'ANNISASEKARAYU', 'B3283EGG', '0', '2018-10-05 08:39:53'),
('000271', '000002', 'AjengAyulestari', 'ajeng', '0', '2018-10-05 08:52:50'),
('000272', '000002', 'JOKOBUDI', '261285', '0', '2018-10-05 08:58:53'),
('000273', '000002', 'ERINANURSIYAH', 'ERINA', '0', '2018-10-05 09:01:42'),
('000274', '000002', 'ADENURMANSYAH', 'RASAMOCHA', '0', '2018-10-05 09:23:45'),
('000275', '000002', 'JulianaPutriBhayangk', 'juli1996', '0', '2018-10-05 09:29:26'),
('000276', '000002', 'DianUtariNingrum', 'cipirili', '0', '2018-10-05 09:33:15'),
('000277', '000002', 'RIZKYWAHYUPANGESTU', 'rizkywpp', '0', '2018-10-05 09:44:14'),
('000278', '000002', 'nafisahmaharani', '123456789', '0', '2018-10-05 09:52:15'),
('000279', '000002', 'oqiandriansyah', 'BKOLoci12', '0', '2018-10-05 09:58:40'),
('000280', '000002', 'GIRRYSETIAWAN', 'GIRRYSETIAWAN', '0', '2018-10-05 10:02:19'),
('000281', '000002', 'SURYANI', 'depok12345', '0', '2018-10-05 10:04:04'),
('000282', '000002', 'AdeRachmatFikri', '040188', '0', '2018-10-05 10:19:50'),
('000283', '000002', 'PIQIHKARTIKAMURTI', 'ALLAH1', '0', '2018-10-05 10:25:34'),
('000284', '000002', 'PUTRIWULANDARI', '130491', '0', '2018-10-05 10:58:56'),
('000285', '000002', 'HERWANDI', '31101995', '0', '2018-10-05 13:25:33'),
('000286', '000002', 'Junita nur handayani', 'margonda', '0', '2018-10-05 13:30:01'),
('000287', '000002', 'NURARISPURNOMO', '17OKTOBER', '0', '2018-10-05 13:32:38'),
('000288', '000002', 'IKA RATNA HARUM', 'ika890', '97d7ad5e09c8e4cbc73f76f17e0b39ae', '2018-10-05 13:35:24'),
('000289', '000002', 'CHECHEMETA', '220190', '0', '2018-10-05 13:50:07'),
('000290', '000002', 'M.ROBYSKANDAR', '123456', '0', '2018-10-05 14:25:30'),
('000291', '000002', 'jaya25', 'qazw4321', '0', '2018-10-05 14:29:50'),
('000292', '000002', 'tututabimanyu', 'tututabi', '0', '2018-10-08 08:16:58'),
('000294', '000002', 'FebiStiawan', 'bii345678', '0', '2018-10-08 09:35:07'),
('000293', '000002', 'IWIWITSUASTIKA', 'WIWITSUASTIKA', '0', '2018-10-08 08:59:26'),
('000295', '000002', 'Ayuputriwerdayanings', 'ayuobang123', '0', '2018-10-08 09:41:57'),
('000296', '000002', 'FAHMIFATHURRAHMAN', 'FAHMII123', '0', '2018-10-08 10:07:02'),
('000794', '000002', 'nalasarinovia22@gmai', 'noviana22', '0', '2018-12-03 09:58:58'),
('000298', '000002', 'NOPISETIANINGSIH', 'NOVI250817', '0', '2018-10-08 10:34:56'),
('000299', '000002', 'annisafis', 'gualupa', '0', '2018-10-08 10:37:25'),
('000300', '000002', 'HeruKaruniawan', 'heruarun16', '0', '2018-10-08 10:41:32'),
('000301', '000002', 'ebylagee', '415h1t3ru', '0', '2018-10-08 11:00:51'),
('000302', '000002', 'rajasyahbaitulmunthe', 'raja.199', '0', '2018-10-08 11:03:56'),
('000307', '000002', 'SUBHANDIIRWANSYAH', 'ratnasari1992', '0', '2018-10-08 12:01:29'),
('000303', '000002', 'KURNIASIH', '11032015', '0', '2018-10-08 11:19:18'),
('000304', '000002', 'IsfanA', '02195015285', '0', '2018-10-08 11:35:49'),
('000305', '000002', 'Joshua', 'sihombing12', '0', '2018-10-08 11:40:02'),
('000306', '000002', 'Mikael', 'mikael', '0', '2018-10-08 11:44:06'),
('000437', '000002', 'jannetapralispa', 'expetopatronum', '0', '2018-10-15 10:51:48'),
('000308', '000002', 'PUTUTAGUSPRABOWO', 'DWI200282', '0', '2018-10-08 13:26:39'),
('000309', '000002', 'ASIHDWIHARLIDYAROCHM', 'HARLIDYA', '0', '2018-10-08 13:33:26'),
('000310', '000002', 'RAHMIALDUAIRA', 'AMIAMOI', '0', '2018-10-08 13:37:28'),
('000311', '000001', 'febi', 'edyhariady3108#', '2434d8bd787755afea7459927f9119b6', '2018-10-08 14:12:47'),
('000312', '000002', 'BAMBANGWIBOWO', 'BOWO13', '0', '2018-10-08 14:13:26'),
('000313', '000001', 'izar', 'kaninaaji', '0', '2018-10-08 14:16:42'),
('000314', '000001', 'Anita', 'Zahran01', '0', '2018-10-08 14:16:57'),
('000315', '000001', 'menaradepokasri', 'welcomemda', '0', '2018-10-08 14:17:52'),
('000316', '000001', 'ALFAMART', 'ALFAMART123', '0', '2018-10-08 14:19:13'),
('000317', '000002', 'MARATUSSHOLIHAH', 'MARA9792', '0', '2018-10-08 14:21:47'),
('000318', '000001', 'persp1', 'personalia', 'a31f392a76adbeaaaa3e0c851bb276b3', '2018-10-08 14:22:29'),
('000319', '000001', 'Sigidnurcahyo', '@Ykk2018', '34fc08c86f8d4cb1fffde542e5958207', '2018-10-08 14:24:53'),
('000320', '000001', 'Astri', 'abc?1234', '5fa46689fb85744bb188476d4fa30636', '2018-10-08 14:26:28'),
('000321', '000001', 'Zulfakri', 'hanami', '0', '2018-10-08 14:59:03'),
('000322', '000002', 'NenengNengsih', 'Agus01', '0', '2018-10-08 15:50:16'),
('000324', '000002', 'nurlaelabidu', 'nurlaela18', '0', '2018-10-09 09:27:44'),
('000325', '000002', 'PRASETYAEGAPRATAMA', 'EGAPRASETYA', '0', '2018-10-09 09:52:29'),
('000326', '000002', 'ahmadridwan', '123456789', '0', '2018-10-09 10:09:10'),
('000327', '000002', 'SRIGINARAMARISTI', 'tante11nya', '0', '2018-10-09 10:13:24'),
('000328', '000002', 'Reysapranandaturanga', '200690', '0', '2018-10-09 10:38:38'),
('000329', '000002', 'DwiMulyanti', 'dwimulyanti', '0', '2018-10-09 11:06:16'),
('000330', '000002', 'FitriDwiyanti', '23012000', '0', '2018-10-09 11:14:50'),
('000331', '000002', 'KhairinaMuflihah', 'MOVEMDAN@', '0', '2018-10-09 11:19:59'),
('000332', '000002', 'TEGUH', 'TEGUH12345', '0', '2018-10-09 11:21:46'),
('000333', '000002', 'HAURAARIESTA', 'DONGHAE86', '0', '2018-10-09 11:23:32'),
('000334', '000002', 'DEVYOCTAVIYANIPUTRI', 'GERBERA', '0', '2018-10-09 11:39:47'),
('000335', '000002', 'yohanesanugraha', 'bimbonknice', '0', '2018-10-09 11:48:33'),
('000336', '000002', 'ARISTARATNANINGRUM', 'rista0386', '0', '2018-10-09 11:49:49'),
('000337', '000002', 'DentyM', '16517denty', '74841078e644a93f8d01e806b2ccd2da', '2018-10-09 11:54:54'),
('000338', '000002', 'RAHAYUKUSUMANINGRUM', '31JULI96', '0', '2018-10-09 12:00:38'),
('000339', '000002', 'Yosegregorytarigan', 'stevevai096', '0', '2018-10-09 12:15:18'),
('000340', '000002', 'ADNANHARIES', 'edenhazard', '0', '2018-10-09 13:34:00'),
('000341', '000002', 'MSYAFRUDDIN', 'gampang', '0', '2018-10-09 13:35:33'),
('000342', '000002', 'AINURROSYIDAH', 'mutiaraputih', '0', '2018-10-09 13:46:35'),
('000343', '000002', 'INTANFITRINURVITASAR', '190296', '0', '2018-10-09 14:06:34'),
('000344', '000002', 'NETYOPAMUJIPRASETYO', '242424', '0', '2018-10-09 14:12:34'),
('000345', '000002', 'HEDWIGERYNSAUBANGNGA', 'SUKSES', '0', '2018-10-09 14:25:20'),
('000346', '000002', 'ARNOLERDIAN', 'B3576EBI', '0', '2018-10-09 14:33:05'),
('000347', '000002', 'SONYAMOREENWIJAYA', 'sonya123', '0', '2018-10-09 15:04:23'),
('000348', '000002', 'DAMASEGARACIPTA', 'DAMA130500', '0', '2018-10-09 15:22:16'),
('000349', '000002', 'IbnuFauzan3', 'Bento303', '0', '2018-10-09 15:31:54'),
('000350', '000002', 'sidiqpermanaputra', 'sidiq250600', '0', '2018-10-09 15:37:34'),
('000351', '000002', 'liyasilvana', 'silvana', '0', '2018-10-10 08:47:44'),
('000352', '000002', 'AINIVEBRIANI', '12122017', '0', '2018-10-10 09:36:18'),
('000353', '000002', 'sriwahyuningsih', '170987', '0', '2018-10-10 09:41:06'),
('000354', '000002', 'rikosaputra', '12122017', '0', '2018-10-10 09:44:45'),
('000355', '000002', 'INTANMASRIPRATAMAPUT', 'Smada26yes', '0', '2018-10-10 09:56:08'),
('000356', '000002', 'febyferdina', 'kentjavast', '0', '2018-10-10 10:01:15'),
('000357', '000002', 'WildaHumaida', 'humaira', '0', '2018-10-10 10:07:08'),
('000358', '000002', 'anggiangraini', 'cilodong123', '0', '2018-10-10 10:24:03'),
('000359', '000002', 'gojali', 'jalu', '0', '2018-10-10 10:24:29'),
('000360', '000002', 'deliadamayanti', 'cilodong123', '0', '2018-10-10 10:30:27'),
('000361', '000002', 'ERIYANTOO', 'tengah01', '0', '2018-10-10 11:01:50'),
('000362', '000002', 'AKHYASONY', 'CHEADEL501', '0', '2018-10-10 11:04:15'),
('000363', '000002', 'gunawansabara', '17awankgasingiT', '0', '2018-10-10 11:15:33'),
('000374', '000001', 'Transmart', '123456Ab', '43849aa8f59d7757b1b99c5da75ba2e8', '2018-10-10 17:42:43'),
('000365', '000002', 'wingkydwifahrevi', '250225', '0', '2018-10-10 11:55:13'),
('000366', '000002', 'SUKMALIAHANGGRAENI', 'Sukma94', '0', '2018-10-10 12:09:56'),
('000367', '000002', 'MARTHATIURLAN', 'JAKARTA', '0', '2018-10-10 13:25:52'),
('000368', '000002', 'wiwinlestari', 'wiwin', '0', '2018-10-10 13:27:34'),
('000369', '000002', 'PUJISAPUTRI', '303030', '0', '2018-10-10 13:31:58'),
('000370', '000002', 'NURAINI', '1234', '0', '2018-10-10 13:55:51'),
('000371', '000002', 'SYAHRULRIZKY', '@Saya123', '0', '2018-10-10 14:25:42'),
('000372', '000002', 'dwisetiya94', 'dwi200916', '0', '2018-10-10 14:43:59'),
('000373', '000002', 'TANZILLARIFQIANDIRA', 'tanzilla', '0', '2018-10-10 15:26:14'),
('000375', '000002', 'PUTRASUNDA1667', 'JAKARTA10', '0', '2018-10-11 08:39:44'),
('000376', '000002', 'NurOini', 'shiobabi', '0', '2018-10-11 08:40:53'),
('000377', '000002', 'VANIAPHRAMESWARY', 'vania2610', '0', '2018-10-11 09:10:33'),
('000378', '000002', 'NURULITAKUSUMANINGRU', 'ADVANCE94', '0', '2018-10-11 09:34:35'),
('000379', '000002', 'DedeNurdini', 'dedeeni191216', '0', '2018-10-11 09:51:33'),
('000380', '000002', 'teguhhadisantoso', 'cobalagi', '0', '2018-10-11 10:01:17'),
('000381', '000002', 'ROSIDAHAYUNINGSIH', 'ROSIDAHYOGA11', '0', '2018-10-11 10:43:40'),
('000382', '000002', 'HADISAFEBRIANI', 'TANGGALJADIAN', '0', '2018-10-11 11:18:27'),
('000383', '000002', 'rommyfuaddy', '02194917575p', '0', '2018-10-11 11:27:11'),
('000384', '000002', 'MERRYTRIANIPUTRI', 'putri88', '0', '2018-10-11 11:39:01'),
('000385', '000002', 'DIAHEKAPUTRIMAS', '170895', '0', '2018-10-11 12:00:50'),
('000386', '000002', 'SELVIAUDIA', 'SELVI123', '0', '2018-10-11 12:02:09'),
('000387', '000002', 'Benny', 'uerakan184', '0', '2018-10-11 13:38:29'),
('000388', '000002', 'ARLINARFIATI', '180693', '0', '2018-10-11 13:44:44'),
('000389', '000002', 'JulietaCitraMonica', 'monica07', '0', '2018-10-11 14:01:02'),
('000390', '000002', 'Nuraisyah.12', 'aisyah', '0', '2018-10-11 14:01:52'),
('000391', '000002', 'FITRA', 'BISMA1907', '0', '2018-10-11 14:02:10'),
('000392', '000002', 'Morleon Steve Willya', 'm7oocegood', '0', '2018-10-11 14:02:28'),
('000393', '000002', 'Furkon fadillah syah', 'furqon123', '0', '2018-10-11 14:08:04'),
('000394', '000002', 'saridestiani_29', 'destianisari', '0', '2018-10-11 14:08:22'),
('000395', '000002', 'Dizna.Sihotang@yahoo', 'md260818', '0', '2018-10-11 14:09:04'),
('000396', '000002', 'Lioni Virdha Raynell', '27031995', '429460d259c68b52833caa2d4af79146', '2018-10-11 14:09:27'),
('000397', '000002', 'MUHAMMADALIFFADLOLAH', 'ALIF8757762', '0', '2018-10-11 14:33:43'),
('000398', '000002', 'ricky.adip', 'PLOKI1234', '0', '2018-10-12 09:11:13'),
('000399', '000002', 'Akil', 'akiel0707', '0', '2018-10-12 09:40:05'),
('000400', '000002', 'syaifulakbar', 'mmidlykd', '0', '2018-10-12 10:29:07'),
('000401', '000002', 'boby', 'axis1234', '0', '2018-10-12 10:42:39'),
('000402', '000002', 'RirisNurhayati', 'sayariris', '0', '2018-10-12 10:59:25'),
('000403', '000002', 'Nuryanah', 'yayan123', '0', '2018-10-12 11:03:15'),
('000404', '000002', 'SriRatnaNingsih', 'sistar19', '0', '2018-10-12 11:07:21'),
('000405', '000002', 'PUTRINANDANIAGUSTIN', '26AGUSTUS94', '0', '2018-10-12 11:18:42'),
('000406', '000002', 'diahindriastuti', 'kusno0501', '0', '2018-10-12 11:19:09'),
('000407', '000002', 'adidwipriono', '160498', '0', '2018-10-12 11:29:50'),
('000409', '000002', 'FERINASEPTIAWATI', 'FERINASEPTIAWATI', '07d599d2d940a365a5c40889c8229a0c', '2018-10-12 13:51:49'),
('000410', '000002', 'ROHMAHAZZAHRI', 'ROHMAH19', '95484daee319691ce69150b7790a4ae7', '2018-10-12 13:54:51'),
('000411', '000002', 'Karmila', 'mila', 'a10f65f7d04c0b475609150f4f6d26df', '2018-10-12 14:02:17'),
('000412', '000002', 'GUNAWANWIBISANA', 'HOTPURSUIT', '0', '2018-10-12 14:02:33'),
('000413', '000002', 'FAJARARIAWAN', '21032014', '0', '2018-10-12 14:13:38'),
('000414', '000002', 'muflihah', 'LIHA', '0', '2018-10-12 14:17:30'),
('000415', '000002', 'CHOIRULMUSTAKIM', '100390', '0', '2018-10-12 14:35:23'),
('000416', '000002', 'ELVANSYAHJUANDAPUTRA', 'satria231197', '0', '2018-10-12 14:40:48'),
('000417', '000002', 'RIZAFIRMANSAH', 'BEBAS', '0', '2018-10-12 14:51:31'),
('000418', '000002', 'Abdullah Kholis', 'kholis123', 'f21958580369256324598153e4f1eed1', '2018-10-12 20:13:37'),
('000419', '000002', 'arlianaastutii', 'arliana278', '9189fd141fccb5c931d7766fb31ed120', '2018-10-12 20:36:21'),
('000420', '000002', 'Aditya saputra', '031196', '6ab9d5c341196ae09845f9f3b86162f1', '2018-10-12 20:36:48'),
('000421', '000002', 'yunitadwiwidyawati', '18061996', '0', '2018-10-15 08:18:35'),
('000422', '000002', 'Ravliadrian', 'ravli123', 'e7527a5fc88a915fa657c704893937e4', '2018-10-15 09:03:34'),
('000423', '000002', 'DevianaSatriani', '04102000', '0', '2018-10-15 09:25:38'),
('000424', '000002', 'DIANAINDAHKURNIASIH', 'b4ntal?', '601cd131af7201e76cf092b78dd63b77', '2018-10-15 09:27:55'),
('000668', '000002', 'MARIAHULFAH', 'maul110696', '0', '2018-11-14 09:58:11'),
('000426', '000002', 'AMBARWATI', 'JEMBAR', '0', '2018-10-15 09:32:32'),
('000427', '000002', 'gresniaarelafebriani', '26gresnia', '0', '2018-10-15 09:37:47'),
('000428', '000002', 'YosefChristianto', '12345678', '0', '2018-10-15 09:39:59'),
('000429', '000001', 'CentroPSD2018', 'centro123', 'a9a1d28ba70d61182b24c4349e1bcbdb', '2018-10-15 09:41:23'),
('000430', '000002', 'rahmawatipp', 'rohili0106', '0', '2018-10-15 09:58:31'),
('000436', '000002', 'ANNISARAHAYUAGUSTIN', 'geminiajah', '0', '2018-10-15 10:44:40'),
('000432', '000002', 'putribriwindari', 'putri123', '0', '2018-10-15 10:04:35'),
('000433', '000002', 'DIMASRIZKYSEFIANO', 'DIMAS123', '0', '2018-10-15 10:13:51'),
('000434', '000002', 'hanakhairiahulfah', 'hana1807', '0', '2018-10-15 10:30:03'),
('000435', '000002', 'PutriSaadah', 'putriyeol', '0', '2018-10-15 10:35:27'),
('000438', '000002', 'SUSISUPIANAH', 'SUPIANAH', 'fa376df107db72513534462f4b78ee49', '2018-10-15 10:58:29'),
('000439', '000002', 'tabithaaulia', 'aulia06', 'dacbfc5ac3524ed4a2a7c0e6862f0128', '2018-10-15 11:04:47'),
('000440', '000002', 'selawati', 'sela311000', '1ef57483c26b4849017476437d2228e9', '2018-10-15 11:07:11'),
('000441', '000002', 'AHMADKUSTORO', 'TOROGANTENG', '0', '2018-10-15 11:07:23'),
('000442', '000002', 'MuhamadHadiWijaya', 'hadi1201', '20ec6633ff13149222d87a8351c62b9c', '2018-10-15 11:09:16'),
('000446', '000002', 'BRIANCHRISNAYOESTION', 'CIANJUR2017', '0', '2018-10-15 11:23:51'),
('000443', '000002', 'Angky Prasetya', 'prasetya123', 'dfb10d8f0ba520d62fd7c4235835a8bf', '2018-10-15 11:09:51'),
('000444', '000002', 'nurulfauziah', 'nurul123', '3de0c637cb5392611014db1c8c7f09cb', '2018-10-15 11:10:26'),
('000445', '000002', 'deskadeastiana', 'deskadea', '5a6a010fe59e844440657b511b36eb28', '2018-10-15 11:11:30'),
('000474', '000002', 'azwinmaulana', 'hitachi28', '0', '2018-10-17 13:32:31'),
('000447', '000002', 'Galang ramadhan', 'galang1234', '2c0df0a4cacb9c0edb5c6ec455fd3571', '2018-10-15 11:31:46'),
('000448', '000002', 'GYSELLARAHMAAMELIYA', 'GYSELLA25', '0', '2018-10-15 11:37:01'),
('000449', '000002', 'IsmaliaRahayu', 'Apriaji26', '0', '2018-10-15 11:40:02'),
('000471', '000002', 'BimaAnandaGustian', 'kerenbgt17', '0', '2018-10-16 13:31:36'),
('000450', '000002', 'dedijuhendi', '280291', '0', '2018-10-15 11:44:40'),
('000451', '000002', 'Vinnysbr', 'vsbr16.', '0', '2018-10-15 11:48:10'),
('000452', '000002', 'Farhafithriya', 'KIMHYERA', '0', '2018-10-15 13:32:47'),
('000453', '000002', 'MUHAMADFAJAR', '12345', '0', '2018-10-15 13:35:48'),
('000454', '000002', 'Ahmad Rifai', 'epenk313', '0', '2018-10-15 13:39:35'),
('000455', '000001', 'csfdepok', 'Csf2010', '0', '2018-10-15 14:09:39'),
('000456', '000002', 'ROSITA', '2512', '0', '2018-10-15 14:32:26'),
('000457', '000002', 'GELIESPUSPITARAHMA', 'GEPURA14', '0', '2018-10-15 15:03:11'),
('000458', '000002', 'RAISYA MIFTAHUL ARZA', 'rma200999', '0', '2018-10-16 06:45:54'),
('000459', '000002', 'desirahma', 'desirahma', 'cf919e29a552be4e738b8ef69d917d76', '2018-10-16 08:22:49'),
('000460', '000002', 'faridahandayani', 'mrafahaziq', '0', '2018-10-16 08:52:35'),
('000461', '000002', 'Andrian', 'Sadigo', '0', '2018-10-16 09:00:42'),
('000462', '000002', 'YULIADWIASTUTI', 'sebelas', 'd45f76c0660320d06a34ace6dc79a241', '2018-10-16 09:03:03'),
('000463', '000002', 'agungsbw', 'agungsbw', '0', '2018-10-16 09:17:46'),
('000464', '000002', 'muhamadzainal', '7415263ka', '0', '2018-10-16 09:31:37'),
('000465', '000002', 'PUPUMASPUPAH', 'HASNA', '0', '2018-10-16 09:38:42'),
('000466', '000002', 'ADITYARMADJID', 'ADITYAR123', '0', '2018-10-16 09:48:51'),
('000467', '000002', 'DWISETIAWAN', 'Bulakpacing123', '0', '2018-10-16 09:55:07'),
('000468', '000002', 'KOKOMWARIHINDRIASTUT', 'KOKOM1996', '0', '2018-10-16 11:01:03'),
('000469', '000002', 'Naufalrizki', 'naufal0021', '0', '2018-10-16 11:23:09'),
('000470', '000002', 'NINDYGUSTIANIHADIAR', 'zalika', '0', '2018-10-16 11:28:15'),
('000472', '000002', 'Risasekarfiarsi', '1237kali', '0', '2018-10-17 07:27:59'),
('000473', '000002', 'Adam fahruzi', 'kambing21', '0', '2018-10-17 08:03:31'),
('000475', '000002', 'indranustofa92', '021823', '0', '2018-10-17 13:34:14'),
('000476', '000002', 'BAYUSUSENO', 'SUKSES2018', '0', '2018-10-17 13:55:30'),
('000477', '000002', 'Bimoekalaksono', 'ak1bimo', '0', '2018-10-18 08:31:32'),
('000478', '000002', 'shintabella', '12345678', '0', '2018-10-18 08:42:40'),
('000479', '000002', 'adammaulana', 'adam473', '0', '2018-10-18 08:45:52'),
('000480', '000002', 'iisismail', '290994', '0', '2018-10-18 09:20:05'),
('000481', '000002', 'HardiWijaya', 'rossawijaya18', '0', '2018-10-18 09:38:05'),
('000482', '000002', 'Desta', '1KE100', '0', '2018-10-18 09:52:00'),
('000483', '000002', 'ADLIIKRAM', 'abcD0104', '0', '2018-10-18 10:29:38'),
('000484', '000002', 'NABILAHAPRILIAPUTRI', 'NABILAH123', '0', '2018-10-18 13:48:11'),
('000485', '000002', 'FITRI', '15011997', '0', '2018-10-18 14:13:23'),
('000486', '000002', 'NURISLA', 'deradep378', '0', '2018-10-18 14:49:11'),
('000487', '000001', 'tc_gadog', 'fortuna123456789', '0', '2018-10-19 08:07:33'),
('000488', '000002', 'frediwiranata', 'belhomamen200194', '0', '2018-10-19 08:26:40'),
('000489', '000002', 'Utamihandayani', 'sampit07', '0', '2018-10-19 08:34:16'),
('000490', '000002', 'serajulianti', 'sera1234', '0', '2018-10-19 09:37:28'),
('000491', '000002', 'suciamaliafiddini', 'suciamalia1', '0', '2018-10-19 09:49:21'),
('000492', '000002', 'panji', 'panji1989', '0', '2018-10-19 11:15:02'),
('000493', '000002', 'nurulizzahtulungi', 'nurulizzahtulungi', '0', '2018-10-19 11:26:18'),
('000494', '000002', 'iisstii', 'allahayahmama', '0', '2018-10-19 14:40:00'),
('000495', '000002', 'PRAITNO', 'karina', '0', '2018-10-19 15:49:59'),
('000496', '000002', 'EVAYULYANIHARYADI', '12345678', '0', '2018-10-22 08:20:23'),
('000497', '000002', 'aidhamillatiazizah', 'pas5word123', '0', '2018-10-22 08:20:38'),
('000498', '000002', 'METANAZELINA', '22091997', '0', '2018-10-22 08:32:38'),
('000499', '000002', 'NGAMIATUN', 'IMANSYAH', '0', '2018-10-22 09:41:20'),
('000500', '000002', 'LOLYSEPSIODARMA', '140407P', '0', '2018-10-22 09:43:59'),
('000501', '000002', 'ZILLYHABIB', 'HABIBZILLY', '0', '2018-10-22 09:59:38'),
('000502', '000002', 'MUHRAMDHANJUANDA', 'JUANDA120606', '0', '2018-10-22 10:14:50'),
('000503', '000002', 'FITRIPUNDHIANA', '18JANUARI99', '0', '2018-10-22 10:18:02'),
('000504', '000002', 'NURULHANIFAHHASIBUAN', 'HASIBUAN', '0', '2018-10-22 10:27:48'),
('000505', '000002', 'DavaTatakuni', 'davatatakuni09', '0', '2018-10-22 10:28:06'),
('000506', '000002', 'ANDYKAWAHYUNUGROHO', 'PILOTAIRBUSA380', '0', '2018-10-22 10:36:34'),
('000507', '000002', 'megihariyanto', '021562', '0', '2018-10-22 10:41:19'),
('000508', '000002', 'ANDIPRIANTOSIDIK', 'ANDYMJM30', '0', '2018-10-22 10:49:05'),
('000509', '000002', 'LENIMARYANI', 'loveayah', '0', '2018-10-22 11:48:15'),
('000510', '000002', 'LiliPaldaNarti', 'Lilipaldanarti12', '0', '2018-10-22 13:23:21'),
('000511', '000002', 'SULVIKHAIRANI', 'IPVY2012', '0', '2018-10-22 13:23:38'),
('000512', '000002', 'FersyaHandri', 'februari15', '0', '2018-10-22 13:34:59'),
('000513', '000002', 'fadlynf27', 'bogelmaster27', '0', '2018-10-22 14:01:23'),
('000514', '000002', 'NurAini02', 'a1i2n3i45', '0', '2018-10-22 15:09:05'),
('000515', '000002', 'ShellaNoerFikriYanti', 'ochella9192', '0', '2018-10-22 15:09:21'),
('000546', '000002', 'asmaranipuspasari', '310189', '0', '2018-10-29 09:39:34'),
('000516', '000002', 'AsmaraAdang', 'adang', '0', '2018-10-23 08:35:29'),
('000517', '000002', 'AdangAsmara', 'asmara', '0', '2018-10-23 08:35:47'),
('000518', '000002', 'Sutrisnalidiyanto', 'sutrisna22', '0', '2018-10-23 09:40:46'),
('000519', '000002', 'alireza', '123456', '0', '2018-10-23 10:16:02'),
('000520', '000002', 'alizahalvist', 'cintakamu', '8409bc37b47ab7625f20bfba787c0b5b', '2018-10-23 10:25:41'),
('000521', '000002', 'adriantarja', '415078', '0', '2018-10-23 10:36:25'),
('000522', '000002', 'Bellanofrita', 'nofrita', '0', '2018-10-23 10:39:16'),
('000523', '000002', 'YUSUFANDRYANTO', '27JULI2000', '0', '2018-10-23 11:00:11'),
('000524', '000002', 'nadhira', 'kazna041099', '0', '2018-10-23 11:52:48'),
('000526', '000002', 'Ibnuhadik', 'Ibnuhadik', '0', '2018-10-23 14:50:02'),
('000527', '000002', 'NENIKUSUMADEWI', '333333', '68fd928a2f0e3adf02591cc79154df4b', '2018-10-24 10:02:50'),
('000528', '000002', 'purnawan', 'kuningan', '0', '2018-10-24 10:03:06'),
('000529', '000002', 'RismaDamaiYanti', 'risma17', '0', '2018-10-24 10:03:28'),
('000530', '000002', 'sudrazadcahyadiprata', 'sudrazad', '0', '2018-10-24 11:25:25'),
('000531', '000002', 'ahmadfaisal', '16februari', '0', '2018-10-24 11:32:04'),
('000532', '000002', 'JAYANTIFAUZIAH', '09feb1995', '0', '2018-10-24 13:38:12'),
('000533', '000002', 'mardiantiiftia', 'dian', '0', '2018-10-25 08:43:38'),
('000534', '000002', 'Ikaayu', 'antasena08', '0', '2018-10-25 11:37:23'),
('000535', '000002', 'kanindarosalina', 'kaninda97', '0', '2018-10-25 11:37:52'),
('000536', '000002', 'Minarsimanjuntak', 'anggy6692', '0', '2018-10-25 11:49:52'),
('000537', '000002', 'FERDIANSYAH', 'FERDI1717', '0', '2018-10-26 09:38:38'),
('000542', '000002', 'suparman', '07051985', '0', '2018-10-26 10:15:52'),
('000538', '000002', 'FERIZALRAMADHANB', 'rijalnjal123', '0', '2018-10-26 09:40:48'),
('000539', '000002', 'ReniPriatini', 'solihin', '0', '2018-10-26 09:41:58'),
('000540', '000002', 'DedeRohmani', 'dederohmani97', '0', '2018-10-26 09:42:19'),
('000541', '000002', 'WEGISEPTIAN', '160997', '0', '2018-10-26 09:42:40'),
('000543', '000002', 'febriansyah', 'tantra0199', '0', '2018-10-26 13:46:52'),
('000545', '000002', 'Tes3', '222111', '0', '2018-10-27 05:50:47'),
('000547', '000002', 'tintanmelani', 'comatecomunity', '0', '2018-10-29 09:56:22'),
('000548', '000002', 'AFRANISSA', 'cHRISTINE24', '0', '2018-10-29 10:19:33'),
('000549', '000002', 'utarifitriyani', 'utari1905', '0', '2018-10-29 10:50:20'),
('000550', '000002', 'adziefarizzal', 'adziefarizzal', '0', '2018-10-29 10:57:50'),
('000551', '000002', 'Annisanoviarosmayant', 'gelapterangbgt', '0', '2018-10-29 11:12:12'),
('000552', '000002', 'DedeFeraMardiana', 'choifera', '0', '2018-10-29 11:59:18'),
('000553', '000002', 'RuliRohdiana', 'RULI', '0', '2018-10-29 12:13:44'),
('000554', '000002', 'DENAKURNIAWAN', 'DENAKURNIAWAN', '0', '2018-10-29 13:41:24'),
('000555', '000002', 'AHMADMAULANA', 'maol29', '0', '2018-10-29 13:52:56'),
('000556', '000002', 'MUHAMADYAHYA', 'YAHYA789', '0', '2018-10-29 14:07:38'),
('000557', '000002', 'SANDIWAHYUDI', 'SANDI', '0', '2018-10-30 09:21:42'),
('000558', '000002', 'ahmadmaulanayusuf', 'Cupaws11', '0', '2018-10-30 10:11:17'),
('000559', '000002', 'IslahMiladi', 'farhanazmi', '0', '2018-10-30 10:45:18'),
('000560', '000002', 'sifamulyanah', 'sifamulyanah', '0', '2018-10-30 13:44:37'),
('000561', '000002', 'PALALWASISO', '26041973', '0', '2018-10-30 14:32:10'),
('000562', '000002', 'intanpermatasari', '020994', '0', '2018-10-30 15:22:24'),
('000563', '000002', 'RIFKYALFASANAHFIRDAU', '310393', '0', '2018-10-31 08:18:30'),
('000564', '000002', 'NOVIYANTI', '12345', '0', '2018-10-31 11:14:14'),
('000565', '000002', 'Desi1994', '241294', '0', '2018-10-31 11:20:40'),
('000566', '000002', 'KHAIRUNNISAFEBRIANTY', 'VFEBRY79', 'f5d249ee581ad021f1eb6832b172ae70', '2018-10-31 11:25:46'),
('000567', '000002', 'ahmadsopian', '123456789', '0', '2018-10-31 13:36:11'),
('000568', '000002', 'miftachulfajri16', 'xtmzmxxmz123', '0', '2018-10-31 14:17:56'),
('000569', '000002', 'miftachulfauziachmad', '191817', '0', '2018-10-31 14:22:20'),
('000570', '000002', 'EkaCandraApriansyah', 'jogjaindah2018', '0', '2018-11-01 08:52:27'),
('000571', '000002', 'SRISULISTIYOWATI', 'BILQISSULIS', '0', '2018-11-01 10:30:18'),
('000572', '000002', 'NURCAHAYATI', 'sayangkamu13', '0', '2018-11-01 10:49:50'),
('000573', '000002', 'herysetiawan', 'hery461997', '0', '2018-11-01 11:30:21'),
('000574', '000002', 'indahwulandari', 'indah2505', '0', '2018-11-01 11:36:00'),
('000575', '000002', 'SISKAERDIANNOVI', '@SISKA157', '0', '2018-11-01 11:40:39'),
('000576', '000002', 'Dedisinurat', 'sitoluama', '0', '2018-11-01 11:43:40'),
('000577', '000002', 'yusufsdewa', 'SadewA1919', '0', '2018-11-01 11:48:37'),
('000578', '000002', 'auliaanura', 'juni27ya', '0', '2018-11-01 11:56:15'),
('000579', '000002', 'antaginting', '4a7lPECTOR', '0', '2018-11-01 11:57:29'),
('000580', '000002', 'ismamustajaf', 'swad12345', '0', '2018-11-01 12:09:40'),
('000582', '000002', 'Rahayufebriyanti', '272727', '0', '2018-11-01 12:22:12'),
('000583', '000002', 'lailalidia28', 'lailacantik', '0', '2018-11-01 13:26:20'),
('000584', '000002', 'IdaSuryani31', 'sandix404', '0', '2018-11-01 13:33:24'),
('000585', '000002', 'liahasanah', 'lyakep', '0', '2018-11-01 13:43:27'),
('000586', '000002', 'JunaidiAbdillah', 'abdillahrajawali21', '0', '2018-11-01 13:45:12'),
('000587', '000002', 'serlymelindaagistin', 'serly31', '0', '2018-11-01 14:29:40'),
('000588', '000002', 'AnisaHusnul', 'anisa123', '0', '2018-11-02 08:09:20'),
('000589', '000002', 'RizkaAulia', 's3lalus3nang', '0', '2018-11-02 09:06:26'),
('000590', '000002', 'denynuriman', '5171569328', '0', '2018-11-02 10:45:21'),
('000591', '000002', 'AhmadKhubazi', 'mersart2015', '4e430e2714a8f7e1108e1d1dbf60058a', '2018-11-02 10:59:39'),
('000592', '000002', 'sitikholilah', 'sitikholilah26', '0', '2018-11-02 11:22:02'),
('000593', '000002', 'nikenika', 'niken0409', '0', '2018-11-02 11:26:28'),
('000594', '000002', 'novitawulandari', 'novita02', '0', '2018-11-02 11:34:15'),
('000595', '000002', 'NaylaNabilah', 'nayla123', '0', '2018-11-02 11:36:45'),
('000596', '000002', 'Ramadhaniutami', 'dewiewol', '0', '2018-11-02 13:46:20'),
('000597', '000002', 'hesty', 'hs2009', '0', '2018-11-05 08:41:18'),
('000598', '000002', 'DANINUGROHO', 'DANI123', '0', '2018-11-05 09:10:15'),
('000599', '000002', 'vianrizky1', 'awesd123**', '8da588ce68561bf8bb74dd9e4d1a835d', '2018-11-05 09:43:10'),
('000600', '000002', 'DWIARDIANSYAH', 'DWI2103', '0', '2018-11-05 10:02:53'),
('000601', '000002', 'VANNYNURSABILLAH', 'SABILLAH13', '0', '2018-11-05 10:12:48'),
('000602', '000002', 'AchmadKhulaifi', '059666', '0', '2018-11-05 11:08:35'),
('000603', '000002', 'AjiPurnomo', '310399', '0', '2018-11-05 11:13:47'),
('000604', '000002', 'MELAWATI', 'MELAWATI123', '0', '2018-11-05 12:02:16'),
('000605', '000002', 'DenyMaulanaSaputra', 'fathir', '0', '2018-11-05 12:13:36'),
('000606', '000002', 'dewisrisupriyatun', 'dewaprayoga310', '0', '2018-11-05 13:37:26'),
('000607', '000002', 'Nurasiah', 'nurasiah2601', '0', '2018-11-05 14:19:04'),
('000608', '000002', 'farisirfanramadhan', 'farisirfan1297', '0', '2018-11-06 09:09:23'),
('000609', '000002', 'Damar_Agatra10', '10052000', '0', '2018-11-06 09:13:59'),
('000610', '000002', 'RagaRaharjo', 'm4t4h4r1', '0', '2018-11-06 09:24:35'),
('000611', '000002', 'anisahikmaya', 'scorpio28', '0', '2018-11-06 10:07:17'),
('000612', '000002', 'Joyramadhangalih', 'joyrama1998', '0', '2018-11-06 10:19:28'),
('000613', '000002', 'muhamadfajar182', '140493', '0', '2018-11-06 10:35:59'),
('000614', '000002', 'MuhammadSoehairy', 'haryrebel', '0', '2018-11-06 10:45:48'),
('000615', '000002', 'irmaannaeni', 'bidanirma', '0', '2018-11-06 11:25:39'),
('000616', '000002', 'khiarunnisa', '27oktober98', '0', '2018-11-06 13:31:01'),
('000617', '000002', 'DESIROSMIYATI', 'desay123', '0', '2018-11-06 13:37:47'),
('000618', '000002', 'muhamadiqbal', 'balebal2424', '0', '2018-11-06 13:48:08'),
('000619', '000002', 'arie', 'qwerty137', '0', '2018-11-07 10:27:46'),
('000620', '000002', 'sarip', '04021965', '0', '2018-11-07 10:33:51'),
('000621', '000002', 'RikiGunawan', '1234', '0', '2018-11-07 10:41:58'),
('000622', '000002', 'Bagusajisuwito', '8675716', '0', '2018-11-07 10:51:55'),
('000623', '000002', 'Novianti', 'narags16', '0', '2018-11-07 11:21:12'),
('000624', '000002', 'ASTIROSA', '268268', '0', '2018-11-07 13:37:18'),
('000625', '000002', 'Trismaputrihandayni', 'parkjimin', '0', '2018-11-07 14:15:09'),
('000626', '000002', 'MONIKASARDI', '12MONIKA', '0', '2018-11-07 14:21:47'),
('000627', '000002', 'KOMARUDIN', 'KOMARUDIN', '0', '2018-11-07 15:26:45'),
('000628', '000002', 'DWINURFITRIANA', 'CANTIK98', 'aa65dafcacd8ba86fb10eb65b3daf55c', '2018-11-08 09:04:30'),
('000629', '000002', 'CYNTHIALESTARIS', 'Abrahamsihombing', '0', '2018-11-08 09:35:42'),
('000630', '000002', 'NURKHOLIFAH', 'NURKHOLIFAH', '0', '2018-11-08 10:15:23'),
('000631', '000002', 'MuhamadFikriKurniawa', 'fikri123', '0', '2018-11-08 11:31:05'),
('000632', '000002', 'anisjelita', '262626', '0', '2018-11-08 11:47:17'),
('000633', '000002', 'adefirmansyah', 'ade12345', '0', '2018-11-08 11:58:32'),
('000634', '000002', 'nelawatisagitha', '060196', '0', '2018-11-08 12:07:30'),
('000635', '000002', 'NurAfifahAnzani', 'nurafifah', '0', '2018-11-08 12:12:50'),
('000636', '000002', 'febiokaerisandi', 'febiokaerisandi', 'fef11ef19a85edc304888c5e7c9b28c7', '2018-11-08 14:53:45'),
('000638', '000002', 'AyuandiEnggalPutri', 'enggal2702', '7059d768adcfc0ede0db097741ff2f0c', '2018-11-09 09:44:17'),
('000637', '000002', 'luislatupapua', '081319324690', '0', '2018-11-09 09:29:53'),
('000639', '000002', 'Anastasia', '180197', '3de2a05cef7af7579583cb6c1db3a73c', '2018-11-09 09:53:25'),
('000640', '000002', 'rusmana', '8APRIL1996', '0', '2018-11-09 09:56:20'),
('000645', '000002', 'tatiramadhan22', 'ramadhan12', '0', '2018-11-12 09:33:51'),
('000641', '000002', 'HENDRYRAJAB', 'rajabhendry280190', '0', '2018-11-09 11:01:38'),
('000642', '000002', 'kamadhira', 'chisukasa', '0', '2018-11-09 11:29:12'),
('000643', '000002', 'intanifajar', 'intani19101987', '031fe762e1c26fd501ecfa59ec834527', '2018-11-09 13:49:16'),
('000644', '000002', 'MUHAMMADREGINALDAGAT', 'GE3NT7Q3R3N', '0', '2018-11-09 13:49:36'),
('000646', '000002', 'vidiagustriati22', 'vivi123', '0', '2018-11-12 09:42:45'),
('000647', '000002', 'ERLINA', 'HAINI69', '0', '2018-11-12 09:57:26'),
('000649', '000002', 'firmanadesaputro', 'ade12345', '0', '2018-11-12 10:20:50'),
('000648', '000002', 'maulanafirizki', 'maulana', '0', '2018-11-12 10:00:56'),
('000650', '000002', 'Putracahayaramadhan', 'putra123', '0', '2018-11-12 10:28:46'),
('000651', '000002', 'APRILIANI', 'Stipdanpensil17', '0', '2018-11-12 10:32:15'),
('000652', '000002', 'SLAMETSUPANDI', 'SLAMETCIUS', '0', '2018-11-12 10:42:20'),
('000653', '000002', 'AMBIANIAINNIA', 'AINNIA65', '6d64cc6672d5c4e1196611ed25e44da9', '2018-11-12 11:33:45'),
('000654', '000002', 'nienkurniautari', 'nin12345', '0', '2018-11-12 11:41:27'),
('000655', '000002', 'RAHMAWATY', 'RAHMAWATY', '0', '2018-11-12 11:45:10'),
('000656', '000002', 'ahmadpanjigumilang', 'panji98', '0', '2018-11-12 11:50:36'),
('000657', '000002', 'PUTRIDHOHAYAJAMILAH', '29041997', '0', '2018-11-12 11:58:10'),
('000658', '000002', 'FIRASAFITRI', 'Asdfghjkl1234', '0', '2018-11-12 13:52:08'),
('000659', '000002', 'Khamozisokhigulo', 'khamo', '0', '2018-11-12 14:10:45'),
('000660', '000002', 'Ester20', 'shane27', '0', '2018-11-12 15:13:33'),
('000661', '000002', 'AGUS', 'LAMAFA', '0', '2018-11-13 09:41:23'),
('000662', '000002', 'firmanmaulana', 'intiv1562', '0', '2018-11-13 09:53:58'),
('000663', '000002', 'Dennydestian', 'pancakawan', '0', '2018-11-13 10:05:43'),
('000664', '000002', 'CICIHKAROLINA', 'CICIH123', '0', '2018-11-13 10:07:30'),
('000665', '000002', 'NENCINAINGGOLAN', 'NENCI', '0', '2018-11-13 10:15:52'),
('000666', '000002', 'ROBIANSYAH', '11052012', '0', '2018-11-13 10:19:12'),
('000667', '000002', 'MUHAMMADIRFAN', 'MUHAMMADIRFAN', '0', '2018-11-13 11:59:53'),
('000669', '000002', 'FAJARANDRIANTO', 'FAJAR041296', '0', '2018-11-15 10:22:26'),
('000670', '000002', 'AbduRahman', 'rahman1310', '0', '2018-11-15 10:38:37'),
('000671', '000002', 'FAHRULSIDIK', 'THEWARRIOR05', '6c12cf20516ad2872be39dc0fa063a98', '2018-11-15 11:00:20'),
('000672', '000002', 'RIOSANJAYA', 'rIOSANJAYA123', '0', '2018-11-15 13:56:07'),
('000673', '000002', 'SiskaYuniza', '123456qw@', '0', '2018-11-15 14:55:33'),
('000674', '000002', 'Fristmia', 'JonathanMia2014', '0', '2018-11-16 08:44:37'),
('000675', '000002', 'Angel', 'Angelo10', '0', '2018-11-16 08:44:41'),
('000676', '000002', 'Samanhudi', 'GJM934615278', '0', '2018-11-16 08:44:55'),
('000677', '000002', 'Dininomiya', '190403', '0', '2018-11-16 08:45:23'),
('000678', '000002', 'LEOARIYANTO', '060996', '0', '2018-11-16 08:55:13'),
('000679', '000002', 'TISUNNURMAIS', 'CAPEDEH', '0', '2018-11-16 09:04:17'),
('000680', '000002', 'septinurazizah', 'Alhamdulillah24', '0', '2018-11-16 09:41:58'),
('000681', '000002', 'GABRIELARPINDOTANJUN', 'JUNGRARPI990509', '0', '2018-11-16 10:53:50'),
('000682', '000002', 'agungperiatna', 'ganesa1421', '0', '2018-11-19 09:52:57'),
('000683', '000002', 'findonashaurladevi', '171299', '0', '2018-11-19 10:01:24'),
('000684', '000002', 'SupriatinAuliah', 'orangsukses', '0', '2018-11-19 10:06:11'),
('000685', '000002', 'MUHAMMADNOVYANARDI', 'ELDAKUMA123', '0', '2018-11-19 10:12:07'),
('000686', '000002', 'RIZKYPRAMITASARI', 'mM060214', '0', '2018-11-19 10:18:22'),
('000687', '000002', 'MUHAMADHANAFIASNAN', 'P4SSJALANG', '0', '2018-11-19 10:52:35'),
('000688', '000002', 'arieandika', 'bagol123', '0', '2018-11-19 11:04:32'),
('000689', '000002', 'PAHRIHUSAENI', 'PAHRI0603', '0', '2018-11-19 11:06:54'),
('000690', '000002', 'ABDURRHMAN', 'ABDURRAHMAN325', '0', '2018-11-19 11:13:39'),
('000691', '000002', 'NURLILAHSAHARANI', '28062000', '0', '2018-11-19 11:43:29'),
('000692', '000002', 'MOCHAMADNAUFALPRATAM', 'OPANG7213', '0', '2018-11-19 13:33:16'),
('000693', '000002', 'moch.nanasuryana', 'nanasa', '0', '2018-11-19 13:37:21'),
('000694', '000002', 'thazalienputuha', 'lienputuha28', '0', '2018-11-19 13:42:09'),
('000695', '000002', 'veronikahasibuan', 'vero1234', '0', '2018-11-19 13:48:09'),
('000696', '000002', 'TriayunitaSaragih', '160696', '0', '2018-11-19 13:53:02'),
('000697', '000002', 'ADELIANTI', 'KELUARGA', '0', '2018-11-19 13:57:31'),
('000698', '000002', 'muhamadnursidik', '198198', '0', '2018-11-19 15:05:25'),
('000699', '000002', 'besil', 'sisilia01', '0', '2018-11-19 15:15:08'),
('000700', '000002', 'firdayantinursani', 'firda18', '0', '2018-11-21 08:34:41'),
('000701', '000002', 'rahmadalamsahsitompu', '123456', '0', '2018-11-21 08:41:24'),
('000702', '000002', 'MFIKRISYAWAL', 'MFIKRIS', '0', '2018-11-21 08:52:00'),
('000703', '000002', 'MochammadDaniP', 'ronaldany7', '0', '2018-11-21 09:12:33'),
('000704', '000002', 'SITISOLIHA', '250285', '0', '2018-11-21 09:18:35'),
('000705', '000002', 'farhanmutafanninfadl', 'farhan123', '0', '2018-11-21 09:21:18'),
('000706', '000002', 'FERIFIRMANSYAH', 'CHESEAFC', '0', '2018-11-21 09:26:53'),
('000707', '000002', 'sujudtriwibowo', '1999sujud', '0', '2018-11-21 09:30:58'),
('000708', '000002', 'IRMAJUNIAR', 'IRMA123', '0', '2018-11-21 09:39:12'),
('000709', '000002', 'rizkiridowidodo', 'rizkirw30', '0', '2018-11-21 09:42:44'),
('000710', '000002', 'fijaralifdilvianto', 'sendaljepit66', '0', '2018-11-21 09:46:50'),
('000711', '000002', 'OJISAPUTRATANJUNG', '25JANUARY', '0', '2018-11-21 09:50:12');
INSERT INTO `msuser` (`IDUser`, `IDJenisUser`, `Username`, `Password`, `session_id`, `RegisterDate`) VALUES
('000712', '000002', 'REVOMAYSAVANO', '20NOVEMBER', '0', '2018-11-21 09:55:38'),
('000713', '000002', 'DENITATRIWINDASARI', 'DENITA1606', '0', '2018-11-21 10:12:03'),
('000714', '000002', 'DESIAROFAH', '647415', '0', '2018-11-21 10:18:26'),
('000720', '000002', 'rohayanih', '123456789', '0', '2018-11-21 10:51:14'),
('000716', '000002', 'ARDINURCAHYANTO', 'ARDI201099', '0', '2018-11-21 10:25:38'),
('000717', '000002', 'MUHAMMADIQBAL', '30051999', '0', '2018-11-21 10:35:34'),
('000718', '000002', 'Asnasarifah', 'asnasarifah', '0', '2018-11-21 10:37:27'),
('000719', '000002', 'JULIALARASATI', 'JULIA17', '0', '2018-11-21 10:48:11'),
('000721', '000002', 'kanisanuraini', '54321', '0', '2018-11-21 10:53:51'),
('000722', '000002', 'Apihseptiawan', 'gayungsuper12', '0', '2018-11-21 10:57:17'),
('000723', '000002', 'Shellawati', 'shella', '0', '2018-11-21 11:16:17'),
('000724', '000002', 'CLARAFISKIANI', 'abcd123', '0', '2018-11-21 11:18:19'),
('000725', '000002', 'RIVALDHOALIFFIAN', '24062000', '0', '2018-11-21 11:22:04'),
('000726', '000002', 'dhikaafrianputra', 'realmadrid1902', '0', '2018-11-21 11:47:23'),
('000727', '000002', 'MILLAJUWITA', 'MILLA23', '0', '2018-11-21 11:53:05'),
('000728', '000002', 'gittadamaiyanti', 'gitta15d', '0', '2018-11-21 13:37:05'),
('000729', '000002', 'MiaAudiRostantika', 'virginity23', '0', '2018-11-21 13:48:17'),
('000730', '000002', 'AriaNugrahaSaputra', '5oktober2000', '0', '2018-11-21 13:52:32'),
('000731', '000002', 'INAWATI', 'inawati20', '0', '2018-11-21 14:17:38'),
('000732', '000002', 'ikapramestia', 'qwertymini30', '13080dc08be0f35ca8eaf8313f4415ab', '2018-11-21 14:47:19'),
('000733', '000002', 'FEMBRI', '555556', 'ccdd5ed3a8680461cde56a20fae6e73c', '2018-11-21 14:48:04'),
('000734', '000002', 'Mfyusuf13', '13agustus', '7537915211644d33b84f548b077b35a0', '2018-11-21 14:48:42'),
('000735', '000002', 'Rifqiilham_', 'assegaf1', '708feb4b3ba70fcc710786545afd7d4b', '2018-11-21 14:50:04'),
('000843', '000002', 'NUGROHOCAHYOPURWANTO', 'KUMAKAN2', '0', '2018-12-06 13:49:19'),
('000736', '000002', 'SITIMASLAHAH', 'irawan', '0', '2018-11-22 12:00:38'),
('000737', '000002', 'windyzahara', '1802', '0', '2018-11-22 13:49:46'),
('000738', '000002', 'ANDANSISWANTARI', '123kudoedogawamouri.', '0', '2018-11-22 14:15:09'),
('000739', '000002', 'iskandar', '10011999', '0', '2018-11-23 08:52:08'),
('000740', '000002', 'MULYANA', 'MULIANA123', '0', '2018-11-23 09:25:04'),
('000741', '000002', 'revinfajar', 'password05', '0', '2018-11-23 10:32:18'),
('000742', '000002', 'FLORENCIAMARIASIWY', '011098', '0', '2018-11-23 10:35:17'),
('000743', '000002', 'sitisuwitri', 'witriw3', '0', '2018-11-23 10:44:01'),
('000744', '000002', 'raul', 'RAUL2018', '201995d4295735dc036753d9267a185c', '2018-11-23 11:09:58'),
('000745', '000002', 'innyrosdianaputriwar', 'sinwar', '0', '2018-11-23 13:55:22'),
('000746', '000002', 'AdeNitaYuniarti', 'adenita', '0', '2018-11-23 14:17:14'),
('000747', '000002', 'SirengMaulidyasPraka', 'dy0815143', '0', '2018-11-23 14:56:14'),
('000748', '000002', 'suciwidiati', 'suciwidiati', '0', '2018-11-26 08:47:36'),
('000749', '000002', 'bellanuzulufia16', '16011998', '0', '2018-11-26 09:27:50'),
('000750', '000002', 'IRWANMAULANA', '12345_IRWAN', '0', '2018-11-26 09:39:52'),
('000751', '000002', 'AbdulRisyad', 'AbdulRisyad', '0', '2018-11-26 09:53:05'),
('000752', '000002', 'pujinugrohoadi', 'adipn', '0', '2018-11-26 10:11:52'),
('000753', '000002', 'Masayuims', 'Latifah16', '0', '2018-11-26 10:24:36'),
('000754', '000002', 'RIDHOAGUNGSADEWO', '16121995', '0', '2018-11-26 10:46:48'),
('000755', '000002', 'ANGGITUTAMI', 'serahlodah', '0', '2018-11-26 10:57:07'),
('000756', '000002', 'RahmatSetianto', '17061991', '0', '2018-11-26 11:49:19'),
('000757', '000002', 'mutiamukhlisah14', 'Mutia1411', '0', '2018-11-26 15:01:16'),
('000758', '000002', 'PuspitaSari', 'kyuhyun1988', '0', '2018-11-27 08:28:52'),
('000759', '000002', 'ALMINIBACH', '5758', '0', '2018-11-27 09:57:54'),
('000760', '000002', 'DesiSetyowati', '07071212', '0', '2018-11-27 10:01:28'),
('000761', '000002', 'MUTIAHMURFIDAH', 'MUTIA123', '0', '2018-11-27 10:15:18'),
('000762', '000002', 'RUBIYANTI', 'AIRASYAFA', '0', '2018-11-27 10:22:43'),
('000763', '000002', 'RIFKAANASTASYAKULTSU', 'RIFKAAEHHAHA', '0', '2018-11-27 11:08:58'),
('000764', '000002', 'MUNAWIRFADLIAKBAR', 'TIPARPUSAT1231', '0', '2018-11-27 11:20:29'),
('000765', '000002', 'NOVIAAYUARYANTI', 'ARYANTI)$', '0', '2018-11-27 14:12:02'),
('000766', '000002', 'Zulfikaridris', '010795', '858419f3cdae8cec45217cb06363ff12', '2018-11-27 14:26:35'),
('000767', '000002', 'SITIAISYAHRANGKUTI', 'UBAY123456789', '0', '2018-11-27 14:26:55'),
('000768', '000002', 'armanmaulana', 'lupasandi123', '0', '2018-11-27 14:33:41'),
('000769', '000002', 'wahyufirmansyah', 'wahyu123', '0', '2018-11-28 08:30:15'),
('000770', '000002', 'Yudha', 'yudhalpmp', '0', '2018-11-28 09:06:22'),
('000771', '000002', 'Rullyhardiawan', 'candilung', '0', '2018-11-28 09:06:49'),
('000772', '000002', 'syamsul.bahri', 'bahribrs', '0', '2018-11-28 09:14:24'),
('000773', '000002', 'RIRIAGUSTRIANA', 'ARRAYSMD15', '0', '2018-11-28 09:33:04'),
('000774', '000002', 'Sitinurhamidah', 'mida1808', '0', '2018-11-28 10:31:20'),
('000775', '000002', 'ahmadzulviqarsyarif', 'berakdikali11', '0', '2018-11-28 10:35:13'),
('000776', '000002', 'KHOFIFAHFAUZICITRAPU', '311099', '0', '2018-11-28 11:01:20'),
('000777', '000002', 'KIKIPUTRI', '290996', '0', '2018-11-28 11:02:28'),
('000778', '000002', 'BLESSANDOPARLINDUNGA', 'HUTAGAOL234', '0', '2018-11-28 13:29:45'),
('000779', '000002', 'Ekosudarmanto', '123321e', '0', '2018-11-28 13:36:22'),
('000780', '000002', 'Aretakusumaningrum', 'kakareta18', '0', '2018-11-28 13:40:08'),
('000781', '000002', 'dheaintania', 'dhea', '0', '2018-11-28 13:45:00'),
('000782', '000002', 'tiraputriandini', 'tiraandinindut', '0', '2018-11-28 14:36:54'),
('000783', '000002', 'SANDYAKBAR', 'sandyakbar', '0', '2018-11-29 09:26:09'),
('000784', '000002', 'MaksumSumantri', 'Maksum', '0', '2018-11-29 09:44:32'),
('000785', '000002', 'Edijunaedi', '05011977', '0', '2018-11-29 09:48:35'),
('000786', '000002', 'ponimin', 'ponimin', '0', '2018-11-29 10:12:09'),
('000787', '000002', 'sarahjuniar', 'sarahjuniar', '0', '2018-11-29 11:57:30'),
('000788', '000002', 'NurulUswatunChasanah', 'gungun123456789', '0', '2018-11-29 13:43:48'),
('000789', '000002', 'NURULMUFIDAH', 'nurul1997', '0', '2018-11-29 13:43:55'),
('000790', '000002', 'ICHSANAHMADPRASETYO', 'SERUNTUL123', '06641bda4a70f3bc2abc1b17dfb94e84', '2018-11-29 13:57:13'),
('000791', '000002', 'paskauli', 'vitaminvitamin', '0', '2018-11-30 10:03:48'),
('000792', '000002', 'Gitaputikmediawati', 'putik', '0', '2018-11-30 15:02:27'),
('000793', '000002', 'Andirizalhasanudin', 'icalganteng123', '0', '2018-11-30 15:54:00'),
('000795', '000002', 'Jasmine Widyarta', 'Jasminewm06', '0', '2018-12-03 09:59:52'),
('000796', '000002', 'ALFATHURRIZQI', 'turtur123', '0', '2018-12-03 10:04:23'),
('000797', '000002', 'RUSLIN', 'WAWO4646', '0', '2018-12-03 10:46:34'),
('000798', '000002', 'ahmadfauzi', 'ahmadfauzi20', '0', '2018-12-03 10:50:01'),
('000799', '000002', 'AKBARMUTTAQIN', 'akbar210395', '0662a33f4530733ab83a2aa151d75b4e', '2018-12-03 11:19:43'),
('000800', '000002', 'NURMANZILAH', 'AZHARI', '0', '2018-12-03 11:41:20'),
('000801', '000002', 'ISNAINIHANIFAHHANUM', 'DEIS109', '0', '2018-12-03 13:36:47'),
('000802', '000002', 'AGUNGVICKYSAPUTRA', 'agung02', '0', '2018-12-03 13:41:47'),
('000803', '000002', 'Annisanurutami', 'annisanur25', '0', '2018-12-03 13:49:00'),
('000804', '000002', 'DeviApriliani', 'kicungmini', '0', '2018-12-03 13:55:05'),
('000805', '000002', 'DIPPOSHASOLOANSIHOTA', 'DIPPOS123', '0', '2018-12-03 14:08:04'),
('000806', '000002', 'FitriaRamadhani', 'Falconettes0612', '0', '2018-12-03 15:02:05'),
('000807', '000002', 'wahyuarimunandar', 'elsadewi', '472cf79b0915f4963d41c7931c891049', '2018-12-04 08:45:24'),
('000808', '000002', 'ALDIYANI', 'yanmar', '5ad27a02c8154c09a21c9ff6f5ecf632', '2018-12-04 08:50:04'),
('000809', '000002', 'MUHAMMADREZAFADHILA', 'imbatman', '0', '2018-12-04 10:13:33'),
('000810', '000002', 'agusardian', 'agus123', '0', '2018-12-04 10:33:23'),
('000811', '000002', 'AJIAPRIANSYAH', 'aji1234', '0', '2018-12-04 11:52:20'),
('000812', '000002', 'MEGAARIANTI', 'MEGACANTIK', '0', '2018-12-04 12:02:20'),
('000813', '000002', 'RIKYMAHENDRAPUTRA', 'RIKYMARMER2', '0', '2018-12-04 14:17:08'),
('000814', '000002', 'FEBRIIBRAHIM', 'DIMSUMINC24', '0', '2018-12-04 14:21:22'),
('000815', '000002', 'MUHAMMADANUGRAHFAUZI', '12345678', '0', '2018-12-04 14:42:17'),
('000816', '000002', 'SeraJunita', 'junita07', '0', '2018-12-05 09:02:50'),
('000817', '000002', 'muhammadyani', 'sampoerna16', '0', '2018-12-05 09:17:46'),
('000818', '000002', 'ANISAMAHARANI', 'fanisa123', '0', '2018-12-05 09:33:54'),
('000819', '000002', 'cicidwicahyani', 'cicidwic', '0', '2018-12-05 09:35:41'),
('000820', '000002', 'HabibillahZulfaNurRa', '26072000', '0', '2018-12-05 10:18:43'),
('000821', '000002', 'DithaAngraini', 'ditha1234', '0', '2018-12-05 10:21:03'),
('000822', '000002', 'syarifuddinsubarkaha', '02061998', '0', '2018-12-05 11:01:51'),
('000823', '000002', 'MiftahulJuanIsma', 'uyeah307', '0', '2018-12-05 11:04:58'),
('000824', '000002', 'juliheee', 'juliani379', '0', '2018-12-05 11:07:54'),
('000825', '000002', 'avisenailma', 'VISA9620', '0', '2018-12-05 12:50:54'),
('000826', '000002', 'merryrahma', 'merry160496', '0', '2018-12-05 12:53:24'),
('000827', '000002', 'Meiarusmawati', 'gataulupa', '0', '2018-12-05 13:02:46'),
('000828', '000002', 'CIKARAHMAH', 'SASUKE18', '0', '2018-12-05 13:04:30'),
('000829', '000002', 'irwansyah', 'primacell', '0', '2018-12-05 13:28:43'),
('000830', '000002', 'ALFRI', 'ONEPIECE', '0', '2018-12-05 14:13:05'),
('000831', '000002', 'TriRizkiYanti', 'jakartakota', '0', '2018-12-05 14:18:41'),
('000832', '000002', 'PutriAyuningMulya', 'turi7250', '0', '2018-12-05 14:48:13'),
('000833', '000002', 'Muhammadgilangfaujar', 'gilang31051998', '0', '2018-12-06 09:32:33'),
('000834', '000002', 'netiecanurdiansari', 'NETIECA123', '0', '2018-12-06 10:45:31'),
('000835', '000002', 'AndreasDRM', 'deathadder1', '0', '2018-12-06 11:17:51'),
('000836', '000002', 'REYNAEKAPUTRIMANAN', 'REYNAEK', '0', '2018-12-06 11:19:37'),
('000837', '000002', 'IrinneSriPratiwi', '122113', '0', '2018-12-06 11:30:00'),
('000838', '000002', 'FarisSahrin', 'bce9219a', '0', '2018-12-06 11:35:59'),
('000839', '000002', 'VANIOKTAVIA', 'VIA1510', '0', '2018-12-06 11:38:28'),
('000840', '000002', 'EKAIMAMLIYANTO', 'EKAIMAM123', '0', '2018-12-06 12:01:58'),
('000841', '000002', 'AktsanTakwimi', 'bintang402', '0', '2018-12-06 12:04:37'),
('000842', '000002', 'MuhammadAlwiAnnazzil', 'annazzilli26', '0', '2018-12-06 12:16:46'),
('000844', '000002', 'andlka123', 'boosterz19', '0', '2018-12-06 14:39:47'),
('000850', '000002', 'NatashiaAmaliaYusuf', 'natashia', '0', '2018-12-07 09:43:29'),
('000845', '000002', 'dyahsekar', 'eka8ebol', '0', '2018-12-07 08:47:05'),
('000846', '000002', 'YUNITAANGGRAENI', 'YUNITACANTIK', '0', '2018-12-07 09:07:33'),
('000847', '000002', 'Annisaizmi', '7des1996', '0', '2018-12-07 09:13:06'),
('000848', '000002', 'MUHAMADDAHLAN', '123456', '0', '2018-12-07 09:24:35'),
('000849', '000002', 'INTARATRIHAPSARI', 'INTANRATRI', '0', '2018-12-07 09:28:39'),
('000851', '000002', 'GILBERTDAVID', '24MEI2000', '0', '2018-12-07 09:44:27'),
('000852', '000002', 'GOFRIALAZIS', 'GOFRI123', '0', '2018-12-07 09:44:54'),
('000853', '000002', 'CIKARAMADINI', '22januari1997', '0', '2018-12-07 09:45:18'),
('000854', '000002', 'syaqiladedesulastri', 'syaqila95', '0', '2018-12-07 10:20:20'),
('000855', '000002', 'IchsanRahmadhan', 'esmile123', '0', '2018-12-07 10:20:57'),
('000856', '000002', 'MochZakiF', 'sawangan31', '0', '2018-12-07 10:21:20'),
('000857', '000002', 'AFIFAUFARAMADHAN', 'AFIF1999', '0', '2018-12-07 10:27:12'),
('000858', '000002', 'Rahmi92', 'rahmitaki', '0', '2018-12-07 10:33:52'),
('000859', '000002', 'RADITAAYUNASTITI', 'BOGOR13041996', '0', '2018-12-07 11:19:10'),
('000860', '000002', 'zahrahanisah', 'zahradanrifa', '0', '2018-12-07 11:26:32'),
('000861', '000002', 'Kartika Pratiwi', 'tivanka33', '0', '2018-12-07 13:31:45'),
('000862', '000002', 'KartikaNurEndahAnjar', 'kartikanurendah18', '0', '2018-12-07 13:32:42'),
('000863', '000002', 'LAMHATUSSYA\'DAH', 'LALA1806', '0', '2018-12-07 13:43:37'),
('000864', '000002', 'nova743', 'gaemkyu88', '0', '2018-12-07 14:23:34'),
('000865', '000002', 'anita1', 'anita1', '0', '2018-12-07 14:50:29'),
('000866', '000002', 'nita', 'muhammadputra', '0', '2018-12-07 15:00:02'),
('000867', '000002', 'yuansatyarini', 'Sayayuans25', '0', '2018-12-07 15:10:47'),
('000868', '000002', 'ferdy', 'depok1705', '0', '2018-12-07 15:24:51'),
('000869', '000002', 'MUHAMADFADILFERDIANS', 'FADIL15', '0', '2018-12-07 15:28:26'),
('001158', '000002', 'nurfajria', 'fajria123', '0', '2019-01-07 13:30:42'),
('000870', '000002', 'monalisapurba', '011096', '0', '2018-12-07 15:40:38'),
('000871', '000002', 'muhammadryan', 'powerbass', '0', '2018-12-10 08:40:45'),
('000872', '000002', 'novianepongki', 'ane24111997', '0', '2018-12-10 08:52:05'),
('000873', '000002', 'Mustika_Widiyaningsi', 'Anggur22', '0', '2018-12-10 09:24:40'),
('000874', '000002', 'dindayudistira', 'dinda1234567890', '0', '2018-12-10 09:50:44'),
('000875', '000002', 'syahdamalifiam', 'sarava123', '0', '2018-12-10 10:05:22'),
('000876', '000002', 'AndikaRiandito', 'dito1989', '0', '2018-12-10 10:13:16'),
('000877', '000002', 'NurulKhoiriyah', 'yooseungwoo', '0', '2018-12-10 11:05:31'),
('000878', '000002', 'erikamayakama', '24Mei1996', '0', '2018-12-10 11:10:57'),
('000879', '000002', 'Milliandapark', 'millianda0913', '0', '2018-12-10 11:12:59'),
('000880', '000002', 'AryaErri', 'arya1703', '0', '2018-12-10 11:18:42'),
('000881', '000002', 'paskahtheresia', 'pzkhnayamhy16', '0', '2018-12-10 11:21:01'),
('000882', '000002', 'graceanne', 'narnia271', '0', '2018-12-10 11:36:29'),
('000883', '000002', 'Dexieadellasalza', 'baray1702', '0', '2018-12-10 12:13:41'),
('000884', '000002', 'IrmaSantika', 'irma354313', '0', '2018-12-10 12:26:13'),
('000885', '000002', 'TRIASTUTI', 'thutyningsih', '0', '2018-12-10 12:34:54'),
('000886', '000002', 'CHANDRI', '667788ch', '0', '2018-12-10 12:38:22'),
('000887', '000002', 'shelyyolanda', 'yolanda90', '0', '2018-12-10 13:53:36'),
('000888', '000002', 'heriyanto', 'alistiadewi', '0', '2018-12-10 14:10:00'),
('000889', '000002', 'rezamauln', 'rezaidol123', '0', '2018-12-10 14:20:58'),
('000890', '000002', 'nastiti', 'kunghendrawati', '0', '2018-12-11 08:13:28'),
('000891', '000002', 'hesti', 'kimwoobin', '0', '2018-12-11 08:16:00'),
('000892', '000002', 'sabtaginanjar', 's4bt44ji', '0', '2018-12-11 08:49:23'),
('000893', '000002', 'uminuralifah123@gmai', 'umisayangkamu417', '0', '2018-12-11 08:50:56'),
('000894', '000002', 'TANZA', 'tanza1234', '0', '2018-12-11 09:06:00'),
('000895', '000002', 'RiaIsfarian', 'iank86', '0', '2018-12-11 09:34:27'),
('000896', '000002', 'EKASUKAMDANI', 'Gustina1', '0', '2018-12-11 09:53:18'),
('000897', '000002', 'JefriAntonManurung', 'phoenixs', '0', '2018-12-11 09:58:19'),
('000898', '000002', 'MAHESAPUTRA', 'MAHESA123', '0', '2018-12-11 10:00:17'),
('000899', '000002', 'RanggaRamadhanPutra', 'kotasurabaya', '0', '2018-12-11 10:31:33'),
('000900', '000002', 'Rizqitrihandoko', '16022000', '0', '2018-12-11 10:31:47'),
('000901', '000002', 'cindyclaudiasari', 'cindyagung9', '0', '2018-12-11 10:38:29'),
('000902', '000002', 'BRAMANTYOAWANWIDIAND', 'kecilkate18', '0', '2018-12-11 11:03:51'),
('000903', '000002', 'SUCIWULANSARI', 'WULANSARI', '0', '2018-12-11 11:20:21'),
('000904', '000002', 'Dewitasari', 'dewita200896', '0', '2018-12-11 11:42:19'),
('000905', '000002', 'umvsht', 'Apaajaboleh1', '0', '2018-12-11 13:35:21'),
('000906', '000002', 'DIANAYULESTARI', '020694', '0', '2018-12-11 13:39:44'),
('000907', '000002', 'NADIAULFIAH', 'NADIA1234', '0', '2018-12-11 13:52:30'),
('000908', '000002', 'anggitaaprilia', 'anggitaapriliaa', '0', '2018-12-11 14:04:33'),
('000909', '000002', 'RYANDANAALICASAPUTRA', '11April1990', '0', '2018-12-11 14:09:04'),
('000910', '000002', 'panjinugroho', 'Pl4typus', '0', '2018-12-11 14:46:17'),
('000911', '000002', 'KRISNAALFIANI', '770682', '0', '2018-12-14 08:44:18'),
('000912', '000002', 'YogaPriyaWiguna', 'Ogud50gud', '0', '2018-12-14 08:44:38'),
('000913', '000002', 'YAUMILULFAHKAMILA', 'YAUMIL123', '0', '2018-12-14 09:00:02'),
('000914', '000002', 'yunus303', 'susah303', '0', '2018-12-14 09:00:23'),
('000915', '000002', 'DWIANTOSAPUTRA', '270900', '0', '2018-12-14 09:07:54'),
('000916', '000002', 'NOVINURAZIZAH', 'CEWECEWE', '0', '2018-12-14 09:43:07'),
('000917', '000002', 'NinikAlvianiRahma', 'alvianirahma7', '0', '2018-12-14 09:45:56'),
('000918', '000002', 'ernisusilowati', '090909', '0', '2018-12-14 10:01:58'),
('000919', '000002', 'nurwahyudin', 'nurwahyudin123', '0', '2018-12-14 10:03:58'),
('000920', '000002', 'meddyamedd', 'kiminjaeik03', '0', '2018-12-14 10:19:15'),
('000921', '000002', 'ryanharrysetiawan', 'ryan123', '0', '2018-12-14 10:19:50'),
('000922', '000002', 'SAMSIAHADIN', 'SAMSI123', '0', '2018-12-14 10:29:36'),
('000923', '000002', 'annisahendarson', 'annisa24', '0', '2018-12-14 10:31:26'),
('000924', '000002', 'FlorensiaAgustinaLum', '010890', '0', '2018-12-14 11:02:45'),
('000925', '000002', 'Hadiprasetyo', 'hadi268', '0', '2018-12-14 11:31:29'),
('000926', '000002', 'dwiretnoanggraeni', 'dwiretno', '0', '2018-12-14 13:38:59'),
('000927', '000002', 'okslandomarpaung', 'bkol2018', '0', '2018-12-14 13:45:57'),
('000928', '000002', 'anggitatridamayanti', 'anggita10', '0', '2018-12-14 14:33:32'),
('000929', '000002', 'MUHAMMADZAKYMA\'RUF', 'ZAKYMARUF240696', '0', '2018-12-14 14:52:53'),
('000930', '000002', 'liaalvia', 'lia123', '0', '2018-12-17 08:28:24'),
('000931', '000002', 'nungecha13', 'loveislam13', '0', '2018-12-17 08:36:33'),
('000932', '000002', 'AndreasOnwardKredoPa', 'Onward57', '0', '2018-12-17 09:01:30'),
('000933', '000002', 'JUNITASARIADRANI', '010690', '0', '2018-12-17 09:04:01'),
('000934', '000002', 'ARUMJAYANTI', '080890', '0', '2018-12-17 09:17:19'),
('000935', '000002', 'SindiMilania', 'sindi123', '0', '2018-12-17 09:48:52'),
('000936', '000002', 'JarikoSinurat', 'jamban12345', '0', '2018-12-17 09:59:22'),
('000942', '000002', 'megapuspitawahyono', 'megasendoh', '0', '2018-12-17 10:56:03'),
('000938', '000002', 'rizkiprimandari', '170390', '0', '2018-12-17 10:34:27'),
('000939', '000002', 'husnulkhatimah', '11032000', '0', '2018-12-17 10:36:58'),
('000940', '000002', 'JATIUTOMO', 'imaparawhore', '0', '2018-12-17 10:41:14'),
('000941', '000002', 'sitisoleha', 'guasayanglu', '0', '2018-12-17 10:43:22'),
('000943', '000002', 'fauzismail24', 'tensazangetsu24', '0', '2018-12-17 11:03:15'),
('000944', '000002', 'yuliantiwulandari', 'yulianti', '0', '2018-12-17 11:12:48'),
('000945', '000002', 'ItaRosita', '260380', '0', '2018-12-17 11:18:54'),
('000946', '000002', 'LILIS', '4LICIANA', '0', '2018-12-17 11:26:56'),
('000947', '000002', 'Sukarna', 'sukarna16', '0', '2018-12-17 11:35:58'),
('000948', '000002', 'ERLANGGA', 'kemuning', '0', '2018-12-17 11:37:30'),
('000949', '000002', 'BAGAS', '010808', '0', '2018-12-17 13:29:12'),
('000950', '000002', 'khairulinsani', 'Khairul123', '0', '2018-12-17 13:31:08'),
('000951', '000002', 'Amarullah', 'amarullah96', '0', '2018-12-17 13:47:50'),
('000952', '000002', 'SURYANA', 'IYAN123', '0', '2018-12-17 13:50:13'),
('000953', '000002', 'ElizaFridaAntoni', '01januari', '0', '2018-12-17 13:58:48'),
('000954', '000002', 'MohammadIrwan', '991707SMA8', '0', '2018-12-17 14:10:10'),
('000955', '000002', 'rizkiadhi87', '2019nikah', '0', '2018-12-18 08:35:17'),
('000956', '000002', 'GELEDISPRISCHILLIA', '250488', '0', '2018-12-18 08:57:58'),
('000957', '000002', 'sifaanisa', '123456', '0', '2018-12-18 09:28:47'),
('000958', '000002', 'rizscyanandamulia', 'bismillah', '0', '2018-12-18 09:36:08'),
('000959', '000002', 'Septiandwiyanto', 'Arjuna01', '0', '2018-12-18 09:42:01'),
('000960', '000002', 'sayidmubarok', 'diyasdiyas123', '0', '2018-12-18 10:42:01'),
('000961', '000002', 'muhammadadam', '123456', '0', '2018-12-18 10:59:32'),
('000962', '000002', 'nathasyameitasari', '07051996', '0', '2018-12-18 11:06:48'),
('000963', '000002', 'FitrianEkaParamita', 'ulaimi06', '0', '2018-12-18 11:39:00'),
('000964', '000002', 'anissasheila', 'toyatoay10', '0', '2018-12-18 13:49:10'),
('000965', '000002', 'rudaprawira', 'praticya', '0', '2018-12-18 13:52:33'),
('000966', '000002', 'cpetrabella', 'chacha93', '0', '2018-12-18 13:54:55'),
('000967', '000002', 'ArgaEryansyahPutra', 'miosoul123', '0', '2018-12-18 13:56:31'),
('000968', '000002', 'langgengajitristanto', 'zgrbjbpr', '0', '2018-12-18 15:00:48'),
('000969', '000002', 'Markhamah', 'tika060714', '0', '2018-12-19 10:08:31'),
('000970', '000002', 'nurulswr29', '262911dn', '0', '2018-12-19 10:33:22'),
('000971', '000002', 'NURDWIANA', 'NURDWIANA23', '0', '2018-12-19 10:45:05'),
('000972', '000002', 'ANNISAISNAINI', 'ZYHAIR', '0', '2018-12-19 10:52:59'),
('000973', '000002', 'Anggapraw', 'angga123', '0', '2018-12-19 11:01:06'),
('000974', '000002', 'DickyKurniawan', '150816', '0', '2018-12-19 11:04:57'),
('000975', '000002', 'devisekarayuwulandar', 'romanistaa', '0', '2018-12-19 11:21:44'),
('000976', '000002', 'maharaniraesaputrira', 'maharani280690', '0', '2018-12-19 11:34:18'),
('000977', '000002', 'riesandyaryanugraha', 'bintang123', '0', '2018-12-19 11:45:28'),
('000978', '000002', 'muhammadsyahrulferdi', 'persikad131313', '0', '2018-12-19 11:53:02'),
('000979', '000002', 'Monicamow', '171717', '0', '2018-12-19 13:58:20'),
('000980', '000002', 'DiniWulandari', 'elangndel', '0', '2018-12-19 14:20:38'),
('000981', '000002', 'FIRMANYULIANSYAH', 'FIRMANYF21', '0', '2018-12-19 14:27:54'),
('000982', '000002', 'WIDYAADFRISUSANTI', 'SUSANTI1998', '0', '2018-12-19 14:42:45'),
('000983', '000002', 'MUHAMADHAFIZALAMMUBA', 'IWANFALS123', '0', '2018-12-19 14:54:36'),
('000984', '000002', 'reinhardletare', 'letare06', '0', '2018-12-20 08:46:21'),
('000985', '000002', 'inderakula', 'cint4indr4?', '6ab017a2ffb34b67dad3abf62abadc6b', '2018-12-20 08:57:51'),
('000986', '000002', 'NabilaEdelwis', '8760891', '0', '2018-12-20 09:18:32'),
('000987', '000002', 'DinaArifiani', '2019bismillah', '0', '2018-12-20 09:51:50'),
('000988', '000002', 'MirnaHaryuni', 'aryuni17', '0', '2018-12-20 10:12:34'),
('000989', '000002', 'Arindaaptriani', '190498', '0', '2018-12-20 10:13:51'),
('000990', '000002', 'AgusPRIYONO', 'NAIFAH', '0', '2018-12-20 10:25:16'),
('000991', '000002', 'TRIUNIPUJANINGRUM', 'MAGELANG', '0', '2018-12-20 10:47:53'),
('000992', '000002', 'VindyMaidasari', 'vindy05', '0', '2018-12-20 10:57:20'),
('000993', '000002', 'IRFAN', '10021994', '0', '2018-12-20 11:13:56'),
('000994', '000002', 'AnandaRezekiyansyah', 'ananda070', '0', '2018-12-20 11:15:24'),
('000995', '000002', 'SHINDYNURJANNAH', 'SHINDYNURJANNAH', '0', '2018-12-20 11:23:46'),
('000996', '000002', 'ASEP', 'UBAY1234', '0', '2018-12-20 11:25:04'),
('000997', '000002', 'Stephanie.Dwiyanti.S', 'September19', '0', '2018-12-20 11:27:57'),
('000998', '000002', 'MUHAMADZEYLANASHARI', 'ZEYLAN', '0', '2018-12-20 11:35:11'),
('000999', '000002', 'MuhamadDirgantara', 'dirga112', '0', '2018-12-20 12:08:24'),
('001000', '000002', 'dinisantika', '12345678', '0', '2018-12-20 14:01:11'),
('001001', '000002', 'RIVALDORAHMAN', 'RAHMAN123', '0', '2018-12-20 14:01:42'),
('001113', '000002', 'Fakihaha', 'sepedamotor', '0', '2019-01-03 11:39:20'),
('001002', '000002', 'heripurwanto', '051085', '0', '2018-12-21 08:49:39'),
('001003', '000002', 'kevinbenedictusstefa', 'ganteng123', '0', '2018-12-21 09:24:59'),
('001004', '000002', 'danielapriyanto', 'aprianto16', '0', '2018-12-21 09:29:36'),
('001005', '000002', 'evantimotiussimon', 'resilient', '0', '2018-12-21 09:36:52'),
('001006', '000002', 'RATIHKUMALASARI', 'nyamnyam', '0', '2018-12-21 10:22:40'),
('001007', '000002', 'riskianahalizah', 'candy1822', '0', '2018-12-21 10:33:16'),
('001008', '000002', 'MuhammadFaujisihotan', 'ngalongsanco1', '0', '2018-12-21 10:52:25'),
('001009', '000002', 'RIMATIANA', 'RIMAARIF', '0', '2018-12-21 11:31:34'),
('001010', '000002', 'SANDIZAKARIA', 'SANDIZAKARIA', '0', '2018-12-21 14:35:32'),
('001011', '000002', 'SultanAhmadPrakoso', '22021998', '0', '2018-12-21 14:48:41'),
('001012', '000002', 'riyadhyfauzy', 'laruku99', '0', '2018-12-26 09:19:04'),
('001013', '000002', 'WILLYZAHERRAHMAN', 'zakrinal123', '0', '2018-12-26 09:21:33'),
('001014', '000002', 'NovikaDwiRachmawati', '201196', '0', '2018-12-26 09:23:17'),
('001015', '000002', 'AHMADDICKYPRIYAMBODO', '01081996', '0', '2018-12-26 09:32:28'),
('001016', '000002', 'MARIAVERONIKAMAYLIND', 'tuppaldanmaria9janua', '0', '2018-12-26 09:34:06'),
('001017', '000002', 'ANDREFICKYFAUZI', 'M4r4t4m4', '0', '2018-12-26 10:03:14'),
('001018', '000002', 'ariefak89', '70773552', '0', '2018-12-26 10:11:51'),
('001019', '000002', 'FitriArdilla', 'firdawati', '0', '2018-12-26 10:21:33'),
('001020', '000002', 'Daryanto', 'sabrina', '0', '2018-12-26 10:27:44'),
('001021', '000002', 'RidwanAdithiansyah', '211093', '0', '2018-12-26 11:08:31'),
('001022', '000002', 'NOVIYANI', '12345678', '0', '2018-12-26 12:02:38'),
('001023', '000002', 'hudaprabawa@gmail.co', 'Rashya2011', '0', '2018-12-26 12:04:43'),
('001024', '000002', 'AnisaTaha', 'anisa2605', '0', '2018-12-26 13:28:56'),
('001025', '000002', 'careninaamandaputri', 'carenina4', '0', '2018-12-26 14:02:22'),
('001026', '000002', 'henikusuma', 'heni2103', '0', '2018-12-26 14:28:40'),
('001027', '000002', 'shounakurnia1997', '1997sonakurnia', '0', '2018-12-26 14:38:09'),
('001028', '000002', 'OktaviaIndriani', '191096', '0', '2018-12-26 14:48:22'),
('001029', '000002', 'muhrizlhilmi', 'sukakamu', '0', '2018-12-26 15:04:38'),
('001030', '000002', 'RIANAWIDYANTHI', 'RIANA', '0', '2018-12-26 15:21:41'),
('001031', '000002', 'difiantidyasputri', 'difianti123', '0', '2018-12-26 16:00:12'),
('001032', '000002', 'ZIYADFALAHI', 'fandia88', '0', '2018-12-27 09:26:48'),
('001033', '000002', 'annisanrm26', 'majdinaa', '0', '2018-12-27 09:53:49'),
('001034', '000002', 'REZAPRADANA', '123456', '0', '2018-12-27 10:18:43'),
('001035', '000002', 'ferrydwisufianto', '43210', '0', '2018-12-27 10:30:14'),
('001036', '000002', 'Fitrahin', 'jangkung', '0', '2018-12-27 10:37:15'),
('001037', '000002', 'indahmultazimah', 'nadhifah', '0', '2018-12-27 10:50:14'),
('001038', '000002', 'EVIYULIANA', 'KALANDRA', '0', '2018-12-27 11:04:36'),
('001039', '000002', 'FEBRYYUDHISTIRA', '123456', '0', '2018-12-27 11:15:47'),
('001040', '000002', 'ATIHHIDAYATI', '231988', '0', '2018-12-27 11:27:23'),
('001041', '000002', 'muthiast', 'roticoklat', '0', '2018-12-27 11:35:58'),
('001042', '000002', 'EVAFEBRIYANI', 'CANTIK', '0', '2018-12-27 11:44:43'),
('001043', '000002', 'BISMAAKBARRIVALDI', 'tumbuhan14', '0', '2018-12-27 15:50:47'),
('001044', '000002', 'panjihermawan', 'panji1234', '0', '2018-12-28 08:38:01'),
('001045', '000002', 'Bernard', 'angryagain', '0', '2018-12-28 09:35:06'),
('001046', '000002', 'ihsanmuhtadi', 'buatbaru', '0', '2018-12-28 10:03:23'),
('001047', '000002', 'syariefhidayah', 'Syarief@54', '0', '2018-12-28 10:03:57'),
('001048', '000002', 'WINNYCHINTYAWATINENO', 'winnynenotek', '0', '2018-12-28 10:18:11'),
('001049', '000002', 'WindaAmeliaSeptiyant', 'windaamelia98', '0', '2018-12-28 10:29:02'),
('001050', '000002', 'ARIFPRABOWO', 'Radiologi1', '0', '2018-12-28 11:02:23'),
('001051', '000002', 'Destianakenaya', 'creepygurls', '0', '2018-12-28 11:06:24'),
('001052', '000002', 'hikmawati', '123456', '0', '2018-12-28 11:19:46'),
('001053', '000002', 'neneng', 'neneng', '0', '2018-12-28 11:31:01'),
('001054', '000002', 'sulistiani', 'sulistiani', '0', '2018-12-28 11:36:35'),
('001055', '000002', 'MaulidiaWidhahAzmal', 'lietome', '0', '2018-12-28 11:44:09'),
('001056', '000002', 'roberto', 'tobing', '0', '2018-12-28 12:01:18'),
('001057', '000002', 'hajidonny', '837222', '0', '2018-12-28 13:54:26'),
('001058', '000002', 'WILYSANJAYA', 'GUALUPA', '0', '2018-12-28 14:36:41'),
('001059', '000002', 'jolgaol', '91104624', '0', '2018-12-28 14:43:39'),
('001060', '000002', 'mshintaa', 'C4y5h1nt', '0', '2018-12-28 14:59:21'),
('001061', '000002', 'Nadia48', 'Nadwinter4', '0', '2018-12-31 08:44:54'),
('001062', '000002', 'nikki.irawan', 'nikki1345', '0', '2018-12-31 09:05:40'),
('001063', '000002', 'yosuamarulipandapota', '73505kristus', '0', '2018-12-31 09:07:58'),
('001064', '000002', 'aminah', 'aminah96jb', '0', '2018-12-31 09:14:37'),
('001065', '000002', 'ayupermatasari', 'm0kuch1@21', '0', '2018-12-31 09:31:32'),
('001066', '000002', 'andreaswisnu', 'Andreasw17', '0', '2018-12-31 09:42:28'),
('001067', '000002', 'pandusurya', 'khalief23', '0', '2018-12-31 09:44:28'),
('001068', '000002', 'Rwidhiantari', 'bimaruni24012010', '0', '2018-12-31 09:59:59'),
('001069', '000002', 'maulanaasmaulhusna', 'avrill17', '0', '2018-12-31 10:08:45'),
('001070', '000002', 'ninuminnie', '22102241', '0', '2018-12-31 10:13:14'),
('001071', '000002', 'GALUHPUSPITANINGSIH', 'egal2008', '0', '2018-12-31 10:28:16'),
('001072', '000002', 'MANDIPRANSISKA', '030684', '0', '2018-12-31 10:39:48'),
('001076', '000002', 'PRIMARAHAYU', '12345678', '0', '2018-12-31 11:16:35'),
('001074', '000002', 'RanyAstriani', 'doraemon', '0', '2018-12-31 11:00:04'),
('001075', '000002', 'rasyiddinazhar', 'r45y1d42h4r', '0', '2018-12-31 11:07:59'),
('001077', '000002', 'Vigita', 'ANDANTIO10', '0', '2018-12-31 11:45:22'),
('001078', '000002', 'ELIZAPUTRI', '08112000', '0', '2018-12-31 11:52:39'),
('001079', '000002', 'RIASARIDEWI', 'EMIRRAFIF', '0', '2018-12-31 13:48:33'),
('001080', '000002', 'Widyaningrum', 'widya564', '0', '2018-12-31 13:55:03'),
('001081', '000002', 'adityapratama', 'nabi muhammad SAW1', '0', '2018-12-31 14:19:58'),
('001082', '000002', 'WILIENDWIAJENG', 'UNIVERSITAS12', '0', '2018-12-31 15:09:13'),
('001083', '000002', 'usamahwd', '337197', '0', '2018-12-31 15:16:18'),
('001084', '000002', 'FikriAzmiArifS', 'fikriazmi1996', '0', '2019-01-02 08:33:03'),
('001085', '000002', 'jesiskartl', '230795', '0', '2019-01-02 08:53:48'),
('001086', '000002', 'ahmadmunawar', 'ahmadmunawar', '0', '2019-01-02 08:57:39'),
('001087', '000002', 'AQABIQI', 'Aqabiqi1', '0', '2019-01-02 09:12:50'),
('001088', '000002', 'AbdulFachmi', 'Oke12345', '0', '2019-01-02 09:15:45'),
('001089', '000002', 'DESTYLIARISMAWATI', 'destylia', '0', '2019-01-02 09:28:34'),
('001090', '000002', 'RawuhPradana', 'saridi090891', '0', '2019-01-02 09:33:44'),
('001091', '000002', 'Nuraevi', 'vielovdanil', '0', '2019-01-02 09:48:02'),
('001092', '000002', 'ApriyandiBudiSatria', 'pikpok', '0', '2019-01-02 09:50:49'),
('001093', '000002', 'monicanourina', 'nugroho220489', '0', '2019-01-02 10:14:38'),
('001094', '000002', 'IRMANATALIAARIWEI', 'jogja08', '0', '2019-01-02 10:23:23'),
('001095', '000002', 'andrearimurti', '4ndr34', '0', '2019-01-02 11:06:10'),
('001096', '000002', 'MAYSARAH', 'MAYY0591', '0', '2019-01-02 11:22:21'),
('001097', '000002', 'putridamayanti', 'azu183511', '0', '2019-01-02 11:43:18'),
('001098', '000002', 'BERLIANA', 'berliana', '0', '2019-01-02 12:05:13'),
('001099', '000002', 'Suziah', 'suzie16', '0', '2019-01-02 12:06:59'),
('001100', '000002', 'hasanahintananggara', 'intancantik', '0', '2019-01-02 12:18:38'),
('001101', '000002', 'ceciliapasaribu', 'sembada', '0', '2019-01-02 13:48:51'),
('001102', '000002', 'rizqimnd', 'Gembul18', '0', '2019-01-02 13:58:21'),
('001103', '000002', 'diahfitri16', 'diah1603', '0', '2019-01-02 14:03:01'),
('001104', '000002', 'MERYMISRIATIN', 'atiningatdong', '0', '2019-01-02 14:14:08'),
('001105', '000002', 'oktapanca', 'nasirames', '0', '2019-01-02 14:16:34'),
('001106', '000002', 'MARCELLINUS', 'b33B3NG4', '0', '2019-01-02 14:46:54'),
('001107', '000002', 'RUGHBYSHOBIAN', 'BISMILLAH1991', '0', '2019-01-02 15:54:27'),
('001108', '000002', 'Dimascahyobangun', 'jurik354', '0', '2019-01-03 08:53:28'),
('001109', '000002', 'maimunah', '091217', '0', '2019-01-03 09:33:45'),
('001110', '000002', 'dsepty', 's1t1mur4n1', '0', '2019-01-03 10:08:39'),
('001111', '000002', 'ADESYAPUTRASOLEH', 'SOLEH311017', '0', '2019-01-03 10:27:53'),
('001112', '000002', 'elisasusantriyanti', 'celana', '0', '2019-01-03 10:35:03'),
('001114', '000002', 'AdeNofifa', 'adnvv23', '0', '2019-01-03 11:56:31'),
('001115', '000002', 'ibnuherlambangwijatm', 'atharransi', '0', '2019-01-03 12:10:12'),
('001116', '000002', 'eryu.bee@gmail.com', 'FAM07ILY', '0', '2019-01-03 13:28:10'),
('001117', '000002', 'RAIH', 'INASALGIS', '0', '2019-01-03 13:37:24'),
('001118', '000002', 'emilyazizah', 'emilrangers', '0', '2019-01-03 14:40:39'),
('001119', '000002', 'MOCHAMADMIRZA', 'mirza123', '0', '2019-01-03 15:14:22'),
('001120', '000002', 'desyarisandi', '16011992', '0', '2019-01-04 08:44:09'),
('001123', '000002', 'januarkhaerul10', '12345', '0', '2019-01-04 09:00:29'),
('001122', '000002', 'Dinanabilah22', 'dina220100', '0', '2019-01-04 08:57:32'),
('001124', '000002', 'RISKYFSH', '13245768', '0', '2019-01-04 09:05:47'),
('001125', '000002', 'RIDWANKL', '201196MEDAN', '0', '2019-01-04 09:12:33'),
('001126', '000002', 'Dorasetyar', 'dora1007', '0', '2019-01-04 09:20:19'),
('001127', '000002', 'Dharma', 'bujanganurban', '0', '2019-01-04 10:10:02'),
('001128', '000002', 'handikapitrahpradana', 'pradana', '0', '2019-01-04 10:24:04'),
('001129', '000002', 'ntyolii', 'cemiwiw190106', '0', '2019-01-04 10:30:12'),
('001130', '000002', 'adelsiregar', 'adel011092', '0', '2019-01-04 10:36:43'),
('001131', '000002', 'srimulyanasari', '182321', '0', '2019-01-04 10:58:13'),
('001132', '000002', 'RAJA', 'tiberias89', '0', '2019-01-04 11:31:43'),
('001133', '000002', 'INKANAPIDAANDRIYANI', 'INKANPD15', '0', '2019-01-04 11:45:00'),
('001134', '000002', 'Gunawan', 'igun', '0', '2019-01-04 13:42:27'),
('001135', '000002', 'damialiana', '14oktober', '0', '2019-01-04 13:47:30'),
('001136', '000002', 'agungekahermawancpns', 'ae120609', '0', '2019-01-04 13:56:40'),
('001137', '000002', 'AGNESBUDIPRATIWI', 'PRATIWI190898', '0', '2019-01-04 14:04:17'),
('001138', '000002', 'YOGASUDIRMAN', 'SALAMMERDEKA', '0', '2019-01-04 14:17:20'),
('001139', '000002', 'INDAHSAPUTRI', '111213', '0', '2019-01-04 14:33:39'),
('001140', '000002', 'erpasusanah', 'erpa1982', '0', '2019-01-04 14:46:39'),
('001141', '000002', 'Novisusanti', 'novisusanti78', '0', '2019-01-04 14:53:13'),
('001142', '000002', 'Rudichristian', '330813042Y', '0', '2019-01-04 15:36:54'),
('001143', '000002', 'ULFARP', 'roslianaulfa', '0', '2019-01-07 08:19:25'),
('001144', '000002', 'muhammadiqbal22', '12345', '0', '2019-01-07 08:34:55'),
('001145', '000002', 'yohan.panggabean', '140990', '0', '2019-01-07 09:20:08'),
('001146', '000002', 'DennyOctavianto', '13oktober', '0', '2019-01-07 09:38:24'),
('001147', '000002', 'Bindaricahyangbadhra', 'bindari', '0', '2019-01-07 10:18:37'),
('001148', '000002', 'ARGENTINASIMAMORA', 'akudarilodong', '0', '2019-01-07 10:39:32'),
('001149', '000002', 'Panjiasmaraman', 'panjipangestu', '0', '2019-01-07 10:47:21'),
('001150', '000002', 'yashagozwan', 'freedomartcc', '0', '2019-01-07 10:51:52'),
('001151', '000002', 'adityaap', 'thatchick', '0', '2019-01-07 11:02:17'),
('001152', '000002', 'triastutib', '1803kita', '0', '2019-01-07 11:22:55'),
('001153', '000002', 'romaidasolin', '1122', '0', '2019-01-07 11:31:23'),
('001154', '000002', 'AhmadZaky', 'zaky19999', '0', '2019-01-07 11:41:18'),
('001155', '000002', 'adindaindra', 'dadindasaputra00', '0', '2019-01-07 11:44:18'),
('001156', '000002', 'ekairgiramadon', 'poertal907', '0', '2019-01-07 11:48:17'),
('001157', '000002', 'HandikaReynaldiSutan', 'namasaya', '0', '2019-01-07 12:00:29'),
('001159', '000002', 'SETIAWAN', 'A7XGALANKSETIAWAN', '0', '2019-01-07 13:46:01'),
('001160', '000002', 'Jakawahyuda', '21101991', '0', '2019-01-07 13:46:57'),
('001161', '000002', 'Defrina', 'imcalypso', '0', '2019-01-07 13:52:58'),
('001162', '000002', 'BAGUSGURITNO', 'udahlupa', '0', '2019-01-07 15:20:40'),
('001175', '000002', 'LauraFirera1', '27091990', '496b560cd1266e0635cef937d1352333', '2019-01-08 14:16:12'),
('001163', '000002', 'SUDARMANTO', 'archmanto99', '0', '2019-01-08 08:07:47'),
('001164', '000002', 'WINDAANGGRAENI', 'rahasiabanget', '0', '2019-01-08 08:41:21'),
('001165', '000002', 'RisnawatiDwiArum', 'risnawati19', '0', '2019-01-08 08:47:39'),
('001166', '000002', 'MUHAMMADRIZKITAYAN', '77829282', '0', '2019-01-08 09:08:57'),
('001167', '000002', 'bonacorua', 'misdinar', '0', '2019-01-08 09:25:20'),
('001168', '000002', 'INAYAHKURNIATI', '110781', '0', '2019-01-08 09:26:26'),
('001169', '000002', 'Septivirgiyanti', 'septi19', '0', '2019-01-08 11:47:23'),
('001170', '000002', 'sitifitriyani', 'fitriyani', '0', '2019-01-08 12:03:22'),
('001171', '000002', 'DEWIYULIANTI', '050793', '0', '2019-01-08 12:04:40'),
('001172', '000002', 'Yusarga', 'everyday', '0', '2019-01-08 12:10:23'),
('001173', '000002', 'SEPTIRAHMAWATI', 'BTSBT217', '0', '2019-01-08 13:19:10'),
('001174', '000002', 'ArisaPermata', 'arisa', '0', '2019-01-08 13:44:37'),
('001176', '000002', 'andreariefvijaya', 'A150993', '0', '2019-01-08 14:25:17'),
('001177', '000002', 'DEWAPANDUWINATA', '12345678', '0', '2019-01-08 14:26:15'),
('001178', '000002', 'Dahlia', 'juliafatma', '0', '2019-01-08 14:42:17'),
('001179', '000002', 'bimakesuma', 'bimakesumatra', '0', '2019-01-08 15:02:17'),
('001180', '000002', 'RENYHARIYANI', 'renycantik123', '0', '2019-01-08 15:43:35'),
('001181', '000002', 'Laurafirera', '27091990', '0', '2019-01-08 16:19:07'),
('001190', '000002', 'RATIHDEWANTIALAWIYAH', 'R0212040', '0', '2019-01-09 10:08:27'),
('001182', '000002', 'MIKAILNATAPASAWWA', 'CILANGKAP', '0', '2019-01-09 08:19:39'),
('001183', '000002', 'FADELIBNUPERDANA', 'FADEL220995', '0', '2019-01-09 08:27:08'),
('001184', '000002', 'ASIHPURWANTINI', 'ASIH0206', '0', '2019-01-09 08:48:10'),
('001185', '000002', 'Halimaturohmah1', '23juni2000', '0', '2019-01-09 09:08:08'),
('001186', '000002', 'AfiniSyifana', 'melonia9', '0', '2019-01-09 09:17:18'),
('001187', '000002', 'Rahmatprastyansulist', 'rahmat200794', '0', '2019-01-09 09:36:38'),
('001188', '000002', 'prawiradieniyah', 'pr4w1r4', '0', '2019-01-09 09:44:30'),
('001189', '000002', 'silviafebriyanti1', '145248', '0', '2019-01-09 09:54:02'),
('001191', '000002', 'INTANPERMATASARI1', 'PERMATA', '0', '2019-01-09 10:19:17'),
('001192', '000002', 'CUTMEUTIACORPHYLIAFR', 'CUTR3920', '0', '2019-01-09 10:25:01'),
('001193', '000002', 'RIAASTUTI', 'ASTUTI', '0', '2019-01-09 10:35:34'),
('001194', '000002', 'Rokhmahsari', 'sARI08', '0', '2019-01-09 10:41:17'),
('001195', '000002', 'KARTIANAAPRIANI', 'ken15216', '0', '2019-01-09 10:42:19'),
('001196', '000002', 'IBNUFAJRI1', 'FAJRI', '0', '2019-01-09 10:52:53'),
('001197', '000002', 'muhamadkamto', 'anaksoleh98', '0', '2019-01-09 10:54:55'),
('001198', '000002', 'PutriDwiSuryani', '123777', '0', '2019-01-09 11:01:16'),
('001199', '000002', 'FATURACHMANYUSUP', '08567864952F', '0', '2019-01-09 11:06:16'),
('001200', '000002', 'yenisusiana3', 'ica26615', '0', '2019-01-09 11:10:17'),
('001201', '000002', 'HERIDJUNIANSYAH', 'HERI1234', '0', '2019-01-09 11:24:13'),
('001202', '000002', 'FEBRIPUTRIANI', 'BUNTIL246810', '0', '2019-01-09 11:30:47'),
('001203', '000002', 'FEBRIKURNIARAMADHAN', 'RAMA', '0', '2019-01-09 11:34:02'),
('001204', '000002', 'INDRIRAMILDAVILLANI', 'INDRI', '0', '2019-01-09 13:15:26'),
('001205', '000002', 'JulaetaPradaPinaka', 'julaetaprada1', '0', '2019-01-09 13:25:31'),
('001206', '000002', 'YessiOktora', 'Lintojulita18', '0', '2019-01-09 13:26:38'),
('001207', '000002', 'INDAYANTI', '060296', '0', '2019-01-09 13:58:44'),
('001208', '000002', 'KINANTIRIZKYCHAIRUNI', 'KINANTI', '0', '2019-01-09 14:50:12'),
('001419', '000002', 'SUHENDAR', 'cmb7102', '0', '2019-01-30 14:50:48'),
('001209', '000002', 'DHIAHRESTI', 'APOTEKER54', '0', '2019-01-10 09:15:09'),
('001210', '000002', 'lailatulfadhilah', 'lailafadhilah', '0', '2019-01-10 09:57:40'),
('001211', '000002', 'junaedi', 'junaedi', '0', '2019-01-10 10:08:37'),
('001212', '000002', 'DERINURSYAHID', 'DERILAKSA12', '0', '2019-01-10 10:10:07'),
('001213', '000002', 'AHMADRIPAI', 'AHMAD', '0', '2019-01-10 10:17:49'),
('001214', '000002', 'Dessyhardiyanti', 'DESYHARDI0796', '0', '2019-01-10 10:31:16'),
('001215', '000002', 'DiniAnindya', 'dini05', '0', '2019-01-10 10:40:26'),
('001216', '000002', 'SilviEnggarBudiarti', 'onsikyu1991', '0', '2019-01-10 11:07:33'),
('001217', '000002', 'ALDRIOKTAVIAN1', '03101997', '0', '2019-01-10 12:12:49'),
('001218', '000002', 'LIAREMAJA', 'LIAREMAJA', '0', '2019-01-10 12:14:59'),
('001219', '000002', 'DinabilahAdani', 'dibil123', '0', '2019-01-10 13:22:50'),
('001220', '000002', 'ninasabin', 'nina', '0', '2019-01-10 13:25:14'),
('001221', '000002', 'GEMILANGSYAUKI', '123456789', '0', '2019-01-10 13:26:40'),
('001222', '000002', 'ernakurniawati', 'erna', '0', '2019-01-10 13:31:45'),
('001223', '000002', 'RAHMARUFAIDASUSETYO', 'rahmarufaidasusetyo', '0', '2019-01-10 13:50:53'),
('001224', '000002', 'RobiNovryniChania', '123456', '0', '2019-01-10 14:24:45'),
('001225', '000002', 'ESTICAHYATI', '950827', '0', '2019-01-10 14:40:53'),
('001226', '000002', 'ANNISA.RAHMAYANTI', '2ANNAATU82', '0', '2019-01-10 15:02:06'),
('001373', '000002', 'MUHAMMADHAFIZ', '100613', '0', '2019-01-28 12:16:42'),
('001227', '000002', 'Arini', 'bismillah', '0', '2019-01-11 09:24:58'),
('001228', '000002', 'ariefiansyamsi', 'anakmanja', '0', '2019-01-11 09:49:26'),
('001229', '000002', 'DyahSusanti', '30032009', '0', '2019-01-11 09:51:07'),
('001230', '000002', 'AyuRahmawati', 'januari98', '0', '2019-01-11 10:12:22'),
('001231', '000002', 'MUHAMMADSENDYSUPYAND', 'sendy0310', '0', '2019-01-11 10:55:05'),
('001232', '000002', 'DesAriniaRukiyah', '281015', '0', '2019-01-11 11:11:16'),
('001233', '000002', 'ANISADWIKHOLIFAH', 'ANISA1992', '0', '2019-01-11 11:20:57'),
('001234', '000002', 'Taufithidayat', '240417', '0', '2019-01-11 11:47:04'),
('001235', '000002', 'DESILIMBONG', 'jazzierly', '0', '2019-01-11 14:47:30'),
('001236', '000002', 'Ronaldarfanmaulana', 'pengasinan', '0', '2019-01-11 15:47:16'),
('001237', '000002', 'bahrudiryansyah1', 'PENGASINAN', '0', '2019-01-11 15:52:39'),
('001238', '000002', 'CyntiaWidyastuti', 'cyntiawt19', '0', '2019-01-14 08:28:12'),
('001239', '000002', 'HAIRULMUPIDAH', 'HAIRUL', '0', '2019-01-14 08:31:25'),
('001240', '000002', 'khairunizaoctaviani', 'Aniscantik17', '0', '2019-01-14 08:34:26'),
('001241', '000002', 'Annuurs', 'lemari', '0', '2019-01-14 08:39:11'),
('001242', '000002', 'HarisRinantama', 'kiraisuki', '0', '2019-01-14 08:44:55'),
('001243', '000002', 'alisafatimah', 'iedo2407', '0', '2019-01-14 08:52:28'),
('001244', '000002', 'hendradarmawan', 'khairafakhratunnisa', '0', '2019-01-14 09:36:28'),
('001245', '000002', 'Nurjanah', 'janah02011997', '0', '2019-01-14 10:18:20'),
('001246', '000002', 'RifkiFaisal', 'paskibraka05', '0', '2019-01-14 10:19:35'),
('001247', '000002', 'SatriaWildaniArvito', '241462', '0', '2019-01-14 10:51:02'),
('001248', '000002', 'ULINNAJIHAH', '15112294', '0', '2019-01-14 11:01:51'),
('001249', '000002', 'okasaputra', 'okasaputra', '0', '2019-01-14 11:46:26'),
('001250', '000002', 'euisfitriah', '210994', '0', '2019-01-14 13:31:46'),
('001251', '000002', 'fadhilramadhanwirian', 'depok123', '0', '2019-01-14 15:02:38'),
('001252', '000002', 'muhammaddickyamrulla', '142536', '0', '2019-01-14 15:44:31'),
('001253', '000002', 'putrikarlianwindarni', 'KARLIAN20', '0', '2019-01-15 09:34:28'),
('001254', '000002', 'Rizkialdian', 'pahitmanis12', '0', '2019-01-15 09:55:49'),
('001255', '000002', 'ademuhamadmuhlisin', '123123lisina', '0', '2019-01-15 10:01:29'),
('001256', '000002', 'sofhiaswid', 'one23four5', '0', '2019-01-15 10:03:19'),
('001257', '000002', 'Ilhamgohams', 'Ilham08051996', '0', '2019-01-15 10:05:28'),
('001259', '000002', 'deviraekasagita', 'kevinjeremy17', '0', '2019-01-15 10:37:32'),
('001258', '000002', 'ZulAbror', 'fk39g4n5', '0', '2019-01-15 10:21:42'),
('001260', '000002', 'ESYAYULIANA', 'esyacantik1007', '0', '2019-01-15 10:53:20'),
('001261', '000002', 'gatotsupriana', '123456', '0', '2019-01-15 11:09:46'),
('001262', '000002', 'Wilies', 'Ngawi107', '0', '2019-01-15 11:48:16'),
('001263', '000002', 'PudyastutiHapsariago', 'mapaja24', '0', '2019-01-15 12:15:00'),
('001264', '000002', 'wulanseptiani', 'selabintana', '0', '2019-01-15 13:30:55'),
('001266', '000002', 'Muhammadrianrizki', '09091999', '0', '2019-01-15 14:55:26'),
('001267', '000002', 'ditianabilahsaningru', 'ditia9060', '0', '2019-01-16 08:55:19'),
('001268', '000002', 'komarudin1', 'komar123', '0', '2019-01-16 09:39:30'),
('001269', '000002', 'eggiepandutamara', 'egi123', '0', '2019-01-16 09:43:52'),
('001270', '000002', 'dindaaurelliasyifa', 'dinda15', '0', '2019-01-16 09:45:16'),
('001271', '000002', 'rikosetiawan', 'rikoriko11', '0', '2019-01-16 11:05:25'),
('001272', '000002', 'wandaraynata', 'wanda1234', '0', '2019-01-16 11:06:51'),
('001273', '000002', 'GEBIOVALLEN', 'GEBIOVALLEN', '0', '2019-01-16 13:22:45'),
('001274', '000002', 'BUDIKURNIAWAN', 'BNPT2015', '0', '2019-01-16 13:29:05'),
('001275', '000002', 'PUTUCAHYANIADEPUTRIP', 'padangsubadra', '0', '2019-01-16 14:26:23'),
('001276', '000002', 'IzharuddinKamal', 'palestina', '0', '2019-01-16 14:28:36'),
('001277', '000002', 'Ilhamdi', 'ilhamdi03', '0', '2019-01-17 09:07:57'),
('001279', '000002', 'HeruIhwani', '123456', '0', '2019-01-17 09:45:32'),
('001280', '000002', 'MARLINATHERESIA', 'sihotang15', '0', '2019-01-17 10:05:28'),
('001281', '000002', 'SUMARNI1', 'sumarni', '0', '2019-01-17 10:20:48'),
('001282', '000002', 'SuciRahmadani', 'marinir86', '0', '2019-01-17 10:23:45'),
('001283', '000002', 'MeutiaAnitaB', 'meutia1993', '0', '2019-01-17 11:18:55'),
('001284', '000002', 'Afnansucinastari', 'afnan02', '0', '2019-01-17 13:16:35'),
('001285', '000002', 'DAFAHERSANIA', 'DAFA170299', '0', '2019-01-17 13:17:20'),
('001286', '000002', 'TIOMINARPANE', 'tiominarpane', '0', '2019-01-17 13:55:36'),
('001287', '000002', 'PAMUNGKASAMRIHRAHARJ', 'amrih007', '0', '2019-01-17 14:15:00'),
('001288', '000002', 'monikfebs', 'febriani16', '0', '2019-01-17 14:19:33'),
('001289', '000002', 'MELLYSARI', 'MEILIANA96', '0', '2019-01-17 14:21:27'),
('001290', '000002', 'muhammadyusuf', 'muhyusuf', '0', '2019-01-17 15:11:57'),
('001291', '000002', 'BilliAldinSumadireja', 'billikartu', '0', '2019-01-17 15:26:38'),
('001292', '000002', 'ISMANURCAHYA', 'ALLAHSWT', '0', '2019-01-18 09:52:01'),
('001293', '000002', 'Tara111', '11091992', '0', '2019-01-18 10:05:40'),
('001294', '000002', 'LarasAriyanti', '27juli', '0', '2019-01-18 10:51:49'),
('001295', '000002', 'SITIRATNAASIH', 'sitiratnaasih', '0', '2019-01-18 11:04:19'),
('001296', '000002', 'MEGANURFASANTI', '180898', '0', '2019-01-18 11:09:02'),
('001297', '000002', 'novisrisaraswati', 'novi121530', '0', '2019-01-18 11:13:48'),
('001298', '000002', 'yohannaangel', '18224674', '0', '2019-01-18 11:23:01'),
('001299', '000002', 'ROSITAMARDYANI', 'RADENSALEH', '0', '2019-01-18 11:24:20'),
('001300', '000002', 'DESSIISRATUN', 'dessiisratun', '0', '2019-01-18 11:25:56'),
('001301', '000002', 'FITRIYANI', '090296', '0', '2019-01-18 11:35:57'),
('001302', '000002', 'CECEPHIDAYAT', '250165', '0', '2019-01-18 11:43:53'),
('001303', '000002', 'laraswidiyanita', 'larascantik', '0', '2019-01-21 09:29:07'),
('001304', '000002', 'WinniTristanty', '18091998winni', '0', '2019-01-21 09:29:24'),
('001305', '000002', 'Muhammadafifmaulana', 'f1reangel', '0', '2019-01-21 09:38:16'),
('001306', '000002', 'MeidyPratama', '10051998', '0', '2019-01-21 09:46:22'),
('001307', '000002', 'MASIK', '12061966', '0', '2019-01-21 10:15:57'),
('001308', '000002', 'KhusnulKhotimah', '11sept', '0', '2019-01-21 11:18:23'),
('001309', '000002', 'DIAHSITIROMLAH', 'JECKY1234', '0', '2019-01-21 11:23:35'),
('001310', '000002', 'MellyAnditaAryanti', '20081995', '0', '2019-01-21 12:12:27'),
('001311', '000002', 'FITRIA', 'fitria', '0', '2019-01-21 12:17:12'),
('001312', '000002', 'Lilisfitriani', 'sayangallah', '0', '2019-01-21 13:41:56'),
('001313', '000002', 'SEMIKURNIASIH', 's7760507', '0', '2019-01-21 14:35:39'),
('001314', '000002', 'alekmaulana', '089505592917', '0', '2019-01-21 14:51:18'),
('001315', '000002', 'AKBARRAMADAN', 'allbase34', '0', '2019-01-21 14:56:08'),
('001316', '000002', 'mahamadzikri', 'kekakeki123', '0', '2019-01-22 08:35:36'),
('001317', '000002', 'DHEAAMELIA', 'dheaamelia', '0', '2019-01-22 08:49:36'),
('001318', '000002', 'HendrikSutoyo', 'akunkk', '0', '2019-01-22 09:18:21'),
('001319', '000002', 'muhammadfandisulaema', 'fandi1562', '0', '2019-01-22 10:50:40'),
('001320', '000002', 'rivaldi', '283074', '0', '2019-01-22 11:02:56'),
('001321', '000002', 'epraim', '310198', '0', '2019-01-22 11:11:24'),
('001322', '000002', 'MUZAMILRAHMAN', 'KILUA123', '0', '2019-01-22 12:15:55'),
('001323', '000002', 'herihartono', 'heriaja', '0', '2019-01-22 13:58:18'),
('001324', '000002', 'sangafsulaiaman', 'sangaf1234', '0', '2019-01-22 15:23:29'),
('001325', '000002', 'adhityasaputra', 'burnitdown', '0', '2019-01-23 10:21:07'),
('001326', '000002', 'YURIKEFRANCISKA', 'KEY162417', '0', '2019-01-23 11:06:10'),
('001327', '000002', 'MELINSAWELI', 'melinsaweli25', '0', '2019-01-23 11:08:39'),
('001328', '000002', 'VALLISA', '100895', '0', '2019-01-23 11:12:54'),
('001329', '000002', 'SitiJaenab', '250496', '0', '2019-01-23 11:34:22'),
('001332', '000002', 'NISANOVIANTISIANTURI', 'SIANTURI09', '0', '2019-01-23 12:20:17'),
('001331', '000002', 'TANIADESTIANAPUTRI', 'LANGITBIRU', '0', '2019-01-23 12:02:33'),
('001333', '000002', 'WARNENGSIH', 'g1br4n', '0', '2019-01-23 12:22:50'),
('001334', '000002', 'Riziqalfalah', 'jokam354', '0', '2019-01-23 12:30:08'),
('001335', '000002', 'EKASETIYAWAN', 'gualupaa', '0', '2019-01-23 14:25:43'),
('001336', '000002', 'AFIFBAHYANTODIPUTRA', 'AFIF123', '0', '2019-01-23 14:57:39'),
('001337', '000002', 'JUWITASARISIMBOLON', 'JUWITASIMBOLON', '0', '2019-01-24 10:17:52'),
('001338', '000002', 'AHMADYUSUF', '123456', '0', '2019-01-24 11:25:59'),
('001339', '000002', 'NURARISKARINDIANI', 'nurariska', '0', '2019-01-24 13:32:42'),
('001340', '000002', 'RIRINFIORINTINAPASAR', 'BORPAS', '0', '2019-01-25 08:51:14'),
('001341', '000002', 'ABDULRAHMAN', '4413', '0', '2019-01-25 09:46:14'),
('001342', '000002', 'Arma', 'Veggies', '0', '2019-01-25 09:53:30'),
('001343', '000002', 'MOHAMADARISSETIAWANI', '21112021', '0', '2019-01-25 10:18:58'),
('001344', '000002', 'AKBARWAHYUALAMSYAH', 'DILARANGMASUK', '0', '2019-01-25 10:24:36'),
('001345', '000002', 'KholisMushthofa', 'countonyou', '0', '2019-01-25 10:47:03'),
('001346', '000002', 'YudhistiraA.', 'PANCHO1996', '0', '2019-01-25 11:06:27'),
('001347', '000002', 'MUHAMADRIZKI', 'HARJAMUKTI420', '0', '2019-01-25 11:35:15'),
('001348', '000002', 'TIYASSULISSETYAWATI', 'kunyuk03', '0', '2019-01-25 13:51:02'),
('001349', '000002', 'GABBYLEONIAULIA', 'GABBYLEONI', '0', '2019-01-25 14:22:20'),
('001350', '000002', 'HANISHA', 'disnaker2019', '0', '2019-01-25 14:34:47');
INSERT INTO `msuser` (`IDUser`, `IDJenisUser`, `Username`, `Password`, `session_id`, `RegisterDate`) VALUES
('001351', '000002', 'lussygiovanicedli', 'giovani22', '0', '2019-01-25 15:39:11'),
('001352', '000002', 'bambang', 'bambang25', '0', '2019-01-28 08:32:41'),
('001353', '000002', 'MELLYAWATICHANDRAKUS', 'MELLYA1997', '0', '2019-01-28 09:34:02'),
('001354', '000002', 'SUSYSUSILAWATI', '271276', '0', '2019-01-28 09:41:21'),
('001355', '000002', 'LIAFITRIYANI', 'lf250494', '0', '2019-01-28 09:47:35'),
('001356', '000002', 'NASRULLOH', '030779', '0', '2019-01-28 10:01:26'),
('001357', '000002', 'ACHMADCHUDORI', 'Chudori76', '0', '2019-01-28 10:12:05'),
('001358', '000002', 'SAMSUDIN', '02091978', '0', '2019-01-28 10:18:45'),
('001359', '000002', 'WAHYUSASONGKO', '23031998', '0', '2019-01-28 10:29:40'),
('001360', '000002', 'RADENIQBALKALBARDI1', 'IQBAL', '0', '2019-01-28 10:41:42'),
('001361', '000002', 'IKALOLITAPUSPASARIPU', 'KARTUKUNING123', '0', '2019-01-28 10:48:19'),
('001362', '000002', 'BURHANUDIN', 'BURHANUDIN', '0', '2019-01-28 10:54:37'),
('001363', '000002', 'ADILPRAKOSO', '14111995', '0', '2019-01-28 10:59:42'),
('001364', '000002', 'ANUSAKERTAADIWIJAYA', '16101998', '0', '2019-01-28 11:08:38'),
('001365', '000002', 'DINIARIANJANI', 'MMPOJLSM', '0', '2019-01-28 11:10:46'),
('001366', '000002', 'ENTISFITRIASI', '260491', '0', '2019-01-28 11:17:17'),
('001367', '000002', 'tamadudin', 'cinere123', '0', '2019-01-28 11:20:34'),
('001368', '000002', 'INDAHKURNIASARI', 'INDAH123', '0', '2019-01-28 11:34:02'),
('001369', '000002', 'LATIFFAZRIN', 'LATIF123', '0', '2019-01-28 11:43:23'),
('001370', '000002', 'SOFIANINGRUM', '713510ARUM', '0', '2019-01-28 11:51:08'),
('001371', '000002', 'RAHMAPUSPITASARI', 'AKPERFATMAWATI123', '0', '2019-01-28 11:58:49'),
('001372', '000002', 'BAHARAJATAMPUBOLON', 'hAMADITANJUNG', '0', '2019-01-28 12:08:41'),
('001374', '000002', 'EUISMAYMELANI', 'RAFASYAH', '0', '2019-01-28 12:30:28'),
('001375', '000002', 'M.MASRUCHANALFATQI', 'Masruchan354', '0', '2019-01-28 12:38:45'),
('001376', '000002', 'RHESANUGRAHA', 'SHINZOKUKANKE1', '0', '2019-01-28 12:46:59'),
('001377', '000002', 'MUSLIYAHELSA', 'MUSNUMUT', '0', '2019-01-28 12:56:10'),
('001383', '000002', 'RIHAYANTI', 'RIHAYANTI99', '0', '2019-01-28 14:12:17'),
('001379', '000002', 'ALIMAHNUZULIYAWATI', 'LEGRA1706', '0', '2019-01-28 13:41:40'),
('001380', '000002', 'AKMALMAHDIFURQON', 'akmalmahdi20', '0', '2019-01-28 13:43:42'),
('001381', '000002', 'TRIHANDAYANI', '168833', '0', '2019-01-28 13:51:14'),
('001382', '000002', 'DIANNURJANAH', '19101992', '0', '2019-01-28 13:57:56'),
('001386', '000002', 'LADISLAUSRYANNIROTUM', 'LADISLAUS23', '0', '2019-01-28 14:43:46'),
('001385', '000002', 'EVICHRISTINASINAGA', 'godbless07', '0', '2019-01-28 14:28:57'),
('001390', '000002', 'AJIAGUSTIN2', 'AJIAGUSTIN123', '0', '2019-01-29 09:53:18'),
('001388', '000002', 'OCTAVIANI', '1313131313', '0', '2019-01-29 09:33:21'),
('001389', '000002', 'ROHIDA', 'IDA12345', '0', '2019-01-29 09:45:09'),
('001391', '000002', 'DIANCHRISTIMARPAUNG', 'MARPAUNG', '0', '2019-01-29 10:04:52'),
('001392', '000002', 'LEONARDOHUTABARAT', 'ORBIT101017', '0', '2019-01-29 10:17:40'),
('001393', '000002', 'DEFIRNAINDAH', 'firna1112', '0', '2019-01-29 10:23:27'),
('001394', '000002', 'EKAANDONASOCHA', 'oNAR1907', '0', '2019-01-29 10:29:11'),
('001395', '000002', 'ADEPUTRAADJIPANGESTU', 'JAKARTA', '0', '2019-01-29 10:42:40'),
('001396', '000002', 'BADRIAHINDARWATI', 'KEPOBANGET', '0', '2019-01-29 11:01:32'),
('001397', '000002', 'SUGITAASAFITRI', 'SUGITA06', '0', '2019-01-29 11:09:39'),
('001398', '000002', 'ANEPIWULANDARI', 'ANEPI12345', '0', '2019-01-29 11:19:56'),
('001399', '000002', 'RYOFACHRUZI', 'RYOFACHRUZI123', '0', '2019-01-29 11:32:54'),
('001400', '000002', 'IMPROVIA', 'viadanis0217', '0', '2019-01-29 12:00:22'),
('001401', '000002', 'DITATRIANA', 'AKUKAMU12', '0', '2019-01-29 13:09:08'),
('001402', '000002', 'ARINIWULANDARISURYON', 'akupintar111096A', '0', '2019-01-29 13:49:11'),
('001403', '000002', 'FERDIANTONI', 'THEWINNER', '0', '2019-01-29 14:37:49'),
('001404', '000002', 'HELENPUSPITADEWI', 'helenpd14', '0', '2019-01-30 09:21:34'),
('001405', '000002', 'DESIMIRANTICITRANITY', '101015', '0', '2019-01-30 10:04:03'),
('001406', '000002', 'IMAMGHOZALI', '21April98!', '0', '2019-01-30 10:11:36'),
('001407', '000002', 'GIRHANIFAMRIYUNDA', 'Labrys14', '0', '2019-01-30 10:19:23'),
('001408', '000002', 'CIPTAALAMSYAH', 'atharizz111213', '0', '2019-01-30 10:29:09'),
('001409', '000002', 'MOHAMMADNIZARULLAH', 'depok53', '0', '2019-01-30 10:34:45'),
('001410', '000002', 'FENDITADWIYOGAANGGRA', 'KEPERAWATAN', '0', '2019-01-30 10:41:50'),
('001411', '000002', 'SITIJOLEKHA', 'pastiselalusukses1', '0', '2019-01-30 11:04:01'),
('001412', '000002', 'MUJAHIDULFAKAR', 'bassal711', '0', '2019-01-30 11:13:38'),
('001413', '000002', 'STEVANNYMAWADDAH', 'vannycantik', '0', '2019-01-30 11:26:11'),
('001414', '000002', 'ALFANALFARIZI', 'ALFAN1717', '5d358f2f45ced82a702999e80f44d397', '2019-01-30 11:56:22'),
('001415', '000002', 'IRFANFAUZI', '123456', '0', '2019-01-30 12:29:35'),
('001416', '000002', 'lfiansyaharifin', 'souvregnty53', '0', '2019-01-30 12:34:26'),
('001417', '000002', 'FADLIMUBAROK', '05031996', '0', '2019-01-30 13:28:48'),
('001418', '000002', 'MDEDENBAHRUDIN', '403227', '0', '2019-01-30 13:34:10'),
('001810', '000002', 'Debynabila', 'debynabila5', '0', '2019-03-14 13:13:07'),
('001420', '000002', 'RISMAWATI', '10JANUARI', '0', '2019-01-31 09:22:01'),
('001421', '000002', 'TRIANISIHOTANG1', '290783', '0', '2019-01-31 09:34:10'),
('001422', '000002', 'SEPTIEKASARI1', '123456', '0', '2019-01-31 09:40:12'),
('001423', '000002', 'ELVISAHARA', '@ELVI', '0', '2019-01-31 09:52:45'),
('001424', '000002', 'ASTIKUSTRIYANA', 'asti14', '0', '2019-01-31 10:01:10'),
('001425', '000002', 'VIKYALAMSYAHPUTRA', 'JAKARTA15', '0', '2019-01-31 10:23:21'),
('001426', '000002', 'AISYAHAYUFITRIA', 'ayu123456', '0', '2019-01-31 10:25:02'),
('001427', '000002', 'SHAVIRAIWANDA', 'formasi1234', '0', '2019-01-31 11:17:18'),
('001428', '000002', 'ERNANDATYARPRATAMA', 'depsat176', '0', '2019-01-31 11:24:40'),
('001429', '000002', 'SYAWALFAZARDIANSYAH', '240616', '0', '2019-01-31 12:03:04'),
('001430', '000002', 'LIDIATAMBUNAN', '1989Lidia', '0', '2019-01-31 13:23:56'),
('001431', '000002', 'KARIZKYFEBIARYANTO', 'kucinghalu', '0', '2019-01-31 13:53:02'),
('001432', '000002', 'MASROHILAH', 'hayatizahra', '0', '2019-01-31 14:06:20'),
('001433', '000002', 'ANNISARIZKIAANDRIANI', '001113', '0', '2019-01-31 14:15:54'),
('001436', '000002', 'TIARANURMALASARI', 'tiara', '0', '2019-01-31 14:43:12'),
('001435', '000002', 'M.RIVALDI', 'RIVALDI', '0', '2019-01-31 14:35:03'),
('001437', '000002', 'FABIENAMARIO', 'whatevergod', '0', '2019-01-31 14:48:47'),
('001438', '000002', 'YULIANADEWI', 'yulia', '0', '2019-01-31 14:53:49'),
('001439', '000002', 'MEDITRIASTANTO', '784712', '0', '2019-02-01 08:40:40'),
('001440', '000002', 'ANISADEANIRAPUTRI', 'PAGARIDE', '0', '2019-02-01 09:13:04'),
('001441', '000002', 'DEDE', 'DEDE', '0', '2019-02-01 09:23:33'),
('001442', '000002', 'PAMUJI', 'ADJIE100490', '0', '2019-02-01 10:04:24'),
('001443', '000002', 'DYAHAYUFATMAHANDAYAN', 'RASYA', '0', '2019-02-01 10:28:45'),
('001444', '000002', 'DWIGHINAYANTISAVITRI', '77833175', '0', '2019-02-01 10:36:58'),
('001445', '000002', 'ANDIKAFERDIANSAH', 'BURIK123', '0', '2019-02-01 10:50:11'),
('001446', '000002', 'FEBRIANA', '220290', '0', '2019-02-01 11:49:22'),
('001447', '000002', 'NURANNISAADHAPERTIWI', 'Cacacantik10', '0', '2019-02-01 12:03:04'),
('001448', '000002', 'Atiyakhairunisa', '08121996tia', '0', '2019-02-01 13:27:56'),
('001449', '000002', 'ALIFATUNNISA', 'S@kithati19', '0', '2019-02-01 13:46:24'),
('001450', '000002', 'TITIASRIMAYKESUMA', 'Maykesuma16', '0', '2019-02-01 13:59:00'),
('001451', '000002', 'YULIANTO', 'CIM3NKC0OL', '0', '2019-02-01 14:18:12'),
('001452', '000002', 'MUHAMMADFIKRIEARR.E', 'FIKRI', '0', '2019-02-01 14:33:57'),
('001453', '000002', 'ANDRIANDEDEHANDIKA', 'ANDRIAN1', '0', '2019-02-01 15:24:00'),
('001454', '000002', 'DWINURCAHYO', 'dwinurcahyo', '0', '2019-02-01 15:47:17'),
('001455', '000002', 'MUHAMMADIQBALJ', 'mdjelzs011011', '0', '2019-02-01 16:18:38'),
('001456', '000002', 'nengsitizakiatunnupu', 'nupus15', '0', '2019-02-04 08:46:00'),
('001457', '000002', 'FITRIARAHAYU', 'UZZMA', '0', '2019-02-04 08:48:35'),
('001458', '000002', 'ArmanMaulanaSofyan', 'arman567', '0', '2019-02-04 09:00:53'),
('001459', '000002', 'YUNITA', 'yunita1406', '0', '2019-02-04 09:16:49'),
('001460', '000002', 'ANDRIYANSYAH', '040218', '0', '2019-02-04 09:25:51'),
('001461', '000002', 'HERLINMARININURLITAS', 'HERLIN28', '0', '2019-02-04 09:34:53'),
('001462', '000002', 'ESRAOKTAVIANIMANUNRU', 'ESRA1310', '0', '2019-02-04 10:13:50'),
('001463', '000002', 'REZAKALAMULLAH', 'REZA1999', '0', '2019-02-04 10:18:29'),
('001464', '000002', 'AHMADSUDARMA', 'AHMAD303', '0', '2019-02-04 10:30:59'),
('001468', '000002', 'CHITRAFANDARI', '020915', '0', '2019-02-04 10:58:39'),
('001466', '000002', 'IRARAMADHANI', 'iramadhani15', '0', '2019-02-04 10:45:25'),
('001467', '000002', 'FERRAOKTAVIANI', 'KLMNOPQRSTIRA', '0', '2019-02-04 10:48:29'),
('001469', '000002', 'NABILAHHANA', 'Lupa18817665', '0', '2019-02-04 11:03:48'),
('001470', '000002', 'ROMADONAGORITNAPUTRI', 'romadona17', '0', '2019-02-04 11:12:21'),
('001471', '000002', 'SherrenGitaMataheru', 'sherren54321', '0', '2019-02-04 11:24:46'),
('001472', '000002', 'AYUSOFIYANIKAMILAH', 'ayusofiyani123', '0', '2019-02-04 11:31:32'),
('001473', '000002', 'RISCHYALAMSYAH', 'MUTIARA12345', '0', '2019-02-04 11:45:48'),
('001474', '000002', 'RACHMATNAZARUDDIN', 'rachmat290688', '0', '2019-02-04 12:01:36'),
('001475', '000002', 'kartika2412', 'deva0606', '0', '2019-02-04 13:47:48'),
('001476', '000002', 'TUTURWINARNO', 'wien027', '0', '2019-02-04 14:47:57'),
('001477', '000002', 'ANDIKA', 'DEPOK123', '0', '2019-02-04 14:49:24'),
('001478', '000002', 'ADEALFAATHIR', 'AALZHAELANI13', '0', '2019-02-06 09:16:17'),
('001479', '000002', 'CARLAMARTHAMONGKOL', 'KEKE2018', '0', '2019-02-06 09:39:10'),
('001480', '000002', 'TRINURHANDAYANI', 'trycantik24', '0', '2019-02-06 10:01:39'),
('001481', '000002', 'TUTUTPUSPITASARI', 'PUSPITA30', '0', '2019-02-06 10:11:16'),
('001482', '000002', 'SOLIHIN', 'SOLIHIN', '0', '2019-02-06 10:18:43'),
('001483', '000002', 'Riskidwigunadi', 'riski', '0', '2019-02-06 10:39:30'),
('001484', '000002', 'DIANALESTARI', 'DIANALESTARI538', '0', '2019-02-06 10:46:24'),
('001485', '000002', 'WINDYNAVIRI05', '051194AKU', '0', '2019-02-06 10:52:20'),
('001486', '000002', 'JEFRIAPRIANA', 'GampangaJaQo', '0', '2019-02-06 10:59:32'),
('001487', '000002', 'ADEGUNAWAN', 'ag121284', '95912ade794f7797c12c17f49724a9c0', '2019-02-06 11:16:23'),
('001488', '000002', 'srisukardini', 'yattingoilei', '0', '2019-02-06 13:39:01'),
('001489', '000002', 'dewisekarayu', 'dewi2303', '0', '2019-02-06 13:47:07'),
('001490', '000002', 'retnoagustia', 'retnoagustia15', '0', '2019-02-06 13:55:57'),
('001491', '000002', 'KIKIZAKIAH', 'MIKROORGANISME', '0', '2019-02-06 14:06:21'),
('001492', '000002', 'rosmalinda', '265004', '0', '2019-02-06 14:41:18'),
('001493', '000002', 'ANANDAPURWOPUTRODEWA', 'bmwe46m3', '0', '2019-02-06 14:50:43'),
('001494', '000002', 'doniarisna', 'wildanar11', '0', '2019-02-06 14:54:49'),
('001495', '000002', 'YANUARBAGUSSANTOSA', '15514110195', '0', '2019-02-06 15:12:43'),
('001496', '000002', 'lukisambar', 'laptem35', '0', '2019-02-06 15:26:30'),
('001497', '000002', 'DINIATSHILAH', 'MAWARBERDURI', '0', '2019-02-07 08:27:00'),
('001498', '000002', 'ARIFADINUGROHO', 'ARIFWULAN', '0', '2019-02-07 09:13:42'),
('001499', '000002', 'RIZKIAMALIA', 'ogenkidesuka', '0', '2019-02-07 09:20:32'),
('001500', '000002', 'EuisPratiwi', 'eeuuiiss', '0', '2019-02-07 09:30:35'),
('001501', '000002', 'NURULISLAMIAH', 'uyuyislamiah', '0', '2019-02-07 09:42:44'),
('001502', '000002', 'SILLILUTHFIYANI', '13FEBRUARI', '0', '2019-02-07 09:53:39'),
('001503', '000002', 'REZADWIARRIDHO', '123REZAARIDHO', '0', '2019-02-07 10:09:02'),
('001504', '000002', 'DEAAMELIA', 'DEA01', '0', '2019-02-07 10:29:58'),
('001505', '000002', 'HERIGUSTICAESAR', '300897hgc', '0', '2019-02-07 10:37:41'),
('001506', '000002', 'MUHAMMADADIRUMANTO', '080808', '0', '2019-02-07 12:33:57'),
('001507', '000002', 'RIEFQIEMAULANA', 'E2611E11', '0', '2019-02-07 14:50:52'),
('001508', '000002', 'EKOVERIIRAWAN', '12345', '0', '2019-02-08 09:46:57'),
('001509', '000002', 'AZIZRIFALDO', 'IPAL100%', '0', '2019-02-08 09:54:34'),
('001510', '000002', 'AMIRHAMZAH', '4mir', '0', '2019-02-08 11:03:44'),
('001511', '000002', 'DEFFISEPLIANTI', 'MEMBERCDC', '0', '2019-02-08 14:27:56'),
('001512', '000002', 'TRICAHYODESANTORO', 'TRICAHYO', '0', '2019-02-11 11:41:51'),
('001513', '000002', 'CITRAARDIYANTO', '110898', '0', '2019-02-11 12:04:35'),
('001514', '000002', 'M.WAHYUSAPUTRA', 'pramuka123', '0', '2019-02-11 12:25:09'),
('001515', '000002', 'RIZKYPRATAMA', 'AKIL1998', '0', '2019-02-11 12:29:07'),
('001516', '000002', 'NOVIANIDWI', 'DWI051196', '0', '2019-02-11 14:08:07'),
('001517', '000002', 'UTARINOOR', 'utari1996', '0', '2019-02-11 14:14:27'),
('001518', '000002', 'FRIDAROTUA', '123456', '0', '2019-02-11 14:21:49'),
('001519', '000002', 'SHAHEBHACHAMELLYA', 'SHAHEBHA1997', '0', '2019-02-11 14:29:50'),
('001520', '000002', 'RENDHY', '26199405', '0', '2019-02-11 14:35:02'),
('001521', '000002', 'ENDANGNUGRAHENY', '23061980', '0', '2019-02-12 08:43:26'),
('001522', '000002', 'EMANOVIANTIPRAMUDIA', 'KAZIDEFA', '0', '2019-02-12 10:31:34'),
('001523', '000002', 'DENIWAHYUDI1', 'IMELKA', '0', '2019-02-12 11:45:56'),
('001524', '000002', 'FEBRIRAMADAN', 'FEBRIRAMADAN', '0', '2019-02-12 14:02:34'),
('001525', '000002', 'ASTIDETIROSMAYANTI', '14OKTOBER1994', '0', '2019-02-12 14:11:02'),
('001526', '000002', 'WINARTOHARISUSENO', '26101975', '0', '2019-02-12 14:36:03'),
('001527', '000002', 'HIKMAHAMALIA', '123hikmah08', '0', '2019-02-13 10:17:58'),
('001528', '000002', 'NINUAMBARWATI', '123456789', '0', '2019-02-13 10:26:35'),
('001529', '000002', 'EDYSYAHPUTRA', 'katasandipt', '0', '2019-02-13 10:56:11'),
('001530', '000002', 'LISENSUPRIADI', '19SEPTEMBER1999', '0', '2019-02-13 11:46:27'),
('001531', '000002', 'AYUBJUANDAIDHAM', 'AYUBJUANDA', '0', '2019-02-13 14:07:15'),
('001532', '000002', 'JULIANAHANORSIAN', '170577', '0', '2019-02-14 10:16:06'),
('001533', '000002', 'NURJANAHMEDIANA', 'NURJANAH14', '0', '2019-02-14 10:25:01'),
('001534', '000002', 'WITRIEVELIA', 'SEBELAS7', '0', '2019-02-14 10:32:47'),
('001535', '000002', 'RASSYABUNGANABILLA', 'RASSYA4', '0', '2019-02-14 10:37:03'),
('001536', '000002', 'RUSDIHEKSANA', '082324130809', '0', '2019-02-14 11:39:51'),
('001537', '000002', 'ELVIRAROSAINDRADI', 'ELVIRA95', '0', '2019-02-14 11:45:18'),
('001538', '000002', 'RIANGGAFATHURRAHMAN', '456789', '0', '2019-02-14 13:32:22'),
('001539', '000002', 'MUCHAMMADHENDRONURCH', 'SHERLOCK01', '0', '2019-02-14 13:47:46'),
('001540', '000002', 'IDRISFIRDAUS', 'FIRD4USIDRIS', '0', '2019-02-15 09:46:13'),
('001541', '000002', 'DITAAYULESTARI', 'DEPOK1998', '0', '2019-02-15 13:44:20'),
('001542', '000002', 'FEBRIANSAYH', '13021996', '0', '2019-02-15 16:13:20'),
('001543', '000002', 'KUSNIAWATI', 'KUSNIAWATI', '0', '2019-02-18 09:12:26'),
('001544', '000002', 'MUHAMMADYASIN1', 'YASINAJA', '0', '2019-02-18 09:23:28'),
('001545', '000002', 'HERMAWAN', 'HERMAWAN', '0', '2019-02-18 09:57:51'),
('001546', '000002', 'YOGAYANUARDIPRATAMA', 'YOGAYANUARDI', '0', '2019-02-18 10:11:57'),
('001547', '000002', 'MUHAMMADDAFFAPRAHAST', 'KEPOLO1234A', '0', '2019-02-18 10:17:47'),
('001548', '000002', 'Apriyadi', 'bangke', '0', '2019-02-18 10:26:23'),
('001549', '000002', 'MOSESSITORUSPANE', 'MOSES1508', '0', '2019-02-18 10:39:38'),
('001550', '000002', 'MOCHAMADULVANRUKMAN', '19071995', '0', '2019-02-18 11:37:07'),
('001551', '000002', 'TRIFERISETIAWAN', 'triferi19', '0', '2019-02-18 11:40:36'),
('001552', '000002', 'ANANDAFIRDAUS', 'AKUSAYANGKAMU', '0', '2019-02-18 11:54:18'),
('001553', '000002', 'LISTYANIAGUSSAPUTRI', 'LISTYANI27', '0', '2019-02-18 12:06:02'),
('001554', '000002', 'DEKATRIYANTO', '123456789', '0', '2019-02-18 13:32:25'),
('001555', '000002', 'SAVIRASYIFAKAHFIYAND', 'SAVIRA98', '0', '2019-02-19 10:02:31'),
('001556', '000002', 'YanaAndika', 'andikayana1928', '0', '2019-02-19 10:12:01'),
('001557', '000002', 'AHMADAFFANDI', 'DINARA', '0', '2019-02-19 11:01:45'),
('001558', '000002', 'ABDMALIK', '02081981', '0', '2019-02-19 11:19:50'),
('001559', '000002', 'FAQIHFADHILAHHARAKI', 'FAQIH8', '0', '2019-02-19 11:29:45'),
('001560', '000002', 'GALIHPANTYOIRVANDARI', 'talisepatu', '0', '2019-02-19 11:39:52'),
('001561', '000002', 'RONYEFFENDI', 'ANAYRONI19', '0', '2019-02-19 14:14:49'),
('001562', '000002', 'ANDINI', 'ISLAMBANGET', '0', '2019-02-20 09:54:05'),
('001563', '000002', 'UBAIDKULWIIBROHIM', 'Ubaykulwiibrohim1233', '0', '2019-02-20 10:09:22'),
('001564', '000002', 'AHMADRIZKYKURNIAWAN', 'RIZKY2000', '0', '2019-02-20 10:23:31'),
('001565', '000002', 'Dekamylia', 'Dekdek17', '0', '2019-02-20 10:36:08'),
('001566', '000002', 'EGISUPRIYANTO', 'JELASKEREN1998', '0', '2019-02-20 10:58:55'),
('001567', '000002', 'SHAFREZAALFASHHAN', '021899', '0', '2019-02-20 13:38:42'),
('001568', '000002', 'AJICANDRASAPUTRA', '20062000', '0', '2019-02-21 12:04:38'),
('001569', '000002', 'AGUNGKARUNIAFIRDAUS', 'BISMILLAH123', '0', '2019-02-21 14:20:18'),
('001570', '000002', 'REHANASFAHANIALFARIZ', 'FACEBOOK12', '0', '2019-02-21 14:49:13'),
('001571', '000002', 'DIMASPAMUNGKAS', 'MEMEK243', '0', '2019-02-21 15:01:54'),
('001572', '000002', 'AHMADBAYURUWAHDI', 'a02191169413', '0', '2019-02-21 15:07:18'),
('001573', '000002', 'YANIPURWATI', 'YANI1717', '0', '2019-02-21 15:38:38'),
('001574', '000002', 'PUTRIULAYYA', 'PUTRIULAYYA', '0', '2019-02-21 15:42:47'),
('001575', '000002', 'ANISAMARA', 'ANISAMARA', '0', '2019-02-21 15:46:55'),
('001576', '000002', 'NURANNISAALIFIABORUN', 'NURANNISA', '0', '2019-02-21 15:52:02'),
('001577', '000002', 'MARIATULQIBTIAH', 'MARIATULQIBTIAH', '0', '2019-02-21 15:56:45'),
('001578', '000002', 'FAUZIAHKHAIRULNISAH', 'FAUZIAH', '0', '2019-02-21 16:00:36'),
('001579', '000002', 'RAHMAHFI\'AH', 'RAHMAH', '0', '2019-02-21 16:04:36'),
('001580', '000002', 'PUTRIDWIWAHYUNI', 'PUTRIDWI', '0', '2019-02-21 16:09:10'),
('001581', '000002', 'RAFTIAGUSTIANTI', 'RAFTI', '0', '2019-02-21 16:16:14'),
('001582', '000002', 'SITIKHOFIFAH', 'SITI', '0', '2019-02-21 16:17:36'),
('001583', '000002', 'DELIANAPUSPITASARI', 'DELIA', '0', '2019-02-22 09:14:05'),
('001584', '000002', 'AdzraAzizah', 'adzra14', '0', '2019-02-25 13:27:40'),
('001585', '000002', 'lismawati', 'lisma1305', '0', '2019-02-25 13:28:37'),
('001586', '000002', 'ayuazurah', 'soldout', '0', '2019-02-25 13:29:35'),
('001587', '000002', 'WILLIASAFITRI', 'safitri88', '0', '2019-02-25 13:34:06'),
('001588', '000002', 'FhikaAliyaGunawan', 'fhikaa18', '0', '2019-02-25 13:36:06'),
('001589', '000002', 'sitiputerigaluhkinan', 'galuh02', '0', '2019-02-25 13:37:37'),
('001590', '000002', 'HERLINALOWRIYANTISTO', 'PISCES02', '0', '2019-02-25 13:39:34'),
('001591', '000002', 'latizan', 'tijan123', '0', '2019-02-25 13:43:52'),
('001592', '000002', 'BAYUPRASETYO', 'BAYUPRASETYO112', '0', '2019-02-25 13:47:52'),
('001593', '000002', 'NOVIADAMAYANTI', '12345678', '0', '2019-02-25 14:09:39'),
('001594', '000002', 'SUTIANADESTIE', 'APAAJABOLEH17', '0', '2019-02-25 14:26:38'),
('001595', '000002', 'GARNET', 'puridepokmasbb9', '0', '2019-02-25 14:40:43'),
('001596', '000002', 'adeliarahayu', 'adelia10', '0', '2019-02-25 15:06:21'),
('001597', '000002', 'PUTRIARDIYANTI', 'ARDIYANTI06', '0', '2019-02-25 15:09:20'),
('001598', '000002', 'JELITANURHOTIMAH', 'JELITA123', '0', '2019-02-26 08:21:53'),
('001599', '000002', 'CUTDITHAAMANDA', 'cutditha', '0', '2019-02-26 08:55:25'),
('001600', '000002', 'RISCAPUSPITASARI', '199002', '0', '2019-02-26 08:57:47'),
('001601', '000002', 'DARMASUKMAWAN', '18JUNI2018', '0', '2019-02-26 09:17:19'),
('001602', '000002', 'NOVITASARI', 'NOVITA36', '0', '2019-02-26 09:57:19'),
('001603', '000002', 'GIARYULIANTO', 'GIARYULIANTO', '0', '2019-02-26 10:13:56'),
('001604', '000002', 'MUHAMMADSAFEI', 'MUHAMMADSAFEI', '0', '2019-02-26 10:23:31'),
('001605', '000002', 'IFALDIALIASA', 'IFALDI', '0', '2019-02-26 10:25:25'),
('001606', '000002', 'ANDREYKURNIAWAN', 'ANDREYKURNIAWAN', '0', '2019-02-26 10:27:00'),
('001607', '000002', 'SYLVIASALSHABILLA', 'SILPIA1403', '0', '2019-02-26 11:02:25'),
('001608', '000002', 'SoluIrawati', 'soluirawati', '0', '2019-02-26 11:05:21'),
('001609', '000002', 'SYLVIASALSHABILLA1', 'silpia1403', '0', '2019-02-26 11:29:05'),
('001610', '000002', 'vidyatriocssy', '24Agustus1995', '0', '2019-02-26 11:34:16'),
('001611', '000002', 'RANTINOVIANI1', '12112000', '0', '2019-02-26 12:03:14'),
('001612', '000002', 'ANTINIDWIJAYANTI1', 'ANTINI26', '0', '2019-02-26 12:04:29'),
('001613', '000002', 'Antinidwijayanti', 'antini26', '0', '2019-02-26 12:04:53'),
('001614', '000002', 'RINAANZELA1', 'RINA2001', '0', '2019-02-26 12:08:41'),
('001615', '000002', 'rayiashar', 'rayi', '0', '2019-02-26 12:11:22'),
('001616', '000002', 'JULIANTO1', 'DEPOK2000', '0', '2019-02-26 12:16:58'),
('001617', '000002', 'zolla112', 'zolla02', '0', '2019-02-26 12:18:06'),
('001618', '000002', 'MARCELLINOMALDINI', 'SWITZERLAND', '0', '2019-02-26 13:31:57'),
('001619', '000002', 'HARISKISETYONUGROHO1', 'hariski22', '0', '2019-02-26 13:35:58'),
('001620', '000002', 'RAHMAHFEBRIYANTI', 'febriyanti', '0', '2019-02-26 13:42:55'),
('001621', '000002', 'MUHAMMADRAKAAFIFUDIN', 'RAKAAFIF29', '0', '2019-02-26 13:43:37'),
('001622', '000002', 'TITIKNURLIMA', 'CAHAYA318', '0', '2019-02-26 13:45:54'),
('001623', '000002', 'PUTRIDARYANTI', 'PUTRI2606', '0', '2019-02-26 13:53:34'),
('001624', '000002', 'TALINA', 'INAAJA231', '0', '2019-02-26 13:58:46'),
('001625', '000002', 'IRMAMELATI', 'irma', '0', '2019-02-26 14:37:03'),
('001626', '000002', 'Dearahmadani', 'dhearahma', '0', '2019-02-26 15:06:18'),
('001627', '000002', 'SAIPULBAHRI', '23122014', '0', '2019-02-27 09:26:58'),
('001628', '000002', 'HESTIINDAHPRATIWI', 'HESTIINDAH', '0', '2019-02-27 09:29:15'),
('001629', '000002', 'AJIDJULIANSYAH', '02141766715', '0', '2019-02-27 09:39:24'),
('001630', '000002', 'NABILAHRISMAWATI', 'SKANDALZ', '0', '2019-02-27 10:21:24'),
('001631', '000002', 'NABILAANGGITAPUTRI', '05SEPTEMBER2000', '0', '2019-02-27 10:22:25'),
('001634', '000002', 'PUTRIHANDAYANI', 'HANDAYANIPUTRI', '0', '2019-02-27 10:58:41'),
('001633', '000002', 'BAGUSDANUNAUFALMURTA', 'BAGUSDANU', '0', '2019-02-27 10:31:09'),
('001635', '000002', 'ABDULAZIZ', 'ABDULAZIZ', '0', '2019-02-27 10:59:57'),
('001636', '000002', 'MUHAMMADROMADHAN', '123456', '0', '2019-02-27 11:00:58'),
('001637', '000002', 'RIZIKISKHODIMAH', '23498NOK', '0', '2019-02-27 11:08:03'),
('001638', '000002', 'ROHILI', 'ROHILI', '0', '2019-02-27 11:26:58'),
('001639', '000002', 'SISKADWIRAHAYU', '1207DWIRAHAYU', '0', '2019-02-27 11:53:27'),
('001640', '000002', 'NURAMALIA', 'NURAMALIA', '0', '2019-02-27 12:29:45'),
('001641', '000002', 'RANIANGGARENI', 'SMKFAJAR112', '0', '2019-02-27 13:19:37'),
('001642', '000002', 'SABDAMULIASIMBANONO', '09062001', '0', '2019-02-27 13:19:57'),
('001643', '000002', 'VANIADESTIANADEVY', 'VANIADESTIANA10', '0', '2019-02-27 13:22:43'),
('001644', '000002', 'RIRINYULIANTI', 'YULIANTI', '0', '2019-02-27 13:23:19'),
('001645', '000002', 'PUTRIAMELIA', 'INSPIRASI', '0', '2019-02-27 13:28:46'),
('001646', '000002', 'ANGGIARMANDAPUTRI', '21072001', '0', '2019-02-27 13:33:46'),
('001647', '000002', 'DESYAAFRIYANISAFITRI', 'DESEMBER17', '0', '2019-02-27 13:40:34'),
('001648', '000002', 'DEASAFITRI', 'DEADEA', '0', '2019-02-27 13:40:45'),
('001649', '000002', 'FITRIANISAPUTRI', 'FITRIIJEKI', '0', '2019-02-27 13:46:48'),
('001650', '000002', 'SITIKHODIJAH', 'KODIJAH11', '0', '2019-02-27 13:47:32'),
('001651', '000002', 'AMELIAWULANDARI', 'AMELIA123', '0', '2019-02-27 13:53:22'),
('001652', '000002', 'MEILANIPRATIWI', 'mellan48', '0', '2019-02-27 13:53:42'),
('001653', '000002', 'MANDATIRANA', 'TIRANAMANDA', '0', '2019-02-27 14:00:01'),
('001654', '000002', 'ALFINAKHOIRUNI', 'FINAPIPAO', '0', '2019-02-27 14:01:13'),
('001655', '000002', 'ADELUTFIAH', 'ADELUTFIAH', '0', '2019-02-27 14:05:29'),
('001656', '000002', 'WANDASAFITRI', 'WNDSFTR', '0', '2019-02-27 14:08:36'),
('001657', '000002', 'hairulanwar', 'hairul99', '0', '2019-02-28 08:52:10'),
('001658', '000002', 'MAYARUBIANDINI', 'Semangatmaya8', '0', '2019-02-28 09:10:20'),
('001659', '000002', 'Randamanali', 'randa123', '0', '2019-02-28 09:48:03'),
('001660', '000002', 'nabillaananda', 'nabila02', '0', '2019-02-28 09:53:19'),
('001661', '000002', 'DIMASDAMARAPUTRA', 'Dahlia20', '0', '2019-02-28 10:02:07'),
('001662', '000002', 'AULIARAHMAWATI1', 'aulia3010', '0', '2019-02-28 10:08:16'),
('001663', '000002', 'GUGUM', 'zerman24', '0', '2019-02-28 11:17:44'),
('001664', '000002', 'AYUPUSPITA1', '16071995', '0', '2019-02-28 11:47:20'),
('001665', '000002', 'AUDREYEUGENIAROSWITA', 'AUDREY30', '0', '2019-02-28 13:24:05'),
('001666', '000002', 'NURFAJRIAHMACHMUD', 'JIAHMANIS', '0', '2019-02-28 13:32:54'),
('001667', '000002', 'ANISAFEBRIYANTI', '27FEBUARI2001', '0', '2019-02-28 13:33:46'),
('001668', '000002', 'NURKOMALASARI', 'NURKOMALA', '0', '2019-02-28 13:38:43'),
('001669', '000002', 'IMAMMUNANDARHASIBUAN', 'selamanya', '0', '2019-02-28 13:43:03'),
('001670', '000002', 'ADINDANOVELIA', 'dinda0987', '0', '2019-02-28 13:52:33'),
('001671', '000002', 'DIMASTRIAWAN', 'TRISAF22', '0', '2019-02-28 14:02:10'),
('001672', '000002', 'TIARADINASAPITRI', 'RAWAINDAH', '0', '2019-02-28 15:09:43'),
('001673', '000002', 'ACHMADPATONI', '123456', '0', '2019-03-01 10:41:17'),
('001674', '000002', 'CHOIRUSSANI', 'choirussani', '0', '2019-03-01 12:23:48'),
('001675', '000002', 'HIDAYAHTULLOH', 'hidayahtulloh', '0', '2019-03-01 12:25:08'),
('001691', '000002', 'yeniriyana', '1616', '0', '2019-03-05 13:27:00'),
('001677', '000002', 'donifadilah', '1234', '0', '2019-03-04 08:41:59'),
('001678', '000002', 'TITINNURCAHYANI', 'CAHAYA', '0', '2019-03-04 09:12:40'),
('001679', '000002', 'ESUTRISNA', 'ABCD', '0', '2019-03-04 09:31:09'),
('001680', '000002', 'EVANCAHYONOPUTRA', 'NATANAELTRICAHYONO', '0', '2019-03-04 11:43:19'),
('001681', '000002', 'muhahamadcharmadi', 'doni123', '0', '2019-03-04 13:38:40'),
('001682', '000002', 'VATMAYUNITA', 'VATMAYUNITA', '0', '2019-03-04 13:48:52'),
('001683', '000002', 'ANISANURULAENI', '123456', '0', '2019-03-04 14:46:27'),
('001684', '000002', 'ANITALISTIROJABIAH', 'ROJABIAH95', '0', '2019-03-04 14:48:33'),
('001685', '000002', 'DEWISINTANIA', '010800', '0', '2019-03-04 14:57:36'),
('001686', '000002', 'GUNTURSAKAHYUDHA', 'GUNTURSAKA', '0', '2019-03-04 14:58:21'),
('001687', '000002', 'AKBARFRIYADI', '280515', '0', '2019-03-05 10:29:59'),
('001688', '000002', 'EDISAPUTRA1', '123456', '0', '2019-03-05 10:44:48'),
('001689', '000002', 'PRANITAYUANDA1', 'PRANITA2', '0', '2019-03-05 10:59:44'),
('001690', '000002', 'aderevarusdiana', 'test', '0', '2019-03-05 12:27:01'),
('001692', '000002', 'Candraningrum', 'erwinudung90', '0', '2019-03-05 15:00:12'),
('001693', '000002', 'DENAJENGHARISETYANIG', 'AMAJENG16', '0', '2019-03-06 09:33:49'),
('001694', '000002', 'FEBRIANABIDIN', 'febriana27', '0', '2019-03-06 09:54:44'),
('001695', '000002', 'CLAUDYASIAGIAN', 'hellocantik', '0', '2019-03-06 13:55:43'),
('001696', '000002', 'DONIFARDIANSYAH', 'DONIF434PL', '0', '2019-03-06 14:05:48'),
('001697', '000002', 'wahyutria', 'WAHYU', '0', '2019-03-06 14:07:38'),
('001698', '000002', 'JUANGHAVIKYSAGIDA', 'ghaviky212', '0', '2019-03-06 14:21:21'),
('001699', '000002', 'RAMLIHASYIM', '230363', '0', '2019-03-08 08:56:50'),
('001700', '000002', 'BOBIPRIMADANDI1', 'bobi2607', '0', '2019-03-08 09:23:00'),
('001701', '000002', 'FEBIPUTRILISTIANI', 'FEBIPUTRI', '0', '2019-03-08 10:21:34'),
('001702', '000002', 'NURAENI', 'NURAENI28', '0', '2019-03-08 10:28:30'),
('001703', '000002', 'NUREKAPANDIYANIPUTRI', 'NUREKAPANDIYANI', '0', '2019-03-08 10:36:44'),
('001704', '000002', 'ANNISAAYUBUDIMAN', 'annisaicha20', '0', '2019-03-08 11:12:02'),
('001705', '000002', 'MARDYANURPRAMESTI', 'mardya1306', '0', '2019-03-08 11:14:53'),
('001706', '000002', 'WILIAMWIJAYA', 'JELODINE18', '0', '2019-03-08 12:17:18'),
('001707', '000002', 'ERNIIRAWATI', '221219', '0', '2019-03-08 13:21:37'),
('001708', '000002', 'NURPUTERIINDAHRIZQI\'', '13121995', '0', '2019-03-08 13:24:15'),
('001709', '000002', 'SANDRODIMASANDARA', 'ANDARA', 'ec223961f9f612129605e6d5fe784c5b', '2019-03-08 14:20:13'),
('001710', '000002', 'RAMAPAUL', 'intermilan', 'dfd5bba4b45ed3635fa9c36888e3e915', '2019-03-11 08:34:44'),
('001711', '000002', 'RIKAFADDILLAH', 'RIKA', '0', '2019-03-11 10:01:03'),
('001712', '000002', 'NADYACITRAPUTRI', 'NADYA3095', '0', '2019-03-11 10:10:54'),
('001713', '000002', 'TIYASRATIHNINGSIH', '08122018', '0', '2019-03-11 10:16:13'),
('001714', '000002', 'MOHAMMADKALPIZIPANI', '300410', '0', '2019-03-11 11:01:58'),
('001715', '000002', 'WIWINWINARTI', 'DESEMBER', '0', '2019-03-11 11:14:15'),
('001716', '000002', 'anggiersasaputri', '23694aes', '0', '2019-03-11 12:27:52'),
('001717', '000002', 'IQBALFERGIAWAN', 'FERGIAWAN', '0', '2019-03-11 12:30:04'),
('001718', '000002', 'IMADEBOGABASKARA', 'BOGABASKARA123', '0', '2019-03-11 12:35:46'),
('001719', '000002', 'NANANGKOSIM', '777888', '0', '2019-03-11 13:13:46'),
('001720', '000002', 'ARNIKRISTYSIAGIAN', 'SIAGIAN', '0', '2019-03-11 13:24:34'),
('001721', '000002', 'MUSLIMAH', 'MUSLIMAH123', '0', '2019-03-11 13:39:03'),
('001725', '000002', 'ALIFAHPUTRIZAHRAHBUD', 'ALIFAHPUTRI15', '0', '2019-03-12 09:43:44'),
('001723', '000002', 'MULYANIH', '1308mully', '0', '2019-03-12 09:16:15'),
('001724', '000002', 'RiskaAulia', 'AULIAA098', '0', '2019-03-12 09:26:36'),
('001726', '000002', 'Khairunnisa', 'bewonderfuls22', '0', '2019-03-12 09:50:38'),
('001727', '000002', 'FEBRIANTO', 'FEBRIANTO', '0', '2019-03-12 11:17:21'),
('001728', '000002', 'Jati', '130284', '0', '2019-03-12 11:42:27'),
('001729', '000002', 'Irfanapif', '085880583605', '0', '2019-03-12 11:54:00'),
('001730', '000002', 'KHOIRULASWADINASUTIO', 'khoirul321', '0', '2019-03-12 12:28:49'),
('001731', '000002', 'CHRISTITANIOHANNYSET', 'KEPOBGT123', '0', '2019-03-12 13:47:05'),
('001732', '000002', 'TIARAWULANDARI', 'TIARA230593', '0', '2019-03-12 14:56:50'),
('001733', '000002', 'riswanto', '41215', '0', '2019-03-13 09:00:09'),
('001734', '000002', 'MuhammadFarhanFerdia', 'farhan352', '0', '2019-03-13 09:53:12'),
('001735', '000002', 'SIVAZIAH', '270672', '0', '2019-03-13 09:55:37'),
('001736', '000002', 'ADEIRMASUSILO', 'DESEMBER', '0', '2019-03-13 09:57:42'),
('001737', '000002', 'BekthiPramudyaRini', '24121995', '0', '2019-03-13 11:11:42'),
('001738', '000002', 'Maulidinanabita', 'dina123456', '0', '2019-03-13 13:54:23'),
('001739', '000002', 'EmiliyaNoviyanti', 'emilliyanovi', '0', '2019-03-13 14:27:39'),
('001740', '000002', 'Nikicitraprabawani', 'nikicitra101201', '0', '2019-03-13 14:36:38'),
('001741', '000002', 'NABILAFIRGIANTI', '31032001', '0', '2019-03-13 14:43:28'),
('001742', '000002', 'ASTERIUSARIKI', '2503kalbar', '0', '2019-03-13 14:45:22'),
('001743', '000002', 'YazidZidane', 'yazid123', '0', '2019-03-13 14:47:52'),
('001744', '000002', 'rizki', 'rizki2010', '0', '2019-03-13 14:49:37'),
('001745', '000002', 'AMELIA', '12345678', '0', '2019-03-13 14:52:23'),
('001746', '000002', 'Virginavida', 'jakarta01', '0', '2019-03-13 14:53:42'),
('001747', '000002', 'SindyMonica', 'sindymonica2001', '0', '2019-03-13 14:55:39'),
('001748', '000002', 'raturthh', 'ratu1234', '0', '2019-03-13 14:57:20'),
('001749', '000002', 'Galuhkirana', 'galuh321', '0', '2019-03-13 15:02:28'),
('001750', '000002', 'Suciambarsari', 'uci16juni2001', '0', '2019-03-13 15:07:30'),
('001751', '000002', 'Wikewidyalestari', 'wikekece', '0', '2019-03-13 15:09:33'),
('001752', '000002', 'Noviana_da', 'novianadwi', '0', '2019-03-13 15:11:18'),
('001753', '000002', 'AdeliaPutriRamadani', 'adelimut15', '0', '2019-03-13 15:13:07'),
('001754', '000002', 'dewiputri', 'putrii02', '0', '2019-03-13 15:18:27'),
('001755', '000002', 'Salsadeska', '16oktober2001', '0', '2019-03-13 15:20:41'),
('001756', '000002', 'NabillaRahmawati', '07122000', '7fcfae55a9f089b5af1c782e04f27735', '2019-03-13 15:23:52'),
('001757', '000002', 'Fadiyahandhani', 'fadiyah15', '0', '2019-03-13 15:25:44'),
('001758', '000002', 'Marlin', 'apayaaaaaa', 'b3f9922e78bacf4fbf966a5941bf0a21', '2019-03-13 15:28:04'),
('001759', '000002', 'Bimaapriansyah', 'bimaapr29', '0', '2019-03-13 15:29:48'),
('001760', '000002', 'HilalSaputra', 'lalz1866', '0', '2019-03-13 15:34:07'),
('001761', '000002', 'M.Iqbal', 'muhammadiqbal', '2c50b695cfb1940092f2381e76003ff2', '2019-03-13 15:38:51'),
('001762', '000002', 'Ridhomiftahuddin', 'ridho123', '0', '2019-03-13 15:41:17'),
('001763', '000002', 'ReemaSyakila', '73362***', '0', '2019-03-13 15:42:59'),
('001764', '000002', 'Donfrims23', 'edwzxosi1', '0', '2019-03-13 15:44:37'),
('001766', '000002', 'ahmadmuhzudi', '08juli2001', '0', '2019-03-13 15:48:04'),
('001765', '000002', 'FikihKurniawan', 'oktober1928', '9a018dbcfcae245a3bd2dc53cbfb517d', '2019-03-13 15:46:44'),
('001767', '000002', 'AlfitoDiennova', 'wingchun', '0', '2019-03-13 15:49:32'),
('001768', '000002', 'Andienzyp', 'andienzyp231803', '0', '2019-03-13 15:50:59'),
('001769', '000002', 'Fernandoaryo91@gmail', 'B46JLnando', '0', '2019-03-13 15:52:50'),
('001770', '000002', 'DEBBYAMIRARAHMI', 'kimjongin', '0', '2019-03-13 15:55:08'),
('001771', '000002', 'NurulHavifahSabilah', 'nurulhavifah', '0', '2019-03-13 15:56:27'),
('001772', '000002', 'Mugiono', 'mugi0109', '0', '2019-03-13 15:58:05'),
('001773', '000002', 'aisyahmaliha', 'alltheway', '0', '2019-03-13 15:59:23'),
('001774', '000002', 'Wandavalenia', 'wandaa1414', '0', '2019-03-13 16:00:38'),
('001775', '000002', 'ANDINIMEGANANDA', 'amanda2407', '0', '2019-03-13 16:02:23'),
('001776', '000002', 'farrasghinaaa', 'Desember2000', '0', '2019-03-13 16:03:38'),
('001777', '000002', 'Adeliadamayanti', 'tigabelas12', 'd986dcd20fee8f005c1bb5ea161d89b0', '2019-03-13 16:05:28'),
('001778', '000002', 'Rahayu', 'sazkia1234', '0', '2019-03-13 16:06:50'),
('001779', '000002', 'rahayujul', 'ningrum16', 'c19c0160f2eb88e7c9fbcc21fa4d5f52', '2019-03-13 16:07:11'),
('001780', '000002', 'khadjiatiamaraputri', '64714pr4t4m4', '0', '2019-03-13 16:08:51'),
('001781', '000002', 'Mardinah', '14mei2001', '0', '2019-03-13 16:10:46'),
('001782', '000002', 'Nabilacahya', 'sambel12', '0', '2019-03-13 16:12:10'),
('001783', '000002', 'Rizkynukoseptian', 'nuko2000', '0', '2019-03-13 16:13:27'),
('001784', '000002', 'yusuprohimat', 'rohimat190502', '592cbca6ebacf60522a2fc05d4c13e06', '2019-03-14 09:20:31'),
('001785', '000002', 'SINTHIANURUL', '030700snm', '22a175bb05a22e76f075b3ddbf8dd8e2', '2019-03-14 10:37:27'),
('001786', '000002', 'NURFAIDA', 'GEPECE246', '0', '2019-03-14 11:00:20'),
('001787', '000002', 'shintarahma', 'shintarahma', '5ccaccab6dd6182e4d0d4a43bc9809b5', '2019-03-14 11:25:04'),
('001788', '000002', 'sifaauliasari', 'setianegara23', '0', '2019-03-14 11:28:31'),
('001789', '000002', 'Liapitaloka', 'liliput', '0', '2019-03-14 11:38:20'),
('001790', '000002', 'RisaMeina', 'theway7d', '0', '2019-03-14 11:40:47'),
('001791', '000002', 'PutriDwiCahyani', 'putridwi24', '0', '2019-03-14 11:42:09'),
('001792', '000002', 'Meilyanasari', 'mautauaja060501', '0', '2019-03-14 11:45:19'),
('001793', '000002', 'MiaMarlina', 'setianegaraSNN', '0', '2019-03-14 11:46:37'),
('001794', '000002', 'MuhamadRiski', 'antenk234', '0', '2019-03-14 11:47:45'),
('001795', '000002', 'NurAnisaLarasati', '15082001', '0', '2019-03-14 11:51:22'),
('001796', '000002', 'dinicandaniamelia', '30maret2001', '0', '2019-03-14 11:54:01'),
('001797', '000002', 'dirgariyadi', 'rldirga501', '0', '2019-03-14 11:55:12'),
('001798', '000002', 'shintaaprianty', 'kepokan123', '0', '2019-03-14 12:04:35'),
('001799', '000002', 'Noviyulian1311@gmail', 'bendabarat13', '0', '2019-03-14 12:06:12'),
('001800', '000002', 'ranyaalifiaazzahra', 'ranyalifia20', '0', '2019-03-14 12:11:14'),
('001801', '000002', 'KaylaPutriA', '01july01', '0', '2019-03-14 12:12:46'),
('001802', '000002', 'Sapitri', 'biru456', '0', '2019-03-14 12:14:15'),
('001803', '000002', 'Ramadanirfansah', 'duapuluhsatu21', '0', '2019-03-14 12:17:04'),
('001804', '000002', 'Tikaayu_kaa', '16september', '0', '2019-03-14 12:18:42'),
('001805', '000002', 'TiaraNisa22', 'tiara123', '0', '2019-03-14 12:20:43'),
('001806', '000002', 'Saptariniokataviani', '1234567', '0', '2019-03-14 12:22:03'),
('001807', '000002', 'AnnisaNabila', 'nabila14', '0', '2019-03-14 12:23:53'),
('001808', '000002', 'serliramayandini', 'serli13', '0', '2019-03-14 12:25:14'),
('001809', '000002', 'Marhani', 'hanni2904', '0', '2019-03-14 12:26:37'),
('001811', '000002', 'Vanessaelvans', 'vanessa12', '0', '2019-03-14 13:20:29'),
('001812', '000002', 'Hestika', 'awawaw555', '69010af4c8d5be912bf36bcb0f9dc8a0', '2019-03-14 13:22:01'),
('001813', '000002', 'Yuliyanti', 'yuliyanti1407', '0', '2019-03-14 13:23:15'),
('001814', '000002', 'tifarisyi21', 'reveluv21', '0', '2019-03-14 13:30:05'),
('001815', '000002', 'Ratihmaulidinasanty', 'ratihmauli', '0', '2019-03-14 13:32:54'),
('001816', '000002', 'AlfeniaPuspaDewi', 'thebigbang', '0', '2019-03-14 13:36:16'),
('001817', '000002', 'Akbarpaujian', 'akbar123', '0', '2019-03-14 13:41:22'),
('001818', '000002', 'Agisvanesyaclaudinip', 'nevanesya', '0', '2019-03-14 13:43:16'),
('001819', '000002', 'Gledispermatadevi', 'Gledis14', '0', '2019-03-14 13:44:48'),
('001820', '000002', 'Tamaraamelia', 'Tamaraamelia123', '0', '2019-03-14 13:47:25'),
('001821', '000002', 'Sitinurhayati', 'sembarangan', '0', '2019-03-14 13:48:51'),
('001822', '000002', 'Indrilaraskusumawati', 'nilabranti', '0', '2019-03-14 13:50:04'),
('001823', '000002', 'ShelaAmelia', 'enambelas', '0', '2019-03-14 13:51:46'),
('001824', '000002', 'Gataridwiwulan', 'iyakenapa', '0', '2019-03-14 13:54:19'),
('001825', '000002', 'Zahra', 'rarazahra', '0', '2019-03-14 13:58:52'),
('001826', '000002', 'Graceyemima', 'netty', '0', '2019-03-14 14:00:19'),
('001827', '000002', 'Devinfabianrafirizki', 'devinganteng123456', '0', '2019-03-14 14:06:30'),
('001828', '000002', 'KemalIdris', 'dlh882kd44', '0', '2019-03-14 14:14:00'),
('001829', '000002', 'fachriafauhatuzahro', 'TAUSIAPA_', '0', '2019-03-14 14:15:32'),
('001830', '000002', 'Firmanbaguspurnomo', 'pitara12345', '0', '2019-03-14 14:17:10'),
('001831', '000002', 'Luckytaufikhidayatul', 'Abdullah2000', '0', '2019-03-14 14:18:54'),
('001832', '000002', 'AkbarRizkiAfrialdi', '08042001', '0', '2019-03-14 14:20:20'),
('001833', '000002', 'Ferdiirawan', 'otomatis', '0', '2019-03-14 14:21:42'),
('001834', '000002', 'Gadistyaaz-zahramagh', 'Gadistya2001', '0', '2019-03-14 14:22:54'),
('001835', '000002', 'Ivandricaesarionurha', 'kolonelyakiniku', '0', '2019-03-14 14:24:27'),
('001836', '000002', 'Galangardiansyah', 'galangard1515', '0', '2019-03-14 14:25:53'),
('001837', '000002', 'DeraFitriDestiana', 'asagitarius12', '0', '2019-03-14 14:28:23'),
('001838', '000002', 'HerawatiSerlyani', '250305', '0', '2019-03-14 14:29:51'),
('001839', '000002', 'Royardhani', '15112000', '0', '2019-03-14 14:32:29'),
('001840', '000002', 'Rianisaazizah', 'qwertyuiop', '0', '2019-03-14 14:39:32'),
('001841', '000002', 'Neydasa', 'neyda25', '0', '2019-03-14 14:44:58'),
('001842', '000002', 'Sheilatienlestari', 'mamaku135', '0', '2019-03-14 14:46:11'),
('001843', '000002', 'pmegakharisma', '14januari', '8e08dffe597e7634cecfca008c37f638', '2019-03-14 14:47:16'),
('001844', '000002', 'Vinkasrijayanti', 'vinka12345', '0', '2019-03-14 14:48:24'),
('001845', '000002', 'SafnaAulia', 'aulia1234', '0', '2019-03-14 14:49:30'),
('001846', '000002', 'NurMaulanaIbrahim', 'kawasakibajaj', '0', '2019-03-14 14:51:05'),
('001847', '000002', 'Allyaputri14', 'allyay123', '0', '2019-03-14 14:52:10'),
('001848', '000002', 'FitriahAndayani', 'sagitarius', '0', '2019-03-14 14:53:22'),
('001849', '000002', 'CindyAmelliyanah', 'cindy1408', '774a37414f57ff17168b0edf8cba2bb7', '2019-03-14 14:54:35'),
('001850', '000002', 'ShepiaRizkaMaharani', 'Taniaputri1', '0', '2019-03-14 14:55:42'),
('001851', '000002', 'Shafamahir', 'shafamahir12', '0', '2019-03-14 14:57:20'),
('001852', '000002', 'Adindahasnajatmiko', 'gamada19', '0', '2019-03-14 14:59:00'),
('001853', '000002', 'AFIFAH', 'fifaha699', '0', '2019-03-14 15:00:05'),
('001854', '000002', 'AlyaRaihanah', '81100makanan.', '0', '2019-03-14 15:01:27'),
('001855', '000002', 'Annisaasalmaanadara', 'bismillah^', '0', '2019-03-14 15:02:31'),
('001856', '000002', 'DeaChoirala', 'choirala123', '0', '2019-03-14 15:03:52'),
('001857', '000002', 'DITAAPRILIANNISA', 'ditaapr234', '0', '2019-03-14 15:05:11'),
('001858', '000002', 'ERINAFITRIANA', 'sawangan123', '0', '2019-03-14 15:06:22'),
('001859', '000002', 'Hafidzalfikri', 'miladilaamin', '0', '2019-03-14 15:11:39'),
('001860', '000002', 'Muhammadyusrilmahend', 'myusril12345', '0', '2019-03-14 15:13:17'),
('001861', '000002', 'NabilaAz-zahra', 'zahranabila20', '0', '2019-03-14 15:15:21'),
('001862', '000002', 'Novi_yanti', '300618Nov', '0', '2019-03-14 15:16:43'),
('001863', '000002', 'RahmawatiDewi', 'rahmafebrina', '0', '2019-03-14 15:46:47'),
('001864', '000002', 'Raniaryani', 'rani2001', '0', '2019-03-14 15:47:06'),
('001865', '000002', 'Syalwa', 'syalwa1524', '0', '2019-03-14 15:47:39'),
('001866', '000002', 'Syifaputrialtantri', 'Syifaputri17', '0', '2019-03-14 15:47:58'),
('001867', '000002', 'ventyaditasaputri', 'venventri08', '0', '2019-03-14 15:48:27'),
('001868', '000002', 'PUTRIWIANTI', 'CANTIK83', '0', '2019-03-15 15:44:58'),
('001869', '000002', 'DianFebriyana', '283030', '0', '2019-03-15 15:45:21'),
('001870', '000002', 'ALDAFERDINANSYAH', 'ALDA170717', '0', '2019-03-15 15:59:01'),
('001871', '000002', 'nurfitriani', 'jakarta04021996', '0', '2019-03-15 16:37:44'),
('001872', '000002', 'NOVEMIASERILESTARITA', 'MIAKU28111997', '0', '2019-03-18 08:04:26'),
('001873', '000002', 'PUTRIRAHAYU', 'PUTRI1497', '0', '2019-03-18 08:10:40'),
('001874', '000002', 'SITIKOMALASARI', '261196', '0', '2019-03-18 08:18:31'),
('001875', '000002', 'NURLIANABABAN', '123456', '0', '2019-03-18 08:23:13'),
('001876', '000002', 'JAELANI', '251289', '0', '2019-03-18 10:51:48'),
('001877', '000002', 'JUDIKASITOMPUL', 'PAPAMAMA', '0', '2019-03-18 11:21:48'),
('001878', '000002', 'FERDIANSYAH1', 'KAPALAPI', '9afc6c2a033cc8000218792ed6e572c8', '2019-03-18 11:41:22'),
('001879', '000002', 'MuhamadRayhan', 'rhn167941', '0', '2019-03-18 12:16:12'),
('001880', '000002', 'Riskanovalia', '123456', '0', '2019-03-18 15:14:31'),
('001881', '000002', 'ANDIVIKRYNIZAM', 'PERSIJA1928', '0', '2019-03-18 15:16:19'),
('001882', '000002', 'ADLYAPRILIADY', 'QWERTY11@', '0', '2019-03-19 08:19:16'),
('001883', '000002', 'skript023', '030023', '0', '2019-03-19 09:30:17'),
('001884', '000002', 'RIZKAHIKMARAMDHNA', 'HIKMA304', '0', '2019-03-19 10:20:17'),
('001885', '000002', 'rezaliswandi', 'liswandi', '0', '2019-03-19 10:39:26'),
('001886', '000002', 'RIFKIFAUZANHARDIANTO', 'TASYARIFKI25', '0', '2019-03-19 10:59:05'),
('001887', '000002', 'Deaaidayanti', 'deadeadea', '0', '2019-03-19 11:02:10'),
('001888', '000002', 'RISKA', '22071981', '0', '2019-03-19 11:57:44'),
('001889', '000002', 'DESINURSETYAWATI', 'MUSLIMAHSEJATI', '0', '2019-03-19 14:54:45'),
('001890', '000002', 'ihsankamil', 'Ihsan12345', '0', '2019-03-19 15:07:42'),
('001891', '000002', 'Haikalazisindrasetia', 'haicollo12', '0', '2019-03-19 15:10:02'),
('001892', '000002', 'ROMIRYANZAH', 'PERSIKADEPOK', '0', '2019-03-20 08:30:11'),
('001893', '000002', 'DANDIWAHYUDI', '251299', '0', '2019-03-20 09:09:53'),
('001894', '000002', 'ameliamaulidahidayat', '99999alawy', '0', '2019-03-20 09:18:17'),
('001895', '000002', 'ArisMunandar', 'beruang2701', '0', '2019-03-20 09:27:11'),
('001896', '000002', 'Daffantysyabillanura', '20daffanty', '0', '2019-03-20 09:30:28'),
('001897', '000002', 'FazriHidayat', '12345678', '0', '2019-03-20 09:33:28'),
('001898', '000002', 'Ichsanajie', 'evasium1212', '0', '2019-03-20 09:36:59'),
('001899', '000002', 'Ikawahyuni', 'wahyuniika22', '0', '2019-03-20 09:38:36'),
('001900', '000002', 'Julitaanastasya', '07juli01', '0', '2019-03-20 09:40:00'),
('001901', '000002', 'KinantiRachmadila', '180501', '0', '2019-03-20 09:41:50'),
('001902', '000002', 'Lindaindriana', '24februari', '0', '2019-03-20 09:43:50'),
('001903', '000002', 'MeliyanaPutri', '230500', '0', '2019-03-20 09:45:15'),
('001904', '000002', 'MetaDeliaAriyanti', 'deliameta31', '0', '2019-03-20 09:47:19'),
('001905', '000002', 'MonicaSeptiani', 'm0n1c4septiani', '0', '2019-03-20 09:49:14'),
('001906', '000002', 'RiestaIndriyani', 'riestaindriyani', '0', '2019-03-20 09:53:44'),
('001907', '000002', 'Riskadavagusni', 'riskariska', '0', '2019-03-20 09:56:24'),
('001908', '000002', 'SoffieLiantiSafitri', 'zafierefie20', '0', '2019-03-20 09:59:21'),
('001909', '000002', 'Yeniqoria', '01oktober', '0', '2019-03-20 10:00:56'),
('001910', '000002', 'Yunitanurhalizah', 'baejinyoung', '0', '2019-03-20 10:02:58'),
('001911', '000002', 'Almaulia', '290301au', '0', '2019-03-20 10:05:21'),
('001912', '000002', 'EKOSAFRIANTO', 'EKOPAULL', '9c8f16ace7330dd71fa3415f0244fcfa', '2019-03-20 10:06:26'),
('001913', '000002', 'Ahmadsaddammandala', 'wednessaday22', '0', '2019-03-20 10:10:51'),
('001914', '000002', 'AndreMeyetsonlima', 'mamapapa55', '0', '2019-03-20 10:14:30'),
('001915', '000002', 'AdeMardhiyah', 'ade21juli', '0', '2019-03-20 10:24:38'),
('001916', '000002', 'ADEAGUSTARI', 'GUSTAR673', '0', '2019-03-20 10:30:46'),
('001917', '000002', 'Anangrianto', 'anangr02', '0', '2019-03-20 10:32:08'),
('001918', '000002', 'wismalestianingsih', 'lestia21', '0', '2019-03-20 10:34:30'),
('001919', '000002', 'Apriyansyah', 'aprimade123', '0', '2019-03-20 10:38:48'),
('001920', '000002', 'aulyarestiana', 'aulyarst123', '0', '2019-03-20 10:41:55'),
('001921', '000002', 'NOVIANURJANAH', 'NOVIA123', '0', '2019-03-20 10:50:22'),
('001922', '000002', 'anitaapriyanti', 'ita1234', '0', '2019-03-20 10:53:06'),
('001923', '000002', 'DivaniPutriAisyah', '17102001', '0', '2019-03-20 10:57:59'),
('001924', '000002', 'Muhammadrevy', 'revy298', '0', '2019-03-20 11:00:34'),
('001925', '000002', 'Risakarunia', 'risa123', '0', '2019-03-20 11:03:03'),
('001926', '000002', 'Sahlazulfika', 'sahla1411', '0', '2019-03-20 11:09:20'),
('001927', '000002', 'Sekaradinda78@gmail.', 'kuatkuat', '0', '2019-03-20 11:13:45'),
('001928', '000002', 'Nabilaekaputri', 'nabila0612', '0', '2019-03-20 11:22:42'),
('001929', '000002', 'Nandadwilestari', 'nandadwilestari06', '0', '2019-03-20 11:29:00'),
('001930', '000002', 'RidhoKurniawan', 'ridho200495', '0', '2019-03-20 11:43:18'),
('001931', '000002', 'NisvadhiraAinaMadyar', 'nisvadhira', '0', '2019-03-20 13:26:37'),
('001932', '000002', 'RezakusumahArdiansya', 'kusumah634', '0', '2019-03-20 13:29:19'),
('001933', '000002', 'Sherenlibrani19', 'libranik19', '0', '2019-03-20 13:33:15'),
('001934', '000002', 'Tiara', 'akucantikbanget', '0', '2019-03-20 13:35:46'),
('001935', '000002', 'Anissalintangsaputri', '12345lolo', '0', '2019-03-20 13:42:56'),
('001936', '000002', 'Annisaalvi', 'Annisaalvi7', '0', '2019-03-20 13:47:22'),
('001937', '000002', 'GaluhAmeliaPutri', 'galuh2001', '0', '2019-03-20 13:52:11'),
('001938', '000002', 'risapermanasari.ps12', 'risapermanasari.ps12', '0', '2019-03-20 14:01:07'),
('001939', '000002', 'WidyaSyahfitriSirega', 'mpitcantik', '0', '2019-03-20 14:04:59'),
('001940', '000002', 'zoyaadinda', 'zoyaal1709', '0', '2019-03-20 14:07:56'),
('001941', '000002', 'Aliaramadhanti11', 'alia110801', '0', '2019-03-20 14:11:25'),
('001942', '000002', 'ANNISA', 'jalanmerdeka', '0', '2019-03-20 14:13:17'),
('001943', '000002', 'annisa1nurindah@gmai', 'oktober2000', '0', '2019-03-20 14:21:04'),
('001944', '000002', 'ARIELLOUPATTY', 'LOUPATTY190100', '0', '2019-03-20 14:23:39'),
('001945', '000002', 'AstriNarulianthi', 'jakarta11', '0', '2019-03-20 14:26:37'),
('001946', '000002', 'Azizahnuraini', 'azizahcantik', '0', '2019-03-20 14:29:07'),
('001947', '000002', 'belafarira', 'akuanakke4', '0', '2019-03-20 14:31:53'),
('001948', '000002', 'DwiIndahAnzaniPutri', 'cape1102', '0', '2019-03-20 14:34:56'),
('001949', '000002', 'Dwimutiararahmah', 'winda0102', '0', '2019-03-20 14:41:31'),
('001950', '000002', 'Eldianakhaerunisa', 'eldicantik', '0', '2019-03-20 14:43:57'),
('001951', '000002', 'fajarharyanti27@gmai', 'anthy12345', '0', '2019-03-20 14:46:05'),
('001952', '000002', 'Ihsanulhaq', 'laught112', '0', '2019-03-20 14:50:10'),
('001953', '000002', 'Liani', 'lianilia15', '0', '2019-03-20 14:52:25'),
('001954', '000002', 'Lindaoktaviani', 'leeminho', '0', '2019-03-20 14:55:16'),
('001955', '000002', 'Miftahauliahidayat', 'Miftaaulia27', '0', '2019-03-20 14:57:12'),
('001956', '000002', 'MirandaJasmineLabiba', '9september', '0', '2019-03-20 15:00:32'),
('001957', '000002', 'mhmmdseptian', 'septianseptember', '0', '2019-03-20 15:03:41'),
('001958', '000002', 'nurulazizah', 'azizah1732', '7ba9abd6ce955ee563494f3ce499b0dd', '2019-03-20 15:33:08'),
('001959', '000002', 'NurulHidayati', 'majaaqua', '0', '2019-03-20 15:34:21'),
('001960', '000002', 'NurvaniFebriyantiRat', 'nurvaniexo 25', '0', '2019-03-20 15:35:52'),
('001961', '000002', 'PEBIATINURAINI', 'pebi0987', '0', '2019-03-20 15:38:09'),
('001962', '000002', 'Ruthchikapr', 'mamadanpapa04', '0', '2019-03-20 15:40:30'),
('001963', '000002', 'Sucisolehati', '10052001', '0', '2019-03-20 15:42:19'),
('001964', '000002', 'SyahrinaAmeliaPutri', 'payaiyaiyaiya', '0', '2019-03-20 15:43:49'),
('001965', '000002', 'SyifaFauziah', '2507syifa', '0', '2019-03-20 15:46:03'),
('001966', '000002', 'TantriAuliaSuhaeri', 'idiotcrew', '0', '2019-03-20 15:47:48'),
('001967', '000002', 'Vivibektyoktafiani', 'vivi2910', 'db72e10f87faeae40523f5624dd642ec', '2019-03-20 15:49:06'),
('001968', '000002', 'WidiaAuliaLestari', 'wiwitcantik', '0', '2019-03-20 15:55:21'),
('001969', '000002', 'zahraalptri', 'zahra501', '0', '2019-03-20 15:56:19'),
('001970', '000002', 'DaniaErvina', 'damanroe1995', 'ba897772a86cc0e4e11338312522cdc1', '2019-03-21 09:41:21'),
('001971', '000002', 'Farkhan', 's2s3ksua', '0', '2019-03-21 09:52:24'),
('001972', '000002', 'RIZKIMAULANA', 'rizki007', '0', '2019-03-21 10:19:17'),
('001973', '000002', 'syafrika', 'sukalupa03', '0', '2019-03-21 10:29:04'),
('001974', '000002', 'ahmadnadirul', '087872174549', '0', '2019-03-21 10:45:35'),
('001975', '000002', 'LISNALISMIATIDEWI', 'LISNADEWI', '0', '2019-03-21 11:34:46'),
('001976', '000002', 'RIZKYPUTRA', 'RISKI1983', '0', '2019-03-21 12:03:12'),
('001977', '000002', 'IZQIRAHAYUPURI', 'IZQIRAHAYU123', '0', '2019-03-21 12:06:15'),
('001978', '000002', 'SYAHBI', 'SYAHBI1234', '0', '2019-03-21 12:20:22'),
('001979', '000002', 'OPANKHOLIK', 'OPANKHOLIK88', '0', '2019-03-21 13:37:57'),
('001980', '000002', 'Nadiaazzahrasugihart', 'nadiaazzahra', '0', '2019-03-21 13:48:28'),
('001981', '000002', 'ANJELINASEPPINASIHOT', 'ANJELINA', '0', '2019-03-21 13:49:46'),
('001982', '000002', 'gitaparamita', 'oktober', '0', '2019-03-21 13:57:30');
INSERT INTO `msuser` (`IDUser`, `IDJenisUser`, `Username`, `Password`, `session_id`, `RegisterDate`) VALUES
('001983', '000002', 'EkkyNurmalasari', 'ekky2001', '0', '2019-03-21 14:00:13'),
('001984', '000002', 'junapril.imando', 'pedrom123', '0', '2019-03-21 14:05:58'),
('001985', '000002', 'AdlyAlHakim', 'Adly3020', '0', '2019-03-21 14:07:25'),
('001986', '000002', 'M.Ardiansyah', 'ardiansyah27', '0', '2019-03-21 14:10:13'),
('001987', '000002', 'MuhammadFadjriZM', 'fadjricmd176', '0', '2019-03-21 14:16:20'),
('001988', '000002', 'AditiyaWahyuNugroho', 'adit2001', '0', '2019-03-21 14:30:29'),
('001989', '000002', 'RezkyAgung', '161710242', '0', '2019-03-21 14:33:05'),
('001990', '000002', 'AgungNurdiansah', '20011501', '0', '2019-03-21 14:38:17'),
('001991', '000002', 'Pdchika', 'priscadjunita26', '0', '2019-03-21 14:48:39'),
('001992', '000002', 'SalwaTsabitah', 'slwatsbta', '0', '2019-03-21 14:51:03'),
('001993', '000002', 'AuliaRamadanti', 'auliarohim', '0', '2019-03-21 14:54:49'),
('001994', '000002', 'Debynurahmawati', 'deby2512', '0', '2019-03-21 14:56:28'),
('001995', '000002', 'Elizabet', 'ibet221000', '0', '2019-03-21 14:59:52'),
('001996', '000002', 'Maulidazahra', '22061501', '0', '2019-03-21 15:04:08'),
('001997', '000002', 'Sekarayundaputri', 'sekarayunda05', '0', '2019-03-21 15:06:58'),
('001998', '000002', 'SeptianaRahayu', 'septi26', '0', '2019-03-21 15:08:42'),
('001999', '000002', 'Wulandari', 'wulan1407', '0', '2019-03-21 15:11:31'),
('002000', '000002', 'Fatia', 'arieszahra13', '0', '2019-03-21 15:13:25'),
('002001', '000002', 'Putrinuraini24', 'putri240301', '0', '2019-03-21 15:14:41'),
('002002', '000002', 'amelias', 'amelia', '0', '2019-03-21 15:16:09'),
('002003', '000002', 'AnisaDwiHandayani', 'anisadwi', '0', '2019-03-21 15:17:17'),
('002004', '000002', 'chindylaurapertiwy', 'chindy', '0', '2019-03-21 15:19:42'),
('002005', '000002', 'Sintabella', 'sintabella', '0', '2019-03-21 15:27:11'),
('002006', '000002', 'hidayataripratama', 'hidayataripratama', '0', '2019-03-21 15:28:20'),
('002007', '000002', 'MuthiaPutriNingrum', 'muthiaputriningrum', '0', '2019-03-21 15:46:23'),
('002008', '000002', 'ryohazizha', 'ryohafizha', '0', '2019-03-21 15:47:18'),
('002009', '000002', 'dhitasophianitami', 'dhitasophia', '0', '2019-03-21 15:49:07'),
('002010', '000002', 'Anandafaiz', 'anandafaiz', '0', '2019-03-21 15:51:33'),
('002011', '000002', 'radenrorofairuz', 'radenroro', '0', '2019-03-21 15:55:15'),
('002012', '000002', 'irennizhaeka', 'irennizha', '0', '2019-03-21 15:55:38'),
('002013', '000002', 'Adedwiaprilliani', 'adedwi_aprilliani123', '0', '2019-03-21 16:00:36'),
('002014', '000002', 'teguhpuspitarini', '141177', '0', '2019-03-22 09:03:54'),
('002015', '000002', 'ALMANIKKAFITRI', 'ALMANIKKAFITRI', '0', '2019-03-22 09:33:47'),
('002016', '000002', 'APRIADI', 'canda120116', '0', '2019-03-22 09:49:08'),
('002017', '000001', 'GEMATBAMBANGDWIKUSMA', 'pt.sjs18012019', '38f2d0ab929ab1485a0bd7eb0aca9229', '2019-03-22 11:12:10'),
('002018', '000001', 'REXCIBINONG', 'REXCBG', '0', '2019-03-22 11:14:10'),
('002019', '000002', 'SARAH', 'ASSEGAF31', '0', '2019-03-22 11:18:20'),
('002020', '000002', 'SITIYULIANI', 'AULIANZAVIER17', '0', '2019-03-22 11:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `mswebstatistic`
--

CREATE TABLE `mswebstatistic` (
  `TotalVisited` decimal(18,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mswebstatistic`
--

INSERT INTO `mswebstatistic` (`TotalVisited`) VALUES
('220811');

-- --------------------------------------------------------

--
-- Table structure for table `trlowonganmasuk`
--

CREATE TABLE `trlowonganmasuk` (
  `IDLowonganMasuk` char(6) NOT NULL,
  `IDLowongan` char(6) NOT NULL,
  `IDPencaker` char(6) NOT NULL,
  `IDKelurahan` char(6) NOT NULL,
  `IDAgama` char(6) NOT NULL,
  `IDStatusPernikahan` char(6) NOT NULL,
  `IDStatusPendidikan` char(6) NOT NULL,
  `IDPosisiJabatan` char(6) NOT NULL,
  `StatusLowongan` tinyint(1) NOT NULL,
  `NomorIndukPencaker` varchar(50) NOT NULL,
  `NamaPencaker` varchar(50) NOT NULL,
  `TempatLahir` varchar(50) NOT NULL,
  `TglLahir` date NOT NULL,
  `JenisKelamin` tinyint(1) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Telepon` varchar(50) NOT NULL,
  `Alamat` text NOT NULL,
  `KodePos` varchar(50) NOT NULL,
  `Kewarganegaraan` tinyint(1) NOT NULL,
  `Jurusan` varchar(50) NOT NULL,
  `Keterampilan` varchar(50) NOT NULL,
  `NEMIPK` tinyint(1) NOT NULL,
  `Nilai` varchar(50) NOT NULL,
  `TahunLulus` varchar(4) NOT NULL,
  `TinggiBadan` varchar(50) NOT NULL,
  `BeratBadan` varchar(50) NOT NULL,
  `Keterangan` text NOT NULL,
  `Lokasi` tinyint(1) NOT NULL,
  `UpahYangDicari` varchar(50) NOT NULL,
  `RegisterDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `msagama`
--
ALTER TABLE `msagama`
  ADD PRIMARY KEY (`IDAgama`);

--
-- Indexes for table `msaktivasi`
--
ALTER TABLE `msaktivasi`
  ADD PRIMARY KEY (`IDPencaker`,`IDAktivasi`),
  ADD KEY `FK_MsAktivasi_MsPencaker` (`IDPencaker`);

--
-- Indexes for table `msbahasa`
--
ALTER TABLE `msbahasa`
  ADD PRIMARY KEY (`IDBahasa`),
  ADD KEY `FK_MsBahasaMsPencaker` (`IDPencaker`);

--
-- Indexes for table `msberita`
--
ALTER TABLE `msberita`
  ADD PRIMARY KEY (`IDBerita`);

--
-- Indexes for table `msbidangperusahaan`
--
ALTER TABLE `msbidangperusahaan`
  ADD PRIMARY KEY (`IDBidangPerusahaan`);

--
-- Indexes for table `mschat`
--
ALTER TABLE `mschat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msevent`
--
ALTER TABLE `msevent`
  ADD PRIMARY KEY (`IDEvent`);

--
-- Indexes for table `msjenislowongan`
--
ALTER TABLE `msjenislowongan`
  ADD PRIMARY KEY (`IDJenisLowongan`);

--
-- Indexes for table `msjenispengupahan`
--
ALTER TABLE `msjenispengupahan`
  ADD PRIMARY KEY (`IDJenisPengupahan`);

--
-- Indexes for table `msjenisuser`
--
ALTER TABLE `msjenisuser`
  ADD PRIMARY KEY (`IDJenisUser`);

--
-- Indexes for table `msjurusan`
--
ALTER TABLE `msjurusan`
  ADD PRIMARY KEY (`IDjurusan`);

--
-- Indexes for table `mskabupaten`
--
ALTER TABLE `mskabupaten`
  ADD PRIMARY KEY (`IDKabupaten`);

--
-- Indexes for table `mskeahlian`
--
ALTER TABLE `mskeahlian`
  ADD PRIMARY KEY (`IDKeahlian`),
  ADD KEY `FK_MsKeahlian_MsJenisLowongan` (`IDJenisLowongan`);

--
-- Indexes for table `mskecamatan`
--
ALTER TABLE `mskecamatan`
  ADD PRIMARY KEY (`IDKecamatan`),
  ADD KEY `FK_MsKecamatan_MsKabupaten` (`IDKabupaten`);

--
-- Indexes for table `mskelurahan`
--
ALTER TABLE `mskelurahan`
  ADD PRIMARY KEY (`IDKelurahan`),
  ADD KEY `FK_MsKelurahan_MsKecamatan` (`IDKecamatan`);

--
-- Indexes for table `mslowongan`
--
ALTER TABLE `mslowongan`
  ADD PRIMARY KEY (`IDLowongan`),
  ADD KEY `FK_MsLowongan_MsPosisiJabatan` (`IDPosisiJabatan`),
  ADD KEY `FK_MsLowongan_MsKeahlian` (`IDKeahlian`),
  ADD KEY `FK_MsLowongan_MsStatusPendidikan` (`IDStatusPendidikan`),
  ADD KEY `FK_MsLowongan_MsJenisPengupahan` (`IDJenisPengupahan`),
  ADD KEY `FK_MsLowongan_MsStatusHubunganKerja` (`IDStatusHubunganKerja`),
  ADD KEY `FK_MsLowongan_MsPerusahaan` (`IDPerusahaan`);

--
-- Indexes for table `mspencaker`
--
ALTER TABLE `mspencaker`
  ADD PRIMARY KEY (`IDPencaker`),
  ADD UNIQUE KEY `NomorIndukPencaker_UNIQUE` (`NomorIndukPencaker`),
  ADD KEY `FK_MsPencaker_MsUser` (`IDUser`),
  ADD KEY `FK_MsPencaker_MsKelurahan` (`IDKelurahan`),
  ADD KEY `FK_MsPencaker_MsStatusPernikahan` (`IDStatusPernikahan`),
  ADD KEY `FK_MsPencaker_MsAgama` (`IDAgama`),
  ADD KEY `FK_MsPencaker_MsStatusPendidikan` (`IDStatusPendidikan`),
  ADD KEY `FK_MsPencaker_MsPosisiJabatan` (`IDPosisiJabatan`);

--
-- Indexes for table `mspencakertemp`
--
ALTER TABLE `mspencakertemp`
  ADD PRIMARY KEY (`IDPencakerTemp`),
  ADD KEY `FK_MsPencakerTemp_MsKelurahan` (`IDKelurahan`),
  ADD KEY `FK_MsPencakerTemp_MsStatusPernikahan` (`IDStatusPernikahan`),
  ADD KEY `FK_MsPencakerTemp_MsAgama` (`IDAgama`),
  ADD KEY `FK_MsPencakerTemp_MsStatusPendidikan` (`IDStatusPendidikan`),
  ADD KEY `FK_MsPencakerTemp_MsPosisiJabatan` (`IDPosisiJabatan`);

--
-- Indexes for table `mspengalaman`
--
ALTER TABLE `mspengalaman`
  ADD PRIMARY KEY (`IDPengalaman`) USING BTREE,
  ADD KEY `FK_MsPengalamanMsPencaker` (`IDPencaker`);

--
-- Indexes for table `msperusahaan`
--
ALTER TABLE `msperusahaan`
  ADD PRIMARY KEY (`IDPerusahaan`),
  ADD KEY `FK_MsPerusahaan_MsUser` (`IDUser`),
  ADD KEY `FK_MsPerusahaan_MsBidangPerusahaan` (`IDBidangPerusahaan`),
  ADD KEY `FK_MsPerusahaan_MsKelurahan` (`IDKelurahan`);

--
-- Indexes for table `msperusahaantemp`
--
ALTER TABLE `msperusahaantemp`
  ADD PRIMARY KEY (`IDPerusahaanTemp`),
  ADD KEY `FK_MsPerusahaanTemp_MsBidangPerusahaan` (`IDBidangPerusahaan`),
  ADD KEY `FK_MsPerusahaanTemp_MsKelurahan` (`IDKelurahan`);

--
-- Indexes for table `msposisijabatan`
--
ALTER TABLE `msposisijabatan`
  ADD PRIMARY KEY (`IDPosisiJabatan`);

--
-- Indexes for table `msresetpassword`
--
ALTER TABLE `msresetpassword`
  ADD PRIMARY KEY (`IDUser`),
  ADD KEY `FK_MsResetPassword_MsUser` (`IDUser`);

--
-- Indexes for table `msstatushubungankerja`
--
ALTER TABLE `msstatushubungankerja`
  ADD PRIMARY KEY (`IDStatusHubunganKerja`);

--
-- Indexes for table `msstatuspendidikan`
--
ALTER TABLE `msstatuspendidikan`
  ADD PRIMARY KEY (`IDStatusPendidikan`);

--
-- Indexes for table `msstatuspernikahan`
--
ALTER TABLE `msstatuspernikahan`
  ADD PRIMARY KEY (`IDStatusPernikahan`);

--
-- Indexes for table `mstingkatpendidikan`
--
ALTER TABLE `mstingkatpendidikan`
  ADD PRIMARY KEY (`IDTingkatPendidikan`);

--
-- Indexes for table `msuser`
--
ALTER TABLE `msuser`
  ADD PRIMARY KEY (`IDUser`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `FK_MsUser_MsTypeUser` (`IDJenisUser`);

--
-- Indexes for table `mswebstatistic`
--
ALTER TABLE `mswebstatistic`
  ADD PRIMARY KEY (`TotalVisited`);

--
-- Indexes for table `trlowonganmasuk`
--
ALTER TABLE `trlowonganmasuk`
  ADD PRIMARY KEY (`IDLowonganMasuk`),
  ADD KEY `FK_TrLowonganMasuk_IDLowongan` (`IDLowongan`),
  ADD KEY `FK_TrLowonganMasuk_MsPencaker` (`IDPencaker`),
  ADD KEY `FK_TrLowonganMasuk_MsKelurahan` (`IDKelurahan`),
  ADD KEY `FK_TrLowonganMasuk_MsStatusPernikahan` (`IDStatusPernikahan`),
  ADD KEY `FK_TrLowonganMasuk_MsAgama` (`IDAgama`),
  ADD KEY `FK_TrLowonganMasuk_MsStatusPendidikan` (`IDStatusPendidikan`),
  ADD KEY `FK_TrLowonganMasuk_MsPosisiJabatan` (`IDPosisiJabatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mschat`
--
ALTER TABLE `mschat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
