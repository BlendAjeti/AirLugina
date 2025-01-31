<?php
    $databasehost = "localhost";
    $databaseuser = "root";
    $userpassword = "";
    $databasename = "database";

    $con = mysqli_connect($databasehost, $databaseuser, $userpassword, $databasename);
    mysqli_query($con, "SET NAMES UTF8") or die(mysqli_error($con));

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }


    if(!isset($_SESSION)){
    session_start();
    }
    function checksession(){
        global $con;
        $username = $_SESSION['username'];
        $user_id = $_SESSION['user_id'];
        $result = mysqli_query($con, "SELECT * FROM `users` WHERE `username` = '$username' AND `id` = '$user_id'") or die(mysqli_error($con));
        if(mysqli_num_rows($result) > 0){
            return true;
        }else{
            return false;
        }
      }
      function login($username, $password){
        $db = db_connect('localhost', 'root', '', 'database'); 
        
        $result = $db->query("SELECT * FROM user where username = '".$username."' and password = sha1('".$password."')");
        if(!$result){
            throw new Exception('Could not log you in.');
        }
        if(mysql_num_rows($result) > 0){
            return true;
        } else {
            throw new Exception('Could not log you in.');
        }
        }
    
    
?>