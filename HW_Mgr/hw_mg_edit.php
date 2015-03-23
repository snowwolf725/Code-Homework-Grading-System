<?
	session_start();
	include "../config.php";
	include "hw_filemgr_class.php";
	$std_id=$_GET['account'];
	if($_POST['Cancel'])
	{
		header("location:view.php");
	}
	else if($_POST['Submit'])
	{
		$filemg=new FileMgr($_SESSION['path']);
		$filemg->saveFile($_GET['filename'],stripslashes($_POST['textarea']));
		$tpl->assign("filecontext",$filemg->getFileContext($_GET['filename']));
		$tpl->assign("filestate","ÀÉ®×¤w¦s~!!");
		$tpl->assign("filename",$_GET['filename']);
		$tpl->assign("std_id",$std_id);
		$tpl->display("HW_Mgr/hw_mg_edit.htm");
	}
	else
	{
		$filemg=new FileMgr($_SESSION['path']);
		$tpl->assign("filecontext",$filemg->getFileContext($_GET['filename']));
		$tpl->assign("filename",$_GET['filename']);
		$tpl->assign("filestate","");
		$tpl->assign("std_id",$std_id);
		$tpl->display("HW_Mgr/hw_mg_edit.htm");
	}
?>
