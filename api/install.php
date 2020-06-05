<?php 
require_once('config.php')

?>
<?php 
$conn = new PDO($dsn,$username,$password,$option);

$sql="CREATE TABLE  if NOT EXISTS ideas(
    id INT UNSIGNED AUTO_INCREMENT,
    titlte VARCHAR(30) NOT NULL,
    text TEXT NOT NULL,
    PRIMARY KEY(id)
);";
$conn->exec($sql);
?>