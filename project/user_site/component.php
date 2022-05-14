<?php

function component($servicename, $servicedes, $serviceprice, $serviceimg,$serviceid){
  $current_url = urlencode($url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
  $element = "<div class='col-md-2 col-sm-6 my-2 my-md-0'>";
  $element .= "<form action='Cart_update.php' method='post'>";
  $element .= " <div class='card shadow'> <div>";
  $element .= "<img src=$serviceimg alt='Image' class='img-fluid card-img-top'> </div>";
  $element .= " <div class='card-body'> <h5 class='card-title'>$servicename</h5> <h6> <i class='fas fa-star'></i>
  <i class='fas fa-star'></i>
  <i class='fas fa-star'></i>
  <i class='fas fa-star'></i>
  <i class='far fa-star'></i>
  </h6>  <h6 class='card-text'> 
  $servicedes
  
  </h6>

  <h5>
  <span class='price'>Start from <strong>$serviceprice SR </strong></span>
  ";
  $element .= "</h5>
  
  
  
    
  <input type='hidden' name='serviceid' value='$serviceid'>
  <input type='hidden' name='type' value='add' />
  <input type='hidden' name='return_url' value='$current_url' />
  <button class='add_to_cart'>Choose</button>
  </div>
  </div> </form> </div>";
  
echo $element;
}

//<button type='submit' class='btn btn-warning my-3' name='Choose' id='choose' >Choose</button> 
// <input type='submit' class='btn btn-warning my-3' name='Choose' id='choose' value='Choose'>




?>
