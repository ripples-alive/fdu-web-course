<?php
  error_reporting(E_ERROR | E_PARSE);
  $conn = mysql_connect("db","bbb","ccc");
  mysql_select_db("aaa", $conn);
//  mysql_query("SET NAME", "gbk");
?>
