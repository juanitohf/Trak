<?php
require_once "../assets/common.php";
session_start();

/*
TABLE 'items'

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




if(isset($_POST['DisplayItems'])){
	
	
	// opend session to create qrcode
	
	$_SESSION['searchType'] = "NoSpecialQuery";
	
	
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("SELECT * FROM items");
		$query_diplayItems->execute();
		
		
		
		
		$i = 0;
		if($query_diplayItems->rowCount() != 0){
					
				while($resultItems = $query_diplayItems->fetch(PDO::FETCH_ASSOC)){
					
					

								$Item_Id				= $resultItems['Item_Id'];
								$Item_description		= $resultItems['Item_description'];
								$Reference				= $resultItems['Reference'];
								$Imagen	 				= $resultItems['Imagen'];
								$Initial_Quantity		= $resultItems['Initial_Quantity'];
								$Stock_Quantity  		= $resultItems['Stock_Quantity'];
								$Lessons_item			= $resultItems['Lessons_item'];
								$Date	 				= $resultItems['Date'];
								$Expiration_date		= $resultItems['Expiration_date'];
								$Price					= $resultItems['Price'];
								$Grant_Id				= $resultItems['Grant_Id'];
								$Vendor_Id				= $resultItems['Vendor_Id'];
								$Category_Id	 		= $resultItems['Category_Id'];
								$Subcategory_id			= $resultItems['Subcategory_id'];
								$ItemType_Id  			= $resultItems['ItemType_Id'];
								$Building				= $resultItems['Building'];
								$Cabine	 				= $resultItems['Cabine'];
								$Room					= $resultItems['Room'];
								$Department				= $resultItems['Department'];
								$Location_Description	= $resultItems['Location_Description'];
								$Grp					= $resultItems['Grp'];
								
								
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i] 	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i] 				= $Imagen;
								$results['Initial_Quantity'][$i] 	= $Initial_Quantity;
								$results['Stock_Quantity'][$i] 		= $Stock_Quantity;
								$results['Lessons_item'][$i] 		= $Lessons_item;
								$results['DateItem'][$i] 				= $Date;
								$results['Expiration_date'][$i] 	= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i] 			= $Grant_Id;
								$results['Vendor_Id'][$i] 			= $Vendor_Id;
								$results['Category_Id'][$i] 		= $Category_Id;
								$results['Subcategory_id'][$i] 		= $Subcategory_id;
								$results['ItemType_Id'][$i] 		= $ItemType_Id;
								$results['Building'][$i] 			= $Building;
								$results['Cabine'][$i] 				= $Cabine;
								$results['Room'][$i] 				= $Room;
								$results['Department'][$i] 			= $Department;
								$results['Location_Description'][$i] 	= $Location_Description;
								$results['Grp'][$i] 					= $Grp;
								
							
							
								$i++;
							}
				$results['Last_Item_Id'] = $Item_Id;
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
if(isset($_POST['descriptionSearchOrde'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("SELECT * FROM items ORDER by Item_description");
		$query_diplayItems->execute();
		
		$i = 0;
		if($query_diplayItems->rowCount() != 0){
					
				while($resultItems = $query_diplayItems->fetch(PDO::FETCH_ASSOC)){
					
					

								$Item_Id				= $resultItems['Item_Id'];
								$Item_description		= $resultItems['Item_description'];
								$Reference				= $resultItems['Reference'];
								$Imagen	 				= $resultItems['Imagen'];
								$Initial_Quantity		= $resultItems['Initial_Quantity'];
								$Stock_Quantity  		= $resultItems['Stock_Quantity'];
								$Lessons_item			= $resultItems['Lessons_item'];
								$Date	 				= $resultItems['Date'];
								$Expiration_date		= $resultItems['Expiration_date'];
								$Price					= $resultItems['Price'];
								$Grant_Id				= $resultItems['Grant_Id'];
								$Vendor_Id				= $resultItems['Vendor_Id'];
								$Category_Id	 		= $resultItems['Category_Id'];
								$Subcategory_id			= $resultItems['Subcategory_id'];
								$ItemType_Id  			= $resultItems['ItemType_Id'];
								$Building				= $resultItems['Building'];
								$Cabine	 				= $resultItems['Cabine'];
								$Room					= $resultItems['Room'];
								$Department				= $resultItems['Department'];
								$Location_Description	= $resultItems['Location_Description'];
								$Grp					= $resultItems['Grp'];
								
								
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i] 	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i] 				= $Imagen;
								$results['Initial_Quantity'][$i] 	= $Initial_Quantity;
								$results['Stock_Quantity'][$i] 		= $Stock_Quantity;
								$results['Lessons_item'][$i] 		= $Lessons_item;
								$results['DateItem'][$i] 				= $Date;
								$results['Expiration_date'][$i] 	= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i] 			= $Grant_Id;
								$results['Vendor_Id'][$i] 			= $Vendor_Id;
								$results['Category_Id'][$i] 		= $Category_Id;
								$results['Subcategory_id'][$i] 		= $Subcategory_id;
								$results['ItemType_Id'][$i] 		= $ItemType_Id;
								$results['Building'][$i] 			= $Building;
								$results['Cabine'][$i] 				= $Cabine;
								$results['Room'][$i] 				= $Room;
								$results['Department'][$i] 			= $Department;
								$results['Location_Description'][$i] 	= $Location_Description;
								$results['Grp'][$i] 					= $Grp;
								
							
							
								$i++;
							}
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}

	
	
	
	
	
	
	
if(isset($_POST['ReferenceSearchOrder'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("SELECT * FROM items ORDER by Reference");
		$query_diplayItems->execute();
		
		$i = 0;
		if($query_diplayItems->rowCount() != 0){
					
				while($resultItems = $query_diplayItems->fetch(PDO::FETCH_ASSOC)){
					
					

								$Item_Id				= $resultItems['Item_Id'];
								$Item_description		= $resultItems['Item_description'];
								$Reference				= $resultItems['Reference'];
								$Imagen	 				= $resultItems['Imagen'];
								$Initial_Quantity		= $resultItems['Initial_Quantity'];
								$Stock_Quantity  		= $resultItems['Stock_Quantity'];
								$Lessons_item			= $resultItems['Lessons_item'];
								$Date	 				= $resultItems['Date'];
								$Expiration_date		= $resultItems['Expiration_date'];
								$Price					= $resultItems['Price'];
								$Grant_Id				= $resultItems['Grant_Id'];
								$Vendor_Id				= $resultItems['Vendor_Id'];
								$Category_Id	 		= $resultItems['Category_Id'];
								$Subcategory_id			= $resultItems['Subcategory_id'];
								$ItemType_Id  			= $resultItems['ItemType_Id'];
								$Building				= $resultItems['Building'];
								$Cabine	 				= $resultItems['Cabine'];
								$Room					= $resultItems['Room'];
								$Department				= $resultItems['Department'];
								$Location_Description	= $resultItems['Location_Description'];
								$Grp					= $resultItems['Grp'];
								
								
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i] 	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i] 				= $Imagen;
								$results['Initial_Quantity'][$i] 	= $Initial_Quantity;
								$results['Stock_Quantity'][$i] 		= $Stock_Quantity;
								$results['Lessons_item'][$i] 		= $Lessons_item;
								$results['DateItem'][$i] 			= $Date;
								$results['Expiration_date'][$i] 	= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i] 			= $Grant_Id;
								$results['Vendor_Id'][$i] 			= $Vendor_Id;
								$results['Category_Id'][$i] 		= $Category_Id;
								$results['Subcategory_id'][$i] 		= $Subcategory_id;
								$results['ItemType_Id'][$i] 		= $ItemType_Id;
								$results['Building'][$i] 			= $Building;
								$results['Cabine'][$i] 				= $Cabine;
								$results['Room'][$i] 				= $Room;
								$results['Department'][$i] 			= $Department;
								$results['Location_Description'][$i] 	= $Location_Description;
								$results['Grp'][$i] 					= $Grp;
								
							
							
								$i++;
							}
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	
	
	
if(isset($_POST['stockOrder'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("SELECT * FROM items ORDER by Stock_Quantity");
		$query_diplayItems->execute();
		
		$i = 0;
		if($query_diplayItems->rowCount() != 0){
					
				while($resultItems = $query_diplayItems->fetch(PDO::FETCH_ASSOC)){
					
					

								$Item_Id				= $resultItems['Item_Id'];
								$Item_description		= $resultItems['Item_description'];
								$Reference				= $resultItems['Reference'];
								$Imagen	 				= $resultItems['Imagen'];
								$Initial_Quantity		= $resultItems['Initial_Quantity'];
								$Stock_Quantity  		= $resultItems['Stock_Quantity'];
								$Lessons_item			= $resultItems['Lessons_item'];
								$Date	 				= $resultItems['Date'];
								$Expiration_date		= $resultItems['Expiration_date'];
								$Price					= $resultItems['Price'];
								$Grant_Id				= $resultItems['Grant_Id'];
								$Vendor_Id				= $resultItems['Vendor_Id'];
								$Category_Id	 		= $resultItems['Category_Id'];
								$Subcategory_id			= $resultItems['Subcategory_id'];
								$ItemType_Id  			= $resultItems['ItemType_Id'];
								$Building				= $resultItems['Building'];
								$Cabine	 				= $resultItems['Cabine'];
								$Room					= $resultItems['Room'];
								$Department				= $resultItems['Department'];
								$Location_Description	= $resultItems['Location_Description'];
								$Grp					= $resultItems['Grp'];
								
								
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i] 	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i] 				= $Imagen;
								$results['Initial_Quantity'][$i] 	= $Initial_Quantity;
								$results['Stock_Quantity'][$i] 		= $Stock_Quantity;
								$results['Lessons_item'][$i] 		= $Lessons_item;
								$results['DateItem'][$i] 			= $Date;
								$results['Expiration_date'][$i] 	= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i] 			= $Grant_Id;
								$results['Vendor_Id'][$i] 			= $Vendor_Id;
								$results['Category_Id'][$i] 		= $Category_Id;
								$results['Subcategory_id'][$i] 		= $Subcategory_id;
								$results['ItemType_Id'][$i] 		= $ItemType_Id;
								$results['Building'][$i] 			= $Building;
								$results['Cabine'][$i] 				= $Cabine;
								$results['Room'][$i] 				= $Room;
								$results['Department'][$i] 			= $Department;
								$results['Location_Description'][$i] 	= $Location_Description;
								$results['Grp'][$i] 					= $Grp;
								
							
							
								$i++;
							}
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}

	
	
	
	
	
	
	
	
	
if(isset($_POST['displayCategories'])){
	
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayCategories = $DbConn->prepare("SELECT * FROM categories");
		$query_diplayCategories->execute();
		
		$i = 0;
		if($query_diplayCategories->rowCount() != 0){
					
				while($resultItems = $query_diplayCategories->fetch(PDO::FETCH_ASSOC)){
					
								$Category_Id			= $resultItems['Category_Id'];
								$Category_Description	= $resultItems['Category_Description'];
								
								$results['Category_Id'][$i] 			= $Category_Id;
								$results['Category_Description'][$i] 	= $Category_Description;
						
								$i++;
							}
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}





	
	
	
if(isset($_POST['DisplayLessons'])){
	

	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayLessons= $DbConn->prepare("SELECT * FROM lessons");
		$query_diplayLessons->execute();
		
		$i = 0;
		if($query_diplayLessons->rowCount() != 0){
					
				while($resultLessons = $query_diplayLessons->fetch(PDO::FETCH_ASSOC)){
					
								$Lesson_Id			= $resultLessons['Lesson_Id'];
								$Lesson_description	= $resultLessons['Lesson_description'];
								
								
								$results['Lesson_Id'][$i] 			= $Lesson_Id;
								$results['Lesson_description'][$i]  = $Lesson_description;
							
								$i++;
								
				}
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	
	
	
	
		
	
if(isset($_POST['SearchItemByName'])){
	
	
	$NameItem = $_POST['NameItem'].'%';
	
	$_SESSION['searchType'] = "Description";
	$_SESSION['VariableQrCode'] = $NameItem;
	
	//Create a connection with DB
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("SELECT * FROM items WHERE (Item_description LIKE :search)");
		$query_diplayItems->bindParam(':search',$NameItem);
		$query_diplayItems->execute();
		
		$i = 0;
		if($query_diplayItems->rowCount() != 0){
					
				while($resultItems = $query_diplayItems->fetch(PDO::FETCH_ASSOC)){
					
					

								$Item_Id				= $resultItems['Item_Id'];
								$Item_description		= $resultItems['Item_description'];
								$Reference				= $resultItems['Reference'];
								$Imagen	 				= $resultItems['Imagen'];
								$Initial_Quantity		= $resultItems['Initial_Quantity'];
								$Stock_Quantity  		= $resultItems['Stock_Quantity'];
								$Lessons_item			= $resultItems['Lessons_item'];
								$Date	 				= $resultItems['Date'];
								$Expiration_date		= $resultItems['Expiration_date'];
								$Price					= $resultItems['Price'];
								$Grant_Id				= $resultItems['Grant_Id'];
								$Vendor_Id				= $resultItems['Vendor_Id'];
								$Category_Id	 		= $resultItems['Category_Id'];
								$Subcategory_id			= $resultItems['Subcategory_id'];
								$ItemType_Id  			= $resultItems['ItemType_Id'];
								$Building				= $resultItems['Building'];
								$Cabine	 				= $resultItems['Cabine'];
								$Room					= $resultItems['Room'];
								$Department				= $resultItems['Department'];
								$Location_Description	= $resultItems['Location_Description'];
								$Grp					= $resultItems['Grp'];
								
								
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i] 	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i] 				= $Imagen;
								$results['Initial_Quantity'][$i] 	= $Initial_Quantity;
								$results['Stock_Quantity'][$i] 		= $Stock_Quantity;
								$results['Lessons_item'][$i] 		= $Lessons_item;
								$results['DateItem'][$i] 				= $Date;
								$results['Expiration_date'][$i] 	= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i] 			= $Grant_Id;
								$results['Vendor_Id'][$i] 			= $Vendor_Id;
								$results['Category_Id'][$i] 		= $Category_Id;
								$results['Subcategory_id'][$i] 		= $Subcategory_id;
								$results['ItemType_Id'][$i] 		= $ItemType_Id;
								$results['Building'][$i] 			= $Building;
								$results['Cabine'][$i] 				= $Cabine;
								$results['Room'][$i] 				= $Room;
								$results['Department'][$i] 			= $Department;
								$results['Location_Description'][$i] 	= $Location_Description;
								$results['Grp'][$i] 					= $Grp;
								
							
							
								$i++;
							}
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}

	
	
	
	
if(isset($_POST['searchCategoryButton'])){
	
	
	
	$categoryItemSearch = $_POST['categoryItemSearch'];
	
	$_SESSION['searchType'] = "Category";
	$_SESSION['VariableQrCode'] = $categoryItemSearch;
	//Create a connection with DB
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("SELECT * FROM items WHERE Category_Id = ?");
		$query_diplayItems->bindParam(1,$categoryItemSearch);
		$query_diplayItems->execute();
		
		$i = 0;
		if($query_diplayItems->rowCount() != 0){
					
				while($resultItems = $query_diplayItems->fetch(PDO::FETCH_ASSOC)){
					
					

								$Item_Id				= $resultItems['Item_Id'];
								$Item_description		= $resultItems['Item_description'];
								$Reference				= $resultItems['Reference'];
								$Imagen	 				= $resultItems['Imagen'];
								$Initial_Quantity		= $resultItems['Initial_Quantity'];
								$Stock_Quantity  		= $resultItems['Stock_Quantity'];
								$Lessons_item			= $resultItems['Lessons_item'];
								$Date	 				= $resultItems['Date'];
								$Expiration_date		= $resultItems['Expiration_date'];
								$Price					= $resultItems['Price'];
								$Grant_Id				= $resultItems['Grant_Id'];
								$Vendor_Id				= $resultItems['Vendor_Id'];
								$Category_Id	 		= $resultItems['Category_Id'];
								$Subcategory_id			= $resultItems['Subcategory_id'];
								$ItemType_Id  			= $resultItems['ItemType_Id'];
								$Building				= $resultItems['Building'];
								$Cabine	 				= $resultItems['Cabine'];
								$Room					= $resultItems['Room'];
								$Department				= $resultItems['Department'];
								$Location_Description	= $resultItems['Location_Description'];
								$Grp					= $resultItems['Grp'];
								
								
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i] 	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i] 				= $Imagen;
								$results['Initial_Quantity'][$i] 	= $Initial_Quantity;
								$results['Stock_Quantity'][$i] 		= $Stock_Quantity;
								$results['Lessons_item'][$i] 		= $Lessons_item;
								$results['DateItem'][$i] 				= $Date;
								$results['Expiration_date'][$i] 	= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i] 			= $Grant_Id;
								$results['Vendor_Id'][$i] 			= $Vendor_Id;
								$results['Category_Id'][$i] 		= $Category_Id;
								$results['Subcategory_id'][$i] 		= $Subcategory_id;
								$results['ItemType_Id'][$i] 		= $ItemType_Id;
								$results['Building'][$i] 			= $Building;
								$results['Cabine'][$i] 				= $Cabine;
								$results['Room'][$i] 				= $Room;
								$results['Department'][$i] 			= $Department;
								$results['Location_Description'][$i] 	= $Location_Description;
								$results['Grp'][$i] 					= $Grp;
								
							
							
								$i++;
							}
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}

	
	
		
if(isset($_POST['searchReferenceButton'])){
	
	
	$ReferenceSearch = $_POST['ReferenceSearch'];
	$_SESSION['searchType'] = "Reference";
	$_SESSION['VariableQrCode'] = $ReferenceSearch ;
	//Create a connection with DB
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("SELECT * FROM items WHERE Reference = ?");
		$query_diplayItems->bindParam(1,$ReferenceSearch);
		$query_diplayItems->execute();
		
		$i = 0;
		if($query_diplayItems->rowCount() != 0){
					
				while($resultItems = $query_diplayItems->fetch(PDO::FETCH_ASSOC)){
					
					

								$Item_Id				= $resultItems['Item_Id'];
								$Item_description		= $resultItems['Item_description'];
								$Reference				= $resultItems['Reference'];
								$Imagen	 				= $resultItems['Imagen'];
								$Initial_Quantity		= $resultItems['Initial_Quantity'];
								$Stock_Quantity  		= $resultItems['Stock_Quantity'];
								$Lessons_item			= $resultItems['Lessons_item'];
								$Date	 				= $resultItems['Date'];
								$Expiration_date		= $resultItems['Expiration_date'];
								$Price					= $resultItems['Price'];
								$Grant_Id				= $resultItems['Grant_Id'];
								$Vendor_Id				= $resultItems['Vendor_Id'];
								$Category_Id	 		= $resultItems['Category_Id'];
								$Subcategory_id			= $resultItems['Subcategory_id'];
								$ItemType_Id  			= $resultItems['ItemType_Id'];
								$Building				= $resultItems['Building'];
								$Cabine	 				= $resultItems['Cabine'];
								$Room					= $resultItems['Room'];
								$Department				= $resultItems['Department'];
								$Location_Description	= $resultItems['Location_Description'];
								$Grp					= $resultItems['Grp'];
								
								
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i] 	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i] 				= $Imagen;
								$results['Initial_Quantity'][$i] 	= $Initial_Quantity;
								$results['Stock_Quantity'][$i] 		= $Stock_Quantity;
								$results['Lessons_item'][$i] 		= $Lessons_item;
								$results['DateItem'][$i] 				= $Date;
								$results['Expiration_date'][$i] 	= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i] 			= $Grant_Id;
								$results['Vendor_Id'][$i] 			= $Vendor_Id;
								$results['Category_Id'][$i] 		= $Category_Id;
								$results['Subcategory_id'][$i] 		= $Subcategory_id;
								$results['ItemType_Id'][$i] 		= $ItemType_Id;
								$results['Building'][$i] 			= $Building;
								$results['Cabine'][$i] 				= $Cabine;
								$results['Room'][$i] 				= $Room;
								$results['Department'][$i] 			= $Department;
								$results['Location_Description'][$i] 	= $Location_Description;
								$results['Grp'][$i] 					= $Grp;
								
							
							
								$i++;
							}
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}





if(isset($_POST['searchLessonButton'])){
	
	
	$lessonItemSearch = '%'.$_POST['lessonItemSearch'].'%';
	
	$_SESSION['searchType'] = "Lesson";
	$_SESSION['VariableQrCode'] = $lessonItemSearch;
	
	//Create a connection with DB
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("SELECT * FROM items WHERE (Lessons_item LIKE :search)");
		$query_diplayItems->bindParam(':search',$lessonItemSearch);
		$query_diplayItems->execute();
		
		$i = 0;
		if($query_diplayItems->rowCount() != 0){
					
				while($resultItems = $query_diplayItems->fetch(PDO::FETCH_ASSOC)){
					
					

								$Item_Id				= $resultItems['Item_Id'];
								$Item_description		= $resultItems['Item_description'];
								$Reference				= $resultItems['Reference'];
								$Imagen	 				= $resultItems['Imagen'];
								$Initial_Quantity		= $resultItems['Initial_Quantity'];
								$Stock_Quantity  		= $resultItems['Stock_Quantity'];
								$Lessons_item			= $resultItems['Lessons_item'];
								$Date	 				= $resultItems['Date'];
								$Expiration_date		= $resultItems['Expiration_date'];
								$Price					= $resultItems['Price'];
								$Grant_Id				= $resultItems['Grant_Id'];
								$Vendor_Id				= $resultItems['Vendor_Id'];
								$Category_Id	 		= $resultItems['Category_Id'];
								$Subcategory_id			= $resultItems['Subcategory_id'];
								$ItemType_Id  			= $resultItems['ItemType_Id'];
								$Building				= $resultItems['Building'];
								$Cabine	 				= $resultItems['Cabine'];
								$Room					= $resultItems['Room'];
								$Department				= $resultItems['Department'];
								$Location_Description	= $resultItems['Location_Description'];
								$Grp					= $resultItems['Grp'];
								
								
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i] 	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i] 				= $Imagen;
								$results['Initial_Quantity'][$i] 	= $Initial_Quantity;
								$results['Stock_Quantity'][$i] 		= $Stock_Quantity;
								$results['Lessons_item'][$i] 		= $Lessons_item;
								$results['DateItem'][$i] 				= $Date;
								$results['Expiration_date'][$i] 	= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i] 			= $Grant_Id;
								$results['Vendor_Id'][$i] 			= $Vendor_Id;
								$results['Category_Id'][$i] 		= $Category_Id;
								$results['Subcategory_id'][$i] 		= $Subcategory_id;
								$results['ItemType_Id'][$i] 		= $ItemType_Id;
								$results['Building'][$i] 			= $Building;
								$results['Cabine'][$i] 				= $Cabine;
								$results['Room'][$i] 				= $Room;
								$results['Department'][$i] 			= $Department;
								$results['Location_Description'][$i] 	= $Location_Description;
								$results['Grp'][$i] 					= $Grp;
								
							
							
								$i++;
							}
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	
	
	
	