<?
//include "../config.php";
//include "../includes/database.php";

if( $run == 0 )
{
   setcookie("hw_id", $hw_id);
   setcookie("course_id", $course_id);
?>
<SCRIPT LANGUAGE="javascript">   
      var chk = window.confirm('確定刪除?');  
      var run = 1;
	  location.href = "del_hw.php?chk=" + chk + "&run=" + run;    
</script>
<?
} 
?> 

<?
  if( $chk )
  {
	 include "../includes/database.php";
	 //$db->Query( "delete from hw where `hw_id` = '".$hw_id."'" );     
     //$db->Query( "delete from hw_info where `hw_id` = '".$hw_id."'" );  
	 setcookie("hw_id", "");
  }
   
   //header("location:homework.php");
?>

   
<SCRIPT LANGUAGE="javascript">  
   //var id = getCookie("course_id"); 
   location.href = "homework.php"; 
</script>