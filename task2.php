<?php 
$character = 'z' ;
function nextCharacter(){
    global $character ;
    $new_character = ++$character  ; 
    echo substr($new_character , 0 ,1) ;
}
nextCharacter();
?>