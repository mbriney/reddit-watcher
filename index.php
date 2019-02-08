<?php include 'config.inc'; ?>
<html>
<head>
	<style>
		body {font-family: Helvetica, Arial;}
		.count {font-size: 24; font-weight: bold;}
		.comments {font-size: 11;}
		
		.col_count {text-align: center; width: 100px;}
		table {border-spacing: 0;}
		td { border-bottom: 1px solid #000; padding: 7px; margin:0px;}
		
		a.link_post, a.link_post:visited { font-size: 20px; color: #000; text-decoration: none;}
		.link_sub, .link_sub:visited { font-size: 11px; color: gray}
		
		.logo { float: left; height: 30px;	margin-right: 15px;}
	</style>
</head>
<body>
<img src="https://cdn.freebiesupply.com/logos/large/2x/reddit-2-logo-png-transparent.png" class="logo"><h1>Here's What's Happening on the Interwebs!</h1>


<?php
$data = file_get_contents("http://www.reddit.com/search.json?q=%22George%20Washington%22%20!Sports%20!Game%20!University%20!College%20!Carver&t=month");
$json = json_decode($data, true);
?>
<h2>George Washington</h2>
<table>

<?php foreach ($json["data"]["children"] as $entry) { ?>
	<tr>
		<td class="col_count">
			<span class="count"><?php echo $entry["data"]["score"]; ?></span><br>
			<span class="comments"><?php echo $entry["data"]["num_comments"]; ?> comments</span>
		</td>
		<td>
			<?php if ($entry["data"]["thumbnail"] != "default" && $entry["data"]["thumbnail"] != "image" && $entry["data"]["thumbnail"] != "self" ) { ?>
				<img src="<?php echo $entry["data"]["thumbnail"]; ?>">
			<?php } ?>
		</td>
		<td>
			<span class="link_sub"><?php echo gmdate("M d Y", $entry["data"]["created_utc"]) ;?></span><br>
			<a href="https://reddit.com<?php echo $entry["data"]["permalink"]; ?>" class="link_post"><?php echo $entry["data"]["title"]; ?></a><br>
			<a href="https://www.reddit.com/r/<?php echo $entry["data"]["subreddit"]; ?>" class="link_sub">r/<?php echo $entry["data"]["subreddit"]; ?></a>
			
		</td>
	</tr>	
<?php } ?>
</table>

<?php
$data = file_get_contents("http://www.reddit.com/search.json?q=%22Martha%20Washington%22%20!college&t=month");
$json = json_decode($data, true);
?>
<h2>Martha Washington</h2>
<table>

<?php foreach ($json["data"]["children"] as $entry) { ?>
	<tr>
		<td class="col_count">
			<span class="count"><?php echo $entry["data"]["score"]; ?></span><br>
			<span class="comments"><?php echo $entry["data"]["num_comments"]; ?> comments</span>
		</td>
		<td>
			<?php if ($entry["data"]["thumbnail"] != "default" && $entry["data"]["thumbnail"] != "image" && $entry["data"]["thumbnail"] != "self" ) { ?>
				<img src="<?php echo $entry["data"]["thumbnail"]; ?>">
			<?php } ?>
		</td>
		<td>
			<span class="link_sub"><?php echo gmdate("M d Y", $entry["data"]["created_utc"]) ;?></span><br>
			<a href="https://reddit.com<?php echo $entry["data"]["permalink"]; ?>" class="link_post"><?php echo $entry["data"]["title"]; ?></a><br>
			<a href="https://www.reddit.com/r/<?php echo $entry["data"]["subreddit"]; ?>" class="link_sub">r/<?php echo $entry["data"]["subreddit"]; ?></a>
			
		</td>
	</tr>	
<?php } ?>
</table>


<?php
$data = file_get_contents("http://www.reddit.com/search.json?q=%22Mount%20Vernon%22%20!NY%20!%22New%20York%22%20!Baltimore%20!Missouri%20!WA%20!Kentucky%20!Seattle%20!Ohio%20!OH%20!Mo%20!Indiana&t=month");
$json = json_decode($data, true);
?>
<h2>Mount Vernon</h2>
<table>

<?php foreach ($json["data"]["children"] as $entry) { ?>
	<tr>
		<td class="col_count">
			<span class="count"><?php echo $entry["data"]["score"]; ?></span><br>
			<span class="comments"><?php echo $entry["data"]["num_comments"]; ?> comments</span>
		</td>
		<td>
			<?php if ($entry["data"]["thumbnail"] != "default" && $entry["data"]["thumbnail"] != "image" && $entry["data"]["thumbnail"] != "self" ) { ?>
				<img src="<?php echo $entry["data"]["thumbnail"]; ?>">
			<?php } ?>
		</td>
		<td>
			<span class="link_sub"><?php echo gmdate("M d Y", $entry["data"]["created_utc"]) ;?></span><br>
			<a href="https://reddit.com<?php echo $entry["data"]["permalink"]; ?>" class="link_post"><?php echo $entry["data"]["title"]; ?></a><br>
			<a href="https://www.reddit.com/r/<?php echo $entry["data"]["subreddit"]; ?>" class="link_sub">r/<?php echo $entry["data"]["subreddit"]; ?></a>
			
		</td>
	</tr>	
<?php } ?>
</table>

</body>
</html>