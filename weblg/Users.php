<?php
	require_once "../assets/common.php";
	session_start();
		
		if(!isset($_SESSION['Email']))
		{
			header("Location: ../index.php");
			
		}else
			{
				$Email = (string)($_SESSION['Email']);
		  ////////Getting the information of the User //////
		  
				$getUserInfor 	= new Users();
				$getUserInfor->get_User_Info_by_Email($Email);
				$IdUser   		 = $getUserInfor->User_Id;
				$nameUser 		 = $getUserInfor->Name;
				$UserTypeSESSION = $getUserInfor->User_Type_Id;
				$PermitionUser = $getUserInfor->Permitions;
				
			}
			
  ?>
	




<!doctype html>
<html>
	<head>
    
    	<link href="../images/icon/Trak.ico" rel="icon" type="image/x-icon"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <!--<link rel="stylesheet" href="../css/Users.css" type="text/css">-->
        <title>TRAK</title>
        <script src="../js/jquery-1.11.0.js"></script>
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
				document.writeln('<link href="../css/Users_chrome.css" rel="stylesheet" type="text/css">');
			}
		
			else if(is_firefox)
			{
				document.writeln('<link href="../css/Users_Firefox.css" rel="stylesheet" type="text/css">');
			}
		
			else 
			{
				document.writeln('<link href="../css/Users_IE.css" rel="stylesheet" type="text/css">');
			}
     </script>
        <script src="../js/myScript.js"></script>
        <script src="../js/functionsJS.js"></script>
   
	</head>
    

	<body>
    	
        <header>
        	<ul>
            	<li><a href="Users.php">Home</a></li>
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
               <li><a href="../Studio.php">Studio Visitors</a></li>
               <li><a href="http://www.temple.edu/" target="_blank">Temple</a></li>
               <li><a href="https://tumail.temple.edu/UserLogin.aspx?ReturnUrl=%2fDefault.aspx" target="_blank">TUmail</a></li>
               <li><a href="">About</a></li>
               
               <?php 
			  if(isset($_SESSION['Email']) && isset($_SESSION['Password'])){
				  ?>
               <!-- <a href="UserEdit.php"  id="userA"><img src="../images/UserL.png" alt="Icon User" id="iconUser" /></a> -->
               <?php
			 	 }
               ?>
               
              
               
            </ul>
            
            <div id="loginBox">
            	<?php
            	 if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']) )
				{ ?>
            	<form id="formLogin" method="post" action="PHP/funcionsPHP.php">
                	<input type="email" placeholder="Email" name="emailLogin" required><input type="password" placeholder="Password" name="PassLogin" required>
                    <button type="submit" name="btnLogin">Login</button>
                </form>
                <?php
				}else
				{?>
                	<div id="logoutBox">
                		<p id="logoutP"> Are you sure? </p> <button type="button" id="logout1" onClick="logout();">Yes</button> <button type="button" id="logout2" onClick="openLogoutBar()">No</button>
                	</div>
                <?php	
				}
				?>
            </div>
            
          
            
        </header>
       
       
        <nav>
        	<ul>
            	<li class="activeTag" onClick="listItems()" id="TagList">Users List</li>
                  <?php if($UserTypeSESSION >= 3){
					
					?>   
                <li onClick="insertItem()" id="TagInsert">Insert User</li>
                
                <?php
				  }
				  ?>
                  <?php 
				  if($UserTypeSESSION >3){
					  ?>
                      
               		 <li onClick="reports()" id="TagReport">Reports</li>
                 <?php
				  }
				?>
            </ul>
        </nav>
        
        <section>
            <aside>
                <div id="line1Aside"><img src="../images/logo.png" alt="tuTeach icon"/></div>
               
                    <ul id="menuPrincipal">
                        <li onClick="userButton()">Users</li>
                        <li onClick="itemButton()">Items</li>
                        <li onClick="groupButton()" class="selected">Groups</li>
                        <li onClick="ReservationButton()">Reservations</li>
                        
                        <?php
						
						if($UserTypeSESSION == 2 || $UserTypeSESSION == 4 || $UserTypeSESSION == 5){
						
						?>
                        <li onClick="StuffButton()">Staff</li>
                        <li onClick="QrCodeButton()">QR-Code</li>
                        
                        <?php
						}
						?>
                        
                    </ul>	
           	 </aside>
            
            
			<!-- Here start list article -->
            
            <article id="articleList">
            
            
            
            
            
                    <div id="sentImage">
                    		<form enctype="multipart/form-data" id="formImage2">
                                <input type="file" name="file" id="sentImgFile" required> <br><br>
                                <button type="button" id="buttonSendImagen2" name="submitImage2">Send Image</button>
                           </form>
                    </div> <!-- end sentImageWindow -->
            
            
         
            
            
            	<!-- This will be a hide be to display users and edit it-->
                
                <!-- This following div containt the information of users -->
            
            
     <div id="modalDisplay">       
           <div id="editDisplayBox">
                 <a id="closeButtonDisplayInfo"> <img src="../images/close.png" alt="close Icon"> </a>
                
                	<div id="leftSideView">
                    
                    	<div id="contImage">
                        	<img id="userImg" alt="User Picture">
                        </div> <!-- end contImage -->
                        <hr>
                        
                            <div class="line1">
                                <div class="widthLine1"><p>Name:</p></div>
                                <div><p id="NameUserInfo"></p></div>
                            </div>
                            <div class="line1">
                                <div class="widthLine1"><p>Middle:</p></div>
                                <div><p id="MiddleUserInfo"> </p></div>
                            </div>
                            <div class="line1">
                                <div class="widthLine1"><p>Last:</p></div>
                                <div><p id="LastUserInfo"> </p></div>
                            </div>
                            
                             <div id="line2">
                             	 <div> <p id="TypeUserInfo"></p> </div>
                            </div>
                          
                   </div> <!-- End leftSideView -->
                    
                    	
                    
                  	<div id="rightSideView">
                        
                        	<div class="lineR"> 
                            	<div class="firstBox"><p>Email:</p></div>  <div class="firstBox2"> <p id="emailUserInfo"> </p></div>
                            </div>
                            
                            <div class="lineR"> 
                            	<div class="firstBox"><p>Web:</p></div> <div class="firstBox2"> <p id="webUserInfo"> </p> </div>
                            </div>
                            
                             <div class="lineR"> 
                            	<div class="firstBox"><p>Temple Id:</p></div> <div class="firstBox2"> <p id="templeIdUserInfo"></p> </div>
                            </div>
                             <div class="lineR"> 
                            	<div class="firstBox"><p>Cellphone:</p></div> <div class="firstBox2"> <p id="cellphoneUserInfo"> </p> </div>
                            </div>
                            
                             <div class="lineR"> 
                            	<div class="firstBox"><p>Home phone:</p></div> <div class="firstBox2"> <p id="homePhoneUserInfo"> </p></div>
                            </div>
                        	<div class="lineR"> 
                            	<div class="firstBox"><p>Work phone:</p></div> <div class="firstBox2"> <p id="workPhoneUserInfo"> </p></div>
                            </div>
                            
                            <div class="lineR"> 
                            	<div class="firstBox"><p>Address 1:</p></div> <div class="firstBox2"> <p id="addres1UserInfo"> </p></div>
                            </div>
                            
                            <div class="lineR"> 
                            	<div class="firstBox"><p>Address 2:</p></div> <div class="firstBox2"> <p id="addres2UserInfo"> </p></div>
                            </div>
               
                            <div class="lineR"> 
                            	<div class="firstBox"><p>City:</p> </div> <div class="firstBox2"><p id="cityUserInfo"></p></div>
                            </div>
                
                            <div class="lineR"> 
                            	<div class="firstBox"><p>Zip:</p></div> <div class="firstBox2"> <p id="zipUserInfo"></p></div>
                            </div>
               
                        
                        </div>
                
                 		 
            </div> <!-- End editDisplayBox -->
          </div> <!-- end modalDiplay-->
                
                
                <!-- this followin div is to edit user -->
       <div id="modalBox">    
            <div id="editBoxModal">
            	 <a id="closeModelEditUser"> <img src="../images/close.png" alt="close Icon"> </a>

              
                
                
             <div id="contEditBox">   
                <div id="leftEditBox">
            		
                    			<h1 class="searchTitle">User Info</h1>
                                
                           <div class="lineInserUserForm2">   
                       		 	<li id="imgBtnEditSubmit">Insert Image</li> <input type="text" id="strImagen2" name="strImagen2"> <br>
                           </div>
                    
                            <div class="lineInserUserForm">
                                 <div class="labelInsert"><label>Name</label></div><input type="text" name="name2" id="nameUserEdit"  required> 
                                 <div class="labelInsert"><label>Middle name</label></div><input type="text" name="midleName2" id="middleUserEdit"> 
                                 <div class="labelInsert"><label>Last name</label></div><input type="text" name="last2" id="lastUserEdit" required> 
                            </div>
                            <div class="lineInserUserForm">
                                <div class="labelInsert"><label>Email</label></div><input type="email" name="email2" id="emailUserEdit" required> 
                                <div class="labelInsert"><label>Temple Id</label></div><input type="text" maxlength="9" name="templeId2" id="templeIdUserEdit" required>
                                <div class="labelInsert"><label>Website</label></div><input type="text" name="webSite2" id="webUserEdit"> 
                            </div>

      
      
                         <h1 class="searchTitle">Contact Info</h1>
                        
                         <div class="lineInserUserForm">   
                        	 <div class="labelInsert"><label>Cellphone</label></div><input type="tel" name="cellphone2" id="cellPhoneUserEdit">
                             <div class="labelInsert"><label>HomePhone</label></div><input type="tel" name="homephone2" id="homePhoneUserEdit">
                             <div class="labelInsert"><label>WorkPhone</label></div><input type="tel" name="workphone2" id="workPhoneUserEdit">
                         </div> <!-- labelInsert end-->
                                
                                
                         <div class="lineInserUserForm3">
                        	<div class="labelInsert"><label>Address 1</label></div><input type="text" name="address12" id="address1UserEdit"> 
                        	<div class="labelInsert"><label>Address 2</label></div><input type="text" name="address22" id="address2UserEdit"> 
                         </div>
                         
                         <div class="lineInserUserForm">   
                        	 <div class="labelInsert"><label>City</label></div><input type="text" name="city2" id="cityUserEdit">
                             <div class="labelInsert"><label>State</label></div><input type="text" name="state2"  id="stateUserEdit">
                             <div class="labelInsert"><label>Zip</label></div><input type="text" name="zip2" id="zipUserEdit">
                         </div> <!-- labelInsert end-->
                         
                         <input type="hidden" name="id_User2" id="idUserEdit"/>
                         <div class="lineInserUserForm4"> <button type="submit" name="updateUser" id="updateUser">Update User</button></div>            
            
            	</div> <!-- End leftEditBox -->
                
                <div id="rightEditBox">
                
            
                	
                	<h1 class="searchTitle">Status & permissions</h1>
                          <div class="lineInserUserForm6">
                        		<div class="labelInsert"> <label>User type</label></div>
                            		<select name="UserType2" id="userTypeEdit">
                                      
                               	    </select>
                                    
                             	</div> <!-- lineInserUserForm6 -->
                             
                        	 <div class="lineInserUserForm7">
                             	<div id="box1">
                                	 <p>Owner</p>
                                                                    
                                     <input type="checkbox" name="writeOwner" value="1" disabled>Write <br>
                               		 <input type="checkbox" name="readOwner" value="1" disabled>Read <br>
                                	 <input type="checkbox" name="executeOwner" value="1" disabled>Execute <br>

                                </div>
                                <div id="box2">
                                 	<p>Group</p>                     
                                     <input type="checkbox" name="writeUserGroup" value="1" disabled>Write <br>
                               		 <input type="checkbox" name="readUserGroup" value="1" disabled>Read <br>
                                	 <input type="checkbox" name="executeUserGroup" value="1" disabled>Execute <br>  
                                     
                                </div>
                                <div id="box3">
                                   <p>Everyone</p> 
                                    <input type="checkbox" name="writeEvery" value="1" disabled>Write <br>
                               		<input type="checkbox" name="readEvery" value="1" disabled>Read <br>
                                	<input type="checkbox" name="executeEvery" value="1" disabled>Execute <br>
                            	</div>
                             </div><!-- lineInserUserForm7 --> 
                                                  
                         <br><br>
                         <hr>
                
                
                </div> <!-- end rightEditBox -->
          </div> <!-- end contEditBox -->
              
                
                
                
               
                
            </div> <!-- This is the end of editBoxModal -->
                
          </div> <!-- this is the end of my modalBox-->
                
               
                
                
                
                
              	<div id="leftArticle">
                	<div id="topList">
                    <form> <button id="nameSearch" type="button" name="nameSearchOrder" class="nameSearchOrder" >Name</button></form>
                    <form> <button id="lastSearch" type="button" name="lastSearchOrder" class="lastSearchOrder">Last </button></form>
                    <form> <button id="emailSearch" type="button" name="emailSearchOrder" class="emailSearchOrder">Email</button> </form>
                    <form> <button id="actionSearch" type="button" name="actionSearch" class="actionSearch" >Action</button></form>
                  
                    </div>
                    <div id="containerList">
               
       
                    
                    	<!-- here is necessary to display the content with ajax -->
                    
                    </div> <!-- end containerList -->
                    
                    
                
                </div>
                
                <div id="rightArticle">
                
                 <h1 class="insertTitle">SEARCH</h1>
                
                	<ul>
                    	<li onClick="openBoxNameSearch();">Search by Name</li>
                        <li onClick="openBoxLastSearch();">Search by Last</li>
                        <li onClick="openBoxEmailSearch();">Search by Email</li>
                        <li onClick="openBoxTempleIdSearch();">Search by Temple Id</li>
                    </ul>
                    
                    <div id="boxSearch">
                    
                    	<form id="formSearchName">
                            <h1 class="searchTitle">Enter Name </h1>
                            <input type="text" name="nameSearch" id="nameUserSearch"><br>
                            <button type="button" name="searchNameButton" id="searchNameButton">Search</button>
                        </form>
                        
                        <form id="formSearchLast">
                            <h1 class="searchTitle">Enter Last name </h1>
                            <input type="text" name="LastSearch" id="LastUserSearch"><br>
                            <button type="button" name="searchLastButton" id="searchLastButton">Search</button>
                        </form>
                        
                        <form id="formSearchEmail">
                            <h1 class="searchTitle">Enter Email</h1>
                            <input type="text" name="EmailSearch" id="EmailUserSearch"><br>
                            <button type="button" name="searchEmailButton" id="searchEmailButton">Search</button>
                        </form>
                        
                         <form id="formSearchTempleId">
                            <h1 class="searchTitle">Enter Temple Id</h1>
                            <input type="text" name="TempleIdSearch" id="TempleIdUserSearch"><br>
                            <button type="button" name="searchTempleIdButton" id="searchTempleIdButton">Search</button>
                        </form>
                          
                    </div>
            
                </div>
              
                
            
            </article> <!-- End listArticle -->
           
           
           
           <!-- Here os article insert Data -->
            <article id="articleInsert">
            
            
              <div id="sentImageWindow">
    
                     <form enctype="multipart/form-data">
                          <input type="file" name="file" id="imgUserInsert"> <br><br>
                          <button type="button" id="buttonSendImagen" name="submitImage">Send Image</button>
                     </form>
              </div> <!-- end sentImageWindow -->
                
            
            <form>
            
            <div id="containerForm1">
            	<div id="leftArticleInsert">
         
                    			<h1 class="searchTitle">User Info</h1>
                                
                           <div class="lineInserUserForm2">   
                       		 <li id="imgBtnSubmit">Insert Image</li> <input type="text" id="strImagen" name="strImagen"> <br>
                           </div>
                    
                    	<div class="lineInserUserForm">
                    		 <div class="labelInsert"><label>Name</label></div><input type="text" name="name" id="NameUserInsert" required> 
                             <div class="labelInsert"><label>Middle name</label></div><input type="text" name="midleName" id="midleNameInsert"> 
                       		 <div class="labelInsert"><label>Last name</label></div><input type="text" name="last" id="lastUserInsert" required> 
                        </div>
                        <div class="lineInserUserForm">
                        	<div class="labelInsert"><label>Email</label></div><input type="email" name="email" id="emailUserInsert" required> 
                        	<div class="labelInsert"><label>Temple Id</label></div><input type="text" maxlength="9" name="templeId" id="templeIdUserInsert" required>
                            <div class="labelInsert"><label>Website</label></div><input type="text" name="webSite" id="webUserInsert" value=""> 
                        </div>
                         
                        
                        
                        <h1 class="searchTitle">Security</h1>
                        
                        <div class="lineInserUserForm3">
                        	<div class="labelInsert"><label>Password</label></div><input type="password" id="pass" name="pass" value="" required> 
                        	<div class="labelInsert"><label>Re-Password</label></div><input type="password" id="re_pass" name="re_passUserInsert" required onChange="checkPassword()"> 
                        </div>
                        
                       
                         <h1 class="searchTitle">Contact Info</h1>
                        
                         <div class="lineInserUserForm">   
                        	 <div class="labelInsert"><label>Cellphone</label></div><input type="tel" name="cellphone" id="cellphoneUserInsert">
                             <div class="labelInsert"><label>HomePhone</label></div><input type="tel" name="homephone" id="homePhoneUserInsert">
                             <div class="labelInsert"><label>WorkPhone</label></div><input type="tel" name="workphone" id="workPhoneUserInsert">
                         </div> <!-- labelInsert end-->
                                
                                
                         <div class="lineInserUserForm3">
                        	<div class="labelInsert"><label>Address 1</label></div><input type="text" name="address1" id="address1UserInsert"> 
                        	<div class="labelInsert"><label>Address 2</label></div><input type="text" name="address2" id="address2UserInsert"> 
                         </div>
                         
                         <div class="lineInserUserForm">   
                        	 <div class="labelInsert"><label>City</label></div><input type="text" name="city" id="cityUserInsert">
                             <div class="labelInsert"><label>State</label></div><input type="text" name="state" id="stateUserInsert">
                             <div class="labelInsert"><label>Zip</label></div><input type="text" name="zip" id="zipUserInsert">
                         </div> <!-- labelInsert end-->
                         
                         
                         <div class="lineInserUserForm4"> <button type="button" name="submitUser" id="submitUserInsert">Insert User</button></div>
  
                    
                  
                
                 </div>
                 
                 
                 
                 
                <div id="rightArticleInsert"> 
                
                	<h1 class="searchTitle">Status & permissions</h1>
                          <div class="lineInserUserForm6">
                        	<div class="labelInsert"> <label>User type</label></div>
                            	  <select name="UserType" id="typeUserSelect">
                                 
                                      
                               	    </select>
                             </div>
                             
                        	 <div class="lineInserUserForm7">
                             	<div id="box1">
                                	 <p>Owner</p>
                                   
                                     
                                     <input type="checkbox" name="writeOwner" value="1" checked disabled>Write <br>
                               		 <input type="checkbox" name="readOwner" value="1" checked disabled>Read <br>
                                	 <input type="checkbox" name="executeOwner" value="1" checked disabled>Execute <br>
  
                                </div>
                                <div id="box2">
                                 	<p>Group</p> 
                                    
                                  
                                     <input type="checkbox" name="writeUserGroup" value="1" disabled>Write <br>
                               		 <input type="checkbox" name="readUserGroup" value="1" checked disabled>Read <br>
                                	 <input type="checkbox" name="executeUserGroup" value="1" checked disabled>Execute <br>
                                     
                                </div>
                                <div id="box3">
                                   <p>Everyone</p> 
                                                      
                                    <input type="checkbox" name="writeEvery" value="1" disabled>Write <br>
                               		<input type="checkbox" name="readEvery" value="1" checked disabled>Read <br>
                                	<input type="checkbox" name="executeEvery" value="1" disabled>Execute <br>
                  
                            	</div>
                         </div>
                              <br><br><hr>
                         
                </div><!-- end rightside-->
                
           
		</div> <!-- end containerForm1 -->
             </form>
            </article>
            
           
            
              <article id="articleReport">
            
            	
                
                <div id="leftArticleReport">
                
                <!--	<p id="User_id"> Users</p> -->
                    
                    <div id="containerTopUserReport">
                    	<div><form><button type="button" id="btnNameReport" name="sortNameReport">Name</button></form></div>
                        <div> <form><button type="button" id="btnLastReport" name="sortLastReport">Last</button></form></div>
                    </div>
                	
                    
                    <div id="containerUserReport">
                    	
                        <!-- loop of data on ajax -->
                     </div> <!-- end containerUserReport -->
                    
                    <div id="searchReport">
                    
                    	<div id="line1SearchReport">Search By</div>
                   
                        <div id="containerSerchMenu">
                            <div id="leftSearchReport">
                                Name
                            </div>
                            <div id="rightSearchReport">
                               temple ID
                            </div>
                        </div>   
                    </div>
                	<div id="containerFormSearch"> 
                    	<div id="formSearchNameInput">
                        	<form id="nameFormReport">
                            	<input type="text"  id="nameSearchReport" placeholder="Name" />
                                <button type="button"  id="nameReport">Search</button>
                            </form>
                            <form id="templeIdFormReport">
                            	<input type="text" id="templeIDSearchReport" placeholder="Temple Id" maxlength="9" />
                                <button type="button" id="templeIdReport">Search</button>
                            </form>
                        </div>
                    
                    </div>
                
                
                </div><!-- leftArticleReport -->
                
                
                
                
                
                <div id="rightArticleReport">
                
                		<div id="boxContainerReportMessage">
                        	<h1 class="insertTitle4" id="titleUserReportEmpty"> Select a User</h1>
                        </div>
                        
						<div id="boxContainerReport"> 
                        	<h1 class="insertTitle4" id="titleUserReport"> juan huertas </h1>
                                <div id="LoopReportContainer">
                           
                           			
                           
                           
                           
                           
                                
                                </div><!-- end LoopReportContainer -->
                           </div> <!-- end boxContainerReport -->
                        <div>
                    
                        <form action="UserReport.php" target="_blank" method="post" id="formBtnReport">
                       
                            <input type="hidden" name="UserReportID" id="UserReportID" />
                                <button id="buttonPDFuser" name="buttonReportUser">Excel Report</button>
                        
                        </form>
                   </div>		
                </div> <!-- end rightArticleReport" -->
              	
            </article>
        
        </section>
  
        
        
        
        
       <footer>
        	<div id="leftFooter"> <img src="../images/iTrak2.png" alt="Itrak logo"></div> <div id="rightFooter"> <p><span id="spanFooter">Designed And Developed by:</span> Juan Huertas & Justin Shi</p></div>
    
        </footer>
        
     
    
    </body>
 
    <script src="../js/functionsUser.js"></script>
    <script>
    	takeinfoUser(<?php echo $UserTypeSESSION ?>);
    </script>
   
 
 
</html>
