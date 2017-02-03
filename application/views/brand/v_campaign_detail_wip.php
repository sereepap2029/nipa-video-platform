<?
$ci =&get_instance();
?>
<style type="text/css">
</style>
<div class="row creator-list">
    <div class="large-9 columns">
        <div class="callout">
            <div class="row">
                <div class="medium-6 columns">
                    <label>ชื่องาน
                        <input name="name" type="text" placeholder="name" value="<?=$campaign->name?>">
                    </label>
                </div>
                <fieldset class="large-6 columns">
                    <legend>ประเภท social</legend>
                    <input id="checkbox1" type="checkbox" name="social[]" value="facebook" <?php if (isset($campaign->social["facebook"])){ echo "checked";} ?> >
                    <label for="checkbox1">Facebook</label>
                    <input id="checkbox2" type="checkbox" name="social[]" value="youtube" <?php if (isset($campaign->social["youtube"])){ echo "checked";} ?>>
                    <label for="checkbox2">Youtube</label>
                </fieldset>
                <div class="medium-6 columns">
                    <label>ช่วงบัดเจต
                        <input name="budget_start" type="text" placeholder="budget-start" value="<?=$campaign->budget_start?>">-<input name="budget_end" type="text" placeholder="budget-end" value="<?=$campaign->budget_end?>">
                    </label>
                </div>
                <div class="medium-12 columns">
                    <label>รายละเอียด
                        <textarea name="description" placeholder="None" rows="10"><?=$campaign->description?></textarea>
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label>url ร้าน
                        <input name="url" type="text" placeholder="http://exp.com" value="<?=$campaign->url?>">
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label>วันที่เริ่ม
                        <input type="text" name="start_date" class="datepicker" value="<?=$ci->m_time->unix_to_datepicker($campaign->start_date)?>">
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label>วันที่สิ้นสุด
                        <input type="text" name="end_date" class="datepicker" value="<?=$ci->m_time->unix_to_datepicker($campaign->start_date)?>">
                    </label>
                </div>
                <div class="medium-5 columns">
                    <a href="javascript:;" class="button secondary">Update</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="reveal" id="detail-modal" data-reveal data-animation-in="rotateIn animated" >
        <div class="camp-region">
        </div>
        <div class="row align-center">
            <a class="button primary hollow" id="invite-modal-ok" data-close href="javascript:;">ปิด</a>
        </div>
        <button class="close-button" data-close aria-label="Close modal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<script type="text/javascript">
  function c_show(div_class){
    $(".c-holder").fadeOut("fast",function(){
      setTimeout(function(){ $("."+div_class).fadeIn(); }, 500);
      
    });
    
  }
    $(function() {

        $( ".datepicker" ).datepicker({
              changeMonth: true,
              changeYear: true,
              dateFormat: "dd/mm/yy"
          });
    });
</script>
