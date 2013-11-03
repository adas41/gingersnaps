<?php

	require_once('dbCon.php');

	class qn{

    	public $id;
    	public $qn_text;
      public $options;
      public $correct_option;

    	function __construct($id, $qn_text, $options, $correct_option) {
       		$this->id = $id;
       		$this->qn_text = $qn_text;
          $this->options = $options;
          $this->correct_option = $correct_option;          
   		}
	}

	$result = mysqli_query($con,"SELECT * FROM qn_list");
	
	while ( $db_field = mysqli_fetch_array($result) ) {
    $options = array();

    /*array_push($options, $db_field['option_1_img_id']);
    array_push($options, $db_field['option_2_img_id']);
    array_push($options, $db_field['option_3_img_id']);*/

    //echo implode("','",$options);

    $img_result = mysqli_query($con,"SELECT `img_url` FROM `img_bank` WHERE `id` = " . $db_field['option_1_img_id']);
    while ( $field = mysqli_fetch_array($img_result) ) {
      array_push($options, stripslashes($field['img_url']));
    }

    $img_result = mysqli_query($con,"SELECT `img_url` FROM `img_bank` WHERE `id` = " . $db_field['option_2_img_id']);
    while ( $field = mysqli_fetch_array($img_result) ) {
      array_push($options, stripslashes($field['img_url']));
    }

    $img_result = mysqli_query($con,"SELECT `img_url` FROM `img_bank` WHERE `id` = " . $db_field['option_3_img_id']);
    while ( $field = mysqli_fetch_array($img_result) ) {
      array_push($options, stripslashes($field['img_url']));
    }

		$qnObj = new qn($db_field['id'], $db_field['qn_text'], $options, $db_field['option_correct_img_id']);
	  array_push($response, $qnObj);
  }	

  echo stripslashes(json_encode($response));

	mysqli_close($con);

?>
