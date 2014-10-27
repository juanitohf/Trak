<?php

/*

Table "subcategories"

Subcategory_id
Subcategory_description
Category_Id


*/

require_once('Connection.php');


class subcategories
{
	
	private $subcategory;
	
	public
	$Subcategory_id,
	$Subcategory_description,
	$Category_Id;
	
	
		public function __construct()
		{
			$this->subcategory = new Connection();
			$this->subcategory = $this->subcategory->ConnectDB();
	
		}
		
		
		public function Insert_Subcategory($Subcategory_description,$Category_Id)
		{
			
			$query_checkSubCategory = $this->subcategory->prepare("SELECT * FROM subcategories WHERE Subcategory_description = ? AND Category_Id = ?");
			$query_checkSubCategory->bindParam(1,$Subcategory_description);
			$query_checkSubCategory->bindParam(2,$Category_Id);
			$query_checkSubCategory->execute();
			
			if($query_checkSubCategory->rowCount() >= 1)
			{
				return 2;
				
			}else
			{
	
				$query_Insert = $this->subcategory->prepare("INSERT INTO subcategories (Subcategory_description,Category_Id) VALUES(?,?)");
				$query_Insert->bindParam(1, $Subcategory_description);
				$query_Insert->bindParam(2, $Category_Id);
				$query_Insert->execute();
				if($query_Insert->rowCount() == 1){
					return 1;
				}else{
					return 0;
					}
			}
			
		} // end Insert_Subcategory 
		
		
		
public function Edit_SubCategory($Subcategory_description,$Subcategory_id)
		{
			
			
			
			$query_checkSubCategory2 = $this->subcategory->prepare("SELECT * FROM subcategories WHERE Subcategory_description = ? AND Category_id = ?");
			$query_checkSubCategory2->bindParam(1,$Subcategory_description);
			$query_checkSubCategory2->bindParam(2,$Category_Id);
			$query_checkSubCategory2->execute();
			
			if($query_checkSubCategory2->rowCount() >= 1)
			{
				return 2; // Repeated
				
			}else
			{
			$query_Edit = $this->subcategory->prepare("UPDATE subcategories SET Subcategory_description=? WHERE Subcategory_id = ?" );
			$query_Edit->bindParam(1, $Subcategory_description);
			$query_Edit->bindParam(2, $Subcategory_id);
			$query_Edit->execute();
			
			if($query_Edit->rowCount() ==1){
				return 1; // Success
			}else{
				return 0; // Error
				}
			
			}
		}
	 
	 
	 
		function Delete_Subcategory($Subcategory_id)
		{
		
			
			$query_Delete = $this->subcategory->prepare("DELETE QUICK FROM subcategories WHERE Subcategory_id = ? ");
			$query_Delete->bindParam(1, $Subcategory_id);
			$query_Delete->execute();
			
			if($query_Delete->rowCount() == 1){
				return 1; // delete success
			}else{
				return 0; // error to delete subCategeoruy
			}
			
			
		}
	
	
	
} // End of my Users Class

	
	