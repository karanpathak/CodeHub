<?php
session_start();
include 'confige.php';
if(!(isset($_SESSION['username'])))
{
  header('location:login.php');
}
else
{
  $owner = $_SESSION['username'];
  $sql = "SELECT * FROM repo_user WHERE repo_id = ".$_SESSION['repo_id'];
  $result = mysqli_query($conn,$sql);

  if($result)
  {
  if(mysqli_num_rows($result)>0)
  {
    $row = mysqli_fetch_assoc($result);
    if($_SESSION['username']!=$row['username'])
    {
      $owner = $row['username'];
    }
  }
}
}
?>
<!DOCTYPE html>
<html>
<head>
<script src="jquery-1.12.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="repo.css">
<link rel="icon" href="logo.ico"/>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" type="text/css" href="top.css">
<script src="repo.js"></script>
<script src="top.js"></script>
<title>CodeHUB.files</title>
</head>
<body>
 <header>
<div id="main">
<div class="header-main main-1"><a class="option-link" href="homepage.php"><img src="index.png" alt="Logo" width="40px";></a></div>
<div class="header-main search">
    <form action="javascript:search(this)">
    <input id="search" type='search' placeholder="search" style="width:300px; height:30px;">
    </form>
</div>
<div class="pull-issue">
    <button class="dropbtn" style="border-radius: 10px; height: 30px;width:120px;">Pull Requests</button>
</div>
<!--<div class="pull-issue" style="margin-left:30px; ">
    <button class="dropbtn" style="border-radius: 10px;height: 30px;width:70px;">Issues</button>
</div>-->

<div class="dropdown">
     <button onclick="myFunction()" class="dropbtn" id="f1" style="border-radius: 10px;"><i class="material-icons" style="font-size:22px">person</i><i class="fa fa-caret-down"  style="font-size:18px"></i></button>
            <div id="myDropdown" class="dropdown-content1">
                <a href="#home">Hi! username</a>
                <a href="#about">Settings</a>
                <a href="index.html">Logout</a>
            </div>
</div>
<div class="dropdown">
    <button onclick="myFunction1()" class="dropbtn" id="f2" style="border-radius: 10px;"><i class="fa fa-plus-circle" style="font-size:24px"></i></button>
            <div id="myDropdown1" class="dropdown-content2">
                <a href="#home">New Repository</a>
                <a href="#about">New File</a>
            </div>
</div>

</div>
</header>

 <div id="content">
   <div id="tab-container">
      <ul>
        <li><a id="info_a" href="repo.php?name=<?php echo $_SESSION['name']?>">Info</a></li>
        <li ><a id="files_a" href="files.php">Files</a></li>
        <?php if($owner==$_SESSION['username']){echo '<li><a id="upload_a" href="upload.php">Upload</a></li>';}?>
      </ul>
   </div>
   <div id="main-container">

     <a href="download.php?download_file=wget.txt">PHP download file</a>

   </div>
</div>
</body>
</html>
