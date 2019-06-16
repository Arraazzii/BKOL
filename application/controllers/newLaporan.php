<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class newLaporan extends CI_Controller {

    public function ajaxKecamatan()
    {
        $iduser = $this->session->userdata('iduser');
        if ($iduser != NULL){
            $this->load->model("MsLaporan");
            $newDate = $this->input->post("date_from");  
            $dateStart = date("Y-m-d", strtotime($newDate));    
            $endDate = $this->input->post("date_to");      
            $dateEnd = date("Y-m-d", strtotime($endDate));    
            $kategori = $this->input->post("kategori");

            if ($kategori == '1') {
                $kecamatan = $this->db->query("SELECT IDKecamatan, NamaKecamatan FROM mskecamatan ORDER BY NamaKecamatan ASC")->result_array();
                foreach ($kecamatan as $keykecamatan) {
                    $result = $this->MsLaporan->dataNullByKecamatan($dateStart, $dateEnd, $kategori, $keykecamatan['IDKecamatan']);
                    if ($result == NULL) {
                        $row = array(
                            "NamaKecamatan" => $keykecamatan['NamaKecamatan'], 
                            "total" => 0, 
                            "laki" => 0, 
                            "cewe" => 0, 
                        );
                    }else{
                        $row = $result[0];
                    }
                    
                    $data['data'][] = $row;    
                }
                echo json_encode($data);
            }else{
                $data = array(
                    "data" => $this->MsLaporan->dataByKecamatan($dateStart, $dateEnd, $kategori),
                );
                echo json_encode($data);
            }
        }else{
            echo json_encode('error');
        }
    }

    public function ajaxUmur()
    {
        $iduser = $this->session->userdata('iduser');
        if ($iduser != NULL){
            $this->load->model("MsLaporan");
            $newDate = $this->input->post("date_from");  
            $dateStart = date("Y-m-d", strtotime($newDate));    
            $endDate = $this->input->post("date_to");      
            $dateEnd = date("Y-m-d", strtotime($endDate));    
            $kategori = $this->input->post("kategori");

            if ($kategori == '1') {
                $data = array(
                    "data" => $this->MsLaporan->dataNullByUmur($dateStart, $dateEnd, $kategori),
                );
                echo json_encode($data);
            }else{
                $data = array(
                    "data" => $this->MsLaporan->dataByUmur($dateStart, $dateEnd, $kategori),
                );
                echo json_encode($data);
            }
        // echo "<pre>";
        //     var_dump($data);
        // echo "</pre>";
        }else{
            echo json_encode('error');
        }
    }

    public function ajaxPendidikan()
    {
        $iduser = $this->session->userdata('iduser');
        if ($iduser != NULL){
            $this->load->model("MsLaporan");
            $newDate = $this->input->post("date_from");  
            $dateStart = date("Y-m-d", strtotime($newDate));    
            $endDate = $this->input->post("date_to");      
            $dateEnd = date("Y-m-d", strtotime($endDate));    
            $kategori = $this->input->post("kategori");

            if ($kategori == '1') {
                $pendidikan = $this->db->query("SELECT IDStatusPendidikan, NamaStatusPendidikan FROM msstatuspendidikan ORDER BY NamaStatusPendidikan ASC")->result_array();
                foreach ($pendidikan as $keypendidikan) {
                    $result = $this->MsLaporan->dataNullByPendidikan($dateStart, $dateEnd, $kategori, $keypendidikan['IDStatusPendidikan']);
                    if ($result == NULL) {
                        $row = array(
                            "NamaStatusPendidikan" => $keypendidikan['NamaStatusPendidikan'], 
                            "total" => 0, 
                            "laki" => 0, 
                            "cewe" => 0, 
                        );
                    }else{
                        $row = $result[0];
                    }
                    
                    $data['data'][] = $row;    
                }
                echo json_encode($data);
            }else{
                $data = array(
                    "data" => $this->MsLaporan->dataByPendidikan($dateStart, $dateEnd, $kategori),
                );
                echo json_encode($data);
            }
        }else{
            echo json_encode('error');
        }
    }

    public function ajaxPosisiJabatan()
    {
        $iduser = $this->session->userdata('iduser');
        if ($iduser != NULL){
            $this->load->model("MsLaporan");
            $newDate = $this->input->post("date_from");  
            $dateStart = date("Y-m-d", strtotime($newDate));    
            $endDate = $this->input->post("date_to");      
            $dateEnd = date("Y-m-d", strtotime($endDate));    
            $kategori = $this->input->post("kategori");

            if ($kategori == '1') {
                $jabatan = $this->db->query("SELECT IDPosisiJabatan, NamaPosisiJabatan FROM msposisijabatan ORDER BY NamaPosisiJabatan ASC")->result_array();
                foreach ($jabatan as $keyjabatan) {
                    $result = $this->MsLaporan->dataNullByPosisiJabatan($dateStart, $dateEnd, $kategori, $keyjabatan['IDPosisiJabatan']);
                    if ($result == NULL) {
                        $row = array(
                            "NamaPosisiJabatan" => $keyjabatan['NamaPosisiJabatan'], 
                            "total" => 0, 
                            "laki" => 0, 
                            "cewe" => 0, 
                        );
                    }else{
                        $row = $result[0];
                    }
                    
                    $data['data'][] = $row;    
                }
                echo json_encode($data);
            }else{
                $data = array(
                    "data" => $this->MsLaporan->dataByPosisiJabatan($dateStart, $dateEnd, $kategori),
                );
                echo json_encode($data);
            }
        }else{
            echo json_encode('error');
        }
    }

    public function ajaxLamaran()
    {
        $iduser = $this->session->userdata('iduser');
        if ($iduser != NULL){
            $this->load->model("MsLaporan");
            $newDate = $this->input->post("date_from");  
            $dateStart = date("Y-m-d", strtotime($newDate));    
            $endDate = $this->input->post("date_to");      
            $dateEnd = date("Y-m-d", strtotime($endDate));    

        // $dateStart = "2019-01-01";      
        // $dateEnd = "2019-07-01";  
            $data = array(
                "data" => $this->MsLaporan->dataByLamaran($dateStart, $dateEnd),
            );
        // echo "<pre>";
        //     var_dump($data);
        // echo "</pre>";
            echo json_encode($data);
        }else{
            echo json_encode('error');
        }
    }

    public function ajaxPenempatan()
    {
        $iduser = $this->session->userdata('iduser');
        if ($iduser != NULL){
            $this->load->model("MsLaporan");
            $newDate = $this->input->post("date_from");  
            $dateStart = date("Y-m-d", strtotime($newDate));    
            $endDate = $this->input->post("date_to");      
            $dateEnd = date("Y-m-d", strtotime($endDate));    

        // $dateStart = "2019-01-01";      
        // $dateEnd = "2019-07-01";  
            $data = array(
                "data" => $this->MsLaporan->dataByPenempatan($dateStart, $dateEnd),
            );
        // echo "<pre>";
        //     var_dump($data);
        // echo "</pre>";
            echo json_encode($data);
        }else{
            echo json_encode('error');
        }
    }

    public function ajaxTerdaftar()
    {
        $iduser = $this->session->userdata('iduser');
        if ($iduser != NULL){
            $this->load->model("MsLaporan");
            $newDate = $this->input->post("date_from");  
            $dateStart = date("Y-m-d", strtotime($newDate));    
            $endDate = $this->input->post("date_to");      
            $dateEnd = date("Y-m-d", strtotime($endDate));    

        // $dateStart = "2019-01-01";      
        // $dateEnd = "2019-07-01";  
            $data = array(
                "data" => $this->MsLaporan->dataByTerdaftar($dateStart, $dateEnd),
            );
        // echo "<pre>";
        //     var_dump($data);
        // echo "</pre>";
            echo json_encode($data);
        }else{
            echo json_encode('error');
        }
    }
}
?>