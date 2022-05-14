<?php
function setComments($conn){
if (isset($_POST['commentSubmit'])){
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        //$message = htmlspecialchars( $message );
    $sql="INSERT INTO comments (uid,date,message) VALUES ('$uid','$date','$message')";
    $result =$conn->query($sql);
    
}
}

function getComments($conn){
    
    $sql = "SELECT * FROM comments";
    $result =$conn->query($sql);
    while($row = $result->fetch_assoc()){
        echo"<div class='comment-box'>";
        echo $row['uid']."<br>";
        echo $row['date']."<br>";
        echo nl2br($row['message']."<br><br>");
        echo"</div>";
    }

}