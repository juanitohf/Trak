<?php

/*
table ' transition'

transition_Id
User_Id	
GroupId
Start_Date
Start_End
Time_Transaction
Item_Id		
Quantity
Transaction_Status_Id
Stuff_Confirmation_Id

*/
require_once('Connection.php');
require_once('item.php');
require_once('Cart.php');


class transition
{
	
	private $trans;
	
	public
	$transition_Id,
	$User_Id,
	$GroupId,
	$Start_Date,
	$Start_End,
	$Time_Transaction,
	$Item_Id,
	$Quantity,
	$Transaction_Status_Id,
	$Stuff_Confirmation_Id;
	
	
		public function __construct()
		{
			$this->trans = new Connection();
			$this->trans = $this->trans->ConnectDB();
	
		}
		
		
		
		
 public function Insert_Transition($User_Id,$GroupId,$Start_Date,$Start_End,$Time_Transaction,$Item_Id,$Quantity,
									  $Transaction_Status_Id,$DateAndTime,$Stuff_Confirmation_Id){
			
			
			$getInfoItem = new item();
			$getInfoItem->get_Item_Info_by_ID($Item_Id);
			$Item_Type = $getInfoItem->ItemType_Id;
		
			if($Item_Type != 2){
				
				$Transaction_Status_Id = 1;
				
				try{
				
				$query_Insert = $this->trans->prepare("INSERT INTO transition (User_Id,GroupId,Start_Date,Start_End,Time_Transaction,Item_Id,Quantity,Transaction_Status_Id,Stuff_Confirmation_Id) VALUES(?,?,?,?,?,?,?,?,?)");
				
				
				$query_Insert->bindParam(1,$User_Id);
				$query_Insert->bindParam(2,$GroupId);
				$query_Insert->bindParam(3,$Start_Date);
				$query_Insert->bindParam(4,$Start_End);
				$query_Insert->bindParam(5,$Time_Transaction);
				$query_Insert->bindParam(6,$Item_Id);
				$query_Insert->bindParam(7,$Quantity);
				$query_Insert->bindParam(8,$Transaction_Status_Id);
				$query_Insert->bindParam(9,$Stuff_Confirmation_Id);
				$query_Insert->execute();
				
				
				// the following query is to modify the stock of the items.
				
				
				$qryUpdateStock = $this->trans->prepare("UPDATE items SET 
														Initial_Quantity = Initial_Quantity - $Quantity,
														WHERE Item_Id = ? AND Initial_Quantity >= $Quantity LIMIT 1");
			
				$qryUpdateStock->bindParam(1,$Item_Id);
				$qryUpdateStock->execute();
				
				
				// The following query is to delete the items on the cart because are not longer neccesary on this table
				$queryDeleteItemsCar = new Cart();
				$queryDeleteItemsCar->deleteCartByGroupAndDate($GroupId, $DateAndTime);
				//$queryDeleteItemsCar->UpdateCartToFinish($GroupId, $DateAndTime);
				
			
				  return 1; // Because all process are correct
				
					}catch(PDOExecption $e) { 
					
				 	 return 0;  // Wrong
					 print "Error!: " . $e->getMessage() . "</br>"; 
			
   					} 	
			
		} else{
					
					
				try{
				
				$query_Insert = $this->trans->prepare("INSERT INTO transition (User_Id,GroupId,Start_Date,Start_End,Time_Transaction,Item_Id,Quantity,Transaction_Status_Id,Stuff_Confirmation_Id) VALUES(?,?,?,?,?,?,?,?,?)");
				
				
				$query_Insert->bindParam(1,$User_Id);
				$query_Insert->bindParam(2,$GroupId);
				$query_Insert->bindParam(3,$Start_Date);
				$query_Insert->bindParam(4,$Start_End);
				$query_Insert->bindParam(5,$Time_Transaction);
				$query_Insert->bindParam(6,$Item_Id);
				$query_Insert->bindParam(7,$Quantity);
				$query_Insert->bindParam(8,$Transaction_Status_Id);
				$query_Insert->bindParam(9,$Stuff_Confirmation_Id);
				$query_Insert->execute();
				
			
				// The following query is to delete the items on the cart because are not longer necsary on this
				$queryDeleteItemsCar = new Cart();
				$queryDeleteItemsCar->deleteCartByGroupAndDate($GroupId, $DateAndTime);
				//$queryDeleteItemsCar->UpdateCartToFinish($GroupId, $DateAndTime);
				
				return 1; // Everything is fine
				
					}catch(PDOExecption $e) { 
				
				return 0; // Everything is wrong
				print "Error!: " . $e->getMessage() . "</br>"; 
			
   			} 	
			
				
	} // End Item_Type Condition
			
			
			
			
			
} // This is the end of my insert function



	public function UpdateInitialQuantity($Item_Id, $Quantity){
	
				$qryUpdateStock = $this->trans->prepare("UPDATE items SET Initial_Quantity = Initial_Quantity - $Quantity WHERE Item_Id = ?");
				$qryUpdateStock->bindParam(1,$Item_Id);
				$qryUpdateStock->execute();
		
					if($qryUpdateStock->rowCount() == 1 ){
						return 1; //everything is fine	
					}else{
						return 0;  //error
					}
	}
		
		
		
		
		
public function Create_Transition($User_Id,$GroupId,$Start_Date,$Start_End,$Time_Transaction,$Item_Id,$Quantity,$Transaction_Status_Id,$Stuff_Confirmation_Id){
				
				
				try{
				
				$query_Insert = $this->trans->prepare("INSERT INTO transition (User_Id,GroupId,Start_Date,Start_End,Time_Transaction,Item_Id,		
																			   Quantity,Transaction_Status_Id,Stuff_Confirmation_Id) 
													                           VALUES(?,?,?,?,?,?,?,?,?)");
				
				
				$query_Insert->bindParam(1,$User_Id);
				$query_Insert->bindParam(2,$GroupId);
				$query_Insert->bindParam(3,$Start_Date);
				$query_Insert->bindParam(4,$Start_End);
				$query_Insert->bindParam(5,$Time_Transaction);
				$query_Insert->bindParam(6,$Item_Id);
				$query_Insert->bindParam(7,$Quantity);
				$query_Insert->bindParam(8,$Transaction_Status_Id);
				$query_Insert->bindParam(9,$Stuff_Confirmation_Id);
				$query_Insert->execute();
				
				if($query_Insert->rowCount() == 1){
					   return 1; // Because all process are correct
				  }else{
						return 0;  // Wrong
					}
			
	}catch(PDOExecption $e) { 
		return 0;  // Wrong	
	  print "Error!: " . $e->getMessage() . "</br>"; 
			
   	} 	
	
			
			
			
} // This is the end of my insert function	
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
public function update_Transiction_Status($transition_Id,$Quantity,$Item_Id)
		{ 
		
			$Transaction_Status_Id = 1;
			
			$query_Update = $this->trans->prepare("UPDATE transition SET Transaction_Status_Id=? WHERE transition_Id = ?" );
			$query_Update->bindParam(1, $Transaction_Status_Id);
			$query_Update->bindParam(2, $transition_Id);
			$query_Update->execute();
			
			
			
			// the following query is to modify the stock of the ites.
				
				
				$qryUpdateStock = $this->trans->prepare("UPDATE items SET Stock_Quantity = Stock_Quantity + $Quantity WHERE Item_Id = ?");
				$qryUpdateStock->bindParam(1,$Item_Id);
				$qryUpdateStock->execute();
				
			
		}
	 
		

		
		
	public function getInfoItemTransitionByIdStatusActive($Item_Id){
			
		$Transaction_Status_Id = 2;
			try{
				
				$query_getTran= $this->trans->prepare("SELECT * FROM transition WHERE Item_Id = ? AND Transaction_Status_Id = ?");
				$query_getTran->bindParam(1, $Item_Id);
				$query_getTran->bindParam(2, $Transaction_Status_Id);
				$query_getTran->execute();
				$result = $query_getTran->fetchAll(PDO::FETCH_ASSOC);
				@$result = $result[0];
				

				$this->transition_Id		 = $result['transition_Id'];
				$this->User_Id				 = $result['User_Id'];
				$this->GroupId				 = $result['GroupId'];
				$this->Start_Date			 = $result['Start_Date'];
				$this->Start_End			 = $result['Start_End'];
				$this->Time_Transaction		 = $result['Time_Transaction'];
				$this->Item_Id				 = $result['Item_Id'];
				$this->Quantity				 = $result['Quantity'];
				$this->Transaction_Status_Id = $result['Transaction_Status_Id'];
				$this->Stuff_Confirmation_Id = $result['Stuff_Confirmation_Id'];
		
				
				}catch(PDOExecption $e) { 
				
				print "Error!: " . $e->getMessage() . "</br>"; 
   			} 	
			} // end getInfoCartById
		
		
			
	
} // End of my Users Class

