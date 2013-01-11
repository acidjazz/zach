<?

session_start();
require_once '../config.php';
define('KDEBUG_JSON', true);

/*
if (!isset($_SESSION['signed_request'])) {
  //echo json_encode(array('success' => false, 'error' => 'no signed request found'));
  return true;
}
*/

require_once '../user.php';

