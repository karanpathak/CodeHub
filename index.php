<?php include 'confige.php';
error_reporting(0);
session_start();

if (isset($_POST['submit_register']))
{  $var="";
   $email_error="";
 if (!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}

else
{   $sql = "SELECT username,email FROM user";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
    if (mysqli_num_rows($result) > 0)
    {
        $res=1;
        $username=test_input($_POST['username']);
        $email = test_input($_POST['email']);
        while($row = mysqli_fetch_assoc($result))
        {
        if($row['username']==$username){$var="username already taken";$res=0;break;}
        if($row['email']==$email){$email_error="Email already Registered";$res=0;break;}
        }
        if($res)
            {
                $firstname=test_input($_POST['firstname']);
                $lastname=test_input($_POST['lastname']);

                $pass=test_input($_POST['pass']);

                $_SESSION['username']=$username;
              

                $sql = "INSERT INTO user (username,first_name,last_name,email,password) VALUES ('$username','$firstname','$lastname','$email','$pass')";

                if (mysqli_query($conn, $sql))
                {
                    header('Location:homepage.php');
                }
                else
                {
                   $var="Error:".mysqli_error($conn);
                }


            }
    }
    else
    {
        $var="0 results";
    }
    }

    else {
    $var="no connection";
    }

}
}
$repo=array();
$sql= "SELECT repo_id FROM repository";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    array_push($repo,$row['repo_id']);
  }

}

$random_keys=array_rand($repo,4);


$sql= "SELECT name,stars,forks FROM repository WHERE repo_id = ".$repo[$random_keys[0]];;
$result = mysqli_query($conn,$sql);
$repo1 = mysqli_fetch_assoc($result);

$sql= "SELECT name,stars,forks FROM repository WHERE repo_id = ".$repo[$random_keys[1]];
$result = mysqli_query($conn,$sql);
$repo2 = mysqli_fetch_assoc($result);

$sql= "SELECT name,stars,forks FROM repository WHERE repo_id = ".$repo[$random_keys[2]];
$result = mysqli_query($conn,$sql);
$repo3 = mysqli_fetch_assoc($result);

$sql= "SELECT name,stars,forks FROM repository WHERE repo_id = ".$repo[$random_keys[3]];
$result = mysqli_query($conn,$sql);
$repo4 = mysqli_fetch_assoc($result);

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}


?>


<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="logo.ico"/>
<link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
<title>CodeHub</title>
<style>
body{

}
header{ position: absolute;
	background-color:#F8F8F8 ;
    width: 100%;
    left:0px;
    top:0px;
    display: inline-block;
    height: 80px;

}
div#main{ position: absolute;
    background-color: 	#C8C8C8 ;
    margin-top:20px;

    top:0px;
    height: 60px;
    display:inline-block;
    width: 100%;
}
div#index-2{ position: absolute;
top:80px;
	background-image:url('background.png');
    background-repeat: repeat;
    height:370px;
    background-size: 1920px 400px;
     color:white;
     width:100%;
     left:0px;
}
div.dropdown-content {
    display: none;
    position:absolute;
    background-color: grey;
    min-width: 100px;
   left: -126px;
   top:25px;
    padding: 2px;
  width: 260px;
  border-radius: 15px;
  border: 0.5px solid;
  z-index: 1;
}
.dropdown {
    position:relative;
    display: inline-block;
     margin-right:30px;
    margin-left:90px;
}
.dropdown:hover .dropdown-content {
        display: inline-block;

}
.login-signup{ position: absolute;
right: 0px;

    display: inline-block;
    margin: 20px;
    padding-right: 20px;



}
.option-sp{
float: left;
display:block;
margin:10px;
text-align: center;
border:1px solid;
background-color:green;
border-radius:5px;
padding:3px;
 width: 100px;
}


div.search{float:left;display:inline;}

.option-link{
    text-decoration: none;
    color:white;
}
.index-2-1{
    position: absolute;
    background-color: transparent;
    width:55%;
   height:100%;


}
.index-2-2{ position: absolute;
    background-color: transparent;
    display:inline-block;
    width: 45%;
    height: 100%;
top: 0px;
right: 0px;}

.index-2-1-1
{
    text-align: left;
    margin: 10px;
    padding: 30px;
    word-wrap: break-word;
}
#form2>input{ margin: 3px;
height: 30px;
width:300px;
}

.header-main{
    display:inline-block;
    margin-top:12px;
    float: left;}

.main-1
{
    margin-right:30px;
    margin-left:60px;

}

.search
{
    margin-right:30px;
    margin-left:30px;

}


.form-signup{
    padding:20px;
    margin-left: 10px;

}
.log-sign
{width:80px;
height:35px;
font-size:110%;
border-radius:10px;
    border:none;}

#index-3
{ position: absolute;
    background-color:#ff3333;
    width: 100%;
    height:190px;
    top:450px;
    left:0px;
}
footer{
    position: absolute;
    background-color: lightgrey;
    top:640px;
    left:0px;
    height: 40px;
    width: 100%;

}
input:focus {
    background-color:#E8E8E8;
    border: 2px solid blue;
}
input:invalid
{
border: 1.5px solid red;
}

.repo{
margin: 5px;
height:124px;
margin-left:15px;
display: inline-block;
float : left;
background-color: #ffad33;

}
</style>

<script>
function GlobalSearch(search)
{
    var sendtext="globalsearch="+search.value;
    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function()
   {
       if (xhttp.readyState == 4 && xhttp.status == 200)
       {   // Response Code
           //var result = JSON.parse(xhttp.responseText);
           document.createElement("option");
           alert(xhttp.responseText);
        }

       };

       // Request Code
     xhttp.open("POST", "search.php", true);
     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(sendtext);
}

function submit(search) {
  //alert(search.value);
  window.location.href = "repo.php?name="+search.value;
//alert('karn');
}
</script>

</head>
<body>

<header>
<div id="main">
<div class="header-main" style="margin-left:30px;margin-right:30px;"><a class="option-link" href="index.php"><span style="font-size:200%;color:darkgreen;">CodeHub</span></a></div>
<div class="header-main search">
<input type='search'  list="repos" placeholder="search repository" onchange="GlobalSearch(this)"  style="width:300px;height:30px;border-radius:10px;border:none;">
<datalist id="repos">

</datalist>
</div>
<div class="dropdown header-main">
    <img class="option-image" src="options.png" alt="options">
    <div class="dropdown-content">
    <div class="option-sp"><a class="option-link" href="learn-more.html">Explore</a></div>
    <div class="option-sp"><a class="option-link" href="learn-more.html">Features</a></div>
     <div class="option-sp"><a class="option-link" href="learn-more.html">Enterprise</a></div>
    <div class="option-sp"><a class="option-link" href="learn-more.html">Pricing</a></div>
    </div>
</div>

<div class="login-signup header-main">
<a href="login.php"><button class="log-sign"style="margin-right:30px;border-radius:10px;border:none;font-size:110%;"><span>Sign&nbsp;In</span></button></a>
<a href="#form2"><button class="log-sign" onclick="load()"><span>Sign&nbsp;Up</span></button></a>
</div>
</div>
</header>

<div id="index-2">
 <div class="index-2-1">
<div class="index-2-1-1">
<span style="font-size:xx-large">Where software is built </span><br><br>
Powerful collaboration, code review, and code management for
open source and private projects.<br><br> Public projects are always free.

</div>
<div style="padding-left:120px;padding-top:15px;">
<a href="learn-more.html"><button>Learn More</button></a>
</div>
 </div>

<div class="index-2-2">
<div class="form-signup">
<form id="form2" action="index.php" method="POST" autocomplete="on">
<input id="username"  name="username" type='text' placeholder="Pick a username" required><br>
<span id="inv" style="font-size:85%"><?php if (isset($_POST['submit_register'])){echo $var;}?></span>
<input type='text' name="firstname" placeholder="First name" required><br>
<input type='text' name="lastname" placeholder="Last name" required><br>
<input type='text' name="email" pattern='^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$' placeholder='email' required><span id="inv" style="font-size:85%"><?php if (isset($_POST['submit_register'])){echo $email_error;}?></span><br>
<input type='password' name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder='Create a password' required><br>
<span style="font-size:80%;">Use at least one lowercase letter,one Uppercase letter,one numeral, <br>and minimum eight characters.</span>
<br><br>
<button name="submit_register" type="submit" value="Submit" style="border:none;width:140px;height:40px;background-color:#8ADD6D;border-radius:15px;margin:10px;"><span style="font-size:120%;">Sign Up</span></button>
</form>
</div>
 </div>
</div>
<!-- end of index-2 -->



<div id="index-3">
<div style="margin:50px;">
    <div>
      <div class="repo">
          <div style="width:100%;">
              <div style="margin:20px;">  <a href="<?php echo 'repo.php?name='.$repo1["name"]?>" style="font-size:120%;text-decoration:none;color:black;"><span><?php echo $repo1["name"]?></span></a></div>
              <div style="float:right;margin-right:20px;padding:5px;"><i class="fa fa-code-fork" style="margin-right:3px;"></i><?php echo $repo1["forks"]?></div>
                <div style="float:right;margin-right:10px;padding:5px;"><i class="fa fa-star" style="margin-right:3px;"></i><?php echo $repo1["stars"]?></div>
          </div>


      </div>
  </div>

  <div>
    <div class="repo">
          <div style="width:100%;">
              <div style="margin:20px;">  <a href="<?php echo 'repo.php?name='.$repo1["name"]?>" style="font-size:120%;text-decoration:none;color:black;"><span><?php echo $repo2["name"]?></span></a></div>
              <div style="float:right;margin-right:20px;padding:5px;"><i class="fa fa-code-fork" style="margin-right:3px;"></i><?php echo $repo2["forks"]?></div>
                <div style="float:right;margin-right:10px;padding:5px;"><i class="fa fa-star" style="margin-right:3px;"></i><?php echo $repo2["stars"]?></div>


          </div>
      </div>
  </div>

  <div>
    <div class="repo">
          <div style="width:100%;">
              <div style="margin:20px;">  <a href="<?php echo 'repo.php?name='.$repo1["name"]?>" style="font-size:120%;text-decoration:none;color:black;"><span><?php echo $repo3["name"]?></span></a></div>
              <div style="float:right;margin-right:20px;padding:5px;"><i class="fa fa-code-fork" style="margin-right:3px;"></i><?php echo $repo3["forks"]?></div>
                <div style="float:right;margin-right:10px;padding:5px;"><i class="fa fa-star" style="margin-right:3px;"></i><?php echo $repo3["stars"]?></div>


          </div>
      </div>

  </div>


  <div>
      <div class="repo">
          <div style="width:100%;">
              <div style="margin:20px;">  <a href="<?php echo 'repo.php?name='.$repo1["name"]?>" style="font-size:120%;text-decoration:none;color:black;"><span><?php echo $repo4["name"]?></span></a></div>
              <div style="float:right;margin-right:20px;padding:5px;"><i class="fa fa-code-fork" style="margin-right:3px;"></i><?php echo $repo4["forks"]?></div>
                <div style="float:right;margin-right:10px;padding:5px;"><i class="fa fa-star" style="margin-right:3px;"></i><?php echo $repo4["stars"]?></div>


          </div>
      </div>

  </div>

</div>
</div>

<footer><div style="margin-top:10px;margin-left:300px;font-size:90%;">&copy;Codehub</div>
</footer>

</body>
</html>

<?php
mysqli_close($conn);
?>
