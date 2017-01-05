<?
$ci =&get_instance();
?>
<style type="text/css">

</style>
<div class="row creator-list">
    <div class="large-9 columns">
        <div class="callout">
            <h3><?=$campaign->name?></h3>
            <div class="row">
                <ul class="align-left menu">
                  <li>
                    <a class="hollow button" href="javascript:c_show('c-submit')">ยื่นมา</a>
                  </li>
                  <li>
                    <a class="hollow button" href="javascript:c_show('c-invited')">เราเชิญ</a>
                  </li>
                  <li>
                    <a class="hollow button" href="javascript:c_show('c-holder')">All</a>
                  </li>
                </ul>
            </div>
            <div class="row c-invited c-holder">
            <h3>เราเชิญ</h3>
              <?
              foreach ($creators_invited as $key => $value) {
                ?>
                <div class="row align-center">
                
                    <div class="small-2 columns">
                      <a href="<?
                            if ($value->creator_type=="influencer") {
                                echo site_url('influencer/profile/'.$value->id);
                            }else{
                                echo site_url('producer/profile/'.$value->id);
                            }
                            
                        ?>"><?
                        if ($value->profile_picture=="") {
                            ?>
                            <img class="img-creator" src="<?=site_url()?>/images/Producer.jpg" alt="Producer"></a>
                            <?
                        }else{
                            ?>
                            <img class="img-creator" src="<?=upload_site_url("media/profile_picture/".$value->profile_picture)?>" alt="Producer"></a>
                            <?
                        }
                        ?></a>
                    </div>
                    <div class="small-10 columns">
                      <label><?=$value->name?>/<?
                            if ($value->creator_type=="influencer") {
                                echo number_format($value->sucscribe)."/".number_format($value->view);
                            }else{
                                echo $value->career;
                            }
                            
                        ?></label>
                    </div>
                </div>
                <?
              }
              ?>
                          
            </div>
            <div class="row c-submit c-holder">
            <h3>ยื่นมา</h3>
              <?
              foreach ($creators_submit as $key => $value) {
                ?>
                <div class="row align-center">
                
                    <div class="small-2 columns">
                      <a href="<?
                            if ($value->creator_type=="influencer") {
                                echo site_url('influencer/profile/'.$value->id);
                            }else{
                                echo site_url('producer/profile/'.$value->id);
                            }
                            
                        ?>"><?
                        if ($value->profile_picture=="") {
                            ?>
                            <img class="img-creator" src="<?=site_url()?>/images/Producer.jpg" alt="Producer"></a>
                            <?
                        }else{
                            ?>
                            <img class="img-creator" src="<?=upload_site_url("media/profile_picture/".$value->profile_picture)?>" alt="Producer"></a>
                            <?
                        }
                        ?></a>
                    </div>
                    <div class="small-10 columns">
                      <label><?=$value->name?>/<?
                            if ($value->creator_type=="influencer") {
                                echo number_format($value->sucscribe)."/".number_format($value->view);
                            }else{
                                echo $value->career;
                            }
                            
                        ?></label>
                    </div>
                </div>
                <?
              }
              ?>
                          
            </div>
        </div>
    </div>
    <div class="large-3 columns">
        <div class="callout">
            <h3>Filter</h3>
            <div class="row align-center">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
  function c_show(div_class){
    $(".c-holder").fadeOut("fast",function(){
      setTimeout(function(){ $("."+div_class).fadeIn(); }, 500);
      
    });
    
  }
</script>
