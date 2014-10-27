

var takeinfoUser = function(UserType, UserId){
	window.localStorage.setItem('UserType',UserType);
	window.localStorage.setItem('UserId',UserId);
}


/// GLOBALS VARIABLES TO MANAGE THIS FUNCTIONS

var imgTodisplay;
var UserType = window.localStorage.getItem('UserType');
var UserId = window.localStorage.getItem('UserId');



$(document).ready(function(e) {
    
	displayUserInserTag();
		var dataString = 'DisplayGroups=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
					  var GroupId 			= data.GroupId;
					  var Group_Description = data.Group_Description;
					  var Start_Date 		= data.Start_Date;
					  var End_Date 			= data.End_Date;
					  var DirerenciaDate 	= data.DirerenciaDate;
					  
					  var Start_Date_Mysql 	= data.Start_Date_Mysql;
					  var End_Date_Mysql 	= data.End_Date_Mysql;
				
					  var IdStyle;
					
					 if (data.Status == 'success'){
						  
						  
						   
						$('#containerBoxGroup').html("");
						
					
					 for (var i in GroupId) {
						 
						
						 if(Number(DirerenciaDate[i]) < 0){
							IdStyle = 'ExpiredDate';
							
						}else{
						
							IdStyle = 'CurrentDate';
							}
					 	
					 $('#containerBoxGroup').append(
					 
                    		'<div class="lineGroupBox">'+
								'<div class="pgroup"><a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')">'+Group_Description[i]+'</a></div>'+
								'<div class="pgroup1"> <a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')" id="'+IdStyle+'">'+End_Date[i]+'</a></div>'+
							 '</div>'
                            
					
					 );     
	 } // End form loop
				 
				 	
					  }else{
						   $('#containerBoxGroup').html("");
						  alert('Error displaying Groups ');
						  
						  }
						 
				  }
			});
			return false;
			

});





var displayInitialGroup = function(){
	
	
	
	
	displayUserInserTag();
		var dataString = 'DisplayGroups=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
					  var GroupId 			= data.GroupId;
					  var Group_Description = data.Group_Description;
					  var Start_Date 		= data.Start_Date;
					  var End_Date 			= data.End_Date;
					  var DirerenciaDate 	= data.DirerenciaDate;
					  
					  var Start_Date_Mysql 	= data.Start_Date_Mysql;
					  var End_Date_Mysql 	= data.End_Date_Mysql;
				
					  var IdStyle;
					
					 if (data.Status == 'success'){
						  
						  
						   
						$('#containerBoxGroup').html("");
						
					
					 for (var i in GroupId) {
						 
						
						 if(Number(DirerenciaDate[i]) < 0){
							IdStyle = 'ExpiredDate';
							
						}else{
						
							IdStyle = 'CurrentDate';
							}
					 	
					 $('#containerBoxGroup').append(
					 
                    		'<div class="lineGroupBox">'+
								'<div class="pgroup"><a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')">'+Group_Description[i]+'</a></div>'+
								'<div class="pgroup1"> <a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')" id="'+IdStyle+'">'+End_Date[i]+'</a></div>'+
							 '</div>'
                            
					
					 );     
	 } // End form loop
				 
				 	
					  }else{
						   $('#containerBoxGroup').html("");
						  alert('Error displaying Groups ');
						  
						  }
						 
				  }
			});
			return false;
			
	
	
	
} // displayInitialGroup








var displayGroupRightArticle = function(GroupId,Group_Description,Start_Date,End_Date,DirerenciaDate,Start_Date_Mysql,End_Date_Mysql){
	
	
	
	$('#rightArticleList').show();
	$('#ButtonEditModal').html("");
	$('#rightArticleListSelect').css('display','none');
	
	$('#nameGroupInfo').html(Group_Description);
	$('#StartDateInfo').html(Start_Date);
	
	if(DirerenciaDate < 0 ){
		$('#EndDateInfo').html(End_Date);
		$('#EndDateInfo').css('color','red');
	}else{
		$('#EndDateInfo').html(End_Date);
		$('#EndDateInfo').css('color','green');

	}
	
	if(UserType >= 3){
		 $('#ButtonEditModal').append(
				'<button type="button" id="editGroupButton" onClick="modalBoxGroup('+GroupId+',\''+Group_Description+'\',\''+Start_Date_Mysql+'\',\''+End_Date_Mysql+'\','+DirerenciaDate+');"> Edit Group </button>'
			);     
	}
	
	
	var dataString = 'GroupId='+GroupId+'&DisplayMembersGroups=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
				  
				      var User_Id 			= data.User_Id;
					  var Name 				= data.Name;
					  var Last 				= data.Last;
					  var User_Type_Id 		= data.User_Type_Id;
					  var GroupId 			= data.GroupId;
					  var Group_Description = data.Group_Description;
					  var Start_Date 		= data.Start_Date;
					  var End_Date 			= data.End_Date;
					  var DirerenciaDate 	= data.DirerenciaDate;
					  
					  var Start_Date_Mysql 	= data.Start_Date_Mysql;
					  var End_Date_Mysql 	= data.End_Date_Mysql;
				
				
					
					 if (data.Status == 'success'){
						  	 
						$('#containerMembers').html("");
						$('#containerInstructor').html("");
					
						
					 for (var i in User_Id) {
						 
						 if(User_Type_Id[i] != 3){ 
					 
							 $('#containerMembers').append(
								'<div class="lineGroupMembers"><p>'+Name[i]+'  '+Last[i]+' </p></div>'
							 );     
						}else{
               			
							 $('#containerInstructor').append(
								'<div class="lineGroupMembers"><p>'+Name[i]+'  '+Last[i]+' </p></div>'
							 );     
						}
					 
					 	 
			 } // End form loop
			 
			 	
				 	
					  }else{
						   $('#containerBoxGroup').html("");
						  alert('Error displaying Groups ');
						  
						  }
						 
				  }
			});
			 e.preventDefault();
	
	

}



  
function modalBoxGroup(GroupId,Group_Description,Start_Date_Mysql,End_Date_Mysql,DirerenciaDate){
	

	 
	$('#modalEditBox').show();	
	$('#GroupNameEdit').val(Group_Description);
	$('#StartDateEdit').val(Start_Date_Mysql);
	$('#EndDateEdit').val(End_Date_Mysql);
	$('#idGroup').val(GroupId);
	
	
		var dataString = 'GroupId='+GroupId+'&DisplayUsers=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
				  
				      var User_Id 			= data.User_Id;
					  var Name 				= data.Name;
					  var Last 				= data.Last;
					  var User_Type_Id 		= data.User_Type_Id;
					  var User_Id_Group 	= data.User_Id_Group;
					  var checked;
					
					 if (data.Status == 'success'){
						  	 
						$('#listStudetModal').html("");
						$('#listInstructorModal').html("");
					
						
					 for (var i in User_Id) {
						  var checked = "";
						  for(var s = 0; s < User_Id_Group.length; s++){
							  
							  if(User_Id_Group[s] == User_Id[i]){
								  var checked = 'checked';
								 }
							}
						 
						 
						 
						 if(User_Type_Id[i] != 3){ 
					 
							 $('#listStudetModal').append(
							   '<div class="line1Student">'+
							 	   '<div><input type="checkbox" name="StudentsEdit" value="'+User_Id[i]+'" '+checked+'/></div><div><p>'+Name[i]+'  '+Last[i]+' </p></div>'+
							    '</div>'
							 );     
						}else{
               			
							 $('#listInstructorModal').append(
								 '<div class="lineInstructor">'+
							 	   '<div><input type="checkbox" name="InstructorEdit" value="'+User_Id[i]+'" '+checked+'/></div><div><p>'+Name[i]+'  '+Last[i]+' </p></div>'+
							    '</div>'
							 );     
						}
					 
					 	 
			 } // End form loop
			 
			 	
				 	
					  }else{
						   $('#containerBoxGroup').html("");
						  alert('Error displaying Groups ');
						  
						  }
						 
				  }
			});
			return false;
	
	
	

}


$('#closeButton').click(function(){
	
	$('#modalEditBox').hide();
	$('#GroupNameEdit').val("");
	$('#StartDateEdit').val("");
	$('#EndDateEdit').val("");
});
	
	
$('#EditGroupButton').click(function(){
	

	
			var GroupNameEdit	= 	$('#GroupNameEdit').val();
			var StartDateEdit	=	$('#StartDateEdit').val();
			var EndDateEdit		=	$('#EndDateEdit').val();
			var GroupId			=	$('#idGroup').val();
	
			var StudentsEdit = [];
			$('[name="StudentsEdit"]:checked').each(function(i,e) {
				StudentsEdit.push(e.value);
			});

			StudentsEdit = StudentsEdit.join(',');
			StudentsEdit = String(StudentsEdit);

			
			
	
			var InstructorEdit = [];
			$('[name="InstructorEdit"]:checked').each(function(i,e) {
				InstructorEdit.push(e.value);
			});

			InstructorEdit = InstructorEdit.join(',');
			InstructorEdit = String(InstructorEdit);
			
			if(GroupNameEdit == ""){
				
					alert("Group Name are required");
					$('#GroupNameEdit').focus();
			}else if(StartDateEdit == ""){
				
				alert("Start date are required");
				$('#StartDateEdit').focus();
			}else if(EndDateEdit == ""){
				
				alert("End date are required");
				$('#EndDateEdit').focus();
			}else if(StudentsEdit == ""){
				alert("Select member to the group");
				
			}else if(InstructorEdit == ""){
				alert("Select instructor to the group");
				
			}else{
			
	
			
			var dataString = 'GroupNameEdit='+GroupNameEdit+'&StartDateEdit='+StartDateEdit+'&EndDateEdit='+EndDateEdit+'&GroupId='+GroupId+'&StudentsEdit='+StudentsEdit+'&InstructorEdit='+InstructorEdit+'&UpdateGroup=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
					 if (data.Status == 'success'){
						 
						displayGroupFunction();
						$('#rightArticleList').hide();
						$('#rightArticleListSelect').css('display','-webkit-box');
						$('#rightArticleListSelect').css('display','-moz-box');
						
						alert("Group Update Successfully");
			 	
					  }else{
						
						
						  
						  }
						 
				  }
			});
			return false;
			
			
			
			
			} // end else condition
			
			
			
			
			
});
	
	
	
var displayGroupFunction = function(){
	
	
	
	var dataString = 'DisplayGroups=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
					  var GroupId 			= data.GroupId;
					  var Group_Description = data.Group_Description;
					  var Start_Date 		= data.Start_Date;
					  var End_Date 			= data.End_Date;
					  var DirerenciaDate 	= data.DirerenciaDate;
					  
					  var Start_Date_Mysql 	= data.Start_Date_Mysql;
					  var End_Date_Mysql 	= data.End_Date_Mysql;
				
					  var IdStyle;
					
					 if (data.Status == 'success'){
						  
						  
						   
						$('#containerBoxGroup').html("");
						
					
					 for (var i in GroupId) {
						 
						
						 if(Number(DirerenciaDate[i]) < 0){
							IdStyle = 'ExpiredDate';
							
						}else{
						
							IdStyle = 'CurrentDate';
							}
					 	
					 $('#containerBoxGroup').append(
					 
                    		'<div class="lineGroupBox">'+
								'<div class="pgroup"><a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')">'+Group_Description[i]+'</a></div>'+
								'<div class="pgroup1"> <a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')" id="'+IdStyle+'">'+End_Date[i]+'</a></div>'+
							 '</div>'
                            
					
					 );     
	 } // End form loop
				 
				 	
					  }else{
						   $('#containerBoxGroup').html("");
						  alert('Error displaying Groups ');
						  
						  }
						 
				  }
			});
			return false;
	
	} // end displayGroupFunction
	
	
	
var displayUserInserTag = function(){
		
		var dataString = 'DisplayUsersInsert=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
				  
				      var User_Id 			= data.User_Id;
					  var Name 				= data.Name;
					  var Last 				= data.Last;
					  var User_Type_Id 		= data.User_Type_Id;
					 
					
					 if (data.Status == 'success'){
						  	 
						$('#listInstructor').html("");
						$('#listStudet').html("");
					
						
					 for (var i in User_Id) {
						
						 
						 
						 if(User_Type_Id[i] != 3){ 
					 
							 $('#listStudet').append(
							   '<div class="line1Student">'+
							 	   '<div><input type="checkbox" name="StudentsEditInsert" value="'+User_Id[i]+'" /></div><div><p>'+Name[i]+'  '+Last[i]+' </p></div>'+
							    '</div>'
							 );     
						}else{
               			
							 $('#listInstructor').append(
								 '<div class="lineInstructor">'+
							 	   '<div><input type="checkbox" name="InstructorEditInsert" value="'+User_Id[i]+'" /></div><div><p>'+Name[i]+'  '+Last[i]+' </p></div>'+
							    '</div>'
							 );     
						}
					 
					 	 
			 } // End form loop
			 
			 	
				 	
					  }else{
						   
						  alert('Error displaying Members ');
						  
						  }
						 
				  }
			});
			return false;
	
	
} // End function displayUserInsaertTag










	
$('#GroupButton').click(function(){
	

	
			var GroupNameInsert	= 	$('#GroupNameInsert').val();
			var StartDateInsert	=	$('#StartDateInsert').val();
			var EndDateInsert	=	$('#EndDateInsert').val();
		
	
			var StudentsInsert = [];
			$('[name="StudentsEditInsert"]:checked').each(function(i,e) {
				StudentsInsert.push(e.value);
			});

			StudentsInsert = StudentsInsert.join(',');
			StudentsInsert = String(StudentsInsert);
		
			
		
			var InstructorInsert = [];
			$('[name="InstructorEditInsert"]:checked').each(function(i,e) {
				InstructorInsert.push(e.value);
			});

			InstructorInsert = InstructorInsert.join(',');
			InstructorInsert = String(InstructorInsert);
				
			
			if(GroupNameInsert == ""){
				
					alert("Group Name are required");
					$('#GroupNameEdit').focus();
			}else if(StartDateInsert == ""){
				
				alert("Start date are required");
				$('#StartDateEdit').focus();
			}else if(EndDateInsert == ""){
				
				alert("End date are required");
				$('#EndDateEdit').focus();
			}else if(StudentsInsert == ""){
				alert("Select member to the group");
				
			}else if(InstructorInsert == ""){
				alert("Select instructor to the group");
				
			}else{
			
			
			
			var GroupNameInsert	= 	$('#GroupNameInsert').val();
			var StartDateInsert	=	$('#StartDateInsert').val();
			var EndDateInsert	=	$('#EndDateInsert').val();
	
			
			var dataString = 'GroupNameInsert='+GroupNameInsert+'&StartDateInsert='+StartDateInsert+'&EndDateInsert='+EndDateInsert+'&StudentsInsert='+StudentsInsert+'&InstructorInsert='+InstructorInsert+'&InsertGroup=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
					 if (data.Status == 'success'){
						 
						$('#GroupNameInsert').val("");
						$('#StartDateInsert').val("");
						$('#EndDateInsert').val("");
						displayUserInserTag();
						displayInitialGroup();
						
						alert("Group Inserted Successfully");
			 	
					  }else if (data.Status == 'repeated')
					  
					  	alert("This Group name already exist, please choose another name");
					  else{
						
						alert("Error creating a group");
						  
						  }
						 
				  }
			});
			return false;
			
			
			
			
			} // end else condition
			
			
			
			
			
});






$('#orderGroupName').click(function(){
	var dataString = 'DisplayGroupsByName=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
					  var GroupId 			= data.GroupId;
					  var Group_Description = data.Group_Description;
					  var Start_Date 		= data.Start_Date;
					  var End_Date 			= data.End_Date;
					  var DirerenciaDate 	= data.DirerenciaDate;
					  
					  var Start_Date_Mysql 	= data.Start_Date_Mysql;
					  var End_Date_Mysql 	= data.End_Date_Mysql;
				
					  var IdStyle;
					
					 if (data.Status == 'success'){
						  
						  
						   
						$('#containerBoxGroup').html("");
						
					
					 for (var i in GroupId) {
						 
						
						 if(Number(DirerenciaDate[i]) < 0){
							IdStyle = 'ExpiredDate';
							
						}else{
						
							IdStyle = 'CurrentDate';
							}
					 	
					 $('#containerBoxGroup').append(
					 
                    		'<div class="lineGroupBox">'+
								'<div class="pgroup"><a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')">'+Group_Description[i]+'</a></div>'+
								'<div class="pgroup1"> <a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')" id="'+IdStyle+'">'+End_Date[i]+'</a></div>'+
							 '</div>'
                            
					
					 );     
	 } // End form loop
				 
				 	
					  }else{
						   $('#containerBoxGroup').html("");
						  alert('Error displaying Groups ');
						  
						  }
						 
				  }
			});
			return false;
	
});






$('#orderGroupDate').click(function(){
	var dataString = 'DisplayGroupsByDate=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
					  var GroupId 			= data.GroupId;
					  var Group_Description = data.Group_Description;
					  var Start_Date 		= data.Start_Date;
					  var End_Date 			= data.End_Date;
					  var DirerenciaDate 	= data.DirerenciaDate;
					  
					  var Start_Date_Mysql 	= data.Start_Date_Mysql;
					  var End_Date_Mysql 	= data.End_Date_Mysql;
				
					  var IdStyle;
					
					 if (data.Status == 'success'){
						  
						  
						   
						$('#containerBoxGroup').html("");
						
					
					 for (var i in GroupId) {
						 
						
						 if(Number(DirerenciaDate[i]) < 0){
							IdStyle = 'ExpiredDate';
							
						}else{
						
							IdStyle = 'CurrentDate';
							}
					 	
					 $('#containerBoxGroup').append(
					 
                    		'<div class="lineGroupBox">'+
								'<div class="pgroup"><a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')">'+Group_Description[i]+'</a></div>'+
								'<div class="pgroup1"> <a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')" id="'+IdStyle+'">'+End_Date[i]+'</a></div>'+
							 '</div>'
                            
					
					 );     
	 } // End form loop
				 
				 	
					  }else{
						   $('#containerBoxGroup').html("");
						  alert('Error displaying Groups ');
						  
						  }
						 
				  }
			});
			return false;
	
});


	



$('#buttonGroup').click(function(){
	
	var groupSearchName = $('#groupSearchName').val();
	
	var dataString = 'groupSearchName='+groupSearchName+'&SearchByGroupName=true';
			
			$.ajax({
				  type: "POST",
				  url: "../PHP/FunctionsGroups.php",
				  data: dataString,
				  dataType:"Json",
				  success: function(data) {
					  
				  
					  var GroupId 			= data.GroupId;
					  var Group_Description = data.Group_Description;
					  var Start_Date 		= data.Start_Date;
					  var End_Date 			= data.End_Date;
					  var DirerenciaDate 	= data.DirerenciaDate;
					  
					  var Start_Date_Mysql 	= data.Start_Date_Mysql;
					  var End_Date_Mysql 	= data.End_Date_Mysql;
				
					  var IdStyle;
					
					 if (data.Status == 'success'){
						  
						  
						   
						$('#containerBoxGroup').html("");
						
					
					 for (var i in GroupId) {
						 
						
						 if(Number(DirerenciaDate[i]) < 0){
							IdStyle = 'ExpiredDate';
							
						}else{
						
							IdStyle = 'CurrentDate';
							}
					 	
					 $('#containerBoxGroup').append(
					 
                    		'<div class="lineGroupBox">'+
								'<div class="pgroup"><a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')">'+Group_Description[i]+'</a></div>'+
								'<div class="pgroup1"> <a href="javascript:displayGroupRightArticle('+GroupId[i]+',\''+Group_Description[i]+'\',\''+Start_Date[i]+'\',\''+End_Date[i]+'\','+DirerenciaDate[i]+',\''+Start_Date_Mysql[i]+'\',\''+End_Date_Mysql[i]+'\')" id="'+IdStyle+'">'+End_Date[i]+'</a></div>'+
							 '</div>'
                            
					
					 );     
	 } // End form loop
				 
				 	
					  }else{
						   $('#containerBoxGroup').html("");
						
						  
						  }
						 
				  }
			});
			return false;
	
});