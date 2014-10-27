
<?php


require_once "../assets/common.php";
	
	$db = new Connection();
	$DbConnect  = $db->ConnectDB();
	
	
	
	
	
	if(isset($_FILES["file"])){
			
			$Reference  = $_FILES['file']['name'];
			$size		= $_FILES['file']['size'];
			$type		= $_FILES['file']['type'];
			$tmp_name	= $_FILES['file']['tmp_name'];
			
			$nameImage = $Reference.".jpg";

			
			$uploaddir = '../weblg/images/Items/';
			
			
				echo $dateSubmission = date('Y-m-d');
			   // print_r($_FILES);
			  
			   move_uploaded_file($_FILES["file"]["tmp_name"], $uploaddir.$nameImage);
			   
			   
			   $updateImage = new item(); 
			   $updateImage->Update_Item_Image($Reference,$nameImage);
			   
} // End function submitImage

	
	if(isset($_POST['referenceInput'])){
		$Reference = $_POST['referenceInput'];
	
		
		$getInfoItem = new item();
		$getInfoItem->get_Item_Info_by_Reference($Reference);
		$Item_Id = $getInfoItem->Item_Id;
	
	
		$UpdateTransition = new transition();
		$UpdateTransition->getInfoItemTransitionByIdStatusActive($Item_Id);
		
		$transition_Id 	= $UpdateTransition->transition_Id;
		$Quantity 		= $UpdateTransition->Quantity;	
		$Item_Id 		= $UpdateTransition->Item_Id;
		
		
		$transition_Id;	
		$Quantity;
		$Item_Id;
					
			
		$UpdateTransition->update_Transiction_Status($transition_Id,$Quantity,$Item_Id);
			
	} // This is the end to return Items
?>
			