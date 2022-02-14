<?php

session_start();
if(count($_SESSION) > 0){
print_r( $_SESSION['userData']);
}else {
    echo 'no data';
}


?>