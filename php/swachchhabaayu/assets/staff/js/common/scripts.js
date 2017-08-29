$.validator.addMethod("pwcheck", function(value) {
    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
        && /[a-z]/.test(value) // has a lowercase letter
        && /\d/.test(value) // has a digit
        && /[A-Z]/.test(value) // has a uppercase
        && /([!,%,&,@,#,$,^,*,?,_,~])/.test(value) // has a uppercase
});
if(typeof $.validator != 'undefined') {
    $.validator.setDefaults({
        errorElement: 'span'
    });
}
var base_url = $('#base-url').val();
var admin_base_url = $('#admin-base-url').val();
var admin_module = $('#admin-module').val();
var backend_folder = $('#backend_folder').val();
$(function () {
    var table = $('.list-datatable').DataTable({
        "bPaginate": true,
        "pageLength": 20,
        "bLengthChange": false,
        "bFilter": true,
        "bSort": true,
        "bInfo": true,
        "bAutoWidth": false,
        "columnDefs": [ { "targets": 1, "orderable": false } ]
    });
    // Setup - add a text input to each footer cell
    $('#table-search-row th').each(function () {
        var title = $(this).text();
        if (title != '')
            $(this).html('<input type="text" placeholder="Search ' + title + '" />');
        else
            $(this).html(' ');
    });
    // Apply the search
    table.columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
    });

    if($('.activity-log-datatable').length) {
        var activityLogTable = $('.activity-log-datatable').DataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bFilter" : false,
            "sAjaxSource": admin_base_url + "/activitylog/get_activity_logs",
            "aoColumnDefs": [{
                "mData": '0',
                "aTargets": [0],
                "bSortable": false,
                "bSearchable": false
            }, {
                "mData": '1',
                "aTargets": [1],
                "bSortable": true,
                "bSearchable": true
            }, {
                "mData": '2',
                "aTargets": [2],
                "bSortable": true,
                "bSearchable": true
            }, {
                "mData": '3',
                "aTargets": [3],
                "bSortable": true,
                "bSearchable": true
            }, {
                "mData": '4',
                "aTargets": [4],
                "bSortable": true,
                "bSearchable": true
            }]
        })
        // Apply the search
        activityLogTable.columns().every(function () {
            var that = this;

            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    }

    if($('.admin-log-datatable').length) {
        var adminLogTable = $('.admin-log-datatable').DataTable({
            "bProcessing": true,
            "bServerSide": true,
            "bFilter" : false,
            "sAjaxSource": admin_base_url + "/adminlog/get_admin_logs",
            "aoColumnDefs": [{
                "mData": '0',
                "aTargets": [0],
                "bSortable": false,
                "bSearchable": false
            }, {
                "mData": '1',
                "aTargets": [1],
                "bSortable": true,
                "bSearchable": true
            }, {
                "mData": '2',
                "aTargets": [2],
                "bSortable": true,
                "bSearchable": true
            }, {
                "mData": '3',
                "aTargets": [3],
                "bSortable": true,
                "bSearchable": true
            }]
        })
        // Apply the search
        adminLogTable.columns().every(function () {
            var that = this;

            $('input', this.footer()).on('keyup change', function () {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    }

    /*$('.list-datatable').dataTable({
     "bPaginate": true,
     "bLengthChange": false,
     "bFilter": false,
     "bSort": true,
     "bInfo": true,
     "bAutoWidth": false
     });
     */
    var elf = $('#media-manager').elfinder({
        url: base_url + 'assets/staff/js/vendor/elfinder/php/connector.php', // connector URL (REQUIRED)
        lang: 'en' // language (OPTIONAL)
    }).elfinder('instance');

});
function load_ckeditor(textarea, customConfig) {
    if (customConfig) {
        configFile = base_url + 'assets/staff/js/vendor/ckeditor/custom/minimal.js';
    } else {
        configFile = base_url + 'assets/staff/js/vendor/ckeditor/custom/full.js';
    }

    CKEDITOR.replace(textarea, {
        customConfig: configFile,
        on: {
            instanceReady: function() {
                this.dataProcessor.htmlFilter.addRules( {
                    elements: {
                        img: function( el ) {
                            // Add an attribute.
                            /*if ( !el.attributes.alt )
                                el.attributes.alt = 'An image';*/

                            // Add some class.
                            el.addClass( 'img-responsive' );
                        }
                    }
                } );
            }
        }
    });
}


$(document).on("keyup", ".title", function () {
    var txtValue = $(this).val();
    var newValue = txtValue.toLowerCase().replace(/[~!@#$%\^\&\*\(\)\+=|'"|\?\/;:.,<>\-\\\s]+/gi, '-');
    $('.alias').val(newValue);
});

// for adding interest rate
$(document).ready(function () {
    $(".add-interest-data").on( 'click' , function() {
        var category = $(this).attr("data");
        var message = "<tr><input type='hidden' class='form-control' value='' name='"+category+"[product_id][]'>";
        message += "<td><input type='text' class='form-control' name='"+category+"[product_name][]'></td>";
        message += "<td><input type='text' class='form-control' name='"+category+"[minimum_balance][]'></td>";
        message += "<td><input type='text' class='form-control' name='"+category+"[interest][]'></td></tr>";
        message += " <td><a title='Delete Data' data='' href='javascript:void(0)' class='btn btn-danger delete-interest' onclick='return confirm('Are you sure?')'> <i class=''fa fa-trash fa-fw'></i></td>";
        var row=$(this).parents('.add-row');
        $(message).insertBefore(row);

    });
    $(".add-fixed-data").on( 'click' , function() {
        var message = "<tr><td><input type='text' class='form-control' name='fixeddeposit[]'></td>";
        message += "<td><input type='text' class='form-control' name='institutional[]'></td>";
        message += "<td><input type='text' class='form-control' name='personal[]'></td></tr>";
        var row=$(this).parents('.add-fixed-row');
        $(message).insertBefore(row);

    });

    $(".fiscal-year").on( 'change' , function() {
        var that=$(this);
        var year = that.val();
        var nepali_year = year.split("/");
        var message;
        $.each(nepali_year, function(index, value) {
            message += "<option value='"+value+"'>"+value+"</option>";
        });
        $('.nepali-year').html(message);
    });
});


$('body').on('click', '#submitSocialData', function (e) {
    e.preventDefault();
    var that = $(this),
        form = that.parents('form'),
        url = form.attr('action'),
        data = form.serialize();

    $.ajax({
        url: url,
        data: data,
        type: 'post',
        success: function (res) {
            console.log(res);
        }
    })
});
$('body').on('click', '.cancel', function (e) {
    e.preventDefault();
    var that = $(this);
    that.parents('.mediaWrapper')
        .fadeOut('slow', function () {
            $(this).remove();
        });
});

(function () {
    $('body').on('change', '#selectData', function (e) {
        var form = $(this).parents('form'),
            url = form.attr('action'),
            moduleId = $('#moduleId').val();
        $.ajax({
            url: url + '/getSocialData',
            data: 'dataId=' + $(this).val() + '&moduleId=' + moduleId,
            type: 'post',
            dataType: 'json',
            success: function (res) {
                if (res) {
                    $('#facebook_title').val(res.Facebook.title);
                    $('#facebook_link').val(res.Facebook.link);
                    $('#facebook_image').val(res.Facebook.image);
                    $('#facebook_description').val(res.Facebook.description);

                    $('#twitter_title').val(res.Twitter.title);
                    $('#twitter_link').val(res.Twitter.link);
                    $('#twitter_image').val(res.Twitter.image);
                    $('#twitter_description').val(res.Twitter.description);
                } else {
                    $('#facebook_title').val('');
                    $('#facebook_link').val('');
                    $('#facebook_image').val('');
                    $('#facebook_description').val('');

                    $('#twitter_title').val('');
                    $('#twitter_link').val('');
                    $('#twitter_image').val('');
                    $('#twitter_description').val('');
                }
            }
        });
    });

    /*$(document).ready(function () {
        $('#selectData').select2();
    });
*/
    /* select all checkbox for listing page starts */
    $('.selectAll').change(function () {
        var set = ".rowCheckBox";
        var checked = $(this).is(":checked");
        $(set).each(function () {
            if (checked) {
                $(this).attr("checked", true);
            } else {
                $(this).attr("checked", false);
            }
        });
    });
    /* select all checkbox for listing page starts */

    /* multi-delete starts */
    $("#deleteIcon").click(function () {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if (checked == 1) {
            if (confirm("Are you sure to delete data?")) {
                var url = $(this).attr('rel') + '/' + $(".rowCheckBox:checked:first").val();
                window.location = url;
            }
        }
        else if (checked > 1) {
            if (confirm("Are you sure to delete data?")) {
                $('#gridForm').attr('method', 'post');
                $("#gridForm").attr("action", $(this).attr('rel'));
                $("#gridForm").submit();
            }
        } else {
            alert("Please Select Some Items To Delete");
        }
        return false;
    })
    /* multi-delete ends */

    /* multi-change-status starts */
    $("#activeIcon, #inactiveIcon").click(function () {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if (checked > 0) {
            if (confirm("Are you sure to change status of data?")) {
                $('#gridForm').attr('method', 'post');
                $("#gridForm").attr("action", $(this).attr('rel'));
                $("#gridForm").submit();
            }
        } else {
            alert("Please Select Some Items To Change Status of");
        }
        return false;
    })
    /* multi-change-status ends */
    /* structure and data button starts */
    $(".structureIcon").click(function () {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if (checked > 0) {
            if (checked > 1) {
                var excessCount = confirm("You have selected more than 1 item, Only the top one selected will be edited. Do you want to continue?");
            } else {
                var excessCount = true;
            }
            if (excessCount) {
                var url = base_url + backend_folder + "/form_fields/" + $(".rowCheckBox:checked:first").val() + "";
                window.location = url;
            }
        } else {
            alert("Please Select Some Items First");
        }
        return false;
    });
    $(".dataIcon").click(function () {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if (checked > 0) {
            if (checked > 1) {
                var excessCount = confirm("You have selected more than 1 item, Only the top one selected will be edited. Do you want to continue?");
            } else {
                var excessCount = true;
            }
            if (excessCount) {
                var url = base_url + backend_folder + "/form_data/" + $(".rowCheckBox:checked:first").val() + "";
                window.location = url;
            }
        } else {
            alert("Please Select Some Items First");
        }
        return false;
    });
    /* structure and data button ends */

    /* sort starts */
    $('[data-toggle="ajaxModal"]').on('click',
        function (e) {
            $('#ajaxModal').remove();
            e.preventDefault();
            var $this = $(this)
                , $remote = $this.data('remote') || $this.attr('href')
                , $modal = $('<div class="modal" id="ajaxModal"><div class="modal-body"></div></div>');
            $('body').append($modal);

            $modal.modal({backdrop: 'static', keyboard: false});
            $modal.load($remote, function () {
                // sortable
                $("#sortable-data").sortable({
                    update: function (event, ui) {
                        var data = $(this).sortable('serialize');
                        // POST to server using $.post or $.ajax
                        $.ajax({
                            data: data,
                            type: 'POST',
                            url: admin_base_url + '/' + admin_module + '/sort',
                            success: function () {
                                $('#msg').remove();
                                $("#sortable-data").prepend('<span id="msg"></span>');
                                $('#msg').html('Order Updated')
                            }
                        });
                    }
                }).disableSelection();

                if($('.menu-sortable').length) {
                    $(".menu-sortable").sortable({
                        containment: "parent",
                        connectWith: '.menu-sortable',
                        update: function (event, ui) {
                            var data = $(this).sortable('serialize');
                            // POST to server using $.post or $.ajax
                            $.ajax({
                                data: data,
                                type: 'POST',
                                url: admin_base_url + '/' + admin_module + '/sort',
                                success: function () {
                                    $('#msg').remove();
                                    $("#sortable").prepend('<span id="msg"></span>');
                                    $('#msg').html('Order Updated')
                                }
                            });
                        }
                    }).disableSelection();
                }
            });
        }
    );
    /* sort ends */
    /* send mail starts */
    $(".mailIcon").click(function() {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if(checked > 0) {
            $('#gridForm').attr('method', 'post');
            $("#gridForm").attr("action", $(this).attr('rel'));
            $("#gridForm").submit();
        } else {
            alert("Please Select Some Items First");
        }
        return false;
    })
    /* send mail end */
    $('.send-email').on('click',
        function (e) {
            var $this = $(this);

            $('#message-modal').remove();
            e.preventDefault();
            var $remote = $this.attr('href')
                , $modal = $('<div class="modal" id="message-modal"><div class="modal-body"></div></div>');
            $('body').append($modal);
            $modal.modal({backdrop: 'static', keyboard: false});
            $modal.load($remote);
        }
    );
    $('.view-detail').on('click',
        function (e) {
            var $this = $(this);

            $('#message-modal').remove();
            e.preventDefault();
            var $remote = $this.attr('href')
                , $modal = $('<div class="modal" id="message-modal"><div class="modal-body"></div></div>');
            $('body').append($modal);
            $modal.modal({backdrop: 'static', keyboard: false});
            $modal.load($remote);
        }
    );
    $('.status').on('change', function () {
        var that = $(this);
        var baseUrl = $('#base-url').val();
        var data = $('#data').val();
        var page = $('#page').val();
        var backendfolder = $('#backendfolder').val();
        var status = $(this).val();
        var id = that.parents('td').find('.id').val();
        window.location = baseUrl + backendfolder + '/' + data + '/status/' + page + '/' + status + '/' + id;

    })
    $('.emailTemplateCategory').on('change', function () {
        var that = $(this);
        var baseUrl = $('#base-url').val();
        var val = that.val();
        window.location = baseUrl + 'kbic-system/emailTemplate/' + val;
    })

})();
$(document).ready(function () {
    /* permission button for role starts */
    $(".permissionIcon").click(function() {
        var checked = parseInt($(".rowCheckBox:checked").length);

        if(checked > 0) {
            if(checked > 1) {
                alert("You have selected more than 1 item");
                var excessCount = false;
            } else {
                var excessCount = true;
            }

            if($(".rowCheckBox:checked:first").val() == '1') {
                alert("You can\'t set permission for Super Administrator");
                var excessCount = false;
            }

            if(excessCount) {
                var url = base_url + backend_folder + "/rolemodule/index/" + $(".rowCheckBox:checked:first").val();
                window.location = url;
            }

        } else {
            alert('Please Select Some Items First');
        }
        return false;
    })
    /* permission button for role ends */

    /* select2 initialization */
    if($('#module_link').length) {
        $('#module_link').select2({
            placeholder: 'Select modules',
            width: 'resolve'
        });
    }
    if($('#side_menus').length) {
        $('#side_menus').select2({
            placeholder: 'Select side menus',
            width: 'resolve'
        });
    }
    if($('#site_user_list').length) {
        $('body').on('click', '.remove-from-site', function(e) {
            showLoader();
            e.preventDefault();
            var that = $(this),
                user_id = that.data('user'),
                site_id = that.data('site');
            $.post(admin_base_url + '/configuration/remove_site_user/' + user_id + '/' + site_id)
                .done(function(resp) {
                    hideLoader();
                    if(resp) {
                        $('.msg-holder').html('User removed from site');
                        that.parents('tr').fadeOut('fast').remove();
                    } else
                        $('.msg-holder').html('User could not be removed from site');
                })
        });
        $('.user-assign').on('click', function() {
            $('.usersite-list').html('');
            var url = $(this).data('href'),
                site_id = url.split('/');
            site_id = site_id[site_id.length - 1];
            $('#site_user_list').parents('form').attr('action', url);
            $.get(admin_base_url + '/configuration/get_users_in_site/' + site_id)
                .done(function(resp) {
                    $('.usersite-list').html(resp);
                })
        });
        $('#site_user_list').select2({
            placeholder: 'Users',
            width: 'resolve'
        });
    }
});
$('a').on('click', function() {
    var href = $(this).attr('href');
    if(href.indexOf('http') > -1) {
        showLoader();
        $( document ).ajaxComplete(function() {
            hideLoader();
        });
    }
});
$(document).ready(function() {
    $("#module-sortable-data").sortable({
        update: function (event, ui) {
            var data = $(this).sortable('serialize');
            var segment = window.location.pathname.split( '/' );
            segment = segment[3];
            var page_id = $('#page-id').val();
            // POST to server using $.post or $.ajax
            $.ajax({
                data: data,
                type: 'POST',
                url: admin_base_url + '/'+segment+'/sort/' + page_id,
                success: function () {
                    $('#msg').remove();
                    $("#module-sortable-data").prepend('<span id="msg"></span>');
                    $('#msg').html('Order Updated')
                }
            });
        }
    });

    // for product benefit rows
    $('#add-benefit-row').on('click', function(e) {
        e.preventDefault();
        var benefitHtml = '<div class="benefit-rows">' +
            '<div class="col-lg-10">' +
            '<input class="form-control" type="text" id="product-benefits" placeholder="Product benefit" name="benefit[]"/>' +
            '</div>' +
            '<div class="col-lg-2">' +
            '<a href="#" class="btn btn-danger btn-sm remove-benefit-row" title="Remove row"><i class="fa fa-close"></i></a>' +
            '</div>' +
            '</div>';
        $('#benefit-wrap').append(benefitHtml);
    });

    $('body').on('click', '.remove-benefit-row', function(e) {
        e.preventDefault();
        var that = $(this);
        that.parents('.benefit-rows').remove();
    });

    $('body').on('click', '.delete', function(e) {
        e.preventDefault();
        var that = $(this);
        that.parents('.image-wrapper')
            .fadeOut('slow', function () {
                $(this).remove();
            });
        var value = that.parents('.image-wrapper').prev( );
        $(value).attr('value','');

    });
    $('body').on('click', '.delete-interest', function(e) {
        e.preventDefault();
        var that = $(this);
        var id = $('.delete-interest').attr('data');
        if(id) {
            $.post(admin_base_url + '/interestrate/rowdelete?id=' + id)
                .done(function (resp) {
                    that.parents('tr').remove();
                })
        }else{
            that.parents('tr').remove();
        }

    });
    $('body').on('click', '.delete-fixed-interest', function(e) {
        e.preventDefault();
        var that = $(this);
        var id = $('.delete-fixed-interest').attr('data');
        if(id) {
            $.post(admin_base_url + '/interestrate/fixeddelete?id=' + id)
                .done(function (resp) {
                    that.parents('tr').remove();
                })
        }else{
            that.parents('tr').remove();
        }

    });
    // for product benefit rows

    // for product feature rows
    $('#add-feature-row').on('click', function(e) {
        e.preventDefault();
        var featureHtml = '<div class="feature-rows">' +
            '<div class="col-lg-10">' +
            '<input class="form-control" type="text" id="product-features" placeholder="Product feature" name="feature[]"/>' +
            '</div>' +
            '<div class="col-lg-2">' +
            '<a href="#" class="btn btn-danger btn-sm remove-feature-row" title="Remove row"><i class="fa fa-close"></i></a>' +
            '</div>' +
            '</div>';
        $('#feature-wrap').append(featureHtml);
    });

    $('body').on('click', '.remove-feature-row', function(e) {
        e.preventDefault();
        var that = $(this);
        that.parents('.feature-rows').remove();
    });
    // for product feature rows

    // offer datepicker
    if($('#expiry_date').length) {
        $('#expiry_date').datepicker({
            format: 'yyyy-mm-dd',
            startDate: 'today'
        });
    }

    // site select2 plugin
    if($('#site-select').length) {
        $('#site-select').select2({
            placeholder: 'Select site'
        });
    }
    if($('#landing-site-select').length) {
        $('#landing-site-select').select2({
            placeholder: 'Select site'
        });
        $('#landing-site-select').on('change', function() {
            window.location.href = admin_base_url + '/pagemodules/create/' + $(this).val();
        })
    }
    if($('#innerpage-site-select').length) {
        $('#innerpage-site-select').select2({
            placeholder: 'Select site'
        });
    }
    if($('#offer-product-link').length) {
        $('#offer-product-link').select2({
            placeholder: 'Select Product'
        });
    }
    $("#select-all-sites").click(function(){
        var that = $(this);
        if(that.hasClass('selecting-all')) {
            $("#site-select > option").prop("selected","selected");
            $("#site-select").trigger("change");
            that.removeClass('selecting-all');
            that.addClass('deselecting-all');
            that.html('Deselect All');
        } else {
            $("#site-select > option").removeAttr("selected");
            $("#site-select").trigger("change");
            that.removeClass('deselecting-all');
            that.addClass('selecting-all');
            that.html('Select All');
        }
    });

    $('#type').change(function() {
        if (this.value == 'external') {
            $('#offer-link').toggle();
            if($('#product-link').is(':visible')){
                $('#product-link').toggle();
            }
            if($('#description-link').is(':visible')){
                $('#description-link').toggle();
            }
        } else if (this.value == 'product') {
            $('#product-link').toggle();
            if($('#offer-link').is(':visible')){
                $('#offer-link').toggle();
            }
            if($('#description-link').is(':visible')){
                $('#description-link').toggle();
            }
        }else if (this.value == 'description') {
            $('#description-link').toggle();
            if($('#product-link').is(':visible')){
                $('#product-link').toggle();
            }
            if($('#offer-link').is(':visible')){
                $('#offer-link').toggle();
            }
        }
    });
    $('#servicetype').change(function() {
        if (this.value == 'external') {
            $('#service-link').toggle();
            if($('#description-link').is(':visible')){
                $('#description-link').toggle();
            }
        } else if (this.value == 'description') {
            $('#description-link').toggle();
            if($('#service-link').is(':visible')){
                $('#service-link').toggle();
            }
        }
    });

    $('body').on('click', '.showme', function(e) {
        var uid = $(this).data('id');
        var tr=$(this).closest("tr");

        $.ajax({
            url: admin_base_url+ "/product_feedback/getdata?id=" + uid,
            success: function(response)
            {
                if (tr.hasClass("unviewed")){
                    tr.removeClass("unviewed");
                    tr.addClass("viewed");
                }
                $('#viewfeedback .modal-body').html(response);
                $('#viewfeedback').modal('show', {backdrop: 'static'});

            }
        });
    });

    if($('#publish_date').length) {
        $('#publish_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true
        });
    }

    if($('#notice_publish_date').length) {
        $('#notice_publish_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true        });
    }


    if($('#notice_expiry_date').length) {
        $('#notice_expiry_date').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            startDate: 'today'
        });
    }

    if($('#exchange_date, #stocks_date, #gold_date').length) {
        $('#exchange_date, #stocks_date, #gold_date').datepicker({
            'startDate': 'today'
        });
    }

    if($('#exchange_time, #stocks_time, #gold_time').length) {
        $('#exchange_time, #stocks_time, #gold_time').timepicker();
    }
});
function showLoader() {
    //$('#loader-container').show();
}

function hideLoader() {
    $('#loader-container').hide();
}

if($('#user-register').length) {
    $('#user-register').validate({
        rules: {
            password:{
                required: true,
                pwcheck: true,
                minlength: 8
            },
            confirm_password: {
                required: true,
                equalTo: "#password"
            }
        },
        messages: {
            password:{
                pwcheck:'Should contain a number, capital, small letters and a character.'
            },
            confirm_password: {
                equalTo: 'Confirmation password doesn\'t match.'
            }
        }
    });
}