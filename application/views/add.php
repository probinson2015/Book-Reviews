<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta name="description" content="Add description "/>
    <link rel="stylesheet" href="/assets/CSS/normalize.css">
    <link rel="stylesheet" href="/assets/CSS/bootstrap.css">
    <link rel="stylesheet" href="/assets/CSS/bootstrap-theme.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <title>Add Book and Review</title>
    <style>
    	body { padding-top: 50px; }
    </style>
</head>
	<body>
		<div class="container-fluid">
			<nav class="navbar navbar-default navbar-fixed-top">
	  			<div class="container-fluid">
					<ul class="nav nav-pills">
						<li role="presentation"><a href="/books"> Home </a></li>
						<li style="float: right;" role="presentation"><a href="/books/logout">Logout </a></li>
					</ul>
				</div>
			</nav>
			<div class="row">
				<div class="col-md-4">
					<h3> Add a New Book Title and a Review: </h3>
					<?php if ($this->session->flashdata('errors'))
						{
							echo $this->session->flashdata('errors');
						} ?>
					<div class="form-group">
						<form class="form-horizontal" action='/books/create' method="post">
							<p> Book Title: <input class="form-control" type="text" name="title" > </p>
							<p> Author: </p>
								Choose from the list: <select class="form-control" name = "author">
														<option	value = 'author'> </option>									
														<?php foreach ($authors as $author) 
																{
																	echo "<option value = 'author'>" . 
																	$author['name'] . "</option>";
																}	
															?>

														</select>
								<p> Or add a new author: <input class="form-control" type="text" name="author"> </p>
							<p> Review: <textarea class="form-control" rows:10 cols: 10 name="comment" ></textarea> </p>			
							<p> Rating (1-5) <input type="number" name="rating" min="1" max="5"> stars </p>
							<input type="hidden" name="user_id" value="<?= $this->session->userdata['user id']; ?>" >
							<?php //var_dump($this->session->userdata['user id']); ?>
							<input class="btn btn-lg btn-primary" type="submit" value="Add Book and Review">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>