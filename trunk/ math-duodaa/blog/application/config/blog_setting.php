<?php


define('QAROOT',realpath(APPPATH.'../../'));

define('ALLOW_CONTENT_TAGS','<br><img><p><li><ul><ol><span><div><strong><u><em><a>');
//echo realpath(QAROOT);

require_once QAROOT.'/qa-config.php';
require_once QAROOT.'/qa-include/qa-base.php';
require_once QAROOT.'/qa-include/qa-app-users.php';
require_once QAROOT.'/qa-include/qa-db-selects.php';


$config['app_src'] = 'application/';
$config['qaroot_src'] ='/';
$config['blogroot_src'] = '/CodeIgniter/';
$config['theme'] = 'default';

$config['jq_ui_css'] = 'http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css';
$config['jq_src'] = 'http://code.jquery.com/jquery-1.8.3.js';
$config['jq_ui_src'] = 'http://code.jquery.com/ui/1.9.2/jquery-ui.js';

