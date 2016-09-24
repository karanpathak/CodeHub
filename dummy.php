<?php include 'confige.php'; 
//session_start();
if (!$conn) 
{
    die("Connection failed: " . mysqli_connect_error());
}
else 
{
$sql = "SELECT * FROM user";
$result = mysqli_query($conn,$sql);
print_r ($result);
if (mysqli_num_rows($result) > 0) 
{
    // output data of each row
  // $row = mysqli_fetch_assoc($result);
    //   $var=$row['username'];
    $var='karan';
} 
else 
{
    $var="0 results";
}
}

    

echo $var;
?>
