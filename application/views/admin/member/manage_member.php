<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->session->userdata('company_name') ?> | Manage Member</title>
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
                            <h1 class="m-0"><?php echo $title; ?></h1>
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
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Mobile No.</th>
                                <th>Email</th>
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

        <!-- View Lead Modal Start -->
        <div class="modal fade" id="view_member_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body  card-primary card-outline">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">Member Data Details</h4>
                        <div id="show_member"></div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- View Lead Modal End-->

        <!-- Update Lead Modal Start -->
        <div class="modal fade" id="update_member_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Member Details</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="member_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="up_member"></div>
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

        <!-- Update Lead Modal Start -->
        <div class="modal fade" id="add_group_modal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Add Group</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="group_updata" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div id="add_group"></div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" name="submit" value="Add">
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <!-- Update lead Modal End-->

    <? $this->load->view('admin/include/footer') ?>
    </div>
    <!-- ./wrapper -->
    <? $this->load->view('admin/include/js') ?>
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

                            "url": base_url + 'admin/Member/all_member_data',
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

            $('#filter_register_date').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/register/register_search_data',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    $('#filter_data').html(data);
                    console.log(data);
                }
            });
        });

        function getIndustries(sector) {
            $.ajax({
                url: '<?= base_url() ?>admin/Register/get_industries',
                type: "POST",
                data: {
                    'sector': sector
                },
                dataType: 'json',
                success: function(data) {
                    $('#industries').empty();
                    $('#industries').append('<option value="">---- Select One ----</option> ');
                    $.each(data, function(i, item) {
                        $('#industries').append('<option value="' + item.id + '">' + item.industeries_name + '</option>')
                    });
                }
            });
        }


        function view_member(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/member/View_member',
                type: "POST",
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#show_member').html(data);
                },
            });
        }

        $('#filter_lead_date').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/lead/lead_date',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    $('#filter_date').html(data);
                    console.log(data);
                }
            });
        });

        function update_member(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/Member/update_member',
                type: "POST",
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#up_member').html(data);
                },
            });
        }

        $('#member_updata').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Member/update_member_data',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    //$('#empmsg').html(data);
                    //console.log(data);
                    var obj = JSON.parse(data);
                    //console.log(obj.icon);
                    //return false;
                    if (obj.icon == "error") {
                        var valid = '';
                        $.each(obj.text, function(i, item) {
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

        function Add_group(id) {
            $.ajax({
                url: '<?= base_url() ?>' + 'admin/Member/add_group',
                type: "POST",
                data: {
                    'id': id
                },
                success: function(data) {
                    $('#add_group').html(data);
                },
            });
        }

        $('#group_updata').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '<?= base_url() ?>admin/Member/update_group_data',
                type: "POST",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function(data) {
                    //$('#empmsg').html(data);
                    //console.log(data);
                    var obj = JSON.parse(data);
                    //console.log(obj.icon);
                    //return false;
                    if (obj.icon == "error") {
                        var valid = '';
                        $.each(obj.text, function(i, item) {
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