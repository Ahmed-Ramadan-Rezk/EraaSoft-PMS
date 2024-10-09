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

    require_once('../validations/checkout.php');


    if (empty($errors)) {

        $cartData = get('../database/cart.json');

        $checkoutInfo = [
            "id" => (int)uniqid(),
            "name" => $name,
            "email" => $email,
            "address" => $address,
            "phone" => $phone,
            "note" => $note,
            "orders" => $cartData,
            "total" => total($cartData),
            "date" => date("d-m-Y")
        ];

        put("../database/checkout.json", [$checkoutInfo]);

        // Empty the cart
        $empty = [$cartData];
        unset($empty[0]);
        put("../database/cart.json", $empty);

        // sessionStore("success", "Order placed successfully);
        redirect("../order-placed");
    } else {
        sessionStore("errors", $errors);
        redirect("../checkout");
    }
} else {
    echo "Method not allowed";
}
