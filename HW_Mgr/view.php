<?
	session_start();
	include "../config.php";
	include "../includes/database.php";
	include "hw_filemgr_class.php";
	$path="../upload/0001/94598031";
	$std_id=$_GET['account'];
	echo $_SESSION['std_id'];
	if($hw_id!="")
		$_SESSION['hw_id']=$hw_id;
	else $hw_id=$_SESSION['hw_id'];
	if($std_id=="")$std_id="s4598000";
		
	$result = $db->Query(" select * from course, hw where course.course_id = hw.course_id and hw.hw_id = '".$hw_id."' ");
	$row = $db->Fetch_array( $result );
	
	$course_name=$row[course_name];
	$hw_name=$row[hw_name];
	$_SESSION['path'] = $path;
	$filemg=new FileMgr($path);
	if ($_POST['del'])
	{
		$filemg->delFiles($_POST['selfile']);
	}
	$filemg->getFileList();
	$my_array=array();
	for($i=0;$i<sizeof($filemg->_filename);$i++)
	{
		$filename_a="<span class='style6'><a href='hw_mg_edit.php?filename=".$filemg->_filename[$i]."'>".$filemg->_filename[$i]."</a></span>";
		$item="<td><input name='selfile[]' type='checkbox' value='".$filemg->_filename[$i]."'></td>\n";
		$item=$item."<td>".$filename_a."</td>\n".
		      "<td align='right'><span class='style6'>".$filemg->_filesize[$i]."</span></td>\n".
			  "<td align='middle'><span class='style6'>".$filemg->_filetime[$i]."</span></td>\n";
		array_push($my_array,$item);
	}
	$tpl->assign("my_array",$my_array);
	$tpl->assign("std_id",$std_id);
	$tpl->assign("course_name",$course_name);
	$tpl->assign("hw_name",$hw_name);
	$tpl->display("HW_Mgr/view.htm");
?>
