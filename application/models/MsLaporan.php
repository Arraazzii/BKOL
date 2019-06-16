<?php

class MsLaporan extends CI_Model
{
	public function dataByKecamatan($dateStart, $dateEnd, $statusPekerjaan){
			$query = $this->db->query("SELECT a.NamaKecamatan, COUNT(p.IDPencaker) as total, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM mskecamatan as a JOIN mskelurahan as sp ON a.IDKecamatan = sp.IDKecamatan LEFT JOIN mspencaker as p ON sp.IDKelurahan = p.IDKelurahan AND p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' GROUP BY a.IDKecamatan ORDER BY a.NamaKecamatan ASC");
		
		return $query->result_array();
	}

	public function dataNullByKecamatan($dateStart, $dateEnd, $kategori, $keykecamatan){
		$query = $this->db->query("SELECT a.NamaKecamatan, COUNT(p.IDPencaker) as total, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM mskecamatan as a JOIN mskelurahan as sp ON a.IDKecamatan = sp.IDKecamatan LEFT JOIN mspencaker as p ON sp.IDKelurahan = p.IDKelurahan AND p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '1' WHERE a.IDKecamatan='$keykecamatan' GROUP BY a.IDKecamatan ORDER BY a.NamaKecamatan ASC");

		return $query->result_array();
	}

	public function dataByPendidikan($dateStart, $dateEnd, $statusPekerjaan){
		$query = $this->db->query("SELECT sp.NamaStatusPendidikan, COUNT(p.IDPencaker) as total, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM msstatuspendidikan as sp LEFT JOIN mspencaker as p ON sp.IDStatusPendidikan = p.IDStatusPendidikan AND p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' GROUP BY sp.IDStatusPendidikan ORDER BY sp.IDStatusPendidikan ASC");
		return $query->result_array();
	}

	public function dataNullByPendidikan($dateStart, $dateEnd, $statusPekerjaan, $idpendidikan){
		$query = $this->db->query("SELECT sp.NamaStatusPendidikan, COUNT(p.IDPencaker) as total, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM msstatuspendidikan as sp LEFT JOIN mspencaker as p ON sp.IDStatusPendidikan = p.IDStatusPendidikan AND p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '1' WHERE sp.IDStatusPendidikan='$idpendidikan' GROUP BY sp.IDStatusPendidikan ORDER BY sp.IDStatusPendidikan ASC");
		return $query->result_array();
	}

	public function dataByUmur($dateStart, $dateEnd, $statusPekerjaan){
		$query = $this->db->query("SELECT t1.age,IFNULL(t2.laki,0) as laki,IFNULL(t2.cewe,0) as cewe,IFNULL(t2.Total, 0) AS Total  FROM ( SELECT '0 S/D 14' AS age UNION ALL SELECT '15 S/D 19' AS age UNION ALL SELECT '20 S/D 29' AS age UNION ALL SELECT '30 S/D 44' AS age UNION ALL SELECT '45 S/D 54' AS age UNION ALL SELECT '55 Keatas' AS age ) t1 LEFT JOIN ( SELECT COUNT(COALESCE(p.IDPencaker, 0)) as total, CASE WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) <= 14 THEN '0 S/D 14' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 15 AND 19 THEN '15 S/D 19' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 20 AND 29 THEN '20 S/D 29' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 30 AND 44 THEN '30 S/D 44' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 45 AND 54 THEN '45 S/D 54' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) >= 55 THEN '55 Keatas' END AS age, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM mspencaker p WHERE p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' GROUP BY age) t2 ON t1.age=t2.age");
		
		return $query->result_array();
	}

	public function dataNullByUmur($dateStart, $dateEnd, $statusPekerjaan){
		$query = $this->db->query("SELECT t1.age,IFNULL(t2.laki,0) as laki,IFNULL(t2.cewe,0) as cewe,IFNULL(t2.Total, 0) AS Total  FROM ( SELECT '0 S/D 14' AS age UNION ALL SELECT '15 S/D 19' AS age UNION ALL SELECT '20 S/D 29' AS age UNION ALL SELECT '30 S/D 44' AS age UNION ALL SELECT '45 S/D 54' AS age UNION ALL SELECT '55 Keatas' AS age ) t1 LEFT JOIN ( SELECT COUNT(COALESCE(p.IDPencaker, 0)) as total, CASE WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) <= 14 THEN '0 S/D 14' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 15 AND 19 THEN '15 S/D 19' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 20 AND 29 THEN '20 S/D 29' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 30 AND 44 THEN '30 S/D 44' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) BETWEEN 45 AND 54 THEN '45 S/D 54' WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) >= 55 THEN '55 Keatas' END AS age, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM mspencaker p JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '$statusPekerjaan' WHERE p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' GROUP BY age) t2 ON t1.age=t2.age");
		
		return $query->result_array();
	}

	public function dataByPosisiJabatan($dateStart, $dateEnd, $statusPekerjaan){
		$query = $this->db->query("SELECT sp.NamaPosisiJabatan, COUNT(p.IDPencaker) as total, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM msposisijabatan as sp LEFT JOIN mspencaker as p ON sp.IDPosisiJabatan = p.IDPosisiJabatan AND p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' GROUP BY sp.IDPosisiJabatan ORDER BY sp.NamaPosisiJabatan");
		
		return $query->result_array();
	}

	public function dataNullByPosisiJabatan($dateStart, $dateEnd, $statusPekerjaan, $idpekerjaan){
		$query = $this->db->query("SELECT sp.NamaPosisiJabatan, COUNT(p.IDPencaker) as total, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM msposisijabatan as sp LEFT JOIN mspencaker as p ON sp.IDPosisiJabatan = p.IDPosisiJabatan AND p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '$statusPekerjaan' WHERE sp.IDPosisiJabatan='$idpekerjaan' GROUP BY sp.IDPosisiJabatan ORDER BY sp.NamaPosisiJabatan");
		
		return $query->result_array();
	}

	public function dataByLamaran($dateStart, $dateEnd){
		$dateawal = $dateStart . ' ' . date("H:i:s");
		$dateakhir = $dateEnd . ' ' . date("H:i:s");
		$query = $this->db->query("SELECT a.NamaPencaker, b.NamaLowongan, c.NamaPerusahaan, a.StatusLowongan FROM trlowonganmasuk a JOIN mslowongan b ON b.IDLowongan = a.IDLowongan JOIN msperusahaan c ON c.IDPerusahaan = b.IDPerusahaan WHERE b.RegisterDate BETWEEN '$dateawal' AND '$dateakhir' ORDER BY a.NamaPencaker ASC");
		return $query->result_array();
	}

	public function dataByPenempatan($dateStart, $dateEnd){
		$query = $this->db->query("SELECT a.NomerPenduduk, a.NamaPencaker, a.alamat, b.NamaPerusahaan, b.Jabatan, c.NamaStatusPendidikan, a.JenisKelamin FROM msstatuspendidikan c JOIN mspencaker a ON c.IDStatusPendidikan = a.IDStatusPendidikan AND a.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' JOIN mspengalaman b ON a.IDPencaker = b.IDPencaker AND b.StatusPekerjaan = '1' ORDER BY a.NamaPencaker ASC");
		return $query->result_array();
	}

	public function dataByTerdaftar($dateStart, $dateEnd){
		$query = $this->db->query("SELECT a.NomerPenduduk, a.NamaPencaker, a.alamat, c.NamaStatusPendidikan, a.JenisKelamin FROM msstatuspendidikan c JOIN mspencaker a ON c.IDStatusPendidikan = a.IDStatusPendidikan AND a.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' ORDER BY a.NamaPencaker ASC");
		return $query->result_array();
	}

	public function GetCountByPeriod($type, $start, $end, $cat){
		if ($cat == 'kecamatan') 
        {
        	if ($type == '0') {
        		 $query = $this->db->query("SELECT SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe, COUNT(p.IDPencaker) as total FROM mskecamatan as a JOIN mskelurahan as sp ON a.IDKecamatan = sp.IDKecamatan LEFT JOIN mspencaker as p ON sp.IDKelurahan = p.IDKelurahan AND p.RegisterDate BETWEEN '$start' AND '$end'");
        	}else{
        		$query = $this->db->query("SELECT SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe, COUNT(p.IDPencaker) as total FROM mskecamatan as a JOIN mskelurahan as sp ON a.IDKecamatan = sp.IDKecamatan LEFT JOIN mspencaker as p ON sp.IDKelurahan = p.IDKelurahan AND p.RegisterDate BETWEEN '$start' AND '$end' JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '$type' ");
        	}
        }
        else if($cat == 'umur')
        {	
        	if ($type == '0') {
        		 $query = $this->db->query("SELECT IFNULL(t2.laki,0) as laki, IFNULL(t2.cewe,0) as cewe, IFNULL(t2.Total, 0) AS total  FROM ( SELECT '100' AS age) t1 LEFT JOIN ( SELECT COUNT(COALESCE(p.IDPencaker, 0)) as total, CASE WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) <= 100 THEN '100' END AS age, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0)) as cewe FROM mspencaker p WHERE p.RegisterDate BETWEEN '$start' AND '$end') t2 ON t1.age=t2.age");
        	}else{
        		 $query = $this->db->query("SELECT IFNULL(t2.laki,0) as laki, IFNULL(t2.cewe,0) as cewe, IFNULL(t2.Total, 0) AS total  FROM ( SELECT '100' AS age) t1 LEFT JOIN ( SELECT COUNT(COALESCE(p.IDPencaker, 0)) as total, CASE WHEN TIMESTAMPDIFF(YEAR, p.TglLahir, CURDATE()) <= 100 THEN '100' END AS age, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0)) as cewe FROM mspencaker p JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '$type' WHERE p.RegisterDate BETWEEN '$start' AND '$end') t2 ON t1.age=t2.age");
        	}
        }
        else if($cat == 'pendidikan')
        {
        	if ($type == '0') {
        		$query = $this->db->query("SELECT SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe, COUNT(p.IDPencaker) as total FROM msstatuspendidikan as sp LEFT JOIN mspencaker as p ON sp.IDStatusPendidikan = p.IDStatusPendidikan AND p.RegisterDate BETWEEN '$start' AND '$end'");
        	}else{
        		$query = $this->db->query("SELECT SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe, COUNT(p.IDPencaker) as total FROM msstatuspendidikan as sp LEFT JOIN mspencaker as p ON sp.IDStatusPendidikan = p.IDStatusPendidikan AND p.RegisterDate BETWEEN '$start' AND '$end' JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '$type'");
        	}
        }
        else if($cat == 'posisi')
        {
        	if ($type == '0') {
        		 $query = $this->db->query("SELECT SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe, COUNT(p.IDPencaker) as total FROM msposisijabatan as sp LEFT JOIN mspencaker as p ON sp.IDPosisiJabatan = p.IDPosisiJabatan AND p.RegisterDate BETWEEN '$start' AND '$end'");
        	}else{
        		 $query = $this->db->query("SELECT SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe, COUNT(p.IDPencaker) as total FROM msposisijabatan as sp LEFT JOIN mspencaker as p ON sp.IDPosisiJabatan = p.IDPosisiJabatan AND p.RegisterDate BETWEEN '$start' AND '$end' JOIN mspengalaman g ON g.IDPencaker = p.IDPencaker AND g.StatusPekerjaan = '$type'");
        	}
        }else{
        	$query = "error";
        }
        return $query->result();
    }

    public function TotalPencakerHome($dateStart, $dateEnd){
		$query = $this->db->query("SELECT COUNT(p.IDPencaker) as total, SUM(COALESCE(p.JenisKelamin = 0, 0)) as laki, SUM(COALESCE(p.JenisKelamin = 1, 0) ) as cewe FROM msstatuspendidikan as sp LEFT JOIN mspencaker as p ON sp.IDStatusPendidikan = p.IDStatusPendidikan AND p.RegisterDate BETWEEN '$dateStart' AND '$dateEnd'");
		return $query->result_array();
	}

	public function DataPencakerHome($dateStart, $dateEnd){
		$query = $this->db->query("SELECT a.NomorIndukPencaker, a.NamaPencaker, c.NamaStatusPendidikan, a.JenisKelamin, date(a.RegisterDate) as registerDate FROM msstatuspendidikan c JOIN mspencaker a ON c.IDStatusPendidikan = a.IDStatusPendidikan AND a.RegisterDate BETWEEN '$dateStart' AND '$dateEnd' ORDER BY a.NamaPencaker ASC");
		return $query->result_array();
	}
	
}
?>