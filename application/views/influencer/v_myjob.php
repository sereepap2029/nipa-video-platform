<?
$ci =&get_instance();
$file_arr = array(
        '1' => "1.mp4", 
        '2' => "2.mp4", 
        '3' => "3.mp4", 
        '4' => "4.mp4", 
        '5' => "5.mp4", 
        '6' => "6.mp4", 
        '7' => "7.mp4", 
        '8' => "8.mp4", 
        '9' => "9.mp4", 
        '10' => "10.mp4", 
        '11' => "11.mp4", 
        '12' => "12.mp4", 
        );
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
.masonry-item{
    margin-top: 50px;
}
</style>
<div class="row creator-list">
    <div class="large-12 columns">
        <div class="row align-center">
            <div class="small-2 columns">
                <div class="callout">
                    <div class="row align-center">
                        <div class="small-12 columns">
                            <a class="button primary" href="javascript:c_show('c-progress')">Work in progress</a>
                            <br>
                            <a class="button primary" href="javascript:c_show('c-content')">My Content</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="small-10 columns">
                <div class="callout">
                    <div class="row">
                        <div class="small-12 columns c-holder c-progress" >
                            <div class="row">
                                    <div class="small-12 columns">
                                        งานทั้งหมด <span class="label alert"><?=count($my_campaign)?></span> งาน
                                    </div>
                            </div>
                            <div class="row">
                                <div class="small-6 columns">
                                    รายชื่องาน
                                </div>
                                <div class="small-6 columns">
                                    สถานะ
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-12 columns">
                                    <div class="callout">
                                        <?
                                        foreach ($my_campaign as $key => $value) {
                                            ?>
                                            <div class="row">
                                                <div class="small-6 columns">
                                                    <?=$value->name?>
                                                </div>
                                                <div class="small-6 columns">
                                                    <?=$value->status?>
                                                </div>
                                            </div>
                                            <?
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-6 columns">
                                    กำลังดำเนินการ จำนวน <?=count($my_campaign)?> งาน
                                    <?
                                        foreach ($my_campaign as $key => $value) {
                                            ?>
                                            <div class="row">
                                                <div class="small-12 columns">
                                                    <div class="callout">
                                                    <?=$value->name?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                                        }
                                        ?>
                                </div>
                                <div class="small-6 columns">
                                    กำลังแก้ใข จำนวน <?=count($my_campaign)?> งาน
                                    <?
                                        foreach ($my_campaign as $key => $value) {
                                            ?>
                                            <div class="row">
                                                <div class="small-12 columns">
                                                    <div class="callout">
                                                    <?=$value->name?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                                        }
                                        ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="small-6 columns">
                                    งานที่เสร็จ จำนวน <?=count($my_campaign)?> งาน
                                    <?
                                        foreach ($my_campaign as $key => $value) {
                                            ?>
                                            <div class="row">
                                                <div class="small-12 columns">
                                                    <div class="callout">
                                                    <?=$value->name?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                                        }
                                        ?>
                                </div>
                                <div class="small-6 columns">
                                    รออนุมัติ จำนวน <?=count($my_campaign)?> งาน
                                    <?
                                        foreach ($my_campaign as $key => $value) {
                                            ?>
                                            <div class="row">
                                                <div class="small-12 columns">
                                                    <div class="callout">
                                                    <?=$value->name?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                                        }
                                        ?>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 columns c-holder c-content">
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
                                        <div class="small-6 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                            <div class="row align-center">
                                                <div class="small-12 columns">
                                                    <video width="100%"  controls>
                                                      <source src="<?='http://atom-anime.ddns.net/files/Rokka no Yuusha/'.$file_arr[1]?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                                <div class="small-12 columns">
                                                    
                                                    <label>
                                                        Rokka no Yuusha 1
                                                    </label>
                                                    <p>just description just description just descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust description</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="small-6 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                            <div class="row align-center">
                                                <div class="small-12 columns">
                                                    <video width="100%"  controls>
                                                      <source src="<?='http://atom-anime.ddns.net/files/Rokka no Yuusha/'.$file_arr[2]?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                                <div class="small-12 columns">
                                                    
                                                    <label>
                                                        Rokka no Yuusha 1
                                                    </label>
                                                    <p>just description just description just descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust description</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="small-6 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                            <div class="row align-center">
                                                <div class="small-12 columns">
                                                    <video width="100%"  controls>
                                                      <source src="<?='http://atom-anime.ddns.net/files/Rokka no Yuusha/'.$file_arr[3]?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                                <div class="small-12 columns">
                                                    
                                                    <label>
                                                        Rokka no Yuusha 1
                                                    </label>
                                                    <p>just description just description just descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust description</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="small-6 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                            <div class="row align-center">
                                                <div class="small-12 columns">
                                                    <video width="100%"  controls>
                                                      <source src="<?='http://atom-anime.ddns.net/files/Rokka no Yuusha/'.$file_arr[4]?>" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                    </video>
                                                </div>
                                                <div class="small-12 columns">
                                                    
                                                    <label>
                                                        Rokka no Yuusha 1
                                                    </label>
                                                    <p>just description just description just descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust description</p>
                                                </div>
                                            </div>
                                        </div>
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
                c_show('c-progress');
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
