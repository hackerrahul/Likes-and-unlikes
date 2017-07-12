<?php
    $conn = mysqli_connect('localhost','root','','likes');

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
?>
