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

    if (is_numeric($product) && is_numeric($quantity)) {
        $products = get("../database/products.json");
        $i = 0;
        while ($i < count($products)) {
            if ($product == $products[$i]['id']) {
                $id = $products[$i]['id'];
                $name = $products[$i]['name'];
                $price = $products[$i]['price'];
                break;
            }
            $i++;
        }

        $cartItem = [
            "id" => $id,
            "name" => $name,
            "price" => $price,
            "quantity" => (int)$quantity,
            "date" => date("d-m-Y")
        ];

        insert("../database/cart.json", $cartItem);
        sessionStore("success", "Added to Cart Successfully");
    } else {
        redirect("../index");
    }

    redirect("../index");
} else {
    echo "Method not allowed";
}
