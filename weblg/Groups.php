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
				
			
				
			} // End if condition SESSION

?>




<!doctype html>
<html>
	<head>
    
    	<link href="../images/icon/Trak.ico" rel="icon" type="image/x-icon"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
       <!-- <link rel="stylesheet" href="../css/Groups.css" type="text/css"> -->
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
				document.writeln('<link href="../css/Groups_chrome.css" rel="stylesheet" type="text/css">');
			}
		
			else if(is_firefox)
			{
				document.writeln('<link href="../css/Groups_Firefox.css" rel="stylesheet" type="text/css">');
			}
		
			else 
			{
				document.writeln('<link href="../css/Groups_IE.css" rel="stylesheet" type="text/css">');
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
            	<li class="activeTag" onClick="listItems()" id="TagList">Groups</li>
                
                
                <?php if($UserTypeSESSION >= 3){
					
					?>
                     <li onClick="insertItem()" id="TagInsert">Create Group</li>
                    
                     
                    <?php
					
					} ?>
                
                
                
                <li onClick="reports()" id="TagReport">Reports</li>
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
            
            
            
            
            <div id="modalEditBox">
            	<div id="boxEditGroup">
                	<a id="closeButton"> <img src="../images/close.png" alt="close Icon"> </a>
                
                 
						
                        <div id="line1CreateGroup">
                            <h1 class="searchTitle"> Edit group </h1>
                        </div>
                        <form action="../PHP/funcionsPHP.php" method="post">
                        <div id="line2CreateGroup">
                            <div class="labelLine"><label>Group Name:</label></div><div><input type="text" id="GroupNameEdit"  required></div>
                            <div class="labelLine2"><label>Start:</label></div><div><input type="date" id="StartDateEdit" min="<?php echo date("Y-m-d"); ?>" required></div>
                            <div class="labelLine2"><label>End:</label></div><div><input type="date" id="EndDateEdit" min="<?php echo date("Y-m-d"); ?>"  required></div>
                        </div>
                        <hr>
                        <div id="line3CreateGroup">
                            <div id="leftLine3">
                                <h1 class="searchTitle"> Students </h1>
                                
                                <div id="listStudetModal">
                              
                                		<!-- display Students with ajax -->
                          
                                </div><!-- end listStudet -->
                                
                            </div> <!-- end leftLine3 -->
                            <div id="centerLine3">
                                <h1 class="searchTitle">Instructors</h1>
                                
                                
                                <div id="listInstructorModal">
                                 
                               		<!-- display Students with ajax -->
                                
                                </div> <!-- End listInstructor -->
                                
                            </div> <!-- end leftLine3 -->
                            <div id="rightLine3">
                           	 <input type="hidden"  id="idGroup">
                             <button id="EditGroupButton" type="button">Edit Group</button>
                                                        
                            <br>
                            
                            
                            </div> <!-- end leftLine3 -->
                        
                        </div><!-- end line3CreateGroup -->
                        
                        </form>
                        
                
                
                
                
                
                
                
                
                
                
                
                
                </div> <!-- end boxEditGroup -->
             </div><!-- end  modalEditBox-->
            
           
               
            
            
            
            <article id="articleList">
            
            	<div id="leftArticleList">
                
                    <div id="boxGroup">
                        <div id="boxGroupHeader">
                            <div class="nameBox">
                                <form>
                                <button type="button" id="orderGroupName">Group</button>
                                </form>
                            </div>
                            <div class="dateBox">
                                <form>
                                <button type="button" id="orderGroupDate">Date End</button>
                                </form>
                            </div>
                        </div> <!-- end box group line header -->        
                        <div id="containerBoxGroup">
                       
						
                           <!-- display Groups by ajax -->
                         
                            
                            
                        </div> <!-- End container Box -->
                    
                        <div id="menuboxBotton">
                            <form method="post">
                                <input type="text" name="groupSearch" id="groupSearchName">
                                <button type="button" name="buttonSearch" id="buttonGroup"> Search Group</button>
                            </form>
                        
                        </div><!-- end menuboxBotton --> 
                    </div> <!-- end boxGroup -->
                    
                </div><!-- End leftArticleList-->
                <div id="rightArticleList">
                
             
                	
                            <div id="contLineGroup">
                                <div class="line1Right">
                                    <div class="titleLabel">Group: </div>
                                    <div class="nameGroup"><p id="nameGroupInfo"></p></div>
                                </div> <!-- end line1Right-->
                                <div class="line1Right">
                                    <div class="titleLabel">Start:   </div>
                                    <div class="nameGroup"><p id="StartDateInfo"></p></div>
                                    <div class="titleLabel">Until:   </div>
                                    <div class="nameGroup"><p id="EndDateInfo"></p></div>
                                </div>  <!-- end line1Right-->
                             </div>   
                                <div id="lineMembers">
                                
                                    <div id="leftLineMembers">
                                        <h1 class="searchTitle"> Members</h1>
                                        
                                        <div id="containerMembers">
                                      		<!-- display members with ajax -->
                                        </div>
                                    
                                    </div> <!-- end leftlineMembers -->
                                    
                                    <div id="rightLineMembers">
                                        <h1 class="searchTitle"> Instructors</h1>
                                        
                                         <div id="containerInstructor">
                                         	<!-- display members with ajax -->
                                            
                                         </div> <!-- End containerInstructor -->
                                         
                                         <div id="ButtonEditModal">
                                           
                                           <!-- display button with ajax if use have the right credentials -->
                                        </div>        
                                            
                                    
                                    </div> <!-- end right lineMembers -->
                                
                                
                                </div><!-- end lineMembers -->
                       </div><!-- end rightArticleList -->
                
                <div id="rightArticleListSelect">
                	<h1 id="labelSelectGroup">Select a group to display</h1>
                </div>   <!-- end rightArticleListSelect -->      
                
            
            </article> <!-- end articlelist-->
            
            
            
           
           
            <article id="articleInsert">
            
            	<div id="line1CreateGroup">
            		<h1 class="searchTitle"> Create group </h1>
            	</div>
                <form action="../PHP/funcionsPHP.php" method="post">
                <div id="line2CreateGroup">
                	<div class="labelLine"><label>Group Name:</label></div><div><input type="text" id="GroupNameInsert" required></div>
                    <div class="labelLine2"><label>Start:</label></div><div><input type="date" placeholder="Year-Month-day" id="StartDateInsert" min="<?php echo date("Y-m-d"); ?>" required></div>
                    <div class="labelLine2"><label>End:</label></div><div><input type="date" placeholder="Year-Month-day" id="EndDateInsert" min="<?php echo date("Y-m-d"); ?>" required></div>
                </div>
                <hr>
                <div id="line3CreateGroup">
                	<div id="leftLine3">
                    	<h1 class="searchTitle"> Students </h1>
                        
                        <div id="listStudet">
                        
                  			<!-- display Instructo by ajax -->
                            
                        </div><!-- end listStudet -->
                        
                    </div> <!-- end leftLine3 -->
                    <div id="centerLine3">
                    	<h1 class="searchTitle">Instructors</h1>
                        
                        
                        <div id="listInstructor">
                       		<!-- display Instructo by ajax -->
                        </div> <!-- End listInstructor -->
                        
                    </div> <!-- end leftLine3 -->
                    <div id="rightLine3">
                    <button id="GroupButton" name="GroupButton" type="button">Create Group</button>
                    <br>
                    <button id="GroupButton2" type="reset">Reset</button>
                    
                    </div> <!-- end leftLine3 -->
                
                </div><!-- end line3CreateGroup -->
                
                </form>
            </article> <!-- Article Insert -->
            
           
            
              <article id="articleReport">
            
            	<h1>This is the article management Reports  </h1>
            
            </article>
        
        </section>
  
        
       <footer>
        	<div id="leftFooter"> <img src="../images/iTrak2.png" alt="Itrak logo"></div> <div id="rightFooter"> <p><span id="spanFooter">Designed And Developed by:</span> Juan Huertas & Justin Shi</p></div>
    
        </footer>
     
   		
   
    
            <script src="../js/myScript.js"></script>
            <script src="../js/functionsGroups.js"></script>
            <script>
		 		takeinfoUser(<?php echo $UserTypeSESSION ?>, <?php echo $IdUser; ?> );
  	   	 	</script>
    
     </body>
    
</html>
