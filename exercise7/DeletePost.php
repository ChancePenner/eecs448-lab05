<!-- DeletePost.php -->

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

if (isset($_POST['checkboxvar']))
{
  $post = $_POST["checkboxvar"];

  $mysqli = new mysqli("mysql.eecs.ku.edu", "chancepenner2016", "eeRahL7v", "chancepenner2016");

  /* check connection */
  if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
  }

  $arrlength = count($post);

  if ($arrlength > 0) {
    for($i=0;$i<$arrlength;$i++)
    {
      $sql = "DELETE FROM Posts WHERE posts_id=$post[$i]";
      $mysqli->query($sql);
      echo "Deleted post " . $post[$i] . "<br>";
    }

  }

  $mysqli->close();
  /* close connection */

}
else
{
  echo "No post selected!";
}



?>
