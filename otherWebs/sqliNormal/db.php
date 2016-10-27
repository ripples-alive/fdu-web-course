<?php
  $conn = mysql_connect("localhost","bbb","ccc");
  mysql_select_db("aaa", $conn);
  mysql_query("SET NAME", "gbk");
?>
