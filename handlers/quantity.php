<?php
session_start();
require_once('../core/functions.php');
require_once('../core/request.php');
require_once('../core/sessions.php');

$errors = [];
if (postMethod()) {
    foreach ($_POST as $key => $value) {
        $$key = receiveInput($value);
    }

    if (is_numeric($item) && is_numeric($quantity)) {
        $cartItems = get("../database/cart.json");
        $products = get("../database/products.json");

        // Find the index of the item to be updated
        $index = -1;
        for ($i = 0; $i < count($cartItems); $i++) {
            if ($item == $cartItems[$i]['id']) {
                $index = $i;
                break;
            }
        }

        // If the item was found, update its quantity
        if ($index !== -1) {
            for ($i = 0; $i < count($products); $i++) {
                if ($item == $products[$i]['id'] && $quantity <= $products[$i]['quantity']) {
                    $cartItems[$index]['quantity'] = (int)$quantity;
                    break;
                }
            }

            // Save the updated cart data
            put('../database/cart.json', $cartItems);
        }
    }
    redirect('../cart');
} else {
    echo "Method not allowed";
}
