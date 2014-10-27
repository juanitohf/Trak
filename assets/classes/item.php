<?php

/*
table 'items'

	Item_Id
	Item_description
	Reference
	Imagen
	Initial_Quantity
	Stock_Quantity
	Lessons_item
	Date
	Expiration_date
	Price
	Grant_Id
	Vendor_Id
	Category_Id
	Subcategory_id
	ItemType_Id
	Building
	Cabine
	Room
	Department
	Location_Description
	item_report
	Grp

*/

require_once('Connection.php');


class item
{
	
	private $Item;
	
	public
	$Item_Id,
	$Item_description,
	$Reference,
	$Imagen,
	$Initial_Quantity,
	$Stock_Quantity,
	$Lessons_item,
	$Date,
	$Expiration_date,
	$Price,
	$Grant_Id,
	$Vendor_Id,
	$Category_Id,
	$Subcategory_id,
	$ItemType_Id,
	$Building,
	$Cabine,
	$Room,
	$Department,
	$Location_Description,
	$item_report,
	$Grp;
	
	
		public function __construct()
		{
			$this->Item = new Connection();
			$this->Item = $this->Item->ConnectDB();
	
		}
		
		
		public function Insert_Item($Item_description,$Reference,$Imagen,$Initial_Quantity,$Lessons_item,$Date,$Expiration_date,$Price,$Grant_Id,$Vendor_Id,$Category_Id,$Subcategory_id,$ItemType_Id,$Building,$Cabine,$Room,$Department,$Location_Description,$Grp)
		{
	
	
			try{
				
				$Stock_Quantity = $Initial_Quantity;
				$query_Insert = $this->Item->prepare("INSERT INTO items (Item_description,Reference,Imagen,Initial_Quantity,Stock_Quantity,Lessons_item,Date,Expiration_date,Price,Grant_Id,Vendor_Id,Category_Id,Subcategory_id,ItemType_Id,Building,Cabine,Room,Department,Location_Description,Grp) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				
				
				$query_Insert->bindParam(1,$Item_description);
				$query_Insert->bindParam(2,$Reference);
				$query_Insert->bindParam(3,$Imagen);
				$query_Insert->bindParam(4,$Initial_Quantity);
				$query_Insert->bindParam(5,$Stock_Quantity);
				$query_Insert->bindParam(6,$Lessons_item);
				$query_Insert->bindParam(7,$Date);
				$query_Insert->bindParam(8,$Expiration_date);
				$query_Insert->bindParam(9,$Price);
				$query_Insert->bindParam(10,$Grant_Id);
				$query_Insert->bindParam(11,$Vendor_Id);
				$query_Insert->bindParam(12,$Category_Id);
				$query_Insert->bindParam(13,$Subcategory_id);
				$query_Insert->bindParam(14,$ItemType_Id);
				$query_Insert->bindParam(15,$Building);	
				$query_Insert->bindParam(16,$Cabine);
				$query_Insert->bindParam(17,$Room);
				$query_Insert->bindParam(18,$Department);	
				$query_Insert->bindParam(19,$Location_Description);	
				$query_Insert->bindParam(20,$Grp);	
				$query_Insert->execute();
				
				if($query_Insert->rowCount() == 1){
				return 1;
				}else{
					return 0;	
					}
				
				
			}catch(Exception $e) {
    			echo 'Error insert item: ', $e->getMessage(), "\n";
			return 0;
		}
		
	
		
} // This is the end of my insert function
		
		
		
		
		
		
		
	public function Update_Item_Report($Item_Id,$item_report){
		try{
				
				
			
				$query_Insert = $this->Item->prepare("UPDATE items SET item_report = ? WHERE Item_Id=?");
				$query_Insert->bindParam(1,$item_report);
				$query_Insert->bindParam(2,$Item_Id);
				$query_Insert->execute();
			}catch(Exception $e) {
    			echo 'Error insert item: ', $e->getMessage(), "\n";
			
			} // Enc Catch
		
		}	// End function InsertItem
		
		
		
		
		
		
		
		
public function Update_Item($Item_Id,$Item_description,$Imagen,$Initial_Quantity,$Stock_Quantity,$Lessons_item,$Date,$Expiration_date,$Price,$Grant_Id,$Vendor_Id,$Category_Id,$Subcategory_id,$ItemType_Id,$Building,$Cabine,$Room,$Department,$Location_Description,$Grp)
	{
	
	/*
	echo $Item_Id;
	echo "<br>";
	echo $Item_description;
	echo "<br>";
	echo $Imagen;
	echo "<br>";
	echo $Initial_Quantity;
	echo "<br>";
	echo $Stock_Quantity;
	echo "<br>";
	echo $Lessons_item;
	echo "<br>";
	echo $Date;
	echo "<br>";
	echo $Expiration_date;
	echo "<br>";
	echo $Price;
	echo "<br>";
	echo $Grant_Id;
	echo "<br>";
	echo $Vendor_Id;
	echo "<br>";
	echo $Category_Id;
	echo "<br>";
	echo $Subcategory_id;
	echo "<br>";
	echo $ItemType_Id;
	echo "<br>";
	echo $Building;
	echo "<br>";
	echo $Cabine;
	echo "<br>";
	echo $Room;
	echo "<br>";
	echo $Department;
	echo "<br>";
	echo $Location_Description;
	echo "<br>";
	echo $Grp;
	*/
	
	

	$query_Update = $this->Item->prepare("UPDATE items SET Item_description=?,Imagen=?,Initial_Quantity=?,Stock_Quantity=?,Lessons_item=?,Date=?,Expiration_date=?,Price=?,Grant_Id=?,Vendor_Id=?,Category_Id=?,Subcategory_id=?,ItemType_Id=?,Building=?,Cabine=?,Room=?,Department=?,Location_Description=?,Grp=? WHERE Item_Id =?");
	
	try{
				
				$query_Update->bindParam(1, $Item_description);
				$query_Update->bindParam(2, $Imagen);
				$query_Update->bindParam(3, $Initial_Quantity);
				$query_Update->bindParam(4, $Stock_Quantity);
				$query_Update->bindParam(5, $Lessons_item);
				$query_Update->bindParam(6, $Date);
				$query_Update->bindParam(7, $Expiration_date);
				$query_Update->bindParam(8, $Price);			
				$query_Update->bindParam(9, $Grant_Id);
				$query_Update->bindParam(10, $Vendor_Id);
				$query_Update->bindParam(11, $Category_Id);
				$query_Update->bindParam(12, $Subcategory_id);
				$query_Update->bindParam(13, $ItemType_Id);
				$query_Update->bindParam(14, $Building);	
				$query_Update->bindParam(15, $Cabine);
				$query_Update->bindParam(16, $Room);
				$query_Update->bindParam(17, $Department);	
				$query_Update->bindParam(18, $Location_Description);
				$query_Update->bindParam(19, $Grp);
				$query_Update->bindParam(20, $Item_Id);
				$query_Update->execute();
				
				return 1;
		
			}catch(Exception $e) {
				
    			return 0;
			
			} // Enc Catch
				
				
	
			
		} // End functio  Update_Item
		
		
	 
	 
	 
	 
	 
	public function get_Item_Info_by_ID($Item_Id)
			{
				
				$query_getItem = $this->Item->prepare("SELECT * FROM items WHERE Item_Id = ?");
				$query_getItem->bindParam(1, $Item_Id);
				$query_getItem->execute();
				$result = $query_getItem->fetchAll(PDO::FETCH_ASSOC);
				@$result = $result[0];
				
					$this->Item_Id				= $result['Item_Id'];
					$this->Item_description		= $result['Item_description'];
					$this->Reference			= $result['Reference'];
					$this->Imagen				= $result['Imagen'];
					$this->Initial_Quantity		= $result['Initial_Quantity'];
					$this->Stock_Quantity		= $result['Stock_Quantity'];
					$this->Lessons_item			= $result['Lessons_item'];
					$this->Date					= $result['Date'];
					$this->Expiration_date		= $result['Expiration_date'];
					$this->Price				= $result['Price'];
					$this->Grant_Id				= $result['Grant_Id'];
					$this->Vendor_Id			= $result['Vendor_Id'];
					$this->Category_Id			= $result['Category_Id'];
					$this->Subcategory_id		= $result['Subcategory_id'];
					$this->ItemType_Id			= $result['ItemType_Id'];
					$this->Building				= $result['Building'];
					$this->Cabine				= $result['Cabine'];
					$this->Room					= $result['Room'];
					$this->Department			= $result['Department'];
					$this->Location_Description	= $result['Location_Description'];
					$this->Grp					= $result['Grp'];
					
			
			}
			
			
			
			
			function get_Item_Info_by_Reference($Reference)
			{
				
				$query_getItem = $this->Item->prepare("SELECT * FROM items WHERE Reference = ?");
				$query_getItem->bindParam(1, $Reference);
				$query_getItem->execute();
				$result = $query_getItem->fetchAll(PDO::FETCH_ASSOC);
				@$result = $result[0];
				
					$this->Item_Id				= $result['Item_Id'];
					$this->Item_description		= $result['Item_description'];
					$this->Reference			= $result['Reference'];
					$this->Imagen				= $result['Imagen'];
					$this->Initial_Quantity		= $result['Initial_Quantity'];
					$this->Stock_Quantity		= $result['Stock_Quantity'];
					$this->Lessons_item			= $result['Lessons_item'];
					$this->Date					= $result['Date'];
					$this->Expiration_date		= $result['Expiration_date'];
					$this->Price				= $result['Price'];
					$this->Grant_Id				= $result['Grant_Id'];
					$this->Vendor_Id			= $result['Vendor_Id'];
					$this->Category_Id			= $result['Category_Id'];
					$this->Subcategory_id		= $result['Subcategory_id'];
					$this->ItemType_Id			= $result['ItemType_Id'];
					$this->Building				= $result['Building'];
					$this->Cabine				= $result['Cabine'];
					$this->Room					= $result['Room'];
					$this->Department			= $result['Department'];
					$this->Location_Description	= $result['Location_Description'];
					$this->Grp					= $result['Grp'];
			
			}
	
	
	
	
	public function Update_Item_Stock($Item_Id,$Stock_Quantity)
	{

			
			$query_Update_Stock = $this->Item->prepare("UPDATE items SET Stock_Quantity	= ? WHERE Item_Id =?");
				
			$query_Update_Stock->bindParam(1, $Stock_Quantity);
			$query_Update_Stock->bindParam(2, $Item_Id);
			$query_Update_Stock->execute();
			
			
	}
	
	
	
	public function Update_Item_Stock2($Item_Id,$Quantity)
	{

			
			$query_Update_Stock = $this->Item->prepare("UPDATE items SET Stock_Quantity	= Stock_Quantity + $Quantity WHERE Item_Id =?");
			$query_Update_Stock->bindParam(1, $Item_Id);
			$query_Update_Stock->execute();
			
			
	}
	
		
		function Delete_Item($Item_Id)
		{
		
			
			$query_Delete = $this->Item->prepare("DELETE QUICK FROM items WHERE Item_Id= ? ");
			$query_Delete->bindParam(1, $Item_Id);
			$query_Delete->execute();
			
			if($query_Delete->rowCount() ==1){
				return 1;	
			}else{
				return 0;
				}
			
		}
		
		
		
		public function Update_Item_Image($Reference,$Imagen)
	{

			
			$query_Update_Stock = $this->Item->prepare("UPDATE items SET Imagen	= ? WHERE Reference = ?");
				
			$query_Update_Stock->bindParam(1, $Imagen);
			$query_Update_Stock->bindParam(2, $Reference);
			$query_Update_Stock->execute();
			
			
	}
	
	
		
		
		
	
	
} // End of my Users Class