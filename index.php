<?php 
/**
 *--------------------------------------------------------------------------------
 *| Simple Tweet Scheduler Application
 *| by Jogi Silalahi <silalahi.jogi@gmail.com>
 *| http://jogisilalahi.com
 *| version 0.1
 *--------------------------------------------------------------------------------
 */

require_once(dirname(__FILE__) . '/models/database.php');
require_once(dirname(__FILE__) . '/helpers/common.php');

	// Page requested
	$page = $_GET['page']; 

	// Simple Controller
	if($page == 'schedule'){
		if($_POST['__submit'])
		{
			// Missing information
			if( ! $_POST['tweet'] || ! $_POST['publish_date'])
			{
				header('location:?page=schedule');
			}
			schedule_tweet($_POST['tweet'], $_POST['publish_date']);
			header('location:?');
		}
		include('views/schedule.php');
	}else{
		$tweets = get_all_tweet();
		include('views/index.php');
	}
?>
