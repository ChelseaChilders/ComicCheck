<!DOCTYPE html>
<html>
<head>
<title>Comic Check</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">

</head>
<body>

        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        //include ("dbinfo.inc.php");
//         $con = mysqli_connect("avl.cs.unca.edu", "ncoggins", "sql4you", "ncogginsDB") or die("Unable to select database");
        $con = mysqli_connect("avl.cs.unca.edu", "cchilder", "sql4you", "cchilderDB") or die("Unable to select database");

        $query = "SELECT * FROM new_table;";

        $result = mysqli_query($con, $query);

        $num = mysqli_num_rows($result);
        echo 'the number of rows in new_table is: ';
        echo $num;
        mysqli_close($con);

        echo "<b><center>Database Output:</center></b><br><hr>";

        
        ?>
        <table border="0" cellspacing="2" cellpadding="2">
		<tr>
			<th>C1</th>
			<th>C2</th>

		</tr>

            <?php
            while ($row = mysqli_fetch_array($result)) {

                $c1 = $row['c1'];
                $c2 = $row['c2'];

                ?>
           <tr>
			<td><?php echo "$c1"; ?></td>
			<td><?php echo "$c2"; ?></td>
		</tr>
    <?php
            }
            echo "</table>";
            ?>		
		</table>


</body>
</html>