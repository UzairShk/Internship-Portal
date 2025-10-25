<?php
   class DBConnection
   {
        public function getConnection()
        {
            return mysqli_connect("localhost", "root", "", "IP");
        }
   }
?>

