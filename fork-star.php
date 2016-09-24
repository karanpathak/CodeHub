<?php
include 'confige.php';
session_start();

if (isset($_POST['star_submit']))
{

  $sql = "SELECT * FROM repository WHERE name = '".$_SESSION['name']."'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0)
  {
    $row = mysqli_fetch_assoc($result);
    $id=$row['repo_id'];
    $current=$row['stars'];

  }

  $sql= "INSERT INTO stars VALUES($id,'".$_SESSION['username']."');";
  $result = mysqli_query($conn,$sql);
  if($result)
  {
    $sql= "UPDATE repository SET stars = $current+1 WHERE repo_id=$id";
    $result = mysqli_query($conn,$sql);
    header('Location:homepage.php');
  }
  else {
    echo 'error in updating stars';
  }
}


if (isset($_POST['fork_submit']))
{
  $sql = "SELECT * FROM repository WHERE name = '".$_SESSION['name']."'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0)
  {
    $row = mysqli_fetch_assoc($result);
    $id=$row['repo_id'];
    $current = $row['forks'];
  }
  $sql= "INSERT INTO fork_user(repo_id, username) VALUES($id,'".$_SESSION['username']."');";
  $result = mysqli_query($conn,$sql);
  if($result)
  {
    $sql= "UPDATE repository SET forks = $current+1 WHERE repo_id=$id";
    $result = mysqli_query($conn,$sql);
    header('Location:homepage.php');
  }
  else {
    echo 'error in updating stars';
  }
}

if (isset($_POST['delete_submit']))
{
  $sql = "SELECT * FROM repository WHERE name = '".$_SESSION['name']."'";
  $result = mysqli_query($conn,$sql);
  if(mysqli_num_rows($result)>0)
  {
    $row = mysqli_fetch_assoc($result);
    $id=$row['repo_id'];
  }

  $sql= "DELETE  FROM repository WHERE repo_id=$id";
  $result1 = mysqli_query($conn,$sql);
  $sql= "DELETE  FROM stars WHERE repo_id=$id";
  $result2 = mysqli_query($conn,$sql);

  $sql= "DELETE  FROM repository WHERE repo_id=$id";
  $result1 = mysqli_query($conn,$sql);


  if($result)
  {
    $sql= "UPDATE repository SET forks = $current+1 WHERE repo_id=$id";
    $result = mysqli_query($conn,$sql);
    header('Location:homepage.php');
  }
  else {
    echo 'error in updating stars';
  }
}
?>
