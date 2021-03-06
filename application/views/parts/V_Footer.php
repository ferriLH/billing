
  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
	  <div class="pull-right hidden-xs">
		  Billing RBT
	  </div>
    <!-- Default to the left -->
	  <strong>Copyright &copy; 2019 <a target="_blank" href="http://www.alpha-omega.co.id">AlphaOmega</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url()?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url()?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/dist/js/adminlte.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url()?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url()?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<!--<script src="--><?php //echo base_url()?><!--assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>-->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<!-- date-range-picker -->
<!--<script src="--><?php //echo base_url()?><!--assets/bower_components/moment/min/moment.min.js"></script>-->
<!--<script src="--><?php //echo base_url()?><!--assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>-->
<!-- bootstrap datepicker -->
<!--<script src="--><?php //echo base_url()?><!--assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>-->

<script>
  $(function () {
      $('#tabel_pencipta').DataTable({
		  'paging'      : true,
		  'lengthChange': true,
		  'searching'   : true,
		  'ordering'    : true,
		  'info'        : true,
		  'autoWidth'   : true,
          'responsive'	: true,
		  'order'		: [[0,'desc']],
          'dom'			: 'Bfrtip',
          'buttons'		: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
          //'scrollX'     : true

      });
      $('#rbt').DataTable({
		  'paging'      : true,
		  'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true,
          //'order'		: [[0,'desc']],
          'order'		: [],
          'scrollX'     : true,
          'deferRender'	: true,
          'scrollCollapse' : true,
          'scroller'	: true,
          'dom'			: 'Bfrtip',
          'buttons'		: [
              'copy', 'csv', 'excel', 'print'
          ]


      });
      $('#rbtsubmit').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true,
          // 'scrollX'     : true,
          'order'		: [],
          'deferRender'	: true,
          // 'scrollCollapse' : true,
          // 'scroller'	: true,
          'dom'			: 'Bfrtip',
          'buttons'		: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]

      });
      // $('#ttraffic').DataTable({
      //     'paging'      : true,
      //     'lengthChange': true,
      //     'searching'   : true,
      //     'ordering'    : true,
      //     'info'        : true,
      //     'autoWidth'   : true,
      //     'order'		: [],
      //     'deferRender'	: true,
      //     'scrollCollapse' : true,
      //     'scroller'	: true,
      //     'dom'			: 'Bfrtip',
      //     'buttons'		: [
      //         'copy', 'csv', 'excel', 'pdf', 'print'
      //     ]
      //     //'scrollX'     : true
	  //
      // });
      $('#tsel').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true,
          'scrollX'     : true,
          'dom'			: 'Bfrtip',
          'buttons'		: [
              'copy', 'csv', 'excel', 'print'
          ]
      });
      $('#revpart').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true,
          // 'scrollX'     : true,
          'dom'			: 'Bfrtip',
          'buttons'		: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      });
      $('#revpen').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true,
          'dom'			: 'Bfrtip',
          'buttons'		: [
              'copy', 'csv', 'excel', 'pdf', 'print'
          ]
      });
      $('#revenue').DataTable();
      $('#tblpencipta').DataTable();
      $('#tblpartner').DataTable({
          'paging'      : true,
          'lengthChange': true,
          'searching'   : true,
          'ordering'    : true,
          'info'        : true,
          'autoWidth'   : true,
          'dom'			: 'Bfrtip',
          'buttons'		: [
              'copy', 'csv', 'excel', 'print'
          ]
      });
  });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
