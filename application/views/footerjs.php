<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!-- jQuery -->
<script src="<?=base_url('assets/vendors/jquery/dist/jquery.min.js');?>"></script>
<script src="<?=base_url('assets/vendors/jquery/dist/jquery-ui-1.12.1.min.js');?>"></script>
<!-- Bootstrap -->
<script src="<?=base_url('assets/vendors/bootstrap/dist/js/bootstrap.min.js');?>"></script>
<script src="<?=base_url('assets/vendors/moment/min/moment.js');?>"></script>
<script src="<?=base_url('assets/vendors/daterangepicker/daterangepicker.js');?>"></script>
<!-- Datatables -->
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/jszip.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/pdfmake.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/vfs_fonts.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/jquery.dataTables.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/dataTables.bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/dataTables.buttons.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/buttons.bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/buttons.html5.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/buttons.print.min.js');?>"></script>
<script type="text/javascript" src="<?=base_url('assets/vendors/datatables/js/dataTables.rowGroup.min.js');?>"></script>

<!-- Custom Theme Scripts -->
<script src="<?=base_url('assets/js/custom.min.js');?>"></script>
<script src="<?=base_url('assets/js/auto.js');?>"></script>
<script src="<?=base_url('assets/vendors/toastr/build/toastr.min.js');?>"></script>
<script src="<?=base_url('assets/vendors/select2/dist/js/select2.min.js');?>" type="text/javascript"></script>

<script>
    
$(document).ready(function() {

    //$(document).ready(function() {
     //   $('.input-daterange input').each(function() {
    //    $(this).datepicker('clearDates');
   // });
    //});
 
    $('input[id="rentang"]').daterangepicker(
    {
        locale: {
          format: 'YYYY/MM/DD'
        }
    }, 
    function(start, end, label) {
        
        $('#mulai').val(start.format('YYYY/MM/DD'));
        $('#selesai').val(end.format('YYYY/MM/DD'));
        //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD')+ ' '+$('#selesai').val());
    });
    
     $('input[id="rangefilter"]').daterangepicker(
    {
        locale: {
          format: 'YYYY/MM/DD'
        }
    }, 
    function(start, end, label) {
        
        $('input[name="filstart"]').val(start.format('YYYY/MM/DD'));
        $('input[name="filstop"]').val(end.format('YYYY/MM/DD'));
        //alert("A new date range was chosen: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD')+ ' '+$('#selesai').val());
    });

    
    $('#dtables').DataTable({
       "dom": 'lBfrtip',
		 "buttons": [
            {
                extend: 'collection',
                text: 'Export',
                className: 'btn btn-primary',
                buttons: [
                    'copy',
                    'excel',
                    'pdf',
                    'print'
                ]
            }
        ]
    });

    $(".js-select2").select2();
        
    <?php if($this->session->flashdata('success')){ ?>
        toastr.success("<?php echo $this->session->flashdata('success'); ?>");
    <?php }else if($this->session->flashdata('error')){  ?>
        toastr.error("<?php echo $this->session->flashdata('error'); ?>");
    <?php }else if($this->session->flashdata('warning')){  ?>
        toastr.warning("<?php echo $this->session->flashdata('warning'); ?>");
    <?php }else if($this->session->flashdata('info')){  ?>
        toastr.info("<?php echo $this->session->flashdata('info'); ?>");
<?php } ?>
});

function getmnbyunit() {
	var x = document.getElementById("myidunit").value;
    window.location = "aksesmn?idunit="+x;
}
</script>
