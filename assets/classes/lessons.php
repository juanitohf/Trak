<?php

/*

Table "lessons"

Lesson_Id
Lesson_description	

*/

require_once('Connection.php');


class lessons
{
	
	private $lesson;
	
	public
	$Lesson_Id,
	$Lesson_description;
	
	
		public function __construct()
		{
			$this->lesson = new Connection();
			$this->lesson = $this->lesson->ConnectDB();
	
		}
		
	
public function Insert_Lesson($Lesson_description)
		{
			$query_checkLesson = $this->lesson->prepare("SELECT * FROM lessons WHERE Lesson_description = ?");
			$query_checkLesson->bindParam(1,$Lesson_description);
			$query_checkLesson->execute();
			
			if($query_checkLesson->rowCount() == 1){
				return 2; // Return 2 because this lesson is repeated
			}else{
				
				
				$query_Insert = $this->lesson->prepare("INSERT INTO lessons (Lesson_description) VALUES(?)" );
				$query_Insert->bindParam(1, $Lesson_description);
				$query_Insert->execute();
				
				if($query_Insert->rowCount() ==1){
					
					return 1; // becausea everything work fine
				}else{
					return 0; // error mistake
					
				}
			}
		}
	 
	 
	 	
		public function update_Lesson($Lesson_Id, $Lesson_description)
		{
			$query_checkLesson = $this->lesson->prepare("SELECT * FROM lessons WHERE Lesson_description = ?");
			$query_checkLesson->bindParam(1,$Lesson_description);
			$query_checkLesson->execute();
			
			if($query_checkLesson->rowCount() >= 1)
			{
				return 2; // Becasue it is repeated
			}else{
				
				$query_Update = $this->lesson->prepare("UPDATE lessons SET Lesson_description=? WHERE Lesson_Id=?" );
				$query_Update->bindParam(1, $Lesson_description);
				$query_Update->bindParam(2, $Lesson_Id);
				$query_Update->execute();
				
				if($query_Update->rowCount() == 1){
					return 1;
				}else{
					return 0;
				}
			}
		}
	 
	 
	 
	 	public function get_lesson_Info_by_ID($Lesson_Id)
			{
				
				$query_getLesson = $this->lesson->prepare("SELECT * FROM lessons WHERE Lesson_Id = ?");
				$query_getLesson->bindParam(1, $Lesson_Id);
				$query_getLesson->execute();
				$result = $query_getLesson->fetchAll(PDO::FETCH_ASSOC);
				@$result = $result[0];
				
				
					$this->Lesson_Id			= $result['Lesson_Id'];		
					$this->Lesson_description	= $result['Lesson_description'];
					
					
			}
	 
	 
		public function Delete_lesson($Lesson_Id)
		{
		
			
			$query_Delete = $this->lesson->prepare("DELETE QUICK FROM lessons WHERE Lesson_Id = ? ");
			$query_Delete->bindParam(1, $Lesson_Id);
			$query_Delete->execute();
			
			if($query_Delete->rowCount() ==1){
				return 1; // Lesson deleted successufully
			}else{
				return 0; // error deleting lesson
				}
		}
	
	
} // End of myLesson Class