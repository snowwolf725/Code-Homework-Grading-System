<? session_start(); ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>ASGS</title>
</head>

<body leftmargin="0" topmargin="0" alink="#ffffcc" bgcolor="#000000" link="#ffffcc" marginheight="0" marginwidth="0" text="#ffffff" vlink="#ffffcc">
<table border="0" cellpadding="0" cellspacing="0" width="800">
  <!-- include head file -->
  <tr><td colspan="2"><?php include 'head.html'; ?></td></tr>

  <tr>
    <!-- include list file -->
    <td valign="top" width="212"><?php include 'list.php'; ?></td>

    <td valign="top" width="588">
		<font face="Verdana, Arial, Helvetica, sans-serif" size="3">
		<? echo $_GET['msg']; ?>
		</font>
    </td>
  </tr>

  <!-- include foot file -->
  <tr><td colspan="2"><?php include 'foot.html'; ?></td></tr>
</table>
</body>

</html>