<?php
function cmb_dinamis($name,$table,$field,$pk,$selected,$placeholder = '-Pilihan-') {
    $ci = get_instance();
    $cmb = "<select class='form-control' size='1' name='$name' id='$name'>";
    $data = $ci->db->get($table)->result();
    $cmb .= "<option value=''>".$placeholder."</option>";
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  ucwords($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}

function combo_bidang($selected = 0, $disabled = '') {
    $ci = get_instance();
    $cmb = "<select class='form-control input-sm' size='1' name='idbidangperusahaan' id='idbidangperusahaan' ".$disabled.">";
    $cmb .= "<option value=''>- Pilih Bidang Perusahaan -</option>";
    $data = $ci->db->query("SELECT * FROM msbidangperusahaan ORDER BY NamaBidangPerusahaan ASC")->result();
    foreach ($data as $d) {
        $cmb .="<option value='".$d->IDBidangPerusahaan."'";
        $cmb .= $selected==$d->IDBidangPerusahaan?" selected='selected'":'';
        $cmb .=">". $d->NamaBidangPerusahaan."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

function combo_pendidikan($selected = 0, $placeholder = 'Pilih', $where = '') {
    $ci = get_instance();
    $cmb = "<select class='form-control' size='1' name='idstatuspendidikan' id='idstatuspendidikan'>";
    $cmb .= "<option value=''>- ".$placeholder." -</option>";

    if ($where == '') {
        $sql = "SELECT * FROM msstatuspendidikan ORDER BY IDStatusPendidikan ASC";
    } else {
        $sql = "SELECT * FROM msstatuspendidikan WHERE ".$where." ORDER BY IDStatusPendidikan ASC";
    }

    $data = $ci->db->query($sql)->result();
    if (!empty($data)) {
        foreach ($data as $d) {
            $cmb .="<option value='".$d->IDStatusPendidikan."'";
            $cmb .= $selected==$d->IDStatusPendidikan?" selected='selected'":'';
            $cmb .=">".  $d->NamaStatusPendidikan . "</option>";
        }
    } 
    $cmb .="</select>";
    return $cmb;
}

function combo_kecamatan($selected = 0, $disabled = '', $size = 'input-sm') {
    $ci = get_instance();
    $cmb = "<select class='form-control ".$size."' size='1' name='idkecamatan' id='idkecamatan' ".$disabled.">";
    $cmb .= "<option value=''>- Pilih Kecamatan -</option>";
    $data = $ci->db->query("SELECT * FROM mskecamatan ORDER BY NamaKecamatan ASC")->result();
    foreach ($data as $d) {
        $namakecamatan = $d->NamaKecamatan;
        $cmb .="<option value='".$d->IDKecamatan."'";
        $cmb .= $selected==$d->IDKecamatan?" selected='selected'":'';
        $cmb .=">". $namakecamatan."</option>";
    }
    $cmb .="</select>";
    return $cmb;
}

