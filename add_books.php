<?php
require('config.php');

$status = "";

if(isset($_POST['author']) && $_POST['title'] && $_POST['isbn'] && $_POST['price']){
  $author = $_POST['author'];
  $title = $_POST['title'];
  $isbn = $_POST['isbn'];
  $price = $_POST['price'];

  $stmt = "INSERT INTO `books` (`author`, `title`, `ISBN`, `price`, `book_id`)
            VALUES ('" . $author . "', '" . $title . "', '" . $isbn ."', '" . $price ."', NULL);";
  $result = $link->query($stmt);

  $status = ">> Book added";

}
else {
  $status = ">> noch nichts gesendet";
}


?>
<!doctype html>
<html lang="de">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">

	<script>
	  function replaceAuthor(){
		document.getElementById('author').value = "";
	  }
    function replaceTitle(){
		document.getElementById('title').value = "";
	  }
    function replaceISBN(){
		document.getElementById('isbn').value = "";
	  }
    function replacePrice(){
		document.getElementById('price').value = "";
	  }
	</script>
</head>
<body>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <h1>Add Book</h1>
			<h2><?php echo $status ?></h2>
            <div class="form-group">
              <label for="author">Author:</label>
              <input type="text" class="form-control" id="author" name="author" value="Author" onclick="replaceAuthor()">
            </div>
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" id="title" name="title" value="Title" onclick="replaceTitle()">
            </div>
            <div class="form-group">
              <label for="isbn">ISBN:</label>
              <input type="text" class="form-control" id="isbn" name="isbn" value="ISBN" onclick="replaceISBN()">
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="text" class="form-control" id="price" name="price" value="Price" onclick="replacePrice()">
            </div>
            <button type="submit" class="btn btn-default" name="btn-save">Add Book</button>

          </form>

          </div>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
