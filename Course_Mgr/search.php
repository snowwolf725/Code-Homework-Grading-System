<?
    require "../config.php";
    $tpl->assign("title", "ASGS");
    $tpl->assign("content", "�ҵ{�d��/�ק�");
    // �W�����]�i�H�γo��N��
    // $tpl->assign(array("title" => "���եΪ��������D", "content" => "���եΪ��������e"));
    $tpl->display('Course_Mgr/search.html');
?>