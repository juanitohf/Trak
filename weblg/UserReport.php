<?php

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
 				
				if(isset($_POST['buttonReportUser'])){
					
					$User_Id = $_POST['UserReportID'];
					}
				
				$sql = "SELECT users.Name, users.Last, users.Temple_Id, users.Email,Groups.Group_Description,transition.Start_Date,
							   transition.Start_End, transition.Time_Transaction, transition.Quantity,items.Item_description, items.Reference,
							   transaction_status.Transaction_Description
						FROM   transition,users,Groups,items,transaction_status
						WHERE  transition.User_Id = users.User_Id AND transition.Item_Id = items.Item_Id 
							   AND transition.Transaction_Status_Id = transaction_status.Transaction_Status_Id
							   AND transition.GroupId = Groups.GroupId AND users.User_Id = $User_Id ";
							   
				$resultado = $conexion->query($sql);
			 


			if($resultado->num_rows > 0){
				
				
				
			// Set document properties
			$objPHPExcel->getProperties()->setCreator("Juan Huertas-Fernandez")
							 ->setLastModifiedBy("Juan Huertas-Fernandez")
							 ->setTitle("User Report")
							 ->setSubject("Users")
							 ->setDescription("Report about specific User")
							 ->setKeywords("Report Trak")
							 ->setCategory("Test result file");
		
			$reportTitle = "Report User";
			$ColumnsNames = array('NAME', 'LAST', 'TEMPLE ID', 'EMAIL', 'GROUP','START DATE','RETURN DATE', 'TIME', 'QUANTITY','ITEM','REFERENCE','STATUS');

			// Se combinan las celdas A1 hasta D1, para colocar ahí el titulo del reporte
			$objPHPExcel->setActiveSheetIndex(0)
			->mergeCells('A1:L1');


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
			->setCellValue('L3',  $ColumnsNames[11]);
						
						
						
			$i = 4; //Numero de fila donde se va a comenzar a rellenar
				 while ($fila = $resultado->fetch_array()) {
					 $objPHPExcel->setActiveSheetIndex(0)
						 ->setCellValue('A'.$i, $fila['Name'])
						 ->setCellValue('B'.$i, $fila['Last'])
						 ->setCellValue('C'.$i, $fila['Temple_Id'])
						 ->setCellValue('D'.$i, $fila['Email'])
						 ->setCellValue('E'.$i, $fila['Group_Description'])
						 ->setCellValue('F'.$i, $fila['Start_Date'])
						 ->setCellValue('G'.$i, $fila['Start_End'])
						 ->setCellValue('H'.$i, $fila['Time_Transaction'])
						 ->setCellValue('I'.$i, $fila['Quantity'])
						 ->setCellValue('J'.$i, $fila['Item_description'])
						 ->setCellValue('K'.$i, $fila['Reference'])
						 ->setCellValue('L'.$i, $fila['Transaction_Description']);							 
					 $i++;
 					}
						
						
						
						
						
			  // Rename worksheet
                        $objPHPExcel->getActiveSheet()->setTitle('User');

                        // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                        $objPHPExcel->setActiveSheetIndex(0);
                        

                        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
                        header('Content-Type: application/vnd.ms-excel');
                        header('Content-Disposition: attachment;filename="userList.xls"');

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
                        alert("No results found with selected User");
						window.close()
                        </script>
					<?php
				exit;
				}
?>
			 
			 
			 
			 
			 
	