<?php
require_once('validations.php');
$rules = [
    "name" => [
        "required" => "Name Required!",
        "greater" => "Name must be greater than 3 chars!",
        "smaller" => "Name must be smaller than 255 chars!"
    ],

    "quantity" => [
        "required" => "Quantity Required!",
        "greater" => "Quantity must be greater than 0!",
        "smaller" => "Quantity must be smaller than 1000!"
    ],

    "price" => [
        "required" => "Price Required!",
        "greater" => "Price must be greater than 0!",
        "smaller" => "Price must be smaller than 1000000!"
    ],

    "compare" => [
        "required" => "Compare at Price Required!",
        "greater" => "Compare at Price must be greater than 0!",
        "smaller" => "Compare at Price must be smaller than 1000000!"
    ],

    "isSale" => [
        "required" => "Is Sale Required!",
    ],

    "file" => [
        "required" => "Image Required!",
        "invalid_file" => "Image must be jpg, jpeg, webp, png!",
        "size" => "Image must be smaller than 1MB!"
    ]
];

if (requiredInput($name)) {
    $errors['name'] = $rules['name']['required'];
} elseif (minInput($name, 3)) {
    $errors['name'] =  $rules['name']['greater'];
} elseif (maxInput($name, 255)) {
    $errors['name'] = $rules['name']['smaller'];
}

if (requiredInput($quantity)) {
    $errors['quantity'] = $rules['quantity']['required'];
} elseif (minInput($quantity, 1)) {
    $errors['quantity'] =  $rules['quantity']['greater'];
} elseif (maxInput($quantity, 1000)) {
    $errors['quantity'] = $rules['quantity']['smaller'];
}

if (requiredInput($price)) {
    $errors['price'] = $rules['price']['required'];
} elseif (minInput($price, 1)) {
    $errors['price'] =  $rules['price']['greater'];
} elseif (maxInput($price, 100000)) {
    $errors['price'] = $rules['price']['smaller'];
}

if (requiredInput($compare)) {
    $errors['compare'] = $rules['compare']['required'];
} elseif (minInput($compare, 1)) {
    $errors['compare'] =  $rules['compare']['greater'];
} elseif (maxInput($compare, 100000)) {
    $errors['compare'] = $rules['compare']['smaller'];
}

if (requiredInput($isSale)) {
    $errors['isSale'] = $rules['isSale']['required'];
}

// Extract file information
$fileName = str_replace(' ', '', $_FILES['file']['name']);
$fileTmpName = $_FILES['file']['tmp_name'];
$fileSize = $_FILES['file']['size'];
$imgError = $_FILES['file']['error'];
$fileType = $_FILES['file']['type'];

// Get file extension
$fileExt = explode('.', $fileName);
$fileActualExt = strtolower(end($fileExt));

// Allowed extensions
$allowed = array('jpg', 'jpeg', 'png', 'webp');

// Check if file is empty
if ($fileName === "") {
    $errors['file'] = $rules['file']['required'];
}

// Check if file is valid
if ($imgError === 0) {
    /// Check if file is allowed
    if (!in_array($fileActualExt, $allowed)) {
        $errors['file'] = $rules['file']['invalid_file'];
    }
    // Check if file is too large
    if ($fileSize > 1000000) {
        $errors['file'] = $rules['file']['large'];
    }
}
