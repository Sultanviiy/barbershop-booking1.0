<?php
 include 'session.php';
 require 'auth_check.php';
//session_start();
$mysqli = mysqli_connect('localhost', 'Abdullah', '123456', 'barber');

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}


if(isset($_POST['type']) && $_POST['type'] == 'add'){

    foreach($_POST as $key => $value){ //add all post vars to new_product array
		$new_product[$key] = filter_var($value, FILTER_SANITIZE_STRING);



    // //remove unecessary vars
    unset($new_product['type']);
    unset($new_product['return_url']); 

    $stmt = $mysqli->prepare("SELECT id,service_name from servicest WHERE id=? LIMIT 1;");
    $stmt->bind_param('s', $new_product['serviceid']);
    $stmt->execute();
    $stmt->bind_result($serviceid,$servicename);
    while($stmt->fetch()){

        $new_product['serviceid'] = $serviceid;

        $new_product['servicename'] = $servicename;

        if(isset($_SESSION["cart"])){  //if session var already exist
            if(isset($_SESSION["cart"][$new_product['serviceid']])) //check item exist in products array
            {
                unset($_SESSION["cart"][$new_product['serviceid']]); //unset old array item

            }           
        }
        $_SESSION["cart"][$new_product['serviceid']] = $new_product; //update or create product session with new item  
    
        
    
    } 

    }
}

    if(isset($_POST["remove_code"]))
    {
     
        //remove an item from product session
        if(isset($_POST["remove_code"]) && is_array($_POST["remove_code"])){
            foreach($_POST["remove_code"] as $key){
                unset($_SESSION["cart"][$key]);
                if(empty($_SESSION['cart']))
                unset($_SESSION['cart']);
            }	
        }
    }
    
    


    $return_url = (isset($_POST["return_url"]))?urldecode($_POST["return_url"]):''; //return url
    header('Location:'.$return_url);




?>