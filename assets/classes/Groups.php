<?php

/*

Table "Groups"

GroupId
Group_Description
Start_Date	date
End_Date	date
Users_Group
Instructor_Group
*/

require_once('Connection.php');


class Groups
{
	
	private $Group;
	
	public
	$GroupId,
	$Group_Description,
	$Start_Date,
	$End_Date,	
	$Users_Group,
	$Instructor_Group;
	
	
		public function __construct()
		{
			$this->Group = new Connection();
			$this->Group = $this->Group->ConnectDB();
	
		}
		
		
		public function Insert_Group($Group_Description,$Start_Date,$End_Date,$Users_Group,$Instructor_Group)
		{
					
				try{
		
					$query_checkGroup = $this->Group->prepare("SELECT * FROM Groups WHERE Group_Description = ?");
					$query_checkGroup->bindParam(1,$Group_Description);
					$query_checkGroup->execute();
					
					
				}catch(PDOExecption $e) { 
				
					 print "Error!: " . $e->getMessage() . "</br>"; 
				}	 
			
			if($query_checkGroup->rowCount() >= 1)
			{
				return 2; // It is repeated
				
			}else
			{
				
				try{
					
					$query_Insert = $this->Group->prepare("INSERT INTO Groups (Group_Description,Start_Date,End_Date) VALUES(?,?,?)");
					$query_Insert->bindParam(1, $Group_Description);
				  	$query_Insert->bindParam(2, $Start_Date);
				  	$query_Insert->bindParam(3, $End_Date);
				  	$query_Insert->execute();
					
			  
			  
			  //// At this point It is necessary to find the last id group inserted ////
			  
			  		$IdGroup = $this->Group->lastInsertId();
					
					$Users = explode(",",$Users_Group);
					$sizeOfArrayUser = sizeof($Users);
					
					$Instructors = explode(",",$Instructor_Group);
					$sizeOfArrayInstructor = sizeof($Instructors);
					
					
					//print_r($Instructors);
					$insertUser = new Groups();
					
					
					
					// This is the loop to insert all users
					for($i = 0; $i < $sizeOfArrayUser; $i++){
						$insertUser->Add_User_MemberShip($IdGroup,$Users[$i]);
					} 
					
					
					for($s = 0; $s < $sizeOfArrayInstructor; $s++){
							
						$insertUser->Add_User_MemberShip($IdGroup,$Instructors[$s]);
							
					}
					
			 /// At this point is necessary to find the the array of each User_group to update with the new information. 		
					
					
			  		
			  
				return 1; //Success
				}catch(PDOExecption $e) { 
				return 0; // Error
					print "Error!: " . $e->getMessage() . "</br>"; 
   				 } 
				 
			} // End else
			
			
		} // End insert group function
		
		
		
		
		public function Add_User_MemberShip($GroupId,$User_Id){
			
			try{
					$query_Insert = $this->Group->prepare("INSERT INTO MemberShips (GroupId,User_Id) VALUES(?,?)");
					$query_Insert->bindParam(1, $GroupId);
				  	$query_Insert->bindParam(2, $User_Id);
				  	$query_Insert->execute();
					
					
			}catch(PDOExecption $e) { 
					print "Error!: " . $e->getMessage() . "</br>"; 
   				 } 
			
			}  // End Add GroupUser
		
		
		
		
		public function UpdateGroup($Group_Description,$Start_Date,$End_Date,$Users_Group,$Instructor_Group,$GroupId){
			
			try{
				$query_Update = $this->Group->prepare("UPDATE Groups SET Group_Description=?,Start_Date=?,End_Date=? WHERE GroupId = ?");	
				$query_Update->bindParam(1, $Group_Description);
				$query_Update->bindParam(2, $Start_Date);
				$query_Update->bindParam(3, $End_Date);
				$query_Update->bindParam(4, $GroupId);
				$query_Update->execute();
			
			
			}catch(PDOExecption $e) { 
					print "Error!: " . $e->getMessage() . "</br>"; 
   				 } 
				 
				 
				 
				 // Now I need to delete previos members en introduce the new one. 
			try{
				 
				 // Delete previous users
				 $DeletePreviousMemebers = new Groups();
				 $DeletePreviousMemebers->deleteMembersById($GroupId);
				 
				 
				 //Introduce new users
				 
				 
				 	$Users = explode(",",$Users_Group);
					$sizeOfArrayUser = sizeof($Users);
					
					$Instructors = explode(",",$Instructor_Group);
					$sizeOfArrayInstructor = sizeof($Instructors);
					
					
					//print_r($Instructors);
					$insertUser = new Groups();
					
					
					// This is the loop to insert all users
					for($i = 0; $i < $sizeOfArrayUser; $i++){
						$insertUser->Add_User_MemberShip($GroupId,$Users[$i]);
					} 
					
					
					for($s = 0; $s < $sizeOfArrayInstructor; $s++){
							
						$insertUser->Add_User_MemberShip($GroupId,$Instructors[$s]);
							
					}
					
					return 1;
				 
			}catch(PDOExecption $e) { 
					print "Error!: " . $e->getMessage() . "</br>"; 
					return 0;
   				 } 
				 
			} // End function UpdateGroup
		
		
		
		function getInfoGroupById($GroupId){
			
				$query_getGroup= $this->Group->prepare("SELECT * FROM Groups WHERE GroupId = ?");
				$query_getGroup->bindParam(1, $GroupId);
				$query_getGroup->execute();
				$result = $query_getGroup->fetchAll(PDO::FETCH_ASSOC);
				@$result = $result[0];
				
				$this->GroupId				= $result['GroupId'];
				$this->Group_Description	= $result['Group_Description'];
				$this->Start_Date			= $result['Start_Date'];
				$this->End_Date				= $result['End_Date'];
				
				
				
				
			}
			
			
		
		
		function deleteMembersById($GroupId){
			
			$query_Delete = $this->Group->prepare("DELETE QUICK FROM  MemberShips WHERE GroupId = ?");	
			$query_Delete->bindParam(1, $GroupId);
			$query_Delete->execute();
			
			
			}
		
		
	
	
} // End of my  Class Group
