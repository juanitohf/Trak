<?php

/*

Table "cart"

	Cart_Id
	User_Id
	GroupId
	Item_Id
	Quantity
	Days
	ConfirmInstructor_Date
	pickUP_Date
	Date
	Time
*/

require_once('Connection.php');


class Cart
{
	
	private $CartConection;
	
	public
	$Cart_Id,	
	$User_Id,	
	$Item_Id,	
	$Quantity,
	$Days,
	$Cart_Status_Id,
	$ConfirmInstructor_Date,
	$Date,
	$Time;
	
	
		public function __construct()
		{
			$this->CartConection = new Connection();
			$this->CartConection = $this->CartConection->ConnectDB();
	
		}
		
		
	public function Insert_Cart($User_Id,$Item_Id,$Quantity,$Days,$Cart_Status_Id,$Date)
		{
			
			try{
				
					
					$query_Insert = $this->CartConection->prepare("INSERT INTO cart (User_Id,Item_Id,Quantity,Days,Cart_Status_Id,Date) VALUES(?,?,?,?,?,?)");
					$query_Insert->bindParam(1, $User_Id);
				  	$query_Insert->bindParam(2, $Item_Id);
				  	$query_Insert->bindParam(3, $Quantity);
					$query_Insert->bindParam(4, $Days);
				  	$query_Insert->bindParam(5, $Cart_Status_Id);
					$query_Insert->bindParam(6, $Date);
				  	$query_Insert->execute();
			  
			 
				
			}catch(PDOExecption $e) { 
				
				print "Error!: " . $e->getMessage() . "</br>"; 
   			} 
	
			
			
		} // End insert cart function
		
		
		
		function getInfoCartById($Cart_Id){
			
			try{
				$query_getCart= $this->CartConection->prepare("SELECT * FROM cart WHERE Cart_Id = ?");
				$query_getCart->bindParam(1, $Cart_Id);
				$query_getCart->execute();
				$result = $query_getCart->fetchAll(PDO::FETCH_ASSOC);
				@$result = $result[0];
				

				$this->Cart_Id			= $result['Cart_Id'];
				$this->Item_Id			= $result['Item_Id'];
				$this->User_Id			= $result['User_Id'];
				$this->Quantity			= $result['Quantity'];
				$this->Days				= $result['Days'];
				$this->Date				= $result['Date'];
				$this->GroupId			= $result['GroupId'];
				$this->Cart_Status_Id	= $result['Cart_Status_Id'];
				
				
				
			}catch(PDOExecption $e) { 
				
				print "Error!: " . $e->getMessage() . "</br>"; 
   			} 
				
				
			} // end getInfoCartById
		
		
		
		public function Update_Status_Cart($User_Id,$Group_Id)
			{
				
			$Cart_Status_Id = 2;
			$Cart_Status_Id2 = 1;
			
			try{
				$query_Update_Stock = $this->CartConection->prepare("UPDATE cart SET Cart_Status_Id	= ?, GroupId = ? WHERE User_Id = ? AND Cart_Status_Id = ?");	
				$query_Update_Stock->bindParam(1, $Cart_Status_Id);
				$query_Update_Stock->bindParam(2, $Group_Id);
				$query_Update_Stock->bindParam(3, $User_Id);
				$query_Update_Stock->bindParam(4, $Cart_Status_Id2);
				$query_Update_Stock->execute();
				
			
			
			}catch(PDOExecption $e) { 
				
					print "Error!: " . $e->getMessage() . "</br>"; 
   				} 	
			}
		
		
		
		function deleteCartById($Cart_Id){
			try{
				
				$query_Delete = $this->CartConection->prepare("DELETE FROM cart WHERE Cart_Id = ?");	
				$query_Delete->bindParam(1, $Cart_Id);
				$query_Delete->execute();
				
				
			
			}catch(PDOExecption $e) { 
				
					print "Error!: " . $e->getMessage() . "</br>"; 
   				} 
				
			} // End deleteCartById
			
			
			
		public function deleteCartByGroupAndDate($GroupId, $DateInstructore){
				
			try{
					
				$query_Delete = $this->CartConection->prepare("DELETE QUICK FROM cart WHERE GroupId = ? AND ConfirmInstructor_Date = ?");	
				$query_Delete->bindParam(1, $GroupId);
				$query_Delete->bindParam(2, $DateInstructore);
				$query_Delete->execute();
				
				if($query_Delete->rowCount() != 0){
					return 1;
				}else{
					return 0;
				}
			
			}catch(PDOExecption $e) { 
					return 0;
					print "Error!: " . $e->getMessage() . "</br>"; 
   				} 	
				
				
			} // End deleteCartById
		
		
		public function UpdateCartToAccepted($dateAccepted, $GroupIDAccepted, $ConfirmInstructor_Date){
			
			$Cart_Status_Id = 3;
			$Cart_Status_Id_To_Modfy = 2;
			try{
				$query_Update_Stock = $this->CartConection->prepare("UPDATE cart SET Cart_Status_Id= ?, ConfirmInstructor_Date= ? 
																	 WHERE GroupId= ? AND Date= ? AND Cart_Status_Id = ?  ");	
				$query_Update_Stock->bindParam(1, $Cart_Status_Id);
				$query_Update_Stock->bindParam(2, $ConfirmInstructor_Date);
				$query_Update_Stock->bindParam(3, $GroupIDAccepted);
				$query_Update_Stock->bindParam(4, $dateAccepted);
				$query_Update_Stock->bindParam(5, $Cart_Status_Id_To_Modfy);
				$query_Update_Stock->execute();
				
				if($query_Update_Stock->rowCount() != 0){
					return 'true';
					}else{
					return '0Rows';
					}
			
			}catch(PDOExecption $e) { 
					return 'false';
					print "Error!: " . $e->getMessage() . "</br>"; 
   				} 	
			
			
		}
		
		
public function ReduceOfDatabase($Quantity, $Item_Id){
			
			try{
				
				$qryUpdateStock = $this->CartConection->prepare("UPDATE items SET Stock_Quantity = Stock_Quantity - $Quantity 
														WHERE Item_Id = ? AND Initial_Quantity >= $Quantity LIMIT 1");
			
				$qryUpdateStock->bindParam(1,$Item_Id);
				$qryUpdateStock->execute();
				if($qryUpdateStock->rowCount() != 0){
					return 'true';
					}else{
					return '0Rows';
					}
			
			}catch(PDOExecption $e) { 
					return 'false';
					print "Error!: " . $e->getMessage() . "</br>"; 
   				} 	
			
			
		}
		
		
		
		public function UpdateCartToFinish($GroupId, $DateAndTime){
			
			$Cart_Status_Id = 4;
			
			try{
				$query_Update_Stock = $this->CartConection->prepare("UPDATE cart SET Cart_Status_Id	= ? WHERE GroupId = ? AND DateAndTime = ? ");	
				$query_Update_Stock->bindParam(1, $Cart_Status_Id);
				$query_Update_Stock->bindParam(2, $GroupId);
				$query_Update_Stock->bindParam(3, $DateAndTime);
				$query_Update_Stock->execute();
				
				if($query_Update_Stock->rowCount() != 0){
					return 'true';
					}else{
					return '0Rows';
					}
			
			}catch(PDOExecption $e) { 
				
					print "Error!: " . $e->getMessage() . "</br>"; 
   				} 	
			
			
		}
		
	
	

	
	public function UpdateCartQuantityAndDays($Cart_Id, $Quantity, $Days){
			
			
			try{
				$query_Update_Stock = $this->CartConection->prepare("UPDATE cart SET Quantity = ?, Days = ? WHERE Cart_Id = ?");	
				$query_Update_Stock->bindParam(1, $Quantity);
				$query_Update_Stock->bindParam(2, $Days);
				$query_Update_Stock->bindParam(3, $Cart_Id);
				$query_Update_Stock->execute();
				
				if($query_Update_Stock->rowCount() == 1){
					return 1;
				}else{
					return 0;
						}
				
			
			}catch(PDOExecption $e) { 
				
					print "Error!: " . $e->getMessage() . "</br>"; 
   				} 	
			
			
		}
	
	
	
	
	
	
	
} // End of my  Class Group
