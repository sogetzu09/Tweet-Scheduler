<?php
/**
 *--------------------------------------------------------------------------------
 *| Simple Tweet Scheduler Application
 *| by Jogi Silalahi <silalahi.jogi@gmail.com>
 *| http://jogisilalahi.com
 *| version 0.1
 *--------------------------------------------------------------------------------
 */
require_once(dirname(__FILE__) . '/config/twitter.php');
require_once(dirname(__FILE__) . '/models/database.php');
require_once(dirname(__FILE__) . '/libraries/twitteroauth.php');

// Get Tweets to Publish
$tweets = get_tweet_to_publish();

// If empty, exit!
if( ! $tweets)
{
	exit;
}

$connection = new TwitterOAuth($consumer_key, $consumer_secret, $oauth_token, $oauth_secret);

foreach($tweets as $tweet)
{
	$connection->post('statuses/update', array('status' => $tweet['tweet']));
	success_to_publish($tweet['id']);
}
?>