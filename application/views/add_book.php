<html>
<head>
	<title>Add book and review</title>
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
		<h2>Add a New Book and a Review</h2>
		<div class="row">
			<div class="col-sm-6">
				<form action='/processes/add_book' method='post'>
					<div class="form-group">
						<label><h3>Book Title:</h3></label>
							<input type='text' class="form-control" name='title' placeholder='title'>
					</div>
					<div class="form-group">
						<h3>Author:</h3>
						<label>Choose from the list:</label>
						<select name='author' class="form-control">
							<option>Choose an Author</option>
							<option>Stephen King</option>
							<option>JK Rowling</option>
							<option>Judah Smith</option>
							<option>Francis Chan</option>
						</select>
					</div>
					<div class="form-group">
						<label for="newAuthor">Or add a new author:</label>
						<input class='new form-control' type='text' name='new_author'>
					</div>
					<div class="form-group">
						<label for="review">Review:</label>
						<textarea class='new form-control' type="text" name='review'></textarea>
					</div>
					<div class="form-group">
						<label for="rating"><h3>Rating:</h3></label>
						<select name='rating' class="form-control">
							<option>5</option>
							<option>4</option>
							<option>3</option>
							<option>2</option>
							<option>1</option>
						</select>
					</div>
					<div class="form-group">
						<button class="btn btn-default" type='submit'>Add Book and Review</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>