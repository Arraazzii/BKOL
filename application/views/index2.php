
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta property="og:site_name" content="BKOL DEPOK">
  <meta property="og:title" content="Bursa Lowongan Kerja Online KOTA DEPOK" />
  <meta property="og:description" content="Lowongan Dan Data Pekerjaan Kota Depok" />
  <meta property="og:image" itemprop="image" content="<?php echo site_url();?>assets/depok.png">
  <meta property="og:type" content="website" />
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/depok.png" type="image/x-icon">
  <title>BKOL Kota Depok</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/Ionicons/css/ionicons.min.css">
  <!-- Datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
   folder instead of downloading all of them to reduce the load. -->
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/footer.css">
   <!-- jQuery 3 -->
   <script src="<?php echo base_url(); ?>assets/plugins/jquery/dist/jquery.min.js"></script>

   <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
   <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Google Font -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
  <div class="wrapper">

    <header class="main-header">
      <nav class="navbar navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            <a href="<?php echo base_url(); ?>" class="navbar-brand"><b>BKOL</b>Depok</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              <?php $this->load->view('sub/navbar'); ?>
            </ul>
          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <?php $iduser = $this->session->userdata('iduser'); 
              if ($iduser == "") : 
                ?>
                <li><a href="<?= site_url('login'); ?>">Login</a></li>
                <!-- User Account Menu -->
              <?php else : ?>
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- The user image in the navbar-->
                    <img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="user-image" alt="User Image">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><?php echo $this->session->userdata('username') ?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <img src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle" alt="User Image">

                      <p>
                        <?php echo $this->session->userdata('username') ?>
                      </p>
                    </li>
                    <!-- Menu Body -->
                    <li class="user-body">
                      <!-- /.row -->
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="<?php echo site_url('ubahsandi') ?>" class="btn btn-default btn-flat">Ubah Sandi</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?php echo site_url('logout') ?>" class="btn btn-default btn-flat">Logout</a>
                      </div>
                    </li>
                  </ul>
                </li>
              <?php endif; ?>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
      <div class="container">
        <?php $this->load->view('sub/cgenerator2'); ?>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="footer-distributed">

      <div class="footer-left">

        <h3>BKOL<span>Depok</span></h3>

        <p class="footer-company-name">Dinas Tenaga Kerja Kota Depok &copy; 2018</p>
      </div>

      <div class="footer-center">

        <div>
          <i class="fa fa-map-marker"></i>
          <p><span>Jalan Margonda Raya No.54</span> Depok, Pancoran MAS</p>
        </div>

        <div>
          <i class="fa fa-whatsapp"></i>
          <p>(+62) 897 8186 588</p>
        </div>

        <div>
          <i class="fa fa-envelope"></i>
          <p><a href="mailto:admin@bkol.depok.go.id">admin@bkol.depok.go.id</a></p>
        </div>

      </div>

      <div class="footer-right">

        <div class="footer-icons">

          <a href="#"><i class="fa fa-facebook"></i></a>
          <a href="#"><i class="fa fa-instagram"></i></a>
          <a href="#"><i class="fa fa-twitter"></i></a>

        </div>

      </div>

    </footer>
  </div>
  <!-- ./wrapper -->


  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url(); ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url(); ?>assets/plugins/fastclick/lib/fastclick.js"></script>
  <!-- bootstrap datepicker -->
  <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
</body>
</html>
