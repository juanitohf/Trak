<?php
session_start();


// Include the main TCPDF library (search for installation path).
require_once('../tcpdf/config/tcpdf_config.php');
require_once('../tcpdf/tcpdf.php');
require_once "../assets/common.php";


			//Start connection With Db
				$db = new Connection();
				$DbConnect  = $db->ConnectDB();	

 		if(isset($_GET['ItemID'])){
				   
					$ReferenceSearch = $_GET['ItemID'];
			
					$query_items = $DbConnect->prepare("SELECT * FROM items WHERE Reference = ?");
					$query_items ->bindParam(1,$ReferenceSearch);
					$query_items->execute();
			
		} else{		
				
				
				
			$SearchType = $_SESSION['searchType'];
 
 			
			
			if($SearchType == "Description"){
				
					$descriptionSearch = $_SESSION['VariableQrCode'];
					$query_items = $DbConnect->prepare("SELECT * FROM items WHERE (Item_description LIKE :search) Order by Item_description");
					$query_items->bindParam(':search',$descriptionSearch);
					$query_items->execute();
				
			}else if($SearchType == "Category"){
									
					$CateSearch = $_SESSION['VariableQrCode'];				
					$query_items = $DbConnect->prepare("SELECT * FROM items WHERE Category_Id = ?");
					$query_items->bindParam(1,$CateSearch);
				    $query_items->execute();
			
			}else if($SearchType == "Reference"){
				
					$ReferenceSearch = $_SESSION['VariableQrCode'];
			
					$query_items = $DbConnect->prepare("SELECT * FROM items WHERE Reference = ?");
					$query_items ->bindParam(1,$ReferenceSearch);
					$query_items->execute();
			
			}else if($SearchType == "Lesson"){
				
					$Lesson_Description = $_SESSION['VariableQrCode'];
					$query_items = $DbConnect->prepare("SELECT * FROM items WHERE (Lessons_item LIKE :search)");
					$query_items ->bindParam(':search',$Lesson_Description);
					$query_items->execute();
								
			}else if($SearchType == "NoSpecialQuery"){
				
					$query_items = $DbConnect->prepare("SELECT * FROM items");
					$query_items->execute();
								
			}else{
				
				echo "Erro to generate the file. ";
				
				}
		  
			$DbConnect = null;		 
		} // End if condition id

 

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Qrcodes');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
@$pdf->SetHeaderMargin(false);
$pdf->SetFooterMargin(false);

// set auto page breaks
$pdf->SetAutoPageBreak(FALSE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// NOTE: 2D barcode algorithms must be implemented on 2dbarcode.php class file.



// add a page
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 8);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -


// set style for barcode
$style = array(
	'border' => 0,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);




		$widthQr = 10;
		$heightQr = 14;
		$widthTxt1 = 28;
		$heightTxt1 = 18;
		$widthTxt2 = 28;
		$heightTxt2 = 22;
		$widthTxt3 = 28;
		$heightTxt3 = 26;
		$line = 0;
		
		
 
		
		// echo $Total;
		 
		 while ($result = $query_items->fetch(PDO::FETCH_ASSOC)) {
            $count = 0;                
            $Id_Product 	= $result['Item_Id'];
			$Description	= $result['Item_description'];
			$Reference		= $result['Reference'];
			$Image			= $result['Imagen'];
			$Id_Cat			= $result['Category_Id'];
            $Id_subCat		= $result['Subcategory_id'];
			$Building 		= $result['Building'];
			$Cabine 		= $result['Cabine'];
			$Room 			= $result['Room'];
			$Total 			= $result['Initial_Quantity'];
			$Department 	= $result['Department'];
			$Department 	= $result['Location_Description'];
			$Grp		    = $result['Grp'];					
			
			if($Grp == 1){
				$Total = 1;
			}
						
			
			// QRCODE,Q : QR-CODE Best error correction
			for($count = 0; $count<$Total;$count++)
			{
				
			$pdf->write2DBarcode($Reference, 'QRCODE,Q', $widthQr, $heightQr, 20, 20, $style, 'N');
			$pdf->Text($widthTxt1, $heightTxt1, $Reference);
			$pdf->Text($widthTxt2, $heightTxt2, $Room. " Cabinet:".$Cabine);
			$pdf->MultiCell(30, 5, $Description, 0, 'L', 0, 1, $widthTxt3 ,$heightTxt3, true);
			//$pdf->MultiCell($widthTxt3, $heightTxt3, $Description."\n");
	 
	 
	 		$widthQr =  $widthQr + 72;
			$widthTxt1 = $widthTxt1 + 72;
			$widthTxt2 = $widthTxt2 + 72;
			$widthTxt3 = $widthTxt3 + 72;
			
			if($widthQr >= 226)
			{
				
			$widthQr = 10;
			$widthTxt1 = 28;
			$widthTxt2 = 28;
			$widthTxt3 = 28;
			
			$heightQr = $heightQr + 28;
			$heightTxt1 = $heightTxt1 + 28;
			$heightTxt2 = $heightTxt2 + 28;
			$heightTxt3 = $heightTxt3 + 28;
			$line++;
			
			
			}
			
			if($line == 10)
			{
				// add a page
				$pdf->AddPage();
				
				
					$widthQr = 10;
					$heightQr = 14;
					$widthTxt1 = 28;
					$heightTxt1 = 18;
					$widthTxt2 = 28;
					$heightTxt2 = 22;
					$widthTxt3 = 28;
					$heightTxt3 = 26;
					$line = 0;
		
			}
			
		} // End for loop
		
		
	 }
	


//Close and output PDF document
ob_end_clean();
$pdf->Output('QRcodes.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+



