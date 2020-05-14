<?php
if(isset($_COOKIE['user_name'])){
    echo('Deleted');
    setcookie('user_name', '');
    $url = "../../index.php";
    $delay = 1;
    header("Refresh: $delay;url=$url");
}
?>