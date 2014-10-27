<?php
require_once "../assets/common.php";
session_start();




if(isset($_POST['DisplayCartAcceptedByInstructor'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		// Status cart accepted by instructor 
		$Cart_Status_Id = 3;
		
		$query_diplayCart = $DbConn->prepare("SELECT * FROM cart,Groups WHERE cart.GroupId = Groups.GroupId AND Cart_Status_Id = ? Group by Group_Description");
		$query_diplayCart->bindParam(1,$Cart_Status_Id);
		$query_diplayCart->execute();
		
		$i = 0;
		
	if($query_diplayCart->rowCount() != 0){
					
				while($resultCart = $query_diplayCart->fetch(PDO::FETCH_ASSOC)){
					
			
								$Cart_Id				= $resultCart['Cart_Id'];
								$User_Id				= $resultCart['User_Id'];
								$Item_Id				= $resultCart['Item_Id'];	
								$Quantity				= $resultCart['Quantity'];
								$Days					= $resultCart['Days'];
								$Cart_Status_Id			= $resultCart['Cart_Status_Id'];
								$ConfirmInstructor_Date	= $resultCart['ConfirmInstructor_Date'];
								$Date					= $resultCart['Date'];
								$Time					= $resultCart['Time'];	
								
								$GroupId				= $resultCart['GroupId'];
								$Group_Description		= $resultCart['Group_Description'];
								$Start_Date				= $resultCart['Start_Date'];
								$End_Date				= $resultCart['End_Date'];
								
								
								
								$results['Cart_Id'][$i] 						= $Cart_Id;
								$results['User_Id'][$i] 						= $User_Id;
								$results['Item_Id'][$i] 						= $Item_Id;
								$results['Quantity'][$i] 						= $Quantity;
								$results['Days'][$i] 							= $Days;
								$results['Cart_Status_Id'][$i] 					= $Cart_Status_Id;
								$results['ConfirmInstructor_Date_Mysql'][$i] 	= $ConfirmInstructor_Date;
								$results['ConfirmInstructor_Date'][$i] 			= date("m/d/Y",strtotime($ConfirmInstructor_Date));
								$results['GroupId'][$i] 						= $GroupId;
								$results['Group_Description'][$i] 				= $Group_Description;
								
								
							
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






if(isset($_POST['SearchByGroupNameCartAcceptedByInstructor'])){
	
	$groupNameSearch = $_POST['groupNameSearch'].'%';
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		// Status cart accepted by instructor 
		$Cart_Status_Id = 3;
		
		$query_diplayCart = $DbConn->prepare("SELECT * FROM cart,Groups 
											  WHERE (Groups.Group_Description LIKE :search)
											  AND cart.GroupId = Groups.GroupId 
											  AND Cart_Status_Id = 3 Group by Group_Description");
		$query_diplayCart->bindParam(':search',$groupNameSearch);
		$query_diplayCart->execute();
		
		$i = 0;
		
	if($query_diplayCart->rowCount() != 0){
					
				while($resultCart = $query_diplayCart->fetch(PDO::FETCH_ASSOC)){
					
			
								$Cart_Id				= $resultCart['Cart_Id'];
								$User_Id				= $resultCart['User_Id'];
								$Item_Id				= $resultCart['Item_Id'];	
								$Quantity				= $resultCart['Quantity'];
								$Days					= $resultCart['Days'];
								$Cart_Status_Id			= $resultCart['Cart_Status_Id'];
								$ConfirmInstructor_Date	= $resultCart['ConfirmInstructor_Date'];
								$Date					= $resultCart['Date'];
								$Time					= $resultCart['Time'];	
								
								$GroupId				= $resultCart['GroupId'];
								$Group_Description		= $resultCart['Group_Description'];
								$Start_Date				= $resultCart['Start_Date'];
								$End_Date				= $resultCart['End_Date'];
								
								
								
								$results['Cart_Id'][$i] 						= $Cart_Id;
								$results['User_Id'][$i] 						= $User_Id;
								$results['Item_Id'][$i] 						= $Item_Id;
								$results['Quantity'][$i] 						= $Quantity;
								$results['Days'][$i] 							= $Days;
								$results['Cart_Status_Id'][$i] 					= $Cart_Status_Id;
								$results['ConfirmInstructor_Date_Mysql'][$i] 	= $ConfirmInstructor_Date;
								$results['ConfirmInstructor_Date'][$i] 			= date("m/d/Y",strtotime($ConfirmInstructor_Date));
								$results['GroupId'][$i] 						= $GroupId;
								$results['Group_Description'][$i] 				= $Group_Description;
								
								
							
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


if(isset($_POST['getInfoReservationsByInstructor'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$GroupId 						= $_POST['GroupId'];
		$User_Id 						= $_POST['User_Id'];
		$Cart_Status_Id 				= $_POST['Cart_Status_Id'];
		$ConfirmInstructor_Date_Mysql 	= $_POST['ConfirmInstructor_Date_Mysql'];
		
		// Status cart accepted by instructor 
	
	
	
	
	
													 
		
		$query_diplayCart = $DbConn->prepare("SELECT * FROM cart,items,users,Groups 
											  WHERE items.Item_Id = cart.Item_Id
                                                   AND cart.GroupId = Groups.GroupId 
                                                   AND users.User_Id = cart.User_Id
											       AND cart.GroupId = ? 
												   AND cart.User_Id = ? 
												   AND cart.Cart_Status_Id = ?");
											  
		$query_diplayCart->bindParam(1,$GroupId);
		$query_diplayCart->bindParam(2,$User_Id);
		$query_diplayCart->bindParam(3,$Cart_Status_Id);
		$query_diplayCart->execute();
		
		$i = 0;
		
	if($query_diplayCart->rowCount() != 0){
					
				while($resultCart = $query_diplayCart->fetch(PDO::FETCH_ASSOC)){
					
			
								$GroupId				= $resultCart['GroupId'];
								$Group_Description		= $resultCart['Group_Description'];
								
								$Cart_Id				= $resultCart['Cart_Id'];
								$User_Id				= $resultCart['User_Id'];
								$Item_Id				= $resultCart['Item_Id'];	
								$Quantity				= $resultCart['Quantity'];
								$Days					= $resultCart['Days'];
								$Cart_Status_Id			= $resultCart['Cart_Status_Id'];
								$ConfirmInstructor_Date	= $resultCart['ConfirmInstructor_Date'];
								
								$Item_description		= $resultCart['Item_description'];
								$Reference				= $resultCart['Reference'];	
								$Imagen					= $resultCart['Imagen'];
								$Initial_Quantity		= $resultCart['Initial_Quantity'];
								$Stock_Quantity			= $resultCart['Stock_Quantity'];
								$ItemType_Id			= $resultCart['ItemType_Id'];
								$Name					= $resultCart['Name'];
								$Last					= $resultCart['Last'];
								
								
								
								
								
								$results['GroupId'][$i] 						= $GroupId;
								$results['Group_Description'][$i] 				= $Group_Description;
								$results['Cart_Id'][$i] 						= $Cart_Id;
								$results['User_Id'][$i] 						= $User_Id;
								$results['Item_Id'][$i] 						= $Item_Id;
								$results['Quantity'][$i] 						= $Quantity;
								$results['Days'][$i] 							= $Days;
								$results['Cart_Status_Id'][$i] 					= $Cart_Status_Id;
								$results['ConfirmInstructor_Date_Mysql'][$i] 	= $ConfirmInstructor_Date;
								$results['ConfirmInstructor_Date'][$i] 			= date("m/d/Y",strtotime($ConfirmInstructor_Date));
								$results['Item_description'][$i] 				= $Item_description;
								$results['Reference'][$i] 						= $Reference;
								$results['Imagen'][$i] 							= $Imagen;
								$results['Initial_Quantity'][$i] 				= $Initial_Quantity;
								$results['Stock_Quantity'][$i] 					= $Stock_Quantity;
								$results['ItemType_Id'][$i] 					= $ItemType_Id;
								
								$results['Name'][$i] 					= $Name;
								$results['Last'][$i] 					= $Last;
								
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







if(isset($_POST['findInstructorGroup'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$GroupId 						= $_POST['GroupId'];
		$User_Type_Id = 3;
		// Status cart accepted by instructor 
	
	
	
		$query_diplayCart = $DbConn->prepare("SELECT users.Name, users.Last FROM MemberShips,users 
											  WHERE MemberShips.User_Id = users.User_Id
                                              AND MemberShips.GroupId = ?
                                              AND users.User_Type_Id = ?");
											  
		$query_diplayCart->bindParam(1,$GroupId);
		$query_diplayCart->bindParam(2,$User_Type_Id);
		
		$query_diplayCart->execute();
		
		$i = 0;
		
	if($query_diplayCart->rowCount() != 0){
					
				while($resultCart = $query_diplayCart->fetch(PDO::FETCH_ASSOC)){
					
								$Name	= $resultCart['Name'];
								$Last	= $resultCart['Last'];
				
								$results['Name'][$i] = $Name;
								$results['Last'][$i] = $Last;
								
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



/// This part is to confirm the items out of the office

	if(isset($_POST['StaffConfirmation'])){
	
			
			$Temple_Id 				= $_POST['templeIdCart'];
			$GroupId 				= $_POST['GroupId'];
			$ConfirmInstructor_Date = $_POST['ConfirmInstructor_Date'];
			$UserIdRequest 			= $_POST['UserIdRequest'];
			$Cart_Status_Id = 3;
			$Id_Stuff="";
			$Transaction_Status_Id="";
			
		
			
			$dateAccepted = 	date('Y-m-d',strtotime($ConfirmInstructor_Date));
			
			$Db = new Connection();
			$DbConn = $Db->ConnectDB();
			$results = array();  //This will hold the info to display later with Json
			
				if(strlen($Temple_Id)== 9){
					
						 
						 
						 	// Get info staff info 
			
								$getIdStuff = new Users();
								$getIdStuff->get_User_Info_by_TempleID($Temple_Id);
								$Id_Stuff = $getIdStuff->User_Id ;
								$User_type_Staff = $getIdStuff->User_Type_Id ;
					
			
			
						 
						 
						 
								if($User_type_Staff == 2 || $User_type_Staff == 5){
									
									
									
									$GetInfo_cart = $DbConn->prepare("SELECT cart.Cart_Id,cart.User_Id,cart.GroupId,cart.Quantity,cart.Days,cart.Days,
																			 cart.Cart_Status_Id,cart.ConfirmInstructor_Date,cart.Date,cart.Item_Id,
																			 items.ItemType_Id 
																	 FROM cart,items
																 	 WHERE 
																		cart.Item_Id = items.Item_Id
																		AND cart.User_Id = ?
																		AND cart.GroupId = ? 
																		AND cart.Cart_Status_Id = ? 
																		AND cart.ConfirmInstructor_Date = ?");
															
									$GetInfo_cart->bindParam(1,$UserIdRequest);
									$GetInfo_cart->bindParam(2,$GroupId);
									$GetInfo_cart->bindParam(3,$Cart_Status_Id);
									$GetInfo_cart->bindParam(4,$dateAccepted);
									$GetInfo_cart->execute();
									
									
									
									if($GetInfo_cart->rowCount() > 0){
										
										
										$CreateTransition = new transition();
										$CartFunction = new Cart();
										
										while($resultCartItems = $GetInfo_cart->fetch(PDO::FETCH_ASSOC)){
										
										
												$Cart_Id				= $resultCartItems['Cart_Id'];
												$User_Id				= $resultCartItems['User_Id'];
												$GroupId				= $resultCartItems['GroupId'];
												$Item_Id				= $resultCartItems['Item_Id'];
												$Quantity				= $resultCartItems['Quantity'];
												$Days					= $resultCartItems['Days'];
												$Time					= $resultCartItems['Time'];
												$Cart_Status_Id			= $resultCartItems['Cart_Status_Id'];
												$ConfirmInstructor_Date	= $resultCartItems['ConfirmInstructor_Date'];
												$Date					= $resultCartItems['Date'];
												$ItemType_Id			= $resultCartItems['ItemType_Id'];
											
											
												$Start_Date 		= date('Y-m-d',strtotime($ConfirmInstructor_Date));
												$TimeToInsert 		= date('H:i:s',strtotime($Time_Transaction));
												$Start_End 			= date('Y-m-d',strtotime('+'.(int)$Days.'days', strtotime($Start_Date)));
												
												if($ItemType_Id != 2){
													$Transaction_Status_Id = 1;
													// Reduce initial quantity becase it is a consumable items
													$CreateTransition->UpdateInitialQuantity($Item_Id, $Quantity);
													
													
												}else{
													$Transaction_Status_Id = 2;
													
												}
												
													//Crear transitions
											
												 $ResultTransition = $CreateTransition->Create_Transition($User_Id,$GroupId,$Start_Date,$Start_End,
																										  $TimeToInsert,$Item_Id,$Quantity,
																										  $Transaction_Status_Id,$Id_Stuff);
												 	
													
													//Delete from the cart becaut it is not necessary on this tables
													
													
												$CartFunction->deleteCartById($Cart_Id);
											
										 } // End else conditions
										
									
										$results['Status'] = 'success';
										print json_encode($results);
										
										
									}else{
										
										$results['Status'] = 'error';
										print json_encode($results);
									
										}
									
			}else{
									
					$results['Status'] = 'WrongStaffId';
					print json_encode($results);
					
			}
							
											
				
	$CreateTransition = null;	
								
		}else if (strlen($Temple_Id) > 9){
						
						
							$stringLong = 16;
							for($a=0,$b=0; $a<$stringLong; $a++, $b++)
							{
								$id[$a] = $Temple_Id[$b];
							}
							$TempleID = "";
							for($c=7, $d=0; $c<16; $c++, $d++)
							{
								$TempleID[$d] = $id[$c];
							}
							
							$TempleID = implode("",$TempleID);
				
				
				
				
								// Get info staff info 
			
								$getIdStuff = new Users();
								$getIdStuff->get_User_Info_by_TempleID($TempleID);
								$Id_Stuff = $getIdStuff->User_Id ;
								$User_type_Staff = $getIdStuff->User_Type_Id ;
									
							
			
				
				
				if($User_type_Staff == 2 || $User_type_Staff == 5){
									
									
									
									$GetInfo_cart = $DbConn->prepare("SELECT cart.Cart_Id,cart.User_Id,cart.GroupId,cart.Quantity,cart.Days,cart.Days,
																			 cart.Cart_Status_Id,cart.ConfirmInstructor_Date,cart.Date,cart.Item_Id,
																			 items.ItemType_Id 
																	 FROM cart,items
																 	 WHERE 
																		cart.Item_Id = items.Item_Id
																		AND cart.User_Id = ?
																		AND cart.GroupId = ? 
																		AND cart.Cart_Status_Id = ? 
																		AND cart.ConfirmInstructor_Date = ?");
															
									$GetInfo_cart->bindParam(1,$UserIdRequest);
									$GetInfo_cart->bindParam(2,$GroupId);
									$GetInfo_cart->bindParam(3,$Cart_Status_Id);
									$GetInfo_cart->bindParam(4,$dateAccepted);
									$GetInfo_cart->execute();
									
									
									
									if($GetInfo_cart->rowCount() > 0){
										
										
										$CreateTransition = new transition();
										$CartFunction = new Cart();
										
										while($resultCartItems = $GetInfo_cart->fetch(PDO::FETCH_ASSOC)){
										
										
												$Cart_Id				= $resultCartItems['Cart_Id'];
												$User_Id				= $resultCartItems['User_Id'];
												$GroupId				= $resultCartItems['GroupId'];
												$Item_Id				= $resultCartItems['Item_Id'];
												$Quantity				= $resultCartItems['Quantity'];
												$Days					= $resultCartItems['Days'];
												$Time					= $resultCartItems['Time'];
												$Cart_Status_Id			= $resultCartItems['Cart_Status_Id'];
												$ConfirmInstructor_Date	= $resultCartItems['ConfirmInstructor_Date'];
												$Date					= $resultCartItems['Date'];
												$ItemType_Id			= $resultCartItems['ItemType_Id'];
											
											
												$Start_Date 		= date('Y-m-d',strtotime($ConfirmInstructor_Date));
												$TimeToInsert 		= date('H:i:s',strtotime($Time_Transaction));
												$Start_End 			= date('Y-m-d',strtotime('+'.(int)$Days.'days', strtotime($Start_Date)));
												
												if($ItemType_Id != 2){
													$Transaction_Status_Id = 1;
													// Reduce initial quantity becase it is a consumable items
													$CreateTransition->UpdateInitialQuantity($Item_Id, $Quantity);
													
													
												}else{
													$Transaction_Status_Id = 2;
													
												}
												
													//Crear transitions
											
												 $ResultTransition = $CreateTransition->Create_Transition($User_Id,$GroupId,$Start_Date,$Start_End,
																										  $TimeToInsert,$Item_Id,$Quantity,
																										  $Transaction_Status_Id,$Id_Stuff);
												 	
													
													//Delete from the cart becaut it is not necessary on this tables
													
													
												$CartFunction->deleteCartById($Cart_Id);
											
										 } // End else conditions
										
									
										$results['Status'] = 'success';
										print json_encode($results);
										
										
									}else{
										
										$results['Status'] = 'error';
										print json_encode($results);
									
										}
									
			}else{
									
					$results['Status'] = 'WrongStaffId';
					print json_encode($results);
					
			}
							
											
				
	$CreateTransition = null;	
			
				
				
				
				
				}				
							
			
} // End function buttonTempleId
			
	
		
if(isset($_POST['DeleteStaffRequest'])){
					
					$body 			= $_POST['AnwserDeclined'];
					$GroupDeclined  = $_POST['GroupId'];
					$DateRequested  = $_POST['Date_Conf'];
					$UserDecline	= $_POST['User_Id'];
				
					$results = array();  //This will hold the info to display later with Json
					
					
					// It is necessary to return the items to the inventory. 
					
					$Db = new Connection();
					$DbConn = $Db->ConnectDB();
					
					$getInfoCartToDelete = $DbConn->prepare("SELECT * FROM cart 
															 WHERE GroupId = ?
															 AND User_Id = ?
															 AND ConfirmInstructor_Date = ? ");
					$getInfoCartToDelete->bindParam(1,$GroupDeclined);
					$getInfoCartToDelete->bindParam(2,$UserDecline);
					$getInfoCartToDelete->bindParam(3,$DateRequested);
					$getInfoCartToDelete->execute();
					
					
					if($getInfoCartToDelete->rowCount() != 0){
					
							$Upadate_Item_Stock = new item();
							
							while($resultInfoCart = $getInfoCartToDelete->fetch(PDO::FETCH_ASSOC)){
										
										$Item_Id	=	$resultInfoCart['Item_Id'];
										$Quantity	=	$resultInfoCart['Quantity'];
										
										// Know I need to increment the quantity on the database for each item
										
										 $Upadate_Item_Stock->Update_Item_Stock2($Item_Id,$Quantity);
								
								} // End while loop
							
							
							
							//find info user to sent the email 
							
							 
								$User_Functions = new Users();
								$User_Functions-> get_User_Info_by_ID($UserDecline);
								$to = $User_Functions->Email;
								
								$subject = "Item declined";
								
									$headersEmail = 'From: TUteach@temple.edu';
									
									if(mail($to, $subject, $body, $headersEmail)){
												
										$deleteCartItem = new Cart();
										$ResultDeletingCartRequest = $deleteCartItem->deleteCartByGroupAndDate($GroupDeclined, $DateRequested);
										
										if($ResultDeletingCartRequest != 0){
											
											$results['Status'] = 'success';
											print json_encode($results);
											$User_Functions = null;
										}else{
											
											$results['Status'] = 'error';
											print json_encode($results);
											$User_Functions = null;
										}
										
											
									}else{
											$results['Status'] = 'errorEmail';
											print json_encode($results);
											$User_Functions = null;
									}
							
					}else{
						
						$results['Status'] = 'errorUpdatingQuantity';
						print json_encode($results);
						$User_Functions = null;
						}
							
				}
				
				
				
				
				
	
if(isset($_POST['SendSmsMessage'])){	

	
	
	$User_Id 		= $_POST["User_Id"];
	$AnwserMessage 	= $_POST["AnwserMessage"];
	$PickTime 		= $_POST["PickTime"];
	$PickDate 		= $_POST["PickDate"];
	
	$results = array();  //This will hold the info to display later with Json
	
	
	
	try{
			//find info user to sent the email 
					 
				 		$User_Functions = new Users();
						$User_Functions-> get_User_Info_by_ID($User_Id);
						$Email 		= $User_Functions->Email;
						$name 		= $User_Functions->Name;
						$last 		= $User_Functions->Last;
						$Cellphone  = $User_Functions->Cellphone;
   						
						$Cellphone = (string)$Cellphone;


					 
					 
					 $to = $Email;
					 $subject = "Pick up";
					 $headersEmail = 'From: TUteach@temple.edu';
					 $body = wordwrap("$name the items you requested are ready for pickup at the TUteach Studio on $PickTime at $PickDate. If you have questions, or you will not pickup your items on the requested sign-out date, please contact the Studio at 215 204-2653 or 215 204-3628.");
										
					 mail($to, $subject, $body, $headersEmail);
	
		if($Cellphone != ""){
						
						/* $message = wordwrap("$name the items you requested are ready for pickup at the TUteach Studio on $PickTime. If you have questions, or you will not pickup your items on the requested sign-out date, please contact the Studio at 215 204-2653 or 215 204-3628."); */
						 
						 
						  $message = wordwrap("$name the items you requested are ready for pickup at the TUteach Studio on $PickTime. If you have questions, or you will not pickup your items on the requested sign-out date, please contact the Studio at 215 204-2653 or 215 204-3628.");
						 
						 		
								/*ATT*/
								mail("$Cellphone@mobile.att.net", "", "$AnwserMessage ", "From: TUteach <TUteach@temple.edu>\r\n");
								/*nextel*/
								mail("$Cellphone@messaging.nextel.com", "", "$AnwserMessage ", "From: TUteach <TUteach@temple.edu>\r\n");
								/*sprintpcs*/
								mail("$Cellphone@messaging.sprintpcs.com", "", "$AnwserMessage ", "From: TUteach <TUteach@temple.edu>\r\n");
								/*t-mobile*/
								mail("$Cellphone@tmomail.net", "", "$AnwserMessage ", "From: TUteach <TUteach@temple.edu>\r\n");
								/*verizon*/
								mail("$Cellphone@vtext.com", "", "$AnwserMessage ", "From: TUteach <TUteach@temple.edu>\r\n");
								/*voicestream*/
								mail("$Cellphone@voicestream.net", "", "From: TUteach <TUteach@temple.edu>\r\n");
								
					}
	
	
			$results['Status'] = 'success';
			print json_encode($results);
				
		
	}catch(PDOExecption $e) { 
	
			$results['Status'] = 'error';
			print json_encode($results);
			print "Error!: " . $e->getMessage() . "</br>"; 
			
   	} 	
				
				
	} // End DeleteStaffRequest
	
	
	
	
	
	
	
	
	
	
	
	
	


if(isset($_POST['ItemOut'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayTransitions = $DbConn->prepare("SELECT * FROM transition,items,users,Groups 
												WHERE transition.Item_Id = items.Item_Id
												AND transition.User_Id = users.User_Id
												AND transition.GroupId = Groups.GroupId
												AND transition.Transaction_Status_Id = 2");
		$query_diplayTransitions->execute();
		
		$i = 0;
		
	if($query_diplayTransitions->rowCount() != 0){
					
				while($resultTransitions = $query_diplayTransitions->fetch(PDO::FETCH_ASSOC)){
					
						
						
						// Transitions table
						
						
								$transition_Id			= $resultTransitions['transition_Id'];
								$User_Id				= $resultTransitions['User_Id'];
								$GroupId				= $resultTransitions['GroupId'];
								$Start_Date	 			= $resultTransitions['Start_Date'];
								$Start_End	 			= $resultTransitions['Start_End'];
								$Time_Transaction		= $resultTransitions['Time_Transaction'];
								$Item_Id				= $resultTransitions['Item_Id'];
								$Quantity				= $resultTransitions['Quantity'];
								$Transaction_Status_Id	= $resultTransitions['Transaction_Status_Id'];
								$Stuff_Confirmation_Id	= $resultTransitions['Stuff_Confirmation_Id'];
								
								
								// Info User
								$Name					= $resultTransitions['Name'];
								$Last					= $resultTransitions['Last'];
								$Email					= $resultTransitions['Email'];
								$Group_Description		= $resultTransitions['Group_Description'];
								
								
								
								
								
					
					
							// Info Items

								$Item_description		= $resultTransitions['Item_description'];
								$Reference				= $resultTransitions['Reference'];
								$Imagen					= $resultTransitions['Imagen'];
								



								
									
								$results['transition_Id'][$i] 			= $transition_Id;
								$results['User_Id'][$i] 				= $User_Id;
								$results['GroupId'][$i] 				= $GroupId;
								$results['Start_Date'][$i]				= date("m/d/Y",strtotime($Start_Date));
								$results['End_Date'][$i] 				= date("m/d/Y",strtotime($Start_End));
								$results['Start_Date_Mysql'][$i]		= $Start_Date;
								$results['End_Date_Mysql'][$i] 			= $Start_End;
								$results['Time_Transaction'][$i] 		= $Time_Transaction;
								$results['Item_Id'][$i] 				= $Item_Id;
								$results['Quantity'][$i] 				= $Quantity;
								$results['Transaction_Status_Id'][$i] 	= $Transaction_Status_Id;
								$results['Stuff_Confirmation_Id'][$i] 	= $Stuff_Confirmation_Id;
								$results['Item_description'][$i] 		= $Item_description;
								$results['Reference'][$i] 				= $Reference;
								$results['Imagen'][$i] 					= $Imagen;
								
								
								$results['Name'][$i] 					= $Name;
								$results['Last'][$i] 					= $Last;
								$results['Email'][$i] 					= $Email;
								$results['Group_Description'][$i] 		= $Group_Description;
						
								
					
								
								$EndDateToCalculate = $Start_End;
								$currentDate = date("Y-m-d");
								$Direrencia =  strtotime($EndDateToCalculate) - strtotime($currentDate);
								
								$results['DirerenciaDate'][$i] = $Direrencia;
							
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


			
		
if(isset($_POST['returnItemToInventory'])){
					
					$transition_Id 	= $_POST['transition_Id'];
					$Item_Id  		= $_POST['Item_Id'];
					$Quantity  		= $_POST['Quantity'];
					$Transaction_Status_Id =1;
				
					//Create a connection with Db
				
					$Db = new Connection();
					$DbConn = $Db->ConnectDB();
					$results = array();  //This will hold the info to display later with Json
		
					// Update the cart to item back to inventory
		
					$query_back_Items = $DbConn->prepare("UPDATE transition SET Transaction_Status_Id = ? WHERE transition_Id = ?");
					$query_back_Items->bindParam(1,$Transaction_Status_Id);
					$query_back_Items->bindParam(2,$transition_Id);
					$query_back_Items->execute();
					
					if($query_back_Items->rowCount() == 1){
						
						
						 // Now I need to back this item to the database/
						 
						$query_to_Inventory = $DbConn->prepare("UPDATE items SET Stock_Quantity = Stock_Quantity +  $Quantity
															    WHERE Item_Id = ?");
						$query_to_Inventory->bindParam(1,$Item_Id);
						$query_to_Inventory->execute();
						 
						
						if($query_to_Inventory->rowCount() == 1){
							
							$results['Status'] = 'success';
							print json_encode($results);
							$DbConn = null;
							
						}else{
							
							$results['Status'] = 'error';
							print json_encode($results);
							$DbConn = null;
							}
						
						
					}else{
							$results['Status'] = 'errorTransaction_Status';
							print json_encode($results);
							$DbConn = null;
						}

					
				
							
} // end returnItemToInventory function
			
		
		
	
				
		
if(isset($_POST['searchItemByReferenceStaff'])){
	
	//Create a connection with Db
	
		$reference = $_POST['reference'];
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayTransitions = $DbConn->prepare("SELECT * FROM transition,items 
												WHERE transition.Item_Id = items.Item_Id
												AND transition.Transaction_Status_Id = 2 AND items.Reference = ?");
		$query_diplayTransitions->bindParam(1,$reference);
		$query_diplayTransitions->execute();
		
		$i = 0;
		
	if($query_diplayTransitions->rowCount() != 0){
					
				while($resultTransitions = $query_diplayTransitions->fetch(PDO::FETCH_ASSOC)){
					
						
						
						// Transitions table
						
						
								$transition_Id			= $resultTransitions['transition_Id'];
								$User_Id				= $resultTransitions['User_Id'];
								$GroupId				= $resultTransitions['GroupId'];
								$Start_Date	 			= $resultTransitions['Start_Date'];
								$Start_End	 			= $resultTransitions['Start_End'];
								$Time_Transaction		= $resultTransitions['Time_Transaction'];
								$Item_Id				= $resultTransitions['Item_Id'];
								$Quantity				= $resultTransitions['Quantity'];
								$Transaction_Status_Id	= $resultTransitions['Transaction_Status_Id'];
								$Stuff_Confirmation_Id	= $resultTransitions['Stuff_Confirmation_Id'];
					
					
							// Info Items

								$Item_description		= $resultTransitions['Item_description'];
								$Reference				= $resultTransitions['Reference'];
								$Imagen					= $resultTransitions['Imagen'];
								



								
									
								$results['transition_Id'][$i] 			= $transition_Id;
								$results['User_Id'][$i] 				= $User_Id;
								$results['GroupId'][$i] 				= $GroupId;
								$results['Start_Date'][$i]				= date("m/d/Y",strtotime($Start_Date));
								$results['End_Date'][$i] 				= date("m/d/Y",strtotime($Start_End));
								$results['Start_Date_Mysql'][$i]		= $Start_Date;
								$results['End_Date_Mysql'][$i] 			= $Start_End;
								$results['Time_Transaction'][$i] 		= $Time_Transaction;
								$results['Item_Id'][$i] 				= $Item_Id;
								$results['Quantity'][$i] 				= $Quantity;
								$results['Transaction_Status_Id'][$i] 	= $Transaction_Status_Id;
								$results['Stuff_Confirmation_Id'][$i] 	= $Stuff_Confirmation_Id;
								$results['Item_description'][$i] 		= $Item_description;
								$results['Reference'][$i] 				= $Reference;
								$results['Imagen'][$i] 					= $Imagen;
								
						
								
					
								
								$EndDateToCalculate = $Start_End;
								$currentDate = date("Y-m-d");
								$Direrencia =  strtotime($EndDateToCalculate) - strtotime($currentDate);
								
								$results['DirerenciaDate'][$i] = $Direrencia;
							
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
	
		
if(isset($_POST['searchItemByDescriptionStaff'])){
	
	//Create a connection with Db
	
	
		$Description = $_POST['Description'].'%';
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayTransitions = $DbConn->prepare("SELECT * FROM transition,items 
												WHERE (items.Item_description LIKE :search)
												 AND transition.Item_Id = items.Item_Id 
												 AND transition.Transaction_Status_Id = 2");
		$query_diplayTransitions->bindParam(':search',$Description);
		$query_diplayTransitions->execute();
		
		$i = 0;
		
	if($query_diplayTransitions->rowCount() != 0){
					
				while($resultTransitions = $query_diplayTransitions->fetch(PDO::FETCH_ASSOC)){
					
						
						
						// Transitions table
						
						
								$transition_Id			= $resultTransitions['transition_Id'];
								$User_Id				= $resultTransitions['User_Id'];
								$GroupId				= $resultTransitions['GroupId'];
								$Start_Date	 			= $resultTransitions['Start_Date'];
								$Start_End	 			= $resultTransitions['Start_End'];
								$Time_Transaction		= $resultTransitions['Time_Transaction'];
								$Item_Id				= $resultTransitions['Item_Id'];
								$Quantity				= $resultTransitions['Quantity'];
								$Transaction_Status_Id	= $resultTransitions['Transaction_Status_Id'];
								$Stuff_Confirmation_Id	= $resultTransitions['Stuff_Confirmation_Id'];
					
					
							// Info Items

								$Item_description		= $resultTransitions['Item_description'];
								$Reference				= $resultTransitions['Reference'];
								$Imagen					= $resultTransitions['Imagen'];
								



								
									
								$results['transition_Id'][$i] 			= $transition_Id;
								$results['User_Id'][$i] 				= $User_Id;
								$results['GroupId'][$i] 				= $GroupId;
								$results['Start_Date'][$i]				= date("m/d/Y",strtotime($Start_Date));
								$results['End_Date'][$i] 				= date("m/d/Y",strtotime($Start_End));
								$results['Start_Date_Mysql'][$i]		= $Start_Date;
								$results['End_Date_Mysql'][$i] 			= $Start_End;
								$results['Time_Transaction'][$i] 		= $Time_Transaction;
								$results['Item_Id'][$i] 				= $Item_Id;
								$results['Quantity'][$i] 				= $Quantity;
								$results['Transaction_Status_Id'][$i] 	= $Transaction_Status_Id;
								$results['Stuff_Confirmation_Id'][$i] 	= $Stuff_Confirmation_Id;
								$results['Item_description'][$i] 		= $Item_description;
								$results['Reference'][$i] 				= $Reference;
								$results['Imagen'][$i] 					= $Imagen;
								
						
								
					
								
								$EndDateToCalculate = $Start_End;
								$currentDate = date("Y-m-d");
								$Direrencia =  strtotime($EndDateToCalculate) - strtotime($currentDate);
								
								$results['DirerenciaDate'][$i] = $Direrencia;
							
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
		
		
	
				
				
	
?>




