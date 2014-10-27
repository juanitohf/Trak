<?php

	require_once "assets/common.php";
    
    //Start connection With Db
				$db = new Connection();
				$DbConnect  = $db->ConnectDB();
?>

<!doctype html>
<html>
	<head>
    
    	<link href="images/icon/Trak.ico" rel="icon" type="image/x-icon"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <!-- <link rel="stylesheet" href="css/StudioRegistration.css" type="text/css"> -->
        <title>TRAK</title>
        
        <script src="js/myScript.js"></script>
        <script src="js/functionsJS.js"></script>
   		<script src="js/webcam.js"></script>
        <script type="text/javascript" src="js/jquery-1.10.1.js"></script>
        <script>
			var is_safari = navigator.userAgent.toLowerCase().indexOf('safari/') > -1;
			var is_chrome= navigator.userAgent.toLowerCase().indexOf('chrome/') > -1;
			var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox/') > -1;
			var is_ie = navigator.userAgent.toLowerCase().indexOf('msie ') > -1;
			var isAndroid = navigator.userAgent.toLowerCase().indexOf("android") > -1;
		
		
		
			if(navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) )
			{
				location.href = "index.php";
			}
			else if(isAndroid)
			{
				location.href = "index.php";
			}
		
			else if(is_safari || is_chrome)
			{
				document.writeln('<link href="css/StudioRegistration_chrome.css" rel="stylesheet" type="text/css">');
			}
		
			else if(is_firefox)
			{
				document.writeln('<link href="css/StudioRegistration_Firefox.css" rel="stylesheet" type="text/css">');
			}
		
			else 
			{
				document.writeln('<link href="css/StudioRegistration_IE.css" rel="stylesheet" type="text/css">');
			}
     </script>
   
	</head>
    

	<body>
    	
       <header>
        	<ul>
            	<li><a href="index.php">Home</a></li>
                <?php
                if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']) )
				{ ?>
            	<li onClick="openLoginBar()">Login</li>
				<?php
				}else{
				 ?>
            		<li onClick="openLogoutBar()">Logout</li>
				 <?php
					
					}
				?>
               <li><a href="Studio.php">Studio Visitors</a></li>
               <li><a href="http://www.temple.edu/" target="_blank">Temple</a></li>
                <li><a href="https://tumail.temple.edu/UserLogin.aspx?ReturnUrl=%2fDefault.aspx" target="_blank">TUmail</a></li>
                <li><a href="">About</a></li>
            </ul>
            
            
            	<?php
            	 if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']) )
				{ ?>
                <div id="loginBox">
            	<form id="formLogin" method="post" action="PHP/funcionsPHP.php">
                
                	<div id="loginCont">	
                    	<div id="line1Login">
                             <div><input type="email" placeholder="Email" name="emailLogin" required> </div>
                             <div><input type="password" placeholder="Password" name="PassLogin" required></div>
                             <div><button type="submit" name="btnLogin">Login</button></div>
                       	</div>  
                      <div id="PassReset"><a href="ResetPass.php" id="forgetPass">Forgot your password? </a></div>   
                    </div> 
                  
                   
                </form>
              </div>  
                <?php
				}else
				{?>
                	<div id="logoutBox">
                		<p id="logoutP"> Are you sure? </p> <button type="button" id="logout1" onClick="logout();">Yes</button> <button type="button" id="logout2" onClick="openLogoutBar()">No</button>
                	</div>
                <?php	
				}
				?>
          
        </header>
        
        <nav>
        	<ul>
            	<li class="activeTag" onClick="listItems()" id="TagList">Registration</li>
                <!--<li onClick="insertItem()" id="TagInsert">Insert User</li>
                <li onClick="reports()" id="TagReport">Reports</li>-->
            </ul>
        </nav>
        
        <section>
            <aside>
              
              	<video id="videoCapture" autoplay>
                
                </video>
                <div id="rectanglePicture"></div>
                <button type="button" id="picBtn" onClick="snapshot()">Capture</button>	
                
             	
           	
          	 </aside>
            

            
            <article id="articleList">
       
 				
                
                	<form id="form1" name="form1">
                    
                    			
                      
                      <div id="containerUserInfo">
                      
                      	<div id="leftContainerUserInfo">
                        	
                       		 <canvas id='videoCanvas'></canvas>
                        </div> <!-- end leftContainerUserInfo -->
                        
                        
                        <div id="rightContainerUserInfo">
                        <h1 class="searchTitle">User Info</h1>
                        	<div class="line1RightContainer">
                              <input type="hidden" id="imgInput" name="imgInput">
                              <label>Name <span class="required">*</span></label>		<input type="text" id="nameUser" name="nameUser" required> 
                              <label>Middle name</label>	<input type="text" id="midleName" name="midleName"> 
                              <label>Last name <span class="required">*</span></label>	<input type="text" id="last" name="last" required> 
                      		</div> <!-- end line1RightContainer -->
                            <div class="line1RightContainer">                      
                              <label>Email <span class="required">*</span></label>		<input type="email" id="email" name="email" required> 
                              <label>Temple Id <span class="required">*</span></label>	<input type="text" id="templeId" maxlength="9" name="templeId" required>
                              <label>Website</label>	<input type="text" id="webSite" name="webSite"> 
                          	</div><!-- end line1RightContainer -->
                        
                        </div><!-- end rightContainerUserInfo -->
                     
                        
                        
                         </div>   <!-- end containerUserInfo -->
                        
                        
                        
                     	<div id="containerSecurityInfo">
                       	 <h1 class="searchTitle">Security</h1>
                        	<div class="line2RightContainer">
                                <label>Password <span class="required">*</span></label>		<input type="password" id="pass" name="pass" required> 
                                <label>Re-Password <span class="required">*</span></label>	<input type="password" id="re_pass" name="re_pass" required onChange="checkPassword()"> 
                            </div><!-- end line1RightContainer -->
                    	</div><!-- end containerSecurityInfo -->
                        
                     
                     <div id="containerContactInfo">
                       
                      <h1 class="searchTitle">Contact Info</h1>
                         <div class="line2RightContainer">
                            <label>Cellphone</label>	<input type="tel" id="cellphone" name="cellphone">
                            <label>HomePhone</label>	<input type="tel" id="homephone" name="homephone">
                            <label>WorkPhone</label>	<input type="tel" id="workphone" name="workphone">
                          </div> <!-- end  line2RightContainer -->  
                                
                         <div class="line2RightContainer">       
                            <label>Address 1</label>	<input type="text" id="address1" name="address1"> 
                            <label>Address 2</label>	<input type="text" id="address2" name="address2"> 
                      	</div> <!-- end  line2RightContainer --> 
                        
                        <div class="line2RightContainer"> 
                            <label>City</label> 	<input type="text" id="city" name="city">
                            <label>State</label>	<input type="text" id="state" name="state">
                            <label>Zip</label>		<input type="text" id="zip" name="zip">
                     	</div> <!-- end  line2RightContainer --> 
                        
                     </div><!-- end containerSecurityInfo -->
                         
                         
                      
  
                 
                  <div class="line2RightContainer">
                  	<button type="button" name="submitUser" id="submitUser" onClick="javascript: SentImageCanvas2()">Insert User</button>
                  </div>
                           
                  </form>        
               
           
 
 
 
            </article>
           
           
            <article id="articleInsert">
            
            	<h1>This is the article to insert Users. </h1>
            
            </article>
            
           
            
              <article id="articleReport">
            
            	<h1>This is the article management Reports  </h1>
            
            </article>
        
        </section>
  
        
        <footer>
        	<div id="leftFooter"> <img src="images/iTrak2.png" alt="Itrak logo"></div> <div id="rightFooter"> <p><span id="spanFooter">Designed And Developed by:</span> Juan Huertas & Justin Shi</p></div>
    
        </footer>
        
     <?php
	 	$DbConnect = null;
	 ?>
    
    </body>
    
    
    
    
    
</html>
