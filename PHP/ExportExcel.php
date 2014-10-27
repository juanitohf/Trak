<?php


include 'assets/classes/Connection.php';
include 'assets/classes/item.php';
include 'PHPExcel/IOFactory.php';
//include "PHPExcel/Shared/String.php";
include "PHPExcel.php";


class ExportExcel
{
	
	private $Export;
	
	public
	$Item_Id,
	$Item_description,
	$Reference,
	$Imagen,
	$Initial_Quantity,
	$Stock_Quantity,
	$Lessons_item,
	$Date,
	$Expiration_date,
	$Price,
	$Grant_Id,
	$Vendor_Id,
	$Category_Id,
	$Subcategory_id,
	$ItemType_Id,
	$Building,
	$Cabine,
	$Room,
	$Department,
	$Location_Description,
	$Grp;
	
	
		public function __construct()
		{
			$this->Export = new Connection();
			$this->Export = $this->Export->ConnectDB();
	
		}
		
		
		public function CreateCsvFromExcel(){
			
			 $csvfile = "db/Trak.xlsx";
			 $outputfile = "db/Trak.csv";
			 
			 
			
			$excel = PHPExcel_IOFactory::load($csvfile);
			$writer = PHPExcel_IOFactory::createWriter($excel, 'CSV');
			$writer->setDelimiter(";");
			$writer->setEnclosure("");
			$writer->save($outputfile);
			
			
			}
		
		
	 public function ExportToDatabase(){
		 
			$i=0; //so we can skip first row
		 
			 $fieldseparator = " ";
			 $lineseparator = "\n";
			 $csvfile = "db/Trak.csv";
			 $outputfile = "db/Trak.sql";
			
			
		 $Item_Isert = new item();
		 
		 
			
			$Grp=0;
			$source = fopen($csvfile, 'r') or die("Problem open file");
			
			
			while (($data = fgetcsv($source, 1000, ",")) !== FALSE)
			{
				
				if($i > 0){
				
					echo $Item_description 		= $data[0];
						echo "<br>";
					echo $Reference 			= $data[1];
					echo "<br>";
					echo $Imagen 				= $data[2];
					echo "<br>";
					echo $Initial_Quantity 		= $data[3];
					echo "<br>";
					echo $Lessons_item 			= $data[4];
					echo "<br>";
					echo $Date 					= $data[5];
					echo "<br>";
					echo $Expiration_date		= $data[6];
					echo "<br>";
					echo $Price 				= $data[7];
					echo "<br>";
					echo $Grant_Id 				= $data[8];
					echo "<br>";
					echo $Category_Id 			= $data[9];
					echo "<br>";
					echo $Subcategory_id 		= $data[10];
					echo "<br>";
					echo $ItemType_Id 			= $data[11];
					echo "<br>";
					echo $Vendor_Id 			= $data[12];
					echo "<br>";
					echo $Building 				= $data[13];
					echo "<br>";
					echo $Department 			= $data[14];
					echo "<br>";
					echo $Room 					= $data[15];
					echo "<br>";
					echo $Cabine 				= $data[16];
					echo "<br>";
					echo $Location_Description 	= "";
					echo "<br>";
					echo $Grp 	= 1;
					echo "<br>";
			
		
					$resultInsert = 	$Item_Isert->Insert_Item($Item_description,$Reference,$Imagen,$Initial_Quantity,$Lessons_item,$Date,$Expiration_date,$Price,$Grant_Id,$Vendor_Id,$Category_Id,$Subcategory_id,$ItemType_Id,$Building,$Cabine,$Room,$Department,$Location_Description,$Grp);
	
				echo $resultInsert;
				
		}
		$i++;
				
				
			}
			
			fclose($source);
			$Item_Isert = null;	
			
			
} // End function ExportToDatabase
		
		
		
	
	
} // End of my Users Class

