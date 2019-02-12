<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>BURSA KERJA ONLINE KOTA DEPOK</title>

        <link rel="shortcut icon" href="<?php echo site_url('assets/css/images/favicon2.ico'); ?>">
        <link rel="apple-touch-icon" href="<?php echo site_url('assets/css/images/favicon2.ico'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/themes/base/jquery.ui.all.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/main.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/slides/galery.css'); ?>">
        <link rel="stylesheet" href="<?php echo site_url('assets/css/dcverticalmegamenu/dcverticalmegamenu.css'); ?>">
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery-1.7.2.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/ui/jquery.ui.core.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/ui/jquery.ui.widget.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/ui/jquery.ui.button.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/ui/jquery.ui.dialog.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/ui/jquery.ui.datepicker.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/ui/jquery.ui.position.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/ui/jquery.ui.mouse.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/ui/jquery.ui.draggable.js'); ?>"></script>
        <script type='text/javascript' src="<?php echo site_url('assets/js/jquery.hoverIntent.minified.js'); ?>"></script>
        <script type='text/javascript' src="<?php echo site_url('assets/js/jquery.dcverticalmegamenu.1.3.js'); ?>"></script>
        
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
<?php
//        echo '1 = '.$_SERVER['REQUEST_URI']."<br />";
//        echo '2 = '.$_SERVER['SCRIPT_NAME']."<br />";
//        $site = str_replace($_SERVER['REQUEST_URI'], '', $_SERVER['SCRIPT_NAME']);
//        echo "a = ".$site."<br />";
//        $var = explode('/',$_SERVER['REQUEST_URI']);
//        echo '2 = '.$var[2]."<br />";
//        echo '2 = '.base_url()."<br />";
//        echo str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
?>
</html>
