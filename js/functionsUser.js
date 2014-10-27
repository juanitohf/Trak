/// GLOBALS VARIABLES TO MANAGE THIS FUNCTIONS
var UserType;
var actionImageBox = true;
var actionImageBox1 = true;
var seachMenu = true;
var seachMenuTempleId = true;


var takeinfoUser = function(UserType){
	window.localStorage.setItem('UserTypeSESSION',UserType);
}

$(document).ready(function(e) {
	
  UserType = window.localStorage.getItem('UserTypeSESSION');
  displayUserTypeOnInsertUser(UserType);
    
		var dataString = 'DisplayUsers=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
				
						
					
				 for (var i in User_Id) {
					 
					 	if(UserType > 3){
							
							 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
									'<a href="javascript:OpenModalEditUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
									
									
									'<a class="menuList" href="javascript:DeleteConfirmation('+User_Id[i]+');"><img src="../images/Delete.png" alt="delete Icon"></a>'+
									'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )"  class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
							$('#cityUserInfo').html(Last);	
							$('#zipUserInfo').html(Last);	
							
						
						
						  $('#containerUserReport').append(
					  
							'<a href="javascript:showUserHistory('+User_Id[i]+',\''+Name[i]+'\',\''+Last[i]+'\')" id="linkLineReport">'+
                       			 '<div class="lineReportUser">'+
									 '<div class="lineLeftReport"><p>'+Name[i]+'</p></div>'+
									 '<div class="lineRightReport"><p>'+Last[i]+'</p></div>'+
                        		 '</div>'+
							'</a>'
                                
					  		);
							
							
							
							
							}else{
								
								 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
				'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )" class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
								
								}
					 
                     
			
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
			
});





var displayUsers = function(){
	
	
	
	
	  UserType = window.localStorage.getItem('UserTypeSESSION');
    
		var dataString = 'DisplayUsers=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
				
						
					
				 for (var i in User_Id) {
					 
					 	if(UserType > 3){
							
							 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
									'<a href="javascript:OpenModalEditUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
									
									
									'<a class="menuList" href="javascript:DeleteConfirmation('+User_Id[i]+');"><img src="../images/Delete.png" alt="delete Icon"></a>'+
									'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )"  class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
				

	
		
	$('#cityUserInfo').html(Last);	
	$('#zipUserInfo').html(Last);	
							
							
							}else{
								
								 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
				'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )" class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
								
								}
					 
                     
			
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
			
	
	
	
	
	
	} // end displayUsers functions
 



var viewInfoUser = function(User_Id,Name,MidleName,Last,ImageUser,User_Type_Id,Email,Website,Temple_Id,Cellphone,WorkPhone,HomePhone,Address1,Address2,City,Zip){
	
	
	
	
	$('#modalDisplay').show();
	
	$('#userImg').attr('src','images/Users/'+ImageUser+'');
	
	$('#NameUserInfo').html(Name);
	$('#MiddleUserInfo').html(MidleName);
	$('#LastUserInfo').html(Last);
	
	
	if(User_Type_Id == 1){
			$('#TypeUserInfo').html("Student");
			
	}else if(User_Type_Id == 2){
			$('#TypeUserInfo').html("STAFF");
	}else if(User_Type_Id == 3){
			$('#TypeUserInfo').html("INSTRUCTOR");
	}else if(User_Type_Id == 4){
			$('#TypeUserInfo').html("FACULTY");
	}else{
			$('#TypeUserInfo').html("ADMINISTRATOR");
	}
	
	
	
	$('#emailUserInfo').html(Email);	
	$('#webUserInfo').html(Website);	
	$('#templeIdUserInfo').html(Temple_Id);	
	$('#cellphoneUserInfo').html(Cellphone);	
	$('#homePhoneUserInfo').html(HomePhone);	
					
	
	$('#workPhoneUserInfo').html(WorkPhone);	
	$('#addres1UserInfo').html(Address1);	
	$('#addres2UserInfo').html(Address2);	
	$('#cityUserInfo').html(City);	
	$('#zipUserInfo').html(Zip);	
	
}

$('#closeButtonDisplayInfo').click(function(){
	$('#modalDisplay').hide();
});
	
	
	
	
var OpenModalEditUser = function(User_Id,Name,MidleName,Last,ImageUser,User_Type_Id,Email,Website,Temple_Id,Cellphone,WorkPhone,HomePhone,Address1,Address2,City,State,Zip){
		$('#modalBox').show();
		
		$('#strImagen2').val(ImageUser);
		$('#nameUserEdit').val(Name);
		$('#middleUserEdit').val(MidleName);
		$('#lastUserEdit').val(Last);
		$('#emailUserEdit').val(Email);	
		$('#templeIdUserEdit').val(Temple_Id);	
		$('#webUserEdit').val(Website);	
		$('#cellPhoneUserEdit').val(Cellphone);
		$('#homePhoneUserEdit').val(HomePhone);
		$('#workPhoneUserEdit').val(WorkPhone);
		$('#address1UserEdit').val(Address1);	
		$('#address2UserEdit').val(Address2);
		
		$('#cityUserEdit').val(City);	
		$('#stateUserEdit').val(State);	
		$('#zipUserEdit').val(Zip);
		$('#idUserEdit').val(User_Id);
		
	
		displayUserType(UserType,User_Type_Id);
		
	}
		
		
var displayUserType = function(User_type,User_Type_Id_to_Edit){
	
	
	var dataString = 'User_type='+ User_type +'&DisplayUsersType=true';
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					  var User_Type_Id 	= data.User_Type_Id;
					  var User_Description 		= data.User_Description;
					  var selected;
					
					
					 if (data.Status == 'success'){
						 
						 	 	  
						  $("#userTypeEdit option").remove();
						  
						  	for (var i in User_Type_Id) {
								
								if(User_Type_Id[i] == User_Type_Id_to_Edit){
									selected = "selected";
								}else{
									selected="";
									}
								
								$('#userTypeEdit').append(
									'<option value="'+User_Type_Id[i]+'" '+selected+'>'+User_Description[i]+'</option>'  
					 		    );
							} // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users_Type');
						  
						  }
						 
				  }
			});
			return false;
	
	
	}	
		

$('#closeModelEditUser').click(function(){
	$('#modalBox').hide();
	$('#sentImage').hide();
	actionImageBox = true;
});



$('#updateUser').click(function(){
	
	
		var ImageUser 	= $('#strImagen2').val();
		var Name 		= $('#nameUserEdit').val();
		var MidleName 	= $('#middleUserEdit').val();
		var Last 		= $('#lastUserEdit').val();
		var Email 		= $('#emailUserEdit').val();	
		var Temple_Id 	= $('#templeIdUserEdit').val();	
		var Website 	= $('#webUserEdit').val();	
		var Cellphone 	= $('#cellPhoneUserEdit').val();
		var HomePhone 	= $('#homePhoneUserEdit').val();
		var WorkPhone 	= $('#workPhoneUserEdit').val();
		var Address1 	= $('#address1UserEdit').val();	
		var Address2 	= $('#address2UserEdit').val();
		var City 		= $('#cityUserEdit').val();	
		var State 		= $('#stateUserEdit').val();	
		var Zip 		= $('#zipUserEdit').val();
		var User_Id		 = $('#idUserEdit').val();
		var userTypeEdit = $('#userTypeEdit').val();
		
		
		
		
		if(Name == ""){
			alert("First name field are required");
			$('#nameUserEdit').focus();
		}else if(Last == ""){
			alert("Last name field are required");
			$('#lastUserEdit').focus();
		}else if(Email == ""){
			alert("Email field are required");
			$('#emailUserEdit').focus();
		}else if(Temple_Id == ""){
			alert("Temple Id field are required");
			$('#templeIdUserEdit').focus();
		}else{
			
			
			
			
		var dataString = 'ImageUser='+ ImageUser + '&Name='+ Name +'&MidleName='+ MidleName +'&Last='+ Last + '&Email='+ Email + '&Temple_Id='+ Temple_Id +'&Website='+ Website +'&Cellphone='+ Cellphone + '&HomePhone='+ HomePhone + '&WorkPhone='+ WorkPhone + '&Address1='+ Address1 + '&Address2='+ Address2 +'&City='+ City +'&State='+ State + '&Zip='+ Zip + '&User_Id='+ User_Id +'&userTypeEdit='+ userTypeEdit +'&updateUser=true';
	
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					  var User_Type_Id 	= data.User_Type_Id;
					  var User_Description 		= data.User_Description;
					
					
					 if (data.Status == 'success'){
						 
						 alert("User update successfully");
						displayUsers();
						  
				 
					  }else{
						  
						  alert('Error displaying users_Type');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
		} // End else condition
		
	
	
});



	function DeleteConfirmation(Id_User){
		 var con= confirm('Do you want Delete ');
				if (con == true)
				   {
						 	
							
							
			
		var dataString = 'Id_User='+ Id_User +'&deleteUser=true';
	
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					 if (data.Status == 'success'){
						 
						alert("User deleted successfully");
						 displayUsers();
						
						
					  }else{
						  
						  alert('Error deleting user');
						  
						  }
						 
				  }
			});
			 e.preventDefault();
			
					 }
					else
						  {
						  
						  }
					
					}	 // End funcion Delete				
			





$('#searchNameButton').click(function(){
	
	var NameUser = $('#nameUserSearch').val();


		var dataString = 'NameUser='+NameUser+'&searchNameButton=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
				
						
					
				 for (var i in User_Id) {
					 
					 	if(UserType > 3){
							
							 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
									'<a href="javascript:OpenModalEditUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
									
									
									'<a class="menuList" href="javascript:DeleteConfirmation('+User_Id[i]+');"><img src="../images/Delete.png" alt="delete Icon"></a>'+
									'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )"  class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
				

	
		
	$('#cityUserInfo').html(Last);	
	$('#zipUserInfo').html(Last);	
							
							
							}else{
								
								 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
				'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )" class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
								
								}
					 
                     
			
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
	
	
	});







$('#searchLastButton').click(function(){
	
	var LastUser = $('#LastUserSearch').val();

		var dataString = 'LastUser='+LastUser+'&searchLastButton=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
				
						
					
				 for (var i in User_Id) {
					 
					 	if(UserType > 3){
							
							 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
									'<a href="javascript:OpenModalEditUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
									
									
									'<a class="menuList" href="javascript:DeleteConfirmation('+User_Id[i]+');"><img src="../images/Delete.png" alt="delete Icon"></a>'+
									'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )"  class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
				

	
		
	$('#cityUserInfo').html(Last);	
	$('#zipUserInfo').html(Last);	
							
							
							}else{
								
								 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
				'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )" class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
								
								}
					 
                     
			
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
	
	
	});
	
	
	
	
	
	
$('#searchEmailButton').click(function(){
	
	var EmailUser = $('#EmailUserSearch').val();

		var dataString = 'EmailUser='+EmailUser+'&searchEmailButton=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
				
						
					
				 for (var i in User_Id) {
					 
					 	if(UserType > 3){
							
							 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
									'<a href="javascript:OpenModalEditUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
									
									
									'<a class="menuList" href="javascript:DeleteConfirmation('+User_Id[i]+');"><img src="../images/Delete.png" alt="delete Icon"></a>'+
									'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )"  class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
				

	
		
	$('#cityUserInfo').html(Last);	
	$('#zipUserInfo').html(Last);	
							
							
							}else{
								
								 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
				'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )" class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
								
								}
					 
                     
			
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
	
	
	});








	
$('#searchTempleIdButton').click(function(){
	
	var TempleIdUser = $('#TempleIdUserSearch').val();

		var dataString = 'TempleIdUser='+TempleIdUser+'&searchTempleIdButton=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
				
						
					
				 for (var i in User_Id) {
					 
					 	if(UserType > 3){
							
							 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
									'<a href="javascript:OpenModalEditUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
									
									
									'<a class="menuList" href="javascript:DeleteConfirmation('+User_Id[i]+');"><img src="../images/Delete.png" alt="delete Icon"></a>'+
									'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )"  class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
				

	
		
	$('#cityUserInfo').html(Last);	
	$('#zipUserInfo').html(Last);	
							
							
							}else{
								
								 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
				'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )" class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
								
								}
					 
                     
			
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
	
	
	});




$('.nameSearchOrder').click(function(){ 

	var dataString = 'nameSearchOrder=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
				
						
					
				 for (var i in User_Id) {
					 
					 	if(UserType > 3){
							
							 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
									'<a href="javascript:OpenModalEditUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
									
									
									'<a class="menuList" href="javascript:DeleteConfirmation('+User_Id[i]+');"><img src="../images/Delete.png" alt="delete Icon"></a>'+
									'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )"  class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
				

	
		
	$('#cityUserInfo').html(Last);	
	$('#zipUserInfo').html(Last);	
							
							
							}else{
								
								 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
				'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )" class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
								
								}
					 
                     
			
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
			

});

$('.lastSearchOrder').click(function(){ 

var dataString = 'lastSearchOrder=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
				
						
					
				 for (var i in User_Id) {
					 
					 	if(UserType > 3){
							
							 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
									'<a href="javascript:OpenModalEditUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
									
									
									'<a class="menuList" href="javascript:DeleteConfirmation('+User_Id[i]+');"><img src="../images/Delete.png" alt="delete Icon"></a>'+
									'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )"  class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
				

	
		
	$('#cityUserInfo').html(Last);	
	$('#zipUserInfo').html(Last);	
							
							
							}else{
								
								 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
				'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )" class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
								
								}
					 
                     
			
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;

});

$('.emailSearchOrder').click(function(){ 

	var dataString = 'emailSearchOrder=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
				
						
					
				 for (var i in User_Id) {
					 
					 	if(UserType > 3){
							
							 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
									'<a href="javascript:OpenModalEditUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
									
									
									'<a class="menuList" href="javascript:DeleteConfirmation('+User_Id[i]+');"><img src="../images/Delete.png" alt="delete Icon"></a>'+
									'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )"  class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
				

	
		
	$('#cityUserInfo').html(Last);	
	$('#zipUserInfo').html(Last);	
							
							
							}else{
								
								 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
				'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )" class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
								
								}
					 
                     
			
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;

});

$('.actionSearch').click(function(){ 

		var dataString = 'DisplayUsers=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerList').html("");
				
						
					
				 for (var i in User_Id) {
					 
					 	if(UserType > 3){
							
							 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
									'<a href="javascript:OpenModalEditUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+State[i]+'\',\''+Zip[i]+'\')" class="menuList"><img src="../images/edit.png" alt="edit Icon"></a>'+
									
									
									'<a class="menuList" href="javascript:DeleteConfirmation('+User_Id[i]+');"><img src="../images/Delete.png" alt="delete Icon"></a>'+
									'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )"  class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
				

	
		
	$('#cityUserInfo').html(Last);	
	$('#zipUserInfo').html(Last);	
							
							
							}else{
								
								 $('#containerList').append(
					  
							'<div id="lineContainer">'+
								'<div id="NameColumn"><p>'+Name[i]+'</p></div>'+
								'<div id="LastColumn"><p>'+Last[i]+'</p></div>'+
								'<div id="EmailColumn"><p>'+Email[i]+'</p></div>'+
								'<div id="ActionColumn">'+
				'<a href="javascript:viewInfoUser('+User_Id[i]+',\''+Name[i]+'\',\''+MidleName[i]+'\',\''+Last[i]+'\',\''+ImageUser[i]+'\','+User_Type_Id[i]+',\''+Email[i]+'\',\''+Website[i]+'\',\''+Temple_Id[i]+'\',\''+Cellphone[i]+'\',\''+WorkPhone[i]+'\',\''+HomePhone[i]+'\',\''+Address1[i]+'\',\''+Address2[i]+'\',\''+City[i]+'\',\''+Zip[i]+'\' )" class="menuList"><img src="../images/view2.png" alt="View Icon"></a></div>'+
							'</div>'
                                
					  		);
							
								
								}
					 
                     
			
                  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;


});




$('#imgBtnEditSubmit').click(function(){
	
	if(actionImageBox == true){
	
		$('#sentImage').show();
		$('#sentImage').css('height','100px');
		
		actionImageBox = false;
	}else{
			
		$('#sentImage').css('height','0px');
		$('#sentImage').hide();
		
		
		actionImageBox = true;
	}
	
});






// this is the id of the form
$("#buttonSendImagen2").click(function() {
	
	
	
	var fd = new FormData();    
	fd.append( 'fileImageUser', $('#sentImgFile')[0].files[0]);

$.ajax({
  url: '../PHP/FunctionsUser.php',
  data: fd,
  processData: false,
  contentType: false,
  type: 'POST',
  dataType:"Json",
  success: function(data){
	  
	  if(data.Status == 'success'){
		  
		  var nameImg = data.NameImg;
		  $('#strImagen2').val(nameImg);
		  $('#sentImage').hide();
		  
		  
		 }
	  

  }
});
	
	
	
});






// this is the id of the form
$("#buttonSendImagen").click(function() {
	
	
	
	var fd = new FormData();    
	fd.append( 'fileImageUserInsertUser', $('#imgUserInsert')[0].files[0]);

$.ajax({
  url: '../PHP/FunctionsUser.php',
  data: fd,
  processData: false,
  contentType: false,
  type: 'POST',
  dataType:"Json",
  success: function(data){
	  
	  if(data.Status == 'success'){
		  
		  var nameImg = data.NameImg;
		  $('#strImagen').val(nameImg);
		  $('#sentImageWindow').hide();
		  
		  
		 }
	  

  }
});
	
	
	
});






$('#imgBtnSubmit').click(function(){
	
	if(actionImageBox1 == true){
	
		$('#sentImageWindow').show();
		$('#sentImageWindow').css('height','100px');
		
		actionImageBox1 = false;
	}else{
			
		$('#sentImageWindow').css('height','0px');
		$('#sentImageWindow').hide();
		
		
		actionImageBox1 = true;
	}
	
});




$('#submitUserInsert').click(function(){
	
	
	
	var strImagen 			= $('#strImagen').val();
	var NameUserInsert 		= $('#NameUserInsert').val();
	var midleNameInsert 	= $('#midleNameInsert').val();
	var lastUserInsert 		= $('#lastUserInsert').val();
	var emailUserInsert 	= $('#emailUserInsert').val();
	var templeIdUserInsert 	= $('#templeIdUserInsert').val();
	var webUserInsert 		= $('#webUserInsert').val();
	var passUserInsert 		= $('#pass').val();
	var re_passUserInsert 	= $('#re_pass').val();
	var cellphoneUserInsert = $('#cellphoneUserInsert').val();
	var homePhoneUserInsert = $('#homePhoneUserInsert').val();
	var workPhoneUserInsert = $('#workPhoneUserInsert').val();
	var address1UserInsert 	= $('#address1UserInsert').val();
	var address2UserInsert 	= $('#address2UserInsert').val();
	var cityUserInsert 		= $('#cityUserInsert').val();
	var stateUserInsert 	= $('#stateUserInsert').val();
	var zipUserInsert 		= $('#zipUserInsert').val();
	var typeUserSelect 		= $('#typeUserSelect').val();
	
	
	

	if(NameUserInsert == ""){
		alert("First Name field is required");
		$('#NameUserInsert').focus();
	}else if(lastUserInsert == ""){
		alert("Last Name field is required");
		$('#lastUserInsert').focus();
	}else if(emailUserInsert ==""){
		alert("Email field is required");
		$('#emailUserInsert').focus();
	}else if(templeIdUserInsert ==""){
		alert("Temple Id field is required");
		$('#templeIdUserInsert').focus();
	}else if(passUserInsert == ""){
		alert("Must complete password field");
		$('#passUserInsert').focus();
	}else{
		
		
		
			var dataString = 'strImagen='+strImagen+'&NameUserInsert='+NameUserInsert+'&midleNameInsert='+midleNameInsert+'&lastUserInsert='+lastUserInsert+'&emailUserInsert='+emailUserInsert+'&templeIdUserInsert='+templeIdUserInsert+'&webUserInsert='+webUserInsert+'&passUserInsert='+passUserInsert+'&cellphoneUserInsert='+cellphoneUserInsert+'&homePhoneUserInsert='+homePhoneUserInsert+'&workPhoneUserInsert='+workPhoneUserInsert+'&address1UserInsert='+address1UserInsert+'&address2UserInsert='+address2UserInsert+'&cityUserInsert='+cityUserInsert+'&stateUserInsert='+stateUserInsert+'&zipUserInsert='+zipUserInsert+'&typeUserSelect='+typeUserSelect+'&insertNewUser=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					
					 if (data.Status == 'success'){
							alert("User inserted successfully");
							displayUsers();
							
						 	$('#strImagen').val("");
						 	$('#NameUserInsert').val("");
							$('#midleNameInsert').val("");
							$('#lastUserInsert').val("");
							$('#emailUserInsert').val("");
							$('#templeIdUserInsert').val("");
							$('#webUserInsert').val("");
							$('#pass').val("");
							$('#re_pass').val("");
							$('#cellphoneUserInsert').val("");
							$('#homePhoneUserInsert').val("");
							$('#workPhoneUserInsert').val("");
							$('#address1UserInsert').val("");
							$('#address2UserInsert').val("");
							$('#cityUserInsert').val("");
							$('#stateUserInsert').val("");
							$('#zipUserInsert').val("");
							$('#typeUserSelect').val("");
					
					 }else if(data.Status == 'repeated'){
						 
						alert('This email already exist on the database');
					 }else{
										  
						  alert('Error inserting new user');
						  
						  }
						 
				  }
			});
			return false;
	
		
	} // Ene else condition
	
	
	
	
});









var displayUserTypeOnInsertUser = function(User_type){
	
	
	var dataString = 'User_type='+ User_type +'&DisplayUsersTypeToInsert=true';
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					
					  var User_Type_Id 		= data.User_Type_Id;
					  var User_Description 	= data.User_Description;
					  
					
					
					 if (data.Status == 'success'){
						 
						 
						  	for (var i in User_Type_Id) {
								
								$('#typeUserSelect').append(
									 '<option value="'+User_Type_Id[i]+'">'+User_Description[i]+'</option>'
					 		    );
							} // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users_Type');
						  
						  }
						 
				  }
			});
			return false;
	
	
	}	




$('#btnNameReport').click(function(){
	
	
	var dataString = 'DisplayUsersReportToName=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerUserReport').html("");
				
						
					
							 for (var i in User_Id) {
					 
					 		  $('#containerUserReport').append(
							  
									'<a href="javascript:showUserHistory('+User_Id[i]+',\''+Name[i]+'\',\''+Last[i]+'\')" id="linkLineReport">'+
										 '<div class="lineReportUser">'+
											 '<div class="lineLeftReport"><p>'+Name[i]+'</p></div>'+
											 '<div class="lineRightReport"><p>'+Last[i]+'</p></div>'+
										 '</div>'+
									'</a>'
										
									);
							
							  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
			
	
	
	
	});











$('#btnLastReport').click(function(){
	
	
	var dataString = 'DisplayUsersReportToLast=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerUserReport').html("");
				
						
					
							 for (var i in User_Id) {
					 
					 		  $('#containerUserReport').append(
							  
									'<a href="javascript:showUserHistory('+User_Id[i]+',\''+Name[i]+'\',\''+Last[i]+'\')" id="linkLineReport">'+
										 '<div class="lineReportUser">'+
											 '<div class="lineLeftReport"><p>'+Name[i]+'</p></div>'+
											 '<div class="lineRightReport"><p>'+Last[i]+'</p></div>'+
										 '</div>'+
									'</a>'
										
									);
							
							  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
			
	
	
	
	});
	
	
	
	
	
		
$('#templeIdReport').click(function(){
		
		var TempleId = $('#templeIDSearchReport').val();
		
		if(TempleId == ""){
			alert("Field empty, insert a Temple Id");
			$('#templeIDSearchReport').focus();
			
		}else{
		
	var dataString = 'TempleId='+TempleId+'&SearchUsersReportToTempleId=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerUserReport').html("");
				
						
					
							 for (var i in User_Id) {
					 
					 		  $('#containerUserReport').append(
							  
									'<a href="javascript:showUserHistory('+User_Id[i]+',\''+Name[i]+'\',\''+Last[i]+'\')" id="linkLineReport">'+
										 '<div class="lineReportUser">'+
											 '<div class="lineLeftReport"><p>'+Name[i]+'</p></div>'+
											 '<div class="lineRightReport"><p>'+Last[i]+'</p></div>'+
										 '</div>'+
									'</a>'
										
									);
							
							  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
			
	
		}
		
		
		
	});
	
	
	
	
$('#nameReport').click(function(){
		
		var NameSearch = $('#nameSearchReport').val();
		
		if(NameSearch == ""){
			alert("Field empty, insert a Name");
			$('#nameSearchReport').focus();
			
		}else{
		
	var dataString = 'NameSearch='+NameSearch+'&SearchUsersReportToName=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerUserReport').html("");
				
						
					
							 for (var i in User_Id) {
					 
					 		  $('#containerUserReport').append(
							  
									'<a href="javascript:showUserHistory('+User_Id[i]+',\''+Name[i]+'\',\''+Last[i]+'\')" id="linkLineReport">'+
										 '<div class="lineReportUser">'+
											 '<div class="lineLeftReport"><p>'+Name[i]+'</p></div>'+
											 '<div class="lineRightReport"><p>'+Last[i]+'</p></div>'+
										 '</div>'+
									'</a>'
										
									);
							
							  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
			
	
		}
		
		
		
	});
	
	
	







var showUserHistory = function(User_Id,Name,Last){
	
	

	var dataString = 'User_Id='+ User_Id +'&showUserHistory=true';
	
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  	
					 var transition_Id 			= data.transition_Id; 
					 var Start_Date 			= data.Start_Date; 
					 var Start_End 				= data.Start_End; 
					 var Time_Transaction 		= data.Time_Transaction; 
					 var ImagenItem 			= data.ImagenItem; 
					 var Item_description 		= data.Item_description; 
					 var Quantity 				= data.Quantity; 
					 var Transaction_Status_Id 	= data.Transaction_Status_Id; 
					  var Stuff_Confirmation_Id = data.Stuff_Confirmation_Id; 
					 var NameStaffReport 		= data.NameStaffReport; 
					 var LastStaffReport 		= data.LastStaffReport; 
					 var NumRows 				= data.NumRows; 
				
					 
					 var ItemStatus;
					 
				
			
					
					 if (data.Status == 'success'){
						 
						 if(NumRows == 0){
							 
							 	
								$('#boxContainerReport').hide();
								$('#formBtnReport').hide();
								$('#boxContainerReportMessage').show();
								$('#titleUserReportEmpty').html("No result found, select another user");
								
							 
						}else{
								
						$('#boxContainerReportMessage').hide();
						$('#boxContainerReport').show();
						$('#formBtnReport').show();
						
						
						
						$('#titleUserReport').html('Report of '+Name+'  '+Last +'');
						$('#UserReportID').val(User_Id);
											 
						$('#LoopReportContainer').html("");
						 
						  	for (var i in transition_Id) {
								
									if(Transaction_Status_Id[i] == 1){
										
										ItemStatus = '<p id="Green">Item In</p>';
									}else{
										ItemStatus = '<p id="Red">Item Out</p>';
									}
									 
								
								$('#LoopReportContainer').append(
									 
									 '<div id="containerReportLoop">'+
	 							 		'<div id="leftContainerReport">'+
                                            	'<div class="LLCR">'+
                                                    '<img src="images/Items/'+ImagenItem[i]+'" alt="item Img"> '+
                                                '</div>'+
                                                '<div class="LLCR">'+
                                           			'<p>Quantity: <span id="spanRed"> '+Quantity[i]+'</span></p>'+
                                        		'</div>'+
                                    		'</div>'+
                                    
                                    		'<div id="rightContainerReport">'+
                                            	 '<div class="lineRightContainerReport">'+
                                        			 '<p> <span id="spanBlue">'+Item_description[i]+'</span></p>'+
                                    			 '</div>'+
                                                 '<div class="lineRightContainerReport">'+
                                                    '<div class="labelReport"><p>Start_Date:</p></div>'+
                                                    '<div class="AnswerReport"><p>'+Start_Date[i]+'</p></div>'+
                                                    '<div class="labelReport"><p>Return_Date:</p></div>'+
                                                    '<div class="AnswerReport"><p>'+Start_End[i]+'</p></div>'+
                                                 '</div>'+
                                            	'<div class="lineRightContainerReport">'+
                                                	'<div class="labelReport"><p>Status:</p></div>'+
                                                    '<div class="AnswerReport">'+ItemStatus+'</div>'+
                                            
                                                    '<div class="labelReport"><p>Staff:</p></div>'+
                                                    '<div class="AnswerReport"><p>'+NameStaffReport[i]+'  '+LastStaffReport[i] +' </p></div>'+
                                                '</div>'+
                                            
                                            
                                            '</div>'
											
									 		 
					 		    );
							} // End form loop
						}
				 
					  }else{
						  
						  alert('Error displaying users_Type');
						  
						  }
						 
				  }
			});
			e.preventDefault();

	
	
	} //end showUserHistory function
	
	
$('#leftSearchReport').click(function(){
	
		$('#templeIdFormReport').hide();
	$('#nameFormReport').hide();
	
	if(seachMenu == true){
		
		$('#containerFormSearch').css('height','80px');
		$('#containerFormSearch').css('border','1px inset #e7e7e7');
		setTimeout(function(){
			$('#nameFormReport').show();
		},1000);
		
		
		seachMenu = false;
	}else{
		
		$('#nameFormReport').hide();
		$('#containerFormSearch').css('height','0px');
		setTimeout(function(){
			$('#containerFormSearch').css('border','none');
		},1000);
		seachMenu = true;
	}
	
});



$('#rightSearchReport').click(function(){
	
	$('#templeIdFormReport').hide();
	$('#nameFormReport').hide();
	
	if(seachMenuTempleId == true){
		
		$('#containerFormSearch').css('height','80px');
		$('#containerFormSearch').css('border','1px inset #e7e7e7');
		setTimeout(function(){
			$('#templeIdFormReport').show();
		},1000);
			
		seachMenuTempleId = false;
	}else{
		
		$('#templeIdFormReport').hide();
		$('#containerFormSearch').css('height','0px');
		setTimeout(function(){
			$('#containerFormSearch').css('border','none');
		},1000);
		seachMenuTempleId = true;
	}
	
});
	
	
	
	
$('#nameReport').click(function(){
	
	
	
	var nameToSearch = $('#nameSearchReport').val();
	
	var dataString = 'nameToSearch='+nameToSearch+'SearchByNameReport=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerUserReport').html("");
				
						
					
							 for (var i in User_Id) {
					 
					 		  $('#containerUserReport').append(
							  
									'<a href="javascript:showUserHistory('+User_Id[i]+',\''+Name[i]+'\',\''+Last[i]+'\')" id="linkLineReport">'+
										 '<div class="lineReportUser">'+
											 '<div class="lineLeftReport"><p>'+Name[i]+'</p></div>'+
											 '<div class="lineRightReport"><p>'+Last[i]+'</p></div>'+
										 '</div>'+
									'</a>'
										
									);
							
							  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
	
});








$('#templeIdReport').click(function(){
	
	
	
	var TempleId = $('#templeIDSearchReport').val();
	
	var dataString = 'TempleId='+TempleId+'SearchByTempleId=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsUser.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
					  var User_Id 	= data.User_Id;
					  var Name 		= data.Name;
					  var MidleName = data.MidleName;
					  var Last 		= data.Last;
					  var Temple_Id = data.Temple_Id;
					  var ImageUser = data.ImageUser;
					  var Email 	= data.Email;
					  var Cellphone = data.Cellphone;
					  var Address1 	= data.Address1;
					  var Address2 	= data.Address2;
					  var City = data.City;
					  var State = data.State;
					  var Zip 	= data.Zip;
					  var HomePhone = data.HomePhone;
					  var WorkPhone 	= data.WorkPhone;
					  var Website 	= data.Website;	
					  var User_Type_Id 	= data.User_Type_Id;
					
					
					 if (data.Status == 'success'){
						  
						$('#containerUserReport').html("");
				
						
					
							 for (var i in User_Id) {
					 
					 		  $('#containerUserReport').append(
							  
									'<a href="javascript:showUserHistory('+User_Id[i]+',\''+Name[i]+'\',\''+Last[i]+'\')" id="linkLineReport">'+
										 '<div class="lineReportUser">'+
											 '<div class="lineLeftReport"><p>'+Name[i]+'</p></div>'+
											 '<div class="lineRightReport"><p>'+Last[i]+'</p></div>'+
										 '</div>'+
									'</a>'
										
									);
							
							  } // End form loop
				 
				 
					  }else{
						  
						  alert('Error displaying users');
						  
						  }
						 
				  }
			});
			return false;
	
	
	
	
});


$(document).keypress(function(e) {
    if(e.which == 13) {
		// I want this function to avoid press enter and submit the form automatically
    }
});
