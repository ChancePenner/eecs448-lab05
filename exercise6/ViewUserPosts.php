<!-- ViewUserPosts.php -->
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$id = $_POST["username"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "chancepenner2016", "eeRahL7v", "chancepenner2016");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


$sql = "SELECT content FROM Posts WHERE author_id='$id'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  echo "<table width=10% border =\'1\'>";
  echo "<th>" . $id . "'s Posts</th>";
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>';
        echo $row["content"];
        echo '</td>';
        echo '</tr>';
    }
    echo "</table>";
    /* free result set */
    $result->free();
}
else
{
  echo "No posts found!";
}

$mysqli->close();
/* close connection */

?>
