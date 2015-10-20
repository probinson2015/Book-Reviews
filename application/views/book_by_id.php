<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Add description ">
    <title>Add Book Review</title>

    <style>
	.reviews {
		width: 400px;
		float: left;
	}
	.add {
		float: right;
		margin-right: 100px;
	}
	textarea {
		height: 60px;
	}
    </style>

</head>

	<body>
		<a href="/books"> Home </a>
		<a href="/books/logout"> Logout </a>
		
		<h1> <?= $book['title']; ?></h1>
		<h3> Author: <?= $book['name']; ?> </h3>
		<div class="reviews">
			<h2> Reviews: </h2>
				<hr>
				<?php foreach ($book_reviews as $book_review)
				{
					echo "<p>" . "rating: " . $book_review['rating'] . " out of 5" . "</p>";
					echo "<p>"; ?>
					 <a href="/users/get_user/<?=$book_review['commentors_id']; ?> " > <?= $book_review['alias']; ?> </a> says: <?= $book_review['comment']; ?> </p>
					<?php echo "<p>" . "Posted on " . $book_review['created_at'];
				echo "<hr>";
				}
				?>			
		</div>	
		<div class="add">	
			<form action="/books/add_review" method="post">
			<h2> Add a review: </h2>
			<textarea name="comment"></textarea>
			<p>
			Rating (1-5) <input type="number" name="rating" min="1" max="5"> stars
			</p>
			<input type="hidden" name="user_id" value="<?= $this->session->userdata['user id']; ?>" >
			<input type="hidden" name="book_id" value="<?= $book['id']; ?>" >
			<p>
			<input type="submit" value="Submit Review">
			</p>
			</form>
		</div>



	</body>

</html>