<?
    require "config.php";
	include "includes/database.php";

	$id = $_POST['account'];
	$pw = $_POST['passwd'];
	
	/*$db = new DBase();
	$db->defaultDBConnect();
	$db->Query("SET NAMES 'UTF-8'");*/
	$result = $db->Query("select * from account where `id`='".$id."' and `password`='".$pw."'");
	$data = $db->Fetch_array($result);

	if( $data['power'] == false ) {
		header('Location:index.php?msg=帳號錯誤或密碼不正確...'."select * from account where `id`='".$id."' and `password`='".$pw."'");
		exit();
	}

	if( !isset($_SESSION['account']) ) {
		session_start();
		$_SESSION['account'] = $data['id'];
		$_SESSION['power'] = $data['power'];
	}

	header('Location:index.php?msg=login ok...');
?>