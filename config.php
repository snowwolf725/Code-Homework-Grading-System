<?
//Smarty �˪� 
include "class/Smarty.class.php"; 
//�w�q�����ڥؿ� 
define('__SITE_ROOT','c:/AppServ/www/ASGS'); 
// �H config.php ����m�����
$tpl = new Smarty(); 
$tpl->template_dir   = __SITE_ROOT . "/templates/"; 
$tpl->compile_dir    = __SITE_ROOT . "/templates_c/"; 
$tpl->config_dir     = __SITE_ROOT . "/configs/"; 
$tpl->cache_dir      = __SITE_ROOT . "/cache/"; 
$tpl->left_delimiter = '<{'; 
$tpl->right_delimiter = '}>'; 
putenv("TZ=TW");

?>