<?php

	require_once('dbCon.php');

	class task{

    	public $id;
    	public $task_text;

    	function __construct($id, $task_text) {
       		$this->id = $id;
       		$this->task_text = $task_text;
   		}
	}

  	$result = mysqli_query($con,"SELECT * FROM task_list");
  	
  	while ( $db_field = mysqli_fetch_array($result) ) {
  		$taskObj = new task($db_field['id'], $db_field['task_text']);
		array_push($response, $taskObj);
	}	

	echo json_encode($response);

  	mysqli_close($con);

?>