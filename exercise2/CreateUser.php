<!-- CreateUser.php -->

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
echo "not broken yet";

$id = $_POST["username"];

$mysqli = new mysqli("mysql.eecs.ku.edu", "chancepenner2016", "eeRahL7v", "chancepenner2016");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT Users, user_id FROM Users";

if ($result = $mysqli->query($query)) {

    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ("%s (%s)\n", $row["user_id"]);
        echo 'hi';
    }

    /* free result set */
    $result->free();
}
else
{
  $mysqli-> "INSERT INTO Users('user_id') VALUES ('$id')";
  echo $id;
  echo "\n";
}

$mysqli->close();
/* close connection */
?>
