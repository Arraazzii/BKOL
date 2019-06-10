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

        // $dateStart = "2019-01-01";      
        // $dateEnd = "2019-07-01";  
        // $kategori = "0";
            $data = array(
                "data" => $this->MsLaporan->dataByKecamatan($dateStart, $dateEnd, $kategori),
            );
        // echo "<pre>";
        //     var_dump($data);
        // echo "</pre>";
            echo json_encode($data);
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

        // $dateStart = "2019-01-01";      
        // $dateEnd = "2019-07-01";  
        // $kategori = "0";
            $data = array(
                "data" => $this->MsLaporan->dataByUmur($dateStart, $dateEnd, $kategori),
            );
        // echo "<pre>";
        //     var_dump($data);
        // echo "</pre>";
            echo json_encode($data);
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

        // $dateStart = "2019-01-01";      
        // $dateEnd = "2019-07-01";  
        // $kategori = "0";
            $data = array(
                "data" => $this->MsLaporan->dataByPendidikan($dateStart, $dateEnd, $kategori),
            );
        // echo "<pre>";
        //     var_dump($data);
        // echo "</pre>";
            echo json_encode($data);
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

        // $dateStart = "2019-01-01";      
        // $dateEnd = "2019-07-01";  
        // $kategori = "0";
            $data = array(
                "data" => $this->MsLaporan->dataByPosisiJabatan($dateStart, $dateEnd, $kategori),
            );
        // echo "<pre>";
        //     var_dump($data);
        // echo "</pre>";
            echo json_encode($data);
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