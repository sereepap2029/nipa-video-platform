<?
$ci =&get_instance();
?>
    <div class="row">
        <div class="small-6 columns">
            <div class="row align-center">
                <div class="small-12 columns">
                    <h3>1 Day 03 Hour</h3>
                </div>
                <div class="small-12 columns">
                    <img src="<?=upload_site_url('media/campaign/profile/'.$campaign->picture);?>">
                </div>
                <div class="small-12 columns">
                    <label>
                        <?=$campaign->name?>
                            <br/> ประเภท :
                            <?
                            foreach ($campaign->social as $key2 => $value2) {
                                echo $value2->social.",";
                            }
                            ?>
                            <br/>
                            <?=$campaign->budget_start?>-
                            <?=$campaign->budget_end?>
                            <br/>
                            <?=$ci->m_time->unix_to_datepicker($campaign->start_date)?>-
                            <?=$ci->m_time->unix_to_datepicker($campaign->end_date)?>
                    </label>
                </div>
            </div>
            
        </div>
        <div class="small-6 columns">
            <div class="row align-center">
                <p><?=$campaign->description?></p>
            </div>
            <div class="row align-center">
                <div class="small-6 columns">
                    <a href="javascript:;"><img src="<?=site_url()?>/images/heart.png"></a>
                </div>
                <div class="small-6 columns">
                    <a class="button primary" data-open="propos-modal" href="javascript:propos_form('<?=$campaign->id?>','<?=$campaign->brand_id?>');">SEND PROPOSAL</a>
                </div>
            </div>
        </div>
    </div>
