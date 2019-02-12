<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<table width="100%">
        <tr>
                <td align="center" colspan="2">
                <?php
                        $this->load->view('master/galery');
                ?>
                </td>
        </tr>
        <tr>
                <td align="center" colspan="2">
                <?php
                        $this->load->view('master/info');
                ?>
                </td>
        </tr>
        <tr>
                <td align="center" valign="top" width="50%">
                <?php
                        $this->load->view('master/news');
                ?>
                </td>
                <td align="center" valign="top" width="50%">
                <?php
                        $this->load->view('master/event');
                ?>
                </td>
        </tr>
</table>