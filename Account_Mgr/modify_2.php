<?
	session_start();
    require "../config.php";
	include "../includes/database.php";

	$id = $_POST['id'];
	$p = $_POST['power'];
	$pw = $_POST['pw'];
	$pw2 = $_POST['pw2'];

    if( $pw != $pw2 ) {
	    $tpl->assign("title", "ASGS");
   		$tpl->assign("content", "�K�X�G����J���ۦP...");
		$tpl->display('Account_Mgr/modify.html');
		exit();
    }

	if( $p == 1 ) {
	    $db = new DBase();
    	$db->defaultDBConnect();
	    $db->Query("SET NAMES 'big5'");
		$result = $db->Query("update account set `password`='". $pw ."' where `id`='". $id ."'");
		
		$name = $_POST['name'];
		$result = $db->Query("update student_information set `name`='".$name."' where `id`='". $id ."'");
	} else if( $p == 2 ) {
	    $db = new DBase();
    	$db->defaultDBConnect();
	    $db->Query("SET NAMES 'big5'");
		$result = $db->Query("update account set `password`='". $pw ."' where `id`='". $id ."'");
		
		$name = $_POST['name'];
		$position = $_POST['position'];
		$background = $_POST['background'];
		$research = $_POST['research'];
		$office = $_POST['office'];
		$website = $_POST['website'];
		$email = $_POST['email'];
		$result = $db->Query("update teacher_information set `name`='". $name ."',`position`='".$position."',`background`='".$background."',`research`='".$research."',`office`='".$office."',`website`='".$website."',`email`='".$email."' where `id`='". $id ."'");
	} else if( $p == 3 ) {
	    $db = new DBase();
    	$db->defaultDBConnect();
	    $db->Query("SET NAMES 'big5'");
		$result = $db->Query("update account set `password`='". $pw ."' where `id`='". $id ."'");
	}

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
   	$tpl->assign("content", "�b���ק粒��");
	$tpl->display('Account_Mgr/modify.html');
?>