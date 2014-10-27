var actionBox = true;
var actionBox1 = true;
var actionBox2 = true;
var actionBox3 = true;
var EditCategory = true;
var EditSubCategory = true;





function openBoxNameSearch(){
	
	if(actionBox1 == false || actionBox2 == false || actionBox3 == false){
		document.getElementById("formSearchLast").style.display = 'none';
		document.getElementById("formSearchEmail").style.display = 'none';
		document.getElementById("formSearchTempleId").style.display = 'none';
		actionBox1 = true;
		actionBox2 = true;
		actionBox3 = true;
		}
	
	if(actionBox == true){
		
		document.getElementById("boxSearch").style.display = '-webkit-box';
		document.getElementById("boxSearch").style.display = '-moz-box';
		document.getElementById("boxSearch").style.display = '-ms-flexbox';
		document.getElementById("formSearchName").style.display = 'block';
		
		
		actionBox = false;
		
		} else{
			
			document.getElementById("boxSearch").style.display = 'none';
			document.getElementById("formSearchName").style.display = 'none';
			actionBox = true;
		}
	


}


function openBoxLastSearch(){
	
	
	if(actionBox == false || actionBox2 == false || actionBox3 == false){
		document.getElementById("formSearchName").style.display = 'none';
		document.getElementById("formSearchEmail").style.display = 'none';
		document.getElementById("formSearchTempleId").style.display = 'none';
		actionBox = true;
		actionBox2 = true;
		actionBox3 = true;
		}
	
	
	
	if(actionBox1 == true){
		
		document.getElementById("boxSearch").style.display = '-webkit-box';
		document.getElementById("boxSearch").style.display = '-moz-box';
		document.getElementById("boxSearch").style.display = '-ms-flexbox';
		
		
		document.getElementById("formSearchLast").style.display = 'block';
		
		
		
		
		actionBox1 = false;
		
		} else{
			
			document.getElementById("boxSearch").style.display = 'none';
			document.getElementById("formSearchLast").style.display = 'none';
			actionBox1 = true;
		}
	


}



function openBoxEmailSearch(){
	
	if(actionBox == false || actionBox1 == false || actionBox3 == false){
		document.getElementById("formSearchName").style.display = 'none';
		document.getElementById("formSearchLast").style.display = 'none';
		document.getElementById("formSearchTempleId").style.display = 'none';
		actionBox = true;
		actionBox1 = true;
		actionBox3 = true;
		}
	
	
	if(actionBox2 == true){
		
		document.getElementById("boxSearch").style.display = '-webkit-box';
		document.getElementById("boxSearch").style.display = '-moz-box';
		document.getElementById("boxSearch").style.display = '-ms-flexbox';
		
		document.getElementById("formSearchEmail").style.display = 'block';
		
		
		actionBox2 = false;
		
		} else{
			
			document.getElementById("boxSearch").style.display = 'none';
			document.getElementById("formSearchEmail").style.display = 'none';
			actionBox2 = true;
		}
	
}


function openBoxTempleIdSearch(){
	
	
	
		if(actionBox == false || actionBox1 == false || actionBox2 == false){
		document.getElementById("formSearchName").style.display = 'none';
		document.getElementById("formSearchLast").style.display = 'none';
		document.getElementById("formSearchEmail").style.display = 'none';
		actionBox = true;
		actionBox1 = true;
		actionBox2 = true;
		}
	
	
	if(actionBox3 == true){
		
		document.getElementById("boxSearch").style.display = '-webkit-box';
		document.getElementById("boxSearch").style.display = '-moz-box';
		document.getElementById("boxSearch").style.display = '-ms-flexbox';
		
		document.getElementById("formSearchTempleId").style.display = 'block';
		
		
		actionBox3 = false;
		
		} else{
			
			document.getElementById("boxSearch").style.display = 'none';
			document.getElementById("formSearchTempleId").style.display = 'none';
			actionBox3 = true;
		}
	


}





function checkPassword(){
	
	var pass1 = document.getElementById("pass").value;
	var pass2 = document.getElementById("re_pass").value;
	if (pass1 != pass2){
		 alert("password need be the same");
		 document.getElementById("pass").value = "";
	     document.getElementById("re_pass").value = "";
		 document.getElementById("pass").focus();
		 
		 }
	
	
}





function openModalBox2(){

		document.getElementById("modalBox").style.display = "-webkit-box";
		document.getElementById("modalBox").style.display = "-moz-box";
		document.getElementById("modalBox").style.display = "-ms-flexbox";
		
	setTimeout(function(){
		document.getElementById("editBoxModal").style.opacity = "1";
		document.getElementById("modalBox").style.opacity = "1";
	},100);
	
}

function closeModelPanel(){
	

	document.getElementById("editDisplayBox").style.opacity = "0";
	setTimeout(function(){document.getElementById("editDisplayBox").style.display = "none";},200);
}


function closeModelPanel2(){
	document.getElementById("editBoxModal").style.opacity = "0";
	document.getElementById("modalBox").style.opacity = "0";
	
	
	setTimeout(function(){
		
		document.getElementById("editBoxModal").style.display = "none";
		document.getElementById("modalBox").style.display = "none";
	
	},100);
}






	
		


function DisplayAllInventory(){
	location.href = "items.php?reportAllItems";
}
	
function DisplayPedingToReturn(){
	location.href = "items.php?reportPendingToReturn";
}

function DisplayReportedItems(){
	location.href = "items.php?DisplayReportedItems";
}
function DisplayReportConsumable(){
	location.href = "items.php?DisplayReportConsumable";
}




	


