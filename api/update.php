<?php require('config.php');?>


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
  <?php 
     
     if(isset($_GET['id'])){
      $id=$_GET['id'];
     
    $conn = new PDO($dsn,$username,$password,$option); 
     $query=("SELECT * FROM ideas WHERE id=$id");
     $stmt=$conn->prepare($query);
     $stmt->execute();
    $stmt->bindValue("i",$id);
     $row=$stmt->fetch(PDO::FETCH_ASSOC);
     $id=$row['id'];
     $title=$row['title'];
     $text=$row['text'];
     
     }
     ?>
     <?php 
     
     if(isset($_POST['update'])){
      $id= ($_POST['id']);
      $title= ($_POST['title']);
      $text=($_POST['text']);
      
     
    $conn = new PDO($dsn,$username,$password,$option); 
     $query=("UPDATE ideas SET title=?,text=? WHERE id=?");
     $stmt=$conn->prepare($query);
     $stmt=$conn->prepare($query);
     $stmt->bindParam('1',$title);
     $stmt->bindParam('2',$text);
     $stmt->bindParam('3',$id);
     $stmt->execute();
     header('location:index.php');
     $_SESSION['message']="Mise à jour a été effectué avec success";
     $_SESSION['msg_type']="warning";
     
     }
     ?>
  <div class="container">
      <h1>Update your idea with us:</h1><br>
      <div class="row">
      
          <div class="col-md-12">
          <form action="" method="post">
          <input type="hidden" name="id" value="<?php echo $id;?>">
          <div class="form-group">
              
              <label for="my-input"><b>Idea title:</b></label>
              <input id="my-input" placeholder="update your idea's title" type="text" value="<?php echo $title; ?>" name="title">
          </div>
          <div class="form-group">
              <label for="my-input"><b>Idea title:</b></label>
              <textarea placeholder="update your idea's text" name="text" class="col-md-6" rows="8" value="" type="text"><?php echo $text; ?></textarea>
          </div>
          <div class="form-group">
              
              <input type="submit" name="update" value="Update your idea" class="btn btn-warning">
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