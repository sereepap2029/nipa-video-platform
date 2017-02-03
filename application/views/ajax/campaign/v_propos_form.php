<?
$ci =&get_instance();
?>
<style type="text/css">
.step-form {
    display: none;
}
</style>
<div class="row">
    <div class="column small-12">
        <h5>Send Proposal</h5>
        <div class="row step-form step-form-1" style="display: block;">
            <div class="medium-12 columns">
                <label>ชื่อ นามสกุล
                    <input id="propos_name"  type="text" placeholder="Username">
                </label>
            </div>
            <div class="medium-12 columns">
                <label>เลขที่บัตรประชาชน
                    <input id="propos_civil_id" type="text" placeholder="password">
                </label>
            </div>
            <div class="medium-12 columns">
                <label>
                    ที่อยู่ตามบัตร
                    <textarea id="propos_address" placeholder="None"></textarea>
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
                <a href="javascript:form_show('step-form-2');" class="button secondary">Next</a>
            </div>
        </div>
        <div class="row step-form step-form-2">
            <div class="medium-12 columns">
                <label>ชื่อเล่น
                    <input id="propos_nickname" type="text" placeholder="password">
                </label>
            </div>
            <div class="medium-12 columns">
                <label>
                    เกี่ยวกับคุณ
                    <textarea id="propos_about" placeholder="None"></textarea>
                </label>
            </div>
            <div class="row">
                <div class="medium-6 columns">
                    <a href="javascript:form_show('step-form-1');" class="button secondary">Back</a>
                </div>
                <div class="medium-6 columns">
                    <a href="javascript:form_show('step-form-3');" class="button secondary">Next</a>
                </div>
            </div>
        </div>
        <div class="row step-form step-form-3">
            <div class="medium-12 columns">
                <label>เสนอราคาจ้างงาน
                    <input id="propos_cost" type="text" placeholder="password">
                </label>
            </div>
            <div class="medium-12 columns">
                <label>
                    ระบุสัญญาจ้างงาน
                    <textarea id="propos_term" placeholder="None"></textarea>
                </label>
            </div>
            <div class="row">
                <div class="medium-6 columns">
                    <a href="javascript:form_show('step-form-2');" class="button secondary">Back</a>
                </div>
                <div class="medium-6 columns">
                    <a href="javascript:send_propos('<?=$campaign->id?>','<?=$campaign->brand_id?>');" class="button secondary">Send Proposal</a>
                </div>
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
    function form_show(div_class) {
        $(".step-form").fadeOut("fast", function() {
            setTimeout(function() {
                $("." + div_class).fadeIn();
            }, 500);

        });

    }
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
