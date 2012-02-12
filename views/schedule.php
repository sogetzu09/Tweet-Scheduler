<html>
	<head>
		<title>Simple PHP Twitter Scheduler</title>
	</head>
	<style>
		table{border: 1px solid black; width:100%;}
	</style>
	<body>
		<h3> <a href="./?page=list">List All</a> | <a href="./?page=schedule">Schedule Tweet</a> </h3>
		<p>Time: <?php echo date("Y-m-d H:i:s"); ?>
		<form name="schedule" action="?page=schedule" method="post">
			Tweets (140 Character): <input type="text" name="tweet"><br>
			Datetime to publish : <input type="text" name="publish_date"> <i>Format: yyyy-mm-dd hh:mm:ss</i><br>
			<input type="submit" value="Schedule" name="__submit">
		</form>
	</body>
</html>