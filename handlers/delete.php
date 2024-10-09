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

    if (is_numeric($item)) {

        $data = get('../database/cart.json');

        // Find the index of the item to be deleted
        $index = -1;
        for ($i = 0; $i < count($data); $i++) {
            if ($item == $data[$i]['id']) { // Replace 3 with the desired ID
                $index = $i;
                break;
            }
        }

        // If the item was found, remove it from the array
        if ($index !== -1) {
            unset($data[$index]);

            // Re-index the array
            $data = array_values($data);

            // Encode the updated data back into JSON
            put("../database/cart.json", $data);
        }
    }
    redirect('../cart');
} else {
    echo "Method not allowed";
}
