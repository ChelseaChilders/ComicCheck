<?php
/* My database connection settings */
$host = 'avl.cs.unca.edu';
$user = 'cchilder';
$pass = 'sql4you';
$db = 'cchilderDB';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
