<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Add description ">
    <title>Add Book and Review</title>

</head>
<?php var_dump($book_info); ?>

	<body>
		<a href="/books"> Home </a>
		<a href="/books/logout"> Logout </a>

		<h1> <?= $book_info['title'] ?><h1>
		<h3> Author: <?= $book_info['author name'] ?> </h3>

		<h3> Reviews: <h3>
			<hr>
		<!-- 	<?php foreach ($book_info[book_review][comment] as $review) 
			{
				echo $review;
			}

			?> -->
			3 of the last book reviews here
			rating in stars
			<a href="/users/get_user"> alias'</a> says: comment
			Posted on Created at date
			<hr>

			<form action="/books/add_review" method="post">
			<h2> Add a review: </h2>
			<textarea rows: 20 cols: 20 name="comment"></textarea>
			Rating (1-5) <input type="number" name="rating" min="1" max="5"> stars
			<input type="hidden" name="user_id" value="<?= $book_info['user id']; ?>" >
			<input type="hidden" name="book_id" value="<?= $book_info['book id']; ?>" >
			<input type="submit" value="Submit Review">
			</form>



	</body>

</html>