<?php if(validation_errors()) : ?>
    <div class="alert alert-danger alert-dismissable fade in">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <?php echo validation_errors() ?>
    </div>
<?php endif ?>
<form action="" method="post">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            
            <div class="form-group">
                <label for="name">Site Name</label>
                <input type="text" name="name" value="<?php echo $site->name ?>" class="form-control" id="name" placeholder="Site Name">
            </div>
            <div class="form-group">
                <label for="latitude">Latitude</label>
                <input type="text" name="latitude" value="<?php echo $site->latitude ?>" class="form-control" id="latitude" placeholder="Latitude">
            </div>
            <div class="form-group">
                <label for="longitude">Longitude</label>
                <input type="text" name="longitude" value="<?php echo $site->longitude ?>" class="form-control" id="longitude" placeholder="Longitude">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" <?php echo $site->status == 'Active' || $site->status == '' ? 'selected' : '' ?>>Publish</option>
                    <option value="0" <?php echo $site->status == 'InActive' ? 'selected' : '' ?>>UnPublish</option>
                </select>
            </div>
           
        </div>
       
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <input type="submit" class="btn btn-info" value="Save" name="only_save">
                <input type="submit" class="btn btn-info" value="Save and New" name="save_new">
                <button type="submit" class="btn btn-primary">Save and Exit</button>
                <a class="btn btn-warning" href="<?php echo base_url(BACKENDFOLDER . '/'. $this->header['page_name']) ?>"><span>Close</span></a>
            </div>
        </div>
    </div>
</form>