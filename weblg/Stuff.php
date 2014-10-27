<?php
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
				$UserTypeSESSION = $getUserInfor->User_Type_Id;
				$PermitionUser = $getUserInfor->Permitions;
				
				
			}
			if($UserTypeSESSION == 1){
					header("Location: ../index.php");
			}
?>


<!doctype html>
<html>
	<head>
    
    	<link href="../images/icon/Trak.ico" rel="icon" type="image/x-icon"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
       <!-- <link rel="stylesheet" href="../css/Stuff.css" type="text/css"> -->
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
				document.writeln('<link href="../css/Staff_chrome.css" rel="stylesheet" type="text/css">');
			}
		
			else if(is_firefox)
			{
				document.writeln('<link href="../css/Staff_Firefox.css" rel="stylesheet" type="text/css">');
			}
		
			else 
			{
				document.writeln('<link href="../css/Staff_IE.css" rel="stylesheet" type="text/css">');
			}
     </script>

        <script src="../js/jquery-1.10.1.js"></script> 
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
            	<li class="activeTag" onClick="listItems()" id="TagList">Take Out</li>
                <li onClick="insertItem()" id="TagInsert">Return Items</li>
                <li onClick="reports()" id="TagReport">Add Report</li>
            </ul>
        </nav>
        
        
        
        
         <div id="modalInfoItemToReturn">
            	<div id="boxModalInfoItemToReturn">
                <a onClick="closeModalInfoItemToReturn()" id="closeButtonInfoItem"> <img src="../images/close.png" alt="close Icon"> </a>
                
                	<div id="contInfoItemReturn">
                    	<div id="leftContInfoItemReturn">
                        	<div id="topImgBox">
                            	<img id="imgItemReturn" src="" alt="item img">
                            </div> <!-- end topImgBox -->
                            
                            <div id="bottomImgBox">
                            
                            </div> <!-- end topImgBox -->
                        </div>
                        <div id="rightContInfoItemReturn">
                        	<div class="linesInfoReturnIntem">
                            	<div class="leftLinesInfoReturnIntem"><p>Name:</p></div>
                                <div class="rightLinesInfoReturnIntem" id="nameItemReturn"></div>
                            </div><!-- end linesInfoReturnIntem -->
                            
                            <div class="linesInfoReturnIntem">
                            	<div class="leftLinesInfoReturnIntem"><p>Email:</p></div>
                                <div class="rightLinesInfoReturnIntem"  id="emailItemReturn"></div>
                            </div><!-- end linesInfoReturnIntem -->
                            
                            <div class="linesInfoReturnIntem">
                            	<div class="leftLinesInfoReturnIntem"><p>Group:</p></div>
                                <div class="rightLinesInfoReturnIntem" id="groupItemReturn"></div>
                            </div><!-- end linesInfoReturnIntem -->
                            
                            <div class="linesInfoReturnIntem">
                            	<div class="leftLinesInfoReturnIntem"><p>Return date:</p></div>
                                <div class="rightLinesInfoReturnIntem" id="End_DateItemReturn"></div>
                            </div><!-- end linesInfoReturnIntem -->
                            
                            <div class="linesInfoReturnIntem">
                            	<div class="leftLinesInfoReturnIntem"><p>Quantity:</p></div>
                                <div class="rightLinesInfoReturnIntem" id="QuantityItemReturn"></div>
                            </div><!-- end linesInfoReturnIntem -->
                        
                        </div>
                    
                    
                    
                    </div> <!-- end contInfoItemReturn -->
                	
                       
                </div><!-- boxlStuffConfirmation -->
            </div><!-- modalStuffConfirmationBox -->
        
        
        
                                       
           <div id="modalStuffConfirmationBox">
            	<div id="boxlStuffConfirmation">
                <a onClick="closeModalStaffConfirmation()" id="closeButton6"> <img src="../images/close.png" alt="close Icon"> </a>
                
                	<div id="containerStuffConfirmation">
                    	<div class="linesStuffC">
                        	<p>Staff confirmation</p>
                        </div>
                        <div class="linesStuffC2">
                        
                        
                        
                                <input type="text" id="templeIdCart" placeholder="Slide or Type Temple ID" autofocus onChange="confirmationByStaff()">
                                <input type="hidden" id="GroupAcceptId"  />
                                <input type="hidden" id="DateRequested" />
                                <input type="hidden" id="UserIdRequest" />
                           
                         
                        </div>
                    
                    </div>
                       
                </div><!-- boxlStuffConfirmation -->
            </div><!-- modalStuffConfirmationBox -->
                    
                    
                    
                    
            <!-- This is modal windows to declided the items -->
                    
               <div id="modalStuffDeclinedBox">
            		<div id="boxlStuffDecline">
               		 <a id="closeButtonDeclineBox"> <img src="../images/close.png" alt="close Icon"> </a>
                     
              
                     
                    
                     <form>
                     <h1 class="insertTitle">Why is it declined?</h1>
                     <div id="containerDeclined">
                     	 
                         <div id="leftContainerDeclined">
                         	<textarea rows="4" cols="38" id="AnwserDeclined" placeholder="Why is it declined?" required></textarea>
                         </div>
                         <input type="hidden" id="GroupDeclined">
                         <input type="hidden" id="DateRequested">
                         <input type="hidden" id="UserDecline">
                     	<div id="rightContainerDeclined"> <button type="button" id="btnDecline">Decline</button></div>
                     </div>
                     
                     	
                       
                     
                     </form>
                     
                    
                    </div><!-- end boxlStuffDecline -->
               </div> <!-- end modalStuffDeclinedBox -->
               
               
               
               
                 <!-- This is modal windows to send message to student ot pick up the reservations-->
                    
               <div id="modalStuffSendMessage">
            		<div id="boxlStuffSendMessage">
               		 <a id="closeButtonMessageBox"> <img src="../images/close.png" alt="close Icon"> </a>
                     
              
                     
                    
                     <form>
                
                     <div id="containerMessage">
                     	 
                         
                         	<p class="insertTitle6">Pick up message</p>
                         <div id="lineMessage">
                             <div id="leftContainerMessage">
                                <textarea rows="4" cols="38" id="AnwserMessage" placeholder="Message" required></textarea>
                             </div>
                         
                             <input type="hidden" id="UserMessage">
                            <div id="rightContainerMessage"> 
                            	<div class="lineRightContainerMessage">
                                    <div class="leftLineRightContainerMsg"><p id="messageTitle">Time</p></div>
                                    <div class="rightLineRightContainerMsg"><input type="time" id="TimePickUpMessage"></div>
                                </div>
                                <div class="lineRightContainerMessage">
                                    <div class="leftLineRightContainerMsg"><p id="messageTitle">Date</p></div>
                                    <div class="rightLineRightContainerMsg"><input type="date" id="DatePickUpMessage"></div>
                                </div>
                             
                            </div>
                            
                          </div> <!-- lineMessage -->
                          <div id="lineBtnMessage">
                           	 	<button type="button" id="btnMessage" placeholder="00:00 pm">Send Message</button>
                           </div>
                       </div> <!-- end containerMessage -->
                     
                     	
                       
                     
                     </form>
                     
                    
                    </div><!-- end boxlStuffDecline -->
               </div> <!-- end modalStuffDeclinedBox -->
                    
                    
        
        
        
        
        <section>
            <aside>
               <div id="line1Aside"><img src="../images/logo.png" alt="tuTeach icon"/></div>
                
                    <ul id="menuPrincipal">
                        <li onClick="userButton()">Users</li>
                        <li onClick="itemButton()">Items</li>
                        <li onClick="groupButton()">Groups</li>
                        <li onClick="ReservationButton()">Reservations</li>
                        
                          <?php
						
						if($UserTypeSESSION == 2 || $UserTypeSESSION == 4 || $UserTypeSESSION == 5){
						
						?>
                         <li onClick="StuffButton()"  class="selected">Staff</li>
                         <li onClick="QrCodeButton()">QR-Code</li>
                        
                        <?php
						}
						?>
                        
                    </ul>	
           	 </aside>
            
            
            
            
            
             <!-- This is the modal windows to confirm the Items out -->
            
           

            
            <article id="articleList">
            
            	
                	<div id="leftArticleList">
                    		<h1 class="insertTitle">Reservations accepted by Instructor</h1>
                            <hr>
                            
                            <div id="lineMenuReservationAccepted">
                            	<form><button type="button" id="groupOrderButton" name="groupOrderButton"> Group </button></form>
                                <form><button type="button" id="OroderByPickUp" name="OroderByPickUp"> Confirmed </button></form>
                                <form><button type="button" id="OrderActions"> Actions </button></form>
                            </div><!-- end lineMenuReservationAccepted -->
                            
                           <div id="containerReservationAccepted">
                           
                           		
                                <!-- display this info with ajax -->
                            
                                       
                           </div><!-- end containerReservationAccepted -->
                           
                           	
                                <div id="BoxSearchGrop">
                                    <div id="labelSearGroup"><label>Search by Group Name:</label></div>
                                    <div id="inputGroupSearch"><input type="text" id="groupNameSearch"></div>
                                    <button type="button" id="searchByGroupName">Search</button>
                                 </div><!-- end BoxSearchGrop --> 
                            
                           
                           
                     
                           
                       
                    </div> <!-- end   leftArticleList -->   
                    
                                
          
                    
                 
                    <div id="rightArticleList">




			
                    	<div id="boxLabelInfoClick">
                        	<h1 class="insertTitle3"> Click on a group name to see the information</h1>
                        </div> 
                    
                
						
	
				<div id="containerInfoRequested">

						<div class="lineRightSize">
                        	<div class="labelRight"><p>Group Name:</p></div>
                            <div><p class="LabelRight2" id="groupInfoId"> </p></div>
                        </div>
                        
                        <div class="lineRightSize">
                        	<div class="labelRight"><p>Instructor:</p></div>
                            <div class="LabelRight3"><p id="instructorLabelInfo"> </p> </div>
                        </div>
                        
                    	<div class="lineRightSize">
                        	<div class="labelRight"><p>Requested by:</p></div>
                            <div class="labelInstructor"><p class="LabelRight2" id="requesteUser"></p></div>
                        </div>
                        <div class="lineRightSize">
                        	<div class="labelRight"><p>Requested Date:</p></div>
                            <div><p class="LabelRight2"><p id="DateRequestedP"></p></p></div>
                        </div>
                        <br>
                        <div class="lineRightSize2">
                        	<h1 class="insertTitle2"> Items Requested</h1>
                        </div>
                        <hr>
                        
                        
                        <ul id="menuItemsRequeste">
                        	<li id="liDescription">Description</li>
                            <li id="liReference">Reference</li>
                            <li id="liQuantity">Quantity</li>
                            <li id="liDays">Days</li>
                        </ul>
                        <hr>
                        
                        <div id="containerItemsRequested">
                        
                        
                        
							<!-- display list with ajax -->
                    
                        
                        </div><!-- end containerItemsRequested -->
                        
                   </div> <!-- end container dipslay Info -->     
                        
                    </div><!-- end rightArticleList -->
                
                
            
            </article>
           
           
            <article id="articleInsert">
            
           
           		<div id="headerArticleInsert">
                		<h1 class="TitleReturnItems">Items To Be Returned</h1>
                </div>
           
           		<div id="boxItemsTobeReturned">
                	<div id="lineMenuButton">
                    	<form><button type="button"  id="ReferenceReturn" name="buttonReference">Reference</button></form>
                        <form><button type="button"  id="DescriptionReturn" name="buttonDescriptionReturn">Description</button></form>
                        <form><button type="button"  id="StartDateReturn" name="buttonStartDateReturn">Start Date</button></form>  
                        <form><button type="button"  id="EndDateReturn" name="buttonStartDateEnd">End Date</button></form>
                        <form><button type="button"  id="QuantityReturn" name="buttonQuantityReturn">Quantity</button></form>
                        <form><button type="button"  id="ActionReturn" name="buttonActionReturn">Action</button></form>
                    </div>
                    <div id="containerItemsReturned">
                    
                    	<!-- display result by ajax -->
                
                    
                    </div> <!-- end containerItemsReturned -->
                </div><!-- end boxItemsTobeReturned -->
           
           
           	<div id="menuSearchContainer">
            	<div id="BoxSearchReference">
                	
                        <label>Search by Reference:</label>
                        <input type="text" id="inputSearchReference" />
                        <button type="button" id="searchItemByReferenceStaff">Search</button>
                    
                </div>
                <div id="BoxSearchDescription">
                
               
                        <label>Search by Description:</label>
                        <input type="text" id="inputSearchDescription" />
                        <button type="button"  id="searchItemByDescriptionStaff">Search</button>
                
                	
                </div>
            
            
            </div>
           
           
            
            </article> <!-- end of article Insert -->
            
           
           
             
               <div id="modalStuffReportItem">
            	<div id="boxlStuffReportItem">
                <a onClick="closeModalBoxReport()" id="closeButton7"> <img src="../images/close.png" alt="close Icon"> </a>
                	<div id="lineTitleReport"><h1 class="insertTitle5">Item Report</h1></div>
           			   
                    <div id="containerReport">
                    
                    	<div id="lineReport">
                        	<div id="leftLineReport"><img id="imgReportBox" alt="logo Item" ></div>
                            <div id="centerLineReport"></div>
                            <div id="rightLineReport"></div>
                        </div><!-- end lineReport -->
                    	<form>
                            <textarea rows="6" cols="62" id="ItemReport" placeholder="Report"></textarea><br>
                            <div id="lineButtonReport">
                            <input type="hidden" id="Item_Id_Report"/>
                            <button type="button" id="buttonReport2">Submit</button>
                            </div>
                        </form>
                    
                    </div> <!-- end containerReport -->
           
           
           
          		</div><!-- end boxlStuffReportItem -->
           	</div><!-- end modalStuffReportItem -->
         
    
         
           
            
     <article id="articleReport">
                 
         
         <div id="leftArticle">
                	<div id="topList">
                    <form> <button id="nameSearchReport" type="button" />Description</button></form>
                    <form> <button id="lastSearchReport" type="button" />Reference </button></form>
                    <form> <button id="emailSearchReport" type="button" />Stock</button> </form>
                    <form> <button id="actionSearchReport" type="button" />Add Report</button></form>
           
                    </div>
                    <div id="containerListReport">
                    
                        	<!-- display items width ajax -->
                    
                    </div> <!-- end containerList -->
                    
                     <div id="containerButonReportExcel">
                        <form action="ItemReport.php" target="_blank" method="post"><button type="submit"> Generate Excel Report</button></form>
                        
                    </div>
                    
                
                </div>
                
                <div class="rightArticle2">
                
                 <h1 class="insertTitle">Item Reports</h1>
                
                	<ul>
                        <li id="DisplayAllInventory">All Inventory</li>
                        <li id="DisplayPedingToReturn">On Loan</li>
                        <li id="DisplayReportedItems">Marked</li>
                        <li id="DisplayReportConsumable">Consumables</li>
                    </ul>
                    
                 </div><!-- rightArticle2 -->
                 
                  
            </article>
        </section>
  
 <footer>
        	<div id="leftFooter"> <img src="../images/iTrak2.png" alt="Itrak logo"></div> <div id="rightFooter"> <p><span id="spanFooter">Designed And Developed by:</span> Juan Huertas & Justin Shi</p></div>
    
        </footer>
    
       
   	  <script src="../js/functionsJS.js"></script>
      <script src="../js/myScript.js"></script>
      <script src="../js/functionsStaff.js"></script>
      
      
     <script>
	 	getInfoUserOnJquery(<?php echo $IdUser; ?>,'<?php echo $nameUser; ?>','<?php echo $lastUser; ?>',<?php echo $UserTypeSESSION; ?>);	
			
	</script>
    
    
    </body>
        
    
</html>
