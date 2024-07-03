<div class="row">
    <div class="col-12">
        <label> Source Name:<span class="text-danger">*</span></label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $source['id'] ?>">
            <input type="text" class="form-control" name="source_name" id="source_name" placeholder="Enter Source Name" value="<?php echo $source['name'] ?>">
        </div>
    </div>
</div>