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

    require_once('../validations/product.php');

    if (empty($errors)) {

        $file = uniqid('', true) . "." . $fileActualExt;
        $fileDestination = "../uploads/" . $file;
        move_uploaded_file($fileTmpName, $fileDestination);
        $checkSale = $isSale === "1" ? true : false;

        $product = [
            "id" => (int)uniqid(),
            "name" => $name,
            "quantity" => (int)$quantity,
            "price" => (float)$price,
            "compare" => (float)$compare,
            "isSale" => $checkSale,
            "image" => $file,
            "date" => date("d-m-Y")
        ];

        insert("../database/products.json", $product);
        sessionStore("success", "Product added successfully");
    } else {
        sessionStore("errors", $errors);
    }
    redirect("../add-product");
} else {
    echo "Method not allowed";
}
