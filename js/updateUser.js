

// Put event listeners into place
window.addEventListener("DOMContentLoaded", function() {
	// Grab elements, create settings, etc.
	
		video = document.getElementById("videoCapture"),
		videoObj = { "video": true },
		errBack = function(error) {
			console.log("Video capture error: ", error.code); 
		};

	
	// Put video listeners into place
	if(navigator.getUserMedia) { // Standard
		navigator.getUserMedia(videoObj, function(stream) {
			video.src = stream;
			video.play();
			document.getElementById("rectanglePicture").style.visibility = "visible";
		}, errBack);
	} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
		navigator.webkitGetUserMedia(videoObj, function(stream){
			video.src = window.webkitURL.createObjectURL(stream);
			video.play();
			document.getElementById("rectanglePicture").style.visibility = "visible";
		}, errBack);
	}
	else if(navigator.mozGetUserMedia) { // Firefox-prefixed
		navigator.mozGetUserMedia(videoObj, function(stream){
			video.src = window.URL.createObjectURL(stream);
			video.play();
			document.getElementById("rectanglePicture").style.visibility = "visible";
		}, errBack);
	}
}, false);
		
		
	
            
            function snapshot() {
				var canvas = document.getElementById("videoCanvas"),
				
				ctx = canvas.getContext('2d');
				
                canvas.width = video.videoWidth - 400;
                canvas.height = video.videoHeight - 160;
				
                ctx.drawImage(video, -260, -50);
				
				    // save canvas image as data url (png format by default)
				  var dataURL = canvas.toDataURL("image/png");
			
				
            }
		
		
	

function SentImageCanvas() {
	
var nameImg = document.getElementById("templeId").value;
var data = document.getElementById("videoCanvas").toDataURL();
$.post("PHP/registerUpload.php", {imageData : data, Nimagen: nameImg});

}





function SendFormUpdate() {
	

var Id_User = document.getElementById("Id_User").value;

var UsertTypeID = document.getElementById("UsertTypeID").value;
var Permissions = document.getElementById("Permissions").value;

var nameUser = document.getElementById("nameUser").value;
var midleName = document.getElementById("midleName").value;
var last = document.getElementById("last").value;
var pass = document.getElementById("pass").value;
var templeId = document.getElementById("templeId").value;
var nameImg = document.getElementById("templeId").value;
var email = document.getElementById("email").value;
var cellphone = document.getElementById("cellphone").value;
var address1 = document.getElementById("address1").value;
var address2 = document.getElementById("address2").value;
var city = document.getElementById("city").value;
var state = document.getElementById("state").value;
var zip = document.getElementById("zip").value;
var homephone = document.getElementById("homephone").value;
var workphone = document.getElementById("workphone").value;
var webSite = document.getElementById("webSite").value;


if(nameUser == "" || last == "" || pass == "" || templeId == "" || email == ""){
	
	alert("Please complete all required input");
	
	}else if(isNaN(templeId)){
		alert("Temple Id need to be a number of 9 digits")
	
	}else if (!isValidEmailAddress(email)) {
			alert("Incorrect email format"); //error message
			$("input#email").focus();   //focus on email field
			return false;  
		
	} else{
		var data = document.getElementById("videoCanvas").toDataURL();
		$.post("../PHP/registerUpload.php", {imageData2 : data, Id_User:Id_User, UsertTypeID:UsertTypeID, Permissions:Permissions,nameUser: nameUser,
											 midleName:midleName, last:last, pass:pass, templeId:templeId, Nimagen: nameImg, email:email, cellphone:cellphone,
										 	 address1:address1,address2:address2,city:city,state:state,zip:zip,homephone:homephone,workphone:workphone, 
											 webSite:webSite
										  });
		
		
			document.getElementById("form1").reset();
			document.getElementById("videoCanvas").getContext('2d').clearRect(0, 0 , 400 , 400 );	
				
					
	}
	
	
}




function isValidEmailAddress(emailAddress) {
    var pattern = new RegExp(/^(("[\w-+\s]+")|([\w-+]+(?:\.[\w-+]+)*)|("[\w-+\s]+")([\w-+]+(?:\.[\w-+]+)*))(@((?:[\w-+]+\.)*\w[\w-+]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][\d]\.|1[\d]{2}\.|[\d]{1,2}\.))((25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\.){2}(25[0-5]|2[0-4][\d]|1[\d]{2}|[\d]{1,2})\]?$)/i);
    return pattern.test(emailAddress);
};



