<div class="row">
    <div class="col-12">
        <label>Plan Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
            </div>
            <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $uprd['id'] ?>">
            <input type="text" name="plan_name" id="plan_name" class="form-control"
                value="<?php echo $uprd['plan_name'] ?>">
        </div>
    </div>
    <div class="col-12">
        <label>Plan Type:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-network-wired"></i></span>
            </div>
            <select name="plan_type" id="plan_type" class="form-control">
                <option value="">--- Select One ----</option>
                <option value="1" <?php echo ($uprd['plan_type'] == 1) ? "selected" : "" ?>>Fixed Amount</option>
                <option value="2" <?php echo ($uprd['plan_type'] == 2) ? "selected" : "" ?>>Percentage</option>
            </select>
        </div>
    </div>
    <div class="col-12">
        <label>Duration:<span class="text-danger">*</span></label> 
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-clock"></i></span>
            </div>
            <input type="text" name="duration" id="duration" class="form-control"
                value="<?php echo $uprd['duration'] ?>">
                <select class="form-control" name="interval" id="interval" readonly>
                <option value="1"<?php echo ($uprd['interval'] == 1) ? "selected" : "" ?>>Month</option>
                <option value="2"<?php echo ($uprd['interval'] == 2) ? "selected" : "" ?>>Years</option> 
            </select>
        </div>
    </div>
    <div class="col-12">
        <label>Amount:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
            </div>
            <input type="text" name="amount" id="amount" class="form-control" value="<?php echo $uprd['amount'] ?>">
        </div>
    </div>
    <div class="col-12">
        <label>
            <?php if ($uprd['plan_type'] == 1) { ?>
                Fixed Amount:<span class="text-danger">*</span>
            <?php } else { ?>
                Interest Percent:<span class="text-danger">*</span>
            <?php } ?>
        </label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-money-bill"></i></span>
            </div>
            <?php if ($uprd['plan_type'] == 1) { ?>
                <input type="text" name="fixed_amt" id="fixed_amt" class="form-control"
                    value="<?php echo $uprd['interest_percent'] ?>">
            <?php } else { ?>
                <input type="text" name="interest_percent" id="interest_percent" class="form-control"
                    value="<?php echo $uprd['interest_percent'] ?>">
            <?php } ?>
        </div>
    </div>
    <div class="col-12">
        <label>Remark:</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-check"></i></span>
            </div>
            <textarea type="text" name="remark" id="remark"
                class="form-control"><?php echo $uprd['remark'] ?></textarea>
        </div>
    </div>
</div>