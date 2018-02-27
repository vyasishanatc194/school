<?php
// db_config.php
require_once('connection.php');
/* Base URL path*/
$BASE_URL = '//localhost/corephp/school/';

/* Base path*/
$BASE_PATH = '/school/';

/* Base CSS path*/
$CSS_PATH = 'css/';

/* Base JS path*/

$JS_PATH = 'js/';

//Salt for the Php
$salt = '(*&^DF@$#^@#%';

/* Includes Class */


include('class/general.php');
include('class/user.php');
//include('class/general.php');

$genObj = new General();

?> 