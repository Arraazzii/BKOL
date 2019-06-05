<?php

class MsLaporan extends CI_Model
{
	public function dataByKecamatan($dateStart, $dateEnd, $statusPekerjaan){
		$query = $this->db->query("SELECT a.NamaKecamatan, COUNT(p.IDPencaker) as total, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM mskecamatan as a JOIN mskelurahan as sp ON a.IDKecamatan = sp.IDKecamatan LEFT JOIN mspencaker as p ON sp.IDKelurahan = p.IDKelurahan AND p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' LEFT JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '$statusPekerjaan' GROUP BY a.IDKecamatan ORDER BY a.NamaKecamatan ASC");
		return $query->result_array();
	}

	public function dataByPendidikan($dateStart, $dateEnd, $statusPekerjaan){
		$query = $this->db->query("SELECT sp.NamaStatusPendidikan, COUNT(p.IDPencaker) as total, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM msstatuspendidikan as sp LEFT JOIN mspencaker as p ON sp.IDStatusPendidikan = p.IDStatusPendidikan AND p.RegisterDate BETWEEN '2019-03-01' AND '2019-06-05' LEFT JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '0' GROUP BY sp.IDStatusPendidikan ORDER BY SP.IDStatusPendidikan ASC");
		return $query->result_array();
	}

	public function dataByUmur($dateStart, $dateEnd, $statusPekerjaan){
		$query = $this->db->query("SELECT t1.age,IFNULL(t2.laki,0) as laki,IFNULL(t2.cewe,0) as cewe,IFNULL(t2.Total, 0) AS Total  FROM ( SELECT '0 S/D 14' AS age UNION ALL SELECT '15 S/D 19' AS age UNION ALL SELECT '20 S/D 29' AS age UNION ALL SELECT '30 S/D 44' AS age UNION ALL SELECT '45 S/D 54' AS age UNION ALL SELECT '55 Keatas' AS age ) t1 LEFT JOIN ( SELECT COUNT(COALESCE(p.IDPencaker, 0)) as total, CASE WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) <= 14 THEN '0 S/D 14' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 15 AND 19 THEN '15 S/D 19' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 20 AND 29 THEN '20 S/D 29' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 30 AND 44 THEN '30 S/D 44' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 45 AND 54 THEN '45 S/D 54' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) >= 55 THEN '55 Keatas' END AS age, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM mspencaker p LEFT JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '$statusPekerjaan' WHERE p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' GROUP BY age) t2 ON t1.age=t2.age");
		return $query->result_array();
	}

	public function dataByPosisiJabatan($dateStart, $dateEnd, $statusPekerjaan){
		$query = $this->db->query("SELECT sp.NamaPosisiJabatan, COUNT(p.IDPencaker) as total, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM msposisijabatan as sp LEFT JOIN mspencaker as p ON sp.IDPosisiJabatan = p.IDPosisiJabatan AND p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' LEFT JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '$statusPekerjaan' GROUP BY sp.IDPosisiJabatan ORDER BY sp.NamaPosisiJabatan");
		return $query->result_array();
	}

	public function dataByLamaran($dateStart, $dateEnd){
		$query = $this->db->query("SELECT a.NamaPencaker, b.NamaLowongan, c.NamaPerusahaan, a.StatusLowongan FROM trlowonganmasuk a LEFT JOIN mslowongan b ON b.IDLowongan = a.IDLowongan LEFT JOIN msperusahaan c ON c.IDPerusahaan = b.IDPerusahaan WHERE b.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' ORDER BY a.NamaPencaker ASC");
		return $query->result_array();
	}

	public function dataByPenempatan($dateStart, $dateEnd){
		$query = $this->db->query("SELECT a.NomerPenduduk, a.NamaPencaker, a.alamat, b.NamaPerusahaan, b.Jabatan, c.NamaStatusPendidikan, a.JenisKelamin FROM mspengalaman b JOIN mspencaker a ON a.IDPencaker = b.IDPencaker JOIN msstatuspendidikan c ON c.IDStatusPendidikan = a.IDStatusPendidikan WHERE b.StatusPekerjaan = '1' AND a.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' ORDER BY a.NamaPencaker ASC");
		return $query->result_array();
	}

}
?>