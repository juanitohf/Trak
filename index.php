

<!doctype html>
<html>
	<head>
    
    	<link href="images/icon/Trak.ico" rel="icon" type="image/x-icon"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
       <!-- <link rel="stylesheet" href="css/index.css" type="text/css">-->
        <title>Trak</title>
        <script src="js/myScript.js"></script>
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
				document.writeln('<link href="css/index_chrome.css" rel="stylesheet" type="text/css">');
			}
		
			else if(is_firefox)
			{
				document.writeln('<link href="css/index_Firefox.css" rel="stylesheet" type="text/css">');
			}
		
			else 
			{
				document.writeln('<link href="css/index_IE.css" rel="stylesheet" type="text/css">');
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
        
        <section>
            <aside>
            
            <img src="images/logo3.png" alt="tuTeach icon"/>
            	<ul id="menuPrincipal">
                	<li onClick="loginFirst()">Users</li>
                    <li onClick="loginFirst()">Items</li>
                    <li onClick="loginFirst()">Groups</li>
                    <li onClick="loginFirst()">Reservations</li>
                    <li onClick="loginFirst()">Staff</li>
                    <li onClick="loginFirst()">QR-Code</li>
                    
                   
                </ul>
            	
            </aside>
            
            <article>
            	<img src="images/iTrak.png" alt="logo itrak" width="100%">     
            
           
            </article>
        
        </section>
        
        
        <footer>
        	<div id="leftFooter"> <img src="images/iTrak2.png" alt="Itrak logo"></div> <div id="rightFooter"> <p><span id="spanFooter">Designed And Developed by:</span> Juan Huertas & Justin Shi</p></div>
    
        </footer>
        
     
    
    </body>
    
    
    
    
    
</html>
