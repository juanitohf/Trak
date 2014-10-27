<?php

	require_once "assets/common.php";
	  session_start();
	  
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
        <!-- <link rel="stylesheet" href="css/Studio.css" type="text/css"> -->
        <title>Studio Trak</title>
        <script src="js/myScript.js"></script>
   		<script type="text/javascript">
		  window.onload = function(){
			  var text_input = document.getElementById ('scanner');
			  text_input.focus ();
			  text_input.select ();
			}
		</script>
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
				document.writeln('<link href="css/Studio_chrome.css" rel="stylesheet" type="text/css">');
			}
		
			else if(is_firefox)
			{
				document.writeln('<link href="css/Studio_Firefox.css" rel="stylesheet" type="text/css">');
			}
		
			else 
			{
				document.writeln('<link href="css/Studio_IE.css" rel="stylesheet" type="text/css">');
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
            	<li class="activeTag" onClick="listItems()" id="TagList">Studio</li>
                <li onClick="insertItem()" id="TagInsert">History</li>
                <li onClick="reports()" id="TagReport">Reports</li>
            </ul>
        </nav>
        
        <section>
          
           
		
            
            <article id="articleList">
            
            
            	<div id="leftArticle">
                
                	<h1 class="insertTitle2">Visitors at <?php 
					$DateT = date('Y-m-d');
					$DateToday   = strtotime($DateT);
					$dateModified = date('m/d/Y', $DateToday);
					
					?></h1>
                	
                    <div id="lineHeaderContainer">
                        
                        <form method="post" action="Studio.php"><button id="NameBt" name="NameBt">Name</button></form>
                        <form method="post" action="Studio.php"><button id="TempleBt" name="TempleBt">Temple Id</button></form>
                        <form method="post" action="Studio.php"><button id="DateBt" name="DateBt">Date</button></form>
                        <form method="post" action="Studio.php"><button id="TimeStarBt" name="TimeStarBt">Time Start</button></form>
                        <form method="post" action="Studio.php"><button id="TimeStudioeBt" name="TimeStudioeBt">Time on Studio</button></form>
                        <form method="post" action="Studio.php"><button id="StatusBt" name="StatusBt">Status</button></form>
                    	
                    </div>
                    
                    <div id="containerDisplay">
                    
                     <?php
					
						$dateToday = date('Y-m-d');
						
						
						if(isset($_POST['NameBt'])){
							
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND visitors.Date = ? ORDER BY users.Name");
																 
							$Query_UserStudio->bindParam(1,$dateToday);
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['TempleBt'])){
							
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND visitors.Date = ? ORDER BY users.Temple_Id");
																 
							$Query_UserStudio->bindParam(1,$dateToday);
							$Query_UserStudio->execute();
							
						} else if(isset($_POST['DateBt'])){
							
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND visitors.Date = ? ORDER BY visitors.Date");
																 
							$Query_UserStudio->bindParam(1,$dateToday);
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['TimeStarBt'])){
							
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND visitors.Date = ? ORDER BY visitors.TimeStart");
																 
							$Query_UserStudio->bindParam(1,$dateToday);
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['TimeStudioeBt'])){
							
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND visitors.Date = ? ORDER BY visitors.TimeOnStudio");
																 
							$Query_UserStudio->bindParam(1,$dateToday);
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['StatusBt'])){
							
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND visitors.Date = ? ORDER BY visitors.Id_Status_Visitor DESC");
																 
							$Query_UserStudio->bindParam(1,$dateToday);
							$Query_UserStudio->execute();
							
						}
						
						else{
						
						$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND visitors.Date = ? ORDER BY TimeStart DESC");
																 
						$Query_UserStudio->bindParam(1,$dateToday);
						$Query_UserStudio->execute();
						
						}
					
							
					
						
						
						
						while ($result = $Query_UserStudio->fetch(PDO::FETCH_ASSOC)) {
	
								
								$Visitor_id 	= $result["Visitor_Id"];
								$DateVisitor	= $result['Date'];
								$TimeStart 		= $result['TimeStart'];
								$TimeEnd 		= $result['TimeEnd'];
								$TimeOnStudio 	= $result['TimeOnStudio'];
								$StatusVisitor 	= $result['Id_Status_Visitor'];
								$NameUser 		= $result['Name'];
								$LastUser 		= $result['Last'];
								$TempleIDUser 	= $result['Temple_Id'];
								
								
								$ts   = strtotime($DateVisitor);
								$dateModified = date('m/d/Y', $ts);
																
							
							
						?>
                     
                    
                    
                    	<div class="lineDisplay">
                        	<div class="NameDiv"><p><?php echo $NameUser. " ". $LastUser; ?></p></div>
                            <div class="TempleDiv"><p><?php echo $TempleIDUser; ?></p></div>
                            <div class="DateDiv"><p><?php echo $dateModified; ?></p></div>
                            <div class="TimeStarDiv"><p><?php echo $TimeStart; ?></p></div>
                            <div class="TimeStudioeDiv"><p><?php echo $TimeOnStudio; ?></p></div>
                            <div class="StatusDiv">
							 <?php if($StatusVisitor == 0)
                                    {
                                        ?>
                                             <p id="StatusColor0"> Outside</p>
                                        <?php
                                    }else
                                        {
                                        ?>
                                             <p id="StatusColor1"> Inside</p>
                                        <?php	
                                        }
                                     ?>
								
                            
                            
                            	</div>
                        </div><!-- end lineDisplay -->
                        
                        <?php
						
						}
						
						?>
                      
                        
                    
                    
                    </div> <!-- end containerDisplay -->
                    
                    <div id="LineSliderCar">
                        <div id="labelSlide"> 
                            <form method="post" action="PHP/funcionsPHP.php"name="formIndex">
                            <label> Slide Temple Id </label>
                        </div>
                   	    <div>
                            <input type="text" name="scanner" id="scanner">
                            <input type="hidden" type="submit" value="send" name="buttonID">
                            </form>
                    	</div>
                    </div><!-- end LineSliderCar -->
                </div> <!-- end leftArticle -->
                
                <div id="rightArticle">
                
                	<h1 class="insertTitle2">Info Visitor</h1>
                	<div id="boxInfoUser">
                    
                    
                        	<?php
								$ID_LastVisitor = $_SESSION['Id_Last_Visitor'];
                            
								$getInfoLastVisitor = new Users();
								$getInfoLastVisitor->get_User_Info_by_ID($ID_LastVisitor);
								
								$ImagenStudio = $getInfoLastVisitor->Image;
								$NameStudio = $getInfoLastVisitor->Name;
								$LastStudio = $getInfoLastVisitor->Last;
								$EmailStudio = $getInfoLastVisitor->Email;
								$TempleIdStudio = $getInfoLastVisitor->Temple_Id;
								
							?>
                        
                    
                    
                    	<div id="lineInfo">
                        	<div id="imageUserBox">
                            	<img src="weblg/images/Users/<?php echo $ImagenStudio;?>" alt="userImg" class="userImg"/>
                            </div><!-- end imageUserBox -->
                        </div><!-- end lineInfo -->
                        <div id="lineInfoData">
                        
                        
                        
                        	<div class="line1InfoData">
                            	<div class="labelInfoData">
                                	<p>Name:</p>
                                </div>
                                <div class="infoDataPHP"><p><?php echo $NameStudio ."  ". $LastStudio; ?> </p></div>
                            </div>
                            
                            <div class="line1InfoData">
                            	<div class="labelInfoData">
                                	<p>Email:</p>
                                </div>
                                <div class="infoDataPHP"><p><?php echo $EmailStudio; ?></p></div>
                            </div>
                            <div class="line1InfoData">
                            	<div class="labelInfoData">
                                	<p>Temple Id:</p>
                                </div>
                                <div class="infoDataPHP"><p><?php echo $TempleIdStudio; ?></p></div>
                            </div>
                           
                        
                        </div>
                    
                    </div><!-- end boxInfoUser -->
                
                
                </div> <!-- end leftArticle -->
            
            
            
            <?php
			$getInfoLastVisitor = null;
			?>
            
            </article>
           
           
            <article id="articleInsert">
           
           
           
           	
            	<div id="leftArticle">
                
                	<h1 class="insertTitle2">Visitors History</h1>
                	
                    <div id="lineHeaderContainer">
                        
                        <form method="post" name="form2" action="Studio.php"><button id="NameBt" name="NameBt2">Name</button></form>
                        <form method="post" name="form2" action="Studio.php"><button id="TempleBt" name="TempleBt2">Temple Id</button></form>
                        <form method="post" name="form2" action="Studio.php"><button id="DateBt" name="DateBt2">Date</button></form>
                        <form method="post" name="form2" action="Studio.php"><button id="TimeStarBt" name="TimeStarBt2">Time Start</button></form>
                        <form method="post" name="form2" action="Studio.php"><button id="TimeStudioeBt" name="TimeStudioeBt2">Time on Studio</button></form>
                        <form method="post" name="form2" action="Studio.php"><button id="StatusBt" name="StatusBt2">Status</button></form>
                    	
                    </div>
                    
                    <div id="containerDisplay2">
                    
                     <?php
					
						$dateToday = date('Y-m-d');
						
						
						if(isset($_POST['NameBt2'])){
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
								
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id ORDER BY users.Name");
																
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['TempleBt2'])){
							
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id ORDER by Temple_Id");
																
							$Query_UserStudio->execute();
							
						} else if(isset($_POST['DateBt2'])){
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
							
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id ORDER BY visitors.Date");
																
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['TimeStarBt2'])){
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
							
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id ORDER BY visitors.TimeStart");
																
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['TimeStudioeBt2'])){
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
							
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id ORDER BY TimeOnStudio");
																
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['StatusBt2'])){
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
							
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id ORDER BY visitors.Id_Status_Visitor DESC");
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['nameSearch'])){
							$NameToSearch = $_POST['nameSearch'].'%';
							
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
							
									
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND (users.Name LIKE :search) 
																ORDER BY visitors.Id_Status_Visitor DESC");
							$Query_UserStudio->bindParam(':search',$NameToSearch);
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['lastSearch'])){
							$LastToSearch = $_POST['lastSearch'].'%';
							
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
							
									
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND (users.Last LIKE :search) 
																ORDER BY visitors.Id_Status_Visitor DESC");
							$Query_UserStudio->bindParam(':search',$LastToSearch);
							$Query_UserStudio->execute();
							
						}else if(isset($_POST['SearchByDate'])){
							
							$SearchSince = $_POST['dateSearchSince'];
							$SearchUntil = $_POST['dateSearchUntil'];
							
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
							
									
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND (visitors.Date >= ? AND visitors.Date <= ?) 
																ORDER BY visitors.Date");
							$Query_UserStudio->bindParam(1,$SearchSince);
							$Query_UserStudio->bindParam(2,$SearchUntil);
							
							$Query_UserStudio->execute();
							
						}else if(isset($_GET['insideStudio'])){
							
						
							$Id_Status_VisitorSearch =1;
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
							
									
							$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id AND visitors.Id_Status_Visitor = ?
																ORDER BY users.Name");
							$Query_UserStudio->bindParam(1,$Id_Status_VisitorSearch);
							$Query_UserStudio->execute();
							
						}else if(isset($_GET['closeDay'])){
							
							?>
							<script>
								onload = function() {
								insertItem();
								};
							</script>
                			<?php
							
							
										
										$Close_Visitor = new Visitor();
										$Close_Visitor->Close_All_Visitor();	
								
								
								
								$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id ORDER BY TimeStart DESC");
																 
								
								$Query_UserStudio->execute();
									
								
								
									
							
						
							
							
						} else{
						
						$Query_UserStudio = $DbConnect->prepare("SELECT visitors.Visitor_Id,visitors.Date,visitors.TimeStart,
																visitors.TimeEnd, visitors.TimeOnStudio, visitors.Id_Status_Visitor, 
																users.Name,users.Last, users.Temple_Id FROM visitors, users 
																WHERE visitors.User_Id = users.User_Id ORDER BY TimeStart DESC");
																 
						$Query_UserStudio->bindParam(1,$dateToday);
						$Query_UserStudio->execute();
						
						}
					
							
					
					
						
						
						while ($result = $Query_UserStudio->fetch(PDO::FETCH_ASSOC)) {
	
								
								$Visitor_id 	= $result["Visitor_Id"];
								$DateVisitor	= $result['Date'];
								$TimeStart 		= $result['TimeStart'];
								$TimeEnd 		= $result['TimeEnd'];
								$TimeOnStudio 	= $result['TimeOnStudio'];
								$StatusVisitor 	= $result['Id_Status_Visitor'];
								$NameUser 		= $result['Name'];
								$LastUser 		= $result['Last'];
								$TempleIDUser 	= $result['Temple_Id'];
								
								
								$ts   = strtotime($DateVisitor);
								$dateModified = date('m/d/Y', $ts);
																
							
							
						?>
                     
                    
                    
                    	<div class="lineDisplay">
                        	<div class="NameDiv"><p><?php echo $NameUser. " ". $LastUser; ?></p></div>
                            <div class="TempleDiv"><p><?php echo $TempleIDUser; ?></p></div>
                            <div class="DateDiv"><p><?php echo $dateModified; ?></p></div>
                            <div class="TimeStarDiv"><p><?php echo $TimeStart; ?></p></div>
                            <div class="TimeStudioeDiv"><p><?php echo $TimeOnStudio; ?></p></div>
                            <div class="StatusDiv">
							 <?php if($StatusVisitor == 0)
                                    {
                                        ?>
                                             <p id="StatusColor0"> Outside</p>
                                        <?php
                                    }else
                                        {
                                        ?>
                                             <p id="StatusColor1"> Inside</p>
                                        <?php	
                                        }
                                     ?>
								
                            
                            
                            	</div>
                        </div><!-- end lineDisplay -->
                        
                        <?php
						
						}
						$Close_Visitor = null;
						?>
                      
                        
                    
                    
                    </div> <!-- end containerDisplay -->
                    
                   
                </div> <!-- end leftArticle -->
                
                <div id="rightArticle2">
                
                	<h1 class="insertTitle3">Search</h1>
                    
                	<div id="boxInfoUser2">
                    	<ul>
                        	<li onClick="boxContainerSearchN();">First Name</li>
                            <li onClick="boxContainerSearchL();">Last Name</li>
                            <li onClick="boxContainerSearchD();">By Date</li>
                            <li onClick="searchByInsideStudio();">Signed In</li>
                            <li onClick="closeDay();">Close Studio</li>
                        </ul>
                        
                        
                        
                        <div id="boxContainerSearch">
                        	
                            <div id="contFormName">
                                <form name="SearchByName" method="post">
                                    <label>Name</label> <br>
                                    <input type="text" name="nameSearch">
                                </form>
                    		</div>
                            
                             <div id="contFormLast">
                                <form name="SearchByLast" method="post">
                                    <label>Last Name</label> <br>
                                    <input type="text" name="lastSearch">
                                </form>
                    		</div>
                            
                             <div id="contFormDate">
                                   <form  method="post">
                                   <div class="lineContFormDate">
                                        <div class="labelDate"> <label>Since</label> </div>
                                        <div><input type="date" name="dateSearchSince"></div>
                                   </div>
                                   <div class="lineContFormDate">
                                     	<div class="labelDate"><label>Until</label> </div>
                                    	<div><input type="date" name="dateSearchUntil"></div>
                                    </div>
                                    <button type="submit" name="SearchByDate"> Search</button>
                                </form>
                    		</div>
                            
                            
                            
                  	  	</div><!-- end boxContainerSearch -->
                        
                        
                        
                    </div><!-- end boxInfoUser -->
                	
                
                </div> <!-- end rightArticle2 -->
                
        </article> <!-- end articleInsert -->
            
           
            
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
