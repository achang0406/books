<html>
<head>
	<title>Book Info</title>
	<style type="text/css">
		.review{
			padding: 10px 0px;
			border-top: 1px solid black
		}
		#reviews .review p.date_created{
			font-style: italic;
		}
		#review_box{
			height: 100px;
			overflow-x: none;
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
		<div class="row">
			<div class="col-sm-12">
				<h3><?php echo $title;?></h3>
				<p class='author'>author: <?php echo $author;?></p>
			</div>
		</div>
		<div class="row">
			<div id='reviews' class="col-sm-6">
				<h3>Reviews</h3>
	<?php 
				foreach($reviews as $review)
				{
					if($review['book_id'] == $id)
					{

	?>
					<div class='review'>
						<p>Rating: 
	<?php
					for($j=0; $j<5; $j++)
					{
						if($j < $review['rating'])
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
						</p>
						<p><a href=<?php echo '"/mains/user_info/'.$review['user_id'].'"';?>><?php echo $review['alias'];?></a> says: <?php echo $review['review'];?></p>
						<p class="date_created">Posted on <?php echo $review['created_at'];?></p>
	<?php
						if($review['user_id'] == $this->session->userdata('user')['id'])
						{			
	?>
							<a href=<?php echo '"/processes/delete_review/'.$review['review_id'].'"';?>>Delete this Review</a>
	<?php
						}
	?>
					</div>
	<?php
					}
				}
	?>
			</div>
			<div id='add_review' class="col-sm-4">
				<form action=<?php echo '"/processes/add_review/'.$id.'"';?> method='post'>
					<div class="form-group">
						<label><h3>Add a Review:</h3></label>
						<textarea class="form-control" id="review_box" name='review_box'></textarea>
					</div>
					<div class="form-group">
						<label><h3>Star Rating</h3></label>
						<select class="form-control" name='rating'>
							<option>5</option>
							<option>4</option>
							<option>3</option>
							<option>2</option>
							<option>1</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-default" type='submit'>Submit Review</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>