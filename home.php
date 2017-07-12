<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user']))
{
header("Location: index.php");
}
$fetch = mysqli_query($conn,"SELECT * FROM user WHERE id =".$_SESSION['user']);
$fetching = mysqli_fetch_array($fetch,MYSQLI_ASSOC);
$u_id = $fetching['id'];
$name = $fetching['name'];
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Like And Unlike System in PHP</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  </head>
  <body>
        <div class="w3-bar w3-blue w3-center">
          <h1>Hey <?php echo $name; ?>, <a href="logout.php">Logout</a></h1>
        </div>
        <div class="w3-content"><br>
            <?php
                $query = mysqli_query($conn,"SELECT * FROM post");
                while ($row = mysqli_fetch_assoc($query)) {
                  $id = $row['id'];
                  $title = $row['title'];

             ?>
            <div class="w3-col w3-card-2 w3-margin-bottom w3-margin-top " id="<?php echo $id; ?>">
              <div class="w3-container w3-blue">
                 <p><?php echo $name; ?></p>
              </div>
              <div class="w3-container">
                 <h4><?php echo $title; ?></h4>
              </div>
              <div class="w3-container">
                <hr>

                  <?php
                  $like_query = mysqli_query($conn,"SELECT * FROM likes WHERE postid_fk = $id AND uid_fk = $u_id");
                  $count = mysqli_num_rows($like_query);

                  $like_count = mysqli_query($conn,"SELECT * FROM likes WHERE postid_fk = $id");
                  $count_likes = mysqli_num_rows($like_count);
                  if ($count == 1) {
                  echo "<h6><a href='unlike.php?id=$id'>Unlike</a> ($count_likes)</h6>";
                }else{
                  echo "<h6><a href='like.php?id=$id'>Like</a> ($count_likes)</h6>";
                }
                   ?>

              </div>



            </div>
            <?php } ?>

        </div>
  </body>
</html>
