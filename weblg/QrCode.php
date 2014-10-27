<?php
require_once "../assets/common.php";
session_start();

//Start connection With Db
				$db = new Connection();
				$DbConnect  = $db->ConnectDB();
		
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
				
				$getUserInfor  = null;
			}
		
	

	
   ?>
			
	

<!doctype html>
<html>
	<head>
    
    	<link href="../images/icon/Trak.ico" rel="icon" type="image/x-icon"/>     
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
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
				document.writeln('<link href="../css/QrCode_chrome.css" rel="stylesheet" type="text/css">');
			}
		
			else if(is_firefox)
			{
				document.writeln('<link href="../css/QrCode_Firefox.css" rel="stylesheet" type="text/css">');
			}
		
			else 
			{
				document.writeln('<link href="../css/QrCode_IE.css" rel="stylesheet" type="text/css">');
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
            	<li class="activeTag" onClick="listItems()" id="TagList">Qr-Code</li>
              <!--  <li onClick="reports()" id="TagReport">Reports</li> -->
            </ul>
        </nav>
        
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
                         	<li onClick="StuffButton()">Staff</li>
                            <li onClick="QrCodeButton()"  class="selected">QR-Code</li>
                        
                        <?php
							}
						?>
                         
                       
                      
                       
                    </ul>	
           	 </aside>
            

                 
           
            
            
			<!-- Here start list article -->
            
            <article id="articleList">
            
       
                
              	<div id="leftArticle">
                	<div id="topList">
                    <form> <button id="nameSearch" type="button">Description</button></form>
                    <form> <button id="lastSearch" type="button">Reference </button></form>
                    <form> <button id="emailSearch" type="button">Stock</button> </form>
                    <form> <button id="actionSearch" type="button" >Qr-Code</button></form>
                    </form>
                    </div>
                    <div id="containerList">
                   			<!-- displaying info by ajax-->
                    </div> <!-- end containerList -->
                    
                    <div id="lineButtonQr">
                    <form method="post" action="generatePDF.php" target="_blank">
                    	<button type="submit">Print Items with Qr-Codes</button>
                    </form>
                    </div>
                
                </div>
                
                <div id="rightArticle">
                
                 <h1 class="insertTitle">SEARCH</h1>
                
                	<ul>
                    	<li onClick="openBoxNameSearch();">Search by Description</li>
                        <li onClick="openBoxLastSearch();">Search by Category</li>
                        <li onClick="openBoxEmailSearch();">Search by Reference</li>
                        <li onClick="openBoxTempleIdSearch();">Search by Lesson</li>
                    </ul>
                    
                    <div id="boxSearch">
                    
                    	<form id="formSearchName">
                            <h1 class="searchTitle">Enter Description </h1>
                            <input type="text" id="descriptionSearch" required><br>
                            <button type="button" id="searchDescriptionButton">Search</button>
                        </form>
                        
                        <form id="formSearchLast">
                            <h1 class="searchTitle">Choose a Category </h1>
                            
                            	<select id="categoryItemSearch">
                                     <!-- display option by ajax -->
                                </select><br>
          
                            <button type="button" id="searchCategoryButton">Search</button>
                        </form>
                        
                        
                        <form id="formSearchEmail">
                            <h1 class="searchTitle">Enter Reference</h1>
                            <input type="text" id="ReferenceSearch" required><br>
                            <button type="button" id="searchReferenceButton">Search</button>
                        </form>
                        
                         <form id="formSearchTempleId">
                            <h1 class="searchTitle">Enter Lesson</h1>
                            
                                <select id="lessonItemSearch">
                                            <!-- display lessons by ajax -->
                                 </select><br>
                            <button type="button" id="searchLessonButton">Search</button>
                        </form>
                          
                    </div>
            
                </div>
              
                
            
            </article> <!-- End listArticle -->
           
           
           
           <!-- Here os article insert Data -->
            <article id="articleInsert">
            
          		<h1> End artile search</h1>
            
            </article>
    
            
              <article id="articleReport">
            
            	<h1>This is the article management Reports  </h1>
            
            </article>
        
        </section>
  
         <footer>
        	<div id="leftFooter"> <img src="../images/iTrak2.png" alt="Itrak logo"></div> <div id="rightFooter"> <p><span id="spanFooter">Designed And Developed by:</span> Juan Huertas & Justin Shi</p></div>
    
        </footer>
         
       <script src="../js/myScript.js"></script>
       <script src="../js/functionsJS.js"></script>
       <script src="../js/functionsQrCode.js"></script> 
       <script>
      	 getInfoUserOnJquery(<?php echo $IdUser ?> ,<?php echo $nameUser ?> ,<?php echo $lastUser ?>,<?php echo $UserTypeSESSION  ?>);
       </script>
     
				
    </body>
  </html>
