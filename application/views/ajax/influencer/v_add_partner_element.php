<?
$ci =&get_instance();
?>
    <div class="small-3 columns partner-items">
        <label class="name"><?=$partner->name?></label>
        <input type="hidden" name="partner[]" value="<?=$partner->id?>">
        <a class="button danger delete_creator" href="javascript:;">X</a>
    </div>
