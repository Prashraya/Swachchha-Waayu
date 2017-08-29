<?php if(isset($module_data->status) && $module_data->status) {
    if (get_userdata('role_type') == 'editor' && $module_data->status == 'InActive') { ?>
        <input type="submit" class="btn btn-info" value="Save" name="only_save">
        <input type="submit" class="btn btn-info" value="Save and New" name="save_new">
        <button type="submit" class="btn btn-primary">Save and Exit</button>
    <?php } else if ((get_userdata('role_type') != 'editor' || $module_data->id == "")) { ?>
        <input type="submit" class="btn btn-info" value="Save" name="only_save">
        <input type="submit" class="btn btn-info" value="Save and New" name="save_new">
        <button type="submit" class="btn btn-primary">Save and Exit</button>
    <?php }
}else{ ?>
    <input type="submit" class="btn btn-info" value="Save" name="only_save">
        <input type="submit" class="btn btn-info" value="Save and New" name="save_new">
        <button type="submit" class="btn btn-primary">Save and Exit</button>
<?php }?>
<a class="btn btn-warning" href="<?php echo base_url(BACKENDFOLDER . '/'. $this->header['page_name']) ?>"><span>Cancel</span></a>