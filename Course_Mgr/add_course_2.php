<?
    require "../config.php";
	include "../includes/database.php";

	$name = $_POST['name'];
	$detail = $_POST['detail'];

	$db->Query("insert course(course_name, course_doc) values('" . $name . "','" . $detail . "')");

    $tpl->assign("title", "ASGS");
    $tpl->assign("content", "新增課程 (" . $name . ") 完成！");
    $tpl->display('Course_Mgr/add_course.html');
?>