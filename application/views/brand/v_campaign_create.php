<?
$ci =&get_instance();
?>
    <link rel="stylesheet" href="<?=site_url()?>/css/jquery.fileupload.css">
    <div class="row">
        <div class="large-12 columns">
            <div class="callout">
                <h3>Create Campaign</h3>
                <form method="post" action="<?=site_url('brand/campaign_create')?>">
                    <h5 style="color:red"><?if($this->session->userdata('create_error')){echo $this->session->userdata('create_error');$this->session->unset_userdata('create_error');}?></h5>
                    <div class="row">
                        <div class="large-9 columns">
                            <div class="row">
                                <div class="medium-12 columns">
                                    <label>ชื่องาน
                                        <input name="name" type="text" placeholder="name">
                                    </label>
                                </div>
                                <fieldset class="large-6 columns">
                                  <legend>ประเภท social</legend>
                                  <input id="checkbox1" type="checkbox" name="social[]" value="facebook"><label for="checkbox1">Facebook</label>
                                  <input id="checkbox2" type="checkbox" name="social[]" value="youtube"><label for="checkbox2">Youtube</label>
                                </fieldset>
                                <div class="medium-12 columns">
                                    <label>ช่วงบัดเจต
                                        <input name="budget_start" type="text" placeholder="budget-start">-<input name="budget_end" type="text" placeholder="budget-end">
                                    </label>
                                </div>
                                <div class="medium-12 columns">
                                    <label>รายละเอียด
                                        <textarea name="description" placeholder="None"></textarea>
                                    </label>
                                </div>
                                <div class="medium-12 columns">
                                    <label>url ร้าน
                                        <input name="url" type="text" placeholder="http://exp.com">
                                    </label>
                                </div>
                                <div class="medium-12 columns">
                                    <label>วันที่เริ่ม
                                        <input type="text" name="start_date" class="datepicker">
                                    </label>
                                </div>
                                <div class="medium-12 columns">
                                    <label>วันที่สิ้นสุด
                                        <input type="text" name="end_date" class="datepicker">
                                    </label>
                                </div>
                                <div class="medium-5 columns">
                                    <input type='submit' class="button" value="Create">
                                </div>
                                <div class="medium-5 columns">
                                    <a href="<?=site_url('brand/campaign_list')?>" class="button secondary">back</a>
                                </div>
                            </div>
                        </div>
                        <div class="large-3 columns">
                            <!-- The fileinput-button span is used to style the file input field as button -->
                            <span class="button success fileinput-button">
        <span>Select files...</span>
                            <!-- The file input field used as target for the file upload widget -->
                            <input id="fileupload" type="file" name="files[]" multiple>
                            </span>
                            <br>
                            <br>
                            <!-- The global progress bar -->
                            <div id="progress" class="success progress">
                                <div class="progress-meter"></div>
                            </div>
                            <!-- The container for the uploaded files -->
                            <div class="files">
                                <img id="img_tmp" src="" alt="">
                                <input id="files" type="hidden" name="filename" value="">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
    <script src="<?=site_url()?>/js/vendor/jquery.ui.widget.js"></script>
    <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
    <script src="<?=site_url()?>/js/jquery.iframe-transport.js"></script>
    <!-- The basic File Upload plugin -->
    <script src="<?=site_url()?>/js/jquery.fileupload.js"></script>
    <script type="text/javascript">
    $(function() {

        $( ".datepicker" ).datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: "dd/mm/yy"
          });
        'use strict';
        // Change this to the location of your server-side upload handler:
        var url = '<?php echo upload_site_url('upload/fileupload');?>';
        $('#fileupload').fileupload({
                url: url,
                dataType: 'json',
                done: function(e, data) {
                    //console.log(data);
                    $.each(data.result.files, function(index, file) {
                        //console.log(file);
                        if (file.error == "File is too big") {
                            $("#img_tmp").attr('alt', 'File is too big');
                            $("#files").attr('value', '');
                        } else {
                            $("#img_tmp").attr('src', '<?echo upload_site_url();?>media/temp/' + file.name);
                            $("#files").val(file.name);
                        }
                    });
                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress .progress-meter').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
    </script>
