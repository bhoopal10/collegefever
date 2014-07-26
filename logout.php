<?php
   session_start();
   require ("admin/sql.php");
   session_destroy(); 
   echo "<script>location.replace('index.php')</script>";  
   ?>