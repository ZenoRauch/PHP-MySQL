<?php
session_start();

$con = mysqli_connect("", "root", "", "pwd");

if(!isset($_POST["username"], $_POST["password"])){
    exit('Please fill both the username and password fields!');
}else{
    $res = mysqli_query($con, "SELECT * FROM accounts WHERE username='test'");
    if(mysqli_num_rows($res) == 0){
        exit("User doesn't exist");
    }else{
        $dsatz = mysqli_fetch_assoc($res);
        if($_POST["password"] == $dsatz["password"]){
            
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $dsatz["id"];
            
            echo "Welcome " . $_POST["username"];
        }
    }
}

?>