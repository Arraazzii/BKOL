<?php
$iduser = $this->session->userdata('iduser');
if ($iduser == "") : ?>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Data <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
      <li>
        <a href="<?= site_url('dataperusahaan') ?>">Perusahaan</a>
      </li>
      <li>
        <a href="<?= site_url('datapencaker') ?>">Pencaker</a>
      </li>
      <li>
        <a href="<?= site_url('datalowongan') ?>">Lowongan Kerja</a>
      </li>
    </ul>
  </li>
  <li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Pendaftaran <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
      <li>
        <a href="<?= site_url('register/2') ?>">Pencaker</a>
      </li>
      <li>
        <a href="<?= site_url('register/1') ?>">Perusahaan</a>
      </li>
    </ul>
  </li>
<?php endif; ?>
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Persyaratan <span class="caret"></span></a>
    <ul class="dropdown-menu" role="menu">
      <li>
        <a href="<?= site_url('persyaratan/1') ?>">Pendaftaran BKOL</a>
      </li>
      <li>
        <a href="<?= site_url('persyaratan/2') ?>">Cetak Kartu AK-I</a>
      </li>
    </ul>
</li>
<!-- <li>
  <a href="<?= site_url('statistik') ?>">Statistik</a>
</li> -->