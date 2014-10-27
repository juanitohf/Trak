<?php

/*

Table "resetPass"

resetPass_Id
email
Acode
dateTime

*/

require_once('Connection.php');


class resetPass
{
	
	private $resetPass;
	
	public
	$resetPass_Id,
	$email,
	$Acode,
	$dateTime;
	
	
		public function __construct()
		{
			$this->resetPass = new Connection();
			$this->resetPass = $this->resetPass->ConnectDB();
	
		}
		
		
		public function Insert_resetPass($email,$Acode,$dateTime)
		{
			try{
				
				$insertResetP = $this->resetPass->prepare("INSERT INTO resetPass (email,Acode,dateTime) VALUES(?,?,?)");
				$insertResetP->bindParam(1,$email);
				$insertResetP->bindParam(2,$Acode);
				$insertResetP->bindParam(3,$dateTime );
				$insertResetP->execute();
			
				return true;
				$this->resetPass = null;
			}catch(PDOExecption $e) { 
				
				return false;
				$this->resetPass = null;
			}
			
		} // This is the end of my function insert_resetPass
	 
	 
	 	
	 
	 
		public function Delete_resetPass($resetPass_Id)
		{
			try{
			
				$query_Delete = $this->resetPass->prepare("DELETE QUICK FROM resetPass WHERE resetPass_Id = ? ");
				$query_Delete->bindParam(1, $resetPass_Id);
				$query_Delete->execute();
				
				return true;
				$this->resetPass = null;
				
			}catch(PDOExecption $e){
				return false;
				$this->resetPass = null;
				
				}
			
		}
	
	
} // End of myLesson Class