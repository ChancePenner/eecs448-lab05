<!-- CreateUser.php -->

<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$id = $_POST["username"];
$usernameTaken = false; //gets set to true if username is already in the table

$mysqli = new mysqli("mysql.eecs.ku.edu", "chancepenner2016", "eeRahL7v", "chancepenner2016");


$query = mysqli_query($mysqli, "SELECT * FROM `Users` WHERE user_id='".$id."'");

    if (!$query)
    {
        die('Error: ' . mysqli_error($mysqli));
    }

if(mysqli_num_rows($query) > 0){

    $usernameTaken = true;
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

  $sql= "INSERT INTO Users(user_id) VALUES ('$id')";
  if($id == "")
  {
    echo "You left the text field blank. Please try again!\n";
  }
  else if($usernameTaken)
  {
    echo "User " . $id . " already exists. Please try again.\n";
  }
  else
  {
    $mysqli->query($sql);
    echo "User " . $id . " was successfully created!\n";
  }
}

$mysqli->close();
/* close connection */
?>
