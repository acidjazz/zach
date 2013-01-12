<?

session_start();

require_once 'cfg/config.php';
require_once 'user.php';

(new kctl($_SERVER['REQUEST_URI']))->start();

