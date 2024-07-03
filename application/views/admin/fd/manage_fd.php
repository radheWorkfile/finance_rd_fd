<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php echo $this->session->userdata('company_name') ?> | Manage RD
    </title>
    <? $this->load->view('admin/include/css') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed ">
    <div class="wrapper">
        <!-- Navbar -->
        <? $this->load->view('admin/include/header') ?>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <? $this->load->view('admin/include/left') ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">
                                <?php echo $title; ?>
                            </h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?php echo $breadcrumb; ?></li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <table id="leadtable" class="table table-bordered dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Member Name</th>
                                <th>RD Plan</th>
                                <th>Amount</th>
                                <th>RD Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- View RD Data Modal Start -->
        <div class="modal fade" id="view_fd_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body  card-primary card-outline">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">FD Data Details</h4>
                        <div id="show_fd"></div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- View RD Data Modal End-->

        <!-- View RD Payment Data Modal Start -->
        <div class="modal fade" id="view_fd_payment_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body card-primary card-outline">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">FD Payment Data Details</h4>
                        <div id="show_fd_payment"></div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- View RD Payment Data Modal End-->

        <!-- Update Lead Modal Start -->
        <div class="modal fade" id="update_fd_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update FD Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="Fd_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="up_fd"></div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="submit" value="update">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->

        <!-- Pay EMI Modal Start -->
        <div class="modal fade" id="pay_emi_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Close FD Plan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="close_fd_plan_data" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="show_close_fd"></div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" id="bill_data" class="btn btn-primary" name="submit"  value="Pay">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->
    <!-- Update lead Modal End-->

    <?php $this->load->view('admin/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <?php $this->load->view('admin/include/js') ?>
    <script>

        $(document).ready(function() {
            let searchObj = {};

            let reportTable = {

                printTable: function(search_data) {

                    $("#leadtable").DataTable({

                        "responsive": true,
                        "processing": true,
                        "serverSide": true,
                        "order": [],
                        'columnDefs': [{
                            'targets': [1, 2, 3, 4, 5, ],
                            'orderable': true
                        }],

                        "ajax": {

                            "url": base_url + 'admin/Fd/fd_data',
                            "type": "POST",
                            "dataSrc": "data",
                            "data": search_data

                        },

                        dom: "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        "lengthMenu": [
                            [10, 25, 50, 100, -1],
                            [10, 25, 50, 100, "All"]
                        ],

                        "buttons": ["excel", "pdf", "print"]

                    });

                }

            }

            reportTable.printTable(searchObj);
        });

    function print_member_details(id, user_id) {
        $.ajax({
            url: '<?= base_url() ?>' + 'admin/Fd/print_member_details',
            type: "POST",
            data: {
                'id': id,
                'user_id': user_id,
            },
            success: function (data) {
                popup(data);
            },
        });
    }

    function popup(data) {
        var base_url = '<?php echo base_url() ?>';
        var frame1 = $('<iframe />');
        frame1[0].name = "frame1";
        frame1.css({
            "position": "absolute",
            "top": "-1000000px"
        });
        $("body").append(frame1);
        var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
        frameDoc.document.open();
        //Create a new HTML document.
        frameDoc.document.write('<html>');
        frameDoc.document.write('<head>');
        frameDoc.document.write('<title></title>');
        frameDoc.document.write('</head>');
        frameDoc.document.write('<body>');
        frameDoc.document.write(data);
        frameDoc.document.write('</body>');
        frameDoc.document.write('</html>');
        frameDoc.document.close();
        setTimeout(function () {
            window.frames["frame1"].focus();
            window.frames["frame1"].print();
            frame1.remove();
        }, 500);
        return true;
    }

    function view_fd(id) {
        $.ajax({
            url: '<?= base_url() ?>' + 'admin/Fd/view_fd',
            type: "POST",
            data: {
                'id': id
            },
            success: function (data) {
                $('#show_fd').html(data);
            },
        });
    }

    function view_fd_payment_details(id) {
        $.ajax({
            url: '<?= base_url() ?>' + 'admin/Fd/fd_payment_details',
            type: "POST",
            data: {
                'id': id
            },
            success: function (data) {
                $('#show_fd_payment').html(data);
            },
        });
    }

    function update_fd(id) {
        $.ajax({
            url: '<?= base_url() ?>' + 'admin/Fd/update_fd',
            type: "POST",
            data: {
                'id': id
            },
            success: function (data) {
                $('#up_fd').html(data);
            },
        });
    }

        $('#Fd_updata').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Fd/update_fd_data',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    //$('#empmsg').html(data);
                    //console.log(data);
                    var obj = JSON.parse(data);
                    //console.log(obj.icon);
                    //return false;
                    if (obj.icon == "error") {
                        var valid = '';
                        $.each(obj.text, function (i, item) {
                            valid += item;
                        });
                        Toast.fire({
                            icon: obj.icon,
                            html: valid,
                        })

                    } else {
                        Toast.fire({
                            icon: obj.icon,
                            text: obj.text
                        })
                        //setTimeout(location.reload.bind(location), 3000);
                        window.location.reload(true);
                    }
                }
            });
        });

        function close_fd_plan(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/Fd/closr_fd_plan',
                type: "POST",
                data: {
                    'id': id
                },
                success: function (data) {
                    $('#show_close_fd').html(data);
                },
            });
        }

        $('#close_fd_plan_data').submit(function(e) {
        e.preventDefault();
        $.ajax({
            url : '<?= base_url() ?>admin/Fd/add_close_fd_plan_data',
            type : "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            dataType: 'json',
            success: function(data) {
                if (data.icon == "error") {
                    var valid = '';
                    $.each(data.text, function(i, item){
                        valid += item;
                    });
                    Toast.fire({
                        icon: data.icon,
                        html: valid,
                    });
                } else{
                    Toast.fire({
                        icon: data.icon,
                        text: data.text
                    });
                    window.location.reload(true);
                }
            }
        });
        });

        $('#Rd_updata').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Rd/update_rd_data',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    //$('#empmsg').html(data);
                    //console.log(data);
                    var obj = JSON.parse(data);
                    //console.log(obj.icon);
                    //return false;
                    if (obj.icon == "error") {
                        var valid = '';
                        $.each(obj.text, function (i, item) {
                            valid += item;
                        });
                        Toast.fire({
                            icon: obj.icon,
                            html: valid,
                        })

                    } else {
                        Toast.fire({
                            icon: obj.icon,
                            text: obj.text
                        })
                        //setTimeout(location.reload.bind(location), 3000);
                        window.location.reload(true);
                    }
                }
            });
        });
        
    </script>
</body>

</html>