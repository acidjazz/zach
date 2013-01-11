<?

require_once 'ajax.php';

if (isset($_REQUEST['id']) && is_numeric($_REQUEST['id'])) {
  $result = $fb->api('/'.$_REQUEST['id'].'/photos');
} else {
  return true;
}

$photos = $result['data'];

ob_start();
require_once '../tpl/_photos.php';
$html = ob_get_contents();
ob_end_clean();

echo json_encode(array('success' => true, 'html' => $html));
return true;

