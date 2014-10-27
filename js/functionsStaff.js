
var getInfoUserOnJquery = function(User_Id,Name,Last,User_Type_Id){
	
	window.localStorage.setItem('User_Id',User_Id);
 	window.localStorage.setItem('Name',Name);
	window.localStorage.setItem('Last',Last);
 	window.localStorage.setItem('User_Type_Id',User_Type_Id);
	
}




$(document).ready(function(e) {
    
	
		var dataString = 'DisplayCartAcceptedByInstructor=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsStaff.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Cart_Id 						= data.Cart_Id;
					  var User_Id 						= data.User_Id;
					  var Item_Id 						= data.Item_Id;
					  var Cart_Status_Id 				= data.Cart_Status_Id;
					  var ConfirmInstructor_Date 		= data.ConfirmInstructor_Date;
					  var ConfirmInstructor_Date_Mysql 	= data.ConfirmInstructor_Date_Mysql;
					  var GroupId 						= data.GroupId;
					  var Group_Description 			= data.Group_Description;
					
					
				
					
					 if (data.Status == 'success'){
						  
						$('#containerReservationAccepted').html("");

					
					 for (var i in Cart_Id) {
						 	
						
							
							$('#containerReservationAccepted').append(
					  
					  				'<div class="linesReservationAccepted">'+ 
                                	'<div class="labelGroup"><a href="javascript:displayInfoReservationsByInstructor('+GroupId[i]+','+User_Id[i]+','+Cart_Status_Id[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')">'+Group_Description[i]+'</a></div>'+
                                    '<div class="labelDate"><a href="javascript:displayInfoReservationsByInstructor('+GroupId[i]+','+User_Id[i]+','+Cart_Status_Id[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')">'+ConfirmInstructor_Date[i]+'</a></div>'+
                                    '<div class="labelActions">'+
                                    		
                                    	'<a href="javascript:modalStuffConfirmationBox('+User_Id[i]+','+GroupId[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')" class="aAccept"><img src="../images/Accept.png" alt="Accept logo"/></a>  | '+
                                        '<a href="javascript:openDeclineBox('+User_Id[i]+','+GroupId[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')" class="aDecline"><img src="../images/Decline.png" alt="Decline logo"/></a>  | '+
										'<a href="javascript:openSendMessageBox('+User_Id[i]+');" id="smsIcon"><img src="../images/email-icon.png" alt="Ready logo"/></a>'+
									
                                  '</div>'+
                               '</div>'
					  		
					  
				 			 );
							 
							 
					 } // End form loop
				 
				 	displayItemsReportList();
					  }else{
						   $('#containerReservationAccepted').html("");
							displayItemsReportList();
						  
						  }
						 
				  }
			});
			return false;
			

});



var displayReservationFunction = function(){
	
	
	
	var dataString = 'DisplayCartAcceptedByInstructor=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsStaff.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Cart_Id 						= data.Cart_Id;
					  var User_Id 						= data.User_Id;
					  var Item_Id 						= data.Item_Id;
					  var Cart_Status_Id 				= data.Cart_Status_Id;
					  var ConfirmInstructor_Date 		= data.ConfirmInstructor_Date;
					  var ConfirmInstructor_Date_Mysql 	= data.ConfirmInstructor_Date_Mysql;
					  var GroupId 						= data.GroupId;
					  var Group_Description 			= data.Group_Description;
					
					
					
					 if (data.Status == 'success'){
						  
						$('#containerReservationAccepted').html("");

					
					 for (var i in Cart_Id) {
						 	
							
							$('#containerReservationAccepted').append(
					  
					  				'<div class="linesReservationAccepted">'+ 
                                	'<div class="labelGroup"><a href="javascript:displayInfoReservationsByInstructor('+GroupId[i]+','+User_Id[i]+','+Cart_Status_Id[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')">'+Group_Description[i]+'</a></div>'+
                                    '<div class="labelDate"><a href="javascript:displayInfoReservationsByInstructor('+GroupId[i]+','+User_Id[i]+','+Cart_Status_Id[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')">'+ConfirmInstructor_Date[i]+'</a></div>'+
                                    '<div class="labelActions">'+
                                    		
                                    	'<a href="javascript:modalStuffConfirmationBox('+User_Id[i]+','+GroupId[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')" class="aAccept"><img src="../images/Accept.png" alt="Accept logo"/></a>  | '+
                                        '<a href="javascript:openDeclineBox('+User_Id[i]+','+GroupId[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')" class="aDecline"><img src="../images/Decline.png" alt="Decline logo"/></a>  | '+
										'<a href="javascript:openSendMessageBox('+User_Id[i]+');" id="smsIcon"><img src="../images/email-icon.png" alt="Ready logo"/></a>'+
									
                                  '</div>'+
                               '</div>'
					  		
					  
				 			 );
							 
							 
					 } // End form loop
				 
				 	
					  }else{
						   $('#containerReservationAccepted').html("");
						  alert('No requests at this time');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
	
	
} // End displayReservationFunction





$('#searchByGroupName').click(function(){

var groupNameSearch = $('#groupNameSearch').val();




	var dataString = 'groupNameSearch='+groupNameSearch+'&SearchByGroupNameCartAcceptedByInstructor=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsStaff.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Cart_Id 						= data.Cart_Id;
					  var User_Id 						= data.User_Id;
					  var Item_Id 						= data.Item_Id;
					  var Cart_Status_Id 				= data.Cart_Status_Id;
					  var ConfirmInstructor_Date 		= data.ConfirmInstructor_Date;
					  var ConfirmInstructor_Date_Mysql 	= data.ConfirmInstructor_Date_Mysql;
					  var GroupId 						= data.GroupId;
					  var Group_Description 			= data.Group_Description;
					
					
					
					 if (data.Status == 'success'){
						  
						$('#containerReservationAccepted').html("");

					
					 for (var i in Cart_Id) {
						 	
							
							$('#containerReservationAccepted').append(
					  
					  				'<div class="linesReservationAccepted">'+ 
                                	'<div class="labelGroup"><a href="javascript:displayInfoReservationsByInstructor('+GroupId[i]+','+User_Id[i]+','+Cart_Status_Id[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')">'+Group_Description[i]+'</a></div>'+
                                    '<div class="labelDate"><a href="javascript:displayInfoReservationsByInstructor('+GroupId[i]+','+User_Id[i]+','+Cart_Status_Id[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')">'+ConfirmInstructor_Date[i]+'</a></div>'+
                                    '<div class="labelActions">'+
                                    		
                                    	'<a href="javascript:modalStuffConfirmationBox('+User_Id[i]+','+GroupId[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')" class="aAccept"><img src="../images/Accept.png" alt="Accept logo"/></a>  | '+
                                        '<a href="javascript:openDeclineBox('+User_Id[i]+','+GroupId[i]+',\''+ConfirmInstructor_Date_Mysql[i]+'\')" class="aDecline"><img src="../images/Decline.png" alt="Decline logo"/></a>  | '+
										'<a href="javascript:openSendMessageBox('+User_Id[i]+');" id="smsIcon"><img src="../images/email-icon.png" alt="Ready logo"/></a>'+
									
                                  '</div>'+
                               '</div>'
					  		
					  
				 			 );
							 
							 
					 } // End form loop
				 
				 	
					  }else{
						   $('#containerReservationAccepted').html("");
						   
						  
						  }
						 
				  }
			});
			return false;
	
	

});







var displayInfoReservationsByInstructor = function(GroupId,User_Id,Cart_Status_Id,ConfirmInstructor_Date_Mysql){

	
		var dataString = 'GroupId='+GroupId+'&User_Id='+User_Id+'&Cart_Status_Id='+Cart_Status_Id+'&ConfirmInstructor_Date_Mysql='+ConfirmInstructor_Date_Mysql+'&getInfoReservationsByInstructor=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsStaff.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var GroupId 						= data.GroupId;
					  var Group_Description 			= data.Group_Description;
					  var Cart_Id 						= data.Cart_Id;
					  var User_Id 						= data.User_Id;
					  var Item_Id 						= data.Item_Id;
					  var Quantity 						= data.Quantity;
					  var Days 							= data.Days;
					  var Cart_Status_Id 				= data.Cart_Status_Id;
					  var ConfirmInstructor_Date_Mysql  = data.ConfirmInstructor_Date_Mysql;
					  var ConfirmInstructor_Date 		= data.ConfirmInstructor_Date;
					  var Item_description 				= data.Item_description;
					  var Reference 					= data.Reference;
					  var Imagen 						= data.Imagen;
					  var Initial_Quantity 				= data.Initial_Quantity;
					  var Stock_Quantity 				= data.Stock_Quantity;
					  var ItemType_Id 					= data.ItemType_Id;
					  
					  var Name 							= data.Name;
					  var Last 							= data.Last;
			
					 if (data.Status == 'success'){
						  
						$('#containerItemsRequested').html("");
						
						
						// Here I need to complete infor about the request\
						$('#boxLabelInfoClick').hide();
						$('#containerInfoRequested').show();
						
						$('#DateRequestedP').html(ConfirmInstructor_Date[0]);
						$('#requesteUser').html(Name[0] + ' ' +Last[0]);
						$('#groupInfoId').html(Group_Description[0]);
						
						findInstructorGroup(GroupId[0]);

					
					 for (var i in Cart_Id) {
						 	
							
							$('#containerItemsRequested').append(
					  
					  			
                        	'<div class="linesItemRequested" >'+
                            	'<div class="divDescription">'+
                                	 '<div class="contImg">'+
                                     	 '<img src="images/Items/'+Imagen[i]+'" alt="image item"/>'+
                                	 '</div>'+
                                 '<p>'+Item_description[i]+' </p></div>'+
                                 '<div class="divReference"><p>'+Reference[i]+'</p></div>'+
                                 '<div class="divQuantity"><p>'+Quantity[i]+'</p></div>'+
                                 '<div class="divDays"><p>'+Days[i]+'</p></div>'+
                            
                            '</div>'
                  
				 	);
							 
							 
					 } // End form loop
				 
				 	
					  }else{
						   $('#containerItemsRequested').html("");
						  alert('Error displaying item cart list');
						  
						  }
						 
				  }
			});
			e.preventDefault();
			
	
	
	
	
	
} // End function 



var findInstructorGroup = function(GroupId){
	
	
	
		var dataString = 'GroupId='+GroupId+'&findInstructorGroup=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsStaff.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Name 	= data.Name;
					  var Last 	= data.Last;
			
					 if (data.Status == 'success'){
						 // Here I need to complete infor about the request
						
						$('#instructorLabelInfo').html(Name[0] + ' ' +Last[0]);
				     }else{
						alert('Error displaying instructor name');
					 }
						 
				  }
			});
			return false;
			
	
	
}


var modalStuffConfirmationBox = function(User_Id,GroupId,ConfirmInstructor_Date_Mysql){
	
	$('#modalStuffConfirmationBox').show();
	$('#GroupAcceptId').val(GroupId);
	$('#UserIdRequest').val(User_Id);
	$('#DateRequested').val(ConfirmInstructor_Date_Mysql);
	
	
}


var closeModalStaffConfirmation = function(){
	$('#modalStuffConfirmationBox').hide();	
}







$('#templeIdCart').bind('keyup', function(e) {

    if ( e.keyCode === 13 ) { // 13 is enter key

        
		
		
	var templeIdCart 			= $('#templeIdCart').val();
	var GroupId 				= $('#GroupAcceptId').val();
	var ConfirmInstructor_Date  = $('#DateRequested').val();
	var UserIdRequest 			= $('#UserIdRequest').val();
	
	var dataString = 'templeIdCart='+templeIdCart+'&GroupId='+GroupId+'&ConfirmInstructor_Date='+ConfirmInstructor_Date+'&UserIdRequest='+UserIdRequest+'&StaffConfirmation=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsStaff.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Name 	= data.Name;
					  var Last 	= data.Last;
			
					 if (data.Status == 'success'){
						 
						displayReservationFunction();
						closeModalStaffConfirmation();
						
						
				     }else if (data.Status == 'wrongTempleId'){
						
						alert("Wrong Temple Id")
						
					 }
					 
					 else{
						alert('Error transition process');
					 }
						 
				  }
			});
			return false;
			

    }

});



var openDeclineBox = function(User_Id,GroupId,ConfirmInstructor_Date_Mysql){
	
	$('#GroupDeclined').val(GroupId);
	$('#DateRequested').val(ConfirmInstructor_Date_Mysql);
	$('#UserDecline').val(User_Id);
	$('#modalStuffDeclinedBox').show();
}

$('#closeButtonDeclineBox').click(function(){
		$('#modalStuffDeclinedBox').hide();
	
});

$('#btnDecline').click(function(){
	
	var GroupId 		= $('#GroupDeclined').val();
	var Date_Conf		= $('#DateRequested').val();
	var User_Id			= $('#UserDecline').val();
	var AnwserDeclined	= $('#AnwserDeclined').val();
	
	if(AnwserDeclined == ""){
		alert("Please complete the field why it is deleted")
		$('#AnwserDeclined').focus();
	}else{

		
			var dataString = 'GroupId='+GroupId+'&Date_Conf='+Date_Conf+'&User_Id='+User_Id+'&AnwserDeclined='+AnwserDeclined+'&DeleteStaffRequest=true';
					
					$.ajax({
						  type: "POST",
						  url: "../PHP/FunctionsStaff.php",
						  data: dataString,
						  dataType:"Json",
						  success: function(data) {
					
							 if (data.Status == 'success'){
								 
								alert("Item requested by instructor deleted");
								 displayReservationFunction();
								 $('#modalStuffDeclinedBox').hide();
									
							 }else if(data.Status =='errorUpdatingQuantity'){
								 
								alert("error updating the cart");
							 }else if(data.Status =='errorEmail'){
								 
								alert("error sending email to user");
							 } else{
								alert('Error deleting item request');
							 }
								 
						  }
					});
					return false;
					


	} // if else condition compelte fields

});






var openSendMessageBox = function(User_Id){
	
	$('#UserMessage').val(User_Id);
	$('#modalStuffSendMessage').show();
}

$('#closeButtonMessageBox').click(function(){
		$('#modalStuffSendMessage').hide();
	
});



$('#btnMessage').click(function(){
		
		
	
	var User_Id			= $('#UserMessage').val();
	var AnwserMessage	= $('#AnwserMessage').val();
	var PickTime		= $('#TimePickUpMessage').val();
	var PickDate		= $('#DatePickUpMessage').val();
	
	if(AnwserMessage == ""){
		alert("Complete the message field");
		$('#AnwserMessage').focus();
	}else if(PickTime == ""){
		alert("Select pick up time");
		$('#AnwserMessage').focus();
	}else{
		
		var dataString = 'User_Id='+User_Id+'&AnwserMessage='+AnwserMessage+'&PickTime='+PickTime+'&PickDate='+PickDate+'&SendSmsMessage=true';
					
					$.ajax({
						  type: "POST",
						  url: "../PHP/FunctionsStaff.php",
						  data: dataString,
						  dataType:"Json",
						  success: function(data) {
					
							 if (data.Status == 'success'){
								 alert("Message sent success");
								
								$('#modalStuffSendMessage').hide();
								
									
							 }else{
								alert('Error sending message');
							 }
								 
						  }
					});
					return false;
					



		
		
	} // End else function
		
		
});




$('#TagInsert').click(function(){
	

	var dataString = '&ItemOut=true';
					
					$.ajax({
						  type: "POST",
						  url: "../PHP/FunctionsStaff.php",
						  data: dataString,
						  dataType:"Json",
						  success: function(data) {
							  
							  var transition_Id 		= data.transition_Id;
							  var User_Id 				= data.User_Id;
							  var GroupId 				= data.GroupId;
							  var Start_Date 			= data.Start_Date;
							  var End_Date 				= data.End_Date;
							  var Start_Date_Mysql 		= data.Start_Date_Mysql;
							  var End_Date_Mysql 		= data.End_Date_Mysql;
							  var Time_Transaction 		= data.Time_Transaction;
							  var Item_Id 				= data.Item_Id;
							  var Quantity 				= data.Quantity;
							  var Transaction_Status_Id = data.Transaction_Status_Id;
							  var Stuff_Confirmation_Id = data.Stuff_Confirmation_Id;
							  var Item_description 		= data.Item_description;
							  var Reference 			= data.Reference;
							  var Imagen				= data.Imagen;
							  var DirerenciaDate 		= data.DirerenciaDate;
							  
							  
							  var Name 					= data.Name;
							  var Last 					= data.Last;
							  var Email					= data.Email;
							  var Group_Description 	= data.Group_Description;
							
							  
							  var endDateResult;
							
							
							 if (data.Status == 'success'){
								 
								 
								 	$('#containerItemsReturned').html("");

					
									 for (var i in transition_Id) {
											
											if(DirerenciaDate > 0){
												
												endDateResult = '<p id="dateExpired">'+End_Date[i]+'</p>';
											}else{
												endDateResult = '<p id="dateOn">'+End_Date[i]+'</p>';
											}
										
											
											$('#containerItemsReturned').append(
									  
												'<div class="lineContainerReturn">'+
													'<div class="DivReferenceReturn"><p>'+Reference[i]+'</p></div>'+
													'<div class="DivDescriptionReturn"><div class="contImg">'+
														'<img src="images/Items/'+Imagen[i]+'" alt="image Items" />'+
													'</div> <p>'+Item_description[i]+'</p></div>'+
													'<div class="DivStartDateReturn"><p> '+Start_Date[i]+' </p></div>'+
													'<div class="DivEndDateReturn">'+endDateResult+'</div>'+
													'<div class="DivQuantityReturn"><p>'+Quantity[i]+' </p></div>'+
													
													'<div class="DivActionReturn">'+
													'<a href="javascript:returnItem('+transition_Id[i]+','+Item_Id[i]+','+Quantity[i]+')"><img src="../images/return2.png" alt="returnBotton"/></a>'+
													'<a href="javascript:InfoItemToReturn('+transition_Id[i]+',\''+Start_Date[i]+'\',\''+End_Date[i]+'\',\''+Item_description[i]+'\',\''+Reference[i]+'\',\''+Imagen[i]+'\',\''+Name[i]+'\',\''+Last[i]+'\',\''+Email[i]+'\',\''+Group_Description[i]+'\','+Quantity[i]+')"><img src="../images/info.png" alt="returnBotton"/></a>'+
													'</div>'+
												'</div>'
											
					
							  
											 );
											 
											 
									 } // End form loop
												
												
								
								
								
								
									
							 }else{
							
							 }
								 
						  }
					});
					return false;
					



	
});




var displayItemsOut = function(){
	
	var dataString = '&ItemOut=true';
					
					$.ajax({
						  type: "POST",
						  url: "../PHP/FunctionsStaff.php",
						  data: dataString,
						  dataType:"Json",
						  success: function(data) {
							  
							  var transition_Id 		= data.transition_Id;
							  var User_Id 				= data.User_Id;
							  var GroupId 				= data.GroupId;
							  var Start_Date 			= data.Start_Date;
							  var End_Date 				= data.End_Date;
							  var Start_Date_Mysql 		= data.Start_Date_Mysql;
							  var End_Date_Mysql 		= data.End_Date_Mysql;
							  var Time_Transaction 		= data.Time_Transaction;
							  var Item_Id 				= data.Item_Id;
							  var Quantity 				= data.Quantity;
							  var Transaction_Status_Id = data.Transaction_Status_Id;
							  var Stuff_Confirmation_Id = data.Stuff_Confirmation_Id;
							  var Item_description 		= data.Item_description;
							  var Reference 			= data.Reference;
							  var Imagen				= data.Imagen;
							  var DirerenciaDate 		= data.DirerenciaDate;
							  var endDateResult;
							
							
							 if (data.Status == 'success'){
								 
								 
								 	$('#containerItemsReturned').html("");

					
									 for (var i in transition_Id) {
											
											if(DirerenciaDate > 0){
												
												endDateResult = '<p id="dateExpired">'+End_Date[i]+'</p>';
											}else{
												endDateResult = '<p id="dateOn">'+End_Date[i]+'</p>';
											}
										
											
											$('#containerItemsReturned').append(
									  
												'<div class="lineContainerReturn">'+
													'<div class="DivReferenceReturn"><p>'+Reference[i]+'</p></div>'+
													'<div class="DivDescriptionReturn"><div class="contImg">'+
														'<img src="images/Items/'+Imagen[i]+'" alt="image Items" />'+
													'</div> <p>'+Item_description[i]+'</p></div>'+
													'<div class="DivStartDateReturn"><p> '+Start_Date[i]+' </p></div>'+
													'<div class="DivEndDateReturn">'+endDateResult+'</div>'+
													'<div class="DivQuantityReturn"><p>'+Quantity[i]+' Uds </p></div>'+
													'<div class="DivActionReturn"><a href="javascript:returnItem('+transition_Id[i]+','+Item_Id[i]+','+Quantity[i]+')"><img src="../images/return2.png" alt="returnBotton"/></a></div>'+
												'</div>'
											
									  
											 );
											 
											 
									 } // End form loop
												
												
								
								
								
								
									
							 }else{
								$('#containerItemsReturned').html("");
							 }
								 
						  }
					});
					return false;
					



	
}





$('#searchItemByReferenceStaff').click(function(){
	

var reference = $('#inputSearchReference').val();

	var dataString = 'reference='+reference+'&searchItemByReferenceStaff=true';
					
					$.ajax({
						  type: "POST",
						  url: "../PHP/FunctionsStaff.php",
						  data: dataString,
						  dataType:"Json",
						  success: function(data) {
							  
							  var transition_Id 		= data.transition_Id;
							  var User_Id 				= data.User_Id;
							  var GroupId 				= data.GroupId;
							  var Start_Date 			= data.Start_Date;
							  var End_Date 				= data.End_Date;
							  var Start_Date_Mysql 		= data.Start_Date_Mysql;
							  var End_Date_Mysql 		= data.End_Date_Mysql;
							  var Time_Transaction 		= data.Time_Transaction;
							  var Item_Id 				= data.Item_Id;
							  var Quantity 				= data.Quantity;
							  var Transaction_Status_Id = data.Transaction_Status_Id;
							  var Stuff_Confirmation_Id = data.Stuff_Confirmation_Id;
							  var Item_description 		= data.Item_description;
							  var Reference 			= data.Reference;
							  var Imagen				= data.Imagen;
							  var DirerenciaDate 		= data.DirerenciaDate;
							  var endDateResult;
							
							
							 if (data.Status == 'success'){
								 
								 
								 	$('#containerItemsReturned').html("");

					
									 for (var i in transition_Id) {
											
											if(DirerenciaDate > 0){
												
												endDateResult = '<p id="dateExpired">'+End_Date[i]+'</p>';
											}else{
												endDateResult = '<p id="dateOn">'+End_Date[i]+'</p>';
											}
										
											
											$('#containerItemsReturned').append(
									  
												'<div class="lineContainerReturn">'+
													'<div class="DivReferenceReturn"><p>'+Reference[i]+'</p></div>'+
													'<div class="DivDescriptionReturn"><div class="contImg">'+
														'<img src="images/Items/'+Imagen[i]+'" alt="image Items" />'+
													'</div> <p>'+Item_description[i]+'</p></div>'+
													'<div class="DivStartDateReturn"><p> '+Start_Date[i]+' </p></div>'+
													'<div class="DivEndDateReturn">'+endDateResult+'</div>'+
													'<div class="DivQuantityReturn"><p>'+Quantity[i]+' Uds </p></div>'+
													'<div class="DivActionReturn"><a href="javascript:returnItem('+transition_Id[i]+','+Item_Id[i]+','+Quantity[i]+')"><img src="../images/return2.png" alt="returnBotton"/></a></div>'+
												'</div>'
											
									  
											 );
											 
											 
									 } // End form loop
												
												
								
								
								
								
									
							 }else{
							
							 }
								 
						  }
					});
					return false;
					



	
});






$('#searchItemByDescriptionStaff').click(function(){
	

var Description = $('#inputSearchDescription').val();

	var dataString = 'Description='+Description+'&searchItemByDescriptionStaff=true';
					
					$.ajax({
						  type: "POST",
						  url: "../PHP/FunctionsStaff.php",
						  data: dataString,
						  dataType:"Json",
						  success: function(data) {
							  
							  var transition_Id 		= data.transition_Id;
							  var User_Id 				= data.User_Id;
							  var GroupId 				= data.GroupId;
							  var Start_Date 			= data.Start_Date;
							  var End_Date 				= data.End_Date;
							  var Start_Date_Mysql 		= data.Start_Date_Mysql;
							  var End_Date_Mysql 		= data.End_Date_Mysql;
							  var Time_Transaction 		= data.Time_Transaction;
							  var Item_Id 				= data.Item_Id;
							  var Quantity 				= data.Quantity;
							  var Transaction_Status_Id = data.Transaction_Status_Id;
							  var Stuff_Confirmation_Id = data.Stuff_Confirmation_Id;
							  var Item_description 		= data.Item_description;
							  var Reference 			= data.Reference;
							  var Imagen				= data.Imagen;
							  var DirerenciaDate 		= data.DirerenciaDate;
							  var endDateResult;
							
							
							 if (data.Status == 'success'){
								 
								 
								 	$('#containerItemsReturned').html("");

					
									 for (var i in transition_Id) {
											
											if(DirerenciaDate > 0){
												
												endDateResult = '<p id="dateExpired">'+End_Date[i]+'</p>';
											}else{
												endDateResult = '<p id="dateOn">'+End_Date[i]+'</p>';
											}
										
											
											$('#containerItemsReturned').append(
									  
												'<div class="lineContainerReturn">'+
													'<div class="DivReferenceReturn"><p>'+Reference[i]+'</p></div>'+
													'<div class="DivDescriptionReturn"><div class="contImg">'+
														'<img src="images/Items/'+Imagen[i]+'" alt="image Items" />'+
													'</div> <p>'+Item_description[i]+'</p></div>'+
													'<div class="DivStartDateReturn"><p> '+Start_Date[i]+' </p></div>'+
													'<div class="DivEndDateReturn">'+endDateResult+'</div>'+
													'<div class="DivQuantityReturn"><p>'+Quantity[i]+' Uds </p></div>'+
													'<div class="DivActionReturn"><a href="javascript:returnItem('+transition_Id[i]+','+Item_Id[i]+','+Quantity[i]+')"><img src="../images/return2.png" alt="returnBotton"/></a></div>'+
												'</div>'
											
									  
											 );
											 
											 
									 } // End form loop
												
												
								
								
								
								
									
							 }else{
							
							 }
								 
						  }
					});
					return false;
					



	
});



var returnItem = function(transition_Id,Item_Id,Quantity){
	
	
		var dataString = 'transition_Id='+transition_Id+'&Item_Id='+Item_Id+'&Quantity='+Quantity+'&returnItemToInventory=true';
					
					$.ajax({
						  type: "POST",
						  url: "../PHP/FunctionsStaff.php",
						  data: dataString,
						  dataType:"Json",
						  success: function(data) {
					
							 if (data.Status == 'success'){
								
								displayItemsOut();
								
								
									
							 }else if(data.Status == 'errorTransaction_Status'){
								 
								alert('Error changing transaction status');
							}
							 
							 else{
								
							 }
								 
						  }
					});
					e.preventDefault();
	
	
	
	
	
} // end function returnItems






var displayItemsReportList = function(){
	
	
	
		var dataString = 'DisplayItems=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Item_Id 			= data.Item_Id;
					  var Item_description 	= data.Item_description;
					  var Imagen 			= data.Imagen;
					  var Reference 		= data.Reference;
					  var Initial_Quantity 	= data.Initial_Quantity;
					  var Stock_Quantity 	= data.Stock_Quantity;
					  
					  var DateItem 			= data.DateItem;
					  var Expiration_date 	= data.Expiration_date;
					  var Price 			= data.Price;
					  var Grant_Id 			= data.Grant_Id;
					  var Vendor_Id 		= data.Vendor_Id;
					  var Category_Id 		= data.Category_Id;
					  
					  var Subcategory_id 	= data.Subcategory_id;
					  var ItemType_Id 		= data.ItemType_Id;
					  var Building 			= data.Building;
					  var Cabine 			= data.Cabine;
					  var Room 				= data.Room;
					  var Department 		= data.Department;
					  
					  var Location_Description 	= data.Location_Description;
					  var item_report 		= data.item_report;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  var Last_Item_Id		= data.Last_Item_Id;
					  var StockDisplay;
					 
					  Last_Item_Id = Number(Last_Item_Id);
					  Last_Item_Id = Last_Item_Id + 101;
			
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
						$('#referenceItem').val('Item_'+Last_Item_Id); // This create the reference of the next item to be inserted
					
				 for (var i in Item_Id) {
					 
					 	if(Imagen[i] == ""){
							imgTodisplay = 'no_image.gif';
						}else{
							
							imgTodisplay = Imagen[i];
						}
						
						
							if(Stock_Quantity[i] == 0){
									StockDisplay = '<p class="NotAvailabe">Not available</p>';
							}else{
									StockDisplay = Stock_Quantity[i];
							}
						
					 
					 
					 /// HERE I WANT TO DISPLAY ITEMS TO REPORT SECTION
					 
					 $('#containerListReport').append(
					 
                    	'<div class="lineContainer">'+
                            '<div class="NameColumn">'+
							'<div class="contImgItem"> <img src="images/Items/'+imgTodisplay+'"> </div>'+
							'<p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                            '<div class="EmailColumn">'+StockDisplay+'</div>'+
							'<div class="ActionColumn2">'+
								 '<a href="javascript:openModalBoxReport('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\')" ><img src="../images/report.png" title="Qrcode Items"/></a>'+
                            '</div>'+
                    	'</div>'
					 );     
						
               
					 
					 
					 
					 
					 
			 } // End form loop
				 
				 
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
	
	} // end displayItemReportList
	
	
	
	
	
	
$('#DisplayAllInventory').click(function(){
	
	

	
		var dataString = 'DisplayItemsReport=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Item_Id 			= data.Item_Id;
					  var Item_description 	= data.Item_description;
					  var Imagen 			= data.Imagen;
					  var Reference 		= data.Reference;
					  var Initial_Quantity 	= data.Initial_Quantity;
					  var Stock_Quantity 	= data.Stock_Quantity;
					  
					  var DateItem 			= data.DateItem;
					  var Expiration_date 	= data.Expiration_date;
					  var Price 			= data.Price;
					  var Grant_Id 			= data.Grant_Id;
					  var Vendor_Id 		= data.Vendor_Id;
					  var Category_Id 		= data.Category_Id;
					  
					  var Subcategory_id 	= data.Subcategory_id;
					  var ItemType_Id 		= data.ItemType_Id;
					  var Building 			= data.Building;
					  var Cabine 			= data.Cabine;
					  var Room 				= data.Room;
					  var Department 		= data.Department;
					  
					  var Location_Description 	= data.Location_Description;
					  var item_report 		= data.item_report;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  var Last_Item_Id		= data.Last_Item_Id;
					  var StockDisplay;
					 
					
					 if (data.Status == 'success'){
						 
						 $('#containerListReport').html("");
						
				 for (var i in Item_Id) {
					 
					 	if(Imagen[i] == ""){
							imgTodisplay = 'no_image.gif';
						}else{
							
							imgTodisplay = Imagen[i];
						}
						
						
							if(Stock_Quantity[i] == 0){
									StockDisplay = '<p class="NotAvailabe">Not available</p>';
							}else{
									StockDisplay = Stock_Quantity[i];
							}
						
						
					
					 
					  /// HERE I WANT TO DISPLAY ITEMS TO REPORT SECTION
					 
					 $('#containerListReport').append(
					 
                    	'<div class="lineContainer">'+
                            '<div class="NameColumn">'+
							'<div class="contImgItem"> <img src="images/Items/'+imgTodisplay+'"> </div>'+
							'<p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                            '<div class="EmailColumn">'+StockDisplay+'</div>'+
							'<div class="ActionColumn2">'+
								 '<a href="javascript:openModalBoxReport('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\')" ><img src="../images/report.png" title="Qrcode Items"/></a>'+
                            '</div>'+
                    	'</div>'
					 );     
					 
					 
			 } // End form loop
				 
				 	
					  }else{
						   $('#containerListReport').html("");
						   
						  
						  }
						 
				  }
			});
			return false;
	
	
	
	
	
	
	
	
	
	
});
	
	
	
	
	
	
	

$('#DisplayPedingToReturn').click(function(){
	
	

	
		var dataString = 'DisplayPedingToReturn=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Item_Id 			= data.Item_Id;
					  var Item_description 	= data.Item_description;
					  var Imagen 			= data.Imagen;
					  var Reference 		= data.Reference;
					  var Initial_Quantity 	= data.Initial_Quantity;
					  var Stock_Quantity 	= data.Stock_Quantity;
					  
					  var DateItem 			= data.DateItem;
					  var Expiration_date 	= data.Expiration_date;
					  var Price 			= data.Price;
					  var Grant_Id 			= data.Grant_Id;
					  var Vendor_Id 		= data.Vendor_Id;
					  var Category_Id 		= data.Category_Id;
					  
					  var Subcategory_id 	= data.Subcategory_id;
					  var ItemType_Id 		= data.ItemType_Id;
					  var Building 			= data.Building;
					  var Cabine 			= data.Cabine;
					  var Room 				= data.Room;
					  var Department 		= data.Department;
					  
					  var Location_Description 	= data.Location_Description;
					  var item_report 		= data.item_report;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  var Last_Item_Id		= data.Last_Item_Id;
					  var StockDisplay;
					 
					
					 if (data.Status == 'success'){
						 
						 $('#containerListReport').html("");
						
				 for (var i in Item_Id) {
					 
					 	if(Imagen[i] == ""){
							imgTodisplay = 'no_image.gif';
						}else{
							
							imgTodisplay = Imagen[i];
						}
						
						
							if(Stock_Quantity[i] == 0){
									StockDisplay = '<p class="NotAvailabe">Not available</p>';
							}else{
									StockDisplay = Stock_Quantity[i];
							}
						
						
					
					 
					  /// HERE I WANT TO DISPLAY ITEMS TO REPORT SECTION
					 
					 $('#containerListReport').append(
					 
                    	'<div class="lineContainer">'+
                            '<div class="NameColumn">'+
							'<div class="contImgItem"> <img src="images/Items/'+imgTodisplay+'"> </div>'+
							'<p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                            '<div class="EmailColumn">'+StockDisplay+'</div>'+
							'<div class="ActionColumn2">'+
								 '<a href="javascript:openModalBoxReport('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\')" ><img src="../images/report.png" title="Qrcode Items"/></a>'+
                            '</div>'+
                    	'</div>'
					 );     
					 
					 
			 } // End form loop
				 
				 	
					  }else{
						   $('#containerListReport').html("");
						   
						  
						  }
						 
				  }
			});
			return false;
			
			
});
	
	
	
	
	
	
	
	
	
	

$('#DisplayReportedItems').click(function(){
	
	

	
		var dataString = 'DisplayReportedItems=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Item_Id 			= data.Item_Id;
					  var Item_description 	= data.Item_description;
					  var Imagen 			= data.Imagen;
					  var Reference 		= data.Reference;
					  var Initial_Quantity 	= data.Initial_Quantity;
					  var Stock_Quantity 	= data.Stock_Quantity;
					  
					  var DateItem 			= data.DateItem;
					  var Expiration_date 	= data.Expiration_date;
					  var Price 			= data.Price;
					  var Grant_Id 			= data.Grant_Id;
					  var Vendor_Id 		= data.Vendor_Id;
					  var Category_Id 		= data.Category_Id;
					  
					  var Subcategory_id 	= data.Subcategory_id;
					  var ItemType_Id 		= data.ItemType_Id;
					  var Building 			= data.Building;
					  var Cabine 			= data.Cabine;
					  var Room 				= data.Room;
					  var Department 		= data.Department;
					  
					  var Location_Description 	= data.Location_Description;
					  var item_report 		= data.item_report;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  var Last_Item_Id		= data.Last_Item_Id;
					  var StockDisplay;
					 
					
					 if (data.Status == 'success'){
						 
						 $('#containerListReport').html("");
						
				 for (var i in Item_Id) {
					 
					 	if(Imagen[i] == ""){
							imgTodisplay = 'no_image.gif';
						}else{
							
							imgTodisplay = Imagen[i];
						}
						
						
							if(Stock_Quantity[i] == 0){
									StockDisplay = '<p class="NotAvailabe">Not available</p>';
							}else{
									StockDisplay = Stock_Quantity[i];
							}
						
						
					
					 
					  /// HERE I WANT TO DISPLAY ITEMS TO REPORT SECTION
					 
					 $('#containerListReport').append(
					 
                    	'<div class="lineContainer">'+
                            '<div class="NameColumn">'+
							'<div class="contImgItem"> <img src="images/Items/'+imgTodisplay+'"> </div>'+
							'<p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                            '<div class="EmailColumn">'+StockDisplay+'</div>'+
							'<div class="ActionColumn2">'+
								 '<a href="javascript:openModalBoxReport('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\')" ><img src="../images/report.png" title="Qrcode Items"/></a>'+
                            '</div>'+
                    	'</div>'
					 );     
					 
					 
			 } // End form loop
				 
				 	
					  }else{
						   $('#containerListReport').html("");
						   
						  
						  }
						 
				  }
			});
			return false;
			
			
});











$('#DisplayReportConsumable').click(function(){
	
	

	
		var dataString = 'DisplayReportConsumable=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Item_Id 			= data.Item_Id;
					  var Item_description 	= data.Item_description;
					  var Imagen 			= data.Imagen;
					  var Reference 		= data.Reference;
					  var Initial_Quantity 	= data.Initial_Quantity;
					  var Stock_Quantity 	= data.Stock_Quantity;
					  
					  var DateItem 			= data.DateItem;
					  var Expiration_date 	= data.Expiration_date;
					  var Price 			= data.Price;
					  var Grant_Id 			= data.Grant_Id;
					  var Vendor_Id 		= data.Vendor_Id;
					  var Category_Id 		= data.Category_Id;
					  
					  var Subcategory_id 	= data.Subcategory_id;
					  var ItemType_Id 		= data.ItemType_Id;
					  var Building 			= data.Building;
					  var Cabine 			= data.Cabine;
					  var Room 				= data.Room;
					  var Department 		= data.Department;
					  
					  var Location_Description 	= data.Location_Description;
					  var item_report 		= data.item_report;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  var Last_Item_Id		= data.Last_Item_Id;
					  var StockDisplay;
					 
					
					 if (data.Status == 'success'){
						 
						 $('#containerListReport').html("");
						
				 for (var i in Item_Id) {
					 
					 	if(Imagen[i] == ""){
							imgTodisplay = 'no_image.gif';
						}else{
							
							imgTodisplay = Imagen[i];
						}
						
						
							if(Stock_Quantity[i] == 0){
									StockDisplay = '<p class="NotAvailabe">Not available</p>';
							}else{
									StockDisplay = Stock_Quantity[i];
							}
						
						
					
					 
					  /// HERE I WANT TO DISPLAY ITEMS TO REPORT SECTION
					 
					 $('#containerListReport').append(
					 
                    	'<div class="lineContainer">'+
                            '<div class="NameColumn">'+
							'<div class="contImgItem"> <img src="images/Items/'+imgTodisplay+'"> </div>'+
							'<p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                            '<div class="EmailColumn">'+StockDisplay+'</div>'+
							'<div class="ActionColumn2">'+
								 '<a href="javascript:openModalBoxReport('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\')" ><img src="../images/report.png" title="Qrcode Items"/></a>'+
                            '</div>'+
                    	'</div>'
					 );     
					 
					 
			 } // End form loop
				 
				 	
					  }else{
						   $('#containerListReport').html("");
						
						  
						  }
						 
				  }
			});
			return false;
			
			
});







var openModalBoxReport = function(Item_Id,Item_description,Imagen,Reference){
	$('#modalStuffReportItem').show();
	$( "#imgReportBox" ).attr( "src", 'images/Items/'+Imagen+'');
	$('#centerLineReport').html(Item_description);
	$('#rightLineReport').html(Reference);
	$('#Item_Id_Report').val(Item_Id);
	

} // End openModalBoxReport 

var closeModalBoxReport = function(){
	$('#modalStuffReportItem').hide();
	}
		
		
		

		
$('#buttonReport2').click(function(){
	
	var Item_Id 	= $('#Item_Id_Report').val();
	var ItemReport	= $('#ItemReport').val();
	
	
		var dataString = 'Item_Id='+Item_Id+'&ItemReport='+ItemReport+'&insertReport=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  	
					 if (data.Status == 'success'){
							alert("Report successfully created");
						 	closeModalBoxReport();
					 }else{
						
						alert("Error creating item report");
					}
						 
				  }
			});
			return false;
	
	
	
	
});










$('#nameSearchReport').click(function(){
	
	
	var dataString = 'descriptionSearchOrde=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					   var Item_Id 			= data.Item_Id;
					  var Item_description 	= data.Item_description;
					  var Imagen 			= data.Imagen;
					  var Reference 		= data.Reference;
					  var Initial_Quantity 	= data.Initial_Quantity;
					  var Stock_Quantity 	= data.Stock_Quantity;
					  
					  var DateItem 			= data.DateItem;
					  var Expiration_date 	= data.Expiration_date;
					  var Price 			= data.Price;
					  var Grant_Id 			= data.Grant_Id;
					  var Vendor_Id 		= data.Vendor_Id;
					  var Category_Id 		= data.Category_Id;
					  
					  var Subcategory_id 	= data.Subcategory_id;
					  var ItemType_Id 		= data.ItemType_Id;
					  var Building 			= data.Building;
					  var Cabine 			= data.Cabine;
					  var Room 				= data.Room;
					  var Department 		= data.Department;
					  
					  var Location_Description 	= data.Location_Description;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerListReport').html("");
						
						
					
				 for (var i in Item_Id) {
					 
					 	if(Imagen[i] == ""){
							imgTodisplay = 'no_image.gif';
						}else{
							
							imgTodisplay = Imagen[i];
						}
						
						
							if(Stock_Quantity[i] == 0){
									StockDisplay = '<p class="NotAvailabe">Not available</p>';
							}else{
									StockDisplay = Stock_Quantity[i];
							}
						
						
						 
					 $('#containerListReport').append(
					 
                    	'<div class="lineContainer">'+
                            '<div class="NameColumn">'+
							'<div class="contImgItem"> <img src="images/Items/'+imgTodisplay+'"> </div>'+
							'<p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                            '<div class="EmailColumn">'+StockDisplay+'</div>'+
							'<div class="ActionColumn2">'+
								 '<a href="javascript:openModalBoxReport('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\')" ><img src="../images/report.png" title="Qrcode Items"/></a>'+
                            '</div>'+
                    	'</div>'
					 );     
					 
					 
						
                            
                     
			
                  } // End form loop
				 
				 
					  }else{
						   $('#containerListReport').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
			
			
			});
			
			
			
			
			
			
			
			
	


$('#lastSearchReport').click(function(){
	
	
	var dataString = 'ReferenceSearchOrder=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					   var Item_Id 			= data.Item_Id;
					  var Item_description 	= data.Item_description;
					  var Imagen 			= data.Imagen;
					  var Reference 		= data.Reference;
					  var Initial_Quantity 	= data.Initial_Quantity;
					  var Stock_Quantity 	= data.Stock_Quantity;
					  
					  var DateItem 			= data.DateItem;
					  var Expiration_date 	= data.Expiration_date;
					  var Price 			= data.Price;
					  var Grant_Id 			= data.Grant_Id;
					  var Vendor_Id 		= data.Vendor_Id;
					  var Category_Id 		= data.Category_Id;
					  
					  var Subcategory_id 	= data.Subcategory_id;
					  var ItemType_Id 		= data.ItemType_Id;
					  var Building 			= data.Building;
					  var Cabine 			= data.Cabine;
					  var Room 				= data.Room;
					  var Department 		= data.Department;
					  
					  var Location_Description 	= data.Location_Description;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerListReport').html("");
						
						
					
				 for (var i in Item_Id) {
					 
					 	if(Imagen[i] == ""){
							imgTodisplay = 'no_image.gif';
						}else{
							
							imgTodisplay = Imagen[i];
						}
						
						
							if(Stock_Quantity[i] == 0){
									StockDisplay = '<p class="NotAvailabe">Not available</p>';
							}else{
									StockDisplay = Stock_Quantity[i];
							}
						
						
						 
					 $('#containerListReport').append(
					 
                    	'<div class="lineContainer">'+
                            '<div class="NameColumn">'+
							'<div class="contImgItem"> <img src="images/Items/'+imgTodisplay+'"> </div>'+
							'<p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                            '<div class="EmailColumn">'+StockDisplay+'</div>'+
							'<div class="ActionColumn2">'+
								 '<a href="javascript:openModalBoxReport('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\')" ><img src="../images/report.png" title="Qrcode Items"/></a>'+
                            '</div>'+
                    	'</div>'
					 );     
					 
					 
						
                            
                     
			
                  } // End form loop
				 
				 
					  }else{
						   $('#containerListReport').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
			
			
});













$('#emailSearchReport').click(function(){
	
	
	var dataString = 'stockOrder=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					   var Item_Id 			= data.Item_Id;
					  var Item_description 	= data.Item_description;
					  var Imagen 			= data.Imagen;
					  var Reference 		= data.Reference;
					  var Initial_Quantity 	= data.Initial_Quantity;
					  var Stock_Quantity 	= data.Stock_Quantity;
					  
					  var DateItem 			= data.DateItem;
					  var Expiration_date 	= data.Expiration_date;
					  var Price 			= data.Price;
					  var Grant_Id 			= data.Grant_Id;
					  var Vendor_Id 		= data.Vendor_Id;
					  var Category_Id 		= data.Category_Id;
					  
					  var Subcategory_id 	= data.Subcategory_id;
					  var ItemType_Id 		= data.ItemType_Id;
					  var Building 			= data.Building;
					  var Cabine 			= data.Cabine;
					  var Room 				= data.Room;
					  var Department 		= data.Department;
					  
					  var Location_Description 	= data.Location_Description;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerListReport').html("");
						
						
					
				 for (var i in Item_Id) {
					 
					 	if(Imagen[i] == ""){
							imgTodisplay = 'no_image.gif';
						}else{
							
							imgTodisplay = Imagen[i];
						}
						
						
							if(Stock_Quantity[i] == 0){
									StockDisplay = '<p class="NotAvailabe">Not available</p>';
							}else{
									StockDisplay = Stock_Quantity[i];
							}
						
						
						 
					 $('#containerListReport').append(
					 
                    	'<div class="lineContainer">'+
                            '<div class="NameColumn">'+
							'<div class="contImgItem"> <img src="images/Items/'+imgTodisplay+'"> </div>'+
							'<p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                            '<div class="EmailColumn">'+StockDisplay+'</div>'+
							'<div class="ActionColumn2">'+
								 '<a href="javascript:openModalBoxReport('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\')" ><img src="../images/report.png" title="Qrcode Items"/></a>'+
                            '</div>'+
                    	'</div>'
					 );     
					 
					 
						
                            
                     
			
                  } // End form loop
				 
				 
					  }else{
						   $('#containerListReport').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
			
			
});







$('#actionSearchReport').click(function(){ 



var dataString = 'DisplayItems=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					   var Item_Id 			= data.Item_Id;
					  var Item_description 	= data.Item_description;
					  var Imagen 			= data.Imagen;
					  var Reference 		= data.Reference;
					  var Initial_Quantity 	= data.Initial_Quantity;
					  var Stock_Quantity 	= data.Stock_Quantity;
					  
					  var DateItem 			= data.DateItem;
					  var Expiration_date 	= data.Expiration_date;
					  var Price 			= data.Price;
					  var Grant_Id 			= data.Grant_Id;
					  var Vendor_Id 		= data.Vendor_Id;
					  var Category_Id 		= data.Category_Id;
					  
					  var Subcategory_id 	= data.Subcategory_id;
					  var ItemType_Id 		= data.ItemType_Id;
					  var Building 			= data.Building;
					  var Cabine 			= data.Cabine;
					  var Room 				= data.Room;
					  var Department 		= data.Department;
					  
					  var Location_Description 	= data.Location_Description;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerListReport').html("");
						
						
					
				 for (var i in Item_Id) {
					 
					 	if(Imagen[i] == ""){
							imgTodisplay = 'no_image.gif';
						}else{
							
							imgTodisplay = Imagen[i];
						}
						
						
							if(Stock_Quantity[i] == 0){
									StockDisplay = '<p class="NotAvailabe">Not available</p>';
							}else{
									StockDisplay = Stock_Quantity[i];
							}
						
						
						 
					 $('#containerListReport').append(
					 
                    	'<div class="lineContainer">'+
                            '<div class="NameColumn">'+
							'<div class="contImgItem"> <img src="images/Items/'+imgTodisplay+'"> </div>'+
							'<p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                            '<div class="EmailColumn">'+StockDisplay+'</div>'+
							'<div class="ActionColumn2">'+
								 '<a href="javascript:openModalBoxReport('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\')" ><img src="../images/report.png" title="Qrcode Items"/></a>'+
                            '</div>'+
                    	'</div>'
					 );     
					 
					 
						
                            
                     
			
                  } // End form loop
				 
				 
					  }else{
						   $('#containerListReport').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;









});



var InfoItemToReturn = function(transition_Id,Start_Date,End_Date,Item_description,Reference,Imagen,Name,Last,Email,Group_Description,Quantity){
	
	$('#modalInfoItemToReturn').show();
	$('#imgItemReturn').attr('src','images/Items/'+Imagen);
	$('#bottomImgBox').html("");
	$('#bottomImgBox').append('<p>'+Reference +'</p>');
	
	$('#nameItemReturn').html("");
	$('#nameItemReturn').append('<p>'+Name +' '+ Last+'</p>');
	
	$('#emailItemReturn').html("");
	$('#emailItemReturn').append('<p>'+Email +'</p>');
	
	
	$('#groupItemReturn').html("");
	$('#groupItemReturn').append('<p>'+Group_Description +'</p>');
	
	$('#End_DateItemReturn').html("");
	$('#End_DateItemReturn').append('<p>'+End_Date +'</p>');
	
	$('#QuantityItemReturn').html("");
	$('#QuantityItemReturn').append('<p>'+Quantity +'</p>');
	
	
	
}

var closeModalInfoItemToReturn = function(){
	$('#modalInfoItemToReturn').hide();
	
	}


