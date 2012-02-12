<?php
/**
 *--------------------------------------------------------------------------------
 *| Simple Tweet Scheduler Application
 *| by Jogi Silalahi <silalahi.jogi@gmail.com>
 *| http://jogisilalahi.com
 *| version 0.1
 *--------------------------------------------------------------------------------
 */
require_once(dirname(__FILE__) . '/../config/database.php');

$con = mysql_connect($dbhostname, $dbusername, $dbpassword) or die('cannot connect to database');
$db = mysql_select_db($dbdatabase, $con) or die('cannot select database');

// Get All Tweet
function get_all_tweet()
{
	$query = "SELECT * 
			  FROM tweets";

	$result = mysql_query($query);
	$data = array();
	$i = 0;

	// Fetch result and re-format into array
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[$i]['id'] = $row['id'];
		$data[$i]['tweet'] = $row['tweet'];
		$data[$i]['publish_date'] = $row['publish_date'];
		$data[$i]['status'] = $row['status'];
		$i++;
	}

	// Flush resource, return result
	mysql_free_result($result);
	return $data;
}

// Schedule Tweet
// @param string Tweet
// @param string Date to publish
function schedule_tweet($tweet, $publish_date)
{
	$query = "INSERT INTO tweets (tweet, publish_date, status)
			  VALUES ('$tweet', '$publish_date', 0)";
	
	mysql_query($query);
}

// Change Tweet Status
// Changing status from unpublished to publish
// @param int Tweet ID 
function success_to_publish($id)
{
	$query = "UPDATE tweets
			  SET status = 1
			  WHERE id = $id";

	mysql_query($query);
}

// Get Tweet to Publish
function get_tweet_to_publish()
{
	$query = "SELECT *
			  FROM tweets
			  WHERE publish_date < now() AND status = 0";

	$result = mysql_query($query);
	$data = array();
	$i = 0;

	// Fetch result and re-format into array
	while($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$data[$i]['id'] = $row['id'];
		$data[$i]['tweet'] = $row['tweet'];
		$data[$i]['publish_date'] = $row['publish_date'];
		$data[$i]['status'] = $row['status'];
		$i++;
	}

	// Flush resource, return result
	mysql_free_result($result);
	return $data;
}
