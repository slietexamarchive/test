<?php
	// Read the JSON file and decode its contents into an array
	$jsonString = file_get_contents('files.json');
	$data = json_decode($jsonString, true);

	// Check if the search query is set in the URL parameters
	if (isset($_GET['q'])) {
		$searchQuery = $_GET['q'];

		// Filter the results based on the search query
		$filteredData = array_filter($data, function($file) use ($searchQuery) {
			return stripos($file['name'], $searchQuery) !== false;
		});

		// Generate the HTML view for the filtered results
		if (!empty($filteredData)) {
			echo '<ul>';
			foreach ($filteredData as $file) {
				echo '<li><a href="' . $file['link'] . '">' . $file['name'] . '</a></li>';
			}
			echo '</ul>';
		} else {
			echo '<p>No results found.</p>';
		}
	}
?>
