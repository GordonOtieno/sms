<?php
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    function validateName($name){
        if (!preg_match ("/^[a-zA-z]*$/", $name) ) {  
            $ErrMsg = "Name can only be a letter or whitespace";      
        } else {  
           return $name;
        }         
        }
    function isValidEmail($email){ 
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }

?>