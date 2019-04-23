<?php
require 'navBar.php';
?>
      
  <main class="page_body" style="background-color: #283b9c; padding-right: 20px; min-height: 100vh;">
      
      <img src="titleText.png" style="margin-left: 20%; margin-right: 20%; width: 60%; padding-bottom: 10px;">
      
    <div class="container-fluid" style="background-color: whitesmoke;">
    
    <div><?= $_SESSION['message'] ?></div>
    
    
            <?php
        if (isset($_POST['search'])) {
            $search = $_POST['search_word'];
            $_SESSION['searchWord'] = $search;
         
			?>
            
            <h2 style="font-size:50px;">Search Results</h2>
            
            <h5 style="margin-left: 15px; width: 100%;">Issues</h5>
            
            <div class="row" style="max-height: 500px; overflow-y: scroll; margin-bottom: 30px;">
            <div>
            <?php
            
            $userID = $_SESSION['userID'];
            
            $result = $mysqli->query("SELECT * FROM Issues
            WHERE (`title` LIKE '%".$search."%') OR (`desc` LIKE '%".$search."%') LIMIT 0, 100");

            if($result->num_rows > 0 ){ // if one or more rows are returned do following
                while ($row = mysqli_fetch_array($result)) {
                    $s1 = $row['issueID'];
                    $s2 = $row['title'];
                    $s3 = $row['desc'];
                    $s4 = $row['releaseDate'];
                    $s5 = $row['issueNum'];
                    $s6 = $row['imgThumb'];
                    
                    require 'issueMini_div.php';
                    
                } } else {
                    echo "No results found for search";
                }?>
                </div></div>
                <h5 style="margin-left: 15px; width: 100%;">Volumes</h5>
            
            	<div class="row" style="max-height: 500px; overflow-y: scroll; margin-bottom: 30px;">
            	<div>
               <?php 
               
               $result = $mysqli->query("SELECT * FROM Volumes
                WHERE (`title` LIKE '%".$search."%') OR (`desc` LIKE '%".$search."%') LIMIT 0, 100");
            
            if($result->num_rows > 0 ){ // if one or more rows are returned do following
                while ($row = mysqli_fetch_array($result)) {
                    $s1 = $row['volumeID'];
                    $s2 = $row['title'];
                    $s3 = $row['desc'];
                    $s4 = $row['startYr'];
                    $s5 = $row['issueCount'];
                    $s6 = $row['imgThumb'];
                    $s7 = $row['briefDesc'];
                    require 'volumeMini_div.php';
                    
                } } else {
                    echo "No results found for search";
                }?> 
                </div></div>
                <h5 style="margin-left: 15px; width: 100%;">Creators</h5>
            
            	<div class="row" style="max-height: 500px; overflow-y: scroll; margin-bottom: 30px;">
            	<div>
                <?php 

                $result = $mysqli->query("SELECT * FROM Creators
                WHERE (`name` LIKE '%".$search."%') OR (`desc` LIKE '%".$search."%') LIMIT 0, 100");
            
            if($result->num_rows > 0 ){ // if one or more rows are returned do following
                while ($row = mysqli_fetch_array($result)) {
                    $s1 = $row['creatorID'];
                    $s2 = $row['name'];
                    $s3 = $row['desc'];
                    $s4 = $row['briefDesc'];
                    //$s5 = $row['imgSmall'];
                    $s6 = $row['imgThumb'];
                    
                    require 'creatorMini_div.php';
                    
                } } else {
                    echo "No results found for search";
                }?>  
                </div></div>
                <h5 style="margin-left: 15px; width: 100%;">Characters</h5>
            
            	<div class="row" style="max-height: 500px; overflow-y: scroll; margin-bottom: 30px;">
            	<div>
                <?php 
                
                $result = $mysqli->query("SELECT * FROM Characters
                WHERE (`name` LIKE '%".$search."%') OR (`desc` LIKE '%".$search."%') LIMIT 0, 100");
            
            if($result->num_rows > 0 ){ // if one or more rows are returned do following
                while ($row = mysqli_fetch_array($result)) {
                    $s1 = $row['characterID'];
                    $s2 = $row['name'];
                    $s3 = $row['desc'];
                    $s4 = $row['briefDesc'];
                    //$s5 = $row['imgSmall'];
                    $s6 = $row['imgThumb'];
                    
                    require 'characterMini_div.php';
                    
                } } else {
                    echo "No results found for search";
                }?>  
            </div></div>
			
			
        <?php } else { ?>
            
            <h2 style="font-size:50px;">Want to Read List</h2>
            
			<h5 style="margin-left: 15px; width: 100%;">Issues</h5>
            
            <div class="row" style="max-height: 8000px; overflow-y: scroll; margin-bottom: 30px;">
            <div>
            <?php
            
            $userID = $_SESSION['userID'];
            
            $result = $mysqli->query("SELECT * FROM cchilderDB2.User_has_WantToReadIssue
                INNER JOIN cchilderDB2.Issues ON User_has_WantToReadIssue.issueID = Issues.issueID WHERE userID='$userID'");

            
            if($result->num_rows > 0 ){ // if one or more rows are returned do following
                while ($row = mysqli_fetch_array($result)) {
                    $s1 = $row['issueID'];
                    $s2 = $row['title'];
                    $s3 = $row['desc'];
                    $s4 = $row['releaseDate'];
                    $s5 = $row['issueNum'];
                    $s6 = $row['imgThumb'];
                    
                    require 'issueMini_div.php';
                    
                } } ?>
                </div></div>
                <h5 style="margin-left: 15px; width: 100%;">Volumes</h5>
            
            	<div class="row" style="max-height: 8000px; overflow-y: scroll; margin-bottom: 30px;">
            	<div>
               <?php 
            $result = $mysqli->query("SELECT * FROM cchilderDB2.User_has_WantToReadVolume
                INNER JOIN cchilderDB2.Volumes ON User_has_WantToReadVolume.volumeID = Volumes.volumeID WHERE userID='$userID'");
            
            if($result->num_rows > 0 ){ // if one or more rows are returned do following
                while ($row = mysqli_fetch_array($result)) {
                    $s1 = $row['volumeID'];
                    $s2 = $row['title'];
                    $s3 = $row['desc'];
                    $s4 = $row['startYr'];
                    $s5 = $row['issueCount'];
                    $s6 = $row['imgThumb'];
                    $s7 = $row['briefDesc'];
                    require 'volumeMini_div.php';
                    
                } } ?> 
                </div></div>
            
            
  
            </div></div>
        <?php } ?>
        
        
    </div>

  </main>
  <!-- page_body" -->
</div>
<!-- page-wrapper -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/esm/popper.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js'></script>
<script  src="script2.js"></script>

</body>
</html>
