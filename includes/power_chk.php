<?
    session_start();
	if($_SESSION['account'] == "")
       die("你沒有權限登入此頁"); 
?>