<?php if (substr($actionBtnData['options'], 0, 1) == 'E') { ?> <!-- checking to display options -->
    <?php if ($activeModulePermission['edit']) {
            $action = true;
            switch ($actionBtnData['module']) {
                case 'form_fields':
                    $hrefUrl = base_url(BACKENDFOLDER . '/' . $actionBtnData['module'] . '/create/' . $actionBtnData['moduleData']->form_id . '/' . $actionBtnData['moduleData']->id);
                    break;
                default:
                    $hrefUrl = base_url(BACKENDFOLDER . '/' . $actionBtnData['module'] . '/create/' . $actionBtnData['moduleData']->id);
                    break;
            } ?>
            <a title="Edit Data" href="<?php echo $hrefUrl ?>" class="btn btn-primary">
                <i class="fa fa-edit fa-fw"></i>
            </a>
        <?php } ?>
<?php } ?>
<?php if (substr($actionBtnData['options'], 1, 1) == 'D' || $actionBtnData['options'] == 'D') { ?> <!-- checking to display options -->
    <?php if ($activeModulePermission['delete']) {
        
        if(!isset($actionBtnData['moduleData']->status)) {
            $actionBtnData['moduleData']->status='';
        }
        
            if (get_userdata('role_id') == 1 || (get_userdata('role_type') != 'reviewer')) {
            $action = true;
            $delete = true;
            switch ($actionBtnData['module']) {
                case 'form_fields':
                    $hrefUrl = base_url(BACKENDFOLDER . '/' . $actionBtnData['module'] . '/delete/' . $actionBtnData['moduleData']->form_id . '/' . $actionBtnData['moduleData']->id);
                    break;
                case 'category':
                    if ($actionBtnData['moduleData']->is_deletable == 'yes') {
                        $hrefUrl = base_url(BACKENDFOLDER . '/' . $actionBtnData['module'] . '/delete/' . $actionBtnData['moduleData']->id);
                    } else {
                        $delete = false;
                    }
                    break;
                default:
                    $hrefUrl = base_url(BACKENDFOLDER . '/' . $actionBtnData['module'] . '/delete/' . $actionBtnData['moduleData']->id);
                    break;
            }
            if ($delete) {
                ?>
                <a title="Delete Data" href="<?php echo $hrefUrl ?>" class="btn btn-danger"
                   onclick="return confirm('Are you sure?')">
                    <i class="fa fa-trash fa-fw"></i>
                </a>
            <?php }
        } else { ?>
                <a title="Delete Data" href="#" class="btn btn-danger btndisable"
                   onclick="sweetAlert('Sorry', 'This content has already been approved. You are not authorized to complete this action.', 'error');">
                    <i class="fa fa-trash fa-fw"></i>
                </a>
            <?php }
    } ?>
<?php } ?>

<?php if (substr($actionBtnData['options'], 2, 1) == 'S' || $actionBtnData['options'] == 'S') { ?> <!-- checking to display options -->
    <?php if ($activeModulePermission['delete']) {
        $action = true;
        $status = true;
        $hide_status_btn = false;
        ?>
        <?php
        if(isset($actionBtnData['moduleData']->status)) {
            if ($actionBtnData['moduleData']->status == 'InActive') {
                $icon_class = 'fa-circle-o';
                $button_class = 'btn-danger btn-inactive';
                $button_text = '';
            } else {
                $icon_class = 'fa-circle';
                $button_class = 'btn-success';
                $button_text = '';
            }
        } else {
            $hide_status_btn = true;
        }

        switch ($actionBtnData['module']) {
            case 'category':
                if ($actionBtnData['moduleData']->is_deletable == 'no') {
                    $status = false;
                }
                break;
            default:
                $status = true;
                break;
        }
        if ($status && get_userdata('role_id') != 3 && !$hide_status_btn && get_userdata('role_type') != 'editor') { ?>
            <a title="Change Status of Data"
               href="<?php echo base_url(BACKENDFOLDER . '/' . $actionBtnData['module'] . '/status/' . $actionBtnData['moduleData']->status . '/' . $actionBtnData['moduleData']->id) ?>"
               class="btn <?php echo $button_class ?>" onclick="return confirm('Are you sure?')">
                <i class="fa <?php echo $icon_class ?> fa-fw"></i><?php echo $button_text ?>
            </a>
        <?php }
    } ?>
<?php } ?>


<?php echo !(isset($action)) ? 'No permission granted for other actions' : '' ?>