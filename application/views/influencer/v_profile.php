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
                        ?>
                        <a class="button primary hollow" href="javascript:;">invite</a>
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
