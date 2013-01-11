</div>

<div id="fb-root"></div>

<script type="text/javascript">

window.fbAsyncInit = function() {

  FB.init({
    appId      : '<?=FB_APPID?>',
    cookie     : true,
    xfbml      : true,
    oauth      : true
  });

  _.G_URL = '<?=G_URL?>';
  _.G_SURL = '<?=G_SURL?>';
  _.ADD_URL = 'https://graph.facebook.com/oauth/authorize?client_id=<?=FB_APPID?>&scope=publish_actions&redirect_uri=<?=FB_URL?>';
  _.FB_URL = '<?=FB_URL?>';
  _.FB_PAGE = '<?=FB_PAGE?>';
  _.FB_PERMS = '<?=FB_PERMS?>';
  _.added = <?=$fb->added() ? 'true' : 'false'?>;

  <?if (isset($_REQUEST['signed_request'])): ?>
  _.sr = '<?=$_REQUEST['signed_request']?>';
  <?endif?>

  _.i();

};

(function(d){
   var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
   js = d.createElement('script'); js.id = id; js.async = true;
   js.src = "//connect.facebook.net/en_US/all.js";
   d.getElementsByTagName('head')[0].appendChild(js);
 }(document));

</script>
</body>
</html>
