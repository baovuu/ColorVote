<?php
	mysql_connect("dbs.eecs.utk.edu", "bvuu", "darkseeker244");
	mysql_select_db("COSC465FA2016_bvuu");

	$action = $_POST['action'];

	if ($action == 'login') {
		$user = $_POST['userid'];
		$result = mysql_query("	SELECT * 
								FROM Accounts
								WHERE userID = '$user'");
		if (mysql_num_rows($result) == TRUE) {
			$row = mysql_fetch_array($result);
			if ($row['password'] == $_POST['password']) {
				echo "Welcome " . "{$row['name']}";
			}
			else {
				echo "Invalid passowrd";
			}
		}
		else {
			echo "Invalid " . "{$_POST['userid']}";
		}
	}
	else if ($action =='add') {
		$user = $_POST['newuserid'];
		$result = mysql_query("	SELECT * 
								FROM Accounts
								WHERE userID = '$user'");
		$password = $_POST['newpassword'];
		$name = $_POST['name'];
		if (mysql_num_rows($result) == TRUE) {
			echo "$user " . "already exists--please select another user id";
		}
		else {
			mysql_query("INSERT INTO Accounts VALUES ('$user','$password', '$name')");
			echo "Account " . "$user" . " created--Welcome " . "$name";
		}
	}
	else if ($action == 'delete') {
		$user = $_POST['deluserid'];
		$result = mysql_query("	SELECT * 
								FROM Accounts
								WHERE userID = '$user'");
		if (mysql_num_rows($result) == TRUE) {
			$row = mysql_fetch_array($result);
			$name = $row['name'];
			mysql_query("DELETE FROM Accounts WHERE userID = '$user'");
			echo "$name" . " successfully deleted";
		}
		else {
			echo "$user" . " not found";
		}
	}
?>