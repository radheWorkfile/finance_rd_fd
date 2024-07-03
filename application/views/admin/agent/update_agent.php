<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label class="lab">Name <span class="text-danger">*</span></label>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $up_agent['id'] ?>">
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $up_agent['name'] ?>">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="lab">Date Of Birth <span class="text-danger">*</span></label>
            <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $up_agent['dob'] ?>">
        </div>
    </div>

    <div class="col-sm-6">
        <div class="form-group">
            <label class="lab">Mobile Number </label>
            <input type="number" class="form-control" name="mobile" id="mobile" value="<?php echo $up_agent['mobile'] ?>">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label class="lab">Email Id </label>
            <input type="email" class="form-control" name="mail" id="mail" value="<?php echo $up_agent['mail'] ?>">
        </div>
    </div>
    <div class="col-lg-6">
        <div class="Reveal-other-body">
            <div class="form-group">
                <label class="lab">Full Address</label>
                <textarea name="address" id="address" cols="30" rows="3" class="form-control"
                    placeholder="Enter Full Address"><?php echo $up_agent['address'] ?></textarea>
            </div>
        </div>
    </div>
</div>