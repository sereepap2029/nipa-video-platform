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
#myCanvas {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    width: 100%;
    z-index: -1;
    }

    #video {
        margin: 20% 0 0 50%;
        display: none;
    }
    .tran,.callout{
        background: transparent;
    }
</style>
<canvas id="myCanvas" >
                                Your browser does not support the HTML5 canvas tag.
                                </canvas>
                                <video id="video" autoplay src="<?=site_url()?>images/video/reward_wallpaper.mp4" loop controls="false"></video>
<div class="row creator-list">
    <div class="large-12 columns">
        <div class="row align-center">
            <div class="small-2 columns">
                <div class="callout">
                    <div class="row align-center">
                        <div class="small-12 columns">
                            <a class="button primary" href="javascript:c_show('c-point')">คะแนนของคุณ</a>
                            <br>
                            <a class="button primary" href="javascript:c_show('c-reward')">ของรางวัลทั้งหมด</a>
                            <br>
                            <a class="button primary" href="javascript:c_show('c-activity')">กิจกรรม</a>
                            <br>
                            <a class="button primary" href="javascript:c_show('c-forum')">กระทู้</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="small-10 columns">
                <div class="tran">
                    <div class="row">
                        <div class="small-12 columns c-holder c-point">
                            <div class="row">
                                <div class="small-12 columns">
                                
                                <div class="row">
                                    <div class="small-12 columns">
                                    คุณมีคะแนนทั้งหมด <span class="label alert">12,000</span> คะแนน
                                    </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="small-12 columns c-holder c-reward">
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
                                    <div class="small-4 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                        <div class="row align-center">
                                            <div class="small-12 columns">
                                                <img src="<?=site_url()?>/images/Producer.jpg">
                                            </div>
                                            <div class="small-12 columns">
                                                <label>
                                                    รายละเอียด
                                                </label>
                                                <p>just description just description just descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust description</p>
                                            </div>
                                            <div class="row align-center">
                                                <div class="small-4 columns">
                                                    <a class="button success" href="javascript:;">แลก</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small-4 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                        <div class="row align-center">
                                            <div class="small-12 columns">
                                                <img src="<?=site_url()?>/images/Producer.jpg">
                                            </div>
                                            <div class="small-12 columns">
                                                <label>
                                                    รายละเอียด
                                                </label>
                                                <p>just description just description just descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust description</p>
                                            </div>
                                            <div class="row align-center">
                                                <div class="small-4 columns">
                                                    <a class="button success" href="javascript:;">แลก</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small-4 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                        <div class="row align-center">
                                            <div class="small-12 columns">
                                                <img src="<?=site_url()?>/images/Producer.jpg">
                                            </div>
                                            <div class="small-12 columns">
                                                <label>
                                                    รายละเอียด
                                                </label>
                                                <p>just description just description just descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust description</p>
                                            </div>
                                            <div class="row align-center">
                                                <div class="small-4 columns">
                                                    <a class="button success" href="javascript:;">แลก</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small-4 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                        <div class="row align-center">
                                            <div class="small-12 columns">
                                                <img src="<?=site_url()?>/images/Producer.jpg">
                                            </div>
                                            <div class="small-12 columns">
                                                <label>
                                                    รายละเอียด
                                                </label>
                                                <p>just description just description just descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust description</p>
                                            </div>
                                            <div class="row align-center">
                                                <div class="small-4 columns">
                                                    <a class="button success" href="javascript:;">แลก</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small-4 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                        <div class="row align-center">
                                            <div class="small-12 columns">
                                                <img src="<?=site_url()?>/images/Producer.jpg">
                                            </div>
                                            <div class="small-12 columns">
                                                <label>
                                                    รายละเอียด
                                                </label>
                                                <p>just description just description just descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust description</p>
                                            </div>
                                            <div class="row align-center">
                                                <div class="small-4 columns">
                                                    <a class="button success" href="javascript:;">แลก</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="small-4 masonry-item columns anim zoomIn" style="visibility:hidden;">
                                        <div class="row align-center">
                                            <div class="small-12 columns">
                                                <img src="<?=site_url()?>/images/Producer.jpg">
                                            </div>
                                            <div class="small-12 columns">
                                                <label>
                                                    รายละเอียด
                                                </label>
                                                <p>just description just description just descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust descriptionjust description</p>
                                            </div>
                                            <div class="row align-center">
                                                <div class="small-4 columns">
                                                    <a class="button success" href="javascript:;">แลก</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="small-12 columns c-holder c-activity">
                            <div class="row">
                                <div id="game-ele">
                                    
                                </div>
                                
                            </div>
                            <div class="row">
                                <label>คลิกที่รูป เพื่อน Spin</label>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded',function() {
    var canvas = document.getElementById("myCanvas");
    var context  = canvas.getContext("2d");
    var v = document.getElementById("video");
     var cw = Math.floor(canvas.clientWidth);
    var ch = Math.floor(canvas.clientHeight);
    canvas.width = cw;
    canvas.height = ch;

    v.addEventListener('play', function(){
        draw(this,context,cw,ch);
    },false);
},false);
function draw(v,c,w,h) {
    if(v.paused || v.ended) return false;
    c.drawImage(v,0,0,w,h);
    setTimeout(draw,20,v,c,w,h);
}
</script>

<script src="<?=site_url()?>/js/vendor/phaser.min.js"></script>
<script type="text/javascript">
    // the game itself
var game;
// the spinning wheel
var wheel; 
// can the wheel spin?
var canSpin;
// slices (prizes) placed in the wheel
var slices = 8;
// prize names, starting from 12 o'clock going clockwise
var slicePrizes = ["A KEY!!!", "50 STARS", "500 STARS", "BAD LUCK!!!", "200 STARS", "100 STARS", "150 STARS", "BAD LUCK!!!"];
// the prize you are about to win
var prize;
// text field where to show the prize
var prizeText;

window.onload = function() {    
     // creation of a 458x488 game
    game = new Phaser.Game(458, 488, Phaser.AUTO, "game-ele");
     // adding "PlayGame" state
     game.state.add("PlayGame",playGame);
     // launching "PlayGame" state
     game.state.start("PlayGame");
}

// PLAYGAME STATE
    
var playGame = function(game){};

playGame.prototype = {
     // function to be executed once the state preloads
     preload: function(){
          // preloading graphic assets
          game.load.image("wheel", "<?=site_url()?>/images/wheel/wheel.png");
        game.load.image("pin", "<?=site_url()?>/images/wheel/pin.png");     
     },
     // funtion to be executed when the state is created
    create: function(){
          // giving some color to background
        game.stage.backgroundColor = "#880044";
          // adding the wheel in the middle of the canvas
        wheel = game.add.sprite(game.width / 2, game.width / 2, "wheel");
          // setting wheel registration point in its center
          wheel.anchor.set(0.5);
          // adding the pin in the middle of the canvas
          var pin = game.add.sprite(game.width / 2, game.width / 2, "pin");
          // setting pin registration point in its center
          pin.anchor.set(0.5);
          // adding the text field
          prizeText = game.add.text(game.world.centerX, 480, "");
          // setting text field registration point in its center
          prizeText.anchor.set(0.5);
          // aligning the text to center
          prizeText.align = "center";
          // the game has just started = we can spin the wheel
          canSpin = true;
          // waiting for your input, then calling "spin" function
          game.input.onDown.add(this.spin, this);       
    },
     // function to spin the wheel
     spin(){
          // can we spin the wheel?
          if(canSpin){  
               // resetting text field
               prizeText.text = "";
               // the wheel will spin round from 2 to 4 times. This is just coreography
               var rounds = game.rnd.between(2, 4);
               // then will rotate by a random number from 0 to 360 degrees. This is the actual spin
               var degrees = game.rnd.between(0, 360);
               // before the wheel ends spinning, we already know the prize according to "degrees" rotation and the number of slices
               prize = slices - 1 - Math.floor(degrees / (360 / slices));
               // now the wheel cannot spin because it's already spinning
               canSpin = false;
               // animation tweeen for the spin: duration 3s, will rotate by (360 * rounds + degrees) degrees
               // the quadratic easing will simulate friction
               var spinTween = game.add.tween(wheel).to({
                    angle: 360 * rounds + degrees
               }, 3000, Phaser.Easing.Quadratic.Out, true);
               // once the tween is completed, call winPrize function
               spinTween.onComplete.add(this.winPrize, this);
          }
     },
     // function to assign the prize
     winPrize(){
          // now we can spin the wheel again
          canSpin = true;
          // writing the prize you just won
          prizeText.text = slicePrizes[prize];
     }
}
</script>
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
                c_show('c-point');
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
