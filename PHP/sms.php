<?php

	$CellNumber = $_POST["CellNumber"];
	
   

    switch($_POST["functionname"]){ 

        case 'SentSMS': 
            
			 $message = wordwrap("The items you requested are ready for pickup at the TUteach Studio. If you have questions, or you will not pickup your items on the requested sign-out date, please contact the Studio at 215 204-2653 or 215 204-3628.");
		     $to = $CellNumber.'@txt.att.net';
			 $Result = mail($to, "", $message, "From: TUteach <TUteach@gmail.com>\r\n");	
			 echo  $Result;
            break;      
    }   


?>