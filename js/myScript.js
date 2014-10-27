var active = true;
var activeLO = true;
var activeSearch = true;
var activeSearchDescription = true;
var activeBoxContainerSearchN = true;
var activeBoxContainerSearchL = true;
var activeBoxContainerSearchD = true;
var activeBoxContainerSearchS = true;
var openBoxSearchByName = true;
var openBoxSearchByTemple = true;





var User_Id = window.localStorage.getItem('UserId');

function openLoginBar()
{
	if(active == true)
	{
		document.getElementById("loginBox").style.height = "45px";
		
		
		setTimeout(function(){
			document.getElementById("formLogin").style.display = "-webkit-box";
			document.getElementById("formLogin").style.display = "-moz-box";
			document.getElementById("formLogin").style.display = "-ms-flexbox";
			
			}, 500);
		active = false;
	}else
		{
			document.getElementById("loginBox").style.height = "0px";
			document.getElementById("formLogin").style.display = "none";
			active = true;
			
		}
	
	
}




function openLogoutBar()
{
	if(activeLO  == true)
	{
		document.getElementById("loginBox").style.height = "35px";
		document.getElementById("loginBox").style.width = "250px";
		document.getElementById("loginBox").style.left = "150px";
		
		
		setTimeout(function(){
			document.getElementById("logout1").style.display = "-webkit-box";
			document.getElementById("logout1").style.display = "-moz-box";
			document.getElementById("logout1").style.display = "-ms-flexbox";
			}, 500);
		setTimeout(
		function(){
			document.getElementById("logout2").style.display = "-webkit-box";
			document.getElementById("logout2").style.display = "-moz-box";
			document.getElementById("logout2").style.display = "-ms-flexbox";
		
		}, 500);
		setTimeout(function(){
			
			document.getElementById("logoutP").style.display = "-webkit-box";
			document.getElementById("logoutP").style.display = "-moz-box";
			document.getElementById("logoutP").style.display = "-ms-flexbox";
			
			}, 500);
		activeLO = false;
	}else
		{
			document.getElementById("loginBox").style.height = "0px";
			document.getElementById("logout1").style.display = "none";
			document.getElementById("logout2").style.display = "none";
			document.getElementById("logoutP").style.display = "none";
			activeLO = true;
			
		}
	
	
}

function openSearch(){
	
	if(activeSearch == true){
		
		document.getElementById("searchDiv").style.height = "120px";
		document.getElementById("searchDiv").style.borderLeft = "1px";
		document.getElementById("searchDiv").style.borderRight = "1px";
		document.getElementById("searchDiv").style.borderStyle = "inset";
		document.getElementById("searchDiv").style.borderColor= "#14471c";
		
		
		setTimeout(function(){ 
		document.getElementById("formSearch1").style.display = "-webkit-box";
		document.getElementById("formSearch2").style.display = "-webkit-box";
		document.getElementById("formSearch3").style.display = "-webkit-box";
		document.getElementById("formSearch4").style.display = "-webkit-box";
		
		document.getElementById("formSearch1").style.display = "-moz-box";
		document.getElementById("formSearch2").style.display = "-moz-box";
		document.getElementById("formSearch3").style.display = "-moz-box";
		document.getElementById("formSearch4").style.display = "-moz-box";
		
		document.getElementById("formSearch1").style.display = "-ms-flexbox";
		document.getElementById("formSearch2").style.display = "-ms-flexbox";
		document.getElementById("formSearch3").style.display = "-ms-flexbox";
		document.getElementById("formSearch4").style.display = "-ms-flexbox";
		
		},300);
		
		
		activeSearch = false;
		}else{
		
		setTimeout(function(){ 
		document.getElementById("searchDiv").style.height = "0px";
		document.getElementById("searchDiv").style.borderLeft = "1px";
		document.getElementById("searchDiv").style.borderRight = "1px";
		},100);
		
		
		setTimeout(function(){ 
		document.getElementById("formSearch1").style.display = "none";
		document.getElementById("formSearch2").style.display = "none";
		document.getElementById("formSearch3").style.display = "none";
		document.getElementById("formSearch4").style.display = "none";
		document.getElementById("searchDiv").style.borderStyle = "none";},300);
		
		
		activeSearch = true;
		}
	
	}
	
	function openCategories(){
		
		//alert("This button workd");
		document.getElementById("leftArticle").style.minHeight = "250px";
		document.getElementById("leftArticle").style.maxHeight = "290px";
		
		}

function logout(){
	location.href="../PHP/logout.php";
}
function logout2(){
	location.href="PHP/logout.php";
}

function logoutRoot(){
	location.href="PHP/logout.php";
}



function loginFirst(){ alert("Please login first");}
function itemButton(){ location.href="items.php";}
function userButton(){ location.href="Users.php";}
function groupButton(){location.href = "Groups.php";}
function ReservationButton(){location.href = "Reservation.php";}
function StuffButton(){location.href = "Stuff.php";}
function QrCodeButton(){location.href = "QrCode.php";}



// This following functionn is to control the tag menus form items. 


function listItems(){
	
	document.getElementById("articleInsert").style.display = "none";
	
	
	
	
	document.getElementById("TagInsert").classList.remove("activeTag");
	
	document.getElementById("articleList").style.display = "-webkit-box";
	document.getElementById("articleList").style.display = "-moz-box";
	document.getElementById("articleList").style.display = "-ms-flexbox";
	
	document.getElementById("TagList").classList.add("activeTag");
	
	document.getElementById("articleReport").style.display = "none";
	document.getElementById("TagReport").classList.remove("activeTag");
	
	
		
				
				
	


}


function insertItem(){
	
	
	document.getElementById("articleList").style.display = "none";
	document.getElementById("TagList").classList.remove("activeTag");
	
		document.getElementById("articleInsert").style.display = "-webkit-box";
		document.getElementById("articleInsert").style.display = "-moz-box";
		document.getElementById("articleInsert").style.display = "-ms-flexbox";
		document.getElementById("TagInsert").classList.add("activeTag");
		
	
				
					document.getElementById("articleReport").style.display = "none";
					document.getElementById("TagReport").classList.remove("activeTag");
	


}

function insertGroup(){
	
	
	document.getElementById("articleList").style.display = "none";
	document.getElementById("TagList").classList.remove("activeTag");
	
		document.getElementById("articleInsert").style.display = "-webkit-box";
		document.getElementById("articleInsert").style.display = "-moz-box";
		document.getElementById("articleInsert").style.display = "-ms-flexbox";
		
		document.getElementById("TagInsert").classList.add("activeTag");
		
	
				
		document.getElementById("articleReport").style.display = "none";
		document.getElementById("TagReport").classList.remove("activeTag");
	


}




function closeInsertItem(){
	document.getElementById("articleInsert").style.display = "none";
}




function reports(){
	
	document.getElementById("articleReport").style.display = "-webkit-box";
	document.getElementById("articleReport").style.display = "-moz-box";
	document.getElementById("articleReport").style.display = "-ms-flexbox";
	
	document.getElementById("TagReport").classList.add("activeTag");
	
	document.getElementById("articleList").style.display = "none";
	document.getElementById("TagList").classList.remove("activeTag");
	
	document.getElementById("articleInsert").style.display = "none";
	document.getElementById("TagInsert").classList.remove("activeTag");

				
					
}



function openSearchDescription(){
	
	document.getElementById("containerSearch").style.display = "-webkit-box";
	document.getElementById("containerSearch").style.display = "-moz-box";
	document.getElementById("containerSearch").style.display = "-ms-flexbox";
	
	setTimeout(function(){
		document.getElementById("containerSearch").style.height = "100px"
		},200);
	setTimeout(function(){
	
		document.getElementById("formDescription").style.display = "block";
		document.getElementById("formCategory").style.display = "none";
		document.getElementById("formReference").style.display = "none";
		document.getElementById("formLesson").style.display = "none";
	},400);
}



function openSearchCategory(){
	
	document.getElementById("containerSearch").style.display = "-webkit-box";
	document.getElementById("containerSearch").style.display = "-moz-box";
	document.getElementById("containerSearch").style.display = "-ms-flexbox";
	
	setTimeout(function(){
		document.getElementById("containerSearch").style.height = "100px"
		},200);
	setTimeout(function(){
		
		document.getElementById("formDescription").style.display = "none"
		document.getElementById("formCategory").style.display = "block";
		document.getElementById("formReference").style.display = "none";
		document.getElementById("formLesson").style.display = "none";
	},400);
}


function openSearchReference(){
	
	document.getElementById("containerSearch").style.display = "-webkit-box";
	document.getElementById("containerSearch").style.display = "-moz-box";
	document.getElementById("containerSearch").style.display = "-ms-flexbox";
	
	setTimeout(function(){
		document.getElementById("containerSearch").style.height = "100px"
		},200);
	setTimeout(function(){
		
		document.getElementById("formDescription").style.display = "none"
		document.getElementById("formCategory").style.display = "none";
		document.getElementById("formReference").style.display = "block";
		document.getElementById("formLesson").style.display = "none";
	},400);
}




function openSearchLessons(){
	
	document.getElementById("containerSearch").style.display = "-webkit-box";
	document.getElementById("containerSearch").style.display = "-moz-box";
	document.getElementById("containerSearch").style.display = "-ms-flexbox";
	
	setTimeout(function(){
		document.getElementById("containerSearch").style.height = "100px"
		},200);
	setTimeout(function(){
		
                   
		
		document.getElementById("formDescription").style.display = "none"
		document.getElementById("formCategory").style.display = "none";
		document.getElementById("formReference").style.display = "none";
		document.getElementById("formLesson").style.display = "block";
	},400);
}



function closeSearch(){
	
	document.getElementById("containerSearch").style.height = "100px"
	document.getElementById("formDescription").style.display = "none"
	document.getElementById("formCategory").style.display = "none";
	document.getElementById("formReference").style.display = "none";
	document.getElementById("formLesson").style.display = "none";
	
	setTimeout(function(){
			document.getElementById("containerSearch").style.display = "none";
		},300);

}

function UncheckAll(){ 
  document.getElementsByClassName("ckBox").checked = false;
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
