<?
	session_start();
    require "../config.php";
	include "../includes/database.php";

	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$name = $_POST['name'];
	$position = $_POST['position'];
	$background = $_POST['background'];
	$research = $_POST['research'];
	$office = $_POST['office'];
	$website = $_POST['website'];
	$email = $_POST['email'];
	
	// 這裡要增加帳號是否存在的檢查
	
//	$db = new DBase();
//	$db->DBConnect( $dbhost, $dbadm, $dbpwd, $dbname);
//	$db->Query("SET NAMES 'big5'");
	$db->Query("insert account values('" . $id . "','" . $pw . "',2)");
	$db->Query("insert teacher_information values('".$id."','".$name."','".$position."','".$background."','".$research."','".$office."','".$website."','".$email."')");
	
    if( $_SESSION['power'] > 2 ) {
		$tpl->assign("list1", "<a href=search.php>帳號查詢/修改</a>");
		$tpl->assign("list2", "<a href=add_admin.php>新增管理帳號</a>");
		$tpl->assign("list3", "<a href=add_teacher.php>新增教師帳號</a>");
		$tpl->assign("list4", "<a href=add_student.php>新增學生帳號</a>");
    } else if( $_SESSION['power'] > 1 ) {
		$tpl->assign("list1", "<a href=add_student.php>新增學生帳號</a>");
		$tpl->assign("list2", "<a href=modify.php>修改個人資料</a>");
    } else if( $_SESSION['power'] > 0 ) {
		$tpl->assign("list1", "<a href=modify.php>修改個人資料</a>");
	}

    $tpl->assign("title", "ASGS");
    $tpl->assign("content", "新增教師帳號 (" . $id . ") 完成！");
    $tpl->display('Account_Mgr/add_teacher.html');
?>