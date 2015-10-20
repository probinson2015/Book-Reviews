<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Add description ">
        <title>Books Home</title>
    </head>
	<style>
	.recent {
		display: inline-block;
		width: 250px;
	}
	.other_books{
		display: inline-block;
		vertical-align: top; 
		float: right;
	}
	.books_list{
		width: 300px;
		height: 200px;
		border: 3px solid black;
		overflow: scroll;	
		float: left;
	}
	.title {
		font-size: 20px; 
	}
	</style>

<?php //var_dump($reviews);
// var_dump($three_reviews); ?>

	<body>
		<div class = "header">
			<h3> Welcome, <?= $this->session->userdata['user alias']; ?> !</h3>
				
				<a href="/books/add">Add Book and Review</a>
				<a href="/books/logout">Logout </a>
		</div>
			<div class="recent">
				<h2> Recent Book Reviews: </h2>
				<?php
					foreach ($three_reviews as $review) //to get the first three. alternative is break out of foreach
					{
						echo "<p class='title'>"; ?>
						<a href="/books/book_by_id/<?=$review['book_id']; ?>" > <?=$review['title']; ?> </a> 
						<?php echo "</p>";
						echo "<p> Rating:" . $review['rating'] . "<p>"; ?>
						<a href="/users/get_user/<?=$review['user_id']; ?> "<?php  echo ">" . $review['alias'] . "</a>" .  " says: " . $review['comment'] . "<p>";
					}
				?>
			</div>	
				<div class="other_books">
					<h2> Other Books with Reviews: </h2>
					<div class="books_list">
						
						<?php foreach ($reviews as $books)
						{
						echo "<p>"; ?>
						<a href="/books/book_by_id/<?=$books['book_id']; ?>" > <?=$books['title']; ?> </a> 
						<?php echo "</p>";
						}
						?>
						
					</div>
				</div>
		

	</body>

</html>