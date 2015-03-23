<?
include "../config.php";
 include "../includes/power_chk.php";
 include "../includes/database.php";

class HomeworkInfo
{
	var $info_data;
	
	function HomeworkInfo($course_id, $hw_id)
	{
	    $db = new DBase();
        $result1 = $db->Query( "select * from course_member, student_information where 
                                student_information.id = course_member.member_id and 
					            course_member.course_id = '".$course_id."'" ); 
        $i = 0;
		while( $st_info = $db->Fetch_array( $result1 ) )
        {
			$result2 = $db->Query( "select * from hw_info where `member_id` = '".$st_info[member_id]."' and `hw_id` = '".$hw_id."' order by `member_id`"); 
			
			if( $hw_info = $db->Fetch_array( $result2 ) )
			    $this->info_data[$i]  = array( "account" => $st_info[member_id], "name"     => $st_info[name], 
			                                   "hw_doc"  => $hw_info[due_doc],   "filename" => $hw_info[filename] ); 
			else 
			    $this->info_data[$i]  = array( "account" => $st_info[member_id], "name" => $st_info[name], "hw_doc" => "無", 
	                                           "filename" => "未繳作業" ); 
			
			$i++;
        }
		
	}
	
	
	function getHwInfo()
	{
		return $this->info_data;
	}
	
}
 
$hw_info = new HomeworkInfo( $course_id, $hw_id ); 
$tpl->assign( "course_id", $course_id ); 
$tpl->assign( "hw_id", $hw_id ); 
$tpl->assign( "data", $hw_info->getHwInfo() ); 
$tpl->display( "./HW_Mgr/list_due.htm" ); 

?>