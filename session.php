<?php
   include('connect.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   //$ses_sql = mysqli_query($db,"select username from admin where username = '$user_check' ");
   
   //$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   //$login_session = $row['username'];
   
   //Make it only so i can be able to access the page
   /*
   if($_SESSION['login_user'] != "alaa"){
   header("location:index.php");
   }
   */
   //You have to be signed in to see this page
   if(!isset($_SESSION['login_user'])){
      header("location:index.php");
   }
?>