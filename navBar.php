<?php
require 'db.php';
session_start();
$_SESSION['message'] = '';


?>
<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Comic Check</title>
  
  
  <link rel='stylesheet' href='bootstrap.css'>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.0.13/css/all.css'>
      <link rel="stylesheet" href="style2.css">

</head>

<body style="background-color: #283b9c;">
<div class="alert alert-error"><?= $_SESSION['message'] ?></div>

  <div class="page-wrapper mymain toggled">
  <a id="show-sidebar" class="btn btn-lg btn-dark" href="#" style="width:80px">
    <i class="fas fa-bars"></i>
  </a>
   
  <nav id="sidebar" class="sidebar-wrapper">
    <div class="sidebar-content">
      <div class="sidebar-brand">
        <a href="home.php" style="font-size: 20px;">COMIC CHECK</a>
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
        
                           <div class="sidebar-search">
        <div>
          <div class="input-group">
          
          <form class="searchForm" method="post" enctype="multipart/form-data" autocomplete="off">
            	<input type="text" class="form-control search-menu" placeholder="Search..." name="search_word" required>
        		<input style="background: #3a3f48; color:#6c7b88; border: none; border-radius:5px; margin-top:5px; width:80%; margin-left:10%;"
        				id="searchBtn" type="submit" value="Submit" name="search"/>
    		</form>
            
          </div>
            <!--<a href="search2.php" style="font-size: 12px; color: #818896; margin-left: 10px;">Advanced Search</a>
            -->
        </div>
      </div>
        <!-- sidebar-search  -->
        
      <div class="sidebar-menu">
                <ul>
          <li>
            <a href="issues.php">
              <span>Comic Issues</span>
            </a>
          </li>
          <li>
            <a href="volumes.php">
              <span>Comic Volumes</span>
            </a>
          </li>
          
          <li>
            <a href="characters.php">
              <span>Characters</span>
            </a>
          </li>
          
          <!-- <li class="sidebar-dropdown">
            <a>
              <span>Characters</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
              	<li style="font-size: 10px;">
                  <a href="characters2.php">All Characters</a>
                </li>
                <li style="font-size: 10px;">
                  <a href="#">Heroes</a>
                </li>
                <li style="font-size: 10px;">
                  <a href="#">Villians</a>
                </li>
                <li style="font-size: 10px;">
                  <a href="#">Teams</a>
                </li>
                <li style="font-size: 10px;">
                  <a href="#">Supporting</a>
                </li>
              </ul>
            </div>
          </li>
          <li>
            <a href="storyArcs2.php">
              <span>Story Arcs</span>
            </a>
          </li>-->
          <li>
            <a href="creators.php">
              <span>Creators</span>
            </a>
          </li>
            <?php
            if(isset($_SESSION['username'])){?>
            
            <div class="sidebar-header">
        <div class="user-info">
          <span class="user-name">
            <strong style="font-size: 20px;"><?= $_SESSION['username'] ?></strong>
          </span>
          <!--  <span class="user-status">
            <span><strong>You have: </strong></span><br>
            <span><?= $_SESSION['readIssuesNum'] ?> read issues</span><br>
            <span><?= $_SESSION['readVolumesNum'] ?> read volumes</span><br>
            <span><?= $_SESSION['likedIssuesNum'] ?> liked issues</span><br>
            <span><?= $_SESSION['likedVolumesNum'] ?> liked volumes</span><br>
            <span><?= $_SESSION['likedCharactersNum'] ?> liked characters</span><br>
            <span><?= $_SESSION['likedCreatorsNum'] ?> liked creators</span>
          </span>-->
        </div>
      </div>
      <!-- sidebar-header  -->
            
          <a style="color: #818896" href="profile.php"><li class="header-menu">
            <span style="font-size: 20px;">Your Stuff</span>
          </li></a>
          <li>
            <a href="readList.php">
              <span>Read List</span>
            </a>
          </li>
          <li>
            <a href="likedList.php">
              <span>Liked List</span>
            </a>
          </li>
          <li>
            <a href="WantToReadList.php">
              <span>Want to Read List</span>
            </a>            
          </li>
          <li>
            <a href="recommendList.php">
              <span>Recommend List</span>
            </a> <?php } else {
            }?>           
          </li>
          
            <li style="margin-top:25px;">
            <a href="#">
            
            <?php
            if(isset($_SESSION['username'])){?>
              <a href="logout.php"><span>Logout</span></a>
            <?php } else {?>
                <a href="index.php"><span>Login or Register</span></a>
               <?php } ?>
            </a>
          </li>
        </ul>
      </div>
      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->
  </nav>
  <!-- sidebar-wrapper  -->