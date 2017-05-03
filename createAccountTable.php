<?php
  mysql_connect("dbs.eecs.utk.edu", "bvuu", "darkseeker244");
  mysql_select_db("COSC465FA2016_bvuu");
  mysql_query("DROP TABLE IF EXISTS Accounts");
  $query = "CREATE TABLE Accounts (
			 						userID VARCHAR(10),
			 						password VARCHAR(10),
			 						name VARCHAR(30)
								)";
  $result = mysql_query($query);
?>