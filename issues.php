<?php 
require 'db.php';
session_start(); 
$_SESSION['message'] = '';


//the form has been submitted with post
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['search'])) { //user searching
        $search = $_POST['search_word'];
        
        $_SESSION['message'] = "Let's get this rolling! $search fvdbd";
        
        $sql = "SELECT title FROM ComicIssues";
        $result = $mysqli->query($sql); //$result = mysqli_result object
        
    }
}
















?>

<html lang="en">
<head>
	<title>Comic Check | Issues</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  
<!-- Navigation section
================================================== -->
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
        <li><a href="#">Issues</a></li>
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
    
<!-- Body section
================================================== -->
<div class="container">
<div class="alert alert-success"><?= $_SESSION['message'] ?></div>

<div id="mySearch">
	<form class="searchForm" method="post" enctype="multipart/form-data" autocomplete="off">
		<input id="searchBar" type="text" placeholder="Search" name="search_word" required />
        <input id="searchBtn" type="submit" value="Search" name="search"/>
    </form>
</div>

    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        //include ("dbinfo.inc.php");

        $query = "SELECT * FROM Author;";
        $query2 = "SELECT * FROM ComicIssue;";

        $result = mysqli_query($mysqli, $query);
        $result2 = mysqli_query($mysqli, $query2);

        
        mysqli_close($mysqli);
        ?>
        
        

            <?php
            while ($row = mysqli_fetch_array($result2)) {

                $c1 = $row['ComicIssue_ID'];
                $c2 = $row['ComicIssue_title'];
                $c3 = $row['ComicIssue_desc'];
                $c4 = $row['ComicIssue_releaseDate'];
                $c5 = $row['ComicIssue_issueNumber'];
                $c6 = $row['ComicIssue_img'];

                ?>
           <div class="cell" style="margin-top: 0px; min-height: 250px;">
        
            <div class="issue_img">
                <img src="<?php echo "$c6"; ?>" style="width: 100%;
    height: 100%;">
            </div>
            <div class="issue_title">
                <p>Title: <?php echo "$c2"; ?></p>
            </div>
            <div class="issue_release">
                <p>Release: <?php echo "$c4"; ?></p>
            </div>
            <div class="issue_desc">
                <p>Description: </p>
                <p><?php echo "$c3"; ?></p>
            </div>
            <!--
            <div id="issue_lists">
                <div class="issue_characters" >
                    <p>Test characters</p>
                    <ul>
                        <li><p>Character 1</p></li>
                        <li><p>Character 1</p></li>
                        <li><p>Character 1</p></li>
                    </ul> 
                </div>
                <div class="issue_teams">
                    <p>Test teams</p>
                    <ul>
                        <li><p>Character 1</p></li>
                        <li><p>Character 1</p></li>
                        <li><p>Character 1</p></li>
                    </ul> 
                </div>
                <div class="issue_storyArc">
                    <p>Test storyArc</p>
                    <ul>
                        <li><p>Character 1</p></li>
                        <li><p>Character 1</p></li>
                        <li><p>Character 1</p></li>
                    </ul> 
                </div>
                <div class="issue_creators">
                    <p>Test creators</p>
                    <ul>
                        <li><p>Character 1</p></li>
                        <li><p>Character 1</p></li>
                        <li><p>Character 1</p></li>
                    </ul> 
                </div>
            </div> -->
            <div>
                <p></p>
            </div>
        </div>
    <?php
            }
            echo "";
            ?>


</div>
    
     
<!-- Footer section
================================================== -->
<footer>
	<p>&nbsp;</p>
    <p>Comic Check</p>
    <p>This site was made by Chelsea Childers</p>
    <p>This site utilizes HTML, CSS, Bootstrap, PHP, JQuery, JavaScript, and SQL</p>
    <p>This site uses comic information obtained from Comic Vine's API.</p>
</footer>

</body>
</html>