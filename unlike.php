<?php
    session_start();
    include 'db.php';
    if(!isset($_SESSION['user']))
    {
    header("Location: index.php");
    }
    $id = $_GET['id'];

    $fetch = mysqli_query($conn,"SELECT * FROM user WHERE id =".$_SESSION['user']);
    $fetching = mysqli_fetch_array($fetch,MYSQLI_ASSOC);
    $u_id = $fetching['id'];

    $check = mysqli_query($conn,"SELECT * FROM likes WHERE postid_fk = $id AND uid_fk=$u_id");
    $check_count = mysqli_num_rows($check);
    if ($check_count == 1) {
      $query = mysqli_query($conn,"DELETE FROM likes WHERE postid_fk = $id AND uid_fk = $u_id");
      if ($query) {
        header('Location:home.php#'.$id.'');
      }
    }else{
      echo "You have not liked it yet";
    }



 ?>
