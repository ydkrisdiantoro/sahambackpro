<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.5
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/admin/'); ?>plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?= base_url('assets/admin/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/sparklines/sparkline.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>dist/js/adminlte.js"></script>
<script src="<?= base_url('assets/admin/'); ?>dist/js/pages/dashboard.js"></script>
<script src="<?= base_url('assets/admin/'); ?>dist/js/demo.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/chart.js/Chart.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>dist/js/demo.js"></script>
<script src="<?= base_url('assets/admin/'); ?>dist/js/pages/dashboard3.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('assets/admin/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<script>
  $(function() {
    $("table.display").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
  });
</script>
</body>

</html>