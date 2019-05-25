<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<table width="100%">
    <tr>
        <td align="center">
            <table width="100%" class="table-form">
                <tbody>
                    <tr>
                        <th align="center">
                            <div align="center">
                                AKTIVASI PENGGUNA
                            </div>
                        </th>
                    </tr>
                    <tr>
                        <td align="left" valign="top">
                            Untuk dapat menggunakan layanan pencari kerja, silahkan mengaktifkan akun anda dengan menekan tombol aktivasi.
                        </td>
                    </tr>
                    <tr>
                        <td align="left" valign="top">
                            <div align="center">
                                <a class="button" href="<?= site_url('pencaker/aktivasi') ?>">Aktivasi</a>
                                <br />
                                <?php
                                if ($this->session->flashdata('error') != null){
                                    echo $this->session->flashdata('error');
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
</table>

<script>
    $.get('<?= site_url('pencaker/getdata') ?>/'+IDPencaker,
        function(getdata)
        {
            if (getdata.exists)
            {
                var bulan = new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                var tgllahir = getdata.TglLahir.split("-");
                $('#nomorindukpencaker').html(getdata.NomorIndukPencaker);
                $('#namapencaker').html(getdata.NamaPencaker);
                $('#tempattgllahir').html(getdata.TempatLahir+', '+tgllahir[2]+' '+bulan[parseInt(tgllahir[1])-1]+' '+tgllahir[0]);
                $('#jeniskelamin').html(getdata.JenisKelamin);
                $('#email').html(getdata.Email);
                $('#telepon').html(getdata.Telepon);
                $('#alamat').html(getdata.Alamat);
                $('#namakecamatan').html(getdata.NamaKecamatan);
                $('#namakelurahan').html(getdata.NamaKelurahan);
                $('#kodepos').html(getdata.KodePos);
                $('#kewarganegaraan').html(getdata.Kewarganegaraan == 0 ? 'WNI' : 'WNA');
                $('#namaagama').html(getdata.NamaAgama);
                $('#namastatuspernikahan').html(getdata.NamaStatusPernikahan);
                $('#namastatuspendidikan').html(getdata.NamaStatusPendidikan);
                $('#jurusan').html(getdata.Jurusan);
                $('#keterampilan').html(getdata.Keterampilan);
                $('#nemipk').html(getdata.NEMIPK);
                $('#nilai').html(getdata.Nilai);
                $('#tahunlulus').html(getdata.TahunLulus);
                $('#tinggibadan').html(getdata.TinggiBadan+' cm');
                $('#beratbadan').html(getdata.BeratBadan+' kg');
                $('#keterangan').html(getdata.Keterangan);
                $('#idposisijabatan').html(getdata.IDPosisiJabatan);
                $('#lokasi').html(getdata.Lokasi == 0 ? 'Dalam Negeri' : 'Luar Negeri');
                $('#upahyangdicari').html(getdata.UpahYangDicari);
                $('#dialog-edit').dialog('option', 'title', 'Data Pencaker');
                $("#dialog-edit").dialog("open");
            }
            else
            {
                alert('Pencaker tidak ditemukan');
            }
        },'json')
    </script>
