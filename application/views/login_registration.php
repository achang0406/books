<html>
<head>
	<title>Login&Registration</title>
	<style type="text/css">
		*{
		padding: 0;
		margin: 0;
		}
		#container{
			padding: 10px 30px;
		}
		#registration, #login{
			display: inline-block;
			vertical-align: top;
			margin: 50px;
		}
		form{
			border: 1px solid black;
			display: inline-block;
			padding: 20px;
		}
		form label{
			display: block;
			margin: 20px 0px;
		}
		form span{
			width: 150px;
			display: inline-block;
		}
		form button{
			float: right;
		}
		.error{
			color: red;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/journal/bootstrap.min.css">
	<script type="text/javascript" src=""https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js></script>
</head>
<body>
	<div id='container'>
		<div id='registration'>
			<form action='/processes/register' method='post'>
				<label><span>Name:</span><input type='text' name='name' placeholder='name'><?php if($this->session->flashdata('name')){echo '<span class="error">'.$this->session->flashdata('name').'</span>';}?></label>
				<label><span>Alias:</span><input type='text' name='alias' placeholder='alias'><?php if($this->session->flashdata('alias')){echo '<span class="error">'.$this->session->flashdata('alias').'</span>';}?></label>
				<label><span>Email:</span><input type='text' name='email' placeholder='email'><?php if($this->session->flashdata('email')){echo '<span class="error">'.$this->session->flashdata('email').'</span>';}?></label>
				<label><span>Password:</span><input type='password' name='password'><?php if($this->session->flashdata('password')){echo '<span class="error">'.$this->session->flashdata('password').'</span>';}?></label>
				<label><span>Confirm Password:</span><input type='password' name='confirm_password' ><?php if($this->session->flashdata('confirm_password')){echo '<span class="error">'.$this->session->flashdata('confirm_password').'</span>';}?></label>
				<button type='submit'>Register</button>
			</form>
		</div>
		<div id='login'>
			<form action='/processes/login' method='post'>
				<label><span>Email:</span><input type='text' name='email' placeholder='email'></label>
				<label><span>Password:</span><input type='password' name='password'></label>
				<button type='submit'>Login</button>
			</form>
		</div>
	</div>
</body>
</html>