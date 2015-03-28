<?
  class DBase 
  {
      function defaultDBConnect() 
	  {
	      mysql_connect("localhost", "root", "1234qwer") or die ( "無法連結" );
          mysql_select_db("asgs") or die ( "無法傳真" );
      }
      
  	  function DBConnect( $dbhost, $dbadm, $dbpwd, $dbname )
	  {
	      mysql_connect( $dbhost ,$dbadm, $dbpwd ) or die ( "無法連結" );
          mysql_select_db( $dbname ) or die ( "無法傳真" );
	  }
	  
	  function Query($querystr)
	  {
          $identify = mysql_query( $querystr );
	   	  return $identify;
      }
        
	  function Fetch_array( $identify )
	  {
          $row = mysql_fetch_array( $identify );
          return $row;
	  }
	  
  }
  
  $dbhost = "localhost";
  $dbname = 'grading';
  $dbadm  = 'root';
  $dbpwd  = '1234qwer';

  $db = new DBase();
  $db->DBConnect( $dbhost ,$dbadm, $dbpwd, $dbname );
  $db->Query( "SET NAMES 'UTF-8'" );

    
?>