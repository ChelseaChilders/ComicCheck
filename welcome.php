<?php session_start(); ?>
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
        <li><a href="#">Volumes</a></li>
          <li><a href="#">Characters</a></li>
          <li><a href="#">Story Arcs</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php"><span class="glyphicon glyphicon-user"></span><span class="user">&nbsp;&nbsp;<?= $_SESSION['username'] ?></a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
    <h1>Welcome <span class="user"><?= $_SESSION['username'] ?>!</h1>
    <p>You've now logged into Comic Check</p>
    <h4>Do you want to look for:</h4>
    <p><a href="issues.php">Issues</a></p>
    <p><a>Volumes</a></p>
    <p><a>Characters</a></p>
    <p><a>Story Arcs</a></p>
</div>

</body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</html>
