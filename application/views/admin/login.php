<?php if ($this->session->userdata('iduser') == NULL) {?>

<?php $this->load->view('inc/header');
$input = $this->session->flashdata('input');
?>
<style type="text/css">
    .login-box-body{
        border-radius: 3px;
        box-shadow: 0 2px 6px #3c8dbc50;
    }
</style>
<body class="hold-transition login-page">
    <div class="login-box">

        <!-- /.login-logo -->
        <div class="login-box-body">
            <div class="login-logo">
                <b>BKOL</b> Depok 
                <p>Admin Login</p>
            </div>
            <?php if ($this->session->flashdata('error') != null): ?>
                <?php echo '<p class="login-box-msg" style="color:red;">'.$this->session->flashdata('error').'</p>'; ?>
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
                <!-- /.col -->
                <br>
                <div class="row">
                    <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                     <button type="button" onclick="window.location.href='<?php echo site_url() ?>'" class="btn btn-danger col-sm-12 col-xs-12">Batal</button>
                 </div>
                 <div class=" col-lg-6 col-md-6 col-sm-6 col-xs-6">
                    <button type="submit" class="btn btn-primary col-sm-12 col-xs-12">Sign In</button>
                </div>
            </div>
            <br>
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