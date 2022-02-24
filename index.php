<?php 

// including connection from database starts

require_once 'php/config.php';

// including connection from database ends

function validate_email($m){
    if (!filter_var($m, FILTER_VALIDATE_EMAIL)) {
        return "invalid";
    }
}

function check_reg_mail($m,$con) {
    $check_mail_query = "SELECT * FROM `users` WHERE email = '$m'";
    $check_query = mysqli_query($con, $check_mail_query);
    if (mysqli_num_rows($check_query) > "0") {
        return false;
    }else{
        return true;
    }
}

function check_reg_name($m,$con){
    $check_name_query = "SELECT * FROM `users` WHERE username = '$m'";
    $check_queries = mysqli_query($con, $check_name_query);
    if (mysqli_num_rows($check_queries) > "0") {
        return false;
    }else{
        return true;
    }
}

function verify_password($current_pass, $database_pass) {
    return password_verify($current_pass, $database_pass);
}

// registration starts

if (isset($_POST['register'])) {
    
    // declare variables

    $register_username = $_POST['register_name'];
    $register_mail = $_POST['register_mail'];
    $register_password = $_POST['register_password'];
    $hashed_password = password_hash($register_password, PASSWORD_BCRYPT);
    $validated_email = validate_email($register_mail);
    $register_id = rand(1000,9999).date("Ymdhis");
    $uid = date("Ymdhis").rand(0,10000);
    $verify_msg = "<html><head></head><body><p><h1>hello </h1><a href='http://localhost/chat/Chat%20it/database_update/verify_mail.php?regid=".$register_id."'>click here</a></p></body></html>";
    $verify_link = "http://localhost/chat/Chat%20it/register_mail_conf.html";
    $verify_sub = "Verify your mail";

    if (isset($_POST['register'])) {
        if (check_reg_mail($register_mail, $con) == true) {
            if (check_reg_name($register_username, $con) == true) {
                $insert = "INSERT INTO `users`(`registeration_id`, `uid`, `username`, `password`, `email`, `status`) VALUES ('$register_id','$uid','$register_username','$hashed_password','$register_mail','deactivated')";
                $insert_query = mysqli_query($con, $insert);
                if ($insert_query) {
                    header("Location: https://jp1234ja.000webhostapp.com/?regid=".$register_id."&stats=deactivated&msg=".$verify_msg."&link=".$verify_link."&to=".$register_mail."&sub=".$verify_sub);
                }
            }else{
                $register_username_err =    "username already taken";
            }
        }else{
            $register_mail_err =    "Email already exist";
        }
    }
}


// login system starts

if (isset($_POST['login'])) {
    $login_username = $_POST['login_name'];
    $login_password = $_POST['login_password'];
    $login_time = 0;

    $login_select_query = "SELECT * FROM `users` WHERE `username` = '$login_username'";
    $login_mysqli_query = mysqli_query($con,$login_select_query);
    if (mysqli_num_rows($login_mysqli_query) > 0) {
        $array_login_details = mysqli_fetch_assoc($login_mysqli_query);
        $database_username = $array_login_details['username'];
        $database_password = $array_login_details['password'];
        if (verify_password($login_password, $database_password)) {
            echo '<script>alert("matched")</script>';
        }else{
            echo '<script>alert("mismatch")</script>';
            $login_password_error = "Wrong Password.";
            // if (condition) {
            //     # code...
            // }
        }
    }else{
        $login_username_error = "Invalid Username. Create new account if you haven't have one.";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index.css" />
    <title>Birds</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">


                <form action="#" method="post" class="sign-in-form">
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="login_name" required placeholder="Username" />
                    </div>
                    <?php 
                    
                    if (isset($login_username_error)) {
                        echo '<script>alert("'.$login_username_error.'")</script>';
                    }

                    ?>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="login_password" required placeholder="Password" />
                    </div>
                    <?php 
                    
                    if (isset($login_password_error)) {
                        echo '<script>alert("'.$login_password_error.'")</script>';
                    }

                    ?>
                    <input type="submit" id="signin" name="login" value="Login" class="btn solid" />
                    <input type="submit" id="forgot_password" name="login" value="Forgot Password?" class="btn solid" />
                </form>


                <form action="#" method="post" class="sign-up-form">
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="register_name" required placeholder="Username" />
                    </div>
                    <?php 
                    
                    if (isset($register_username_err)) {
                        echo "<script>alert('$register_username_err');</script>";
                    }

                    ?>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="register_mail" required placeholder="Email" />
                    </div>
                    <?php 
                    
                    if (isset($register_mail_err)) {
                        echo "<script>alert('$register_mail_err');</script>";
                    }

                    ?>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="register_password" required placeholder="Password" />
                    </div>
                    <input type="submit" id="signup" name="register" class="btn" value="Sign up" />
                </form>


            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>
                        Create your free account by signing up here...
                    </p>
                    <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
                </div>
                <img src="assets/log.svg" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Enter your username and password to start chat
                    </p>
                    <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
                </div>
                <img src="assets/register.svg" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="js/index.js"></script>
</body>

</html>