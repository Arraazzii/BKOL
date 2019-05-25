<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<?php
$input = $this->session->flashdata('input');
?>
<table width="100%">
    <tr>
        <td align="center">
            <table width="100%" class="table-form">
                <thead>
                    <tr>
                        <th align="center">
                            <div align="center">
                                UBAH KATA SANDI
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">
                            <div align="center">
                                <form method="post" action="<?= site_url('perusahaan/doupdatepassword') ?>">
                                    <table width="100%">
                                        <tbody>
                                            <tr>
                                                <td align="left" width="130px">
                                                    Kata Sandi Lama
                                                </td>
                                                <td align="left">
                                                    <input id="oldpassword" name="oldpassword" type="password" value="<?= $input != null ? $input['oldpassword'] : '' ?>" size="20">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left">
                                                    Kata Sandi Baru
                                                </td>
                                                <td align="left">
                                                    <input id="password" name="password" type="password" value="<?= $input != null ? $input['password'] : '' ?>" size="20">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left">
                                                    Konfirmasi Kata Sandi Baru
                                                </td>
                                                <td align="left">
                                                    <input id="password2" name="password2" type="password" value="<?= $input != null ? $input['password2'] : '' ?>" size="20">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left">
                                                </td>
                                                <td align="left">
                                                    <div align="left">
                                                        <?php
                                                        if ($this->session->flashdata('error') != null){
                                                            echo $this->session->flashdata('error');
                                                        }
                                                        ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="left">
                                                </td>
                                                <td align="left">
                                                    <input type="hidden" value="submit" name="submit">
                                                    <input id="button" type="submit" value="Ubah Sandi" name="submit">
                                                </td>
                                            </tr>
                                            <tbody>
                                            </table>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
