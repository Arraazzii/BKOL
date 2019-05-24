<?php if (empty($this->session->userdata('iduser'))) {?>

<?php $this->load->view('inc/header');
$input = $this->session->flashdata('input');
?>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>BKOL</b>Depok 
            <p>Admin Login</p>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">

            <?php if ($this->session->flashdata('error') != null): ?>
                <?php echo '<p class="login-box-msg">'.$this->session->flashdata('error').'</p>'; ?>
            <?php endif ?>
            <form action="<?= site_url('admin/dologin') ?>" method="post">
                <div class="form-group has-feedback">
                    <input id="username" name="username" placeholder="Nama Admin" required class="form-control" type="text" value="<?= $input != null ? $input['username'] : '' ?>" size="20" autofocus>
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input id="password" name="password" placeholder="Kata sandi" class="form-control" required type="password" value="" size="20">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span> 
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                        <button type="button" onclick="window.location.href='<?php echo site_url() ?>'" class="btn btn-danger btn-block btn-flat">Batal</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
    <?php $this->load->view('inc/footer') ?>

    <?php }else{
        redirect('admin/newpencaker', 'refresh');
    } ?>

    <script type="text/javascript">
        window.addEventListener( "pageshow", function ( event ) {
          var historyTraversal = event.persisted || 
          ( typeof window.performance != "undefined" && 
              window.performance.navigation.type === 2 );
          if ( historyTraversal ) {
            window.location.reload();
        }
    });
</script>