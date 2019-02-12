CREATE DATABASE  IF NOT EXISTS `bkolbdb` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bkolbdb`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS mskabupaten;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mskabupaten (
  IDKabupaten char(6) NOT NULL,
  NamaKabupaten varchar(50) NOT NULL,
  PRIMARY KEY (IDKabupaten)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO mskabupaten VALUES ('000001','Bekasi Utara');
INSERT INTO mskabupaten VALUES ('000002','Cikarang');
DROP TABLE IF EXISTS msperusahaan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msperusahaan (
  IDPerusahaan char(6) NOT NULL,
  IDUser char(6) NOT NULL,
  IDBidangPerusahaan char(6) NOT NULL,
  IDKelurahan char(6) NOT NULL,
  NamaPerusahaan varchar(50) NOT NULL,
  Email varchar(50) NOT NULL,
  Telepon varchar(50) NOT NULL,
  Alamat varchar(50) NOT NULL,
  KodePos varchar(50) NOT NULL,
  Kota varchar(50) NOT NULL,
  Propinsi varchar(50) NOT NULL,
  NamaPemberiKerja varchar(50) NOT NULL,
  JabatanPemberiKerja varchar(50) NOT NULL,
  TeleponPemberiKerja varchar(50) NOT NULL,
  EmailPemberiKerja varchar(50) NOT NULL,
  RegisterDate datetime NOT NULL,
  PRIMARY KEY (IDPerusahaan),
  KEY FK_MsPerusahaan_MsUser (IDUser),
  KEY FK_MsPerusahaan_MsBidangPerusahaan (IDBidangPerusahaan),
  KEY FK_MsPerusahaan_MsKelurahan (IDKelurahan),
  CONSTRAINT FK_MsPerusahaan_MsBidangPerusahaan FOREIGN KEY (IDBidangPerusahaan) REFERENCES msbidangperusahaan (IDBidangPerusahaan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsPerusahaan_MsKelurahan FOREIGN KEY (IDKelurahan) REFERENCES mskelurahan (IDKelurahan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsPerusahaan_MsUser FOREIGN KEY (IDUser) REFERENCES msuser (IDUser) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msperusahaan VALUES ('000000','000001','000036','000001','PT ABC','a@a.com','021 1234567','alamat','11378','Cikarang','Bekasi','ddddd','jabatan','021 123456','a@a.com','2012-08-07 20:28:04');
DROP TABLE IF EXISTS msuser;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msuser (
  IDUser char(6) NOT NULL,
  IDJenisUser char(6) NOT NULL,
  Username varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  session_id varchar(40) NOT NULL DEFAULT '0',
  RegisterDate datetime NOT NULL,
  PRIMARY KEY (IDUser),
  KEY FK_MsUser_MsTypeUser (IDJenisUser),
  CONSTRAINT FK_MsUser_MsJenisUser FOREIGN KEY (IDJenisUser) REFERENCES msjenisuser (IDJenisUser) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msuser VALUES ('000000','000000','admin','admin','ae00d6a306477f5e5fc2efe57c4bf4e6','2012-08-09 00:16:25');
INSERT INTO msuser VALUES ('000001','000001','perusahaan','123','c994046399b5e4782036dd3d654d47fa','2012-08-07 20:28:04');
INSERT INTO msuser VALUES ('000002','000002','pencaker','123','0','2012-08-09 00:16:25');
DROP TABLE IF EXISTS mskecamatan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mskecamatan (
  IDKecamatan char(6) NOT NULL,
  IDKabupaten char(6) NOT NULL,
  NamaKecamatan varchar(45) DEFAULT NULL,
  PRIMARY KEY (IDKecamatan),
  KEY FK_MsKecamatan_MsKabupaten (IDKabupaten),
  CONSTRAINT FK_MsKecamatan_MsKabupaten FOREIGN KEY (IDKabupaten) REFERENCES mskabupaten (IDKabupaten) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO mskecamatan VALUES ('000001','000001','Babelan');
INSERT INTO mskecamatan VALUES ('000002','000001','Cabangbungin');
INSERT INTO mskecamatan VALUES ('000003','000001','Cibitung');
INSERT INTO mskecamatan VALUES ('000004','000001','Karangbahagia');
INSERT INTO mskecamatan VALUES ('000005','000001','Muara Gembong');
INSERT INTO mskecamatan VALUES ('000006','000001','Pebayuran');
INSERT INTO mskecamatan VALUES ('000007','000001','Sukakarya');
INSERT INTO mskecamatan VALUES ('000008','000001','Sukatani');
INSERT INTO mskecamatan VALUES ('000009','000001','Tambelang');
INSERT INTO mskecamatan VALUES ('000010','000001','Tambun');
INSERT INTO mskecamatan VALUES ('000011','000001','Tambun Selatan');
INSERT INTO mskecamatan VALUES ('000012','000001','Tambun Utara');
INSERT INTO mskecamatan VALUES ('000013','000001','Tarumajaya');
INSERT INTO mskecamatan VALUES ('000014','000002','Cikarang Barat');
INSERT INTO mskecamatan VALUES ('000015','000002','Cikarang Pusat');
INSERT INTO mskecamatan VALUES ('000016','000002','Cikarang Selatan');
INSERT INTO mskecamatan VALUES ('000017','000002','Cikarang Timur');
INSERT INTO mskecamatan VALUES ('000018','000002','Cikarang Utara');
DROP TABLE IF EXISTS mskeahlian;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mskeahlian (
  IDKeahlian char(6) NOT NULL,
  IDJenisLowongan char(6) NOT NULL,
  NamaKeahlian varchar(45) NOT NULL,
  PRIMARY KEY (IDKeahlian),
  KEY FK_MsKeahlian_MsJenisLowongan (IDJenisLowongan),
  CONSTRAINT FK_MsKeahlian_MsJenisLowongan FOREIGN KEY (IDJenisLowongan) REFERENCES msjenislowongan (IDJenisLowongan) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO mskeahlian VALUES ('000001','000001','ANALISIS DATA');
INSERT INTO mskeahlian VALUES ('000002','000001','Database Administrator');
INSERT INTO mskeahlian VALUES ('000003','000001','Helpdesk');
INSERT INTO mskeahlian VALUES ('000004','000001','IT Dekstop Programmer ( IDP )');
INSERT INTO mskeahlian VALUES ('000005','000001','IT Programmer');
INSERT INTO mskeahlian VALUES ('000006','000001','IT Technical Support');
INSERT INTO mskeahlian VALUES ('000007','000001','Programmer PHP');
INSERT INTO mskeahlian VALUES ('000008','000001','Senior IT');
INSERT INTO mskeahlian VALUES ('000009','000001','Staff IT');
INSERT INTO mskeahlian VALUES ('000010','000001','System Analist');
INSERT INTO mskeahlian VALUES ('000011','000001','Web Designer');
INSERT INTO mskeahlian VALUES ('000012','000001','Yunior IT');
INSERT INTO mskeahlian VALUES ('000013','000002','Auditor');
INSERT INTO mskeahlian VALUES ('000014','000002','Cashier');
INSERT INTO mskeahlian VALUES ('000015','000002','Funding Officer');
INSERT INTO mskeahlian VALUES ('000016','000002','INTERNAL AUDIT');
INSERT INTO mskeahlian VALUES ('000017','000002','Internal Audit');
INSERT INTO mskeahlian VALUES ('000018','000002','JUNIOR ACCOUNTING STAFF');
INSERT INTO mskeahlian VALUES ('000019','000002','PROSHOP');
INSERT INTO mskeahlian VALUES ('000020','000002','SENIOR ACCOUNTING');
INSERT INTO mskeahlian VALUES ('000021','000002','STAFF ACCOUNT RECEIVEABLE');
INSERT INTO mskeahlian VALUES ('000022','000002','Staff Accounting');
INSERT INTO mskeahlian VALUES ('000023','000002','STAFF DATA ANALYST');
INSERT INTO mskeahlian VALUES ('000024','000002','Staff Finance');
INSERT INTO mskeahlian VALUES ('000025','000002','STAFF FRONT END AUDIT');
INSERT INTO mskeahlian VALUES ('000026','000002','Tax Staff');
INSERT INTO mskeahlian VALUES ('000027','000002','Teller');
DROP TABLE IF EXISTS msstatuspendidikan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msstatuspendidikan (
  IDStatusPendidikan char(6) NOT NULL,
  NamaStatusPendidikan varchar(50) NOT NULL,
  PRIMARY KEY (IDStatusPendidikan)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msstatuspendidikan VALUES ('000001','Tidak Tamat SD');
INSERT INTO msstatuspendidikan VALUES ('000002','SD');
INSERT INTO msstatuspendidikan VALUES ('000003','SMP');
INSERT INTO msstatuspendidikan VALUES ('000004','SMK');
INSERT INTO msstatuspendidikan VALUES ('000005','SMA');
INSERT INTO msstatuspendidikan VALUES ('000006','D1');
INSERT INTO msstatuspendidikan VALUES ('000007','D2');
INSERT INTO msstatuspendidikan VALUES ('000008','D3');
INSERT INTO msstatuspendidikan VALUES ('000009','S1');
INSERT INTO msstatuspendidikan VALUES ('000010','S2');
INSERT INTO msstatuspendidikan VALUES ('000011','S3');
INSERT INTO msstatuspendidikan VALUES ('000012','DOKTOR');
DROP TABLE IF EXISTS mspencakertemp;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mspencakertemp (
  IDPencakerTemp char(6) NOT NULL,
  Username varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  IDKelurahan char(6) NOT NULL,
  IDAgama char(6) NOT NULL,
  IDStatusPernikahan char(6) NOT NULL,
  IDStatusPendidikan char(6) NOT NULL,
  IDJabatanPekerjaan char(6) NOT NULL,
  NomorIndukPencaker varchar(50) NOT NULL,
  NamaPencaker varchar(50) NOT NULL,
  TempatLahir varchar(50) NOT NULL,
  TglLahir date NOT NULL,
  JenisKelamin bit(1) NOT NULL,
  Email varchar(50) NOT NULL,
  Telepon varchar(50) NOT NULL,
  Alamat varchar(50) NOT NULL,
  KodePos varchar(50) NOT NULL,
  Kewarganegaraan bit(1) NOT NULL,
  Jurusan varchar(50) NOT NULL,
  Keterampilan varchar(50) NOT NULL,
  NEMIPK bit(1) NOT NULL,
  Nilai varchar(50) NOT NULL,
  TahunLulus varchar(4) NOT NULL,
  TinggiBadan varchar(50) NOT NULL,
  BeratBadan varchar(50) NOT NULL,
  Keterangan varchar(50) NOT NULL,
  Lokasi bit(1) NOT NULL,
  UpahYangDicari varchar(50) NOT NULL,
  RegisterDate datetime NOT NULL,
  PRIMARY KEY (IDPencakerTemp),
  KEY FK_MsPencakerTemp_MsKelurahan (IDKelurahan),
  KEY FK_MsPencakerTemp_MsStatusPernikahan (IDStatusPernikahan),
  KEY FK_MsPencakerTemp_MsAgama (IDAgama),
  KEY FK_MsPencakerTemp_MsStatusPendidikan (IDStatusPendidikan),
  KEY FK_MsPencakerTemp_MsJabatanPekerjaan (IDJabatanPekerjaan),
  CONSTRAINT FK_MsPencakerTemp_MsJabatanPekerjaan FOREIGN KEY (IDJabatanPekerjaan) REFERENCES msjabatanpekerjaan (IDJabatanPekerjaan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsPencakerTemp_MsAgama FOREIGN KEY (IDAgama) REFERENCES msagama (IDAgama) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_MsPencakerTemp_MsKelurahan FOREIGN KEY (IDKelurahan) REFERENCES mskelurahan (IDKelurahan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsPencakerTemp_MsStatusPendidikan FOREIGN KEY (IDStatusPendidikan) REFERENCES msstatuspendidikan (IDStatusPendidikan) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_MsPencakerTemp_MsStatusPernikahan FOREIGN KEY (IDStatusPernikahan) REFERENCES msstatuspernikahan (IDStatusPernikahan) ON DELETE NO ACTION ON UPDATE NO ACTION
);
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS mswebstatistic;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mswebstatistic (
  TotalVisited decimal(18,0) NOT NULL,
  PRIMARY KEY (TotalVisited)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO mswebstatistic VALUES (0);
DROP TABLE IF EXISTS trlowonganmasuk;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE trlowonganmasuk (
  IDLowonganMasuk char(6) NOT NULL,
  IDLowongan char(6) NOT NULL,
  IDPencaker char(6) NOT NULL,
  IDKelurahan char(6) NOT NULL,
  IDAgama char(6) NOT NULL,
  IDStatusPernikahan char(6) NOT NULL,
  IDStatusPendidikan char(6) NOT NULL,
  IDJabatanPekerjaan char(6) NOT NULL,
  StatusLowongan bit(1) NOT NULL,
  NomorIndukPencaker varchar(50) NOT NULL,
  NamaPencaker varchar(50) NOT NULL,
  TempatLahir varchar(50) NOT NULL,
  TglLahir date NOT NULL,
  JenisKelamin bit(1) NOT NULL,
  Email varchar(50) NOT NULL,
  Telepon varchar(50) NOT NULL,
  Alamat varchar(50) NOT NULL,
  KodePos varchar(50) NOT NULL,
  Kewarganegaraan bit(1) NOT NULL,
  Jurusan varchar(50) NOT NULL,
  Keterampilan varchar(50) NOT NULL,
  NEMIPK bit(1) NOT NULL,
  Nilai varchar(50) NOT NULL,
  TahunLulus varchar(4) NOT NULL,
  TinggiBadan varchar(50) NOT NULL,
  BeratBadan varchar(50) NOT NULL,
  Keterangan varchar(50) NOT NULL,
  Lokasi bit(1) NOT NULL,
  UpahYangDicari varchar(50) NOT NULL,
  RegisterDate datetime NOT NULL,
  PRIMARY KEY (IDLowonganMasuk),
  KEY FK_TrLowonganMasuk_IDLowongan (IDLowongan),
  KEY FK_TrLowonganMasuk_MsPencaker (IDPencaker),
  KEY FK_TrLowonganMasuk_MsKelurahan (IDKelurahan),
  KEY FK_TrLowonganMasuk_MsStatusPernikahan (IDStatusPernikahan),
  KEY FK_TrLowonganMasuk_MsAgama (IDAgama),
  KEY FK_TrLowonganMasuk_MsStatusPendidikan (IDStatusPendidikan),
  KEY FK_TrLowonganMasuk_MsJabatanPekerjaan (IDJabatanPekerjaan),
  CONSTRAINT FK_TrLowonganMasuk_MsJabatanPekerjaan FOREIGN KEY (IDJabatanPekerjaan) REFERENCES msjabatanpekerjaan (IDJabatanPekerjaan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_TrLowonganMasuk_MsAgama FOREIGN KEY (IDAgama) REFERENCES msagama (IDAgama) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_TrLowonganMasuk_MsKelurahan FOREIGN KEY (IDKelurahan) REFERENCES mskelurahan (IDKelurahan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_TrLowonganMasuk_MsLowongan FOREIGN KEY (IDLowongan) REFERENCES mslowongan (IDLowongan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_TrLowonganMasuk_MsPencaker FOREIGN KEY (IDPencaker) REFERENCES mspencaker (IDPencaker) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_TrLowonganMasuk_MsStatusPendidikan FOREIGN KEY (IDStatusPendidikan) REFERENCES msstatuspendidikan (IDStatusPendidikan) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_TrLowonganMasuk_MsStatusPernikahan FOREIGN KEY (IDStatusPernikahan) REFERENCES msstatuspernikahan (IDStatusPernikahan) ON DELETE NO ACTION ON UPDATE NO ACTION
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO trlowonganmasuk VALUES ('000001','000001','000000','000001','000001','000002','000005','000038','','1234','aaaa','jakarta','1990-01-01','\0','a@b.com','1234','*****afdasfsaf','12321','\0','','','\0','','2012','23','32','','\0','0','2012-10-08 00:00:00');
DROP TABLE IF EXISTS mspengalaman;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mspengalaman (
  IDPengalaman char(6) NOT NULL,
  IDPencaker char(6) NOT NULL,
  Jabatan varchar(45) NOT NULL,
  UraianKerja varchar(45) NOT NULL,
  NamaPerusahaan varchar(45) NOT NULL,
  TglMasuk date NOT NULL,
  TglBerhenti date NOT NULL,
  PRIMARY KEY (IDPengalaman),
  KEY FK_MsPengalamanMsPencaker (IDPencaker),
  CONSTRAINT FK_MsPengalamanMsPencaker FOREIGN KEY (IDPencaker) REFERENCES mspencaker (IDPencaker) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS msperusahaantemp;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msperusahaantemp (
  IDPerusahaanTemp char(6) NOT NULL,
  Username varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  IDBidangPerusahaan char(6) NOT NULL,
  IDKelurahan char(6) NOT NULL,
  NamaPerusahaan varchar(50) NOT NULL,
  Email varchar(50) NOT NULL,
  Telepon varchar(50) NOT NULL,
  Alamat varchar(50) NOT NULL,
  KodePos varchar(50) NOT NULL,
  Kota varchar(50) NOT NULL,
  Propinsi varchar(50) NOT NULL,
  NamaPemberiKerja varchar(50) NOT NULL,
  JabatanPemberiKerja varchar(50) NOT NULL,
  TeleponPemberiKerja varchar(50) NOT NULL,
  EmailPemberiKerja varchar(50) NOT NULL,
  RegisterDate datetime NOT NULL,
  PRIMARY KEY (IDPerusahaanTemp),
  KEY FK_MsPerusahaanTemp_MsBidangPerusahaan (IDBidangPerusahaan),
  KEY FK_MsPerusahaanTemp_MsKelurahan (IDKelurahan),
  CONSTRAINT FK_MsPerusahaanTemp_MsBidangPerusahaan FOREIGN KEY (IDBidangPerusahaan) REFERENCES msbidangperusahaan (IDBidangPerusahaan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsPerusahaanTemp_MsKelurahan FOREIGN KEY (IDKelurahan) REFERENCES mskelurahan (IDKelurahan) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS msbidangperusahaan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msbidangperusahaan (
  IDBidangPerusahaan char(6) NOT NULL,
  NamaBidangPerusahaan varchar(50) NOT NULL,
  PRIMARY KEY (IDBidangPerusahaan)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msbidangperusahaan VALUES ('000001','OTOMOTIF');
INSERT INTO msbidangperusahaan VALUES ('000002','FUNITURE');
INSERT INTO msbidangperusahaan VALUES ('000003','TEXTILE');
INSERT INTO msbidangperusahaan VALUES ('000005','RENTAL MOBIL');
INSERT INTO msbidangperusahaan VALUES ('000006','RENTAL PULSA');
INSERT INTO msbidangperusahaan VALUES ('000007','PANEL LISTRIK');
INSERT INTO msbidangperusahaan VALUES ('000009','INDUSTRI PENGOLAHAN');
INSERT INTO msbidangperusahaan VALUES ('000011','JASA PENGIRIMAN');
INSERT INTO msbidangperusahaan VALUES ('000012','PERDAGANGAN');
INSERT INTO msbidangperusahaan VALUES ('000015','PERBANKAN');
INSERT INTO msbidangperusahaan VALUES ('000016','GARMENT');
INSERT INTO msbidangperusahaan VALUES ('000017','SOSIAL KEMASYARAKATAN');
INSERT INTO msbidangperusahaan VALUES ('000018','ELEKTRONomorIndukPencaker');
INSERT INTO msbidangperusahaan VALUES ('000021','PROPERTI');
INSERT INTO msbidangperusahaan VALUES ('000022','JASA PENGENDALIAN HAMA');
INSERT INTO msbidangperusahaan VALUES ('000023','OLEO CHEMICAL');
INSERT INTO msbidangperusahaan VALUES ('000024','PEMBIAYAAN');
INSERT INTO msbidangperusahaan VALUES ('000025','PELAYANAN PERPARKIRAN');
INSERT INTO msbidangperusahaan VALUES ('000026','SUPERVISOR');
INSERT INTO msbidangperusahaan VALUES ('000027','PENDIDIKAN');
INSERT INTO msbidangperusahaan VALUES ('000028','PENGOLAHAN MAKANAN DAN MINUMAN');
INSERT INTO msbidangperusahaan VALUES ('000031','MANUFACTURING');
INSERT INTO msbidangperusahaan VALUES ('000032','JASA CATHERING');
INSERT INTO msbidangperusahaan VALUES ('000033','PERTAMBANGAN');
INSERT INTO msbidangperusahaan VALUES ('000034','PEMERINTAHAN');
INSERT INTO msbidangperusahaan VALUES ('000035','KESEHATAN');
INSERT INTO msbidangperusahaan VALUES ('000036','ASURANSI');
INSERT INTO msbidangperusahaan VALUES ('000037','JASA KEUANGAN');
INSERT INTO msbidangperusahaan VALUES ('000038','RETAIL');
INSERT INTO msbidangperusahaan VALUES ('000039','EKSPEDISI');
INSERT INTO msbidangperusahaan VALUES ('000040','PJTKI');
INSERT INTO msbidangperusahaan VALUES ('000041','PENGOLAHAN KIMIA');
INSERT INTO msbidangperusahaan VALUES ('000042','MASANGGER');
INSERT INTO msbidangperusahaan VALUES ('000043','SPBU');
INSERT INTO msbidangperusahaan VALUES ('000044','PEMBUATAN SEPATU');
INSERT INTO msbidangperusahaan VALUES ('000045','INDUSTRI');
DROP TABLE IF EXISTS mslowongan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mslowongan (
  IDLowongan char(6) NOT NULL,
  IDPerusahaan char(6) NOT NULL,
  IDJabatanPekerjaan char(6) NOT NULL,
  IDKeahlian char(6) NOT NULL,
  IDStatusPendidikan char(6) NOT NULL,
  IDJenisPengupahan char(6) NOT NULL,
  IDStatusHubunganKerja char(6) NOT NULL,
  TglBerlaku date NOT NULL,
  TglBerakhir date NOT NULL,
  NamaPekerjaan varchar(45) NOT NULL,
  UraianPekerjaan varchar(45) NOT NULL,
  UraianTugas varchar(45) NOT NULL,
  Penempatan varchar(45) NOT NULL,
  BatasUmur tinyint(4) NOT NULL,
  JmlPria decimal(18,0) NOT NULL,
  JmlWanita decimal(18,0) NOT NULL,
  Jurusan varchar(45) NOT NULL,
  Pengalaman varchar(45) NOT NULL,
  SyaratKhusus varchar(45) NOT NULL,
  GajiPerbulan decimal(18,0) NOT NULL,
  JamKerjaSeminggu decimal(18,0) NOT NULL,
  RegisterDate datetime NOT NULL,
  PRIMARY KEY (IDLowongan),
  KEY FK_MsLowongan_MsJabatanPekerjaan (IDJabatanPekerjaan),
  KEY FK_MsLowongan_MsKeahlian (IDKeahlian),
  KEY FK_MsLowongan_MsStatusPendidikan (IDStatusPendidikan),
  KEY FK_MsLowongan_MsJenisPengupahan (IDJenisPengupahan),
  KEY FK_MsLowongan_MsStatusHubunganKerja (IDStatusHubunganKerja),
  KEY FK_MsLowongan_MsPerusahaan (IDPerusahaan),
  CONSTRAINT FK_MsLowongan_MsJabatanPekerjaan FOREIGN KEY (IDJabatanPekerjaan) REFERENCES msjabatanpekerjaan (IDJabatanPekerjaan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsLowongan_MsJenisPengupahan FOREIGN KEY (IDJenisPengupahan) REFERENCES msjenispengupahan (IDJenisPengupahan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsLowongan_MsKeahlian FOREIGN KEY (IDKeahlian) REFERENCES mskeahlian (IDKeahlian) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsLowongan_MsPerusahaan FOREIGN KEY (IDPerusahaan) REFERENCES msperusahaan (IDPerusahaan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsLowongan_MsStatusHubunganKerja FOREIGN KEY (IDStatusHubunganKerja) REFERENCES msstatushubungankerja (IDStatusHubunganKerja) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsLowongan_MsStatusPendidikan FOREIGN KEY (IDStatusPendidikan) REFERENCES msstatuspendidikan (IDStatusPendidikan) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO mslowongan VALUES ('000001','000000','000038','000013','000001','000001','000001','2012-10-08','2013-10-01','asdf','asdf','asdf','asdf',50,12,23,'asdf','asdf','asdf',123,0,'2012-10-08 10:15:58');
DROP TABLE IF EXISTS msevent;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msevent (
  IDEvent char(6) NOT NULL,
  TglEvent date NOT NULL,
  JudulEvent varchar(45) NOT NULL,
  IsiEvent text NOT NULL,
  PRIMARY KEY (IDEvent)
);
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS msjenislowongan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msjenislowongan (
  IDJenisLowongan char(6) NOT NULL,
  NamaJenisLowongan varchar(45) NOT NULL,
  PRIMARY KEY (IDJenisLowongan)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msjenislowongan VALUES ('000001','Computer / IT');
INSERT INTO msjenislowongan VALUES ('000002','Accounting / Finance');
INSERT INTO msjenislowongan VALUES ('000003','Sales / Marketing');
INSERT INTO msjenislowongan VALUES ('000004','Admin / HR');
INSERT INTO msjenislowongan VALUES ('000005','Engineering');
INSERT INTO msjenislowongan VALUES ('000006','Manufacturing');
INSERT INTO msjenislowongan VALUES ('000007','Building / Construction');
INSERT INTO msjenislowongan VALUES ('000008','Hotel / Restaurant');
INSERT INTO msjenislowongan VALUES ('000009','Education / Training');
INSERT INTO msjenislowongan VALUES ('000010','Arts / Media / Comm');
INSERT INTO msjenislowongan VALUES ('000011','Services');
INSERT INTO msjenislowongan VALUES ('000012','Sciences');
INSERT INTO msjenislowongan VALUES ('000013','Caddy');
INSERT INTO msjenislowongan VALUES ('000014','Management Trainee');
INSERT INTO msjenislowongan VALUES ('000015','Driver');
INSERT INTO msjenislowongan VALUES ('000016','MARKETING EXPORT');
INSERT INTO msjenislowongan VALUES ('000017','SUPERVISOR');
INSERT INTO msjenislowongan VALUES ('000018','STAFF PENGAJAR');
INSERT INTO msjenislowongan VALUES ('000019','Produksi');
INSERT INTO msjenislowongan VALUES ('000020','Manajer');
INSERT INTO msjenislowongan VALUES ('000021','PERTAMBANGAN');
INSERT INTO msjenislowongan VALUES ('000022','TEKNISI');
INSERT INTO msjenislowongan VALUES ('000023','Kepala Unit Produksi');
INSERT INTO msjenislowongan VALUES ('000024','Security');
INSERT INTO msjenislowongan VALUES ('000025','STAFF ADMINISTRASI');
INSERT INTO msjenislowongan VALUES ('000026','STAFF PEMASARAN');
INSERT INTO msjenislowongan VALUES ('000027','STAFF ACCOUNTING');
INSERT INTO msjenislowongan VALUES ('000028','STAFF IT');
INSERT INTO msjenislowongan VALUES ('000029','Programer');
INSERT INTO msjenislowongan VALUES ('000030','Koordinator');
INSERT INTO msjenislowongan VALUES ('000032','KESEHATAN');
INSERT INTO msjenislowongan VALUES ('000033','Purchasing');
INSERT INTO msjenislowongan VALUES ('000034','Safety');
INSERT INTO msjenislowongan VALUES ('000035','Project');
DROP TABLE IF EXISTS msaktivasi;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msaktivasi (
  IDAktivasi char(6) NOT NULL,
  IDPencaker char(6) NOT NULL,
  RegisterDate datetime NOT NULL,
  PRIMARY KEY (IDPencaker,IDAktivasi),
  KEY FK_MsAktivasi_MsPencaker (IDPencaker),
  CONSTRAINT FK_MsAktivasi_MsPencaker FOREIGN KEY (IDPencaker) REFERENCES mspencaker (IDPencaker) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS msberita;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msberita (
  IDBerita char(6) NOT NULL,
  TglBerita date NOT NULL,
  JudulBerita varchar(45) NOT NULL,
  IsiBerita varchar(45) NOT NULL,
  PRIMARY KEY (IDBerita)
);
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS mspencaker;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mspencaker (
  IDPencaker char(6) NOT NULL,
  IDUser char(6) NOT NULL,
  IDKelurahan char(6) NOT NULL,
  IDAgama char(6) NOT NULL,
  IDStatusPernikahan char(6) NOT NULL,
  IDStatusPendidikan char(6) NOT NULL,
  IDJabatanPekerjaan char(6) NOT NULL,
  NomorIndukPencaker varchar(50) NOT NULL,
  NamaPencaker varchar(50) NOT NULL,
  TempatLahir varchar(50) NOT NULL,
  TglLahir date NOT NULL,
  JenisKelamin bit(1) NOT NULL,
  Email varchar(50) NOT NULL,
  Telepon varchar(50) NOT NULL,
  Alamat varchar(50) NOT NULL,
  KodePos varchar(50) NOT NULL,
  Kewarganegaraan bit(1) NOT NULL,
  Jurusan varchar(50) NOT NULL,
  Keterampilan varchar(50) NOT NULL,
  NEMIPK bit(1) NOT NULL,
  Nilai varchar(50) NOT NULL,
  TahunLulus varchar(4) NOT NULL,
  TinggiBadan varchar(50) NOT NULL,
  BeratBadan varchar(50) NOT NULL,
  Keterangan varchar(50) NOT NULL,
  Lokasi bit(1) NOT NULL,
  UpahYangDicari varchar(50) NOT NULL,
  ExpiredDate date NOT NULL,
  RegisterDate datetime NOT NULL,
  PRIMARY KEY (IDPencaker),
  UNIQUE KEY NomorIndukPencaker_UNIQUE (NomorIndukPencaker),
  KEY FK_MsPencaker_MsUser (IDUser),
  KEY FK_MsPencaker_MsKelurahan (IDKelurahan),
  KEY FK_MsPencaker_MsStatusPernikahan (IDStatusPernikahan),
  KEY FK_MsPencaker_MsAgama (IDAgama),
  KEY FK_MsPencaker_MsStatusPendidikan (IDStatusPendidikan),
  KEY FK_MsPencaker_MsJabatanPekerjaan (IDJabatanPekerjaan),
  CONSTRAINT FK_MsPencaker_MsAgama FOREIGN KEY (IDAgama) REFERENCES msagama (IDAgama) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsPencaker_MsJabatanPekerjaan FOREIGN KEY (IDJabatanPekerjaan) REFERENCES msjabatanpekerjaan (IDJabatanPekerjaan) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_MsPencaker_MsKelurahan FOREIGN KEY (IDKelurahan) REFERENCES mskelurahan (IDKelurahan) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT FK_MsPencaker_MsStatusPendidikan FOREIGN KEY (IDStatusPendidikan) REFERENCES msstatuspendidikan (IDStatusPendidikan) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_MsPencaker_MsStatusPernikahan FOREIGN KEY (IDStatusPernikahan) REFERENCES msstatuspernikahan (IDStatusPernikahan) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT FK_MsPencaker_MsUser FOREIGN KEY (IDUser) REFERENCES msuser (IDUser) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO mspencaker VALUES ('000000','000002','000001','000001','000002','000005','000038','1234','aaaa','jakarta','1990-01-01','\0','a@b.com','1234','asdf','12321','\0','','','\0','','2012','23','32','','\0','0','2012-11-08','2012-08-09 00:16:25');
DROP TABLE IF EXISTS mskelurahan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE mskelurahan (
  IDKelurahan char(6) NOT NULL,
  IDKecamatan char(6) NOT NULL,
  NamaKelurahan varchar(45) NOT NULL,
  PRIMARY KEY (IDKelurahan),
  KEY FK_MsKelurahan_MsKecamatan (IDKecamatan),
  CONSTRAINT FK_MsKelurahan_MsKecamatan FOREIGN KEY (IDKecamatan) REFERENCES mskecamatan (IDKecamatan) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO mskelurahan VALUES ('000001','000001','Babelan Kota');
INSERT INTO mskelurahan VALUES ('000002','000001','Bahagia');
INSERT INTO mskelurahan VALUES ('000003','000001','Bunibakti');
INSERT INTO mskelurahan VALUES ('000004','000001','Huripjaya');
INSERT INTO mskelurahan VALUES ('000005','000001','Kebalen');
INSERT INTO mskelurahan VALUES ('000006','000001','Kedungjaya');
INSERT INTO mskelurahan VALUES ('000007','000001','Kedungpengawas');
INSERT INTO mskelurahan VALUES ('000008','000001','Muarabakti');
INSERT INTO mskelurahan VALUES ('000009','000001','Pantai Hurip');
INSERT INTO mskelurahan VALUES ('000010','000002','Jayabakti');
INSERT INTO mskelurahan VALUES ('000011','000002','Jayalaksana');
INSERT INTO mskelurahan VALUES ('000012','000002','Lenggahjaya');
INSERT INTO mskelurahan VALUES ('000013','000002','Lenggahsari');
INSERT INTO mskelurahan VALUES ('000014','000002','Setiajaya');
INSERT INTO mskelurahan VALUES ('000015','000002','Setialaksana');
INSERT INTO mskelurahan VALUES ('000016','000002','Sindangjaya');
INSERT INTO mskelurahan VALUES ('000017','000002','Sindangsari');
INSERT INTO mskelurahan VALUES ('000018','000003','Cibuntu');
INSERT INTO mskelurahan VALUES ('000019','000003','Kertamukti');
INSERT INTO mskelurahan VALUES ('000020','000003','Muktiwari');
INSERT INTO mskelurahan VALUES ('000021','000003','Sarimukti');
INSERT INTO mskelurahan VALUES ('000022','000003','Sukajaya');
INSERT INTO mskelurahan VALUES ('000023','000003','Wanajaya');
INSERT INTO mskelurahan VALUES ('000024','000003','Wanasari');
INSERT INTO mskelurahan VALUES ('000025','000004','Karanganyar');
INSERT INTO mskelurahan VALUES ('000026','000004','Karangbahagia');
INSERT INTO mskelurahan VALUES ('000027','000004','Karangmukti');
INSERT INTO mskelurahan VALUES ('000028','000004','Karangrahayu');
INSERT INTO mskelurahan VALUES ('000029','000004','Karangsatu');
INSERT INTO mskelurahan VALUES ('000030','000004','Karangsentosa');
INSERT INTO mskelurahan VALUES ('000031','000004','Karangsetra');
INSERT INTO mskelurahan VALUES ('000032','000004','Sukaraya');
INSERT INTO mskelurahan VALUES ('000033','000005','Jayasakti');
INSERT INTO mskelurahan VALUES ('000034','000005','Pantai Harapanjaya');
INSERT INTO mskelurahan VALUES ('000035','000005','Pantai Sederhana');
INSERT INTO mskelurahan VALUES ('000036','000005','Pantaibahagia');
INSERT INTO mskelurahan VALUES ('000037','000005','Pantaibakti');
INSERT INTO mskelurahan VALUES ('000038','000005','Pantaimekar');
INSERT INTO mskelurahan VALUES ('000039','000006','Bantarjaya');
INSERT INTO mskelurahan VALUES ('000040','000006','Bantarsari');
INSERT INTO mskelurahan VALUES ('000041','000006','Karangharja');
INSERT INTO mskelurahan VALUES ('000042','000006','Karanghaur');
INSERT INTO mskelurahan VALUES ('000043','000006','Karangjaya');
INSERT INTO mskelurahan VALUES ('000044','000006','Karangpatri');
INSERT INTO mskelurahan VALUES ('000045','000006','Karangreja');
INSERT INTO mskelurahan VALUES ('000046','000006','Karangsegar');
INSERT INTO mskelurahan VALUES ('000047','000006','Kertajaya');
INSERT INTO mskelurahan VALUES ('000048','000006','Kertasari');
INSERT INTO mskelurahan VALUES ('000049','000006','Sumberreja');
INSERT INTO mskelurahan VALUES ('000050','000006','Sumbersari');
INSERT INTO mskelurahan VALUES ('000051','000006','Sumberurip');
INSERT INTO mskelurahan VALUES ('000052','000007','Sukaindah');
INSERT INTO mskelurahan VALUES ('000053','000007','Sukajadi');
INSERT INTO mskelurahan VALUES ('000054','000007','Sukakarya');
INSERT INTO mskelurahan VALUES ('000055','000007','Sukakersa');
INSERT INTO mskelurahan VALUES ('000056','000007','Sukalaksana');
INSERT INTO mskelurahan VALUES ('000057','000007','Sukamakmur');
INSERT INTO mskelurahan VALUES ('000058','000007','Sukamurni');
INSERT INTO mskelurahan VALUES ('000059','000008','Banjarsari');
INSERT INTO mskelurahan VALUES ('000060','000008','Sukaasih');
INSERT INTO mskelurahan VALUES ('000061','000008','Sukadarma');
INSERT INTO mskelurahan VALUES ('000062','000008','Sukahurip');
INSERT INTO mskelurahan VALUES ('000063','000008','Sukamanah');
INSERT INTO mskelurahan VALUES ('000064','000008','Sukamulya');
INSERT INTO mskelurahan VALUES ('000065','000008','Sukarukun');
INSERT INTO mskelurahan VALUES ('000066','000009','Sukabakti');
INSERT INTO mskelurahan VALUES ('000067','000009','Sukamaju');
INSERT INTO mskelurahan VALUES ('000068','000009','Sukamantri');
INSERT INTO mskelurahan VALUES ('000069','000009','Sukarahayu');
INSERT INTO mskelurahan VALUES ('000070','000009','Sukaraja');
INSERT INTO mskelurahan VALUES ('000071','000009','Sukarapih');
INSERT INTO mskelurahan VALUES ('000072','000009','Sukawijaya');
INSERT INTO mskelurahan VALUES ('000073','000010','Tambun');
INSERT INTO mskelurahan VALUES ('000074','000011','Jatimulya');
INSERT INTO mskelurahan VALUES ('000075','000011','Lambangjaya');
INSERT INTO mskelurahan VALUES ('000076','000011','Lambangsari');
INSERT INTO mskelurahan VALUES ('000077','000011','Mangunjaya');
INSERT INTO mskelurahan VALUES ('000078','000011','Mekarsari');
INSERT INTO mskelurahan VALUES ('000079','000011','Setiadarma');
INSERT INTO mskelurahan VALUES ('000080','000011','Setiamekar');
INSERT INTO mskelurahan VALUES ('000081','000011','Sumberjaya');
INSERT INTO mskelurahan VALUES ('000082','000011','Tambun');
INSERT INTO mskelurahan VALUES ('000083','000011','Tridayasakti');
INSERT INTO mskelurahan VALUES ('000084','000012','Jalenjaya');
INSERT INTO mskelurahan VALUES ('000085','000012','Karangsatria');
INSERT INTO mskelurahan VALUES ('000086','000012','Satriajaya');
INSERT INTO mskelurahan VALUES ('000087','000012','Satriamekar');
INSERT INTO mskelurahan VALUES ('000088','000012','Sriamur');
INSERT INTO mskelurahan VALUES ('000089','000012','Srijaya');
INSERT INTO mskelurahan VALUES ('000090','000012','Srimahi');
INSERT INTO mskelurahan VALUES ('000091','000012','Srimukti');
INSERT INTO mskelurahan VALUES ('000092','000012','Gabus');
INSERT INTO mskelurahan VALUES ('000093','000012','Pulo Puter');
INSERT INTO mskelurahan VALUES ('000094','000013','Pahlawan Setia');
INSERT INTO mskelurahan VALUES ('000095','000013','Pantaimakmur');
INSERT INTO mskelurahan VALUES ('000096','000013','Pusakarakyat');
INSERT INTO mskelurahan VALUES ('000097','000013','Samudrajaya');
INSERT INTO mskelurahan VALUES ('000098','000013','Segarajaya');
INSERT INTO mskelurahan VALUES ('000099','000013','Segaramakmur');
INSERT INTO mskelurahan VALUES ('000100','000013','Setia Asih');
INSERT INTO mskelurahan VALUES ('000101','000013','Setiamulya');
INSERT INTO mskelurahan VALUES ('000102','000014','Cikedokan');
INSERT INTO mskelurahan VALUES ('000103','000014','Danauindah');
INSERT INTO mskelurahan VALUES ('000104','000014','Gandamekar');
INSERT INTO mskelurahan VALUES ('000105','000014','Gandasari');
INSERT INTO mskelurahan VALUES ('000106','000014','Jatiwangi');
INSERT INTO mskelurahan VALUES ('000107','000014','Kalijaya');
INSERT INTO mskelurahan VALUES ('000108','000014','Mekarwangi');
INSERT INTO mskelurahan VALUES ('000109','000014','Sukadanau');
INSERT INTO mskelurahan VALUES ('000110','000014','Telaga Asih');
INSERT INTO mskelurahan VALUES ('000111','000014','Telagamurni');
INSERT INTO mskelurahan VALUES ('000112','000014','Telajung');
INSERT INTO mskelurahan VALUES ('000113','000015','Cikarang Pusat');
INSERT INTO mskelurahan VALUES ('000114','000016','Ciantra');
INSERT INTO mskelurahan VALUES ('000115','000016','Cibatu');
INSERT INTO mskelurahan VALUES ('000116','000016','Pasirsari');
INSERT INTO mskelurahan VALUES ('000117','000016','Sukadami');
INSERT INTO mskelurahan VALUES ('000118','000016','Sukaresmi');
INSERT INTO mskelurahan VALUES ('000119','000016','Sukasejati');
INSERT INTO mskelurahan VALUES ('000120','000016','Serang');
INSERT INTO mskelurahan VALUES ('000121','000017','Cipayung');
INSERT INTO mskelurahan VALUES ('000122','000017','Hegarmanah');
INSERT INTO mskelurahan VALUES ('000123','000017','Jatibaru');
INSERT INTO mskelurahan VALUES ('000124','000017','Jatireja');
INSERT INTO mskelurahan VALUES ('000125','000017','Karangsari');
INSERT INTO mskelurahan VALUES ('000126','000017','Labansari');
INSERT INTO mskelurahan VALUES ('000127','000017','Sertajaya');
INSERT INTO mskelurahan VALUES ('000128','000017','Tanjungbaru');
INSERT INTO mskelurahan VALUES ('000129','000018','Cikarang Kota');
INSERT INTO mskelurahan VALUES ('000130','000018','Harjamekar');
INSERT INTO mskelurahan VALUES ('000131','000018','Karangasih');
INSERT INTO mskelurahan VALUES ('000132','000018','Karangbaru');
INSERT INTO mskelurahan VALUES ('000133','000018','Karangraharja');
INSERT INTO mskelurahan VALUES ('000134','000018','Mekarmukti');
INSERT INTO mskelurahan VALUES ('000135','000018','Pasirgombong');
INSERT INTO mskelurahan VALUES ('000136','000018','Simpangan');
INSERT INTO mskelurahan VALUES ('000137','000018','Tanjungsari');
INSERT INTO mskelurahan VALUES ('000138','000018','Waluya');
INSERT INTO mskelurahan VALUES ('000139','000018','Wangunharja');
DROP TABLE IF EXISTS msjabatanpekerjaan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msjabatanpekerjaan (
  IDJabatanPekerjaan char(6) NOT NULL,
  NamaJabatanPekerjaan varchar(45) NOT NULL,
  PRIMARY KEY (IDJabatanPekerjaan)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msjabatanpekerjaan VALUES ('000001','I T');
INSERT INTO msjabatanpekerjaan VALUES ('000002','MANAGEMENT TRAINEE');
INSERT INTO msjabatanpekerjaan VALUES ('000003','MARKETING');
INSERT INTO msjabatanpekerjaan VALUES ('000004','PRODUKSI');
INSERT INTO msjabatanpekerjaan VALUES ('000006','CLASS COORDINATOR');
INSERT INTO msjabatanpekerjaan VALUES ('000007','CALL CENTER STAFF (CCS)');
INSERT INTO msjabatanpekerjaan VALUES ('000008','CREDIT MARKETING OFFICER MOTOR');
INSERT INTO msjabatanpekerjaan VALUES ('000009','CREDIT OFFICER MOBIL');
INSERT INTO msjabatanpekerjaan VALUES ('000010','CREDIT MARKETING OFFICER MOBIL');
INSERT INTO msjabatanpekerjaan VALUES ('000011','STAFF');
INSERT INTO msjabatanpekerjaan VALUES ('000012','CALL CENTER STAFF');
INSERT INTO msjabatanpekerjaan VALUES ('000013','FIELD COLLECTOR');
INSERT INTO msjabatanpekerjaan VALUES ('000014','BAGIAN PROJECT');
INSERT INTO msjabatanpekerjaan VALUES ('000015','STAFF FINANCE');
INSERT INTO msjabatanpekerjaan VALUES ('000016','INTERNAL AUDIT');
INSERT INTO msjabatanpekerjaan VALUES ('000017','ANALIS KIMIA');
INSERT INTO msjabatanpekerjaan VALUES ('000018','SEKRETARIS');
INSERT INTO msjabatanpekerjaan VALUES ('000019','KEPALA GUDANG SPAREPART');
INSERT INTO msjabatanpekerjaan VALUES ('000020','KEPALA GUDANG FINISHED GOODS');
INSERT INTO msjabatanpekerjaan VALUES ('000021','Staff Lapangan');
INSERT INTO msjabatanpekerjaan VALUES ('000022','WAITRESS');
INSERT INTO msjabatanpekerjaan VALUES ('000023','WAITRESS');
INSERT INTO msjabatanpekerjaan VALUES ('000024','CADDY');
INSERT INTO msjabatanpekerjaan VALUES ('000025','TERAPIS');
INSERT INTO msjabatanpekerjaan VALUES ('000026','RESTAURANT CREW');
INSERT INTO msjabatanpekerjaan VALUES ('000027','OPERATOR MESIN BUBUT');
INSERT INTO msjabatanpekerjaan VALUES ('000028','WELDER');
INSERT INTO msjabatanpekerjaan VALUES ('000029','account recievable officer');
INSERT INTO msjabatanpekerjaan VALUES ('000030','Credit settlement Officer-CSO');
INSERT INTO msjabatanpekerjaan VALUES ('000031','Staf Pelayanan Pos');
INSERT INTO msjabatanpekerjaan VALUES ('000032','DRIVER');
INSERT INTO msjabatanpekerjaan VALUES ('000033','SPG');
INSERT INTO msjabatanpekerjaan VALUES ('000034','MARKETING EXPORT');
INSERT INTO msjabatanpekerjaan VALUES ('000035','SUPERVISOR');
INSERT INTO msjabatanpekerjaan VALUES ('000036','AGENCY AREA EXECUTIVE MOBIL');
INSERT INTO msjabatanpekerjaan VALUES ('000037','AGENCY AREA EXECUTIVE MOTOR');
INSERT INTO msjabatanpekerjaan VALUES ('000038','ACCOUNT EXECUTIVE/SURVEYOR MOTOR');
INSERT INTO msjabatanpekerjaan VALUES ('000039','MAREKETING EXECUTIVE/SURVEYOR MOBIL');
INSERT INTO msjabatanpekerjaan VALUES ('000040','PENDIDIKAN');
INSERT INTO msjabatanpekerjaan VALUES ('000041','SALES SUPERVISOR');
INSERT INTO msjabatanpekerjaan VALUES ('000042','FIELD SURVEYOR');
INSERT INTO msjabatanpekerjaan VALUES ('000043','SALES COUNTER');
INSERT INTO msjabatanpekerjaan VALUES ('000044','COLLECTION');
INSERT INTO msjabatanpekerjaan VALUES ('000045','TEKNISI');
INSERT INTO msjabatanpekerjaan VALUES ('000046','ANALIS PACKAGING');
INSERT INTO msjabatanpekerjaan VALUES ('000047','LEGAL &amp; GA');
INSERT INTO msjabatanpekerjaan VALUES ('000048','MANAJER PREMIER LOUNGE');
INSERT INTO msjabatanpekerjaan VALUES ('000049','PRAMUNIAGA');
INSERT INTO msjabatanpekerjaan VALUES ('000050','MT COLLECTOR');
INSERT INTO msjabatanpekerjaan VALUES ('000051','SUPERVISOR');
INSERT INTO msjabatanpekerjaan VALUES ('000052','SALES FORCE');
INSERT INTO msjabatanpekerjaan VALUES ('000053','TEKNIK SIPIL');
INSERT INTO msjabatanpekerjaan VALUES ('000054','TEKNIK MESIN');
INSERT INTO msjabatanpekerjaan VALUES ('000055','TEKNISI LISTRIK');
INSERT INTO msjabatanpekerjaan VALUES ('000056','MEKANIK WELDER');
INSERT INTO msjabatanpekerjaan VALUES ('000057','PEMAGANGAN');
INSERT INTO msjabatanpekerjaan VALUES ('000058','OPERATOR FORKLIFT');
INSERT INTO msjabatanpekerjaan VALUES ('000059','KESEHATAN');
INSERT INTO msjabatanpekerjaan VALUES ('000060','MANAJER UNIT');
INSERT INTO msjabatanpekerjaan VALUES ('000061','Security');
INSERT INTO msjabatanpekerjaan VALUES ('000062','MANAJER');
INSERT INTO msjabatanpekerjaan VALUES ('000063','KASIR');
INSERT INTO msjabatanpekerjaan VALUES ('000064','Head Of Warehouse Trainee');
INSERT INTO msjabatanpekerjaan VALUES ('000065','SAles Kanvas, TO, Motoris');
INSERT INTO msjabatanpekerjaan VALUES ('000066','STORE CREW');
INSERT INTO msjabatanpekerjaan VALUES ('000067','SURVEYOR');
INSERT INTO msjabatanpekerjaan VALUES ('000068','AUDITOR');
INSERT INTO msjabatanpekerjaan VALUES ('000069','EKSPEDISI');
INSERT INTO msjabatanpekerjaan VALUES ('000070','OFFICE BOY');
INSERT INTO msjabatanpekerjaan VALUES ('000071','PJTKI');
INSERT INTO msjabatanpekerjaan VALUES ('000072','Pengawas Kebersihan');
INSERT INTO msjabatanpekerjaan VALUES ('000073','MASANGGER');
INSERT INTO msjabatanpekerjaan VALUES ('000074','KESEHATAN');
INSERT INTO msjabatanpekerjaan VALUES ('000075','CUSTOMER SERVICE');
INSERT INTO msjabatanpekerjaan VALUES ('000076','TELLER');
INSERT INTO msjabatanpekerjaan VALUES ('000077','Industrial Engineering');
INSERT INTO msjabatanpekerjaan VALUES ('000078','Manufacturing Excellence');
INSERT INTO msjabatanpekerjaan VALUES ('000079','Manufacturing Automation');
INSERT INTO msjabatanpekerjaan VALUES ('000080','Purchasing');
INSERT INTO msjabatanpekerjaan VALUES ('000081','Safety');
INSERT INTO msjabatanpekerjaan VALUES ('000082','Project');
INSERT INTO msjabatanpekerjaan VALUES ('999999','Lainnya');
DROP TABLE IF EXISTS msjenispengupahan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msjenispengupahan (
  IDJenisPengupahan char(6) NOT NULL,
  NamaJenisPengupahan varchar(45) NOT NULL,
  PRIMARY KEY (IDJenisPengupahan)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msjenispengupahan VALUES ('000001','Borongan');
INSERT INTO msjenispengupahan VALUES ('000002','Harian');
INSERT INTO msjenispengupahan VALUES ('000003','Mingguan');
INSERT INTO msjenispengupahan VALUES ('000004','Bulanan');
DROP TABLE IF EXISTS msresetpassword;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msresetpassword (
  IDUser char(6) NOT NULL,
  ActivationCode char(32) NOT NULL,
  RegisterDate datetime NOT NULL,
  PRIMARY KEY (IDUser),
  KEY FK_MsResetPassword_MsUser (IDUser),
  CONSTRAINT FK_MsResetPassword_MsUser FOREIGN KEY (IDUser) REFERENCES msuser (IDUser) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS msbahasa;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msbahasa (
  IDBahasa char(6) NOT NULL,
  IDPencaker char(6) NOT NULL,
  NamaBahasa varchar(45) NOT NULL,
  PRIMARY KEY (IDBahasa),
  KEY FK_MsBahasaMsPencaker (IDPencaker),
  CONSTRAINT FK_MsBahasaMsPencaker FOREIGN KEY (IDPencaker) REFERENCES mspencaker (IDPencaker) ON DELETE CASCADE ON UPDATE CASCADE
);
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS msstatushubungankerja;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msstatushubungankerja (
  IDStatusHubunganKerja char(6) NOT NULL,
  NamaStatusHubunganKerja varchar(45) NOT NULL,
  PRIMARY KEY (IDStatusHubunganKerja)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msstatushubungankerja VALUES ('000001','Waktu tertentu');
INSERT INTO msstatushubungankerja VALUES ('000002','Waktu tidak tertentu');
DROP TABLE IF EXISTS msjenisuser;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msjenisuser (
  IDJenisUser char(6) NOT NULL,
  NamaJenisUser varchar(45) NOT NULL,
  PRIMARY KEY (IDJenisUser)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msjenisuser VALUES ('000000','Admin');
INSERT INTO msjenisuser VALUES ('000001','Perusahaan');
INSERT INTO msjenisuser VALUES ('000002','Pencari Kerja');
DROP TABLE IF EXISTS msstatuspernomorindukpencakerahan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msstatuspernomorindukpencakerahan (
  IDStatusPerNomorIndukPencakerahan char(6) NOT NULL,
  NamaStatusPerNomorIndukPencakerahan varchar(50) NOT NULL,
  PRIMARY KEY (IDStatusPerNomorIndukPencakerahan)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msstatuspernomorindukpencakerahan VALUES ('000001','Belum MeNomorIndukPencakerah');
INSERT INTO msstatuspernomorindukpencakerahan VALUES ('000002','MeNomorIndukPencakerah');
INSERT INTO msstatuspernomorindukpencakerahan VALUES ('000003','Duda');
INSERT INTO msstatuspernomorindukpencakerahan VALUES ('000004','Janda');
DROP TABLE IF EXISTS ci_sessions;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE ci_sessions (
  session_id varchar(40) NOT NULL DEFAULT '0',
  ip_address varchar(45) NOT NULL DEFAULT '0',
  user_agent varchar(120) NOT NULL,
  last_activity int(10) unsigned NOT NULL DEFAULT '0',
  user_data text NOT NULL,
  PRIMARY KEY (session_id),
  KEY last_activity_idx (last_activity)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO ci_sessions VALUES ('d4199eebf1691c73a39dfbec1f5455e5','::1','Mozilla/5.0 (Windows NT 6.1; WOW64; rv:15.0) Gecko/20100101 Firefox/15.0.1',1349679232,'a:3:{s:6:\"iduser\";s:6:\"000000\";s:8:\"username\";s:5:\"admin\";s:11:\"idjenisuser\";s:6:\"000000\";}');
DROP TABLE IF EXISTS msstatuspernikahan;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msstatuspernikahan (
  IDStatusPernikahan char(6) NOT NULL,
  NamaStatusPernikahan varchar(50) NOT NULL,
  PRIMARY KEY (IDStatusPernikahan)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msstatuspernikahan VALUES ('000001','Belum Menikah');
INSERT INTO msstatuspernikahan VALUES ('000002','Menikah');
INSERT INTO msstatuspernikahan VALUES ('000003','Duda');
INSERT INTO msstatuspernikahan VALUES ('000004','Janda');
DROP TABLE IF EXISTS msagama;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msagama (
  IDAgama char(6) NOT NULL,
  NamaAgama varchar(50) NOT NULL,
  PRIMARY KEY (IDAgama)
);
/*!40101 SET character_set_client = @saved_cs_client */;

INSERT INTO msagama VALUES ('000001','Islam');
INSERT INTO msagama VALUES ('000002','Katholik');
INSERT INTO msagama VALUES ('000003','Protestan');
INSERT INTO msagama VALUES ('000004','Hindu');
INSERT INTO msagama VALUES ('000005','Budha');
DROP TABLE IF EXISTS msnews;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE msnews (
  IDNews char(6) NOT NULL,
  TglNews date NOT NULL,
  NewsDetail text NOT NULL,
  PRIMARY KEY (IDNews)
);
/*!40101 SET character_set_client = @saved_cs_client */;


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

