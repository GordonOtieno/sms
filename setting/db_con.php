<?php
    function OpenCon()
     {
     $dbhost = "localhost";
     $dbuser = "root";
     $dbpass = "";
     $db = "smsv2";
     $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
     echo "teyuyqwuqwsui";
     return $conn;
     }
     
    function CloseCon($conn)
     {
     $conn -> close();
     }
       
    ?>


<!--<?php
//function validateName($name){

//if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
    $ErrMsg = "Name can only be a letter or whitespace";  
            //  echo $ErrMsg;  
//} else {  
 //   return $name;
//}  

//}

?> -->