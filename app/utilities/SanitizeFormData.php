<?php 
//____________ SANITIZE FORM DATA ____________
function sanitizeFormData($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    
    return $data;
}

?>