<!-- Profile Image -->


<div class="card-body box-profile">
    <div class="row">


        <div class="col-12">
            <label>Seclect Maturity / Pre Maturity Plan<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                </div>
                <select name="maturity_sec" id="maturity_sec" class="form-control">
                    <option value="">----Select One----</option>
                    <option value="1">Maturity</option>
                    <option value="2">Pre Maturity</option>
                </select>
            </div>
        </div>

        <div class="col-12 pre_maturity_sec"style="display:none;">
            <label>Seclect Regularity / E - Regularity Plan<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                </div>
                <select name="preMaturity" id="preMaturity" class="form-control">
                    <option value="">----Select One----</option>
                    <option value="1">Regularity</option>
                    <option value="2">E-Regularity</option>
                </select>
            </div>
        </div>


    </div>
</div>




<div class="card-body box-profile"style="margin-top:-2.5rem;">
    <div class="row">
        <div class="col-6 maturitySec regularSec e_regularly"style="display:none;">
            <label>Member:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="member_name" id="member_name" value="<?php echo $close_fd['nm']. "(" . $close_fd['u_id'] . ")"?>" readonly>
                <input type="hidden" class="form-control" name="fd_id" id="fd_id" value="<?php echo $close_fd['id'] ?>">
                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $close_fd['user_id'] ?>">
            </div>
        </div>
        <div class="col-6 maturitySec regularSec e_regularly"style="display:none;">
            <label>Rd Plan:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="fd_plan" id="fd_plan" value="<?php echo $close_fd['p_nm'] ?>" readonly>
            </div>
        </div>

        <div class="col-6 maturitySec regularSec e_regularly"style="display:none;">
            <label>Primum Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_amo" id="total_amo" value="<?php echo round((float) $close_fd['amount'])." ".'Month' ?>" readonly>
            </div>
        </div>


       

        <div class="col-6  regularSec e_regularly"style="display:none;">
            <label>Duration<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="year" id="year" value="<?php echo  $close_fd['duration'] ?>" readonly>
            </div>
        </div>

        <div class="col-6 maturitySec regularSec e_regularly"style="display:none;">
            <label>Received Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_amount" id="total_amount" value="<?php echo round((float) $sum_of_amo['sum_of_amo']) ?>" readonly>
            </div>
        </div>   

        <div class="col-6 e_regularly"style="display:none;">
            <label>Duration<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="year" id="year" value="<?php echo  $sum_of_amo['tot_due'] ?>" readonly>
            </div>
        </div>


        <div class="col-6 maturitySec"style="display:none;">
            <label>Total Interest Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_interest_amount" id="total_interest_amount" value="<?php echo round((float)$interest_amt) ?>" readonly>
            </div>
        </div>
        <div class="col-6 maturitySec"style="display:none;">
            <label>Interest Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check"></i></span>
                </div>
                <select name="interest_amt_permission" id="interest_amt_permission" class="form-control" onchange="return total_amt(this.value)">
                    <option value="">----Select One----</option>
                    <option value="1">Yes</option>
                    <option value="2">No</option>
                </select>
            </div>
        </div>

       
       


        
      
   

        <div class="col-6 e_regularly" style="display:none;">
            <label>Total Interest(%)(*)<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="0 %" name="e_reg_preM_rate" id="e_reg_preM_rate" value="<?php echo $close_fd['interest_percent'];?>">
                <!-- <input type="text" class="form-control" name="" id=""  readonly> -->
            </div>
        </div>

        <div class="col-6 e_regularly"style="display:none;">
            <label>Penalty Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control" name="penalty_amount" id="penalty_amount" placeholder="Enter Penalty Amount">
            </div>
        </div>

       

        <div class="col-6   maturitySec regularSec"style="display:none;">
            <label>Paid Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_paid_amount" id="total_paid_amount" placeholder="Enter Paid Amount">
            </div>
        </div>

      

        <div class="col-6 e_regularly  "style="display:none;">
            <label>Paid Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_paid_amount_1" id="total_paid_amount_1" placeholder="Enter Paid Amount">
            </div>
        </div>

        <div class="col-6 e_regularly"style="display:none;">
            <label>Paid date:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" name="paid_date_er" id="paid_date_er" value="<?php echo date('Y-m-d') ?>">
            </div>
        </div>

        <div class="col-6 maturitySec regularSec"style="display:none;">
            <label>Paid date:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" name="paid_date" id="paid_date" value="<?php echo date('Y-m-d') ?>">
            </div>
        </div>
        <div class="col-6 maturitySec regularSec e_regularly "style="display:none;">
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

        <div class="col-6 e_regularly maturitySec"style="display:none;">
            <label>Payment Remarks:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                </div>
                <textarea name="payment_remarks" id="payment_remarks" class="form-control"></textarea>
            </div>
        </div>
        <div class="col-12  regularSec "style="display:none;">
            <label>Payment Remarks:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                </div>
                <textarea name="payment_remarks_r" id="payment_remarks_r" class="form-control"></textarea>
            </div>
        </div>
    </div>
</div>

<script>
    function total_amt(value) {
        var amount = $('#total_amount').val();
        var interest_amt = $('#total_interest_amount').val();
        var total_amt = parseInt(amount) + parseInt(interest_amt);
        if(value == 1) {
            $('#total_paid_amount').val(total_amt);
        } else if(value == 2) {
            $('#total_paid_amount').val(amount);
        }
    }

    $(document).ready(function() {
        // $(".maturitySec").hide();
        $("#maturity_sec").change(function() {
            var actNbtn = $('#maturity_sec').val();
            // let acctNbtn = $('select[name="maturity_sec"]').val();
            if (actNbtn == '1') {
                $(".maturitySec").show();
                $(".pre_maturity_sec").hide();
            } else if (actNbtn == '2') {
                $(".pre_maturity_sec").show();
                $(".maturitySec").hide();
            }
        });
    });

    $(document).ready(function() {
        $("#preMaturity").change(function() {
            var actNbtnForPre = $('#preMaturity').val();
            // alert(actNbtnForPre);
            if (actNbtnForPre == '1') {
                $(".regularSec").show();
                $(".regularSecHide").hide();
            } else if (actNbtnForPre == '2') {
                $(".e_regularly").show();
                $(".pre_maturity_sec").hide();
            }
        });
    });


    $(document).ready(function(){
     var total_interest =  parseInt($("#e_reg_preM_rate").val());
     var total_penalty = parseInt($("#penalty_amount").val());
     var total_amo =  parseInt($("#total_amount").val());
     var total_with_inter_amo =  parseInt(total_amo+total_amo*total_interest/100)? parseInt(total_amo+total_amo*total_interest/100):0;
     var total_paid_amount =  parseInt($("#total_paid_amount").val(total_amo));
     var total_amo_for_regular =  parseInt($("#total_paid_amount_1").val(total_with_inter_amo));  

    

     $("#penalty_amount").on("keyup", function()
     {
        var total_penalty_1 = parseInt($("#penalty_amount").val());
        var total_interest_1 =  parseInt($("#e_reg_preM_rate").val());
        var total_with_penalty = total_interest_1-total_penalty_1?total_interest_1-total_penalty_1:total_interest;
        var new_total_amo = parseInt($("#e_reg_preM_rate").val(total_with_penalty));
        var after_penalty_Int_amo = parseInt($("#e_reg_preM_rate").val());
        var fdsfd = total_with_inter_amo-total_amo*total_interest/100;
        var final_amo = parseInt(fdsfd+fdsfd*after_penalty_Int_amo/100?fdsfd+fdsfd*after_penalty_Int_amo/100:0);
        alert(final_amo);
        var total_paid_amount_last =  parseInt($("#total_paid_amount_1").val(final_amo));
    });
    });




</script>