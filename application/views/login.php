<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="/assets/CSS/normalize.css">
	<link rel="stylesheet" href="/assets/CSS/normalize.css">
    <link rel="stylesheet" href="/assets/CSS/bootstrap.css">
    <link rel="stylesheet" href="/assets/CSS/bootstrap-theme.min.css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <meta charset="utf-8"/>
    <title>Welcome</title>

</head>
<style>
	body {
		background-image: url('/assets/images/login-background.jpeg');
		background-size: 100%;
		background-repeat: no-repeat;
	}
	/*.error 
	{
		color: red;
	}
	.success {
		color: green;
	}*/
</style>
	<body>

		<div class="container-fluid">
			<h1> Welcome!</h1>
			<div class="row">
	  			<div class="col-md-3">
					<div class="form-group">
						
						<?php if ($this->session->flashdata('errors'))
						{
							echo $this->session->flashdata('errors');
						} 
						if ($this->session->flashdata('success'))
						{
							echo $this->session->flashdata('success');
						} 
						?>
						<h2>Register</h2>
						<form action = "/users/register" method = "post">
							<p>Email: <input class="form-control" name = "email" type  ="text"></p>
							<p> First Name: <input class="form-control" name = "first_name" type  ="text"></p>
							<p> Last Name: <input class="form-control" name = "last_name" type  ="text"></p>
							<p> Alias: <input class="form-control" name = "alias" type  ="text"></p>		
							<p> Password: <input class="form-control" name = "password" type  ="password"></p>
							<p> Confirm Password: <input class="form-control" name = "cpassword" type  ="password"></p>
							<p> 
								<input class="btn btn-md btn-primary" value = "register" type = "submit" name="registration">
								<input type = "hidden" name = "action" value="registration">
							</p>
						</form>
					</div>
				</div>
			
		
				<div class="row">
		 			<div class="col-md-3">
						<h2>Login</h2>
						<form action = "/users/login" method = "post">
							<p>Email: <input class="form-control" name = "email" type  ="text"></p>
							<p> Password: <input class="form-control" name = "password" type ="password"></p>
							<input class="btn btn-md btn-primary" value="login" type = "submit">
							<input type = "hidden" name = "action" value="login">			
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>