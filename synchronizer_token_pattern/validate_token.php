<?php

session_start();

$csrfTokenArray = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_COOKIE["PHPSESSID"]) && isset($_POST['csrf_token'])) {

    $csrfTokenArray = $_SESSION['csrfTokenArray'];

    if($_POST['csrf_token'] == $csrfTokenArray[$_COOKIE["PHPSESSID"]]){
        echo    "<script type='text/javascript'>
                    alert(\"You have completed the process successfully!\");
                </script>";
    }
    else{
        echo    "<script type='text/javascript'>
                    alert(\"Error! Operation failed\");
                </script>";
    }
}
else{
    if(!(isset($_POST['csrf_token']))){
        echo "Error! token not set";
    }
}

?>
