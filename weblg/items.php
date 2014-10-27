<?php
	require ("../assets/common.php");
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
				$IdUser  		 	= $getUserInfor->User_Id;
				$nameUser 			= $getUserInfor->Name;
				$UserTypeSESSION 	= $getUserInfor->User_Type_Id;
				$PermitionUser 		= $getUserInfor->Permitions;
				
			}
	
   ?>
			
	

<!doctype html>
<html>
	<head>
    
    	<link href="../images/icon/Trak.ico" rel="icon" type="image/x-icon"/>
      	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8">
       <!-- <link rel="stylesheet" href="../css/items.css" type="text/css"> -->
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
				document.writeln('<link href="../css/items_chrome.css" rel="stylesheet" type="text/css">');
			}
		
			else if(is_firefox)
			{
				document.writeln('<link href="../css/items_Firefox.css" rel="stylesheet" type="text/css">');
			}
		
			else 
			{
				document.writeln('<link href="../css/items_IE.css" rel="stylesheet" type="text/css">');
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
              <!--  <a href="UserEdit.php"  id="userA"><img src="../images/UserL.png" alt="Icon User" id="iconUser" /></a> -->
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
            	<li class="activeTag" onClick="listItems()" id="TagList">Item List</li>
                
             <?php if($UserTypeSESSION >= 3){
					
					?>    
                <li onClick="insertItem()" id="TagInsert">Insert Item</li>
               
                     
                    <?php
					
					} ?>
                <?php 
				  if($UserTypeSESSION >= 2){
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
                        <li onClick="itemButton()" class="selected">Items</li>
                        <li onClick="groupButton()">Groups</li>
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
            

            <div id="modalEditItem">            
            	<div id="modalBoxItem">
              		<a onClick="closeModelBoxEditItem();" id="closeItemButton"> <img src="../images/close.png" alt="close Icon"> </a>
     					
                   
                        
                        <!-- The following div will control updae images -->
                        <div id="updateImagebox">
                        	<form enctype="multipart/form-data" id="formImage3">
                           		 <input type="file" id="imgageUpdate" required> <br>
                                 <button type="button" id="updateImageButton">Submit </button>
                            </form>                        
                        </div>
                        
                        
                   
                 <div id="editCont"> 
                    <div id="modalBoxItemLeft">
                 
                
                 	<h1 class="searchTitle">Item Description</h1>
                                
                           <div class="lineInserItem">   
                                 <ul><li onClick="subirImagen4();">Insert Image</li></ul> 
                                 
                                 		<input type="text" id="strImagenEdit" name="strImagen">
                                 <div id="labelItemType"><label>Item Type</label></div>
                                 <div>
                                 	<select name="typeItem" id="TypeItemEdit">
                         					<!-- display Option by ajax -->
                              		</select>
                                  </div>
                           </div>
                           
                           <div id="lineCategories">
                           		<div class="categorySelect"><label>Category</label></div>
                                		<div class="categorySelect2">
                                        
                                        	<select id="categoryItemEdit" onChange="displaySubCategoriesFromFormSelection()">
                                            	<!-- display options with ajax -->
                                            </select>
                                        </div>
                                <div class="categorySelect4"><label>Subcategory</label></div>
                                		<div class="categorySelect2">
                                        	<select id="SubcategoryItemEdit">
                                            		<!-- display options with ajax -->
                                             </select>
                                        </div>
                               
                                 
                                <div class="stockLabel"><label>Stock</label></div>
                                <div class="labelInsert4"><input type="number" id="Stock_QuantityEdit"></div>
            						
			
			
                                
                           
                           </div> <!-- end lineCategories -->
                           
                           
   							<div class="lineInserItem2">
   								<div class="labelInsert"><label>Description</label></div>
                                <div class="labelInsertI"><input type="text" id="descriptionItemEdit" /></div> 
                            	
                            
                            
 								<div class="labelInsert2"><label>Reference</label></div>
                                <div class="labelInsertI2"><input type="text" id="referenceItemEdit" readonly> </div>
 								
                                <div class="labelInsert3"><label>Quantity</label></div>
                                <div class="labelInsertI3"><input type="number" id="quantityItemEdit"  min="0"></div> 
                            </div>
                           
                        
                            
               		   <div class="lineInserItem3">
                            <div class="labelPrice"><label>Price</label></div>
                            <div class="PriceInput"><input type="number" step="any" min="0" id="priceItemEdit" /></div> 
                                        
                            <div class="labelPrice"><label>Date</label></div>
                            <div class="dateInput"><input type="date" id="dateInsertItemEdit"/> </div>
                            <div class="labelDate"><label>Expiration Date</label></div>
                            <div class="dateInput"><input type="date" id="expirationItemEdit"/></div> 
                         </div><!-- end lineInserItem3 -->
                            
                            
                           <hr>
                           
                           
                           
	

                          
                            
                            <h1 class="searchTitle">Item Location</h1>
                            
                           <div class="locationItem1">
                           		<div id="buildingLabel"><label>Building</label></div>
                                <div id="buildingInput"><input type="text" id="buildingItemEdit" /></div>
                                <div id="departmentLabel"><label>Department</label></div>
                                <div id="departementInput"><input type="text" id="departmentItemEdit" /></div>
                                <div id="roomLabel"><label>Room</label></div>
                                <div id="roomInput"><input type="text" id="roomItemEdit" /></div>
                           </div><!-- end locationItem1 -->
                           
                           <div class="locationItem1">
                           		<div id="cabineLabel"><label>Shelf/Cabinet/Box</label></div>
                                <div id="cabineInput"><input type="text" id="cabinetItemEdit" /></div>
                                <div id="locDescLabel"><label>Location Description</label></div>
                                <div id="locDescInput2"><input type="text" id="descriptionLocItemEdit"/></div> 
                                
                                <div id="GrpLabel2"><label>Grp</label></div>
                                <div><input type="checkbox" id="grpEdit"/></div> 
                           </div><!-- end locationItem1 -->
                           
                           <hr>
                           
                           <div id="lineVendorAndGrand">
                           
                           	<div id="leftVaG">
                            
                           		 <div class="lineVendor2">
                                 
                                   <div id="vendorLabel"><label>Suppliers</label></div>
                                		
                                            <select id="supplierItemEdit">
                                           		 <!-- display options with ajax -->
                                            </select> 
                                        
                                  	</div><!-- lineVendor2 -->
                                                                 
                                
                            	 </div> <!-- end leftVag -->
                                
                             
                             <div id="rightVaG">
                           		 <div class="lineVendor2">
                                   <div id="grandLabel"><label>Grants</label></div>
                                		<div>
                                            <select id="grantItemEdit">
                                            	<!-- display options with ajax -->
                                            </select> 
                                        </div>
                                        
                                  </div><!--lineVendor2-->
                               </div> <!-- end rightVaG -->
                           </div><!-- lineVendorAndGrand -->    
                             
                             
                           
                           <input type="hidden" id="ItemIdEdit">
                            
                          	 <div id="lineButtonItem"> <button type="button" id="buttonUpdateItem">Update Item</button></div>
                           
                 
                 
                 
             
                
                
                 </div>
                 
                 
                <div id="modalBoxItemRight"> 
                
                	  	<h1 class="searchTitle2">Lessons</h1>
                        
                        <div id="lessonsBox2">
                       	 <!-- display options with ajax -->
               
               
                        </div> <!-- end lessonsBox2 -->
                        
                
                	
                </div><!-- end modalBoxItemRight-->
                
           </div><!-- end editCont -->
   		
        
                    
                    
                    
                    
                    
                    
                    
            	</div> <!-- end modalBoxItem -->
             </div> <!-- modalEditItem -->
            
            
			<!-- Here start list article -->
            
            <article id="articleList">
            
       
                
              	<div id="leftArticle">
                	<div id="topList">
                    <form> <button type="button" id="descriptionSearchOrde">Description</button></form>
                    <form> <button type="button" id="ReferenceSearchOrder">Reference </button></form>
                    <form> <button type="button" id="stockOrder">Stock</button> </form>
                    <form> <button type="button" id="actionSearchBtn" >Action</button></form>
                   
                    </div>
              
              
              		 <div id="containerList">
                  
                    </div> <!-- end containerList -->
               </div> <!-- end leftArticle-->
                
                <div class="rightArticle">
                
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
                        
                        <form  id="formSearchLast">
                            <h1 class="searchTitle">Choose a Category </h1>
                            
                            	<select id="categoryItemSearch">
                                	 <!-- display options with ajax -->
                               	</select><br>
          
                            <button type="button" id="searchCategoryButton">Search</button>
                        </form>
                        
                        
                        <form id="formSearchEmail">
                            <h1 class="searchTitle">Enter Reference</h1>
                            <input type="text" id="ReferenceSearch" required><br>
                            <button type="button" id="searchReferenceButton">Search</button>
                        </form>
                        
                         <form  id="formSearchTempleId">
                            <h1 class="searchTitle">Enter Lesson</h1>
                            
                             <select id="lessonItemSearch">
                                <!-- display options with ajax -->
											    
                             </select><br>
                            <button type="button" id="searchLessonButton">Search</button>
                        </form>
                          
                    </div>
            
                </div>
              
                
            
            </article> <!-- End listArticle -->
           
           
        
            
            
          
            
            
            <!--  THE FOLLOW DIV CONTAIN THE MENU TO MANAGEMEN THE CATEGORIES -->

		<div id="modalCategories">            
            <div id="modalBoxCategories">
              <a onClick="closeModelPanel3();" id="closeButton"> <img src="../images/close.png" alt="close Icon"> </a>

                      <div id="leftModalCategories">

                            <form  id="insertCategory">
                            <fieldset>
                              <h1 class="categoryTitle">Categories</h1>
                            
                            	<div class="line1Categories">
                                   <input type="text" id="CategoryInput" placeholder="Enter Category"> <br>
                                   <button type="button" id="CategoryButtonInsert">Insert Category</button>    
                               </div> <!-- end line1Categories -->
                            </fieldset>
                            </form>
            
                         	 <form  id="editCategory">
                                   <fieldset>
                                   <a onClick="closeEditCategory()" class="closeEditBoxCategory">Close</a>
                                      <h1 class="categoryTitleEdit">Edit Categories</h1>
                                    
                                        <div class="line1CategoriesEdit">
                                           <input type="hidden" id="CategorId" /> <br>
                                           <input type="text" id="CategoryEditInput" /> <br>
                                           <button type="button" id="CategoryEditButton">Edit Category</button>    
                                       </div> <!-- end line1Categories -->
                                   </fieldset>
                            </form>
                         
                         
                         
                         
                            
                            <form id="formSubcategory">  
                            <fieldset>
                            <h1 class="categoryTitle">Subcategories</h1>
                            	<div class="line1Subcategories">
                                
                                	
                                	<select id="categoryItem2">
                                            <!-- displaying categories with ajax-->
									 </select> <label>Category</label><br>
                                
                                
                                   <input type="text" id="SubCategoryInputInsert" placeholder="Enter Subcategory"> <br>
                                   <button type="button" id="SubCategoryButtonInsert">Insert Subcategory</button>    
                               </div> <!-- end line1Categories -->
                            </fieldset>
                            </form>
                            
                            
                            
                            <form  id="formSubcategoryEdit">  
                            <fieldset>
                             <a onClick="closeEditSubCategory()" class="closeEditBoxCategory">Close</a>
                            <h1 class="categoryTitle">Edit Subcategories</h1>
                            	<div class="line1Subcategories">
                                     
                                   <input type="hidden" id="SubEditID" /> <br>
                                   <input type="text" id="SubCategoryInput2" /> <br>
                                   <button type="button" id="SubCategoryEditButton2">Edit Subcategory</button>    
                               </div> <!-- end line1Categories -->
                            </fieldset>
                            </form>
                            
                      
                      </div> <!-- end leftModalCategories -->
              
              		 <div class="rightModalCategories">
                     
                     		<ul class="barTitleCategories">
                            	<li class="DesCategories">Categories</li>
                                <li class="ActCategories">Actions</li>
                            </ul>
                            <div id="containerListCategories">
                            		 <!-- here display categories with ajax -->
                            </div><!-- end contaiinerListCategories -->
                            
                            
                            
                         <br>
                            
                            <ul class="barTitleCategories">
                            	<li class="DesCategories">Subcategories</li>
                                <li class="ActCategories">Actions</li>
                            </ul>
                            <div id="containerListSubCategories">
                            
                         			 <!-- display Subcategories width ajax -->
                            </div><!-- end contaiinerListCategories -->
                  
                     </div> <!-- end rightModalCategories -->
            
            </div> <!-- end modalBoxCategories -->
            
          </div>  <!--  end modalCategories -->
            
            
            <!-- this is my vendor modal windows --> 
            
            <div id="modalVendor">
            	<div id="modalVendorBox">
                <a onClick="closeModalVendor();" id="closeButton"> <img src="../images/close.png" alt="close Icon"> </a>
                
           			<div id="leftVendor">
                    
                     	<h1 class="categoryTitle">Supplier</h1>
                            <form id="insertVendorForm">
                            
                           		<div class="linesVendor">
                                   <div class="labelVendor"><label>Name</label></div><div><input type="text" id="nameVendorInsert" required></div>
                                </div>
                                <div class="linesVendor">
                                	<div class="labelVendor"><label>Email</label></div><div><input type="email" id="emailVendorInsert"></div>
                                </div>
                                <div class="linesVendor">
                                	<div class="labelVendor"><label>Phone</label></div><div><input type="tel" id="phoneVendorInsert"></div>
                                </div>
                                <div class="linesVendor">
                               		<div class="labelVendor"><label>Web</label></div><div><input type="text" id="webVendorInsert"></div>
                                </div>
                                <div class="linesVendor">
                               		 <button type="button" name="VendorInsertButton" id="VendorInsertB"> New Vendor </button>
                                </div>
                            </form>
                    </div> <!-- div leftVendor -->
                    
                    
                    	<div id="leftVendor2">
                         <a onClick="closeEditVendor()" class="closeEditBoxCategory">Close</a>
                    
                     	<h1 class="categoryTitle">Edit Supplier</h1>
                            <form id="editVendorForm">
                            

                            
                           		<div class="linesVendor">
                                   <div class="labelVendor"><label>Name</label></div><div><input type="text" id="nameVendorEdit" required></div>
                                </div>
                                <div class="linesVendor">
                                	<div class="labelVendor"><label>Email</label></div><div><input type="email" id="emailVendorEdit"></div>
                                </div>
                                <div class="linesVendor">
                                	<div class="labelVendor"><label>Phone</label></div><div><input type="tel" id="phoneVendorEdit"></div>
                                </div>
                                <div class="linesVendor">
                               		<div class="labelVendor"><label>Web</label></div><div><input type="text" id="webVendorEdit"/></div>
                                </div>
                                <div class="linesVendor">
                                	<input type="hidden" id="idVendorEdit" />
                               		 <button type="button" name="VendorEditButton" id="VendorInsertBEdit"> Update Supplier </button>
                                </div>
                            </form>
                    </div> <!-- div leftVendor -->
                    
                    
                    <div id="rightVendor">
                    	<div>
                        	<ul id="verdorTitle">
                            	<li id="vendorName">Suppliers</li>
                                <li id="vendorAction">Actions</li>
                            </ul>
                        </div>
                        <div id="contVendors">
                        	<!-- dislay vendors with ajax-->
                       </div> <!-- End contVendor -->
                    
                    	
                    
                    </div> <!-- end rightVendor -->
                    

                </div> <!-- end of  modalVendorBox -->
            
            </div> <!-- end of modalVendor -->
            
            
            
            
            
            
            
         <!-- this is my grant modal windows -->   
            
            
             <div id="modalGrand">
            	<div id="modalGrandBox">
                <a onClick="closeModalGrand();" id="closeButton"> <img src="../images/close.png" alt="close Icon"> </a>
                
           			<div id="leftGrand">
                    
                 
                    
                     	<h1 class="categoryTitle">Grants</h1>
                            <form id="insertGrandForm">
                            
                           		<div class="linesGrand">
                                   <div class="labelGrand"><label>Name</label></div><div><input type="text" id="nameGrandInsert" required></div>
                                </div>
                                <div class="linesGrand">
                                	<div class="labelGrand"><label>Email</label></div><div><input type="email" id="emailGrandInsert"></div>
                                </div>
                                <div class="linesGrand">
                                	<div class="labelGrand"><label>Phone</label></div><div><input type="tel" name="phoneGrandInsert"></div>
                                </div>
                               
                                <div class="linesGrand">
                               		 <button type="submit" name="GrandInsertButton" id="GrandInsertB"> New Grand</button>
                                </div>
                            </form>
                    </div> <!-- div leftVendor -->
                    
                    
                    	<div id="leftGrand2">
                         <a onClick="closeEditGrand()" class="closeEditBoxCategory">Close</a>
                    
                     	<h1 class="categoryTitle">Edit Grant</h1>
                            <form id="editGrandForm">
                            

                           		<div class="linesGrand">
                                   <div class="labelGrand"><label>Name</label></div><div><input type="text" id="nameGrandEdit" /></div>
                                </div>
                                <div class="linesGrand">
                                	<div class="labelVendor"><label>Email</label></div><div><input type="email" id="emailVendorEdit2" /></div>
                                </div>
                                <div class="linesGrand">
                                	<div class="labelGrand"><label>Phone</label></div><div><input type="tel" id="phoneVendorEdit2" /></div>
                                </div>
                                
                                <div class="linesGrand">
                                	<input type="hidden" id="idGrant" />
                               		 <button type="button" name="GrantEditButton" id="GrandInsertBEdit"> Update Grant </button>
                                </div>
                            </form>
                    </div> <!-- div leftVendor -->
                    
                    
                    <div id="rightGrand">
                    	<div>
                        	<ul id="GrandTitle">
                            	<li id="GrandName">Grants</li>
                                <li id="GrandAction">Actions</li>
                            </ul>
                        </div>
                        <div id="contGrand">
                      
                        	<!-- displaying content with ajax -->
                           
                           
                        
                        </div> <!-- End contGrand -->
                    
                    	
                    
                    </div> <!-- end rightGrand -->
                    

                </div> <!-- end of  modalGrandBox -->
            
            </div> <!-- end of Grand -->
            
            
          
           <!-- Here os article insert Data -->
            <article id="articleInsert">     
            
            
             <div id="sentImage">
                      <form id="formImage2" enctype="multipart/form-data">
                            <input type="file" id="fileItemIsert" required> <br><br>
                            <button type="button" id="buttonSendImagen2" name="submitImage2">Send Image</button>
                       </form>
             </div> <!-- end sentImageWindow -->
            
             
             
                 
                 <form name="formInserItem">
            
        <div id="contInserForm">    
           
             <div id="leftArticleInsert">
             
             
             	  
                 
                
                 	<h1 class="searchTitle">Item Description</h1>
                                
                           <div class="lineInserItem">   
                                 <li onClick="subirImagen3();">Insert Image</li> <input type="text" id="strImagenI" />
                                 <div id="labelItemType"><label>Item Type</label></div>
                                 
                                 <div>
                                 	<select id="typeItemInsert">
                         					<!-- display with ajax -->
                              		</select>
                                  </div>
                           </div>
                           
                           <div id="lineCategories">
                           		<div class="categorySelect"><label>Category</label></div>
                                		<div class="categorySelect2">
                                        
                                        	<select name="categoryItem" id="categoryItem" onChange="displaySubCategoriesFromFormSelectionInsert()">
                                            
											 		<!-- disolay categories items here by ajax -->
											   
                               				 </select>
                                        </div>
                                <div class="categorySelect"><label>Subcategory</label></div>
                                		<div class="categorySelect2">
                                        <select name="SubcategoryItem" id="SubcategoryItem" >
                                       		
                                            <!-- display subcategories with ajax here --> 
                                       
                               			</select>
                                        
                                        </div>
                                 <li onClick="onpenManageCategories()">Managed Categories</li>
                                 
                                 
            
			
			
                                
                           
                           </div> <!-- end lineCategories -->
                           
                           
   						 <div class="lineInserItem2">
   								<div class="labelInsert"><label>Description</label></div><div class="labelInsertI">
                                <input type="text" id="descriptionItem" name="descriptionItem"></div> 
                            	
                                
                             
 								<div class="labelInsert2"><label>Reference</label></div><div class="labelInsertI2"><input type="text" id="referenceItem" readonly> </div>
 								<div class="labelInsert3"><label>Quantity</label></div><div class="labelInsertI3">
                                <input type="number" id="quantityItem" min="0"></div> 
                            </div>
                           
                        
                            
                <div class="lineInserItem3">
   				<div class="labelPrice"><label>Price</label></div><div class="PriceInput"><input type="number" step="any" min="0" id="priceItem"></div> 
                            
 				<div class="labelPrice"><label>Date</label></div><div class="dateInput"><input type="date" min="<?php date("Y-m-d"); ?>" id="dateInsertItem"  required> </div>
 				<div class="labelDate"><label>Expiration Date</label></div><div class="dateInput"><input type="date" id="expirationItem" min="<?php date('Y-m-d'); ?>"></div> 
                            </div>
                            
                            
                           <hr>
                           
                           
                           
	

                          
                            
                            <h1 class="searchTitle">Item Location</h1>
                            
                           <div class="locationItem1">
                           		<div id="buildingLabel"><label>Building</label></div><div id="buildingInput"><input type="text" id="buildingItem" /></div>
                                <div id="departmentLabel"><label>Department</label></div><div id="departementInput"><input type="text" id="departmentItem" /></div>
                                <div id="roomLabel"><label>Room</label></div><div id="roomInput"><input type="text" id="roomItem"/></div>
                           </div>
                           
                           <div class="locationItem1">
                           		<div id="cabineLabel"><label>Shelf/Cabinet/Box</label></div><div id="cabineInput"><input type="text" id="cabinetItem"/></div>
                                <div id="locDescLabel"><label>Location Description</label></div><div id="locDescInput">
                                <input type="text" id="descriptionLocItem" name="descriptionLocItem"/></div> 
                                
                                <div id="GrpLabel"><label>Grp</label></div><div><input type="checkbox" id="grpInsert" name="grp"></div> 
                                
                           </div> <!-- end locationItem1 -->
                           
                           <hr>
                           
                           <div id="lineVendorAndGrand">
                           
                           	<div id="leftVaG">
                           		 <div class="lineVendor2">
                                   <div id="vendorLabel"><label>Suppliers</label></div>
                                		<div>
                                            <select name="supplierItem" id="supplierItem">
                                            	<!-- display supplier items with ajax -->
                                            </select> 
                                        </div>
                                  </div>
                                     
                                <li onClick="openModalVendor();">Edit Supplier</li>  
                             </div> <!-- end leftVag -->
                             
                             
                             <div id="rightVaG">
                           		 <div class="lineVendor2">
                                   <div id="grandLabel"><label>Grants</label></div>
                                		<div>
                                            <select name="grantItem" id="grantItem">
                                           	
                                            	<!-- display Grants by ajax -->
												
                                            </select> 
                                        </div>
                                  </div>
                                     
                                <li onClick="openModalGrand();">Edit Grants</li>  
                             </div> <!-- end leftVag -->
                             
                             
                             
                             
                           </div><!-- end lineVendorAndGrand -->
                           
                           
                           
                           <div id="lineButtonItem"> <button type="button" name="buttonItem" id="buttonItem">Insert</button></div>
                           
                 
                 
                 
             
                
                
                 </div>
                 
                 
                <div id="rightArticleInsert"> 
                
                	  	<h1 class="searchTitle2">Lessons</h1>
                        
                        <div id="lessonsBox">
                        		<!-- displaying lessons with ajax -->
                        </div> <!-- end lessonsBox -->
                        <li onClick="openModalLesson();">Add Lessons</li>
                
                	
                </div><!-- end rightside-->
             </div><!-- end contInserForm -->   
           
   		 </form>
            
            
            <div id="modalLessonsInsert" >
            	<div id="modalBoxLesson">
                <a onClick="closeModalLesson();" id="closeButtonLesson"> <img src="../images/close.png" alt="close Icon" /> </a>
                	<h1 class="categoryTitle">New Lesson</h1>
                		
                        <form>
                        	<fieldset>
                        		<input type="text" id="LessonDescription" required><br>
                            	<button type="button" id="buttonLesson"> Insert Lesson </button>
                        	</fieldset>
                        </form>
                	
                </div>
            </div>
            
            
            
            
               
            <div id="modalLessonsEdit" >
            	<div id="modalBoxLessonEdit">
                <a onClick="closeModalLessonEdit();" id="closeButtonLessonEdit"> <img src="../images/close.png" alt="close Icon"> </a>
                	<h1 class="categoryTitle">Edit Lesson</h1>
                		
                        <form>
                        <fieldset>
                        	<input type="hidden" id="lessonIdToEdit">
                        	<input type="text" id="Lesson_DescriptionToEdit" required><br>
                            <button type="button" id="buttonLessonEdit"> Update Lesson </button>
                        </fieldset>
                        </form>
                	
                </div>
            </div>
            
           </article> <!-- end insertArticle -->
           
           
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
     	<script src="../js/functionsItem.js"></script>
        
    	<script>
		 	takeinfoUser(<?php echo $UserTypeSESSION ?>, <?php echo $IdUser; ?> );
  	    </script>
		 <script src="../js/myScript.js"></script>
   
		
  
    </body>
    
    
    
    
    
</html>
