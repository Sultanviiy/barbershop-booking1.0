<?php
    include_once 'header.php';
    // date_default_timezone_set('Asia/Riyadh');
    // include 'DB.php';
    // include 'includes/comment.inc.php';

    // if(isset($_GET['submit']))
    // {
    // $ww=$_GET['A'];
    // echo $ww;
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">
        
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="includes/contact/css/contact.css"/>
    <link rel="stylesheet" href="css1/comment.css"/>
    <title>Document</title>
</head>
<body>
    <h2 class="text-center"> Because the opinions of our customers are important, please participate in the following survey to determine the appropriate time for working hours</h2><br>
<div class="container">
<form action="" method="POST">
    <label>
        <input type="radio" name="radio" value="7AM-7PM">7AM-7PM
        <span class="select"></span>
    </label>
    <br>
    <label>
        <input type="radio" name="radio" value="8AM-8PM">8AM-8PM
        <span class="select"></span>
    </label>
    <br>
    <label>
        <input type="radio" name="radio" value="9AM-9PM">9AM-9PM
        <span class="select"></span>
    </label>
    <br>
    <label>
        <input type="radio" name="radio" value="11AM-11PM">11AM-11PM
        <span class="select"></span>
    </label>
    <br>
    <label>
        <input type="radio" name="radio" value="10AM-10PM">10AM-10PM
        <span class="select"></span>
    </label>
    <br>
    <label>
        <input type="radio" name="radio" value="12AM-12PM">12AM-12PM
        <span class="select"></span>
    </label>
    <br>
    <input type="submit" name="submit" vlaue="Get Values">
</form>
</div>

</form>
<?php
    if(isset($_POST['submit'])) {
    if(!empty($_POST['radio'])) {
        // $time = htmlspecialchars( $_POST['radio'] );
        echo 'your chosen time is ' .$_POST['radio'] ;
    } else {
        echo 'Please select the value.';
    }
    }
?>
</body>
</html>