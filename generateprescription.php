<?php
$dbhost = 'abc';
$dbuser = 'root';
$dbpass = 'qwerty123';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
$id=$_POST['id'];
$date=$_POST['date'];
$medicine=$_POST['medicine'];
$diagnosis=$_POST['diagnosis'];
$instructions=$_POST['instructions'];
$doc_name=$_POST['doc_name'];

mysql_select_db('hms');
$str="insert into prescription values('$id','$date','$medicine','$diagnosis','$instructions','$doc_name')";
$res=@mysqli_query($str)or die(mysqli_error());
if(! $conn )
{
  die('Could not connect: ' . mysqli_error());
}
$id = $_POST['id']; 
$sql="SELECT * FROM patients WHERE id='$id'";


$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retval, MYSQL_ASSOC))
{
  echo "<big><b>PRESCRIPTION : </b></big><br><br><br>";
	echo "DOCTOR NAME : $doc_name<br><br>"; 
	echo "<b>Patient Details : </b><br>";
    echo "PATIENT ID : {$row['id']}  <br><br> ".
         "NAME 		 : {$row['name']} <br><br> ".
         "AGE		 : {$row['age']} <br><br> ".
         "GENDER	 : {$row['gender']} <br><br> ".
         "MOBILE	 : {$row['mobile']} <br><br> ".
        
         "--------------------------------<br>";
} 
echo "DATE : $date <br><br>".
	 "MEDICINE : $medicine <br><br>".
	 "DIAGNOSIS : $diagnosis <br><br>".	
	 "ADDITIONAL INSTRUCTIONS : $instructions <br><br>".
	     "--------------------------------<br>";	
mysql_close($conn);
?>
<html>
<input type="button" onclick="window.print();" value="Print Prescription"/><br><br>
<a href="home.html"><b>HOME</b></a>
</html>
