<?php

// lets connect to our db
// $con = msqli_connect("localhost", "username", "password", "db-name");
// make sure the db name is the db name and not a table name

$connection = mysqli_connect("localhost", "rcasanova2", "bbac30$*mon", "rcasanova2_dmit2025");

if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
} else {

}
?>