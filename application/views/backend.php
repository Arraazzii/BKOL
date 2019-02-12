<?php $this->load->view('inc/header.php') ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo base_url('') ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>BK</b>OL</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>BKOL</b>Depok</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account: style can be found in dropdown.less -->
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
                                    <a href="javascript:void(0);" id="gantipass" class="btn btn-default btn-flat">Ubah Sandi</a>
                                </div>
                                <div class="pull-right">
                                    <a href="javascript:void(0);" id="logout" class="btn btn-default btn-flat">Logout</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="modal fade" id="gantipassmodal" >
        <div class="modal-dialog" style="margin-top: 150px">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title text-center">Ubah Kata Sandi</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    <input type="password" name="sandilama" id="sandilama" class="form-control" value="" required="required" placeholder="Kata Sandi Lama">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <input type="password" name="sandibaru" id="sandibaru" class="form-control" value="" required="required" placeholder="Kata Sandi Baru">
                    <span class="help-block"></span>
                </div>
                <div class="form-group">
                    <input type="password" name="sandibaru_confirm" id="sandibaru_confirm" class="form-control" value="" required="required" placeholder="Konfirmasi Sandi Baru">
                    <span class="help-block"></span>
                </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="button" id="simpansandi" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $this->session->userdata('username') ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <?php
                $idjenisuser = $this->session->userdata('idjenisuser');

                if ($idjenisuser == '000000') 
                {
                    $url_updpass= site_url('admin/update_password');
                    $url_logout = site_url('admin/logout');
                    $this->load->view('inc/menuadmin');
                }
                if ($idjenisuser == '000001')
                {
                    $url_updpass= site_url('perusahaan/update_password');
                    $url_logout = site_url('logout');
                    $this->load->view('inc/menuperusahaan');
                }
            ?>
        </section>
        <!-- /.sidebar -->
    </aside>
    
    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <?php echo $contents ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2018 <a href="<?php echo base_url(); ?>">BKOL Kota Depok</a>.</strong> All rights
      reserved.
    </footer>
</div>

<script>
    $("#logout").click(function() {
        return swal({
            title: 'Logout ?',
            text: "Yakin akan logout?",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Logout!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.value) {
                window.location.href = '<?= $url_logout ?>/';
            }
        })
    });

    $("#gantipass").click(function() {
        clearmodalpass();
        var inst = $('#gantipassmodal');
        inst.modal('show');
    });

    $("#simpansandi").click(function() {
        clearmodalpass();
        $.ajax({
            url: '<?php echo $url_updpass ?>',
            type: 'POST',
            dataType: 'JSON',
            data: {
                sandilama: $("#sandilama").val(),
                sandibaru: $("#sandibaru").val(),
                sandibaru_confirm: $("#sandibaru_confirm").val(),
            },
            success: function(data) {
                if (data.ket == 1) {
                    $('#gantipassmodal').modal('hide');
                    swal({
                        title: "Success!",
                        text: "Sukses Mengubah Password, Silahkan Login Kembali !",
                        type: "success",
                        timer: 2000,
                        showConfirmButton: false
                    }).then(function (result) {
                        window.location.href="<?php echo $url_logout ?>";
                    });
                } else {
                    for (var i = 0; i < data.inputerror.length; i++) 
                    {
                        $('[name="'+data.inputerror[i]+'"]').parent().addClass('has-error');
                        $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]);
                    }
                }
            }
        });
        
    });

    function clearmodalpass() {
        $("#sandilama").parent().removeClass('has-error');
        $("#sandilama").next().text('');
        $("#sandibaru").parent().removeClass('has-error');
        $("#sandibaru").next().text('');
        $("#sandibaru_confirm").parent().removeClass('has-error');
        $("#sandibaru_confirm").next().text('');
    }

    
</script>
<?php $this->load->view('inc/footer.php') ?>

