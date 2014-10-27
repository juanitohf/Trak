
var getInfoUserOnJquery = function(User_Id,Name,Last,User_Type_Id){
	
	window.localStorage.setItem('User_Id',User_Id);
 	window.localStorage.setItem('Name',Name);
	window.localStorage.setItem('Last',Last);
 	window.localStorage.setItem('User_Type_Id',User_Type_Id);
	
}


$(document).ready(function(e) {
    
	
		var dataString = 'DisplayItems=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						
						
					
							
							
							$('#containerList').append(
					  
                          	  
                    	'<div id="lineContainer">'+
                            '<div id="NameColumn">'+
								'<div class="contImg"><img src="images/Items/'+imgTodisplay+'"></div> <p>'+Item_description[i]+'</p>'+
                             '</div>'+
							 '<div id="LastColumn"><p>'+Reference[i]+'</p></div>'+
                             '<div id="EmailColumn">'+StockDisplay+'</div>'+
							 '<div id="ActionColumn">'+
							  	'<a href="generatePDF.php?ItemID='+Reference[i]+'" target="_blank"><img src="../images/logoQR.png" title="Qrcode Items" /></a>'+
							 '</div>'+
                    	'</div>'
				  );
							
				
					
			
			 } // End form loop
				 
				displayCategories();
				DisplayLessons(); 	
					  }else{
						   $('#containerList').html("");
						  alert('Error displaying items list');
						  
						  }
						 
				  }
			});
			return false;
			

});



var displayItemsFunction = function(){
	
	var dataString = 'DisplayItems=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						
						
					
							
							
							$('#containerList').append(
					  
                          	  
                    	'<div id="lineContainer">'+
                            '<div id="NameColumn">'+
								'<div class="contImg"><img src="images/Items/'+imgTodisplay+'"></div> <p>'+Item_description[i]+'</p>'+
                             '</div>'+
							  '<div id="LastColumn"><p>'+Reference[i]+'</p></div>'+
                             '<div id="EmailColumn">'+StockDisplay+'</div>'+
							 '<div id="ActionColumn">'+
							  	'<a href="generatePDF.php?ItemID='+Reference[i]+'" target="_blank"><img src="../images/logoQR.png" title="Qrcode Items" /></a>'+
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
			
	
}// end displayItemsFunction


$('#nameSearch').click(function(){
	


	var dataString = 'descriptionSearchOrde=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						
						
					
							
							
							$('#containerList').append(
					  
                          	  
                    	'<div id="lineContainer">'+
                            '<div id="NameColumn">'+
								'<div class="contImg"><img src="images/Items/'+imgTodisplay+'"></div> <p>'+Item_description[i]+'</p>'+
                             '</div>'+
							 '<div id="LastColumn"><p>'+Reference[i]+'</p></div>'+
                             '<div id="EmailColumn">'+StockDisplay+'</div>'+
							 '<div id="ActionColumn">'+
							  	'<a href="generatePDF.php?ItemID='+Reference[i]+'" target="_blank"><img src="../images/logoQR.png" title="Qrcode Items" /></a>'+
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




});
   
   
   
  
$('#lastSearch').click(function(){
	


	var dataString = 'ReferenceSearchOrder=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						
						
					
							
							
							$('#containerList').append(
					  
                          	  
                    	'<div id="lineContainer">'+
                            '<div id="NameColumn">'+
								'<div class="contImg"><img src="images/Items/'+imgTodisplay+'"></div> <p>'+Item_description[i]+'</p>'+
                             '</div>'+
							 '<div id="LastColumn"><p>'+Reference[i]+'</p></div>'+
                             '<div id="EmailColumn">'+StockDisplay+'</div>'+
							 '<div id="ActionColumn">'+
							  	'<a href="generatePDF.php?ItemID='+Reference[i]+'" target="_blank"><img src="../images/logoQR.png" title="Qrcode Items" /></a>'+
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




});
   
   
   
   
  
  
$('#emailSearch').click(function(){
	


	var dataString = 'stockOrder=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						
						
					
							
							
							$('#containerList').append(
					  
                          	  
                    	'<div id="lineContainer">'+
                            '<div id="NameColumn">'+
								'<div class="contImg"><img src="images/Items/'+imgTodisplay+'"></div> <p>'+Item_description[i]+'</p>'+
                             '</div>'+
							  '<div id="LastColumn"><p>'+Reference[i]+'</p></div>'+
                             '<div id="EmailColumn">'+StockDisplay+'</div>'+
							 '<div id="ActionColumn">'+
							  	'<a href="generatePDF.php?ItemID='+Reference[i]+'" target="_blank"><img src="../images/logoQR.png" title="Qrcode Items" /></a>'+
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




});
   
   
   
   
  
  
$('#actionSearch').click(function(){
	


	var dataString = 'DisplayItems=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						
						
					
							
							
							$('#containerList').append(
					  
                          	  
                    	'<div id="lineContainer">'+
                            '<div id="NameColumn">'+
								'<div class="contImg"><img src="images/Items/'+imgTodisplay+'"></div> <p>'+Item_description[i]+'</p>'+
                             '</div>'+
							  '<div id="LastColumn"><p>'+Reference[i]+'</p></div>'+
                             '<div id="EmailColumn">'+StockDisplay+'</div>'+
							 '<div id="ActionColumn">'+
							  	'<a href="generatePDF.php?ItemID='+Reference[i]+'" target="_blank"><img src="../images/logoQR.png" title="Qrcode Items" /></a>'+
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




});







var displayCategories = function(){
	
	
	
		var dataString = 'displayCategories=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var Category_Id 			= data.Category_Id;
					  var Category_Description 	= data.Category_Description;
					  var checkedStr = "";
					 
			
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








var DisplayLessons = function(){
	
	
	
		var dataString = 'DisplayLessons=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						   $('#lessonItemSearch').html("");
						  alert('Error displaying Lessons');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
} // End displayCategories function 



$('#searchDescriptionButton').click(function(){
	
	var NameItem = $('#descriptionSearch').val();
	
	
		var dataString = 'NameItem='+NameItem+'&SearchItemByName=true';
			
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						
						
					
							
							
							$('#containerList').append(
					  
                          	  
                    	'<div id="lineContainer">'+
                            '<div id="NameColumn">'+
								'<div class="contImg"><img src="images/Items/'+imgTodisplay+'"></div> <p>'+Item_description[i]+'</p>'+
                             '</div>'+
							  '<div id="LastColumn"><p>'+Reference[i]+'</p></div>'+
                             '<div id="EmailColumn">'+StockDisplay+'</div>'+
							 '<div id="ActionColumn">'+
							  	'<a href="generatePDF.php?ItemID='+Reference[i]+'" target="_blank"><img src="../images/logoQR.png" title="Qrcode Items" /></a>'+
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
	
	
});




 
 


$('#searchCategoryButton').click(function(){
	
	var categoryItemSearch = $('#categoryItemSearch').val();
	
	
		var dataString = 'categoryItemSearch='+categoryItemSearch+'&searchCategoryButton=true';
			
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						
						
					
							
							
							$('#containerList').append(
					  
                          	  
                    	'<div id="lineContainer">'+
                            '<div id="NameColumn">'+
								'<div class="contImg"><img src="images/Items/'+imgTodisplay+'"></div> <p>'+Item_description[i]+'</p>'+
                             '</div>'+
							  '<div id="LastColumn"><p>'+Reference[i]+'</p></div>'+
                             '<div id="EmailColumn">'+StockDisplay+'</div>'+
							 '<div id="ActionColumn">'+
							  	'<a href="generatePDF.php?ItemID='+Reference[i]+'" target="_blank"><img src="../images/logoQR.png" title="Qrcode Items" /></a>'+
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
	
	
});





$('#searchReferenceButton').click(function(){
	
	var ReferenceSearch = $('#ReferenceSearch').val();
	
	
		var dataString = 'ReferenceSearch='+ReferenceSearch+'&searchReferenceButton=true';
			
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						
						
					
							
							
							$('#containerList').append(
					  
                          	  
                    	'<div id="lineContainer">'+
                            '<div id="NameColumn">'+
								'<div class="contImg"><img src="images/Items/'+imgTodisplay+'"></div> <p>'+Item_description[i]+'</p>'+
                             '</div>'+
							  '<div id="LastColumn"><p>'+Reference[i]+'</p></div>'+
                             '<div id="EmailColumn">'+StockDisplay+'</div>'+
							 '<div id="ActionColumn">'+
							  	'<a href="generatePDF.php?ItemID='+Reference[i]+'" target="_blank"><img src="../images/logoQR.png" title="Qrcode Items" /></a>'+
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
	
	
});





$('#searchLessonButton').click(function(){
	
	var lessonItemSearch = $('#lessonItemSearch').val();
	
	
		var dataString = 'lessonItemSearch='+lessonItemSearch+'&searchLessonButton=true';
			
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsQrCode.php",
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
						
						
					
							
							
							$('#containerList').append(
					  
                          	  
                    	'<div id="lineContainer">'+
                            '<div id="NameColumn">'+
								'<div class="contImg"><img src="images/Items/'+imgTodisplay+'"></div> <p>'+Item_description[i]+'</p>'+
                             '</div>'+
							  '<div id="LastColumn"><p>'+Reference[i]+'</p></div>'+
                             '<div id="EmailColumn">'+StockDisplay+'</div>'+
							 '<div id="ActionColumn">'+
							  	'<a href="generatePDF.php?ItemID='+Reference[i]+'" target="_blank"><img src="../images/logoQR.png" title="Qrcode Items" /></a>'+
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
	
	
});




   
   
   
   