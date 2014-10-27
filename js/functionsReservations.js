
var getInfoUserOnJquery = function(User_Id,Name,Last,User_Type_Id){
	
	window.localStorage.setItem('User_Id',User_Id);
 	window.localStorage.setItem('Name',Name);
	window.localStorage.setItem('Last',Last);
 	window.localStorage.setItem('User_Type_Id',User_Type_Id);
	
}





var OpenModalInfoItem = function(imgToDisplay,Stock_Quantity){
	
	
	$('#modalInfoItemBox').css('display','-webkit-box');
	$('#modalInfoItemBox').css('display','-moz-box');
	$('#modalInfoItemBox').css('display','-ms-flexbox');
	$('#imgInfoItemModal').attr('src','images/Items/'+imgToDisplay+'');
	
	if(Stock_Quantity != 0){
		$('#msgInfoBoxItem').html('Available');
		$('#msgInfoBoxItem').css('color','green');
	}else{
		$('#msgInfoBoxItem').html('Not available');
		$('#msgInfoBoxItem').css('color','red');
	}
	
}  //  end OpenModalInfoItem


var CloseModalInfoItem = function(){
	$('#modalInfoItemBox').css('display','none');
} // end CloseModalInfoItem




$(document).ready(function(e) {
	  
	var User_Id = 	window.localStorage.getItem('User_Id');
	
			var dataString = 'User_Id='+User_Id+'&DisplayItems= true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
					   
						   if(data.Status == 'success'){
							   
							   displayItemCart(User_Id);
							   
								$('#ContainerItems').html("");
						
								// Here at this point I need to colect all data. 
								
								var Item_Id				= data.Item_Id;
								var Item_description	= data.Item_description;
								var Reference			= data.Reference;
								var Imagen				= data.Imagen;
								var Initial_Quantity	= data.Initial_Quantity;
								var Stock_Quantity		= data.Stock_Quantity;
								var Lessons_item		= data.Lessons_item;
								var DateItem			= data.DateItem;
								var Expiration_date		= data.Expiration_date;
								var Price				= data.Price;
								var Grant_Id			= data.Grant_Id;
								var Vendor_Id			= data.Vendor_Id;
								var Category_Id			= data.Category_Id;
								var Subcategory_id		= data.Subcategory_id;
								var ItemType_Id			= data.ItemType_Id;
								var Building			= data.Building;
								var Cabine				= data.Cabine;
								var Room				= data.Room;
								var Department			= data.Department;
								var Location_Description= data.Location_Description;
								var Grp					= data.Grp;
								
								var idStodk;
								var actionsTodisplay;
								var imgToDisplay;
									
							
						for (var i in Item_Id) {	
								
								if(Imagen[i] == ""){
									imgToDisplay = "no_image.gif";
								}else{
									imgToDisplay = Imagen[i];
								}
								
						
								if(Stock_Quantity[i] == 0){
									idStodk = 'Value0Stock';
							
								 $('#ContainerItems').append(
					  
                     '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem"><p id="NotAvailable">Not available</p></div>'+
										   
                                  '</div>'
								  
								  	);
								  
								  }else{
									  
									
										
								 $('#ContainerItems').append(
					   '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem">'+
										   		'<a href="javascript:OpenModalCart('+Item_Id[i]+',\''+imgToDisplay+'\',\''+Item_description[i]+'\',\''+Reference[i]+'\','+Stock_Quantity[i]+')"><img src="../images/cart.png" alt="CartImage"></a></div>'+
										   
                                  '</div>'
								  
								  	);
								  
							
								}
							
						
							
						} // End for loop
						
							reservationBoxTag();
							displayCategoriesSearchSelect();
							displayLessonsSearchSelect();
							displayMebersRelatedGroup();
							 }else{
								
								  $('#ContainerItems').html("");
								  alert("Error displaying Items")
							 }
						   
						   
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
		
	
	
	
	
	
	
	
});







	
	function onpenFormDescription(){
			
		document.getElementById("pSeachDescription").style.display = "none";
		document.getElementById("formDescription").style.display = "-webkit-box";
		document.getElementById("formDescription").style.display = "-moz-box";
		document.getElementById("formDescription").style.display = "-ms-flexbox";
		
		
		//Close other form
		
		document.getElementById("pSearchCategory").style.display = "-webkit-box";
		document.getElementById("pSearchCategory").style.display = "-moz-box";
		document.getElementById("pSearchCategory").style.display = "-ms-flexbox";
		
		document.getElementById("formCategory").style.display = "none";
		
		document.getElementById("pSearchReference").style.display = "-webkit-box";
		document.getElementById("pSearchReference").style.display = "-moz-box";
		document.getElementById("pSearchReference").style.display = "-ms-flexbox";
		
		document.getElementById("formReference").style.display = "none";
		
		document.getElementById("pSearchLesson").style.display = "-webkit-box";
		document.getElementById("pSearchLesson").style.display = "-moz-box";
		document.getElementById("pSearchLesson").style.display = "-ms-flexbox";
		document.getElementById("formLesson").style.display = "none";
		
		
	}
	
	function openFromCategory(){
		
		document.getElementById("pSearchCategory").style.display = "none";
		document.getElementById("formCategory").style.display = "-webkit-box";
		document.getElementById("formCategory").style.display = "-moz-box";
		document.getElementById("formCategory").style.display = "-ms-flexbox";
		
		
		//Close other form
		
	    document.getElementById("pSeachDescription").style.display = "-webkit-box";
		 document.getElementById("pSeachDescription").style.display = "-moz-box";
		  document.getElementById("pSeachDescription").style.display = "-ms-flexbox";
		document.getElementById("formDescription").style.display = "none";
		
		document.getElementById("pSearchReference").style.display = "-webkit-box";
		document.getElementById("pSearchReference").style.display = "-moz-box";
		document.getElementById("pSearchReference").style.display = "-ms-flexbox";
		document.getElementById("formReference").style.display = "none";
		
		document.getElementById("pSearchLesson").style.display = "-webkit-box";
		document.getElementById("pSearchLesson").style.display = "-moz-box";
		document.getElementById("pSearchLesson").style.display = "-ms-flexbox";
		document.getElementById("formLesson").style.display = "none";
		
		
		
		
		}
		
		
	function openFromReference(){
		
		document.getElementById("pSearchReference").style.display = "none";
		document.getElementById("formReference").style.display = "-webkit-box";
		document.getElementById("formReference").style.display = "-moz-box";
		document.getElementById("formReference").style.display = "-ms-flexbox";
		
		
		//Close other form
		
	    document.getElementById("pSeachDescription").style.display = "-webkit-box";
		document.getElementById("pSeachDescription").style.display = "-moz-box";
		document.getElementById("pSeachDescription").style.display = "-ms-flexbox";
		document.getElementById("formDescription").style.display = "none";
		
		document.getElementById("pSearchCategory").style.display = "-webkit-box";
		document.getElementById("pSearchCategory").style.display = "-moz-box";
		document.getElementById("pSearchCategory").style.display = "-ms-flexbox";
		document.getElementById("formCategory").style.display = "none";
		
		document.getElementById("pSearchLesson").style.display = "-webkit-box";
		document.getElementById("pSearchLesson").style.display = "-moz-box";
		document.getElementById("pSearchLesson").style.display = "-ms-flexbox";
		document.getElementById("formLesson").style.display = "none";
		
		
		
		}
		
		
	function openFromLesson(){
		
		document.getElementById("pSearchLesson").style.display = "none";
		document.getElementById("formLesson").style.display = "-webkit-box";
		document.getElementById("formLesson").style.display = "-moz-box";
		document.getElementById("formLesson").style.display = "-ms-flexbox";
		
			//Close other form
		
		document.getElementById("pSeachDescription").style.display = "-webkit-box";
		document.getElementById("pSeachDescription").style.display = "-moz-box";
		document.getElementById("pSeachDescription").style.display = "-ms-flexbox";
		document.getElementById("formDescription").style.display = "none";
		
		document.getElementById("pSearchCategory").style.display = "-webkit-box";
		document.getElementById("pSearchCategory").style.display = "-moz-box";
		document.getElementById("pSearchCategory").style.display = "-ms-flexbox";
		document.getElementById("formCategory").style.display = "none";
		
		document.getElementById("pSearchReference").style.display = "-webkit-box";
		document.getElementById("pSearchReference").style.display = "-moz-box";
		document.getElementById("pSearchReference").style.display = "-ms-flexbox";
		document.getElementById("formReference").style.display = "none";
		
		}
		
	


function OpenEmailBox(Email){
	
	document.getElementById("EmailBox").style.display = "-webkit-box";
	document.getElementById("EmailBox").style.display = "-moz-box";
	document.getElementById("EmailBox").style.display = "-ms-flexbox";
	document.getElementById("toEmailBox").value = Email;
}
                     
               
	
function closeEmailBox(){
		
		document.getElementById("EmailBox").style.display = "none";	
	}
function closeInfoUserBox(){
		
		document.getElementById("modalInfoUserBox").style.display = "none";	
	}

	
function boxContainerSearchN(){
	
	if(activeBoxContainerSearchN == true){
		document.getElementById("contFormLast").style.display = "none";
		document.getElementById("contFormDate").style.display = "none";
		document.getElementById("boxContainerSearch").style.display = "-webkit-box";
		document.getElementById("boxContainerSearch").style.display = "-moz-box";
		document.getElementById("boxContainerSearch").style.display = "-ms-flexbox";	
		document.getElementById("boxContainerSearch").style.height = "100px";
		
		setTimeout(function(){
			document.getElementById("contFormName").style.display = "-webkit-box";
			document.getElementById("contFormName").style.display = "-moz-box";
			document.getElementById("contFormName").style.display = "-ms-flexbox";
			},1000);
		activeBoxContainerSearchN = false;
	}else{
		
		activeBoxContainerSearchN =true;
		document.getElementById("contFormName").style.display = "none";
		document.getElementById("contFormLast").style.display = "none";
		document.getElementById("contFormDate").style.display = "none";
		document.getElementById("boxContainerSearch").style.height = "0px";
		
		setTimeout(function(){
			
			document.getElementById("boxContainerSearch").style.display = "none";
		
		
		}, 500);
		
		}
}

function boxContainerSearchL(){
	
	if(activeBoxContainerSearchL == true){
		document.getElementById("contFormName").style.display = "none";
		document.getElementById("contFormDate").style.display = "none";
		
		document.getElementById("boxContainerSearch").style.display = "-webkit-box";
		document.getElementById("boxContainerSearch").style.height = "100px";
		setTimeout(function(){
			document.getElementById("contFormLast").style.display = "-webkit-box";
			document.getElementById("contFormLast").style.display = "-moz-box";
			document.getElementById("contFormLast").style.display = "-ms-flexbox";
			}, 1000);
	
		activeBoxContainerSearchL = false;
	}else{
		
		activeBoxContainerSearchL =true;
		document.getElementById("boxContainerSearch").style.height = "0px";
		document.getElementById("contFormName").style.display = "none";
		document.getElementById("contFormLast").style.display = "none";
		document.getElementById("contFormDate").style.display = "none";
		setTimeout(function(){document.getElementById("boxContainerSearch").style.display = "none;"}, 500);
		
		}
	
	
	
}
	
	
	
function boxContainerSearchD(){
	
	if(activeBoxContainerSearchD == true){
		
		document.getElementById("contFormName").style.display = "none";
		document.getElementById("contFormLast").style.display = "none";
		document.getElementById("contFormDate").style.display = "-webkit-box";
		document.getElementById("contFormDate").style.display = "-moz-box";
		document.getElementById("contFormDate").style.display = "-ms-flexbox";
		
		document.getElementById("boxContainerSearch").style.display = "-webkit-box";
		document.getElementById("boxContainerSearch").style.display = "-moz-box";
		document.getElementById("boxContainerSearch").style.display = "-ms-flexbox";
		document.getElementById("boxContainerSearch").style.height = "130px";
		activeBoxContainerSearchD = false;
	}else{
		
		activeBoxContainerSearchD =true;
		document.getElementById("contFormName").style.display = "none";
		document.getElementById("contFormLast").style.display = "none";
		document.getElementById("contFormDate").style.display = "none";
		
		document.getElementById("boxContainerSearch").style.height = "0px";
		setTime(function(){document.getElementById("boxContainerSearch").style.display = "none";}, 500);
		
		}
	
	
	
}


function boxContainerSearchS(){
	
	if(activeBoxContainerSearchS == true){
		document.getElementById("boxContainerSearch").style.display = "-webkit-box";
		document.getElementById("boxContainerSearch").style.display = "-moz-box";
		document.getElementById("boxContainerSearch").style.display = "-ms-flexbox";
		document.getElementById("boxContainerSearch").style.height = "150px";
		activeBoxContainerSearchS = false;
	}else{
		
		activeBoxContainerSearchS =true;
		document.getElementById("boxContainerSearch").style.height = "0px";
		setTime(function(){document.getElementById("boxContainerSearch").style.display = "none";}, 500);
		
		}
	
	
	
}


function searchByInsideStudio(){
	
		location.href = "Studio.php?insideStudio";
}

function closeDay(){
	location.href = "PHP/funcionsPHP.php?closeDay";
}




function openBoxConfirmation(){
		
		document.getElementById("modalStuffConfirmationBox").style.display = "-webkit-box";
		document.getElementById("modalStuffConfirmationBox").style.display = "-moz-box";
		document.getElementById("modalStuffConfirmationBox").style.display = "-ms-flexbox";
	}	


function openBoxDeclinedByStuff(){
		
		document.getElementById("modalStuffDeclinedBox").style.display = "-webkit-box";
		document.getElementById("modalStuffDeclinedBox").style.display = "-moz-box";
		document.getElementById("modalStuffDeclinedBox").style.display = "-ms-flexbox";
	}	


function openSearchByName(){
	
		if(openBoxSearchByName == true){
			document.getElementById("templeIdFormReport").style.display = "none"
			document.getElementById("containerFormSearch").style.border = "1px inset #F7f7f7"
			document.getElementById("containerFormSearch").style.height = "40px";
			setTimeout(function(){document.getElementById("nameFormReport").style.display = "block"},1000); 
			openBoxSearchByName = false;
		}else{
			
			document.getElementById("containerFormSearch").style.height = "0px";
			document.getElementById("templeIdFormReport").style.display = "none"
			document.getElementById("nameFormReport").style.display = "none"
			setTimeout(function(){document.getElementById("containerFormSearch").style.border = "1px solid #F7f7f7"},1000); 
			openBoxSearchByName = true;
			}
}


function openSearchByTempleId(){
	
		if(openBoxSearchByTemple == true){
			templeIdFormReport
			document.getElementById("nameFormReport").style.display = "none"
			document.getElementById("containerFormSearch").style.border = "1px inset #F7f7f7"
			document.getElementById("containerFormSearch").style.height = "40px";
			setTimeout(function(){document.getElementById("templeIdFormReport").style.display = "block"},1000); 
			openBoxSearchByTemple = false;
		}else{
			
			document.getElementById("containerFormSearch").style.height = "0px";
			
			document.getElementById("templeIdFormReport").style.display = "none"
			document.getElementById("nameFormReport").style.display = "none"
			
			setTimeout(function(){document.getElementById("templeIdFormReport").style.border = "1px solid #F7f7f7"},1000); 
			openBoxSearchByTemple = true;
			}
}





		function sentEmailAjax() {
								
								//	var url = "../PHP/funcionsPHP.php"; // the script where you handle the form input.
									
			var toEmailBox = document.getElementById("toEmailBox").value;
			var SubjectEmail = document.getElementById("SubjectEmail").value;
			var bodyBoxEmail = document.getElementById("textAreaEmailBox").value;
			var dataString = 'toEmailBox='+ toEmailBox + '&SubjectEmail=' + SubjectEmail +'&bodyBoxEmail=' + bodyBoxEmail +'&buttonEmailbox=true';
		    
			closeEmailBox();
						
				$.ajax({
					  type: "POST",
					  url: "../PHP/FunctionCart.php",
					  data: dataString,
					  dataType:"Json",
					  success: function(data){
									if(data.Status == 'success'){
										alert("Email sent");
										document.getElementById("toEmailBox").value = "";
										document.getElementById("SubjectEmail").value = "";
										document.getElementById("textAreaEmailBox").value = "";
									}else{
										alert("Error sending email");
										}
									
									
								}
							
					});
								
									return false; // avoid to execute the actual submit of the form.
								
		}


              

 function OpenModalInfoUserBox(Name,Last,Email,TempleId,ImageUser,Phone,Addres1,Addres2,City,State,Zip,HPhone,WPhone,Website,UserRole){
				
						
						document.getElementById("modalInfoUserBox").style.display = "-webkit-box";
						document.getElementById("modalInfoUserBox").style.display = "-moz-box";
						document.getElementById("modalInfoUserBox").style.display = "-ms-flexbox";
						
						document.getElementById("imgInfoUser").src = 'images/Users/'+ImageUser;
						
						document.getElementById("NameUser").innerHTML = Name + ' ' + Last;
						document.getElementById("AddresUser").innerHTML = Addres1;
						document.getElementById("CityUser").innerHTML = City;
						document.getElementById("StateUser").innerHTML = State;
						document.getElementById("emailUser").innerHTML = Email;	
						document.getElementById("PhoneUser").innerHTML = Phone;
						
						if(UserRole == 1){
						document.getElementById("UserType").innerHTML = 'Student';	
						}else if(UserRole == 2){
						document.getElementById("UserType").innerHTML = 'Staff';	
						}else if(UserRole == 3){
						document.getElementById("UserType").innerHTML = 'Instructor';	
						}else if(UserRole == 4){
						document.getElementById("UserType").innerHTML = 'Faculty';	
						}else{
						document.getElementById("UserType").innerHTML = 'Administrator';	
						}
						
					
					}	
     
	 
function OpenModalConfirm(){

        $('#UserIdLabel').val(window.localStorage.getItem('User_Id'));
		
		var groupId = $('#selectGroup').val(); 
		$('#groupIdLabel').val(groupId);       
		$('#modalConfirmBox').css('display','-webkit-box');
		$('#modalConfirmBox').css('display','-moz-box');
		$('#modalConfirmBox').css('display','-ms-flexbox');
             
	}
							
     function CloseModalConfirm(){
		  document.getElementById("modalConfirmBox").style.display = "none";
			}
			
			         
               	
					
					
					
			
			function OpenModalCart(ItemID,ImageItem,Description,Ref,Stock){
				
				
					var User_Id = 	window.localStorage.getItem('User_Id');
					$('#userIdCart').val(User_Id);
				
				 	document.getElementById("modalCartBox").style.display = "-webkit-box";
					document.getElementById("modalCartBox").style.display = "-moz-box";
					document.getElementById("modalCartBox").style.display = "-ms-flexbox";
					
					
					document.getElementById("imgModalCart").src = 'images/Items/'+ImageItem;
					document.getElementById("descriptionModalCart").innerHTML = Description;
					document.getElementById("referenceModalCart").innerHTML = Ref;
					
			
					document.getElementById("QuantityCartModal").max = Stock;
					document.getElementById("StockBeforeUpdate").value = Stock;
					document.getElementById("ItemIdCart").value = ItemID;
				
					
					if(Stock > 0){
						document.getElementById("Available").innerHTML = 'Yes'; 
						document.getElementById("Available").style.color = 'green';
					}else{
						document.getElementById("Available").innerHTML = 'No'; 
						document.getElementById("Available").style.color = 'red';
					}
					
				
					
					
							
		} // End functions modal cart
				
		function CloseModalCart(){
				document.getElementById("modalCartBox").style.display = "none";
		}
		
		
		
		
	$( "#buttonSetCart" ).click(function() {
	 
	 var Quantity = document.getElementById("QuantityCartModal").value;
	 var NumbersDays  = document.getElementById("NumbersDays").value;
	 var StockBeforeUpdate  = document.getElementById("StockBeforeUpdate").value;
	 
	 var ItemIdCart  = document.getElementById("ItemIdCart").value;
	 var userIdCart  = document.getElementById("userIdCart").value;
	 
	 var User_Id = window.localStorage.getItem('User_Id');


	CloseModalCart();
	
			var dataString = 'Quantity='+ Quantity + '&NumbersDays=' + NumbersDays + '&StockBeforeUpdate='+ StockBeforeUpdate + '&ItemIdCart='+ ItemIdCart + '&userIdCart='+ userIdCart + '&buttonSentCart=true';
			
			
			//alert(dataString);
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					 
					  if (data.Status == 'success'){
						  
						  displayItemsfunction();
						  document.getElementById('containerCart').innerHTML = "";
						  document.getElementById('containerItemModal').innerHTML = "";
						  
					  var Cart_Id = data.Cart_Id;
					  var Item_Id = data.Item_Id;
					  var Quantity = data.Quantity;
					  var Days = data.Days;
					  var Cart_Status_Id = data.Cart_Status_Id;
					  var Description = data.Description;
					  var ImageItem = data.ImageItem;
					  var Reference = data.Reference;
					
			
				
				  
				  for (var i in Item_Id) {
					  
					  
                      $('#containerCart').append(
					  '<div class="lineContainerCart">'+
						 '<div class="DescriptionCart">'+
                            
                            	'<div class="desItem">'+
                                	'<img src="images/Items/'+ImageItem[i]+'" alt="Img_Items">'+ 
                                '</div>'+
                                '<p>'+ Description[i]+'</p>'+
                            '</div>'+
                            
                            '<div class="ReferenceCart">'+
                            	 '<p> '+ Reference[i] +'</p>'+
                            '</div>'+
                            '<div class="ActionCart">'+
                            	 '<a href="javascript:deleteItemCart('+Cart_Id[i]+','+User_Id+')"><img src="../images/Delete.png" alt="deleteIcon"></a>'+
                            '</div>'+
					  
					  '</div> '
					  );
					  
					  
					    $('#containerItemModal').append(
					  
                                '<div class="linesModalConfirm">'+
                                   '<div class="DescriptionModalDiv">'+
                                    '<div class="desItem">'+
                                        '<img src="images/Items/'+ImageItem[i]+'" alt="Item Image">'+
                                      '</div>'+ 
                                        '<p class="pItemModal">'+ Description[i]+'</p>'+
                                      '</div>'+
                                    '<div class="ReferenceModalDiv"> '+ Reference[i] +'</div>'+
                                    '<div class="QuantityModalDiv">'+ Quantity[i] +'</div>'+
                                   '<div class="DaysModalDiv">'+ Days[i] +'</div>'+
                                '</div>'
					  
					  );
					  
					  
                  } // End for loop
				 
				 
					  }else{
						  
						  alert('Error to add item to cart');
						  
						  }
					
				  }
			});
			return false;
	
	});
	
	
	
	// This functions is to delete items form cart
	
	
	
function deleteItemCart(CartId,User_Id) {
	 
	
			var dataString = 'CartId='+ CartId + '&User_Id=' + User_Id +'&DeleteItemCart=true';
			
			
			//alert(dataString);
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					 
					  if (data.Status == 'success'){
						  
						  document.getElementById('containerCart').innerHTML = "";
						  document.getElementById('containerItemModal').innerHTML = "";
						
						  
					  var Cart_Id = data.Cart_Id;
					  var Item_Id = data.Item_Id;
					  var Quantity = data.Quantity;
					  var Days = data.Days;
					  var Cart_Status_Id = data.Cart_Status_Id;
					  var Description = data.Description;
					  var ImageItem = data.ImageItem;
					  var Reference = data.Reference;
					
			
				
				  
				  for (var i in Item_Id) {
					  
                      $('#containerCart').append(
					  '<div class="lineContainerCart">'+
						 '<div class="DescriptionCart">'+
                            
                            	'<div class="desItem">'+
                                	'<img src="images/Items/'+ImageItem[i]+'" alt="Img_Items">'+ 
                                '</div>'+
                                '<p>'+ Description[i]+'</p>'+
                            '</div>'+
                            
                            '<div class="ReferenceCart">'+
                            	 '<p> '+ Reference[i] +'</p>'+
                            '</div>'+
                            '<div class="ActionCart">'+
                            	 '<a href="javascript:deleteItemCart('+Cart_Id[i]+','+User_Id+')"><img src="../images/Delete.png" alt="deleteIcon"></a>'+
                            '</div>'+
					  
					  '</div> '
					  );
					  
					  
					    $('#containerItemModal').append(
					  
                                '<div class="linesModalConfirm">'+
                                   '<div class="DescriptionModalDiv">'+
                                    '<div class="desItem">'+
                                        '<img src="images/Items/'+ImageItem[i]+'" alt="Item Image">'+
                                      '</div>'+ 
                                        '<p class="pItemModal">'+ Description[i]+'</p>'+
                                      '</div>'+
                                    '<div class="ReferenceModalDiv"> '+ Reference[i] +'</div>'+
                                    '<div class="QuantityModalDiv">'+ Quantity[i] +'</div>'+
                                   '<div class="DaysModalDiv">'+ Days[i] +'</div>'+
                                '</div>'
					  
					  );
					  
					  
                  } // End foor loop
				 
				 	  displayItemsfunction();
				 
				 
					  }else{
						  
						  alert('Error to add item to cart');
						  
						  }
					
				  }
			});
			e.preventDefault(); // avoid to execute the actual submit of the form.
	
	}







	// This functions is to delete items form cart
	
	
	function displayItemCart(User_Id) {
	 
	
			var dataString = 'User_Id=' + User_Id +'&DisplayItemCart=true';
			
			
			//alert(dataString);
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					 
					  if (data.Status == 'success'){
						  
						  document.getElementById('containerCart').innerHTML = "";
						  document.getElementById('containerItemModal').innerHTML = "";
						  
					  var Cart_Id = data.Cart_Id;
					  var Item_Id = data.Item_Id;
					  var Quantity = data.Quantity;
					  var Days = data.Days;
					  var Cart_Status_Id = data.Cart_Status_Id;
					  var Description = data.Description;
					  var ImageItem = data.ImageItem;
					  var Reference = data.Reference;
					
			
				
				  
				  for (var i in Item_Id) {
                      $('#containerCart').append(
					  '<div class="lineContainerCart">'+
						 '<div class="DescriptionCart">'+
                            
                            	'<div class="desItem">'+
                                	'<img src="images/Items/'+ImageItem[i]+'" alt="Img_Items">'+ 
                                '</div>'+
                                '<p>'+ Description[i]+'</p>'+
                            '</div>'+
                            
                            '<div class="ReferenceCart">'+
                            	 '<p> '+ Reference[i] +'</p>'+
                            '</div>'+
                            '<div class="ActionCart">'+
                            	 '<a href="javascript:deleteItemCart('+Cart_Id[i]+','+User_Id+')"><img src="../images/Delete.png" alt="deleteIcon"></a>'+
                            '</div>'+
					  
					  '</div> '
					  );
					  
					   $('#containerItemModal').append(
					  
                                '<div class="linesModalConfirm">'+
                                   '<div class="DescriptionModalDiv">'+
                                    '<div class="desItem">'+
                                        '<img src="images/Items/'+ImageItem[i]+'" alt="Item Image">'+
                                      '</div>'+ 
                                        '<p class="pItemModal">'+ Description[i]+'</p>'+
                                      '</div>'+
                                    '<div class="ReferenceModalDiv"> '+ Reference[i] +'</div>'+
                                    '<div class="QuantityModalDiv">'+ Quantity[i] +'</div>'+
                                   '<div class="DaysModalDiv">'+ Days[i] +'</div>'+
                                '</div>'
					  
					  );
					  
					  
					  
					  
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error to add item to cart');
						  
						  }
					
				  }
			});
			return false;
	
	}
	
	
	
	
		function sentInstructorRequest() {
						
								//	var url = "../PHP/funcionsPHP.php"; // the script where you handle the form input.
									
			var textAreaInsturctore = $('#textAreaInsturctore').val();
						
				if(textAreaInsturctore == null || textAreaInsturctore == ""){
					
					alert("Please complete the messsage");
					$('#textAreaInsturctore').focus();
				
				} else{
				
					
						var UserIdLabel 		= $('#UserIdLabel').val(); 
						var groupIdLabel 		= $('#groupIdLabel').val();
						var NameUser 			= window.localStorage.getItem('Name');
				
						
						var dataString = 'textAreaInsturctore='+ textAreaInsturctore + '&UserIdLabel=' + UserIdLabel +'&groupIdLabel=' + groupIdLabel +'&NameUser=' + NameUser +'&buttonConfirmModal=' +'true';
						
						//alert(NameUser);
					
				
							
							
							// This reset the container Cart
							$('#containerCart').html("");
						
									
								$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
						   if(data.Status == 'success'){
							   CloseModalConfirm();
							   alert('Request to Instructor Success');
							   
							 }else{
								
								  alert('Request to Instructor Fail');
							 }
						   
						   
							
				  	}
				});
								
						return false; // avoid to execute the actual submit of the form.
					
				} // End else condition
			} // end functiin
					




	function OpenModalReviewCart(DateAndTime,GroupID){
		
		
		
			var dataString = 'DateAndTime='+ DateAndTime + '&GroupID=' + GroupID +'&buttonReviewCartModal= true';
					
					// This reset the container Cart
				
						
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
						   if(data.Status == 'success'){
						
						
								// Here at this point I need to colect all data. 
								
								var Status			= data.Status;
								var Cart_Id			= data.Cart_Id;
								var GroupId			= data.GroupId;
								var Item_Id			= data.Item_Id;
								var Quantity		= data.Quantity;
								var Days			= data.Days;
								var Cart_Status_Id	= data.Cart_Status_Id;
								var DateCart		= data.DateCart;
								var MaxStock		= data.MaxStock;
								var Description		= data.Description;
								var ImageItem		= data.ImageItem;
								var Reference		= data.Reference;
								var NameUser		= data.NameUser;
								var LastUser		= data.LastUser;
						
						
									
								
									document.getElementById("containerReviewCart").innerHTML="";
				
							
							document.getElementById("modalReviewCart").style.display = "-webkit-box";
							document.getElementById("modalReviewCart").style.display = "-moz-box";
							document.getElementById("modalReviewCart").style.display = "-ms-flexbox";
							
							
						for (var i in Reference) {	
						
								NameUser		= data.NameUser[i];
								LastUser		= data.LastUser[i];
								ImageItem2		= data.ImageItem[i];
							
							   $('#containerReviewCart').append(
					  
                               
                           
                      '<div id="line2RequestCart">'+
                            '<div id="divDescriptionReview">'+
									 '<div id="BoxImg">'+
                                    	'<img src="images/Items/'+ ImageItem[i] +'" alt="item img">'+
									 '</div>'+
									 '<div>'+
									 	 '<p>'+ Description[i] +'</p>'+
									 '</div>'+
                            '</div>'+
                                  '<div id="divQuantityReview">'+
                                    	'<p>'+ Quantity[i] +'</p>'+
                                    '</div>'+
                                    '<div id="divDaysReview">'+
                                    	'<p>'+ Days[i] +' Days</p>'+
                                    '</div>'+
                                 '<div id="divActionsReview">'+
								 
                   '<a href="javascript:OpenModalEditCartBox(\'' + ImageItem[i] + '\', '+ Quantity[i] +','+ Days[i] +','+ Cart_Id[i] +','+ MaxStock[i] +',\'' + Description[i] + '\')"><img src="../images/edit.png" alt="editIcon" /></a>'+
                   '<a href="javascript:DeleteModalReviewCart('+ GroupId[i] +','+ Cart_Id[i] +')"><img src="../images/Delete.png" alt="deleteIcon" /></a>'+
                                    '</div>'+
                       
                                '</div>' 
						
						  );
							
						} // End for loop
						
								document.getElementById("pRequest2").innerHTML = NameUser + LastUser;
							   
							 }else{
								
								  alert('Fail');
							 }
						   
						   
							
				  	}
				});
								
						e.preventDefault(); // avoid to execute the actual submit of the form.
		
		
		
	}
	
	
	
	function CloseModalReviewCart(){
		document.getElementById("modalReviewCart").style.display = "none";
		}




		
		

 
	function DeleteModalReviewCart(GroupID,CartID){
		

		//	var DateAndTime = document.getElementById('DataaT').innerHTML;
			
			var dataString = 'GroupID=' + GroupID +'&CartID=' + CartID +'&buttonDeleteCartModal=true';
					
					// This reset the container Cart
					
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
						   if(data.Status == 'success'){
							   OpenModalReviewCart(data.DateAndTime,data.GroupID);
							 }else if(data.Status == 'closeBox'){
									 CloseModalReviewCart();
									  displayAcceptedByInstructor();
							}else{
							 	OpenModalReviewCart(data.DateAndTime,data.GroupID);
							 	alert("Error Deleting item, try again.");
							 }
						   
						   
							
				  	}
				});
								
						e.preventDefault(); // avoid to execute the actual submit of the form.
		
		
		
	}
	
	
	
	
	
function OpenModalEditCartBox(Imagen,Quantity,Days,Cart_Id,MaxStock,Description){
	
		document.getElementById("modalReviewCart").style.display = "none";
		
		document.getElementById("modalEditCartBox").style.display = "-webkit-box";
		document.getElementById("modalEditCartBox").style.display = "-moz-box";
		document.getElementById("modalEditCartBox").style.display = "-ms-flexbox";
		
		document.getElementById("ItemDescription").innerHTML = Description;
		document.getElementById("quantityEditCart").value = Quantity;
		document.getElementById("quantityEditCart").max = MaxStock;
		document.getElementById("DaysEditCart").value = Days;
		document.getElementById("CartIdUpdateInstructor").value = Cart_Id;
		document.getElementById("imgEditCartInstructor").src = 'images/Items/' +Imagen;
	
		
	}	
	
	
	
function CloseModalEditCartBox(){
		document.getElementById("modalEditCartBox").style.display = "none";
	
		
		document.getElementById("modalReviewCart").style.display = "-webkit-box";
		document.getElementById("modalReviewCart").style.display = "-moz-box";
		document.getElementById("modalReviewCart").style.display = "-ms-flexbox";
	
	}	
	
	
	
	

 
	function UpdateReviewCart(){
		
		
		var quantity 	= document.getElementById("quantityEditCart").value;
		var Days	 	= document.getElementById("DaysEditCart").value;
		var CartID 		= document.getElementById("CartIdUpdateInstructor").value;
		
		

		//	var DateAndTime = document.getElementById('DataaT').innerHTML;
			
var dataString = 'quantity=' + quantity +'&CartID=' + CartID +'&Days=' + Days +'&butonEditCartInstructor=true';
					
		
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  	if(data.Status == 'success'){
							
							   var DateAndTime = data.DateM;
							   var GroupID = data.GroupId;
						 
							   CloseModalEditCartBox();
							   OpenModalReviewCart(DateAndTime,GroupID);
							
							 }
									 
							else{
								//alert("Error Updating item, try again.");
								CloseModalEditCartBox();
								//OpenModalReviewCart(DateAndTime,GroupID);
								
							 }
						   
						 
							
				  	}
				});
								
						return false; // avoid to execute the actual submit of the form.
		
		
		
	}
	
	
	
	
	
	
	
	
function OpenModalAcceptCart(DateAndTime,GroupId){

		document.getElementById("modalAcceptBox").style.display = "-webkit-box";
		document.getElementById("modalAcceptBox").style.display = "-moz-box";
		document.getElementById("modalAcceptBox").style.display = "-ms-flexbox";
		
		
		var dataString = 'DateAndTime=' + DateAndTime +'&GroupId=' + GroupId +'&displayBoxInstructor=true';
				
		
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  document.getElementById("containerAccept").innerHTML = "";
					  
					  if(data.Status == 'success'){
						
						 
						 var Cart_Id = data.Cart_Id;
						 var DateA = data.DateA;
						 var User_IdA = data.User_Id;
						 var Item_Id = data.Item_Id;
						 var GroupId = data.GroupId;
						 var Quantity = data.Quantity;
						 var Days = data.Days;
						 var Description = data.Description;
						 var Reference = data.Reference;
						 var Imagen = data.Imagen;
						 var numRows = data.rows;
						 var GroupIdA = 0;
						 var UserId; 
						 var DateIA;
				
						for (var i in Reference) {	
							UserId	 = User_IdA[i];
							GroupIdA = GroupId[i];
							DateIA = DateA[i];
						
							
						     $('#containerAccept').append(
			
								'<div class="lineContainerAccept">'+
								
									'<div class="DivDescriptionModalAccept">'+
									 '<div class="desItem">'+
										'<img src="images/Items/'+Imagen[i] +'" alt="Item Img">'+
									  '</div>'+
										'<p>'+ Description[i] +'</p>'+
									'</div>'+
									
									'<div class="DivReferenceModalAccept">'+
										'<p>'+ Reference[i] +'</p>'+
									'</div>'+
									
									'<div class="DivQuantityModalAccept">'+
										'<p>'+ Quantity[i] + '</p>'+
									'</div>'+
									
									'<div class="DivDaysModalAccept">'+
										 '<p> '+ Days[i] + ' Days</p>'+
									'</div>'+
									
								'</div>'
						  ); // End append 
						  	  
						} // end For Loop
						  
						 
					     $("#GroupIDAccepted").val(GroupIdA);
						 $("#User_IdAccepted").val(UserId);
						 $("#dateAccepted").val(DateIA);
					
					   }else{
							 
							 alert('Error to Accept the cart');
							 CloseModalAcceptCart()
							 
						}
							
							
							
							
				  	}
				});
								
						e.preventDefault(); // avoid to execute the actual submit of the form.
		
			
		
	}
	
	
	
	 function CloseModalAcceptCart(){
		 document.getElementById("modalAcceptBox").style.display = "none";
		 
		}
		

	

$("#TagInsert").click(function(){
	
	
    var User_Id = 	window.localStorage.getItem('User_Id');
	var dataString = 'User_Id=' + User_Id +'&displayReservationInstructor=true';
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
				
					if(data.Status == 'success'){
						document.getElementById("ContainerRequestLine").innerHTML = "";
						var Cart_Id		= data.Cart_Id;
						var Item_Id 	= data.Item_Id;
						var User_Id 	= data.User_Id;
						var GroupId 	= data.GroupId;
						var Quantity 	= data.Quantity;
						var Days 	 	= data.Days;
						var DateI 	 	= data.DateA;
						var GroupName 	= data.GroupName;
				 		var Email 	 	= data.Email;
						
							
				  
						  
						for (var i in Item_Id) {	
						
					
						     $('#ContainerRequestLine').append(
							 
		'<div class="lineGroupRequest">'+
           '<div class="GroupRequestName"><a class="aGroup" href="javascript:OpenModalReviewCart(\'' + DateI[i] + '\', '+ GroupId[i] +')">'+ GroupName[i] +'</a>'+				        '</div>'+
        '<div class="GroupRequestDate"><a class="aDate" href="javascript:OpenModalReviewCart(\'' + DateI[i] + '\', '+ GroupId[i] +')" >'+
			'<p id="DataaT">'+ DateI[i] +'</p></a></div>'+
          '<div class="GroupRequestAction">'+
               '<a href="javascript:OpenModalAcceptCart(\'' + DateI[i] + '\', '+ GroupId[i] +')" class="aAccept">'+
			   '<img src="../images/Accept.png" alt="Accept logo"/></a>  |'+ 
            '<a href="javascript:OpenModalDeclineCart(\'' + DateI[i] + '\', '+ GroupId[i] +',\'' + Email[i] + '\')" class="aDecline"><img src="../images/Decline.png" alt="Decline logo"/> </a></div>'+
                           
              '</div>'
							 
							 
							 
			
						 	 ); // End append 
						  
						} // End foor loop
						
						
					}else{
						document.getElementById("ContainerRequestLine").innerHTML = "";
						$('#ContainerRequestLine').append(
						
								 '<div id="containerNoRequest">'+
									'<h1 class="reservationTitle2">No requests at this moment</h1>'+
								  '</div>'
					    ); // End append 		 
						
						
						}
			
						
				  } // End function(data) . 
				});
								
						return false; // avoid to execute the actual submit of the form.
		
			
		


});


function displayAcceptedByInstructor(){
		
		
    var User_Id = 	window.localStorage.getItem('User_Id');
	var dataString = 'User_Id=' + User_Id +'&displayReservationInstructor=true';
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
				
					if(data.Status == 'success'){
						document.getElementById("ContainerRequestLine").innerHTML = "";
						var Cart_Id		= data.Cart_Id;
						var Item_Id 	= data.Item_Id;
						var User_Id 	= data.User_Id;
						var GroupId 	= data.GroupId;
						var Quantity 	= data.Quantity;
						var Days 	 	= data.Days;
						var DateI 	 	= data.DateA;
						var GroupName 	= data.GroupName;
				 		var Email 	 	= data.Email;
						
							
				  
						  
						for (var i in Item_Id) {	
						
					
						     $('#ContainerRequestLine').append(
							 
		'<div class="lineGroupRequest">'+
           '<div class="GroupRequestName"><a class="aGroup" href="javascript:OpenModalReviewCart(\'' + DateI[i] + '\', '+ GroupId[i] +')">'+ GroupName[i] +'</a>'+				        '</div>'+
        '<div class="GroupRequestDate"><a class="aDate" href="javascript:OpenModalReviewCart(\'' + DateI[i] + '\', '+ GroupId[i] +')" >'+
			'<p id="DataaT">'+ DateI[i] +'</p></a></div>'+
          '<div class="GroupRequestAction">'+
               '<a href="javascript:OpenModalAcceptCart(\'' + DateI[i] + '\', '+ GroupId[i] +')" class="aAccept">'+
			   '<img src="../images/Accept.png" alt="Accept logo"/></a>  |'+ 
            '<a href="javascript:OpenModalDeclineCart(\'' + DateI[i] + '\', '+ GroupId[i] +',\'' + Email[i] + '\')" class="aDecline"><img src="../images/Decline.png" alt="Decline logo"/> </a></div>'+
                           
              '</div>'
							 
							 
							 
			
						 	 ); // End append 
						  
						} // End foor loop
						
						
					}else{
						document.getElementById("ContainerRequestLine").innerHTML = "";
						$('#ContainerRequestLine').append(
						
								 '<div id="containerNoRequest">'+
									'<h1 class="reservationTitle2">No requests at this moment</h1>'+
								  '</div>'
					    ); // End append 		 
						
						
						}
			
						
				  } // End function(data) . 
				});
								
						return false; // avoid to execute the actual submit of the form.
		
			
		
		
		} // end function display user request
		
		
		
$("#ReservationAccepted").click(function(){
			
			
			var DateA 		=  $("#dateAccepted").val();
			var GroupID 	=  $("#GroupIDAccepted").val();
			var UserId		=  $("#User_IdAccepted").val();
			// var startPickUp	=  $("#startPickUp").val(); // I delete this option to the instructor
			
			var dataString = 'GroupID=' + GroupID +'&DateA=' + DateA +'&UserId=' + UserId +'&AcceptReservation=true';
			
			
						$.ajax({
							
							  type: "POST",
							  url: "../PHP/FunctionCart.php",
							  data: dataString,
							  dataType:"Json",
							  success: function(data) {
								  
								  if(data.Status == 'success'){
									     CloseModalAcceptCart();
										 displayAcceptedByInstructor();
										 
									}else if(data.Status == 'NoRows'){
										 alert('No rows Afected');
										 CloseModalAcceptCart();
										 displayAcceptedByInstructor();
										 
									}else{
										 alert('Error to Accept this Reservation, try again');
										 CloseModalAcceptCart();
										 displayAcceptedByInstructor();
									}
									
								}
						
						 });
								
						e.preventDefault(); // avoid to execute the actual submit of the form.
				
				
		
			
	});
			
			
	
	
function OpenModalDeclineCart(DateD,GroupID,Email){
	
		$("#declineDate").val(DateD);
		$("#groupID").val(GroupID);
		$("#EmailWhoRequest").val(Email);
		
		$("#modalDeclineBox").show();
		
	}
	
	
	function CloseModalDeclineCart(){
	
		$("#modalDeclineBox").hide();
	}
	


$("#declineButton").click(function(){
	
	
	
		var DateD 	= $("#declineDate").val();
		var GroupID = $("#groupID").val();
		var Email 	= $("#EmailWhoRequest").val();
		var Message 	= $("#declinedMessage").val();
		
	
		var dataString = 'GroupID=' + GroupID +'&DateD=' + DateD +'&Email=' + Email +'&Message=' + Message +'&declineButton=true';
			
	
		if( (Message == null) || (Message == "")){
			alert("Must Complete decline message");
			$("#declinedMessage").focus();
		}else{
			
			
			
						$.ajax({
							
							  type: "POST",
							  url: "../PHP/FunctionCart.php",
							  data: dataString,
							  dataType:"Json",
							  success: function(data) {
								  
								  if(data.Status == 'success'){
									
									  CloseModalDeclineCart();
									  displayAcceptedByInstructor();
									}else if(data.Status == 'NoRows'){
										 alert('No rows Afected, try again');
										 CloseModalDeclineCart();
										 displayAcceptedByInstructor();
									}else{
										 alert('Error to declain this Reservation, try again');
										CloseModalDeclineCart();
										displayAcceptedByInstructor();
									}
									
									
								}
						
						 });
								
						return false; // avoid to execute the actual submit of the form.
			
			
			
			
		}
	
	
});




var displayItemsfunction = function(){
 
	var User_Id = 	window.localStorage.getItem('User_Id');
	
			var dataString = 'User_Id='+User_Id+'&DisplayItems= true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
					   
						   if(data.Status == 'success'){
							   
							   displayItemCart(User_Id);
							   
								$('#ContainerItems').html("");
						
								// Here at this point I need to colect all data. 
								
								var Item_Id				= data.Item_Id;
								var Item_description	= data.Item_description;
								var Reference			= data.Reference;
								var Imagen				= data.Imagen;
								var Initial_Quantity	= data.Initial_Quantity;
								var Stock_Quantity		= data.Stock_Quantity;
								var Lessons_item		= data.Lessons_item;
								var DateItem			= data.DateItem;
								var Expiration_date		= data.Expiration_date;
								var Price				= data.Price;
								var Grant_Id			= data.Grant_Id;
								var Vendor_Id			= data.Vendor_Id;
								var Category_Id			= data.Category_Id;
								var Subcategory_id		= data.Subcategory_id;
								var ItemType_Id			= data.ItemType_Id;
								var Building			= data.Building;
								var Cabine				= data.Cabine;
								var Room				= data.Room;
								var Department			= data.Department;
								var Location_Description= data.Location_Description;
								var Grp					= data.Grp;
								
								var idStodk;
								var actionsTodisplay;
								var imgToDisplay;
									
							
						for (var i in Item_Id) {	
						
							if(Imagen[i] == ""){
									imgToDisplay = "no_image.gif";
								}else{
									imgToDisplay = Imagen[i];
								}
						
								if(Stock_Quantity[i] == 0){
									idStodk = 'Value0Stock';
							
								
								 $('#ContainerItems').append(
					  
                                 '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem"><p id="NotAvailable">Not available</p></div>'+
										   
                                  '</div>'
								  
								  	);
								  
								  }else{
									  
									
										
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem">'+
										   		'<a href="javascript:OpenModalCart('+Item_Id[i]+',\''+imgToDisplay+'\',\''+Item_description[i]+'\',\''+Reference[i]+'\','+Stock_Quantity[i]+')"><img src="../images/cart.png" alt="CartImage"></a></div>'+
										   
                                  '</div>'
								  
								  	);
								  
										
								}
							
						
							
						} // End for loop
						
						
							 }else{
								
								  $('#ContainerItems').html("");
								  alert("Error displaying Items")
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
		
	
	
	
} // End displayItemsFunction






$('#DescriptionButton').click(function(){
	
	
	var User_Id = 	window.localStorage.getItem('User_Id');
	
			var dataString = 'User_Id='+User_Id+'&DisplayItemsByDescription= true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
					   
						   if(data.Status == 'success'){
							   
							   displayItemCart(User_Id);
							   
								$('#ContainerItems').html("");
						
								// Here at this point I need to colect all data. 
								
								var Item_Id				= data.Item_Id;
								var Item_description	= data.Item_description;
								var Reference			= data.Reference;
								var Imagen				= data.Imagen;
								var Initial_Quantity	= data.Initial_Quantity;
								var Stock_Quantity		= data.Stock_Quantity;
								var Lessons_item		= data.Lessons_item;
								var DateItem			= data.DateItem;
								var Expiration_date		= data.Expiration_date;
								var Price				= data.Price;
								var Grant_Id			= data.Grant_Id;
								var Vendor_Id			= data.Vendor_Id;
								var Category_Id			= data.Category_Id;
								var Subcategory_id		= data.Subcategory_id;
								var ItemType_Id			= data.ItemType_Id;
								var Building			= data.Building;
								var Cabine				= data.Cabine;
								var Room				= data.Room;
								var Department			= data.Department;
								var Location_Description= data.Location_Description;
								var Grp					= data.Grp;
								
								var idStodk;
								var actionsTodisplay;
								var imgToDisplay;
									
							
						for (var i in Item_Id) {	
						
							if(Imagen[i] == ""){
									imgToDisplay = "no_image.gif";
								}else{
									imgToDisplay = Imagen[i];
								}
						
						
								if(Stock_Quantity[i] == 0){
									idStodk = 'Value0Stock';
							
								
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem"><p id="NotAvailable">Not available</p></div>'+
										   
                                  '</div>'
								  
								  	);
								  
								  }else{
									  
									
										
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem">'+
										   		'<a href="javascript:OpenModalCart('+Item_Id[i]+',\''+imgToDisplay+'\',\''+Item_description[i]+'\',\''+Reference[i]+'\','+Stock_Quantity[i]+')"><img src="../images/cart.png" alt="CartImage"></a></div>'+
										   
                                  '</div>'
								  
								  	);
								  
										
								}
							
						
							
						} // End for loop
						
						
							 }else{
								
								  $('#ContainerItems').html("");
								  alert("Error displaying Items")
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
}); //End order by description DescriptionButton
	
	
	
	
	
	
	
	
	
	

$('#ReferenceButton').click(function(){
	
	
	var User_Id = 	window.localStorage.getItem('User_Id');
	
			var dataString = 'User_Id='+User_Id+'&DisplayItemsByReference= true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
					   
						   if(data.Status == 'success'){
							   
							   displayItemCart(User_Id);
							   
								$('#ContainerItems').html("");
						
								// Here at this point I need to colect all data. 
								
								var Item_Id				= data.Item_Id;
								var Item_description	= data.Item_description;
								var Reference			= data.Reference;
								var Imagen				= data.Imagen;
								var Initial_Quantity	= data.Initial_Quantity;
								var Stock_Quantity		= data.Stock_Quantity;
								var Lessons_item		= data.Lessons_item;
								var DateItem			= data.DateItem;
								var Expiration_date		= data.Expiration_date;
								var Price				= data.Price;
								var Grant_Id			= data.Grant_Id;
								var Vendor_Id			= data.Vendor_Id;
								var Category_Id			= data.Category_Id;
								var Subcategory_id		= data.Subcategory_id;
								var ItemType_Id			= data.ItemType_Id;
								var Building			= data.Building;
								var Cabine				= data.Cabine;
								var Room				= data.Room;
								var Department			= data.Department;
								var Location_Description= data.Location_Description;
								var Grp					= data.Grp;
								
								var idStodk;
								var actionsTodisplay;
								var imgToDisplay;
									
							
						for (var i in Item_Id) {	
						
						
							if(Imagen[i] == ""){
									imgToDisplay = "no_image.gif";
								}else{
									imgToDisplay = Imagen[i];
								}
								if(Stock_Quantity[i] == 0){
									idStodk = 'Value0Stock';
							
								
								 $('#ContainerItems').append(
					  
                                 '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem"><p id="NotAvailable">Not available</p></div>'+
										   
                                  '</div>'
								  
								  	);
								  
								  }else{
									  
									
										
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem">'+
										   		'<a href="javascript:OpenModalCart('+Item_Id[i]+',\''+imgToDisplay+'\',\''+Item_description[i]+'\',\''+Reference[i]+'\','+Stock_Quantity[i]+')"><img src="../images/cart.png" alt="CartImage"></a></div>'+
										   
                                  '</div>'
								  
								  	);
								  
										
								}
							
						
							
						} // End for loop
						
						
							 }else{
								
								  $('#ContainerItems').html("");
								  alert("Error displaying Items")
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
}); //End order by description DescriptionButton
	
	
	
	
	
	

	

$('#StockButton').click(function(){
	
	
	var User_Id = 	window.localStorage.getItem('User_Id');
	
			var dataString = 'User_Id='+User_Id+'&DisplayItemsByStock= true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
					   
						   if(data.Status == 'success'){
							   
							   displayItemCart(User_Id);
							   
								$('#ContainerItems').html("");
						
								// Here at this point I need to colect all data. 
								
								var Item_Id				= data.Item_Id;
								var Item_description	= data.Item_description;
								var Reference			= data.Reference;
								var Imagen				= data.Imagen;
								var Initial_Quantity	= data.Initial_Quantity;
								var Stock_Quantity		= data.Stock_Quantity;
								var Lessons_item		= data.Lessons_item;
								var DateItem			= data.DateItem;
								var Expiration_date		= data.Expiration_date;
								var Price				= data.Price;
								var Grant_Id			= data.Grant_Id;
								var Vendor_Id			= data.Vendor_Id;
								var Category_Id			= data.Category_Id;
								var Subcategory_id		= data.Subcategory_id;
								var ItemType_Id			= data.ItemType_Id;
								var Building			= data.Building;
								var Cabine				= data.Cabine;
								var Room				= data.Room;
								var Department			= data.Department;
								var Location_Description= data.Location_Description;
								var Grp					= data.Grp;
								
								var idStodk;
								var actionsTodisplay;
								var imgToDisplay;
									
							
						for (var i in Item_Id) {	
						
							if(Imagen[i] == ""){
									imgToDisplay = "no_image.gif";
								}else{
									imgToDisplay = Imagen[i];
								}
								
								if(Stock_Quantity[i] == 0){
									idStodk = 'Value0Stock';
							
								
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem"><p id="NotAvailable">Not available</p></div>'+
										   
                                  '</div>'
								  
								  	);
								  
								  }else{
									  
									
										
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem">'+
										   		'<a href="javascript:OpenModalCart('+Item_Id[i]+',\''+imgToDisplay+'\',\''+Item_description[i]+'\',\''+Reference[i]+'\','+Stock_Quantity[i]+')"><img src="../images/cart.png" alt="CartImage"></a></div>'+
										   
                                  '</div>'
								  
								  	);
								  
										
								}
							
						
							
						} // End for loop
						
						
							 }else{
								
								  $('#ContainerItems').html("");
								  alert("Error displaying Items")
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
}); //End order by description DescriptionButton
	
	
	
	
$('#DescriptionSearchButton').click(function(){
	
	
	var User_Id = 	window.localStorage.getItem('User_Id');
	var DescriptionSearch = $('#DescriptionSearch').val();
	

			var dataString = 'User_Id='+User_Id+'&DescriptionSearch='+DescriptionSearch+'&SearchItemsByDescription=true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
					   
						   if(data.Status == 'success'){
							   
							   displayItemCart(User_Id);
							   
								$('#ContainerItems').html("");
						
								// Here at this point I need to colect all data. 
								
								var Item_Id				= data.Item_Id;
								var Item_description	= data.Item_description;
								var Reference			= data.Reference;
								var Imagen				= data.Imagen;
								var Initial_Quantity	= data.Initial_Quantity;
								var Stock_Quantity		= data.Stock_Quantity;
								var Lessons_item		= data.Lessons_item;
								var DateItem			= data.DateItem;
								var Expiration_date		= data.Expiration_date;
								var Price				= data.Price;
								var Grant_Id			= data.Grant_Id;
								var Vendor_Id			= data.Vendor_Id;
								var Category_Id			= data.Category_Id;
								var Subcategory_id		= data.Subcategory_id;
								var ItemType_Id			= data.ItemType_Id;
								var Building			= data.Building;
								var Cabine				= data.Cabine;
								var Room				= data.Room;
								var Department			= data.Department;
								var Location_Description= data.Location_Description;
								var Grp					= data.Grp;
								
								var idStodk;
								var actionsTodisplay;
								var imgToDisplay;
									
							
						for (var i in Item_Id) {	
						
								if(Imagen[i] == ""){
									imgToDisplay = "no_image.gif";
								}else{
									imgToDisplay = Imagen[i];
								}
						
								if(Stock_Quantity[i] == 0){
									idStodk = 'Value0Stock';
							
								
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem"><p id="NotAvailable">Not available</p></div>'+
										   
                                  '</div>'
								  
								  	);
								  
								  }else{
									  
									
										
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem">'+
										   		'<a href="javascript:OpenModalCart('+Item_Id[i]+',\''+imgToDisplay+'\',\''+Item_description[i]+'\',\''+Reference[i]+'\','+Stock_Quantity[i]+')"><img src="../images/cart.png" alt="CartImage"></a></div>'+
										   
                                  '</div>'
								  
								  	);
								  
										
								}
							
						
							
						} // End for loop
						
						
							 }else{
								
								  $('#ContainerItems').html("");
								  alert("No Items with this description")
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
}); //End order by description DescriptionButton









$('#CategorySearchButton').click(function(){
	
	
	var User_Id = 	window.localStorage.getItem('User_Id');
	var CategorySearch = $('#CategorySearch').val();
	

			var dataString = 'User_Id='+User_Id+'&CategorySearch='+CategorySearch+'&SearchItemsByCategory=true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
					   
						   if(data.Status == 'success'){
							   
							   displayItemCart(User_Id);
							   
								$('#ContainerItems').html("");
						
								// Here at this point I need to colect all data. 
								
								var Item_Id				= data.Item_Id;
								var Item_description	= data.Item_description;
								var Reference			= data.Reference;
								var Imagen				= data.Imagen;
								var Initial_Quantity	= data.Initial_Quantity;
								var Stock_Quantity		= data.Stock_Quantity;
								var Lessons_item		= data.Lessons_item;
								var DateItem			= data.DateItem;
								var Expiration_date		= data.Expiration_date;
								var Price				= data.Price;
								var Grant_Id			= data.Grant_Id;
								var Vendor_Id			= data.Vendor_Id;
								var Category_Id			= data.Category_Id;
								var Subcategory_id		= data.Subcategory_id;
								var ItemType_Id			= data.ItemType_Id;
								var Building			= data.Building;
								var Cabine				= data.Cabine;
								var Room				= data.Room;
								var Department			= data.Department;
								var Location_Description= data.Location_Description;
								var Grp					= data.Grp;
								
								var idStodk;
								var actionsTodisplay;
								var imgToDisplay;
									
							
						for (var i in Item_Id) {	
							
							
								if(Imagen[i] == ""){
									imgToDisplay = "no_image.gif";
								}else{
									imgToDisplay = Imagen[i];
								}
								
								
								if(Stock_Quantity[i] == 0){
									idStodk = 'Value0Stock';
							
								
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem"><p id="NotAvailable">Not available</p></div>'+
										   
                                  '</div>'
								  
								  	);
								  
								  }else{
									  
									
										
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem">'+
										   		'<a href="javascript:OpenModalCart('+Item_Id[i]+',\''+imgToDisplay+'\',\''+Item_description[i]+'\',\''+Reference[i]+'\','+Stock_Quantity[i]+')"><img src="../images/cart.png" alt="CartImage"></a></div>'+
										   
                                  '</div>'
								  
								  	);
								  
										
								}
							
						
							
						} // End for loop
						
						
							 }else{
								
								  $('#ContainerItems').html("");
								  alert("No Items with this category")
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
}); //End order by description DescriptionButton



										
										


$('#ReferenceSearchButton').click(function(){
	
	
	var User_Id = 	window.localStorage.getItem('User_Id');
	var ReferenceSearch = $('#ReferenceSearch').val();
	

			var dataString = 'User_Id='+User_Id+'&ReferenceSearch='+ReferenceSearch+'&SearchItemsByReference=true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
					   
						   if(data.Status == 'success'){
							   
							   displayItemCart(User_Id);
							   
								$('#ContainerItems').html("");
						
								// Here at this point I need to colect all data. 
								
								var Item_Id				= data.Item_Id;
								var Item_description	= data.Item_description;
								var Reference			= data.Reference;
								var Imagen				= data.Imagen;
								var Initial_Quantity	= data.Initial_Quantity;
								var Stock_Quantity		= data.Stock_Quantity;
								var Lessons_item		= data.Lessons_item;
								var DateItem			= data.DateItem;
								var Expiration_date		= data.Expiration_date;
								var Price				= data.Price;
								var Grant_Id			= data.Grant_Id;
								var Vendor_Id			= data.Vendor_Id;
								var Category_Id			= data.Category_Id;
								var Subcategory_id		= data.Subcategory_id;
								var ItemType_Id			= data.ItemType_Id;
								var Building			= data.Building;
								var Cabine				= data.Cabine;
								var Room				= data.Room;
								var Department			= data.Department;
								var Location_Description= data.Location_Description;
								var Grp					= data.Grp;
								
								var idStodk;
								var actionsTodisplay;
								var imgToDisplay;
									
							
						for (var i in Item_Id) {	
						
							if(Imagen[i] == ""){
									imgToDisplay = "no_image.gif";
								}else{
									imgToDisplay = Imagen[i];
								}
						
								if(Stock_Quantity[i] == 0){
									idStodk = 'Value0Stock';
							
								
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem"><p id="NotAvailable">Not available</p></div>'+
										   
                                  '</div>'
								  
								  	);
								  
								  }else{
									  
									
										
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem">'+
										   		'<a href="javascript:OpenModalCart('+Item_Id[i]+',\''+imgToDisplay+'\',\''+Item_description[i]+'\',\''+Reference[i]+'\','+Stock_Quantity[i]+')"><img src="../images/cart.png" alt="CartImage"></a></div>'+
										   
                                  '</div>'
								  
								  	);
								  
										
								}
							
						
							
						} // End for loop
						
						
							 }else{
								
								  $('#ContainerItems').html("");
								  alert("No Items with this category")
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
}); //End order by description DescriptionButton











									


$('#LessonSearchButton').click(function(){
	
	
	var User_Id = 	window.localStorage.getItem('User_Id');
	var LessonSearch = $('#LessonSearch').val();
	

			var dataString = 'User_Id='+User_Id+'&LessonSearch='+LessonSearch+'&SearchItemsByLessons=true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					   
					   
						   if(data.Status == 'success'){
							   
							   displayItemCart(User_Id);
							   
								$('#ContainerItems').html("");
						
								// Here at this point I need to colect all data. 
								
								var Item_Id				= data.Item_Id;
								var Item_description	= data.Item_description;
								var Reference			= data.Reference;
								var Imagen				= data.Imagen;
								var Initial_Quantity	= data.Initial_Quantity;
								var Stock_Quantity		= data.Stock_Quantity;
								var Lessons_item		= data.Lessons_item;
								var DateItem			= data.DateItem;
								var Expiration_date		= data.Expiration_date;
								var Price				= data.Price;
								var Grant_Id			= data.Grant_Id;
								var Vendor_Id			= data.Vendor_Id;
								var Category_Id			= data.Category_Id;
								var Subcategory_id		= data.Subcategory_id;
								var ItemType_Id			= data.ItemType_Id;
								var Building			= data.Building;
								var Cabine				= data.Cabine;
								var Room				= data.Room;
								var Department			= data.Department;
								var Location_Description= data.Location_Description;
								var Grp					= data.Grp;
								
								var idStodk;
								var actionsTodisplay;
								var imgToDisplay;
									
							
						for (var i in Item_Id) {	
						
							
							if(Imagen[i] == ""){
									imgToDisplay = "no_image.gif";
								}else{
									imgToDisplay = Imagen[i];
								}
						
								if(Stock_Quantity[i] == 0){
									idStodk = 'Value0Stock';
							
								
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem"><p id="NotAvailable">Not available</p></div>'+
										   
                                  '</div>'
								  
								  	);
								  
								  }else{
									  
									
										
								 $('#ContainerItems').append(
					  
                                  '<div class="lineItems" onMouseOver="OpenModalInfoItem(\''+imgToDisplay+'\','+Stock_Quantity[i]+')" onMouseOut="CloseModalInfoItem()">'+
										  '<div class="DescriptionItem">'+
												'<div class="desItem"><img src="images/Items/'+imgToDisplay+'" alt="Photo Items"></div>'+
												'<p>'+Item_description[i]+'</p>'+
										   '</div>'+
										   '<div class="ReferenceItem">'+
                                                 '<p>'+Reference[i]+'</p>'+
                                           '</div>'+
										   '<div class="StockItem">'+
                                                  '<p id="Value0Stock"> '+Stock_Quantity[i]+'</p>'+
                                           '</div>'+
                                           '<div class="ActionItem">'+
										   		'<a href="javascript:OpenModalCart('+Item_Id[i]+',\''+imgToDisplay+'\',\''+Item_description[i]+'\',\''+Reference[i]+'\','+Stock_Quantity[i]+')"><img src="../images/cart.png" alt="CartImage"></a></div>'+
										   
                                  '</div>'
								  
								  	);
								  
										
								}
							
						
							
						} // End for loop
						
						
							 }else{
								
								  $('#ContainerItems').html("");
								  alert("No Items with this category")
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
}); //End order by description DescriptionButton




 	
var reservationBoxTag = function(){
	
	var UserId 	 = window.localStorage.getItem('User_Id');
	var UserName = window.localStorage.getItem('Name');
	var UserLast = window.localStorage.getItem('Last');
	var User_Type_Id = window.localStorage.getItem('User_Type_Id');
	
	
	$('#NameUserM').html(UserName + ' '  + UserLast);
	
	
	
	
	// Here I need to find all information about groups and their memebers //


			var dataString = 'UserId='+UserId+'&SearchGroupsAndMembers=true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					    if(data.Status == 'success'){
							  
							  
							  $('#selectGroup option[value!="-1"]').remove();
							  
							  var GroupId 			= data.GroupId;
							  var Group_Description = data.Group_Description;
							  var Start_Date 		= data.Start_Date;
							  var End_Date			= data.End_Date;
							  
							  var Start_Date_Mysql 	= data.Start_Date_Mysql;
							  var End_Date_Mysql 	= data.End_Date_Mysql;
							  var MemberShips_Id 	= data.MemberShips_Id;
							  var User_Id			= data.User_Id; 		
								
							 var DiferenceDate		= data.DiferenceDate; 
								
									for(var i in GroupId){
										
										$('#selectGroup').append(
											'<option value="'+GroupId[i]+'"> '+Group_Description[i]+'</option>'
										);
									} // End foor loop
							
							
							
								displayInfoGroup($('#selectGroup').val());
							
							 }else{
								
								  
								alert('Error displaying groups');
							
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
	
	
	
}  // end of reservationBoxTag
 


var displayInfoGroup = function(GroupId){
	
	
	
	
	
			var dataString = 'GroupId='+GroupId+'&DisplayGroupsAndMembers=true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					    if(data.Status == 'success'){
							  
							
							  var GroupId 			= data.GroupId;
							  var Group_Description = data.Group_Description;
							  var Start_Date 		= data.Start_Date;
							  var End_Date			= data.End_Date;
							  
							  var Start_Date_Mysql 	= data.Start_Date_Mysql;
							  var End_Date_Mysql 	= data.End_Date_Mysql;
							  var MemberShips_Id 	= data.MemberShips_Id;
							  
							  var User_Id			= data.User_Id; 		
							  var Name				= data.Name;
							  var Last 				= data.Last;
							  var User_Type_Id		= data.User_Type_Id; 	
								
							  var DiferenceDate		= data.DiferenceDate; 
								
							
							for(var i in User_Id){
								
								if(User_Type_Id[i] == 3){
									var previusInstructor = $('#InstructorsInfoBox').html();
									
									if(previusInstructor == ""){
										$('#InstructorsInfoBox').html(Name[i]+' '+Last[i]);
									}else{
										$('#InstructorsInfoBox').html(previusInstructor + ' / '+Name[i]+' '+Last[i]);
									}
								
								}
								
							} // End foor loop
										
							
								$('#startDate').html(Start_Date[0]);
								
							if(DiferenceDate[0] < 0){
								$('#endDate').html(End_Date[0]);
								$('#endDate').css('color','red');
								alert("This group is expired");
								$('#ContainerItems').hide();
							}else{
								$('#endDate').html(End_Date[0]);
								$('#endDate').css('color','#050');
								$('#ContainerItems').show();
								}
								
							
							 }else{
								
								  
								alert('Error displaying groups');
							
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
}













var displayInfoGroupOnSelectMenu = function(){
			
			var GroupId = $('#selectGroup').val();
			var dataString = 'GroupId='+GroupId+'&DisplayGroupsAndMembers=true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					    if(data.Status == 'success'){
							  $('#InstructorsInfoBox').html("");
							
							  var GroupId 			= data.GroupId;
							  var Group_Description = data.Group_Description;
							  var Start_Date 		= data.Start_Date;
							  var End_Date			= data.End_Date;
							  
							  var Start_Date_Mysql 	= data.Start_Date_Mysql;
							  var End_Date_Mysql 	= data.End_Date_Mysql;
							  var MemberShips_Id 	= data.MemberShips_Id;
							  
							  var User_Id			= data.User_Id; 		
							  var Name				= data.Name;
							  var Last 				= data.Last;
							  var User_Type_Id		= data.User_Type_Id; 	
								
							  var DiferenceDate		= data.DiferenceDate; 
								
							
							for(var i in User_Id){
								
								if(User_Type_Id[i] == 3){
									var previusInstructor = $('#InstructorsInfoBox').html();
									
									if(previusInstructor == ""){
										$('#InstructorsInfoBox').html(Name[i]+' '+Last[i]);
									}else{
										$('#InstructorsInfoBox').html(previusInstructor + ' / '+Name[i]+' '+Last[i]);
									}
								
								}
								
							} // End foor loop
										
							
								$('#startDate').html(Start_Date[0]);
								
							if(DiferenceDate[0] < 0){
								$('#endDate').html(End_Date[0]);
								$('#endDate').css('color','red');
								alert("This group is expired");
								$('#ContainerItems').hide();
								
							}else{
								$('#endDate').html(End_Date[0]);
								$('#endDate').css('color','#050');
								$('#ContainerItems').show();
								}
								
								
							
							 }else{
								
								  
								alert('Error displaying groups');
							
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
}


var displayCategoriesSearchSelect = function(){
	
	
	
	
			var dataString = 'displayCategoriesSearchSelect=true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					    if(data.Status == 'success'){
							  
							  
							  $('#CategorySearch option[value!="-1"]').remove();
							  
							  var Category_Id 			= data.Category_Id;
							  var Category_Description = data.Category_Description;
					
							   for(var i in Category_Id){
										
										$('#CategorySearch').append(
											'<option value="'+Category_Id[i]+'"> '+Category_Description[i]+'</option>'
										);
								} // End foor loop
							
						
							
							 }else{
								
								  
								alert('Error displaying categories');
							
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
	
	
}






var displayLessonsSearchSelect = function(){
	
	
	
	
			var dataString = 'displayLessonsSearchSelect=true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					    if(data.Status == 'success'){
							  
							  
							  $('#LessonSearch option[value!="-1"]').remove();
							 
								
							  var Lesson_Id 			= data.Lesson_Id;
							  var Lesson_description 	= data.Lesson_description;
					
							   for(var i in Lesson_Id){
										
										$('#LessonSearch').append(
											'<option value="'+Lesson_description[i]+'"> '+Lesson_description[i]+'</option>'
										);
								} // End foor loop
							
						
							
							 }else{
								
								  
								alert('Error displaying Lessons');
							
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
	
	
}

var displayMebersRelatedGroup = function(){
	
		var User_Id = window.localStorage.getItem('User_Id');
		var dataString = 'User_Id='+User_Id+'&displayMebersRelatedGroup=true';
					
					// This reset the container Cart
							
									
				$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionCart.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					    if(data.Status == 'success'){
							  	
							  var User_Id 			= data.User_Id;
							  var Name 				= data.Name;
							  var MidleName 		= data.MidleName;
							  var Last 				= data.Last;
							  var Email 			= data.Email;
							  var ImageUser 		= data.ImageUser;
							  
							  var Temple_Id 		= data.Temple_Id;
							  var Cellphone 		= data.Cellphone;
							  var Address1 			= data.Address1;
							  var Address2 			= data.Address2;
							  var City 				= data.City;
							  var State 			= data.State;
							  var Website 			= data.Website;
							  
							  var Zip 				= data.Zip;
							  var HomePhone 		= data.HomePhone;
							  var WorkPhone 		= data.WorkPhone;
							  var User_Type_Id 		= data.User_Type_Id;
							  
							  	
							  var GroupId 			= data.GroupId;
							  var Group_Description = data.Group_Description;
						
							 for(var i in User_Id){
									
									$('#ContainerMembersRelated').append(
									'<br>'+
									'<div class="lineMemberRelate">'+
                        			'<div class="nameMember"> <p> '+Name[i]+' '+ Last[i]+'</p></div>'+
                            		'<div><a class="ButtonMemberOption" href="javascript:OpenEmailBox(\''+Email[i]+'\');">'+
										'<img src="../images/email-icon.png" alt="iconEmail" /> </a></div>'+
                            		'<div><a class="ButtonMemberOption" href="javascript:OpenModalInfoUserBox(\''+Name[i]+'\',\''+Last[i]+'\',\''+Email[i]+'\','+Temple_Id[i]+',\''+ImageUser[i]+'\',\''+Cellphone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\',\''+HomePhone[i]+'\',\''+WorkPhone[i]+'\',\''+Website[i]+'\',\''+User_Type_Id[i]+'\')"> <img src="../images/infoUser.png" alt="info User Icon" /></a></button></div>'+
                        '</div>'
							
							);	
									
									
										
								} // End foor loop
							
		
		
							 }else{
								
								  
								alert('Error displaying Lessons');
							
							 }
						      
							
				  	}
				});
								
				return false; // avoid to execute the actual submit of the form.
					
	
		


}  // end function displayMebersRelatedGroup -->



