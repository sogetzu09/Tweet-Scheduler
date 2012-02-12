<html>
	<head>
		<title>Simple PHP Twitter Scheduler</title>
	</head>
	<style>
		table{border: 1px solid black; width:100%; text-align:center;}
	</style>
	<body>
		<h3> <a href="./?page=list">List All</a> | <a href="./?page=schedule">Schedule Tweet</a> </h3>
		<?php if($tweets){ ?>
			<table>
				<tr>
					<th>No</th>
					<th>Tweets</th>
					<th>Publish Date</th>
					<th>Status</th>
				</tr>
			<?php $i = 1;?>
			<?php foreach($tweets as $tweet){?>
				<tr>
					<td> <?php echo $i++; ?> </td>
					<td> <?php echo $tweet['tweet']; ?> </td>
					<td> <?php echo datetime_to_human($tweet['publish_date']); ?> </td>
					<td> <?php echo status_to_string($tweet['status']); ?> </td>
				</tr>
			<?php } ?>
			</table>
		<?php } ?>
	</body>
</html>