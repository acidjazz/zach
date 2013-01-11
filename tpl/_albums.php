
<?foreach ($albums as $key=>$value): ?>
  <div class="album" data-id="<?=$value['id']?>" data-name="<?=$value['name']?>">
    <div class="picture">
      <div class="inner">
        <img src="<?='https://graph.facebook.com/'.$value['cover_photo'].'/picture/?type=normal&access_token='.$fb->session['oauth_token']?>" alt="" /> 
      </div>
    </div>

    <div class="count"><?=$value['count']?></div>
    <div class="name"><?=$value['name']?></div>

  </div>
<?endforeach?>

<div class="clear"></div>
