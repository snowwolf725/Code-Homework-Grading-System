<?
	session_start();
    require "../config.php";
	include "../includes/database.php";

	$id = $_POST['id'];
	$pw = $_POST['pw'];
	$name = $_POST['name'];
	
//	$db = new DBase();
//	$db->DBConnect( $dbhost, $dbadm, $dbpwd, $dbname);
//	$db->Query("SET NAMES 'big5'");
	$db->Query("insert account values('" . $id . "','" . $pw . "',1)");
	$db->Query("insert student_information values('".$id."','".$name."')");

    if( $_SESSION['power'] > 2 ) {
		$tpl->assign("list1", "<a href=search.php>�b���d��/�ק�</a>");
		$tpl->assign("list2", "<a href=add_admin.php>�s�W�޲z�b��</a>");
		$tpl->assign("list3", "<a href=add_teacher.php>�s�W�Юv�b��</a>");
		$tpl->assign("list4", "<a href=add_student.php>�s�W�ǥͱb��</a>");
    } else if( $_SESSION['power'] > 1 ) {
		$tpl->assign("list1", "<a href=add_student.php>�s�W�ǥͱb��</a>");
		$tpl->assign("list2", "<a href=modify.php>�ק�ӤH���</a>");
    } else if( $_SESSION['power'] > 0 ) {
		$tpl->assign("list1", "<a href=modify.php>�ק�ӤH���</a>");
	}


    $tpl->assign("title", "ASGS");
    $tpl->assign("content", "�s�W�ǥͱb�� (" . $id . ") �����I");
    $tpl->display('Account_Mgr/add_student.html');
?>