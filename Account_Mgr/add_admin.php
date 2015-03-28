<?
	session_start();
    require "../config.php";
    $tpl->assign("title", "ASGS");
    $tpl->assign("content", "新增管理者帳號");
    // 上面兩行也可以用這行代替
    // $tpl->assign(array("title" => "測試用的網頁標題", "content" => "測試用的網頁內容"));

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

    $tpl->display('Account_Mgr/add_admin.html');
?>