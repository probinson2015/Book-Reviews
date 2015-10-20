<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Add description ">
    <title>User Reviews</title>
	<style>
	.reviews {
		overflow: scroll;
		height: 300px;
		width: 200px;
	}
	</style>

	<body>

		<a href="/books">Home</a>
		<a href="/books/add"> Add Book and Review</a>
		<a href="/users/logout"> Logout </a>
		
		<h1> User Alias: <?= $user['alias']; ?></h1>
		<h3> Name: <?= $user['first_name'] . " " . $user['last_name'] ?></h3>
		<h3> Email: <?= $user['email']; ?></h3>
		<h3> Total Reviews: <?= count($reviews); ?></h3>


		<h2> Posted Reviews on the following books: </h2>
		<div class="reviews">
			<?php foreach ($reviews as $review)
			{
				echo "<p>"; ?>
							<a href="/books/book_by_id/<?=$review['book_id']; ?>" > <?=$review['title']; ?> </a> 
							<?php 
				echo "</p>";
			}
			?>
		</div>
	</body>

</html>