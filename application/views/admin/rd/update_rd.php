<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="lab">Member Name <span class="text-danger">*</span></label>
            <input type="hidden" name="id" id="id" value="<?php echo $up_rd['id'] ?>">
            <select name="member_name" id="member_name" class="form-control">
                <option value="">--- Select One ---</option>
                <?php foreach ($memb as $mbr) { ?>
                    <option value="<?php echo $mbr['id'] ?>" <?php echo ($mbr['id'] == $up_rd['member_name']) ? "selected" : "" ?>><?php echo $mbr['name'] . "(" . $mbr['user_id'] . ")" ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="form-group">
                <label class="lab">Rd Plan <span class="text-danger">*</span></label>
                <select name="rd_plan" id="rd_plan" class="form-control" onchange="return rd_data(this.value)">
                    <option value="">--- Select One ---</option>
                    <?php foreach ($rd_pln as $rd) { ?>
                        <option value="<?php echo $rd['id'] ?>" <?php echo ($rd['id'] == $up_rd['rd_plan']) ? "selected" : "" ?>><?php echo $rd['plan_name'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="lab">Rd Date <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="rd_date" id="rd_date" value="<?php echo $up_rd['rd_date'] ?>">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="form-group">
                <label class="lab">Duration <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="duration" id="duration" value="<?php echo $up_rd['duration'] ?>" readonly>
                <input type="text" class="form-control" name="interval" id="interval" value="<?php if($up_rd['interval'] == 1) {
                    echo "Months";
                } elseif($up_rd['interval'] == 2) {
                    echo "Years";
                }
                ?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="form-group">
                <label class="lab">Amount <span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="amount" id="amount" value="<?php echo $up_rd['amount'] ?>" readonly>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="form-group">
                <label class="lab">Interest Percent<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="interest_percent" id="interest_percent" value="<?php echo $up_rd['interest_percent'] ?>" readonly>
            </div>
        </div>
    </div>
</div>

<script>
    function rd_data(id) {
        $.ajax({
            url: '<?= base_url() ?>' + 'admin/Rd/get_rd_plan_data',
            type: "POST",
            data: {
                'id': id
            },
            dataType:'json',
            success: function(data) {
                $('#duration').val(data.duration);
                $('#amount').val(data.amount);
                $('#interest_amount').val(data.interest_amount);
            },
        });
    }
</script>