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
                                LOGIN PENGGUNA
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td align="center">
                            <form method="post" action="<?= site_url('login/dologin') ?>">
                                <table width="500px">
                                    <tbody>
                                        <tr>
                                            <td align="left" width="120px">
                                                Jenis Pengguna
                                            </td>
                                            <td align="left">
                                                <select id="idjenisuser" name="idjenisuser">
                                                    <?php
                                                    foreach ($MsJenisUserData->result() as $getcmb)
                                                    {
                                                        if ($input['idjenisuser'] == $getcmb->IDJenisUser)
                                                        {
                                                            echo "<option value='".$getcmb->IDJenisUser."' selected=\"selected\">".$getcmb->NamaJenisUser ."</option>";
                                                        }
                                                        else
                                                        {
                                                            echo "<option value='".$getcmb->IDJenisUser."'>".$getcmb->NamaJenisUser ."</option>";
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                Nama Pengguna
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
                                                <a href="<?= site_url('lupasandi') ?>" class="button">Lupa Kata Sandi</a>
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
