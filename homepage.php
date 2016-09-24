<?php include 'confige.php';
session_start();
//error_reporting(0);
if(!isset($_SESSION['username']))
{  mysqli_close($conn);
    header('Location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="logo.ico"/>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<title>CodeHub</title>
<style>
body{ background-color: #F0F0F0;}
header{ position: absolute;
	background-color:transparent;
    width: 100%;
    left:0px;
    top:0px;
    display: inline-block;
    height: 80px;

}
div#main{ position: absolute;
    background-color:#C0C0C0 ;
    margin-top:20px;

    top:0px;
    height: 60px;
    display:inline-block;
    width: 100%;
}
.header-main{
    display:inline-block;
    margin-top:12px;
    float: left;
}
.main-1
{
    margin-right:30px;
    margin-left:60px;

}
div.search{
 float:left;
display:inline-block;
 margin-top:15px;
 margin-left:40px;
 }


.settings-create
{
    display: inline-block;
    float: right;
    margin-right:30px;
    margin-top:15px;
}
.pull-issue
{
    display: inline-block;
    float: left;
    margin-left:200px; margin-top:15px;

}

.dropbtn {
    background-color: #4CAF50;
    color: white;
    border:none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

.dropdown {
    position: relative;
    display: inline-block;
    float: right;
    margin-right:30px;
    margin-top:15px;
}

.dropdown-content1{
    display: none;
    position: absolute;
    left:-30px;
    background-color: #f9f9f9;
    min-width: 80px;
     border-radius: 10px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}
.dropdown-content2{
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 80px;
    border-radius: 10px;
    left:-60px;
    overflow: auto;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content1 a {
    color: black;
    padding: 12px 12px;
    text-decoration: none;
    display: block;
}
.dropdown-content2 a {
    color: black;
    padding: 12px 12px;
    text-decoration: none;
    display: inline-block;
    width: auto;
}


.dropdown a:hover {background-color: #f1f1f1}

.show {display:block;}
.show2 {display:block;}


.home-2
{   position: absolute;
    background-color: transparent;
   top:160px;
   bottom: 40px;
   left:0px;
   width: 100%;

}
.home-2-1{background-color:transparent;
    position: absolute;
    width:82.4%;
    display: inline-block;
    left:0px;
    height: 100%;

}
.home-2-2{ background-color: cornflowerblue;
    position: absolute;
    width:17%;
    display: inline-block;
    right:0px;
    height: 100%;

}
.home-2-1-1
{ background-color: burlywood;
    display: inline-block;
    width: 100%;
    height: 10%;
    margin-bottom: 10px;
}
.home-2-1-2
{ background-color:transparent;
    display: inline-block;
    width: 100%;
    height: 87%;
}

.home-2-1-1-1
{ display: inline-block;
float: left;
    margin-top:3px;
margin-left:24px;
margin-right: 15px;
}
.repo{
margin: 5px;
height:124px;
margin-left:15px;
display: block;

    background-color: #ffad33;
}

</style>

<script>
/* When the user clicks on the button,
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
function search(form) {
    alert("searched for "+document.getElementById("search").value);
}
function localsearch(form) {
    alert("searched for local repsoitory: "+document.getElementById("localsearch").value);
}
function myFunction1() {
    document.getElementById("myDropdown1").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('#f1')) {
//alert("hi");
    var dropdowns = document.getElementsByClassName("dropdown-content1");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
 if (!event.target.matches('#f2')) {
//alert("hi");
    var dropdowns = document.getElementsByClassName("dropdown-content2");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>

</head>
<body>
<header>
<div id="main">
<div class="header-main main-1"><a class="option-link" href="index.html"><img src="index.png" alt="Logo" width="40px";></a></div>
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
                <a>Hi! <?php echo $_SESSION['username']?></a>
                <a href="#settings">Settings</a>
                <a href="logout.php">Logout</a>
            </div>
</div>
<div class="dropdown">
    <button onclick="myFunction1()" class="dropbtn" id="f2" style="border-radius: 10px;"><i class="fa fa-plus-circle" style="font-size:24px"></i></button>
            <div id="myDropdown1" class="dropdown-content2">
                <a href="#new_repo">New Repository</a>
                <a href="#create_team">New File</a>
            </div>
</div>

</div>
</header>
<div class="home-2">
    <div class="home-2-1">
           <div class="home-2-1-1">
               <div class="home-2-1-1-1" style="margin-top:10px;"><i class="fa fa-book" style="font-size:28px"></i></div>
               <div class="home-2-1-1-1" style="padding-top:5px;color:red;"><span style="font-size:120%">My Repositories</span></div>
               <div class="home-2-1-1-1" style="padding-top:5px;">
                    <form action="javascript:localsearch(this)">
                    <input id="localsearch" type='search' placeholder="search local repository" style="width:300px; height:30px;">
                    </form>
               </div>
               <div class="home-2-1-1-1" style="margin-left:200px;padding-top:7px;"><a href="#all_repo" style="font-size:120%;text-decoration:none;color:black;">All</a></div>
               <div class="home-2-1-1-1" style="padding-top:7px;"><a href="#Public_repo" style="font-size:120%;text-decoration:none;color:black;">Public</a></div>
               <div class="home-2-1-1-1" style="padding-top:7px;"><a href="#Private_repo" style="font-size:120%;text-decoration:none;color:black;">Private</a></div>
           </div>

           <div class="home-2-1-2">
             <?php
             $username = $_SESSION['username'];
             $sql = "SELECT * FROM repository r,repo_user u WHERE r.repo_id = u.repo_id and u.username = 'karan'";
             $result = mysqli_query($conn,$sql);
             if(mysqli_num_rows($result)>0)
             {
               while ($row = mysqli_fetch_assoc($result))
               { $name = $row['name'];
                  $stars = $row['stars'];
                  $description = $row['description'];
                  $forks = $row['forks'];
                 echo '<div class="repo">
                     <div style="width:100%;">
                         <div style="margin-left:20px;">  <a href="repo.php?name='.$name.'" style="font-size:120%;text-decoration:none;color:black;"><span>'.$name.'</span></a></div>
                         <div style="float:right;margin-right:20px;padding:5px;"><i class="fa fa-code-fork" style="margin-right:3px;"></i>'.$forks.'</div>
                           <div style="float:right;margin-right:10px;padding:5px;"><i class="fa fa-star" style="margin-right:3px;"></i>'.$stars.'</div>
                     </div>
                     <div style="margin-top:20px;margin-left:10px;"><span>'.$description.'</span>
                     </div>
                 </div>';

               }
             }
              ?>
          </div>
    </div>
    <div class="home-2-2">
    <div style="padding:30px;">    Recent  Contributions</div>
    </div>
</div>
</body>
</html>
