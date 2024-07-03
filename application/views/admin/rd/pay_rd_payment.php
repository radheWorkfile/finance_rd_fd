<!-- Profile Image -->
<div class="card-body box-profile">
    <div class="row">
        <div class="col-6">
            <label>Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="amount" id="amount" value="<?php echo $vw_pay['amount'] ?>" readonly>
                <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $vw_pay['id'] ?>">
                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $vw_pay['user_id'] ?>">
            </div>
        </div>
    
        <div class="col-6">
            <label>RD Payment Date:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" name="payment_date" id="payment_date" value="<?php echo $vw_pay['payment_date'] ?>" readonly>
            </div>
        </div>
        <div class="col-6">
            <label>Paid Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="paid_amount" id="paid_amount" placeholder="Enter Paid Amount" >
            </div>
        </div>
        <div class="col-6">
            <label>Mode Of Payment:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                </div>
                <select name="mop" id="mop" class="form-control">
                    <option value="">----Select One----</option>
                    <option value="1">Online</option>
                    <option value="2">Cheque</option>
                    <option value="3">Cash</option>
                </select>
            </div>
        </div>
        <div class="col-6">
            <label>Pay date:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" name="pay_date" id="pay_date" value="<?php echo date('Y-m-d') ?>">
            </div>
        </div>
        <div class="col-6">
            <label>Penalty Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control" name="penalty_amount" id="penalty_amount" placeholder="Enter Penalty Amount">
            </div>
        </div>
        <div class="col-6">
            <label>Payment Remarks:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                </div>
                <textarea name="payment_remarks" id="payment_remarks" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-6">
            <label>Upload Recipet:</label>
            <div class="input-group mb-3">
                <input type="file" name="recipet" id="recipet" class="form-contol">
            </div>
        </div>
    </div>
</div>