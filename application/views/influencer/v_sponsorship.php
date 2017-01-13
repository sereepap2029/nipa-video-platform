<?
$ci =&get_instance();
?>
    <style type="text/css">
    .c-holder {
        display: none;
    }
    </style>
    <div class="row creator-list">
        <div class="large-12 columns">
            <div class="row align-center">
                <div class="small-2 columns">
                    <div class="callout">
                        <div class="row align-center">
                            <div class="small-12 columns">
                                <a class="button primary" href="javascript:c_show('c-campaign')">Campaign</a>
                                <br>
                                <a class="button primary" href="javascript:c_show('c-interest')">Interested</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="small-10 columns">
                    <div class="callout">
                        <div class="row">
                            <div class="small-12 columns c-holder c-campaign" style="display: block;">
                                <div class="row">
                                    <div class="small-2 columns">
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
                                    <div class="small-3 columns">
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
                                            <option value="Angola">Angola</option>
                                            <option value="Anguilla">Anguilla</option>
                                            <option value="Antarctica">Antarctica</option>
                                            <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                            <option value="Argentina">Argentina</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                                            <option value="Wallis and Futuna">Wallis and Futuna</option>
                                            <option value="Western Sahara">Western Sahara</option>
                                            <option value="Yemen">Yemen</option>
                                            <option value="Zambia">Zambia</option>
                                            <option value="Zimbabwe">Zimbabwe</option>
                                        </select>
                                    </div>
                                    <div class="small-3 columns">
                                        <select data-placeholder="Price" class="chosen-select" tabindex="2">
                                            <option value=""></option>
                                            <option value="Wallis and Futuna">0 - 5,000</option>
                                            <option value="Western Sahara">5,001 - 10,000</option>
                                            <option value="Yemen">10,001 - 50,000</option>
                                            <option value="Zambia">50,001 - 100,000</option>
                                            <option value="Zimbabwe">100,001 - 500,000</option>
                                            <option value="Zimbabwe">500,000 ขึ้นไป</option>
                                        </select>
                                    </div>
                                    <div class="small-2 columns">
                                        <select data-placeholder="Interested" class="chosen-select" tabindex="2">
                                            <option value=""></option>
                                            <option value="Wallis and Futuna">แบรนที่สนใจคุณ</option>
                                            <option value="Western Sahara">แคมเปญที่คุณสนใจ</option>
                                            <option value="Yemen">เพื่อนร่วมงานที่สนใจคุณ</option>
                                            <option value="Zambia">เพื่อนร่วมงานที่คุณสนใจ</option>
                                        </select>
                                    </div>
                                    <div class="small-2 columns">
                                        <select data-placeholder="Channal" class="chosen-select" tabindex="2">
                                            <option value=""></option>
                                            <option value="Wallis and Futuna">Facebook</option>
                                            <option value="Western Sahara">Youtube</option>
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
                                                        <h3>1 Day 03 Hour</h3>
                                                    </div>
                                                    <div class="small-12 columns">
                                                      <a href="<?=site_url("brand/campaign_detail/" . $value->id)?>"><img src="<?=upload_site_url('media/campaign/profile/' . $value->picture);?>"></a>
                                                    </div>
                                                    <div class="small-12 columns">
                                                      <label><?=$value->name?><br>
                                                      ประเภท :
                                                      <?
                                                      foreach ($value->social as $key2 => $value2) {
                                                        echo $value2->social.",";
                                                      }
                                                      ?>
                                                      <br>
                                                      <?=$value->budget_start?>-<?=$value->budget_end?><br>
                                                      <?=$ci->m_time->unix_to_datepicker($value->start_date)?>-<?=$ci->m_time->unix_to_datepicker($value->end_date)?></label>
                                                    </div>
                                                </div>
                                                <div class="row align-center">
                                                    <div class="small-3 columns">
                                                        <a href="javascript:;"><img src="<?=site_url()?>/images/heart.png"></a>
                                                    </div>
                                                    <div class="small-6 columns">
                                                        <a href="javascript:;">detail</a>
                                                    </div>
                                                    <div class="small-12 columns">
                                                    <a class="button primary" href="javascript:;">SEND PROPOSAL</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <?
                                          }
                                          ?>
                                    </div>
                                </div>
                            </div>
                            <div class="small-12 columns c-holder c-interest">
                                <div class="row">
                                    <div class="small-2 columns">
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
                                    <div class="small-3 columns">
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
                                    <div class="small-3 columns">
                                        <select data-placeholder="Price" class="chosen-select" tabindex="2">
                                            <option value=""></option>
                                            <option value="Wallis and Futuna">0 - 5,000</option>
                                            <option value="Western Sahara">5,001 - 10,000</option>
                                            <option value="Yemen">10,001 - 50,000</option>
                                            <option value="Zambia">50,001 - 100,000</option>
                                            <option value="Zimbabwe">100,001 - 500,000</option>
                                            <option value="Zimbabwe">500,000 ขึ้นไป</option>
                                        </select>
                                    </div>
                                    <div class="small-2 columns">
                                        <select data-placeholder="Interested" class="chosen-select" tabindex="2">
                                            <option value=""></option>
                                            <option value="Wallis and Futuna">แบรนที่สนใจคุณ</option>
                                            <option value="Western Sahara">แคมเปญที่คุณสนใจ</option>
                                            <option value="Yemen">เพื่อนร่วมงานที่สนใจคุณ</option>
                                            <option value="Zambia">เพื่อนร่วมงานที่คุณสนใจ</option>
                                        </select>
                                    </div>
                                    <div class="small-2 columns">
                                        <select data-placeholder="Channal" class="chosen-select" tabindex="2">
                                            <option value=""></option>
                                            <option value="Wallis and Futuna">Facebook</option>
                                            <option value="Western Sahara">Youtube</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">

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
    function animate_camp(){
        $(".anim").css("visibility","visible");
        $(".anim").addClass("animated");
    }
    $(function() {
        

        var $grid=$('.masonry').masonry({
          // options
          itemSelector: '.masonry-item',
          percentPosition: true,
          transitionDuration: '0.8s',
          isInitLayout: false,
        });
        //animate_camp()
        $grid.on( 'layoutComplete', animate_camp );
        $grid.masonry();
        var chosen_config = {
            '.chosen-select': {width: "100%"},
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

    function c_show(div_class) {
        $(".c-holder").fadeOut("fast", function() {
            setTimeout(function() {
                $("." + div_class).fadeIn();
            }, 500);

        });

    }
    </script>
