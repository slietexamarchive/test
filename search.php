<?php

// Define the file path of the JSON file containing the file names and links
$file_path = 'files.json';

// Get the search text from the form data
$search_text = $_POST['search-text'];

// Load the JSON file containing the file names and links
$file_list = json_decode(file_get_contents($file_path), true);

// Filter the file list to only include files that match the search text
$filtered_files = array_filter($file_list, function($file) use ($search_text) {
    return stripos($file['name'], $search_text) !== false;
});

// Return the filtered file list as JSON
header('Content-Type: application/json');
echo json_encode($filtered_files);
