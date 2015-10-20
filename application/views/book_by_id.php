<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Add description ">
    <title>Add Book Review</title>

    <style>

    </style>

</head>

	<body>
		<a href="/books"> Home </a>
		<a href="/books/logout"> Logout </a>
		
		<h1> <?= $book_reviews['0']['title']; ?></h1>
		<h3> Author: <?= $book_reviews['0']['author name']; ?> </h3>

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
			

			<form action="/books/add_review" method="post">
			<h2> Add a review: </h2>
			<textarea rows: 20 cols: 20 name="comment"></textarea>
			Rating (1-5) <input type="number" name="rating" min="1" max="5"> stars
			<input type="hidden" name="user_id" value="<?= $this->session->userdata['user id']; ?>" >
			<input type="hidden" name="book_id" value="<?= $book_reviews['0']['book_id']; ?>" >
			<input type="submit" value="Submit Review">
			</form>



	</body>

</html>