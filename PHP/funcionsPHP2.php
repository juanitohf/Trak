<?php


require_once "../assets/common.php";




//Start connection With Db
				$db = new Connection();
				$DbConnect  = $db->ConnectDB();



		if(isset($_POST['VendorInsertButton'])){
		
				$Vendor_name	= $_POST['nameVendor'];
				$Vendor_email	= $_POST['emailVendor'];
				$Vendor_phone	= $_POST['phoneVendor'];
				$Vendor_web	= $_POST['webVendor'];
				
				$InsertVendor = new vendors();
				$InsertVendor->Insert_Vendor($Vendor_name,$Vendor_email,$Vendor_phone,$Vendor_web);
		
				header("Location: ../weblg/items.php?insertVendor=true");
				$EditSubCate  =null;
			}
		
			
			if(isset($_POST['VendorEditButton'])){
				
					echo $Vendor_Id		= $_POST['idVendor'];
					echo $Vendor_name	= $_POST['nameVendor'];
					echo $Vendor_email	= $_POST['emailVendor'];
					echo $Vendor_phone	= $_POST['phoneVendor'];
					echo $Vendor_web	= $_POST['webVendor'];
					
					$Edit_Vendor = new vendors();
					$Edit_Vendor-> Update_Vendor($Vendor_Id,$Vendor_name,$Vendor_email,$Vendor_phone,$Vendor_web);
					header("Location: ../weblg/items.php?insertVendor=true");
					$Edit_Vendor=null;
			}
			
			
			
			
			if(isset($_GET['VendorID'])){
		
					$Vendor_Id	= $_GET['VendorID'];
				
					
					$Delete_Vendor = new vendors();
					$Delete_Vendor-> Delete_Vendor($Vendor_Id);
					header("Location: ../weblg/items.php?deleteVendor=true");
					$Delete_Vendor = null;
			}
			
			
			
			
			
				if(isset($_POST['GrandInsertButton'])){
		
					$Grant_name	= $_POST['nameGrand'];
					$Grant_email	= $_POST['emailGrand'];
					$Grant_phone	= $_POST['phoneGrand'];
				
					
					$insert_Grand = new grants();
					$insert_Grand->Insert_Grant($Grant_name,$Grant_email,$Grant_phone);
					header("Location: ../weblg/items.php?insertGrand=true");
					$insert_Grand=null;
			}
			
			
			
	
				if(isset($_GET['GrandID'])){	
					$Grand_Id	= $_GET['GrandID'];
					
					$Delete_Grand = new grants();
					$Delete_Grand-> Delete_Grant($Grand_Id);
					header("Location: ../weblg/items.php?insertGrand=true");
					$Delete_Grand = null;
			}
	
	
	
			if(isset($_POST['GrantEditButton'])){
					$Grant_Id		= $_POST['idGrant'];
					$Grant_name	= $_POST['nameGrand'];
					$Grant_email	= $_POST['emailVendor'];
					$Grant_phone	= $_POST['phoneVendor'];
					
					
					$update_Grant = new grants();
					$update_Grant->Update_Grant($Grant_Id,$Grant_name,$Grant_email,$Grant_phone);
					header("Location: ../weblg/items.php?insertGrand=true");
					$update_Grant =null;
			}
	
	
	