<?php
session_start();

require_once('../core/request.php');
require_once('../core/sessions.php');
require_once('../core/functions.php');

$errors = [];
if (postMethod()) {

    foreach ($_POST as $key => $value) {
        $$key = receiveInput($value);
    }

    require_once('../validations/contact.php');

    if (empty($errors)) {

        $contactInfo = [
            "name" => $name,
            "email" => $email,
            "message" => $message,
            "date" => date("Y-m-d")
        ];

        put("../database/contact.json", [$contactInfo]);

        sessionStore("success", "Your message has been sent successfully");
    } else {
        sessionStore("errors", $errors);
    }
    redirect("../contact");
} else {
    echo "Method not allowed";
}
