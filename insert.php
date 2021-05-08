<?php
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

if(!empty($username) || !empty($password) || !empty($email))
{
$host="remotemysql.com";
$dbUsername = "yp2Ej7JKlI";
$dbPassword = "QUsujkGZtJ";
$dbName="yp2Ej7JKlI";
}
$conn = new mysqli($host,$dbUsername,$dbPassword, $dbname);
if(mysqli_connect_error())
{
die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else{
$SELECT = "SELECT email From register Where email = ? Limit 1";
$INSERT = "INSERT Into register (username, password, email) values(?,?,?)";

$stmt = $conn->prepare($SELECT),
$stmt ->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($email);
$stmt->store_result();
$rnum = $stmt->num_rows;
if($rnum == 0)
{
$stmt->close();

$stmt = $conn->prepare($INSERT);
$stmt->bind_param("sss",$username, $password, $email);
$stmt->execute();
echo "New record inserted";
}
else{
echo "Someone already registed using this email try login";}
}
$stmt->close();
$conn->close();
}
else
{
echo "All fields are required";
die();
}
?> 