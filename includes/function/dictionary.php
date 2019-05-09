<?php 

// words not allowed!
$dictionary = array(
    "admin", "password", "user",  
    "asshole", "bitch", "fuck", "idiot", "porn", "sex", "shit", "stupid", 
);

// this checks if input new password contains an offensive word or in dictionary
function checkInDictionary($password) {
    global $dictionary;
    return preg_match('/'.implode('|',$dictionary).'/i', $password);
}
?>
