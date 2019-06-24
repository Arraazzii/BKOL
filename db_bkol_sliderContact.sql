-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2019 at 03:38 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bkol`
--

-- --------------------------------------------------------

--
-- Table structure for table `mslowongan`
--

CREATE TABLE IF NOT EXISTS `mslowongan` (
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
  `RegisterDate` datetime NOT NULL,
  PRIMARY KEY (`IDLowongan`),
  KEY `FK_MsLowongan_MsPosisiJabatan` (`IDPosisiJabatan`),
  KEY `FK_MsLowongan_MsKeahlian` (`IDKeahlian`),
  KEY `FK_MsLowongan_MsStatusPendidikan` (`IDStatusPendidikan`),
  KEY `FK_MsLowongan_MsJenisPengupahan` (`IDJenisPengupahan`),
  KEY `FK_MsLowongan_MsStatusHubunganKerja` (`IDStatusHubunganKerja`),
  KEY `FK_MsLowongan_MsPerusahaan` (`IDPerusahaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mslowongan`
--

INSERT INTO `mslowongan` (`IDLowongan`, `IDPerusahaan`, `IDPosisiJabatan`, `IDKeahlian`, `IDStatusPendidikan`, `IDJenisPengupahan`, `IDStatusHubunganKerja`, `TglBerlaku`, `TglBerakhir`, `NamaLowongan`, `UraianPekerjaan`, `UraianTugas`, `Penempatan`, `BatasUmur`, `JmlPria`, `JmlWanita`, `Jurusan`, `Pengalaman`, `SyaratKhusus`, `GajiPerbulan`, `JamKerjaSeminggu`, `RegisterDate`) VALUES
('000003', '000002', '000018', '100003', '000008', '000004', '000001', '2018-08-24', '2019-01-31', 'ASISTEN APOTEKER', 'Asisten Apoteker', 'Asisten Apoteker', 'Kota Depok', 35, '2', '2', 'D3/S1 Jurusan Farmasi ', 'Pengalaman 1-2 Thn dibidang yang sama', '1. Memiliki STR\n2. Domisili Jabodetabek ', '3000000', '0', '2019-06-30 09:41:03'),
('000004', '000002', '000018', '100004', '000008', '000004', '000001', '2018-09-19', '2019-05-01', 'REHAB MEDIK', 'Rehab Medik', 'Rehab Medik', 'Kota Depok', 35, '2', '2', 'D3 Jurusan Fisioterapi, Terapi Wicara, Terapi', 'Pengalaman 1-2 Thn ', 'Memiliki STR (Masih Berlaku) \nDomisili Jabodetabek ', '3000000', '0', '2019-06-29 19:19:50'),
('000005', '000002', '000018', '100004', '000008', '000004', '000001', '2018-09-19', '2019-05-27', 'PERAWAT', 'Perawat', 'Perawat', 'Kota Depok', 35, '2', '2', 'D3 Akper / S1 Ners ', 'Pengalaman 1-2 Thn ', '- STR (Masih berlaku) \n- Domisili Jabodetabek', '3000000', '0', '2019-06-28 19:23:28'),
('000006', '000002', '000018', '100005', '000008', '000004', '000001', '2018-09-19', '2019-06-01', 'LABORATORIUM', 'Laboratorium', 'Laboratorium', 'Kota Depok', 35, '2', '2', 'D3 Jurusan Analis Kesehatan', 'Pengalaman 1-2 Thn ', '- Memiliki STR (Masih berlaku \n- Domisili Jabodetabek ', '3000000', '0', '2019-06-27 19:25:46'),
('000007', '000003', '000018', '999999', '000008', '000004', '000001', '2018-09-19', '2019-05-01', 'STAFF PAYROLL (SP)', 'Staff Payrol', 'Staff Payrol', 'Kota Depok', 27, '2', '2', 'Semua Jurusan', '- Memiliki pengalaman kerjan min 2 tahun di Perusahaan Manufacture\n- Berpengalaman di bagian payrol min 500 karyawan\n- Biasa mengerjakan potongan iuran BPJS Ketenagakerjaan dan BPJS Kesehatan', '- Biasa menggunakan program payroll dengan berbagai perhitungan seperti lembur, uang makan, tunjangan karyawan,dsb\n- Teliti, Komunikatif, loyalitas tinggi, smart, dan siap bekerja dibawah tekanan', '3000000', '8', '2019-06-26 20:45:10'),
('000008', '000003', '000018', '000013', '000008', '000004', '000001', '2018-09-19', '2019-05-01', 'SENIOR STAFF ACCOUNTING (SA)', 'Staff Accounting', 'Accounting', 'Kota Depok', 32, '0', '2', 'S1-Akuntansi', '- Memiliki pengalaman kerjan min 2 tahun di Perusahaan Manufacture\n- Berpengalaman A/R. A/P dan General Accounting', '- Dapat menggunakan Program ERP\n- Lebih disukai yang mempunyai Brevet Perpajakan', '3000000', '0', '2019-06-25 20:47:09'),
('000009', '000004', '000018', '999999', '000008', '000004', '000001', '2018-09-19', '2019-07-22', 'SUPERVISOR IRIGASI', 'Supervisor', 'Supervisor', 'Kota Depok', 30, '2', '0', 'Semua Jurusan', '- Pengalaman 3 tahun di industri yang sama\n- Memahami perawatan mesin pompa irigasi dan aksesorisnya serta generator 500KVa\n- Memahami perawatan tentang LV  MDP (low voltage main distribution panel)\n- Memahami penggunaan satellite control irigation\n- Memahami operasional VFD dan PLC, Pemeliharaan capasitor bank, transformer dan cubical', '- Pekerja keras, integritas tinggi, dapat bekerja sama dengan tim', '3000000', '0', '2019-06-24 21:11:49'),
('000010', '000005', '000018', '000020', '000008', '000004', '000001', '2018-09-19', '2017-01-31', 'SENIOR STAFF ACCOUNTING', 'Accounting', 'Accounting', 'Kota Depok', 32, '0', '2', 'S1-Akuntansi', '- Pengalaman kerja diperusahaan manufacture 2 tahun\n- Menguasai A/R, A/P dan General Accounting\n', '- Lebih disukai mempunyai Brevet Perpajakan\n- Dapat menggunakan program ERP', '3000000', '0', '2019-06-23 23:19:12'),
('000011', '000005', '000018', '999999', '000008', '000004', '000001', '2018-09-19', '2019-05-14', 'STAFF FRONT OFFICE', 'Front Office', 'Front Office', 'Kota Depok', 27, '2', '2', 'D3 Semua Jurusan', '- Pengalaman sebagai customer service di perusahaan jasa pelayanan ( Bank/Hotel/Rs) min 2 tahun', '- Biasa menangani customer / pasien di Front Office', '3000000', '0', '2019-06-22 23:22:41'),
('000013', '000012', '000018', '000020', '000008', '000004', '000001', '2018-10-08', '2019-05-31', 'SENIOR STAFF ACCOUNTING', 'Melakukan pekerjaan Fin.& Acc', 'Melakukan A/R, A/P dan Pajak Perusahaan', 'Depok', 32, '0', '1', 'Akuntansi', '- Min. 1 tahun di posisi yang sama di Perusahaan Manufacture\n- Menguasai A/R, A/P dan Perpajakan\n- Menguasai ERP', 'Menguasai perpajakan Perusahaan', '4500000', '40', '2019-06-21 14:46:48'),
('000012', '000011', '000018', '999999', '000008', '000004', '000001', '2018-10-08', '2019-02-28', 'Lowongan Terapis', 'Terapis', 'Mendampingi siswa dalam kelas, membuat progra', 'Depok', 35, '4', '0', 'Minimal D3 Okupasi Terapis', 'Minimal Pengalaman 1 tahun', 'Suka dengan anak anak ', '3700000', '40', '2019-06-17 15:19:39'),
('000014', '000017', '000018', '100000', '000008', '000004', '000001', '2018-10-08', '2019-09-01', 'Administrasi', 'merekap data', 'Rekap Data Karyawan, Absensi, dll', 'Cibubur', 25, '0', '1', 'Lainnya', 'Berpengalaman 6 bulan di Administrasi\n', 'tidak sedang mengikuti kursus atau bersekolah, paham MS Office', '3800000', '40', '2018-10-08 14:40:06'),
('000015', '000013', '000018', '999999', '000008', '000004', '000001', '2018-10-08', '2019-12-01', 'Purchasing', 'Purchasing', 'Menghandle pembelian, membuat PO', 'Depok', 25, '1', '0', 'Administrasi Perkantoran', 'Pengalaman bekerja minimal 1 tahun sesuai bidangnya', 'Dapat bernegosiasi dengan baik', '3900000', '40', '2018-10-08 14:45:25'),
('000016', '000010', '000018', '999999', '000008', '000004', '000001', '2018-10-08', '2019-12-03', 'OPERATOR PRODUKSI', 'melakukan produksi barang', 'melakukan produksi barang ', 'Depok', 21, '30', '0', 'OTOMOTIF', '1 tahun di bidang yang sama ', 'mampu membaca alat ukur ', '3000000', '40', '2018-10-08 14:47:18'),
('000017', '000014', '000018', '999999', '000008', '000004', '000001', '2018-10-08', '2019-12-11', 'CREW OF STORE', 'MENJAGA TOKO, MENGANGKAT BARANG, KASIR, MEMBE', 'MEMASTIKAN TRANSAKSI PEMBAYARAN BARANG DAN JA', 'DEPOK', 24, '30', '10', 'PEMASARAN, ADMINISTRASI PERKANTORAN, AKUNTANS', 'FRESH GRADUATE,  SALES, PENJUALAN', '- BELUM MENIKAH / LAJANG\n- KOMUNIKATIF\n- GOOD LOOKING\n- TINGGI BADAN PRIA 165 CM & WANITA 155 CM\n- BERAT BADAN PROPORSIONAL\n- MEMILIKI JIWA MELAYANI', '3590000', '40', '2018-10-08 15:01:32'),
('000020', '000020', '000018', '100002', '000008', '000004', '000001', '2018-10-12', '2019-11-11', 'Associate Transmart Carrefour Cibubur', 'Berpenampilan menarik, Pekerja keras, Loyalit', 'Mampu melayani pelanggang dengan baik. Menjag', 'Transmart Carrefour Cibubur', 25, '150', '150', 'Diutamakan Marketing', 'Diutamakan pernah bekerja di Industri Retail', 'Memiliki jiwa enterpreneur', '3584700', '40', '2018-10-13 06:19:47'),
('000019', '000016', '000018', '999999', '000008', '000004', '000001', '2018-10-08', '2017-02-28', 'JUNIOR MAINTENANCE', 'SUPPORT MAINTENANCE', 'PREVEMTIVE MAINTENANCE', 'DEPOK', 21, '1', '0', 'SMK MEKATRONIK', 'TIDAK PERLU', 'PAHAM PLC, PNEUMATIC', '3584750', '40', '2019-06-18 15:27:02'),
('000027', '000021', '000018', '999999', '000008', '000004', '000001', '2019-12-08', '2019-12-26', 'Ekspedisi Kordinator', 'Mengatur keluar masuk barang', 'Mengawasi Keluar Masuk Barang, Quality Contro', 'Centro Pesona Square Mall Depok', 30, '1', '0', 'Semua Jurusan', 'MInimal 1 Tahun ', 'Tidak Ada', '3872551', '40', '2019-06-21 08:52:34'),
('000029', '000021', '000018', '999999', '000008', '000004', '000001', '2019-12-08', '2019-12-21', 'Penjahit', 'Menjahit, Obras, Vermak ', 'Menjahit, Obras, Vermak ', 'Centro Pesona Square Mall Depok', 27, '0', '1', 'Tata Busana', 'Minimal 1 Tahun ', 'Bisa Menjahit, Obras, Vermak ', '3872551', '40', '2019-06-21 08:45:46'),
('000030', '000022', '000018', '999999', '000008', '000004', '000001', '2018-10-16', '2019-12-29', 'Credit Marketing Staff ( Mobil Bekas )', 'Surveyor', 'Surveyor ', 'Csf Cabang Depok', 25, '10', '0', '-', 'Fresh Graduate di persilahkan melamar', '1. IPK min. 2.75 (skala 4)\n2. Berpenampilan menarik\n3.  Menyukai pekerjaan lapangan dan mampu bekerja dibawah target\n4. Jujur, Disiplin & berintegritas\n4. Memiliki kendaraan bermotor & Sim C', '3350000', '40', '2019-06-19 11:24:48'),
('000031', '000022', '000018', '999999', '000008', '000004', '000001', '2018-10-16', '2019-12-31', 'HRD & GA ', 'HRD & GA Staff', 'Membantu berjalannya aktivitas / Operational ', 'Csf Cabang Depok', 25, '0', '0', '-', 'Fresh Graduated di persilahkan melamar', 'IPK  2.75 ( skala 4 )', '3350000', '40', '2019-06-18 11:38:54');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
