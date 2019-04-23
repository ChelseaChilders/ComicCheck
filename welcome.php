<?php
require 'db.php';
session_start();
$_SESSION['message'] = '';



if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $issueTitle = $mysqli->real_escape_string($_POST['ComicIssue_title']);
    
    $username = $_SESSION['username'];
    
    $sql = "INSERT INTO cchilderDB.User_has_ComicIssue (username, ComicIssue_title) "
        . "VALUES ('$username', '$issueTitle')";
        
        
        if ($mysqli->query($sql) === true){
            $_SESSION['message'] = "Successful! Added $issueTitle to the $username profile!";
        } else {
            $_SESSION['message'] = "Unsuccessful! Did not add $issueTitle to the $username profile!";
        }
        $mysqli->close();
        
}





?>
<html lang="en">
<head>
    <title>Comic Check | Welcome</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="welcome.php">Comic Check</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="issues.php">Issues</a></li>
        <li><a href="volumes.php">Volumes</a></li>
          <li><a href="characters.php">Characters</a></li>
          <li><a href="story_arcs.php">Story Arcs</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-user"></span><span class="user">&nbsp;&nbsp;<?= $_SESSION['username'] ?></a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">

<div class="alert alert-success"><?= $_SESSION['message'] ?></div>

    <h1>Welcome <span class="user"><?= $_SESSION['username'] ?>!</h1>
    <p>You've now logged into Comic Check</p>
    <h4>Do you want to look for:</h4>
    <p><a href="issues.php">Issues</a></p>
    <p><a href="volumes.php">Volumes</a></p>
    <p><a href="characters.php">Characters</a></p>
    <p><a href="story_arcs.php">Story Arcs</a></p>
    
    <div id="AddComicIssueForm" class="AddComicIssueForm">
            <h3>Add Comic Issue to your profile:</h3>
            <form class="form" method="add" enctype="multipart/form-data" autocomplete="off">
                <input type="text" placeholder="Comic Issue Title" name="ComicIssue_title" required style="color:black;"/><br>
                <input type="submit" value="Add Issue" name="register" class="myAddBtn" style="background-color: black;"/>
            </form>
   </div>
   
    
</div>

</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</html>
