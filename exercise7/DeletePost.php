<!-- DeletePost.php -->

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$post = $_POST["checkboxvar"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "chancepenner2016", "eeRahL7v", "chancepenner2016");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$arrlength = count($post);

// $sql = "SELECT content FROM Posts WHERE author_id='$id'";
// $result = $mysqli->query($sql);


if ($arrlength > 0) {
  for($i=0;$i<$arrlength;$i++)
  {
    $sql = "DELETE FROM Posts WHERE posts_id=$post[$i]";
    $mysqli->query($sql);
    echo "Deleted post " . $post[$i] . "<br>";
  }

}
else
{
  echo "No post selected!";
}

$mysqli->close();
/* close connection */

?>
