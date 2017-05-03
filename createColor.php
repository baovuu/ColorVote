<?php
    mysql_connect("dbs.eecs.utk.edu", "bvuu", "darkseeker244") or die(mysql_error());
    mysql_select_db("COSC465FA2016_bvuu") or die(mysql_error());
    mysql_query("DROP TABLE IF EXISTS color");

    $query = "CREATE TABLE color (
                  color VARCHAR(15),
                  votes INT)";
                  
    $result = mysql_query($query);

    foreach (array('red', 'orange', 'yellow', 'green', 'blue', 'violet', 'black', 'white') as $color) {
        mysql_query("INSERT INTO color VALUES ('$color', 0)");
    }
?>
