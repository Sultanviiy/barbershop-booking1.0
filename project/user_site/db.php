<?php

$mysqli = mysqli_connect('localhost', 'Abdullah', '123456', 'barber');

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
} else {


  if (isset($_GET['date'])) {
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from bookings where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if ($stmt->execute()) {
      $result = $stmt->get_result();
      if($result->num_rows>0){
        while($row = $result->fetch_assoc()){
          $bookings[] = $row['timeslots'];
        }
        $stmt->close();
      }
      
    }
  }

  

  $duration = 30;
  $cleanup = 0;
  $start = "07:00";
  $end = "23:00";


  function timeslots($duration, $cleanup, $start, $end)
  {
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT" . $duration . "M");
    $cleanupInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();

    for ($i = $start; $i < $end; $i->add($interval)->add($cleanupInterval)) {
      $endPeriod = clone $i;
      $endPeriod->add($interval);
      if ($endPeriod > $end) {
        break;
      }
      $slots[] = $i->format("H:iA") . " - " . $endPeriod->format("H:iA");
    }
    return $slots;
  }
}














?>