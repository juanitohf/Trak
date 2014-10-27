<?php

/*

Table `grants`

Grant_Id
Grant_name
Grant_email
Grant_phone	

*/

require_once('Connection.php');


class grants
{
	
	private $Grant;
	
	public
	$Grant_Id,
	$Grant_name,
	$Grant_email,
	$Grant_phone;
	
	
		public function __construct()
		{
			$this->Grant = new Connection();
			$this->Grant = $this->Grant->ConnectDB();
	
		}
		
		
		public function Insert_Grant($Grant_name,$Grant_email,$Grant_phone)
		{
			
	
			$query_grant = $this->Grant->prepare("SELECT * FROM grants WHERE Grant_name = ? OR Grant_email = ?");
			$query_grant->bindParam(1,$Grant_name);
			$query_grant->bindParam(2,$Grant_email);
			$query_grant->execute();
			
			if($query_grant->rowCount() >= 1)
			{
				return 2;
				
			}else
			{
				
				$query_Insert = $this->Grant->prepare("INSERT INTO grants (Grant_name,Grant_email,Grant_phone) VALUES(?,?,?)" );
				$query_Insert->bindParam(1, $Grant_name);
				$query_Insert->bindParam(2, $Grant_email);
				$query_Insert->bindParam(3, $Grant_phone);
				$query_Insert->execute();
			
				if($query_Insert->rowCount() == 1){
					return 1; // success	
				}else{
					return 0; // error
				}
			
			}
		}
		
		
		
		
		
		
		
		public function Update_Grant($Grant_Id,$Grant_name,$Grant_email,$Grant_phone){
			
			
				
		$query_Update = $this->Grant->prepare("UPDATE grants SET Grant_name=?,Grant_email=?,Grant_phone=? WHERE Grant_Id=?");	
			$query_Update->bindParam(1, $Grant_name);
			$query_Update->bindParam(2, $Grant_email);
			$query_Update->bindParam(3, $Grant_phone);
			$query_Update->bindParam(4, $Grant_Id);
			$query_Update->execute();
			
			if($query_Update->rowCount() == 1){
				return 1; // success
			}else{
				return 0; // error
				}
			
			
			
		}
		
		
	 
	 
	 
	 
	 
	
	
	
	
	
			public function get_Grant_Info_by_ID($Grant_Id)
			{
				
				$query_getGrant = $this->Grant->prepare("SELECT * FROM grants WHERE Grant_Id = ?");
				$query_getGrant->bindParam(1, $Grant_Id);
				$query_getGrant->execute();
				$result = $query_getGrant->fetchAll(PDO::FETCH_ASSOC);
				@$result = $result[0];
				
				
				$this->Grant_Id		= $result['Grant_Id'];
				$this->Grant_name	= $result['Grant_name'];	
				$this->Grant_email	= $result['Grant_email'];
				$this->Grant_phone	= $result['Grant_phone'];
				
				
			}
	
	
		
		
		
		public function Delete_Grant($Grant_Id)
		{
		
			
			$query_Delete = $this->Grant->prepare("DELETE QUICK FROM grants WHERE Grant_Id = ? ");
			$query_Delete->bindParam(1, $Grant_Id);
			$query_Delete->execute();
			
			if($query_Delete->rowCount() == 1){
				return 1;	
			}else{
				return 2;
				}
			
		}
		
		
		
		
	
	
} // End of my Users Class