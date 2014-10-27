<?php

	
// information field database //

/*
NAME DATABASE :   tuteach
NAME TABLE: visitors

FIELD:
		
		Visitor_Id
		User_Id
		Date
		TimeStart
		TimeEnd
		TimeOnStudio
		Id_Status_Visitor
		
		

*/

	
require_once('Connection.php') ;

class Visitor
{

	private 
		$StVisitor;

	public
		$Visitor_Id,
		$User_Id,
		$Date,
		$TimeStart,
		$TimeEnd,
		$TimeOnStudio,
		$Id_Status_Visitor;
	



		public function __construct()
		{
		$this->StVisitor = new Connection();
		$this->StVisitor = $this->StVisitor->ConnectDB();
		}
		
		
	



		public function Insert_Visitor($User_Id)	
		{
		
			
			$DateActual = (string)date('Y-m-d');
			$TimeActual = (string)date("H:i");
			
			$Id_Status_Visitor = 1;
			$query_insert = $this->StVisitor->prepare("SELECT * FROM visitors WHERE User_Id = ? AND Date = ? AND Id_Status_Visitor = ?");
			$query_insert->bindParam(1, $User_Id);
			$query_insert->bindParam(2, $DateActual);
			$query_insert->bindParam(3, $Id_Status_Visitor);
			$query_insert->execute();	
			
			
			//echo $query_insert->rowCount()."<br>";
			
			//$query_insert->rowCount();
			
			if($query_insert->rowCount() == 1)
			{
				
					$result = $query_insert->fetchAll(PDO::FETCH_ASSOC);
					$result = $result[0];
					
					$ID_VIS		= $result['Visitor_Id'];
					$ID_USE 	= $result['User_Id'];	
					$Status  	= $result['Id_Status_Visitor'];
					$TimeActual;
					$TimeSt			= $result['TimeStart'];
					$TimeSt			= strtotime($result['TimeStart']);
					$TimeActual 	= strtotime($TimeActual);	
					$finalDate= ($TimeActual - $TimeSt)/60;
					
					$lastVisitor = $_SESSION['Id_Last_Visitor'] = $ID_USE;
					
					// This part is to calculate the time on the studio//
					$calculateFinalTime = new Visitor();
					 if($finalDate == 0)
					 {$DateStudio = "0 hours 0 min";}
					 else{$DateStudio = $calculateFinalTime->convertToHoursMins($finalDate, '%d hours  %d min');}

				
					if($Status == 1)
					{
						$TimeE = date('H:i');	
						$Id_Status_Visitor = 0;
					
							$query_Edit = $this->StVisitor->prepare("UPDATE visitors SET TimeEnd = ?, TimeOnStudio = ?, Id_Status_Visitor=? WHERE Visitor_Id = ?");
							$query_Edit->bindParam(1, $TimeE);
							$query_Edit->bindParam(2, $DateStudio);
							$query_Edit->bindParam(3, $Id_Status_Visitor);
							$query_Edit->bindParam(4, $ID_VIS);
							$query_Edit->execute();	
							
							
							header("Location: ../Studio.php");
					}
					
					
			}else
			{
				$lastVisitor = $_SESSION['Id_Last_Visitor'] = $User_Id;
				$TimeEnd ="";
				$TimeOnStudio="";
				$Id_Status_Visitor = 1;
				$query_insert = $this->StVisitor->prepare("INSERT INTO visitors (User_Id,Date,TimeStart,TimeEnd,TimeOnStudio,Id_Status_Visitor) VALUES(?,?,?,?,?,?)");
				$query_insert->bindParam(1, $User_Id);
				$query_insert->bindParam(2, $DateActual);
				$query_insert->bindParam(3, $TimeActual);
				$query_insert->bindParam(4, $TimeEnd);
				$query_insert->bindParam(5, $TimeOnStudio);
				$query_insert->bindParam(6, $Id_Status_Visitor);
				$query_insert->execute();	
			
				header("Location: ../Studio.php");
			}
		
		
		
		} // End insert_catUser function


		 function convertToHoursMins($time, $format = '%d:%d')
		  {
				settype($time, 'integer');
				if ($time < 1) {
					return;
				}
				$hours = floor($time/60);
				$minutes = $time%60;
				
			
				return sprintf($format, $hours, $minutes);	
				
			}



			public function Edit_Visitor($Visitor_Id,$User_Id,$Date,$TimeStart,$TimeEnd,$TimeOnStudio,$Id_Status_Visitor)
		{
	
					$query_Edit = $this->StVisitor->prepare("UPDATE visitors  SET User_Id = ?,Date= ?, TimeStart = ?,TimeEnd = ?, TimeOnStudio = ?, Id_Status_Visitor = ? WHERE Visitor_Id = ?");




							$query_Edit->bindParam(1, $User_Id);
							$query_Edit->bindParam(2, $Date);
							$query_Edit->bindParam(3, $TimeStart);
							$query_Edit->bindParam(4, $TimeEnd);
							$query_Edit->bindParam(5, $TimeOnStudio);
							$query_Edit->bindParam(6, $Id_Status_Visitor);
							$query_Edit->bindParam(7, $Visitor_Id);
							$query_Edit->execute();		
						
		}


	function Close_Visitor($User_IDD){
		
		
		
		
			$DateActual = (string)date('Y-m-d');
			$TimeActual = (string)date("H:i");
			
			$Id_Status_Visitor = 1;
			$query_insert = $this->StVisitor->prepare("SELECT * FROM visitors WHERE Id_Status_Visitor = ?");
			$query_insert->bindParam(1, $Id_Status_Visitor);
			$query_insert->execute();	
			
		
				
					while($result = $query_insert->fetch(PDO::FETCH_ASSOC)){
				
							
							$ID_VIS		= $result['Visitor_Id'];
							$ID_USE 	= $result['User_Id'];	
							$Status  	= $result['Id_Status_Visitor'];
							$TimeActual;
							$TimeSt		= $result['TimeStart'];
							$TimeSt		= strtotime($result['TimeStart']);
							$TimeActual 	= strtotime($TimeActual);	
							$finalDate= ($TimeActual - $TimeSt)/60;
					
							
							// This part is to calculate the time on the studio//
							$calculateFinalTime = new Visitor();
							 if($finalDate == 0)
							 {$DateStudio = "0 hours 0 min";}
							 else{$DateStudio = $calculateFinalTime->convertToHoursMins($finalDate, '%d hours  %d min');}

				
					
							$TimeE = date('H:i');	
							$Id_Status_Visitor = 0;
					
							$query_Edit = $this->StVisitor->prepare("UPDATE visitors SET TimeEnd = ?, TimeOnStudio = ?, Id_Status_Visitor=? WHERE Visitor_Id = ?");
							$query_Edit->bindParam(1, $TimeE);
							$query_Edit->bindParam(2, $DateStudio);
							$query_Edit->bindParam(3, $Id_Status_Visitor);
							$query_Edit->bindParam(4, $ID_VIS);
							$query_Edit->execute();	
							header("Location: ../Studio.php?closeDay=false");
							
		
					}
					$this->StVisitor = null;
		}




function Close_All_Visitor(){
		
		
		
		
			$DateActual = date('Y-m-d');
			$TimeActual = date("H:i");
			
			$Id_Status_Visitor = 1;
			$query_insert = $this->StVisitor->prepare("SELECT * FROM visitors WHERE Id_Status_Visitor = ?");
			$query_insert->bindParam(1, $Id_Status_Visitor);
			$query_insert->execute();	
			
		
				
					while($result = $query_insert->fetch(PDO::FETCH_ASSOC)){
				
						
							$ID_VIS		= $result['Visitor_Id'];
							$ID_USE 	= $result['User_Id'];
							$Status  	= $result['Id_Status_Visitor'];
							$TimeSt		= $result['TimeStart'];
							
							$TimeActual = (string)date("H:i");
						    $TimeActual 	= strtotime($TimeActual);	
							$TimeSt		    = strtotime($TimeSt);
							
							$finalDate= ($TimeActual - $TimeSt)/60;
					
							
						
							
							// This part is to calculate the time on the studio//
							$calculateFinalTime = new Visitor();
							 if($finalDate == 0)
							 {$DateStudio = "0 hours 0 min";}
							 else{$DateStudio = $calculateFinalTime->convertToHoursMins($finalDate, '%d hours  %d min');}

				
						
							$DateStudio;
							
					
							$TimeE = date('H:i');	
							$Id_Status_Visitor = 0;
					
							$query_Edit = $this->StVisitor->prepare("UPDATE visitors SET TimeEnd = ?, TimeOnStudio = ?, Id_Status_Visitor=? WHERE Visitor_Id = ?");
							$query_Edit->bindParam(1, $TimeE);
							$query_Edit->bindParam(2, $DateStudio);
							$query_Edit->bindParam(3, $Id_Status_Visitor);
							$query_Edit->bindParam(4, $ID_VIS);
							$query_Edit->execute();	
							
							} // this is the while loop
					
					
			} // This is the end of my funciton



			function getVisitor($Visitor_Id)
			{
				
				
				$query_getUser = $this->StVisitor->prepare("SELECT * FROM visitors WHERE Visitor_Id = ?");
				$query_getUser->bindParam(1, $Visitor_Id);
				$query_getUser->execute();
				$result = $query_getUser->fetchAll(PDO::FETCH_ASSOC);
				$result = $result[0];
		

				$this->Visitor_Id		= $result['Visitor_Id'];
				$this->User_Id 			= $result['User_Id'];
				$this->Date				= $result['Date'];
				$this->TimeStart 		= $result['TimeStart'];
				$this->TimeEnd			= $result['TimeEnd'];
				$this->TimeOnStudio 	= $result['TimeOnStudio'];
				$this->Id_Status_Visitor= $result['Id_Status_Visitor'];
		
	
			}
			
			

} // This is the end of the class Usuario



?>