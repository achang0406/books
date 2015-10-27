<html>
<head>
	<title>Books Home</title>
	<style type="text/css">
		#other{
			border: 1px solid black;
			overflow-y: scroll;
			height: 200px;
		}
		#other ul li{
			list-style: none;
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
	      <a class="navbar-brand" href="#"><p>Welcome, <?php echo $name;?>!</p></a>
	    </div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<a class="pull-right" href="/processes/logout"><button class="btn btn-default">Logout</button></a>
			<a class="pull-right" href="/mains/add_book"><button class="btn btn-default">Add Book and Review</button></a>
	    </div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	<div id='container' class="container-fluid">
		<div class="row">
			<div class="col-sm-7">
				<h3>Recent Book Reviews:</h3>
	<?php
				for($i=0; $i<3; $i++)
				{	
	?>
				<div class='book'>
					<a href=<?= '"/mains/book_info/'.$book_info[$i]['book_id'].'"'?>><?php echo $book_info[$i]['title'];?>:</a>
	<?php
					for($j=0; $j<5; $j++)
					{
						if($j < $book_info[$i]['rating'])
						{
	?>
						<img src="/assets/yellow_star.png" width="20px">
	<?php
						}
						else
						{
	?>
						<img src="/assets/white_star.png" width="20px">
	<?php
						}
					}
	?>
					<p><a href=<?= '"/mains/user_info/'.$book_info[$i]['user_id'].'"'?>><?php echo $book_info[$i]['alias'];?></a> says: <?php echo $book_info[$i]['review'];?></p>
					<p class="date_created">posted on <?php echo $book_info[$i]['created_at'];?></p>
				</div>
	<?php
				}
	?>
			</div>
			<div id='other' class="col-sm-4">
				<h3>Other Books with Reviews</h3>
				<ul>
	<?php
				foreach($books_with_reviews as $book)
				{	
	?>
					<li><a href=<?= '"/mains/book_info/'.$book['id'].'"'?>><?php echo $book['title']?></a></li>
	<?php
				}
	?>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>