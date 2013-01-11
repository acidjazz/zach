
<?

require_once 'ajax.php';

$result = $fb->api('/me/albums');
$albums = $result['data'];

ob_start();
require_once '../tpl/_albums.php';
$html = ob_get_contents();
ob_end_clean();

echo json_encode(array('success' => true, 'html' => $html));
return true;

