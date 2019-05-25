<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.18/r-2.2.2/datatables.min.js"></script>
<!-- Sweetalert2 -->
<script src="<?php echo base_url() ?>assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/plugins/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- Bootstrap Notify -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<!-- Summernote JS -->
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<script>
  function notifikasi(pesan,tipe, ico = '') {
    $.notify({
    // options
    icon: ico,
    message: pesan,
  },{
    // settings
    type: tipe,
    z_index: 9999
  });
  }
</script>
<?php if ($this->session->flashdata('notifikasi')): ?>
  <?php echo $this->session->flashdata('notifikasi') ?>
<?php endif ?>
</body>
</html>
