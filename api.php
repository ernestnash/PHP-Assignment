<?php
// api.php

// Fetch JSON data from the provided URL and return the decoded data as an array
function getJSONData($json_url) {
    $json_data = file_get_contents($json_url);

    $data = json_decode($json_data, true);

    // Check if there was an error while decoding the JSON data
    if ($data === null) {
        return ['error' => 'Failed to decode JSON data. Error: ' . json_last_error_msg()];
    }
    return $data; // Return the decoded data
}
?>