<?php

	
	///variable necessary to initialize
	
	

	require_once "../assets/common.php";
	session_start();
	
		if(!isset($_SESSION['Email']) && !isset($_SESSION['Password']) )
		{
			header("Location: ../index.php");
			
		}else
			{
				
				$Email = (string)($_SESSION['Email']);
				 ////////Getting the information of the User //////
		  
				$getUserInfor = new Users();
				$getUserInfor->get_User_Info_by_Email($Email);
				$IdUser   = $getUserInfor->User_Id;
				$nameUser = $getUserInfor->Name;
				$lastUser = $getUserInfor->Last;
				$UserTypeSESSION = $getUserInfor->User_Type_Id;
				$PermitionUser = $getUserInfor->Permitions;
				
				$getUserInfor = null;
				
				//I need the IdUser in javaScript variable like Global
				
			
			}

	
		


?>



<!doctype html>
<html>
	<head>
    
    	<link href="../images/icon/Trak.ico" rel="icon" type="image/x-icon"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
      <!--  <link rel="stylesheet" href="../css/Reservation.css" type="text/css"> -->
        <title>TRAK</title>
          <script>
			var is_safari = navigator.userAgent.toLowerCase().indexOf('safari/') > -1;
			var is_chrome= navigator.userAgent.toLowerCase().indexOf('chrome/') > -1;
			var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox/') > -1;
			var is_ie = navigator.userAgent.toLowerCase().indexOf('msie ') > -1;
			var isAndroid = navigator.userAgent.toLowerCase().indexOf("android") > -1;
		
		
		
			if(navigator.userAgent.match(/iPhone/i) || navigator.userAgent.match(/iPod/i) )
			{
				location.href = "../index.php";
			}
			else if(isAndroid)
			{
				location.href = "../index.php";
			}
		
			else if(is_safari || is_chrome)
			{
				document.writeln('<link href="../css/Reservation_chrome.css" rel="stylesheet" type="text/css">');
			}
		
			else if(is_firefox)
			{
				document.writeln('<link href="../css/Reservation_Firefox.css" rel="stylesheet" type="text/css">');
			}
		
			else 
			{
				document.writeln('<link href="../css/Reservation_IE.css" rel="stylesheet" type="text/css">');
			}
     </script>
     	<script src="../js/jquery-1.10.1.js"></script>
       
        
   
	</head>
    

	<body>
    	
        <header>
        
        	<?php
				  
			?>
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
            	<li class="activeTag" onClick="listItems()" id="TagList">Reservation</li>
                <?php 
					if($UserTypeSESSION == 3){
						?>
                          <li onClick="insertItem();" id="TagInsert">Instructor</li>
                        <?php
						}
				?>
              
               <li onClick="reports()" id="TagReport">Reports</li> 
            </ul>
        </nav>
        
        <section>
            <aside>
                <div id="line1Aside"><img src="../images/logo.png" alt="tuTeach icon"/></div>
                
                    <ul id="menuPrincipal">
                        <li onClick="userButton()">Users</li>
                        <li onClick="itemButton()">Items</li>
                        <li onClick="groupButton()">Groups</li>
                        <li onClick="ReservationButton()" class="selected">Reservations</li>
                        
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
            
            
            
            <!-- This is the modal windows to see the user info -->
            
            <div id="modalInfoUserBox">
            	<div id="boxlInfoUser">
                <a onClick="closeInfoUserBox();" id="closeButton6"> <img src="../images/close.png" alt="close Icon"> </a>
                	<div id="line1InfoUserBox">
                    	<div id="leftLine1InfoUser">
                        	<img alt="photo user" id="imgInfoUser"/>
                        </div>
                        <div id="rightLine1InfoUser">
                        
                        	<div class="lineInfoUser">
                           		<div class="labelInfoUser"> Name:</div><div class="Label2InfoUser"><p id="NameUser"> </p></div>
                            </div>
                            
                  
                            <div class="lineInfoUser">
                           		<div class="labelInfoUser"> Address:</div><div class="Label2InfoUser"><p id="AddresUser"> </p></div>
                            </div>
                            <div class="lineInfoUser">
                           		<div class="labelInfoUser"> City:</div><div class="Label2InfoUser"><p id="CityUser"> </p></div>
                            </div>
                            <div class="lineInfoUser">
                           		<div class="labelInfoUser"> State:</div><div class="Label2InfoUser"><p id="StateUser"> </p></div>
                            </div>
                            <div class="lineInfoUser">
                           
                           		<div class="labelInfoUser"> Email:</div><div class="Label2InfoUser"><p id="emailUser"> </p></div>
                                
                            </div>
                            <div class="lineInfoUser">
                           		<div class="labelInfoUser"> Cellphone:</div><div class="Label2InfoUser"><p id="PhoneUser"> </p></div>
                            </div>
                            <div class="lineInfoUser">
                           		<div class="labelInfoUser"> User Role:</div><div id="Label2InfoUserType"><p id="UserType"> </p></div>
                            </div>
                            
                            
                        </div>
                    
                    </div><!-- end line1InfoUserBox -->
                
              
                
                </div> <!-- boxlInfoUser -->
             </div> <!-- modalInfoUserBox -->
            
            
            
            
            
            
            
            
            
            
            
            
            
            <!-- At this point is to create the modal windows to select Items -->
            
            
             <div id="modalCartBox">
            	<div id="boxItemCart">
                <a onClick="CloseModalCart();" id="closeButton"> <img src="../images/close.png" alt="close Icon"> </a>
                
                
                	<div id="boxContainer">
                    
                    	<div id="line1BoxContainer">
                        	<div id="Leftline1BoxContainer"> <!-- The leftLineBoxContainer will store the item image -->
                            	<img alt="item Image" id="imgModalCart">
                            </div><!-- Leftline1BoxContainer -->
                        	
                            <div id="Rightline1BoxContainer">
                            
                            	<div id="line1Rightline1BoxContainer"> <p id="descriptionModalCart"> </p></div> <!--line1Rightline1BoxContainer -->
                                
                                <div id="line2Rightline1BoxContainer"> 
                                
                                	<div id="leftRight">
                                    	<div id="upLeftRight">
                                        	<p class="labelUpLeftRight">Reference:</p><p id="referenceModalCart"></p>
                                        </div> <!-- upLeftRight -->
                                        <div id="downLeftRight">
                                        	<p class="labelUpLeftRight">Available:</p>  <p id="Available"> </p>
                                        </div> <!-- upLeftRight -->
                                        
                                    </div> <!-- end leftRight -->
                                    
                                    <div id="RightRight">
                                    
                                    
                                    	
                                    	<div id="upRightRight">
                                        	<div class="labelRightRight"><label>Quantity:</label></div>
                                            <div class="inputSize"><input name="Quantity" type="number" value="1" min="1" id="QuantityCartModal"></div>
                                        </div><!-- leftRightRight -->
                                        <div id="downRightRight">
                                        	<div class="labelRightRight"><label>Days:</label></div> 
                                            <div class="inputSize"><input name="NumbersDays" id="NumbersDays" type="number" value="1" min="1" max="5"></div>
                                            
                                            

 </div><!-- leftRightRight -->
                                       
                                    </div> <!-- end RightRight -->
                                
                                </div> <!-- end line2Rightline1BoxContainer -->                                
                                <div id="line3Rightline1BoxContainer">
                                
                                
                                		<input type="hidden" name="StockBeforeUpdate" id="StockBeforeUpdate">
                                		<input type="hidden" name="ItemIdCart" id="ItemIdCart">
                                        <input type="hidden" name="userIdCart" id="userIdCart">
                               		<button id="buttonSetCart" name="buttonSentCart" type="button"> Send to the Cart </button>
                                
                                </div><!-- end line2Rightline1BoxContainer -->
                             
                            </div><!-- Rightline1BoxContainer -->
                            
                        </div> <!-- end line1BoxContainer -->
                    
                    
                    </div><!-- end boxContainer-->
                	
                
            	</div> <!-- end boxEditGroup -->
            </div> <!-- end modalEditBox -->

			
            
            <div id="modalInfoItemBox">
            		
  
         			<div id="leftModalInfoItemBox">
                    	<img  alt="IconImage" id="imgInfoItemModal" />
                    </div><!-- end leftModalInfoItemBox -->
         			<div id="rightModalInfoItemBox">
                    	<p id="msgInfoBoxItem"></p>
                    </div><!-- end rightModalInfoItemBox -->
         
            </div><!-- end modalInfoItemBox -->






			<!-- Modal To decline the Items -->
            
               <div id="modalDeclineBox">
            	<div id="boxDecline">
                	<a onClick="CloseModalDeclineCart();" id="closeButton5"> <img src="../images/close.png" alt="close Icon"> </a>
                    
                    	<h1 id="menuMessageDecline"> Why is it declined?</h1>
                        
                        <form method="post">
                        <div><textarea cols="38" rows="5" name="declinedMessage" id="declinedMessage"></textarea></div>
                        
                        
                         <input type="hidden" name="declineDate" id="declineDate" />
                         <input type="hidden" name="groupID" id="groupID" />
                         <input type="hidden" name="EmailWhoRequest" id="EmailWhoRequest">
                      
                         <div id="boxButtonDecline"><button type="button" name="declineButton" id="declineButton">Sent</button></div>
                        </form>
      
                </div><!-- end boxDecline -->
               </div><!-- end modalDeclineBox -->



			<!-- Modal Windows to confirm all elements selected -->
            
            
              <div id="modalConfirmBox">
            	<div id="boxItemConfirm">
                	<a onClick="CloseModalConfirm()" id="closeButton2"> <img src="../images/close.png" alt="close Icon"> </a>
                    
                    <ul id="modalUl">
                    	<li id="DescriptionModal">Description</li>
                        <li id="ReferenceModal">Reference</li>
                        <li id="QuantityModal">Quantity</li>
                        <li id="DaysModal">Days</li>
                    </ul>
                    <hr>
                    <div id="containerItemModal">
						
                         
                    
                    </div><!-- End containerItemModal -->
                    <hr>
                    
                  
                     <form id="formModalConfirm">
                     
                      <div id="boxSentMessage">
                      	<textarea cols="75" rows="7" placeholder="Write a message to the instructore" id="textAreaInsturctore" name="textAreaInsturctore" required></textarea>
                      </div>
                      <hr>
                      
         
                     	 <input type="hidden" name="UserIdLabel" id="UserIdLabel">
                         <input type="hidden" name="groupIdLabel" id="groupIdLabel" >    
                         <button type="button"  onClick="sentInstructorRequest()" id="buttonConfirmModal" name="buttonConfirmModal">Confirm and send request to instructor</button>
							
                          </form>
                         
               	</div><!-- end boxItemConfirm -->
               </div> <!-- end modalConfirmBox --> <!-- modalConfirmBox -->
               
            
               
               
               
               
               
               <div id="modalAcceptBox">
            	<div id="boxItemAccept">
                	<a onClick="CloseModalAcceptCart();" id="closeButton4"> <img src="../images/close.png" alt="close Icon"> </a>
                    
                    <p id="titleAccept"> Items Requested</p>
                    <hr>
                    
                    <ul id="modaAcceptlUl">
                    	<li id="DescriptionModalAccept">Description</li>
                        <li id="ReferenceModalAccept">Reference</li>
                        <li id="QuantityModalAccept">Quantity</li>
                        <li id="DaysModalAccept">Days</li>
                    </ul>
                    
                    <div id="containerAccept">
                    
          
                       
        	
                    </div> <!-- end containerAccept -->
                    	
                        <div id="menuStartDate">
                     	
        					<input type="hidden" name="dateAccepted"  id="dateAccepted"/>
                            <input type="hidden" name="GroupIDAccepted"  id="GroupIDAccepted"/>
                            <input type="hidden" name="User_IdAccepted" id="User_IdAccepted" />
                    	<!--	<label>Pick Up Items:</label><input type="date" min="" name="startPickUp" id="startPickUp" required> -->
                    	</div>
                        <div id="buttonBoxAccept">
                        	<button type="button" name="AcceptReservation" id="ReservationAccepted">Accept Reservation</button>
                        </div>
                    	
                    
                    
               	</div><!-- end boxItemAccept -->
               </div><!-- end modalAcceptBox -->
             
               
                 <div id="modalReviewCart">
                    <div id="boxReviewCart">
                        <a onClick="CloseModalReviewCart()" id="closeButton3"> <img src="../images/close.png" alt="close Icon"> </a>
                        
                        	<div id="line1RequestCart">
                            	
		
                            	<div id="LabelRequestCart"><p id="pRequest">Items request by:</p></div><p id="pRequest2"></p>
                            </div>
                        	<hr>
                            <ul id="ulRequestCart">
                            	<li id="liDescriptionReview">Description</li>
                                <li id="liQuantityReview">Quantity</li>
                                <li id="liDaysReview">Days</li>
                            </ul>
                           
                           <div id="containerReviewCart">
                           
		
                           
                           </div><!-- containerReviewCart -->
                        
                     </div><!-- end boxReviewCart -->
                  </div><!-- end modalReviewCart -->
            
            <article id="articleList">    
       
                <div id="leftArticleList">
                        <div id="boxItems">
                            <div id="headerItems">
                                <form>
                                    <button type="button" id="DescriptionButton" name="DescriptionButton">Description</button>
                                </form>
                                
                                <form>
                                    <button type="button"  id="ReferenceButton" name="ReferenceButton">Reference</button>
                                </form>
                                <form>
                                    <button type="button"  id="StockButton" name="StockButton">Stock</button>
                                </form>
                                  <form>
                                    <button type="button"  id="ActionButton">Action</button>
                                </form>
                            </div> <!-- headerItems -->
                            
                           <div id="ContainerItems"> 
                           
                      
                      				<!-- display items with ajax -->
                      
                           </div> <!-- end ContainerItems -->   
                        </div> <!-- End boxItems -->
                        
                        <div id="SearchBox">
                        
                        
                            <div class="lineSearch">
                                <div id="searchByDescription" onClick="onpenFormDescription()"> 
                                    <p id="pSeachDescription">Search by Description</p>
                                    
                                    <form id="formDescription">
                                        <input type="text" id="DescriptionSearch" placeholder="Description">
                                        <button type="button" id="DescriptionSearchButton">Search</button>
                                    </form>
                                        
                                </div> <!--searchByDescription -->
                                
                                <div id="searchByCategory" onClick="openFromCategory()">  
                                    <p id="pSearchCategory">Search by Category</p>  
                                    <form id="formCategory">
                                        <select id="CategorySearch">
                                        	 <!-- displaying categories by ajax -->
                                        </select>
                                        <button type="button" id="CategorySearchButton">Search</button>
                                    </form>
                                </div><!-- end searchByCategory -->
                                
                            </div> <!-- end line1Search -->
                            
                            <div class="lineSearch">
                                <div id="searchByReference" onClick="openFromReference()">  
                                    <p id="pSearchReference">Search by Reference</p>    
                                    
                                    <form id="formReference">
                                        <input type="text" id="ReferenceSearch" placeholder="Reference">
                                        <button type="button" id="ReferenceSearchButton">Search</button>
                                    </form>
                                           
                                </div> <!--searchByDescription -->
                                
                                <div id="searchByLesson" onClick="openFromLesson()">  
                                    <p id="pSearchLesson">Search by Lesson</p> 
                                    
                                    
                                      <form id="formLesson">
                                        <select id="LessonSearch">
                                      			<!--display Lessons w ajax -->
                                        </select>
                                        <button type="button" id="LessonSearchButton">Search</button>
                                    </form>
                                    
                                      
                                </div><!-- end searchByCategory -->
                            </div> <!-- end line1Search -->
                        
                        </div> <!-- end SearchBox -->
                </div> <!-- End leftArticleList -->
                <div id="rightArticleList">
                
                	<h1 class="reservationTitle">Reservation Cart</h1>
                    <hr>
     
                    <form method="get" action="Reservation.php">
                    <div class="lineGroup">
                        	<div class="LabelLine"><p>Name:</p></div>
                            <p id="NameUserM"><!-- Complete with ajax --></p>
                    </div>
                     <div class="lineGroup">
                        	<div class="LabelLine"><p>Group:</p></div>
                            <div>
                            <select name="selectGroup" id="selectGroup" onChange="displayInfoGroupOnSelectMenu()">
                            		<!-- display groups by ajax -->
               
                            </select>
                            </div>
                    </div>
                    <div class="lineGroup">
                        	<div class="LabelLine"><p>Instructors:</p></div>
                       		 <div class="instructorDiv">    
                             <!-- displaying instructors by ajax -->
                            		<p id="InstructorsInfoBox"></p>
                         	</div> <!-- end instructorDiv -->
                    </div>
                    <div class="lineGroup">
                   
                            <div class="LabelLine2"><p> Since: </p></div>
                            <div class="LabelDate"><p id="startDate"></p></div>
                            <div class="LabelLine3"><p> Until: </p></div>
                            <div class="LabelDate"><p id="endDate"></p></div>
                    </div>
                    
                    <hr>
                    <h1 class="reservationTitle">Items in Cart</h1>
                    <hr>
                    
                    <div id="menuArticlesCart">
                    	<ul id="menuItemCart">
                        	<li id="liDescription">Description</li>
                            <li id="liReference">Reference</li>
                            <li id="liAction">Action</li>
                        </ul>
                    </div>
                    <div id="containerCart">
                    
                    	<!-- displaying info with ajax -->
                    
                    </div> <!-- end containerCart -->
                    
                    <button id="buttonCart" name="ButtonRequest" type="button" onClick="OpenModalConfirm();"> Send Request to Instructor</button>
                        
                       
                     </form>
                 
                            
                            
                            
                </div> <!-- end rightArticleList -->
            
            </article>
           
           
           
           
          
           
           <div id="modalEditCartBox">
            	<div id="boxEditItemCart">
                <a onClick="CloseModalEditCartBox();" id="closeButton"> <img src="../images/close.png" alt="close Icon"> </a>
               
              
               
               	<div id="containerEditItemCart">
                	<div id="leftContainerEditItemCart">
                    	<img alt="img picture" id="imgEditCartInstructor" />
                    </div>
                    <div id="rightContainerEditItemCart">
                    	<div class="linesRightContainerEditItemCart">
                        	<p id="ItemDescription"></p>
                        </div>
                        <form>
                        <div class="linesRightContainerEditItemCart">
                        	
                            	<label>Quantity:</label> <input type="number" name="quantityEditCart" id="quantityEditCart" min="1" />
                                <label>Days:</label> <input type="number" name="DaysEditCart"  id="DaysEditCart"  min="0" max="5" />
                            
                        </div>
                        <div class="linesRightContainerEditItemCart">
              					<input type="hidden" id="CartIdUpdateInstructor" />
                             <button type="button" onClick="UpdateReviewCart()" name="butonEditCartInstructor">Update</button>
                    	
                        
                        </div><!-- end linesRightContainerEditItemCart -->
                   	</form>
                    </div>
                
                </div>
               
              
            	</div> <!-- end boxEditGroup -->
            </div> <!-- end modalEditBox -->
           
           
           
           
           
            <article id="articleInsert">
            
            	<div id="headerArticleInsert">
                
               		<h1>Instructor:</h1> <p><?php echo   $nameUser . " " . $lastUser; ?></p>   
                </div>
            
            	<div id="containerArticleInsert">
                    <div id="leftArticleInsert">
                        <h1 class="reservationTitle">Group request</h1>
                        <hr>
                        
                        
                        <ul class="MenuRequest">
                        	<li class="liGroupName">Group Name</li>
                            <li class="liDate">Date</li>
                            <li class="liActionRequest">Action</li>
                        </ul>
                     
                     	<hr>
                        <div id="ContainerRequestLine">
                      
                            
                       </div><!-- end  ContainerRequestLine -->
                        
                    
                    </div><!-- end leftArticleInsert -->
                    
                    <div id="rightArticleInsert">
                        <h1 class="reservationTitle3">Members Related</h1>
                       <hr>
                       <div id="ContainerMembersRelated"> 
                       
                  				<!-- display members related of group with ajax -->
                       
                     	</div> <!-- end ContainerMembersRelated -->
       
                    </div><!-- end rightArticleInsert -->
                </div><!-- containerArticleInsert -->
                
            
            
            	<div id="EmailBox">
                
                	<div id="topEmailBox"> 
                    	<div id="labelBoxEmail"><p>New Message</p></div>
                        <div id="closeEmailBox"><a onClick="closeEmailBox()">X</a></div>
                    </div><!-- end topEmailBox -->
                    
                    <form action="../PHP/funcionsPHP.php" method="post" id="EmailForm">
                    
                        <div><input type="email" class="RowBoxEmailInput" name="toEmailBox" id="toEmailBox" placeholder="To" required></div>
                        <div> <input type="text" class="RowBoxEmailInput" name="SubjectEmail" id="SubjectEmail" placeholder="Subject" ></div>
                        <div><textarea rows="15" cols="58" name="bodyBoxEmail" id="textAreaEmailBox"></textarea> </div>
                        <div id="boxButtonEmail"><button id="buttonEmailbox" onClick="sentEmailAjax();" type="button" name="buttonEmailbox"> Sent Email</button></div>
                    
                    </form>
                    
                    
                </div><!-- end EmailBox -->
              
            </article>
            
           
            
              <article id="articleReport">
            
            	<h1>This is the article management Reports  </h1>
            
            </article>
        
        </section>
  
     <footer>
        	<div id="leftFooter"> <img src="../images/iTrak2.png" alt="Itrak logo"></div> <div id="rightFooter"> <p><span id="spanFooter">Designed And Developed by:</span> Juan Huertas & Justin Shi</p></div>
    
        </footer>
        
      <script src="../js/myScript.js"></script>
      <script src="../js/functionsReservations.js"></script>
      <script>
	 	getInfoUserOnJquery(<?php echo $IdUser; ?>,'<?php echo $nameUser; ?>','<?php echo $lastUser; ?>',<?php echo $UserTypeSESSION; ?>);
	 </script>
    
    
    
 
    </body>
    
    
    
    
    
</html>
