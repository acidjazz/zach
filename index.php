<?

session_start();

require_once 'config.php';
require_once 'user.php';

$app = new kctl($_SERVER['REQUEST_URI']);
$app->start();

