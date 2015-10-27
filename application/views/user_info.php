<html>
<head>
	<title>User Info</title>
	<style type="text/css">
		span{
			width: 100px;
			font-weight: bold;
		}
	</style>
	<link rel="stylesheet" type="text/css" href="https://bootswatch.com/journal/bootstrap.min.css">
	<script type="text/javascript" src=""https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js></script>
</head>
<body>
	<nav class="navbar navbar-default">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
			<a href="/mains/home"><h4 id="webpage" style="font-style: italic;">@BOOKS</h4></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<a class="pull-right" href="/processes/logout"><button class="btn btn-default">Logout</button></a>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div id='container' class="container-fluid">
		<div id='user_info' class="row">
			<div class="col-sm-6">
				<p><span>User Alias:</span> <?php echo $alias;?></p>
				<p><span>Name:</span> <?php echo $name;?></p>
				<p><span>Email:</span> <?php echo $email;?></p>
				<p><span>Total Reviews:</span> <?php echo $total_reviews['SUM'];?></p>
			</div>
		</div>
		<div id='posts' class="row">
			<div class="col-sm-6">
				<p>Posted Reviews on the Following Books:</p>
				<ul>
	<?php
					foreach($reviewed_books as $book)
					{
	?>
					<li><a href=<?php echo '"/mains/book_info/'.$book['book_id'].'"'?>><?php echo $book['title'];?></a></li>
	<?php
					}
	?>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>