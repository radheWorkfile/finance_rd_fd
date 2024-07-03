<div class="card-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="row bg-white">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sl.No.</th>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <!-- <th><?//php echo ($vw_rdpay[0]['plan_type'] == 1) ?  "Contribution" : "Interest Amount"?></th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vw_rdpay as $ve => $vwrdp) { ?>
                                <?php $lst_id = $this->Admin_Rd_model->get_last_id($vwrdp['rd_id']); ?>
                                <tr>
                                    <td>
                                        <?php echo $ve + 1 ?>
                                    </td>
                                    <td>
                                        <?php echo $vwrdp['payment_date'] ?>
                                    </td>
                                 
                                    <td>
                                        <?php echo $vwrdp['amount'] ?>
                                    </td>
                                  
                                    <td>
                                        <?php if ($vwrdp['status'] == 1) { ?>
                                            <?php if ($lst_id['id'] != $vwrdp['id']) { ?>
                                                <b class="text-danger">
                                                    Un-Paid
                                                </b>
                                            <?php } else { ?>
                                                <a href="javascript:void(0);" style="width:30px;" class="btn-sm btn-primary"
                                                    data-toggle="modal" data-target="#pay_emi_modal"
                                                    onclick="pay_rd_view(<?php echo $vwrdp['id'] ?>)" title='Click to Pay EMI'>
                                                    Pay Now
                                                </a>
                                            <?php } ?>
                                        <?php } else if ($vwrdp['status'] == 2) { ?>
                                                <b class="text-success">
                                                    Paid <i class="fa fa-check"></i>
                                                </b>&emsp;
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_paid_emi_modal"
                                                    onclick="view_paid_rd_payment(<?php echo $vwrdp['id'] ?>)"
                                                    title='Click to View Paid EMI Data Details'><i
                                                        class="fas fa-eye text-success"></i></a>&nbsp;
                                                <a href="javascript:void(0);" data-toggle="modal" data-target="#print_bill"
                                                    onclick="print_bill(<?php echo $vwrdp['id'] ?>)" title='Click to Print Bill'><i
                                                        class="fas fa-print text-primary"></i></a>&nbsp;
                                            <?php if ($vwrdp['id'] == $vw_rdpay[0]['id']) { ?>
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#print_bill"
                                                        onclick="print_bound(<?php echo $vwrdp['id'] ?>, <?php echo $vwrdp['user_id'] ?>)"
                                                        title='Click to Print Bond'><i class="fas fa-print text-warning"></i></a>
                                            <?php } ?>
                                        <?php } else if ($vwrdp['status'] == 3) { ?>
                                                    <b class="text-danger">
                                                        Plan Closed <i class="fa fa-times"></i>
                                                    </b>&emsp;
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl.No.</th>
                                <th>Payment Date</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pay EMI Modal Start -->
<div class="modal fade" id="pay_emi_modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pay EMI</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="pay" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="rd_data"></div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" id="bill_data" class="btn btn-primary" name="submit" value="Pay">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- View Lead Modal Start -->
<div class="modal fade" id="view_paid_emi_modal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body  card-primary card-outline">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Paid EMI Data Details</h4>
                <div id="show_paid_rd_payment"></div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- View Lead Modal End-->

<script>

    function print_bill(id) {
        $.ajax({
            url: '<?= base_url() ?>' + 'admin/Rd/print_bill',
            type: "POST",
            data: {
                'id': id
            },
            success: function (data) {
                popup(data);
            },
        });
    }

    function print_bound(id, user_id) {
        $.ajax({
            url: '<?= base_url() ?>' + 'admin/Rd/print_bound',
            type: "POST",
            data: {
                'id': id,
                'user_id': user_id
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

    function view_paid_rd_payment(id) {
        $.ajax({
            url: '<?= base_url() ?>' + 'admin/Rd/paid_rd_payment_view',
            type: "POST",
            data: {
                'id': id
            },
            success: function (data) {
                $('#show_paid_rd_payment').html(data);
            },
        });
    }


    function pay_rd_view(id) {
        $.ajax({
            url: '<?= base_url() ?>' + 'admin/Rd/view_rd_payment_pay',
            type: "POST",
            data: {
                'id': id
            },
            success: function (data) {
                $('#rd_data').html(data);
            },
        });
    }

    $('#pay').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '<?= base_url() ?>admin/Rd/pay_rd_payment_data',
            type: "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            dataType: 'json',
            success: function (data) {
                if (data.icon == "error") {
                    var valid = '';
                    $.each(data.text, function (i, item) {
                        valid += item;
                    });
                    Toast.fire({
                        icon: data.icon,
                        html: valid,
                    })

                } else {
                    Toast.fire({
                        icon: data.icon,
                        text: data.text
                    })
                    window.location.reload(true);
                }
            }
        });
    });
</script>