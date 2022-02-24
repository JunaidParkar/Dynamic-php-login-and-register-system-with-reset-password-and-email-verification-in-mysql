<?php

    if (isset($_GET['to']) && isset($_GET['sub']) && isset($_GET['link']) && isset($_GET['msg']) && isset($_GET['regid']) && isset($_GET['stats']) && isset($_GET['thing'])) {        
        $to = $_GET['to'];
        $sub = $_GET['sub'];
        $link = $_GET['link'];
        $msg = $_GET['msg'];
        $reg = $_GET['regid'];
        $stat = $_GET['stats'];
        $thing = $_GET['thing'];
        $page = array("verify_mail.php");
        if ($thing == "verify_mail") {
            $done = $page[0];
        }

        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers .= 'To: '.$to."\r\n";
        // $link= $link;
        $message="<html><head></head><body><p><h1>hello </h1><a href='http://localhost/chat/Chat%20it/database_update/".$done."?regid=".$reg."'>click here</a></p></body></html>";
        if(mail($to,$sub,$message,$headers))
        {
            // $myobj=array('status'=>'success','message'=>'Check your mail to reset password!!');
            // echo json_encode($myobj);
            header("Location: ".$link."");
        }
        else{
            // $myobj=array('status'=>'error','message'=>'Invalid e-mail!!');
            // echo json_encode($myobj);
        }
    }else{
        header("Location: http://localhost/chat/Chat%20it/");
    }

?>