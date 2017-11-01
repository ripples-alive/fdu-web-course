<?php
  $conn = mysql_connect("mysql","bbb","ccc");
  mysql_select_db("aaa", $conn);
  mysql_query("SET NAME 'gbk'");
?>
