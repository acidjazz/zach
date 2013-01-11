<?

define('G_PATH', '/var/www/lancome/');
define('LIB_PATHS', '/var/www/lancome/klib/,'.G_PATH.'mdl/,'.G_PATH.'ctl/,'.G_PATH.'lib/');
define('G_URL', 'http://lancome.oclabs.co/');
define('G_SURL', 'https://lancome.oclabs.co/');

/* kdebug */
define('KDEBUG', false);
define('KDEBUG_HANDLER', true);

/* mongo config */
define('MONGO_HOST','mongodb://localhost:27017/');
define('MONGO_DB','lancome');
//define('MONGO_REPLICA_SET', 'replica3');
define('MONGO_DEBUG', true);

/* facebook */
define('FB_APPID', '207714252693537');
define('FB_SECRET', 'c3cfc20ac91e046dc2731a2202da20ea');
define('FB_PERMS', 'publish_actions,user_photos');
define('FB_NAMESPACE', 'feelyourbest');

define('FB_URL', 'http://apps.facebook.com/' . FB_NAMESPACE);
define('FB_PAGE', 'https://www.facebook.com/lancomeUS/app_' . FB_APPID);

/* bitly */
define('BITLEY_LOGIN','acidjazz'); 
define('BITLEY_CLIENTID','abbfd82f59b31e68ea80732ade72f24ce0d9aafb'); 
define('BITLEY_SECRET','cda49b0f10221cbc08325caa0e81a4c920bf23e7'); 
define('BITLEY_API','R_793a7fb76b9ecc1d70eadd2b06e10adf'); 

/* ignore past this line */
set_include_path(get_include_path().PATH_SEPARATOR.G_PATH);

spl_autoload_register(function($class) { 

	foreach (explode(',', LIB_PATHS) as $libdir) {
  	foreach (array('.class.php','.interface.php') as $file) {
			if (is_file($libdir.$class.$file)) {
				return require_once $libdir.$class.$file;
			}
		}
	}

	return false;

});

if (defined('KDEBUG') && KDEBUG == true && php_sapi_name() != 'cli') {
	if (!defined('KDEBUG_JSON') || KDEBUG_JSON == false) {
		register_shutdown_function(array('kdebug', 'init'));
		if (defined('KDEBUG_HANDLER') && KDEBUG_HANDLER == true) {
			set_error_handler(array('kdebug', 'handler'), E_ALL);
		}
	}
}

function hpr() { return call_user_func_array(array('k','hpr'), func_get_args()); }
function cpr() { return call_user_func_array(array('k','cpr'), func_get_args()); }
function highlight() { return call_user_func_array(array('k','highlight'), func_get_args()); }
function xmlindent() { return call_user_func_array(array('k','xmlindent'), func_get_args()); }

