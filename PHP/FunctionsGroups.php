<?php
require_once "../assets/common.php";




if(isset($_POST['DisplayGroups'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayGroups = $DbConn->prepare("SELECT * FROM Groups");
		$query_diplayGroups->execute();
		
		$i = 0;
		
	if($query_diplayGroups->rowCount() != 0){
					
				while($resultGroups = $query_diplayGroups->fetch(PDO::FETCH_ASSOC)){
					
								$GroupId			= $resultGroups['GroupId'];
								$Group_Description	= $resultGroups['Group_Description'];
								$Start_Date			= $resultGroups['Start_Date'];
								$End_Date	 		= $resultGroups['End_Date'];
								
									
								$results['GroupId'][$i] 			= $GroupId;
								$results['Group_Description'][$i] 	= $Group_Description;
								$results['Start_Date'][$i]			= date("m/d/Y",strtotime($Start_Date));
								$results['End_Date'][$i] 			= date("m/d/Y",strtotime($End_Date));
								$results['Start_Date_Mysql'][$i]	= $Start_Date;
								$results['End_Date_Mysql'][$i] 		= $End_Date;
								
								$EndDateToCalculate = $End_Date;
								$currentDate = date("Y-m-d");
								$Direrencia =  strtotime($EndDateToCalculate) - strtotime($currentDate);
								
								$results['DirerenciaDate'][$i] = $Direrencia;
							
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





if(isset($_POST['DisplayMembersGroups'])){
	
	//Create a connection with Db
	
		$GroupId = $_POST['GroupId'];
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
	
		
		$sql = 	"SELECT users.User_Id, users.Name,users.Last,users.User_Type_Id, Groups.GroupId, Groups.Group_Description, Groups.Start_Date, Groups.End_Date
				 FROM MemberShips, users, Groups 
				 WHERE users.User_Id = MemberShips.User_Id AND MemberShips.GroupId = Groups.GroupId AND Groups.GroupId = ?";
		
		$query_diplayGroupsMembers = $DbConn->prepare($sql);
		$query_diplayGroupsMembers->bindParam(1,$GroupId);
		$query_diplayGroupsMembers->execute();
		
		$i = 0;
		
		
		
		
		if($query_diplayGroupsMembers->rowCount() != 0){
					
				while($resultGroups = $query_diplayGroupsMembers->fetch(PDO::FETCH_ASSOC)){
					
	
								$User_Id			= $resultGroups['User_Id'];
								$Name				= $resultGroups['Name'];
								$Last				= $resultGroups['Last'];
								$User_Type_Id	 	= $resultGroups['User_Type_Id'];
								$GroupId			= $resultGroups['GroupId'];
								$Group_Description	= $resultGroups['Group_Description'];
								$Start_Date			= $resultGroups['Start_Date'];
								$End_Date	 		= $resultGroups['End_Date'];
								
									
								$results['User_Id'][$i] 			= $User_Id;
								$results['Name'][$i] 				= $Name;
								$results['Last'][$i]				= $Last;
								$results['User_Type_Id'][$i] 		= $User_Type_Id;
								$results['GroupId'][$i] 			= $GroupId;
								$results['Group_Description'][$i] 	= $Group_Description;
								$results['Start_Date'][$i]			= date("m/d/Y",strtotime($Start_Date));
								$results['End_Date'][$i] 			= date("m/d/Y",strtotime($End_Date));
								$results['Start_Date_Mysql'][$i]	= $Start_Date;
								$results['End_Date_Mysql'][$i] 		= $End_Date;
						
								
								$i++;
							}
							
					$EndDateToCalculate = $End_Date;
					$currentDate = date("Y-m-d");
					$Direrencia =  strtotime($EndDateToCalculate) - strtotime($currentDate);
							
				$results['DirerenciaDate'] = $Direrencia;
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	
	
	
	
	


if(isset($_POST['DisplayUsers'])){
	
	//Create a connection with Db
		$GroupId	= $_POST['GroupId'];
	
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
	
		
		$sql = 	"SELECT users.User_Id, users.Name,users.Last,users.User_Type_Id
				 FROM users";
		
		$query_diplayUsers = $DbConn->prepare($sql);
		$query_diplayUsers->execute();
		
		$i = 0;
	
		
		if($query_diplayUsers->rowCount() != 0){
					
				while($resultUsers = $query_diplayUsers->fetch(PDO::FETCH_ASSOC)){
					
	
								$User_Id			= $resultUsers['User_Id'];
								$Name				= $resultUsers['Name'];
								$Last				= $resultUsers['Last'];
								$User_Type_Id	 	= $resultUsers['User_Type_Id'];
							
								
									
								$results['User_Id'][$i] 			= $User_Id;
								$results['Name'][$i] 				= $Name;
								$results['Last'][$i]				= $Last;
								$results['User_Type_Id'][$i] 		= $User_Type_Id;
						
								$i++;
				}
				
				
				
						
					/// Here I need to find all member of a specific group	
					
		
				$sql2 = "SELECT User_Id FROM MemberShips WHERE GroupId = ?";
		
				$query_diplayGroupsMembers = $DbConn->prepare($sql2);
				$query_diplayGroupsMembers->bindParam(1,$GroupId);
				$query_diplayGroupsMembers->execute();	
							
					$s = 0;	
				while($resultMembers= $query_diplayGroupsMembers->fetch(PDO::FETCH_ASSOC)){
					
					$User_Id_Group		= $resultMembers['User_Id'];
					$results['User_Id_Group'][$s] 	= $User_Id_Group;
					$s++;
				}
		
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}
	
	
	
	
	
if(isset($_POST['UpdateGroup'])){
	
	
		$Group_Description = $_POST['GroupNameEdit'];
		$Start_Date = $_POST['StartDateEdit'];
		$End_Date = $_POST['EndDateEdit'];
		
		$GroupId = $_POST['GroupId'];
		$Users_Group = $_POST['StudentsEdit'];
		$Instructor_Group = $_POST['InstructorEdit'];
		
	//Create a connection with Db
	
	
		$results = array();  //This will hold the info to display later with Json
		
		$query_UpdateGroup = new Groups();
		$ResultUpdateGroup = $query_UpdateGroup->UpdateGroup($Group_Description,$Start_Date,$End_Date,$Users_Group,$Instructor_Group,$GroupId);
		
	
		
		if($ResultUpdateGroup == 1){
							
				
				$results['Status'] = 'success';
				print json_encode($results);
				
			}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}








if(isset($_POST['DisplayUsersInsert'])){
	
	//Create a connection with Db
		$GroupId	= $_POST['GroupId'];
	
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
	
		
		$sql = 	"SELECT users.User_Id, users.Name,users.Last,users.User_Type_Id
				 FROM users";
		
		$query_diplayUsers = $DbConn->prepare($sql);
		$query_diplayUsers->execute();
		
		$i = 0;
	
		
		if($query_diplayUsers->rowCount() != 0){
					
				while($resultUsers = $query_diplayUsers->fetch(PDO::FETCH_ASSOC)){
					
	
								$User_Id			= $resultUsers['User_Id'];
								$Name				= $resultUsers['Name'];
								$Last				= $resultUsers['Last'];
								$User_Type_Id	 	= $resultUsers['User_Type_Id'];
							
								
									
								$results['User_Id'][$i] 			= $User_Id;
								$results['Name'][$i] 				= $Name;
								$results['Last'][$i]				= $Last;
								$results['User_Type_Id'][$i] 		= $User_Type_Id;
						
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
	
	
	
	
if(isset($_POST['InsertGroup'])){
	
	
		$Group_Description = $_POST['GroupNameInsert'];
		$Start_Date = $_POST['StartDateInsert'];
		$End_Date = $_POST['EndDateInsert'];
		
	
		$Users_Group = $_POST['StudentsInsert'];
		$Instructor_Group = $_POST['InstructorInsert'];
		
	//Create a connection with Db
	
	
		$results = array();  //This will hold the info to display later with Json
		
		$query_InsertGroup = new Groups();
		$ResultInsertGroup = $query_InsertGroup->Insert_Group($Group_Description,$Start_Date,$End_Date,$Users_Group,$Instructor_Group);
		
	
		
		if($ResultInsertGroup == 1){
							
				
				$results['Status'] = 'success';
				print json_encode($results);
				
		}else if($ResultInsertGroup == 2){
							
				
				$results['Status'] = 'repeated';
				print json_encode($results);
				
		}else{
				
				$results['Status'] = 'error';
				print json_encode($results);
				
				}	
				
			$DbConn = null;	
	
	
	}









if(isset($_POST['DisplayGroupsByName'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayGroups = $DbConn->prepare("SELECT * FROM Groups ORDER BY Group_Description");
		$query_diplayGroups->execute();
		
		$i = 0;
		
	if($query_diplayGroups->rowCount() != 0){
					
				while($resultGroups = $query_diplayGroups->fetch(PDO::FETCH_ASSOC)){
					
								$GroupId			= $resultGroups['GroupId'];
								$Group_Description	= $resultGroups['Group_Description'];
								$Start_Date			= $resultGroups['Start_Date'];
								$End_Date	 		= $resultGroups['End_Date'];
								
									
								$results['GroupId'][$i] 			= $GroupId;
								$results['Group_Description'][$i] 	= $Group_Description;
								$results['Start_Date'][$i]			= date("m/d/Y",strtotime($Start_Date));
								$results['End_Date'][$i] 			= date("m/d/Y",strtotime($End_Date));
								$results['Start_Date_Mysql'][$i]	= $Start_Date;
								$results['End_Date_Mysql'][$i] 		= $End_Date;
								
								$EndDateToCalculate = $End_Date;
								$currentDate = date("Y-m-d");
								$Direrencia =  strtotime($EndDateToCalculate) - strtotime($currentDate);
								
								$results['DirerenciaDate'][$i] = $Direrencia;
							
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







if(isset($_POST['DisplayGroupsByDate'])){
	
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayGroups = $DbConn->prepare("SELECT * FROM Groups ORDER BY End_Date");
		$query_diplayGroups->execute();
		
		$i = 0;
		
	if($query_diplayGroups->rowCount() != 0){
					
				while($resultGroups = $query_diplayGroups->fetch(PDO::FETCH_ASSOC)){
					
								$GroupId			= $resultGroups['GroupId'];
								$Group_Description	= $resultGroups['Group_Description'];
								$Start_Date			= $resultGroups['Start_Date'];
								$End_Date	 		= $resultGroups['End_Date'];
								
									
								$results['GroupId'][$i] 			= $GroupId;
								$results['Group_Description'][$i] 	= $Group_Description;
								$results['Start_Date'][$i]			= date("m/d/Y",strtotime($Start_Date));
								$results['End_Date'][$i] 			= date("m/d/Y",strtotime($End_Date));
								$results['Start_Date_Mysql'][$i]	= $Start_Date;
								$results['End_Date_Mysql'][$i] 		= $End_Date;
								
								$EndDateToCalculate = $End_Date;
								$currentDate = date("Y-m-d");
								$Direrencia =  strtotime($EndDateToCalculate) - strtotime($currentDate);
								
								$results['DirerenciaDate'][$i] = $Direrencia;
							
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





if(isset($_POST['SearchByGroupName'])){
	
	
	$groupSearchName = $_POST['groupSearchName'].'%';
	//Create a connection with Db
	
		$Db = new Connection();
		$DbConn = $Db->ConnectDB();
		$results = array();  //This will hold the info to display later with Json
		
		$query_diplayGroups = $DbConn->prepare("SELECT * FROM Groups WHERE (Group_Description LIKE :search) ORDER BY Group_Description");
		$query_diplayGroups->bindParam(':search',$groupSearchName);
		$query_diplayGroups->execute();
		
		$i = 0;
		
	if($query_diplayGroups->rowCount() != 0){
					
				while($resultGroups = $query_diplayGroups->fetch(PDO::FETCH_ASSOC)){
					
								$GroupId			= $resultGroups['GroupId'];
								$Group_Description	= $resultGroups['Group_Description'];
								$Start_Date			= $resultGroups['Start_Date'];
								$End_Date	 		= $resultGroups['End_Date'];
								
									
								$results['GroupId'][$i] 			= $GroupId;
								$results['Group_Description'][$i] 	= $Group_Description;
								$results['Start_Date'][$i]			= date("m/d/Y",strtotime($Start_Date));
								$results['End_Date'][$i] 			= date("m/d/Y",strtotime($End_Date));
								$results['Start_Date_Mysql'][$i]	= $Start_Date;
								$results['End_Date_Mysql'][$i] 		= $End_Date;
								
								$EndDateToCalculate = $End_Date;
								$currentDate = date("Y-m-d");
								$Direrencia =  strtotime($EndDateToCalculate) - strtotime($currentDate);
								
								$results['DirerenciaDate'][$i] = $Direrencia;
							
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