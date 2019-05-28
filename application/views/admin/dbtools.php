<section class="content-header">
    <h1>
        Database
        <small>Tools</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('admin') ?>">Admin</a></li>
        <li class="active">DB Tools</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border text-center">
                    <h3 class="box-title">Backup Database</h3>
                </div>
                <br>
                <div class="text-center">Klik Backup Untuk mencadangkan file database</div>
                <br>
                <form action="<?php echo site_url('admin/dbtools/backup') ?>" method="POST" class="form-horizontal" role="form">
                  <div class="form-group">
                     <div class="text-center">
                        <input type="hidden" name="submit">
                        <button type="submit" class="btn btn-primary">Backup</button>
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
</div>
</section>
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