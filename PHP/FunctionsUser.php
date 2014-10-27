<?php
require_once "../assets/common.php";


/*


User_Id	
Name
MidleName
Last
Password
Temple_Id
Image
Email
Cellphone
Address1
Address2
City
State
Zip	
HomePhone
WorkPhone
Website	
User_Type_Id
Permitions





*/




if(isset($_POST['DisplayUsers'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users");
		$query_diplayUser->execute();
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
if(isset($_POST['searchNameButton'])){
	
	//Create a connection with Db
	
		
		
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
	
		$results = array();  //This will hold the info to display later with Json
		
		
		$NameUser = $_POST['NameUser'].'%';
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users WHERE (Name LIKE :search) Order by Name");
		$query_diplayUser ->bindParam(':search',$NameUser);
		$query_diplayUser->execute();
		
	
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	if(isset($_POST['searchLastButton'])){
	
	//Create a connection with Db
	
		
		
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
	
		$results = array();  //This will hold the info to display later with Json
		
		
		$LastUser = $_POST['LastUser'].'%';
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users WHERE (Last LIKE :search) Order by Name");
		$query_diplayUser ->bindParam(':search',$LastUser);
		$query_diplayUser->execute();
		
	
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	
	if(isset($_POST['searchEmailButton'])){
	
	//Create a connection with Db
	
		
		
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
	
		$results = array();  //This will hold the info to display later with Json
		
		
		$EmailUser = $_POST['EmailUser'];
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users WHERE Email = ? Order by Name");
		$query_diplayUser ->bindParam(1,$EmailUser);
		$query_diplayUser->execute();
		
	
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	
	
	if(isset($_POST['searchTempleIdButton'])){
	
	//Create a connection with Db
	
		
		
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
	
		$results = array();  //This will hold the info to display later with Json
		
		
		$TempleId = $_POST['TempleIdUser'];
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users WHERE Temple_Id = ? Order by Name");
		$query_diplayUser ->bindParam(1,$TempleId);
		$query_diplayUser->execute();
		
	
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	if(isset($_POST['DisplayUsersType'])){
		
		
		$User_type = $_POST['User_type'];
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUserType = $DbConn->prepare("SELECT * FROM user_type WHERE User_Type_Id <= ?");
		$query_diplayUserType->bindParam(1,$User_type); 
		$query_diplayUserType->execute();
		
		$i = 0;
		if($query_diplayUserType->rowCount() != 0){
					
				while($resultUserType = $query_diplayUserType->fetch(PDO::FETCH_ASSOC)){
					
								$User_Type_Id	   = $resultUserType['User_Type_Id'];
								$User_Description  = $resultUserType['User_Description'];
							
								$results['User_Type_Id'][$i] 	 = $User_Type_Id;
								$results['User_Description'][$i] = $User_Description;
							
								
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
	
	
	
	
	
	
	
	
	
	
if(isset($_POST['updateUser'])){
			
			
				
	$results = array();
	// This section is to take the rest of the input values. 
	$User_Id	= $_POST['User_Id'];
	$name		= $_POST['Name'];
	$midleName	= $_POST['MidleName'];
	$last		= $_POST['Last'];
	$templeId	= $_POST['Temple_Id'];
	$strImagen	= $_POST['ImageUser'];
	$email		= $_POST['Email'];
    $Cellphone	= $_POST['Cellphone'];
	$address1	= $_POST['Address1'];
	$address2	= $_POST['Address2'];
	$city		= $_POST['City'];
	$state		= $_POST['State'];
	$zip		= $_POST['Zip'];
	$HomePhone	= $_POST['HomePhone'];
	$WorkPhone	= $_POST['WorkPhone'];
	$Website	= $_POST['Website'];
	$UserType	= $_POST['userTypeEdit'];
	$Permitions = "111111111";
	
	
		$Update_user = new Users();
		$ResultUpdate = $Update_user->Update_User($User_Id,$name,$midleName,$last,$templeId,$strImagen, $email,$Cellphone,$address1,$address2,$city,$state,$zip,$HomePhone,$WorkPhone,$Website,$UserType,$Permitions);
	
	
	
	if($ResultUpdate == 1){
		
		$results['Status'] = 'success';
		print json_encode($results);
				
	}else{
				
		$results['Status'] = 'error';
		print json_encode($results);
				
	}	
	


		}
		

	
	
	
		
	
if(isset($_POST['deleteUser'])){
			
			
				
	$results = array();
	// This section is to take the rest of the input values. 
	$Id_User	= $_POST['Id_User'];
	
	
	
		$Delete_user = new Users();
		$ResultDelete = $Delete_user->Delete_User($Id_User);
	
	
	
	if($ResultDelete == 1){
		
		$results['Status'] = 'success';
		print json_encode($results);
				
	}else{
				
		$results['Status'] = 'error';
		print json_encode($results);
				
	}	
	


		}
		






if(isset($_POST['nameSearchOrder'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users ORDER BY Name");
		$query_diplayUser->execute();
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	
	
	
	
if(isset($_POST['lastSearchOrder'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users ORDER BY Last");
		$query_diplayUser->execute();
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	
	
	
	
	
	
if(isset($_POST['emailSearchOrder'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users ORDER BY Email");
		$query_diplayUser->execute();
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	
	
	
	
if(isset($_FILES['fileImageUser'])){
				
				$results = array();
		            //$Lessons_items = explode(",",$Lessons_items);
	
					$nameImage  = $_FILES['fileImageUser']['name'];
					$size		= $_FILES['fileImageUser']['size'];
					$type		= $_FILES['fileImageUser']['type'];
					$tmp_name	= $_FILES['fileImageUser']['tmp_name'];
					
					
					
			if(!empty($nameImage))
			   {
				 $location = '../weblg/images/Users/';			
				 move_uploaded_file($tmp_name, $location.$nameImage);
				 
			
				$results['Status'] = 'success';
				$results['NameImg'] = $nameImage;
				print json_encode($results);
				 
			   }else{
				 
				  $results['Status'] = 'error';
				   print json_encode($results);
			 }
			   
			
		} // End function updateImageButton
	
	
	
	
	
	
	
	
	
if(isset($_FILES['fileImageUserInsertUser'])){
				
				$results = array();
		            //$Lessons_items = explode(",",$Lessons_items);
	
					$nameImage  = $_FILES['fileImageUserInsertUser']['name'];
					$size		= $_FILES['fileImageUserInsertUser']['size'];
					$type		= $_FILES['fileImageUserInsertUser']['type'];
					$tmp_name	= $_FILES['fileImageUserInsertUser']['tmp_name'];
					
					
					
			if(!empty($nameImage))
			   {
				 $location = '../weblg/images/Users/';			
				 move_uploaded_file($tmp_name, $location.$nameImage);
				 
			
				$results['Status'] = 'success';
				$results['NameImg'] = $nameImage;
				print json_encode($results);
				 
			   }else{
				 
				  $results['Status'] = 'error';
				   print json_encode($results);
			 }
			   
			
		} // End function updateImageButton
	
	
	
	
	
	
	
	
	
if(isset($_POST['DisplayUsersTypeToInsert'])){
		
		
	$User_type = $_POST['User_type'];
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUserType = $DbConn->prepare("SELECT * FROM user_type WHERE User_Type_Id <= ?");
		$query_diplayUserType->bindParam(1,$User_type); 
		$query_diplayUserType->execute();
		
		$i = 0;
		if($query_diplayUserType->rowCount() != 0){
					
				while($resultUserType = $query_diplayUserType->fetch(PDO::FETCH_ASSOC)){
					
								$User_Type_Id	   = $resultUserType['User_Type_Id'];
								$User_Description  = $resultUserType['User_Description'];
							
								$results['User_Type_Id'][$i] 	 = $User_Type_Id;
								$results['User_Description'][$i] = $User_Description;
							
								
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
	
	
	
	

if(isset($_POST['insertNewUser'])){
		
		
	$Image 		= $_POST['strImagen'];
	$Name 		= $_POST['NameUserInsert'];
	$MidleName 	= $_POST['midleNameInsert'];
	$Last 		= $_POST['lastUserInsert'];
	$Email 		= $_POST['emailUserInsert'];
	$Temple_Id 	= $_POST['templeIdUserInsert'];
	$Website 	= $_POST['webUserInsert'];
	$Password 	= $_POST['passUserInsert'];
	$Cellphone 	= $_POST['cellphoneUserInsert'];
	$HomePhone 	= $_POST['homePhoneUserInsert'];
	$WorkPhone 	= $_POST['workPhoneUserInsert'];
	$Address1 	= $_POST['address1UserInsert'];
	$Address2 	=	$_POST['address2UserInsert'];
	$City 		= $_POST['cityUserInsert'];
	$State 		= $_POST['stateUserInsert'];
	$Zip 		= $_POST['zipUserInsert'];
	$User_Type_Id = $_POST['typeUserSelect'];
	$Permitions="111111111";
	//Create a connection with Db
	
	
		$InsertNewUser = new Users();
		$ResultInsertUser = $InsertNewUser->Insert_User($Name,$MidleName,$Last,$Password,$Temple_Id,$Image,$Email,$Cellphone,$Address1,$Address2,$City,$State,$Zip,$HomePhone,$WorkPhone,$Website,$User_Type_Id,$Permitions);
		
		/* NOTE 
		
		if (ResultInsertUser ) return 2 {user repeated}
		if (ResultInsertUser ) return 1 {user inserted successufully}
		if (ResultInsertUser ) return 0 {error inserting user}
		
		*/
		
			if($ResultInsertUser == 1){
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else if($ResultInsertUser == 2){
				$results['Status'] = 'repeated';
				print json_encode($results);
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	
	
	
	
	
	
	
	
	
	
	
	


if(isset($_POST['DisplayUsersReportToName'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users ORDER by Name");
		$query_diplayUser->execute();
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	
	
	if(isset($_POST['SearchUsersReportToTempleId'])){
	
	
		$TempleId = $_POST['TempleId'];
		
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users WHERE Temple_Id = ? ORDER by Name");
		$query_diplayUser->bindParam(1,$TempleId);
		$query_diplayUser->execute();
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	
	
	
	if(isset($_POST['SearchUsersReportToName'])){
	
	
		$NameSearch = $_POST['NameSearch'].'%';
		
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users WHERE (Name LIKE :search) ORDER by Name");
		$query_diplayUser->bindParam(':search',$NameSearch);
		$query_diplayUser->execute();
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	
	
	if(isset($_POST['DisplayUsersReportToLast'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users ORDER by Last");
		$query_diplayUser->execute();
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	
	
	
	
	if(isset($_POST['showUserHistory'])){
	
		$User_Id = $_POST['User_Id'];
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
			// This part is to have all information about transaction of specific users
		$queryReportUser = $DbConn->prepare("SELECT items.Item_description,items.Imagen,transition.transition_Id,
											 transition.Start_Date,transition.Start_End,transition.Time_Transaction,transition.Quantity, 
											 transition.Transaction_Status_Id,transition.Stuff_Confirmation_Id
										     FROM items,transition,users 
	  										 WHERE users.User_Id = transition.User_Id AND transition.Item_Id = items.Item_Id AND users.User_Id = ?");
		$queryReportUser->bindParam(1,$User_Id);
		$queryReportUser->execute();
											
					$numRows = $queryReportUser->rowCount();	
								$getInfoUserReport = new Users();	
								$i=0;		
								while($resultUserReport = $queryReportUser->fetch(PDO::FETCH_ASSOC)){
										
								
								
								
								
											
										$transition_Id			= $resultUserReport['transition_Id'];	
										$Start_Date				= date("m-d-Y", strtotime($resultUserReport['Start_Date']));
										$Start_End				= date("m-d-Y", strtotime($resultUserReport['Start_End']));
										$Time_Transaction		= $resultUserReport['Time_Transaction'];
										
										$Quantity				= $resultUserReport['Quantity'];
										$Transaction_Status_Id	= $resultUserReport['Transaction_Status_Id'];
										$Stuff_Confirmation_Id	= $resultUserReport['Stuff_Confirmation_Id'];	
										
										$Item_description		= $resultUserReport['Item_description'];
										$Imagen					= $resultUserReport['Imagen'];
										
														
								
										//get infor stuff who allow out items
														
										$getInfoUserReport->get_User_Info_by_ID($Stuff_Confirmation_Id);
										
										$results['transition_Id'][$i] = $transition_Id	;
										$results['Start_Date'][$i]  = $Start_Date;
										$results['Start_End'][$i]  = $Start_End;
										$results['Time_Transaction'][$i]  = $Time_Transaction;
										$results['ImagenItem'][$i]  = $Imagen;	
										$results['Item_description'][$i]  = $Item_description;		
										$results['Quantity'][$i]  = $Quantity;
										$results['Transaction_Status_Id'][$i]  = $Transaction_Status_Id;
										$results['Stuff_Confirmation_Id'][$i]  = $Stuff_Confirmation_Id;	
										$results['NameStaffReport'][$i]  = $getInfoUserReport->Name;
										$results['LastStaffReport'][$i]  = $getInfoUserReport->Last;
										
										$i++;
										
						}
				
				
				$results['NumRows'] = $numRows;
				$results['Status'] = 'success';
				print json_encode($results);
				$DbConn = null;	
	
	
	}
	
	
	
	
	
	
	

if(isset($_POST['DisplayUsersReportToName'])){
	
	
	$nameToSearch= $_POST['nameToSearch'].'%';
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users (Name LIKE :search) ORDER by Name");
		$query_diplayUser->bindParam(':search',$nameToSearch);
		$query_diplayUser->execute();
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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
	
	
	
	

if(isset($_POST['SearchByTempleId'])){
	
	
	$TempleId= $_POST['TempleId'];
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayUser = $DbConn->prepare("SELECT * FROM users WHERE Temple_Id = ? ORDER by Name");
		$query_diplayUser->bindParam(1,$TempleId);
		$query_diplayUser->execute();
		
		$i = 0;
		if($query_diplayUser->rowCount() != 0){
					
				while($resultUsers = $query_diplayUser->fetch(PDO::FETCH_ASSOC)){
					
								$User_Id		= $resultUsers['User_Id'];
								$Name			= $resultUsers['Name'];
								$MidleName		= $resultUsers['MidleName'];
								$Last	 		= $resultUsers['Last'];
								$Password		= $resultUsers['Password'];
								$Temple_Id  	= $resultUsers['Temple_Id'];
								$ImageUser		= $resultUsers['Image'];
								$Email	 		= $resultUsers['Email'];
								$Cellphone		= $resultUsers['Cellphone'];
								$Address1		= $resultUsers['Address1'];
								$Address2		= $resultUsers['Address2'];
								$City			= $resultUsers['City'];
								$State	 		= $resultUsers['State'];
								$Zip			= $resultUsers['Zip'];
								$HomePhone  	= $resultUsers['HomePhone'];
								$WorkPhone		= $resultUsers['WorkPhone'];
								$Website	 	= $resultUsers['Website'];
								$User_Type_Id	= $resultUsers['User_Type_Id'];
								$Permitions		= $resultUsers['Permitions'];
								
								
								
								$results['User_Id'][$i] 	= $User_Id;
								$results['Name'][$i] 		= $Name;
								$results['MidleName'][$i]	= $MidleName;
								$results['Last'][$i] 		= $Last;
								$results['Password'][$i] 	= $Password;
								$results['Temple_Id'][$i] 	= $Temple_Id;
								$results['ImageUser'][$i] 	= $ImageUser;
								$results['Email'][$i] 		= $Email;
								$results['Cellphone'][$i] 	= $Cellphone;
								$results['Address1'][$i]	= $Address1;
								$results['Address2'][$i] 	= $Address2;
								$results['City'][$i] 		= $City;
								$results['State'][$i] 		= $State;
								$results['Zip'][$i] 		= $Zip;
								$results['HomePhone'][$i] 	= $HomePhone;
								$results['WorkPhone'][$i] 	= $WorkPhone;
								$results['Website'][$i] 	= $Website;
								$results['User_Type_Id'][$i] = $User_Type_Id;
								$results['Permitions'][$i] 	= $Permitions;
							
								
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