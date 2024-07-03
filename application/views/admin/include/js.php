<script src="<?= base_url() ?>media/css/plugin/sweetalert/sweetalert2.min.js"></script>
<script src="<?= base_url() ?>media/js/jquery.min.js"></script>
<script src="<?= base_url() ?>media/js/jquery-ui.min.js"></script>
<script src="<?= base_url() ?>media/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url() ?>media/js/adminlte.js"></script>
<script src="<?= base_url() ?>media/js/common.js"></script>
<script src="<?= base_url() ?>media/js/js.js"></script>


<!-- Select2 -->
<script src="<?= base_url() ?>media/css/plugin/select2/select2.full.min.js"></script>

<!-- Summernote -->
<script src="<?= base_url() ?>media/css/plugin/summernote/summernote-bs4.min.js"></script>

<!-- DataTables  & Plugins -->

<script src="<?= base_url() ?>media/css/plugin/datatable/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/jszip.min.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/pdfmake.min.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/vfs_fonts.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/buttons.print.min.js"></script>
<script src="<?= base_url() ?>media/css/plugin/datatable/buttons.colVis.min.js"></script>

<script type="text/javascript">
    var Toast =
        Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 60000
        });
    /*  */
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.myselect').select2({
            theme: 'bootstrap4'
        })
    })

    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();

        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);

        //Check for PM and AM
        var day_or_night = (h > 11) ? "PM" : "AM";

        //Convert to 12 hours system
        if (h > 12)
            h -= 12;

        //Add time to the headline and update every 500 milliseconds
        $('#time').html(h + ":" + m + ":" + s + " " + day_or_night);
        setTimeout(function() {
            startTime()
        }, 500);
    }

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
</script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $("#example3").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
        $("#example4").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
        $("#example5").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example5_wrapper .col-md-6:eq(0)');
        $("#example6").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example6_wrapper .col-md-6:eq(0)');
        $("#example7").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example7_wrapper .col-md-6:eq(0)');
        $("#example8").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example8_wrapper .col-md-6:eq(0)');
        $("#example9").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example9_wrapper .col-md-6:eq(0)');
        $("#example10").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example10_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
  $(function () {
    // Summernote
    $('.summernote').summernote({
      height: 500,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: true
    })
    // CodeMirror
    CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
      mode: "htmlmixed",
      theme: "monokai"
    });
  })




</script>