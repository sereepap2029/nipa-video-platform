<?
$ci =&get_instance();
?>
<style type="text/css">
.delete_creator{
    position: absolute;
    right: -1px;
    top: -1px;
}
.partner-items{
    position: relative;
    height: 50px;
}
</style>
<div class="row creator-list">
    <div class="large-12 columns">
        <div class="row align-center">
            <div class="small-12 columns">
                <div class="callout">
                    <div class="row">
                        <div class="small-12 columns c-holder c-campaign">
                            <div class="row">
                                <h5>Create Campaign</h5>
                                <form method="post" action="<?=site_url('influencer/campaign_edit/'.$campaign_detail->id)?>">
                                    <h5 style="color:red"><?if($this->session->userdata('create_error')){echo $this->session->userdata('create_error');$this->session->unset_userdata('create_error');}?></h5>
                                    <div class="row">
                                        <div class="large-9 columns">
                                            <div class="row">
                                                <div class="medium-12 columns">
                                                    <label>ชื่องาน
                                                        <input name="name" type="text" placeholder="name" value="<?=$campaign_detail->name?>">
                                                    </label>
                                                </div>
                                                <fieldset class="large-6 columns">
                                                    <legend>ความเป็นส่วนตัว</legend>
                                                    <input type="radio" name="privacy" value="private" id="pokemonRed" <? if ($campaign_detail->privacy=="private") { echo "checked"; } ?>>
                                                    <label for="pokemonRed">ส่วนตัว</label>
                                                    <input type="radio" name="privacy" value="public" id="pokemonBlue" <? if ($campaign_detail->privacy=="public") { echo "checked"; } ?>>
                                                    <label for="pokemonBlue">สาธารณะ</label>
                                                </fieldset>
                                                <div class="medium-12 columns">
                                                    <label>ช่วงบัดเจต
                                                        <input name="budget_start" type="text" placeholder="budget-start" value="<?=$campaign_detail->budget_start?>">-
                                                        <input name="budget_end" type="text" placeholder="budget-end" value="<?=$campaign_detail->budget_end?>">
                                                    </label>
                                                </div>
                                                <div class="medium-12 columns">
                                                    <label>แนะนำตัวเอง
                                                        <textarea name="description" placeholder="None"><?=$campaign_detail->description?></textarea>
                                                    </label>
                                                </div>
                                                <div class="medium-12 columns">
                                                    <label>วันที่เริ่ม
                                                        <input type="text" name="start_date" class="datepicker" value="<?=$ci->m_time->unix_to_datepicker($campaign_detail->start_date)?>">
                                                    </label>
                                                </div>
                                                <div class="medium-12 columns">
                                                    <label>วันที่สิ้นสุด
                                                        <input type="text" name="end_date" class="datepicker" value="<?=$ci->m_time->unix_to_datepicker($campaign_detail->end_date)?>">
                                                    </label>
                                                </div>
                                                <div class="medium-12 columns">
                                                    <a class="button success" data-open="invite-modal" href="javascript:show_partner();">เชิญ creator</a>
                                                    <div class="row" id="partner_invite">
                                                        <?
                                                        foreach ($campaign_has_creator as $key => $value) {
                                                            ?>
                                                            <div class="small-3 columns partner-items">
                                                                <label class="name"><?=$value->name?></label>
                                                                <input type="hidden" name="partner[]" value="<?=$value->id?>">
                                                                <a class="button danger delete_creator" href="javascript:;">X</a>
                                                            </div>
                                                            <?
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
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
                                                <img id="img_tmp" src="<?=upload_site_url('media/campaign_creator/profile/' . $campaign_detail->picture);?>" alt="">
                                                <input id="files" type="hidden" name="filename" value="no_file">
                                            </div>
                                            <div class="medium-5 columns">
                                                <input type='submit' class="button" value="Save">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="reveal" id="invite-modal" data-reveal data-animation-in="rotateIn animated">
    <div class="camp-region">
    </div>
    <div class="row align-center">
        <a class="button primary hollow" id="invite-modal-ok" data-close href="javascript:;">OK</a>
    </div>
    <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
    </button>
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


    <script type="text/javascript">
    $( document ).on( "click", ".delete_creator", function() {
      $( this ).parent().fadeOut("fast",function() {
        $( this ).remove();
        });
    });
    function show_partner() {
        $.ajax({
                method: "get",
                url: "<?php echo site_url("influencer/show_partner"); ?>",
                data: "camp_id="
            })
            .done(function(data) {
                    $("#invite-modal .camp-region").html(data);
            });

    }
    function add_partner(partner_id) {
        $.ajax({
                method: "get",
                url: "<?php echo site_url("influencer/add_partner"); ?>",
                data: "partner_id=" + partner_id
            })
            .done(function(data) {
                    $("#partner_invite").append(data);
            });
    }
    $(function() {
        $( ".datepicker" ).datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: "dd/mm/yy"
          });

        
        var chosen_config = {
            '.chosen-select': {
                width: "100%"
            },
            '.chosen-select-deselect': {
                allow_single_deselect: true
            },
            '.chosen-select-no-single': {
                disable_search_threshold: 10
            },
            '.chosen-select-no-results': {
                no_results_text: 'Oops, nothing found!'
            },
            '.chosen-select-width': {
                width: "95%"
            }
        }
        for (var selector in chosen_config) {
            $(selector).chosen(chosen_config[selector]);
        }

    });
    
    </script>
