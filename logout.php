<?php include 'confige.php'; 
session_start();
if(!isset($_SESSION['username']))
{  mysqli_close($conn);
    header('Location:login.php');
}
else 
{ 
echo '<span style="font-size:120%">Logging Out....</span>';

session_unset();
session_destroy(); 

mysqli_close($conn);

header('refresh:3;url=index.php');
}
?>