<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview <?php
    $arrmenu = array('newpencaker', 'newperusahaan');
    if(in_array($this->uri->segment(2), $arrmenu) || $this->uri->segment(3) == 'cekaktivasi')
        echo 'active';
    ?>">
    <a href="#">
        <i class="fa fa-user"></i> <span>MENU ADMIN</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php echo $this->uri->segment(2) == 'newpencaker' ? 'active' : '' ?>">
            <a href="<?php echo base_url('admin/newpencaker') ?>">
                <i class="fa fa-circle-o"></i> Cek Pencaker Baru
            </a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'newperusahaan' ? 'active' : '' ?>">
            <a href="<?php echo base_url('admin/newperusahaan') ?>">
                <i class="fa fa-circle-o"></i> Cek Perusahaan Baru
            </a>
        </li>
            <!-- <li class="<?php echo $this->uri->segment(3) == 'cekaktivasi' ? 'active' : '' ?>">
                <a href="<?php echo base_url('admin/pencaker/cekaktivasi') ?>">
                    <i class="fa fa-circle-o"></i> Cek Aktivasi Pencaker
                </a>
            </li> -->
        </ul>
    </li>
    <li class="treeview <?php 
    $arrmaster2 = array('lowonganBaru','lowongan', 'berita', 'beritaBaru');

    if(in_array($this->uri->segment(2), $arrmaster2))
    {
        if($this->uri->segment(3) != 'cekaktivasi')
        {
            echo 'active';
        }
    }
    ?>">
    <a href="#">
        <i class="fa fa-group"></i> <span>DATA LOWONGAN</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <li class="<?php echo $this->uri->segment(2) == 'lowonganBaru' || $this->uri->segment(2) == 'lowongan' ? 'active' : '' ?>">
            <a href="<?php echo base_url('admin/lowonganBaru') ?>">
                <i class="fa fa-circle-o"></i> Data Lowongan
            </a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'beritaBaru' || $this->uri->segment(2) == 'berita' ? 'active' : '' ?>">
            <a href="<?php echo base_url('admin/beritaBaru') ?>">
                <i class="fa fa-circle-o"></i> Data Loker Luar Depok
            </a>
        </li>
    </ul>
</li>
<li class="<?php echo $this->uri->segment(2) == 'dbtools' ? 'active' : '' ?>">
    <a href="<?php echo site_url('admin/dbtools') ?>"><i class="fa fa-database"></i> <span>Backup Database</span></a>
</li>
<li class="treeview <?php 
$arrmaster = array('pencaker', 'perusahaan', 'jenislowongan', 'keahlian', 'kabupaten', 'kecamatan', 'kelurahan', 'posisijabatan', 'jurusan', 'event');

if(in_array($this->uri->segment(2), $arrmaster))
{
    if($this->uri->segment(3) != 'cekaktivasi')
    {
        echo 'active';
    }
}
?>">
<a href="#">
    <i class="fa fa-database"></i> <span>DATA MASTER</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
</a>
<ul class="treeview-menu">
    <li class="<?php 
    if($this->uri->segment(2) == 'pencaker')
    {
        if($this->uri->segment(3) != 'cekaktivasi')
        {
            echo 'active';
        }
    }
    ?>">
    <a href="<?php echo base_url('admin/pencaker') ?>">
        <i class="fa fa-circle-o"></i> Data Pencaker
    </a>
</li>
<li class="<?php echo $this->uri->segment(2) == 'perusahaan' ? 'active' : '' ?>">
    <a href="<?php echo base_url('admin/perusahaan') ?>"> 
        <i class="fa fa-circle-o"></i> Data Perusahaan
    </a>
</li>
   <!--  <li class="<?php //echo $this->uri->segment(2) == 'lowongan' ? 'active' : '' ?>">
        <a href="<?php //echo base_url('admin/lowongan') ?>">
            <i class="fa fa-circle-o"></i> Data Lowongan
        </a>
    </li> -->
    <li class="<?php echo in_array($this->uri->segment(2), array('jenislowongan', 'keahlian')) ? 'active' : '' ?>">
        <a href="<?php echo base_url('admin/jenislowongan') ?>">
            <i class="fa fa-circle-o"></i> Data Jenis Lowongan
        </a>
    </li>
    <li class="<?php echo $this->uri->segment(2) == 'posisijabatan' ? 'active' : '' ?>">
        <a href="<?php echo base_url('admin/posisijabatan') ?>"> 
            <i class="fa fa-circle-o"></i> Data Posisi Jabatan
        </a>
    </li>
    <li class="<?php echo $this->uri->segment(2) == 'jurusan' ? 'active' : '' ?>">
        <a href="<?php echo base_url('admin/jurusan') ?>">
            <i class="fa fa-circle-o"></i> Data Jurusan
        </a>
    </li>
   <!--  <li class="<?php //echo $this->uri->segment(2) == 'berita' ? 'active' : '' ?>">
        <a href="<?php //echo base_url('admin/berita') ?>">
            <i class="fa fa-circle-o"></i> Data Loker Luar Depok
        </a>
    </li> -->
    <li class="<?php echo $this->uri->segment(2) == 'event' ? 'active' : '' ?>">
        <a href="<?php echo base_url('admin/event') ?>"> 
            <i class="fa fa-circle-o"></i> Data Kegiatan
        </a>
    </li>
</ul>
</li>
<li class="treeview <?php 
if ($this->uri->segment(2) == 'report' || $this->uri->segment(2) == 'report_lama') {
    echo "active";
}
?>">
<a href="#">
    <i class="fa fa-file-text-o"></i> <span>LAPORAN</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
</a>
<ul class="treeview-menu">
    <li class="<?php 
    if($this->uri->segment(2) == 'report')
    {
        echo "active";
    }
    ?>">
    <a href="<?php echo base_url('admin/report/lap_rekap_pencaker') ?>">
        <i class="fa fa-circle-o"></i> Rekap Pencaker
    </a>
</li>
<li class="<?php 
if($this->uri->segment(2) == 'report_lama')
{
    echo "active";
}
?>">
<a href="<?php echo base_url('admin/report_lama/lap_rekap_pencaker') ?>">
    <i class="fa fa-circle-o"></i> Rekap Pencaker Lama
</a>
</li>
</ul>
</li>
</ul>