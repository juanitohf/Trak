<?php

/*

Table "user_type"

User_Type_Id
User_Description


*/

require_once('Connection.php');


class user_type
{
	
	private $userType;
	
	public
	$User_Type_Id,
	$User_Description;
	
	
		public function __construct()
		{
			$this->userType = new Connection();
			$this->userType = $this->userType->ConnectDB();
	
		}
		
		
		public function Insert_userType($User_Description)
		{
	
				$query_Insert = $this->userType->prepare("INSERT INTO user_type (User_Description) VALUES(?)" );
				$query_Insert->bindParam(1, $User_Description);
				$query_Insert->execute();
				
			
		}
	 
	 
	 	public function get_Type_User_by_ID($User_Type_Id)
			{
				
				
				
				$query_getUserType = $this->userType->prepare("SELECT * FROM user_type WHERE User_Type_Id = ?");
				$query_getUserType->bindParam(1, $User_Type_Id);
				$query_getUserType->execute();
				//echo $query_getUser->rowCount();
				
				$result = $query_getUserType->fetchAll(PDO::FETCH_ASSOC);
				
				@$result = $result[0];
				
				
				$this->User_Type_Id 	= $result['User_Type_Id'];
				$this->User_Description	= $result['User_Description'];
				$this->userType = null;
				
			}
	 
	 
	 
		public function Delete_userType($User_Type_Id)
		{
		
			
			$query_Delete = $this->userType->prepare("DELETE QUICK FROM user_type WHERE User_Type_Id = ? ");
			$query_Delete->bindParam(1, $User_Type_Id);
			$query_Delete->execute();
			
		}
	
	
} // End of my Users Class