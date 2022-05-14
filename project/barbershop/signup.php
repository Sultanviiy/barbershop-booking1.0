<?php
    include 'header.php';
?>
        
        <!-- style="border:1px solid #ccc" -->

<section class="signup-form">
    <h2 class="text-center">Sign up</h2> 
    <form class="contact-form" action="includes/signup.inc.php" method="post" >
            <!-- <label  for="email"><b>Name</b></label><br> -->
        <input 
            class="FullName form-control"
            type="text" 
            name="name" 
            placeholder="Full name" />
<div class="alert alert-danger custom-alert">
            Name Can not be  <strong>Empty</strong>
</div>
    <!-- <label  for="email"><b>Email</b></label><br> -->
        <input 
            class="email form-control" 
            type="text" 
            name="email" 
            placeholder="Email Address"/>
<div class="alert alert-danger emailCustom-alert">
            Email Can not be  <strong>Empty</strong>
</div>
    <!-- <label class="form-control" for="psw"><b>Username</b></label><br> -->
        <input 
            class="username form-control" 
            type="text" 
            name="uid" 
            placeholder="Username">
<div class="alert alert-danger usernameCustom-alert">
            username Can not be  <strong>Empty</strong>
</div>
    <!-- <label for=phone number</b></label><br> -->
        <input 
            class="form-control" 
            type="text" 
            name="phone" 
            placeholder="phone number" required>
            <div class="alert alert-danger custom-alert">
            phone number Can not be  <strong>Empty</strong>
</div>
    <!-- <label for="psw"><b>Password</b></label><br> -->
        <input 
            class="form-control" 
            type="password" 
            name="pwd" 
            placeholder="Password" required>
            <div class="alert alert-danger custom-alert">
            password Can not be  <strong>Empty</strong>
</div>
    <!-- <label for="psw-repeat"><b>Repeat Password</b></label><br> -->
        <input 
            class="form-control" 
            type="password" 
            name="pwdrepeat" 
            placeholder="Repeat Password" required>
            <div class="alert alert-danger custom-alert">
            Repeat Password Can not be  <strong>Empty</strong>
            </div>
            <button type="submit" name="submit">Sign Up</button>
        </form>

<?php
    if(isset($_GET["error"])){
        if($_GET["error"] == "emptyinput"){
            echo "<p>Fill in all fields</p>";
        }
        else if ($_GET["error"] == "invalidname"){
            echo "<p><b>Enter proper name</b> </p>";
        }
        else if ($_GET["error"] == "invaliduid"){
            echo "<p>Choose a proper username</p>";
        }

        else if ($_GET["error"] == "invalidemail"){
            echo "<p>Choose a proper email</p>";
        }
        else if ($_GET["error"] == "invalidphone"){
            echo "<p>phone number should be 10 digit and beging with 05</p>";
        }
        else if ($_GET["error"] == "passwordsdonotmatch"){
            echo "<p>Password does not match</p>";
        }
        else if ($_GET["error"] == "stmtfailed"){
            echo "<p>Something went wrong, Try again</p>";
        }
        else if ($_GET["error"] == "usernametaken"){
            echo "<p>Username taken </p>";
        }
        else if ($_GET["error"] == "none"){
            echo "<p>You have signed up</p>";
        }

    }
?>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
    <script src="includes/contact/js/bootstrap.min.js"></script>
    <script src="includes/contact/js/custom.js"></script>

    </section>





    
<?php
    include_once 'footer.php';

?>