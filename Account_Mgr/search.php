<?
	session_start();
    require "../config.php";
	include "../includes/account.php";

    $condition = $_GET['condition'];
    if( $condition == "" ) $condition = $_POST['condition'];
    
    if( $condition == "all" ) {
		$users = new UserList();
		$tpl->assign("data", $users->getUsers());
		$tpl->assign("listed", 1);
		$tpl->assign("condition", "all");
	} else if( $condition == "admin") {
		$users = new UserList("where power=3");
		$tpl->assign("data", $users->getUsers());
		$tpl->assign("listed", 1);
		$tpl->assign("condition", "admin");
	} else if( $condition == "teacher") {
		$users = new UserList("where power=2");
		$tpl->assign("data", $users->getUsers());
		$tpl->assign("listed", 1);
		$tpl->assign("condition", "teacher");
	} else if( $condition == "student") {
		$users = new UserList("where power=1");
		$tpl->assign("data", $users->getUsers());
		$tpl->assign("listed", 1);
		$tpl->assign("condition", "student");
    } else if( $condition == "condition") {
    	$users = new UserList("where id like '%" . $_POST['id'] . "%'");
    	$tpl->assign("data", $users->getUsers());
		$tpl->assign("listed", 1);
		$tpl->assign("condition", $_POST['id']);
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
   	$tpl->assign("content", "帳號查詢/修改");

    $tpl->display('Account_Mgr/search.html');
?>