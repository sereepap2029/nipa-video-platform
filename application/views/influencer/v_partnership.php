<?
$ci =&get_instance();
?>
<style type="text/css">
.c-holder {
    visibility: hidden;
}
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
            <div class="small-2 columns">
                <div class="callout">
                    <div class="row align-center">
                        <div class="small-12 columns">
                            <a class="button primary" href="javascript:c_show('c-campaign')">สร้าง Campaign</a>
                            <br>
                            <a class="button primary" href="javascript:c_show('c-interest')">ได้รับคำเชิญ</a>
                            <br>
                            <a class="button primary" href="javascript:c_show('c-mycamp')">แคมเปญของฉัน</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="small-10 columns">
                <div class="callout">
                    <div class="row">
                        <div class="small-12 columns c-holder c-campaign" >
                            <div class="row">
                                <h5>Create Campaign</h5>
                                <form method="post" action="<?=site_url('influencer/campaign_create')?>">
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
                                                    <legend>ความเป็นส่วนตัว</legend>
                                                    <input type="radio" name="privacy" value="private" id="pokemonRed" required>
                                                    <label for="pokemonRed">ส่วนตัว</label>
                                                    <input type="radio" name="privacy" value="public" id="pokemonBlue" checked>
                                                    <label for="pokemonBlue">สาธารณะ</label>
                                                </fieldset>
                                                <div class="medium-12 columns">
                                                    <label>ช่วงบัดเจต
                                                        <input name="budget_start" type="text" placeholder="budget-start">-
                                                        <input name="budget_end" type="text" placeholder="budget-end">
                                                    </label>
                                                </div>
                                                <div class="medium-12 columns">
                                                    <label>แนะนำตัวเอง
                                                        <textarea name="description" placeholder="None"></textarea>
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
                                                <div class="medium-12 columns">
                                                    <a class="button success" data-open="invite-modal" href="javascript:show_partner();">เชิญ creator</a>
                                                    <div class="row" id="partner_invite">
                                                        
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
                                                <img id="img_tmp" src="" alt="">
                                                <input id="files" type="hidden" name="filename" value="">
                                            </div>
                                            <div class="medium-5 columns">
                                                <input type='submit' class="button" value="Create">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="small-12 columns c-holder c-interest">
                            <div class="row">
                                <div class="small-4 columns">
                                    <select data-placeholder="Categories" class="chosen-select" tabindex="2">
                                        <option value=""></option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Aland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                    </select>
                                </div>
                                <div class="small-4 columns">
                                    <select data-placeholder="Brand" class="chosen-select" tabindex="2">
                                        <option value=""></option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Aland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                                        <option value="Viet Nam">Viet Nam</option>
                                        <option value="Virgin Islands, British">Virgin Islands, British</option>
                                        <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                        <option value="Wallis and Futuna">Wallis and Futuna</option>
                                        <option value="Western Sahara">Western Sahara</option>
                                        <option value="Yemen">Yemen</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-12 masonry">
                                    <?
                                          foreach ($campaign_list as $key => $value) {
                                            ?>
                                        <div class="small-4 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                            <div class="row align-center">
                                                <div class="small-12 columns">
                                                    <label>ชื่อผู้ส่ง <?=$value->create_by->name?></label>&nbsp;
                                                    <label>ส่งเมื่อ <?=$ci->m_time->unix_to_datepicker($value->start_date)?></label>
                                                </div>
                                                <div class="small-12 columns">
                                                    <img src="<?=upload_site_url('media/campaign_creator/profile/' . $value->picture);?>">
                                                </div>
                                                <div class="small-12 columns">
                                                    <label>
                                                        <?=$value->name?>                                                                <br/>
                                                                <?=$value->budget_start?>-
                                                                    <?=$value->budget_end?>
                                                                        <br/>
                                                                        <?=$ci->m_time->unix_to_datepicker($value->start_date)?>-
                                                                            <?=$ci->m_time->unix_to_datepicker($value->end_date)?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row align-center">
                                                <div class="small-6 columns">
                                                    <?
                                                    $but_text="ร่วมงาน";
                                                    if ($value->response=="accept") {
                                                        $but_text="เข้าร่วมแล้ว";
                                                    }
                                                    ?>
                                                    <a class="button primary" data-open="propos-modal" id="acpbut-<?=$value->id?>" href="javascript:send_campaign_response('<?=$value->id?>','accept','acpbut-<?=$value->id?>');"><?=$but_text?></a>
                                                </div>
                                                <div class="small-6 columns">
                                                    <a class="button primary" data-open="propos-modal" href="javascript:send_campaign_response('<?=$value->id?>','reject');">ปฏิเสธ</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?
                                          }
                                          ?>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 columns c-holder c-mycamp">
                            <div class="row">
                                <div class="small-4 columns">
                                    <select data-placeholder="Categories" class="chosen-select" tabindex="2">
                                        <option value=""></option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Aland Islands">Aland Islands</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="American Samoa">American Samoa</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Anguilla">Anguilla</option>
                                    </select>
                                </div>
                                <div class="small-4 columns">
                                    <select data-placeholder="Brand" class="chosen-select" tabindex="2">
                                        <option value=""></option>
                                        <option value="United States">United States</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-12 masonry">
                                    <?
                                          foreach ($my_campaign as $key => $value) {
                                            ?>
                                        <div class="small-4 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                            <div class="row align-center">
                                                <div class="small-12 columns">
                                                    <label>ชื่อผู้ส่ง <?=$value->create_by->name?></label>&nbsp;
                                                    <label>ส่งเมื่อ <?=$ci->m_time->unix_to_datepicker($value->start_date)?></label>
                                                </div>
                                                <div class="small-12 columns">
                                                    <img src="<?=upload_site_url('media/campaign_creator/profile/' . $value->picture);?>">
                                                </div>
                                                <div class="small-12 columns">
                                                    <label>
                                                        <?=$value->name?>                                                                <br/>
                                                                <?=$value->budget_start?>-
                                                                    <?=$value->budget_end?>
                                                                        <br/>
                                                                        <?=$ci->m_time->unix_to_datepicker($value->start_date)?>-
                                                                            <?=$ci->m_time->unix_to_datepicker($value->end_date)?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row align-center">
                                                <div class="small-6 columns">
                                                    <a class="button primary" data-open="propos-modal" href="<?=site_url("influencer/campaign_edit/".$value->id)?>">แก้ใข</a>
                                                </div>
                                                <div class="small-6 columns">
                                                    <a class="button primary" data-open="propos-modal" href="<?=site_url("influencer/campaign_delete/".$value->id)?>">ลบ</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?
                                          }
                                          ?>
                                </div>
                            </div>
                        </div>
                    </div>
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
$( document ).on( "click", ".delete_creator", function() {
      $( this ).parent().fadeOut("fast",function() {
        $( this ).remove();
        });
    });
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

    <script type="text/javascript">
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
    function send_campaign_response(camp_id,resp,ele_id) {
        $.ajax({
                method: "post",
                url: "<?php echo site_url("influencer/send_camp_resp"); ?>",
                data: "camp_id=" + camp_id+"&creator_id=<?=$profile->id?>&resp="+resp
            })
            .done(function(data) {
                    $("#invite-modal .camp-region").html(data["data"]);
                    $("#"+ele_id).html("เข้าร่วมแล้ว")
                    $("#invite-modal").foundation('open');
            });

    }

    window.chartColors = {
        red: 'rgb(255, 99, 132)',
        orange: 'rgb(255, 159, 64)',
        yellow: 'rgb(255, 205, 86)',
        green: 'rgb(75, 192, 192)',
        blue: 'rgb(54, 162, 235)',
        purple: 'rgb(153, 102, 255)',
        grey: 'rgb(231,233,237)'
    };
    window.randomScalingFactor = function() {
        return (Math.random() > 0.5 ? 1.0 : 0.1) * Math.round(Math.random() * 100);
    }

    function animate_camp() {
        //$(".anim").css("visibility", "visible");
        $(".anim").addClass("animated");
    }
    $(function() {
        $( ".datepicker" ).datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: "dd/mm/yy"
          });

        var $grid = $('.masonry').masonry({
            // options
            itemSelector: '.masonry-item',
            percentPosition: true,
            transitionDuration: '0.8s',
            isInitLayout: false,
        });
        //animate_camp()
        $grid.on('layoutComplete', animate_camp);
        $grid.masonry();
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
        setTimeout(function() {
                c_show('c-mycamp');
            }, 50);

    });

    function c_show(div_class) {
        $(".c-holder").fadeOut("fast", function() {
            setTimeout(function() {
                $(".anim").css("visibility", "visible");
                $("." + div_class).fadeIn();
                $("." + div_class).css("visibility", "visible");
            }, 500);

        });

    }
    
    </script>
