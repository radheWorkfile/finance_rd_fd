<div class="row">
    <div class="col-12">
        <label>Category Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="text" name="cat_name" id="cat_name" class="form-control" placeholder="Enter Category Name" value="<?php echo $cat['name']?>">
            <input type="hidden" name="id" id="id" class="form-control"  value="<?php echo $cat['id']?>">
        </div>
    </div>
    <div class="col-12">
        <label>Commission:<span class="text-danger">*</span><span class="text-sm">(In Percentage %)</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><b>%</b></span>
            </div>
            <input type="text" name="percentage" id="percentage" class="form-control" placeholder="Enter Commission" value="<?php echo $cat['commission']?>">
        </div>
    </div>
    <div class="col-12">
        <label>Description:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-keyboard"></i></span>
            </div>
            <textarea name="description" id="description" placeholder="Enter Description" class="form-control"><?php echo $cat['description']?></textarea>
        </div>
    </div>
</div>