<?

// Smarty 樣版 
include "class/Smarty.class.php"; 
define('__SITE_ROOT','/var/www/html');     //定義網站根目錄 

$tpl = new Smarty(); 
$tpl->template_dir   = __SITE_ROOT . "/templates/"; 
$tpl->compile_dir    = __SITE_ROOT . "/templates_c/"; 
$tpl->config_dir     = __SITE_ROOT . "/configs/"; 
$tpl->cache_dir      = __SITE_ROOT . "/cache/"; 
$tpl->left_delimiter = '<{'; 
$tpl->right_delimiter = '}>'; 


 // DBase class
 include   "database.php"; 
 $dbhost = "localhost";
 $dbname = 'grading';
 $dbadm  = 'root';
 $dbpwd  = '1234qwer';

 $db = new DBase();
 $db->DBConnect( $dbhost ,$dbadm, $dbpwd, $dbname );
 $db->Query( "SET NAMES 'UTF-8'" );
 
?>