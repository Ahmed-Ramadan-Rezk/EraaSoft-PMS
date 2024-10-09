<?php

function sessionStore($key, $value)
{
    $_SESSION[$key] = $value;
}

// Display session Error
function error(string $name)
{
    if (isset($_SESSION['errors'][$name])) {
        echo '<div class="text-danger p-1 small">' . $_SESSION['errors'][$name] . '</div>';
    }

    unset($_SESSION['errors'][$name]);
}

// Display session Success
function success(string $key)
{
    if (isset($_SESSION[$key])) {
        echo '<p class="alert alert-success p-1 text-center">' . $_SESSION[$key] . '</p>';
    }

    unset($_SESSION[$key]);
}
