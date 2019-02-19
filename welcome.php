<?php session_start(); ?>
<link rel="stylesheet" href="form.css">
<div class="body content">
    <div class="welcome">
        <div class="alert alert-success"><?= $_SESSION['message'] ?></div>
        <img src="<?= $_SESSION['avatar'] ?>"><br />
        Welcome <span class="user"><?= $_SESSION['username'] ?></span>
        <?php
        $mysqli = new mysqli("avl.cs.unca.edu", "cchilder", "sql4you", "cchilderDB");
        //Select queries return a resultset
        $sql = "SELECT username, avatar FROM users";
        $result = $mysqli->query($sql); //$result = mysqli_result object
        //var_dump($result);
        ?>
    </div>
</div>
