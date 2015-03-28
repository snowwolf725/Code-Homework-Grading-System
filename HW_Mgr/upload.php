<?
 include "../config.php";
 include "../includes/power_chk.php";
 include "../includes/database.php";
 
 session_start();
 
 $hw_id = 0001;
 
 if( $action == "upload" )
 {  
	 if( $userfile == "" )
	     echo("請選擇檔案!");
	 else
	 {	
		 $path = "upload/".$hw_id."/";
		 if( file_exists( $path ) == 0)
		 {
		     mkdir( $path, 0700 );
			 $path .= $_SESSION['account'];
			 mkdir( $path, 0700 );
		 } 
	     else		
			 $path .= $_SESSION['account']; 
			 //print $path;
	
		 if( copy( $userfile, $path."/".$userfile_name ) ) 
		 {
			 $message = "檔案上傳成功!";          
			 $sec = time();
			 $id  = $_SESSION['account'];
			 
			 $result = $db->Query( " select count(*) from hw_info where hw_id = '".$hw_id."'" ); 
			 $row = $db->Fetch_array( $result );
			 if( $row[0] ==0 )
			    $db->Query( "insert hw_info values( '".$hw_id."','".$id."','".$userfile_name."',-1,'".$hw_doc."','".$sec."' )" );	
		     else	                
				$db->Query( "update hw_info set `hw_id` = '".$hw_id."', member_id = '".$id."', filename = '".$userfile_name."', due_doc = '".$hw_doc."', up_time = '".$sec."' where hw_id = '".$hw_id."' and member_id = '".$id."'");	
			 print "test";
		 }
		 else 
		     $message = "上傳失敗!";
		 
 
		 unlink($userfile);
	    
	 }
	  
	 
	 $userfile_size = $userfile_size / 1024;
	 settype( $userfile_size, "integer" );
	  	 
 }   

 $result = $db->Query( "select name from student_information where id = '".$_SESSION['account']."'" );
 $row1 = $db->Fetch_array( $result );
 
 $result = $db->Query( "select hw_name from hw where hw_id = '".$hw_id."'" );
 $row2 = $db->Fetch_array( $result );
 
 
 $tpl->assign( "user_id", $_SESSION['account'] );
 $tpl->assign( "user_name", $row1[name] );
 $tpl->assign( "hw_name", $row2[hw_name] );
 $tpl->assign( "up_teme", "0" );
 $tpl->assign( "course_name", "??" );
 $tpl->assign( "hw_id" , $hw_id );
 //$tpl->assign( "message" , $message );
 //$tpl->assign( "hw_doc" , $row1[hw_doc] );
 //$tpl->assign( "filename" , $userfile_name );
 //$tpl->assign( "filesize" , $userfile_size );
 $tpl->display( "upload.htm" ); 

?>