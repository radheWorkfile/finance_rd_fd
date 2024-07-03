<div class="card-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 order-1 order-md-2">
            <div class="col-12 col-md-12 col-lg-12">
                <a href="javascript:void(0);" data-toggle="modal" data-target="#print_bill"  title='Click to Print Bill' class="btn btn-primary float-right"><i class="fas fa-print"></i> <b>Print</b></a><br><br>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>SN.No</th>
                            <th>DATE</th>
                            <th>RECEIPT NUMBER</th>
                            <th>PARTICULARS</th>
                            <th>DEBIT</th>
                            <th>CREDIT</th>
                            <th>BALANCE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $balance = 0; foreach($passbook as $pa => $pass) { ?>
                            <?php 
                                $lst_id = $this->Admin_Rd_model->get_last_id($pass['user_id']); 
                                $balance += (int)$pass['paid_amount']; 
                            ?>
                            <tr>
                                <td><?php echo $pa +1; ?></td>
                                <td><?php echo date('d-M-Y',strtotime($pass['pay_date'])); ?></td>
                                <td><?php echo $pass['receipt_no'] ?></td>
                                <td>Renewal Paid For RD</td>
                                <td>₹ 0.00/-</td>
                                <td><?php echo '₹ '.number_format((int)$pass['paid_amount'],2).'/-' ?></td>
                                <td><?php echo '₹ '. number_format($balance,2).'/-'  ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>SN.No</th>
                            <th>DATE</th>
                            <th>RECEIPT NUMBER</th>
                            <th>PARTICULARS</th>
                            <th>DEBIT</th>
                            <th>CREDIT</th>
                            <th>BALANCE</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- View Lead Modal End-->

<!-- print Modal Start -->
<div class="modal fade" id="print_bill">
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="margin-top: 150px;">
            <div class="modal-header">
                <h4 class="modal-title">Print Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="pay" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                <div class="modal-body">
                    <div id="rd_data">
                        <div class="row">
                            <div class="col-12">
                                <label>Enter From Serial No.<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                    </div>
                                    <input type="text" name="from_serial_no" id="from_serial_no" class="form-control" placeholder="Enter From Serial No." required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')"> &nbsp;
                                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $pass['user_id'] ?>"> &nbsp;
                                </div>
                            </div>
                            <div class="col-12">
                                <label>Enter To Serial No.<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                    </div>
                                    <input type="text" name="to_serial_no" id="to_serial_no" class="form-control" placeholder="Enter To Serial No." required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')">
                                </div>
                            </div>
                            <div class="col-12">
                                <label>Enter Line No.<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                    </div>
                                    <input type="text" name="line_no" id="line_no" class="form-control" placeholder="Enter Line No." required oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\  *?)\  */g, '$1')"> &nbsp;
                                </div>
                            </div>
                            <div class="col-12">
                                <label>Select Page<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
                                    </div>
                                    <select class="form-control" name="page" required>
                                        <option value="1">Left</option>
                                        <option value="2">Right</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <input type="submit" id="bill_data" class="btn btn-primary" name="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#pay').submit(function(e) {
    e.preventDefault();
        $.ajax({
            url : '<?= base_url() ?>' + 'admin/rd/print_passbook',
            type : "POST",
            data: new FormData(this),
            processData: false,
            contentType: false,
            cache: false,
            async: false,
            success: function(data) {
                // var dt = $('table td:last').text();
                $('#print_bill').modal('toggle');
                // $('#print_bill').modal('hide');
                $('#from_serial_no').val('');
                $('#to_serial_no').val('');
                $('#line_no').val('');
                popup(data);
            }
        });
    });    
</script>
