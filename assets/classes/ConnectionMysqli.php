
<?php





	class ConnectionMysqli
	{
		
	
		
		private
		 $host           =       "localhost",
         $db             =       "track",
         $userName       =       "track",
         $password       =       "o4yRojfcb6imqGRpsfbe";
		
		
		public function ConnectDB()
		{
					
			return new mysqli($host,$userName,$password,$db,3306);
			if (mysqli_connect_errno()) {
			   printf("Conection with server fail: %s\n", mysqli_connect_error());
			   exit();
			}

		}
		
	}	