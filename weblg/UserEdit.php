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
				$MidleName = $getUserInfor->MidleName;
				$Last   = $getUserInfor->Last;
				$Password = $getUserInfor->Password;
				$Temple_Id = $getUserInfor->Temple_Id;
				$Email   = $getUserInfor->Email;
				$Cellphone = $getUserInfor->Cellphone;
				$Address1 = $getUserInfor->Address1;
				$Address2   = $getUserInfor->Address2;
				$City = $getUserInfor->City;
				$State = $getUserInfor->State;
				$Zip   = $getUserInfor->Zip;
				$HomePhone = $getUserInfor->HomePhone;
				$WorkPhone = $getUserInfor->WorkPhone;
				$Website = $getUserInfor->Website;
				$UserTypeSESSION = $getUserInfor->User_Type_Id;
				$PermitionUser = $getUserInfor->Permitions;
				
			}
   
?>

<!doctype html>
<html>
	<head>
    
    	<link href="images/icon/Trak.ico" rel="icon" type="image/x-icon"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../css/UserEdit.css" type="text/css">
        <title>TRAK</title>
        
        <script src="../js/myScript.js"></script>
        <script src="../js/functionsJS.js"></script>
   		<script src="../js/updateUser.js"></script>
        <script type="text/javascript" src="../js/jquery-1.10.1.js"></script>
        
   
	</head>
    

	<body>
    	
        <header>
        	<ul>
            	<li><a href="../index.php">Home</a></li>
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
            	<li class="activeTag" onClick="listItems()" id="TagList">Registration</li>
                <!--<li onClick="insertItem()" id="TagInsert">Insert User</li>
                <li onClick="reports()" id="TagReport">Reports</li>-->
            </ul>
        </nav>
        
        <section>
            <aside>
              
              	<video id="videoCapture" autoplay></video>
                
                <button type="button" id="picBtn" onClick="snapshot()">Capture</button>	
                
             	
           	
          	 </aside>
            

            
            <article id="articleList">
       
 				
                
                	<form id="form1" name="form1">
                    
                    			
                      
                      <div id="containerUserInfo">
                      
                      	<div id="leftContainerUserInfo">
                        	<div id="rectanglePicture"></div>
                       		 <canvas id='videoCanvas'></canvas>
                        </div> <!-- end leftContainerUserInfo -->
                        
                        
                        
                        
                
			
                        
                        
                        <div id="rightContainerUserInfo">
                        <h1 class="searchTitle">User Info</h1>
                        	<div class="line1RightContainer">
                              <input type="hidden" name="image" id="imgInput" name="imgInput">
                              <label>Name <span class="required">*</span></label>		<input type="text" id="nameUser" name="nameUser" value="<?php echo    $nameUser ?>" required> 
                              <label>Midle name</label>	<input type="text" id="midleName" name="midleName" value="<?php echo    $MidleName ?>" /> 
                              <label>Last name <span class="required">*</span></label>	<input type="text" id="last" name="last" value="<?php echo    $Last?>"  required> 
                              
                              <input type="hidden" id="Id_User" name="Id_User" value="<?php echo    $IdUser?>" />
                               <input type="hidden" id="UsertTypeID" name="UsertTypeID" value="<?php echo    $UserTypeSESSION?>" />
                                <input type="hidden" id="Permissions" name="Permissions" value="<?php echo    $PermitionUser?>" />
                      		</div> <!-- end line1RightContainer -->
                            <div class="line1RightContainer">                      
                              <label>Email <span class="required">*</span></label>		<input type="email" id="email" name="email" value="<?php echo    $Email?>" required> 
                              <label>Temple Id <span class="required">*</span></label>	<input type="text" id="templeId" maxlength="9" name="templeId" value="<?php echo     $Temple_Id ?>" required>
                              <label>Website</label>	<input type="text" id="webSite" name="webSite" value="<?php echo    $Website?>" /> 
                          	</div><!-- end line1RightContainer -->
                        
                        </div><!-- end rightContainerUserInfo -->
                     
                        
                        
                         </div>   <!-- end containerUserInfo -->
                        
                        
                        
                     	<div id="containerSecurityInfo">
                       	 <h1 class="searchTitle">Security</h1>
                        	<div class="line2RightContainer">
                                <label>Password <span class="required">*</span></label>		<input type="password" id="pass" name="pass" value="<?php echo    $Password?>"  required> 
                                <label>Re-Password <span class="required">*</span></label>	<input type="password" id="re_pass" name="re_pass" value="<?php echo    $Password?>" required onChange="checkPassword()"> 
                            </div><!-- end line1RightContainer -->
                    	</div><!-- end containerSecurityInfo -->
                        
                     	
			
                     <div id="containerContactInfo">
                       
                   
                       
                      <h1 class="searchTitle">Contact Info</h1>
                         <div class="line2RightContainer">
                            <label>Cellphone</label>	<input type="tel" id="cellphone" name="cellphone" value="<?php echo    $Cellphone?>" />
                            <label>HomePhone</label>	<input type="tel" id="homephone" name="homephone" value="<?php echo    $HomePhone?>" />
                            <label>WorkPhone</label>	<input type="tel" id="workphone" name="workphone" value="<?php echo    $WorkPhone?>" />
                          </div> <!-- end  line2RightContainer -->  
                                
                         <div class="line2RightContainer">       
                            <label>Address 1</label>	<input type="text" id="address1" name="address1" value="<?php echo    $Address1?>" /> 
                            <label>Address 2</label>	<input type="text" id="address2" name="address2" value="<?php echo    $Address2?>" /> 
                      	</div> <!-- end  line2RightContainer --> 
                        
                        <div class="line2RightContainer"> 
                            <label>City</label> 	<input type="text" id="city" name="city" value="<?php echo    $City?>" />
                            <label>State</label>	<input type="text" id="state" name="state" value="<?php echo    $State ?>" />
                            <label>Zip</label>		<input type="text" id="zip" name="zip" value="<?php echo    $Zip ?>" />
                     	</div> <!-- end  line2RightContainer --> 
                        
                     </div><!-- end containerSecurityInfo -->
                         
                         
                      
  
                 
                  <div class="line2RightContainer">
                  	<button type="button" name="updateUserInfo" id="submitUser" onClick="javascript: SendFormUpdate()">Update Info</button>
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
        	<div id="leftFooter"> <img src="../images/iTrak2.png" alt="Itrak logo"></div> <div id="rightFooter"> <p><span id="spanFooter">Designed And Developed by:</span> Juan Huertas & Justin Shi</p></div>
    
        </footer>
        
     
    
    </body>
    
    
    
    
    
</html>
