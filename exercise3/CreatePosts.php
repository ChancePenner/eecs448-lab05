<!-- CreatePosts.php -->
<!-- CreateUser.php -->

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$id = $_POST["username"];
$post = $_POST["post"];

$usernameFound = false; //gets set to true if username is already in the table

$mysqli = new mysqli("mysql.eecs.ku.edu", "chancepenner2016", "eeRahL7v", "chancepenner2016");

// echo "testing";

$query = mysqli_query($mysqli, "SELECT * FROM `Users` WHERE user_id='".$id."'");

    if (!$query)
    {
        die('Error: ' . mysqli_error($mysqli));
    }

if(mysqli_num_rows($query) > 0){

    $usernameFound = true;
}

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT Users, user_id FROM Users";


if ($result = $mysqli->query($query)) {
  // echo "IF STATEMENT\n";
    /* fetch associative array */
    while ($row = $result->fetch_assoc()) {
        printf ("%s (%s)\n", $row["user_id"]);
    }

    /* free result set */
    $result->free();
}
else
{
  $sql= "INSERT INTO Posts(content) VALUES ('$post')";

  if($id == "")
  {
    echo "Please type your username!\n";
  }
  else if($usernameFound)
  {
    $mysqli->query($sql);
    echo "Post for user " . $id . " has been created!\n";
  }
  else
  {
    echo "User " . $id . " not found. Please try again!\n";
  }
}

$mysqli->close();
/* close connection */
?>
