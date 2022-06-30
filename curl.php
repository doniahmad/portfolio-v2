<?php

function curl_post($data, $path)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://localhost/portfolio-v2/api" . $path);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    curl_exec($ch);

    if ($e = curl_error($ch)) {
        echo $e;
    }

    curl_close($ch);
}

function curl_delete($path)
{
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "http://localhost/portfolio-v2/api" . $path);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);

    curl_close($ch);
}
