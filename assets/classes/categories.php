<?php

/*

Table "categories"

Category_Id
Category_Description


*/

require_once('Connection.php');


class categories
{
	
	private $category;
	
	public
	$Category_Id,
	$Category_Description;
	
	
		public function __construct()
		{
			$this->category = new Connection();
			$this->category = $this->category->ConnectDB();
	
		}
		
		
		public function Insert_Category($Category_Description)
		{
			
			$query_checkCategory = $this->category->prepare("SELECT * FROM categories WHERE Category_Description = ?");
			$query_checkCategory->bindParam(1,$Category_Description);
			$query_checkCategory->execute();
			
			if($query_checkCategory->rowCount() >= 1)
			{
				return 2; // Because it is repeated
			}else
			{
	
				$query_Insert = $this->category->prepare("INSERT INTO categories (Category_Description) VALUES(?)" );
				$query_Insert->bindParam(1, $Category_Description);
				$query_Insert->execute();
				if($query_Insert->rowCount() == 1){
					return 1; // Success
				}else{
					return 0; // Error no rows affected
				}
			}
			
		}
		
		public function Edit_Category($Category_Id, $Category_Description)
		{
			
				$query_Edit = $this->category->prepare("UPDATE categories SET Category_Description=? WHERE Category_Id = ?" );
				$query_Edit->bindParam(1, $Category_Description);
				$query_Edit->bindParam(2, $Category_Id);
				$query_Edit->execute();
				
				if($query_Edit->rowCount() ==1){
					return 1; // Update successufully
				}else{
					return 0;
					}
			
		}
	 
	 
	 
	 
		public function Delete_Category($Category_Id)
		{
		
			$query_CheckSubcategories = $this->category->prepare("SELECT * FROM subcategories WHERE Category_Id = ? ");
			$query_CheckSubcategories->bindParam(1, $Category_Id);
			$query_CheckSubcategories->execute();
			
			if($query_CheckSubcategories->rowCount() > 0){
			 return 2; // containSubcategories
			}else{
			
				$query_Delete = $this->category->prepare("DELETE QUICK FROM categories WHERE Category_Id = ? ");
				$query_Delete->bindParam(1, $Category_Id);
				$query_Delete->execute();
				
				if($query_Delete->rowCount() == 1){
					return 1; // delete successfully
				}else{
					return 0; // error deleting 
				}
				
			} // End else condition subcategories
		}
	
	
} // End of my Users Class
