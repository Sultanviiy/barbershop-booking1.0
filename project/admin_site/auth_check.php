<?php
	 if(isset($_SESSION['uid']))
  {
  }
  else
  {
    header("location:../barbershop/login.php");
  }

?>