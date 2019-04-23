<?php
/* My database connection settings */
$host = 'avl.cs.unca.edu';
$user = 'cchilder';
$pass = 'sql4you';
$db = 'cchilderDB2';

$results_per_page = 120;

$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
