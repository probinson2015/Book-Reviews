<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Add description ">
    <link rel="stylesheet" href="/assets/CSS/normalize.css">
    <link rel="stylesheet" href="/assets/CSS/bootstrap.css">
    <link rel="stylesheet" href="/assets/CSS/bootstrap-theme.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>User Reviews</title>
	<style>
	.reviews {
		overflow: scroll;
	}
	body { padding-top: 50px; }
	</style>
</head>
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
	  		<div class="container-fluid">
				<ul class="nav nav-pills">
					 <li role="presentation"><a href="/books">Home</a></li>
					 <li role="presentation"><a href="/books/add"> Add Book and Review</a></li>
					<li style="float: right;" role="presentation"><a href="/books/logout">Logout </a></li>
				</ul>
			</div>
		</nav>
		<div class="container-fluid">
			<h2> User Alias: <?= $user['alias']; ?></h2>
			<h4> Name: <?= $user['first_name'] . " " . $user['last_name'] ?></h4>
			<h4> Email: <?= $user['email']; ?></h4>
			<h4> Total Reviews: <?= count($reviews); ?></h4>
		
			<div class="col-xs-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Posted Reviews on the following books: 
					</div>
					<div class="panel-body">
						<ul class="list-group">
							<?php foreach ($reviews as $review)
							{
								echo "<li class='list-group-item'>"; ?>
											<a href="/books/book_by_id/<?=$review['book_id']; ?>" > <?=$review['title']; ?> </a> 
											<?php 
								echo "</li>";
							}
							?>
						</ul>
					</div>
				</div>
			</div>	
		</div>
	</body>
</html>