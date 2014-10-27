var actionImageBoxUpdate=true;
var actionImageBoxInsert=true;
var EditCategory = true;
var EditSubCategory = true;




var takeinfoUser = function(UserType, UserId){
	window.localStorage.setItem('UserType',UserType);
	window.localStorage.setItem('UserId',UserId);
}


/// GLOBALS VARIABLES TO MANAGE THIS FUNCTIONS

var imgTodisplay;
var UserType = window.localStorage.getItem('UserType');
var UserId = window.localStorage.getItem('UserId');



$(document).ready(function(e) {
    
	
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
						
						
						if(UserType > 3){
							
							
							$('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax">'+StockDisplay+' </div>'+
							'<div class="ActionColumn">'+
								 '<a href="javascript:openModelBoxEditItem('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\','+Initial_Quantity[i]+','+Stock_Quantity[i]+',\''+DateItem[i]+'\',\''+Expiration_date[i]+'\',\''+Price[i]+'\','+Grant_Id[i]+','+Vendor_Id[i]+','+Category_Id[i]+','+Subcategory_id[i]+','+ItemType_Id[i]+',\''+Building[i]+'\',\''+Cabine[i]+'\',\''+Room[i]+'\',\''+Department[i]+'\',\''+Location_Description[i]+'\',\''+Grp[i]+'\',\''+Lessons_item[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
								 
								  '<a class="menuList" href="javascript:deleteItemById('+Item_Id[i]+')">'+
						  '<img src="../images/Delete.png" alt="delete Icon"></a>'+
						  '</div>'+
                    	'</div>' 
				  );
							
				
					
				 } else {
					 
					 $('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax"> </div>'+
							'<div class="ActionColumn">'+
								   '<p class="noActions">No Actions</p>'+
						  '</div>'+
                    	'</div>' 
				  );
					 
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
				 
				 		displayCategoriesOnSearchMenu();
						DisplayLessonsOnSearchMenu();
						displayItemTypeInsertTag();
						displayCategoriesInsertTag();
						displaySubCategoriesInsert();
						DisplaySuplierInsert();
						DisplayGrantInsert();
						DisplayLessonsInsert();
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
			

});



var DisplayItems = function(){
	
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
							
					   var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
						
						
					
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
						
						
						if(UserType > 3){
							
							
							$('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax">'+StockDisplay+' </div>'+
							'<div class="ActionColumn">'+
								 '<a href="javascript:openModelBoxEditItem('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\','+Initial_Quantity[i]+','+Stock_Quantity[i]+',\''+DateItem[i]+'\',\''+Expiration_date[i]+'\',\''+Price[i]+'\','+Grant_Id[i]+','+Vendor_Id[i]+','+Category_Id[i]+','+Subcategory_id[i]+','+ItemType_Id[i]+',\''+Building[i]+'\',\''+Cabine[i]+'\',\''+Room[i]+'\',\''+Department[i]+'\',\''+Location_Description[i]+'\',\''+Grp[i]+'\',\''+Lessons_item[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
								  '<a class="menuList" href="../PHP/funcionsPHP.php?ItemDeleteID='+Item_Id[i]+'">'+
						  '<img src="../images/Delete.png" alt="delete Icon"></a>'+
						  '</div>'+
                    	'</div>' 
				  );
							
				
					
				 } else {
					 
					 $('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax"> </div>'+
							'<div class="ActionColumn">'+
								   '<p class="noActions">No Actions</p>'+
						  '</div>'+
                    	'</div>' 
				  );
					 
					 }
						   
				
                  } // End form loop
				 
				 
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
			
	
	
	
	
}// End function DisplayItems




$('#descriptionSearchOrde').click(function(){
	
	
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
					  var item_report 		= data.item_report;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
						
						
					
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
						
						
						if(UserType > 3){
							
							
							$('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax">'+StockDisplay+' </div>'+
							'<div class="ActionColumn">'+
								 '<a href="javascript:openModelBoxEditItem('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\','+Initial_Quantity[i]+','+Stock_Quantity[i]+',\''+DateItem[i]+'\',\''+Expiration_date[i]+'\',\''+Price[i]+'\','+Grant_Id[i]+','+Vendor_Id[i]+','+Category_Id[i]+','+Subcategory_id[i]+','+ItemType_Id[i]+',\''+Building[i]+'\',\''+Cabine[i]+'\',\''+Room[i]+'\',\''+Department[i]+'\',\''+Location_Description[i]+'\',\''+Grp[i]+'\',\''+Lessons_item[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
								  '<a class="menuList" href="../PHP/funcionsPHP.php?ItemDeleteID='+Item_Id[i]+'">'+
						  '<img src="../images/Delete.png" alt="delete Icon"></a>'+
						  '</div>'+
                    	'</div>' 
				  );
							
						
						
				 } else {
					 
					 $('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax"> </div>'+
							'<div class="ActionColumn">'+
								   '<p class="noActions">No Actions</p>'+
						  '</div>'+
                    	'</div>' 
				  );
					 
					 }
						   
								
								
						
                            
                     
			
                  } // End form loop
				 
				 
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
			
			
			});






$('#ReferenceSearchOrder').click(function(){
	
	
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
					  var item_report 		= data.item_report;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
						
						
					
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
						
						
						if(UserType > 3){
							
							
							$('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax">'+StockDisplay+' </div>'+
							'<div class="ActionColumn">'+
								'<a href="javascript:openModelBoxEditItem('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\','+Initial_Quantity[i]+','+Stock_Quantity[i]+',\''+DateItem[i]+'\',\''+Expiration_date[i]+'\',\''+Price[i]+'\','+Grant_Id[i]+','+Vendor_Id[i]+','+Category_Id[i]+','+Subcategory_id[i]+','+ItemType_Id[i]+',\''+Building[i]+'\',\''+Cabine[i]+'\',\''+Room[i]+'\',\''+Department[i]+'\',\''+Location_Description[i]+'\',\''+Grp[i]+'\',\''+Lessons_item[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
								  '<a class="menuList" href="../PHP/funcionsPHP.php?ItemDeleteID='+Item_Id[i]+'">'+
						  '<img src="../images/Delete.png" alt="delete Icon"></a>'+
						  '</div>'+
                    	'</div>' 
				  );
							
						
						
				 } else {
					 
					 $('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax"> </div>'+
							'<div class="ActionColumn">'+
								   '<p class="noActions">No Actions</p>'+
						  '</div>'+
                    	'</div>' 
				  );
					 
					 }
					 
					 
					 
			 } // End form loop
				 
				 
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
			
			
			
});







$('#stockOrder').click(function(){
	
	
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
					  var item_report 		= data.item_report;
					  var Grp 				= data.Grp;
					  var Lessons_item 		= data.Lessons_item;
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
						
						
					
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
						
						
						if(UserType > 3){
							
							
							$('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax">'+StockDisplay+' </div>'+
							'<div class="ActionColumn">'+
								'<a href="javascript:openModelBoxEditItem('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\','+Initial_Quantity[i]+','+Stock_Quantity[i]+',\''+DateItem[i]+'\',\''+Expiration_date[i]+'\',\''+Price[i]+'\','+Grant_Id[i]+','+Vendor_Id[i]+','+Category_Id[i]+','+Subcategory_id[i]+','+ItemType_Id[i]+',\''+Building[i]+'\',\''+Cabine[i]+'\',\''+Room[i]+'\',\''+Department[i]+'\',\''+Location_Description[i]+'\',\''+Grp[i]+'\',\''+Lessons_item[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
								  '<a class="menuList" href="../PHP/funcionsPHP.php?ItemDeleteID='+Item_Id[i]+'">'+
						  '<img src="../images/Delete.png" alt="delete Icon"></a>'+
						  '</div>'+
                    	'</div>' 
				  );
							
						
						
				 } else {
					 
					 $('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax"> </div>'+
							'<div class="ActionColumn">'+
								   '<p class="noActions">No Actions</p>'+
						  '</div>'+
                    	'</div>' 
				  );
					 
					 }
	
	  } // End form loop
				 
				 
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
				
});



function openModelBoxEditItem(Item_Id,Item_description,Imagen,Reference,Initial_Quantity,Stock_Quantity,DateItem,Expiration_date,Price,Grant_Id,Vendor_Id,Category_Id,Subcategory_id,ItemType_Id,Building,Cabine,Room,Department,Location_Description,Grp,Lessons_item){
		
			$('#modalEditItem').show();
			
			$('#strImagenEdit').val(Imagen);
			$('#TypeItemEdit').val(ItemType_Id);
			
		
			$('#Stock_QuantityEdit').val(Stock_Quantity);
			$('#descriptionItemEdit').val(Item_description);
			$('#referenceItemEdit').val(Reference);
			$('#quantityItemEdit').val(Initial_Quantity);
			$('#priceItemEdit').val(Price);
			$('#dateInsertItemEdit').val(DateItem);
			$('#expirationItemEdit').val(Expiration_date);
			$('#departmentItemEdit').val(Department);
			$('#roomItemEdit').val(Room);
			$('#cabinetItemEdit').val(Cabine);
			$('#descriptionLocItemEdit').val(Location_Description);
			$('#ItemIdEdit').val(Item_Id);
			$('#buildingItemEdit').val(Building);
			
		
		
			
		if(Grp == 1){
			$("#grpEdit").prop('checked', true);
		}else{
			$("#grpEdit").prop('checked', false);
			}
	
	
		// The following function is to display the categories
		displayCategories(Category_Id);
		displaySubCategories(Category_Id,Subcategory_id);
		DisplaySuplier(Vendor_Id);
		DisplayGrant(Grant_Id);
		DisplayLessons(Lessons_item);
		displayTypeItem(ItemType_Id);
		
		
}
		
function closeModelBoxEditItem(){
			$('#modalEditItem').hide();		
}





var displayCategories = function(Category_Id_Fn){
	
	
	
		var dataString = 'displayCategories=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Category_Id 			= data.Category_Id;
					  var Category_Description 	= data.Category_Description;
					  var checkedStr = "";
					 
			
					 if (data.Status == 'success'){
						  $('#categoryItemEdit option[value!="-1"]').remove();
						
						for (var i in Category_Id) {
							
						  	if(Category_Id_Fn == Category_Id[i]){
								checkedStr = 'selected';
							}else{checkedStr = ''}
						  
						  $('#categoryItemEdit').append(
						  	'<option value="'+Category_Id[i]+'" '+checkedStr+'>'+Category_Description[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying Categories');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 






var displayTypeItem = function(ItemType_Id_Fn){
	
	
	
		var dataString = '&displayTypeItem=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
				
					  var ItemType_Id 			= data.ItemType_Id;
					  var ItemType_description 	= data.ItemType_description;
					  var checkedStr = "";
					 
			
					 if (data.Status == 'success'){
						  $('#TypeItemEdit option[value!="-1"]').remove();
						
						for (var i in ItemType_Id) {
							
						  	if(ItemType_Id_Fn == ItemType_Id[i]){
								checkedStr = 'selected';
							}else{checkedStr = ''}
						  
						  $('#TypeItemEdit').append(
						  	'<option value="'+ItemType_Id[i]+'" '+checkedStr+'>'+ItemType_description[i]+'</option>'
						  );
						  
						
						  
						
						 } 
						
				 
					  }else{
						    $('#TypeItemEdit option[value!="-1"]').remove();
						  alert('Error displaying Item Type');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 





var displaySubCategories = function(Category_Id_Fn,Subcategory_id_Fn){
	
	
	
		var dataString = 'Category_Id_Fn='+Category_Id_Fn+'&displaySubCategories=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Subcategory_id 			= data.Subcategory_id;
					  var Subcategory_description 	= data.Subcategory_description;
					  var checkedStr = "";
					 
			
					 if (data.Status == 'success'){
						  $('#SubcategoryItemEdit option[value!="-1"]').remove();
						  
						 
						  
						for (var i in Subcategory_id) {
							
						  	if(Subcategory_id_Fn == Subcategory_id[i]){
								checkedStr = 'selected';
							}else{checkedStr = ''}
						  
						  $('#SubcategoryItemEdit').append(
						  	'<option value="'+Subcategory_id[i]+'" '+checkedStr+'>'+Subcategory_description[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying Subcategories');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 







var displaySubCategoriesFromFormSelection = function(){
	
	 var categoryItemEdit = $('#categoryItemEdit').val();
	
	
		var dataString = 'Category_Id_Fn='+categoryItemEdit+'&displaySubCategoriesFromFormSelection=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Subcategory_id 			= data.Subcategory_id;
					  var Subcategory_description 	= data.Subcategory_description;
					  
					 
			
					 if (data.Status == 'success'){
						  $('#SubcategoryItemEdit option[value!="-1"]').remove();
						  
						 
						  
						for (var i in Subcategory_id) {
							
						  
						  $('#SubcategoryItemEdit').append(
						  	'<option value="'+Subcategory_id[i]+'">'+Subcategory_description[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying Subcategories');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 



var displayCategoriesOnSearchMenu = function(){
	
	
	
		var dataString = 'displayCategories=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Category_Id 			= data.Category_Id;
					  var Category_Description 	= data.Category_Description;
					 
					 
			
					 if (data.Status == 'success'){
						  $('#categoryItemSearch option[value!="-1"]').remove();
						
						for (var i in Category_Id) {
						
						  
						  $('#categoryItemSearch').append(
						  	'<option value="'+Category_Id[i]+'">'+Category_Description[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
						   $('#categoryItemSearch').html("");
						  alert('Error displaying Categories');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 







var DisplaySuplier = function(Vendor_Id_Fn){
	
	
	
		var dataString = 'Vendor_Id='+Vendor_Id_Fn+'&DisplaySuplier=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Vendor_Id 	= data.Vendor_Id;
					  var Vendor_name 	= data.Vendor_name;
					  var Vendor_email 	= data.Vendor_email;
					  var Vendor_phone 	= data.Vendor_phone;
					  var Vendor_web 	= data.Vendor_web;
					 
							
					  var checkedStr = "";
					 
			
					 if (data.Status == 'success'){
						  $('#supplierItemEdit option[value!="-1"]').remove();
						  
						 
						  
						for (var i in Vendor_Id) {
							
						  	if(Vendor_Id_Fn == Vendor_Id[i]){
								checkedStr = 'selected';
							}else{checkedStr = ''}
						  
						  $('#supplierItemEdit').append(
						  	'<option value="'+Vendor_Id[i]+'" '+checkedStr+'>'+Vendor_name[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying supplier');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 








var DisplayGrant = function(Grant_Id_Fn){
	
	
	
		var dataString = 'DisplayGrant=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Grant_Id 	= data.Grant_Id;
					  var Grant_name 	= data.Grant_name;
					  var Grant_email 	= data.Grant_email;
					  var Grant_phone 	= data.Grant_phone;
					
					 
							
					  var checkedStr = "";
					 
			
					 if (data.Status == 'success'){
						  $('#grantItemEdit option[value!="-1"]').remove();
						  
						 
						  
						for (var i in Grant_Id) {
							
						  	if(Grant_Id_Fn == Grant_Id[i]){
								checkedStr = 'selected';
							}else{checkedStr = ''}
						  
						  $('#grantItemEdit').append(
						  	'<option value="'+Grant_Id[i]+'" '+checkedStr+'>'+Grant_name[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
						   $('#grantItemEdit').html("");
						  alert('Error displaying supplier');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 


var DisplayLessons= function(Lessons_item){
	
	
	
		var dataString = 'DisplayLessons=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					  var Lesson_Id 	= data.Lesson_Id;
					  var Lesson_description 	= data.Lesson_description;
					  var selectedStr;
					  
						
						if(Lessons_item != ""){
							var arrayLessons = Lessons_item.split(',');
							var lengthArray = arrayLessons.length;
							}else{
								var lengthArray = 0;
							}
					
						
					 if (data.Status == 'success'){
						   $('#lessonsBox2').html("");
						  
						 
						  
						for (var i in Lesson_Id) {
							
								selectedStr = '';
								if(lengthArray > 0){
									
									for(var x = 0; x < lengthArray; x++){
										
										if(Lesson_description[i] == arrayLessons[x]){
											 selectedStr = 'checked';
										}
										
									} // end for loop
									
									
								}
							
						//  	if(Grant_Id_Fn == Grant_Id[i]){
						//		checkedStr = 'selected';
						//	}else{checkedStr = ''}
						  
					 $('#lessonsBox2').append(
						  
					  '<div class="lineLessons">'+
                         '<div class="leftLineLesson"><input type="checkbox" name="lessonsUpdate" value="'+Lesson_description[i]+'" '+selectedStr+'/></div>'+
                         '<div class="rightLineLesson"><p>'+Lesson_description[i]+'</p></div>'+
              	      '</div>'   
                
						  );
						
						 } 
						
				 
					  }else{
						   $('#lessonsBox2').html("");
						  alert('Error displaying Lessons');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 




var DisplayLessonsOnSearchMenu = function(){
	
	
	
		var dataString = 'DisplayLessons=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					  var Lesson_Id 			= data.Lesson_Id;
					  var Lesson_description 	= data.Lesson_description;
					 
					
						
					 if (data.Status == 'success'){
						  
						    $('#lessonItemSearch option[value!="-1"]').remove();
						 
						  
						for (var i in Lesson_Id) {
							
						
					 $('#lessonItemSearch').append(
						  
					 '<option value="'+Lesson_description[i]+'">'+Lesson_description[i]+'</option>'
                
						  );
						
						 } 
						
				 
					  }else{
						   
						  alert('Error displaying Lessons');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 








	
		
function subirImagen4(){
	if(actionImageBoxUpdate == true){
		
			$('#updateImagebox').css('display','-webkit-box');
			$('#updateImagebox').css('display','-moz-box');
			$('#updateImagebox').css('display','-ms-flexbox');
			
			
		
			setTimeout(function(){
				$('#updateImagebox').css('height','80px');
				$('#formImage3').show();
				
			}, 200);
				
			actionImageBoxUpdate = false;
		
	}else{
		$('#updateImagebox').css('height','0px');
		$('#updateImagebox').css('display','none');
		$('#formImage3').hide();
		
		
		actionImageBoxUpdate = true;
		}// end else conduction
				
}


                                
			






// this is the id of the form
$("#updateImageButton").click(function() {
	
	
	if(imgageUpdate == ""){
		alert("Select a image first");
	}else{
		
			var fd = new FormData();    
			fd.append( 'fileImageItem', $('#imgageUpdate')[0].files[0]);
		
		$.ajax({
		  url: '../PHP/FunctionsItems.php',
		  data: fd,
		  processData: false,
		  contentType: false,
		  type: 'POST',
		  dataType:"Json",
		  success: function(data){
			  
			  if(data.Status == 'success'){
				  
				  var nameImg = data.NameImg;
				  $('#strImagenEdit').val(nameImg);
				  $('#updateImagebox').hide();
				  
				  
				 }
			  
		
		  }
		});
	
	} // end else condition
	
});



$('#buttonUpdateItem').click(function(){
		
			var strImagen 			= $('#strImagenEdit').val();
			var typeItem 			= $('#TypeItemEdit').val();
			var Stock_Quantity 		= $('#Stock_QuantityEdit').val();
			var descriptionItem 	= $('#descriptionItemEdit').val();
			var referenceItem 		= $('#referenceItemEdit').val();
			var quantityItem 		= $('#quantityItemEdit').val();
			var priceItem 			= $('#priceItemEdit').val();
			var dateInsertItem 		= $('#dateInsertItemEdit').val();
			var expirationItem 		= $('#expirationItemEdit').val();
			var departmentItem 		= $('#departmentItemEdit').val();
			var roomItem 			= $('#roomItemEdit').val();
			var cabinetItem			= $('#cabinetItemEdit').val();
			var descriptionLocItem	= $('#descriptionLocItemEdit').val();
			var ItemIdEdit			= $('#ItemIdEdit').val();
			var buildingItem  		= $('#buildingItemEdit').val();
			var grantItem  			= $('#grantItemEdit').val();
			var supplierItem   		= $('#supplierItemEdit').val();
			var categoryItem2   	= $('#categoryItemEdit').val();
			var SubcategoryItem		= $('#SubcategoryItemEdit').val();
			var grp; 
			
			if($('#grpEdit').prop('checked')){
				grp = 1;
			}else{
				grp = 0;
			}
				
			var lessons = [];
			$('[name="lessonsUpdate"]:checked').each(function(i,e) {
				lessons.push(e.value);
			});

			lessons = lessons.join(',');
			lessons = String(lessons);
   		
		
			
		

	var dataString = 'ItemIdEdit='+ItemIdEdit+'&descriptionItem='+descriptionItem+'&typeItem='+typeItem+'&referenceItem='+referenceItem+'&strImagen='+strImagen+'&quantityItem='+quantityItem+'&Stock_Quantity='+Stock_Quantity+'&dateInsertItem='+dateInsertItem+'&expirationItem='+expirationItem+'&priceItem='+priceItem+'&grantItem='+grantItem+'&supplierItem='+supplierItem+'&categoryItem2='+categoryItem2+'&SubcategoryItem='+SubcategoryItem+'&buildingItem='+buildingItem+'&cabinetItem='+cabinetItem+'&roomItem='+roomItem+'&departmentItem='+departmentItem+'&descriptionLocItem='+descriptionLocItem+'&lessons='+lessons+'&grp='+grp+'&buttonUpdateItem=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
				
					 if(data.Status = 'success'){
						 
						 alert('Item updated successfully');
						 DisplayItems();
					}else{
						
						alert('Error updating item');
					
					}
					 
					 
					 
				  }
			});
			return false;
		
	
	

});



$('#searchDescriptionButton').click(function(){
	
	var NameItem = $('#descriptionSearch').val();
	
	
		var dataString = 'NameItem='+NameItem+'&SearchItemByName=true';
			
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
							
					  
					  
				
					  
					  
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
						
						
					
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
						
						
						if(UserType > 3){
							
							
							$('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax">'+StockDisplay+' </div>'+
							'<div class="ActionColumn">'+
								 '<a href="javascript:openModelBoxEditItem('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\','+Initial_Quantity[i]+','+Stock_Quantity[i]+',\''+DateItem[i]+'\',\''+Expiration_date[i]+'\',\''+Price[i]+'\','+Grant_Id[i]+','+Vendor_Id[i]+','+Category_Id[i]+','+Subcategory_id[i]+','+ItemType_Id[i]+',\''+Building[i]+'\',\''+Cabine[i]+'\',\''+Room[i]+'\',\''+Department[i]+'\',\''+Location_Description[i]+'\',\''+Grp[i]+'\',\''+Lessons_item[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
								  '<a class="menuList" href="../PHP/funcionsPHP.php?ItemDeleteID='+Item_Id[i]+'">'+
						  '<img src="../images/Delete.png" alt="delete Icon"></a>'+
						  '</div>'+
                    	'</div>' 
				  );
							
				
					
				 } else {
					 
					 $('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax"> </div>'+
							'<div class="ActionColumn">'+
								   '<p class="noActions">No Actions</p>'+
						  '</div>'+
                    	'</div>' 
				  );
					 
					 }
						   
								
								
						
                            
                     
			
                  } // End form loop
				 
				 
					  }else{
						   $('#containerList').html("");
						  alert('No items to display with this descriptions');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
});






$('#searchCategoryButton').click(function(){
	
	var categoryItemSearch = $('#categoryItemSearch').val();
	
	
		var dataString = 'categoryItemSearch='+categoryItemSearch+'&searchCategoryButton=true';
			
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
							
					  
					  
				
					  
					  
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
						
						
					
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
						
						
						if(UserType > 3){
							
							
							$('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax">'+StockDisplay+' </div>'+
							'<div class="ActionColumn">'+
								 '<a href="javascript:openModelBoxEditItem('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\','+Initial_Quantity[i]+','+Stock_Quantity[i]+',\''+DateItem[i]+'\',\''+Expiration_date[i]+'\',\''+Price[i]+'\','+Grant_Id[i]+','+Vendor_Id[i]+','+Category_Id[i]+','+Subcategory_id[i]+','+ItemType_Id[i]+',\''+Building[i]+'\',\''+Cabine[i]+'\',\''+Room[i]+'\',\''+Department[i]+'\',\''+Location_Description[i]+'\',\''+Grp[i]+'\',\''+Lessons_item[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
								  '<a class="menuList" href="../PHP/funcionsPHP.php?ItemDeleteID='+Item_Id[i]+'">'+
						  '<img src="../images/Delete.png" alt="delete Icon"></a>'+
						  '</div>'+
                    	'</div>' 
				  );
							
				
					
				 } else {
					 
					 $('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax"> </div>'+
							'<div class="ActionColumn">'+
								   '<p class="noActions">No Actions</p>'+
						  '</div>'+
                    	'</div>' 
				  );
					 
					 }
						   
								
								
						
                            
                     
			
                  } // End form loop
				 
				 
					  }else{
						   $('#containerList').html("");
						  alert('No items to display on this category');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
});











			
							
							


$('#searchReferenceButton').click(function(){
	
	var ReferenceSearch = $('#ReferenceSearch').val();
	
	
		var dataString = 'ReferenceSearch='+ReferenceSearch+'&searchReferenceButton=true';
			
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
							
					  
					  
				
					  
					  
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
						
						
					
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
						
						
						if(UserType > 3){
							
							
							$('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax">'+StockDisplay+' </div>'+
							'<div class="ActionColumn">'+
								 '<a href="javascript:openModelBoxEditItem('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\','+Initial_Quantity[i]+','+Stock_Quantity[i]+',\''+DateItem[i]+'\',\''+Expiration_date[i]+'\',\''+Price[i]+'\','+Grant_Id[i]+','+Vendor_Id[i]+','+Category_Id[i]+','+Subcategory_id[i]+','+ItemType_Id[i]+',\''+Building[i]+'\',\''+Cabine[i]+'\',\''+Room[i]+'\',\''+Department[i]+'\',\''+Location_Description[i]+'\',\''+Grp[i]+'\',\''+Lessons_item[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
								  '<a class="menuList" href="../PHP/funcionsPHP.php?ItemDeleteID='+Item_Id[i]+'">'+
						  '<img src="../images/Delete.png" alt="delete Icon"></a>'+
						  '</div>'+
                    	'</div>' 
				  );
							
				
					
				 } else {
					 
					 $('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax"> </div>'+
							'<div class="ActionColumn">'+
								   '<p class="noActions">No Actions</p>'+
						  '</div>'+
                    	'</div>' 
				  );
					 
					 }
						   
			
                  } // End form loop
				 
				 
					  }else{
						   $('#containerList').html("");
						  alert('No items to display on this category');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
});






$('#searchLessonButton').click(function(){
	
	var lessonItemSearch = $('#lessonItemSearch').val();
	
	
		var dataString = 'lessonItemSearch='+lessonItemSearch+'&searchLessonButton=true';
			
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
							
					  
					  
				
					  
					  
					  
					  var StockDisplay;
					 
			
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
						
						
					
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
						
						
						if(UserType > 3){
							
							
							$('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax">'+StockDisplay+' </div>'+
							'<div class="ActionColumn">'+
								 '<a href="javascript:openModelBoxEditItem('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\','+Initial_Quantity[i]+','+Stock_Quantity[i]+',\''+DateItem[i]+'\',\''+Expiration_date[i]+'\',\''+Price[i]+'\','+Grant_Id[i]+','+Vendor_Id[i]+','+Category_Id[i]+','+Subcategory_id[i]+','+ItemType_Id[i]+',\''+Building[i]+'\',\''+Cabine[i]+'\',\''+Room[i]+'\',\''+Department[i]+'\',\''+Location_Description[i]+'\',\''+Grp[i]+'\',\''+Lessons_item[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
								  '<a class="menuList" href="../PHP/funcionsPHP.php?ItemDeleteID='+Item_Id[i]+'">'+
						  '<img src="../images/Delete.png" alt="delete Icon"></a>'+
						  '</div>'+
                    	'</div>' 
				  );
							
				
					
				 } else {
					 
					 $('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax"> </div>'+
							'<div class="ActionColumn">'+
								   '<p class="noActions">No Actions</p>'+
						  '</div>'+
                    	'</div>' 
				  );
					 
					 }
						   
								
								
						
                            
                     
			
                  } // End form loop
				 
				 
					  }else{
						   $('#containerList').html("");
						  alert('No items to display on this category');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
});


//This function is to delete the item


var deleteItemById = function(Item_Id){
	
	
	
	var resultConfirm = confirm('Delete Item with Id '+Item_Id +'?');
	
	if(resultConfirm == true){
		
		
		
			var dataString = 'Item_Id='+Item_Id+'&DeleteItemById=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
						
					 if (data.Status == 'success'){
						  alert("Item deleted successfully");
						  DisplayItems();
					 }else{
						  alert('Error deleting Item');
						  }
						 
				  }
			});
			e.preventDefault();
			
			
	}
	
	
}  // End delete function




var subirImagen3 = function()
{
	if(actionImageBoxInsert == true){
		
		
		  $('#sentImage').css('display','-webkit-box');
		  $('#sentImage').css('display','-moz-box');
		  $('#sentImage').css('display','-ms-flexbox');

			
		
			setTimeout(function(){
				$('#sentImage').css('height','80px');
				$('#formImage2').show();
			});
			actionImageBoxInsert = false;
		
	}else{
		$('#formImage2').hide();
		$('#sentImage').css('display','none');
	
		actionImageBoxInsert = true;
		}// end else conduction
				
}




	
							

// this is the id of the form
$("#buttonSendImagen2").click(function() {
	
	var imgageToInsert = $('#fileItemIsert').val();
	
	if(imgageToInsert == ""){
		alert("Select a image first");
	}else{
		
			var fd = new FormData();    
			fd.append( 'fileImageItem', $('#fileItemIsert')[0].files[0]);
		
		$.ajax({
		  url: '../PHP/FunctionsItems.php',
		  data: fd,
		  processData: false,
		  contentType: false,
		  type: 'POST',
		  dataType:"Json",
		  success: function(data){
			  
			  if(data.Status == 'success'){
				  
				  var nameImg = data.NameImg;
				  $('#strImagenI').val(nameImg);
				  $('#sentImage').hide();
				  
				  
				 }
			  
		
		  }
		});
	
	} // end else condition
	
});




function onpenManageCategories(){
		
		DisplayCategoriesInModal();
		DisplaySubCategoriesInModal();
		$('#modalCategories').css('display','-webkit-box');
		$('#modalCategories').css('display','-moz-box');
		$('#modalCategories').css('display','-ms-flexbox');

	
	setTimeout(function(){
		$('#modalBoxCategories').css('opacity','1');
		$('#modalCategories').css('opacity','1');
		},200);

}



function closeModelPanel3(){
		$('#modalBoxCategories').css('opacity','0');
		$('#modalCategories').css('opacity','0');
	
	setTimeout(function(){
			$('#modalCategories').css('display','none');
	
	},200);
}



//This function is to delete the item


var DisplayCategoriesInModal = function(){
	
		var dataString = 'displayCategories=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
						
					 if (data.Status == 'success'){
						 
						 $('#containerListCategories').html("");
						 $('#categoryItem2 option[value!="-1"]').remove();
						 var Category_Id = data.Category_Id;
						 var Category_Description = data.Category_Description;
						 
						 for(var i in Category_Id){
							 
							 if( i > 0){
							 $('#containerListCategories').append(
							  '<div class="lineTableCategories">'+
                                    '<div class="DesCategories">'+Category_Description[i]+'</div>'+
                                    '<div class="ActCategories">'+
										'<a href="javascript:openEditCategory('+Category_Id[i]+',\''+Category_Description[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
                                         '<a href="javascript:deleteCategory('+Category_Id[i]+')" class="menuList"><img src="../images/Delete.png" alt="delete Icon"></a>'+
                                        
                                    
                                    '</div>'+
                                '</div>'
							 );
							 
						  $('#categoryItem2').append(
							 
							 '<option value="'+Category_Id[i]+'">'+Category_Description[i]+'</option>'
						
						 );
						 
						
							 } // end of if( i > 0){
							 
							} // end for loop
						 
						 
					 }else{
						 $('#containerListCategories').html("");
						  alert('Error displaying categories');
						  }
						 
				  }
			});
			return false;
			
			
	
	
	
}  // End delete function                       





var DisplaySubCategoriesInModal = function(){
	
		
		
		
			var dataString = 'displaySubCategoriesToModal=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
						
					 if (data.Status == 'success'){
						  
						  $('#containerListSubCategories').html("");
						  
						 var Subcategory_id 		 = data.Subcategory_id;
						 var Subcategory_description = data.Subcategory_description;
						 var Category_id 			 = data.Category_id;
					
						 for(var i in Subcategory_id){
							  if( i > 0){
							 $('#containerListSubCategories').append(
							 
							  '<div class="lineTableCategories">'+
                                    '<div class="DesCategories">'+Subcategory_description[i]+'</div>'+
                                    '<div class="ActCategories">'+ 
                                    
 										'<a href="javascript:openEditSubCategory('+Subcategory_id[i]+',\''+Subcategory_description[i]+'\','+Category_id[i]+')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
 										'<a href="javascript:deleteSubCategory('+Subcategory_id[i]+')" class="menuList"><img src="../images/Delete.png" alt="delete Icon"></a>'+
                                     
                                    
                                    '</div>'+
                                '</div>'
							
							 );
							 
							  } // end  if( i > 0){
							} // end for loop
						 
						 
					 }else{
						 $('#containerListSubCategories').html("");
						  alert('Error displaying categories');
						  }
						 
				  }
			});
			return false;
			
			
	
	
	
}  // End delete function                       




function openEditCategory(Category_Id,Category_Description){
	
	$('#CategorId').val(Category_Id);
	$('#CategoryEditInput').val(Category_Description);
	$('#insertCategory').hide();
	$('#editCategory').show();
}


function closeEditCategory(){
	
	$('#editCategory').hide();
	$('#insertCategory').show();
					
}
	
function openEditSubCategory(Subcategory_id,Subcategory_description,Category_id){
	
	$('#formSubcategory').hide();
	$('#formSubcategoryEdit').show();
				
	$('#SubEditID').val(Subcategory_id);
	$('#SubCategoryInput2').val(Subcategory_description);
	
}


function closeEditSubCategory(){
	
		$('#formSubcategoryEdit').hide();
		$('#formSubcategory').show();
	
}
	
	
	
	
$('#CategoryButtonInsert').click(function(){
	
	var CategoryName = $('#CategoryInput').val();
	
	
	var dataString = 'CategoryName='+CategoryName+'&InsertCategory=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						 DisplayCategoriesInModal();
						 
					 }else if(data.Status == 'repeated')
					 	 alert('This Category already exist');
					 else{
						 alert('Error inserting categories');
						  }
						 
				  }
			});
			return false;
	

	
});



var deleteCategory = function(Category_Id){
	
	
	
	var dataString = 'Category_Id='+Category_Id+'&DeleteCategory=true';
			
		var resultConfirm = confirm("Delete Category?");
		
		if(resultConfirm == true){
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						 DisplayCategoriesInModal();
						 
					 }else if(data.Status == 'DeleteSub'){
					 	 alert('Delete firs subcategories before delete it');
					 }else{
						 alert('Error deleting category');
						  }
						 
				  } // End function successfully
			});
			e.preventDefault();

	
		} // end if cofirm condition
} // end deleteCategory function








$('#CategoryEditButton').click(function(){
	
	var Category_Id 	 = $('#CategorId').val();
	var CategoryEdit = $('#CategoryEditInput').val();
	
	
	var dataString = 'Category_Id='+Category_Id+'&CategoryEdit='+CategoryEdit+'&EditCategory=true';
			
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						 DisplayCategoriesInModal();
						 
					 }else{
						 
						
						}
						 
				  } // End function successfully
			});
			return false;
	

	
	
	});
	
	
	



$('#SubCategoryButtonInsert').click(function(){
	
	var Category_Id 	 = $('#categoryItem2').val();
	var SubCategoryName = $('#SubCategoryInputInsert').val();
	
	
	var dataString = 'Category_Id='+Category_Id+'&SubCategoryName='+SubCategoryName+'&InsertSubCategory=true';
			
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						 DisplaySubCategoriesInModal();
						 
					 }else if(data.Status == 'repeated'){
					 	alert("Already exist a subcategory with same name");
					 
					 }else{
						 
						alert("Error creating subcategory");
						}
						 
				  } // End function successfully
			});
			return false;
	

	
	
	});
	
	
	
	
	
var deleteSubCategory = function(Subcategory_id){
	
	
	
	var dataString = 'Subcategory_id='+Subcategory_id+'&DeleteSubCategory=true';
			
		var resultConfirm = confirm("Delete SubCategory?");
		
		if(resultConfirm == true){
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						  DisplaySubCategoriesInModal();
						 
					 }else{
						 alert('Error deleting Subcategory');
						  }
						 
				  } // End function successfully
			});
			e.preventDefault();

	
		} // end if cofirm condition
} // end deleteCategory function




							   


$('#SubCategoryEditButton2').click(function(){
	
	var SubEditID 	 = $('#SubEditID').val();
	var SubCategoryName = $('#SubCategoryInput2').val();
	
	
	var dataString = 'SubEditID='+SubEditID+'&SubCategoryName='+SubCategoryName+'&EditSubCategory=true';
			
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						 DisplaySubCategoriesInModal();
						 
					 }else if(data.Status == 'repeated'){
					 	alert("Already exist a subcategory with same name");
					 
					 }else{
						 
						alert("Error creating subcategory");
						}
						 
				  } // End function successfully
			});
			return false;
	

	
	
	});
	
	
	
	
		
function openModalVendor(){
	DisplayVendors();
	$('#modalVendor').show();
}
	
	
function closeModalVendor(){
	$('#modalVendor').hide();
}




var DisplayVendors = function(){
	
		
		
		
			var dataString = 'displayVendors=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
						
					 if (data.Status == 'success'){
						  
						  $('#contVendors').html("");
						  
						 var Vendor_Id 		= data.Vendor_Id;
						 var Vendor_name 	= data.Vendor_name;
						 var Vendor_email 	= data.Vendor_email;
						 var Vendor_phone 	= data.Vendor_phone;
						 var Vendor_web  	= data.Vendor_web;
					
							
						 for(var i in Vendor_Id){
							  if( i > 0){ // This is to not display the first element  --- none ----
							 $('#contVendors').append(
							 
								'<div class="lineVendor">'+
                            	'<div class="VendorN"><p>'+Vendor_name[i]+'</p></div>'+
                                '<div class="ActionV">'+
                                    '<a href="javascript:openModalVendorEdit('+Vendor_Id[i]+',\''+Vendor_name[i]+'\',\''+Vendor_email[i]+'\',\''+Vendor_phone[i]+'\',\''+Vendor_web[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
                                    '<a href="javascript:deleteVendor('+Vendor_Id[i]+')" class="menuList"><img src="../images/Delete.png" alt="delete Icon"></a>'+
                                '</div>'+
                            '</div> '
                            
							
							 );
							 
							  } // end  if( i > 0){
							} // end for loop
						 
						 
					 }else{
						 $('#contVendors').html("");
						  alert('Error displaying Vendors');
						  }
						 
				  }
			});
			return false;
			
			
	
	
	
}  // End delete function                       






function openModalVendorEdit(Vendor_Id,Vendor_name,Vendor_email,Vendor_phone,Vendor_web){
			
			
			
			$('#nameVendorEdit').val(Vendor_name);
			$('#emailVendorEdit').val(Vendor_email);
			$('#phoneVendorEdit').val(Vendor_phone);
			$('#webVendorEdit').val(Vendor_web);
			$('#idVendorEdit').val(Vendor_Id);
		
		
			$('#leftVendor').hide();
			$('#leftVendor2').show();
			$('#editVendorForm').show();
			
			$('#leftVendor2').css('width','260px');
			
		

	}
	
	
	
function closeEditVendor(){
		
		
		$('#modalVendor').show();
		
		$('#leftVendor').css('display','-webkit-box');
		$('#leftVendor').css('display','-moz-box');
		$('#leftVendor').css('display','-ms-flexbox');
		
		$('#leftVendor2').hide();
		$('#leftVendor2').css('width','0px');
		$('#editVendorForm').hide();
		

	} 
	
	





$('#VendorInsertBEdit').click(function(){
	
	var nameVendorEdit 	= $('#nameVendorEdit').val();
	var emailVendorEdit = $('#emailVendorEdit').val();
	var phoneVendorEdit = $('#phoneVendorEdit').val();
	var webVendorEdit	= $('#webVendorEdit').val();
	var idVendorEdit	= $('#idVendorEdit').val();
	
	
	var dataString = 'nameVendorEdit='+nameVendorEdit+'&emailVendorEdit='+emailVendorEdit+'&phoneVendorEdit='+phoneVendorEdit+'&webVendorEdit='+webVendorEdit+'&idVendorEdit='+idVendorEdit+'&UpdateVendor=true';
			
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						 DisplayVendors();
						 
						
						 
					 }else if(data.Status == 'repeated'){
					 	alert("Already exist a Vendor with same name");
					 
					 }else{
						 
						
						}
						 
				  } // End function successfully
			});
			return false;
	
	
	
	
	
	
});





// The following function is to insert a new vendor


$('#VendorInsertB').click(function(){
	
	


	var nameVendorInsert 	= $('#nameVendorInsert').val();
	var emailVendorInsert 	= $('#emailVendorInsert').val();
	var phoneVendorInsert 	= $('#phoneVendorInsert').val();
	var webVendorInsert	 	= $('#webVendorInsert').val();
	
	var dataString = 'nameVendorInsert='+nameVendorInsert+'&emailVendorInsert='+emailVendorInsert+'&phoneVendorInsert='+phoneVendorInsert+'&webVendorInsert='+webVendorInsert+'&InsertVendor=true';
			
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						 DisplayVendors();
						 
						 $('#nameVendorInsert').val("");
						 $('#emailVendorInsert').val("");
						 $('#phoneVendorInsert').val("");
						 $('#webVendorInsert').val("");
						 
					 }else if(data.Status == 'repeated'){
					 	alert("Already exist a Vendor with same name");
					 
					 }else{
						 
						alert("Error creating subcategory");
						}
						 
				  } // End function successfully
			});
			return false;
});




function deleteVendor(Vendor_Id){
	
	
	var dataString = 'Vendor_Id='+Vendor_Id+'&DeleteVendor=true';
			
		var resultConfirm = confirm("Delete Supplier?");
		
		if(resultConfirm == true){
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						   DisplayVendors();
						 
					 }else{
						 alert('Error deleting Supplier');
						  }
						 
				  } // End function successfully
			});
			e.preventDefault();
	
		} // end if cofirm condition
	
	
	
	
	}
	
	
	
	
	
	
	
	
	
function openModalGrand(){
	DisplayGrant();
	$('#modalGrand').show();
}
	
function closeModalGrand(){
	$('#modalGrand').hide();		
}
	
	
	
function openModalGrandEdit(Grant_Id,Grant_name,Grant_email,Grant_phone){
	
		$('#leftGrand').hide();	
		$('#leftGrand2').css('display','-webkit-box');
		$('#leftGrand2').css('display','-moz-box');
		$('#leftGrand2').css('display','-ms-flexbox');	
		$('#leftGrand2').css('width','260px');
			
		$('#editGrandForm').show();
		$('#insertGrandForm').hide();
		
		
		$('#nameGrandEdit').val(Grant_name);
		$('#emailVendorEdit2').val(Grant_email);
		$('#phoneVendorEdit2').val(Grant_phone);
		$('#idGrant').val(Grant_Id);
		
}
	
	
	
function closeEditGrand(){
			
		$('#leftGrand').css('display','-webkit-box');
		$('#leftGrand').css('display','-moz-box');
		$('#leftGrand').css('display','-ms-flexbox');	
		
		$('#leftGrand2').hide();	
		
		$('#editGrandForm').hide();
		$('#insertGrandForm').show();
			
} 



var DisplayGrant = function(){
	
		
		
		
			var dataString = 'displayGrant=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
						
					 if (data.Status == 'success'){
						  
						  $('#contGrand').html("");
						 
						 var Grant_Id 		= data.Grant_Id;
						 var Grant_name 	= data.Grant_name;
						 var Grant_email 	= data.Grant_email;
						 var Grant_phone 	= data.Grant_phone;
					
							
						 for(var i in Grant_Id){
							  if( i > 0){ // This is to not display the first element  --- none ----
							 $('#contGrand').append(
							 
							 '<div class="lineGrandR">'+
                            	'<div class="GrandN"><p>'+Grant_name[i]+'</p></div>'+
                                '<div class="ActionG">'+
                                    '<a href="javascript:openModalGrandEdit('+Grant_Id[i]+',\''+Grant_name[i]+'\',\''+Grant_email[i]+'\',\''+Grant_phone[i]+'\')"class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
                                    '<a href="javascript:deleteGrant('+Grant_Id[i]+')" class="menuList"><img src="../images/Delete.png" alt="delete Icon"></a>'+
                                '</div>'+
                            '</div>'
								
							
							 );
							 
							  } // end  if( i > 0){
							} // end for loop
						 
						 
					 }else{
						 $('#contGrand').html("");
						  alert('Error displaying Grants');
						  }
						 
				  }
			});
			return false;
			
			
	
	
	
}  // End delete function                       




$('#GrandInsertB').click(function(){
	
	
	var Grant_name 	= $('#nameGrandInsert').val();
	var Grant_email	= $('#emailGrandInsert').val();
	var Grant_phone	= $('#phoneGrandInsert').val();



		var dataString = 'Grant_name='+Grant_name+'&Grant_email='+Grant_email+'&Grant_phone='+Grant_phone+'&InsertGrant=true';
			
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						 DisplayGrant();
						 
						 $('#nameGrandInsert').val("");
						 $('#emailGrandInsert').val("");
						 $('#phoneGrandInsert').val("");
					
					 }else if(data.Status == 'repeated'){
					 	alert("Already exist a grant with same name");
					 
					 }else{
						 
						alert("Error creating grant");
						}
						 
				  } // End function successfully
			});
			return false;




}); 


var deleteGrant = function(Grant_Id){
	
	var dataString = 'Grant_Id='+Grant_Id+'&DeleteGrant=true';
			
		var resultConfirm = confirm("Delete Grant?");
		
		if(resultConfirm == true){
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						   DisplayGrant();
						 
					 }else{
						 alert('Error deleting Grant');
						  }
						 
				  } // End function successfully
			});
			e.preventDefault();
	
		} // end if cofirm condition
	
	
}



$('#GrandInsertBEdit').click(function(){
	
	var Grant_name 	= $('#nameGrandEdit').val();
	var Grant_email	= $('#emailVendorEdit2').val();
	var Grant_phone	= $('#phoneVendorEdit2').val();
	var Grant_Id	= $('#idGrant').val();

	var dataString = 'Grant_name='+Grant_name+'&Grant_email='+Grant_email+'&Grant_phone='+Grant_phone+'&Grant_Id='+Grant_Id+'&UpdateGrant=true';
			
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						 DisplayGrant();
						
					
					 }else{
						 
						
						}
						 
				  } // End function successfully
			});
			e.preventDefault();


});







/*
$('#TagInsert').click(function(){
	
	displayItemTypeInsertTag();
	displayCategoriesInsertTag();
	displaySubCategoriesInsert();
	DisplaySuplierInsert();
	DisplayGrantInsert();
	DisplayLessonsInsert();
});

*/



var displayItemTypeInsertTag = function(){
	
		var dataString = 'displayTypeItemInsert=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
								
					  var ItemType_Id 			= data.ItemType_Id;
					  var ItemType_description 	= data.ItemType_description;
					
					 
			
					 if (data.Status == 'success'){
						  $('#typeItemInsert option[value!="-1"]').remove();
						
						for (var i in ItemType_Id) {
						  
						  $('#typeItemInsert').append(
						  	'<option value="'+ItemType_Id[i]+'">'+ItemType_description[i]+'</option>'
						  );
						  
						
						  
						
						 } 
						
				 
					  }else{
						    $('#typeItemInsert option[value!="-1"]').remove();
						  alert('Error displaying Item Type');
						  
						  }
						 
				  }
			});
			return false;
	
	
}










var displayCategoriesInsertTag = function(){
	
	
	
		var dataString = 'displayCategoriesInsertTag=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Category_Id 			= data.Category_Id;
					  var Category_Description 	= data.Category_Description;
					
					 
			
					 if (data.Status == 'success'){
						  $('#categoryItem option[value!="-1"]').remove();
						
						for (var i in Category_Id) {
							
						
						  
						  $('#categoryItem').append(
						  	'<option value="'+Category_Id[i]+'">'+Category_Description[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
				
						  alert('Error displaying Categories');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 












var displaySubCategoriesInsert = function(){
	
	
	
		var dataString = 'displaySubCategoriesInsert=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  	
					  var Subcategory_id 			= data.Subcategory_id;
					  var Subcategory_description 	= data.Subcategory_description;
				
					 
			
					 if (data.Status == 'success'){
						  $('#SubcategoryItem option[value!="-1"]').remove();
						  
						 
						  
						for (var i in Subcategory_id) {
							
						  
						  $('#SubcategoryItem').append(
						  	'<option value="'+Subcategory_id[i]+'">'+Subcategory_description[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
						   
						  alert('Error displaying Subcategories');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 







var displaySubCategoriesFromFormSelectionInsert = function(){
	
	 var categoryItemEdit = $('#categoryItem').val();
	
	
		var dataString = 'Category_Id_Fn='+categoryItemEdit+'&displaySubCategoriesFromFormSelection=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Subcategory_id 			= data.Subcategory_id;
					  var Subcategory_description 	= data.Subcategory_description;
					  
					 
			
					 if (data.Status == 'success'){
						  $('#SubcategoryItem option[value!="-1"]').remove();
						  
						 
						  
						for (var i in Subcategory_id) {
							
						  
						  $('#SubcategoryItem').append(
						  	'<option value="'+Subcategory_id[i]+'">'+Subcategory_description[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying Subcategories');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 















var DisplaySuplierInsert = function(){
	
	
	
		var dataString = 'DisplaySuplier=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Vendor_Id 	= data.Vendor_Id;
					  var Vendor_name 	= data.Vendor_name;
					  var Vendor_email 	= data.Vendor_email;
					  var Vendor_phone 	= data.Vendor_phone;
					  var Vendor_web 	= data.Vendor_web;
					 
					
					 if (data.Status == 'success'){
						  $('#supplierItem option[value!="-1"]').remove();
						  
						 
						  
						for (var i in Vendor_Id) {
							
						  
						  $('#supplierItem').append(
						  	'<option value="'+Vendor_Id[i]+'">'+Vendor_name[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
						  
						  alert('Error displaying supplier');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 








var DisplayGrantInsert = function(Grant_Id_Fn){
	
	
	
		var dataString = 'DisplayGrant=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Grant_Id 	= data.Grant_Id;
					  var Grant_name 	= data.Grant_name;
					  var Grant_email 	= data.Grant_email;
					  var Grant_phone 	= data.Grant_phone;
					
					 
							
					  var checkedStr = "";
					 
			
					 if (data.Status == 'success'){
						  $('#grantItem option[value!="-1"]').remove();
						  
						 
						  
						for (var i in Grant_Id) {
							
						  $('#grantItem').append(
						  	'<option value="'+Grant_Id[i]+'">'+Grant_name[i]+'</option>'
						  );
						
						 } 
						
				 
					  }else{
						
						  alert('Error displaying supplier');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 







	
function openModalLesson(){
		
		$('#modalLessonsInsert').show();
		$('#modalLessonsInsert').css('opacity','0.95')
		$('#modalBoxLesson').css('opacity','1')
		
}
	
	
function closeModalLesson(){
		
	$('#modalLessonsInsert').hide();
	$('#modalLessonsInsert').css('opacity','0');
}
		
	
	
	
$('#buttonLesson').click(function(){
	
	var LessonName = $('#LessonDescription').val();
	
	
		var dataString = 'LessonName='+LessonName+'&InsertLesson=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  	
					 if (data.Status == 'success'){
						 DisplayLessonsInsert();
						 $('#LessonDescription').val("");
						 closeModalLesson();
						 
					 }else if(data.Status == 'repeated'){
						 
						alert("There exist a lesson with the same description");
					}else{
						
						alert("Error creating a new lesson, try again.");
					}
						 
				  }
			});
			return false;
	
});
		
		
		
		
		
		
		
var DisplayLessonsInsert = function(){
	
	
	
		var dataString = 'DisplayLessons=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  
					  var Lesson_Id 	= data.Lesson_Id;
					  var Lesson_description 	= data.Lesson_description;
					 
					
			
				if (data.Status == 'success'){
						  $('#lessonsBox').html("");
						  
						 
						  
						for (var i in Lesson_Id) {
							
						  $('#lessonsBox').append(
						  	
							
							 
							 
							'<div class="lessonLines">'+
							'<div id="lessonLeft">'+
                                  '<input type="checkbox" name="lessons" id="lessons" value="'+Lesson_description[i]+'"> '+Lesson_description[i]+'<br>'+
							'</div>'+
                            '<div id="lessonRight">'+
                            
                             '<a href="javascript:openModalLessonEdit('+Lesson_Id[i]+',\''+Lesson_description[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
 							 '<a href="javascript:deleteLesson('+Lesson_Id[i]+')" class="menuList"><img src="../images/Delete.png" alt="delete Icon"></a>'+
                            '</div>'+
                            
                          '</div>'
							
							
							
						  );
						
						 } 
						
				 
					  }else{
						
						  alert('Error displaying Lessons');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 
		
		
function openModalLessonEdit(Lesson_Id,Lesson_description){


		
		$('#lessonIdToEdit').val(Lesson_Id);
		$('#Lesson_DescriptionToEdit').val(Lesson_description);
		
		$('#modalLessonsEdit').show();
		$('#modalLessonsEdit').css('opacity','0.95');
		$('#modalBoxLessonEdit').css('opacity','1');	
}
	
	
function closeModalLessonEdit(){
		
		
			$('#modalLessonsEdit').hide();
		$('#modalLessonsEdit').css('opacity','0');
		$('#modalBoxLessonEdit').css('opacity','0');
		
}

$('#buttonLessonEdit').click(function(){
	
		var lessonIdToEdit = $('#lessonIdToEdit').val();
		var Lesson_DescriptionToEdit = $('#Lesson_DescriptionToEdit').val();
		
		
		var dataString = 'lessonIdToEdit='+lessonIdToEdit+'&Lesson_DescriptionToEdit='+Lesson_DescriptionToEdit+'&UpdateLessons=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  	
					 if (data.Status == 'success'){
						 $('#LessonDescription').val("");
						 DisplayLessonsInsert();
						 closeModalLessonEdit();
						 
					 }else if(data.Status == 'repeated'){
						 
						alert("There exist a lesson with the same description");
					}else{
						
						alert("Error updating lesson, try again.");
					}
						 
				  }
			});
			return false;
	
	
});
	
var deleteLesson = function(Lesson_Id){
	
	var resultConfirmDelete = confirm("Delete the lessons ?");
	
	if(resultConfirmDelete == true){
		
		
		
		var dataString = 'Lesson_Id='+Lesson_Id+'&deleteLesson=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsItems.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  	
					 if (data.Status == 'success'){
						 $('#LessonDescription').val("");
						 DisplayLessonsInsert();
						 
						 
					 }else{
						
						alert("Error deleting lesson, try again.");
					}
						 
				  }
			});
			 e.preventDefault();
		
	}
	
} // end deleteLesson

	
	

		
$("#buttonItem").click(function(){
	
	var Imagen				 = $("#strImagenI").val();
	var ItemType_Id			 = $("#typeItemInsert").val(); 
	var Category_Id			 = $("#categoryItem").val();
	var Subcategory_id		 = $("#SubcategoryItem").val();
	var Item_description	 = $("#descriptionItem").val();
	var Reference			 = $("#referenceItem").val();
	var Initial_Quantity	 = $("#quantityItem").val();
	var Stock_Quantity		 = Initial_Quantity;
	var Price				 = $("#priceItem").val(); 
	var DateItem			 = $("#dateInsertItem").val();
	var Expiration_date		 = $("#expirationItem").val();
	var Building			 = $("#buildingItem").val();
	var Department			 = $("#departmentItem").val();
	var Room				 = $("#roomItem").val();
	var Cabine				 = $("#cabinetItem").val();
	var Location_Description = $("#descriptionLocItem").val(); 
	var Grant_Id			 = $("#grantItem").val();
	var Vendor_Id			 = $("#supplierItem").val();
	var Grp;	
	
		
			if($('#grpInsert').prop('checked')){
				Grp = 1;
			}else{
				Grp = 0;
			}
				
			var lessons = [];
			$('[name="lessons"]:checked').each(function(i,e) {
				lessons.push(e.value);
			});

			lessons = lessons.join(',');
			lessons = String(lessons);
	
	
	

		
		ItemType_Id = Number(ItemType_Id);
		
		
		
		function isNumber(n) {
 			 return !isNaN(parseFloat(n)) && isFinite(n);
				}
				
			
	
		
		if(isNumber(ItemType_Id) != true){
			alert("Item Type must need be a number");
			$("#typeItem").focus();
			
		}else if(isNumber(Initial_Quantity) != true){
			
			alert("Quantity must need be a number");
			$("#quantityIN").focus();
			
		}else if(isNumber(Price) != true)
				{
				 alert("Price must need be a number");
				$("#priceItem").focus();
				
		}else if(Item_description.length == 0 ||Item_description == null ||Item_description == ""){
			alert("Description is a oblicatory field");
			$("#descriptionIN").focus();
			
		 }
		
		else if(Item_description.length > 100){
			alert("Description maximum 100 characters");
			$("#descriptionIN").focus();
			
		 }else if(Imagen.length > 50){
			alert("Image maximum 50 characters");
			$("#strImagenI").focus();
			
		 }else if(Building.length > 50){
			alert("Building maximum 50 characters");
			$("#buildingItem").focus();
			
		 }else if(Cabine.length > 50){
			alert("Building maximum 50 characters");
			$("#cabinetItem").focus();
			
		 }else if(Room.length > 50){
			alert("Room maximum 50 characters");
			$("#roomItem").focus();
			
		 }else if(Department.length > 50){
			alert("Room maximum 50 characters");
			$("#departmentItem").focus();
		 }else if(Location_Description.length > 50){
			alert("Location Description maximum 50 characters");
			$("#descriptionLocItem").focus();
			
		 } else{
			 
					 /// At this point I will create the function on JavaScript to submit the form 
			
				var dataString = 'ItemType_Id=' + ItemType_Id + '&Category_Id=' + Category_Id +'&Subcategory_id=' + Subcategory_id +
								 '&Item_description=' + Item_description +'&Reference=' + Reference + '&Imagen=' + Imagen +
								 '&Initial_Quantity=' + Initial_Quantity +'&Stock_Quantity=' + Stock_Quantity + '&Price=' + Price +
								 '&DateItem=' + DateItem +'&Expiration_date=' + Expiration_date + '&Building=' + Building +
								  '&Department=' + Department +'&Room=' + Room + '&Cabine=' + Cabine +
								  '&Location_Description=' + Location_Description +'&Grant_Id=' + Grant_Id + '&Vendor_Id=' + Vendor_Id +
								  '&Grp=' + Grp +'&lessons=' + lessons +'&InsertItem=true';
					
					
					//alert(dataString);
					
					$.ajax({
						  type: "POST",
						  url: "../PHP/FunctionsItems.php",
						  data: dataString,
						  dataType:"Json",
						  success: function(data) {
							  
							if(data.Status == 'success'){
								alert("Item inserted successfully");
								DisplayItemsFunction();
								displayItemTypeInsertTag();
								displayCategoriesInsertTag();
								displaySubCategoriesInsert();
								DisplaySuplierInsert();
								DisplayGrantInsert();
								DisplayLessonsInsert();
								$("#typeItem").val(""); 
								$("#categoryItem").val(""); 
								$("#SubcategoryItem").val("");
								$("#descriptionItem").val("");
								$("#referenceItem").val("");
								$("#strImagenI").val("");
								$("#quantityItem").val("");
								$("#priceItem").val(""); 
								$("#dateInsertItem").val("");
								$("#expirationItem").val("");
								$("#buildingItem").val("");
								$("#departmentItem").val("");
								$("#roomItem").val("");
								$("#cabinetItem").val("");
								$("#descriptionLocItem").val(""); 
								$("#grantItem").val("");
								$("#supplierItem").val("");
								$("#grpInsert").prop('checked', false);
								$('#lessons').prop('checked', false);	
								
							 }else{
									
									
									
								}
							 
							
							
						  }
					});
					return false;
			
			
} // end else condition after validate all inputs 	
});
	
	
	
var DisplayItemsFunction = function(){
	
	
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
						
						
						if(UserType > 3){
							
							
							$('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax">'+StockDisplay+' </div>'+
							'<div class="ActionColumn">'+
								 '<a href="javascript:openModelBoxEditItem('+Item_Id[i]+',\''+Item_description[i]+'\',\''+Imagen[i]+'\',\''+Reference[i]+'\','+Initial_Quantity[i]+','+Stock_Quantity[i]+',\''+DateItem[i]+'\',\''+Expiration_date[i]+'\',\''+Price[i]+'\','+Grant_Id[i]+','+Vendor_Id[i]+','+Category_Id[i]+','+Subcategory_id[i]+','+ItemType_Id[i]+',\''+Building[i]+'\',\''+Cabine[i]+'\',\''+Room[i]+'\',\''+Department[i]+'\',\''+Location_Description[i]+'\',\''+Grp[i]+'\',\''+Lessons_item[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
								 
								  '<a class="menuList" href="javascript:deleteItemById('+Item_Id[i]+')">'+
						  '<img src="../images/Delete.png" alt="delete Icon"></a>'+
						  '</div>'+
                    	'</div>' 
				  );
							
				
					
				 } else {
					 
					 $('#containerList').append(
					  
                          	'<div class="lineContainer">'+
                            '<div class="NameColumn"> <div class="ImgCont"><img src="images/Items/'+imgTodisplay+'" alt="Img Item">'+
							'</div> <p>'+Item_description[i]+'</p></div>'+
                            '<div class="LastColumn"><p>'+Reference[i]+'</p></div>'+
                           	'<div class="EmailColumnAjax"> </div>'+
							'<div class="ActionColumn">'+
								   '<p class="noActions">No Actions</p>'+
						  '</div>'+
                    	'</div>' 
				  );
					 
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
				 
				 		displayCategoriesOnSearchMenu();
						DisplayLessonsOnSearchMenu();
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
	} //  end DisplayItemsFuncton
	



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
						  alert('Error displaying items list');
						  
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
						  alert('Error displaying items list');
						  
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
						  alert('Error displaying items list');
						  
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
						  alert('Error displaying items list');
						  
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

