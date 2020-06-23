<?php

define('DisplayError', false);

define('SmartyDebug', false); 

define('NoErrorHandler', false);

define('DisplayExceptions', false);

//switch display_error
if(DisplayError == true) {
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 'Off');
    error_reporting(0);
}
$uri = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
if (array_pop($uri) == 'index') {
    $uri = implode('/', $uri);
    header('HTTP/1.1 301 Moved Peranently');
    header('Location: '.'/'. $uri);
}
// Define path to root directory
defined('HOME_PATH')
    || define('HOME_PATH', realpath(dirname(__FILE__)));
	
// Define path to root directory
defined('ROOT_PATH')
    || define('ROOT_PATH', realpath(dirname(__FILE__)));

// Define path to font directory
defined('FONT_PATH')
    || define('FONT_PATH', realpath(dirname(__FILE__) . '/fonts'));

// Define path to font directory
defined('TPL_PATH')
    || define('TPL_PATH', realpath(dirname(__FILE__) . '/templates'));

// Define path to archive directory	
defined('ARCHIVE_PATH')
|| define('ARCHIVE_PATH', realpath(dirname(__FILE__) . '/archive'));

// Define path to thumb directory
defined('THUMB_PATH')
    || define('THUMB_PATH', realpath(dirname(__FILE__) . '/thumb'));   

// Define path to archive directory	
defined('CAPTCHA_PATH')
    || define('CAPTCHA_PATH', realpath(dirname(__FILE__) . '/captcha'));
	
// Define path to application directory
defined('TEMP_PATH')
    || define('TEMP_PATH', realpath(ARCHIVE_PATH . '/temp'));
	
// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(__FILE__) . '/../application'));
    
// Define application environment
defined('APPLICATION_ENV')
    || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ? getenv('APPLICATION_ENV') : 'production'));

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . '/../library'),
    get_include_path(),
)));

/** Zend_Application */
require_once 'Zend/Application.php';

require_once 'Smarty/Smarty.class.php'; 

/*載入Facebook SDK*/
require_once 'Facebook/autoload.php';

/*載入Google登入 SDK*/
require_once 'Google/autoload.php';

/*載入Google SDK*/
require_once 'recaptcha/autoload.php';

// Create application, bootstrap, and run
$application = new Zend_Application(
    APPLICATION_ENV,
    APPLICATION_PATH . '/configs/application.ini'
);

// Zend_Session::start();
$application->bootstrap()
            ->run(); 

unset($_SESSION['messages']);
unset($_SESSION['warnings']);
?>