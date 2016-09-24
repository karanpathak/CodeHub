<?php
include 'confige.php';

$repo_names=array();
$sql = "SELECT name FROM repository";
$result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result))
  {
    array_push($repo_names,$row['name']);
  }
}


if(isset($_POST['globalsearch']))
{

$value=$_POST['globalsearch'];
$result=array();
$len = strlen($value);
foreach( $repo_names as $i)
{
  if(substr_compare($i,$value,0,$len, TRUE) == 0)
    {
      array_push($result,$i);
    }
}
echo json_encode($result);
}

?>
