<?
include "../config.php";
 include "../includes/power_chk.php";
 include "../includes/database.php";

switch( $action )
{
    case "insert":
	 	include "add_hw.inc";
		include "list_hw.inc";		  
        break;
	case "delete":
		//include "list_hw.inc";	
		include "del_hw.php";
	    break;
	case "update":
	    include "add_hw.inc";
		include "list_hw.inc";  
	    break;
      
    default:      
        if( $UI != "" )
		    include "add_hw.inc";   
		else 
		    include "list_hw.inc";    	  
 
 }


?> 
