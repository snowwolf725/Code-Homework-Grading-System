<?
	session_start();
    require "../config.php";
    $tpl->assign("title", "ASGS");
    $tpl->assign("content", "�s�W�ǥͱb��");
    // �W�����]�i�H�γo��N��
    // $tpl->assign(array("title" => "���եΪ��������D", "content" => "���եΪ��������e"));

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


    $tpl->display('Account_Mgr/add_student.html');
?>