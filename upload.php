<?

require_once 'config.php';
DEFINE('KDEBUG_JSON', true);

if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {

  $file = G_PATH.'img/uploads/'.$_REQUEST['id'].'.'.$_REQUEST['ext'];

  if (!is_file($file)) {
    $grid = upload::grid();
    $image = $grid->get(new MongoId($_REQUEST['id']));
    $image->write($file);
    Header('Location: /img/uploads/'.$_REQUEST['id'].'.'.$_REQUEST['ext']);
    return true;
  }

  header('Content-type: image/'.$_REQUEST['ext']);
  echo file_get_contents($file);

}
