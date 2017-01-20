<?
$ci =&get_instance();
?>
    <div class="row">
        <div class="column small-6">
            <h5>Producer register</h5>
            <div class="row">
                <div class="medium-12 columns">
                    <label>ชื่อ นามสกุล
                        <input name="username" type="text" placeholder="Username">
                    </label>
                </div>
                <div class="medium-12 columns">
                    <label>เลขที่บัตรประชาชน
                        <input name="password" type="text" placeholder="password">
                    </label>
                </div>
                <div class="medium-12 columns">
                    <label>
                        ที่อยู่ตามบัตร
                        <textarea placeholder="None"></textarea>
                    </label>
                </div>
                <div class="large-12 columns">
                    <label>
                        สำเนาบัตรประชาชนพร้อมเซ็นรับรอง
                    </label>
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="button success fileinput-button">
        <span>Select files...</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload" type="file" name="files[]">
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
                        <input id="img_id_card" type="hidden" name="img_id_card" value="">
                    </div>
                </div>
                <div class="large-12 columns">
                    <label>
                        ประวัติผลงานของคุณ
                    </label>
                    <!-- The fileinput-button span is used to style the file input field as button -->
                    <span class="button success fileinput-button">
        <span>Select files...</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="fileupload2" type="file" name="files[]">
                    </span>
                    <br>
                    <br>
                    <!-- The global progress bar -->
                    <div id="progress2" class="success progress">
                        <div class="progress-meter"></div>
                    </div>
                    <!-- The container for the uploaded files -->
                    <div class="files">
                        <img id="img_tmp2" src="" alt="">
                        <input id="img_port" type="hidden" name="img_port" value="">
                    </div>
                </div>
                <div class="medium-6 columns">
                    <a href="<?=site_url()?>" class="button secondary">Next</a>
                </div>
                <div class="medium-6 columns">
                    <a href="<?=site_url()?>" class="button secondary">Back</a>
                </div>
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
                            $("#img_id_card").attr('value', '');
                        } else {
                            $("#img_tmp").attr('src', '<?echo upload_site_url();?>media/temp/' + file.name);
                            $("#img_id_card").val(file.name);
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
            $('#fileupload2').fileupload({
                url: url,
                dataType: 'json',
                done: function(e, data) {
                    //console.log(data);
                    $.each(data.result.files, function(index, file) {
                        //console.log(file);
                        if (file.error == "File is too big") {
                            $("#img_tmp2").attr('alt', 'File is too big');
                            $("#img_port").attr('value', '');
                        } else {
                            $("#img_tmp2").attr('src', '<?echo upload_site_url();?>media/temp/' + file.name);
                            $("#img_port").val(file.name);
                        }
                    });
                },
                progressall: function(e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    $('#progress2 .progress-meter').css(
                        'width',
                        progress + '%'
                    );
                }
            }).prop('disabled', !$.support.fileInput)
            .parent().addClass($.support.fileInput ? undefined : 'disabled');
    });
    </script>
