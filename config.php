<?
//Smarty 樣版 
include "class/Smarty.class.php"; 
//定義網站根目錄 
define('__SITE_ROOT','c:/AppServ/www/ASGS'); 
// 以 config.php 的位置為基準
$tpl = new Smarty(); 
$tpl->template_dir   = __SITE_ROOT . "/templates/"; 
$tpl->compile_dir    = __SITE_ROOT . "/templates_c/"; 
$tpl->config_dir     = __SITE_ROOT . "/configs/"; 
$tpl->cache_dir      = __SITE_ROOT . "/cache/"; 
$tpl->left_delimiter = '<{'; 
$tpl->right_delimiter = '}>'; 
putenv("TZ=TW");

?>