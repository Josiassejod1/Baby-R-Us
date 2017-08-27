<?php
ob_start();
DEFINE('DB_USER', 'jumhoura1');
DEFINE('DB_PSWD', 'Google123');
DEFINE('DB_HOST', 'localhost');
DEFINE('DB_NAME', 'jumhoura_company');


$dbcon= mysqli_connect(DB_HOST,DB_USER,DB_PSWD);

if (!$dbcon)  {
die('error connecting to database');
}
//echo'Connected to database<br>';
$select_db = mysqli_select_db($dbcon, DB_NAME);
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($dbcon));
}
//echo'connected to Table<br>';


/*
    // If the values are posted, insert them into the database.
    if (isset($_POST['user']) && isset($_POST['pass'])){
        $username = $_POST['user'];
        $password = $_POST['pass'];
 
        $query = "INSERT INTO `user` (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($dbcon, $query);
        if($result){
            $smsg = "User Created Successfully.";
        }else{
            $fmsg ="User Registration Failed";
        }
    }
   

*/
?>