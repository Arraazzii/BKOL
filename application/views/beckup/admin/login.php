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
                                                                LOGIN ADMIN
                                                        </div>
                                                </th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td align="center">
                                                        <form method="post" action="<?= site_url('admin/dologin') ?>">
                                                                <table width="500px">
                                                                        <tbody>
                                                                                <tr>
                                                                                        <td align="left" width="120px">
                                                                                                Nama Admin
                                                                                        </td>
                                                                                        <td align="left">
                                                                                                <input id="username" name="username" type="text" value="<?= $input != null ? $input['username'] : '' ?>" size="20">
                                                                                        </td>
                                                                                </tr>
                                                                                <tr>
                                                                                        <td align="left">
                                                                                                Kata Sandi
                                                                                        </td>
                                                                                        <td align="left">
                                                                                                <input id="password" name="password" type="password" value="" size="20">
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
                                                                                                <input name="submit" type="hidden" value="submit">
                                                                                                <input id="login" name="login" type="submit" value="Login">
                                                                                                <a href="<?= site_url() ?>" class="button">Batal</a>
                                                                                        </td>
                                                                                </tr>
                                                                        <tbody>
                                                                </table>
                                                        </form>
                                                </td>
                                        </tr>
                                </tbody>
                        </table>
                </td>
        </tr>
</table>
<script>	
//$(document).ready(function(){
//        $( "input:button" ).click(function() { alert($(this).attr('id')); });
//});
</script>
