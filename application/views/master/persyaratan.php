<!-- /.content -->
<!-- Content Header (Page header) -->
<!-- <section class="content-header">
    <h1>
        Persyaratan 
        <small>Pencari Kerja</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#">Home</a></li>
        <li class="active"><a href="#">Persyaratan</a></li>
    </ol>
</section> -->

<!-- Main content -->
<section class="content container">
    <div class="box box-primary box-solid">
        <div class="box-header">
            <h3 class="box-title" style="color:#fff;">Persyaratan</h3>
        </div>
        <div class="box-body">
            <table width="100%" class="table-form">
                <tbody>
                    <tr>
                        <?php if ($this->uri->segment(2) == 1): ?>
                            <td align="left">
                                Persyaratan Pendaftaran Pencari Kerja Online :
                                <ul style="list-style: decimal;">
                                    <li>
                                        KTP Kota Depok
                                    </li>
                                    <li>
                                        Ijazah SD, SMP, SLTA Sampai Terakhir/ Asli/ Fotocopy Yang dilegalisir
                                    </li>
                                    <li>
                                        Pas Foto 3 x 4 Sebanyak 2 (dua) Lembar
                                    </li>
                                    <li>
                                        Kartu AK-I yang masih berlaku
                                    </li>
                                </ul>
                            </td>
                        <?php elseif($this->uri->segment(2) == 2): ?>
                            <td align="left">
                                Persyaratan cetak kartu AK-I atau Kartu Kuning :
                                <ul style="list-style: decimal;">
                                    <li>
                                        KTP Kota Depok
                                    </li>
                                    <li>
                                        Ijazah terakhir di legalisir
                                    </li>
                                    <li>
                                        Pas Foto 3 x 4 Sebanyak 2 (dua) Lembar
                                    </li>
                                </ul>
                            </td>
                        <?php endif ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
<!-- /.content -->