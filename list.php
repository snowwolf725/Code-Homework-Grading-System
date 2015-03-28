<form method="post" action="login.php">
<table border="0" cellpadding="0" cellspacing="0" >
  <tr><td><img src="images/metalchaos_03.gif" height="66" width="212"></td></tr>

  <tr height="32"> 
    <td background="images/metalchaos_06.gif" width="212">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
      <font face="細明體, Verdana, Arial, Helvetica, sans-serif" size="2">
      </font>
    </td>
  </tr>

  <tr height="32"> 
    <td background="images/metalchaos_07.gif" width="212" align="left">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
      <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
      <? if( !$_SESSION['power'] ) { ?>
      帳號<input type="text" name="account" size=10>
      <? } else { ?>
      <a href="logout.php">登出</a>
      <? } ?>
      </font>
    </td>
  </tr>

  <tr height="31"> 
    <td background="images/metalchaos_08.gif" width="212" align="left">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
      <? if( !$_SESSION['power'] ) { ?>
      密碼<input type="password" name="passwd" size=10>
      <? } ?>
      </font>
    </td>
  </tr>

  <tr height="32"> 
    <td background="images/metalchaos_09.gif" width="212" align="center">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
      <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
      <? if( !$_SESSION['power'] ) { ?>
      <input type="submit" value="登入">      
      <? } ?>
      </font>
    </td>
  </tr>

  <tr height="31"> 
    <td background="images/metalchaos_10.gif" width="212">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
    <? if( $_SESSION['power'] > 1 ) { ?>
    <a href="mgr_index.php">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
      管理介面
      </font>
    </a>
    <? } ?>
    </td>
  </tr>

  <tr height="32"> 
    <td background="images/metalchaos_11.gif" width="212">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
  	<? if( $_SESSION['power'] == 1 ) { ?>
    <a href="./Course_Mgr/list_course.php">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
      我的課程
      </font>
    </a>
    <? } ?>
    </td>
  </tr>

  <tr height="31"> 
    <td background="images/metalchaos_12.gif" width="212">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
    <a href="index.php">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
      </font>
    </a>
    </td>
  </tr>

  <tr height="31"> 
    <td background="images/metalchaos_13.gif" width="212">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
    <a href="index.php">
      <font face="Verdana, Arial, Helvetica, sans-serif" size="2">
      
      </font>
    </a>
    </td>
  </tr>

  <tr><td><img src="images/metalchaos_14.gif" height="18" width="212"></td></tr>
  <tr><td><img src="images/metalchaos_15.gif" height="58" width="212"></td></tr>
</table>
</form>