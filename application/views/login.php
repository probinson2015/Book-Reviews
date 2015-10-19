<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Welcome</title>

</head>
<style>
	* {
		font-family: sans-serif;
	}
	.error 
	{
		color: red;
	}
	.success {
		color: green;
	}
</style>
		<body>
			<h1> Welcome!</h1>
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
			
			<p>Email
			<input name = "email" type  ="text">
			</p>
			<p> First Name:
			<input name = "first_name" type  ="text">
			</p>
			<p> Last Name:
			<input name = "last_name" type  ="text">
			</p>
			<p> Alias:
			<input name = "alias" type  ="text">
			</p>
			<p> Password:
			<input name = "password" type  ="password">
			</p>
			<p> Confirm Password:
			<input name = "cpassword" type  ="password">
			</p>
			<p> 
			<input value = "register" type = "submit" name="registration">
			<input type = "hidden" name = "action" value="registration">
			</p>

			</form>

			
			
			<h2>Login</h2>
			<form action = "/users/login" method = "post">
			
				<p>Email
				<input name = "email" type  ="text">
				</p>
				<p> Password:
				<input name = "password" type ="password">
				</p>
				<input value="login" type = "submit">
				<input type = "hidden" name = "action" value="login">			
			</form>

		</body>

</html>