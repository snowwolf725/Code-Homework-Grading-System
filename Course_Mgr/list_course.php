<?
 include "../config.php";
 include "../includes/database.php";
 
 class CourseList
 { 
     var $course_data;
	
	 function CourseList( $user_id )
	 {
		 $db = new DBase();
		 if( $user_id ) {
			$result = $db->Query( "select * from account, course, course_member where account.id = '".$user_id."' and course_member.member_id = account.id and course.course_id = course_member.course_id" );
		 } else {
			$result = $db->Query( "select * from course" );
		 }
         
         $i = 0;
		 while( $course = $db->Fetch_array( $result ) )
         {
	        $this->course_data[$i]  =  array ( course_name => $course[course_name] ,
			                                   course_id   => $course[course_id]   );	 	                               
			$i++;
         }
	 }
	
	
	 function getCourseData()
	 {
	     return $this->course_data;
	 }
	
 }

    
	session_start();
	
	if( $_SESSION['power'] == 3 ) {
		$course_list = new CourseList("");
	} else {
		$course_list = new CourseList( $_SESSION['account'] );
	}
	
    $tpl->assign( "data", $course_list->getCourseData() );    
    $tpl->display( "./Course_Mgr/list_course.html" ); 

?>