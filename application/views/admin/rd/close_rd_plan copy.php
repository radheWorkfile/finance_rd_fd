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

        <div class="col-12 pre_maturity_sec" style="display:none;">
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

<!-- Profile Image -->
<div class="card-body box-profile">
    <div class="row" style="margin-top:-2.4rem;">
        <div class="col-6 maturitySec regularSec e_regularly ">
            <label>Member:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="member_name" id="member_name" value="<?php echo $close_rd['nm'] . "(" . $close_rd['u_id'] . ")" ?>" readonly>
                <input type="hidden" class="form-control" name="rd_id" id="rd_id" value="<?php echo $close_rd['id'] ?>">
                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $close_rd['user_id'] ?>">
            </div>
        </div>
        <div class="col-6 maturitySec regularSec e_regularly">
            <label>Rd Plan:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="rd_plan" id="rd_plan" value="<?php echo $close_rd['p_nm'] ?>" readonly>
            </div>
        </div>
        <div class="col-6 maturitySec regularSec e_regularly">
            <label>Total Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_amount" id="total_amount" value="<?php echo round((float)$total_amt) ?>" readonly>
            </div>
        </div>



        <div class="col-6 maturitySec regularSecHide">
            <label>Total Interest Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_interest_amount" id="total_interest_amount" value="<?php echo round((float)$interest_amt) ?>" readonly>
            </div>
        </div>
        <div class="col-6 maturitySec regularSecHide">
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
        <div class="col-6 maturitySec ">
            <label>Paid Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_paid_amount" id="total_paid_amount" placeholder="Enter Paid Amount" readonly>
            </div>
        </div>

        <div class="col-6 regularSec"style="display:none;">
            <label>Paid Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="total_paid_amount" id="total_paid_amount" placeholder="Enter Paid Amount">
            </div>
        </div>


        <!-- ------------------------------------------------   -->

        <div class="col-6 maturitySec regularSec e_regularly">
            <label>Paid date:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" name="e_reg_paid_date" id="e_reg_paid_date" value="<?php echo date('Y-m-d') ?>">
            </div>
        </div>

        <div class="col-6 e_regularly" style="display:none;">
            <label>Prematurity Interest(%)(*)<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="0 %" name="e_reg_preM_rate" id="e_reg_preM_rate" value="<?php echo $close_rd['interest_percent']?>">
                <!-- <input type="text" class="form-control" name="" id=""  readonly> -->
            </div>
        </div>


        <div class="col-6 e_regularly" style="display:none;">
            <label> Penalty Rate(%)(*)<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" placeholder="0 %" name="e_reg_pan_rate" id="e_reg_pan_rate">
            </div>
        </div>

        
       

       

        <div class="col-6 e_regularly" style="display:none;padding-left:2rem;">
            <input class="form-check-input" type="checkbox" id="check1" name="option1" value="something">
            &nbsp;&nbsp;<label>Wave of Prematurity Interest<span class="text-danger">*</span></label>
        </div>


        <div class="col-6 e_regularly" style="display:none;padding-left:2rem;">
            <input class="form-check-input" type="checkbox" id="check2" name="option2" value="something">
            &nbsp;&nbsp;<label>Wave off Prematurity Interest<span class="text-danger">*</span></label>
        </div>

        <div class="col-6 e_regularly " style="display:none;">
            <label>Paid Amount<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-rupee-sign"></i></span>
                </div>
                <input type="text" class="form-control" name="e_reg_total_Amo" id="e_reg_total_Amo">
                <!-- <input type="text" class="form-control" name="" id=""  readonly> -->
            </div>
        </div>

  

        <!-- ------------------------------------------------   -->



        <div class="col-6 maturitySec regularSec e_regularly">
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
        <div class="col-6 maturitySec">
            <label>Paid date:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="date" class="form-control" name="paid_date" id="paid_date" value="<?php echo date('Y-m-d') ?>">
            </div>
        </div>
        <div class="col-6 maturitySec">
            <label>Penalty Amount:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar-alt"></i></span>
                </div>
                <input type="text" class="form-control" name="penalty_amount" id="penalty_amount" placeholder="Enter Penalty Amount">
            </div>
        </div>
        <div class="col-6" style="display:none;">
            <label>Payment Remarks:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                </div>
                <textarea name="payment_remarks" id="payment_remarks" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-12 regularSec e_regularly maturitySec" style="display:none;">
            <label>Payment Remarks:<span class="text-danger">*</span></label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money-check-alt"></i></span>
                </div>
                <textarea name="payment_remarks" id="payment_remarks" class="form-control"></textarea>
            </div>
        </div>





    </div>
</div>

<script>
    $(document).ready(function() {
        $(".maturitySec").hide();
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
            if (actNbtnForPre == '1') {
                $(".regularSec").show();
                $(".regularSecHide").hide();
            } else if (actNbtnForPre == '2') {
                $(".e_regularly").show();
                $(".pre_maturity_sec").hide();
            }
        });
    });

    // total  




    function total_amt(value) {
        var amount = $('#total_amount').val();
        var interest_amt = $('#total_interest_amount').val();
        var total_amt = parseInt(amount) + parseInt(interest_amt);
        if (value == 1) {
            $('#total_paid_amount').val(total_amt);
        } else if (value == 2) {
            $('#total_paid_amount').val(amount);
        }
    }


    $(document).ready(function() {
        var total_amo_1 =  parseInt($("#total_amount").val());
        var penalty_rate_1 =  parseInt($("#e_reg_pan_rate").val());
        var prematurity_amo_1 =  parseInt($("#e_reg_preM_rate").val());
        var total_cal =total_amo_1+total_amo_1*prematurity_amo_1/100;
        var paid_amo_1 = $("#e_reg_total_Amo").val(total_cal);

    $("#e_reg_pan_rate,#e_reg_preM_rate").on("keyup", function()
     {
        var total_amo_2 =  parseInt($("#total_amount").val());
        let penalty_rate = parseInt($("#e_reg_pan_rate").val());
        let prematurity_amo = parseInt($("#e_reg_preM_rate").val());
        let preMan_w_pan =prematurity_amo-penalty_rate?prematurity_amo-penalty_rate:prematurity_amo_1;
        let prematurity_amo_2 = parseInt($("#e_reg_preM_rate").val(preMan_w_pan))?parseInt($("#e_reg_preM_rate").val(preMan_w_pan)):0;
        let fsfsf = total_amo_1+total_amo_1*preMan_w_pan/100?total_amo_1+total_amo_1*preMan_w_pan/100:total_cal;
        var paid_amo_fdfsdafd = parseInt($("#e_reg_total_Amo").val(fsfsf)?$("#e_reg_total_Amo").val(fsfsf):total_amo_2);
        alert(fsfsf);
        

       
        
       

        });


    });

   

    $("#check1").on("click", function(){
        let penalty_rate_old = parseInt($("#e_reg_pan_rate").val());
        $("#check1").prop("checked",true)
        {
            //let penalty_rate_sfsd = parseInt();
            let total_amo = parseInt($("#total_amount").val());
            let penalty_rate = parseInt($("#e_reg_pan_rate").val());
            let prematurity_amo = parseInt($("#e_reg_preM_rate").val());
            let penalty=penalty_rate?0:penalty_rate;
            let prmtyRate=prematurity_amo?prematurity_amo:0;
            let afterDedPenalty=total_amo-total_amo*penalty/100;
            let afterDedPremty=afterDedPenalty-afterDedPenalty*prmtyRate/100;
            $("#e_reg_total_Amo").val(afterDedPremty);$("#e_reg_pan_rate").val(0);
        }
    });

    $("#check2").on("click", function(){
        let penalty_rate_old = parseInt($("#e_reg_pan_rate").val());
        $("#check2").prop("checked",true)
        {
            //let penalty_rate_sfsd = parseInt();
            let total_amo = parseInt($("#total_amount").val());
            let penalty_rate = parseInt($("#e_reg_pan_rate").val());
            let prematurity_amo = parseInt($("#e_reg_preM_rate").val());
            let penalty=penalty_rate?0:penalty_rate;
            let prmtyRate=prematurity_amo?prematurity_amo:0;
            let afterDedPenalty=total_amo-total_amo*penalty/100;
            let afterDedPremty=afterDedPenalty-afterDedPenalty*prmtyRate/100;
            $("#e_reg_total_Amo").val(afterDedPremty);$("#e_reg_preM_rate").val(0);
        }
    });

   
       
       

   




</script>