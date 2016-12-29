<?
$ci =&get_instance();
?>
<div class="row creator-list">
    <div class="large-9 columns">
        <div class="callout">
            <h3>This Campaign List</h3>
            <a class="button" href="<?=site_url("brand/campaign_create")?>">Create campaign</a>
            <div class="row">
                <ul class="align-center menu">
                  <li>
                    <a class="hollow button" href="#">ทั้งหมด</a>
                  </li>
                  <li>
                    <a class="hollow button" href="#">ดำเนินการ</a>
                  </li>
                  <li>
                    <a class="hollow button" href="#">เสร็จ</a>
                  </li>
                </ul>
            </div>
            <div class="row align-center">
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
