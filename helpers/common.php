<?php
/**
 *--------------------------------------------------------------------------------
 *| Simple Tweet Scheduler Application
 *| by Jogi Silalahi <silalahi.jogi@gmail.com>
 *| http://jogisilalahi.com
 *| version 0.1
 *--------------------------------------------------------------------------------
 */
 
// Function status to string
function status_to_string($status)
{
	if($status == 1)
	{
		return "Published";
	}

	return "Unpublish";
}

// Function to humanize datetime
function datetime_to_human($dtime)
{
	return date("H:i d M Y", strtotime($dtime));
}


?>