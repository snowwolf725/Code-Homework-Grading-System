<?
    require "../config.php";
    $tpl->assign("title", "ASGS");
    $tpl->assign("content", "課程查詢/修改");
    // 上面兩行也可以用這行代替
    // $tpl->assign(array("title" => "測試用的網頁標題", "content" => "測試用的網頁內容"));
    $tpl->display('Course_Mgr/search.html');
?>