<div style="background-color: #3a3f48; color: whitesmoke;
    min-width: 300px; max-width: 600px; min-height: 150px; border-radius: 2px; margin: 10px; float: left; overflow: scroll;">
    <div style="width: 35%; float: left; max-width:150px;">
    	<img style="width:100%; padding:5px; max-height: 160px; max-width:100px" src="<?php echo "$s6"; ?>">
    </div>
    <div style="height: 150px; float: none; overflow:scroll;">
    
    	<a data-toggle="collapse" href="#collapseExample<?php echo "$s1"; ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
            <p style="text-align: left; padding:5px 1px 2px 1px; margin-bottom: 0px; max-width: 225px; font-size: 25px;"><strong><?php 
            if ($s2){
                echo "$s2";
            }
            ?></strong></p>
        </a>
    	
    	<?php
    	if($s4){
    	    ?>
    	<p style="text-left: center; padding:10px 1px 2px 0px; margin-bottom: 0px; margin-top: 0px; font-size: 6px;"><p>Started in <?php echo "$s4"; ?></p>
    	<?php
    	} else {
    	    ?>
    	<p style="text-left: center; padding:10px 1px 2px 0px; margin-bottom: 0px; margin-top: 0px; font-size: 6px;"><p><?php echo "$s4"; ?></p>
    	<?php
    	}
    	if ($s5 > 1){ ?>
    		<p style="text-left: center; padding:0px 1px 2px 0px; margin-bottom: 0px; margin-top: -10px; font-size: 6px;"><p>Issue Count: <?php echo "$s5"; ?></p>
    	<?php
    	}
    	?>
    	
    	<?php 
	if (isset($_SESSION['username'])){
	    ?>
	    <form class="form" method="post" enctype="multipart/form-data" autocomplete="off" style="float: left; padding: 3px;  margin-left: -15px;">
                <input placeholder="<?= $s1 ?>" name="ComicVolume_ID" value="<?= $s1 ?>"
                style="color:black; width:1px; visibility: hidden;">
                <?php 
                $read_sql = "SELECT volumeID FROM User_has_ReadVolume WHERE volumeID='$s1' and userID='$userID'";
                $read_result = $mysqli->query($read_sql);
                if ($read_result->num_rows > 0){
                    $liked_sql = "SELECT volumeID FROM User_has_LikedVolume WHERE volumeID='$s1' and userID='$userID'";
                    $liked_result = $mysqli->query($liked_sql);
                    if ($liked_result->num_rows>0){
                    ?>
                    	<input type="submit" value="un-Like it" name="unLiked" class="myAddBtn" style="background-color: white; font-size: 10px;">
                    <?php
                    } else {
                    ?>
                    	<input type="submit" value="Like it!" name="Liked" class="myAddBtn" style="background-color: white; font-size: 10px;">
                    <?php
                    }
                    ?>
                    	<input type="submit" value="un-Read" name="unRead" class="myAddBtn" style="background-color: white; font-size: 10px;">
                	<?php
                } else {
                ?>
                	<input type="submit" value="Read it!" name="Read" class="myAddBtn" style="background-color: white; font-size: 10px;">
                    <?php
                        $want_sql = "SELECT volumeID FROM User_has_WantToReadVolume WHERE volumeID='$s1' and userID='$userID'";
                        $want_result = $mysqli->query($want_sql);
                        if ($want_result->num_rows == 0){
                        ?>
                        	<input type="submit" value="Want to Read!" name="Want" class="myAddBtn" style="background-color: white; font-size: 10px;">
                        <?php
                        } else {
                        ?>
                			<input type="submit" value="Don't want to read" name="removeWant" class="myAddBtn" style="background-color: white; font-size: 10px;">
                		<?php
                        }
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
        $volumeID = $mysqli->real_escape_string($_POST['ComicVolume_ID']);
        
        if (isset($_POST['Read'])) {
            $sql = "INSERT INTO cchilderDB2.User_has_ReadVolume (userID, volumeID) "
	               . "VALUES ('$userID', '$volumeID')";
            $sql2 = "DELETE FROM User_has_WantToReadVolume WHERE userID='$userID' AND volumeID='$volumeID'";
		    
		    if ($mysqli->query($sql) === true){
		        $_SESSION['message'] = "Successful! Added $volumeID to the $userID profile!";
		    } else {
		        $_SESSION['message'] = "Unsuccessful! Did not add $volumeID to the $userID profile!";
		    }
		    if ($mysqli->query($sql2) === true){
		        $_SESSION['message'] = "Successful! removed $volumeID to the $userID profile!";
		    } else {
		        $_SESSION['message'] = "Unsuccessful! Did not remove $volumeID to the $userID profile!";
		    }
        }
        
        if (isset($_POST['Liked'])) {
	        $sql = "INSERT INTO cchilderDB2.User_has_LikedVolume (userID, volumeID) "
    	           . "VALUES ('$userID', '$volumeID')";

    	    if ($mysqli->query($sql) === true){
    	        $_SESSION['message'] = "Successful! Added $volumeID to the $userID profile!";
    	    } else {
    	        $_SESSION['message'] = "Unsuccessful! Did not add $volumeID to the $userID profile!";
    	    }
        }
        
        if (isset($_POST['Want'])) {
            $sql = "INSERT INTO cchilderDB2.User_has_WantToReadVolume (userID, volumeID) "
    	    . "VALUES ('$userID', '$volumeID')";
    	    
    	    
    	    if ($mysqli->query($sql) === true){
    	        $_SESSION['message'] = "Successful! Added $volumeID to the $userID profile!";
    	    } else {
    	        $_SESSION['message'] = "Unsuccessful! Did not add $volumeID to the $userID profile!";
    	    }
        }
        
        if (isset($_POST['removeWant'])) {
            $sql = "DELETE FROM User_has_WantToReadVolume WHERE userID='$userID' AND volumeID='$volumeID'";
            if ($mysqli->query($sql) === true){
                $_SESSION['message'] = "Successful! removed $volumeID to the $userID profile!";
            } else {
                $_SESSION['message'] = "Unsuccessful! Did not remove $volumeID to the $userID profile!";
            }
        }
        
        if (isset($_POST['unLiked'])) {
            $sql = "DELETE FROM User_has_LikedVolume WHERE userID='$userID' AND volumeID='$volumeID'";
            if ($mysqli->query($sql) === true){
                $_SESSION['message'] = "Successful! removed $volumeID to the $userID profile!";
            } else {
                $_SESSION['message'] = "Unsuccessful! Did not remove $volumeID to the $userID profile!";
            }
        }
        
        if (isset($_POST['unRead'])) {
            $sql = "DELETE FROM User_has_ReadVolume WHERE userID='$userID' AND volumeID='$volumeID'";
            $sql2 = "DELETE FROM User_has_LikedVolume WHERE userID='$userID' AND volumeID='$volumeID'";
            if ($mysqli->query($sql) === true){
                $_SESSION['message'] = "Successful! removed $volumeID to the $userID profile!";
            } else {
                $_SESSION['message'] = "Unsuccessful! Did not remove $volumeID to the $userID profile!";
            }
            if ($mysqli->query($sql2) === true){
                $_SESSION['message'] = "Successful! removed $volumeID to the $userID profile!";
            } else {
                $_SESSION['message'] = "Unsuccessful! Did not remove $volumeID to the $userID profile!";
            }
        }
        

    ?>	
    
    <div class="collapse" id="collapseExample<?php echo "$s1"; ?>" style="margin-top: 20px;">
        	<p style="text-align: center; float: right; padding:15px; width: 100%; LINE-HEIGHT:30px; "><?php
        	if($s3){
        	    echo "$s3"; 
        	} else {
        	    echo "No description given.";
        	}
        	?></p>
        </div>	        
</div>