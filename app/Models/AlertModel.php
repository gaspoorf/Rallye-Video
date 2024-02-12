<?php
/**
 * This file contains the Alert class which is used to generate different types of alerts.
 */
//____________ ALERT MODEL ____________
class AlertModel {
    private $message;
    private $type;

    /**
     * Constructor method for the Alert class.
     * @param string $message The message to be displayed in the alert.
     */
    public function __construct($type, $message) {
        $_SESSION['alert']['status'] = true;
        $_SESSION['alert']['type'] = $type;
        $_SESSION['alert']['message'] = $message;
    }
}

?>