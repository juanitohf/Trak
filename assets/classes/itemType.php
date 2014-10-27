<?php

/*

Table "itemType"

ItemType_Id
ItemType_description


*/

require_once('Connection.php');


class itemType
{
	
	private $itemType;
	
	public
	$ItemType_Id,
	$ItemType_description;
	
	
		public function __construct()
		{
			$this->itemType = new Connection();
			$this->itemType = $this->itemType->ConnectDB();
	
		}
		
		
		public function Insert_ItemType($ItemType_description)
		{
	
				$query_Insert = $this->itemType->prepare("INSERT INTO itemType (ItemType_description) VALUES(?)");
				$query_Insert->bindParam(1, $ItemType_description);
				$query_Insert->execute();
		
			
		}
	 
	 
	 
		function Delete_ItemType($ItemType_Id)
		{
		
			
			$query_Delete = $this->itemType->prepare("DELETE QUICK FROM itemType WHERE ItemType_Id = ? ");
			$query_Delete->bindParam(1, $ItemType_Id);
			$query_Delete->execute();
		
		}
	
	
	
} // End of my Users Class

	
	