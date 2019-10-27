<!-- ViewUsers.php -->
<!-- CreatePosts.php -->

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "chancepenner2016", "eeRahL7v", "chancepenner2016");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


$sql = "SELECT user_id FROM Users";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
  echo "<table width=10% border =\'1\'>";
  echo "<th>Users</th>";
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>';
        echo $row["user_id"];
        echo '</td>';
        echo '</tr>';
    }
    echo "</table>";
    /* free result set */
    $result->free();
}
else
{
  echo "No users created!\n";
}

$mysqli->close();
/* close connection */
?>
