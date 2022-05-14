<?php
 // Create Connection
 $conn = mysqli_connect('localhost', 'Abdullah', '123456', 'barber');
 // Check Connection
 if(mysqli_connect_errno()){
 // Connection Failed
 echo 'Failed to connect to MySQL '. mysqli_connect_errno();
 }
?>