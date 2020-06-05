<?php require_once('config.php')?>

<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php if (isset($_POST['submit'])):?>
      <?php if (isset($_POST['title'])):?>
        <?php $title=$_POST['title'];?>
        <?php endif;?>
        <?php if (isset($_POST['text'])):?>
         <?php  $text= $_POST['text'];?>
          <?php endif;?>
<?php 
$conn = new PDO($dsn,$username,$password,$option);
 $query=("INSERT INTO ideas (title,text) VALUES(?,?)");
 $stmt=$conn->prepare($query);
 $stmt->bindParam('1',$title);
 $stmt->bindParam('2',$text);
 $stmt->execute();

?>


    <?php endif;?>

      <div class="container">
      <h1>Share your idea with us:</h1><br>
      <div class="row">
      
          <div class="col-md-12">
          <form action="" method="post">
          <div class="form-group">
              <label for="my-input"><b>Idea title:</b></label>
              <input id="my-input"  type="text" name="title">
          </div>
          <div class="form-group">
              <label for="my-input"><b>Idea title:</b></label>
              <textarea name="text" class="col-md-6" rows="8" type="text"></textarea>
          </div>
          <div class="form-group">
              
              <input type="submit" name="submit" value="Save your idea" class="btn btn-info">
          </div>
          <?php ?>
          </form>
          </div>
      </div>
      
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>