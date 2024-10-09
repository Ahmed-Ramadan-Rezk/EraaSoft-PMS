<?php
require_once('validations.php');
$rules = [
    "name" => [
        "required" => "Name Required!",
        "greater" => "Name must be greater than 3 chars!",
        "smaller" => "Name must be smaller than 20 chars!"
    ],

    "email" => [
        "required" => "Email Required!",
        "invalid_email" => "Please type a valid Email!"
    ],

    "message" => [
        "required" => "Message Required!",
        "smaller" => "Message must be less than 255 characters!",
        "greater" => "Message must be more than 20 characters"
    ]
];


// Validations
if (requiredInput($name)) {
    $errors['name'] = $rules['name']['required'];
} elseif (minInput($name, 3)) {
    $errors['name'] =  $rules['name']['greater'];
} elseif (maxInput($name, 20)) {
    $errors['name'] = $rules['name']['smaller'];
}

if (requiredInput($email)) {
    $errors['email'] = $rules['email']['required'];
} elseif (emailInput($email)) {
    $errors['email'] = $rules['email']['invalid_email'];
}

if (requiredInput($message)) {
    $errors['message'] = $rules['message']['required'];
} elseif (minInput($message, 10)) {
    $errors['message'] =  $rules['message']['greater'];
} elseif (maxInput($message, 255)) {
    $errors['message'] = $rules['message']['smaller'];
}
