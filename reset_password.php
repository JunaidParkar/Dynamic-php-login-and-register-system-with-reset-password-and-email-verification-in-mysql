<?php 

require "php/config.php";

if (isset($_POST['reset'])) {
    $mail = $_POST['mail'];
    $getRegId = "SELECT * FROM `users` WHERE `email` = '$mail'";
    $query = mysqli_query($con, $getRegId);
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $registrationId = $data['registeration_id'];
        $msg = "<html><head></head><body><p><h1>hello </h1><a href='http://localhost/chat/Chat%20it/database_update/reset_password.php?regid=".$registrationId."'>click here</a></p></body></html>";
        $link = "http://localhost/chat/Chat%20it/reset_password.php";
        $to = $mail;
        $sub = "Reset your password";
        header("Location: https://jp1234ja.000webhostapp.com/?regid=".$registrationId."&stats=deactivated&msg=".$msg."&link=".$link."&to=".$to."&sub=".$sub);
    }else{
        echo "<script>alert('Please insert registered mail...')</script>";
    }
}

?>




<!doctype html>
<html lang="en-US">

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <title>Birds</title>
    <meta name="description" content="Reset Password Email Template.">
    <style type="text/css">
        a:hover {
            text-decoration: underline !important;
        }
    </style>
</head>

<body marginheight="0" topmargin="0" marginwidth="0" style="margin: 0px; background-color: #f2f3f8;" leftmargin="0">
    <table cellspacing="0" border="0" cellpadding="0" width="100%" bgcolor="#f2f3f8" style="@import url(https://fonts.googleapis.com/css?family=Rubik:300,400,500,700|Open+Sans:300,400,600,700); font-family: 'Open Sans', sans-serif;">
        <tr>
            <td>
                <table style="background-color: #f2f3f8; max-width:670px;  margin:0 auto;" width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                        <td style="height:80px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td style="height:20px;">&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" style="max-width:670px;background:#fff; border-radius:3px; text-align:center;-webkit-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);-moz-box-shadow:0 6px 18px 0 rgba(0,0,0,.06);box-shadow:0 6px 18px 0 rgba(0,0,0,.06);">
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style="padding:0 35px;">
                                        <h1 style="color:#1e1e2d; font-weight:500; margin:0;font-size:32px;font-family:'Rubik',sans-serif;">You have requested to reset your password</h1>
                                        <span style="display:inline-block; vertical-align:middle; margin:29px 0 26px; border-bottom:1px solid #cecece; width:100px;"></span>
                                        <p style="color:#455056; font-size:15px;line-height:24px; margin:0;">
                                            We cannot simply send you your old password. A unique link will be sent to your gmail account by which you can reset your password. To reset your password, Check your gmail inbox.
                                        </p>
                                        <form action="#" style="width: 100%; display: flex; flex-direction: column; align-items: center;" method="POST">
                                            <input required type="email" name="mail" style="display: block; margin-top: 10px; width: 75%; padding: 10px; border-radius: 10px;
                                            outline: none; border: 0; background-color: #f0f0f0;" placeholder="Please enter your registered email...">
                                            <button name="reset" style="outline: none; border: 0; cursor: pointer; background:#20e277;text-decoration:none !important; font-weight:500; margin-top:35px; color:#fff;text-transform:uppercase; font-size:14px;padding:10px 24px;display:inline-block;border-radius:50px;">Reset</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="height:40px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>