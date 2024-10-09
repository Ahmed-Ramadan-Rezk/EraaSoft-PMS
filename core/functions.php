<?php

// Get data from json file
function get(string $filename): array
{
    if (!file_exists($filename)) {
        $data = touch($filename);
    }
    $data = file_get_contents($filename);

    return toArray($data);
}

// Put data to json file
function put(string $filename, array $data): string
{
    return file_put_contents($filename, toJson($data));
}

function toArray(string $data): array
{
    return json_decode($data, true) ?? [];
}

function toJson(array $data): string
{
    return json_encode($data, JSON_PRETTY_PRINT);
}

function total(array $data): int
{
    $sum = 0;
    for ($i = 0; $i < count($data); $i++) {
        $sum += $data[$i]['price'] * $data[$i]['quantity'];
    }

    return $sum;
}

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";
    die();
}


function redirect($path, $ext = ".php")
{
    header("Location: $path$ext", true, 302);
    exit();
}


function insert(string $filePath, array $items)
{
    $file = file_get_contents($filePath);

    if (file_exists($filePath) && is_array(toArray($file))) {
        $existingData = toArray($file);
        $existingData[] = $items;
        $data = toJson($existingData);
    } else {
        $data = toJson([$items]);
    }

    file_put_contents($filePath, $data);
}
