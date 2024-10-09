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

    "address" => [
        "required" => "Address Required!",
        "smaller" => "Address must be less than 255 characters!",
        "greater" => "Address must be more than 20 characters"
    ],

    "phone" => [
        "required" => "Phone Required!",
        "more" => "Phone cannot be more than 11 numbers!",
        "less" => "Phone cannot be less than 11 numbers!",
        "invalid_phone" => "Please type a valid Phone Number!"
    ],

    "note" => [
        "required" => "Note Required!",
        "smaller" => "Note must be less than 255 characters!",
        "greater" => "Note must be more than 20 characters"
    ]
];

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

if (requiredInput($address)) {
    $errors['address'] = $rules['address']['required'];
} elseif (minInput($address, 20)) {
    $errors['address'] =  $rules['address']['greater'];
} elseif (maxInput($address, 255)) {
    $errors['address'] = $rules['address']['smaller'];
}

if (requiredInput($phone)) {
    $errors['phone'] = $rules['phone']['required'];
} elseif (minInput($phone, 11)) {
    $errors['phone'] = $rules['phone']['less'];
} elseif (maxInput($phone, 11)) {
    $errors['phone'] = $rules['phone']['more'];
} elseif (phoneInput($phone)) {
    $errors['phone'] = $rules['phone']['invalid_phone'];
}

if (requiredInput($note)) {
    $errors['note'] = $rules['note']['required'];
} elseif (minInput($note, 20)) {
    $errors['note'] =  $rules['note']['greater'];
} elseif (maxInput($note, 255)) {
    $errors['note'] = $rules['note']['smaller'];
}
