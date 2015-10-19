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
		border: 1px solid red;
		/*display: inline-block;*/
	}
	.scroll_box {
		overflow: scroll;
	}
	.other_books {
		width: 300px;
		/*display: inline-block;*/
		border: 3px solid black;
	}
	</style>


	<body>

		<h2> Welcome, #ALIAS HERE !<h2>

			<a href="/books/add">Add Book and Review</a>
			<a href="/books/logout">Logout </a>
			
			<div class="recent">
				<h2> Recent Book Reviews: </h2>
				<p>"List out books with reviews here"</p>
			</div>	

				<h2> Other Books with Reviews: </h2>
			<div class="other_books">
				<div class="scroll_box">
					<p>List books here</p>
					<p>List books here</p>
					<p>List books here</p>
					<p>List books here</p>
				</div>
			</div>
		

	</body>

</html>