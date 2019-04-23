<?php
require 'navBar.php';
?>
      
      <style>
.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #283b9c;
  color: white;
}

.pagination a:hover:not(.active) {background-color: #ddd;}
</style>
      
  <main class="page_body" style="background-color: #283b9c; padding-right: 20px; min-height: 100vh;">
      
      <img src="titleText.png" style="margin-left: 20%; margin-right: 20%; width: 60%; padding-bottom: 10px;">
      
    <div class="container-fluid" style="background-color: whitesmoke;">
        
    <h2>Comic Creators</h2>

        <?php
        
        
        if (isset($_POST['search'])){ ?>
            
            <div class="pagination">
            
            <?php
            $search = $_POST['search_word'];
            $_SESSION['searchWord'] = $search;
            
            $sql = "SELECT COUNT(creatorID) AS total FROM Creators WHERE (`name` LIKE '%".$search."%') OR (`desc` LIKE '%".$search."%')";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
            $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
            $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
            
            ?>

            <?php
            for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                if ($i==1){?>
                	<span><a <?php if ($page==$i){?>class="active"<?php }?>href="creators.php?page=<?php echo $i?>">
                    &nbsp;Page <?php echo $i?>&nbsp; </a></span> <?php
                    if ($page!=1 && $page-1!=1 && $page-2!=1 && $page-3!=1){ ?>
                        <span><a>...</a></span><?php
                    }
                } else if ($i==$page){ ?>
                    <span><a class="active" href="creators.php?page=<?php echo $i?>">
                    &nbsp;Page <?php echo $i?>&nbsp; </a></span> <?php 
                } else if ($i==$total_pages){ 
                    if ($page!=$total_pages && $page+1!=$total_pages && $page+2!=$total_pages && $page+3!=$total_pages){?>
                		<span><a>...</a></span><?php
                    } ?>
                    <span><a href="creators.php?page=<?php echo $i?>">
                    &nbsp;Page <?php echo $i?>&nbsp; </a></span> <?php 
                } else if ($i<$page-2 || $i>$page+2) {
                    //nothing
                } else { ?>
                	<span><a href="creators.php?page=<?php echo $i?>">
                	&nbsp;Page <?php echo $i?>&nbsp; </a></span> <?php
                }
            };
            ?>
            </div> 
            <div class="row" style="overflow-y: scroll; margin-bottom: 30px;">
        	<div>
            <?php
            
            
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
            $start_from = ($page-1) * $results_per_page; 
            
            
            $sql = "SELECT * FROM Creators WHERE (`name` LIKE '%".$search."%') OR (`desc` LIKE '%".$search."%')
                ORDER BY creatorID ASC LIMIT $start_from, ".$results_per_page;
            $rs_result = $rs_result = $mysqli->query($sql);
  
            
        } else { ?>
            
            
            <div class="pagination">
            
            <?php
            
            $sql = "SELECT COUNT(creatorID) AS total FROM Creators";
            $result = $mysqli->query($sql);
            $row = $result->fetch_assoc();
            $total_pages = ceil($row["total"] / $results_per_page); // calculate total pages with results
            $page = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
            
            ?>

            <?php
            for ($i=1; $i<=$total_pages; $i++) {  // print links for all pages
                if ($i==1){?>
                	<span><a <?php if ($page==$i){?>class="active"<?php }?>href="creators.php?page=<?php echo $i?>">
                    &nbsp;Page <?php echo $i?>&nbsp; </a></span> <?php
                    if ($page!=1 && $page-1!=1 && $page-2!=1 && $page-3!=1){ ?>
                        <span><a>...</a></span><?php
                    }
                } else if ($i==$page){ ?>
                    <span><a class="active" href="creators.php?page=<?php echo $i?>">
                    &nbsp;Page <?php echo $i?>&nbsp; </a></span> <?php 
                } else if ($i==$total_pages){ 
                    if ($page!=$total_pages && $page+1!=$total_pages && $page+2!=$total_pages && $page+3!=$total_pages){?>
                		<span><a>...</a></span><?php
                    } ?>
                    <span><a href="creators.php?page=<?php echo $i?>">
                    &nbsp;Page <?php echo $i?>&nbsp; </a></span> <?php 
                } else if ($i<$page-2 || $i>$page+2) {
                    //nothing
                } else { ?>
                	<span><a href="creators.php?page=<?php echo $i?>">
                	&nbsp;Page <?php echo $i?>&nbsp; </a></span> <?php
                }
            };
            ?>
            </div> 
            <div class="row" style="overflow-y: scroll; margin-bottom: 30px;">
        	<div>
            <?php
            
            if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };
            $start_from = ($page-1) * $results_per_page; 
            

            $sql = "SELECT * FROM Creators ORDER BY creatorID ASC LIMIT $start_from, ".$results_per_page;
            $rs_result = $rs_result = $mysqli->query($sql);
             
        }
        
        
        
        if ($rs_result->num_rows > 0){
            while ($row = mysqli_fetch_array($rs_result)){
                $s1 = $row['creatorID'];
                $s2 = $row['name'];
                $s3 = $row['desc'];
                $s4 = $row['briefDesc'];
                //$s5 = $row['imgSmall'];
                $s6 = $row['imgThumb'];
                
                require 'creatorMini_div.php';
            }
        } else {
            echo "No creators found for $search";
        }
        ?>
            
        </div>
      </div>  
    </div>
<?php 
    require 'footer.php';
    ?>  
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