<?php

/*

Table "users"

User_Id
Name
MidleName
Last
Password
Temple_Id
Image
Email
Cellphone
HomePhone
WorkPhone
Address1
Address2
City
State
Zip
Website
User_Type_Id
Permitions


*/

require_once('Connection.php');


class Users
{
	
	private $User;
	
	public
	$User_Id,
	$Name,
	$MidleName,
	$Last,
	$Password,
	$Temple_Id,
	$Image,
	$Email,
	$Cellphone,
	$Address1,
	$Address2,
	$City,
	$State,
	$Zip,
	$HomePhone,
	$WorkPhone,
	$Website,
	$User_Type_Id,
	$Permitions;
	
	
		public function __construct()
		{
			$this->User = new Connection();
			$this->User = $this->User->ConnectDB();
	
		}
		
		
		public function Insert_User($Name,$MidleName,$Last,$Password,$Temple_Id,$Image,$Email,$Cellphone,$Address1,$Address2,$City,$State,$Zip,$HomePhone,
	$WorkPhone,$Website,$User_Type_Id,$Permitions)
		{
			$Password = md5($Password);
			
			
			$query_checkEmail = $this->User->prepare("SELECT * FROM users WHERE Email = ?");
			$query_checkEmail->bindParam(1,$Email);
			$query_checkEmail->execute();
			
			if($query_checkEmail->rowCount() >= 1)
			{
				return 2;
				
			}else
			{
				
				$query_Insert = $this->User->prepare("INSERT INTO users (Name,MidleName,Last,Password,Temple_Id,Image,Email,Cellphone,HomePhone,WorkPhone,Address1,Address2,City,State,Zip,Website,User_Type_Id,Permitions) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)" );
				$query_Insert->bindParam(1, $Name);
				$query_Insert->bindParam(2, $MidleName);
				$query_Insert->bindParam(3, $Last);
				$query_Insert->bindParam(4, $Password);
				$query_Insert->bindParam(5, $Temple_Id);
				$query_Insert->bindParam(6, $Image);
				$query_Insert->bindParam(7, $Email);
				$query_Insert->bindParam(8, $Cellphone);
				
				$query_Insert->bindParam(9,  $HomePhone);
				$query_Insert->bindParam(10, $WorkPhone);
				$query_Insert->bindParam(11, $Address1);
				$query_Insert->bindParam(12, $Address2);
				$query_Insert->bindParam(13, $City);
				$query_Insert->bindParam(14, $State);
				$query_Insert->bindParam(15, $Zip);
				$query_Insert->bindParam(16, $Website);
				$query_Insert->bindParam(17, $User_Type_Id);
				$query_Insert->bindParam(18, $Permitions);
				$query_Insert->execute();
				
				if($query_Insert->rowCount() == 1){
					return 1;
					
				}else{
					return 0;
					}
	
				
				
			}
		}
		
		
		
		
		
		
		
		public function Update_User($User_Id,$Name,$MidleName,$Last,$Temple_Id,$Image,$Email,$Cellphone,$Address1,$Address2,$City,$State,$Zip,$HomePhone,
	$WorkPhone,$Website,$User_Type_Id,$Permitions)
	{
			
			if(empty($Image)){$Image = "";}
			 $User_Id = (int)($User_Id);
			 $Temple_Id = (int)($Temple_Id);
		
			
				
				$query_Update = $this->User->prepare("UPDATE users SET Name=?,MidleName=?,Last=?,Temple_Id=?, Image=?, Email=?, Cellphone=?,HomePhone=?, WorkPhone=?, Address1=?, Address2=?, City=?, State=?, Zip=?, Website=?, User_Type_Id=?, Permitions=?  WHERE User_Id = ?");
				
				$query_Update->bindParam(1, $Name);
				$query_Update->bindParam(2, $MidleName);
				$query_Update->bindParam(3, $Last);
				$query_Update->bindParam(4, $Temple_Id);
				$query_Update->bindParam(5, $Image);
				$query_Update->bindParam(6, $Email);
				$query_Update->bindParam(7, $Cellphone);		
				$query_Update->bindParam(8, $HomePhone);
				$query_Update->bindParam(9, $WorkPhone);
				$query_Update->bindParam(10, $Address1);
				$query_Update->bindParam(11, $Address2);
				$query_Update->bindParam(12, $City);
				$query_Update->bindParam(13, $State);
				$query_Update->bindParam(14, $Zip);
				$query_Update->bindParam(15, $Website);
				$query_Update->bindParam(16, $User_Type_Id);
				$query_Update->bindParam(17, $Permitions);
				$query_Update->bindParam(18, $User_Id);
				$query_Update->execute();
				
			if($query_Update->rowCount() == 1){
				return 1; // update successufful
			}else{
				return 0; // No rows affected
					}
				
			
		} // end function update
		
		
	 
	 
	 
	 		
		
		public function Update_User2($User_Id,$Name,$MidleName,$Last,$Temple_Id,$Image,$Email,$Cellphone,$Address1,$Address2,$City,$State,$Zip,$HomePhone,
	$WorkPhone,$Website,$User_Type_Id,$Permitions,$password)
	{
			
			if(empty($Image)){$Image = "";}
			 $User_Id = (int)($User_Id);
			 $Temple_Id = (int)($Temple_Id);
			
				$password = md5($password);
			
				
				$query_Update = $this->User->prepare("UPDATE users SET Name=?,MidleName=?,Last=?,Temple_Id=?, Image=?, Email=?, Cellphone=?,HomePhone=?, WorkPhone=?, Address1=?, Address2=?, City=?, State=?, Zip=?, Website=?, User_Type_Id=?, Permitions=?, Password=?  WHERE User_Id = ?");
				
				$query_Update->bindParam(1, $Name);
				$query_Update->bindParam(2, $MidleName);
				$query_Update->bindParam(3, $Last);
				$query_Update->bindParam(4, $Temple_Id);
				$query_Update->bindParam(5, $Image);
				$query_Update->bindParam(6, $Email);
				$query_Update->bindParam(7, $Cellphone);		
				$query_Update->bindParam(8, $HomePhone);
				$query_Update->bindParam(9, $WorkPhone);
				$query_Update->bindParam(10, $Address1);
				$query_Update->bindParam(11, $Address2);
				$query_Update->bindParam(12, $City);
				$query_Update->bindParam(13, $State);
				$query_Update->bindParam(14, $Zip);
				$query_Update->bindParam(15, $Website);
				$query_Update->bindParam(16, $User_Type_Id);
				$query_Update->bindParam(17, $Permitions);
				$query_Update->bindParam(18, $password);
				$query_Update->bindParam(19, $User_Id);
				$query_Update->execute();
				
			
				
			
		}
		
		
	 
	 
	 
	 
	 
	 
			function get_User_Info_by_Email($Email)
			{
				
				$query_getUser = $this->User->prepare("SELECT * FROM users WHERE Email = ?");
				$query_getUser->bindParam(1, $Email);
				$query_getUser->execute();
				$result = $query_getUser->fetchAll(PDO::FETCH_ASSOC);
				@$result = $result[0];
				
				
				$this->User_Id 		= $result['User_Id'];
				$this->Name			= $result['Name'];
				$this->MidleName	= $result['MidleName'];
				$this->Last			= $result['Last'];
				$this->Password		= $result['Password'];
				$this->Temple_Id	= $result['Temple_Id'];
				$this->Image		= $result['Image'];
				$this->Email		= $result['Email'];
				$this->Cellphone	= $result['Cellphone'];
				$this->Address1		= $result['Address1'];
				$this->Address2		= $result['Address2'];
				$this->City			= $result['City'];
				$this->State		= $result['State'];
				$this->Zip			= $result['Zip'];
				$this->HomePhone	= $result['HomePhone'];
				$this->WorkPhone	= $result['WorkPhone'];
				$this->Website		= $result['Website'];
				$this->User_Type_Id	= $result['User_Type_Id'];
				$this->Permitions	= $result['Permitions'];
				
			
			}
	
	
	
	
	
			function get_User_Info_by_ID($User_Id)
			{
				
				
				
				$query_getUser = $this->User->prepare("SELECT * FROM users WHERE User_Id = ?");
				$query_getUser->bindParam(1, $User_Id);
				$query_getUser->execute();
				
				
				$result = $query_getUser->fetchAll(PDO::FETCH_ASSOC);
				
				@$result = $result[0];
				
				
				$this->User_Id 		= $result['User_Id'];
				$this->Name			= $result['Name'];
				$this->MidleName	= $result['MidleName'];
				$this->Last			= $result['Last'];
				$this->Password		= $result['Password'];
				$this->Temple_Id	= $result['Temple_Id'];
				$this->Image		= $result['Image'];
				$this->Email		= $result['Email'];
				$this->Cellphone	= $result['Cellphone'];
				$this->Address1		= $result['Address1'];
				$this->Address2		= $result['Address2'];
				$this->City			= $result['City'];
				$this->State		= $result['State'];
				$this->Zip			= $result['Zip'];
				$this->HomePhone	= $result['HomePhone'];
				$this->WorkPhone	= $result['WorkPhone'];
				$this->Website		= $result['Website'];
				$this->User_Type_Id	= $result['User_Type_Id'];
				$this->Permitions	= $result['Permitions'];
				
			}
			
			
			function get_User_Info_by_TempleID($Temple_Id)
			{
				
				$Temple_Id;
				$query_getUser = $this->User->prepare("SELECT * FROM users WHERE Temple_Id = ?");
				$query_getUser->bindParam(1, $Temple_Id);
				$query_getUser->execute();
				//$query_getUser->rowCount();
				
				$result = $query_getUser->fetchAll(PDO::FETCH_ASSOC);
				
				@$result = $result[0];
				
				
				$this->User_Id 		= $result['User_Id'];
				$this->Name			= $result['Name'];
				$this->MidleName	= $result['MidleName'];
				$this->Last			= $result['Last'];
				$this->Password		= $result['Password'];
				$this->Temple_Id	= $result['Temple_Id'];
				$this->Image		= $result['Image'];
				$this->Email		= $result['Email'];
				$this->Cellphone	= $result['Cellphone'];
				$this->Address1		= $result['Address1'];
				$this->Address2		= $result['Address2'];
				$this->City			= $result['City'];
				$this->State		= $result['State'];
				$this->Zip			= $result['Zip'];
				$this->HomePhone	= $result['HomePhone'];
				$this->WorkPhone	= $result['WorkPhone'];
				$this->Website		= $result['Website'];
				$this->User_Type_Id	= $result['User_Type_Id'];
				$this->Permitions	= $result['Permitions'];
				
			}
	
	
		public function Login($Email,$Password)
		{
			
			   $Password = md5($Password);
			
				$query_Login = $this->User->prepare("SELECT * FROM users WHERE Email = ? AND Password = ?");
				$query_Login->bindParam(1, $Email);
				$query_Login->bindParam(2, $Password);
				$query_Login->execute();
				
					if($query_Login->rowCount() == 1)
						{
							
							session_start();
							
							$_SESSION['Email'] = $Email;
							$_SESSION['Password'] = $Password;
							header("Location: ../weblg/Users.php");
							$this->User = null;
							
						}else
							{
								?>
                                	<script>
									alert("Wrong Email and Password");
									location.href = "../index.php"; 
									</script>
                                
                                <?php
								
								
							}
	
		
		}
		
		
		
		
		function Delete_User($User_Id)
		{
		
			
			$query_Delete = $this->User->prepare("DELETE QUICK FROM users WHERE User_Id = ?");
			$query_Delete->bindParam(1, $User_Id);
			$query_Delete->execute();
			
			if($query_Delete->rowCount() == 1){
				return 1; // Item delete successuful
			}else{
				return 0; // No rows affected
				}
			
			
		}
		
	
	
	function sendEmail($to, $subject, $body){
			$headersEmail = 'From: TUteach@temple.edu';
			
			if(mail($to, $subject, $body, $headersEmail)){
						return 1; // Email success
				}else{
						return 0; // Email error
				}
			} // This is the end of my sendEmail function
			
		
	


public function Update_User_Password($Email,$Password)
	{
			echo $Email;
				$Password = md5($Password);
				$Password = (string)$Password;
				echo $Password;

			try{
				$query_Update = $this->User->prepare("UPDATE users SET Password = ? WHERE Email = ?");
				$query_Update->bindParam(1, $Password);
				$query_Update->bindParam(2, $Email);
				$query_Update->execute();
				
				return true;
			}catch(PDOException $e){
				
				return false;
				}
			
				
			
		}
		
		
		
	
	
} // End of my Users Class
