<?php

class Connection
	{
		
		private 
		 $host           =       "localhost",
         $db             =       "track",
         $userName       =       "track",
         $password       =       "o4yRojfcb6imqGRpsfbe";
		
		
		public function ConnectDB()
		{
					
			return new PDO("mysql:host=$this->host; dbname=$this->db", $this->userName, $this->password);	
			print_r($stmt->errorInfo());

		}
		
	}	
	
	