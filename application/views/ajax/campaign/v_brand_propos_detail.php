<?
$ci =&get_instance();
?>
    <div class="row">
        <div class="small-12 columns">
            <div class="row align-center">
                <div class="small-12 columns">
                    <h3>1 Day 03 Hour</h3>
                </div>
                <div class="row align-center">
                    <div class="small-6 columns">
                    <label>เอกสาร</label>
                        <img src="<?=upload_site_url('media/campaign/proposal/'.$propos->img_id_card);?>">
                    </div>
                    <div class="small-6 columns">
                    <label>Port</label>
                        <img src="<?=upload_site_url('media/campaign/proposal/'.$propos->img_port);?>">
                    </div>
                </div>
                <div class="small-12 columns">
                    <label>
                        ชื่อ : <?=$propos->propos_name?>
                            <br/> เลขบัตร : <?=$propos->propos_civil_id?>
                            <br/>
                            ที่อยู่
                            <br/>
                            <?=$propos->propos_address?>

                            <br/>
                            ชื่อเล่น : <?=$propos->propos_nickname?>
                            <br/>
                            เสนอราคา : <?=number_format($propos->propos_cost)?>
                            <br/>
                            ข้อกำหนด
                            <br/>
                            <?=$propos->propos_term?>
                    </label>
                </div>
            </div>
            
        </div>
        <div class="small-12 columns">
            <div class="small-6 columns">
                <a class="button primary" href="javascript:;">รับข้อเสนอ</a>
            </div>
        </div>
    </div>
