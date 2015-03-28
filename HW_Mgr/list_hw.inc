
<?

 class HomeworkList
{
      var $course_name;
      var $hw_data;
	
      function HomeworkList($course_id)
      {
	  $db = new DBase();
	  $result = $db->Query( "select `course_name` from course where `course_id` = '".$course_id."'" );
          $course = $db->Fetch_array( $result );
	  $this->course_name = $course[course_name];
			
          $result = $db->Query( "select * from hw where `course_id` = '".$course_id."' order by hw_id" ); 
          $i = 0;
	  while( $homework = $db->Fetch_array( $result ) )
          {
              $date      = getdate( $homework[deadline] );
	      $this->hw_data[$i]  = array( "hw_name" => $homework[hw_name] ,
		                           "hw_doc" => $homework[hw_doc] , 
		                           "deadline" => $date[year]."/".$date[mon]."/".$date[mday] , 
		                           "hw_id" => $homework[hw_id] );  
	      $i++;
          }
       
       }
	
       function getCourseName()
       {
           return $this->course_name; 
       }
	
       function getHwData()
       {
	   return $this->hw_data;
       }
	

}


       $hw_list = new HomeworkList( $course_id );
       $tpl->assign( "course_id", $course_id );  
       $tpl->assign( "course_name", $hw_list->getCourseName() ); 
       $tpl->assign( "data", $hw_list->getHwData() ); 
       
       session_start();

	   if( $_SESSION['power'] > 1)
           $tpl->display( "./HW_Mgr/list_ma_hw.htm" ); 
       else
           $tpl->display( "./HW_Mgr/list_st_hw.htm" ); 
	
?>