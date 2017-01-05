<?
$ci =&get_instance();
?>
<div class="row creator-list">
    <div class="large-9 columns">
        <div class="callout">
            <h3>This is Creator List</h3>
            <div class="row">
                <ul class="dropdown menu" data-dropdown-menu>
                  <li>
                    <a class="hollow button" href="#"><?=$text_arr[$show_type]?></a>
                    <ul class="menu">
                      <li><a href="<?=site_url("brand/creator_list/all")?>">ALL</a></li>
                      <li><a href="<?=site_url("brand/creator_list/producer")?>">Producer</a></li>
                      <li><a href="<?=site_url("brand/creator_list/influencer")?>">Influencer</a></li>
                    </ul>
                  </li>
                </ul>
            </div>
            <div class="row align-center">
                <?
                foreach ($list as $key => $value) {
                    ?>
                    <div class="small-3 columns creator-items">
                        <a href="<?
                            if ($value->creator_type=="influencer") {
                                echo site_url('influencer/profile/'.$value->id);
                            }else{
                                echo site_url('producer/profile/'.$value->id);
                            }
                            
                        ?>">
                        <?
                        if ($value->profile_picture=="") {
                            ?>
                            <img class="img-creator" src="<?=upload_site_url()?>/images/Producer.jpg" alt="Producer"></a>
                            <?
                        }else{
                            ?>
                            <img class="img-creator" src="<?=upload_site_url("media/profile_picture/".$value->profile_picture)?>" alt="Producer"></a>
                            <?
                        }
                        ?>
                        <label class="name"><a href="<?
                            if ($value->creator_type=="influencer") {
                                echo site_url('influencer/profile/'.$value->id);
                            }else{
                                echo site_url('producer/profile/'.$value->id);
                            }
                            
                        ?>"><?=$value->name?></a></label>
                        <label class="desc"><?
                            if ($value->creator_type=="influencer") {
                                echo number_format($value->sucscribe)."/".number_format($value->view);
                            }else{
                                echo $value->career;
                            }
                            
                        ?></label>
                        <div class="small-12 columns stars">
                            <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                            <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                            <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                            <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
                            <img class="img-stars" src="<?=site_url()?>/images/star_rate.png">
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
