<?php
require_once "../assets/common.php";


/*							
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
		Grp		
			
	
			
			
			
		*/					
		
		
		
		
if(isset($_POST['buttonSentCart'])){
		
				
		
			$results = array();

		//Create connection with Database
		
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			
		try{
				
				$Quantity	= $_POST['Quantity'];
				$Days 		= $_POST['NumbersDays'];                                  
				$User_Id 	= $_POST['userIdCart'];
				$Item_Id 	= $_POST['ItemIdCart'];
				$StockBeforeUpdate 	= $_POST['StockBeforeUpdate'];
				
					$Date = date("Y-m-d");
				
				$Cart_Status_Id = 1;
				$InsertToCart = new Cart();
				$InsertToCart->Insert_Cart($User_Id,$Item_Id,$Quantity,$Days,$Cart_Status_Id,$Date);
				
				
				
				/// Now I need to create the output with all articles that are selected by the user
				
				
							$Cart_Status_Id = 1;  // Status 1 because it means active cart without sent yet to the instructore
							
							$query_Cart = $DbConn->prepare("SELECT * FROM cart WHERE User_Id = ? AND Cart_Status_Id = ?");
							$query_Cart->bindParam(1,$User_Id);
							$query_Cart->bindParam(2,$Cart_Status_Id);
							$query_Cart->execute();
							
							
							$getInfoItems = new item();
							
							while($result_cart = $query_Cart->fetch(PDO::FETCH_ASSOC)){
								
								
								$Cart_Id		= $result_cart['Cart_Id'];
								$Item_Id		= $result_cart['Item_Id'];
								$Quantity		= $result_cart['Quantity'];
								$Days			= $result_cart['Days'];
								$Cart_Status_Id	= $result_cart['Cart_Status_Id'];
								
								$getInfoItems->get_Item_Info_by_ID($Item_Id);
								
								$results['Cart_Id'][$i] = $Cart_Id;
								$results['Item_Id'][$i] = $Item_Id;
								$results['Quantity'][$i]= $Quantity;
								$results['Days'][$i] = $Days;
								$results['Cart_Status_Id'][$i] = $Cart_Status_Id;
								$results['Description'][$i] = $getInfoItems->Item_description;
								$results['ImageItem'][$i] = $getInfoItems->Imagen;
								$results['Reference'][$i] = $getInfoItems->Reference;
								
								$i++;
							}
				
						
		
		$results['Status'] = "success";
		print json_encode($results);
				 
		}catch (Exception $e) {
			
			$results = array();
			$results['Status'] = "error";
			print json_encode($results);
			
		
			
		}
	
			$DbConn = null;
		
		
	}
	
	
	
	
	
	
	
  
  if(isset($_POST['DeleteItemCart'])){
	  
	  $ItemDeleteCart = $_POST['CartId'];
	  $User_Id = $_POST['User_Id'];
	 
	  // Before delete the Item from the cart it is necessary back the Quantity to the stok
	  
	  	//Create connection with Database
		
	
	  
	
		$results = array();

		//Create connection with Database
		
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			
		try{
				$DeleteItemCart = new Cart();
	  			$DeleteItemCart->deleteCartById($ItemDeleteCart);
				
				
				/// Now I need to create the output with all articles that are selected by the user
				
				
							$Cart_Status_Id = 1;  // Status 1 because it means active cart without sent yet to the instructore
							
							$query_Cart = $DbConn->prepare("SELECT * FROM cart WHERE User_Id = ? AND Cart_Status_Id = ?");
							$query_Cart->bindParam(1,$User_Id);
							$query_Cart->bindParam(2,$Cart_Status_Id);
							$query_Cart->execute();
							
							
							$getInfoItems = new item();
							
							while($result_cart = $query_Cart->fetch(PDO::FETCH_ASSOC)){
								
								
								$Cart_Id		= $result_cart['Cart_Id'];
								$Item_Id		= $result_cart['Item_Id'];
								$Quantity		= $result_cart['Quantity'];
								$Days			= $result_cart['Days'];
								$Cart_Status_Id	= $result_cart['Cart_Status_Id'];
								
								$getInfoItems->get_Item_Info_by_ID($Item_Id);
								
								$results['Cart_Id'][$i] = $Cart_Id;
								$results['Item_Id'][$i] = $Item_Id;
								$results['Quantity'][$i]= $Quantity;
								$results['Days'][$i] = $Days;
								$results['Cart_Status_Id'][$i] = $Cart_Status_Id;
								$results['Description'][$i] = $getInfoItems->Item_description;
								$results['ImageItem'][$i] = $getInfoItems->Imagen;
								$results['Reference'][$i] = $getInfoItems->Reference;
								
								$i++;
							}
				
						
		
		$results['Status'] = "success";
		print json_encode($results);
				 
		}catch (Exception $e) {
			
			$results = array();
			$results['Status'] = "error";
			print json_encode($results);
			
		
			
		}
	
			$DbConn = null;
	
	
	  
	 }
	
	
	
	
	
	
	if(isset($_POST['DisplayItemCart'])){
		
		
		$User_Id = $_POST['User_Id'];
		
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
			
			try{
				
				/// Now I need to create the output with all articles that are selected by the user
				
				
							$Cart_Status_Id = 1;  // Status 1 because it means active cart without sent yet to the instructore
							
							$query_Cart = $DbConn->prepare("SELECT * FROM cart WHERE User_Id = ? AND Cart_Status_Id = ?");
							$query_Cart->bindParam(1,$User_Id);
							$query_Cart->bindParam(2,$Cart_Status_Id);
							$query_Cart->execute();
							
							
							$getInfoItems = new item();
							
							while($result_cart = $query_Cart->fetch(PDO::FETCH_ASSOC)){
								
								
								$Cart_Id		= $result_cart['Cart_Id'];
								$Item_Id		= $result_cart['Item_Id'];
								$Quantity		= $result_cart['Quantity'];
								$Days			= $result_cart['Days'];
								$Cart_Status_Id	= $result_cart['Cart_Status_Id'];
								
								$getInfoItems->get_Item_Info_by_ID($Item_Id);
								
								$results['Cart_Id'][$i] = $Cart_Id;
								$results['Item_Id'][$i] = $Item_Id;
								$results['Quantity'][$i]= $Quantity;
								$results['Days'][$i] = $Days;
								$results['Cart_Status_Id'][$i] = $Cart_Status_Id;
								$results['Description'][$i] = $getInfoItems->Item_description;
								$results['ImageItem'][$i] = $getInfoItems->Imagen;
								$results['Reference'][$i] = $getInfoItems->Reference;
								
								$i++;
							}
				
						
		
		$results['Status'] = "success";
		print json_encode($results);
				 
		}catch (Exception $e) {
			
			$results = array();
			$results['Status'] = "error";
			print json_encode($results);
			
		
			
		}
	
			$DbConn = null;
	
	
	  
	 }
	
		
		
		
		
	 
	 if(isset($_POST['buttonConfirmModal'])){
		 
		 
		//Open conection 
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		
		
		$Id_UserModal 	= $_POST['UserIdLabel'];
		$groupIdLabel 	= $_POST['groupIdLabel'];
		$nameUser		= $_POST['NameUser'];
		
		
		
		
		 //Body to sent the email.;
		 $body = $_POST['textAreaInsturctore'];
		
		 //$subject to sent the email
		 $subject = "Items Student Request from $nameUser";
		 
		 //$Header to sent the email
		 $headersEmail = "Tuteach Studio";
		
		$update_Status_Item_cart = new Cart();
		$update_Status_Item_cart->Update_Status_Cart($Id_UserModal,$groupIdLabel);
		
		
		// After confirm the the cart how sended to the instructor it is necessary find the instructor of this
		// group to later sent and email 
		
		//Open new conection with Users class to find Instructors name
		$InstructorActions = new Users();
		
		
		 $User_Type_Id2 = 3;
		 
				
		 $query_getInstructor = $DbConn->prepare("SELECT users.User_Id FROM MemberShips, users WHERE users.User_Id = MemberShips.User_Id AND MemberShips.GroupId = ? AND users.User_Type_Id=?");
		 $query_getInstructor->bindParam(1,$groupIdLabel);
		 $query_getInstructor->bindParam(2,$User_Type_Id2);
	  	 $query_getInstructor->execute();
		
		 while($resultUser = $query_getInstructor->fetch(PDO::FETCH_ASSOC)){
		
				$InsturctorId  = $resultUser['User_Id'];	
				
				$InstructorActions->get_User_Info_by_ID($InsturctorId);
				$to = $InstructorActions->Email;
				mail($to, $subject, $body, $headersEmail);
			
		 }
		 
		
		 
		  
		   $results = array();
			$results['Status'] ='success';
			print json_encode($results);
		 
	$DbConn = null;

	}

	
	
  
  
  
		
		if(isset($_POST['buttonEmailbox'])){
			
			$EmailMember = $_POST['toEmailBox'];
			$Subject = $_POST['SubjectEmail'];
			$bodyBoxEmail = $_POST['bodyBoxEmail'];
			
			//$Header to sent the email
			$headersEmail = "Tuteach Studio";
			
			mail($EmailMember, $Subject, $bodyBoxEmail, $headersEmail);
			
	
			
			 
		    $results = array();
			$results['Status'] ='success';
			print json_encode($results);
			
			
			}
		
		
  
  
  
  
  
	
	
	if(isset($_POST['buttonReviewCartModal'])){
		
		
		$DatePOST 	 = $_POST['DateAndTime'];
		$GroupID = $_POST['GroupID'];
		
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
			
			try{
				
				/// Now I need to create the output with all articles that are selected by the user
				
				
							$Cart_Status_Id = 2;  // Status 2 means it need to be aprove from instructor.
							
							$query_Cart = $DbConn->prepare("SELECT * FROM cart WHERE GroupID = ? AND Cart_Status_Id = ? AND Date = ?");
							$query_Cart->bindParam(1,$GroupID);
							$query_Cart->bindParam(2,$Cart_Status_Id);
							$query_Cart->bindParam(3,$DatePOST);
							$query_Cart->execute();
							
							
							$getInfoItems = new item();
							$getInfoUser = new Users();
						
							while($result_cart = $query_Cart->fetch(PDO::FETCH_ASSOC)){
								
								
								$Cart_Id		= $result_cart['Cart_Id'];
								$User_Id		= $result_cart['User_Id'];
								$GroupId		= $result_cart['GroupId'];
								$Item_Id		= $result_cart['Item_Id'];
								$Quantity		= $result_cart['Quantity'];
								$Days			= $result_cart['Days'];
								$Cart_Status_Id	= $result_cart['Cart_Status_Id'];
								$Date			= $result_cart['Date'];
								
								$getInfoItems->get_Item_Info_by_ID($Item_Id);
								$getInfoUser->get_User_Info_by_ID($User_Id);
								
								$results['Cart_Id'][$i] 	= $Cart_Id;
								$results['User_Id'][$i] 	= $User_Id;
								$results['GroupId'][$i]		= $GroupId;
								$results['Item_Id'][$i] 	= $Item_Id;
								$results['Quantity'][$i] 	= $Quantity;
								$results['Days'][$i]		= $Days;
								$results['DateCart'][$i] 	= $Date;
								
								$results['Description'][$i] = $getInfoItems->Item_description;
								$results['ImageItem'][$i] 	= $getInfoItems->Imagen;
								$results['Reference'][$i]	= $getInfoItems->Reference;
								$results['MaxStock'][$i]	= $getInfoItems->Stock_Quantity;
								
								$results['NameUser'][$i] 	= $getInfoUser->Name;
								$results['LastUser'][$i]	= $getInfoUser->Last;
								
								$i++;
							}
				
						
		
		$results['Status'] = "success";
		print json_encode($results);
				 
		}catch (Exception $e) {
			
			$results = array();
			$results['Status'] = "error";
			print json_encode($results);
			
		
			
		}
	
			$DbConn = null;
	
	
	  
	 }
	
		
		
  
  
  
  
  
  /// This function is to delete item from cart
  
  
  
	
	
	if(isset($_POST['buttonDeleteCartModal'])){
		
		
		$results = array();	 	
		$CartID = $_POST['CartID'];
		$Group = $_POST['GroupID'];
		
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		
		
		
		
			/// Here I need to find the date becase I had problems with javascript interpreation. 
		
		$DeletCart = $DbConn->prepare("SELECT * FROM cart WHERE Cart_Id = ?");
		$DeletCart->bindParam(1,$CartID); 	
		$DeletCart->execute();
		
		
		
		$ResultsDate = $DeletCart->fetchAll(PDO::FETCH_ASSOC);
		@$ResultsDate = $ResultsDate[0]; 
		$newDate = $ResultsDate['Date'];
		
		// Now delete item and continuing with process
		
		$DeletCart = $DbConn->prepare("DELETE QUICK FROM cart WHERE Cart_Id = ?");
		$DeletCart->bindParam(1,$CartID); 	
		$DeletCart->execute();
		
	
		
		if($DeletCart->rowCount() == 1){
	   
							$Cart_Status_Id = 2;
							$query_Cart = $DbConn->prepare("SELECT * FROM cart WHERE GroupID = ? AND Cart_Status_Id = ? AND Date = ?");
							$query_Cart->bindParam(1,$Group);
							$query_Cart->bindParam(2,$Cart_Status_Id);
							$query_Cart->bindParam(3,$newDate);
							$query_Cart->execute();
		
							if($query_Cart->rowCount() != 0){				
						
							
								$results['Status'] = "success";
								$results['GroupID'] = $Group;
								$results['CartID'] = $CartID;
								$results['DateAndTime'] = $newDate;
					
								print json_encode($results);
							}else{
								
								$results['Status'] = "closeBox";
								print json_encode($results);
								
								}
								
	}else{
		
		$results['Status'] = "errorDeleting";
		$results['GroupID'] = $Group;
		$results['CartID'] = $CartID;
		$results['DateAndTime'] = $newDate;
		print json_encode($results);
		}





			$DbConn = null;
	
	
	  
	 }
	
		
		
			if(isset($_POST['butonEditCartInstructor'])){
				
				
				 
					$results = array();	
					
					$quantity = $_POST['quantity'];
					$CartID = $_POST['CartID'];
					$Days = $_POST['Days'];
					
					$editItemsCart = new Cart();
					$resultFuction = $editItemsCart->UpdateCartQuantityAndDays($CartID, $quantity, $Days);
					
					
				
					
					if ($resultFuction == 1){
						
							$getInfoCart = new Cart();
							$getInfoCart->getInfoCartById($CartID);
							
				
						$results['Status'] 	= 'success' ;
						$results['DateM'] 	= $getInfoCart->Date;
						$results['GroupId'] = $getInfoCart->GroupId;
						
						print json_encode($results);
					
					}else{
						
						$getInfoCart = new Cart();
						$getInfoCart->getInfoCartById($CartID);
						$results['DateM'] 	= $getInfoCart->Date;
						$results['GroupId'] = $getInfoCart->GroupId;
					
						$results['Status'] = 'error' ;
						print json_encode($results);
					}
				
		} // end butonEditCartInstructor
  
  
  
  
  
  
  		if(isset($_POST['displayReservationInstructor'])){
				
				
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
		
					$results = array();	
					$User_Id 	= $_POST['User_Id'];
					
					$Cart_Status_Id = 2;
					
					// Note this user Id is the from the instructor. 
					
					$getAcceptedCart = $DbConn->prepare("SELECT * FROM cart,MemberShips,Groups,users
														  WHERE cart.GroupId = Groups.GroupId AND MemberShips.GroupId = Groups.GroupId AND 
														  cart.User_Id = users.User_Id  AND
														  MemberShips.User_Id = ? AND cart.Cart_Status_Id = ? GROUP BY cart.GroupId;");
					$getAcceptedCart->bindParam(1,$User_Id);
					$getAcceptedCart->bindParam(2,$Cart_Status_Id);
					$getAcceptedCart->execute();
					
					
					
					if($getAcceptedCart->rowCount() != 0){
						
						$getInfoGroup = new Groups();
						
							while($resultCartAccepted = $getAcceptedCart->fetch(PDO::FETCH_ASSOC)){
							
								$Cart_IdA 	= $resultCartAccepted['Cart_Id'];
								$Item_IdA 	= $resultCartAccepted['Item_Id'];
								$User_IdA 	= $resultCartAccepted['User_Id'];
								$GroupIdA	= $resultCartAccepted['GroupId'];
								$QuantityA 	= $resultCartAccepted['Quantity'];
								$DaysA 		= $resultCartAccepted['Days'];
								$DateA 		= $resultCartAccepted['Date'];
								$Email 		= $resultCartAccepted['Email'];
								
								//get info items
								
								$getInfoGroup->getInfoGroupById($GroupIdA);
								
								
								$results['Cart_Id'][$i] 	=  $Cart_IdA;
								$results['Item_Id'][$i]  	=  $Item_IdA;
								$results['User_Id'][$i]  	=  $User_IdA;
								$results['GroupId'][$i]  	=  $GroupIdA;
								$results['Quantity'][$i] 	=  $QuantityA;
								$results['Days'][$i]  		=  $DaysA;
								$results['DateA'][$i]  		=  $DateA;
								$results['Email'][$i]  		=  $Email;
							//Item Data
								$results['GroupName'][$i]  	=  $getInfoGroup->Group_Description;
								
							$i++;
						}
						
						
						
						$results['Status'] 	= 'success';
						print json_encode($results);
						
					  }	else{
						  
						$results['Status'] 	= 'empty' ;
						print json_encode($results);
						  
						  }
						
						
						$DbConn = null;
						$getInfoGroup = null;
		}
		
		
  
  
  if(isset($_POST['displayBoxInstructor'])){
				
				
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
		
					$results = array();	
					$DateI 		= $_POST['DateAndTime'];
					$GroupId 	= $_POST['GroupId'];
					$Cart_Status_Id = 2;
					
					// Note this user Id is the from the instructor. 
					
					$getAcceptedCart = $DbConn->prepare("SELECT cart.Cart_Id, cart.User_Id, cart.Item_Id,cart.GroupId,cart.Quantity,cart.Quantity,
																cart.Days,cart.Date,items.Item_description,items.Reference,items.Imagen
													     FROM cart,items
														  WHERE cart.Item_Id = items.Item_Id AND 
														        cart.GroupId = ? AND 
														  		cart.Cart_Status_Id = ? AND
																cart.Date = ?");
																		
					$getAcceptedCart->bindParam(1,$GroupId);
					$getAcceptedCart->bindParam(2,$Cart_Status_Id);
					$getAcceptedCart->bindParam(3,$DateI);
					$getAcceptedCart->execute();
					
						$results['rows'] = $getAcceptedCart->rowCount();
					
					if($getAcceptedCart->rowCount() != 0){
						
			
						
							while($resultCartAccepted = $getAcceptedCart->fetch(PDO::FETCH_ASSOC)){
							
								$Cart_IdA 	 = $resultCartAccepted['Cart_Id'];
								$User_Id 	 = $resultCartAccepted['User_Id'];
								$Item_IdA 	 = $resultCartAccepted['Item_Id'];
								$GroupIdA	 = $resultCartAccepted['GroupId'];
								$QuantityA 	 = $resultCartAccepted['Quantity'];
								$DaysA 		 = $resultCartAccepted['Days'];
								$DateA 		 = $resultCartAccepted['Date'];
								$Description = $resultCartAccepted['Item_description'];
								$Reference 	 = $resultCartAccepted['Reference'];
								$Imagen 	 = $resultCartAccepted['Imagen'];
								
								//get info items
								
								
								$results['Cart_Id'][$i] 	=  $Cart_IdA;
								$results['User_Id'][$i] 	=  $User_Id;
								$results['Item_Id'][$i]  	=  $Item_IdA;
								$results['GroupId'][$i]  	=  $GroupIdA;
								$results['Quantity'][$i] 	=  $QuantityA;
								$results['Days'][$i]  		=  $DaysA;
								$results['DateA'][$i]  		=  $DateA;
								$results['Description'][$i] =  $Description;
								$results['Reference'][$i] 	=  $Reference;
								$results['Imagen'][$i] 	=  $Imagen;
						
								
							$i++;
						}
						
						
						
						$results['Status'] 	= 'success';
						print json_encode($results);
						
					  }	else{
						  
						$results['Status'] 	= 'empty' ;
						print json_encode($results);
						  
						  }
						
						
						$DbConn = null;
		}
  
	
	
	
	
  

	if(isset($_POST['AcceptReservation'])){
		
		
		$results = array();	
			// Conection with db
				 	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		
		
		
		$dateAccepted = $_POST['DateA'];
		$GroupIDAccepted = $_POST['GroupID'];
		$User_IdAccepted = $_POST['UserId'];
		$ConfirmIns_Date = date("Y-m-d");
		
		
	
		
		$Cart_Status_Id = 2;
		// I need to find all items 
		
		$FindInfoCart = $DbConn->prepare("SELECT * FROM cart WHERE GroupId = ? AND Date = ? AND User_Id = ? AND Cart_Status_Id = ?");
		$FindInfoCart->bindParam(1,$GroupIDAccepted);
		$FindInfoCart->bindParam(2,$dateAccepted);
		$FindInfoCart->bindParam(3,$User_IdAccepted);
		$FindInfoCart->bindParam(4,$Cart_Status_Id);
		$FindInfoCart->execute();
		
		 $ReducceItemDb = new Cart();
		
		while($ResultCartInfo = $FindInfoCart->fetch(PDO::FETCH_ASSOC)){
			
			$Cart_Id					=	$ResultCartInfo['Cart_Id'];
			$User_Id					=	$ResultCartInfo['User_Id'];
			$GroupId					=	$ResultCartInfo['GroupId'];
			$Item_Id					=	$ResultCartInfo['Item_Id'];
			$Quantity					=	$ResultCartInfo['Quantity'];
			$Days						=	$ResultCartInfo['Days'];
			$Cart_Status_Id				=	$ResultCartInfo['Cart_Status_Id'];
			$ConfirmInstructor_Date		=	$ResultCartInfo['ConfirmInstructor_Date'];
			$Date						=	$ResultCartInfo['Date'];
			$Time						=	$ResultCartInfo['Time'];
			
			
			//I need to reduce the items on the database;
			
			 $ReducceItemDb->ReduceOfDatabase($Quantity, $Item_Id);
			
			
			} // End while loop
		
		
		
		
		
		
		
		
		$updateCartStatus = new Cart();
		$resultUpdateCart = $updateCartStatus->UpdateCartToAccepted($dateAccepted, $GroupIDAccepted, $ConfirmIns_Date);
		
		if($resultUpdateCart == 'true'){
			
		
			// Now Send email to student to pick up the Items.
		
				$ConfirmIns_Date = date("m-d-Y", strtotime($ConfirmIns_Date));
			
				
				$sendEmailPickUP = new Users();
				
				$sendEmailPickUP->get_User_Info_by_ID($User_IdAccepted);
				
				$to = $sendEmailPickUP->Email;
				$subject = "Requested accepted";
				$StdName = $sendEmailPickUP->Name;
				$StdLast = $sendEmailPickUP->Last;
				$Tilde = "'";
				
				
				$body = 'Dear ' .$StdLast.", " .$StdName.' 	
						
				Thank you for submitting an online order for materials via TUteach'.$Tilde.'s TRAK system. 
				Your order was accepted by the instructor at '. $ConfirmIns_Date.'. Please call the TUteach studio at 215 204-2653 or 215 204 3628 to schedule a pick up time.
				If you have any questions, please feel free to contact us. 
						
						
			   Regards 
						
						
			   The TUteach Studio 
			   Barton Hall A 306 
			   mailto:tuteach.studio@gmail.com';
			
			
				$headersEmail = 'From: tuteach.studio@gmail.com';
				
				mail($to, $subject, $body, $headersEmail);
				
			
			
			$results['Status'] 	= 'success' ;
			print json_encode($results);
			
		}else if($resultUpdateCart == '0Rows'){
			
			$results['Status'] 	= 'NoRows' ;
			print json_encode($results);
		
		}else{
			$results['Status'] 	= 'error' ;
			print json_encode($results);
		}
			
		
}

		
			
			
	

			


if(isset($_POST['declineButton'])){
		
		  
		
		
		$results = array();	
			// Conection with db
				 	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		
		
		
		$declinedMessage 	= $_POST['Message'];
		$Email_User 		= $_POST['Email'];
		$subject 			= "Request rejected";
		$DateAndTime 		= $_POST['DateD'];
		$GroupId 			= $_POST['GroupID'];
		
	
	try{
	
				$query_Delete = $DbConn->prepare("DELETE FROM cart WHERE GroupId = ? AND Date = ?");	
				$query_Delete->bindParam(1, $GroupId);
				$query_Delete->bindParam(2, $DateAndTime);
				$query_Delete->execute();
	
	
			if($query_Delete->rowCount() != 0){
			
				$headersEmail = 'From: tuteach.studio@gmail.com';
				mail($Email_User, $subject, $declinedMessage, $headersEmail);
			
				$results['Status'] 	= 'success' ;
				print json_encode($results);
			
			}else{
			
				$results['Status'] 	= 'NoRows' ;
				print json_encode($results);
			}
		
		
		
		
			
			
	}catch (Exception $e) {
			
   			 echo 'Caught exception: ',  $e->getMessage(), "\n";
			  $results['Status'] = 'error';
			 print json_encode($results);
		}
		
	} // End function Decline button

		
  
	
if(isset($_POST['DisplayItems'])){
		
		  
		  
			 $User_Id	=	$_POST['User_Id'];
			 $results = array();	
		
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			
		
		try{
		
			$DisplayItems = $DbConn->prepare("SELECT * FROM items WHERE items.Item_Id NOT IN (SELECT Item_Id FROM cart WHERE User_Id = ?)");
			$DisplayItems->bindParam(1,$User_Id);
			$DisplayItems->execute();
	
			$i = 0;
			if($DisplayItems->rowCount() != 0){
				
				
				
							while($resultDisplayItems = $DisplayItems->fetch(PDO::FETCH_ASSOC)){
							
								$Item_Id 			= $resultDisplayItems['Item_Id'];
								$Item_description 	= $resultDisplayItems['Item_description'];
								$Reference 	 		= $resultDisplayItems['Reference'];
								$Imagen	 			= $resultDisplayItems['Imagen'];
								$Initial_Quantity 	= $resultDisplayItems['Initial_Quantity'];
								$Stock_Quantity 	= $resultDisplayItems['Stock_Quantity'];
								$Lessons_item 		= $resultDisplayItems['Lessons_item'];
								$Date 				= $resultDisplayItems['Date'];
								$Expiration_date 	= $resultDisplayItems['Expiration_date'];
								$Price 				= $resultDisplayItems['Price'];
								$Grant_Id 			= $resultDisplayItems['Grant_Id'];
								$Vendor_Id 			= $resultDisplayItems['Vendor_Id'];
								$Category_Id 	 	= $resultDisplayItems['Category_Id'];
								$Subcategory_id	 	= $resultDisplayItems['Subcategory_id'];
								$ItemType_Id 		= $resultDisplayItems['ItemType_Id'];
								$Building 			= $resultDisplayItems['Building'];
								$Cabine 			= $resultDisplayItems['Cabine'];
								$Room 				= $resultDisplayItems['Room'];
								$Department 		= $resultDisplayItems['Department'];
								$Location_Description 	= $resultDisplayItems['Location_Description'];
								$Grp 				= $resultDisplayItems['Grp'];
			
								
								//get info items
							
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i]	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i]				= $Imagen;
								$results['Initial_Quantity'][$i]	= $Initial_Quantity;
								$results['Stock_Quantity'][$i]		= $Stock_Quantity;
								$results['Lessons_item'][$i]		= $Lessons_item;
								$results['DateItem'][$i]			= $Date;
								$results['Expiration_date'][$i]		= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i]			= $Grant_Id;
								$results['Vendor_Id'][$i]			= $Vendor_Id;
								$results['Category_Id'][$i]			= $Category_Id;
								$results['Subcategory_id'][$i]		= $Subcategory_id;
								$results['ItemType_Id'][$i]			= $ItemType_Id;
								$results['Building'][$i]			= $Building;
								$results['Cabine'][$i]				= $Cabine;
								$results['Room'][$i]				= $Room;
								$results['Department'][$i]			= $Department;
								$results['Location_Description'][$i]= $Location_Description;
								$results['Grp'][$i]					= $Grp;
								
						
								
							$i++;
						}
				
				
				
				$results['Status'] 	= 'success' ;
				print json_encode($results);
				
			}else{
					
				$results['Status'] 	= 'NoRows';
				print json_encode($results);	
					
			}
	
	
		}catch(PDOExecption $e) { 
				
			print "Error!: " . $e->getMessage() . "</br>"; 
			$results['Status'] 	= 'error' ;
			print json_encode($results);
			
   		} 	
	
	
	
	} // End function Decline button

	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
if(isset($_POST['DisplayItemsByDescription'])){
		
		  
		  
			 $User_Id	=	$_POST['User_Id'];
			 $results = array();	
		
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			
		
		try{
		
			$DisplayItems = $DbConn->prepare("SELECT * FROM items WHERE items.Item_Id NOT IN (SELECT Item_Id FROM cart WHERE User_Id = ?)
											  Order by Item_description");
			$DisplayItems->bindParam(1,$User_Id);
			$DisplayItems->execute();
	
			$i = 0;
			if($DisplayItems->rowCount() != 0){
				
				
				
							while($resultDisplayItems = $DisplayItems->fetch(PDO::FETCH_ASSOC)){
							
								$Item_Id 			= $resultDisplayItems['Item_Id'];
								$Item_description 	= $resultDisplayItems['Item_description'];
								$Reference 	 		= $resultDisplayItems['Reference'];
								$Imagen	 			= $resultDisplayItems['Imagen'];
								$Initial_Quantity 	= $resultDisplayItems['Initial_Quantity'];
								$Stock_Quantity 	= $resultDisplayItems['Stock_Quantity'];
								$Lessons_item 		= $resultDisplayItems['Lessons_item'];
								$Date 				= $resultDisplayItems['Date'];
								$Expiration_date 	= $resultDisplayItems['Expiration_date'];
								$Price 				= $resultDisplayItems['Price'];
								$Grant_Id 			= $resultDisplayItems['Grant_Id'];
								$Vendor_Id 			= $resultDisplayItems['Vendor_Id'];
								$Category_Id 	 	= $resultDisplayItems['Category_Id'];
								$Subcategory_id	 	= $resultDisplayItems['Subcategory_id'];
								$ItemType_Id 		= $resultDisplayItems['ItemType_Id'];
								$Building 			= $resultDisplayItems['Building'];
								$Cabine 			= $resultDisplayItems['Cabine'];
								$Room 				= $resultDisplayItems['Room'];
								$Department 		= $resultDisplayItems['Department'];
								$Location_Description 	= $resultDisplayItems['Location_Description'];
								$Grp 				= $resultDisplayItems['Grp'];
			
								
								//get info items
							
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i]	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i]				= $Imagen;
								$results['Initial_Quantity'][$i]	= $Initial_Quantity;
								$results['Stock_Quantity'][$i]		= $Stock_Quantity;
								$results['Lessons_item'][$i]		= $Lessons_item;
								$results['DateItem'][$i]			= $Date;
								$results['Expiration_date'][$i]		= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i]			= $Grant_Id;
								$results['Vendor_Id'][$i]			= $Vendor_Id;
								$results['Category_Id'][$i]			= $Category_Id;
								$results['Subcategory_id'][$i]		= $Subcategory_id;
								$results['ItemType_Id'][$i]			= $ItemType_Id;
								$results['Building'][$i]			= $Building;
								$results['Cabine'][$i]				= $Cabine;
								$results['Room'][$i]				= $Room;
								$results['Department'][$i]			= $Department;
								$results['Location_Description'][$i]= $Location_Description;
								$results['Grp'][$i]					= $Grp;
								
						
								
							$i++;
						}
				
				
				
				$results['Status'] 	= 'success' ;
				print json_encode($results);
				
			}else{
					
				$results['Status'] 	= 'NoRows';
				print json_encode($results);	
					
			}
	
	
		}catch(PDOExecption $e) { 
				
			print "Error!: " . $e->getMessage() . "</br>"; 
			$results['Status'] 	= 'error' ;
			print json_encode($results);
			
   		} 	
	
	
	
	} // End function Decline button

	
	
if(isset($_POST['DisplayItemsByReference'])){
		
		  
		  
			 $User_Id	=	$_POST['User_Id'];
			 $results = array();	
		
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			
		
		try{
		
			$DisplayItems = $DbConn->prepare("SELECT * FROM items WHERE items.Item_Id NOT IN (SELECT Item_Id FROM cart WHERE User_Id = ?)
											  Order by Reference");
			$DisplayItems->bindParam(1,$User_Id);
			$DisplayItems->execute();
	
			$i = 0;
			if($DisplayItems->rowCount() != 0){
				
				
				
							while($resultDisplayItems = $DisplayItems->fetch(PDO::FETCH_ASSOC)){
							
								$Item_Id 			= $resultDisplayItems['Item_Id'];
								$Item_description 	= $resultDisplayItems['Item_description'];
								$Reference 	 		= $resultDisplayItems['Reference'];
								$Imagen	 			= $resultDisplayItems['Imagen'];
								$Initial_Quantity 	= $resultDisplayItems['Initial_Quantity'];
								$Stock_Quantity 	= $resultDisplayItems['Stock_Quantity'];
								$Lessons_item 		= $resultDisplayItems['Lessons_item'];
								$Date 				= $resultDisplayItems['Date'];
								$Expiration_date 	= $resultDisplayItems['Expiration_date'];
								$Price 				= $resultDisplayItems['Price'];
								$Grant_Id 			= $resultDisplayItems['Grant_Id'];
								$Vendor_Id 			= $resultDisplayItems['Vendor_Id'];
								$Category_Id 	 	= $resultDisplayItems['Category_Id'];
								$Subcategory_id	 	= $resultDisplayItems['Subcategory_id'];
								$ItemType_Id 		= $resultDisplayItems['ItemType_Id'];
								$Building 			= $resultDisplayItems['Building'];
								$Cabine 			= $resultDisplayItems['Cabine'];
								$Room 				= $resultDisplayItems['Room'];
								$Department 		= $resultDisplayItems['Department'];
								$Location_Description 	= $resultDisplayItems['Location_Description'];
								$Grp 				= $resultDisplayItems['Grp'];
			
								
								//get info items
							
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i]	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i]				= $Imagen;
								$results['Initial_Quantity'][$i]	= $Initial_Quantity;
								$results['Stock_Quantity'][$i]		= $Stock_Quantity;
								$results['Lessons_item'][$i]		= $Lessons_item;
								$results['DateItem'][$i]			= $Date;
								$results['Expiration_date'][$i]		= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i]			= $Grant_Id;
								$results['Vendor_Id'][$i]			= $Vendor_Id;
								$results['Category_Id'][$i]			= $Category_Id;
								$results['Subcategory_id'][$i]		= $Subcategory_id;
								$results['ItemType_Id'][$i]			= $ItemType_Id;
								$results['Building'][$i]			= $Building;
								$results['Cabine'][$i]				= $Cabine;
								$results['Room'][$i]				= $Room;
								$results['Department'][$i]			= $Department;
								$results['Location_Description'][$i]= $Location_Description;
								$results['Grp'][$i]					= $Grp;
								
						
								
							$i++;
						}
				
				
				
				$results['Status'] 	= 'success' ;
				print json_encode($results);
				
			}else{
					
				$results['Status'] 	= 'NoRows';
				print json_encode($results);	
					
			}
	
	
		}catch(PDOExecption $e) { 
				
			print "Error!: " . $e->getMessage() . "</br>"; 
			$results['Status'] 	= 'error' ;
			print json_encode($results);
			
   		} 	
	
	
	
	} // End function Decline button
  
  
  
  
  
  
  
  
  
  
  
if(isset($_POST['DisplayItemsByStock'])){
		
		  
		  
			 $User_Id	=	$_POST['User_Id'];
			 $results = array();	
		
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			
		
		try{
		
			$DisplayItems = $DbConn->prepare("SELECT * FROM items WHERE items.Item_Id NOT IN (SELECT Item_Id FROM cart WHERE User_Id = ?)
											  Order by Stock_Quantity");
			$DisplayItems->bindParam(1,$User_Id);
			$DisplayItems->execute();
	
			$i = 0;
			if($DisplayItems->rowCount() != 0){
				
				
				
							while($resultDisplayItems = $DisplayItems->fetch(PDO::FETCH_ASSOC)){
							
								$Item_Id 			= $resultDisplayItems['Item_Id'];
								$Item_description 	= $resultDisplayItems['Item_description'];
								$Reference 	 		= $resultDisplayItems['Reference'];
								$Imagen	 			= $resultDisplayItems['Imagen'];
								$Initial_Quantity 	= $resultDisplayItems['Initial_Quantity'];
								$Stock_Quantity 	= $resultDisplayItems['Stock_Quantity'];
								$Lessons_item 		= $resultDisplayItems['Lessons_item'];
								$Date 				= $resultDisplayItems['Date'];
								$Expiration_date 	= $resultDisplayItems['Expiration_date'];
								$Price 				= $resultDisplayItems['Price'];
								$Grant_Id 			= $resultDisplayItems['Grant_Id'];
								$Vendor_Id 			= $resultDisplayItems['Vendor_Id'];
								$Category_Id 	 	= $resultDisplayItems['Category_Id'];
								$Subcategory_id	 	= $resultDisplayItems['Subcategory_id'];
								$ItemType_Id 		= $resultDisplayItems['ItemType_Id'];
								$Building 			= $resultDisplayItems['Building'];
								$Cabine 			= $resultDisplayItems['Cabine'];
								$Room 				= $resultDisplayItems['Room'];
								$Department 		= $resultDisplayItems['Department'];
								$Location_Description 	= $resultDisplayItems['Location_Description'];
								$Grp 				= $resultDisplayItems['Grp'];
			
								
								//get info items
							
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i]	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i]				= $Imagen;
								$results['Initial_Quantity'][$i]	= $Initial_Quantity;
								$results['Stock_Quantity'][$i]		= $Stock_Quantity;
								$results['Lessons_item'][$i]		= $Lessons_item;
								$results['DateItem'][$i]			= $Date;
								$results['Expiration_date'][$i]		= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i]			= $Grant_Id;
								$results['Vendor_Id'][$i]			= $Vendor_Id;
								$results['Category_Id'][$i]			= $Category_Id;
								$results['Subcategory_id'][$i]		= $Subcategory_id;
								$results['ItemType_Id'][$i]			= $ItemType_Id;
								$results['Building'][$i]			= $Building;
								$results['Cabine'][$i]				= $Cabine;
								$results['Room'][$i]				= $Room;
								$results['Department'][$i]			= $Department;
								$results['Location_Description'][$i]= $Location_Description;
								$results['Grp'][$i]					= $Grp;
								
						
								
							$i++;
						}
				
				
				
				$results['Status'] 	= 'success' ;
				print json_encode($results);
				
			}else{
					
				$results['Status'] 	= 'NoRows';
				print json_encode($results);	
					
			}
	
	
		}catch(PDOExecption $e) { 
				
			print "Error!: " . $e->getMessage() . "</br>"; 
			$results['Status'] 	= 'error' ;
			print json_encode($results);
			
   		} 	
	
	
	
	} // End function Decline button
  
  
  
  
  
  
  
if(isset($_POST['SearchItemsByDescription'])){
		
		  
		  
			 $User_Id	=			$_POST['User_Id'];
			 $DescriptionSearch	=	$_POST['DescriptionSearch'].'%';
			 $results = array();	
		
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			
		
		try{
		
			$DisplayItems = $DbConn->prepare("SELECT * FROM items WHERE (Item_description LIKE :search) AND items.Item_Id NOT IN 
											  (SELECT Item_Id FROM cart WHERE User_Id = :IdUser) Order by Stock_Quantity");
			$DisplayItems->bindParam(':search',$DescriptionSearch);
			$DisplayItems->bindParam(':IdUser',$User_Id);
			$DisplayItems->execute();
	
			$i = 0;
			if($DisplayItems->rowCount() != 0){
				
				
				
							while($resultDisplayItems = $DisplayItems->fetch(PDO::FETCH_ASSOC)){
							
								$Item_Id 			= $resultDisplayItems['Item_Id'];
								$Item_description 	= $resultDisplayItems['Item_description'];
								$Reference 	 		= $resultDisplayItems['Reference'];
								$Imagen	 			= $resultDisplayItems['Imagen'];
								$Initial_Quantity 	= $resultDisplayItems['Initial_Quantity'];
								$Stock_Quantity 	= $resultDisplayItems['Stock_Quantity'];
								$Lessons_item 		= $resultDisplayItems['Lessons_item'];
								$Date 				= $resultDisplayItems['Date'];
								$Expiration_date 	= $resultDisplayItems['Expiration_date'];
								$Price 				= $resultDisplayItems['Price'];
								$Grant_Id 			= $resultDisplayItems['Grant_Id'];
								$Vendor_Id 			= $resultDisplayItems['Vendor_Id'];
								$Category_Id 	 	= $resultDisplayItems['Category_Id'];
								$Subcategory_id	 	= $resultDisplayItems['Subcategory_id'];
								$ItemType_Id 		= $resultDisplayItems['ItemType_Id'];
								$Building 			= $resultDisplayItems['Building'];
								$Cabine 			= $resultDisplayItems['Cabine'];
								$Room 				= $resultDisplayItems['Room'];
								$Department 		= $resultDisplayItems['Department'];
								$Location_Description 	= $resultDisplayItems['Location_Description'];
								$Grp 				= $resultDisplayItems['Grp'];
			
								
								//get info items
							
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i]	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i]				= $Imagen;
								$results['Initial_Quantity'][$i]	= $Initial_Quantity;
								$results['Stock_Quantity'][$i]		= $Stock_Quantity;
								$results['Lessons_item'][$i]		= $Lessons_item;
								$results['DateItem'][$i]			= $Date;
								$results['Expiration_date'][$i]		= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i]			= $Grant_Id;
								$results['Vendor_Id'][$i]			= $Vendor_Id;
								$results['Category_Id'][$i]			= $Category_Id;
								$results['Subcategory_id'][$i]		= $Subcategory_id;
								$results['ItemType_Id'][$i]			= $ItemType_Id;
								$results['Building'][$i]			= $Building;
								$results['Cabine'][$i]				= $Cabine;
								$results['Room'][$i]				= $Room;
								$results['Department'][$i]			= $Department;
								$results['Location_Description'][$i]= $Location_Description;
								$results['Grp'][$i]					= $Grp;
								
						
								
							$i++;
						}
				
				
				
				$results['Status'] 	= 'success' ;
				print json_encode($results);
				
			}else{
					
				$results['Status'] 	= 'NoRows';
				print json_encode($results);	
					
			}
	
	
		}catch(PDOExecption $e) { 
				
			print "Error!: " . $e->getMessage() . "</br>"; 
			$results['Status'] 	= 'error' ;
			print json_encode($results);
			
   		} 	
	
	
	
	} // End function Decline button
  
  
  
  
  
  
  
  
if(isset($_POST['SearchItemsByCategory'])){
		
		  
		  
			 $User_Id	=			$_POST['User_Id'];
			 $CategorySearch	=	$_POST['CategorySearch'];
			 $results = array();	
		
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			
		
		try{
		
			$DisplayItems = $DbConn->prepare("SELECT * FROM items WHERE Category_Id = ? AND items.Item_Id NOT IN 
											  (SELECT Item_Id FROM cart WHERE User_Id = ?) Order by Stock_Quantity");
			$DisplayItems->bindParam(1,$CategorySearch);
			$DisplayItems->bindParam(2,$User_Id);
			$DisplayItems->execute();
	
			$i = 0;
			if($DisplayItems->rowCount() != 0){
				
				
				
							while($resultDisplayItems = $DisplayItems->fetch(PDO::FETCH_ASSOC)){
							
								$Item_Id 			= $resultDisplayItems['Item_Id'];
								$Item_description 	= $resultDisplayItems['Item_description'];
								$Reference 	 		= $resultDisplayItems['Reference'];
								$Imagen	 			= $resultDisplayItems['Imagen'];
								$Initial_Quantity 	= $resultDisplayItems['Initial_Quantity'];
								$Stock_Quantity 	= $resultDisplayItems['Stock_Quantity'];
								$Lessons_item 		= $resultDisplayItems['Lessons_item'];
								$Date 				= $resultDisplayItems['Date'];
								$Expiration_date 	= $resultDisplayItems['Expiration_date'];
								$Price 				= $resultDisplayItems['Price'];
								$Grant_Id 			= $resultDisplayItems['Grant_Id'];
								$Vendor_Id 			= $resultDisplayItems['Vendor_Id'];
								$Category_Id 	 	= $resultDisplayItems['Category_Id'];
								$Subcategory_id	 	= $resultDisplayItems['Subcategory_id'];
								$ItemType_Id 		= $resultDisplayItems['ItemType_Id'];
								$Building 			= $resultDisplayItems['Building'];
								$Cabine 			= $resultDisplayItems['Cabine'];
								$Room 				= $resultDisplayItems['Room'];
								$Department 		= $resultDisplayItems['Department'];
								$Location_Description 	= $resultDisplayItems['Location_Description'];
								$Grp 				= $resultDisplayItems['Grp'];
			
								
								//get info items
							
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i]	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i]				= $Imagen;
								$results['Initial_Quantity'][$i]	= $Initial_Quantity;
								$results['Stock_Quantity'][$i]		= $Stock_Quantity;
								$results['Lessons_item'][$i]		= $Lessons_item;
								$results['DateItem'][$i]			= $Date;
								$results['Expiration_date'][$i]		= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i]			= $Grant_Id;
								$results['Vendor_Id'][$i]			= $Vendor_Id;
								$results['Category_Id'][$i]			= $Category_Id;
								$results['Subcategory_id'][$i]		= $Subcategory_id;
								$results['ItemType_Id'][$i]			= $ItemType_Id;
								$results['Building'][$i]			= $Building;
								$results['Cabine'][$i]				= $Cabine;
								$results['Room'][$i]				= $Room;
								$results['Department'][$i]			= $Department;
								$results['Location_Description'][$i]= $Location_Description;
								$results['Grp'][$i]					= $Grp;
								
						
								
							$i++;
						}
				
				
				
				$results['Status'] 	= 'success' ;
				print json_encode($results);
				
			}else{
					
				$results['Status'] 	= 'NoRows';
				print json_encode($results);	
					
			}
	
	
		}catch(PDOExecption $e) { 
				
			print "Error!: " . $e->getMessage() . "</br>"; 
			$results['Status'] 	= 'error' ;
			print json_encode($results);
			
   		} 	
	
	
	
	} // End function Decline button
  
  
  
  
  
  
if(isset($_POST['SearchItemsByReference'])){
		
		  
		  
			 $User_Id	=			$_POST['User_Id'];
			 $ReferenceSearch	=	$_POST['ReferenceSearch'];
			 $results = array();	
		
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			
		
		try{
		
			$DisplayItems = $DbConn->prepare("SELECT * FROM items WHERE Reference = ? AND items.Item_Id NOT IN 
											  (SELECT Item_Id FROM cart WHERE User_Id = ?) Order by Stock_Quantity");
			$DisplayItems->bindParam(1,$ReferenceSearch);
			$DisplayItems->bindParam(2,$User_Id);
			$DisplayItems->execute();
	
			$i = 0;
			if($DisplayItems->rowCount() != 0){
				
				
				
							while($resultDisplayItems = $DisplayItems->fetch(PDO::FETCH_ASSOC)){
							
								$Item_Id 			= $resultDisplayItems['Item_Id'];
								$Item_description 	= $resultDisplayItems['Item_description'];
								$Reference 	 		= $resultDisplayItems['Reference'];
								$Imagen	 			= $resultDisplayItems['Imagen'];
								$Initial_Quantity 	= $resultDisplayItems['Initial_Quantity'];
								$Stock_Quantity 	= $resultDisplayItems['Stock_Quantity'];
								$Lessons_item 		= $resultDisplayItems['Lessons_item'];
								$Date 				= $resultDisplayItems['Date'];
								$Expiration_date 	= $resultDisplayItems['Expiration_date'];
								$Price 				= $resultDisplayItems['Price'];
								$Grant_Id 			= $resultDisplayItems['Grant_Id'];
								$Vendor_Id 			= $resultDisplayItems['Vendor_Id'];
								$Category_Id 	 	= $resultDisplayItems['Category_Id'];
								$Subcategory_id	 	= $resultDisplayItems['Subcategory_id'];
								$ItemType_Id 		= $resultDisplayItems['ItemType_Id'];
								$Building 			= $resultDisplayItems['Building'];
								$Cabine 			= $resultDisplayItems['Cabine'];
								$Room 				= $resultDisplayItems['Room'];
								$Department 		= $resultDisplayItems['Department'];
								$Location_Description 	= $resultDisplayItems['Location_Description'];
								$Grp 				= $resultDisplayItems['Grp'];
			
								
								//get info items
							
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i]	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i]				= $Imagen;
								$results['Initial_Quantity'][$i]	= $Initial_Quantity;
								$results['Stock_Quantity'][$i]		= $Stock_Quantity;
								$results['Lessons_item'][$i]		= $Lessons_item;
								$results['DateItem'][$i]			= $Date;
								$results['Expiration_date'][$i]		= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i]			= $Grant_Id;
								$results['Vendor_Id'][$i]			= $Vendor_Id;
								$results['Category_Id'][$i]			= $Category_Id;
								$results['Subcategory_id'][$i]		= $Subcategory_id;
								$results['ItemType_Id'][$i]			= $ItemType_Id;
								$results['Building'][$i]			= $Building;
								$results['Cabine'][$i]				= $Cabine;
								$results['Room'][$i]				= $Room;
								$results['Department'][$i]			= $Department;
								$results['Location_Description'][$i]= $Location_Description;
								$results['Grp'][$i]					= $Grp;
								
						
								
							$i++;
						}
				
				
				
				$results['Status'] 	= 'success' ;
				print json_encode($results);
				
			}else{
					
				$results['Status'] 	= 'NoRows';
				print json_encode($results);	
					
			}
	
	
		}catch(PDOExecption $e) { 
				
			print "Error!: " . $e->getMessage() . "</br>"; 
			$results['Status'] 	= 'error' ;
			print json_encode($results);
			
   		} 	
	
	
	
	} // End function Decline button
  
  
  
  
  
if(isset($_POST['SearchItemsByLessons'])){
		
		  
		  
			 $User_Id	=			$_POST['User_Id'];
			 $LessonSearch	=		'%'.$_POST['LessonSearch'].'%';
			 $results = array();	
		
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			
		
		try{
		
			$DisplayItems = $DbConn->prepare("SELECT * FROM items WHERE (Lessons_item LIKE :search) AND items.Item_Id NOT IN 
											  (SELECT Item_Id FROM cart WHERE User_Id = :IdIser) Order by Stock_Quantity");
			$DisplayItems->bindParam(':search',$LessonSearch);
			$DisplayItems->bindParam(':IdIser',$User_Id);
			$DisplayItems->execute();
	
			$i = 0;
			if($DisplayItems->rowCount() != 0){
				
				
				
							while($resultDisplayItems = $DisplayItems->fetch(PDO::FETCH_ASSOC)){
							
								$Item_Id 			= $resultDisplayItems['Item_Id'];
								$Item_description 	= $resultDisplayItems['Item_description'];
								$Reference 	 		= $resultDisplayItems['Reference'];
								$Imagen	 			= $resultDisplayItems['Imagen'];
								$Initial_Quantity 	= $resultDisplayItems['Initial_Quantity'];
								$Stock_Quantity 	= $resultDisplayItems['Stock_Quantity'];
								$Lessons_item 		= $resultDisplayItems['Lessons_item'];
								$Date 				= $resultDisplayItems['Date'];
								$Expiration_date 	= $resultDisplayItems['Expiration_date'];
								$Price 				= $resultDisplayItems['Price'];
								$Grant_Id 			= $resultDisplayItems['Grant_Id'];
								$Vendor_Id 			= $resultDisplayItems['Vendor_Id'];
								$Category_Id 	 	= $resultDisplayItems['Category_Id'];
								$Subcategory_id	 	= $resultDisplayItems['Subcategory_id'];
								$ItemType_Id 		= $resultDisplayItems['ItemType_Id'];
								$Building 			= $resultDisplayItems['Building'];
								$Cabine 			= $resultDisplayItems['Cabine'];
								$Room 				= $resultDisplayItems['Room'];
								$Department 		= $resultDisplayItems['Department'];
								$Location_Description 	= $resultDisplayItems['Location_Description'];
								$Grp 				= $resultDisplayItems['Grp'];
			
								
								//get info items
							
								$results['Item_Id'][$i] 			= $Item_Id;
								$results['Item_description'][$i]	= $Item_description;
								$results['Reference'][$i]			= $Reference;
								$results['Imagen'][$i]				= $Imagen;
								$results['Initial_Quantity'][$i]	= $Initial_Quantity;
								$results['Stock_Quantity'][$i]		= $Stock_Quantity;
								$results['Lessons_item'][$i]		= $Lessons_item;
								$results['DateItem'][$i]			= $Date;
								$results['Expiration_date'][$i]		= $Expiration_date;
								$results['Price'][$i]				= $Price;
								$results['Grant_Id'][$i]			= $Grant_Id;
								$results['Vendor_Id'][$i]			= $Vendor_Id;
								$results['Category_Id'][$i]			= $Category_Id;
								$results['Subcategory_id'][$i]		= $Subcategory_id;
								$results['ItemType_Id'][$i]			= $ItemType_Id;
								$results['Building'][$i]			= $Building;
								$results['Cabine'][$i]				= $Cabine;
								$results['Room'][$i]				= $Room;
								$results['Department'][$i]			= $Department;
								$results['Location_Description'][$i]= $Location_Description;
								$results['Grp'][$i]					= $Grp;
								
						
								
							$i++;
						}
				
				
				
				$results['Status'] 	= 'success' ;
				print json_encode($results);
				
			}else{
					
				$results['Status'] 	= 'NoRows';
				print json_encode($results);	
					
			}
	
	
		}catch(PDOExecption $e) { 
				
			print "Error!: " . $e->getMessage() . "</br>"; 
			$results['Status'] 	= 'error' ;
			print json_encode($results);
			
   		} 	
	
	
	
	} // End function Decline button
  
  
  
  
  
  
  
  
  
/*
 TABLE NAME 'Groups'
   
  GroupId
  Group_Description
  Start_Date
  End_Date
	 
*/


/*
 TABLE NAME 'MemberShips'

MemberShips_Id
GroupId
User_Id

*/
  
if(isset($_POST['SearchGroupsAndMembers'])){
	
	
	$UserId =	$_POST['UserId'];
	
	
	//Create a connection with Db
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayGroups = $DbConn->prepare("SELECT * FROM Groups,MemberShips WHERE Groups.GroupId = MemberShips.GroupId AND MemberShips.User_Id = ?");
		$query_diplayGroups->bindParam(1,$UserId);
		$query_diplayGroups->execute();
		
		$i = 0;
		

		
	if($query_diplayGroups->rowCount() != 0){
					
				while($resultGroups = $query_diplayGroups->fetch(PDO::FETCH_ASSOC)){
					
					
				
					
					
								$GroupId			= $resultGroups['GroupId'];
								$Group_Description	= $resultGroups['Group_Description'];
								$Start_Date			= $resultGroups['Start_Date'];
								$End_Date	 		= $resultGroups['End_Date'];
								
								$MemberShips_Id		= $resultGroups['MemberShips_Id'];
								$User_Id			= $resultGroups['User_Id'];
							
								
								
									
								$results['GroupId'][$i] 			= $GroupId;
								$results['Group_Description'][$i] 	= $Group_Description;
								$results['Start_Date'][$i]			= date("m/d/Y",strtotime($Start_Date));
								$results['End_Date'][$i] 			= date("m/d/Y",strtotime($End_Date));
								$results['Start_Date_Mysql'][$i]	= $Start_Date;
								$results['End_Date_Mysql'][$i] 		= $End_Date;
								
								$results['MemberShips_Id'][$i]		= $MemberShips_Id;
								$results['User_Id'][$i] 			= $User_Id;
								
								$EndDateToCalculate = $End_Date;
								$currentDate = date("Y-m-d");
								$Direrencia =  strtotime($EndDateToCalculate) - strtotime($currentDate);
								
								$results['DiferenceDate'][$i] = $Direrencia;
								
								
								
							
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




if(isset($_POST['DisplayGroupsAndMembers'])){
	
	
	$GroupId =	$_POST['GroupId'];
	
	
	//Create a connection with Db
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayGroups = $DbConn->prepare("SELECT * FROM Groups,MemberShips,users WHERE Groups.GroupId = MemberShips.GroupId 
												AND users.User_Id = MemberShips.User_Id AND  Groups.GroupId = ?");
		$query_diplayGroups->bindParam(1,$GroupId);
		$query_diplayGroups->execute();
		
		$i = 0;
		

		
	if($query_diplayGroups->rowCount() != 0){
					
				while($resultGroups = $query_diplayGroups->fetch(PDO::FETCH_ASSOC)){
	
								$GroupId			= $resultGroups['GroupId'];
								$Group_Description	= $resultGroups['Group_Description'];
								$Start_Date			= $resultGroups['Start_Date'];
								$End_Date	 		= $resultGroups['End_Date'];
								
								$MemberShips_Id		= $resultGroups['MemberShips_Id'];
								$User_Id			= $resultGroups['User_Id'];
						
								$Name				= $resultGroups['Name'];
								$Last				= $resultGroups['Last'];
								$User_Type_Id		= $resultGroups['User_Type_Id'];

						
						
						
									
								$results['GroupId'][$i] 			= $GroupId;
								$results['Group_Description'][$i] 	= $Group_Description;
								$results['Start_Date'][$i]			= date("m/d/Y",strtotime($Start_Date));
								$results['End_Date'][$i] 			= date("m/d/Y",strtotime($End_Date));
								$results['Start_Date_Mysql'][$i]	= $Start_Date;
								$results['End_Date_Mysql'][$i] 		= $End_Date;
								
								$results['MemberShips_Id'][$i]		= $MemberShips_Id;
								$results['User_Id'][$i] 			= $User_Id;
								
								
								$results['Name'][$i]				= $Name;
								$results['Last'][$i] 				= $Last;
								$results['User_Type_Id'][$i]		= $User_Type_Id;
								
								
								$EndDateToCalculate = $End_Date;
								$currentDate = date("Y-m-d");
								$Direrencia =  strtotime($EndDateToCalculate) - strtotime($currentDate);
								
								$results['DiferenceDate'][$i] = $Direrencia;
								
								
								
							
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













if(isset($_POST['displayCategoriesSearchSelect'])){
	
	 
	//Create a connection with Db
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayCategories = $DbConn->prepare("SELECT * FROM categories ORDER by Category_Description");
		$query_diplayCategories->execute();
		
		$i = 0;
		

		
	if($query_diplayCategories->rowCount() != 0){
					
				while($resultGroups = $query_diplayCategories->fetch(PDO::FETCH_ASSOC)){
	
								$Category_Id			= $resultGroups['Category_Id'];
								$Category_Description	= $resultGroups['Category_Description'];
									
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
  
  
  
  
  
  
  
  
  


if(isset($_POST['displayLessonsSearchSelect'])){
	
	 
	//Create a connection with Db
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayLessons= $DbConn->prepare("SELECT * FROM lessons");
		$query_diplayLessons->execute();
		
		$i = 0;
		

		
	if($query_diplayLessons->rowCount() != 0){
					
				while($resultGroups = $query_diplayLessons->fetch(PDO::FETCH_ASSOC)){
	
								$Lesson_Id			= $resultGroups['Lesson_Id'];
								$Lesson_description	= $resultGroups['Lesson_description'];
									
								$results['Lesson_Id'][$i] 			= $Lesson_Id;
								$results['Lesson_description'][$i] 	= $Lesson_description;
								
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
 
 
 
 
 

  if(isset($_POST['displayMebersRelatedGroup'])){
				
				
			// Conection with db
				 	
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
		
					$results = array();	
					$User_Id = $_POST['User_Id'];
			
					
					// Note this user Id is the from the instructor. 
					
					$getGroups = $DbConn->prepare("SELECT * 
												   FROM MemberShips,users,Groups 
												   WHERE MemberShips.GroupId = Groups.GroupId
												   	 AND MemberShips.User_Id = users.User_Id 
													 AND Groups.GroupId IN (SELECT GroupId FROM MemberShips WHERE MemberShips.User_Id = ?) Group by users.User_Id ");
					$getGroups->bindParam(1,$User_Id);
					$getGroups->execute();
					
					
					if($getGroups->rowCount() != 0){
						
			
						
							while($resultGroups = $getGroups->fetch(PDO::FETCH_ASSOC)){
							
								$User_Id 	 		= $resultGroups['User_Id'];
								$Name 	 			= $resultGroups['Name'];
								$MidleName 	 		= $resultGroups['MidleName'];
								$Last 	 			= $resultGroups['Last'];
								$Email 	 			= $resultGroups['Email'];
								$Image 	 			= $resultGroups['Image'];
								$Temple_Id 	 		= $resultGroups['Temple_Id'];
								$Cellphone 	 		= $resultGroups['Cellphone'];
								$Address1 	 		= $resultGroups['Address1'];
								$Address2 	 		= $resultGroups['Address2'];
								$City 	 			= $resultGroups['City'];
								$State 	 			= $resultGroups['State'];
								$Zip 	 			= $resultGroups['Zip'];
								$HomePhone 	 		= $resultGroups['HomePhone'];
								$WorkPhone 	 		= $resultGroups['WorkPhone'];
								$Website 	 		= $resultGroups['Website'];
								$User_Type_Id 	 	= $resultGroups['User_Type_Id'];
	
								$GroupId 	 		= $resultGroups['GroupId'];
								$Group_Description 	= $resultGroups['Group_Description'];
								
								//get info items
								
								$results['User_Id'][$i] 			=  $User_Id;
								$results['Name'][$i] 				=  $Name;
								$results['MidleName'][$i] 			=  $MidleName;
								$results['Last'][$i] 				=  $Last;
								$results['Email'][$i]				=  $Email;
								$results['ImageUser'][$i] 			=  $Image;

								$results['Temple_Id'][$i] 			=  $Temple_Id;
								$results['Cellphone'][$i] 			=  $Cellphone;
								$results['Address1'][$i] 			=  $Address1;
								$results['Address2'][$i] 			=  $Address2;
								$results['City'][$i]				=  $City;
								$results['State'][$i] 				=  $State;								
								$results['Zip'][$i] 				=  $Zip;
								$results['HomePhone'][$i]			=  $HomePhone;
								$results['WorkPhone'][$i] 			=  $WorkPhone;		
								$results['Website'][$i] 			=  $Website;	
								$results['User_Type_Id'][$i] 		=  $User_Type_Id;	
								
								
								$results['GroupId'][$i] 			=  $GroupId;
								$results['Group_Description'][$i] 	=  $Group_Description;
								
								
							$i++;
						}
						
						
						
						$results['Status'] 	= 'success';
						print json_encode($results);
						
			} else{
						  
				$results['Status'] 	= 'error' ;
				print json_encode($results);
						  
			 }
						
						
		$DbConn = null;
}
  
	
 
 
 
 ?>
 
 
 