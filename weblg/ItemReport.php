<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', FALSE);
ini_set('display_startup_errors', FALSE);
date_default_timezone_set('america/new_york');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/../PHP/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();




		

			//Start connection With Db
				$conexion = new mysqli('localhost','track','o4yRojfcb6imqGRpsfbe','track',3306);
				if (mysqli_connect_errno()) {
				   printf("La conexión con el servidor de base de datos falló: %s\n", mysqli_connect_error());
				   exit();
				}
 				
				
				$SearchType = $_SESSION['searchType'];
				
				if($SearchType == "reportAllItem" || $SearchType == "" || $SearchType == null){
					
					$sql ="	SELECT  items.Item_description,items.Reference,items.Initial_Quantity,items.Stock_Quantity,items.Lessons_item,
									items.Date,items.Expiration_date,items.Price,grants.Grant_name,vendors.Vendor_name,categories.Category_Description,
									subcategories.Subcategory_description,itemType.ItemType_description,items.Building,items.Cabine,items.Room,
									items.Department,items.Location_Description 
							FROM    items,itemType, grants,vendors,categories,subcategories
							WHERE   grants.Grant_Id =items.Grant_Id
							   AND  vendors.Vendor_Id = items.Vendor_Id 
							   AND  categories.Category_Id = items.Category_Id 
							   AND  subcategories.Subcategory_id  =  items.Subcategory_id 
							   AND  subcategories.Subcategory_id = items.Subcategory_id
							        Group by Reference";
								   
								   
							
						
								   
					$resultado = $conexion->query($sql);
			
					
					
				}else if($SearchType == "PendingToReturn"){
					
					
					
					$Transaction_Status_Id = 2;
					$sql="	SELECT  items.Item_description,items.Reference,items.Initial_Quantity,items.Stock_Quantity,items.Lessons_item,
									items.Date,items.Expiration_date,items.Price,grants.Grant_name,vendors.Vendor_name,categories.Category_Description,
									subcategories.Subcategory_description,itemType.ItemType_description,items.Building,items.Cabine,items.Room,
									items.Department,items.Location_Description 
							FROM    items,itemType, grants,vendors,categories,subcategories,transition
							WHERE   grants.Grant_Id =items.Grant_Id
							   AND  vendors.Vendor_Id = items.Vendor_Id 
							   AND  categories.Category_Id = items.Category_Id 
							   AND  subcategories.Subcategory_id  =  items.Subcategory_id 
							   AND  subcategories.Subcategory_id = items.Subcategory_id
							    AND transition.	Item_Id = items.	Item_Id
							   AND	transition.Transaction_Status_Id = 2 Group by items.Item_Id";
									
					$resultado = $conexion->query($sql);
					
					
				}else if($SearchType == "ReportedItems"){
					
					$sql ="	SELECT  items.Item_description,items.Reference,items.Initial_Quantity,items.Stock_Quantity,items.Lessons_item,
									items.Date,items.Expiration_date,items.Price,grants.Grant_name,vendors.Vendor_name,categories.Category_Description,
									subcategories.Subcategory_description,itemType.ItemType_description,items.Building,items.Cabine,items.Room,
									items.Department,items.Location_Description,Item_Report.Report 
							FROM    items,itemType, grants,vendors,categories,subcategories,Item_Report
							WHERE   items.Grant_Id = grants.Grant_Id
							   AND  items.Vendor_Id = vendors.Vendor_Id
							   AND  items.Category_Id = categories.Category_Id
							   AND  items.Subcategory_id = subcategories.Subcategory_id
							   AND  items.Subcategory_id = subcategories.Subcategory_id
							   AND  items.ItemType_Id = itemType.ItemType_Id
							   AND  items.Item_Id = Item_Report.Item_Id";
	   
									$resultado = $conexion->query($sql);
								
					
				}else if($SearchType == "ReportConsumable"){
					
					
					
					$sql ="	SELECT  items.Item_description,items.Reference,items.Initial_Quantity,items.Stock_Quantity,items.Lessons_item,
									items.Date,items.Expiration_date,items.Price,grants.Grant_name,vendors.Vendor_name,categories.Category_Description,
									subcategories.Subcategory_description,itemType.ItemType_description,items.Building,items.Cabine,items.Room,
									items.Department,items.Location_Description
							FROM    items,itemType, grants,vendors,categories,subcategories
							WHERE   items.Grant_Id = grants.Grant_Id
							   AND  items.Vendor_Id = vendors.Vendor_Id
							   AND  items.Category_Id = categories.Category_Id
							   AND  items.Subcategory_id = subcategories.Subcategory_id
							   AND  items.Subcategory_id = subcategories.Subcategory_id
							   AND  items.ItemType_Id = itemType.ItemType_Id
							   AND  items.ItemType_Id = 1";
											
					$resultado = $conexion->query($sql);
			
								
				}else{
					?>
                    	<script>
                        	alert("Error to develop the Excel file");
                        </script>
                    <?php
					
					
					}
							
			

			if($resultado->num_rows > 0){
				
				
				
			// Set document properties
			$objPHPExcel->getProperties()->setCreator("Juan Huertas-Fernandez")
							 ->setLastModifiedBy("Juan Huertas-Fernandez")
							 ->setTitle("Item Report")
							 ->setSubject("Item")
							 ->setDescription("Report about specific Items")
							 ->setKeywords("Report Trak Item")
							 ->setCategory("Test result file");
		
			$reportTitle = "Report Items";
			$ColumnsNames = array('DESCRIPTION', 'REFERENCE', 'INITIAL QUANTITY', 'STOCK', 'LESSON','DATE','EXPIRATE DATE', 'PRICE', 'GRAND','VENDOR','CATEGORY','SUBCATEGORY', 'ITEM TYPE','BUILDING','CABINET','ROOM','DEPARTMENT','LOCATION DESCRIPTION','REPORT');

			// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
			$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('A1:S1');


			// Add title report
			$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1',$reportTitle) // Report title
			->setCellValue('A3',  $ColumnsNames[0])  // Columns Report
			->setCellValue('B3',  $ColumnsNames[1])
			->setCellValue('C3',  $ColumnsNames[2])
			->setCellValue('D3',  $ColumnsNames[3])
			->setCellValue('E3',  $ColumnsNames[4])  // Columns Report
			->setCellValue('F3',  $ColumnsNames[5])
			->setCellValue('G3',  $ColumnsNames[6])
			->setCellValue('H3',  $ColumnsNames[7])
			->setCellValue('I3',  $ColumnsNames[8])
			->setCellValue('J3',  $ColumnsNames[9])
			->setCellValue('K3',  $ColumnsNames[10])
			->setCellValue('L3',  $ColumnsNames[11])
			->setCellValue('M3',  $ColumnsNames[12])
			->setCellValue('N3',  $ColumnsNames[13])
			->setCellValue('O3',  $ColumnsNames[14])
			->setCellValue('P3',  $ColumnsNames[15])
			->setCellValue('Q3',  $ColumnsNames[16])
			->setCellValue('R3',  $ColumnsNames[17])
			->setCellValue('S3',  $ColumnsNames[18]);
						
			
			
						
			$i = 4; //Numero de fila donde se va a comenzar a rellenar
				 while ($fila = $resultado->fetch_array()) {
					 $objPHPExcel->setActiveSheetIndex(0)
						 ->setCellValue('A'.$i, $fila['Item_description'])
						 ->setCellValue('B'.$i, $fila['Reference'])
						 ->setCellValue('C'.$i, $fila['Initial_Quantity'])
						 ->setCellValue('D'.$i, $fila['Stock_Quantity'])
						 ->setCellValue('E'.$i, $fila['Lessons_item'])
						 ->setCellValue('F'.$i, $fila['Date'])
						 ->setCellValue('G'.$i, $fila['Expiration_date'])
						 ->setCellValue('H'.$i, $fila['Price'])
						 ->setCellValue('I'.$i, $fila['Grant_name'])
						 ->setCellValue('J'.$i, $fila['Vendor_name'])
						 ->setCellValue('K'.$i, $fila['Category_Description'])
						 ->setCellValue('L'.$i, $fila['Subcategory_description'])
						 ->setCellValue('M'.$i, $fila['ItemType_description'])
						 ->setCellValue('N'.$i, $fila['Building'])
						 ->setCellValue('O'.$i, $fila['Cabine'])
						 ->setCellValue('P'.$i, $fila['Room'])
						 ->setCellValue('Q'.$i, $fila['Department'])
						 ->setCellValue('R'.$i, $fila['Location_Description'])
						 ->setCellValue('S'.$i, $fila['Report']);	
									 
					 $i++;
 					}
						
						
						
			  // Rename worksheet
                        $objPHPExcel->getActiveSheet()->setTitle('Items');

                        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                        $objPHPExcel->setActiveSheetIndex(0);
                        

                        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                        header('Content-Type: application/vnd.ms-excel');
                        header('Content-Disposition: attachment;filename="ItemList.xls"');

                        // If you're serving to IE 9, then the following may be needed
                        header('Cache-Control: max-age=1');

                        // If you're serving to IE over SSL, then the following may be needed
                        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
                        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
                        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
                        header ('Pragma: public'); // HTTP/1.0

                        //$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
                        $objWriter->save('php://output');
                        exit;
			
			}else{
				    ?>
						<script>
                        alert("No results found with selected Items");
						window.close()
                        </script>
					<?php
				exit;
				}
?>
			 
			 
			 
			 
			 
	