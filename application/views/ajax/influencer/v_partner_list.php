<?
$ci =&get_instance();
?>
    <div class="row">
        <div class="row align-center">
                <?
                foreach ($partner_list as $key => $value) {
                    ?>
                    <div class="small-3 columns creator-items">
                        <a href="<?
                            if ($value->creator_type=="influencer") {
                                echo site_url('influencer/profile/'.$value->id);
                            }else{
                                echo site_url('producer/profile/'.$value->id);
                            }
                            
                        ?>" target="_blank">
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
                            
                        ?>" target="_blank"><?=$value->name?></a></label>
                        <label class="desc"><?
                            if ($value->creator_type=="influencer") {
                                echo number_format($value->sucscribe)."/".number_format($value->view);
                            }else{
                                echo $value->career;
                            }
                            
                        ?></label>
                        <a class="button primary" data-close href="javascript:add_partner('<?=$value->id?>');">ADD</a>
                    </div>
                    <?
                }
                ?>                
            </div>
    </div>
