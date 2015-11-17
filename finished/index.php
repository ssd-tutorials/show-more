<?php

$length = 97;

$posts = null;

try {
	
	$objDb = new PDO('mysql:host=localhost;dbname=comments', 'root', 'password');
	$objDb->exec('SET CHARACTER SET utf8');
	
	$sql = "SELECT *
			FROM `comments`
			ORDER BY `id` ASC";
			
	$statement = $objDb->query($sql);
	
	if ($statement) {
		$posts = $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	
} catch(PDOException $e) {
	echo $e->getMessage();
}

?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Show more with jQuery</title>
<meta name="description" content="Show more with jQuery">
<link rel="stylesheet" href="/css/core.css" media="all" type="text/css">
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>

<div id="wrapper">

	<?php if (!empty($posts)) { ?>
	
		<?php foreach($posts as $row) { ?>
		
			<?php if (strlen($row['comment']) > $length) { ?>
		
			<p class="item">
				<span class="less"><?php echo substr(htmlentities($row['comment'], ENT_QUOTES, 'UTF-8'), 0, $length); ?><a href="#" class="showMore show">Show more</a></span><span class="more"><?php echo substr(htmlentities($row['comment'], ENT_QUOTES, 'UTF-8'), $length); ?><a href="#" class="showLess show">Show less</a></span>
			</p>
			
			<?php } else { ?>
				
				<p class="item">
					<?php echo htmlentities($row['comment'], ENT_QUOTES, 'UTF-8'); ?>
				</p>
				
			<?php } ?>
		
		<?php } ?>
	
	<?php } else { ?>
		
		<p>There are currently no posts available.</p>
		
	<?php } ?>

</div>

<script src="/js/jquery-1.7.2.min.js"></script>
<script src="/js/core.js"></script>
</body>
</html>








