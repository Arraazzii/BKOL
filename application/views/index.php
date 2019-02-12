<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>BKOL PEMERINTAH KOTA DEPOK</title>

        <link rel="shortcut icon" href="<?php echo base_url();?>assets/css/images/favicon2.ico">
        <link rel="apple-touch-icon" href="<?php echo base_url();?>assets/css/images/favicon2.ico">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/themes/base/jquery.ui.all.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/main.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/demo-style.css">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/slides/galery.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/dcverticalmegamenu/dcverticalmegamenu.css">

        <script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-1.7.2.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/ui/jquery.ui.core.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/ui/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/ui/jquery.ui.button.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/ui/jquery.ui.dialog.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/ui/jquery.ui.datepicker.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/ui/jquery.ui.position.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/ui/jquery.ui.mouse.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>assets/js/ui/jquery.ui.draggable.js"></script>
        <script type='text/javascript' src="<?php echo base_url();?>assets/js/jquery.hoverIntent.minified.js"></script>
        <script type='text/javascript' src="<?php echo base_url();?>assets/js/jquery.dcverticalmegamenu.1.3.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.js"></script>
        <script src="<?php echo base_url();?>assets/js/zebra_datepicker.js"></script>
        <script src="<?php echo base_url();?>assets/js/printThis.js"></script>
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/css/default.css" />
        <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
</head>
<body>

        <div align="center">
                <table width="1024px" style="background-color: #FFFFFF;">
                        <tr>
                                <td colspan="2">
                                        <div id="container">
                                        <?php
                                                $this->load->view('sub/header');
                                        ?>
                                        </div>
                                </td>
                        </tr>
                        <tr>
                                <td valign="top" width="300px">
                                        <div id="container">
                                        <?php
                                                $this->load->view('sub/left');
                                        ?>
                                        </div>
                                </td>
                                <td valign="top">
                                        <div id="container">
                                        <?php
                                                $this->load->view('sub/cgenerator');
                                        ?>
                                        </div>
                                </td>
                        </tr>
                        <tr>
                                <td colspan="2">
                                        <div id="container">
                                        <?php
                                                $this->load->view('sub/footer');
                                        ?>
                                        </div>
                                </td>
                        </tr>
                </table>
        </div>
</body>
<script>
$(document).ready(function(){
        $( "input:submit, input:button, button, .button" ).button();
        $('.showhidebtn').click(function(){
                $(this).parent().next().slideToggle();
        });
});

</script>
</html>
