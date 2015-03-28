<?
include "database.php";

class User
{
	function User($ID, $Password, $Power) {
		$this->ID = $ID;
		$this->Password = $Password;
		$this->Power = $Power;
	}
	
	function setID($ID)             { $this->ID = $ID;             }
	function setPassword($Password) { $this->Password = $Password; }
	function setPower($Power)       { $this->Power = $Power;       }

	function getID()       { return $this->ID;       }
	function getPassword() { return $this->Password; }
	function getPower()    { return $this->Power;    }

	var $ID;
	var $Password;
	var $Power;
}

class Teacher extends User
{
	function Teacher($ID, $Password, $Power, $Name, $Position, $Background, $Research, $Office, $Website, $Email) {
		$this->User($ID, $Password, $Power);
		$this->Name = $Name;
		$this->Position = $Position;
		$this->Background = $Background;
		$this->Research = $Research;
		$this->Office = $Office;
		$this->Website = $Website;
		$this->Email = $Email;
	}
	
	function setName($Name)             { $this->Name = $Name;             }
	function setPosition($Position)     { $this->Position = $Position;     }
	function setBackground($Background) { $this->Background = $Background; }
	function setResearch($Research)     { $this->Research = $Research;     }
	function setOffice($Office)         { $this->Office = $Office;         }
	function setWebsite($Website)       { $this->Website = $Website;       }
	function setEmail($Email)           { $this->Email = $Email;           }

	function getName()       { return $this->Name;       }
	function getPosition()   { return $this->Position;   }
	function getBackground() { return $this->Background; }
	function getResearch()   { return $this->Research;   }
	function getOffice()     { return $this->Office;     }
	function getWebsite()    { return $this->Website;    }
	function getEmail()      { return $this->Email;      }
	
	var $Name;
	var $Position;
	var $Background;
	var $Research;
	var $Office;
	var $Website;
	var $Email;
}

class Student extends User
{
	function Student($ID, $Password, $Power, $Name) {
		$User($ID, $Password, $Power);
		$this->Name = $Name;
	}
	
	function setName($Name) { $this->Name = $Name; }
	function getName() { return $this->Name; }
	
	var $Name;
}

class UserList
{
	function UserList() {
		$db = new DBase();
		$db->defaultDBConnect();
		$db->Query("SET NAMES 'UTF-8'");
		
		if( func_num_args() == 1 ) {
			$result = $db->Query("select * from account " . func_get_arg(0) . " order by power desc, id");
		} else {
			$result = $db->Query("select * from account order by power desc, id");
		}

		$i = 0;
		while( $user = $db->Fetch_array($result) ) {
			$this->_users[$i] = array("id" => $user[id], "power" => $user[power]);
			$i++;
		}
	}

	function getUsers() {
		return $this->_users;
	}

	var $_users;
}

?>