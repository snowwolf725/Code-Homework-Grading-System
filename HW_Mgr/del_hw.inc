<?

if( $run == 0 )
{
?>
<SCRIPT LANGUAGE="javascript">   
      var chk = window.confirm('½T©w§R°£?');  
      var run = 1;
	  location.href = "del_hw.php?chk=" + chk + "&run=" + run;    
</script>
<?
} 
?> 

<?
  if( $chk )
  {
	 print "checked!";
	 $db->Query( "delete from hw where `hw_id` = '".$hw_id."'" );     
     $db->Query( "delete from hw_info where `hw_id` = '".$hw_id."'" );  
  }

header("location:homework.php");   
?>
