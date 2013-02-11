<?

require_once 'cfg/config.php';

echo $suzy;

echo $charlie;

(new kctl($_SERVER['REQUEST_URI']))->start();

$_GET['test'] = [1 => range(5,20), 3 => ['a','b','c'], 'this is a test of length' => range(10,20)];
