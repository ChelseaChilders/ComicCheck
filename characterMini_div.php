<div style="background-color: #3a3f48; color: whitesmoke;
    min-width: 300px; max-width: 600px; min-height: 150px; border-radius: 2px; margin: 10px; float: left; overflow: scroll;">
    <div style="width: 40%; float: left; max-width:150px;">
    	<img style="width:100%; padding:5px; max-height: 150px; max-width:100px" src="<?php echo "$s6"; ?>">
    </div>
    <div style="height: 150px; float: none; overflow:scroll;">
    
    	<a data-toggle="collapse" href="#collapseExample<?php echo "$s1"; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
            <p style="text-align: left; padding:5px 1px 2px 1px; margin-bottom: 0px; max-width: 200px; font-size: 20px;"><strong><?php 
            if ($s2){
                echo "$s2";
            } else {
                echo "No Name";
            }
            ?></strong></p>
        </a>
    	
    	<?php 
	if (isset($_SESSION['username'])){
	    ?>
	    <form class="form" method="post" enctype="multipart/form-data" autocomplete="off" style="float: left; padding: 30px;  margin-left: 10px;">
                <input placeholder="<?= $s1 ?>" name="Character_ID" value="<?= $s1 ?>"
                style="color:black; width:1px; visibility: hidden;">
                <?php 
                $like_sql = "SELECT characterID FROM User_has_LikedCharacter WHERE characterID='$s1' and userID='$userID'";
                $like_result = $mysqli->query($like_sql);
                if ($like_result->num_rows > 0){
                ?>
                    <input type="submit" value="un-Like" name="unLiked" class="myAddBtn"
    	           style="background-color: white; width: 65px;">
    	        <?php
                } else {
                ?>
                	<input type="submit" value="Like" name="Liked" class="myAddBtn" style="background-color: white; width: 50px;">
                <?php
                }
                ?>
          
         </form>
	    <?php 
	} else {
	    ?>
	    <div><p style="margin-left: 15%; float: left;">Login to add to your profile</p></div>
	    <?php 
	}
	
	?>
    	
    </div>
	
    <?php 
    
        $userID = $_SESSION['userID'];
        $characterID = $mysqli->real_escape_string($_POST['Character_ID']);
        if (isset($_POST['Liked'])) {
	        $sql = "INSERT INTO cchilderDB2.User_has_LikedCharacter (userID, characterID) "
    	           . "VALUES ('$userID', '$characterID')";
                    
                    
                    if ($mysqli->query($sql) === true){
                        $_SESSION['message'] = "Successful! Added $characterID to the $userID profile!";
                    } else {
                        $_SESSION['message'] = "Unsuccessful! Did not add $characterID to the $userID profile!";
                    }
        }
        
        
        if (isset($_POST['unLiked'])) {
            $sql = "DELETE FROM User_has_LikedCharacter WHERE userID='$userID' AND characterID='$characterID'";
            if ($mysqli->query($sql) === true){
                $_SESSION['message'] = "Successful! removed $characterID to the $userID profile!";
            } else {
                $_SESSION['message'] = "Unsuccessful! Did not remove $characterID to the $userID profile!";
            }
        }

    ?>	
    
    <div class="collapse" id="collapseExample<?php echo "$s1"; ?>" style="margin-top: 20px;">
        	<p style="text-align: center; float: right; padding:15px; width: 100%; LINE-HEIGHT:30px; "><?php
        	if($s5){
        	    echo "$s5"; 
        	} else {
        	    echo "No description given.";
        	}
        	?></p>
        </div>	        
</div>