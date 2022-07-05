<!-- jQuery 3 -->
<script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/webgis-pariwisata/admin/assets/templates/AdminLTE-2.4.17/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/webgis-pariwisata/admin/assets/templates/AdminLTE-2.4.17/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/webgis-pariwisata/admin/assets/templates/AdminLTE-2.4.17/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/webgis-pariwisata/admin/assets/templates/AdminLTE-2.4.17/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/webgis-pariwisata/admin/assets/templates/AdminLTE-2.4.17/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/webgis-pariwisata/admin/assets/templates/AdminLTE-2.4.17/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/webgis-pariwisata/admin/assets/templates/AdminLTE-2.4.17/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="http://<?php echo $_SERVER['HTTP_HOST'];?>/webgis-pariwisata/admin/assets/templates/AdminLTE-2.4.17/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('#datatables').DataTable();
  });
</script>
<script>
  $(document).ready(function(){
    $('input[type="file"]').change(function(e){
        var fileName = e.target.files[0].name;
        alert('File anda "' + fileName +  '" berhasil di unggah.');
        });
    });
  </script>