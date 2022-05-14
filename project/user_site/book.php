<?php
 require 'auth_check.php';

$current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);

include("db.php");
include_once("component.php");
include("cart_update.php");

if (isset($_POST['confirm'])) {

  $uID = $_POST['userid'];
  $timeslot = $_POST['timeslot'];
  foreach($_SESSION['cart'] as $items)
  $services .= $items['servicename']."/";
 
  $stmt = $mysqli->prepare("select * from bookings where date = ? AND timeslots=?");
  $stmt->bind_param('ss', $date, $timeslot);
  if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
      $msg = "<div class='alert alert-danger'>Already Booked</div>";
    } else {
    
      $stmt = $mysqli->prepare("INSERT INTO bookings (date, services, timeslots, userID) VALUES (?,?,?,?)");
      $stmt->bind_param('ssss', $date, $services, $timeslot, $uID);
      $stmt->execute();
      $msg = "<div class='alert alert-success'>Booking Successfull</div>";
      $bookings[] = $timeslot;
      $stmt->close();
      $mysqli->close();
    }
  }
  header("location:http://localhost/project/user_site/");
      exit();
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Bootstrap CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style2.css">

  <title></title>

  <style>
    .row {
      margin-top: 20px;
    }

    .button {
      background-color: #4CAF50;
      /* Green */
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
    }
  </style>
</head>

<body>

  <div class="container">
    <h1 class="text-center">Book for Date: <?php echo date('F d, Y', strtotime($date)); ?></h1>

    <div class="row">
      <div class="col-md-12">
        <?php echo (isset($msg)) ? $msg : ""; ?>
      </div>
      <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
      foreach ($timeslots as $ts) {

      ?>
        <div class="col-md-2">
          <div class="form-group">

            <?php if (in_array($ts, $bookings)) { ?>
              <button class="btn btn-danger"><?php echo $ts; ?></button>
            <?php
            } else {
            ?>
              <button type="button" class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"> <?php echo $ts; ?></button>
            <?php }
            ?>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
  <!-- Retrieve data from DB -->
  <?php
  $dd=$_SESSION['id']; 
  $sql = "SELECT * FROM `accounts` WHERE userID=$dd";
  $data = mysqli_query($mysqli, $sql);
  //fetch data
 $result = mysqli_fetch_assoc($data);
      $userID = $result["userID"];
      $n = $result["Name"];
      $e = $result["Email"];
      $p = $result["phone"];



  ?>


  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Booking: <span id="slot"></span></h4>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col-md-10">
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <label>Name: </label>
              <input required name='name' type='text' value='<?php echo $n; ?>' class='form-control' disabled>
            </div>

            <div class='form-group'>
              <label>Email: </label>
              <input required name='email' type='text' value="<?php echo $e; ?>" class='form-control' disabled>
            </div>

            <div class='form-group'>
              <label>Phone: </label>
              <input required name='phone' type='text' value="<?php echo $p; ?>" class='form-control' disabled>
            </div>

            <div class='form-group'>
              <label for=''>Timeslot</label>
              <input required type='text' readonly name='timeslot' id='timeslot' class='form-control'>

            </div>
            <input type='hidden' name='userid' value="<?php echo $userID; ?>"/>
            <!-- Services cards  -->
            <div class="container">
              <div class="row">

                <?php

                $sql = "SELECT * FROM servicest";
                $r = $mysqli->query($sql);

                if (mysqli_num_rows($r) > 0) {
                  while ($row = mysqli_fetch_assoc($r)) {
                    component($row['service_name'], $row['service_des'], $row['service_price'], $row['service_img'], $row['id']);
                  }
                }



                ?>


                

              </div>
              <div id="displayServices">
          <h4 class="text-center">Services Selected</h4>
          <?php
          $sCollecter=" ";
          if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            echo '<div class="cart-view-table-from-front" id="view-cart">';
            echo '<h4>Your Services:</h4>';
            echo '<form method="post" action="cart_update.php">';
            echo '<table width="100%"  cellpadding="6" cellspacing="0">';
            echo '<tbody>';
            foreach ($_SESSION['cart'] as $cart_item) {
              $serviceid = $cart_item['serviceid'];
              $servicename = $cart_item['servicename'];
              $sCollecter .= " ".$servicename;
              echo '<tr>';
              echo '<td>' . $serviceid . '</td>';
              echo '<td>' . $servicename . '</td>';
              echo '<td><input type="checkbox" name="remove_code[]" value="' . $serviceid . '" /> Remove</td>';
              echo '</tr>';
            }
            echo '<td colspan="4">';
            echo '<button type="submit">Update</button>';
            echo '</td>';
            echo '</tbody>';
            echo '</table>';
            $current_url = urlencode($url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            echo '<input type="hidden" name="return_url" value="' . $current_url . '" />';
            echo '<input type="hidden" name="serv" value="<?php echo $sCollector;?>" />';
            echo '</form>';
            echo '</div>';
          }
          

  
          ?>


        </div>

              <button type="submit" name="confirm">Confirm</button>
              <button><a href="index.php"> cancel</a></button>
              
          </form>

        </div>

      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  <script>
    $(".book").click(function() {
      var timeslot = $(this).attr('data-timeslot');
      $("#slot").html(timeslot);
      $("#timeslot").val(timeslot);
      $("#myModal").modal("show");


    })
  </script>

</body>

</html>