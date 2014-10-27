<?php

				
require_once "../assets/common.php";





// This function save the image from the canvas
if(isset($_POST['imageData'])){
	
	$data = substr($_POST['imageData'], strpos($_POST['imageData'], ",") + 1);

$Images = $_POST['Nimagen'];
$Images = $Images.'.png';

$decodedData = base64_decode($data);

$patch = '../weblg/images/Users/'.$Images;

$fp = fopen($patch , 'wb');
fwrite($fp, $decodedData);
fclose();

	
	
					 $Name		    = $_POST['nameUser'];
					 $MidleName		= $_POST['midleName'];
					 $Last			= $_POST['last'];
					 $Password		= $_POST['pass'];
					 $Temple_Id		= $_POST['templeId'];
					// $Images		= $_POST['templeId'];
					 $Email			= $_POST['email'];
					 $Cellphone		= $_POST['cellphone'];
					 $Address1		= $_POST['address1'];
					 $Address2		= $_POST['address2'];
					 $City			= $_POST['city'];
					 $State			= $_POST['state'];
					 $Zip			= $_POST['zip'];
					 $HomePhone		= $_POST['homephone'];
					 $WorkPhone		= $_POST['workphone'];
					 $Website		= $_POST['webSite'];
					 $User_Type_Id	= 1;
					 $Permitions		= "00000000";
				
					
					$inserUser = new Users();
					$inserUser->Insert_User($Name,$MidleName,$Last,$Password,$Temple_Id,$Images,$Email,$Cellphone,$Address1,$Address2,$City,$State,$Zip,$HomePhone,
				    $WorkPhone,$Website,$User_Type_Id,$Permitions);
	
	
	
	
	
	
	}
	
	
	
	
	// This function save the image from the canvas
if(isset($_POST['imageData2'])){
	
	$data = substr($_POST['imageData2'], strpos($_POST['imageData2'], ",") + 1);
	$Images = $_POST['Nimagen'];
	$Images = $Images.'.png';

	$decodedData = base64_decode($data);
	$patch = '../weblg/images/Users/'.$Images;
	$fp = fopen($patch , 'wb');
	fwrite($fp, $decodedData);
	fclose();

	
					 $User_Id		= $_POST['Id_User'];
					 $Name		    = $_POST['nameUser'];
					 $MidleName		= $_POST['midleName'];
					 $Last			= $_POST['last'];
					 $Pass			= $_POST['pass'];
					 $Temple_Id		= $_POST['templeId'];
					// $Images		= $_POST['templeId'];
					 $Email			= $_POST['email'];
					 $Cellphone		= $_POST['cellphone'];
					 $Address1		= $_POST['address1'];
					 $Address2		= $_POST['address2'];
					 $City			= $_POST['city'];
					 $State			= $_POST['state'];
					 $Zip			= $_POST['zip'];
					 $HomePhone		= $_POST['homephone'];
					 $WorkPhone		= $_POST['workphone'];
					 $Website		= $_POST['webSite'];
					 $User_Type_Id	=  $_POST['UsertTypeID'];
					 $Permitions	= $_POST['Permissions'];
				
		
		
				$UpdateUser = new Users();
				$UpdateUser-> Update_User2($User_Id,$Name,$MidleName,$Last,$Temple_Id,$Images,$Email,$Cellphone,$Address1,$Address2,$City,$State,$Zip,$HomePhone,
										  $WorkPhone,$Website,$User_Type_Id,$Permitions);
				}


	
	

 

?>