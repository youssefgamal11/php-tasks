<?php

function clean($input , $ispassword = 0){
    $input = trim($input);
    if($ispassword == 0){
    $input = htmlspecialchars($input);}
    return $input ;
}

?>