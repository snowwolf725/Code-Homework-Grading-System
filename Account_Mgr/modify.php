 <?
	session_start();
    require "../config.php";
	include "../includes/account.php";

	$id = $_GET['id'];
	if( !$id ) $id = $_SESSION['account'];
	$p = $_GET['power'];
	if( !$p ) $p = $_SESSION['power'];
    $condition = $_GET['condition'];

    $tpl->assign("title", "ASGS");
   	$tpl->assign("content", "�b���ק�");

    $db = new DBase();
    $db->defaultDBConnect();
    $db->Query("SET NAMES 'big5'");
	$result = $db->Query("select * from account where id='".$id."'");
	$data = $db->Fetch_array($result);
	
	$tpl->assign("id", $data[id]);
	$tpl->assign("pw", $data[password]);
	$tpl->assign("power", $power);

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

	if( $p == 1 ) {					// �ǥ�
		$db = new DBase();
	    $db->defaultDBConnect();
    	$db->Query("SET NAMES 'big5'");
		$result = $db->Query("select * from student_information where id='".$id."'");
		$data = $db->Fetch_array($result);
		$tpl->assign("name", $data['name']);
	    $tpl->display('Account_Mgr/modify_student.html');
	} else if( $p == 2 ) {			// �Юv
		$db = new DBase();
	    $db->defaultDBConnect();
    	$db->Query("SET NAMES 'big5'");
		$result = $db->Query("select * from teacher_information where id='".$id."'");
		$data = $db->Fetch_array($result);
		$tpl->assign("name", $data['name']);
		$tpl->assign("position", $data['position']);
		$tpl->assign("background", $data['background']);
		$tpl->assign("research", $data['research']);
		$tpl->assign("office", $data['office']);
		$tpl->assign("website", $data['website']);
		$tpl->assign("email", $data['email']);
	    $tpl->display('Account_Mgr/modify_teacher.html');
	} else if( $p == 3 ) {			// �޲z��
	    $tpl->display('Account_Mgr/modify_admin.html');
	}
?>