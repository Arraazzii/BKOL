<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta property="og:site_name" content="BKOL DEPOK">
<meta property="og:title" content="Bursa Lowongan Kerja Online KOTA DEPOK" />
<meta property="og:description" content="Lowongan Dan Data Pekerjaan Kota Depok" />
<meta property="og:image" itemprop="image" content="<?php echo site_url();?>assets/depok.png">
<meta property="og:type" content="website" />
<link rel="shortcut icon" href="<?php echo base_url();?>assets/depok.png" type="image/x-icon">
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