<?php
session_start();
require_once "../assets/common.php";





//Start connection With Db
				$db = new Connection();
				$DbConnect  = $db->ConnectDB();

//This section is to register users on the database




		
		// This steps is to login the user
		
		if(isset($_POST['btnLogin']))
		{
			$Email = $_POST['emailLogin'];
			$Password = $_POST['PassLogin'];
			
			$login_User = new Users();
			$login_User-> Login($Email,$Password);
			
			
		}
		
		
		
/////////////// This is to insert user ///////////////////////////////////
		if(isset($_POST['submitUser'])){
			
			
			$StringSecurity[] = array();
			
			// This section is to control the security
			
			if(!isset($_POST['writeOwner'])){
				$StringSecurity[0] = 0;
				}else{$StringSecurity[0] = 1;}
			
			if(!isset($_POST['readOwner'])){
				$StringSecurity[1] = 0;
				}else{$StringSecurity[1] = 1; }
				
			if(!isset($_POST['executeOwner'])){
				$StringSecurity[2] = 0;
				}else{$StringSecurity[2] = 1; }
		
			if(!isset($_POST['writeUserGroup'])){
				$StringSecurity[3] = 0;
				}else{$StringSecurity[3] = 1;}
			
			if(!isset($_POST['readUserGroup'])){
				$StringSecurity[4] = 0;
				}else{$StringSecurity[4] = 1; }
				
			if(!isset($_POST['executeUserGroup'])){
				$StringSecurity[5] = 0;
				}else{$StringSecurity[5] = 1; }

			if(!isset($_POST['writeEvery'])){
				$StringSecurity[6] = 0;
				}else{$StringSecurity[6] = 1; }
			
			if(!isset($_POST['readEvery'])){
				$StringSecurity[7] = 0;
				}else{$StringSecurity[7] = 1; }
				
			if(!isset($_POST['executeEvery'])){
				$StringSecurity[8] = 0;
				}else{$StringSecurity[8] = 1; }
	
			
			// This part is to convert the Array in string
			
			$Permitions = implode($StringSecurity);
			
	//echo " <br>";
	// This section is to take the rest of the input values. 
	
	$name		= $_POST['name'];
	$midleName	= $_POST['midleName'];
	$last		= $_POST['last'];
	$pass		= $_POST['pass'];
	$templeId	= $_POST['templeId'];
	$strImagen	= $_POST['strImagen'];
	$email		= $_POST['email'];
	$Cellphone	= $_POST['cellphone'];
	$address1	= $_POST['address1'];
	$address2	= $_POST['address2'];
	$city		= $_POST['city'];
	$state		= $_POST['state'];
	$zip		= $_POST['zip'];
	$HomePhone	= $_POST['homephone'];
	$WorkPhone	= $_POST['workphone'];
	$Website	= $_POST['webSite'];
	$UserType	= $_POST['UserType'];
	
	
	
	
		
		$insert_user = new Users();
		
		$insert_user->Insert_User($name,$midleName,$last,$pass,$templeId,$strImagen,$email,$Cellphone,$address1,$address2,$city,$state,$zip,$HomePhone,
	$WorkPhone,$Website,$UserType,$Permitions);
	header("Location: ../weblg/Users.php?insertSucessfull=true");
		
	

		}
		
		
		
		if(isset($_GET['USERID'])){
		
					$ID_User = $_GET['USERID'];
					
					$deleteUser = $DbConnect->prepare("DELETE QUICK FROM users WHERE User_Id = ?");
					$deleteUser->bindParam(1,$ID_User);
					$deleteUser->execute();
					header("Location: ../weblg/Users.php");	
			}
		
	
   
   
  
			
	
		
        
        
        		
/////////////// This is to updae user ///////////////////////////////////
		if(isset($_POST['updateUser'])){
			
			
			$StringSecurity[] = array();
			
			// This section is to control the security
			
			if(!isset($_POST['writeOwner'])){
				$StringSecurity[0] = 0;
				}else{$StringSecurity[0] = 1;}
			
			if(!isset($_POST['readOwner'])){
				$StringSecurity[1] = 0;
				}else{$StringSecurity[1] = 1; }
				
			if(!isset($_POST['executeOwner'])){
				$StringSecurity[2] = 0;
				}else{$StringSecurity[2] = 1; }
		
			if(!isset($_POST['writeUserGroup'])){
				$StringSecurity[3] = 0;
				}else{$StringSecurity[3] = 1;}
			
			if(!isset($_POST['readUserGroup'])){
				$StringSecurity[4] = 0;
				}else{$StringSecurity[4] = 1; }
				
			if(!isset($_POST['executeUserGroup'])){
				$StringSecurity[5] = 0;
				}else{$StringSecurity[5] = 1; }

			if(!isset($_POST['writeEvery'])){
				$StringSecurity[6] = 0;
				}else{$StringSecurity[6] = 1; }
			
			if(!isset($_POST['readEvery'])){
				$StringSecurity[7] = 0;
				}else{$StringSecurity[7] = 1; }
				
			if(!isset($_POST['executeEvery'])){
				$StringSecurity[8] = 0;
				}else{$StringSecurity[8] = 1; }
	
			
			// This part is to convert the Array in string
			
			$Permitions = implode($StringSecurity);
			

	// This section is to take the rest of the input values. 
	$User_Id	= $_POST['id_User2'];
	$name		= $_POST['name2'];
	$midleName	= $_POST['midleName2'];
	$last		= $_POST['last2'];
	$templeId	= $_POST['templeId2'];
	$strImagen	= $_POST['strImagen2'];
	$email		= $_POST['email2'];
    $Cellphone	= $_POST['cellphone2'];
	$address1	= $_POST['address12'];
	$address2	= $_POST['address22'];
	$city		= $_POST['city2'];
	$state		= $_POST['state2'];
	$zip		= $_POST['zip2'];
	$HomePhone	= $_POST['homephone2'];
	$WorkPhone	= $_POST['workphone2'];
	$Website	= $_POST['webSite2'];
	$UserType	= $_POST['UserType2'];
	
	
	
	
		
		$Update_user = new Users();
		$Update_user->Update_User($User_Id,$name,$midleName,$last,$templeId,$strImagen, $email,$Cellphone,$address1,$address2,$city,$state,$zip,$HomePhone,$WorkPhone,$Website,$UserType,$Permitions);
		$_SESSION['IdTemporal'] ="";
		header("Location: ../weblg/Users.php");


		}
		
              
			   
			  
			  	if(isset($_GET['CategoryButton'])){
					
					
					$DesCat = $_GET['CategoryInput'];
					$inserCate = new categories();
					$inserCate->Insert_Category($DesCat);
					?>
                    
					<script>
					     location.href = "../weblg/items.php?insertCat=true";
					</script>
                    <?php 
					
				}
			  
			  
			  if(isset($_GET['CategoryID'])){
					
					
					$CatID = $_GET['CategoryID'];
					$DeleteCate = new categories();
					$DeleteCate->Delete_Category($CatID);
					?>
                    
					<script>
					     location.href = "../weblg/items.php?insertCat=true";
					</script>
                    <?php 
				
				}
				
				  if(isset($_GET['CategoryEditButton'])){
					
					
					$CatID = $_GET['CategorId'];
					$CatDescription= $_GET['CategoryEditInput'];
					
					$EditCate = new categories();
					$EditCate->Edit_Category($CatID, $CatDescription);
					?>
                    
					<script>
					     location.href = "../weblg/items.php?insertCat=true";
					</script>
                    <?php 
					
				}
			  
			    if(isset($_GET['SubCategoryButton'])){
					
					
					$CatID2 = $_GET['categoryItem2'];
					$SubCatDescription = $_GET['SubCategoryInput'];
					
					
					
					$InsertSubCate = new subcategories();
					$InsertSubCate->Insert_Subcategory($SubCatDescription,$CatID2);
					?>
                    
					<script>
					     location.href = "../weblg/items.php?insertCat=true";
					</script>
                    <?php 
				
					
				}
			
			  
			  if(isset($_GET['SubcategoryID'])){
					
					
					$SubCatID = $_GET['SubcategoryID'];
					$DeleteSubCate = new subcategories();
					$DeleteSubCate->Delete_Subcategory($SubCatID);
					?>
                    
					<script>
					     location.href = "../weblg/items.php?insertCat=true";
					</script>
                    <?php 
					
				}
			
			
			
			 if(isset($_GET['SubCategoryEditButton'])){
					
					
					
					$SubCatID = $_GET['SubEditID'];
					$SubCatDescription= $_GET['SubCategoryInput2'];
					$CatID2= $_GET['categoryItem2'];
					
					
					
					$EditSubCate = new subcategories();
					$EditSubCate->Edit_SubCategory($SubCatDescription, $CatID2,$SubCatID);
					?>
                    
					<script>
					     location.href = "../weblg/items.php?insertCat=true";
					</script>
                    <?php 
						
				}
			
			
		
			
		
		
		
		if(isset($_GET['ItemDeleteID'])){
			
			try{
			
			$ItemID = $_GET['ItemDeleteID'];
			$DeleteItem = new item();	
			$DeleteItem->Delete_Item($ItemID);
			header("Location: ../weblg/items.php");
			
			}catch (Exception $e) {
			
				
   				// echo 'Impossible to delete: ',  $e->getMessage(), "\n";

				}
			
			}
	
	
	
	
	
	
	
	if(isset($_POST['updateImageButton'])){
				
		            //$Lessons_items = explode(",",$Lessons_items);
	
					$nameImage3 = $_FILES['imgageUpdate']['name'];
					$size3		= $_FILES['imgageUpdate']['size'];
					$type3		= $_FILES['imgageUpdate']['type'];
					$tmp_name3	= $_FILES['imgageUpdate']['tmp_name'];
					
					$_SESSION['nameImage2'] = $nameImage3;
					
			if(!empty($nameImage3))
			   {
				 $location3 = 'images/Items/';			
				 move_uploaded_file($tmp_name3, $location3.$nameImage3);
				 
				 header("Location: ../weblg/items.php?ImageUpdateChange=true");
				 
			   }else{
				  // echo "Wrong sending file again";
				   }
			   
			
		} // End function updateImageButton
	

	if(isset($_POST['GroupButton'])){
		
		
		// This is to create the arrays with students
		if(isset($_POST['StudentBox'])){$StudentBox = implode(",",$_POST['StudentBox']);}
		if(!isset($_POST['StudentBox'])){$StudentBox = "";}
		
		// This is to create the array with instructor. 
		if(isset($_POST['InstructorBox'])){$InstructorBox = implode(",",$_POST['InstructorBox']);}
		if(!isset($_POST['InstructorBox'])){$InstructorBox = "";}
		
		
		$GroupName = $_POST['GroupName'];
		$Start_Date = $_POST['StartDate'];
		$End_Date = $_POST['EndDate'];
		$StudentBox;
		$InstructorBox;
		
		
		$Insert_Group = new Groups(); 
		$Insert_Group->Insert_Group($GroupName,$Start_Date,$End_Date,$StudentBox,$InstructorBox);
	

		}
	
	
	
	
	if(isset($_POST['EditGroupButton'])){
		
	 	$GroupID = $_POST['idGroup'];
	 	$GroupName = $_POST['GroupName']; 
	 	$StartDate = $_POST['StartDate'];  
	 	$EndDate = $_POST['EndDate'];
		
		
		// This is to create the arrays with students
		if(isset($_POST['StudentBox'])){$StudentBox = implode(",",$_POST['StudentBox']);}
		if(!isset($_POST['StudentBox'])){$StudentBox = "";}
		
		// This is to create the array with instructor. 
		if(isset($_POST['InstructorBox'])){$InstructorBox = implode(",",$_POST['InstructorBox']);}
		if(!isset($_POST['InstructorBox'])){$InstructorBox = "";}
		
		//print_r($StudentBox);
		//echo "<br>";
		//print_r($InstructorBox);
		
		$updateGroup = new Groups();
		$updateGroup->UpdateGroup($GroupName,$StartDate,$EndDate,$StudentBox,$InstructorBox,$GroupID);
		
		header("Location: ../weblg/Groups.php");
	
		
		
	}
	
	
  
  




		
		
		if(isset($_GET['decline'])){
			
			$GroupIDdecline = $_GET['GroupDeclineId'];
			$dateAcceptedDeclined = $_GET['DateRequested'];
			
			$deleteItemsCart = new Cart();
			$deleteItemsCart->deleteCartByGroupAndDate($GroupIDdecline , $dateAcceptedDeclined);
			header("Location: ../weblg/Stuff.php");
			
			}
		  

/// This part is to confirm the items out of the office

		if(isset($_POST['buttonTempleId'])){
			
			$Temple_Id = $_POST['templeIdCart'];
			$GroupIDAccepted = $_POST['GroupAcceptId'];
			$dateAccepted = $_POST['DateRequested'];
			
			
					
					if(strlen($Temple_Id)== 9){
					
					 
					$getIdStuff = new Users();
					$getIdStuff->get_User_Info_by_TempleID($Temple_Id);
					$Id_Stuff = $getIdStuff->User_Id ;
					$User_type = $getIdStuff->User_Type_Id ;
					
					//echo $Id_Stuff ;
					//echo $User_type ;
					
						if($User_type == 2 ||$User_type == 5)
							{ 
					
							$getInfoCartToTransition = $DbConnect->prepare("SELECT * FROM cart WHERE GroupId = ? AND ConfirmInstructor_Date = ?");
							$getInfoCartToTransition->bindParam(1, $GroupIDAccepted);
							$getInfoCartToTransition->bindParam(2, $dateAccepted);
							$getInfoCartToTransition->execute();
							
							
						  // $getInfoCartToTransition->rowCount();
							
							$insertTransition = new transition();
							
							$Time_Transaction = date('H:i:s');
							$Transaction_Status_Id = 2;
								
								
							while($ResultGetCart = $getInfoCartToTransition->fetch(PDO::FETCH_ASSOC)){
								
								$Cart_Id	 			= $ResultGetCart['Cart_Id'];
								$User_Id 				= $ResultGetCart['User_Id'];
								$GroupId 				= $ResultGetCart['GroupId'];
								$Item_Id 				= $ResultGetCart['Item_Id'];
								$Quantity 				= $ResultGetCart['Quantity'];
								$Days					= $ResultGetCart['Days'];
								$Cart_Status_Id			= $ResultGetCart['Cart_Status_Id'];
								$ConfirmInstructor_Date	= $ResultGetCart['ConfirmInstructor_Date'];	
								$DateAndTime			= $ResultGetCart['Date'];
								
								$Start_Date 			= 	date('Y-m-d',strtotime($ConfirmInstructor_Date));
								$TimeToInsert 			=   date('H:i:s',strtotime($Time_Transaction));
								
								
					
								$Start_End = date('Y-m-d',strtotime('+'.(int)$Days.'days', strtotime($Start_Date)));
								
								$insertTransition =  new transition();
							    $insertTransition->Insert_Transition($User_Id,$GroupId,$Start_Date,$Start_End,$TimeToInsert,$Item_Id,$Quantity,$Transaction_Status_Id,$DateAndTime,$Id_Stuff);
								
							}
										
									
				header("Location: ../weblg/Stuff.php");
						
							} else{
								
								?>
                                <script>
                                	alert("you are not allowed make this transaction");
									location.href = "../weblg/Stuff.php";
                                </script>
                                
                                <?php
								
								}// end if conditions $User_type == 2
							
							
							
						
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
							
							
							
								
							
							$getIdStuff = new Users();
							$getIdStuff->get_User_Info_by_TempleID($TempleID);
						    $Id_Stuff = $getIdStuff->User_Id ;
							$User_type_Staff = $getIdStuff->User_Type_Id ;
					
					
							if($User_type_Staff == 2 || $User_type_Staff == 5)
							{ 
					
							$getInfoCartToTransition = $DbConnect->prepare("SELECT * FROM cart WHERE GroupId = ? AND Date = ?");
							$getInfoCartToTransition->bindParam(1, $GroupIDAccepted);
							$getInfoCartToTransition->bindParam(2, $dateAccepted);
							$getInfoCartToTransition->execute();
							
							
							//$getInfoCartToTransition->rowCount();
							
							$insertTransition = new transition();
							
							$Time_Transaction = date('H:i:s');
							$Transaction_Status_Id = 2;
								
								
							while($ResultGetCart = $getInfoCartToTransition->fetch(PDO::FETCH_ASSOC)){
								
								
								$Cart_Id	 	= $ResultGetCart['Cart_Id'];
								$User_Id 		= $ResultGetCart['User_Id'];
								$GroupId 			= $ResultGetCart['GroupId'];
								$Item_Id 			= $ResultGetCart['Item_Id'];
								$Quantity 			= $ResultGetCart['Quantity'];
								$Days			= $ResultGetCart['Days'];
								$Cart_Status_Id		= $ResultGetCart['Cart_Status_Id'];
								$pickUP_Date	= $ResultGetCart['pickUP_Date'];	
								$DateAndTime		= $ResultGetCart['Date'];
								
								$Start_Date = 	date('Y-m-d',strtotime($pickUP_Date));
								
								$TimeToInsert = date('H:i:s',strtotime($Time_Transaction));
								
								
					
								$Start_End = date('Y-m-d',strtotime('+'.(int)$Days.'days', strtotime($Start_Date)));
								$insertTransition =  new transition();
							    $insertTransition->Insert_Transition($User_Id,$GroupId,$Start_Date,$Start_End,$TimeToInsert,$Item_Id,
							 									     $Quantity,$Transaction_Status_Id,$DateAndTime,$Id_Stuff);
								
							}
							
							
							
							
							header("Location: ../weblg/Stuff.php");
							
							}else{
								
								?>
                                <script>
                                	alert("you are not allowed make this transaction");
									location.href = "../weblg/Stuff.php";
                                </script>
                                
                                <?php
								
								}// end if conditions $User_type == 2
	
					}else{
							?>
                            <script>
                            	alert("Wrong Temple ID");
								location.href = "../weblg/Stuff.php";
                            </script>
                            
                            <?php	
						 
							}
			
			
			
			} // End function buttonTempleId
			
			
			
			
			
			if(isset($_GET['transition_Id_Tran'])){
				
				$transition_Id_Tran = $_GET['transition_Id_Tran'];
				$Item_Id_Tran 		= $_GET['Item_Id_Tran'];
				$Quantity_Tran 		= $_GET['Quantity_Tran'];
				
				$UpdateTransition = new transition();
				$UpdateTransition->update_Transiction_Status($transition_Id_Tran,$Quantity_Tran,$Item_Id_Tran);
				header("Location: ../weblg/Stuff.php?UpdateTransition=true");
				
			
			}
			
			
			if(isset($_POST['scanner'])){
				
					$Temple_Id = $_POST['scanner'];
					
					if(strlen($Temple_Id)== 9){
					
						
						$getUser_id = new Users();
						$getUser_id->get_User_Info_by_TempleID($Temple_Id);
						$User_IDD = $getUser_id->User_Id;
					    
						
						
						$Insert_User = new Visitor();
						$Insert_User->Insert_Visitor($User_IDD);	
							
						
						
					}else if (strlen($Temple_Id)== 31){
						
						
												
							$templeIDScanner = (string)$_POST['scanner'];
							$stringLong = 16;
							for($a=0,$b=0; $a<$stringLong; $a++, $b++)
							{
								$id[$a] = $templeIDScanner[$b];
							}
							$TempleID = "";
							for($c=7, $d=0; $c<16; $c++, $d++)
							{
								$TempleID[$d] = $id[$c];
							}
							
							$TempleID = implode("",$TempleID);
	
						 
							
					    $getUser_id = new Users();
						$getUser_id->get_User_Info_by_TempleID($TempleID);
						$User_IDD = $getUser_id->User_Id;
						
						
						$Insert_User = new Visitor();
						$Insert_User->Insert_Visitor($User_IDD);
							
					
					
						}else{
							?>
                            <script>
                            	alert("Wrong Temple ID");
								location.href = "../Studio.php";
                            </script>
                            
                            <?php	
						 
							}
				}
			
			
			
			
		
				
				if(isset($_GET['ItemToDeleteCart'])){
				
					$cartIdToUpdate = $_GET['ItemToDeleteCart'];
				
				
					$DeleteCartItem = $DbConnect->prepare("DELETE FROM cart WHERE Cart_Id = ?");
					$DeleteCartItem->bindParam(1,$cartIdToUpdate );
					$DeleteCartItem->execute();
					header("Location:".$_SESSION['URL']." ");
				
				}
				
				
				if(isset($_GET['closeDay'])){
					
					$closeDay = new Visitor();
					$closeDay->Close_All_Visitor();
					header("Location: ../Studio.php?closeDay");
					
					
				}
					
				
				
		
				
				if(isset($_POST['buttonReport'])){
					
					$Item_Id_Report = $_POST['Item_Id_Report'];
					$ItemReport = $_POST['ItemReport'];
					
					$InsetReportItem = new item();
					$InsetReportItem->Update_Item_Report($Item_Id_Report,$ItemReport);
					header("Location: ../weblg/Stuff.php?actionSearch");
					
				}
				
				
					
				if(isset($_POST['buttonReport2'])){
					
					$Item_Id_Report = $_POST['Item_Id_Report'];
					$ItemReport = $_POST['ItemReport'];
					
					$InsetReportItem = new item();
					$InsetReportItem->Update_Item_Report($Item_Id_Report,$ItemReport);
					header("Location: ../weblg/items.php?closeModalReport");
					
				}
				
			
			
			$db = "";
			$DbConnect = "";
			