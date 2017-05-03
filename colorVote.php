<html>
<body>
<form method="POST" action="colorVote.php">
<fieldset>
	<legend>Color Vote</legend>
<?php
   
    mysql_connect("dbs.eecs.utk.edu", "bvuu", "darkseeker244") or die(mysql_error());
    mysql_select_db("COSC465FA2016_bvuu") or die(mysql_error());

    $selectedColor = $_POST['vote'];
    if (selectedColor != NULL) {
		mysql_query("	UPDATE color 
						SET votes = votes + 1 
						WHERE color = '$selectedColor'");
    }

    $result = mysql_query("SELECT * FROM color");
    while($row = mysql_fetch_array($result)) {
        $color = $row['color'];
		$votes = $row['votes'];

		if ($color == $selectedColor) {
 			echo "$color " . "<input type='radio' name='vote' value='$color' checked='checked'/>" . " $votes" . "<br />";
        }
 		else {
 			echo "$color " . "<input type='radio' name='vote' value='$color' />" . " $votes" . "<br />";
		}
    }
?>
<input type="submit"/>
</fieldset>
</form>
</body>
</html>