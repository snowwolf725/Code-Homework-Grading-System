<?
    require "../config.php";
    $tpl->assign("title", "ASGS");
    $tpl->assign("content", "�s�W�ҵ{");
    // �W�����]�i�H�γo��N��
    // $tpl->assign(array("title" => "���եΪ��������D", "content" => "���եΪ��������e"));
    $tpl->display('Course_Mgr/add_course.html');
?>