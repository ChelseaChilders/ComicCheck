<?php
require 'db.php';
session_start();
$_SESSION['message'] = '';

//the form has been submitted with post
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if (isset($_POST['login'])) { //user logging in

        $email = $mysqli->real_escape_string($_POST['email']);
        $password = $mysqli->real_escape_string($_POST['password']);
        $result = $mysqli->query("SELECT * FROM Users WHERE email='$email'");
        
        if ( $result->num_rows == 0 ){ // User doesn't exist
            $_SESSION['message'] = "User with that email doesn't exist!";
        } else { // User exists
            $user = $result->fetch_assoc();
            
            if ( $password == $user['password'] ) {
                
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['userID'] = $user['userID'];
                
                // This is how we'll know the user is logged in
                $_SESSION['logged_in'] = true;
                $_SESSION['message'] = "You've logged in!" ;
                header("location: home.php");
            } else {
                $_SESSION['message'] = "You have entered wrong password, try again!" ;
            }
        }  
        
    } elseif (isset($_POST['register'])) { //user registering
        
        $username = $mysqli->real_escape_string($_POST['username']);
        $email = $mysqli->real_escape_string($_POST['email']);
        $password = ($_POST['password']); //md5 has password for security
        
        //set session variables
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['email'] = $email;
        
        
        //insert user data into database
        $sql = "INSERT INTO cchilderDB.User (username, email, password) "
            . "VALUES ('$username', '$password', '$email')";
            
            //if the query is successsful, redirect to welcome.php page, done!
            if ($mysqli->query($sql) === true){
                $_SESSION['message'] = "Registration succesful! Added $username to the database!";
                header("location: home.php");  
            } else {
                $_SESSION['message'] = "User $username with $password and $email could not be added to the database!";
            }
            $mysqli->close();
    }
}
?>

<html>
<head>
    <title>Comic Check | Login/Register</title>
    
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="style.css">
        
</head>
<body id="LR">
    <div id="LR_left_side">
        <div id="LR_logo" class="LR_logo">
            <img src="images/CC_BD.png">
        </div>
        
        <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
        
        <div id="RegisterForm" class="RegisterForm" style="visibility: hidden">
            <h1>Create an account</h1>
            <form class="form" method="post" enctype="multipart/form-data" autocomplete="off">
                <input type="text" placeholder="User Name" name="username" required /><br>
                <input type="email" placeholder="Email" name="email" required /><br>
                <input type="password" placeholder="Password" name="password" autocomplete="new-password" required /><br>
                <input type="submit" value="Register" name="register" class="myFormBtn" />
            </form>
        </div>
        
        <div id="LoginForm" class="LoginForm" style="visibility: hidden; margin-top:0px;">
            <h1>Login to your account</h1>
            <form class="form" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
                <input type="email" placeholder="Email" name="email" required /><br>
                <input type="password" placeholder="Password" name="password" autocomplete="new-password" required /><br>
                <input type="submit" value="Login" name="login" class="myFormBtn" />
            </form>
        </div>
    </div>
    
    <div id="LR_right_side">
        <div id="LR_buttonDiv">
            <button onclick="displayLogin()">Login</button>
            <br>
            <button onclick="displayRegister()">Register</button></div>
    </div>
</body>
    
<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="script.js"></script>
    
</html>