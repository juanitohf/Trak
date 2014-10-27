

<?php
	require_once ("PHP/ExportExcel.php");

?>
<!doctype html>
<html>
	<head>
    
    	<link href="images/icon/Trak.ico" rel="icon" type="image/x-icon"/>
    	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/Studio.css" type="text/css">
        <title>Studio Trak</title>
     
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
                		<p id="logoutP"> Are you sure? </p> <button type="button" id="logout1" onClick="logoutRoot();">Yes</button> <button type="button" id="logout2" onClick="openLogoutBar()">No</button>
                	</div>
                <?php	
				}
				?>
            </div>
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
            
            	<?php
					$convert =  new ExportExcel();
					$result = $convert->ExportToDatabase();
				
				?>
            
        	</article> <!-- end articleList -->
            
        
        
        
        </section>
  
        
        <footer>
        	<div id="leftFooter"> <img src="images/iTrak2.png" alt="Itrak logo"></div> <div id="rightFooter"> <p><span id="spanFooter">Designed And Developed by:</span> Juan Huertas & Justin Shi</p></div>
    
        </footer>
       
       
     
    
    </body>
    
    
    
    
    
</html>
