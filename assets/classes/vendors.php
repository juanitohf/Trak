<?php

/*

Table `vendors`

 
Vendor_Id
Vendor_name	
Vendor_email
Vendor_phone
Vendor_web


*/

require_once('Connection.php');


class vendors
{
	
	private $Vendor;
	
	public
	$Vendor_Id,
	$Vendor_name,	
	$Vendor_email,
	$Vendor_phone,
	$Vendor_web;
	
	
		public function __construct()
		{
			$this->Vendor = new Connection();
			$this->Vendor = $this->Vendor->ConnectDB();
	
		}
		
		
public function Insert_Vendor($Vendor_name,$Vendor_email,$Vendor_phone,$Vendor_web)
		{
			
			$query_vendor = $this->Vendor->prepare("SELECT * FROM vendors WHERE Vendor_name = ? OR Vendor_email = ?");
			$query_vendor->bindParam(1,$Vendor_name);
			$query_vendor->bindParam(2,$Vendor_email);
			$query_vendor->execute();
			
			if($query_vendor->rowCount() >= 1)
			{
				return 2;
				
			}else
			{
				
				$query_Insert = $this->Vendor->prepare("INSERT INTO vendors (Vendor_name,Vendor_email,Vendor_phone,Vendor_web) VALUES(?,?,?,?)" );
				$query_Insert->bindParam(1, $Vendor_name);
				$query_Insert->bindParam(2, $Vendor_email);
				$query_Insert->bindParam(3, $Vendor_phone);
				$query_Insert->bindParam(4, $Vendor_web);
				$query_Insert->execute();
				
				if($query_Insert->rowCount() == 1){
					return 1;
				}else{
					return 2;
				}
			
			}
		}
		
		
		
		
		
		
		
public function Update_Vendor($Vendor_Id,$Vendor_name,$Vendor_email,$Vendor_phone,$Vendor_web)
		{
		
					
		$query_Update = $this->Vendor->prepare("UPDATE vendors SET Vendor_name=?,Vendor_email=?,Vendor_phone=?,Vendor_web=? WHERE Vendor_Id=?");	
			$query_Update->bindParam(1, $Vendor_name);
			$query_Update->bindParam(2, $Vendor_email);
			$query_Update->bindParam(3, $Vendor_phone);
			$query_Update->bindParam(4, $Vendor_web);
			$query_Update->bindParam(5, $Vendor_Id);
			$query_Update->execute();
			
				if($query_Update->rowCount() == 1){
					return 1; // success
				}else{
					return 0; // error
				}	
			
			
		}
		
		
	 
	 
	 
	 
	 
			function get_Vendor_Info_by_Email($Vendor_email)
			{
				
				$query_getVendor = $this->Vendor->prepare("SELECT * FROM vendors WHERE Vendor_email = ?");
				$query_getVendor->bindParam(1, $Vendor_email);
				$query_getVendor->execute();
				$result = $query_getVendor->fetchAll(PDO::FETCH_ASSOC);
				@$result = $result[0];
				
				
				$this->Vendor_Id	= $result['Vendor_Id'];
				$this->Vendor_name	= $result['Vendor_name'];	
				$this->Vendor_email	= $result['Vendor_email'];
				$this->Vendor_phone	= $result['Vendor_phone'];
				$this->Vendor_web	= $result['Vendor_web'];
	
			
			}
	
	
	
	
	
			function get_Vendor_Info_by_ID($Vendor_Id)
			{
				
				$query_getVendor = $this->Vendor->prepare("SELECT * FROM vendors WHERE Vendor_Id = ?");
				$query_getVendor->bindParam(1, $Vendor_Id);
				$query_getVendor->execute();
				$result = $query_getVendor->fetchAll(PDO::FETCH_ASSOC);
				@$result = $result[0];
				
				
				$this->Vendor_Id	= $result['Vendor_Id'];
				$this->Vendor_name	= $result['Vendor_name'];	
				$this->Vendor_email	= $result['Vendor_email'];
				$this->Vendor_phone	= $result['Vendor_phone'];
				$this->Vendor_web	= $result['Vendor_web'];
				
			}
	
	
		
		
		
		public function Delete_Vendor($Vendor_Id)
		{
		
			
			$query_Delete = $this->Vendor->prepare("DELETE QUICK FROM vendors WHERE Vendor_Id = ? ");
			$query_Delete->bindParam(1, $Vendor_Id);
			$query_Delete->execute();
		
			if($query_Delete->rowCount() == 1){
				return 1; // success	
			}else{
				return 0; // error
				}
		
		}
		
		
		
		
	
	
} // End of my Users Class