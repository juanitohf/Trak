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
		
		$query_diplayCategories = $DbConn->prepare("SELECT * FROM categories ORDER by Category_Description");
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

	
	
	
	
	
	
if(isset($_POST['displaySubCategories'])){
	
	$Category_id = $_POST['Category_Id_Fn'];
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplaySubCategories = $DbConn->prepare("SELECT * FROM subcategories WHERE Category_id=?");
		$query_diplaySubCategories->bindParam(1,$Category_id);
		$query_diplaySubCategories->execute();
		
		$i = 0;
		if($query_diplaySubCategories->rowCount() != 0){
					
				while($resultSubCat = $query_diplaySubCategories->fetch(PDO::FETCH_ASSOC)){
					
								$Subcategory_id				= $resultSubCat['Subcategory_id'];
								$Subcategory_description	= $resultSubCat['Subcategory_description'];
		
								
								$results['Subcategory_id'][$i] 			= $Subcategory_id;
								$results['Subcategory_description'][$i] = $Subcategory_description;
								$results['Category_id'][$i] = $Category_id;
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



if(isset($_POST['displaySubCategoriesToModal'])){
	
	
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplaySubCategories = $DbConn->prepare("SELECT * FROM subcategories");
		$query_diplaySubCategories->execute();
		
		$i = 0;
		if($query_diplaySubCategories->rowCount() != 0){
					
				while($resultSubCat = $query_diplaySubCategories->fetch(PDO::FETCH_ASSOC)){
					
								$Subcategory_id				= $resultSubCat['Subcategory_id'];
								$Subcategory_description	= $resultSubCat['Subcategory_description'];
								$Category_id				= $resultSubCat['Category_id'];
		
								
								$results['Subcategory_id'][$i] 			= $Subcategory_id;
								$results['Subcategory_description'][$i] = $Subcategory_description;
								$results['Category_id'][$i] = $Category_id;
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

	
	
	
	if(isset($_POST['displaySubCategoriesFromFormSelection'])){
	
	$Category_id = $_POST['Category_Id_Fn'];
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplaySubCategories = $DbConn->prepare("SELECT * FROM subcategories WHERE Category_id=?");
		$query_diplaySubCategories->bindParam(1,$Category_id);
		$query_diplaySubCategories->execute();
		
		$i = 0;
		if($query_diplaySubCategories->rowCount() != 0){
					
				while($resultSubCat = $query_diplaySubCategories->fetch(PDO::FETCH_ASSOC)){
					
								$Subcategory_id				= $resultSubCat['Subcategory_id'];
								$Subcategory_description	= $resultSubCat['Subcategory_description'];
		
								
								$results['Subcategory_id'][$i] 			= $Subcategory_id;
								$results['Subcategory_description'][$i] = $Subcategory_description;
								$results['Category_id'][$i] = $Category_id;
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
	
	
	
	
	
	
if(isset($_POST['DisplaySuplier'])){
	
	$Vendor_Id = $_POST['Vendor_Id'];
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayVendors = $DbConn->prepare("SELECT * FROM vendors");
		$query_diplayVendors->execute();
		
		$i = 0;
		if($query_diplayVendors->rowCount() != 0){
					
				while($resultVendors = $query_diplayVendors->fetch(PDO::FETCH_ASSOC)){
					
								$Vendor_Id		= $resultVendors['Vendor_Id'];
								$Vendor_name	= $resultVendors['Vendor_name'];
								$Vendor_email	= $resultVendors['Vendor_email'];
								$Vendor_phone	= $resultVendors['Vendor_phone'];
								$Vendor_web		= $resultVendors['Vendor_web'];
								
								$results['Vendor_Id'][$i] 	= $Vendor_Id;
								$results['Vendor_name'][$i] = $Vendor_name;
								$results['Vendor_email'][$i]= $Vendor_email;
								$results['Vendor_phone'][$i]= $Vendor_phone;
								$results['Vendor_web'][$i] 	= $Vendor_web;
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
	
	
	
	
	
if(isset($_POST['DisplayGrant'])){
	

	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayGrant = $DbConn->prepare("SELECT * FROM grants");
		$query_diplayGrant->execute();
		
		$i = 0;
		if($query_diplayGrant->rowCount() != 0){
					
				while($resultGrant= $query_diplayGrant->fetch(PDO::FETCH_ASSOC)){
					
								$Grant_Id		= $resultGrant['Grant_Id'];
								$Grant_name		= $resultGrant['Grant_name'];
								$Grant_email	= $resultGrant['Grant_email'];
								$Grant_phone	= $resultGrant['Grant_phone'];
								
								
								$results['Grant_Id'][$i] 	= $Grant_Id;
								$results['Grant_name'][$i]  = $Grant_name;
								$results['Grant_email'][$i] = $Grant_email;
								$results['Grant_phone'][$i] = $Grant_phone;
								
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
	
	
	
	
	


if(isset($_POST['displayTypeItem'])){
	

	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItemType= $DbConn->prepare("SELECT * FROM itemType");
		$query_diplayItemType->execute();
		
		$i = 0;
		if($query_diplayItemType->rowCount() != 0){
					
				while($resultItemType= $query_diplayItemType->fetch(PDO::FETCH_ASSOC)){
					
								$ItemType_Id			= $resultItemType['ItemType_Id'];
								$ItemType_description	= $resultItemType['ItemType_description'];
								
								
								$results['ItemType_Id'][$i] 		 = $ItemType_Id;
								$results['ItemType_description'][$i] = $ItemType_description;
							
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
	
	
if(isset($_FILES['fileImageItem'])){
				
				$results = array();
		            //$Lessons_items = explode(",",$Lessons_items);
	
					$nameImage  = $_FILES['fileImageItem']['name'];
					$size		= $_FILES['fileImageItem']['size'];
					$type		= $_FILES['fileImageItem']['type'];
					$tmp_name	= $_FILES['fileImageItem']['tmp_name'];
					
					
					
			if(!empty($nameImage))
			   {
				 $location = '../weblg/images/Items/';			
				 move_uploaded_file($tmp_name, $location.$nameImage);
				 
			
				$results['Status'] = 'success';
				$results['NameImg'] = $nameImage;
				print json_encode($results);
				 
			   }else{
				 
				  $results['Status'] = 'error';
				   print json_encode($results);
			 }
			   
			
		} // End function updateImageButton
	
	
	
	





	
if(isset($_POST['buttonUpdateItem'])){
	
				$results = array();
	
				
				$Item_Id	 			= $_POST['ItemIdEdit'];
				$Item_description	 	= $_POST['descriptionItem'];
				$ItemType_Id			= $_POST['typeItem'];
				$Ref 				   	= $_POST['referenceItem'];
				$Imagen		   			= $_POST['strImagen'];
				$Initial_Quantity 	   	= $_POST['quantityItem'];
				$Stock_Quantity 	   	= $_POST['Stock_Quantity'];
				$Date 	   				= $_POST['dateInsertItem'];
				$Expiration_date   		= $_POST['expirationItem'];
				$Price 		   			= $_POST['priceItem'];
				$Grant_Id 				= $_POST['grantItem'];
				$Vendor_Id 		   		= $_POST['supplierItem'];
				$Category_Id  	   		= $_POST['categoryItem2'];
				$Subcategory_id    		= $_POST['SubcategoryItem'];
				$Building 	   			= $_POST['buildingItem'];
				$Cabine 		   		= $_POST['cabinetItem'];
				$Lessons_item 	   		= $_POST['lessons'];
				$Department     		= $_POST['departmentItem'];
				$Location_Description 	= $_POST['descriptionLocItem'];
				$grp 					= $_POST['grp'];
				$Room					= $_POST['roomItem'];
			
				
					$UpdateItem = new item();
					$ResultItemUpdate = $UpdateItem->Update_Item($Item_Id,$Item_description,$Imagen,$Initial_Quantity,$Stock_Quantity,$Lessons_item,$Date,$Expiration_date,$Price,$Grant_Id,$Vendor_Id,$Category_Id,$Subcategory_id,$ItemType_Id,$Building,$Cabine,$Room,$Department,$Location_Description,$grp);
					
				
			if($ResultItemUpdate == 1){
					
				$results['Status'] = 'success';
				print json_encode($results);
				$UpdateItem = null;
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				$UpdateItem = null;
				}	
			
		} // End  function
	
	
	
	
	
if(isset($_POST['SearchItemByName'])){
	
	
	$NameItem = $_POST['NameItem'].'%';
	
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
	
	
	
	
	
if(isset($_POST['DeleteItemById'])){
	
	$results = array();  //This will hold the info to display later with Json
	$Item_Id = $_POST['Item_Id'];
	
	
		$DeleteItem = new item();
		$resultDeletingItem = $DeleteItem ->Delete_Item($Item_Id);
		
		if($resultDeletingItem == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	
	
	
	
	
	
	

	
if(isset($_POST['InsertCategory'])){
	
	$CategoryName = $_POST['CategoryName'];
	//Create a connection with Db
	
		
		$results = array();  //This will hold the info to display later with Json
		
		$InsertCategory = new categories(); 
		$resultInsertCategory = $InsertCategory->Insert_Category($CategoryName);
		
		 if($resultInsertCategory == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else if($resultInsertCategory == 2){
				
				$results['Status'] = 'repeated';
				print json_encode($results);
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}

	


	
if(isset($_POST['DeleteCategory'])){
	
	$Category_Id = $_POST['Category_Id'];
	//Create a connection with Db
	
		
		$results = array();  //This will hold the info to display later with Json
		
		$DeleteCategory = new categories(); 
		$resultDeleteCategory = $DeleteCategory->Delete_Category($Category_Id);
		
		
		 if($resultDeleteCategory == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else if($resultDeleteCategory == 2){
				
				$results['Status'] = 'DeleteSub';
				print json_encode($results);
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	
	
	
	
	
	
	
	
		
if(isset($_POST['EditCategory'])){
	
	$Category_Id 			= $_POST['Category_Id'];
	$Category_Description 	= $_POST['CategoryEdit'];
	
		
		$results = array();  //This will hold the info to display later with Json
		
		$UpdateCategory = new categories(); 
		$resultUpdateCategory = $UpdateCategory->Edit_Category($Category_Id, $Category_Description);
		
		
		 if($resultUpdateCategory == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
			}	
				
			$DbConn = null;	
	
	
	}
	
	


if(isset($_POST['InsertSubCategory'])){
	
	$Category_Id 				= $_POST['Category_Id'];
	$Subcategory_description 	= $_POST['SubCategoryName'];
	//Create a connection with Db
	
		
		$results = array();  //This will hold the info to display later with Json
		
		$InsertSubCategory = new subcategories(); 
		$resultInsertSubCategory = $InsertSubCategory->Insert_Subcategory($Subcategory_description,$Category_Id);
		
		 if($resultInsertSubCategory == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else if($resultInsertSubCategory == 2){
				
				$results['Status'] = 'repeated';
				print json_encode($results);
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}




if(isset($_POST['DeleteSubCategory'])){
	
	$Subcategory_id = $_POST['Subcategory_id'];
	//Create a connection with Db
	
		
		$results = array();  //This will hold the info to display later with Json
		
		$DeleteSubCategory = new subcategories(); 
		$resultDeleteSubCategory = $DeleteSubCategory->Delete_Subcategory($Subcategory_id);
		
		
		 if($resultDeleteSubCategory == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	
	
	
	
if(isset($_POST['EditSubCategory'])){
	
	$Subcategory_id = $_POST['SubEditID'];
	$Subcategory_description = $_POST['SubCategoryName'];
	//Create a connection with Db
	
		
		$results = array();  //This will hold the info to display later with Json
		
		$UpdateSubCategory = new subcategories(); 
		$resultUpdateSubCategory = $UpdateSubCategory->Edit_SubCategory($Subcategory_description,$Subcategory_id);
		
		
		 if($resultUpdateSubCategory == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else if($resultUpdateSubCategory == 2){
				$results['Status'] = 'repeated';
				print json_encode($results);
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	
	}
















if(isset($_POST['displayVendors'])){
	

	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayVendors= $DbConn->prepare("SELECT * FROM vendors");
		$query_diplayVendors->execute();
		
		$i = 0;
		if($query_diplayVendors->rowCount() != 0){
					
				while($resultVendors= $query_diplayVendors->fetch(PDO::FETCH_ASSOC)){
					
								$Vendor_Id		= $resultVendors['Vendor_Id'];
								$Vendor_name	= $resultVendors['Vendor_name'];
								$Vendor_email	= $resultVendors['Vendor_email'];
								$Vendor_phone	= $resultVendors['Vendor_phone'];
								$Vendor_web		= $resultVendors['Vendor_web'];
								
								$results['Vendor_Id'][$i] 		= $Vendor_Id;
								$results['Vendor_name'][$i] 	= $Vendor_name;
								$results['Vendor_email'][$i]  	= $Vendor_email;
								$results['Vendor_phone'][$i] 	= $Vendor_phone;
								$results['Vendor_web'][$i] 		= $Vendor_web;
								
							
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
	
	
	
	
	
	
	
	
if(isset($_POST['InsertVendor'])){
	
	$Vendor_name 	= $_POST['nameVendorInsert'];
	$Vendor_email 	= $_POST['emailVendorInsert'];
	$Vendor_phone 	= $_POST['phoneVendorInsert'];
	$Vendor_web 	= $_POST['webVendorInsert'];
	
		
		$results = array();  //This will hold the info to display later with Json
		
		$InsertVendor = new vendors(); 
		$resultVendor = $InsertVendor->Insert_Vendor($Vendor_name,$Vendor_email,$Vendor_phone,$Vendor_web);
		
		
		 if($resultVendor == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else if($resultVendor == 2){
				$results['Status'] = 'repeated';
				print json_encode($results);
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	
	}

	
	


if(isset($_POST['DeleteVendor'])){
	
	$Vendor_Id = $_POST['Vendor_Id'];
	//Create a connection with Db
	
		
		$results = array();  //This will hold the info to display later with Json
		
		$DeleteVendor= new vendors(); 
		$resultDeleteVendor = $DeleteVendor->Delete_Vendor($Vendor_Id);
		
		
		 if($resultDeleteVendor == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	






	
if(isset($_POST['UpdateVendor'])){
	
	$Vendor_name 	= $_POST['nameVendorEdit'];
	$Vendor_email 	= $_POST['emailVendorEdit'];
	$Vendor_phone 	= $_POST['phoneVendorEdit'];
	$Vendor_web 	= $_POST['webVendorEdit'];
	$Vendor_Id	= $_POST['idVendorEdit'];
		
		$results = array();  //This will hold the info to display later with Json
		
		$UpdateVendor = new vendors(); 
		$resultVendor = $UpdateVendor->Update_Vendor($Vendor_Id,$Vendor_name,$Vendor_email,$Vendor_phone,$Vendor_web);
		
		
		 if($resultVendor == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else if($resultVendor == 2){
				$results['Status'] = 'repeated';
				print json_encode($results);
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	
	}

	








if(isset($_POST['displayGrant'])){
	

	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayGrants= $DbConn->prepare("SELECT * FROM grants");
		$query_diplayGrants->execute();
	
		
		$i = 0;
		if($query_diplayGrants->rowCount() != 0){
					
				while($resultGrants= $query_diplayGrants->fetch(PDO::FETCH_ASSOC)){
					
								$Grant_Id		= $resultGrants['Grant_Id'];
								$Grant_name		= $resultGrants['Grant_name'];
								$Grant_email	= $resultGrants['Grant_email'];
								$Grant_phone	= $resultGrants['Grant_phone'];
								
								
								$results['Grant_Id'][$i] 	= $Grant_Id;
								$results['Grant_name'][$i] 	= $Grant_name;
								$results['Grant_email'][$i] = $Grant_email;
								$results['Grant_phone'][$i] = $Grant_phone;
							
								
							
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
	
	
	
	



if(isset($_POST['InsertGrant'])){
	
	$Grant_name 	= $_POST['Grant_name'];
	$Grant_email 	= $_POST['Grant_email'];
	$Grant_phone 	= $_POST['Grant_phone'];
	
		$results = array();  //This will hold the info to display later with Json
		
		$InsertGrant = new grants(); 
		$resultGrant = $InsertGrant->Insert_Grant($Grant_name,$Grant_email,$Grant_phone);
		
		
		 if($resultGrant == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else if($resultGrant == 2){
				$results['Status'] = 'repeated';
				print json_encode($results);
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	
	}













if(isset($_POST['DeleteGrant'])){
	
	$Grant_Id = $_POST['Grant_Id'];
	
	
		
		$results = array();  //This will hold the info to display later with Json
		
		$DeleteGrant= new grants(); 
		$resultDeleteGrant= $DeleteGrant->Delete_Grant($Grant_Id);
		
		
		 if($resultDeleteGrant == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	






if(isset($_POST['UpdateGrant'])){
	
	$Grant_name 	= $_POST['Grant_name'];
	$Grant_email 	= $_POST['Grant_email'];
	$Grant_phone 	= $_POST['Grant_phone'];
	$Grant_Id 		= $_POST['Grant_Id'];
	
		$results = array();  //This will hold the info to display later with Json
		
		$InsertGrant = new grants(); 
		$resultGrant = $InsertGrant->Update_Grant($Grant_Id,$Grant_name,$Grant_email,$Grant_phone);
		
		
		 if($resultGrant == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
		}	
				
			$DbConn = null;	
	
	
	
	}














if(isset($_POST['displayTypeItemInsert'])){
	

	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItemType= $DbConn->prepare("SELECT * FROM itemType");
		$query_diplayItemType->execute();
		
		$i = 0;
		if($query_diplayItemType->rowCount() != 0){
					
				while($resultItemType= $query_diplayItemType->fetch(PDO::FETCH_ASSOC)){
					
								$ItemType_Id			= $resultItemType['ItemType_Id'];
								$ItemType_description	= $resultItemType['ItemType_description'];
								
								
								$results['ItemType_Id'][$i] 		 = $ItemType_Id;
								$results['ItemType_description'][$i] = $ItemType_description;
							
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













	
	
	
if(isset($_POST['displayCategoriesInsertTag'])){
	
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayCategories = $DbConn->prepare("SELECT * FROM categories ORDER by Category_Description");
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

	










	
if(isset($_POST['displaySubCategoriesInsert'])){
	
		$Category_id = 0;
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplaySubCategories = $DbConn->prepare("SELECT * FROM subcategories WHERE Category_id=?");
		$query_diplaySubCategories->bindParam(1,$Category_id);
		$query_diplaySubCategories->execute();
		
		$i = 0;
		if($query_diplaySubCategories->rowCount() != 0){
					
				while($resultSubCat = $query_diplaySubCategories->fetch(PDO::FETCH_ASSOC)){
					
								$Subcategory_id				= $resultSubCat['Subcategory_id'];
								$Subcategory_description	= $resultSubCat['Subcategory_description'];
		
								
								$results['Subcategory_id'][$i] 			= $Subcategory_id;
								$results['Subcategory_description'][$i] = $Subcategory_description;
								$results['Category_id'][$i] = $Category_id;
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





	
	if(isset($_POST['InsertLesson'])){
		
		$LessonName = $_POST['LessonName'];
				
		$InsertLesson = new lessons();
		$ResultInsertLessons = $InsertLesson->Insert_Lesson($LessonName);
				
				
				
			if($ResultInsertLessons == 1){
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else if($ResultInsertLessons == 2){
				$results['Status'] = 'repeated';
				print json_encode($results);
			
			}else{
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
			
}
	
	
	
	

if(isset($_POST['UpdateLessons'])){
		
		$lessonIdToEdit = $_POST['lessonIdToEdit'];
		$Lesson_DescriptionToEdit = $_POST['Lesson_DescriptionToEdit'];
				
		$EditLesson = new lessons();
		$ResultInsertLessons =	$EditLesson->update_Lesson($lessonIdToEdit, $Lesson_DescriptionToEdit);
				
				
				
			if($ResultInsertLessons == 1){
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else if($ResultInsertLessons == 2){
				$results['Status'] = 'repeated';
				print json_encode($results);
			
			}else{
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
			
}




if(isset($_POST['deleteLesson'])){
		
		$Lesson_Id = $_POST['Lesson_Id'];
		
				
			$DeleteLesson = new lessons();
			$ResultInsertLessons =	$DeleteLesson->Delete_lesson($Lesson_Id);
				
				
				
			if($ResultInsertLessons == 1){
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
			
}
	
	
	
	
	

	if(isset($_POST['InsertItem'])){
		
		$ItemType_Id 		= $_POST['ItemType_Id'];
		$Category_Id 		= $_POST['Category_Id'];
		$Subcategory_id 	= $_POST['Subcategory_id'];
		$Item_description 	= $_POST['Item_description'];
		$Reference 			= $_POST['Reference'];
		$Imagen 			= $_POST['Imagen'];
		$Initial_Quantity 	= $_POST['Initial_Quantity'];
		$Stock_Quantity 	= $_POST['Stock_Quantity'];
		$Price 				= $_POST['Price'];
		$DateItem 			= $_POST['DateItem'];
		$Expiration_date 	= $_POST['Expiration_date'];
		$Building 			= $_POST['Building'];
		$Department 		= $_POST['Department'];
		$Room 				= $_POST['Room'];
		$Cabine 			= $_POST['Cabine'];
		$Location_Description = $_POST['Location_Description'];
		$Grant_Id 			  = $_POST['Grant_Id'];
		$Vendor_Id 			  = $_POST['Vendor_Id'];
		$Grp 				  = $_POST['Grp'];
		$lessons 			  = $_POST['lessons'];
		
		
		
		//Create connection with Database
		
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
		
		
		$query_Insert = $DbConn->prepare("INSERT INTO items (Item_description,Reference,Imagen,Initial_Quantity,Stock_Quantity,Lessons_item,Date,Expiration_date,Price,Grant_Id,Vendor_Id,Category_Id,Subcategory_id,ItemType_Id,Building,Cabine,Room,Department,Location_Description,Grp) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
				
				
				$query_Insert->bindParam(1,$Item_description);
				$query_Insert->bindParam(2,$Reference);
				$query_Insert->bindParam(3,$Imagen);
				$query_Insert->bindParam(4,$Initial_Quantity);
				$query_Insert->bindParam(5,$Stock_Quantity);
				$query_Insert->bindParam(6,$lessons);
				$query_Insert->bindParam(7,$DateItem);
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
				
				$results = array();
				$results['Status'] = 'success';
				print json_encode($results);
			}else{
				
				$results = array();
				$results['Status'] = 'error';
				print json_encode($results);
				
				}
}





if(isset($_POST['insertReport'])){
	
	$Item_Id 	= $_POST['Item_Id'];
	$ItemReport = $_POST['ItemReport'];
	
	//Create a connection with Db
	
		
		$results = array();  //This will hold the info to display later with Json
		
		$InsertReport= new Item_Report(); 
		$resultInsertReport = $InsertReport->Insert_Item_Report($ItemReport,$Item_Id);
		
		
		 if($resultInsertReport == 1){
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	










if(isset($_POST['DisplayItemsReport'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$_SESSION['searchType'] = "reportAllItem"; // This Session it is necessary to create report excel documents.
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
	
	
	
	
	
	if(isset($_POST['DisplayPedingToReturn'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$_SESSION['searchType'] = "PendingToReturn"; // This Session it is necessary to create report excel documents.
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("SELECT * 
							from 	items, itemType, grants,vendors,categories,subcategories,transition 
							WHERE 	transition.Item_Id = items.Item_Id
							AND	transition.Transaction_Status_Id = 2 Group by items.Item_Id");
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
	
	
	
	
	
	
	
	
	if(isset($_POST['DisplayReportedItems'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$_SESSION['searchType'] = "ReportedItems"; // This Session it is necessary to create report excel documents.
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("SELECT * 
							from 	items, itemType, grants,vendors,categories,subcategories,Item_Report 
							WHERE 	Item_Report.Item_Id = items.Item_Id
							Group by items.Item_Id");
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
	
	
	
	
	
	
	
	
	
	if(isset($_POST['DisplayReportConsumable'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$_SESSION['searchType'] = "ReportConsumable"; // This Session it is necessary to create report excel documents.
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayItems = $DbConn->prepare("	SELECT * 
												from items, itemType, grants,vendors,categories,subcategories
												WHERE items.ItemType_Id = itemType.ItemType_Id 
													  AND items.ItemType_Id =1 Group by items.Item_Id");
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
	
	
	
	

?>


