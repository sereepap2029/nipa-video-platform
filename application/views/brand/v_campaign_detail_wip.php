<?
$ci =&get_instance();
?>
<style type="text/css">
</style>
<div class="row creator-list">
    <div class="large-12 columns">
        <div class="callout">
            <div class="row">
                <div class="medium-6 columns">
                    <label>ชื่องาน 
                        <input id="name" type="text" placeholder="name" value="<?=$campaign->name?>">
                        สถานะ :<?=$campaign->status?>
                    </label>
                </div>
                <fieldset class="large-6 columns">
                    <legend>ประเภท social</legend>
                    <?php if (isset($campaign->social["facebook"])){ ?><label for="checkbox1">Facebook</label><?} ?> 
                    <?php if (isset($campaign->social["youtube"])){ ?><label for="checkbox2">Youtube</label><?} ?>
                    
                </fieldset>
                <div class="medium-6 columns">
                    <label>ค่าใช้จ่าย : <?=number_format($campaign->accept_budget)?>                        
                    </label>
                </div>
                <div class="medium-12 columns">
                    <label>รายละเอียด
                        <textarea id="description" placeholder="None" rows="10"><?=$campaign->description?></textarea>
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label>url ร้าน
                        <input id="url" type="text" placeholder="http://exp.com" value="<?=$campaign->url?>">
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label>วันที่เริ่ม
                        <input type="text" id="start_date" class="datepicker" value="<?=$ci->m_time->unix_to_datepicker($campaign->start_date)?>">
                    </label>
                </div>
                <div class="medium-4 columns">
                    <label>วันที่สิ้นสุด
                        <input type="text" id="end_date" class="datepicker" value="<?=$ci->m_time->unix_to_datepicker($campaign->start_date)?>">
                    </label>
                </div>
                <div class="medium-5 columns">
                    <a href="javascript:update_camp('<?=$campaign->id?>','WIP');" class="button secondary">Update</a>
                    <a href="javascript:update_camp('<?=$campaign->id?>','complete');" class="button success">Complete</a>
                    <a href="javascript:update_camp('<?=$campaign->id?>','reject');" class="button alert">Reject</a>
                </div>
            </div>

            <div class="row">
                <div class="medium-12 columns">
                    <label>Update งาน
                        <textarea id="progress" placeholder="None" rows="10" disabled><?=$campaign->progress?></textarea>
                    </label>
                </div>
                <div class="medium-5 columns">
                    
                    <?
                    if ($campaign->file!="") {
                        ?>
                        <a href="<?echo upload_site_url('media/campaign/submit/'.$campaign->file);?>" class="button secondary">Download file</a>
                        <?
                    }
                    ?>
                    
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
  function update_camp(camp_id,status) {

        $.ajax({
                method: "post",
                url: "<?php echo site_url("ajax/campaign/update_camp_detail"); ?>",
                data: {
                    'camp_id':camp_id,
                    'name':$("#name").val(),
                    'description':$("#description").val(),
                    'url':$("#url").val(),
                    'start_date':$("#start_date").val(),
                    'end_date':$("#end_date").val(),
                    'status':status,
                }
            })
            .done(function(data) {
                    $("#detail-modal .camp-region").html("บันทึกเรียบร้อยแล้ว");
                    $("#detail-modal").foundation('open');;
                    
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

