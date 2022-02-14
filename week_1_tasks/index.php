<?php

 $units = 40 ;
 
 if( $units <= 50){
     echo 'electricity bill is ' ,$units*3.50;
 }else if ($units > 50 && $units <= 150 ){
     echo 'electricity bill is ' ,$units*4.00;
 }else{
     echo'electricity bill is ' , $units*6.50;
 }


?>