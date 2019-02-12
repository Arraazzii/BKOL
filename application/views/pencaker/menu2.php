<?php 
$this->_ci=&get_instance();     
$this->_ci->load->model('MsChat');
$jum_chat=$this->_ci->MsChat->GetJumChat($this->session->userdata('iduser'));
?>
<li>
  <a href="<?= site_url() ?>">Profil</a>
</li>
<li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Daftar <span class="caret"></span></a>
  <ul class="dropdown-menu" role="menu">
    <li>
      <a href="<?= site_url('pencaker/lowongan') ?>">Lowongan Kerja</a>
    </li>
    <li>
      <a href="<?= site_url('pencaker/riwayatlamaran') ?>">Riwayat Lamaran</a>
    </li>
  </ul>
</li>