<?php
    require('DB.php');
    include_once 'header.php';
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $username=$_POST['uid'];
        $pass=$_POST['pwd'];

    $query="SELECT * FROM accounts";

    $data=mysqli_query($conn, $query);  

    $result=mysqli_fetch_all($data, MYSQLI_ASSOC);
        $user_ckeck=false;
        foreach ($result as $re):
        if ($re["Username"]==$username and $re["password"]== $pass) 
        {
            $userID=$re["userID"];
            $user_ckeck = true;
        }      
                
        endforeach;

        if ($username=="ASB" and $pass=="123456!@#")
        {
                $_SESSION['uid']=$username;
                $_SESSION['pass']=$pass;
                ?>
                <meta http-equiv="Refresh" content="0 ; URL = ../admin_site/admin_page.php">
                <?php
        }
        elseif ($user_ckeck)
        {
                $_SESSION['uid']=$username;
                $_SESSION['pass']=$pass;
                $_SESSION['id']=$userID;
                header("location:../user_site/?userID=$userID");
        }
        else
        {
            echo '<div class="alert alert-danger"> Uusername or password is incorrect!! </div>';
        }
    }

?>

<section class="signup-form">
        <h2 class="text-center">Login</h2>
    <div class=signup-form-form>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" method="POST" >
            <div class="form-group">

            <label  for="psw"><b>Username OR Email</b></label><br>
            <input class="form-control" id="uid" type="text" name="uid" placeholder="Username OR Email" value="<?php if($_SERVER['REQUEST_METHOD']=='POST') echo $_POST['uid'];?>">
            <br>
            <label  for="psw"><b>Password</b></label><br>
            <input class="form-control" type="password" name="pwd" placeholder="Password" required >
            <br>
            <button class="btn btn-success" type="submit" name="submit">Login</button>

            </div>

        </form>       
    </div>

<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields</p>";
        }
        else if ($_GET["error"] == "wronglogin"){
            echo "<p>Incorrect Login information</p>";
        }
    }
?>

</section>



<?php
    include_once 'footer.php';

?>