<html>
<head>
	<title>Login&Registration</title>
	<style type="text/css">
		form{
			border: 1px solid black;
			display: inline-block;
			padding: 20px;
			width: 100%;
		}
		.row{
			margin-top: 100px;
		}
		.error{
			color: red;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/journal/bootstrap.min.css">
	<script type="text/javascript" src=""https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js></script>
</head>
<body>
	<div id='container' class="container-fluid">
		<div class="row">
			<div id='registration' class="col-sm-5 col-sm-offset-1">
				<form action='/processes/register' method='post'>
					<div class="form-group">
						<label><span>Name</span><?php if($this->session->flashdata('name')){echo '<span class="error">*</span>';}?></label>
						<input class="form-control" type='text' name='name' placeholder='name'>
					</div>
					<div class="form-group">
						<label><span>Alias</span><?php if($this->session->flashdata('alias')){echo '<span class="error">*</span>';}?></label>
						<input class="form-control" type='text' name='alias' placeholder='alias'>
					</div>
					<div class="form-group">
						<label><span>Email</span><?php if($this->session->flashdata('email')){echo '<span class="error">*</span>';}?></label>
						<input class="form-control" type='text' name='email' placeholder='email'>
					</div>
					<div class="form-group">
						<label><span>Password</span><?php if($this->session->flashdata('password')){echo '<span class="error">*</span>';}?></label>
						<input class="form-control" type='password' name='password'>
					</div>
					<div class="form-group">
						<label><span>Confirm Password</span><?php if($this->session->flashdata('confirm_password')){echo '<span class="error">*</span>';}?></label>
						<input class="form-control" type='password' name='confirm_password' >
					</div>
					<div class="form-group">
						<button class="btn btn-default" type='submit'>Register</button>
					</div>
				</form>
			</div>
			<div id='login' class="col-sm-5">
				<form action='/processes/login' method='post'>
					<div class="form-group">
						<label><span>Email</span></label>
						<input class="form-control" type='email' name='email' placeholder='email'>
					</div>
					<div class="form-group">
						<label><span>Password</span></label>
						<input class="form-control" type='password' name='password'>
					</div>
					<div class="form-group">
						<button class="btn btn-default" type='submit'>Login</button>
					</div>	
				</form>
			</div>
		</div>
	</div>
</body>
</html>