<?php
require('config.php');

$status = "";


if(isset($_POST['author']) && $_POST['title'] && $_POST['isbn'] && $_POST['price']){

  $author = $_POST['author'];
  $title = $_POST['title'];
  $isbn = $_POST['isbn'];
  $price = $_POST['price'];
  $book_id = $_POST['book_id'];

  $stmt = "UPDATE `books` SET `author` = '" . $author . "', `title` = '" . $title . "', `isbn` = '" . $isbn ."', `price` = '" . $price ."' WHERE `books`.`book_id` = " . $book_id . ";";

  $result = $link->query($stmt);

  $status = ">> Book edited";

  header('Location:index.php');
}
else {
  $status = ">> noch nichts gesendet";
}


if (empty($_GET['ID'])){
  die("No ID set!");
}
else {
  $book_id = $_GET['ID'];
}

if (isset($_GET['ID'])){
	$bookID = $_GET['ID'];

	$stmt = "SELECT * FROM `books` WHERE `book_id` = " . $book_id . ";";
	$result = $link->query($stmt);


	$author = "";
	$title = "";
	$isbn = "";
  $price = "";
  $book_id = "";

	if ($result->num_rows > 0){
		while ($row = mysqli_fetch_row($result)){

			$author = $row[0];
			$title = $row[1];
			$isbn = $row[2];
      $price = $row[3];
      $book_id = $row[4];
		}
	}
}
else {
	die("NO ID PROVIDED");
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


	</script>
</head>
<body>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?book_id=<?php $bookID?>">
            <h1>Edit Book</h1>
			<h2><?php echo $status ?></h2>

            <div class="form-group">
              <label for="author">Author:</label>
              <input type="text" class="form-control" id="author" value="<?php echo $author?>" name="author">
            </div>
            <div class="form-group">
              <label for="title">Title:</label>
              <input type="text" class="form-control" id="title" name="title" value="<?php echo $title ?>">
            </div>
            <div class="form-group">
              <label for="isbn">ISBN:</label>
              <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $isbn ?>">
            </div>
            <div class="form-group">
              <label for="price">Price:</label>
              <input type="text" class="form-control" id="price" name="price" value="<?php echo $price ?>">
            </div>
            <div class="form-group">
              <label for="book_id"></label>
              <input type="hidden" class="form-control" id="book_id" name="book_id" value="<?php echo $book_id ?>">
            </div>
            <button type="submit" class="btn btn-default" name="btn-save">Edit book</button>

          </form>

          </div>
        </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>
