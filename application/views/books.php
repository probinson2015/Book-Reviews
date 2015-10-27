<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Add description ">
        <link rel="stylesheet" href="/assets/CSS/normalize.css">
        <link rel="stylesheet" href="/assets/CSS/bootstrap.css">
        <link rel="stylesheet" href="/assets/CSS/bootstrap-theme.min.css">
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <title>Books Home</title>
    </head>
	<style>
	body { padding-top: 70px; }
	.recent {
		display: inline-block;
		/*width: 250px;*/
	}
	/*.other_books{
		display: inline-block;
		vertical-align: top; 
		float: right;
	}*/
	/*.books_list{
		width: 300px;
		height: 200px;
		border: 3px solid black;
		overflow: scroll;	
		float: left;
	}*/
	.title {
		font-size: 20px; 
	}
	</style>

<?php //var_dump($reviews);
// var_dump($three_reviews); ?>

	<body>
		<div class="container-fluid">
			<nav class="navbar navbar-default navbar-fixed-top">
	  			<div class="container-fluid">
					<ul class="nav nav-pills">
						<li role="presentation"><a href="/books/add">Add Book and Review</a></li>
						<li role="presentation"><a href="/books/logout">Logout </a></li>
					</ul>
				</div>
			</nav>
			<div class="row">
  			<div class="col-xs-12 col-md-8">
			<h2> Welcome, <?= $this->session->userdata['user alias']; ?>!</h2>
			<div class="recent">
				<h3> Recent Book Reviews: </h3>
				<div class="list-group">
					<?php
						foreach ($three_reviews as $review) //to get the first three. alternative is break out of foreach
						{
							echo "<p class='title'>"; ?>
							<a href="/books/book_by_id/<?=$review['book_id']; ?>"> <?=$review['title']; ?> </a> 
							<?php echo "</p>";
							echo "<p> Rating:" . $review['rating'] . "<p>"; ?>
							<a href="/users/get_user/<?=$review['user_id']; ?> "<?php  echo ">" . $review['alias'] . "</a>" .  " says: " . $review['comment'] . "</p><hr>"; 
					 } ?>
				</div>
				</div>
			</div>
			<div class="container-fluid">
				<div class="row">
  				<div class="col-xs-6 col-sm-4">
				<div class="panel panel-default">
					<div class="panel-heading">Other Books with Reviews: </div>
					<div class="panel-body">
						<ul class="list-group">
			
							<?php foreach ($reviews as $books)
							{
							echo "<li class='list-group-item'>"; ?>
							<a href="/books/book_by_id/<?=$books['book_id']; ?>" > <?=$books['title']; ?> </a> 
							<?php echo "</li>";
							}
							?>

						</ul>
					</div>
					</div>
					</div>

				</div>
			</div>
	</body>
</html>