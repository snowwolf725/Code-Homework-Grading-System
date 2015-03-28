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
   		$tpl->assign("content", "密碼二次輸入不相同...");
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
   	$tpl->assign("content", "帳號修改完成");
	$tpl->display('Account_Mgr/modify.html');
?>