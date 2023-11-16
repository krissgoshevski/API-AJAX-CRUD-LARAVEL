import './bootstrap';



const apiUrl = 'http://127.0.0.1:8000/api/index';

// Make a GET request using fetch
fetch(apiUrl)
    .then(response => {
        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        // Parse the JSON response
        return response.json();
    })
    .then(data => {
        // Handle the data retrieved from the API
        console.log(data);
    })
    .catch(error => {
        // Handle any errors that occurred during the fetch
        console.error('Fetch error:', error);
    });

