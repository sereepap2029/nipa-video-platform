<?
$ci =&get_instance();
?>
<style type="text/css">
</style>
<div class="row creator-list">
    <div class="large-12 columns">
        <div class="callout">
            <div class="row">
                <div class="medium-6 columns">
                    <label>ชื่องาน
                        <input id="name" type="text" placeholder="name" value="<?=$campaign->name?>">
                    </label>
                </div>
                <fieldset class="large-6 columns">
                    <legend>ประเภท social</legend>
                    <?php if (isset($campaign->social["facebook"])){ ?><label for="checkbox1">Facebook</label><?} ?> 
                    <?php if (isset($campaign->social["youtube"])){ ?><label for="checkbox2">Youtube</label><?} ?>
                    
                </fieldset>
                <div class="medium-6 columns">
                    <label>ค่าใช้จ่าย : <?=number_format($campaign->accept_budget)?>                        
                    </label>
                </div>
                <div class="medium-12 columns">
                    <label>รายละเอียด
                        <textarea id="description" placeholder="None" rows="10"><?=$campaign->description?></textarea>
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label>url ร้าน
                        <input id="url" type="text" placeholder="http://exp.com" value="<?=$campaign->url?>">
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label>วันที่เริ่ม
                        <input type="text" id="start_date" class="datepicker" value="<?=$ci->m_time->unix_to_datepicker($campaign->start_date)?>">
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label>วันที่สิ้นสุด
                        <input type="text" id="end_date" class="datepicker" value="<?=$ci->m_time->unix_to_datepicker($campaign->start_date)?>">
                    </label>
                </div>
                <div class="medium-5 columns">
                    <a href="javascript:update_camp('<?=$campaign->id?>');" class="button secondary">Update</a>
                </div>
            </div>

            <div class="row">
                <div class="medium-12 columns">
                    <label>Update งาน
                        <textarea id="progress" placeholder="None" rows="10"><?=$campaign->progress?></textarea>
                    </label>
                </div>
                <div class="medium-12 columns">
                    <label>ส่งไฟล์งาน
                        
                    </label>
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
                <div class="medium-5 columns">
                    <a href="javascript:update_camp_creator('<?=$campaign->id?>');" class="button secondary">Update</a>
                    <?
                    if ($campaign->file!="") {
                        ?>
                        <a href="<?echo upload_site_url('media/campaign/submit/'.$campaign->file);?>" class="button secondary">Download file</a>
                        <?
                    }
                    ?>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<div class="reveal" id="detail-modal" data-reveal data-animation-in="rotateIn animated" >
        <div class="camp-region">
        </div>
        <div class="row align-center">
            <a class="button primary hollow" id="invite-modal-ok" data-close href="javascript:;">ปิด</a>
        </div>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<script type="text/javascript">
  function c_show(div_class){
    $(".c-holder").fadeOut("fast",function(){
      setTimeout(function(){ $("."+div_class).fadeIn(); }, 500);
      
    });
    
  }
  function update_camp(camp_id) {

        $.ajax({
                method: "post",
                url: "<?php echo site_url("ajax/campaign/update_camp_detail"); ?>",
                data: {
                    'camp_id':camp_id,
                    'name':$("#name").val(),
                    'description':$("#description").val(),
                    'url':$("#url").val(),
                    'start_date':$("#start_date").val(),
                    'end_date':$("#end_date").val(),
                }
            })
            .done(function(data) {
                    $("#detail-modal .camp-region").html("บันทึกเรียบร้อยแล้ว");
                    $("#detail-modal").foundation('open');;
                    
            });

    }
    function update_camp_creator(camp_id) {

        $.ajax({
                method: "post",
                url: "<?php echo site_url("ajax/campaign/update_camp_detail_cre"); ?>",
                data: {
                    'camp_id':camp_id,
                    'progress':$("#progress").val(),
                    'file':$("#files").val(),
                }
            })
            .done(function(data) {
                    $("#detail-modal .camp-region").html("บันทึกเรียบร้อยแล้ว");
                    $("#detail-modal").foundation('open');
                    $("#files").val("");
                    
            });

    }
    $(function() {

        $( ".datepicker" ).datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: "dd/mm/yy"
          });
    });
</script>
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
