<?
	session_start();
	include "../config.php";
	include "hw_filemgr_class.php";
	$path=$_SESSION['path'];
	$std_id=$_GET['account'];
	$filemg=new FileMgr($path);
	$result=$filemg->makeFile();
	$tpl->assign("result",$result);
	$tpl->assign("std_id",$std_id);
	$tpl->display("HW_Mgr/hw_mg_cmp_result.htm");
?>