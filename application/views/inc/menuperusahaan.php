<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU PENGGUNA</li>
    <li class="<?php echo $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'editprofil' ? 'active' : '' ?>">
        <a href="<?php echo site_url() ?>"><i class="fa fa-building-o"></i> <span>Profil Perusahaan</span></a>
    </li>
    <li class="<?php echo $this->uri->segment(2) == 'pemberikerja' ? 'active' : '' ?>">
        <a href="<?php echo site_url('perusahaan/pemberikerja') ?>"><i class="fa fa-user-plus"></i> <span>Profil Pemberi Kerja</span></a>
    </li>
    <li class="<?php echo $this->uri->segment(2) == 'lowongan' || $this->uri->segment(2) == 'carilowongan' ? 'active' : '' ?>">
        <a href="<?php echo site_url('perusahaan/lowongan') ?>"><i class="fa fa-list-alt"></i> <span>Daftar Lowongan Kerja</span></a>
    </li>
     <li class="<?php echo $this->uri->segment(2) == 'tambahdatalowongan' ? 'active' : '' ?>">
        <a href="<?php echo site_url('perusahaan/tambahdatalowongan') ?>"><i class="fa fa-plus"></i> <span>Tambah Lowongan Kerja</span></a>
    </li>
    <li class="<?php echo $this->uri->segment(2) == 'statuslowongan' || $this->uri->segment(2) == 'caristatuslowongan' ? 'active' : '' ?>">
        <a href="<?php echo site_url('perusahaan/statuslowongan') ?>"><i class="fa fa-slack"></i> <span>Daftar Status Lowongan Kerja</span></a>
    </li>
</ul>