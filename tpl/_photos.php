
<?foreach ($photos as $key=>$value): ?>
  <div class="photo" data-id="<?=$value['id']?>" data-picture="<?=$value['picture']?>" data-source="<?=$value['source']?>" data-width="<?=$value['width']?>" data-height="<?=$value['height']?>">
    <div class="inner">
      <img src="<?=$value['images'][1]['source']?>" alt="" /> 
      <div class="selected selected_<?=$value['id']?> icon-ok">&nbsp;</div>
    </div>
  </div>
<?endforeach?>
<div class="clear"></div>
