<?
$ci =&get_instance();
?>
    <div class="row creator-list">
        <div class="large-3 columns">
            <div class="callout">
                <div class="small-12 columns creator-items">
                    <?
                        if ($profile->profile_picture=="") {
                            ?>
                        <img class="img-creator" src="<?=site_url()?>/images/Producer.jpg" alt="Producer">
                        <?
                        }else{
                            ?>
                            <img class="img-creator" src="<?=site_url("media/profile_picture/".$profile->profile_picture)?>" alt="Producer">
                            <?
                        }
                        if (isset($brand_data)) {
                            ?>
                            <a class="button primary hollow" data-open="invite-modal" href="javascript:;">invite</a>
                            <?
                        }
                        ?>
                                <label class="name">
                                    <?=$profile->name?>
                                </label>
                                <label class="desc">
                                    <?
                                echo number_format($profile->sucscribe)."/".number_format($profile->view);
                        ?>
                                </label>
                                <div class="small-12 columns stars">
                                    <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                                    <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                                    <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                                    <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                                    <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                                </div>
                                <div class="small-12 columns">
                                other description blah blah
                                </div>
                </div>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="callout">
                <div class="row align-center">
                    <div class="small-10 columns">
                        <a class="button primary" href="#">youtube</a>
                        <a class="button primary" href="#">Facebook</a>
                        <a class="button primary" href="#">Review</a>
                    </div>
                </div>
                <div class="row align-center">
                    <div class="callout">
                        <div class="small-12 columns">
                         something
                         <a class="button primary" href="#">youtube</a>
                        <a class="button primary" href="#">Facebook</a>
                        <a class="button primary" href="#">Review</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?
    if (isset($brand_data)) {
        ?>
        <div class="reveal" id="invite-modal" data-reveal>
          <h1>เลือก Campaign ที่จะเชิญ</h1>
          <?
              foreach ($campaign_list as $key => $value) {
                ?>
                <div class="row align-center">
                    <div class="small-2 columns">
                      <a href="<?=site_url("brand/campaign_detail/".$value->id)?>"><img src="<?=upload_site_url('media/campaign/profile/'.$value->picture);?>"></a>
                    </div>
                    <div class="small-10 columns">
                      <label><?=$value->name?>/
                      ประเภท :
                      <?
                      foreach ($value->social as $key2 => $value2) {
                        echo $value2->social.",";
                      }
                      ?>
                      /
                      <?=$value->budget_start?>-<?=$value->budget_end?>/
                      <?=$ci->m_time->unix_to_datepicker($value->start_date)?>-<?=$ci->m_time->unix_to_datepicker($value->end_date)?></label>
                      <input id="checkbox2" type="checkbox" name="select[]" value="<?=$value->id?>" <?if(isset($invited_campaign[$value->id])){echo "checked";}?>><label for="checkbox2">เลือก</label>
                    </div>
                </div>
                <?
              }
              ?>
          <div class="row align-center">
          <a class="button primary hollow" id="invite-modal-ok" href="javascript:add_to_campaign();">OK</a>
          </div>
          <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <script type="text/javascript">
            function add_to_campaign() {
              $("#invite-modal-ok").html("saving.....!!");
              var selected_camp=$("input[name='select[]']").serialize()
              $.ajax({
                  method: "POST",
                  url: "<?php echo site_url("brand/invite_influencer_to_camp/"); ?>",
                  data: "creator_id=<?=$profile->id?>&"+selected_camp
              })
              .done(function(data) {
                if (data['flag']=="OK") {
                  $("#invite-modal-ok").html("OK");
                  $('#invite-modal').foundation('close');
                }else{
                  alert(data['flag']);
                  $("#close_but").html("OK");
                }
              });
                              
            }
        </script>
        <?
    }
    ?>