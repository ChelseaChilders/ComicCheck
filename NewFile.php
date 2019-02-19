<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Comic Check</title>
    <link rel="stylesheet" href="reset.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
  
  <div>
    <h3>Let's Login or Register!</h3>
    <a href="form.php">Link to go!</a>
    </div>
    
<!-- Header section
================================================== -->
<header>
    <p></p>
    <img style="width: 40vw; margin: auto 0;" src="ComicCheck_Logo.png">
</header>
   
    
<!-- Navigation section
================================================== -->
<div id="myNav">
    <p>Comic Check</p>
    <p>Issues</p>
    <p>Volumes</p>
    <p>Characters</p>
    <p style="padding-right: 0px">Story Arcs</p>
</div>
    
<!-- Body section
================================================== -->
<div id="myBody">
    <div id="tableHolder" >
    
    <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        //include ("dbinfo.inc.php");
        $con = mysqli_connect("avl.cs.unca.edu", "cchilder", "sql4you", "cchilderDB") or die("Unable to select database");

        $query = "SELECT * FROM Author;";
        $query2 = "SELECT * FROM ComicIssue;";

        $result = mysqli_query($con, $query);
        $result2 = mysqli_query($con, $query2);

        
        mysqli_close($con);
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
                <p>Test Title: <?php echo "$c2"; ?></p>
            </div>
            <div class="issue_release">
                <p>Test Release: <?php echo "$c4"; ?></p>
            </div>
            <div class="issue_desc">
                <p>Test Description: </p>
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
</div>
    
     
<!-- Footer section
================================================== -->
<footer>
    <p>Comic Check</p>
    <p>Footer</p>
</footer>

</body>
</html>