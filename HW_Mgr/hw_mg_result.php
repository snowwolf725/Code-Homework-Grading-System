<?
	session_start();
	include "../config.php";
	include "hw_filemgr_class.php";
	$filename="./94598031";
	$path=$_SESSION['path'];
	$filemg=new FileMgr($path);
	$result=$filemg->runFile($filename);
	$tpl->assign("result",$result);
	$tpl->display("HW_Mgr/hw_mg_result.htm");
?>
