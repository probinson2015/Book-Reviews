<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="description" content="Add description ">
        <title>Books Home</title>
    </head>
	<style>
	.recent {
		width: 500px;
		display: inline-block;
	}
	.other_books{
		display: inline-block;
		vertical-align: top; 
		margin-left: 200px;
	}
	
	.books_list{
		width: 300px;
		height: 200px;
		border: 3px solid black;
		overflow: scroll;	
	}
	.title {
		font-size: 20px; 
	}
	</style>

<?php //var_dump($reviews); ?>

	<body>
		<div class = "header">
			<h3> Welcome, <?= $this->session->userdata['user alias']; ?> !</h3>
				
				<a href="/books/add">Add Book and Review</a>
				<a href="/books/logout">Logout </a>
		</div>
			<div class="recent">
				<h2> Recent Book Reviews: </h2>
				<?php
					for ($i = 0; $i<3; $i++) //to get the first three. alternative is break out of foreach
					{
						echo "<p class='title'>"; ?>
						<a href="/books/book_by_id/<?=$reviews[$i]['book_id']; ?>" > <?=$reviews[$i]['title']; ?> </a> 
						<?php echo "</p>";
						echo "<p> Rating:" . $reviews[$i]['rating'] . "<p>"; ?>
						<a href="/users/get_user/<?=$reviews[$i]['user_id']; ?> "<?php  echo ">" . $reviews[$i]['alias'] . "</a>" .  " says: " . $reviews[$i]['comment'] . "<p>";
					}
				?>
			</div>	
				<div class="other_books">
					<h2> Other Books with Reviews: </h2>
					<div class="books_list">
						
						<?php foreach ($reviews as $review)
						{
						echo "<p>"; ?>
						<a href="/books/book_by_id/<?=$review['book_id']; ?>" > <?=$review['title']; ?> </a> 
						<?php echo "</p>";
						}
						?>
						
					</div>
				</div>
		

	</body>

</html>