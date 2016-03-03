<?php
  $localhost="localhost";
  $username="root";
  $password="admin";
  $database=mysql_connect($localhost,$username,$password);
  mysql_select_db("contactform",$database) or die(mysql_error());
 ?>
