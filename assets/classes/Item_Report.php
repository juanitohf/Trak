<?php

	
// information field database //

/*
NAME DATABASE :   tuteach
NAME TABLE: Item_Report

FIELD:
		
		Item_Report_Id
		Report
		Item_Id
		
		

*/

	
require_once('Connection.php') ;

class Item_Report
{

	private 
		$Item_Report;

	public
		$Item_Report_Id,
		$Report,
		$Item_Id;
	



		public function __construct()
		{
		$this->Item_Report = new Connection();
		$this->Item_Report = $this->Item_Report->ConnectDB();
		}
		
		
	



	public function Insert_Item_Report($Report,$Item_Id)	{
		
			$query_insert = $this->Item_Report->prepare("INSERT INTO Item_Report (Report,Item_Id) VALUES(?,?)");
			$query_insert->bindParam(1, $Report);
			$query_insert->bindParam(2, $Item_Id);
			$query_insert->execute();	
			
			if($query_insert->rowCount() == 1){
				return 1; // everything is perfect	
			}else{
				return 0; // error creating report
				}
			
		
		} // End insert_catUser function


	


	public function Edit_Item_Report($Item_Report_Id,$Report,$Item_Id){
	
			$query_Edit = $this->Item_Report->prepare("UPDATE Item_Report SET Report = ?, Item_Id= ? WHERE Item_Report_Id = ?");
			$query_Edit->bindParam(1, $Report);
			$query_Edit->bindParam(2, $Item_Id);
			$query_Edit->bindParam(3, $Item_Report_Id);
			$query_Edit->execute();	
				
			if($query_Edit->rowCount() == 1){
				return 1;
			}else{
				return 0;
			}		
						
		} // end function Edit_Item_Report


	
	public function Delete_Item_Report($Item_Report_Id){
	
				$query_Delete = $this->Item_Report->prepare("DELETE QUICK FROM Item_Report WHERE Item_Report_Id = ?");	
				$query_Delete->bindParam(1, $Item_Report_Id);
				$query_Delete->execute();
				
			if($query_Delete->rowCount() == 1){
				return 1;
			}else{
				return 0;
			}		
						
		} // end function Edit_Item_Report

	

} // This is the end of the class Usuario



?>