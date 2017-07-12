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


    $query = mysqli_query($conn,"SELECT * FROM post WHERE id = $id");
    $count = mysqli_num_rows($query);
    if ($count == 1) {
      $check = mysqli_query($conn,"SELECT * FROM likes WHERE postid_fk = $id AND uid_fk=$u_id");
      $check_count = mysqli_num_rows($check);
      if ($check_count == 1) {
        echo "Already Liked!";
      }else{
        $insert = mysqli_query($conn,"INSERT INTO likes(uid_fk,postid_fk) VALUES('$u_id','$id')");
         if ($insert) {
           header('Location:home.php#'.$id.'');
         }else{
           echo "Error: " . $insert . "<br>" . mysqli_error($conn);
         }
      }
    }else{
      echo "there is no post corresponds to the id";
    }

 ?>
