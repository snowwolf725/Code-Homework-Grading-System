<?

 if( $action == "insert" )
 {
     $result = $db->Query( "select max(hw_id) from hw" );
     $id = $db->Fetch_array( $result );
     $id[0]++;
    
     $date = split( "/", $deadline ); 
     $time = mktime(0,0,0,$date[1],$date[2],$date[0]);
     
     $db->Query( "insert hw values( '".$id[0]."','".$course_id."','".$hw_name."','".$hw_doc."','".$time."' )" );	
 }
 
 else if( $action == "update" )
 {
     $date = split( "/", $deadline ); 
     $time = mktime(0,0,0,$date[1],$date[2],$date[0]);
     $result = $db->Query( "update hw set `hw_name` = '".$hw_name."' , `hw_doc` = '".$hw_doc."' , `deadline` = '".$time."'
	                        where `hw_id` = '".$hw_id."'" );
	 
 }

 else
 {
     if( $UI == "edit" )
     {
	 $result = $db->Query( "select * from hw where hw_id = '".$hw_id."' order by '".$hw_id."'" );
	 $row = $db->Fetch_array( $result );
	 $date = getdate( $row[deadline] );
		
         $data = array( "hw_name"  => $row[hw_name],
	                "hw_doc"   => $row[hw_doc],
			"deadline" => $date[year]."/".$date[mon]."/".$date[mday] );
	 $tpl->assign( "data" , $data );
	 $tpl->assign( "btn_text" , "課程修改" );
	 $tpl->assign( "action" , "update" );
     }
     else if( $UI == "input" )	
     {
	 $data = array( "hw_name"  => "",
	                "hw_doc"   => "",
	   	        "deadline" => "");
	 $tpl->assign( "data" , $data );
	 $tpl->assign( "btn_text" , "課程新增" );
	 $tpl->assign( "action" , "insert" );
     }   
	 
     $tpl->assign( "course_id" , $course_id );
	 $tpl->assign( "hw_id" , $hw_id );
     $tpl->display( "./HW_Mgr/add_hw.htm" ); 
 }
?>