<?php include 'confige.php';
session_start();
if (isset($_POST['submit_login']))
{ $var="karan";
    if (!$conn)
    {
        die("Connection failed: " . mysqli_connect_error());
        $var="conn";
    }
    else
    {   $username=test_input($_POST['username']);
        $pass=test_input($_POST['pass']);

        $sql = "SELECT first_name,password FROM user WHERE username='$username';";
        $result = mysqli_query($conn, $sql);
        if($result)
        {
            if (mysqli_num_rows($result) > 0)
            {
               $row = mysqli_fetch_assoc($result);

                  if(strcmp(md5($pass),$row['password'])==0)
                  {
                      $_SESSION['username']=$username;
                  
                      header('Location:homepage.php');

                  }
                  else
                  { $var="Wrong Username or Password";
                  }
            }
            else
            {
             $var="User Doesn't Exist" ;
            }
        }
        else
        {
           $var="query wrong";
        }
    }
}

function test_input($data)
{
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
<head>
<title>CodeHub</title>
<style>
.title{ background-color:transparent;
    position: absolute;
    display: inline-block;
    top:30px;
    width: 100%;
    left:0px;


    }
.login-1{
    background-color: royalblue;
    position: absolute;
    display: inline-block;
    top:120px;
    left:30%;
    width: 400px;
    height: 320px;
    }
.login-1-1
{ background-color: slategrey;
    margin: 15px;
    text-align: center;
    font-size: 120%;
}
.login-1-2
{ background-color: navajowhite;
    margin: 15px;
    padding: 15px;
}
.login-1-2-1
{ margin-top: 20px;
   margin-right: 10px;
}
.login-2
{ position: absolute;
    background-color: olivedrab;
    top:480px;
    left: 30%;
    width:370px;
    height:auto;
    padding: 15px;
    border-radius: 15px;
}
</style>


</head>
<body>
<div class='title'>
<div style="margin-left:42%">
<a href='index.html'><img src="logo.png" alt="LOGO" width="64" height="64" ></a>
</div>
</div>
<div class='login-1'>
<div class="login-1-1">
    Sign Into CodeHub<br><br>
</div>
<div class="login-1-2">
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
<span style="font-size:80%;">username</span><br>
<input type='text' name="username" placeholder='username' required>
<div class="login-1-2-1"><span style="font-size:80%;">password</span> <div style="float:right;"><a href="forgot.html"style="color:red;text-decoration:none;font-size:80%;">Forgot Password?</a></div></div>
<input type='password' name="pass" placeholder='password' required><br><br><br>
<button type='submit' style="width:80px;" name="submit_login">Sign In</button>
</form>
</div>
<span style="font-size:120%;color:lime;"><?php if(isset($_POST['submit_login'])){echo $var;}?></span>
</div>
<div class="login-2">
New to CodeHub <div style="float:right"><a href="index.php#form2" style="color:white;text-decoration:none;">Create an Account</a></div>
</div>
</body>
</html>
