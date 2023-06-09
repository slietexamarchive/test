// Get references to the form and file list elements
const form = document.getElementById('search-form');
const fileList = document.getElementById('file-list');

// Add an event listener to the form to handle form submission
form.addEventListener('submit', (event) => {
	// Prevent the default form submission behavior
	event.preventDefault();

	// Get the search text from the input field
	const searchText = document.getElementById('search-text').value.toLowerCase();

	// Send a POST request to the search.php script with the search text
	fetch('search.php', {
		method: 'POST',
		body: new FormData(form)
	})
		.then(response => response.json())
		.then(filteredFiles => {
			// Clear the current file list
			fileList.innerHTML = '';

			// Create a new list item for each matching file and add it to the file list
			filteredFiles.forEach(file => {
				const li = document.createElement('li');
				const a = document.createElement('a');
				a.href = file.link;
				a.textContent = file.name;
				li.appendChild(a);
				fileList.appendChild(li);
			});
		})
		.catch(error => console.error(error));
});
