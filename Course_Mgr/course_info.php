<?
 include "../config.php";
 include "../includes/database.php";

 class CourseInfo
 { 
     var $course_info;
	 var $course_member;
	
	 function CourseInfo( $course_id )
	 {
	     $db = new DBase();		 
		 $result = $db->Query( "select * from course where course_id = '".$course_id."'" );
		 if( $info = $db->Fetch_array( $result ) )
         {
	         $this->course_info  =  array( "course_name" => $info[course_name],
			 	                           "course_id"   => $info[course_id], 
				                           "course_doc"  => $info[course_doc] );
		 }

		 
		 $result = $db->Query( "select * from course_member where course_id = '".$course_id."' order by member_id" );      
         $i = 0;
		 while( $member = $db->Fetch_array( $result ) )
         {
	         $this->course_member[$i]  =  $member[member_id];
             $i++;
		 }
	 
	 }
	
	
	 function getCourseInfo()
	 {
	     return $this->course_info;
	 }

	  function getCourseMember()
	 {
	     return $this->course_member;
	 }
	
 }


 $course_info = new CourseInfo( $course_id );
 $tpl->assign( "info", $course_info->getCourseInfo() );    
 $tpl->assign( "member", $course_info->getCourseMember() ); 
 $tpl->display( "./Course_Mgr/course_info.htm" ); 
    
?>